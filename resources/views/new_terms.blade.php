@extends('layouts.new_frontlayout')
@section('title', 'Ecotact | Terms and Conditions')
@section('description', 'Read the terms and conditions related to Aashirvad International and Ecotact ')
@section('keywords', 'Terms &amp; conditions, ecotact')
@section('content')
<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/Sustainablity.png')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">ECOTACT</span>
        <h1>{!! __('terms.Terms') !!}</h1>
      </div>
    </div>
  </div>
</div>

<section class="section about-section pb0 static-pages">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb30">
        <div class="about-text pt0 ">
          <p class="mb30">{!! __('terms.The') !!}</p>
          
          <h4>{!! __('terms.Intellectual') !!}</h4>
          <p>{!! __('terms.All') !!}</p>

          <h4 class="mt50">{!! __('terms.Acceptable') !!}</h4>
          <p>A. <strong>{!! __('terms.Security') !!}</strong></p>
          <p>{!! __('terms.Visitors') !!}</p>

          <p class="mt50">B. <strong>{!! __('terms.General') !!}</strong></p>
          <p>{!! __('terms.genVisitors') !!}</p>

          
          <h4 class="mt50">{!! __('terms.Indemnity') !!}</h4>
          <p>{!! __('terms.Your') !!}</p>
        </div>
      </div>
    </div>
  </div>
</section>

@stop