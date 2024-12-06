@extends('layouts.front-layout')
@section('content')
    <style>
        .green-text{
            color:#0c6a35;
            font-weight: 500;
        }
    </style>
    @include('hamburger-dropdown')
      <div class="section sustainability">
        <div class="main-wrapper">
          <div class="banner-content-wrapper">
            <div class="title-caption-wrapper">
              <div class="title-caption center">THANK YOU</div>
            </div>
            <!--<div class="h2-wrapper">-->
            <!--  <h2 class="h2 center white">Multiplying growth, responsibly </h2>-->
            <!--</div>-->
          </div>
        </div>
      </div>
      <?php 
        $transaction = json_decode($order->online_payment_info);
        $transactionId = $transaction->rzp_paymentid;
        $revenue = $order->net_amt;
        $shippingCharge = $order->shipping_charges + $order->shipping_gst;
        $tax = $order->tax_inclusive;
        $a = "";
        $b = [];
        foreach($order->orderProducts as $product)
        {
            $a .= "ga('ecommerce:addItem', {'id': '".$product->id."','name': '".$product->stock->product->productDetails[0]->product_name."','sku': '".$product->stock->sku."','category': '".$product->stock->product->categories[0]->name."','price': '".$product->stock->offer_price."','quantity': '".$product->qty."'});\n";
        //     
      ?>
      <div class="section">
        <div class="main-wrapper">
          <div class="message-wp">
            <div class="msg-leaf"><img src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="133" alt="ecotactbags" class="image-29"></div>
            <div class="main-msg-text-wrapper">
              <div class="msg-text">Your order has been successfully placed.</div>
            </div>
            <div class="msg-subtext">
              <div class="msg-sub-text">Thank you for taking a step towards preserving your grain/bean</div>
            </div>
          </div>
        </div>
      </div>
      <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-135497057-1', 'auto');
            ga('send', 'pageview');
            ga('require', 'ecommerce');
            ga('ecommerce:addTransaction',
            {'id': '{{ $transactionId }}',
                'affiliation': 'Ecotact Bags',
                'revenue': '{{ $revenue }}',
                'shipping': '{{ $shippingCharge }}',
                'tax': '{{ $tax }}'
            });
            {!!$a!!}
            ga('ecommerce:send');
    </script>
    
    <script>
        window.dataLayer = window.dataLayer || [];
            dataLayer.push({
                'currencyCode' : 'EUR',
                push
                'transactionId': '{{ $transactionId }}',
                'transactionAffiliation': 'Acme Clothing',
                'transactionTotal': '{{$revenue}}',
                'transactionTax': '{{ $tax }}',
                'transactionShipping': '{{$shippingCharge}}',
                'transactionProducts': `{{$b}}`
            });
    </script>
@stop