@extends('layouts.front-layout')

@if(config('app.lang')->slug == 'en' || config('app.lang')->slug == 'in')
  @section('title', 'Blog | Green Coffee, Grains and Cocoa Beans Packaging & Storage Tips')
  @section('description', 'Ecotact blog offers intelligence and updates on eco-friendly green coffee packaging and storage solutions. Stay tuned about news and development in the community.')
  @section('keywords', '')
@elseif(config('app.lang')->slug == 'sp')
  @section('title', 'Blog | Green Coffee, Grains and Cocoa Beans Packaging & Storage Tips')
  @section('description', 'Ecotact blog offers intelligence and updates on eco-friendly green coffee packaging and storage solutions. Stay tuned about news and development in the community.')
  @section('keywords', '')
@else

@endif


@section('content')

  @include('hamburger-dropdown')
  
  <style>
      .b {
            margin-right: 20px;
            border-style: solid;
            border-width: 1px;
            border-color: rgba(12, 106, 53, 0.38);
            border-radius: 100px;
            background-color: #fff;
        }
        .b2 {
            position: relative;
            display: inline-block;
            vertical-align: top;
            text-decoration: none;
            padding: 9px 30px;
            text-align: left;
            cursor: pointer;
            color: #222222;
        }
        .current {
            margin-right: 20px;
            border-color: white;
            background-color: #0c6a35;
            color: #fff;
        }
  </style>
  <div class="section blog">
    <div class="main-wrapper">
      <div class="banner-content-wrapper">
        <div class="title-caption-wrapper">
          <div class="title-caption center">{!!__('blog.Blogs')!!}</div>
        </div>
        <div class="h2-wrapper">
          <h1 class="h2 center white">{!!__('blog.Dive Deeper')!!}</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="main-wrapper">
        <div data-duration-in="300" data-duration-out="100" class="tabs-2 w-tabs">
            <div class="blog-filter-tabs w-tab-menu">
              <a href="{{route('blog')}}" @if($old == 'All') class="tab-link-tab-2 b b2 current" @else class="b b2" @endif >
                <div class="tab-text">{{ __('blog.All')}}</div>
              </a>
              @foreach($categories as $category)
                <a href="{{route('blog',['category' => $category->blog_category_name])}}"  @if($old == $category->blog_category_name) class="tab-link-tab-2 b b2 current" @else class="tab-link-tab-2 b b2" @endif>
                    <div class="tab-text">{{ __('blog.'.$category->blog_category_name)}}</div>
                </a>
              @endforeach
              <!--<a data-w-tab="Tab 3" class="tab-link-tab-2 w-inline-block w-tab-link">-->
              <!--  <div class="tab-text">Coffee</div>-->
              <!--</a>-->
              <!--<a data-w-tab="Tab 4" class="tab-link-tab-2 w-inline-block w-tab-link">-->
              <!--  <div class="tab-text">Cocoa</div>-->
              <!--</a>-->
              <!--<a data-w-tab="Tab 5" class="tab-link-tab-2 w-inline-block w-tab-link">-->
              <!--  <div class="tab-text">Storage &amp; Packaging</div>-->
              <!--</a>-->
              <!--<a data-w-tab="Tab 7" class="tab-link-tab-2 w-inline-block w-tab-link">-->
              <!--  <div class="tab-text">News &amp; Ecotact Community</div>-->
              <!--</a>-->
            </div>
            <div class="tabs-content-2 w-tab-content">
                <div class="blog-grid-wrapper">
                    <div class="w-layout-grid blog-grid">
                        @forelse($blogs as $key=>$blog)
                            <a href="{{route('blogInside',['slug' => $blog->slug,'category'=>$old])}}" class="blog w-inline-block">
                            <div class="blog-img"><img src="{{$blog->fullview_img_url ?? $blog->img_url}}" loading="lazy" alt="ecotact" sizes="(max-width: 767px) 95vw, 569.9739379882812px" style="width: 100%; height: 345.66px;"></div>
                            <!--<div class="filter">{{$old == 'All' ? @$blog->categories()->first()->blog_category_name : $old}}</div>-->
                            <div class="h3-wrapper">
                              <h3 class="h3"> {{@$blog->blogDetails[0]['title']}} </h3>
                            </div>
                            <div class="body-text-wrapper">
                              <div class="body-text">
                                  {!! @$blog->blogDetails[0]['short_desc'] !!}
                              </div>
                            </div>
                            <div class="date-wrapper">
                              <div class="date">{{ @$blog->blogDetails[0]['custom_date']}}</div>
                            </div>
                          </a>
                        @empty
                            <p>Nothing to show.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@stop