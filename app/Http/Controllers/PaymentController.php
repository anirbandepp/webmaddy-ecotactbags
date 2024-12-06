<?php

namespace App\Http\Controllers;


use App\Http\Traits\SlugTrait;
use App\PendingOrder;
use App\PendingOrderProduct;
use App\Repositories\ProductRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Facades\Mail;
use PDF;
use Razorpay\Api\Api as API;

class PaymentController extends Controller
{
	use SlugTrait;

    private $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function createOrderSustain(Request $request)
    {
        //return $request->all();
            $this->validate(request(),[
                'email-3' => 'required|min:2|email',
                'name-2' => 'required|min:2',
                'phone-2' => 'required|min:2',
                'country-2' => 'required|min:2',
                'address-2' => 'required|min:2',
                'qty' => 'required',
                // 'g-recaptcha-response' => 'required'
            ]);
            //return $request->all();
            DB::beginTransaction();
            try{

                $product = $this->productRepository->all()->where('id',Session::get('productId'))->with(['stock' => function($qs){
                    $qs->where('language_id',config('app.lang')->id)->first();
                }])->first();

                $user = User::where('email', request('email-3'))->where('name', request('email-2'))->where('phone', request('phone-2'))->first();
                if(!$user) {
                    $user = new User(['email' => request('email-3'), 'name' => request('name-2'), 'phone' => request('phone-2'), 'password' => bcrypt('ecotact')]);
                    //return $user;
                    $user->save();
                }

                $order = PendingOrder::create([
                    'invoice_no' => time(),
                    'user_id' => $user->id,
                    'email' => request('email-3'),
                    'name' => request('name-2'),
                    'full_address' => request('address-2'),
                    'country' => request('country-2'),
                    'contact_no' => request('phone-2'),
                    'gstin' => request('tax-id'),
                    'payment_gateway' => 'rezor_pay',
                    'gross_amt' => $product->stock->offer_price * request('qty'),
                    'discount_amt' => 0,
                    'net_amt' => $product->stock->offer_price * request('qty'),
                    'order_type' => 'online',
                    'status' => 'Pending',//need set default in database
                    'discount_type' => 'coupon discount', //need null
                    'discount_value' => 0,
                    'type' => 'amt', //need null
                    'min_cart_amt' => 0,
                    'max_cart_amt' => 0,
                    'expiry_at' => null,
                ]);
                $stocks = \App\Stock::whereIn('sku',[$product->stock->sku])->with('product')->get();
                foreach($stocks as $stk)
                {
                    $orderProducts = PendingOrderProduct::create([
                        'pending_order_id'  => $order->id,
                        'stock_id' => $stk->id,
                        'price' => $stk->offer_price,
                        'tax_rate'=> 0,
                        'qty' => request('qty'),
                    ]);
                }

                DB::commit();
                if($user && $order){
                    Session::put('orderId',$order->id);
                    Session::put('normalOrder',1);
                    Session::put('orderEmail','recycle@aashirvad.in');
                    return redirect()->route('paymentInitiate');
                }
                return redirect()->back()->with('global','Order not created successfully')->with('type','error')->withInput(request()->all());

            }
            catch (\Exception $e) {
                DB::rollback();
                return $msg = $e->getMessage();
                $type = 'error';
                return redirect()->back()->with('global',$msg)->with('type',$type)->withInput(request()->all());
            }
    }

    public function paymentInitiate(Request $request)
    {
        if(Session::get('orderId')){
            $order = PendingOrder::find(Session::get('orderId'));
            if($order) {
                if($order->user->dristibutor){
                    $data = $this->pendingToConfirmed($order);
                    if($data['status'] == 'success')
                    {
                        $newOrder = \App\Order::where('id',$data['newOrderId'])->first();
                        $order->delete();
                        
                        $user = auth()->user();
                        if(config('app.lang')->slug == 'in')
                        {
                            $user->totalPurchaseInr += $newOrder->net_amt;
                            $user->save();
                        }
                        else
                        {
                            $user->totalPurchaseDol += $newOrder->net_amt;
                            $user->save();
                        }
                        if($newOrder)
                        {
                            $newOrder->order_type =  'cod';
                            $newOrder->save();
                            Session::forget('orderId');
                            $orderDetails = $newOrder->load(
                            ['userUsedDiscounts','user','orderProducts' => function($query)
                                {
                                    $query->with(['stock'=> function($query)
                                    {
                                        $query->with(['product'=>function($q){
                                            $q->with(['categories','productDetails']);
                                        }]);
                                    }]);
                                }
                            ]);
            
                            $email = [$newOrder->email];
                            // $email = ['raju@webmaddy.com'];
                            $email2 = ['info@ecotactbags.com', 'aashirvad@gmail.com'];
                            // $email2 = ['raju@webmaddy.com','royraju235@gmail.com'];
                            if(Session::get('orderEmail')){
                                $email2 = Session::get('orderEmail');
                            }
                            Session::forget('orderEmail');
                            $subject = 'Your order has been placed and confirmed by Ecotact bags';
                            $subject2 = 'Your order has been placed and confirmed by Ecotact bags';
                            $heading = "Order Successfully Placed";
                            $heading2 = "New Order Placed";
                            $wrd = $this->amountToWord($newOrder->net_amt);
                            view()->share(['order'=>$orderDetails,'wrd' => $wrd]);
                            $pdf = PDF::loadview('cod_invoice');
                            Mail::send('confirm_mail', ['order' => $newOrder,'heading' => $heading], function ($m) use ($email,$subject,$pdf) {
                                $m->to($email)->subject($subject);
                                $m->attachData($pdf->output(), 'invoice.pdf');
                            });
                            Mail::send('confirm_mail', ['order' => $newOrder,'heading' => $heading2], function ($m) use ($email2,$subject2,$pdf) {
                                $m->to($email2)->subject($subject2);
                                $m->attachData($pdf->output(), 'invoice.pdf');
                            });
                            $orderType = Session::get('normalOrder');
                            Session::forget('normalOrder');
                            $error = 'Payment Success';
                            $type = 'success';
                            Session::forget('cart');
                            Session::forget('addrId');
                            if($orderType && $orderType == 1){
                                return view('new_successful-payment',['order'=>$orderDetails]);
                            }
                            return view('new_successful_all_payments',['order'=>$orderDetails]);
                        }
                        
                    }
                }
                $currency = 'USD';
                if(config('app.lang')->slug == 'in' && Session::get('normalOrder') == 0){
                    $currency = 'INR';
                }
                $rz_id = config('app.rz_id');
                $rz_secret = config('app.rz_secret');
                $api = new Api($rz_id, $rz_secret);
                $order1 = $api->order->create(array(
                    'receipt' => $order->id,
                    'amount' => $order->net_amt * 100,
                    'currency' => $currency,
                    'payment_capture' => 1 // auto capture
                    )
                );
                $response = [
                    'orderId' => $order1['id'],
                    'razorpayId' => $rz_id,
                    'amount' => $order1['amount'],
                    'name' => $order->user->name,
                    'currency' => $currency,
                    'email' => $order->user->email,
                    'address' => $order->user->addr_line1,
                    'description' => 'Ecotact Order Description',
                ];
                Session::forget('cart');
                Session::forget('addrId');
                $request->session()->put('razorpay_order_id', $order1['id']);
                return view('new_initiate_payment',['order'=> $order, 'user'=> $order->user, 'razorpayOrderId' => $order1['id'],'response' => $response,'orderFrom' => Session::get('normalOrder')]);
            }

        }
        return redirect()->route('home');

    }

    public function paymentStatus(Request $request)
    {
        if(Session::get('orderId') && Session::get('razorpay_order_id') && request('type')){
            $order = PendingOrder::find(Session::get('orderId'));
            if($order) {
                $type = 'error';
                $request->session()->forget('orderId');
                $request->session()->forget('razorpay_order_id');
                error_reporting(E_ALL);
                ini_set('display_errors', 1);
                $error = "Payment Failed";
                $signatureStatus = $this->SignatureVerify(
                    $request->all()['rzp_signature'],
                    $request->all()['rzp_paymentid'],
                    $request->all()['rzp_orderid']
                );
                if($signatureStatus == true) {
                    $data = $this->pendingToConfirmed($order);
                    if($data['status'] == 'success')
                    {
                        $newOrder = \App\Order::where('id',$data['newOrderId'])->first();
                        $order->delete();
                        
                        $user = auth()->user();
                        if(config('app.lang')->slug == 'in')
                        {
                            $user->totalPurchaseInr += $newOrder->net_amt;
                            $user->save();
                        }
                        else
                        {
                            $user->totalPurchaseDol += $newOrder->net_amt;
                            $user->save();
                        }
                        
                    }
                    if($newOrder)
                    {
                        $newOrder->online_payment_info =  json_encode($request->all());
                        $newOrder->save();
                        Session::forget('orderId');
                        $orderDetails = $newOrder->load(
                        ['userUsedDiscounts','user','orderProducts' => function($query)
                            {
                                $query->with(['stock'=> function($query)
                                {
                                    $query->with(['product'=>function($q){
                                        $q->with(['categories','productDetails']);
                                    }]);
                                }]);
                            }
                        ]);
        
                        $email = [$newOrder->email];
                        // $email = ['raju@webmaddy.com'];
                        $email2 = ['info@ecotactbags.com', 'aashirvad@gmail.com'];
                        //  $email2 = ['raju@webmaddy.com','royraju235@gmail.com'];
                        if(Session::get('orderEmail')){
                            $email2 = Session::get('orderEmail');
                        }
                        Session::forget('orderEmail');
                        $subject = 'Your order has been placed and confirmed by Ecotact bags';
                        $subject2 = 'Your order has been placed and confirmed by Ecotact bags';
                        $heading = "Order Successfully Placed";
                        $heading2 = "New Order Placed";
                        $wrd = $this->amountToWord($newOrder->net_amt);
                        view()->share(['order'=>$orderDetails,'wrd' => $wrd]);
                        $pdf = PDF::loadview('invoice');
                        Mail::send('confirm_mail', ['order' => $newOrder,'heading' => $heading], function ($m) use ($email,$subject,$pdf) {
                            $m->to($email)->subject($subject);
                            $m->attachData($pdf->output(), 'invoice.pdf');
                        });
                        Mail::send('confirm_mail', ['order' => $newOrder,'heading' => $heading2], function ($m) use ($email2,$subject2,$pdf) {
                            $m->to($email2)->subject($subject2);
                            $m->attachData($pdf->output(), 'invoice.pdf');
                        });
                        $orderType = Session::get('normalOrder');
                        Session::forget('normalOrder');
                        $error = 'Payment Success';
                        $type = 'success';
                        if($orderType && $orderType == 1){
                            return view('new_successful-payment',['order'=>$orderDetails]);
                        }
                        return view('new_successful_all_payments',['order'=>$orderDetails]);
                    }

                }else{
                    Session::forget('normalOrder');
                    Session::forget('orderEmail');
                    return view('new_unsuccessful-payment');
                }

            }

        }
        // return [Session::get('orderId') , Session::get('razorpay_order_id')];
        return view('unsuccessful-payment');

    }

    private function SignatureVerify($_signature,$_paymentId,$_orderId)
	{
	    try
	    {
	        // Create an object of razorpay class
	        $api = new Api(config('app.rz_id'), config('app.rz_secret'));
	        $attributes  = array('razorpay_signature'  => $_signature,  'razorpay_payment_id'  => $_paymentId ,  'razorpay_order_id' => $_orderId);
	        $order  = $api->utility->verifyPaymentSignature($attributes);
	        return true;
	    }
	    catch(\Exception $e)
	    {
	        // If Signature is not correct its give a excetption so we use try catch
	        return false;
	    }
	}
	
	public function testMail(Request $request)
	{
	    $lang = \App\Language::where('id',4)->first();
        config(['app.lang' => $lang]);
        \App::setLocale($lang->slug);
	    $orderDetails = \App\Order::with('orderProducts')->find(58);
    	$wrd = $this->amountToWord($orderDetails->net_amt);
    	   
    	view()->share(['order'=>$orderDetails,'wrd' => $wrd]);
        $pdf = PDF::loadview('invoice');
        Mail::send('confirm_mail', ['order' => $orderDetails,'heading' => 'test'], function ($m) use($pdf) {
            $m->to('raju@webmaddy.com')->subject('test');
            $m->attachData($pdf->output(), 'invoice.pdf');
        });
	}

}
