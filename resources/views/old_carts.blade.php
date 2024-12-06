@extends('layouts.front-layout')
@section('content')
@include('hamburger-dropdown')
@section('title','My Cart | Ecotact')
<style>
    .disabled {
      pointer-events: none;
    }
    .wrapper {
        cursor: not-allowed;
    }
    .kju{
        border:none; 
        width:90px;
        text-align: center;
        
    }
    .kju:focus{outline:none;}
</style>
<div class="section cart wf-section">
	<div class="main-wrapper">
		<div class="cart-content-wp">
			<div class="caption-wp">
				<h1 class="title-caption center">{{ __('cart.YOUR CART')}}</h1>
			</div>
			<h1 class="h2 center white">{{ __('cart.Refresh, Multiply')}}</h1>
		</div>
	</div>
</div>
<div class="section wf-section" ng-app="myApp" ng-controller="myCtrl">
	<div class="main-wrapper">
	    @if(count($stocks))
		    <div class="cart-product-wp">
			<div class="cart-product-content-wp">
				<div class="product-title-wp">
					<div class="subtitle-wp">
						<a href="#" class="back-arrow w-inline-block"><img src="images/Vector_6.svg" loading="lazy" alt="ecotactbags" class="image-35"></a>
						<div class="select-size opacity">{{ __('cart.Product Name')}}</div>
					</div>
					<div class="select-size opacity">{{ __('cart.Price')}}</div>
				</div>
				<div class="grey-seperator"></div>
				<div class="row-item-wp" style="position: relative; right: -20px;">
					@forelse($stocks as $stock)
					<div class="row-item"><img src="{{ $stock->product->base_img ? asset('product_images/medium/'.$stock->product->base_img) :  asset('front-end/images/Mask-Group.png')}}" loading="lazy" height="130" alt="ecotactbags" class="image-36">
						<div class="about-item">
							<div class="product-details color">{{ @$stock->product->productDetails[0]['product_name'] }} </div>
							<div class="product-details-wp">
								<div class="small-text"><span class="text-span-3">{{$stock->size_tag}}</span> {{ @$stock->size}}</div>
								<div class="small-text"><span class="text-span-3">{{ __('cart.Box Of (Pieces)')}} : </span>{{ @$stock->pieces}}</div>
							</div>
							<a href="{{ route('removeFromCart',$stock->sku) }}" class="remove">{{ __('cart.Remove')}}</a>
						</div>
						<div class="item-price">
							<div class="qty-wp" style="display: inline-block; text-align: right;">
								<div class="small-text" ><span class="total" style="margin-left:4px;">{{config('app.lang')->currency}} {{ round(@$stock->regular_price,2)}}</span>{{ __('cart./bag')}}</div>
							</div>
							
							<div class="qty-wp">
								<div class="small-wp">
									<div class="small-text">{{ __('cart.Qty')}}</div>
								</div>
								<div class="ince-decr-wp" ng-init="t{{ $stock->sku }} = {{$cartDetails[$stock->sku]['qty'] ? $cartDetails[$stock->sku]['qty'] : 1}}">
								    <!--<input type="text" class="kju" >-->
								    <input type="text" class="kju" ng-model="t{{ $stock->sku }}" ng-change="cartPageQtyChange('{{ $stock->sku }}','{{ route('addToCart') }}','{{ $stock->product->id }}','{{$stock->max_allowed_qty}}')" id="qtyItem{{ $stock->sku}}">
								    
								</div>
								<!--<div class="ince-decr-wp">-->
								<!--	<a class="incr-decr" ng-click ="decreaseQty('{{ $stock->sku }}','{{ route('addToCart') }}','{{ $stock->product->id }}')" style="cursor: pointer;">-</a>-->
								<!--	<div class="number-item" id="qtyItem{{ $stock->sku}}">-->
								<!--		{{-- <input type="text" style="display:none;" name="quantityyy{{ $stock->sku }}" value="{{ $cartDetails[$stock->sku]['qty'] ? $cartDetails[$stock->sku]['qty'] : 1 }}"> --}}-->
								<!--		{{ $cartDetails[$stock->sku]['qty'] ? $cartDetails[$stock->sku]['qty'] : 1 }}</div>-->
								<!--		<a class="incr-decr" ng-click ="increaseQty('{{ $stock->sku }}','{{ route('addToCart') }}','{{ $stock->product->id }}')" style="cursor: pointer;">+</a>-->
								<!--</div>-->
								</div>
							</div>
						</div>
						@empty
						@endforelse
					</div>
				    {{--<div style="text-align:center;">Shipping cost is extra and will be emailed after confirmation.</div>--}}	
				</div>
				
				
				<div class="order-summary-wp">
					<div class="order-summary">
						<div class="product-title-wp">
							<div class="subtitle-wp">
								<div class="select-size opacity">{{ __('cart.Order Summary')}}</div>
							</div>
						</div>
						<div class="grey-seperator"></div>
						<div class="product-title-wp">
							<div class="subtitle-wp">
								<div class="product-details color font">{{ __('cart.Total Items')}}</div>
							</div>
							<div class="number color" id="totQty">{{ $totQty }}</div>
						</div>
						
						<div class="product-title-wp" style="margin-top: 30px;">
							<div class="subtitle-wp">
								<div class="product-details color font">{{ __('cart.Cart Discount')}}</div>
							</div>
							<div class="number color" id="totdiscountedTotal">{{config('app.lang')->currency}} {{ number_format($totdiscountedTotal,2) }}</div>
						</div>
						
						<div class="product-title-wp order-total">
							<div class="subtitle-wp">
								<div class="product-details color font">{{ __('cart.Order total')}}</div>
							</div>
							<div class="total font-weight" id="total">{{config('app.lang')->currency}} {{ number_format($total,2)  }}</div>
						</div>
						<div class="product-title-wp order-total" ng-if="couponDiscount">
							<div class="subtitle-wp">
								<div class="product-details color font">{{ __('cart.Discount')}}</div>
							</div>
							<div class="total font-weight" id="disVaue">@{{couponValue}} </div>
						</div>
				
						@if($token)
						<div class="product-title-wp order-total" style="align-items: center;" @if($isCoupon) ng-init="applyCoupon('{{ route('discountCoupon') }}','{{$token->code}}')" @endif>
							<div class="subtitle-wp" style="align-items: center;">
								
                                <div class="product-details color font" style="
                                    background-color: #ccc;
                                    padding: 10px 20px;
                                    border-radius: 4px;
                                    font-size: 14px;
                                ">{{ __('cart.Coupon')}}: {{$token->code}}</div>
							</div>
							
                            <div class="total font-weight" id="total" ng-if="!couponDiscount">
                                <a class="remove" style="
                                color: #0c6a35;cursor:pointer;" ng-click ="applyCoupon('{{ route('discountCoupon') }}','{{$token->code}}')">{{ __('cart.Apply Now')}}</a>
                            </div>
                            <div ng-if="couponDiscount" class="total font-weight" id="total">
                                <a style="cursor:pointer;" ng-click ="removeCoupon('{{ route('removeDiscount') }}')" class="remove">{{ __('cart.Remove')}}</a>
                            </div>
						</div>
						@endif
						<div class="subtotal-wp">
							<div class="subtotal">
								<div class="product-details color bold">{{ __('cart.Subtotal')}}</div>
								<div class="total-price font-size" id="subTotal">{{ @config('app.lang')->currency}} {{ $isCoupon ? round($discountedTotal,2) : round($total,2) }}</div>
							</div>
						</div>
					</div>
					<div class="order-summary" style="padding: 0px;">
			        <div class="product-title-wp order-total" ng-init="capche1 = {{rand(1,10)}}; capche2 = {{rand(1,10)}};">
						<div class="subtitle-wp" style="padding: 15px 5px;">
							<div class="color bold">@{{capche1}} + @{{capche2}}</div>
						</div>
						<input type="text" ng-model="capche3" placeholder="Enter Value" class="text-field" style="padding: 5px;">
					</div>
					</div>
					@auth
					    <div class="wrapper">
					        <a href="{{ route('addressConfirm') }}" class="button accent dark-text w-button" ng-class="{disabled: capche1*1 + capche2*1 != capche3}">{{ __('cart.Proceed to checkout')}}</a>
					   </div>
					@else
					    <a onclick="$('#signup').css('display','block')" class="button accent dark-text w-button">{{ __('cart.Proceed to checkout')}}</a>
					@endif
				</div>
			</div>
		@else
			<div class="message-wp">
				<div class="msg-leaf"><img src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="133" alt="Empty Cart Icon" class="image-29"></div>
				<div class="main-msg-text-wrapper">
					<div class="msg-text ty">{{ __('cart.Empty Cart')}}</div>
				</div>
				<a href="{{ route('home') }}" class="button accent w-button">{{ __('cart.Continue Shopping')}}</a>
			</div>
		@endif
	</div>
</div>
	@stop
	
	
	
				
				
				