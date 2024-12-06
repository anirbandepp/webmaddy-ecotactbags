<?php

namespace App\Http\Controllers;

use App\CouponDiscount;
use App\Http\Traits\SlugTrait;
use App\PendingOrder;
use App\PendingOrderProduct;
use App\User, DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Response;
use \App\Cart, \App\State, \App\Order;
use App\Repositories\ProductRepository;
use Razorpay\Api\Api as API;
use Razorpay\Api\Errors\SignatureVerificationError;

class CartController extends Controller
{
    use SlugTrait;
    
    private $cart;

    private $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    /*
    public function __construct()
    {
        $this->middleware(function ($request, $next) 
        {
            $this->cart = Session::get('cart');
            return $next($request);
            
        });
        $this->cart = Session::get('cart');
    }

    public function addToCart(Request $request)
    {
        // return $this->cart;
        $product = json_decode(request()->getContent(), true);
        if($product['qty'] > 0){
            if(isset($this->cart[$product['sku']])):
                $this->cart[$product['sku']]['qty'] = $product['qty'];
            else:
                $this->cart[$product['sku']] = $product;
                $this->cart[$product['sku']]['qty'] = $product['qty']; // Dynamically add initial qty
            endif;

            Session::put('cart', $this->cart);
            $done = $this->cartCalculation();
            return Response::json(['type' => 'success', 'cartCount' => count($this->cart), 'message' => 'Cart updated.','currentQty' => $product['qty'], 'total' => $done['total']]);
        }else{
            return Response::json(['type' => 'error', 'cartCount' => count($this->cart), 'message' => 'Invalid Quantity','currentQty' => $this->cart[$product['sku']]['qty'], 'total' => $done['total']]);
        }
    }
    public function removeFromCart($sku)
    {
		// $cart = Session::get('cart');
		unset($this->cart[$sku]);
		Session::put('cart', $this->cart);
        return redirect()->back()->with('global','Cart Updated Successfully')->with('type','success');
    }
    public function cartItems()
    {
    	$done = $this->cartCalculation();
	    return view('shopping-cart',['stocks' => $done['stocks'],'cartDetails' => $done['cartDetails'], 'total' => $done['total']]);
    }
    public function addressConfirm($value='')
    {
        if(Session::has('cart')){
        	$done = $this->cartCalculation();
        	return view('address_details',['stocks' => $done['stocks'],'cartDetails' => $done['cartDetails'], 'total' => $done['total'], 'states' => State::select('state_name')->get(), 'exclTaxTotal' => $done['exclTaxTotal']]);	
        }else{
            return redirect()->route('home')->with('global','Empty Cart')->with('type','warning');
        }
    }

    */
    public function createOrder(Request $request)
    {
        //return $request->all();
            $this->validate(request(),[
                'email-3' => 'required|min:2|email',
                'name-2' => 'required|min:2',
                'phone-2' => 'required|min:2',
                'country-2' => 'required|min:2',
                'address-2' => 'required|min:2',
                'qty' => 'required',
                'g-recaptcha-response' => 'required'
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
                    's_full_name' => request('name-2'),
                    'addr_line1' => request('address-2'),
                    's_addr1' => request('address-2'),
                    's_country' => request('country-2'),
                    's_ph' => request('phone-2'),
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
                $rz_id = config('app.rz_id');
                $rz_secret = config('app.rz_secret');
                $api = new Api($rz_id, $rz_secret);
                $order1 = $api->order->create(array(
                    'receipt' => $order->id,
                    'amount' => $order->net_amt * 100,
                    'currency' => 'USD',
                    'payment_capture' => 1 // auto capture
                    )
                );
                $response = [
                    'orderId' => $order1['id'],
                    'razorpayId' => $rz_id,
                    'amount' => $order1['amount'],
                    'name' => $order->user->name,
                    'currency' =>  'USD',
                    'email' => $order->user->email,
                    'address' => $order->user->addr_line1,
                    'description' => 'Ecotact Order Description',
                ];
                $request->session()->put('razorpay_order_id', $order1['id']);
                return view('initiate_payment',['order'=> $order, 'user'=> $order->user, 'razorpayOrderId' => $order1['id'],'response' => $response]);
            }
            
        }
        return redirect()->route('home');
        
    }

    public function paymentStatus(Request $request)
    {
        //return $request->all();
        if(Session::get('orderId') && Session::get('razorpay_order_id') && request('type')){
            $order = PendingOrder::find(Session::get('orderId'));
            if($order) {
                $type = 'error';            
                $request->session()->forget('orderId');
                $request->session()->forget('razorpay_order_id');
                error_reporting(E_ALL);
                ini_set('display_errors', 1);
                $error = "Payment Failed";
                if (empty($_POST['razorpay_payment_id']) === false)
                {
                    $rz_id = config('app.rz_id');
                    $rz_secret = config('app.rz_secret');
                    $api = new API($rz_id, $rz_secret);
                    
                    $signatureStatus = $this->SignatureVerify(
            	        $request->all()['razorpay_signature'],
            	        $request->all()['razorpay_payment_id'],
            	        $request->all()['razorpay_order_id']
            	    );
            	    if($signatureStatus == true) {
            	        $data = $this->pendingToConfirmed($order);
                        if($data['status'] == 'success')
                        {
                            $newOrder = \App\Order::where('id',$data['newOrderId'])->first();
                            $order->delete();
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
                                        $query->with('product');
                                    }]);
                                }
                            ]);
                            $email = 'raju@webmaddy.com';
                            $subject = 'Your order has been placed with ecotactbags';
                            $heading = "Order Successfully Placed";
                            $wrd = $this->amountToWord($newOrder->net_amt);
                            view()->share(['order'=>$orderDetails,'wrd' => $wrd]);
                            $pdf = PDF::loadview('invoice');
                            try{
                                \Mail::send('confirm_mail', ['order' => $newOrder,'heading' => $heading], function ($m) use ($email,$subject,$pdf) {
                                    $m->to($email)->subject($subject);
                                    $m->attachData($pdf->output(), 'invoice.pdf');
                                });
                            }catch(\Exception $e){
                                
                            }
                            $error = 'Payment Success'; 
                            $type = 'success';
                            return view('successful-payment');
                        }
                        
            	    }
                }
               
            }
            
        }
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


    /*
    public function discountCoupon($value='')
    {
        $done = $this->cartCalculation();
        $request = json_decode(request()->getContent(), true);
        $total = $done['total'];
        $coupon = CouponDiscount::where('name','=',$request['coupon'])->where('active','=',1)->whereDate('expiry_at','>=',\Carbon::today())->first();
        if($coupon){
            if($coupon->min_cart_amt <= $done['total'])
            {

                if($coupon->type == 'amt')
                {
                    $disValue = '₹'.$coupon->value;
                    $total = (int) $total- $coupon->value;
                }
                elseif($coupon->type == 'percent')
                {
                    $disValue = $coupon->value.'%';
                    $total = (int) $total - (($total / 100) * $coupon->value);
                }
                return response()->json(['type' => 'success', 'couponValue' => $disValue, 'total' => $total]);
            }
            return response()->json(['type' => 'error', 'message' => 'Not Valid']);
        }
        else{
            return response()->json(['type' => 'error', 'message' => 'Coupon Not Found']);
        }

    }
    public function removeDiscount($value='')
    {
        $done = $this->cartCalculation();
        $disValue = '₹0';
        return response()->json(['type' => 'success', 'couponValue' => $disValue, 'total' => $done['total']]);

    }
    public function checkCartDiscount()
    {
        $done = $this->cartCalculation();
        $total = $done['total'];
        $cart = \App\CartDiscount::where('min_cart_amt','<=',$done['total'])->where('active','=',1)->whereDate('expiry_at','>=',\Carbon::today())->orderBy('min_cart_amt','desc')->first();
        if($cart){

            if($cart->type == 'amt')
            {
                $disValue = '₹'.$cart->value;
                $total = (int) $total- $cart->value;
            }
            elseif($cart->type == 'percent')
            {
                $disValue = $cart->value.'%';
                $total = (int) $total - (($total / 100) * $cart->value);
            }
            return response()->json(['type' => 'success', 'couponValue' => $disValue, 'total' => $total]);
        }
        else{
            return response()->json(['type' => 'error', 'message' => 'Coupon Not Found']);
        }

    }
    public function checkpin()
    {
        $request = json_decode(request()->getContent(), true);
        if(\App\Pincode::where('pincodes',$request['pincode'])->first()){
            return response()->json(['type' => 'success','msg' => '']);
        }else{
            return response()->json(['type' => 'error','msg' => 'Delivery Not Available,at this pincode']);
        }
    }
    */

}

