@extends('layouts.front-layout')
@section('content')
@include('hamburger-dropdown')

@section('title', @$product->productDetails[0]['meta_title'])
@section('description', @$product->productDetails[0]['meta_desc'])
@section('keywords', @$product->productDetails[0]['meta_keys'])

<style>
.user-manual-text {
  color: #0c6a35;
  font-size: 16px;
}
</style>


<div class="section products">
  <div class="main-wrapper">
    <div class="banner-content-wrapper">
      <div class="title-caption-wrapper">
        <div class="title-caption center">{{$category=='packaging' ?  __('productdetails.packaging') :  __('productdetails.storage') }}<br></div>
      </div>
      <div class="h2-wrapper white">
        <h2 class="h2 center">{!! __('productdetails.pd') !!}</h2>
      </div>
    </div>
  </div>
</div>
<div class="section _100-0" ng-app="myApp" ng-controller="myCtrl">
  <div class="main-wrapper">
    <div class="product-main-wrapper">
      <a href="#" class="product-image w-inline-block"><img src="{{ $product->base_img ? asset('product_images/medium/'.$product->base_img) :  asset('front-end/images/Mask-Group.png')}}" loading="lazy" sizes="(max-width: 479px) 95vw, 332.9947814941406px" width="333" srcset="{{ $product->base_img ? asset('product_images/medium/'.$product->base_img) :  asset('front-end/images/Mask-Group.png')}} 500w, {{ $product->base_img ? asset('product_images/medium/'.$product->base_img) :  asset('front-end/images/Mask-Group.png')}} 666w" alt="ecotactbags" class="image-10"></a>
      <div class="product-content-wrapper">
        <div class="breadcrumbs-wrapper">
          <!---<a href="{{route('home')}}" class="breadcrumbs left">Home</a>--><a href="{{$backRoute}}"><img src="{{asset('front-end/images/left-arrow.svg')}}" loading="lazy" width="20" alt="ecotactbags" ></a>
          <!--<a href="{{route('productsList',['slug' => $product->categories()->first()->slug])}}" class="breadcrumbs image-27">Product</a>-->
        </div>
        <a href="#" class="product-heading-wrapper w-inline-block" style="text-transform: capitalize;">
          <h2 class="product-heading">{{ @$product->productDetails[0]['product_name'] }}</h2>
        </a>
        <div class="size-wrapper">
          <div class="select-size">{{ __('productdetails.Select Size') }}</div>
        </div>
        <div class="drop-down-wrapper">
          <div data-hover="" data-delay="0" class="size-dropdown w-dropdown">
            <div class="dropdown-toggle w-dropdown-toggle" id="dd">
              <div class="icon w-icon-dropdown-toggle"></div>
              <div class="drop-down-text-wrapper" >
                @if($product->productDetails)
                @foreach($sizes as $st)
                @if ($loop->first)
                @if(config('app.lang')->slug == 'sp')
                <div class="drop-down-text" ng-if="size == 'Customization'">Personalizaci贸n de Marca</div>
                <div class="drop-down-text" ng-if="size != 'Customization'">@{{size}}</div>
                
                @else
                <div class="drop-down-text">@{{size}}</div>
                @endif
                @endif
                @endforeach
                @endif
              </div>
            </div>
            <nav class="dropdown-list-3 w-dropdown-list" style="margin-top:47px;" id="ddown" role="button">
              @if($product->productDetails)
              @foreach($sizes as $st)
              <a href="#" class="details-dropdown-link w-dropdown-link" @if ($loop->first) ng-init="set_product('{{$st->sku}}', '{{ __('sizes.'.$st->size)}}', '{{$st->size_id}}', '{{$st->currency}}', '{{$st->regular_price}}', '{{$st->offer_price}}', '{{$st->qty}}', '{{$st->remaining_qty}}', '{{$st->stock_quantity}}', '{{$st->empty_qty}}')" @endif ng-click="set_product('{{$st->sku}}', '{{$st->size}}', '{{$st->size_id}}', '{{$st->currency}}', '{{$st->regular_price}}', '{{$st->offer_price}}', '{{$st->qty}}', '{{$st->remaining_qty}}', '{{$st->qty}}', '{{$st->empty_qty}}');">@if($st->pSize){{ __('sizes.'.$st->pSize->value)}}@endif</a>
              @endforeach
              @endif
            </nav>
          </div>
        </div>
        <div class="info-details-container">
          <div class="form-block w-form" ng-show="size == 'Customization'">
            <form id="email-form-2" name="email-form-2" data-name="Email Form 2" class="form-2">
              <div class="upload-file-wrapper"><label for="name" class="sub-title">{{ __('productdetails.Upload Custom Logo:' )}} </label>
                <div class="text-field-3">
                  <a href="#" class="upload-button w-button">{{ __('productdetails.Upload' )}}</a>
                </div>
              </div>
              <div class="custom-size-wrapper"><label for="email" class="sub-title">{{ __('sizes.E') }}</label><input type="email" class="text-field-2 w-input" maxlength="256" name="email-4" data-name="Email 4" placeholder="" id="email-4" required=""></div>
            </form>
            <div class="w-form-done">
              <div>Thank you! Your submission has been received!</div>
            </div>
            <div class="w-form-fail">
              <div>Oops! Something went wrong while submitting the form.</div>
            </div>
          </div>
            {{-- <div class="price-main-wrapper">
              <div class="sub-title-wrapper">
                <div class="sub-title">Price :</div>
              </div>
              <div class="rates">
                <div class="rates-text"> @{{currency}} @{{showPrice}} </div>
              </div>
              <div class="per-bag">Per bag</div>
            </div>
            <div class="quantity-main-wrapper">
              <div class="sub-title-wrapper">
                <div class="sub-title">Quantity :</div>
              </div>
              <div class="quantity-wrapper">
                <div class="symbol" ng-click ="minus('{{ $product->stock->sku }}')" style="cursor: pointer;"><strong class="bold-text-2">-</strong></div>
                <div class="value"><strong >@{{ showQuantity }}</strong></div>
                <div class="symbol" ng-click ="plus('{{ $product->stock->sku }}')" style="cursor: pointer;"><strong class="bold-text">+</strong></div>
              </div>
            </div>
            <div class="total-main-wrapper">
              <div class="sub-title-wrapper">
                <div class="sub-title">Total :</div>
              </div>
              <div class="total-text-wrapper">
                <div class="total"> @{{currency}} @{{totalPrice}}</div>
              </div>
            </div> --}}
          </div>
          <!--<div class="products-button-wrapper">-->
            <!--  <div class="button-wrapper">-->
              <!--    <a href="#" class="button accent w-button">Order Now</a>-->
              <!--  </div>-->
              <!--</div>-->
              <div class="small-text-wrapper">
                <div class="small-text">{!!@$product->productDetails[0]['short_desc']!!}</div>
              </div>
              <div class="details-main-wrapper">
                <div class="product-details-wrappper">
                  <div class="product-details">{!! __('productdetails.pd') !!}</div>
                </div>
                @if(@$product->productDetails[0]['full_desc'] != null)
                <div class="body-text-wrapper">
                  <div class="body-text">{!!@$product->productDetails[0]['full_desc']!!}</div>
                </div>
                @else
                <div class="product-details-container">
                  <div class="pointer-wrapper">
                    <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotactbags" class="bullet-pointer">
                      <div class="body-text">{!! __('productdetails.Aroma') !!}</div>
                    </div>
                    <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotactbags" class="bullet-pointer">
                      <div class="body-text">{!! __('productdetails.Sensitive') !!}</div>
                    </div>
                    <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotactbags" class="bullet-pointer">
                      <div class="body-text">{!! __('productdetails.Flavor') !!}</div>
                    </div>
                    <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotactbags" class="bullet-pointer">
                      <div class="body-text">{!! __('productdetails.Hydrocarbon') !!}</div>
                    </div>
                    <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotactbags" class="bullet-pointer">
                      <div class="body-text">{!! __('productdetails.High') !!}</div>
                    </div>
                    <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotactbags" class="bullet-pointer">
                      <div class="body-text">{!! __('productdetails.resistance') !!}</div>
                    </div>
                    <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotactbags" class="bullet-pointer">
                      <div class="body-text">{!! __('productdetails.Recyclable') !!}</div>
                    </div>
                    <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotactbags" class="bullet-pointer">
                      <div class="body-text">{!! __('productdetails.Transparency') !!}</div>
                    </div>
                    <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotactbags" class="bullet-pointer">
                      <div class="body-text">{!! __('productdetails.Does') !!}</div>
                    </div>
                    <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotactbags" class="bullet-pointer">
                      <div class="body-text">{!! __('productdetails.Mold') !!}</div>
                    </div>
                  </div>
                  <div class="pointer-wrapper more">
                    <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotactbags" class="bullet-pointer">
                      <div class="body-text">Aroma maintained</div>
                    </div>
                    <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotactbags" class="bullet-pointer">
                      <div class="body-text">Sensitive food and vitamin content protected</div>
                    </div>
                    <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotactbags" class="bullet-pointer">
                      <div class="body-text">Flavor and inherent quality maintained</div>
                    </div>
                  </div>
                  <div class="view-less-wrapper">
                    <div class="text-block-2">View less -</div>
                  </div>
                </div>
                @endif
              </div>
              <div class="green-button-wrapper">
                @if($product->watch_now)
                <a target="_blank" href="{{$product->watch_now}}" class="manual-button video w-inline-block"><img src="{{asset('front-end/images/video.svg')}}" loading="lazy" alt="" class="user-manual-img">
                  <div class="user-manual-text">{{__('productdetails.v') }}</div>
                </a>
                @endif
                
                @if(config('app.lang')->slug == 'en' && $product->manual || config('app.lang')->slug == 'sp' && $product->manual_spanish)
                <a data-w-id="233b1893-917e-a159-68f2-a801113b6433" href="" onClick="showPopup();" class="manual-button video w-inline-block">
                  <img src="{{asset('front-end/images/user-manual.svg')}}" loading="lazy" alt="ecotactbags" class="user-manual-img">
                  <div class="user-manual-text">{{ __('productdetails.m') }}</div>
                </a>
                @endif
                <a data-w-id="233b1893-917e-a159-68f2-a801113b6433" href="{{route('contact')}}#enquiry-form" class="manual-button w-inline-block">
                  <div class="user-manual-text">{{ __('productdetails.e') }}</div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <script>
        function showPopup(){
          $("#popUp").css("display", "flex");
          $("#popUp").css("opacity", "1");
          $("#email-form").attr('action', "{{$product->manual ? route('manualForm',['categorySlug' => $category,'productSlug' => $product->slug]) : '#'}}");
        }
      </script>
      @stop