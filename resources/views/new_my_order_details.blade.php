@extends('layouts.new_frontlayout')

  @section('title', 'My Order Details | Ecotact')
  @section('description', '')
  @section('keywords', '')


@section('content')
<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/Product-detail.png')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">{!!__('cart.Order Details')!!}</span>
        <h1>{!!__('cart.Refresh, Multiply')!!}</h1>
      </div>
    </div>
  </div>
</div>

<section class="section about-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="main-details-box">
          <div class="details-slider make_me_sticky">
            <img src="{{asset('assets/front/img/product1.jpg')}}" alt="ecotactbags" class="img-responsive">
          </div>
          <div class="details-info">
            <a href="{{route('myOrders')}}" class="backstep mb30"><img src="{{asset('assets/front/img/left-arrow.svg')}}" alt="ecotactbags"></a>
            <h2 class="mb30">{{ @$order->stock->product->productDetails[0]['product_name'] }}</h2>
            <div class="details-form">
              <form>
                <div class="row">
                  <div class="col-md-12 mb15">
                    <div class="from-group">
                      <label>{!!__('cart.Select Size')!!}</label>
                      <select class="input-control" style="background:none;">
                          <option style="background:none;">{{ @$order->stock->size_tag}}<br>{{ @$order->stock->size}}</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5 mb15">
                    <div class="from-group">
                      <label>{!!__('cart.Current Status')!!}</label>
                      <label class="input-control" style="background:none; text-align:center; padding-top:12px;">{{ @$order->status}}</label>
                    </div>
                  </div>
                  <div class="col-md-5 mb15">
                    <div class="from-group">
                      <label>{!!__('cart.Selected Quantity of Pieces')!!}</label>
                      <label class="input-control" style="background:none; text-align:center; padding-top:12px;">{{ @$order->stock->pieces}}</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb10">
                    <div class="from-group">
                      <label>{!!__('cart.Price Per Unit')!!} : <span>{{$order->stock->currency}} {{ @$order->stock->regular_price}} <b>{!!__('cart.Per bag')!!}</b></span></label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 mb15">
                    <div class="from-group">
                      <label>{!!__('cart.Quantity Box')!!} :</label>
                      <label class="input-control" style="background:none; text-align:center; padding-top:12px;">{{ @$order->qty}}</label>
                    </div>
                  </div>

                  <div class="col-md-4 mb15">
                    <div class="from-group">
                      <label>{!!__('cart.Weight')!!}</label>
                      <span class="input-control" style="background:none; text-align:center; padding-top:12px;">{{@$order->stock->weight*$order->qty}} KG</span>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="from-group">
                      <label>{!!__('cart.Total Amount')!!} : <span>{{$order->stock->currency}} {{ @$order->price*$order->stock->pieces*$order->qty }}</span></label>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop