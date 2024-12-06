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
    @section('title', 'Thank You')
    @section('description', 'Thank You')
    @section('keywords', '')
  @elseif(config('app.lang')->slug == 'sp')
    @section('title', 'Thank You')
    @section('description', 'Thank You')
    @section('keywords', '')
  @endif
  

@section('content')
<div class="banner inner-banner" style="background:#333 url(https://www.ecotactbags.com/front-end/new/images/5-Product-detail.png);">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">{{ __('privacy.ecotact') }}</span>
        <h1>{{__('productdetails.thanku')}}</h1>
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
            <img src="{{asset('assets/front/img/location.png')}}" class="image-29">
          </div>
          <div class="main-msg-text-wrapper">
            <h2>{{__('productdetails.thanku')}}</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
@if(request()->session()->has('down'))
<script>
        
        $(document).ready(function(){
            window.location = '{{$url}}';   
        });
  
</script>
@endif

@if(@$downloud)
<script>
        
        $(document).ready(function(){
            console.log('{{$url}}')
            window.location = '{{$url}}';   
        });
  
</script>
@endif

@stop

