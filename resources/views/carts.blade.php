@extends('layouts.new_frontlayout')

  @section('title', 'My Cart | Ecotact')
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

<section class="section cart-body pb0" ng-app="myApp" ng-controller="myCtrl">
  <div class="container">
    @if(count($stocks))
    <div class="row">
      <div class="col-md-9 mb30">
        <div class="left-cart">
            <div class="cart-header">
                <span>{{ __('cart.Product Name')}}</span>
                <span>{{ __('cart.Price')}}</span>
            </div>
            
            @forelse($stocks as $stock)
                <div class="cart-box">
                    <div class="cart-image">
                    <a href="#"><img src="{{ $stock->product->base_img ? asset('product_images/medium/'.$stock->product->base_img) :  asset('front-end/images/Mask-Group.png')}}" alt="" class="img-responsive"></a>
                    </div>
                    <div class="cart-details">
                    <h3>{{ @$stock->product->productDetails[0]['product_name'] }}</h3>
                    <p><span>{{$stock->size_tag}}</span> {{ @$stock->size}}</p>
                    <p><span>{{ __('cart.Box Of (Pieces)')}} :   </span> {{ @$stock->pieces}}</p>
                    <a href="{{ route('removeFromCart',$stock->sku) }}" class="remove-btn">{{ __('cart.Remove')}}</a>
                    </div>
                    <div class="price-area">
                    <p><span>{{config('app.lang')->currency}} {{ round(@$stock->regular_price,2)}} </span>{{ __('cart./bag')}} </p>
                    <div class="qty-area" ng-init="t{{ $stock->sku }} = {{$cartDetails[$stock->sku]['qty'] ? $cartDetails[$stock->sku]['qty'] : 1}}">
                        <label>{{ __('cart.Qty')}}</label>
                        <input type="text" class="form-control kju" ng-model="t{{ $stock->sku }}" ng-change="cartPageQtyChange('{{ $stock->sku }}','{{ route('addToCart') }}','{{ $stock->product->id }}','{{$stock->max_allowed_qty}}')" id="qtyItem{{ $stock->sku}}">
                    </div>
                    </div>
                </div>
                @php 
                    if(config('app.lang')->slug == 'in'){ 
                        $cu = 'INR';
                    } else{ 
                        $cu =  'USD'; 
                    }
                    $items = [];
                    $item = [
                        'item_id'=> $stock->id,
                        'item_name'=> $stock->product->productDetails[0]['product_name'],
                        'affiliation'=> "Ecotact Bags",
                        'currency'=> $cu,
                        'discount'=> 0,
                        'index'=> 0,
                        'item_brand'=> "Ecotact",
                        'item_category'=> "",
                        'item_list_id'=> "",
                        'item_list_name'=> "",
                        'item_variant'=> "",
                        'location_id'=> "",
                        'price'=> round(@$stock->regular_price,2),
                        'quantity'=> 2
                    ];
                    array_push($items,$item);
                @endphp
            @empty
            @endforelse
            
        </div>
      </div>
      <div class="col-md-3">
        <div class="right-cart">
          <div class="cart-header">
            <span>{{ __('cart.Order Summary')}}</span>
          </div>
          <div class="right-price">
            <p>{{ __('cart.Total Items')}} <span class="text-right">{{ $totQty }}</span></p>
            <p>{{ __('cart.Cart Discount')}} <span class="text-right">{{config('app.lang')->currency}} {{ number_format($totdiscountedTotal,2) }}</span></p>
            <p ng-if="couponDiscount">{{ __('cart.Discount')}} <span class="text-right green-text">@{{couponValue}}</span></p>
            <p>{{ __('cart.Order total')}} <span class="text-right green-text" id="total">{{config('app.lang')->currency}} {{ number_format($total,2)  }}</span></p>
            @if($token)
            <p  @if($isCoupon) ng-init="applyCoupon('{{ route('discountCoupon') }}','{{$token->code}}')" @endif><span style="float: left;background-color: #e8e4e4;padding: 5px 20px;border: 1px dotted #b7b5b5;border-radius: 5px;
            ">{{ __('cart.Coupon')}}: {{$token->code}}</span> <span class="text-right green-text" id="total" ng-if="!couponDiscount"><a ng-click ="applyCoupon('{{ route('discountCoupon') }}','{{$token->code}}')" class="remove-btn" style="color: #0c6a35;font-size: 16px;font-weight: 500;
            ">{{ __('cart.Apply Now')}}</a></span> <span class="text-right green-text" id="total" ng-if="couponDiscount"><a ng-click ="removeCoupon('{{ route('removeDiscount') }}')" class="remove-btn" style="color: #0c6a35;font-size: 16px;font-weight: 500;
            ">{{ __('cart.Remove')}}</a></span></p>
            @endif
          </div>
          <div class="right-price sub-total">
            <p>{{ __('cart.Subtotal')}}<span class="text-right green-text" id="subTotal">{{ @config('app.lang')->currency}} {{ $isCoupon ? round($discountedTotal,2) : round($total,2) }}</span></p>
          </div>
        </div>
        <div class="cart-capta" ng-init="capche1 = {{rand(1,10)}}; capche2 = {{rand(1,10)}};">
          <span>@{{capche1}} + @{{capche2}}</span>
          <input type="text" ng-model="capche3" placeholder="Enter Value" class="from-control">
        </div>
        @auth
        <a href="{{ route('addressConfirm') }}" ng-class="{disabled: capche1*1 + capche2*1 != capche3}" class="btn btn-primary check-out-btn">{{ __('cart.Proceed to checkout')}}</a>
        @else
        <a href="javascript:void(0)" data-toggle="modal" data-target="#signup" class="btn btn-primary check-out-btn">{{ __('cart.Proceed to checkout')}}</a>
        @endif
      </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-12">
          <div class="message-wp text-center">
            <div class="msg-leaf">
              <img src="{{asset('assets/front/img/location.png')}}" style="max-width:200px;" class="image-29">
            </div>
            <div class="main-msg-text-wrapper">
              <h2>{{ __('cart.Empty Cart')}}</h2>
                  <div class="col-md-6 col-md-offset-3">
                    <a href="{{ route('home') }}" class="btn btn-primary check-out-btn">{{ __('cart.Continue Shopping')}}</a>
                  </div>
            </div>
          </div>
        </div>
    </div>
    @endif
  </div>
</section>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    @if(@$items)
<script>
    $( document ).ready(function() {
        setTimeout(datalayer, 5000);
        function datalayer(){
            var ite = '{{json_encode($items)}}';
            dataLayer.push({ ecommerce: null }); 
            dataLayer.push({
              event: "add_to_cart",
              ecommerce: {
                items: JSON.parse(ite.replace(/&quot;/g,'"'))
              }
            });
        }
    });

</script>
@endif

@stop