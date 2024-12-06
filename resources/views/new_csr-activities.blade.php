@extends('layouts.new_frontlayout')

  @if(config('app.lang')->slug == 'en' || config('app.lang')->slug == 'in')
    @section('title', 'Initiatives | WCAI  | Apna Ghar Ashram | Ecotact')
    @section('description', 'As a Hermetic packaging supplier, we also prioritize sustainability by associating with initiatives such as Women’s Coffee Alliance India (WCAI) and Apna Ghar Ashram.')
    @section('keywords', 'Initiatives of Ecotact, WCAI, Apna Ghar Ashram')
  @elseif(config('app.lang')->slug == 'sp')
    @section('title', 'Initiatives | WCAI  | Apna Ghar Ashram | Ecotact')
    @section('description', 'As a Hermetic packaging supplier, we also prioritize sustainability by associating with initiatives such as Women’s Coffee Alliance India (WCAI) and Apna Ghar Ashram.')
    @section('keywords', 'Initiatives of Ecotact, WCAI, Apna Ghar Ashram')
  @endif



@section('content')
<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/activities.jpg')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">{!! __('activities.CSR ACTIVITIES') !!}</span>
        <h1>{!! __('activities.good') !!}</h1>
      </div>
    </div>
  </div>
</div>

<section class="section about-section pb0">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 mb50">
        <div class="row">
          <div class="col-md-12 text-center mb15">
            <div class="about-text story-text mb30">
              <h2 class="mb30">{!! __('activities.h2') !!}</h2>
              <p>{!! __('activities.acText2') !!}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="about-text mb50 pt0">
          <a href="#"><h2 class="mb30">{!! __('activities.women') !!}</h2></a>
          <p>{!! __('activities.womentxt') !!}</p>
        </div>
      </div>
      <div class="col-md-5 col-md-offset-1 mb50">
        <div class="about-image">
          <img src="{{asset('assets/front/img/about4.png')}}" class="img-responsive" alt="ecotactbags">
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="gap-70"></div>
      <div class="col-md-5 mb50">
        <div class="about-image">
          <img src="{{asset('assets/front/img/about5.png')}}" class="img-responsive" alt="ecotactbags">
        </div>
      </div>
      <div class="col-md-6 col-md-offset-1">
        <div class="about-text mb50 pt0">
          <a href="#"><h2 class="mb30">{!! __('activities.ghar') !!}</h2></a>
          <p>{!! __('activities.gharText') !!}</p>
        </div>
      </div>
    </div>
  </div>
</section>
@stop