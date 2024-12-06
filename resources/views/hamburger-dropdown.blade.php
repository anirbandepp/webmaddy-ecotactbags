<div class="hamburger-dropdown" id="hamd">
    <div class="main-wrapper">
      <div class="hamburger-dropdown-wrapper">
        <a href="{{route('about-us')}}" class="ham-link">{{__('home.about') }}</a>
        <div class="ham-products">
          <a href="{{route('productsList',['slug' => 'packaging'])}}" class="w-inline-block">
            <div class="ham-link">{{__('home.products_new') }}</div>
          </a>
          <div data-w-id="19d168a5-5173-fef2-1b71-30e5c5b34c24" class="icon-5 w-icon-dropdown-toggle"></div>
        </div>
        <div class="ham-product-dropdown">
          <a href="{{route('productsList',['slug' => 'packaging'])}}" class="ham-link">{{__('productdetails.packaging')}}</a>
          <a href="{{route('productsList',['slug' => 'storage'])}}" class="ham-link">{{__('productdetails.storage')}}</a>
          <a href="{{route('productsList',['slug' => 'packaging-equipment'])}}" class="ham-link">Packaging equipment</a>
          <a href="{{route('productsList',['slug' => 'accessories'])}}" class="ham-link">Accessories</a>
        </div>
        <a href="{{route('sustainablity')}}" class="ham-link">{{__('home.recycling') }}</a>
        <a href="{{route('csr-activities')}}" class="ham-link">{{__('home.initiatives') }}</a>
        <a href="{{route('blog')}}" class="ham-link">{{__('home.blog') }}</a>
        <!--<div class="ham-blogs">-->
        <!--  <a href="{{route('blog')}}" class="w-inline-block">-->
        <!--    <div class="ham-link">{{__('home.blog') }}</div>-->
        <!--  </a>-->
        <!--  <div data-w-id="19d168a5-5173-fef2-1b71-30e5c5b34c31" class="icon-7 w-icon-dropdown-toggle"></div>-->
        <!--</div>-->
        <!--<div class="ham-blog-dropdown">-->
        <!--  <a href="{{route('blog')}}" class="ham-link">Coffee</a>-->
        <!--  <a href="#" class="ham-link">Cacao</a>-->
        <!--  <a href="#" class="ham-link">Hermetic Packaging</a>-->
        <!--</div>-->
      </div>
      <div class="ham-icons-wrapper">
        <a href="{{route('globe')}}" class="link-block w-inline-block"><img src="{{asset('front-end/images/global-green.svg')}}" loading="lazy" width="25" alt="ecotactbags"></a>
        <a href="{{ route('cartItems') }}" class="link-block w-inline-block"><img src="{{asset('front-end/images/cart-green.svg')}}" loading="lazy" width="25" alt="ecotactbags"></a>
         @auth
          <a href="#" class="link-block w-inline-block" onclick="$('#myList').toggle(); $('#hamd').hide();"><img src="{{asset('front-end/images/login-green.svg')}}" loading="lazy" alt="ecotactbags" ></a>
          @else
          <a href="#" class="link-block w-inline-block" onclick="$('#signup').css('display','block'); $('#hamd').hide();"><img src="{{asset('front-end/images/login-green.svg')}}" loading="lazy" alt="ecotactbags" ></a>
          @endif
        <!--<a href="#" class="link-block w-inline-block"><img src="{{asset('front-end/images/login-green.svg')}}" loading="lazy" width="33" alt="ecotactbags"></a>-->
        <a href="{{route('contact')}}" class="link-block w-inline-block"><img src="{{asset('front-end/images/mail-green.svg')}}" loading="lazy" width="33" alt="ecotactbags"></a>
        <a href="https://www.ecotactbags.com/ecotactcircle/" class="eee">
                    <img src="https://www.ecotactbags.com/ecotactcircle/front/img/circle-logo-vertical-green.png" alt="Green Cart Icon" class="img-responsive green-icons">
                  </a>
        <a href="{{route('new-landing')}}" class="eee" style="padding-right:10px;position: relative; margin-left: 10px;">
                    <img src="{{ asset('assets/front/img/fresh-food-green.png')}}" alt="Green Cart Icon" class="img-responsive green-icons">
                  </a>
      </div>
    </div>
  </div>