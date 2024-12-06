@extends('layouts.new_frontlayout')

  @section('title', 'Order Summery | Ecotact')
  @section('description', '')
  @section('keywords', '')


@section('content')

<style>
    .cart-capta span {
        min-width: 60px;
    }
</style>

<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/cart-banner.png')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">{{ __('cart.YOUR CART')}}</span>
        <h1>{{ __('cart.Refresh, Multiply')}}</h1>
      </div>
    </div>
  </div>
</div>

<section class="section cart-body pb0">
  <div class="container">
    <div class="row">
      <div class="col-md-8 mb30">
        <div class="left-cart">
            <div class="cart-header">
                <span><a href="{{ route('addressConfirm') }}"><i class="las la-angle-left custom"></i></a>{{ __('cart.Delivery Address')}}</span>
                <span><a href="{{ route('addressConfirm') }}">{{ __('cart.Edit')}}</a></span>
            </div>
            
            <div class="cart-box" style="justify-content: flex-start;">
                <div class="cart-details">
                <p>{{ $newAddress->name }}</p>
                <p>{{ $newAddress->email }}, {{ $newAddress->contact_no }}</p>
                <p>{{ $newAddress->house_no }} {{ $newAddress->apertment_no }} {{ $newAddress->area }}. {{ $newAddress->landmark }}, {{ $newAddress->country }}, {{ $newAddress->state }} {{ $newAddress->city }} {{ $newAddress->pin }}</p>
                </div>
                @if($newAddress->carrier_partner == 2 || $newAddress->carrier_partner == 3) <div style="text-align:center;">Shipping cost is extra and will be emailed after confirmation.</div> @endif
            </div>
            
        </div>
      </div>
      <div class="col-md-4">
        <div class="right-cart">
          <div class="cart-header">
            <span>{{ __('cart.Order Summary')}}</span>
          </div>
          <div class="right-price">
            <p>{{ __('cart.Total Items')}} <span class="text-right">{{ $totQty }}</span></p>
            <p>{{ __('cart.Cart Discount')}} <span class="text-right">{{config('app.lang')->currency}} {{ number_format($totdiscountedTotal,2) }}</span></p>
            <p>{{ __('cart.Order total')}} <span class="text-right green-text" id="total">{{config('app.lang')->currency}} {{ number_format($total,2)  }}</span></p>
            @if($isCoupon)
            <p>{{ __('cart.Discount')}} <span class="text-right green-text" id="disVaue">@if($disType == 'US$') US$ @endif {{$disValue}} @if($disType == '%') % @endif</span></p>
            @endif
            
            @if(session()->get('shipping-charge'))
            <p>{{ __('cart.Shipping Charges')}} <span class="text-right green-text" id="disVaue">@if(config('app.lang')->slug == 'in') ₹ @else $ @endif {{session()->get('shipping-charge')}}</span></p>
            @endif 
            
          </div>
          
          
          @if(config('app.lang')->slug != 'in')
          <div class="right-price sub-total">
            <p>{{ __('cart.Subtotal')}}<span class="text-right green-text" id="subTotal">{{ config('app.lang')->currency}} {{ $isCoupon ? (session()->get('shipping-charge') + round($discountedTotal,2)) : (session()->get('shipping-charge') + round($total,2)) }}</span></p>
          </div>
          @else
            <?php
                $ship = session()->get('shipping-charge');
                $shipC = $ship+($ship*0.18);
            ?>
            <div class="right-price sub-total">
            <p>{{ __('cart.Subtotal')}}<span class="text-right green-text" id="subTotal">{{ config('app.lang')->currency}} {{ $isCoupon ? ($shipC + round($discountedTotal,2)) : ($shipC + round($total,2)) }}</span></p>
            </div>
           @endif
        </div>
        <form action="{{route('createOrder')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary check-out-btn">{{ __('cart.Proceed to Payment')}}</button>
        </form>
      </div>
    </div>
  </div>
</section>




@stop