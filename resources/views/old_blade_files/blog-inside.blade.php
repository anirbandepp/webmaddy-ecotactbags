@extends('layouts.front-layout')
@section('content')

  @include('hamburger-dropdown')
 
  <div class="section blog-inside" style="background-image: url(http://ecotactbags.com/front-end/images/Rectangle-2.png);">
    <div class="main-wrapper">
      <div class="banner-content-wrapper">
        <div class="title-caption-wrapper">
          <div class="title-caption center">{{__('blog.Blogs')}}</div>
        </div>
        <div class="h2-wrapper">
          <h2 class="h2 center white">{{__('blog.Dive Deeper')}}</h2>
        </div>
      </div>
    </div>
  </div>
  <!--<div class="section grey">-->
  <!--  <div class="main-wrapper">-->
  <!--    <div class="intro-wrapper">-->
  <!--      <div class="h2-wrapper left">-->
  <!--        <h2 class="h2 green-left">Intro</h2>-->
  <!--      </div>-->
        <!--<div class="body-text-wrapper">-->
        <!--  <div class="body-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Venenatis, urna accumsan, imperdiet condimentum. In sapien porttitor justo viverra. Eu tempus purus sapien hac semper. Cras vestibulum fermentum, sollicitudin venenatis, lacus, sit. Massa enim elementum tempor magna quisque libero a. Elit a scelerisque leo condimentum ullamcorper in. Facilisi quis viverra vulputate proin. Non enim, amet, tellus odio lectus nunc vitae nunc vel. Turpis molestie sem eget sed interdum nisl. Adipiscing suscipit ultrices interdum vitae vitae volutpat. In ut massa tempus at sed facilisis tortor turpis. Nullam nam et, morbi nec euismod.</div>-->
        <!--</div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
  <!--<div class="section">-->
  <!--  <div class="main-wrapper">-->
  <!--    <div class="intro-grid">-->
  <!--      <div id="w-node-fc9f25b2-2368-436c-a092-2f6400673149-5f16e1b8" class="intro-left-wrapper"><img src="{{asset('front-end/images/Rectangle-137.png')}}" loading="lazy" alt="ecotact" class="image-17"></div>-->
  <!--      <div class="intro-right-wrapper">-->
  <!--        <div class="details-main-wrapper">-->
  <!--          <div class="product-details-wrappper">-->
  <!--            <div class="product-details">Lorem ipsum dolor sit amet, consectetur.</div>-->
  <!--          </div>-->
  <!--          <div class="body-text-wrapper">-->
  <!--            <div class="body-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Venenatis, urna accumsan, imperdiet condimentum. In sapien porttitor justo viverra. Eu tempus purus sapien hac semper. Cras vestibulum fermentum, sollicitudin venenatis, lacus, sit. Massa enim elementum.</div>-->
  <!--          </div>-->
  <!--          <div class="product-details-container">-->
  <!--            <div class="pointer-wrapper">-->
  <!--              <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">-->
  <!--                <div class="body-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Venenatis urna</div>-->
  <!--              </div>-->
  <!--              <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">-->
  <!--                <div class="body-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Venenatis urna</div>-->
  <!--              </div>-->
  <!--              <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">-->
  <!--                <div class="body-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Venenatis urna</div>-->
  <!--              </div>-->
  <!--              <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">-->
  <!--                <div class="body-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Venenatis urna</div>-->
  <!--              </div>-->
  <!--              <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">-->
  <!--                <div class="body-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Venenatis urna</div>-->
  <!--              </div>-->
  <!--            </div>-->
  <!--            <div class="pointer-wrapper more">-->
  <!--              <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">-->
  <!--                <div class="body-text">Aroma maintained</div>-->
  <!--              </div>-->
  <!--              <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">-->
  <!--                <div class="body-text">Sensitive food and vitamin content protected</div>-->
  <!--              </div>-->
  <!--              <div class="product-details-pointer"><img src="{{asset('front-end/images/bullet-check.svg')}}" loading="lazy" alt="ecotact" class="bullet-pointer">-->
  <!--                <div class="body-text">Flavor and inherent quality maintained</div>-->
  <!--              </div>-->
  <!--            </div>-->
  <!--            <div class="view-less-wrapper">-->
  <!--              <div class="text-block-2">View less -</div>-->
  <!--            </div>-->
  <!--          </div>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--    <div>-->
  <!--      <div class="h2-wrapper left">-->
  <!--        <h2 class="h2 green-left">Praesentium enim quaerat et est et qui alias fuga.</h2>-->
  <!--      </div>-->
  <!--      <div class="body-text-wrapper">-->
  <!--        <div class="body-text">Dignissimos totam quasi. Qui quaerat commodi ratione iusto tempora consequatur deleniti recusandae. Quidem dolores tenetur deleniti aut et quia. Quia quo voluptas cupiditate dolorum odio veniam facilis facilis. Nesciunt dolor beatae iste illum velit corrupti quasi. Et aut tempora magnam facilis quos facere. Dignissimos totam quasi. Qui quaerat commodi ratione iusto tempora consequatur deleniti recusandae. Quidem dolores tenetur deleniti aut et quia. Quia quo voluptas cupiditate dolorum odio veniam facilis facilis. Nesciunt dolor beatae iste illum velit corrupti quasi. Et aut tempora magnam facilis quos facere.</div>-->
  <!--      </div>-->
  <!--      <div class="body-text-wrapper">-->
  <!--        <div class="body-text">Qui dolorem molestias deleniti culpa nam sunt fuga dolores et. Nisi occaecati mollitia ad sint quisquam cupiditate rerum animi. Beatae culpa in numquam quae occaecati et veritatis.</div>-->
  <!--      </div>-->
  <!--      <div class="body-text-wrapper">-->
  <!--        <div class="body-text">Quis molestiae iste qui omnis ab. Molestiae qui architecto harum animi minus velit deserunt. Tempore hic dicta rerum.</div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
  <!--<div class="section grey">-->
  <!--  <div class="main-wrapper">-->
  <!--    <div class="details-main-wrapper">-->
  <!--      <div class="product-details-wrappper">-->
  <!--        <div class="product-details">Et libero</div>-->
  <!--      </div>-->
  <!--      <div class="body-text-wrapper">-->
  <!--        <div class="body-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tincidunt pellentesque quis habitant aliquam sodales turpis sapien cras vel. Leo diam et nulla quam ultrices id donec. Id habitant adipiscing porttitor ac at vel leo. Integer vulputate.</div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--    <div class="details-main-wrapper">-->
  <!--      <div class="product-details-wrappper">-->
  <!--        <div class="product-details">Tristique</div>-->
  <!--      </div>-->
  <!--      <div class="body-text-wrapper">-->
  <!--        <div class="body-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tincidunt pellentesque quis habitant aliquam sodales turpis sapien cras vel. Leo diam et nulla quam ultrices id donec. Id habitant adipiscing porttitor ac at vel leo. Integer vulputate.</div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--    <div class="details-main-wrapper">-->
  <!--      <div class="product-details-wrappper">-->
  <!--        <div class="product-details">Lorem ipsum</div>-->
  <!--      </div>-->
  <!--      <div class="body-text-wrapper">-->
  <!--        <div class="body-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tincidunt pellentesque quis habitant aliquam sodales turpis sapien cras vel. Leo diam et nulla quam ultrices id donec. Id habitant adipiscing porttitor ac at vel leo. Integer vulputate.</div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->

  <div class="section">
    <div class="main-wrapper">
      <div class="blog-inside-content">
        <div class="image-info-wrapper">
            <div class="blog-date">
                <div class="body-text">{{__('blog.Author')}} : {{@$blog->author}}</div>
              </div>
          <div class="blog-date">
            <div class="body-text">{{ __('blog.'.@$blog->blogDetails[0]['custom_date'])}}</div>
          </div>
          <div class="h2-wrapper left">
            <h2 class="h2 green-left">{{@$blog->blogDetails[0]['blog_title']}}</h2>
          </div><img src="{{$blog->fullview_img_url ?? $blog->img_url}}" loading="lazy" sizes="(max-width: 479px) 94vw, (max-width: 991px) 95vw, (max-width: 1279px) 68vw, 846.265625px" srcset="{{$blog->fullview_img_url ?? $blog->img_url}} 500w, {{$blog->fullview_img_url ?? $blog->img_url}} 800w, {{$blog->fullview_img_url ?? $blog->img_url}} 1080w, {{$blog->fullview_img_url ?? $blog->img_url}} 1600w, {{$blog->fullview_img_url ?? $blog->img_url}}" alt="ecotact" class="image-18" style="width:100%;">
          <div class="body-text-wrapper">
            <div class="body-text">{!!@$blog->blogDetails[0]['full_desc']!!}</div>
          </div>
        </div>
        <!--<div class="blog-about-wrapper">-->
        <!--  <div class="product-details-wrappper">-->
        <!--    <div class="product-details">ABOUT US</div>-->
        <!--  </div>-->
        <!--  <div class="blog-about-img"><img src="{{ asset('front-end/images/ecoabout.jpg')}}" loading="lazy" alt="ecotact" class="image-28"></div>-->
        <!--  <div class="body-text-wrapper">-->
        <!--    <div class="body-text center">From high quality multilayered plastic hermetic coffee packaging bags to paper coffee bags that we manufacture, we ensure protection and preservation of your food. In every way. With every product. </div>-->
        <!--  </div>-->
        <!--</div>-->
      </div>
      <div class="comment-form">
        <div class="h3-wrapper">
          <h3 class="h3 green">{{ __('blog.LEAVE A REPLY')}}</h3>
        </div>
        <div class="body-text-wrapper">
          <div class="body-text">{{ __('blog.Your email address will not be published. Required fields are marked')}}</div>
        </div>
        <div class="comment-form-block w-form">
          <form id="email-form" name="email-form" data-name="Email Form" action="{{route('postComment') }}" method="post">
            <div class="comment-wrapper"><label for="name" class="field-label">{{ __('blog.Comment')}}*</label><textarea placeholder="Comment.." maxlength="5000" id="field" name="comment" class="textarea comment w-input"></textarea></div>
            <div class="comment-field-wrapper">
              <div class="comment-field"><label for="name-2" class="field-label">{{ __('blog.Name')}}*</label><input type="text" class="text-field w-input" maxlength="256" name="name" data-name="Name 2" placeholder="" id="name-2"></div>
              <div class="comment-field"><label for="name-3" class="field-label">{{ __('blog.Email')}}*</label><input type="text" class="text-field w-input" maxlength="256" name="email" data-name="Name 2" placeholder="" id="name-2"></div>
              <div class="comment-field"><label for="name-3" class="field-label">{{ __('blog.Website')}}</label><input type="text" class="text-field w-input" maxlength="256" name="website" data-name="Name 2" placeholder="" id="name-2"></div>
            </div>
            @csrf
            <input type="hidden" name="blog" value="{{$blog->blogDetails[0]['blog_title']}}">
            <!--<div class="comment-checkbox"><label class="w-checkbox"><input type="checkbox" id="checkbox" name="checkbox" data-name="Checkbox" class="w-checkbox-input" required=false><span class="checkbox-label w-form-label">Save my name, email, and website in this browser for the next time I comment.</span></label></div>-->
            <div class="comment-cta"><input type="submit" value="{{ __('blog.Post comment')}}" data-wait="Please wait..." class="button accent w-button"></div>
          </form>
          <div class="w-form-done">
            <div>Thank you! Your submission has been received!</div>
          </div>
          <div class="w-form-fail">
            <div>Oops! Something went wrong while submitting the form.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section grey">
    <div class="main-wrapper">
      <div class="h2-wrapper left">
        <h2 class="h2 green-left">{{ __('blog.Related blogs')}}</h2>
      </div>
      <div class="w-layout-grid related-blogs">
        @forelse($blogs as $blog)
          <a href="{{route('blogInside',['slug' => $blog->slug,'category'=>$old])}}" aria-current="page" class="blog w-inline-block w--current">
            <div class="blog-img"><img src="{{$blog->img_url}}" loading="lazy" alt="ecotact" sizes="(max-width: 479px) 94vw, (max-width: 600px) 95vw, 570px" srcset="{{$blog->img_url}} 500w"></div>
            <!--<div class="filter">{{$old == 'All' ? @$blog->categories()->first()->blog_category_name : $old}}</div>-->
            <div class="h3-wrapper">
              <h3 class="h3">{{@$blog->blogDetails[0]['blog_title']}}</h3>
            </div>
            <div class="body-text-wrapper">
              <div class="body-text">{!!@$blog->blogDetails[0]['short_desc']!!}</div>
            </div>
            <div class="date-wrapper">
              <div class="date">{{ __('blog.'.@$blog->blogDetails[0]['custom_date'])}}</div>
            </div>
          </a>
        @empty
        @endforelse
      </div>
    </div>
  </div>
@stop