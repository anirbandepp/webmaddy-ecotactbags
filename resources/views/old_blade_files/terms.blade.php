@extends('layouts.front-layout')
@section('title', 'Ecotact | Terms and Conditions')
@section('description', 'Read the terms and conditions related to Aashirvad International and Ecotact ')
@section('keywords', 'Terms &amp; conditions, ecotact')
@section('content')

  @include('hamburger-dropdown')
  <div class="section sustainability">
    <div class="main-wrapper">
      <div class="banner-content-wrapper">
        <div class="title-caption-wrapper">
          <div class="title-caption center">Ecotact</div>
        </div>
        <div class="h2-wrapper">
          <h2 class="h2 center white">{!! __('terms.Terms') !!}</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="section _100-0">
    <div class="main-wrapper">
      <div class="terms-container">
        <div class="body-text-wrapper terms">
          <div class="body-text">{!! __('terms.The') !!}</div>
        </div>
        <div class="h3-wrapper">
          <h3 class="h3 green">{!! __('terms.Intellectual') !!}</h3>
        </div>
        <div class="body-text-wrapper terms">
          <div class="body-text">{!! __('terms.All') !!}</div>
        </div>
        <div class="h3-wrapper">
          <h3 class="h3 green">{!! __('terms.Acceptable') !!}</h3>
        </div>
        <div class="h5-wrapper">
          <h5 class="h5">A. <strong>{!! __('terms.Security') !!}</strong></h5>
        </div>
        <div class="body-text-wrapper terms">
          <div class="body-text">{!! __('terms.Visitors') !!}<br></div>
        </div>
        <div class="h5-wrapper">
          <h5 class="h5">B. <strong>{!! __('terms.General') !!}</strong></h5>
        </div>
        <div class="body-text-wrapper terms">
          <div class="body-text">{!! __('terms.genVisitors') !!}<br></div>
        </div>
        <div class="h3-wrapper">
          <h3 class="h3 green">{!! __('terms.Indemnity') !!}<br></h3>
        </div>
        <div class="body-text-wrapper terms">
          <div class="body-text">{!! __('terms.Your') !!}</div>
        </div>
      </div>
    </div>
  </div>
@stop