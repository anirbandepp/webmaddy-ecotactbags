@extends('layouts.front-layout')

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

  @include('hamburger-dropdown')
  <div class="section csr" style="background-image:url({{asset('front-end/images/image 26.jpg')}});background-size: cover;background-position: center;">
    <div class="main-wrapper">
      <div class="banner-content-wrapper">
        <div class="title-caption-wrapper">
          <div class="title-caption center">{!! __('activities.CSR ACTIVITIES') !!}</div>
        </div>
        <div class="h2-wrapper">
          <h1 class="h2 center white">{!! __('activities.good') !!}</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="main-wrapper">
      <div class="crs-content-wrapper">
        <div class="body-text-main">
          <div class="body-text-wrapper">
              <h2 class="h3 center" style="text-align: center;">{!! __('activities.h2') !!}</h2>
            <div class="body-text center">{!! __('activities.acText2') !!}</div>
            
          </div>
        </div>
        <div class="crs-activity-grid-wrapper">
          <div class="w-layout-grid crs-actovities-grid">
            <div class="crs-content">
              <div class="h2-wrapper left">
                <h2 class="h2 green-left"><a href="http://womenscoffeeindia.org/index.php/en/" target="_blank" style="color:#0c6a35;">{!! __('activities.women') !!}</a></h2>
              </div>
              <div class="body-text-wrapper">
                <div class="body-text">{!! __('activities.womentxt') !!}</div>
              </div>
            </div>
            <div id="w-node-_0946aac8-8de4-6204-d910-58c489a71dab-fa458b52" class="crs-img"><img src="{{asset('front-end/images/Group-464.png')}}" loading="lazy" width="381" sizes="(max-width: 479px) 94vw, 381px" srcset="{{asset('front-end/images/Group-464-p-500.png')}} 500w, {{asset('front-end/images/Group-464-p-800.png')}} 800w, {{asset('front-end/images/Group-464.png')}} 856w" alt="ecotact"></div>
            <div id="w-node-d08d5a74-a9aa-57ba-454e-036d93443df8-fa458b52" class="crs-img-left"><img src="{{asset('front-end/images/Group-323.png')}}" loading="lazy" width="381" sizes="(max-width: 479px) 94vw, 381px" srcset="{{asset('front-end/images/Group-323-p-500.png')}} 500w, {{asset('front-end/images/Group-323.png')}} 716w" alt="ecotact"></div>
            <div class="crs-content">
              <div class="h2-wrapper left">
                <h2 class="h2 green-left"><a href="https://apnagharashram.org/" target="_blank" style="color:#0c6a35;">{!! __('activities.ghar') !!}</a></h2>
              </div>
              <div class="body-text-wrapper">
                <div class="body-text">{!! __('activities.gharText') !!}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop