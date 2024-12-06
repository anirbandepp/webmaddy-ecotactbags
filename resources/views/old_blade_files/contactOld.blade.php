@extends('layouts.front-layout')

@if(config('app.lang')->slug == 'en')
  @section('title', 'Contact Us | Hermetic Packaging And Storage Solutions | Ecotact')
  @section('description', 'For enquiry about bolsas para empacar al vacio and storage solutions,
please contact us on 011-61381211 / 47028340 or email us at
info@aashirvad.in / aashirvad@gmail.com.')
  @section('keywords', 'bolsas para empacar al vacio')
@elseif(config('app.lang')->slug == 'sp')
  @section('title', 'Contact Us | Hermetic Packaging And Storage Solutions | Ecotact')
  @section('description', 'For enquiry about bolsas para empacar al vacio and storage solutions,
please contact us on 011-61381211 / 47028340 or email us at
info@aashirvad.in / aashirvad@gmail.com.')
  @section('keywords', 'bolsas para empacar al vacio')
@else

@endif

@section('content')
    <style type="text/css">
        @media (max-width: 991px) {
          .mobile-img{
            height:400px;
          }
        }
    </style>
  @include('hamburger-dropdown')
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    
  <div class="section contact" id="contact-banner" style="background-position: 0px 0px, 29% 0%;">
    <div class="main-wrapper">
      <div class="banner-content-wrapper">
        <div class="h2-wrapper white">
          <h2 class="h2 center">{{ __('contactus.Contact') }}</h2>
        </div>
      </div>
    </div>
  </div>
  
  <div class="section">
    <div class="map-wrapper"><img src="{{asset('front-end/images/map.svg')}}" loading="lazy" width="35" alt="ecotactbags" class="map-img">
      <a data-toggle="tooltip" title= "VENEZUELA" href="#Carabobo" class="pointer venezuela-carabobo w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "ECUADOR" href="#Guayaquil" class="pointer ecuador-guayaquil w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "BOLIVIA" href="#La-Paz" class="pointer bolivia-la-paz w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "PERU" href="#Lima" class="pointer peru-lima w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "COLOMBIA" href="#Manizales-Bogota" class="pointer bogota w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <!--<a href="#Manizales-Bogota" class="pointer manizales w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>-->
      <a data-toggle="tooltip" title= "PANAMA" href="#Panama" class="pointer panama w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "COSTA RICA" href="#San-Jose" class="pointer costa-rica-san-jose w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "NICARAGUA" href="#Managua" class="pointer managua w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "HONDURAS" href="#San-Pedro-Sula" class="pointer san-pedro-sula w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "EL SALVADOR" href="#San-Salvador" class="pointer san-salvador w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "GUATEMALA" href="#Guatemala-City" class="pointer guatemala-city w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "MEXICO" href="#Tuxtla-Gutierrez" class="pointer mexico-tuxtla-gutierrez w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "TANZANIA" href="#Dar-es-Salaam" class="pointer tanzania-dar-es-salaam w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "BURUNDI" href="#Bujumbura" class="pointer burundi-bujumbura w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "RWANDA" href="#Kigali" class="pointer rwanda-kigali w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "KENYA" href="#Nairobi" class="pointer nairobi w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "DEMOCRATIC REPUBLIC OF THE CONGO" href="#Kinshasha" class="pointer kinshasha w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "ETHIOPIA" href="#Addis-Ababa" class="pointer ethiopia-addis-ababa w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "UGANDA" href="#Kampala" class="pointer uganda-kampala w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "CAMEROON" href="#Douala" class="pointer cameroon-douala w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "PAPUA NEW GUINEA" href="#PAPUA-NEW-GUINEA" class="pointer papua-new-guinea w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "SOUTH KOREA" href="#Seoul" class="pointer seoul w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "YEMEN" href="#Sana-a" class="pointer sana-a w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "UNITED ARAB EMIRATES" href="#Dubai" class="pointer dubai w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "PHILIPPINES" href="#Muntinlupa" class="pointer muntinlupa w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "JAPAN" href="#Ebina-City-Yokohama" class="pointer yokohama w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <!--<a href="#Ebina-City-Yokohama" class="pointer ebina w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>-->
      <a data-toggle="tooltip" title= "TAIWAN" href="#Taichung" class="pointer taichung w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <!--<a href="#Taichung" class="pointer taiwan w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>-->
      <a data-toggle="tooltip" title= "CHINA & HONGKONG" href="#Yunnan-Simao" class="pointer simao w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <!--<a href="#Yunnan-Simao" class="pointer yunnan w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>-->
      <!--<a href="#Yunnan-Simao" class="pointer hongkong w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>-->
      <a data-toggle="tooltip" title= "HQ" href="#DELHI" class="pointer hq w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "MYANMAR" href="#Mandalay" class="pointer mandalay w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "INDONESIA" href="#Jakarta-Medan" class="pointer medan w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <!--<a href="#Jakarta-Medan" class="pointer jakarta w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>-->
      <a data-toggle="tooltip" title= "THAILAND" href="#bangkok" class="pointer bangkok w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "BANGALORE" href="#bangalore" class="pointer bangalor w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      <a data-toggle="tooltip" title= "KOLKATA" href="#kolkata" class="pointer kolkata w-inline-block"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
      
      <a data-toggle="tooltip" title= "PHILIPPINES" href="#Cherry_Cruz" class="pointer w-inline-block" style="left: 77%;bottom: 54.5%;"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img" ></a>
      {{--<a data-toggle="tooltip" title= "NEPAL" href="#Darshan_Chhajer" class="pointer w-inline-block" style="left: 70%;bottom: 45.5%;"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img" ></a>--}}
      <a data-toggle="tooltip" title= "NEPAL" href="#Darshan_Chhajer" class="pointer w-inline-block" style="left: 69%;bottom: 51.5%;"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img" ></a>
      <a data-toggle="tooltip" title= "NETHERLANDS" href="#Neeta_Singh" class="pointer w-inline-block" style="left: 17%;bottom: 47.5%;"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>
    </div>
  </div>
  <div class="section _0-100">
    <div class="main-wrapper">
      <div id="headquarters" class="main-location-card-wrapper">
        <div class="h2-wrapper left">
          <h2 class="h2">{{ __('contactus.HQ')}}</h2>
        </div>
        <div class="location-card static w-inline-block">
          <div id="DELHI" class="content-block">
            <div class="location-main-wrapper">
              <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
              <div>
                <div class="h3-wrapper contact">
                  <h3 class="h3 green capital">India</h3>
                </div>
                <div class="city-name-wrapper">
                  <div class="city">{{ __('contactus.DELHI') }}</div>
                </div>
              </div>
            </div>
          </div>
          <div class="grey-location-divider"></div>
          <div class="content-block">
            <div class="location-content-container">
              <div class="address">Aashirvad International,<br>NO. 18, BLOCK C2, UGF, ASHOK VIHAR, PHASE 2, DELHI - 110052, INDIA</div>
              <div class="location-details-wrapper">
                <div class="details-wrapper"><img src="{{asset('front-end/images/Group.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                  <div class="address">011-61381211 / 47028340 </div>
                </div>
                <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                  <div class="address"><a href="mailto:info@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">info@aashirvad.in</a> | <a href="mailto:aashirvad@gmail.com" style="color:rgba(0, 0, 0, 0.9);">aashirvad@gmail.com</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="seperator"></div>
      <div id="asia" class="main-location-card-wrapper">
        <div class="location-label-wrapper">
          <div class="h2-wrapper contact">
            <h2 class="h2">ASIA</h2>
          </div><img src="{{asset('front-end/images/Vector_1.svg')}}" loading="lazy" style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(null) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(null) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(null) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(null) rotateZ(0) skew(0, 0);transform-style:preserve-3d;display: none;" data-w-id="4a4cf390-ed1a-e9c0-a144-3ea4297fa882" alt="ecotactbags" class="drop-down-arrow">
        </div>
        <div style="display:grid" class="w-layout-grid location-grid asia">
          <div class="location-card w-inline-block">
            <div id="kolkata" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">India</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Kolkata</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">N. Jain</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:kol@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">kol@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="bangalore" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">India</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Bangalore</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Goutam Jain</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:blr@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">blr@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="bangkok" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">THAILAND</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Bangkok</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Chartee T</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:thai@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">thai@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Mandalay" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Myanmar</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Mandalay</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Sai Wan</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:myanmar@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">myanmar@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Jakarta-Medan" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">indonesia</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">{{ __('contactus.Jakarta / Medan') }}</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">DIANTO GHO</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:indonesia@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">indonesia@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Yunnan-Simao" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">{!! __('contactus.China &amp; Hongkong') !!}</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Yunnan, Simao</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Joshua Jagelman</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:china@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">china@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Taichung" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Taiwan</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Taichung</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Wendy Lin (PRO AROMA)</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:taiwan@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">taiwan@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Ebina-City-Yokohama" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">{{ __('contactus.Japan')}}</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">{{ __('contactus.Ebina City / Yokohama') }}</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">{{ __('contactus.Yuji Hirano')}}</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:japan@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">japan@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Muntinlupa" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Philippines</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city"> Muntinlupa</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
                <div id="Cherry_Cruz" class="offset"></div>
              <div class="location-content-container">
                <div class="name">Cherry Cruz</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:ph@ecotactbags.com" style="color:rgba(0, 0, 0, 0.9);">ph@ecotactbags.com</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Dubai" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">{{ __('contactus.United Arab Emirates')}} </h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Dubai</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name"><a href="mailto:" style="color:rgba(0, 0, 0, 0.9);">{{ __('contactus.Coming soon')}}</a></div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Sana-a" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Yemen </h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Sana’a</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Adnan Gaber Awnallah</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:yemen@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">yemen@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Seoul" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">{{ __('contactus.South Korea')}} </h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city"><strong>{{ __('contactus.Seoul')}}</strong></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">{{ __('contactus.J H Park')}}</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:korea@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">korea@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Seoul" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Nepal </h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city"><strong>Kathmandu</strong></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block" id="Darshan_Chhajer">
              <div class="location-content-container">
                <div class="name">Darshan Chhajer</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:darshan@ecotactbags.com" style="color:rgba(0, 0, 0, 0.9);">darshan@ecotactbags.com</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="seperator"></div>
      <div id="Australia" class="main-location-card-wrapper">
        <div class="location-label-wrapper">
          <div class="h2-wrapper contact">
            <h2 class="h2">AUSTRALIA</h2>
          </div><img src="{{asset('front-end/images/Vector_1.svg')}}" loading="lazy" width="23" style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);transform-style:preserve-3d;display: none;" data-w-id="b26a3485-b3b3-50b1-a1ad-88f9fc62a1ba" alt="ecotactbags" class="drop-down-arrow">
        </div>
        <div style="display:grid" class="w-layout-grid location-grid australia">
          <div class="location-card w-inline-block">
            <div id="PAPUA-NEW-GUINEA" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">PAPUA NEW GUINEA</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name"><a href="mailto:" style="color:rgba(0, 0, 0, 0.9);">{{ __('contactus.Coming soon')}}</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="seperator"></div>
      <div id="africa" class="main-location-card-wrapper">
        <div class="location-label-wrapper">
          <div class="h2-wrapper contact">
            <h2 class="h2">AFRICA</h2>
          </div><img src="{{asset('front-end/images/Vector_1.svg')}}" loading="lazy" width="23" style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);transform-style:preserve-3d;display: none;" data-w-id="f634d849-679e-2654-4f8d-244a0a8423ea" alt="ecotactbags" class="drop-down-arrow">
        </div>
        <div style="display:grid" class="w-layout-grid location-grid africa">
          <div class="location-card w-inline-block">
            <div id="Douala" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">{{ __('contactus.Cameroon')}}</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Douala</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Pradeep Sharma</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:cameroon@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">cameroon@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Kampala" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Uganda</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Kampala</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name"><a href="mailto:" style="color:rgba(0, 0, 0, 0.9);">{{ __('contactus.Coming soon')}}</a></div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Addis-Ababa" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">{{ __('contactus.Ethiopia')}}</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Addis Ababa</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Mike Mammo</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:eth@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">eth@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Kinshasha" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" width="81" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">{{ __('contactus.Democratic Republic of the Congo') }}</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Kinshasha</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name"><a href="mailto:" style="color:rgba(0, 0, 0, 0.9);">{{ __('contactus.Coming soon')}}</a></div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Nairobi" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Kenya</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Nairobi</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name"><a href="mailto:" style="color:rgba(0, 0, 0, 0.9);">{{ __('contactus.Coming soon')}}</a></div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Kigali" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Rwanda</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Kigali</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Jean-Jacques</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:rwanda@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">rwanda@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Bujumbura" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">BurundI</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Bujumbura</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name"><a href="mailto:" style="color:rgba(0, 0, 0, 0.9);">{{ __('contactus.Coming soon')}}</a></div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Dar-es-Salaam" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Tanzania</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Dar-es-Salaam</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Hassan Gwando</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:tanzania@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">tanzania@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="seperator"></div>
      <div id="north-america" class="main-location-card-wrapper">
        <div class="location-label-wrapper">
          <div class="h2-wrapper contact">
            <h2 class="h2">{{ __('contactus.NORTH AMERICA')}}</h2>
          </div><img src="{{asset('front-end/images/Vector_1.svg')}}" loading="lazy" width="23" style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);transform-style:preserve-3d;display: none;" data-w-id="c247fabe-0617-2642-6008-5a243c1fb5a1" alt="ecotactbags" class="drop-down-arrow">
        </div>
        <div style="display:grid" class="w-layout-grid location-grid north-america">
          <div class="location-card w-inline-block">
            <div id="Tuxtla-Gutierrez" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Mexico</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Tuxtla Gutierrez</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Teddy Kim</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:mexico@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">mexico@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="seperator"></div>
      <div id="central-america" class="main-location-card-wrapper">
        <div class="location-label-wrapper">
          <div class="h2-wrapper contact">
            <h2 class="h2">{{ __('contactus.CENTRAL AMERICA')}}</h2>
          </div><img src="{{asset('front-end/images/Vector_1.svg')}}" loading="lazy" width="23" style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);transform-style:preserve-3d;display: none;" data-w-id="90efe494-4d81-f34b-a468-c47312fd4a18" alt="ecotactbags" class="drop-down-arrow">
        </div>
        <div style="display:grid" class="w-layout-grid location-grid central-america">
          <div class="location-card w-inline-block">
            <div id="Guatemala-City" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">{{ __('contactus.Guatemala')}}</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">{{ __('contactus.Stephane Cuchet')}}</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Stephane Cuchet</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:ca@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">ca@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="San-Salvador" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">El Salvador</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">San Salvador</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Stephane Cuchet</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:ca@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">ca@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="San-Pedro-Sula" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Honduras</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">San Pedro Sula</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Stephane Cuchet</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:ca@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">ca@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Managua" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Nicaragua</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Managua</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Stephane Cuchet</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:ca@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">ca@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="San-Jose" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Costa Rica</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">San Jose</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Eladio Sanabria</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:costarica@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">costarica@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Panama" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Panama</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name"><a href="mailto:Coming soon" style="color:rgba(0, 0, 0, 0.9);">{{ __('contactus.Coming soon')}}</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="seperator"></div>
      <div id="south-america" class="main-location-card-wrapper">
        <div class="location-label-wrapper">
          <div class="h2-wrapper contact">
            <h2 class="h2">{{ __('contactus.SOUTH AMERICA')}}</h2>
          </div><img src="{{asset('front-end/images/Vector_1.svg')}}" loading="lazy" width="23" style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);transform-style:preserve-3d;display: none;" data-w-id="4a541175-ac44-f2e2-ab72-cb17eab04764" alt="ecotactbags" class="drop-down-arrow">
        </div>
        <div style="display:grid" class="w-layout-grid location-grid south-america">
          <div class="location-card w-inline-block">
            <div id="Manizales-Bogota" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Colombia</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Manizales/Bogota</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Angela Maria Suarez</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:colombia@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">colombia@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Lima" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Peru</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Lima</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Silvia Arispe</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:peru@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">peru@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="La-Paz" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Bolivia</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">La Paz</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Daniela Rodriguez</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:bolivia@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">bolivia@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Guayaquil" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Ecuador</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Guayaquil</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Miguel Rendon</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:ecuador@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">ecuador@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="location-card w-inline-block">
            <div id="Carabobo" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Venezuela</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Carabobo</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Ricardo Lozada &amp; Mary Jose Lozada</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:venezuela@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">venezuela@aashirvad.in</a>, <br><a href="mailto:info@beantobag.net" style="color:rgba(0, 0, 0, 0.9);">info@beantobag.net</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="seperator"></div>
      <div id="north-america" class="main-location-card-wrapper">
        <div class="location-label-wrapper">
          <div class="h2-wrapper contact">
            <h2 class="h2">EUROPE</h2>
          </div><img src="{{asset('front-end/images/Vector_1.svg')}}" loading="lazy" width="23" style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(0) rotateZ(0) skew(0, 0);transform-style:preserve-3d;display: none;" data-w-id="c247fabe-0617-2642-6008-5a243c1fb5a1" alt="ecotactbags" class="drop-down-arrow">
        </div>
        <div style="display:grid" class="w-layout-grid location-grid north-america">
          <div class="location-card w-inline-block">
            <div id="Tuxtla-Gutierrez" class="offset"></div>
            <div class="content-block">
              <div class="location-main-wrapper">
                <div class="location-icon"><img src="{{asset('front-end/images/location.svg')}}" loading="lazy" alt="ecotactbags"></div>
                <div class="location">
                  <div class="h3-wrapper contact">
                    <h3 class="h3 green capital">Netherlands</h3>
                  </div>
                  <div class="city-name-wrapper">
                    <div class="city">Almere</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="grey-location-divider"></div>
            <div class="content-block">
              <div class="location-content-container">
                <div class="name">Neeta Singh</div>
                <div class="location-details-wrapper">
                  <div class="details-wrapper"><img src="{{asset('front-end/images/Group-1.svg')}}" loading="lazy" alt="ecotactbags" class="image-16">
                    <div class="address"><a href="mailto:europe@aashirvad.in" style="color:rgba(0, 0, 0, 0.9);">europe@aashirvad.in</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      
      
    </div>
  </div>
  <div class="section _0-0" id="enquiry-form">
    <div class="main-wrapper">
      <div class="form"><img src="{{asset('front-end/images/cross.svg')}}" loading="lazy" data-w-id="b2129d40-f7b4-a066-1e15-09be4036997a" alt="ecotactbags" class="close">
        <div class="w-layout-grid form-grid">
          <div id="w-node-b2129d40-f7b4-a066-1e15-09be4036997c-40369979" class="form-img mobile-img" style="background-image:url({{asset('front-end/images/shutterstock_1055702987.jpg')}});background-position: bottom;background-size: cover;"><!--<img src="{{asset('front-end/images/Rectangle-145_1.png')}}" loading="lazy" alt="ecotactbags" sizes="(max-width: 479px) 63.48958206176758px, (max-width: 767px) 42vw, (max-width: 991px) 43vw, 421.9921875px" srcset="{{asset('front-end/images/Rectangle-145_1-p-500.png')}} 500w" class="image-19">--></div>
          <div class="form-content">
            <div class="h2-wrapper">
              <h3 class="h3-popup-heading">{{ __('globe.Enquiry Form') }}</h3>
            </div>
            <div class="form-block-2 w-form">
              <form id="contact-us-form" name="email-form" data-name="Email Form" action="{{route('enquireNow')}}" method="post"> @csrf <label for="name-3" class="field-label">{!! __('globe.name') !!}</label>
              <input type="text" class="text-field w-input" maxlength="256" name="c_name" data-name="Name 2" placeholder="" id="c_name" value="{{old('c_name')}}" required><label for="email-4" class="field-label">{!! __('globe.email') !!}</label>
              <input type="email" class="text-field w-input" maxlength="256" name="c_email" data-name="Email 3" placeholder="" id="c_email" value="{{old('c_email')}}" required><label for="email-4" class="field-label">{!! __('globe.company') !!}</label>
              <input type="text" class="text-field w-input" maxlength="256" name="company" data-name="Email 2" placeholder="" id="company" value="{{old('company')}}" required><label for="email-4" class="field-label">{!! __('globe.country') !!}</label>
              <input type="text" class="text-field w-input" maxlength="256" name="c_country" data-name="Email 2" placeholder="" id="c_country" value="{{old('c_country')}}" required><label for="email-4" class="field-label">{!! __('globe.comment') !!}</label><textarea onkeypress="magicvalidation(event)" placeholder="" maxlength="5000" id="c_message" name="c_message" class="textarea w-input">{{ old('c_message') }}</textarea>
              <div style="width:100%;">
                    @forelse($products as $product)
                        <div style="display: inline-block;margin-right:10px;">
                          <input type="checkbox" name="product[]" value="{{$product->product_name}}" >
                          <label style="display: inline-block;font-weight:normal;" for="inlineCheckbox1" title="{{$product->product_name}}">{{ \Illuminate\Support\Str::limit($product->product_name, $limit = 45, $end = '...') }}</label>
                        </div>
                    @empty
                    @endforelse
              </div>
              
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	        <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')  }}"></div>
              <div class="button-wrapper">
                <div class="button-wrapper form">
                    <!--<input type="submit" value="{{__('globe.submit') }}" data-wait="Please wait..." class="button accent w-button">-->
                    <a data-wait="Please wait..." onclick="test();" class="button accent w-button">{{__('globe.submit') }}</a>
                    </div>
              </form>
              <div class="w-form-done">
                <div>Thank you! Your submission has been received!</div>
              </div>
              <div class="w-form-fail">
                <div>Oops! Something went wrong while submitting the form.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
   <script>
       $('.pointer venezuela-carabobo w-inline-block').attr('title', $('.pointer venezuela-carabobo w-inline-block').text().toUpperCase())
       
       
    function magicvalidation(e){
        $(this).val($(this).val().replace(/[^a-z0-9]/gi, ''));
        }
        
        function test(){
            if ($("#contact-us-form input:checkbox:checked").length > 0){
              var valid = true;
            }
            var name = $('#c_name').val();
            var email = $('#c_email').val();
            var company = $('#company').val();
            var country = $('#c_country').val();
            if(name && email && company && country && valid){
                console.log([name,email,company,country]);
                var new_contact =
                {
                    'First name': name, 
                    'Last name': '',  
                    'Email': email, 
                    'Alternate contact number': '', 
                    'company': {
                        'Name': company, //Replace with company name
                        'Website': 'www.ecotact.com' //Replace with website of company
                    }
                };
                var identifier = email;
                fwcrm.identify(identifier, new_contact);
                $('#contact-us-form').submit();
            }else{
                toastr.info('All Fields Are Required');
            }
        }
        
   </script> 
    
    
  @stop