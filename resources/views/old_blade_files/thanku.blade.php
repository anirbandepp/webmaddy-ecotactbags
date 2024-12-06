@extends('layouts.front-layout')
@section('content')
    <style>
        .green-text{
            color:#0c6a35;
            font-weight: 500;
        }
    </style>
    @include('hamburger-dropdown')
      <div class="section products">
    <div class="main-wrapper">
      <div class="banner-content-wrapper">
        <div class="title-caption-wrapper">
          <div class="title-caption center">{{$categorySlug=='packaging' ?  __('productdetails.packaging') :  __('productdetails.storage') }}<br></div>
        </div>
        <div class="h2-wrapper">
          <h2 class="h2 center white">{{ __('productdetails.product') }}</h2>
        </div>
      </div>
    </div>
  </div>
      <div class="section">
    <div class="main-wrapper">
      <div class="message-wp">
        <div class="msg-leaf"><img src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="133" alt="ecotact" class="image-29"></div>
        <div class="main-msg-text-wrapper">
          <div class="msg-text ty">{{ __('productdetails.thanku') }}</div>
        </div>
        <a href="{{ $back}}" class="button accent w-button">{{ __('productdetails.goback') }}</a>
      </div>
    </div>
  </div>
  @if(request()->session()->has('down'))
  <script>
        
            $(document).ready(function(){
                console.log('{{$url}}');
                window.location = '{{$url}}';   
            });
      
  </script>
        @endif
@stop