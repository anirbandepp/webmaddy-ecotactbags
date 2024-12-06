@extends('layouts.new_frontlayout')
@section('title', 'Ecotact | Refund and Return policy')
@section('description', 'Explore the refund policy and return policy of Ecotact for cancellations and refund and more ')
@section('keywords', 'Refund policy, Return policy, ecotact')
@section('content')
<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/Sustainablity.png')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">ECOTACT</span>
        <h1>{!! __('return.title') !!}</h1>
      </div>
    </div>
  </div>
</div>

<section class="section about-section pb0 static-pages">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb30">
        <div class="about-text pt0 ">
          <p class="">{!! __('return.First') !!}</p>
          <ul class="custom-uls">
            <li>{!! __('return.You') !!}</li>
            <li>{!! __('return.you2') !!}</li>
            <li>{!! __('return.As') !!}</li>
            <li>{!! __('return.When') !!}</li>
          </ul>
          <p><b>{!! __('return.For') !!}</b></p>
          <p>{!! __('return.As') !!}</p>
          <p>{!! __('return.Once') !!}</p>
        </div>
      </div>
    </div>
  </div>
</section>
@stop