@extends('layouts.front-layout')
@section('content')
    <style>
        .green-text{
            color:#0c6a35;
            font-weight: 500;
        }
    </style>
    @include('hamburger-dropdown')
      <div class="section sustainability">
        <div class="main-wrapper">
          <div class="banner-content-wrapper">
            <div class="title-caption-wrapper">
              <div class="title-caption center">SUSTAINABILITY</div>
            </div>
            <div class="h2-wrapper">
              <h2 class="h2 center white">Multiplying growth, responsibly </h2>
            </div>
          </div>
        </div>
      </div>
      <div class="section">
        <div class="main-wrapper">
          <div class="message-wp">
            <div class="msg-leaf"><img src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="133" alt="ecotactbags" class="image-29"></div>
            <div class="main-msg-text-wrapper">
              <div class="msg-text">Your Ecotact Recycle Box order has been successfully placed.</div>
            </div>
            <div class="msg-subtext">
              <div class="msg-sub-text">Thank you for taking a sustainable step towards green living</div>
            </div>
          </div>
        </div>
      </div>
@stop