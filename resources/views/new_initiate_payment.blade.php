@extends('layouts.new_frontlayout')

        @section('title', '')
         @section('description', '')
        @section('keywords', '')
  
  @section('content')
<style type="text/css">
  .message-wp{
    padding: 40px 40px 60px;
    align-items: center;
    border-radius: 10px;
    box-shadow: 1px 1px 20px 0 hsla(0, 0%, 78.7%, 0.31);
  }
  .msg-leaf img{
    max-width: 120px;
  }
</style>
<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/Sustainablity.png')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">{{ __('cart.SUSTAINABILITY')}}</span>
        <h1>{{ __('cart.Multiplying growth, responsibly')}}</h1>
      </div>
    </div>
  </div>
</div>


<section class="section about-section pb0">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            @if($orderFrom && $orderFrom == 1)
            <div class="message-wp text-center">
                <div class="msg-leaf">
                    <img src="https://www.ecotactbags.com/assets/front/img/location.png" class="image-29" alt="ecotactbags">
                </div>
                <div class="main-msg-text-wrapper">
                    <h2>{{ __('cart.Proceed to Payment')}}</h2>
                    <form>
                        <div>
                            <label>{{ __('cart.Amount')}} : {{config('app.lang')->currency}}{{$order->net_amt}}</label>
                        </div>
    					<div>
    					    <button type="button" class="btn btn-primary" onclick="$('#rzp-button1').click();">{{ __('cart.Make Payment')}}</button>
    					</div>
            	    </form>
                </div>
            </div>
            @else
            <div class="message-wp text-center">
                <div class="msg-leaf">
                    <img src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" alt="ecotactbags" class="image-29">
                </div>
                <div class="main-msg-text-wrapper">
                    <h2>{{ __('cart.Pay your amount')}}</h2>
                    <form>
                        <div>
                            <label>{{ __('cart.Amount')}} : {{config('app.lang')->currency}}{{$order->net_amt}}</label>
                        </div>
    					<div>
    					    <button type="button" class="btn btn-primary" onclick="$('#rzp-button1').click();">{{ __('cart.Make Payment')}}</button>
    					</div>
            	    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
  </div>
</section>
    
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