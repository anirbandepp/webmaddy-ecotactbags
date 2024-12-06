@extends('layouts.new_frontlayout')

  @section('title', 'My Orders | Ecotact')
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
        <span class="white-color">{!!__('cart.YOUR ORDERS')!!}</span>
        <h1>{{ __('cart.Refresh, Multiply')}}</h1>
      </div>
    </div>
  </div>
</div>

<section class="section cart-body pb0" >
  <div class="container">
    @if(count($orders))
    <div class="row">
      <div class="col-md-11 mb30">
        <div class="left-cart">
            <div class="cart-header">
                <span>{!!__('cart.Your Order')!!}</span>
            </div>
            
            @foreach($orders as $order)
            @foreach($order->orderProducts as $op)
                <div class="cart-box">
                    <div class="cart-image">
                    <a href="#"><img src="{{ @$op->stock->product->base_img ? asset('product_images/medium/'.$op->stock->product->base_img) :  asset('front-end/images/Mask-Group.png')}}" style="max-width: 120px;" alt="ecotactbags" class="img-responsive" ></a>
                    </div>
                    <div class="cart-details">
                    <h3>{{ @$op->stock->product->productDetails[0]['product_name'] }}</h3>
                    <p>{{ @$op->stock->size}}</p>
                    <p><span>{{ @$order->status }}</span></p>
                    </div>
                    <div class="price-area">
                    
                         <a href="{{route('myOrderDetails',$op->id)}}" class="btn btn-primary check-out-btn">{!!__('cart.Order Details')!!}</a>
                    </div>
                </div>
            @endforeach
            @endforeach
            
        </div>
      </div>
    </div>
    @else
    @endif
  </div>
</section>




@stop