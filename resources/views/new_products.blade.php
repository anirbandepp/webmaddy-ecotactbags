@extends('layouts.new_frontlayout')

@if($category->name == 'Packaging')

  @if(config('app.lang')->slug == 'en' || config('app.lang')->slug == 'in')
    @section('title', 'Hermetic Packaging Supplier | empaque al vacio | Ecotact Bags')
    @section('description', 'Ecotact is a hermetic packaging supplier producing green coffee beans packaging bags, cocoa packaging &amp; grains packaging. Get bolsas de empaque al vacío de café.')
    @section('keywords', 'hermetic packaging supplier,coffee beans packaging bags,hermetic packaging,packaging cacao,cacao packaging,packaging cacao,empaque al vacio,bolsas de empaque al vacio')
  @elseif(config('app.lang')->slug == 'sp')
    @section('title', 'Hermetic Packaging Supplier | empaque al vacio | Ecotact Bags')
    @section('description', 'packaging bags, cocoa packaging & grains packaging. Get bolsas de')
    @section('keywords', 'hermetic packaging supplier,coffee beans packaging bags,hermetic packaging,packaging cacao,cacao packaging,packaging cacao,empaque al vacio,bolsas de empaque al vacio')
  @else
    @section('title', 'Hermetic Packaging Supplier | empaque al vacio | Ecotact Bags')
    @section('description', 'empaque al vacío de café.')
    @section('keywords', 'hermetic packaging supplier,coffee beans packaging bags,hermetic packaging,packaging cacao,cacao packaging,packaging cacao,empaque al vacio,bolsas de empaque al vacio')
  @endif

@elseif($category->name == 'Storage')

  @if(config('app.lang')->slug == 'en' || config('app.lang')->slug == 'in')
    @section('title', 'Hermetic Green Coffee Storage Bags | Grain & Cacao Bags | Ecotact')
    @section('description', 'Ecotact offers hermetically sealed bags for green coffee storage. Get multi-layer hermetic grain storage bags & cacao bags. Buy Bolsas de almacenamiento de café y granos.')
    @section('keywords', 'green coffee storage,hermetic grain storage bags,hermetically sealed bags,coffee storage bags,cacao bags,grain storage bags,bolsas de almacenamiento')
  @elseif(config('app.lang')->slug == 'sp')
    @section('title', 'Hermetic Green Coffee Storage Bags | Grain & Cacao Bags | Ecotact')
    @section('description', 'multi-layer hermetic grain storage bags & cacao bags. Buy Bolsas de')
    @section('keywords', 'green coffee storage,hermetic grain storage bags,hermetically sealed bags,coffee storage bags,cacao bags,grain storage bags,bolsas de almacenamiento')
  @else
    @section('title', 'Hermetic Green Coffee Storage Bags | Grain & Cacao Bags | Ecotact')
    @section('description', 'almacenamiento de café y granos.')
    @section('keywords', 'green coffee storage,hermetic grain storage bags,hermetically sealed bags,coffee storage bags,cacao bags,grain storage bags,bolsas de almacenamiento')
  @endif

@elseif($category->name == 'Packaging Equipment')
    @section('title', 'Vacuum Packaging Equipment and Machines for Grains | Ecotact Bags')
    @section('description', 'Ecotact provides durable vacuum packaging machines & equipment - ECOVAC 20-2 and ECOVAC 50 for food grains packaging. Proporcionamos máquina de envasado al vacío.')
    @section('keywords', 'Vacuum Packaging machine Vacuum Packaging equipment')
@elseif($category->name == 'Accessories')
    @section('title', 'Vacuum Packaging Accessories | Hermetic Storage Bags | Ecotact')
    @section('description', 'Ecotact offers some useful packaging accessories for hermetic storage solutions like custom printed corrugated boxes and high strength cable ties for sealing bags.')
    @section('keywords', 'coffee packaging bags,vacuum packaging,Packaging accessories,Hermetic Storage Bags')
@endif

@section('content')

<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/Product-detail.png')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">
            @if($category->name =='Packaging')
            {!!__('productdetails.packaging')!!}
            @elseif($category->name =='Storage')
            {!!__('productdetails.storage')!!}
            @elseif($category->name == 'Packaging Equipment')
            {!!__('productdetails.equipment')!!}
            @elseif($category->name == 'Accessories')
            {!!__('productdetails.accessories')!!}
            @endif
        </span>
        <h1>
            @if($category->name =='Packaging')
            {!!__('productdetails.productPackaging')!!}
            @elseif($category->name =='Storage')
            {!!__('productdetails.productStorage')!!}
            @elseif($category->name =='Packaging Equipment')
            {!!__('productdetails.productAccessories')!!}
            @elseif($category->name =='Accessories')
            {!!__('productdetails.productAccessories')!!}
            @else
            @endif
        </h1>
      </div>
    </div>
  </div>
</div>

<section class="section about-section">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 mb50">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="about-text story-text">
              <p><h1 style="font-size:16px; font-weight: 400;line-height: 1.42857143;color: #333333; font-family: 'Work Sans', sans-serif;">{!!__('productdetails.productSub')!!}</h1></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 text-center mb50">
        <div class="blog-categories product-categories">
          <ul>
            <li class="active"><img src="{{asset('assets/front/img/product-opt1.svg')}}" alt="High Oxygen Barrier vacuum food grain packaging">{{ __('productdetails.High Oxygen Barrier') }}</li>
            <li> <img src="{{asset('assets/front/img/product-opt2.svg')}}" alt="Hermetically sealed bags for Moisture Lock"> {{ __('productdetails.Moisture Lock') }}</li>
            <li> <img src="{{asset('assets/front/img/product-opt3.svg')}}" alt="hermetic grain storage bags Customisation"> {{ __('productdetails.Customisation') }}</li>
            <li> <img src="{{asset('assets/front/img/product-opt4.svg')}}" alt="Ecotact packaging bags keeps Food Safe">{{ __('productdetails.Food Safe') }}</li>
            <li> <img src="{{asset('assets/front/img/product-opt5.svg')}}" alt="100% Recyclable Ecotact coffee and food packaging bags">{{ __('productdetails.100% Recyclable') }}</li>
          </ul>
        </div>
      </div>
       @forelse($products as $product)
        <div class="col-md-12">
        <div class="listing-box mb30">
          <a href="#"><img src="{{ $product->base_img ? asset('product_images/medium/'.$product->base_img) :  asset('front-end/images/Mask-Group.png')}}?v=0.1" alt="{{$product->alt}}" class="img-responsive"></a>
          <div class="listing-detls">
            <a href="{{ route('productFullView',['category' => $category->slug ,'slug' => $product->slug]) }}"><h2>{{ @$product->productDetails[0]['product_name'] }}</h2></a>
            <h4>{!! __('productdetails.pd') !!}</h4>
            <p>{!!@$product->productDetails[0]['short_desc']!!}</p>
            <a href="{{ route('productFullView',['category' => $category->slug ,'slug' => $product->slug]) }}" class="btn btn-primary">@if($product->orderable) {!! __('productdetails.view') !!}  @else {!! __('productdetails.e') !!}  @endif</a>
          </div>
        </div>
      </div>
       @empty
        <div class="product-main-wrapper sustainability">
          <a href="#" class="product-image w-inline-block"><img src="{{asset('assets/front/img/Mask-Group.png')}}" loading="lazy" width="346" alt="ecotactbags" class="image-10"></a>
          <div class="product-content-wrapper">
            <a href="#" class="product-heading-wrapper w-inline-block">
              <h2 class="product-heading">Multi-layered Hermetic Plastic Storage Bags</h2>
            </a>
            <div class="product-details-wrappper">
              <div class="product-details">Product Details</div>
            </div>
            <div class="body-text-wrapper">
              <div class="body-text">Our plastic bags within secondary bags keep the freshness of green coffee intact due to its high oxygen and moisture barrier properties.</div>
            </div>
            <div class="button-wrapper">
              <a href="product-details.html" class="button accent w-button">Order Now</a>
            </div>
          </div>
        </div>
       @endforelse

      <div class="col-md-12 text-center">
        <div class="blog-categories">
          <ul>
            @if($category->name == 'Packaging')
            <li class="active"><a href="{{route('productsList',['slug' => 'storage'])}}">{{__('productdetails.ViewstorageBags')}}</a></li>
            <li class="active"><a href="{{route('productsList',['slug' => 'packaging-equipment'])}}">{{__('productdetails.ViewpackagingequipmentBags')}}</a></li>
            <li class="active"><a href="{{route('productsList',['slug' => 'accessories'])}}">{{__('productdetails.ViewaccessoriesBags')}}</a></li>
            @elseif($category->name == 'Storage')
            <li class="active"><a href="{{route('productsList',['slug' => 'packaging'])}}">{{__('productdetails.ViewpackagingBags')}}</a></li>
            <li class="active"><a href="{{route('productsList',['slug' => 'packaging-equipment'])}}">{{__('productdetails.ViewpackagingequipmentBags')}}</a></li>
            <li class="active"><a href="{{route('productsList',['slug' => 'accessories'])}}">{{__('productdetails.ViewaccessoriesBags')}}</a></li>
            @elseif($category->name == 'Packaging Equipment')
            <li class="active"><a href="{{route('productsList',['slug' => 'packaging'])}}">{{__('productdetails.ViewpackagingBags')}}</a></li> 
            <li class="active"><a href="{{route('productsList',['slug' => 'storage'])}}">{{__('productdetails.ViewstorageBags')}}</a></li>
            <li class="active"><a href="{{route('productsList',['slug' => 'accessories'])}}">{{__('productdetails.ViewaccessoriesBags')}}</a></li>
            @elseif($category->name == 'Accessories')
            <li class="active"><a href="{{route('productsList',['slug' => 'packaging'])}}">{{__('productdetails.ViewpackagingBags')}}</a></li> 
            <li class="active"><a href="{{route('productsList',['slug' => 'storage'])}}">{{__('productdetails.ViewstorageBags')}}</a></li>
            <li class="active"><a href="{{route('productsList',['slug' => 'packaging-equipment'])}}">{{__('productdetails.ViewpackagingequipmentBags')}}</a></li>
            @endif
          </ul>
        </div>
      </div>


    </div>
  </div>
</section>


@stop