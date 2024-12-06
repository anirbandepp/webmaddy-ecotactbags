<!DOCTYPE html>
<html lang="en">
    <script src='//in.fw-cdn.com/30140609/89503.js' chat='true'></script>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="ecotact" name="generator">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!--  Essential META Tags -->
    <meta property="og:title" content="@yield('title')">
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ asset('assets/front/img/logo-green.svg')}}">
    <meta property="og:url" content="{{\URL::current()}}">
    <meta name="twitter:card" content="@yield('title')">
    
    <!--  Non-Essential, But Recommended -->
    <meta property="og:description" content="@yield('description')">
    <meta property="og:site_name" content="Ecotact Bags">
    <meta name="twitter:image:alt" content="Ecotact Bags">
     


    <link rel="canonical" href="{{URL::current()}}" />
    <link rel="shortcut icon" type="" href="{{ asset('assets/front/img/index.ico')}}"/>
    <!-- Bootstrap -->
    <link href="{{ asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom css -->
    <link href="{{ asset('assets/front/css/custom.css?v=23.3') }}" rel="stylesheet">
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v2.8.5/dist/cookieconsent.css" rel="stylesheet" media="all">
    
    <style>
        .inputField {
            width: 30px;
            display: inline-block;
            height: 30px;
            text-align: center;
            font-size: 17px;
        }
        .main-header .custom-dropdown {
            width: 277px;
        }
        .main-header .navbar-nav li a {
            font-size: 0.8em;
        }
    </style>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "WebSite",
      "name": "Ecotact Bags",
      "url": "https://www.ecotactbags.com/"
    }
    </script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Ecotact Bags",
      "url": "https://www.ecotactbags.com/",
      "logo": "https://www.ecotactbags.com/front-end/images/logo-green.svg",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+91 11 47028340, +91 11 23938035",
        "contactType": "customer service",
        "availableLanguage": ["en","es"]
      },
      "sameAs": [
        "https://www.facebook.com/ecotact",
        "https://www.youtube.com/channel/UCpmDEdpAA2NLAQk9_uaBAQA",
        "https://www.linkedin.com/company/ecotact/",
        "https://www.instagram.com/ecotact/"
      ]
    }
    </script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-135497057-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'UA-135497057-1');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-N39FPS2');</script>
    <!-- End Google Tag Manager -->

    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '179074224317808');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=179074224317808&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GZJ77LW8TF"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-GZJ77LW8TF');
    </script>
    
    <!-- Global site tag (gtag.js) - Google Ads: 952554115 --> 
    @if(\Request::route()->getName() == 'cartItems' || \Request::route()->getName() == 'postAddressConfirm')
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-952554115"></script> 
        
        <script> 
        
          window.dataLayer = window.dataLayer || []; 
        
          function gtag(){dataLayer.push(arguments);} 
        
          gtag('js', new Date()); 
        
          
        
          gtag('config', 'AW-952554115'); 
        
        </script> 
    @endif
    
    <link href="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v2.8.5/dist/cookieconsent.css" rel="stylesheet" media="print" onload="this.media='all'">
    
  </head>
 <body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N39FPS2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header class="main-header">
  <div class="container">
    <div class="row">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://www.ecotactbags.com">
              <img src="{{ asset('assets/front/img/logo-white.svg')}}" alt="ecotactbags" class="img-responsive white-logo">
              <img src="{{ asset('assets/front/img/logo-green.svg')}}" alt="Ecotact Bags Logo" class="img-responsive green-logo">
            </a>

          </div>

          <div id="navbar1" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class=""><a href="https://www.ecotactbags.com/about-us">{{__('home.about') }}</a></li>
              <li class="dropdown">
                <a href="https://www.ecotactbags.com/eco-products/packaging" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{__('home.products_new') }} <span class="caret"></span></a>
                <ul class="dropdown-menu custom-dropdown-menu" role="menu">
                  <li><a href="https://www.ecotactbags.com/eco-products/packaging" style="color: #0c6a35;">{{__('productdetails.packaging')}}</a></li>
                  <li><a href="https://www.ecotactbags.com/eco-products/storage" style="color: #0c6a35;">{{__('productdetails.storage')}}</a></li>
                  <li><a href="https://www.ecotactbags.com/eco-products/packaging-equipment" style="color: #0c6a35;">{{__('productdetails.equipment')}}</a></li>
                  <li><a href="https://www.ecotactbags.com/eco-products/accessories" style="color: #0c6a35;">{{__('productdetails.accessories')}}</a></li>
                </ul>
              </li>
              
              <li class="dropdown">
                <a href="https://www.ecotactbags.com/eco-products/packaging" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{__('home.sustain') }}<span class="caret"></span></a>
                <ul class="dropdown-menu custom-dropdown-menu" role="menu">
                  <li><a href="https://www.ecotactbags.com/recycling" style="color: #0c6a35;">{{__('home.recycling') }}</a></li>
                  <li><a href="https://www.ecotactbags.com/initiatives" style="color: #0c6a35;">{{__('home.initiatives') }}</a></li>
                </ul>
              </li>
              
              <!--<li><a href="#">Fresh Food Packaging</a></li>-->
              <li><a href="https://www.ecotactbags.com/blog">{{__('home.blog') }}</a></li>
            </ul>
            <div class="nav-icons-wrapper ">
              <a href="https://www.ecotactbags.com/globe">
                <img src="{{ asset('assets/front/img/globe.svg')}}" alt="ecotactbags" class="white-icons">
                <img src="{{ asset('assets/front/img/global-green.svg')}}" alt="Global Green Icon" class="green-icons">
              </a>
              <a href="https://www.ecotactbags.com/my-cart">
                <img src="{{ asset('assets/front/img/cart.svg')}}" alt="Cart Icon" class="white-icons">
                <img src="{{ asset('assets/front/img/cart-green.svg')}}" alt="Green Cart Icon" class="green-icons">
              </a>
              @auth
              <a href="javascript:void(0)" onclick="$('#afterLoginMenu').toggle();">
                <img src="{{ asset('assets/front/img/me.svg')}}" alt="ecotactbags" class="white-icons">
                <img src="{{ asset('assets/front/img/login-green.svg')}}" alt="Login Icon" class="green-icons">
              </a>
              @else
              <a href="javascript:void(0)" data-toggle="modal" data-target="#signup">
                <img src="{{ asset('assets/front/img/me.svg')}}" alt="ecotactbags" class="white-icons">
                <img src="{{ asset('assets/front/img/login-green.svg')}}" alt="Login Icon" class="green-icons">
              </a>
              @endauth
              <a href="{{route('contact')}}">
                <img src="{{ asset('assets/front/img/email.svg')}}" alt="ecotactbags" class="white-icons">
                <img src="{{ asset('assets/front/img/mail-green.svg')}}" alt="Email Icon" class="green-icons">
              </a>
              
            </div>
            
            <div class="dropdown custom-dropdown show ">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(@request()->session()->get('lang')['slug'] == 'sp')
                        <img src="{{ asset('assets/front/img/rY3M0rArcK.png')}}" alt="Spain Flag Icon"> <span class="caret"></span>
                    @elseif(@request()->session()->get('lang')['slug'] == 'en' || @request()->session()->get('lang')['slug'] == 'in')
                         <img src="{{ asset('assets/front/img/united-flag.png')}}" alt="United Kingdom Flag"> <span class="caret"></span>
                    @else
                         <img src="{{ asset('assets/front/img/united-flag.png')}}" alt="United Kingdom Flag"> <span class="caret"></span>
                    @endif
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <!--@foreach($frontLanguages as $frontLanguage)-->
                    <!--    <a class="dropdown-item" href="{{route('setLanguageRoute',['id' => $frontLanguage->id])}}"><img src="{{asset('languages/'.$frontLanguage->image)}}" loading="lazy" width="30" alt=@if($frontLanguage->slug == 'sp')"Spain Flag Icon"@elseif($frontLanguage->slug == 'en')"United Kingdom Flag"@endif></a>-->
                    <!--@endforeach-->
                    <a class="dropdown-item" href="https://www.ecotactbags.com/set-language?id=1"><img src="https://www.ecotactbags.com/languages/united-kingdom-01.svg" loading="lazy" width="30" alt="United Kingdom Flag"></a>
                    <a class="dropdown-item" href="https://www.ecotactbags.com/set-language?id=2"><img src="https://www.ecotactbags.com/languages/rY3M0rArcK.png" loading="lazy" width="30" alt="Spain Flag Icon"></a>
                                    
                </div>
                <a href="#" class="eee" style="position: relative;">
                      <!--<div style="width: 35px;display: inline-block;position:absolute;right: -12px;top: -19px;">-->
                      <!--    <img src="https://www.ecotactbags.com/assets/front/img/food-logo-white (1).gif" alt="Cart Icon" class="img-responsive white-icons" style="height: 20px;">-->
                      <!--    <img src="https://www.ecotactbags.com/assets/front/img/food-logo-green (1).gif" alt="Cart Icon" class="img-responsive green-icons" style="height: 20px;">-->
                      <!--</div>-->
                    <img src="https://www.ecotactbags.com/assets/front/img/fresh-food-white.png?v=0.1" alt="Cart Icon" class="img-responsive white-icons">
                    <img src="https://www.ecotactbags.com/assets/front/img/fresh-food-green.png" alt="Green Cart Icon" class="img-responsive green-icons">
                  </a>
                <a href="https://www.ecotactbags.com/ecotactcircle/" class="eee">
                    <img src="https://www.ecotactbags.com/ecotactcircle/front/img/circle-logo-vertical-white.png" alt="Cart Icon" class="img-responsive white-icons">
                    <img src="https://www.ecotactbags.com/ecotactcircle/front/img/circle-logo-vertical-green.png" alt="Green Cart Icon" class="img-responsive green-icons" >
                  </a>
            </div>
            
          </div>
          <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
            <div class="after-login-menu" id="afterLoginMenu" style="display: none;">
              <ul>
                <li><a href="https://www.ecotactbags.com/user/my-orders"><i class="las la-shopping-cart"></i> {!! __('popup.My Orders') !!}</a></li>
                <li><a href="https://www.ecotactbags.com/user/logout"><i class="las la-sign-out-alt"></i>{!! __('popup.Logout') !!}</a></li>
              </ul>
            </div>
      </nav>
    </div>
  </div>
</header>

<!-- <div class="nav-margin"></div> -->

    
     @yield('content')
    
    
    
    
    
    
    
    
    
    
    
    
    <footer class="section footer-area pb0">
  <div class="container">
    <div class="row">
      <div class="col-md-3 mb30">
        <a href="https://www.ecotactbags.com" class="fot-logo"><img src="{{ asset('assets/front/img/logo-green.svg') }}" alt="Ecotact Bags Logo" class="img-responsive"></a>
        <p>{{__('home.focuased')}}</p>
      </div>
      <div class="col-md-3 col-md-offset-4 col-sm-6 col-xs-12 mb30">
        <div class="fot-box">
          <h4>{{__('home.menu')}}</h4>
          <ul class="half-uls">
            <li><a href="https://www.ecotactbags.com/about-us">{{__('home.about') }}</a></li>
            <li><a href="https://www.ecotactbags.com/eco-products/packaging" class="link">{{__('home.products') }}</a></li>
            <li><a href="https://www.ecotactbags.com/recycling" class="link">{{__('home.sustain') }}</a></li>
            <li><a href="https://www.ecotactbags.com/initiatives" class="link">{{__('home.initiatives') }}</a></li>
          </ul>
          <ul class="half-uls">
            <li><a href="https://www.ecotactbags.com/blog">{{__('home.blog') }}</a></li>
            <li><a href="https://www.ecotactbags.com/contact-us#enquiry-form">{{__('home.enquire') }}</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="fot-box">
          <h4>{{__('home.contact') }}</h4>
          <ul>
            <li><a href="tel:+91 11 47028340">+91 11 47028340</a></li>
            <li><a href="tel:+91 11 23938035">+91 11 23938035</a></li>
            <li><a href="mailto:info@ecotactbags.com">info@ecotactbags.com</a></li>
          </ul>
        </div>
        <div class="footer-socials mt10 mb30">
          <ul>
            <li><a href="https://www.facebook.com/ecotact"><img src="{{ asset('assets/front/img/Facebook.svg') }}" alt="Facebook Icon"></a></li>
            <li><a href="https://www.linkedin.com/company/ecotact/"><img src="{{ asset('assets/front/img/Vector.svg') }}" alt="Linkedin Icon"></a></li>
            <li><a href="https://www.youtube.com/channel/UCpmDEdpAA2NLAQk9_uaBAQA"><img src="{{ asset('assets/front/img/Vector_2.svg') }}" alt="Youtube Icon"></a></li>
            <li><a href="https://www.instagram.com/ecotact/"><img src="{{ asset('assets/front/img/Vector_3.svg') }}" alt="Instagram Icon"></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="below-footer">
          <div class="text-block">{{__('home.copyright') }}</div>
          <a href="https://www.amazon.com/ECOTACT-Plastic-Storage-Suitable-35-45/dp/B0976Z2RDB/ref=sr_1_5?crid=2J3ZLBWVZOCCM&keywords=ecotact+bags&qid=1651223807&sprefix=ecotactba%2Caps%2C295&sr=8-5" target="_blank" class="amazon-btn"><img src="{{ asset('assets/front/img/amazon-button.png') }}" alt="Get Ecotact Products on Amazon"></a>
          <div class="other-links">
            <ul>
              <li><a href="https://www.ecotactbags.com/faq">{{__('home.faqs') }}</a></li>
              <li><a href="https://www.ecotactbags.com/privacy">{{__('home.privacy') }}</a></li>
              <li><a href="https://www.ecotactbags.com/refunds-and-returns">{{__('home.refunds') }}</a></li>
              <li><a href="https://www.ecotactbags.com/terms">{{__('home.terms') }}</a></li>
              <li><a href="https://www.ecotactbags.com/sitemap" class="footer-link">SITEMAP</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <img src="{{ asset('assets/front/img/footer-bg.webp') }}" alt="Footer BG" class="footer-image-grass">
</footer>

<!--<a href="#" class="btn btn-primary2 subscribe-btn">Subscribe</a>-->
    @if(config('app.lang')->slug == 'sp')
    <script type="text/javascript" src="https://static.mailerlite.com/data/webforms/4251028/s6u3a2.js?v8"></script>
    @else
    <script type="text/javascript" src="https://static.mailerlite.com/data/webforms/374260/m5y0q5.js?v7"></script>
    @endif
<a href="https://api.whatsapp.com/send?phone=918448848948" target="_blank"><img src="{{ asset('assets/front/img/whatsapp-icon.svg') }}" alt="Whats App Icon" class="whatsapp-floating"></a>

<!-- Modal -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog custom-modal" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="login-tabs">
          <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="Login active"><a href="#Login" aria-controls="Login" role="tab" data-toggle="tab">{!! __('popup.Login') !!}</a></li>
              <li role="presentation" class="Register"><a href="#Register" aria-controls="Register" role="tab" data-toggle="tab">{!! __('popup.Sign Up') !!}</a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
              <div role="tabpanel" class="tab-pane Login active" id="Login">
                <div class="login-forms">
                  <h4 class="text-center">{!! __('popup.Login Using OTP') !!}</h4>
                  <p>{!! __('popup.Welcome Back') !!}</p>
                  <form id="email-form" name="email-form">
                    <div class="from-group">
                      <input type="email" name="email-4" id="email-login" class="from-control" placeholder="Email Id" required>
                    </div>
                    <div class="from-group text-center mb30">
                      <a onclick="sendOtpLogin('login');" class="btn btn-primary" id="signInButton">{!! __('popup.Login') !!}</a>
                    </div>
                    <div class="or-line mb30">
                      <span>{!! __('popup.Or') !!}</span>
                    </div>
                    <div class="social-btn mb30">
                      <a href="{{ url('/login/google') }}"><img src="{{ asset('assets/front/img/google_btn.png') }}" alt="Google Icon"></a>
                      <a href="{{ url('/login/facebook') }}"><img src="{{ asset('assets/front/img/fb_btn.png') }}" alt="Facebook Icon"></a>
                    </div>
                    <p class="">{!! __('popup.By continuing, you agree to our') !!} <a href="{{route('terms')}}">{!! __('popup.Terms and Conditions') !!}</a> {!! __('popup.and') !!} <a href="{{route('privacy')}}"> {!! __('popup.Privacy Policy') !!}</a></p>
                  </form>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane Register" id="Register">
                <div class="login-forms">
                  <h4 class="text-center">{!! __('popup.Sign Up') !!}</h4>
                  <p>{!! __('popup.Please fillup the below filds to continue with us') !!}</p>
                  <form id="email-form">
                    <div class="from-group">
                      <input type="text" id="name-signup" class="from-control" placeholder="Name" required="">
                    </div>
                    <div class="from-group">
                      <input type="email" class="from-control" placeholder="Email" name="email-2" id="email-signup" required="">
                    </div>
                    <div class="from-group">
                      <input type="text" name="business_name" class="from-control" placeholder="Name of the Company" required="" id="business_name-signup">
                    </div>
                    <div class="from-group">
                      <input type="text" name="country" class="from-control" placeholder="Country" required="" id="country-signup">
                    </div>
                    <div class="from-group text-center mb30">
                        
                        <a id="signUpButton" class="btn btn-primary" onclick="sendOtpSignup('register')">{!! __('popup.Sign Up') !!}</a>
                    </div>
                    <div class="or-line mb30">
                      <span>{!! __('popup.Or') !!}</span>
                    </div>
                    <div class="social-btn mb30">
                      <a href="{{ url('/login/google') }}"><img src="{{ asset('assets/front/img/google_btn.png') }}"></a>
                      <a href="{{ url('/login/facebook') }}"><img src="{{ asset('assets/front/img/fb_btn.png') }}"></a>
                    </div>
                    <p class="">{!! __('popup.By continuing, you agree to our') !!} <a href="{{route('terms')}}">{!! __('popup.Terms and Conditions') !!}</a> {!! __('popup.and') !!} <a href="{{route('privacy')}}"> {!! __('popup.Privacy Policy') !!}</a></p>
                  </form>
                </div>
              </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

    @if($creative && \Request::route()->getName() == 'home')
        <div class="modal" tabindex="-1" role="dialog" id="myModal">
          <div class="modal-dialog center" role="document">
            <div class="modal-content" style=" background-color: transparent !important; box-shadow: none;">
              <div class="modal-header" style="border-bottom: none;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white !important; opacity: 0.99 !important;">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding: 0px;">
                <a href="{{$creative->link}}" target="_blank"><img src="{{$creative->url}}" class="img-responsive"></a>
              </div>
            </div>
          </div>
        </div>
    @endif

<!-- Custom Modal -->
<div class="modal fade" id="signInOtp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog custom-modal" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="login-tabs">
          <!-- Tab panes -->
          <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="Login">
                <div class="login-forms">
                  <h4 class="text-center" style="margin-bottom: 17px;" id="otpLoginHeading">{!! __('popup.Login Using OTP') !!}</h4>
                  <p class="login-email mt-15" style="font-weight: 600;">{!! __('popup.Please check the One Time Password sent to your email address') !!}</p>
                  <a onclick="changeEmail('register')" style="cursor: pointer;color: #0c6a35;" id="changeEmailId">{!! __('popup.Change Email') !!}</a>
                  <form id="otp-form" class="mt15">
                  <div class="text-field-wp">
                    <div class="otp mb15">
                      <input type="text" class="inputField text-field otp w-input otp-input-login1 login-otp-focus" maxlength="1" name="field-7" data-name="Field 7" placeholder="7" id="field-7" required="" autofocus>
                      <input type="text" class="inputField text-field otp w-input otp-input-login2 login-otp-focus" maxlength="1" name="email-3" data-name="Email 3" placeholder="5" id="email-3" required="">
                      <input type="text" class="inputField text-field otp w-input otp-input-login3 login-otp-focus" maxlength="1" name="field-2" data-name="Field 2" placeholder="7" id="field-2" required="">
                      <input type="text" class="inputField text-field otp w-input otp-input-login4 login-otp-focus" maxlength="1" name="field-3" data-name="Field 3" placeholder="8" id="field-3" required="">
                      <input type="text" class="inputField text-field otp w-input otp-input-login5 login-otp-focus" maxlength="1" name="field-4" data-name="Field 4" placeholder="2" id="field-4" required="">
                      <input type="text" class="inputField text-field otp w-input otp-input-login6 login-otp-focus" maxlength="1" name="field-5" data-name="Field 5" placeholder="4" id="field-5" required="">
                    </div>
                    <a class="small-text color" id="resendLoginCOde" onclick="resendOtpLogin()" style="cursor: pointer;color: #000;">{!! __('popup.Resend code') !!}</a>
                  </div><a  style="cursor: pointer;" class="btn btn-primary accent dark-text w-button" onclick="signIn()" id="logRegButton">{!! __('popup.Login') !!}</a>
                </form>
                </div>
              </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle/3.03/jquery.cycle.all.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/custom.js?v=0.10') }}"></script>

    <!-- Owl js -->
    <script type="text/javascript" src="{{ asset('assets/front/js/owl.carousel.js') }}"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>

    <script src="{{ asset('assets/front/js/jquery.easing.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    @include('layouts.front_error')
    <script>
      $(document).ready(function() {        
        $("#testimonial-slider").owlCarousel({
          margin:0,
          nav: true,
          loop: true,
          autoplay:true,
          autoplayTimeout:2500,
          autoplayHoverPause:true,
          navText: ["<i class='las la-angle-left'></i>","<i class='las la-angle-right'></i>"],
          responsive: {
           0: {
                items: 1
              },
              481: {
                items: 1
              },
              849: {
                items: 1
              },
              1200: {
                items: 1
              },
          }
        });
      })
    </script>
    <script>
      $(document).ready(function() {        
        $("#details-slider").owlCarousel({
          margin:0,
          nav: true,
          loop: true,
          autoplay:true,
          autoplayTimeout:2500,
          autoplayHoverPause:true,
          navText: ["<i class='las la-arrow-left'></i>","<i class='las la-arrow-right'></i>"],
          responsive: {
           0: {
                items: 1
              },
              481: {
                items: 1
              },
              849: {
                items: 1
              },
              1200: {
                items: 1
              },
          }
        });
      })
    </script>


    <script type="text/javascript">
      function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('la-angle-down la-angle-up');
      }
      $('.panel-group').on('hidden.bs.collapse', toggleIcon);
      $('.panel-group').on('shown.bs.collapse', toggleIcon);
    </script>

    <script type="text/javascript">
      $(function() {
        $('a.page-scroll').bind('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top-100
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
      });
    </script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{{asset('front-end/js/validation.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-sanitize.js"></script>
    <script type="text/javascript" src="{{ asset('front-end/js/angular.js?v=0.12') }}"></script>
    <script src="{{ asset('build/js/intlTelInput.min.js')}}"></script>
        
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function(){
        $('#importer').hide();
        $('#explorer').hide();
        $('#farmer').hide();
        
        $('#farmerProducts').hide();
        $('#importerProducts').hide();
        $('#explorerProducts').hide();
    });
    function changeDiv(id,id2){
        $('#exporter').hide();
        $('#importer').hide();
        $('#explorer').hide();
        $('#farmer').hide();
        $('#exporterProducts').hide();
        $('#farmerProducts').hide();
        $('#importerProducts').hide();
        $('#explorerProducts').hide();
        $('#'+id).show();
        $('#'+id2).show();
    }

        
    </script>
    <!-- Hotjar Tracking Code for https://www.ecotactbags.com/hermeticpackaginginquiry/ -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2757898,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <script>
        var input = document.querySelector("#mobile-number");
         window.intlTelInput(input, {
          initialCountry: "auto",
          geoIpLookup: function(callback) {
            $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
              var countryCode = (resp && resp.country) ? resp.country : "IN";
              callback(countryCode);
            });
          },
          hiddenInput: "contact_no",
          placeholderNumberType: "MOBILE",
          utilsScript: "{{asset('build/js/utils.js')}}?v=1.1",
        });

    </script>
    <script>
      $(".text-field w-input").prop('required',true);
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    
        
    </script>
    
    
    <!--signup & login-->
    <script>
        function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
    }
        function notify(msg,type){
            toastr.options = {
              "closeButton": true,
              "newestOnTop": true,
              "positionClass": "toast-top-right"
            };
            toastr.remove();
            toastr[type](msg);
          }
        function sendOtpLogin(page){
            notify('Please Wait..','warning');
            $('#signInButton').attr('disabled',true);
            var email = $("#email-login").val();
            var page = page;
            $('.login-email').html(email);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
              type:'POST',
              url:"{{ route('sendLoginOtp') }}",
              data:{_token: CSRF_TOKEN,email:email,page:page},
                success:function(data){
                    // console.log(data);
                    notify(data.msg,data.type);
                    if(data.type == 'success'){
                        localStorage.setItem('localEmail',data.email);
                        $('#signup').modal('hide');
                        $('#otpLoginHeading').html("{!! __('popup.Login Using OTP') !!}");
                        $('#changeEmailId').html("{!! __('popup.Change Email') !!}");
                        $("#changeEmailId").attr("onclick","changeEmail('login')");
                        $("#logRegButton").attr("onclick","signIn()");
                        $("#logRegButton").html("{!! __('popup.Login Using One Time Password') !!}");
                        $('#resendLoginCOde').attr("onclick","resendOtpLogin()");
                        $('#signInOtp').modal('show');
                    }
                    $('#signInButton').attr('disabled',false);
                }
            });
        }
        function resendOtpLogin(){
            notify('Please Wait..','warning');
            var email = localStorage.getItem('localEmail');
            if(email.length){
              $('#resendLoginCOde').attr('disabled',true);
              var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
              $.ajax({
                type:'POST',
                url:"{{ route('sendLoginOtp') }}",
                data:{_token: CSRF_TOKEN,email:email},
                success:function(data){
                  notify(data.msg,data.type);
                  if(data.type == 'success'){
                  }
                }
              });
              $('#resendLoginCOde').attr('disabled',false);
            }else{
              notify('something went wrong','warning');
            }
        }
        function changeEmail(page){
            if(page == 'login')
            {
                $('#signup').modal('show');
                $('#signInOtp').modal('hide');
                $(".Login").addClass("active");
                $(".Register").removeClass("active");
                $('.signUp-email').val('');
            }
            if(page == 'register')
            {
                $('#signup').modal('show');
                $('#signInOtp').modal('hide');
                $(".Register").addClass("active");
                $(".Login").removeClass("active");
                $('.signUp-email').val('');
            }
        }
        function signIn(){
            notify('Please Wait..','warning');
            var valNeed = '';
            for (var i = 1; i <=6; i++) {
              valNeed += $('.otp-input-login'+i).val();
            }
            console.log([valNeed.trim().length,valNeed])
            if (valNeed.trim().length >= 6) {
              var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
              $.ajax({
                type:'POST',
                url:"{{ route('sendLoginOtpPost') }}",
                data:{_token: CSRF_TOKEN,code:valNeed},
                success:function(data){
                  notify(data.msg,data.type);
                  if(data.type == 'success'){
                    $('#signInOtp').modal('hide');
                    window.location.replace(data.route);
                  }
                }
              });
            }else{
              notify('Enter Valid COde');
            }
        }
        
        function sendOtpSignup(page){
            notify('Please Wait..','warning');
            $('#signUpButton').attr('disabled',true);
            var page = page;
            var email = $("#email-signup").val();
            console.log(email);
            var country = $("#country-signup").val();
            var business_name = $("#business_name-signup").val();
            var name = $("#name-signup").val();
            if(IsEmail(email)){
                if(email && country && business_name && name){
                    $('.login-email').html(email);
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                      type:'POST',
                      url:"{{ route('sendRegisterOtp') }}",
                      data:{_token: CSRF_TOKEN,email:email,counrty:country,business_name:business_name,name:name,page:page},
                      success:function(data){
                          console.log(data);
                        notify(data.msg,data.type);
                        if(data.type == 'success'){
                            $('#signup').modal('hide');
                            $('#otpLoginHeading').html("{!! __('popup.Signup Using OTP') !!}");
                            $('#changeEmailId').html("{!! __('popup.Change Email') !!}");
                            $("#changeEmailId").attr("onclick","changeEmail('register')");
                            $("#logRegButton").attr("onclick","signUp()");
                            $("#logRegButton").html("{!! __('popup.Signup Using One Time Password') !!}");
                            $('#resendLoginCOde').attr("onclick","resendOtpSignup()");
                            $('#signInOtp').modal('show');
                        }
                        $('#signUpButton').attr('disabled',false);
                      }
                    });
                }else{
                    notify('All fields are required','error');
                }
            }else{
                notify('Enter Valid Email','error');
            }
        };

        function resendOtpSignup(){
    notify('Please Wait..','warning');
    var email = '{{ session()->get('user') ? session()->get('user')['email'] : '' }}';
    if(email.length){
      $('#resendSignUpCode').attr('disabled',true);
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        type:'POST',
        url:"{{ route('sendRegisterOtp') }}",
        data:{_token: CSRF_TOKEN,email:email},
        success:function(data){
          notify(data.msg,data.type);
          if(data.type == 'success'){
          }
        }
      });
      $('#resendSignUpCode').attr('disabled',false);
    }else{
      notify('something went wrong','warning');
    }
  };

        function signUp(){
            notify('Please Wait..','warning');
            var valNeed = '';
            for (var i = 1; i <=6; i++) {
              valNeed += $('.otp-input-login'+i).val();
            }
            console.log([valNeed.trim().length,valNeed]);
            if (valNeed.trim().length >= 6) {
              var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
              $.ajax({
                type:'POST',
                url:"{{ route('sendRegisterPostOtp') }}",
                data:{_token: CSRF_TOKEN,code:valNeed},
                success:function(data){
                  notify(data.msg,data.type);
                  if(data.type == 'success'){
                    $('#signUpOtp').css('display','none');
                    window.location.replace(data.route);
                  }
                }
              });
            }else{
              notify('Enter Valid COde');
            }
        }
        
        // function viewTrackOrderFun(){
        // $('#track-order-pop').css('display','block');
        // $('#myList').css('display','none');
        // }
        $(".login-otp-focus").keyup(function () {
            if (this.value.length == 1) {
              $(this).next('.login-otp-focus').focus();
            }
        });
        $('.login-otp-focus').keyup(function(e) {
            if ((e.which == 8 || e.which == 46) && $(this).val() =='') {
                $(this).prev('.login-otp-focus').focus();
            }
        });
        $(".sign-otp-focus").keyup(function () {
            if (this.value.length == 1) {
              $(this).next('.sign-otp-focus').focus();
            }
        });
        $('.sign-otp-focus').keyup(function(e) {
            if ((e.which == 8 || e.which == 46) && $(this).val() =='') {
                $(this).prev('.sign-otp-focus').focus();
            }
        });
    </script>
    {{-- @if(!session()->has('modal'))  --}}
        @if($creative)  
        <script>
            $( document ).ready(function() {
                $('#myModal').modal('show');
            });
        </script>
        @endif

        {{-- {{\Session::put('modal', true)}}
    @endif --}}
    
    
    <script>
      $(document).ready(function() {        
        $("#workspace-slider").owlCarousel({
          margin:10,
          nav: true,
          loop: true,
          autoplay:true,
          autoplayTimeout:2500,
          autoplayHoverPause:true,
          navText: ["<i class='las la-angle-left'></i>","<i class='las la-angle-right'></i>"],
          responsive: {
           0: {
                items: 1
              },
              481: {
                items: 1
              },
              849: {
                items: 2
              },
              1200: {
                items: 3
              },
          }
        });
      })
    </script>
    <script type="text/javascript" defer>
        $(window).load(function() {
            // Cycle plugin
            $('.slides').cycle({
              fx:     'none',
              speed:   1000,
              timeout: 5
            }).cycle("pause");
            // Pause &amp; play on hover
              $('.slideshow-block').hover(function(){
                $(this).find('.slides').addClass('active').cycle('resume');
              }, function(){
                $(this).find('.slides').removeClass('active').cycle('pause');
              });
              // Pause &amp; play on hover
              $('.slideshow-block2').hover(function(){
                $(this).find('.slides').addClass('active').cycle('resume');
              }, function(){
                $(this).find('.slides').removeClass('active').cycle('pause');
              });
              // Pause &amp; play on hover
              $('.slideshow-block3').hover(function(){
                $(this).find('.slides').addClass('active').cycle('resume');
              }, function(){
                $(this).find('.slides').removeClass('active').cycle('pause');
              });
              // Pause &amp; play on hover
              $('.slideshow-block4').hover(function(){
                $(this).find('.slides').addClass('active').cycle('resume');
              }, function(){
                $(this).find('.slides').removeClass('active').cycle('pause');
              });
              // Pause &amp; play on hover
              $('.slideshow-block5').hover(function(){
                $(this).find('.slides').addClass('active').cycle('resume');
              }, function(){
                $(this).find('.slides').removeClass('active').cycle('pause');
              });
              // Pause &amp; play on hover
              $('.slideshow-block6').hover(function(){
                $(this).find('.slides').addClass('active').cycle('resume');
              }, function(){
                $(this).find('.slides').removeClass('active').cycle('pause');
              });
              // Pause &amp; play on hover
              $('.slideshow-block7').hover(function(){
                $(this).find('.slides').addClass('active').cycle('resume');
              }, function(){
                $(this).find('.slides').removeClass('active').cycle('pause');
              });
              if(window.matchMedia("(max-width: 767px)").matches){
                  $('.slides').cycle({
                      fx:     'none',
                      speed:   3000,
                      timeout: 5
                    }).cycle("pause");
                $('.slideshow-block').find('.slides').addClass('active').cycle('resume');
                $('.slideshow-block2').find('.slides').addClass('active').cycle('resume');
                $('.slideshow-block3').find('.slides').addClass('active').cycle('resume');
                $('.slideshow-block4').find('.slides').addClass('active').cycle('resume');
                $('.slideshow-block5').find('.slides').addClass('active').cycle('resume');
                $('.slideshow-block6').find('.slides').addClass('active').cycle('resume');
                $('.slideshow-block7').find('.slides').addClass('active').cycle('resume');
                $(this).find('.slides').addClass('active').cycle('resume');
            }
        });
        
    </script>
    
    <script defer src="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v2.8.5/dist/cookieconsent.js"></script>
    <script defer src="{{asset('assets/front/js/cookieconsent-init.js')}}"></script>
    
    
    <!--New-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle/3.03/jquery.cycle.all.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>

    <script type="text/javascript" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/35984/TextPlugin.min.js"></script>

    <script src="js/jquery.easing.min.js"></script>
    
    <script>
      const messageBodyStr = 'We’re Keeping It Fresh!';
      const speed = 7;
      const endFlashSpeed = 0.3;
      const character = "|";  

      let typingTl = new TimelineMax();
      typingTl.to('#myText', messageBodyStr.length/speed, {
            text:messageBodyStr,
            ease:Linear.easeNone,
            onUpdate:function(){
              this.target[0].textContent += character
            },
            onComplete:function(){
              this.target[0].textContent = messageBodyStr
            }
       },'+=0.5')
       //makes it flash at the end
      .to('#myText',endFlashSpeed, {
            // text:messageBodyStr + character,
            repeat:-1,
            repeatDelay:endFlashSpeed,
            ease:Linear.easeNone
       })
    </script>
    
    
    <script>
      $(document).ready(function() {        
        $("#meat-slider").owlCarousel({
          margin:0,
          nav: false,
          dots:false,
          loop: true,
          autoplay:true,
          autoplayTimeout: 2500,
          autoplaySpeed: 1000,
          autoplayHoverPause:false,
          responsive: {
           0: {
                items: 1
              },
              481: {
                items: 1
              },
              849: {
                items: 1
              },
              1200: {
                items: 1
              },
          }
        });
      })
    </script>

    <script>
      $(document).ready(function() {        
        $("#main-meat-slider").owlCarousel({
          margin:30,
          nav: true,
          dots:true,
          loop: true,
          center: true,
          autoplay:false,
          autoplayTimeout: 8500,
          smartSpeed: 450,
          autoplayHoverPause:true,
          navText: ["<i class='las la-angle-left'></i>","<i class='las la-angle-right'></i>"],
          responsive: {
           0: {
                items: 1
              },
              481: {
                items: 1
              },
              849: {
                items: 2
              },
              1200: {
                items: 3
              },
          }
        });
      })
    </script>
    <!--New-->
  </body>
</html>