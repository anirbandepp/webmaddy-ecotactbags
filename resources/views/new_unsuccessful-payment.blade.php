@extends('layouts.new_frontlayout')

        @section('title', '')
         @section('description', '')
        @section('keywords', '')
  
  @section('content')
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
<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/Sustainablity.png')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">SUSTAINABILITY</span>
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
                    <img src="https://www.ecotactbags.com/assets/front/img/location.png" class="image-29" alt="ecotactbags">
                </div>
                <div class="main-msg-text-wrapper">
                    <h3 class="mb15">Uh-oh! Your order couldn&#x27;t be processed.</h3>
                    <p>No worries! Try again and let&#x27;s take a step towards green living together.</p>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
@stop