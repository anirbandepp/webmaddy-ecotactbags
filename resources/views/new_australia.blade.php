@extends('layouts.new_frontlayout')
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

 <div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/Sustainablity.png')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">{!! __('sustain.SUSTAINABILITY') !!}</span>
        <h1>{!! __('sustain.sustainText') !!}</h1>
      </div>
    </div>
  </div>
</div>

<section class="section about-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="main-details-box">
          <div class="details-slider make_me_sticky">
            <img src="{{asset('assets/front/img/Frame-337-1-p-500.png')}}" alt="ecotactbags" class="img-responsive">
          </div>
          <div class="details-info">
            <a href="{{ url()->previous() }}" class="backstep mb30"><img src="{{asset('assets/front/img/left-arrow.svg')}}" alt="ecotactbags"></a>
            <h2 class="mb30">{{ __('australia.terra') }}</h2>
            <p class="mb30">{!! __('australia.details') !!}</p>
            <div class="details-form">
              <form>
                <div class="row">
                  <div class="col-md-12 mb30">
                    <a href="https://zerowasteboxes.terracycle.com.au/products/coffee-bags-zero-waste-box?_pos=1&_sid=781f1a381&_ss=r" class="btn btn-primary" target="_blank">{{ __('australia.order') }}</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section pt0 pb0">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center mb50">
        <h2>{{ __('australia.next') }}</h2>
      </div>
         @if(config('app.lang')->slug == 'sp')
        <div class="col-md-4 col-sm-6 mb30">
            <img src="{{asset('front-end/images/ecotact-span-icon-2-02-1.png')}}" alt="ecotactbags" class="img-responsive">
        </div>
        <div class="col-md-4 col-sm-6 mb30">
            <img src="{{asset('front-end/images/ecotact-span-icon-2-02-2.png')}}" alt="ecotactbags" class="img-responsive">
        </div>
        <div class="col-md-4 col-sm-6 mb30">
            <img src="{{asset('front-end/images/ecotact-span-icon-2-02-3.png')}}" alt="ecotactbags" class="img-responsive">
        </div>
        @else
        <div class="col-md-4 col-sm-6 mb30">
            <img src="{{asset('front-end/images/ecotact-icon-2-02-1.png')}}" alt="Order Terra Cycle Zero Waste Box From The Terra Cycle Website" class="img-responsive">
        </div>
        <div class="col-md-4 col-sm-6 mb30">
            <img src="{{asset('front-end/images/ecotact-icon-2-02-2.png')}}" alt="Fill up the box with used clean Ecotact Bags" class="img-responsive">
        </div>
        <div class="col-md-4 col-sm-6 mb30">
            <img src="{{asset('front-end/images/ecotact-icon-2-02-3.png')}}" alt="Send it back to Terra Cycle using the pre-affixed shipping lable " class="img-responsive">
        </div>
        @endif
    </div>
  </div>
</section>

@stop