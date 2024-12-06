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
@section('title', 'Terracycle Zero Waste Box for Australia | Ecotact')
@section('description', 'Terracycle Zero Waste Box to recycle Ecotact bags in Australia with TerraCycle')
@section('keywords', 'Terracycle Zero Waste Box')
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
  <div class="section _100-0">
    <div class="main-wrapper">
      <div class="product-main-wrapper sustainability">
        <a href="#" class="product-image w-inline-block"><img loading="lazy" width="346" sizes="(max-width: 479px) 94vw, 346px" src="{{asset('front-end/images/Frame-337-1-p-500.png')}}" srcset="{{asset('front-end/images/Frame-337-1-p-500.png')}} 500w, {{asset('front-end/images/Frame-337-1-p-500.png')}} 699w" alt="ecotact" class="image-10"></a>
        <div class="product-content-wrapper">
            <div class="breadcrumbs-wrapper"><a href="{{ url()->previous() }}"><img src="{{asset('front-end/images/left-arrow.svg')}}" loading="lazy" width="20" alt="ecotact" ></a>
            </div>
          <a href="#" class="product-heading-wrapper w-inline-block">
            <h2 class="product-heading sustainability">{{ __('australia.terra') }}</h2>
          </a>
          <div class="body-text-wrapper">
            <div class="body-text">{!! __('australia.details') !!}</div>
          </div>
          <div class="button-wrapper">
            <a href="https://zerowasteboxes.terracycle.com.au/products/coffee-bags-zero-waste-box?_pos=1&_sid=781f1a381&_ss=r" target="_blank" class="button accent w-button">{{ __('australia.order') }}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section _0-100">
    <div class="main-wrapper">
      <div class="next-steps">
        <div class="h2-wrapper">
          <h2 class="h2 green">{{ __('australia.next') }}</h2>
        </div>
        <div class="step-main-wrapper">
            <!--<img src="{{asset('front-end/images/ecotact-icon-2-02.png')}}">-->
            <div class="stats-content grid-itemset">
                <!--<div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-icon-2-02-1.png')}}"></div>-->
                <!--<div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-icon-2-02-2.png')}}"></div>-->
                <!--<div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-icon-2-02-3.png')}}"></div>-->
                @if(config('app.lang')->slug == 'sp')
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-span-icon-2-02-1.png')}}"></div>
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-span-icon-2-02-2.png')}}"></div>
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-span-icon-2-02-3.png')}}"></div>
                @else
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-icon-2-02-1.png')}}" alt="Order Terra Cycle Zero Waste Box From The Terra Cycle Website"></div>
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-icon-2-02-2.png')}}" alt="Fill up the box with used clean Ecotact Bags"></div>
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-icon-2-02-3.png')}}" alt="Send it back to Terra Cycle using the pre-affixed shipping lable "></div>
                @endif
            </div>
            
            
                
          <!--<div class="steps-wrapper">-->
              
          <!--  <div class="next-step-content">-->
          <!--    <div class="yellow-bg"><img src="{{asset('front-end/images/box1.svg')}}" loading="lazy" alt="ecotact"></div>-->
          <!--    <div class="line"></div>-->
          <!--    <div class="grey-circle">-->
          <!--      <div class="number">01</div>-->
          <!--    </div>-->
          <!--    <div class="next-step-wrapper">-->
          <!--      <div class="next-step-text">Order Ecotact Recycle box from our website</div>-->
          <!--    </div>-->
          <!--  </div><img src="{{asset('front-end/images/dot-line.svg')}}" loading="lazy" id="w-node-_0cd4ca62-9b31-83ec-1741-402620fe04db-20fe04cb" alt="ecotact" class="image-13">-->
          <!--  <div class="next-step-content">-->
          <!--    <div class="yellow-bg"><img src="{{asset('front-end/images/box2.svg')}}" loading="lazy" alt="ecotact"></div>-->
          <!--    <div class="line"></div>-->
          <!--    <div class="grey-circle">-->
          <!--      <div class="number">02</div>-->
          <!--    </div>-->
          <!--    <div class="next-step-wrapper">-->
          <!--      <div class="next-step-text">Fill up the box with clean Ecotact bags</div>-->
          <!--    </div>-->
          <!--  </div><img src="{{asset('front-end/images/dot-line.svg')}}" loading="lazy" width="298" alt="ecotact" class="image-13">-->
          <!--  <div class="next-step-content">-->
          <!--    <div class="yellow-bg"><img src="{{asset('front-end/images/box3.svg')}}" loading="lazy" alt="ecotact"></div>-->
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