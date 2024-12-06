@extends('layouts.front-layout')
@if(config('app.lang')->slug == 'en' || config('app.lang')->slug == 'in')
  @section('title', 'About Us | Green Coffee Bag Manufacturers | Envases Para Cafe')
  @section('description', 'As coffee bag manufacturer, we offer bolsas para sellar al vacio, 9-layer hermetic storage & packaging for green coffee and other grains to keep the freshness intact.')
  @section('keywords', 'coffee bag manufacturers,bolsas para sellar al vacio,envases para cafe')
@elseif(config('app.lang')->slug == 'sp')
  @section('title', 'About Us | Green Coffee Bag Manufacturers | Envases Para Cafe')
  @section('description', 'As coffee bag manufacturer, we offer bolsas para sellar al vacio, 9-layer hermetic storage & packaging for green coffee and other grains to keep the freshness intact.')
  @section('keywords', 'coffee bag manufacturers,bolsas para sellar al vacio,envases para cafe')

@endif


@section('content')

  @include('hamburger-dropdown')
  
  <style>
    .w-background-video{
        height: 640px;
    }
    .logo-wrapper img{
        max-height: 60px !important;
    }
    @media (max-width: 767px) {
        .w-background-video{
            height: 408px;
        }
    }
    @media (max-width: 420px) {
        .w-background-video{
            height: 280px;
        }
    }
  </style>
  
  <div class="section about-us">
    <div class="main-wrapper">
      <div class="banner-content-wrapper">
        <div class="title-caption-wrapper">
          <div class="title-caption center">{!! __('about.aboutUs')!!}</div>
        </div>
        <div class="h2-wrapper">
          <h1 class="h2 center white">{!! __('about.Foc')!!}</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="main-wrapper">
      <div class="story-content-wrapper">
        <div class="h2-wrapper">
          <h2 class="h2 green">{!! __('about.ourStory')!!}</h2>
        </div>
        <div class="body-text-wrapper center">
          <p class="body-text">{!! __('about.ourStoryTxt')!!}</p>
        </div>
      </div>
      <div style="padding-top:56.17021276595745%" class="video-2 w-video w-embed"><iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2FUAZuFabSa7k%3Ffeature%3Doembed&display_name=YouTube&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DUAZuFabSa7k&image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FUAZuFabSa7k%2Fhqdefault.jpg&key=96f1f04c5f4143bcb0f2e68c87d65feb&type=text%2Fhtml&schema=youtube" scrolling="no" title="YouTube embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe></div>
      <a target="_blank" href=" https://www.youtube.com/watch?v=9wvjbDjbyq8&t=21s"><div data-poster-url="https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/60780b1bb0d29ab972ab9185_Ecotact Banner Video (1)-poster-00001.jpg" data-video-urls="https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/60780b1bb0d29ab972ab9185_Ecotact Banner Video (1)-transcode.mp4,https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/60780b1bb0d29ab972ab9185_Ecotact Banner Video (1)-transcode.webm" data-autoplay="true" data-loop="true" data-wf-ignore="true" class="w-background-video w-background-video-atom"><video autoplay="" loop="" style="background-image:url(&quot;https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/60780b1bb0d29ab972ab9185_Ecotact Banner Video (1)-poster-00001.jpg&quot;)" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
          <!--<source src="https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/60780b1bb0d29ab972ab9185_Ecotact Banner Video (1)-transcode.mp4" data-wf-ignore="true">-->
          <!--<source src="https://uploads-ssl.webflow.com/603776ca03ae1a376b7b72a0/60780b1bb0d29ab972ab9185_Ecotact Banner Video (1)-transcode.webm" data-wf-ignore="true">-->
          <source src="front-end/images/video/homebanner.mp4" data-wf-ignore="true">
          <source src="front-end/images/video/homebanner.webm" data-wf-ignore="true">
        </video></div></a>
      <div class="multipled-grid-wrapper">
        <div class="w-layout-grid multipled-grid">
          <div class="trust-multipled-wrapper">
            <div class="h2-wrapper left">
              <h2 class="h2 green-left">{!! __('about.Trust')!!}</h2>
            </div>
            <div class="body-text-wrapper">
              <div class="body-text">{!! __('about.TrustTxt')!!}</div>
            </div>
          </div>
          <div id="w-node-e0a1309f-fd04-9f29-0312-e39357db3529-1a4aee94" class="value-multipled-wrapper">
            <div class="h2-wrapper left">
              <h2 class="h2 green-left">{!! __('about.Value')!!}</h2>
            </div>
            <div class="body-text-wrapper">
              <div class="body-text">{!! __('about.valueTxt')!!}</div>
            </div>
            <a href="{{route('sustainablity')}}" class="button accent w-button">{!! __('about.Our Recycling Solutions')!!}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="main-wrapper">
      <div class="management-container">
        <div class="management-text-wrapper">
          <div class="title-caption-wrapper">
            <div class="title-caption">{!! __('about.MANAGEMENT')!!}</div>
          </div>
          <div class="h2-wrapper">
            <h2 class="h2 center">{!! __('about.led')!!}</h2>
          </div>
        </div>
        <div class="management-grid-wrapper">
          <div class="w-layout-grid management-grid">
            <div class="name-main-wrapper"><img src="{{asset('front-end/images/Hanuman-Jain.png')}}" loading="lazy" width="150" alt="ecotactbags" class="image-6">
              <div class="body-text-wrapper center">
                <div class="body-text">&quot;{!! __('about.ledTxt')!!}&quot;</div>
              </div>
              <div class="div-block-4">
                <div class="h3-wrapper">
                  <h3 class="heading">Hanuman Jain</h3>
                </div>
                <div class="sub-text-wrapper">
                  <div class="sub-text">CEO</div>
                </div>
              </div>
            </div>
            <div class="name-main-wrapper"><img src="{{asset('front-end/images/Navneet-Jain.png')}}" loading="lazy" width="150" alt="ecotactbags" class="image-6">
              <div class="body-text-wrapper center">
                <div class="body-text">&quot;{!! __('about.ledTxt2')!!}&quot;</div>
              </div>
              <div class="div-block-4">
                <div class="h3-wrapper">
                  <h3 class="heading">Navneet Jain</h3>
                </div>
                <div class="sub-text-wrapper">
                  <div class="sub-text">{!! __('about.role2')!!}</div>
                </div>
              </div>
            </div>
            <div class="name-main-wrapper"><img src="{{asset('front-end/images/Himanshu-Jain.png')}}" loading="lazy" width="150" alt="ecotactbags" class="image-6">
              <div class="body-text-wrapper center">
                <div class="body-text">&quot;{!! __('about.ledTxt3')!!}&quot;</div>
              </div>
              <div class="div-block-4">
                <div class="h3-wrapper">
                  <h3 class="heading">Himanshu Baid</h3>
                </div>
                <div class="sub-text-wrapper">
                  <div class="sub-text">{!! __('about.role3')!!}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section _0-0">
    <div class="main-wrapper">
      <div class="w-layout-grid grid">
        <div class="infrastructure-left-wrapper">
          <div class="h2-wrapper left">
            <h2 class="h2 green-left">{!! __('about.infa')!!}</h2>
          </div>
          <div class="body-text-wrapper">
            <div class="body-text">{!! __('about.infaTxt')!!}</div>
          </div>
        </div>
        <div id="w-node-_949dbf8e-5698-3ae8-289c-ed69ab2ccae5-1a4aee94" class="infrastructure-right-wrapper"><img src="{{asset('front-end/images/about-439.png')}}" loading="lazy" height="366" width="388" srcset="{{asset('front-end/images/about-439-p-500.png')}} 500w, {{asset('front-end/images/about-439.png')}} 785w" sizes="(max-width: 479px) 94vw, 388px" alt="ecotactbags"></div>
        <div id="w-node-a4e6b800-7393-322e-4f59-642b937b9edf-1a4aee94" class="quality-left-wrapper"><img src="{{asset('front-end/images/Group-470.png')}}" loading="lazy" sizes="(max-width: 479px) 94vw, 388px" width="388" srcset="{{asset('front-end/images/Group-470-p-500.png')}} 500w, {{asset('front-end/images/Group-470.png')}} 716w" alt="ecotactbags"></div>
        <div class="quality-right-wrapper">
          <div class="h2-wrapper left">
            <h2 class="h2 green-left">{!! __('about.quali')!!}</h2>
          </div>
          <div class="body-text-wrapper">
            <div class="body-text">{!! __('about.qualiTxt')!!}</div>
          </div>
          <div class="logo-wrapper">
            <div class="logo-wp"><img src="{{asset('front-end/images/Frame1.svg')}}" loading="lazy" width="80" alt="ecotactbags"></div><img src="{{asset('front-end/images/brc-logo.png')}}" loading="lazy"  alt="ecotactbags" class="image-9">
            <div class="logo-wp"><img src="{{asset('front-end/images/image-3.svg')}}" loading="lazy" alt="ecotactbags"></div>
            
            <div class="mycert" style="margin-left: 25px; cursor: zoom-in;">
                <a href="{{asset('front-end/images/WhatsApp Image 2021-07-27 at 3.31.33 PM.jpeg')}}" data-lightbox="image-1" style="cursor: zoom-in;">
                    <img src="{{asset('front-end/images/WhatsApp Image 2021-07-27 at 3.31.33 PM.jpeg')}}" alt="Certificate of Analysis 2" style="cursor: zoom-in;">
                </a>
                
                <a href="{{asset('front-end/images/Report-2.jpg')}}" data-lightbox="image-1" style="cursor: zoom-in;">
                    <img src="{{asset('front-end/images/Report-2.jpg')}}" alt="Certificate of Analysis 1">
                </a>
                
            </div>
            
            <!--<div class="certificates-wp">-->
            <!--  <div data-w-id="f95272f3-49f4-8ced-4c0a-579f1b36ade9" class="certificate-logo-wp"><img src="{{asset('front-end/images/Report-1-1.jpg')}}" loading="lazy" width="71" sizes="(max-width: 1279px) 65px, (max-width: 1439px) 5vw, 65px" srcset="{{asset('front-end/images/Report-1-1-p-500.jpeg')}} 500w, {{asset('front-end/images/Report-1-1-p-800.jpeg')}} 800w, {{asset('front-end/images/Report-1-1-p-1080.jpeg')}} 1080w, {{asset('front-end/images/Report-1-1.jpg')}} 1133w" alt="ecotact" class="image-30"><img src="{{asset('front-end/images/Report-2.jpg')}}" loading="lazy" width="71" sizes="(max-width: 1279px) 65px, (max-width: 1439px) 5vw, 65px" srcset="{{asset('front-end/images/Report-2-p-500.jpeg')}} 500w, {{asset('front-end/images/Report-2-p-800.jpeg')}} 800w, {{asset('front-end/images/Report-2-p-1080.jpeg')}} 1080w, {{asset('front-end/images/Report-2.jpg')}} 1131w" alt="ecotact" class="image-30"></div>-->
            <!--  <div class="cerificate-1-img">-->
            <!--    <div class="mag-img-wp"><img src="{{asset('front-end/images/WhatsApp-Image-2021-07-07-at-6.24.49-PM.jpeg')}}" loading="lazy" sizes="100vw" srcset="{{asset('front-end/images/WhatsApp-Image-2021-07-07-at-6.24.49-PM.jpeg')}} 500w, {{asset('front-end/images/WhatsApp-Image-2021-07-07-at-6.24.49-PM.jpeg')}} 800w, {{asset('front-end/images/WhatsApp-Image-2021-07-07-at-6.24.49-PM.jpeg')}} 906w" alt="ecotact" class="image-32"><img src="{{asset('front-end/images/Report-2.jpg')}}" loading="lazy" sizes="100vw" srcset="{{asset('front-end/images/Report-2-p-500.jpeg')}} 500w, {{asset('front-end/images/Report-2-p-800.jpeg')}} 800w, {{asset('front-end/images/Report-2-p-1080.jpeg')}} 1080w, {{asset('front-end/images/Report-2.jpg')}} 1131w" alt="ecotact" class="image-32"></div>-->
            <!--    <div data-w-id="aeeaebc5-173e-53f2-37e4-bf60e28d6e01" class="cross"><img src="{{asset('front-end/images/Vector_5.svg')}}" loading="lazy" width="22" alt="ecotact" class="image-31"></div>-->
            <!--  </div>-->
            <!--</div>-->
        </div>
      </div>
    </div>
  </div>
  @stop