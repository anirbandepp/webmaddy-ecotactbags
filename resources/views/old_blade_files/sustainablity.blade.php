@extends('layouts.front-layout')

    @if(config('app.lang')->slug == 'en' || config('app.lang')->slug == 'in')
        @section('title', 'Eco Friendly Green Coffee Packaging & Recyclable Bags | Empaques Biodegradables Para Cafe')
        @section('description', 'At Ecotact, we enable sustainable development and environment protection with empaques biodegradables para cafe and effective waste management.')
        @section('keywords', 'empaques biodegradables para cafe')
    @elseif(config('app.lang')->slug == 'sp')
        @section('title', 'Eco-friendly Coffee Bags and Recyclable Packaging | Ecotact')
         @section('description', 'At Ecotact, we enable sustainable development and environment protection with empaques biodegradables para cafe and effective waste management.')
        @section('keywords', 'empaques biodegradables para cafe')
    @else
        @section('title', 'Eco-friendly Coffee Bags and Recyclable Packaging | Ecotact')
         @section('description', 'At Ecotact, we enable sustainable development and environment protection with empaques biodegradables para cafe and effective waste management.')
        @section('keywords', 'empaques biodegradables para cafe')
    @endif
  
  @section('content')


  @include('hamburger-dropdown')
  <div class="section sustainability">
    <div class="main-wrapper">
      <div class="banner-content-wrapper">
        <div class="title-caption-wrapper">
          <div class="title-caption center">{!! __('sustain.SUSTAINABILITY') !!}</div>
        </div>
        <div class="h2-wrapper">
          <h1 class="h2 center white">{!! __('sustain.sustainText') !!}</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="main-wrapper">
      <div class="body-text-main-wrapper">
        <div class="body-text-wrapper">
            <h2 class="h3 center" style="text-align: center;">{!! __('sustain.h2') !!}</h2>
          <div class="body-text center">{!! __('sustain.sustainText2') !!}</div>
        </div>
      </div>
      <div class="goals-img"><img src="{{asset('front-end/images/UNSustainableDevelopmentGoals_Brand-01-1.png')}}" loading="lazy" width="734.5" sizes="(max-width: 479px) 94vw, (max-width: 991px) 95vw, 734.5px" srcset="{{asset('front-end/images/UNSustainableDevelopmentGoals_Brand-01-1-p-800.png')}} 800w, {{asset('front-end/images/UNSustainableDevelopmentGoals_Brand-01-1-p-1080.png')}} 1080w, {{asset('front-end/images/UNSustainableDevelopmentGoals_Brand-01-1.png')}} 1469w" alt="ecotact"></div>
      <div class="sustainability-grid-wrapper">
        <div class="w-layout-grid sustainability-grid">
          <div class="location-content-wrapper">
            <div class="location-content">
              <div class="location-heading-wrapper">
                <h3 class="location-heading">{!! __('sustain.north') !!}</h3>
              </div>
              <div class="button-wrapper">
                <a href="{{route('northAmericaFullView','ecotact-recycle-box')}}" class="button accent end-to-end w-button">{!! __('sustain.recycle') !!}</a>
              </div>
            </div>
          </div>
          <div class="location-content-wrapper bg">
            <div class="location-content">
              <div class="location-heading-wrapper">
                <h3 class="location-heading">{!! __('sustain.aus') !!}</h3>
              </div>
              <div class="button-wrapper">
                <a href="{{route('australia')}}" class="button accent end-to-end w-button">{!! __('sustain.recycle') !!}</a>
              </div>
            </div>
          </div>
          <div class="location-content-wrapper asia">
            <div class="location-content">
              <div class="location-heading-wrapper">
                <h3 class="location-heading">{!! __('sustain.aisa') !!}</h3>
              </div>
              <div class="button-wrapper">
                <a href="{{ route('coming_soon')}}" class="button accent end-to-end w-button">{!! __('sustain.recycle') !!}</a>
              </div>
            </div>
          </div>
          <div class="location-content-wrapper europe">
            <div class="location-content">
              <div class="location-heading-wrapper">
                <h3 class="location-heading">{!! __('sustain.europe') !!}</h3>
              </div>
              <div class="button-wrapper">
                <a href="{{ route('coming_soon')}}" class="button accent end-to-end w-button">{!! __('sustain.recycle') !!}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop