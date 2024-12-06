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
          <div class="title-caption center">Order Details</div>
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
            <a href="your-orders.html" class="back-arrow w-inline-block"><img src="images/Vector_6.svg" loading="lazy" alt="ecotactbags" class="image-35"></a>
            <div class="select-size opacity">Your Order Details</div>
          </div>
        </div>
        <div class="grey-seperator"></div>
      </div>
      <div class="product-main-wrapper">
        <a href="#" class="product-image w-inline-block">
            
            <img src="{{ @$order->stock->product->base_img ? asset('product_images/medium/'.$order->stock->product->base_img) :  asset('front-end/images/Mask-Group.png')}}" loading="lazy" sizes="(max-width: 479px) 94vw, (max-width: 991px) 333px, (max-width: 1279px) 33vw, 333px" width="333" srcset="{{ $order->stock->product->base_img ? asset('product_images/medium/'.$order->stock->product->base_img) :  asset('front-end/images/Mask-Group-p-500.png')}} 500w, {{ $order->stock->product->base_img ? asset('product_images/medium/'.$order->stock->product->base_img) :  asset('front-end/images/Mask-Group.png')}} 666w" alt="ecotactbags" class="image-10">
            
        </a>
        <div class="product-content-wrapper manual">
          <a href="#" class="product-heading-wrapper w-inline-block">
            <h2 class="product-heading">{{ @$order->stock->product->productDetails[0]['product_name'] }}</h2>
          </a>
          <div class="size-wrapper">
            <div class="select-size">Selected Size</div>
          </div>
          <div class="div-block-35">
            <div class="drop-down-text"><span class="text-span">{{ @$order->stock->size_tag}} </span><br>{{ @$order->stock->size}}</div>
          </div>
          <div class="size-wrapper">
            <div class="select-size">Selected Quantity of Pieces<span class="text-span bold"> </span></div>
          </div>
          <div class="div-block-35 small">
            <div class="drop-down-text"><span class="text-span bold">{{ @$order->stock->pieces}}</span></div>
          </div>
          <div class="info-details-container top-margin">
            <div class="price-main-wrapper">
              <div class="sub-title-wrapper">
                <div class="sub-title">Price Per Unit :</div>
              </div>
              <div class="rates product">
                <div class="rates-text">{{$order->stock->currency}} {{ @$order->stock->regular_price}}</div>
              </div>
            </div>
            <div class="quantity-main-wrapper product">
              <div class="quantity-box-wp">
                <div class="sub-title-wrapper">
                  <div class="sub-title">Quantity Box :</div>
                </div>
                <div class="quantity-wrapper">
                  <div class="value"><strong>{{ @$order->qty}}</strong></div>
                </div>
              </div>
              <div class="quantity-box-wp">
                <div class="sub-title-wrapper">
                  <div class="sub-title">Weight :</div>
                </div>
                <div class="quantity-wrapper">
                  <div class="value light">{{@$order->stock->weight*$order->qty}} KG</div>
                </div>
              </div>
            </div>
            <div class="total-main-wrapper">
              <div class="sub-title-wrapper">
                <div class="sub-title">Total Amount :</div>
              </div>
              <div class="total-text-wrapper">
                <div class="total">{{$order->stock->currency}} {{ @$order->price*$order->stock->pieces*$order->qty }}</div>
              </div>
            </div>
          </div>
          <!--<div class="size-wrapper">-->
          <!--  <div class="select-size">delivery status : <strong>Sunday, Aug 1</strong></div>-->
          <!--</div>-->
          <!--<div class="cta-cover top-margin left">-->
          <!--  <a href="product-details.html" class="button accent w-button">Request cancelletion</a>-->
          <!--</div>-->
        </div>
      </div>
    </div>
  </div>
  
  
@stop