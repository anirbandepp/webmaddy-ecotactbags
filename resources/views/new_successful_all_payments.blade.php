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
  .w-inline-block{
      padding: 40px;
  }
</style>
<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/Sustainablity.png')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">THANK YOU</span>
      </div>
    </div>
  </div>
</div>
@if($order->order_type != 'cod')
<?php 
    $payInfo = json_decode($order->online_payment_info); 
    
    $transactionId = $payInfo->rzp_paymentid;  
    $revenue = $order->net_amt;
    $shippingCharge = $order->shipping_charges + $order->shipping_gst;
    $tax = $order->tax_inclusive;
    $orderProducts = $order->orderProducts;
    $a="";
    $b =[];
    foreach($orderProducts as $product)
    {
        $a .= "ga('ecommerce:addItem', {'id': '".@$product->stock->product->productDetails[0]->id."','name': '".@$product->stock->product->productDetails[0]->product_name."', 'sku': '".@$product->stock->sku."', 'category': '".@$product->stock->product->categories[0]['name']."', 'price': '".@$product->stock->offer_price."','quantity': '".$product->qty."'});\n";
        array_push($b,[
            'sku'=> @$product->stock->sku,
            'name'=> @$product->stock->product->productDetails[0]->product_name,
            'category'=> @$product->stock->product->categories[0]['name'],
            'price'=> @$product->stock->offer_price,
            'quantity'=> $product->qty
        ]);
        
        // array_push($b,$product);
    }
    // dd($b)
?>
@endif

<section class="section about-section pb0">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="message-wp text-center">
                <div class="msg-leaf">
                    <img src="https://www.ecotactbags.com/assets/front/img/location.png" class="image-29" alt="ecotactbags">
                </div>
                <div class="main-msg-text-wrapper">
                    <h3 class="mb15">Your order has been successfully placed.</h3>
                    <p>Thank you for taking a step towards preserving your grain/bean</p>
                </div>
                <h3 class="mb15">Follow us on</h3>
                <div class="msg-leaf" style="margin-top: 23px;">
                  <a href="https://www.instagram.com/ecotact/" class="w-inline-block"><img src="https://www.ecotactbags.com/front-end/images/Vector_3.svg" loading="lazy" alt="Instagram Icon" class="image-5"></a>
                  <a href="https://www.facebook.com/ecotact" class="w-inline-block"><img src="https://www.ecotactbags.com/front-end/images/Facebook.svg" alt="Facebook Icon" loading="lazy" class="image-5"></a>
                  <a href="https://www.youtube.com/channel/UCpmDEdpAA2NLAQk9_uaBAQA" class="w-inline-block"><img src="https://www.ecotactbags.com/front-end/images/Vector_2.svg" loading="lazy" width="34" alt="Youtube Icon" class="image-5"></a>
                  <a href="https://www.linkedin.com/company/ecotact/" class="w-inline-block"><img src="https://www.ecotactbags.com/front-end/images/Vector.svg" alt="Linkedin Icon" loading="lazy" class="image-5"></a>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
@if($order->order_type != 'cod')
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-135497057-1', 'auto');
    ga('send', 'pageview');
    ga('require', 'ecommerce');
    ga('ecommerce:addTransaction',
    {'id': '{{ $transactionId }}', // Transaction ID. Required.- REQUIRED
        'affiliation': 'Ecotact Bags', // Affiliation or storename.
        'revenue': '{{ $revenue }}', // Grand Total(Revenue =Price+Tax+Shipping)- REQUIRED
        'shipping': '{{ $shippingCharge }}', // Shipping.
        'tax': '{{ $tax }}' // Tax.
    });
    {!!$a!!}
    ga('ecommerce:send');
</script>

<script>
    window.dataLayer = window.dataLayer || [];
        dataLayer.push({
            'currencyCode' : '{{config('app.lang')->currency_code}}',
            push
            'transactionId': '{{ $transactionId }}',
            'transactionAffiliation': 'Acme Clothing',
            'transactionTotal': '{{$revenue}}',
            'transactionTax': '{{ $tax }}',
            'transactionShipping': '{{$shippingCharge}}',
            'transactionProducts': '{{json_encode($b)}}'
        });
        
    dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
    dataLayer.push({
      event: "purchase",
      ecommerce: {
          transaction_id: '{{ $transactionId }}',
          affiliation: "Google Merchandise Store",
          value: '{{$revenue}}',
          tax: '{{ $tax }}',
          shipping: '{{$shippingCharge}}',
          currency: "{{config('app.lang')->currency_code}}",
          items: '{{json_encode($b)}}'
      }
    });

</script>
@endif
@stop