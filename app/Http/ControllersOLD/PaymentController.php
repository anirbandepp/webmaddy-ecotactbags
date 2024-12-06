<?php

namespace App\Http\Controllers;


use App\Http\Traits\SlugTrait;
use App\PendingOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Razorpay\Api\Api;
use Mail,PDF;;

class PaymentController extends Controller
{
	use SlugTrait;
	private $razorpayId = "rzp_test_haG8YKMpjGh7J1";
    private $razorpayKey = "ifjmMNRdx4eg3aMyYqvTmyM3";
    
    // private $razorpayId = "rzp_test_Mct33bT6AuTbWB";
    // private $razorpayKey = "dheKpkjHp6XJC3H6PyF623DP";
    
    private $order;
    public function __construct(PendingOrder $order)
    {
        $this->middleware(function ($request, $next) use($order)
        {
            $this->order = $order->where('id',Session::get('orderId'))->first();
            return $next($request);
        });

    }

    public function index($value='')
    {
    	// Generate random receipt id
        $receiptId = Str::random(20);
        
        // Create an object of razorpay
        $api = new Api($this->razorpayId, $this->razorpayKey);

        // In razorpay you have to convert rupees into paise we multiply by 100
        // Currency will be INR
        // Creating order
        $order = $api->order->create(array(
            'receipt' => $this->order->id,
            'amount' => $this->order->net_amt * 100,
            'currency' => 'INR',
            'payment_capture' => 1 // auto capture
            )
        );

        // Return response on payment page
        $response = [
            'orderId' => $order['id'],
            'razorpayId' => $this->razorpayId,
            'amount' => $this->order->net_amt * 100,
            'name' => $this->order->full_name,
            'currency' => 'INR',
            'email' => $this->order->email,
            'address' => $this->order->addr_line1,
            'description' => 'New Order',
        ];
    	return view('payment-initiate',['total' => $this->order->net_amt, 'response' => $response]);
    }
    public function Complete(Request $request)
	{
	   // return $request->all();
	    // Now verify the signature is correct . We create the private function for verify the signature
	    $signatureStatus = $this->SignatureVerify(
	        $request->all()['rzp_signature'],
	        $request->all()['rzp_paymentid'],
	        $request->all()['rzp_orderid']
	    );

	    // If Signature status is true We will save the payment response in our database
	    // In this tutorial we send the response to Success page if payment successfully made
	    if($signatureStatus == true)
	    {
	    	$data = $this->pendingToConfirmed($this->order);
	    	if($data['status'] == 'success')
            {
                $newOrder = \App\Order::where('id',$data['newOrderId'])->first();
                $this->order->delete();
            }
            Session::forget('orderId');
            if($newOrder)
            {
	            $newOrder->online_payment_info =  json_encode($request->all());
	            $newOrder->save();
	            $orderDetails = $newOrder->load(
                ['userUsedDiscounts','user','orderProducts' => function($query) 
                    {
                        $query->with(['stock'=> function($query) 
                        {
                            $query->with('product');
                        }]);
                    }
                ]);
                $wrd = $this->amountToWord($newOrder->net_amt);
                view()->share(['order'=>$orderDetails,'wrd' => $wrd]);
                $pdf = PDF::loadview('admin.orders.invoice');
	            $email = $newOrder->user->email;
                $subject = 'Your order has been placed with Maskare';
                $heading = "Order Successfully Placed";
                try {
                      \Mail::send('invoice_mail', ['order' => $newOrder,'heading' => $heading], function ($m) use ($email,$subject,$pdf) {
                        $m->to($email)->subject($subject);
                        $m->attachData($pdf->output(), 'invoice.pdf');
                      });
                }
                catch(\Exception $e){
                    // return $e->getmessage();
                }
                
                $this->sendAdminNotification($newOrder->id);
	        }
	        return view('payment-success-page',['order' => $newOrder]);
	    }
	    else{
	        // You can create this page
	        return view('payment-failed-page');
	    }
	}

	// In this function we return boolean if signature is correct
	private function SignatureVerify($_signature,$_paymentId,$_orderId)
	{
	    try
	    {
	        // Create an object of razorpay class
	        $api = new Api($this->razorpayId, $this->razorpayKey);
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

}
