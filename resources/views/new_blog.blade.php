@extends('layouts.new_frontlayout')

@if(config('app.lang')->slug == 'en' || config('app.lang')->slug == 'in')
  @section('title', 'Home Coffee Roasting - Storing your Green coffee beans')
  @section('description', 'With home coffee roasting, preserving green coffee beans in storage can be a task for small home roasters. Learn the effective ways of storing
green coffee beans.')
  @section('keywords', '')
@elseif(config('app.lang')->slug == 'sp')
  @section('title', 'Blog | Green Coffee, Grains and Cocoa Beans Packaging & Storage Tips')
  @section('description', 'Ecotact blog offers intelligence and updates on eco-friendly green coffee packaging and storage solutions. Stay tuned about news and development in the community.')
  @section('keywords', '')
@else

@endif


@section('content')
<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/blog-banner.png')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">{!!__('blog.Blogs')!!}</span>
        <h1>{!!__('blog.Dive Deeper')!!}</h1>
      </div>
    </div>
  </div>
</div>

<section class="section about-section pb0">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 mb50">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="blog-categories">
              <ul>
                <li @if($old == 'All') class="active" @else  @endif><a href="{{route('blog')}}">{{ __('blog.All')}}</a></li>
                @foreach($categories as $category)
                <li @if($old == $category->blog_category_name) class="active" @else  @endif><a href="{{route('blog',['category' => $category->blog_category_name])}}" >{{ __('blog.'.$category->blog_category_name)}}</a>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
      @forelse($blogs as $key=>$blog)
        
      <div class="col-md-6 mb50">
        <div class="blog-box">
          <a href="{{route('blogInside',['slug' => $blog->slug])}}">
            <img src="{{$blog->fullview_img_url ?? $blog->img_url}}" alt="ecotactbags" class="img-responsive mb20">
            <h3>{{@$blog->blogDetails[0]['title']}}</h3>
            <p>{!! @$blog->blogDetails[0]['short_desc'] !!}</p>
            <span>{{ @$blog->blogDetails[0]['custom_date']}}</span>
          </a>
        </div>
      </div>
        @if($loop->iteration % 2 == 0)
            <div class="clearfix"></div>
          @endif
      @empty
        <p>Nothing to show.</p>
      @endforelse
    </div>
  </div>
</section>
@stop