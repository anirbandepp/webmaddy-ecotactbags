@extends('layouts.front-layout')

@if($category->name == 'Packaging')

  @if(config('app.lang')->slug == 'en' || config('app.lang')->slug == 'in')
    @section('title', 'Hermetic Packaging Solution | Cafe Bolsas Para Envasar | Ecotact')
    @section('description', 'We offer bolsas empaques biodegradables para cafe in the USA. Get the best sustainable green coffee beans packaging bags along with cocoa, rice and food grain packaging bags with 9 layers.')
    @section('keywords', 'coffee packaging bags,coffee beans packaging bags,eco friendly coffee packaging,eco coffee packaging,packaging coffee bags,hermetic packaging solutions,coffee packaging,best coffee packaging,sustainable coffee packaging,bolsas para envasar,empaques para cafe biodegradables')
  @elseif(config('app.lang')->slug == 'sp')
    @section('title', 'Hermetic Packaging Solution | Cafe Bolsas Para Envasar | Ecotact')
    @section('description', 'We offer bolsas empaques biodegradables para cafe in the USA. Get the best sustainable green coffee beans packaging bags along with cocoa, rice and food grain packaging bags with 9 layers.')
    @section('keywords', 'coffee packaging bags,coffee beans packaging bags,eco friendly coffee packaging,eco coffee packaging,packaging coffee bags,hermetic packaging solutions,coffee packaging,best coffee packaging,sustainable coffee packaging,bolsas para envasar,empaques para cafe biodegradables')
  @else
    @section('title', 'Hermetic Packaging Solution | Cafe Bolsas Para Envasar | Ecotact')
    @section('description', 'We offer bolsas empaques biodegradables para cafe in the USA. Get the best sustainable green coffee beans packaging bags along with cocoa, rice and food grain packaging bags with 9 layers.')
    @section('keywords', 'coffee packaging bags,coffee beans packaging bags,eco friendly coffee packaging,eco coffee packaging,packaging coffee bags,hermetic packaging solutions,coffee packaging,best coffee packaging,sustainable coffee packaging,bolsas para envasar,empaques para cafe biodegradables')
  @endif

@elseif($category->name == 'Storage')

  @if(config('app.lang')->slug == 'en' || config('app.lang')->slug == 'in')
    @section('title', 'Best Green Coffee Storage Bags in USA | Cocoa & Hermetic Grain Storage Bags')
    @section('description', 'Get the best green coffee storage & food grain storage bags with high-barrier storage options. Visit our website to know more about our hermetic grain storage bags and containers.')
    @section('keywords', 'coffee storage bags,green coffee storage,hermetic grain storage bags,hermetic container')
  @elseif(config('app.lang')->slug == 'sp')
    @section('title', 'Best Green Coffee Storage Bags in USA | Cocoa & Hermetic Grain Storage Bags')
    @section('description', 'Get the best green coffee storage & food grain storage bags with high-barrier storage options. Visit our website to know more about our hermetic grain storage bags and containers.')
    @section('keywords', 'coffee storage bags,green coffee storage,hermetic grain storage bags,hermetic container')
  @else
    @section('title', 'Best Green Coffee Storage Bags in USA | Cocoa & Hermetic Grain Storage Bags')
    @section('description', 'Get the best green coffee storage & food grain storage bags with high-barrier storage options. Visit our website to know more about our hermetic grain storage bags and containers.')
    @section('keywords', 'coffee storage bags,green coffee storage,hermetic grain storage bags,hermetic container')
  @endif

@else

@endif

@section('content')

<style type="text/css">
    @media only screen and (max-width : 768px) {
        #product-banner {
               background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../front-end/images/5-Product-detail-mob.png');
                background-position:top center;
                background-size: cover;
        }
        #product-banner .banner-content-wrapper {
            padding-top: 170px;
            padding-bottom: 100px;
        }
    }
</style>


@include('hamburger-dropdown')
  <div class="section products" id="product-banner">
    <div class="main-wrapper">
      <div class="banner-content-wrapper">
        <div class="title-caption-wrapper">
          <div class="title-caption center">{!!$category->name =='Packaging' ?  __('productdetails.packaging') :  __('productdetails.storage') !!}<br></div>
        </div>
        <div class="h2-wrapper white">
          <h2 class="h2 center">{!!$category->name =='Packaging' ?  __('productdetails.productPackaging') :  __('productdetails.productStorage') !!}</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="main-wrapper">
      <div class="para-wrapper">
        <div class="body-text-wrapper">
          <div class="body-text center">{!!__('productdetails.productSub')!!}</div>
        </div>
      </div>
      <div class="product-bar-container">
        <div class="product-info-bar"><img src="{{asset('front-end/images/Group-311.svg')}}" loading="lazy" width="50" alt="High Oxygen Barrier vacuum food grain packaging">
          <div class="product-bar-text-wrapper">
            <div class="product-bar-text">{{ __('productdetails.High Oxygen Barrier') }}</div>
          </div>
        </div>
        <div class="product-info-bar"><img src="{{asset('front-end/images/Group-310.svg')}}" loading="lazy" width="50" height="50" alt="Hermetically sealed bags for Moisture Lock">
          <div class="product-bar-text-wrapper">
            <div class="product-bar-text">{{ __('productdetails.Moisture Lock') }}</div>
          </div>
        </div>
        <div class="product-info-bar"><img src="{{asset('front-end/images/Group-425.svg')}}" loading="lazy" width="50" height="50" alt="hermetic grain storage bags Customisation">
          <div class="product-bar-text-wrapper">
            <div class="product-bar-text">{{ __('productdetails.Customisation') }}</div>
          </div>
        </div>
        <div class="product-info-bar"><img src="{{asset('front-end/images/Group-308.svg')}}" loading="lazy" width="50" height="50" alt="Ecotact packaging bags keeps Food Safe">
          <div class="product-bar-text-wrapper">
            <div class="product-bar-text">{{ __('productdetails.Food Safe') }}</div>
          </div>
        </div>
        <div class="product-info-bar"><img src="{{asset('front-end/images/Group-307.svg')}}" loading="lazy" width="50" height="50" alt="100% Recyclable Ecotact coffee and food packaging bags">
          <div class="product-bar-text-wrapper">
            <div class="product-bar-text">{{ __('productdetails.100% Recyclable') }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section _0-0">
    <div class="main-wrapper">
      @forelse($products as $product)
      {{--dd($product->alt)--}}
        <div class="product-main-wrapper sustainability">
          <a href="#" class="product-image w-inline-block"><img src="{{ $product->base_img ? asset('product_images/medium/'.$product->base_img) :  asset('front-end/images/Mask-Group.png')}}" loading="lazy" width="346" alt="{{$product->alt}}" class="image-10"></a>
          <div class="product-content-wrapper">
            <a href="{{ route('productFullView',['category' => $category->slug ,'slug' => $product->slug]) }}" class="product-heading-wrapper w-inline-block">
              <h2 class="product-heading">{{ @$product->productDetails[0]['product_name'] }}</h2>
            </a>
            <div class="product-details-wrappper">
              <div class="product-details">{!! __('productdetails.pd') !!}</div>
            </div>
            <div class="body-text-wrapper">
              <div class="body-text">{!!@$product->productDetails[0]['short_desc']!!}</div>
            </div>
            
            <div class="button-wrapper">
              <a href="{{ route('productFullView',['category' => $category->slug ,'slug' => $product->slug]) }}" class="button accent w-button">@if($product->orderable) {!! __('productdetails.view') !!}  @else {!! __('productdetails.e') !!}  @endif</a>
            </div>
          </div>
        </div>
      @empty
        <div class="product-main-wrapper sustainability">
          <a href="#" class="product-image w-inline-block"><img src="{{asset('front-end/images/Mask-Group.png')}}" loading="lazy" width="346" alt="" class="image-10"></a>
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
      <div class="cta-button">
          @if($category->name == 'Packaging')
            <a href="{{route('productsList',['slug' => 'storage'])}}" class="button accent w-button" style="background-color: #0c6a35;color: #ffffff;margin-right:5px;">{!!__('productdetails.ViewstorageBags')!!}</a>
            <a href="{{route('productsList',['slug' => 'packaging-equipment'])}}" class="button accent w-button" style="background-color: #0c6a35;color: #ffffff;margin-right:5px;">{!!__('productdetails.ViewpackagingequipmentBags')!!}</a>
            <a href="{{route('productsList',['slug' => 'accessories'])}}" class="button accent w-button" style="background-color: #0c6a35;color: #ffffff;margin-right:5px;">{!!__('productdetails.ViewaccessoriesBags')!!}</a>
          @elseif($category->name == 'Storage')
            <a href="{{route('productsList',['slug' => 'packaging'])}}" class="button accent w-button" style="background-color: #0c6a35;color: #ffffff;margin-right:5px;">{{__('productdetails.ViewpackagingBags')}}</a>
            <a href="{{route('productsList',['slug' => 'packaging-equipment'])}}" class="button accent w-button" style="background-color: #0c6a35;color: #ffffff;margin-right:5px;">{{__('productdetails.ViewpackagingequipmentBags')}}</a>
            <a href="{{route('productsList',['slug' => 'accessories'])}}" class="button accent w-button" style="background-color: #0c6a35;color: #ffffff;margin-right:5px;">{{__('productdetails.ViewaccessoriesBags')}}</a>
          @elseif($category->name == 'Packaging Equipment')
            <a href="{{route('productsList',['slug' => 'packaging'])}}" class="button accent w-button" style="background-color: #0c6a35;color: #ffffff;margin-right:5px;">{{__('productdetails.ViewpackagingBags')}}</a>
            <a href="{{route('productsList',['slug' => 'storage'])}}" class="button accent w-button" style="background-color: #0c6a35;color: #ffffff;margin-right:5px;">{{__('productdetails.ViewstorageBags')}}</a>
            <a href="{{route('productsList',['slug' => 'accessories'])}}" class="button accent w-button" style="background-color: #0c6a35;color: #ffffff;margin-right:5px;">{{__('productdetails.ViewaccessoriesBags')}}</a>
          @elseif($category->name == 'Accessories')
            <a href="{{route('productsList',['slug' => 'packaging'])}}" class="button accent w-button" style="background-color: #0c6a35;color: #ffffff;margin-right:5px;">{{__('productdetails.ViewpackagingBags')}}</a>
            <a href="{{route('productsList',['slug' => 'storage'])}}" class="button accent w-button" style="background-color: #0c6a35;color: #ffffff;margin-right:5px;">{{__('productdetails.ViewstorageBags')}}</a>
            <a href="{{route('productsList',['slug' => 'packaging-equipment'])}}" class="button accent w-button" style="background-color: #0c6a35;color: #ffffff;margin-right:5px;">{{__('productdetails.ViewpackagingequipmentBags')}}</a>
          @else
          
          @endif
          
        </div>
      
    </div>
  </div>
  @if($category->name=='Packaging')
<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "BreadcrumbList", 
  "itemListElement": [{
    "@type": "ListItem", 
    "position": 1, 
    "name": "https://www.ecotactbags.com/",
    "item": "https://www.ecotactbags.com/eco-products/packaging"  
  }]
}
</script>
@elseif($category->name=='Storage')
<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "BreadcrumbList", 
  "itemListElement": [{
    "@type": "ListItem", 
    "position": 2, 
    "name": "https://www.ecotactbags.com/",
    "item": "https://www.ecotactbags.com/eco-products/storage"  
  }]
}
</script>
@elseif($category->name=='Packaging Equipment')
<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "BreadcrumbList", 
  "itemListElement": [{
    "@type": "ListItem", 
    "position": 3, 
    "name": "https://www.ecotactbags.com/",
    "item": "https://www.ecotactbags.com/eco-products/packaging-equipment" 
  }]
}
</script>
@elseif($category->name=='Accessories')
<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "BreadcrumbList", 
  "itemListElement": [{
    "@type": "ListItem", 
    "position": 4, 
    "name": "https://www.ecotactbags.com/",
    "item": "https://www.ecotactbags.com/eco-products/accessories"
  }]
}
</script>
@endif
@stop