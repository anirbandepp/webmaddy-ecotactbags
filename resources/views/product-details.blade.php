@extends('layouts.front-layout')
@section('content')
@include('hamburger-dropdown')

@if(@$product->id == 3 && $category=='packaging')
@section('title', 'Ecological Multilayered Hermetic Storage & Sealed Bags in USA')
@section('description', 'Find best multi-layered hermetic storage bags in USA for green coffee and grains. Our Hermetic sealed bags maintain the quality with high oxygen & moisture barrier.')
@section('keywords', 'Multilayered Hermetic Storage Bags, hermetically sealed bags')
@elseif(@$product->id == 3 && $category=='storage')
@section('title', 'Ecotact Multilayered Hermetic Storage Bags | Coffee & Cacao Sacks')
@section('description', 'Ecotact delivers multilayered hermetic storage bags globally. Our green coffee storage bags, grain & cacao sacks maintain quality with high oxygen & moisture barrier.')
@section('keywords', 'Multilayered Hermetic Storage Bags, hermetically sealed bags')
@else
    @section('title', @$product->productDetails[0]['meta_title'])
    @section('description', @$product->productDetails[0]['meta_desc'])
    @section('keywords', @$product->productDetails[0]['meta_keys'])
@endif


<style>
.user-manual-text {
	color: #0c6a35;
	font-size: 16px;
}

    .w-input{
        height: 26px;
        margin-bottom: 0px;
    }
    .text-field.otp{
        width: 118px;
        border-style: none none none;
    }
    .owl-123 {
        width: 40%;
        padding-top: 40px;
    }
    .owl-nav{
        position: absolute;
        width: 100%;
        top: 45%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .owl-prev{
        position: absolute;
        left: -15px;
    }
    .owl-next{
        position: absolute;
        right: -15px;
    }
    .la-arrow-left{
        background-color: rgba(256, 256, 256, 0.8);
        padding: 10px;
        border-radius: 50%;
        box-shadow: rgb(99 99 99 / 20%) 0px 2px 8px 0px;
    }
    .la-arrow-right{
        background-color: rgba(256, 256, 256, 0.8);
        padding: 10px;
        border-radius: 50%;
        box-shadow: rgb(99 99 99 / 20%) 0px 2px 8px 0px;
    }
    .manual-button {
        padding: 8px 19px;
    }
    @media only screen and (max-width : 768px) {
    .owl-123{
        width: 100%;
        }
    }
    .logos-award img {
        max-width: 140px;
    }
</style>


<div class="section products">
	<div class="main-wrapper">
		<div class="banner-content-wrapper">
			<div class="title-caption-wrapper">
				<div class="title-caption center">
				    @if($category=='packaging')
				        {{__('productdetails.packaging')}}
				    @elseif($category=='storage')
				        {{__('productdetails.storage')}}
				    @elseif($category=='packaging-equipment')
				        {{__('productdetails.equipment')}}
				    @elseif($category=='accessories')
				        {{__('productdetails.accessories')}}
				    @endif
				    <br></div>
			</div>
			<div class="h2-wrapper white">
				<h1 class="h2 center">{!! @$product->productDetails[0]['banner_text'] != null ? @$product->productDetails[0]['banner_text']  : __('productdetails.pd') !!}</h1>
			</div>
		</div>
	</div>
</div>
<div class="section _100-0" ng-app="myApp" ng-controller="myCtrl">
	<div class="main-wrapper">
		<div class="product-main-wrapper">
			{{--<a href="#" class="product-image w-inline-block"><img src="{{ $product->base_img ? asset('product_images/medium/'.$product->base_img) :  asset('front-end/images/Mask-Group.png')}}" loading="lazy" sizes="(max-width: 479px) 95vw, 332.9947814941406px" width="333" srcset="{{ $product->base_img ? asset('product_images/medium/'.$product->base_img) :  asset('front-end/images/Mask-Group.png')}} 500w, {{ $product->base_img ? asset('product_images/medium/'.$product->base_img) :  asset('front-end/images/Mask-Group.png')}} 666w" alt="ecotactbags" class="image-10"></a>--}}
			
			<div class="owl-123">
    			<div id="details-slider" class="owl-carousel">
    			    @forelse($product->productImages()->get() as $image)
    			    @if($image->active == 1)
                        <div class="item">
                            <img src="{{asset('product_images/medium/'.$image->url)}}?v=0.1" alt="" class="img-responsive">
                        </div>
                    @endif
                    @empty
                    @endforelse
                    
                </div>
            </div>
			
			<div class="product-content-wrapper">
				<div class="breadcrumbs-wrapper">
					<a href="{{$backRoute}}"><img src="{{asset('front-end/images/left-arrow.svg')}}" loading="lazy" width="20" alt="Left Arrow Icon" ></a>
				</div>
				<a href="#" class="product-heading-wrapper w-inline-block" style="text-transform: capitalize;" ng-init="setMyCart('{{ json_encode($cart) }}')" >
					<h2 class="product-heading">{{ @$product->productDetails[0]['product_name'] }}</h2>
				</a>
				<style>
				    .ar-visible {
				        display: initial !important;
				    }
				    .ar-block {
				        display: none !important;
				    }
				</style>
				@if($product->orderable)
				<div class="size-wrapper" ng-if="size != 'No Size'">
					<div class="select-size">{{ __('productdetails.Select Size') }}</div>
				</div>
				<div class="drop-down-wrapper" style="position: relative; z-index: 9;width: 100%;">
					<div data-hover="" data-delay="0" class="size-dropdown w-dropdown">
						<div class="dropdown-toggle w-dropdown-toggle" id="dd"  style="white-space: initial; display:block;"  ng-if="size != 'No Size'" ng-click="open_my_dropdown()">
							<div class="icon w-icon-dropdown-toggle"></div>
							<div class="drop-down-text-wrapper" >
								@if(config('app.lang')->slug == 'sp')
								<div class="drop-down-text" ng-if="size == 'Customization'">Personalizaci¨®n de Marca</div>
								<div class="drop-down-text" ng-if="size != 'Customization'" >@{{size}}</div>

								@else
								<div class="drop-down-text" style="font-weight: 500;">@{{size}}</div>
								@endif
                            </div>
                        </div>
                        <nav class="dropdown-list-3 w-dropdown-list"  id="ddown" role="button" style="margin-top: 75px;">
                            @if($product->productDetails)
                            {{-- dd($ar) --}}
                            @foreach($ar as $st)
                            <a href="#" class="details-dropdown-link w-dropdown-link" @if ($loop->first) ng-init="set_product_updated('{{ json_encode($st) }}');" @endif ng-click="set_product_updated('{{ json_encode($st) }}');">{!! __('sizes.'.$st['size'])!!}</a><!-- test -->
                            @endforeach
                            @endif
                        </nav>
                    </div>
                </div>

                {{-- pieces --}}
				<div class="size-wrapper" ng-show="size != 'Customization'" style="margin-top: 7px;">
					<div class="select-size">{{ __('productdetails.PACK OF (PCS)' )}}</div>
				</div>
				<div class="drop-down-wrapper" ng-show="size != 'Customization'">
					<div data-hover="" data-delay="0" class="size-dropdown bottom-margin w-dropdown">
						<div class="dropdown-toggle w-dropdown-toggle" id="dd1">
							<div class="icon w-icon-dropdown-toggle"></div>
							<div class="drop-down-text-wrapper" >
								<div class="drop-down-text" ng-if="qtyOfPieces == 'Quantity of Pieces'">Pack Of</div>
								<div class="drop-down-text" ng-if="qtyOfPieces != 'Quantity of Pieces'">@{{qtyOfPieces}}</div>
							</div>
						</div>
						<nav class="dropdown-list-3 w-dropdown-list"  id="ddown1" role="button" style="margin-top: 47px;">
							<a href="#" class="details-dropdown-link w-dropdown-link" ng-model="qtyOfPieces" ng-click="setQty(qtr)" ng-repeat="qtr in qtyArr">@{{qtr['pieces']}}</a>
						</nav>
					</div>
				</div>

                <div class="info-details-container" ng-show="size != 'Customization'">
                    <div class="form-block w-form" style="display: none;">
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
                    <div class="price-main-wrapper">
                        <div class="sub-title-wrapper">
                            <div class="sub-title">{{ __('productdetails.Price Per Unit') }} :</div>
                        </div>
                        <div class="rates">
                            <div class="rates-text"> @{{currency}} @{{showPrice}} </div>
                        </div>
                        <div class="per-bag">{{ __('productdetails.Per bag') }}</div>
                    </div>
                    <div class="quantity-main-wrapper product">
                        <div class="quantity-box-wp">
                            <div class="sub-title-wrapper" style="margin-top: -17px;">
                                <div class="sub-title">{{ __('productdetails.No. of Boxes') }} :</div>
                            </div>
                            <div class="quantity-wrapper" style="border:none;">
                                
                                <input type="text" class="text-field email w-input" id="qtyiNPUT" name="field-1" data-name="Field 6" required="" ng-change="calculateData('{{ $product->stock->sku }}')" ng-model="showQuantity" style="margin-left: 20px; text-align:center;">
                            </div>
                        </div>
                    </div>
                    <div class="quantity-main-wrapper product" style="margin-top: -31px;">
                        <div class="quantity-box-wp">
                            <div class="sub-title-wrapper">
                                <div class="sub-title" style="margin-top:-9px;">{{ __('productdetails.Total No. of Pieces') }} :</div>
                            </div>
                            <div class="quantity-wrapper" style="padding: 12px 6px;margin-left: 3px;">
                                <div class="value light">@{{ showQuantity ? showQuantity * qtyOfPieces : qtyOfPieces }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="quantity-main-wrapper product" >
                        <div class="quantity-box-wp">
                            <div class="sub-title-wrapper">
                                <div class="sub-title" style="margin-top:-9px;">{{ __('productdetails.Weight') }} :</div>
                            </div>
                            <div class="quantity-wrapper" style="padding: 12px 6px;margin-left: 106px;">
                                <div class="value light">@{{ weight }} {{$product->stock->weight_unit}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="total-main-wrapper">
                        <div class="sub-title-wrapper">
                            <div class="sub-title">{{ __('productdetails.Total Amount') }} :</div>
                        </div>
                        <div class="total-text-wrapper">
                            <div class="total" id="totp"> @{{currency}} @{{totalPrice}}</div>
                        </div>
                    </div>
                </div>
                <div class="products-button-wrapper" ng-show="totalPrice > 0" ng-show="size != 'Customization'">
                    <div class="button-wrapper">
                        <a class="button accent w-button" ng-click ="addToCart(0,'{{ route('addToCart') }}',0,'{{ $product->id }}'); test('{{auth()->user() ? auth()->user()->email : ''}}',totalPrice,'{{\Carbon\Carbon::now()->toDateString()}}');">{{ __('productdetails.Add To Cart') }}</a>
                        <a style="margin-left: 8px;" class="button accent w-button" ng-show="alreadyAdded" id="addedCart@{{showSku}}" href="{{ route('cartItems') }}" >{{ __('productdetails.Go To Cart') }}</a>
                    </div>
                </div>
                @endif
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
                            <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="Bullet Check Icon" class="bullet-pointer">
                                <div class="body-text" style="line-height:1.5;">{!! __('productdetails.Aroma') !!}</div>
                            </div>
                            <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="Bullet Check Icon" class="bullet-pointer">
                                <div class="body-text" style="line-height:1.5;">{!! __('productdetails.Sensitive') !!}</div>
                            </div>
                            <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="Bullet Check Icon" class="bullet-pointer">
                                <div class="body-text" style="line-height:1.5;">{!! __('productdetails.Flavor') !!}</div>
                            </div>
                            <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="Bullet Check Icon" class="bullet-pointer">
                                <div class="body-text" style="line-height:1.5;">{!! __('productdetails.Hydrocarbon') !!}</div>
                            </div>
                            <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="Bullet Check Icon" class="bullet-pointer">
                                <div class="body-text" style="line-height:1.5;">{!! __('productdetails.High') !!}</div>
                            </div>
                            <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="Bullet Check Icon" class="bullet-pointer">
                                <div class="body-text" style="line-height:1.5;">{!! __('productdetails.resistance') !!}</div>
                            </div>
                            <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="Bullet Check Icon" class="bullet-pointer">
                                <div class="body-text" style="line-height:1.5;">{!! __('productdetails.Recyclable') !!}</div>
                            </div>
                            <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="Bullet Check Icon" class="bullet-pointer">
                                <div class="body-text" style="line-height:1.5;">{!! __('productdetails.Transparency') !!}</div>
                            </div>
                            <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="Bullet Check Icon" class="bullet-pointer">
                                <div class="body-text" style="line-height:1.5;">{!! __('productdetails.Does') !!}</div>
                            </div>
                            <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="Bullet Check Icon" class="bullet-pointer">
                                <div class="body-text" style="line-height:1.5;">{!! __('productdetails.Mold') !!}</div>
                            </div>
                        </div>
                        <div class="pointer-wrapper more">
                            <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="Bullet Check Icon" class="bullet-pointer">
                                <div class="body-text">Aroma maintained</div>
                            </div>
                            <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="Bullet Check Icon" class="bullet-pointer">
                                <div class="body-text">Sensitive food and vitamin content protected</div>
                            </div>
                            <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="Bullet Check Icon" class="bullet-pointer">
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
                    <a target="_blank" href="{{$product->watch_now}}" class="manual-button video w-inline-block"><img src="{{asset('front-end/images/video.svg')}}" loading="lazy" alt="Video Icon" class="user-manual-img">
                        <div class="user-manual-text">{{__('productdetails.v') }}</div>
                    </a>
                    @endif

                    @if(config('app.lang')->slug == 'en' && $product->manual || config('app.lang')->slug == 'sp' && $product->manual_spanish || config('app.lang')->slug == 'in' && $product->manual)
                    <a data-w-id="233b1893-917e-a159-68f2-a801113b6433" href="" onClick="showPopup();" class="manual-button video w-inline-block">
                        <img src="{{asset('front-end/images/user-manual.svg')}}" loading="lazy" alt="User Manual Icon" class="user-manual-img">
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
@php
if(config('app.lang')->slug == 'in'){ $cu = 'INR';} else{ $cu =  'USD'; }
@endphp
<script>
	function showPopup(){
	    console.log('call');
		$("#popUp").css("display", "flex");
		$("#popUp").css("opacity", "1");
		$("#email-form").attr('action', "{{$product->manual ? route('manualForm',['categorySlug' => $category,'productSlug' => $product->slug]) : '#'}}");
	}
	$( document ).ready(function() {
        setTimeout(datalayer, 5000);
        function datalayer(){
            console.log($('#totp').text());
        	dataLayer.push({ ecommerce: null });
            dataLayer.push({
              event: "view_item",
              ecommerce: {
                items: [
                {
                  item_id: "{{$product->stock->sku}}",			//product name
                  item_name: "{{@$product->productDetails[0]['product_name']}}",		//product id/sku
                  currency: "{{$cu}}",
                  discount: 0,				//discount
                  index: 0,
                  item_brand: "Ecotact",
                  item_category: "{{$category}}",
                  item_category2: "",
                  item_list_id: "",
                  item_list_name: "",
                  item_variant: "",
                  location_id: "",
                  price: $('#totp').text(),					//product price
                  quantity: $('#qtyiNPUT').val()					//product quantity
                }
                ]
              }
            });
        }
	});

</script>
@stop

@if(@$product->id == 5)
<script type=""application/ld+json"">
{
  ""@context"": ""https://schema.org/"", 
  ""@type"": ""Product"", 
  ""name"": ""Ecotact Sterile Vacuum Bags"",
  ""image"": ""https://www.ecotactbags.com/product_images/medium/UCIP2o3wg1.jpg"",
  ""description"": ""Sterile bags are high-barrier multi-layered plastic bags that are strong & flexible and can preserve food grains for a longer duration. These bags are sealed scientifically after extracting the excess air."",
  ""brand"": {
    ""@type"": ""Brand"",
    ""name"": ""Ecotact Bags""
  },
  ""sku"": """"
}
</script>


@endif
