@extends('layouts.front-layout')

@if(config('app.lang')->slug == 'en' || config('app.lang')->slug == 'in')
  @section('title', 'Green Coffee Bags | Bolsas Sellado Al Vacio supplier in USA | Ecotact')
  @section('description', 'Are you looking for a hermetic packaging supplier in the USA? We offer reusable, and sellado cafe empacado al vacio bags for cocoa, rice and other grains packaging.')
  @section('keywords', 'coffee sample bags,green coffee bags,eco friendly coffee bags,reusable coffee bags,hermetic packaging supplier,hermetic packaging supplier in USA,coffee packaging supplier,biodegradable coffee bags,sellado al vacio,cafe empacado al vacio')
@elseif(config('app.lang')->slug == 'sp')
    @section('title', 'Green Coffee Bags | Bolsas Sellado Al Vacio supplier in USA | Ecotact')
  @section('description', 'Are you looking for a hermetic packaging supplier in the USA? We offer reusable, and sellado cafe empacado al vacio bags for cocoa, rice and other grains packaging.')
  @section('keywords', 'coffee sample bags,green coffee bags,eco friendly coffee bags,reusable coffee bags,hermetic packaging supplier,hermetic packaging supplier in USA,coffee packaging supplier,biodegradable coffee bags,sellado al vacio,cafe empacado al vacio')
@else
      @section('title', 'Green Coffee Bags | Bolsas Sellado Al Vacio supplier in USA | Ecotact')
  @section('description', 'Are you looking for a hermetic packaging supplier in the USA? We offer reusable, and sellado cafe empacado al vacio bags for cocoa, rice and other grains packaging.')
  @section('keywords', 'coffee sample bags,green coffee bags,eco friendly coffee bags,reusable coffee bags,hermetic packaging supplier,hermetic packaging supplier in USA,coffee packaging supplier,biodegradable coffee bags,sellado al vacio,cafe empacado al vacio')

@endif



@section('content')
  <style type="text/css">
    .mobile-vs {
        display: none;
      }
      .desktop-vs{
        display: block;
      }
      .side-images-wrapper1{
          width:70%;
          margin-left:auto;
          margin-right:auto;
      }
      .side-images-wrapper{
          width:64%;
          margin-left:auto;
          margin-right:auto;
          margin-top: 140px;
      }
      .side-images-wrapper img{
          width:75px;
      }
      .product-card-description{
        min-height: 60px;   
        font-size: 15px;
      }
      .product-card-description .body-text{
        position: absolute;
        left: 0;
        right: 0;
        line-height: 1.2;
        top: 50%;
        transform: translateY(-50%);
      }
    @media (max-width: 991px) {
      .mobile-vs {
        display: block;
      }
      .desktop-vs{
        display: none;
      }
    }
    @media (max-width: 767px) {
        .side-images-wrapper{
            margin-top:66px;
        }
    }
  </style>
  @include('hamburger-dropdown')
  <a target="_blank" href="{{__('home.bannerLink')}}"><div data-poster-url="https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/60377fc9cb4462671d40d37e_Ecotact Banner Video-poster-00001.jpg" data-video-urls="https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/60377fc9cb4462671d40d37e_Ecotact Banner Video-transcode.mp4,https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/60377fc9cb4462671d40d37e_Ecotact Banner Video-transcode.webm" data-autoplay="true" data-loop="true" data-wf-ignore="true" class="background-video w-background-video w-background-video-atom"><video autoplay="" loop="" style="background-image:url(&quot;https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/60377fc9cb4462671d40d37e_Ecotact Banner Video-poster-00001.jpg&quot;)" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
      <source src="front-end/images/video/homebanner2.mp4" data-wf-ignore="true">
      <!--<source src="front-end/images/video/homebanner.webm" data-wf-ignore="true">-->
    </video>
    <div class="main-wrapper home-banner">
      <div class="banner-content home">
        <div data-w-id="c42f9ff1-635d-ec30-1a32-928bffae89bc" style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="h1-wrapper home-banner">
          <h1 class="h1">{{__('home.bannerText')}}</h1>
        </div>
      </div>
    </div>
  </div></a>
  <div class="section">
    <div class="main-wrapper">
      <div class="solution-wrapper">
        <div class="label-wrapper">
          <div class="h2-wrapper">
            <h2 class="h2 green">{!!__('home.globally')!!}</h2>
          </div>
        </div>
        <div class="w-layout-grid brief-grid">
          <div class="left-grid">
            {{-- <div class="title-caption">{!!__('home.inbrief')!!}</div> --}}
            <div class="body-text-wrapper">
              <div class="body-text">{!!__('home.inbriefText')!!}</div>
            </div>
            <a href="{{route('about-us')}}" class="button accent w-button">{!!__('home.Know More')!!}</a>
          </div>
          <div class="right-grid"><img src="{{asset('front-end/images/home1.jpg')}}" loading="lazy" sizes="(max-width: 479px) 95vw, 392.5px" width="392.5" srcset="{{asset('front-end/images/home1.jpg')}} 500w, {{asset('front-end/images/home1.jpg')}} 785w" alt="ecotact"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="section _0-100">
    <div class="main-wrapper">
      <div class="stats-cta-wrapper">
        <div class="stats">
          <div class="label-wrapper">
            <div class="title-caption">{!!__('home.Here for Good')!!}</div>
            <div class="h2-wrapper center">
              <h2 class="h2">{!!__('home.FOUNDED WITH A MISSION')!!}</h2>
            </div>
          </div>
          <div class="stats-content">
            <div class="mission">
              <div class="stat-number green">2</div>
              <div class="title-caption black">{!!__('home.DECADES')!!}</div>
              <div class="body-text center">{!!__('home.Founded in 2005 to protect the value of your products during storage and transit.')!!}</div>
            </div>
            <div id="w-node-_21a4665b-30f8-ee57-a8e2-6a8200f80cb7-e97b72a1" class="mission">
              <div class="stat-number green">40+</div>
              <div class="title-caption black">{!!__('home.COUNTRIES')!!}</div>
              <div class="body-text center">{!!__('home.Global presence of our packaging solutions.')!!}</div>
            </div>
            <div id="w-node-a509890f-96fc-0925-e8a3-b83a2d11a8f0-e97b72a1" class="mission">
              <div class="stat-number green">15m+</div>
              <div class="title-caption black">{!!__('home.BAGS SOLD')!!}</div>
              <div class="body-text center">{!!__('home.Maintained freshness with variety and value.')!!}</div>
            </div>
            <div id="w-node-fa7499fa-37d6-d4bf-4ad6-20453e110e56-e97b72a1" class="mission">
              <div class="stat-number green">100%</div>
              <div class="title-caption black">{!!__('home.RECYCLABLE')!!}</div>
              <div class="body-text center">{!!__('home.Our step to a sustainable future.')!!}</div>
            </div>
          </div>
        </div>
      </div>
      <div class="cta-button">
        <a href="{{route('contact')}}#enquiry-form" class="button w-button">{!!__('home.ENQUIRE NOW')!!}</a>
      </div>
    </div>
  </div>
  
  
  <!--<div data-poster-url="https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/605b1a9598b253aae73ca6ee_Video with Copyright-poster-00001.jpg" data-video-urls="https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/605b1a9598b253aae73ca6ee_Video with Copyright-transcode.mp4,https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/605b1a9598b253aae73ca6ee_Video with Copyright-transcode.webm" data-autoplay="true" data-loop="true" data-wf-ignore="true" class="background-video-2 w-background-video w-background-video-atom"><video autoplay="" loop="" style="background-image:url(&quot;https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/605b1a9598b253aae73ca6ee_Video with Copyright-poster-00001.jpg&quot;)" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">-->
  <!--    <source src="https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/605b1a9598b253aae73ca6ee_Video with Copyright-transcode.mp4" data-wf-ignore="true">-->
  <!--    <source src="https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/605b1a9598b253aae73ca6ee_Video with Copyright-transcode.webm" data-wf-ignore="true">-->
  <!--  </video></div>-->
    @if(config('app.lang')->slug == 'en')
        <video width="100%" id="layers-pack" autoplay="true" loop="true" style="background-image:url(&quot;https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/605b1a9598b253aae73ca6ee_Video with Copyright-poster-00001.jpg&quot;)" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
          <source src="https://www.ecotactbags.com/front-end/9Layer Animation For Website-LQ.m4v" data-wf-ignore="true">
          <source src="https://www.ecotactbags.com/front-end/9Layer Animation For Website-LQ.m4v" data-wf-ignore="true">
        </video>
    @elseif(config('app.lang')->slug == 'sp')
        <video width="100%" id="layers-pack" autoplay="true" loop="true" style="background-image:url(&quot;https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/605b1a9598b253aae73ca6ee_Video with Copyright-poster-00001.jpg&quot;)" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
          <source src="front-end/images/video/Final Animation_Spanish-Sub (1).mp4" data-wf-ignore="true">
          <source src="front-end/images/video/Final Animation_Spanish-Sub (1).webm" data-wf-ignore="true">
        </video>
    @endif
        
    
  <div class="section benefits-multiply desktop-vs">
    <div class="main-wrapper">
      <div class="benefits-wrapper">
        <div class="label-wrapper">
          <div class="h2-wrapper _w-subtitle">
            <h2 class="h2 green">{!!__('home.Benefits')!!}</h2>
          </div>
        </div>
        <div class="benefit-cards">
          <div class="benefits-card"><img src="{{asset('front-end/images/diversity.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
            <div class="benefit-card-text">
              <div class="h3-wrapper">
                <h3 class="h3 green">{!!__('home.Diversity')!!}</h3>
              </div>
              <div class="body-text">{!!__('home.Diversity.text')!!}</div>
            </div>
          </div>
          <div class="benefits-card"><img src="{{asset('front-end/images/affordable.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
            <div class="benefit-card-text">
              <div class="h3-wrapper">
                <h3 class="h3 green">{!!__('home.Affordability')!!}</h3>
              </div>
              <div class="body-text">{!!__('home.Affordability.text')!!}</div>
            </div>
          </div>
          <div class="benefits-card"><img src="{{asset('front-end/images/delivery.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
            <div class="benefit-card-text">
              <div class="h3-wrapper">
                <h3 class="h3 green">{!!__('home.Delivery')!!}</h3>
              </div>
              <div class="body-text">{!!__('home.Delivery.text')!!}<br></div>
            </div>
          </div>
          <div class="benefits-card"><img src="{{asset('front-end/images/shelf.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
            <div class="benefit-card-text">
              <div class="h3-wrapper">
                <h3 class="h3 green"><strong>{!!__('home.Shelf-life')!!}</strong><br></h3>
              </div>
              <div class="body-text">{!!__('home.Shelf-life.text')!!}<br></div>
            </div>
          </div>
          <div id="w-node-ffa1f878-4fb4-c723-1c96-8117982afa2b-e97b72a1" class="benefits-card"><img src="{{asset('front-end/images/sustainability.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
            <div class="benefit-card-text">
              <div class="h3-wrapper">
                <h3 class="h3 green"><strong>{!!__('home.Sustainability')!!}</strong><br></h3>
              </div>
              <div class="body-text">{!!__('home.Sustainability.text')!!}<br></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Exporter -->
  <div data-w-id="4c4aa3a0-b344-4c26-a254-c21e21872622" class="section drop-down">
    <div class="main-wrapper">
      <div class="content-wrapper">
        <div class="main-grid-wrapper">
          <div class="main-heading-wrapper">
            <div class="grid-title-center">
              <div class="main-label-wrapper" id="tab-label">
                <div class="pre-label-wrapper">
                  <div class="i-m-a">{!!__('home.i')!!}</div>
                </div>
                <div class="an-wrapper">
                  <div class="i-m-an">{!!__('home.i')!!}</div>
                </div>
                <div class="label-wrapper dropdown" id="tab-ima">
                  <div data-w-id="d86d0812-a96a-b15a-0d02-d5a26125b99d" class="processor-heading">
                    <div class="processor-label">{!!__('home.exporter')!!}</div><img src="{{asset('front-end/images/down-arrow.svg')}}" loading="lazy" width="22" alt="ecotact" class="polygon">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
            <div class="tabs-menu w-tab-menu" id="tab-menu">
              <a data-w-tab="Exporters" data-w-id="b86b4e73-846b-89b6-d363-1476567fca26" class="tab-link exporter-copy w-inline-block w-tab-link w--current">
                <div class="drop-down-label">{!!__('home.exporter')!!}</div>
              </a>
              <a data-w-tab="I&#x27;m farmer" data-w-id="2e354663-e81b-b32d-d10b-ce8ddfd7683e" class="tab-link farmer w-inline-block w-tab-link">
                <div class="drop-down-label">{!!__('home.farmer')!!}</div>
              </a>
              <a data-w-tab="Importer and roaster" data-w-id="b86b4e73-846b-89b6-d363-1476567fca29" class="tab-link importer w-inline-block w-tab-link">
                <div class="drop-down-label">{!!__('home.importer')!!}</div>
              </a>
              <a data-w-tab="Explorer" data-w-id="7293448b-cad4-7c96-0ee8-9e0eb0864437" class="tab-link w-inline-block w-tab-link">
                <div class="drop-down-label">{!!__('home.explorer')!!}</div>
              </a>
            </div>
            <div class="tabs-content tab-content w-tab-content">
              <div data-w-tab="Exporters" class="w-tab-pane w--tab-active">
                <div class="main-wrapper exporter">
                  <div class="side-images-wrapper">
                    <div class="grid-left-image mobile"><img src="{{asset('front-end/images/noun_exporter_2234781-1.svg')}}" loading="lazy" width="174" alt="ecotact" class="farmer-img-left"></div>
                  </div>
                  <div class="perfect-for-container" style="margin-top:30px;">
                    <div class="benefits-wrapper">
                      <div class="label-wrapper">
                        <div class="h2-w-icon">
                          <div class="h2-wrapper _w-subtitle"><img src="{{asset('front-end/images/h2-decor.svg')}}" loading="lazy" alt="ecotact" class="h2-icon">
                            <h2 class="h2 green">{!!__('home.Perfect')!!}</h2>
                          </div>
                        </div>
                        <div class="h2-subtitle-wrapper">
                          <div class="h2-subtitle">{!!__('home.Perfect.text')!!}</div>
                        </div>
                      </div>


                      <!-- mibile -->
                      <div class="section benefits-multiply mobile-vs" style="padding-top: 30px; margin-top:15px;">
                        <div class="main-wrapper">
                          <div class="benefits-wrapper">
                            <div class="label-wrapper">
                              <div class="h2-wrapper _w-subtitle">
                                <h2 class="h2 green">{!!__('home.Benefits')!!}</h2>
                              </div>
                            </div>
                            <div class="benefit-cards">
                              <div class="benefits-card"><img src="{{asset('front-end/images/diversity.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green">{!!__('home.Diversity')!!}</h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Diversity.text')!!}.</div>
                                </div>
                              </div>
                              <div class="benefits-card"><img src="{{asset('front-end/images/affordable.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green">{!!__('home.Affordability')!!}</h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Affordability.text')!!}</div>
                                </div>
                              </div>
                              <div class="benefits-card"><img src="{{asset('front-end/images/delivery.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green">{!!__('home.Delivery')!!}</h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Delivery.text')!!}<br></div>
                                </div>
                              </div>
                              <div class="benefits-card"><img src="{{asset('front-end/images/shelf.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green"><strong>{!!__('home.Shelf-life')!!}</strong><br></h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Shelf-life.text')!!}<br></div>
                                </div>
                              </div>
                              <div id="w-node-ffa1f878-4fb4-c723-1c96-8117982afa2b-e97b72a1" class="benefits-card"><img src="{{asset('front-end/images/sustainability.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green"><strong>{!!__('home.Sustainability')!!}</strong><br></h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Sustainability.text')!!}<br></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- mibile -->







                      <div class="benefits-list">
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{!!__('home.exporter.point1')!!}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{!!__('home.exporter.point2')!!}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{!!__('home.exporter.point3')!!}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{!!__('home.exporter.point4')!!}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{!!__('home.exporter.point5')!!}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{!!__('home.exporter.point6')!!}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{!!__('home.exporter.point7')!!}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{!!__('home.exporter.point8')!!}<br></div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{!!__('home.exporter.point9')!!}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{!!__('home.exporter.point10')!!}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{!!__('home.exporter.point11')!!}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{!!__('home.exporter.point12')!!}</div>
                        </div>
                      </div>
                    </div>
                    <div class="divider accent"></div>
                  </div>
                  <div class="ideal-products-container">
                    <div class="label-wrapper products">
                      <div class="h2-wrapper">
                        <h2 class="h2 green">{!!__('home.ideal') !!}</h2>
                      </div>
                      <div class="h3-wrapper center">
                        <h3 class="h3">{!!__('home.idealtext1') !!}</h3>
                      </div>
                    </div>
                    <div class="div-block-3">
                        @foreach($exporters as $product)
                            
                           <a href="{{ route('productFullView',['category' => $product->categories()->first()->slug ,'slug' => $product->slug]) }}" class="product-card"><img src="{{ $product->base_img ? asset('product_images/large/'.$product->productImages()->where('ideal',1)->first()->url) :  asset('front-end/images/Mask-Group.png')}}" loading="lazy" alt="ecotact">
                            <!--<div class="cart-button"><img src="{{asset('front-end/images/cart.svg')}}" loading="lazy" width="20" height="20" alt="ecotact"></div>-->
                            <div class="product-card-description">
                              <div class="body-text center-white">{{ @$product->productDetails[0]['product_name'] }}<br></div>
                            </div>
                          </a>
                        @endforeach
                      <!--<div class="product-card"><img src="{{asset('front-end/images/ecotact-40.png')}}" loading="lazy" alt="ecotact">-->
                      <!--  <div class="cart-button"><img src="{{asset('front-end/images/cart.svg')}}" loading="lazy" width="20" height="20" alt="ecotact"></div>-->
                      <!--  <div class="product-card-description">-->
                      <!--    <div class="body-text center-white">Ecotact 40<br><strong>$000</strong></div>-->
                      <!--  </div>-->
                      <!--</div>-->
                      <!--<div class="product-card"><img src="{{asset('front-end/images/ecotact-40.png')}}" loading="lazy" alt="ecotact">-->
                      <!--  <div class="cart-button"><img src="{{asset('front-end/images/cart.svg')}}" loading="lazy" width="20" height="20" alt="ecotact"></div>-->
                      <!--  <div class="product-card-description">-->
                      <!--    <div class="body-text center-white">Ecotact 80<br><strong>$000</strong></div>-->
                      <!--  </div>-->
                      <!--</div>-->
                      <!--<div class="product-card"><img src="{{asset('front-end/images/ecotact-40.png')}}" loading="lazy" alt="ecotact">-->
                      <!--  <div class="cart-button"><img src="{{asset('front-end/images/cart.svg')}}" loading="lazy" width="20" height="20" alt="ecotact"></div>-->
                      <!--  <div class="product-card-description">-->
                      <!--    <div class="body-text center-white">Ecotact 25<br><strong>$000</strong></div>-->
                      <!--  </div>-->
                      <!--</div>-->
                      <!--<div class="product-card"><img src="{{asset('front-end/images/ecotact-40.png')}}" loading="lazy" alt="ecotact">-->
                      <!--  <div class="cart-button"><img src="{{asset('front-end/images/cart.svg')}}" loading="lazy" width="20" height="20" alt="ecotact"></div>-->
                      <!--  <div class="product-card-description">-->
                      <!--    <div class="body-text center-white">Ecotact Sterile 20<br>‍<strong>$000</strong></div>-->
                      <!--  </div>-->
                      <!--</div>-->
                    </div>
                  </div>
                  <div class="testimonial-container">
                    <div data-animation="slide" data-duration="500" data-infinite="1" class="slider w-slider">
                      <div class="mask w-slider-mask">
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi1')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">JJ, RTC, {{ __('home.Rwanda')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi2')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">Carlos Melen, Good Coffee Farms, {{ __('home.Japan-Guatemala')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi3')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">Stasi Baranoff, Uncommon Cacao, {{__('home.USA')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/brown-cirlce-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi4')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green testimonial">Scott Bennett, H.A. Bennett, {{__('home.Australia')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Factory Manager, Olam Cam SA</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi5')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">Kyle Bellinger, Osito Coffee, {{__('home.USA')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi6')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">Thompson Owen, {{ __('home.Sweet Marias')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="left-arrow w-slider-arrow-left"><img src="{{asset('front-end/images/left-arrow.svg')}}" loading="lazy" alt="ecotact"></div>
                      <div class="right-arrow w-slider-arrow-right"><img src="{{asset('front-end/images/right-arrow.svg')}}" loading="lazy" alt="ecotact"></div>
                      <div class="slide-nav w-slider-nav w-slider-nav-invert w-round"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div data-w-tab="I&#x27;m farmer" class="w-tab-pane">
                <div class="main-wrapper framer-processor">
                  <div class="side-images-wrapper">
                    <div class="grid-left-image"><img src="{{asset('front-end/images/Farmer.svg')}}" loading="lazy" width="174" alt="ecotact" class="farmer-img-left"></div>
                  </div>
                  <div class="perfect-for-container" style="margin-top:45px;">
                    <div class="benefits-wrapper">
                      <div class="label-wrapper">
                        <div class="h2-w-icon">
                          <div class="h2-wrapper _w-subtitle"><img src="{{asset('front-end/images/h2-decor.svg')}}" loading="lazy" alt="ecotact" class="h2-icon">
                            <h2 class="h2 green">{!!__('home.farmer.Perfect')!!}</h2>
                          </div>
                        </div>
                        <div class="h2-subtitle-wrapper">
                          <div class="h2-subtitle">{!!__('home.farmer.Perfect.text')!!}</div>
                        </div>
                      </div>
                      <!-- mibile -->
                      <div class="section benefits-multiply mobile-vs" style="padding-top: 30px; margin-top:15px;">
                        <div class="main-wrapper">
                          <div class="benefits-wrapper">
                            <div class="label-wrapper">
                              <div class="h2-wrapper _w-subtitle">
                                <h2 class="h2 green">{!!__('home.Benefits')!!}</h2>
                              </div>
                            </div>
                            <div class="benefit-cards">
                              <div class="benefits-card"><img src="{{asset('front-end/images/card-leaf.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green">{!!__('home.Diversity')!!}</h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Diversity.text')!!}</div>
                                </div>
                              </div>
                              <div class="benefits-card"><img src="{{asset('front-end/images/card-leaf.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green">{!!__('home.Affordability')!!}</h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Affordability.text')!!}</div>
                                </div>
                              </div>
                              <div class="benefits-card"><img src="{{asset('front-end/images/card-leaf.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green">{!!__('home.Delivery')!!}</h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Delivery.text')!!}<br></div>
                                </div>
                              </div>
                              <div class="benefits-card"><img src="{{asset('front-end/images/card-leaf.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green"><strong>{!!__('home.Shelf-life')!!}</strong><br></h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Shelf-life.text')!!}<br></div>
                                </div>
                              </div>
                              <div id="w-node-ffa1f878-4fb4-c723-1c96-8117982afa2b-e97b72a1" class="benefits-card"><img src="{{asset('front-end/images/card-leaf.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green"><strong>{!!__('home.Sustainability')!!}</strong><br></h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Sustainability.text')!!}<br></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- mibile -->
                      <div class="benefits-list">
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.farmer.point1') }}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.farmer.point2') }}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.farmer.point3') }}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.farmer.point7') }}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.farmer.point4') }}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.farmer.point5') }}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.farmer.point6') }}</div>
                        </div>
                      </div>
                    </div>
                    <div class="divider accent"></div>
                  </div>
                  <div class="ideal-products-container">
                    <div class="label-wrapper products">
                      <div class="h2-wrapper">
                        <h2 class="h2 green">{{__('home.ideal') }}</h2>
                      </div>
                      <div class="h3-wrapper center">
                        <h3 class="h3">{{__('home.idealtext2') }}</h3>
                      </div>
                    </div>
                    <div class="div-block-3">
                       @foreach($farmers as $product)
                            
                           <a href="{{ route('productFullView',['category' => $product->categories()->first()->slug ,'slug' => $product->slug]) }}" class="product-card"><img src="{{ $product->base_img ? asset('product_images/large/'.$product->productImages()->where('ideal',1)->first()->url) :  asset('front-end/images/Mask-Group.png')}}" loading="lazy" alt="ecotact">
                            <!--<div class="cart-button"><img src="{{asset('front-end/images/cart.svg')}}" loading="lazy" width="20" height="20" alt="ecotact"></div>-->
                            <div class="product-card-description">
                              <div class="body-text center-white">{{ @$product->productDetails[0]['product_name'] }}<br></div>
                            </div>
                          </a>
                        @endforeach
                    </div>
                  </div>
                  <div class="testimonial-container">
                    <div data-animation="slide" data-duration="500" data-infinite="1" class="slider w-slider">
                      <div class="mask w-slider-mask">
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi2')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">Carlos Melen, Good Coffee Farms, {{ __('home.Japan-Guatemala')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi3')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">Stasi Baranoff, Uncommon Cacao, {{__('home.USA')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi1')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">JJ, RTC, {{ __('home.Rwanda')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/brown-cirlce-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi4')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green testimonial">Scott Bennett, H.A. Bennett, {{__('home.Australia')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Factory Manager, Olam Cam SA</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi5')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">Kyle Bellinger, Osito Coffee, {{__('home.USA')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi6')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">Thompson Owen, {{ __('home.Sweet Marias')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="left-arrow w-slider-arrow-left"><img src="{{asset('front-end/images/left-arrow.svg')}}" loading="lazy" alt="ecotact"></div>
                      <div class="right-arrow w-slider-arrow-right"><img src="{{asset('front-end/images/right-arrow.svg')}}" loading="lazy" alt="ecotact"></div>
                      <div class="slide-nav w-slider-nav w-slider-nav-invert w-round"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div data-w-tab="Importer and roaster" class="w-tab-pane">
                <div class="main-wrapper importer-roaster">
                  <div class="side-images-wrapper">
                    <div class="grid-left-image"><img src="{{asset('front-end/images/coffee.svg')}}" loading="lazy" width="130" alt="ecotact" class="image-14"></div>
                  </div>
                  <div class="perfect-for-container" style="margin-top:30px;">
                    <div class="benefits-wrapper">
                      <div class="label-wrapper">
                        <div class="h2-w-icon">
                          <div class="h2-wrapper _w-subtitle"><img src="{{asset('front-end/images/h2-decor.svg')}}" loading="lazy" alt="ecotact" class="h2-icon">
                            <h2 class="h2 green">{!!__('home.importer.Perfect')!!}</h2>
                          </div>
                        </div>
                        <div class="h2-subtitle-wrapper">
                          <div class="h2-subtitle">{!!__('home.importer.Perfect.text')!!}</div>
                        </div>
                      </div>
                      <!-- mibile -->
                      <div class="section benefits-multiply mobile-vs" style="padding-top: 30px; margin-top:15px;">
                        <div class="main-wrapper">
                          <div class="benefits-wrapper">
                            <div class="label-wrapper">
                              <div class="h2-wrapper _w-subtitle">
                                <h2 class="h2 green">{!!__('home.Benefits')!!}</h2>
                              </div>
                            </div>
                            <div class="benefit-cards">
                              <div class="benefits-card"><img src="{{asset('front-end/images/card-leaf.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green">{!!__('home.Diversity')!!}</h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Diversity.text')!!}</div>
                                </div>
                              </div>
                              <div class="benefits-card"><img src="{{asset('front-end/images/card-leaf.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green">{!!__('home.Affordability')!!}</h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Affordability.text')!!}</div>
                                </div>
                              </div>
                              <div class="benefits-card"><img src="{{asset('front-end/images/card-leaf.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green">{!!__('home.Delivery')!!}</h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Delivery.text')!!}<br></div>
                                </div>
                              </div>
                              <div class="benefits-card"><img src="{{asset('front-end/images/card-leaf.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green"><strong>{!!__('home.Shelf-life')!!}</strong><br></h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Shelf-life.text')!!}<br></div>
                                </div>
                              </div>
                              <div id="w-node-ffa1f878-4fb4-c723-1c96-8117982afa2b-e97b72a1" class="benefits-card"><img src="{{asset('front-end/images/card-leaf.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green"><strong>{!!__('home.Sustainability')!!}</strong><br></h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Sustainability.text')!!}<br></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- mibile -->
                      <div class="benefits-list">
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.importer.point1') }}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.importer.point2') }}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.importer.point3') }}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.importer.point4') }}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.importer.point5') }}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.importer.point6') }}</div>
                        </div>
                      </div>
                    </div>
                    <div class="divider accent"></div>
                  </div>
                  <div class="ideal-products-container">
                    <div class="label-wrapper products">
                      <div class="h2-wrapper">
                        <h2 class="h2 green">{{__('home.ideal') }}</h2>
                      </div>
                      <div class="h3-wrapper center">
                        <h3 class="h3">{{__('home.idealtext1') }}</h3>
                      </div>
                    </div>
                    <div class="div-block-3">
                      @foreach($importers as $product)
                            
                           <a href="{{ route('productFullView',['category' => $product->categories()->first()->slug ,'slug' => $product->slug]) }}" class="product-card"><img src="{{ $product->base_img ? asset('product_images/large/'.$product->productImages()->where('ideal',1)->first()->url) :  asset('front-end/images/Mask-Group.png')}}" loading="lazy" alt="ecotact">
                            <!--<div class="cart-button"><img src="{{asset('front-end/images/cart.svg')}}" loading="lazy" width="20" height="20" alt="ecotact"></div>-->
                            <div class="product-card-description">
                              <div class="body-text center-white">{{ @$product->productDetails[0]['product_name'] }}<br></div>
                            </div>
                          </a>
                        @endforeach
                    </div>
                  </div>
                  <div class="testimonial-container">
                    <div data-animation="slide" data-duration="500" data-infinite="1" class="slider w-slider">
                      <div class="mask w-slider-mask">
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/brown-cirlce-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi4')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green testimonial">Scott Bennett, H.A. Bennett, {{__('home.Australia')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Factory Manager, Olam Cam SA</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi5')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">Kyle Bellinger, Osito Coffee, {{__('home.USA')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi3')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">Stasi Baranoff, Uncommon Cacao, {{__('home.USA')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi6')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">Thompson Owen, {{ __('home.Sweet Marias')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi1')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">JJ, RTC, {{ __('home.Rwanda')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi2')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">Carlos Melen, Good Coffee Farms, {{ __('home.Japan-Guatemala')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="left-arrow w-slider-arrow-left"><img src="{{asset('front-end/images/left-arrow.svg')}}" loading="lazy" alt="ecotact"></div>
                      <div class="right-arrow w-slider-arrow-right"><img src="{{asset('front-end/images/right-arrow.svg')}}" loading="lazy" alt="ecotact"></div>
                      <div class="slide-nav w-slider-nav w-slider-nav-invert w-round"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div data-w-tab="Explorer" class="w-tab-pane">
                <div class="main-wrapper others">
                  <div class="side-images-wrapper">
                    <div class="grid-left-image mobile"><img src="{{asset('front-end/images/Explorer.svg')}}" loading="lazy" width="141" alt="ecotact" class="explorer-left-img"></div>
                  </div>
                  <div class="perfect-for-container" style="margin-top:35px;">
                    <div class="benefits-wrapper">
                      <div class="label-wrapper">
                        <div class="h2-w-icon">
                          <div class="h2-wrapper _w-subtitle"><img src="{{asset('front-end/images/h2-decor.svg')}}" loading="lazy" alt="ecotact" class="h2-icon">
                            <h2 class="h2 green others">{!!__('home.explorer.Perfect')!!}</h2>
                          </div>
                        </div>
                        <div class="h2-subtitle-wrapper">
                          <div class="h2-subtitle">{!!__('home.explorer.Perfect.text')!!}</div>
                        </div>
                      </div>
                      <!-- mibile -->
                      <div class="section benefits-multiply mobile-vs" style="padding-top: 30px; margin-top:15px;">
                        <div class="main-wrapper">
                          <div class="benefits-wrapper">
                            <div class="label-wrapper">
                              <div class="h2-wrapper _w-subtitle">
                                <h2 class="h2 green">{!!__('home.Benefits')!!}</h2>
                              </div>
                            </div>
                            <div class="benefit-cards">
                              <div class="benefits-card"><img src="{{asset('front-end/images/card-leaf.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green">{!!__('home.Diversity')!!}</h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Diversity.text')!!}</div>
                                </div>
                              </div>
                              <div class="benefits-card"><img src="{{asset('front-end/images/card-leaf.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green">{!!__('home.Affordability')!!}</h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Affordability.text')!!}</div>
                                </div>
                              </div>
                              <div class="benefits-card"><img src="{{asset('front-end/images/card-leaf.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green">{!!__('home.Delivery')!!}</h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Delivery.text')!!}<br></div>
                                </div>
                              </div>
                              <div class="benefits-card"><img src="{{asset('front-end/images/card-leaf.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green"><strong>{!!__('home.Shelf-life')!!}</strong><br></h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Shelf-life.text')!!}<br></div>
                                </div>
                              </div>
                              <div id="w-node-ffa1f878-4fb4-c723-1c96-8117982afa2b-e97b72a1" class="benefits-card"><img src="{{asset('front-end/images/card-leaf.svg')}}" loading="lazy" alt="ecotact" class="benefit-card-icon">
                                <div class="benefit-card-text">
                                  <div class="h3-wrapper">
                                    <h3 class="h3 green"><strong>{!!__('home.Sustainability')!!}</strong><br></h3>
                                  </div>
                                  <div class="body-text">{!!__('home.Sustainability.text')!!}<br></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- mibile -->
                      <div class="benefits-list">
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.explorer.point1') }}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.explorer.point2') }}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.explorer.point3') }}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.explorer.point4') }}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.explorer.point5') }}</div>
                        </div>
                        <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
                          <div class="body-text">{{__('home.explorer.point6') }}</div>
                        </div>
                      </div>
                    </div>
                    <div class="divider accent"></div>
                  </div>
                  <div class="ideal-products-container">
                    <div class="label-wrapper products">
                      <div class="h2-wrapper">
                        <h2 class="h2 green">{{__('home.ideal') }}</h2>
                      </div>
                      <div class="h3-wrapper center">
                        <h3 class="h3">{{__('home.idealtext1') }}</h3>
                      </div>
                    </div>
                    <div class="div-block-3">
                      @foreach($explorers as $product)
                            
                           <a href="{{ route('productFullView',['category' => $product->categories()->first()->slug ,'slug' => $product->slug]) }}" class="product-card"><img src="{{ $product->base_img ? asset('product_images/large/'.$product->productImages()->where('ideal',1)->first()->url) :  asset('front-end/images/Mask-Group.png')}}" loading="lazy" alt="ecotact">
                            <!--<div class="cart-button"><img src="{{asset('front-end/images/cart.svg')}}" loading="lazy" width="20" height="20" alt="ecotact"></div>-->
                            <div class="product-card-description">
                              <div class="body-text center-white">{{ @$product->productDetails[0]['product_name'] }}<br></div>
                            </div>
                          </a>
                        @endforeach
                    </div>
                  </div>
                  <div class="testimonial-container">
                    <div data-animation="slide" data-duration="500" data-infinite="1" class="slider w-slider">
                      <div class="mask w-slider-mask">
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi6')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">Thompson Owen, {{ __('home.Sweet Marias')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi1')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">JJ, RTC, {{ __('home.Rwanda')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi2')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">Carlos Melen, Good Coffee Farms, {{ __('home.Japan-Guatemala')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi3')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">Stasi Baranoff, Uncommon Cacao, {{__('home.USA')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/brown-cirlce-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi4')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green testimonial">Scott Bennett, H.A. Bennett, {{__('home.Australia')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Factory Manager, Olam Cam SA</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="slide w-slide">
                          <div class="testimonial-wrapper">
                            <div class="testimonial-content">
                              <!--<div class="testimonial-image"><img src="{{asset('front-end/images/green-circle-bg.png')}}" loading="lazy" width="100" alt="ecotact"></div>-->
                              <div class="testimonial-text" style="text-align:center">
                                <div class="benefit-card-text">
                                  <div class="body-text">{!!__('home.testi5')!!}</div>
                                  <div class="h3-wrapper testimonial-name">
                                    <h3 class="h3 green">Kyle Bellinger, Osito Coffee, {{__('home.USA')}}</h3>
                                  </div>
                                  <!--<div class="title-caption">Scott Bennett, H.A. Bennett, Australia</div>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="left-arrow w-slider-arrow-left"><img src="{{asset('front-end/images/left-arrow.svg')}}" loading="lazy" alt="ecotact"></div>
                      <div class="right-arrow w-slider-arrow-right"><img src="{{asset('front-end/images/right-arrow.svg')}}" loading="lazy" alt="ecotact"></div>
                      <div class="slide-nav w-slider-nav w-slider-nav-invert w-round"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="divider"></div>
        <div class="solution-wrapper farmer">
          <div class="label-wrapper">
            <div class="h2-wrapper">
              <h2 class="h2 green">Globally trusted solution<br>for farm-freshness</h2>
            </div>
          </div>
          <div class="w-layout-grid brief-grid">
            <div class="left-grid">
              <div class="title-caption">IN BRIEF</div>
              <div class="body-text-wrapper">
                <div class="body-text">A global organisation offering sustainable and specialized storage solutions with the promiseto keep ‘farm-freshness’ intact. 9-layer hermetic packaging for specialty coffee, cocoa, rice, and more food grains.</div>
              </div>
              <a href="#" class="button accent w-button">Know More</a>
            </div>
            <div class="right-grid"><img src="{{asset('front-end/images/brief-img.png')}}" loading="lazy" srcset="{{asset('front-end/images/brief-img-p-500.png')}} 500w, {{asset('front-end/images/brief-img-p-800.png')}} 800w, {{asset('front-end/images/brief-img-p-1080.png')}} 1080w, {{asset('front-end/images/brief-img.png')}} 1140w" sizes="100vw" alt="ecotact"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section benefits-for-you">
    <div class="main-wrapper">
      <div class="perfect-for-container">
        <div class="benefits-wrapper">
          <div class="label-wrapper">
            <div class="h2-w-icon">
              <div class="h2-wrapper _w-subtitle"><img src="{{asset('front-end/images/h2-decor.svg')}}" loading="lazy" alt="ecotact" class="h2-icon">
                <h2 class="h2 green">Perfect for your produce</h2>
              </div>
            </div>
            <div class="h2-subtitle-wrapper">
              <div class="h2-subtitle">We have tailored our bags for your produce. Our bags keep food grains and coffee beans fresh for long without letting external forces affect their quality.</div>
            </div>
          </div>
          <div class="benefits-list">
            <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
              <div class="body-text">Keeps the aroma, moisture level, and water level of the grains intact.</div>
            </div>
            <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
              <div class="body-text">Parchment storage and aging of coffee.</div>
            </div>
            <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
              <div class="body-text">Fermentation of green coffee.</div>
            </div>
            <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
              <div class="body-text">Natural processing and honey processing.</div>
            </div>
            <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
              <div class="body-text">Higher cupping scores and better prices for the crop.</div>
            </div>
            <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
              <div class="body-text">No insecticide and pesticide used to preserve the crops.</div>
            </div>
            <div class="benefit-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">
              <div class="body-text">Avoids mold growth.</div>
            </div>
          </div>
        </div>
        <div class="divider accent"></div>
      </div>
      <div class="ideal-products-container">
        <div class="label-wrapper">
          <div class="h2-wrapper">
            <h2 class="h2 green">Food Grade packaging compliant<br>  to USFDA and EU regulations.</h2>
          </div>
        </div>
        <div class="div-block-3">
          <div class="product-card"><img src="{{asset('front-end/images/ecotact-40.png')}}" loading="lazy" alt="ecotact">
            <div class="cart-button"><img src="{{asset('front-end/images/cart.svg')}}" loading="lazy" width="20" height="20" alt="ecotact"></div>
            <div class="product-card-description">
              <div class="body-text center-white">Ecotact 40<br><strong>$000</strong></div>
            </div>
          </div>
          <div class="product-card"><img src="{{asset('front-end/images/ecotact-40.png')}}" loading="lazy" alt="ecotact">
            <div class="cart-button"><img src="{{asset('front-end/images/cart.svg')}}" loading="lazy" width="20" height="20" alt="ecotact"></div>
            <div class="product-card-description">
              <div class="body-text center-white">Ecotact 40<br><strong>$000</strong></div>
            </div>
          </div>
          <div class="product-card"><img src="{{asset('front-end/images/ecotact-40.png')}}" loading="lazy" alt="ecotact">
            <div class="cart-button"><img src="{{asset('front-end/images/cart.svg')}}" loading="lazy" width="20" height="20" alt="ecotact"></div>
            <div class="product-card-description">
              <div class="body-text center-white">Ecotact 40<br><strong>$000</strong></div>
            </div>
          </div>
          <div class="product-card"><img src="{{asset('front-end/images/ecotact-40.png')}}" loading="lazy" alt="ecotact">
            <div class="cart-button"><img src="{{asset('front-end/images/cart.svg')}}" loading="lazy" width="20" height="20" alt="ecotact"></div>
            <div class="product-card-description">
              <div class="body-text center-white">Ecotact 40<br><strong>$000</strong></div>
            </div>
          </div>
          <div class="product-card"><img src="{{asset('front-end/images/ecotact-40.png')}}" loading="lazy" alt="ecotact">
            <div class="cart-button"><img src="{{asset('front-end/images/cart.svg')}}" loading="lazy" width="20" height="20" alt="ecotact"></div>
            <div class="product-card-description">
              <div class="body-text center-white">Ecotact 40<br><strong>$000</strong></div>
            </div>
          </div>
        </div>
      </div>
      <div class="testimonial-container">
        <div data-animation="slide" data-duration="500" data-infinite="1" class="slider w-slider">
          <div class="mask w-slider-mask">
            <div class="slide w-slide">
              <div class="testimonial-wrapper">
                <div class="testimonial-content">
                  <div class="testimonial-image"><img src="{{asset('front-end/images/user-profile.png')}}" loading="lazy" width="100" height="100" alt="ecotact"></div>
                  <div class="testimonial-text">
                    <div class="benefit-card-text">
                      <div class="body-text">It’s wonderful that Ecotact products are available in most of the coffee origin countries. I feel their customer service is exemplary.</div>
                      <div class="h3-wrapper testimonial-name">
                        <h3 class="h3 green testimonial">GEORGE ABRAHAM</h3>
                      </div>
                      <div class="title-caption">Factory Manager, Olam Cam SA</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-slide">
              <div class="testimonial-wrapper">
                <div class="testimonial-content">
                  <div class="testimonial-image"><img src="{{asset('front-end/images/user-profile.png')}}" loading="lazy" alt="ecotact"></div>
                  <div class="testimonial-text">
                    <div class="benefit-card-text">
                      <div class="body-text">It’s wonderful that Ecotact products are available in most of the coffee origin countries. I feel their customer service is exemplary.</div>
                      <div class="h3-wrapper testimonial-name">
                        <h3 class="h3 green">GEORGE ABRAHAM</h3>
                      </div>
                      <div class="title-caption">Factory Manager, Olam Cam SA</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="left-arrow w-slider-arrow-left"><img src="{{asset('front-end/images/left-arrow.svg')}}" loading="lazy" alt="ecotact"></div>
          <div class="right-arrow w-slider-arrow-right"><img src="{{asset('front-end/images/right-arrow.svg')}}" loading="lazy" alt="ecotact"></div>
          <div class="slide-nav w-slider-nav w-slider-nav-invert w-round"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="section _0-0">
    <div class="main-wrapper">
      <div class="thoughts-updates-wrapper">
        <div id="w-node-a6d87f49-f159-7d7b-c58d-5be68b7162c2-e97b72a1" class="thoughts-text"><img src="{{asset('front-end/images/instagram-icon.png')}}" loading="lazy" width="38" alt="ecotact" class="image-4">
          <div class="h2-wrapper _w-subtitle">
            <h2 class="h2 green-left">{!! __('home.insta') !!}</h2>
          </div>
        </div>
        <div id="w-node-_3c16a67a-799d-5f21-27cc-92850faddf86-e97b72a1" class="thoughts-images"></div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/gh/stevenschobert/instafeed.js@2.0.0rc1/src/instafeed.min.js"></script>
    <script type="text/javascript">
	var userFeed = new Instafeed({
		get: 'user',
		target: "w-node-_3c16a67a-799d-5f21-27cc-92850faddf86-e97b72a1",
    	resolution: 'low_resolution',
		accessToken: 'IGQVJWS2kzd192TVZA4WWI1Q0ZAiYjlDQXBSQy1LWEpBcEhsUzBpeVpJRVFxLXVObkVuSlJhUTJ1WUtaYV9XblZAMeF84QTFDVG53b2tWd1ZA3QVF5SV9LWXc5V3FjcEdlOXR2WFJhTGU5QVlYSVR0akJ2SAZDZD',
		limit: 9,
		templateBoundaries: ['{','}'],
		template: '<a href="{link}"><img title="{caption}" src="{image}" class="insta-images" style="width:203.3px; height:auto;"/></a>',
		
	});
	userFeed.run();
	</script>
  <script>
    $('.tab-link').on('click', function(){
      tl = $(this).children('.drop-down-label').text();
      $('.processor-label').text(tl);
    });
  </script>
@stop

