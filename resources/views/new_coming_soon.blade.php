@extends('layouts.new_frontlayout')
<style type="text/css">
  .message-wp{
    padding: 40px 40px 60px;
    align-items: center;
    border-radius: 10px;
    box-shadow: 1px 1px 20px 0 hsla(0, 0%, 78.7%, 0.31);
  }
  .msg-leaf img{
    max-width: 120px;
  }
</style>
  @if(config('app.lang')->slug == 'en' || config('app.lang')->slug == 'in')
    @section('title', '')
    @section('description', '')
    @section('keywords', '')
  @elseif(config('app.lang')->slug == 'sp')
    @section('title', '')
    @section('description', '')
    @section('keywords', '')
  @endif
  

@section('content')
<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/Sustainablity.png')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">{{ __('privacy.ecotact') }}</span>
        <h1>{{__('comingsoon.Coming Soon')}}</h1>
      </div>
    </div>
  </div>
</div>
<section class="section about-section pb0">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="message-wp text-center">
          <div class="msg-leaf">
            <img src="{{asset('assets/front/img/location.png')}}" class="image-29" alt="Getting ready for a stronger brew">
          </div>
          <div class="main-msg-text-wrapper">
            <h2>{{__('comingsoon.Coming Soon')}}</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@stop