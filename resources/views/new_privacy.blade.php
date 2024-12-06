@extends('layouts.new_frontlayout')
@section('title', 'Ecotact | Privacy policy')
@section('description', 'Privacy policy of Ecotact describes how your personal information is collected, used, and shared when you visit or make a purchase ')
@section('keywords', 'Privacy policy, ecotact')
@section('content')
<style>
    .green-text{
        color:#0c6a35;
        font-weight: 500;
    }
</style>
<div class="banner inner-banner" style="background:#333 url({{ asset('assets/front/img/Sustainablity.png')}});">
    <div class="banner-content">
      <div class="container">
        <div class="banner-text">
          <span class="white-color">{{ __('privacy.ecotact') }}</span>
          <h1>{{ __('privacy.Privacy') }}</h1>
        </div>
      </div>
    </div>
  </div>
  
  <section class="section about-section pb0 static-pages">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb30">
          <div class="about-text pt0 ">
            <p class="mb30">{!! __('privacy.text1') !!}</p>
  
            <h4 class="mt30">{!! __('privacy.personal') !!}</h4>
            <p>{!! __('privacy.personal') !!}</p>
            <p>{!! __('privacy.pertext2') !!}</p>
            <ul class="custom-uls">
              <li>{!! __('privacy.pertext3') !!}</li>
              <li>{!! __('privacy.pertext4') !!}</li>
              <li>{!! __('privacy.pertext5') !!}</li>
            </ul>
            <p>{!! __('privacy.Additionally') !!}</p>
          </div>
        </div>
  
        <div class="col-md-12 mb30">
          <div class="about-text pt0 ">
            <h4 class="">{!! __('privacy.USAGE') !!}</h4>
            <p>{!! __('privacy.We') !!}</p>
            <ul class="custom-uls">
              <li>{!! __('privacy.Communicate') !!}</li>
              <li>{!! __('privacy.Screen') !!}</li>
              <li>{!! __('privacy.when') !!}</li>
              <li>{!! __('privacy.Weuse') !!}</li>
            </ul>
          </div>
        </div>
  
        <div class="col-md-12 mb30">
          <div class="about-text pt0 ">
            <h4 class="">{!! __('privacy.SHARING') !!}</h4>
            <p>{!! __('privacy.SHARINGTxt') !!}</p>
          </div>
        </div>
  
        <div class="col-md-12 mb30">
          <div class="about-text pt0 ">
            <h4 class="">{!! __('privacy.DO') !!}</h4>
            <p>{!! __('privacy.doTxt') !!}</p>
          </div>
        </div>
  
        <div class="col-md-12 mb30">
          <div class="about-text pt0 ">
            <h4 class="">{!! __('privacy.RIGHTS') !!}</h4>
            <p>{!! __('privacy.RIGHTSTxt1') !!}</p>
            <ul class="custom-ul2">
              <li><b>a.</b> {!! __('privacy.RIGHTSTxt2') !!}</li>
              <li><b>b.</b> {!! __('privacy.RIGHTSTxt3') !!}</li>
              <li><b>c.</b> {!! __('privacy.RIGHTSTxt4') !!}</li>
              <li><b>d.</b> {!! __('privacy.RIGHTSTxt5') !!}</li>
              <li><b>e.</b> {!! __('privacy.RIGHTSTxt6') !!}</li>
              <li><b>f.</b> {!! __('privacy.RIGHTSTxt7') !!}</li>
              <li><b>g.</b> {!! __('privacy.RIGHTSTxt8') !!}</li>
              <li><b>h.</b> {!! __('privacy.RIGHTSTxt9') !!}</li>
              <li @if(config('app.lang')->slug == 'sp') style="list-style-type: upper-alpha;" @endif><b>i.</b> {!! __('privacy.RIGHTSTxt10') !!}</li>
              <li><b>j.</b> {!! __('privacy.RIGHTSTxt11') !!}</li>
            </ul>
          </div>
        </div>
  
        <div class="col-md-12 mb30">
          <div class="about-text pt0 ">
            <h4 class="">{!! __('privacy.changes') !!}</h4>
            <p>{!! __('privacy.changesTxt1') !!}</p>
          </div>
        </div>
  
        <div class="col-md-12 mb30">
          <div class="about-text pt0 ">
            <h4 class="">{!! __('privacy.our') !!}</h4>
            <ul class="custom-ul2">
              <li><b>1.</b> {!! __('privacy.ourTxt1') !!}</li>
              <li><b>2.</b> {!! __('privacy.ourTxt2') !!}</li>
              <li><b>3.</b> {!! __('privacy.ourTxt3') !!}</li>
              <li> &nbsp; <b>a.</b> {!! __('privacy.ourTxt4') !!}</li>
              <li> &nbsp; <b>b.</b> {!! __('privacy.ourTxt5') !!}</li>
              <li> &nbsp; <b>c.</b> {!! __('privacy.ourTxt6') !!}</li>
              <li> &nbsp; <b>d.</b> {!! __('privacy.ourTxt7') !!}</li>
            </ul>
          </div>
        </div>
  
        <div class="col-md-12">
          <div class="about-text pt0 ">
            <h4 class="">{!! __('privacy.contact') !!}</h4>
            <p>{!! __('privacy.conText') !!}</p>
          </div>
        </div>
  
      </div>
    </div>
  </section>
@stop