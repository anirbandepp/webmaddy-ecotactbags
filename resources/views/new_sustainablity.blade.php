@extends('layouts.new_frontlayout')

    @if(config('app.lang')->slug == 'en' || config('app.lang')->slug == 'in')
        @section('title', 'Coffee Cocoa Sustainability Packaging | Empaques Biodegradables Bags')
        @section('description', 'Ecotact enables sustainability with eco-friendly & sustainable cocoa &
coffee packaging. Buy coffee bags & empaques biodegradables para
cafe for effective waste management.')
        @section('keywords', 'sustainable coffee packaging,cocoa sustainability,biodegradable coffee bags,eco friendly coffee bags,empaques biodegradables para cafe')
    @elseif(config('app.lang')->slug == 'sp')
        @section('title', 'Coffee Cocoa Sustainability Packaging | Empaques Biodegradables Bags')
         @section('description', 'Ecotact enables sustainability with eco-friendly & sustainable cocoa &
coffee packaging. Buy coffee bags & empaques biodegradables para
cafe for effective waste management..')
        @section('keywords', 'sustainable coffee packaging,cocoa sustainability,biodegradable coffee bags,eco friendly coffee bags,empaques biodegradables para cafe')
    @else
        @section('title', 'Coffee Cocoa Sustainability Packaging | Empaques Biodegradables Bags')
         @section('description', 'Ecotact enables sustainability with eco-friendly & sustainable cocoa &
coffee packaging. Buy coffee bags & empaques biodegradables para
cafe for effective waste management.')
        @section('keywords', 'sustainable coffee packaging,cocoa sustainability,biodegradable coffee bags,eco friendly coffee bags,empaques biodegradables para cafe')
    @endif
  
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

<section class="section about-section pb0">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="row">
          <div class="col-md-12 text-center mb50">
            <div class="about-text story-text">
              <h1 class="mb30" style="font-size: 40px;">{!! __('sustain.h2') !!}</h1>
              <p class="mb30">{!! __('sustain.sustainText2') !!}</p>
              <img src="{{asset('assets/front/img/goals.png')}}" alt="ecotactbags" class="img-responsive goals-logo">
            </div>
          </div>
          <div class="col-md-10 col-md-offset-1">
            <div class="row">
              <div class="col-md-6 mb30">
                <div class="country-box" style="background:#fff url({{asset('assets/front/img/north-am.png')}});">
                  <h2>{!! __('sustain.north') !!}</h2>
                  <a href="{{route('northAmericaFullView','ecotact-recycle-box')}}" class="btn btn-primary">{!! __('sustain.recycle') !!}</a>
                </div>
              </div>
              <div class="col-md-6 mb30">
                <div class="country-box" style="background:#fff url({{asset('assets/front/img/australia.png')}});">
                  <h2>{!! __('sustain.aus') !!}</h2>
                  <a href="{{route('australia')}}" class="btn btn-primary">{!! __('sustain.recycle') !!}</a>
                </div>
              </div>
              <div class="col-md-6 mb30">
                <div class="country-box" style="background:#fff url({{asset('assets/front/img/asai.png')}});">
                  <h2>{!! __('sustain.aisa') !!}</h2>
                  <a href="{{ route('coming_soon')}}" class="btn btn-primary">{!! __('sustain.recycle') !!}</a>
                </div>
              </div>
              <div class="col-md-6 mb30">
                <div class="country-box" style="background:#fff url({{asset('assets/front/img/europe.png')}});">
                  <h2>{!! __('sustain.europe') !!}</h2>
                  <a href="{{ route('coming_soon')}}" class="btn btn-primary">{!! __('sustain.recycle') !!}</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
    </div>
  </div>
</section>
@stop