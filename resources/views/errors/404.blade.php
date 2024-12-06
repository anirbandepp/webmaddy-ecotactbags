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
          <div class="title-caption center"><br></div>
        </div>
        <div class="h2-wrapper">
          <h2 class="h2 center white">Not Found</h2>
        </div>
      </div>
    </div>
  </div>
      <div class="section">
    <div class="main-wrapper">
      <div class="message-wp">
        <div class="msg-leaf"><img src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="133" alt="ecotact" class="image-29"></div>
        <div class="main-msg-text-wrapper">
          <div class="msg-text ty">Not Found</div>
        </div>
        <a href="{{ route('home')}}" class="button accent w-button">{{ __('productdetails.goback') }}</a>
      </div>
    </div>
  </div>
 
@stop