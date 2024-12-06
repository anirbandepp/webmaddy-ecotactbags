@extends('layouts.front-layout')
<style type="text/css">
.grid-itemset{
    grid-template-columns: 1fr 1fr 1fr !important;
    grid-column-gap: 0 !important;
    grid-row-gap: 0 !important;
}
    @media (max-width: 991px) {
        .grid-itemset{
            grid-template-columns: none !important;
            display: block !important;
        }
    }
</style>
@section('title', 'Ecotact recycle box in USA')
@section('description', 'Ecotact recycle box in association with Terracycle in USA help recycle used Ecotact bags for a sustainable future')
@section('keywords', 'Ecotact recycle box')
@section('content')

  @include('hamburger-dropdown')
  <div class="section sustainability">
    <div class="main-wrapper">
      <div class="banner-content-wrapper">
        <div class="title-caption-wrapper">
          <div class="title-caption center">{!! __('sustain.SUSTAINABILITY') !!}</div>
        </div>
        <div class="h2-wrapper">
          <h2 class="h2 center white">{!! __('sustain.sustainText') !!}</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="section _100-0" ng-app="myApp" ng-controller="myCtrl">
    <div class="main-wrapper">
      <div class="product-main-wrapper">
        <a href="#" class="product-image w-inline-block"><img src="{{asset('front-end/images/Frame-337.png')}}" loading="lazy" sizes="(max-width: 479px) 94vw, 333px" width="333" srcset="{{asset('front-end/images/Frame-337-p-500.png')}} 500w, {{asset('front-end/images/Frame-337.png')}} 700w" alt="Ecotact Recycle Box For Ecotact Bags Only" class="image-10"></a>
        <div class="product-content-wrapper">
            <div class="breadcrumbs-wrapper"><a href="{{ url()->previous() }}"><img src="{{asset('front-end/images/left-arrow.svg')}}" loading="lazy" width="20" alt="Left Arrow Icon" ></a>
            </div>
          <a href="#" class="product-heading-wrapper sustainability w-inline-block">
            <h2 class="product-heading">{{ @$product->productDetails[0]['product_name'] }}</h2>
          </a>
          <div class="body-text-wrapper">
            <div class="body-text">{!!@$product->productDetails[0]['short_desc']!!}</div>
          </div>
          <div class="grey-divider"></div>
          <div class="info-details-container">
            <div class="price-main-wrapper">
              <div class="sub-title-wrapper">
                <div class="sub-title">{{ __('sustain.price') }} :</div>
              </div>
              <div class="rates">
                <div class="rates-text" @if(config('app.lang')->slug == 'sp') style="margin-left:24px;" @endif>US $ 159 </div>
              </div>
            </div>
            <div class="size-main-wrapper">
              <div class="sub-title-wrapper">
                <div class="sub-title">{{ __('sustain.size') }} :</div>
              </div>
              <div class="text-block-5" >11 x 11 x 40 {{ __('sustain.inches') }}</div>
            </div>
            <div class="quantity-main-wrapper">
              <div class="sub-title-wrapper">
                <div class="sub-title">{{ __('sustain.quantity') }} :</div>
              </div>
              <div class="quantity-wrapper" ng-init="addedQty = {{$addedQty}}" @if(config('app.lang')->slug == 'sp') style="margin-left:57px;" @endif>
                <div class="symbol" style="cursor:pointer;" ng-click ="abc('{{ $product->stock->offer_price }}', 'minus')"><strong class="bold-text-2">-</strong></div>
                <div class="value"><strong>@{{ addedQty }}</strong></div>
                <div class="symbol" style="cursor:pointer;" ng-click ="abc('{{ $product->stock->offer_price }}', 'plus')"><strong class="bold-text" >+</strong></div>
                
              </div>
            </div>
            <div class="total-main-wrapper">
              <div class="sub-title-wrapper">
                <div class="sub-title">Total :</div>
              </div>
              <div class="total-text-wrapper" ng-init="totPrice = {{$product->stocks[0]['offer_price']}}">
                <div class="total" @if(config('app.lang')->slug == 'sp') style="margin-left:31px;" @endif> US {{$product->stocks[0]['currency']}} @{{totPrice}}</div>
              </div>
            </div>
          </div>
          <div class="products-button-wrapper" style="margin-bottom:15px;">
            <div class="button-wrapper">
                <form action="{{route('orderNorthNow')}}" method="get">
                    <button type="submit" class="button accent w-button">{{ __('sustain.order') }}</button>
                    <input type="hidden" id="quantity" name="quantity" class="form-control input-number" value="@{{ addedQty }}" >
                </form>
            </div>
          </div>
          <div class="small-text-wrapper" style="margin-top:0;">
            <div class="small-text">{!! __('sustain.Each') !!}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section _0-100">
    <div class="main-wrapper">
      <div class="next-steps">
        <div class="h2-wrapper">
          <h2 class="h2 green">{{__('sustain.next')}}</h2>
        </div>
        <div class="step-main-wrapper">
            <!--<img src="{{asset('front-end/images/ecotact-icon-2-01.png')}}">-->
            <div class="stats-content grid-itemset">
                @if(config('app.lang')->slug == 'sp')
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-span-icon-2-01-1.png')}}"></div>
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-span-icon-2-01-2.png')}}"></div>
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-span-icon-2-01-3.png')}}"></div>
                @else
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-icon-2-01-1.png')}}" alt="Order Ecotact recycle box from our website"></div>
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-icon-2-01-2.png')}}" alt="Fill up the box with used clean Ecotact Bags"></div>
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-icon-2-01-3.png')}}"  alt="Send it back using the pre-affixed shipping lable "></div>
                @endif
            </div>
          <!--<div class="steps-wrapper">-->
              
          <!--  <div class="next-step-content">-->
          <!--    <div class="yellow-bg"><img src="{{asset('front-end/images/box1.svg')}}" loading="lazy" alt=""></div>-->
          <!--    <div class="line"></div>-->
          <!--    <div class="grey-circle">-->
          <!--      <div class="number">01</div>-->
          <!--    </div>-->
          <!--    <div class="next-step-wrapper">-->
          <!--      <div class="next-step-text">Order Ecotact Recycle box from our website</div>-->
          <!--    </div>-->
          <!--  </div><img src="{{asset('front-end/images/dot-line.svg')}}" loading="lazy" id="w-node-_0cd4ca62-9b31-83ec-1741-402620fe04db-20fe04cb" alt="" class="image-13">-->
          <!--  <div class="next-step-content">-->
          <!--    <div class="yellow-bg"><img src="{{asset('front-end/images/box2.svg')}}" loading="lazy" alt=""></div>-->
          <!--    <div class="line"></div>-->
          <!--    <div class="grey-circle">-->
          <!--      <div class="number">02</div>-->
          <!--    </div>-->
          <!--    <div class="next-step-wrapper">-->
          <!--      <div class="next-step-text">Fill up the box with clean Ecotact bags</div>-->
          <!--    </div>-->
          <!--  </div><img src="{{asset('front-end/images/dot-line.svg')}}" loading="lazy" width="298" alt="" class="image-13">-->
          <!--  <div class="next-step-content">-->
          <!--    <div class="yellow-bg"><img src="{{asset('front-end/images/box3.svg')}}" loading="lazy" alt=""></div>-->
          <!--    <div class="line"></div>-->
          <!--    <div class="grey-circle">-->
          <!--      <div class="number">03</div>-->
          <!--    </div>-->
          <!--    <div class="next-step-wrapper">-->
          <!--      <div class="next-step-text">Send it back using the pre-affixed shipping label</div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
        </div>
      </div>
    </div>
  </div>
@stop