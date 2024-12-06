@extends('layouts.new_frontlayout')
@section('content')
<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/cart-banner.png')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">{{ __('cart.YOUR CART')}}</span>
        <h1>{{ __('cart.Refresh, Multiply')}}</h1>
      </div>
    </div>
  </div>
</div>

<section class="section cart-body pb0">
  <div class="container">
    <div class="row">
    @foreach($user_addresses as $key=>$user_address)
      <div class="col-md-4 col-sm-6 mb30">
        <div class="address-area">
          <h4>{{$user_address->name}}</h4>
          <p>{{$user_address->house_no}},<br>{{$user_address->apertment_no}}, {{$user_address->area}}, {{$user_address->landmark}}, {{$user_address->state}}, {{$user_address->city}} - {{$user_address->pin}}, {{$user_address->country}}</p>
          <p>{{ __('cart.Email')}} : {{$user_address->email}}</p>
          <p>{{ __('cart.Phone')}} : {{$user_address->contact_no}}</p>
          <a href="javascript:void(0);" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('postSavedAddress{{$user_address->id}}').submit();">{{ __('cart.Deliver to this address')}}</a>
        </div>
      </div>
    @endforeach
      <div class="col-md-12">
        <div class="contact-devider"></div>
      </div>
    </div>
    <form action="{{ route('postAddressConfirm',['id' => $addr->id]) }}" method="post">
        @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="address-graw-area">
          <div class="row">
            <div class="col-md-12 mb20">
              <h4>{{ __('cart.Contact Information')}}</h4>
            </div>
            <div class="col-md-4 col-sm-6 mb20">
              <input type="text"  class="from-control" name="name" id="name" required="" placeholder="Name" value="{{ $addr->id ? $addr->name : auth()->user()->name }}">
            </div>
            <div class="col-md-4 col-sm-6 mb20">
              <input type="email" name="email" class="from-control" placeholder="Email" id="Email-2" required="" value="{{ $addr->id ? $addr->email : auth()->user()->email }}">
            </div>
            <div class="col-md-4 col-sm-6 mb20">
              <input type="tel" name="" id="mobile-number" class="from-control" placeholder="e.g. +1 702 123 4567" required="" value="{{$addr->id ? $addr->contact_no : auth()->user()->phone}}">
            </div>
            <div class="col-md-12">
              <div class="contact-devider"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mb20">
              <h4>{{ __('cart.Shipping address')}}</h4>
            </div>
            <div class="col-md-4 col-sm-6 mb20">
              <input type="text" name="house_no" class="from-control" placeholder="House number" id="name-3" required="" value="{{ $addr->id ? $addr->house_no : old('house_no') }}">
            </div>
            <div class="col-md-8 col-sm-6 mb20">
              <input type="text" name="apertment_no" class="from-control" placeholder="Apartment Name" id="Name-4" value="{{ $addr->id ? $addr->apertment_no : old('apertment_no') }}" required="">
            </div>
            <div class="col-md-4 col-sm-6 mb20">
              <input type="text" name="area" id="name-3" class="from-control" placeholder="Area Details" required="" value="{{ $addr->id ? $addr->area : old('area') }}">
            </div>
            <div class="col-md-4 col-sm-6 mb20">
              <input type="text" name="landmark" class="from-control" placeholder="Landmark" id="Name-4" value="{{ $addr->id ? $addr->landmark : old('landmark') }}" required="">
            </div>
            <div class="col-md-4 col-sm-6 mb20">
              <input type="text" name="city" class="from-control" placeholder="City" id="name-3" required="" value="{{ $addr->id ? $addr->city : old('city') }}">
            </div>
            <div class="col-md-4 col-sm-6 mb20">
                <select class="from-control">
                @foreach($countries as $key=>$country)
                <option onclick="$('#countryInput').val('{{ $key }}'); $('#countryInput2').val('{{ $country }}'); $('#cntryDiv').html('{{ $country }}');$('#w-dropdown-list-3').removeClass('w--open');$('#w-dropdown-toggle-3').removeClass('w--open');$('#w-dropdown-toggle-3').attr('aria-expanded','false');">{{ $country }}</option>
                @endforeach
                </select>
            </div>
            <div class="col-md-4 col-sm-6 mb20">
              <input type="text" class="from-control" placeholder="State" name="state" placeholder="State" id="name-3" required="" value="{{ $addr->id ? $addr->state : old('state') }}">
            </div>
            <div class="col-md-4 col-sm-6 mb20">
              <input type="text" name="pin" class="from-control" placeholder="Pin Code" id="name-3" required="" value="{{ $addr->id ? $addr->pin : old('pin') }}">
            </div>
            <div class="col-md-4 col-sm-6 mb20">
              <input type="text" name="gstin" class="from-control" placeholder="Gst Number(Optional)" id="gstin" value="{{ $addr->id ? $addr->gstin : old('gstin') }}">
            </div>
            <div class="col-md-12">
              <div class="contact-devider"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mb20">
              <h4>{{ __('cart.Select carrier Partner')}}</h4>
            </div>
            <div class="col-md-4 col-sm-6 mb20">
                {{Form::select('carrier_partner',['' => __('cart.Select carrier Partner')]+$partners,$addr->carrier_partner,['class'=>'from-control','required'])}}
            </div>
            <div class="clearfix"></div>
            <div class="col-md-4 col-sm-6 pull-right text-right mb20">
              <button type="submit" class="btn btn-primary">{{ __('cart.Checkout')}}</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@if($addr->id)
<script>
        $('html, body').animate({
            scrollTop: $("#ttttt").offset().top
        }, 2000);
</script>
@endif
@stop