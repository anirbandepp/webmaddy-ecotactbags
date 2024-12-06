@extends('layouts.new_frontlayout')

@section('title', @$blog->meta_title ?? $blog->blogDetails[0]['blog_title'])
@section('description', $blog->meta_desc ?? \Str::limit(strip_tags(@$blog->blogDetails[0]['full_desc']),$limit=160,$end="") )


@section('script')
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FV9P181B3Q"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-FV9P181B3Q');
    </script>
@stop 

@section('content')
  <div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/activities.jpg')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">{!!__('blog.Blogs')!!}</span>
        <h2>{!!__('blog.Dive Deeper')!!} </h2>
      </div>
    </div>
  </div>
</div>

 
<section class="section about-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="blog-box">
          <p><b>{!!__('blog.Author')!!} :</b> {!!@$blog->author!!}</p>
          <p>{!! __(@$blog->blogDetails[0]['custom_date'])!!}</p>
          <h1 class="mb30" style="font-size:39px;">{!!@$blog->blogDetails[0]['blog_title']!!}</h1>
          <img src="{{$blog->fullview_img_url ?? $blog->img_url}}" alt="ecotactbags" class="img-responsive mb30">
          {!!@$blog->blogDetails[0]['full_desc']!!}
        </div>
      </div>
      
      
    </div>
        <div class="row" style="margin-top: 15px;">
            <div class="col-md-12 text-center">
                <div class="blog-categories">
                  <ul>
                    <li><a href="{{route('productsList',['slug' => 'storage'])}}">{{__('productdetails.ViewstorageBags')}}</a></li>
                    <li><a href="{{route('productsList',['slug' => 'packaging-equipment'])}}">{{__('productdetails.ViewpackagingequipmentBags')}}</a></li>
                    <li><a href="{{route('productsList',['slug' => 'accessories'])}}">{{__('productdetails.ViewaccessoriesBags')}}</a></li>
                    <li><a href="{{route('productsList',['slug' => 'packaging'])}}">{{__('productdetails.ViewpackagingBags')}}</a></li>
                  </ul>
                </div>
            </div>
        </div>
  </div>
</section>

<section class="section replay-blog">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb30">
        <h3>{!! __('blog.LEAVE A REPLY')!!}</h3>
        <p>{!! __('blog.Your email address will not be published. Required fields are marked')!!}</p>
      </div>
      <div class="col-md-4 col-sm-6 mb20">
        <div class="from-group">
          <label>{!! __('blog.Name')!!} <span>*</span></label>
          <input type="text" name="name" id="name-2" class="from-control type-area" placeholder="Type here...">
        </div>
      </div>
      <div class="col-md-4 col-sm-6 mb20">
        <div class="from-group">
          <label>{{ __('blog.Email')}} <span>*</span></label>
          <input type="text" name="email" id="name-2" class="from-control type-area" placeholder="Type here...">
        </div>
      </div>
      <div class="col-md-4 col-sm-6 mb20">
        <div class="from-group">
          <label>{!! __('blog.Website')!!} </label>
          <input type="text" name="website" id="name-2" class="from-control type-area" placeholder="Type here...">
        </div>
      </div>
      <div class="col-md-12 mb20">
        <div class="from-group">
          <label>{!! __('blog.Comment')!!} <span>*</span></label>
          <textarea class="from-control type-area" name="comment" id="field" placeholder="Type here..."></textarea>
        </div>
      </div>
      <div class="col-md-12">
        <input type="button" name="" class="btn btn-primary" value="Post Comment">
      </div>
    </div>
  </div>
</section>

<section class="section related-blogs">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center mb50">
        <h2>{!! __('blog.Related blogs')!!}</h2>
      </div>
      @forelse($blogs as $blog)
      <div class="col-md-4 col-sm-6 mb30">
        <div class="blog-box">
          <a href="{{route('blogInside',['slug' => $blog->slug,'category'=>$old])}}">
            <img src="{{$blog->img_url}}" alt="ecotactbags" class="img-responsive mb20">
            <h3>{{@$blog->blogDetails[0]['blog_title']}}</h3>
            <p>{!!@$blog->blogDetails[0]['short_desc']!!}</p>
            <span>{!! __(@$blog->blogDetails[0]['custom_date'])!!}</span>
          </a>
        </div>
      </div>
      @empty
      @endforelse
    </div>
  </div>
</section>
@stop