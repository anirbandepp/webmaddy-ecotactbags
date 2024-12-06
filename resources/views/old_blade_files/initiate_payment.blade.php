@extends('layouts.front-layout')

@section('content')
<div class="section sustainability">
    <div class="main-wrapper">
      <div class="banner-content-wrapper">
        <div class="title-caption-wrapper">
          <div class="title-caption center">{{ __('cart.SUSTAINABILITY')}}</div>
        </div>
        <div class="h2-wrapper">
          <h2 class="h2 center white">{{ __('cart.Multiplying growth, responsibly')}} </h2>
        </div>
      </div>
    </div>
  </div>
  
    <div class="section _100-0">
        <div class="main-wrapper">
            @if($orderFrom && $orderFrom == 1)
            <div class="product-main-wrapper">
                <a href="#" class="product-image w-inline-block"><img src="{{ asset('front-end/images/Frame-337.png')}}" loading="lazy" sizes="(max-width: 479px) 73vw, (max-width: 991px) 350px, (max-width: 1279px) 33vw, 350px" width="350" srcset="{{ asset('front-end/images/Frame-337-p-500.png')}} 500w, {{ asset('front-end/images/Frame-337.png')}} 700w" alt="ecotactbags" class="image-10"></a>
                <div class="form-content">
                    <div class="h2-wrapper">
                        <h3 class="h3-popup-heading green">{{ __('cart.Proceed to Payment')}}</h3>
                    </div>
                    <div class="form-block-2 w-form">
                        <form>
            				<div class="form-group">
            					<label>{{ __('cart.Amount')}} : {{config('app.lang')->currency}}{{$order->net_amt}}</label>
            				</div>
            				<div class="form-group">
            					<button type="button" class="button accent w-button" onclick="$('#rzp-button1').click();">{{ __('cart.Make Payment')}}</button>
            				</div>
            				
            			</form>
            		</div>
            	</div>
            </div>
            @else
                <div class="message-wp">
    				<div class="msg-leaf"><img src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="133" alt="ecotactbags" class="image-29"></div>
    				<div class="main-msg-text-wrapper">
    					<div class="msg-text ty">{{ __('cart.Pay your amount')}}</div>
    				</div>
    				<div class="msg-subtext">
                      <div class="msg-sub-text">{{ __('cart.Amount')}} : {{config('app.lang')->currency}}{{$order->net_amt}}</div>
                    </div>
    				<button type="button" class="button accent w-button" onclick="$('#rzp-button1').click();">{{ __('cart.Make Payment')}}</button>
    			</div>
            @endif
        </div>
    </div>
    
    <!--<input type="hidden" name="callback_url" value="{{route('successPayment', ['type'=>'success'])}}">-->
		  <!--<input type="hidden" name="cancel_url" value="{{route('cancelPayment', ['type'=>'cancel'])}}">-->
    <button id="rzp-button1" hidden>{{ __('cart.Pay')}}</button>
<!-- This form is hidden -->
  <form action="{{route('successPayment', ['type'=>'success'])}}" method="POST" hidden>
        <input type="hidden" value="{{csrf_token()}}" name="_token" /> 
        <input type="text" class="form-control" id="rzp_paymentid"  name="rzp_paymentid">
        <input type="text" class="form-control" id="rzp_orderid" name="rzp_orderid">
        <input type="text" class="form-control" id="rzp_signature" name="rzp_signature">
      <button type="submit" id="rzp-paymentresponse" class="btn btn-primary">Submit</button>
  </form>



<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "{{$response['razorpayId']}}", // Enter the Key ID generated from the Dashboard
        "amount": "{{$response['amount']}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "{{$response['currency']}}",
        "name": "{{$response['name']}}",
        "order_id": "{{$response['orderId']}}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "handler": function (response){
            // After payment successfully made response will come here
            // send this response to Controller for update the payment response
            // Create a form for send this data
            // Set the data in form
            document.getElementById('rzp_paymentid').value = response.razorpay_payment_id;
            document.getElementById('rzp_orderid').value = response.razorpay_order_id;
            document.getElementById('rzp_signature').value = response.razorpay_signature;

            // // Let's submit the form automatically
            document.getElementById('rzp-paymentresponse').click();
        },
        "prefill": {
            "name": "{{$response['name']}}",
            "email": "{{$response['email']}}",
        },
        "notes": {
            "address": "{{$response['address']}}"
        },
    };
    var rzp1 = new Razorpay(options);
    window.onload = function(){
        document.getElementById('rzp-button1').click();
    };

    document.getElementById('rzp-button1').onclick = function(e){
        rzp1.open();
        e.preventDefault();
    }
</script>

@stop