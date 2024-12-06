@extends('layouts.front-layout')
@section('content')
@include('hamburger-dropdown')
@section('title','Order Summery')

    <div class="section cart wf-section">
        <div class="main-wrapper">
            <div class="cart-content-wp">
                <div class="caption-wp">
                <div class="title-caption center">{{ __('cart.YOUR CART')}}</div>
                </div>
                <h2 class="h2 center white">{{ __('cart.Refresh, Multiply')}}</h2>
            </div>
        </div>
    </div>
    <div class="section wf-section">
        <div class="main-wrapper">
            <div class="cart-product-wp">
                <div class="cart-product-content-wp">
                    <div class="product-title-wp">
                        <div class="subtitle-wp">
                            <a href="{{ route('addressConfirm') }}" class="back-arrow w-inline-block"><img src="{{ asset('front-end/images/left-arrow.svg') }}" loading="lazy" alt="ecotactbags" class="image-35"></a>
                            <div class="select-size opacity">{{ __('cart.Delivery Address')}}</div>
                        </div>
                        <div class="select-size opacity"><a href="{{ route('addressConfirm') }}" class="back-arrow w-inline-block">{{ __('cart.Edit')}}</a></div>
                    </div>
                    <div class="grey-seperator"></div>
                    <div class="address-wp">
                        <div class="body-text">{{ $newAddress->name }}</div>
                        <div class="body-text">{{ $newAddress->email }}, {{ $newAddress->contact_no }}</div>
                        <div class="body-text">{{ $newAddress->house_no }} {{ $newAddress->apertment_no }} {{ $newAddress->area }}. {{ $newAddress->landmark }}, {{ $newAddress->country }}, {{ $newAddress->state }} {{ $newAddress->city }} {{ $newAddress->pin }}</div>
                    </div>
                     @if($newAddress->carrier_partner == 2 || $newAddress->carrier_partner == 3) <div style="text-align:center;">Shipping cost is extra and will be emailed after confirmation.</div> @endif
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
                        <div class="number color">{{ $totQty }}</div>
                        </div>
                        
						<div class="product-title-wp order-total">
							<div class="subtitle-wp">
								<div class="product-details color font">{{ __('cart.Cart Discount')}}</div>
							</div>
							<div class="total font-weight" id="disVaue">{{
                        config('app.lang')->currency}} {{number_format($totdiscountedTotal,2)}}</div>
						</div>
                        <div class="product-title-wp order-total">
                        <div class="subtitle-wp">
                            <div class="product-details color font">{{ __('cart.Order total')}}</div>
                        </div>
                        <div class="total font-weight">{{
                        config('app.lang')->currency}} {{ number_format($total,2)  }}</div>
                        </div>
                        @if($isCoupon)
                        <div class="product-title-wp order-total">
							<div class="subtitle-wp">
								<div class="product-details color font">{{ __('cart.Discount')}}</div>
							</div>
							<div class="total font-weight" id="disVaue">{{$disValue}} {{$disType}}</div>
						</div>
						@endif
						
					    @if(session()->get('shipping-charge'))
                        <div class="product-title-wp order-total">
                            <div class="subtitle-wp">
                                <div class="product-details color font">{{ __('cart.Shipping Charges')}}</div>
                            </div>
                            <div class="total font-weight">@if(config('app.lang')->slug == 'in') ₹ @else $ @endif {{session()->get('shipping-charge')}}</div>
                        </div> 
                        @endif 
                        @if(config('app.lang')->slug != 'in')
                        
                            <div class="subtotal-wp">
                                <div class="subtotal">
                                    <div class="product-details color bold">{{ __('cart.Subtotal')}}</div>
                                    <div class="total-price font-size">{{
                            config('app.lang')->currency}} {{ $isCoupon ? (session()->get('shipping-charge') + round($discountedTotal,2)) : (session()->get('shipping-charge') + round($total,2)) }}</div>
                                </div>
                            </div>
                        @else
                            <?php
                                $ship = session()->get('shipping-charge');
                                $shipC = $ship+($ship*0.18);
                            ?>
                            <div class="subtotal-wp">
                                <div class="subtotal">
                                    <div class="product-details color bold">{{ __('cart.Subtotal')}}</div>
                                    <div class="total-price font-size">{{
                            config('app.lang')->currency}} {{ $isCoupon ? ($shipC + round($discountedTotal,2)) : ($shipC + round($total,2)) }}</div>
                                </div>
                            </div>
                        @endif
                        
                    </div>
                    <form action="{{route('createOrder')}}" method="post">
                        @csrf
                        <button type="submit" class="button accent dark-text w-button">{{ __('cart.Proceed to Payment')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{-- $isCoupon ? (session()->get('shipping-charge') + number_format($discountedTotal,2)) : --}}

@stop
