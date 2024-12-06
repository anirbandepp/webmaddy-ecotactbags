<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Tue Apr 20 2021 15:06:43 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="606452fca408b730583df039" data-wf-site="603776ca03ae1a376b7b72a0">
<head>
  <meta charset="utf-8">
  <title>FAQ - Ecotact | Frequently Asked Questions (FAQ)</title>
  <meta content="FAQ" property="og:title">
  <meta content="FAQ" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta name="description" content="Explore frequently asked questions (FAQ) about Ecotact hermetic packaging and storage solution pricing, initiatives, products, and more">
    <meta name="keywords" content="Faq, frequently asked questions, ecotact">
  <meta content="Webflow" name="generator">
  <link href="{{asset('front-end/css/normalize.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('front-end/css/webflow.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('front-end/css/webflow4.css?v=1.2')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('front-end/css/ecotact.webflow.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('front-end/css/ecotact-new.webflow.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('front-end/css/ecotact.webflownew2.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('front-end/css/ecotact.webflownew3.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('front-end/css/ecotact.webflownew4.css')}}" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Work Sans:regular,500,600,700,800,900"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="{{asset('front-end/images/favicon.ico')}}" rel="shortcut icon" type="image/x-icon">
  <link href="{{asset('front-end/images/webclip.png')}}" rel="apple-touch-icon">
  <style>
    .green-text{
        color:#0c6a35;
        font-weight: 500;
    }
    .mailer {
        position: fixed;
        left: 1%;
        top: auto;
        right: auto;
        bottom: 20%;
    }
    .visible-xs {
        display: none;
    }
    .tab-hide {
        display: none !important;
    }
    @media only screen and (max-width : 768px) {
        .w-slider-nav {
            position: initial;
            margin-top: 0;
        }
        .hidden-xs {
            display: none !important;
        }
        .visible-xs {
            display: block !important;
        }
        .i-m-an {
            font-size: 18px;
        }
        .i-m-a {
            font-size: 18px;
        }
        .processor-label {
            font-size: 18px;
        }
        #contact-banner {
               background-image: url('front-end/images/contact_bg_mobile.jpg');
        }
    }
</style>
</head>
 <body class="body">
    <div data-collapse="medium" data-animation="default" data-duration="400" role="banner" class="navbar w-nav">
      <div class="navbar-wrapper">
        <a href="{{route('home')}}" aria-current="page" class="home w-nav-brand w--current">
            <!--<img src="{{asset('front-end/images/logo-white.svg')}}" loading="lazy" width="180" alt="ecotact" class="logo-white">-->
            
            @if(config('app.lang')->slug == 'sp')						
                <img src="{{asset('front-end/images/Ecotact Spanish Logo-01-white.svg')}}" loading="lazy" width="180" alt="ecotact" class="logo-white">
		    @elseif(config('app.lang')->slug == 'en')
		        <img src="{{asset('front-end/images/logo-white.svg')}}" loading="lazy" width="180" alt="ecotact" class="logo-white">
		    @else
		    
		    @endif
		    
		    @if(config('app.lang')->slug == 'sp')						
                <img src="{{asset('front-end/images/Ecotact Spanish Logo-01-green.svg')}}" loading="lazy" width="180" alt="ecotact" class="logo-green" style="top: -18px;">
		    @elseif(config('app.lang')->slug == 'en')
		        <img src="{{asset('front-end/images/logo-green.svg')}}" loading="lazy" width="180" alt="ecotact" class="logo-green">
		    @else
		    
		    @endif
						    
           </a> 
            
            
        <div class="nav-menu-wrapper">
          <nav role="navigation" class="nav-menu w-nav-menu">
            <div class="nav-link-wrapper">
              <a href="{{route('about-us')}}" class="nav-link w-nav-link">{{__('home.about') }}</a>
            </div>
            <div class="nav-link-wrapper product-custom">
              <a href="{{route('productsList',['slug' => 'packaging'])}}" class="nav-link w-nav-link">{{__('home.products') }}</a>
              <div class="arrow-wrapper"><img src="{{asset('front-end/images/arrow-down-white.svg')}}" loading="lazy" alt="ecotact" class="arrow-white"><img src="{{asset('front-end/images/arrow-down-green.svg')}}" loading="lazy" alt="ecotact" class="arrow-green"></div>
            </div>
            <div data-hover="" data-delay="0" class="w-dropdown">
              <div class="dropdown-toggle-2 w-dropdown-toggle">
                <div data-w-id="fc090aaf-a14b-f83d-b879-172db3c40191" class="icon-2 w-icon-dropdown-toggle"></div>
                <a href="#" class="nav-link">{{__('home.products') }}</a>
              </div>
              <nav class="dropdown-list w-dropdown-list">
                <a href="{{route('productsList',['slug' => 'packaging'])}}" class="dropdown-link w-dropdown-link">{{__('productdetails.packaging')}}</a>
                <a href="{{route('productsList',['slug' => 'storage'])}}" class="dropdown-link w-dropdown-link">{{__('productdetails.storage')}}</a>
              </nav>
            </div>
            <div class="nav-link-wrapper">
              <a href="{{route('sustainablity')}}" class="nav-link w-nav-link">{{__('home.sustain') }}</a>
            </div>
            <div class="nav-link-wrapper">
              <a href="{{route('csr-activities')}}" class="nav-link w-nav-link">{{__('home.initiatives') }}</a>
            </div>
            <div class="nav-link-wrapper">
              <a href="{{route('blog')}}" class="nav-link w-nav-link">{{__('home.blog') }}</a>
            </div>
          </nav>
          <div class="nav-icons-wrapper">
            <div class="nav-icons-white">
              <a href="{{route('globe')}}" class="w-inline-block"><img src="{{asset('front-end/images/globe.svg')}}" loading="lazy" alt="ecotact" class="nav-img"></a>
              <!--<a href="#" class="w-inline-block"><img src="{{asset('front-end/images/cart.svg')}}" loading="lazy" alt="ecotact" class="nav-img"></a>-->
              <!--<a href="#" class="w-inline-block"><img src="{{asset('front-end/images/me.svg')}}" loading="lazy" alt="ecotact" class="nav-img"></a>-->
              <a href="{{route('contact')}}" class="w-inline-block"><img src="{{asset('front-end/images/email.svg')}}" loading="lazy" alt="ecotact" class="nav-img"></a>
            </div>
            <div class="nav-icons-green">
              <a href="{{route('globe')}}" class="w-inline-block"><img src="{{asset('front-end/images/global-green.svg')}}" loading="lazy" alt="ecotact" class="nav-img"></a>
              <!--<a href="#" class="w-inline-block"><img src="{{asset('front-end/images/cart-green.svg')}}" loading="lazy" alt="ecotact" class="nav-img"></a>-->
              <!--<a href="#" class="w-inline-block"><img src="{{asset('front-end/images/login-green.svg')}}" loading="lazy" alt="ecotact" class="nav-img"></a>-->
              <a href="{{route('contact')}}" class="w-inline-block"><img src="{{asset('front-end/images/mail-green.svg')}}" loading="lazy" alt="ecotact" class="nav-img"></a>
            </div>
          </div>
          <div data-hover="" data-delay="0" class="w-dropdown">
              <div class="dropdown-toggle-2 w-dropdown-toggle">
                <div data-w-id="fc090aaf-a14b-f83d-b879-172db3c40191" class="icon-2 w-icon-dropdown-toggle" style="margin-top: 11px;"></div>
                <a href="#" class="nav-link"><img src="{{asset('languages/'.config('app.lang')->image)}}"" loading="lazy" width="30" alt="ecotact"></a>
              </div>
              <nav class="dropdown-list w-dropdown-list">
                    @foreach($frontLanguages as $frontLanguage)
                        <a href="{{route('setLanguageRoute',['id' => $frontLanguage->id])}}" class="dropdown-link w-dropdown-link" style="padding:0;text-align:center;"><img src="{{asset('languages/'.$frontLanguage->image)}}" loading="lazy" width="30" alt="ecotact"></a>
                    @endforeach
              </nav>
            </div>
          
          
          <!--<div class="nav-link-wrapper lang">-->
          <!--      <a href="{{route('setLanguageRoute',['id' => 1])}}"><img src="{{asset('front-end/images/united-kingdom-01.svg')}}" loading="lazy" width="30" alt="ecotact"></a>-->
          <!--      <a href="{{route('setLanguageRoute',['id' => 1])}}"><div class="arrow-wrapper"><img src="{{asset('front-end/images/arrow-down-white.svg')}}" loading="lazy" alt="ecotact" class="arrow-white"><img src="{{asset('front-end/images/arrow-down-green.svg')}}" loading="lazy" alt="ecotact" class="arrow-green"></div></a>-->
          <!--      <a href="{{route('setLanguageRoute',['id' => 2])}}"><img src="http://networkdemo.in/ecotact/public/languages/rY3M0rArcK.png" loading="lazy" width="30" alt="ecotact"></a>-->
                
          <!--  <a href="{{route('setLanguageRoute',['id' => 2])}}"><div class="arrow-wrapper"><img src="{{asset('front-end/images/arrow-down-white.svg')}}" loading="lazy" alt="ecotact" class="arrow-white"><img src="{{asset('front-end/images/arrow-down-green.svg')}}" loading="lazy" alt="ecotact" class="arrow-green"></div></a>-->
          <!--</div>-->
          <div data-w-id="245be0d6-6d21-388e-849c-25a27baf53ce" class="hamburger-menu"><img src="{{asset('front-end/images/hamburger-menu-1.svg')}}" loading="lazy" width="29" data-w-id="928413a8-29b9-a4e8-25f9-cec1ed7c397d" alt="ecotact" class="image-22"><img src="{{asset('front-end/images/hamburger-menu-2.svg')}}" loading="lazy" width="29" alt="ecotact" class="image-21"></div>
        </div>
      </div>
      
    </div>
    
  <div class="section sustainability">
    <div class="main-wrapper">
      <div class="banner-content-wrapper">
          <div class="title-caption-wrapper">
          <div class="title-caption center">{{ __('privacy.ecotact') }}</div>
        </div>
        <div class="h2-wrapper white">
          <h2 class="h2 center">{!! __('faq.faq') !!}</h2>
        </div>
      </div>
    </div>
  </div>
  
  <div class="section">
    <div class="main-wrapper">
      <div class="faq">
        <div class="faq-label-wrapper">
          <div class="h2-wrapper contact">
            <h2 class="h2">{!! __('faq.PRODUCT') !!}</h2>
          </div><img src="{{asset('front-end/images/Vector_1.svg')}}" loading="lazy" style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);transform-style:preserve-3d" data-w-id="a51cd362-dbf3-58db-f73c-5f35abb8fd6c" alt="ecotact" class="arrow">
        </div>
        <div style="display:none" class="questions product">
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus1') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans1') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus2') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans2') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus3') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans3') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus4') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans4') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus5') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans5') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus6') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans6') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus7') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans7') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus8') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans8') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus9') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans9') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus10') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text"> {!! __('faq.ans10') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus11') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans11') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus12') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans12') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus13') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans13') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus14') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text"> {!! __('faq.ans14') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus15') !!}<strong></strong></div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans15') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus16') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans16') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus17') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans17') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus18') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans18') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus19') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans19') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus20') !!} </div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans20') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus21') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans21') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus22') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans22') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus23') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans23') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus24') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans24') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">•{!! __('faq.qus25') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans25') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus26') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans26') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus27') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans27') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus28') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans28') !!}</div>
            </div>
          </div>
        </div>
      </div>
      <div class="faq">
        <div class="faq-label-wrapper">
          <div class="h2-wrapper contact">
            <h2 class="h2">{!! __('faq.PRICING') !!}</h2>
          </div><img src="{{asset('front-end/images/Vector_1.svg')}}" loading="lazy" style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);transform-style:preserve-3d" data-w-id="5ffda828-652c-d0d6-357e-ec5cb5c7877d" alt="ecotact" class="arrow">
        </div>
        <div style="display:none" class="questions pricing">
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus29') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans29') !!}.</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus30') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans30') !!}</div>
            </div>
          </div>
        </div>
      </div>
      <div class="faq">
        <div class="faq-label-wrapper">
          <div class="h2-wrapper contact">
            <h2 class="h2">{!! __('faq.BUYING') !!}</h2>
          </div><img src="{{asset('front-end/images/Vector_1.svg')}}" loading="lazy" style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);transform-style:preserve-3d" data-w-id="49680fba-6a4e-d98d-6a25-c0cde483419f" alt="ecotact" class="arrow">
        </div>
        <div style="display:none" class="questions buying">
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus31') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans31') !!}</a>
              </div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus32') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans32') !!}</a>
              </div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus33')!!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans33')!!}</a>
              </div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus34')!!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans34')!!}</a>
              </div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus35')!!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans35')!!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus36')!!} </div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans36')!!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus37')!!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans37')!!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus38')!!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text"> {!! __('faq.ans38')!!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus39')!!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans39')!!}</a>
              </div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus40')!!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans41')!!}</div>
            </div>
          </div>
        </div>
      </div>
      <div class="faq">
        <div class="faq-label-wrapper">
          <div class="h2-wrapper contact">
            <h2 class="h2">{!! __('faq.CANCELLATION') !!}</h2>
          </div><img src="{{asset('front-end/images/Vector_1.svg')}}" loading="lazy" style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);transform-style:preserve-3d" data-w-id="244468bc-44a2-5d14-1cd8-0aa30cb25ea8" alt="ecotact" class="arrow">
        </div>
        <div style="display:none" class="questions refunds">
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus42') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans42') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus43') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans43') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus44') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text"> {!! __('faq.ans44') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus45') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text"> {!! __('faq.ans45') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus46') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text"> {!! __('faq.ans46') !!}</div>
            </div>
          </div>
        </div>
      </div>
      <div class="faq">
        <div class="faq-label-wrapper">
          <div class="h2-wrapper contact">
            <h2 class="h2">{!! __('faq.SUSTAINABILITY') !!}</h2>
          </div><img src="{{asset('front-end/images/Vector_1.svg')}}" loading="lazy" style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0deg) rotateY(0) rotateZ(0) skew(0, 0);transform-style:preserve-3d" data-w-id="87e601b1-7ed2-d5b1-4919-9cdaf7529a00" alt="ecotact" class="arrow">
        </div>
        <div style="display:none" class="questions sustainability">
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus47') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans47') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus48') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text"> {!! __('faq.ans48') !!}</div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus49') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text">{!! __('faq.ans49') !!}
              </div>
            </div>
          </div>
          <div class="faq-content">
            <div class="title-wrapper">
              <div class="title">• {!! __('faq.qus50') !!}</div>
            </div>
            <div class="body-text-wrapper faqs">
              <div class="body-text"> {!! __('faq.ans50') !!} </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<div class="section footer">
      <div class="main-wrapper">
        <div class="footer-menu">
          <div class="logo-text">
              <!--<img src="{{asset('front-end/images/logo-green.svg')}}" loading="lazy" alt="ecotact" class="footer-logo">-->
              @if(config('app.lang')->slug == 'sp')						
                <img src="{{asset('front-end/images/Ecotact Spanish Logo-01-green.svg')}}" loading="lazy" alt="ecotact" class="footer-logo">
    		    @elseif(config('app.lang')->slug == 'en')
    		        <img src="{{asset('front-end/images/logo-green.svg')}}" loading="lazy" alt="ecotact" class="footer-logo">
    		    @else
    		    
    		    @endif
            <div class="body-text">{{__('home.focuased')}}</div>
          </div>
          <div class="footer-nav-menu">
            <div class="logo-text">
              <div class="footer-menu-title">{{__('home.about') }}</div>
              <a href="{{route('about-us')}}" class="link">{{__('home.products') }}</a>
              <a href="{{route('productsList',['slug' => 'packaging'])}}" class="link">{{__('home.sustain') }}</a>
              <a href="{{route('sustainablity')}}" class="link">{{__('home.initiatives') }}</a>
              <a href="{{route('csr-activities')}}" class="link">{{__('home.blog') }}</a>
            </div>
            <div class="logo-text">
              <div class="footer-menu-title place-holder">{{__('home.enquire') }}</div>
              <a href="{{route('blog')}}" class="link">{{__('home.blog') }}</a>
              <a href="#" class="link">{{__('home.enquire') }}</a>
            </div>
            <div class="logo-text">
              <div class="footer-menu-title">{{__('home.contact') }}</div>
              <a href="#" class="link">+91 11 47028340</a>
              <a href="#" class="link">+91 11 23938035</a>
              <a href="mailto:info@aashirvad.in" class="link">info@aashirvad.in</a>
              <div class="social-icons">
                <a href="https://www.facebook.com/ecotact" class="w-inline-block"><img src="{{asset('front-end/images/Facebook.svg')}}" loading="lazy" alt="ecotact" class="image-5"></a>
                <a href="https://www.youtube.com/channel/UCpmDEdpAA2NLAQk9_uaBAQA" class="w-inline-block"><img src="{{asset('front-end/images/Vector_2.svg')}}" loading="lazy" width="34" alt="ecotact" class="image-5"></a>
                <a href="https://www.linkedin.com/company/ecotact/" class="w-inline-block"><img src="{{asset('front-end/images/Vector.svg')}}" loading="lazy" alt="ecotact" class="image-5"></a>
                <a href="https://www.instagram.com/ecotact/" class="w-inline-block"><img src="{{asset('front-end/images/Vector_3.svg')}}" loading="lazy" alt="ecotact" class="image-5"></a>
              </div>
            </div>
          </div>
        </div>
        <div class="divider footer"></div>
        <div class="footer-privacy">
          <div class="text-block">{{__('home.copyright') }}</div>
          <div class="footer-links">
            <a href="{{route('faq')}}" class="footer-link">{{__('home.faqs') }}</a>
            <div class="link-divider"></div>
            <a href="{{route('privacy')}}" class="footer-link">{{__('home.privacy') }}</a>
            <div class="link-divider"></div>
            <a href="{{route('refunds-and-returns')}}" class="footer-link">{{__('home.refunds') }}</a>
            <div class="link-divider"></div>
            <a href="{{route('terms')}}" class="footer-link">{{__('home.terms') }}</a>
          </div>
        </div>
      </div>
      <a target="_blank" href="https://api.whatsapp.com/send?phone=918448848948" class="whatsapp w-inline-block"><img src="{{asset('front-end/images/whatsapp-icon.svg')}}" loading="lazy" alt="ecotact"></a>
    </div>
    <div class="mailer w-inline-block">
        @if(config('app.lang')->slug == 'sp')						
            <script type="text/javascript" src="https://static.mailerlite.com/data/webforms/4251028/s6u3a2.js?v8"></script>
	    @else
	        <script type="text/javascript" src="https://static.mailerlite.com/data/webforms/374260/m5y0q5.js?v7"></script>
	    @endif
    </div>
    <img src="{{asset('front-end/images/footer-bg.png')}}" loading="lazy" sizes="100vw" srcset="{{asset('front-end/images/footer-bg-p-500.png')}} 500w, {{asset('front-end/images/footer-bg-p-800.png')}} 800w, {{asset('front-end/images/footer-bg-p-1080.png')}} 1080w, {{asset('front-end/images/footer-bg-p-1600.png ')}}1600w, {{asset('front-end/images/footer-bg-p-2000.png')}} 2000w, {{asset('front-end/images/footer-bg-p-2600.png')}} 2600w, {{asset('front-end/images/footer-bg.png')}} 5120w" alt="ecotact" class="footer-img">
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=603776ca03ae1a376b7b72a0" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{asset('front-end/js/webflow.js')}}" type="text/javascript"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js" ></script>
         
    @include('layouts.front_error')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{{asset('front-end/js/validation.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front-end/js/angular.js?v=0.1') }}?v=0.1"></script>
    
    <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60b884706699c7280daa7348/1f78cami4';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

  </body>
</html>