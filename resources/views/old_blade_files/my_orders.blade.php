@extends('layouts.front-layout')
@section('title', 'My Orders')
@section('description', '')
@section('keywords', '')
@section('content')

@include('hamburger-dropdown')

<div class="section cart wf-section">
  <div class="main-wrapper">
    <div class="cart-content-wp">
      <div class="caption-wp">
        <div class="title-caption center">YOUR ORDERS</div>
      </div>
      <h2 class="h2 center white">Refresh, Multiply</h2>
    </div>
  </div>
</div>
<div class="section wf-section">
  <div class="main-wrapper">
    <div class="cart-product-content-wp">
      <div class="product-title-wp">
        <div class="subtitle-wp">
          <a href="cart.html" class="back-arrow w-inline-block"><img src="images/Vector_6.svg" loading="lazy" alt="ecotactbags" class="image-35"></a>
          <div class="select-size opacity">Your Orders</div>
        </div>
      </div>
      <div class="grey-seperator"></div>
      <div class="row-item-wp">
        @foreach($orders as $order)
        @foreach($order->orderProducts as $op)
        <div class="row-item orders">
          <div class="item-img-and-details-wp"><img src="{{ @$op->stock->product->base_img ? asset('product_images/medium/'.$op->stock->product->base_img) :  asset('front-end/images/Mask-Group.png')}}" loading="lazy" height="130" alt="ecotactbags" class="image-36">
            <div class="about-item">
              <div class="product-details color">{{ @$op->stock->product->productDetails[0]['product_name'] }}</div>
              <div class="product-details-wp">
                <div class="small-text">{{-- <span class="text-span-3">ECOTACT 50</span>  --}} {{ @$op->stock->size}}</div>
                <div class="small-text"><span class="text-span-3">{{ @$order->status}}</span></div>
              </div>
              {{-- <a href="#" class="remove">Remove</a> --}}
            </div>
          </div>
          <div class="order-cta-wp">
            <div class="cta-cover">
              <a href="{{route('myOrderDetails',$op->id)}}" class="button accent dark-text w-button">Order Details</a>
            </div>
            {{-- <div class="cta-cover top-margin">
              <a href="product-details.html" class="button black w-button">Request cancelletion</a>
            </div> --}}
          </div>
        </div>
        @endforeach
        @endforeach
      </div>
    </div>
  </div>
</div>

@stop