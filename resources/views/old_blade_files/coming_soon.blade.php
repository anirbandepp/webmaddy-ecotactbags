@extends('layouts.new_frontlayout')

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
<section class="section about-section pb0">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="message-wp text-center">
          <div class="msg-leaf">
            <img src="{{asset('assets/front/img/location.png')}}" class="image-29">
          </div>
          <div class="main-msg-text-wrapper">
            <h2>Coming Soon</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop