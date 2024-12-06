@extends('layouts.new_frontlayout')
<style type="text/css">
  .message-wp{
    padding: 40px 40px 60px;
    align-items: center;
    border-radius: 10px;
    box-shadow: 1px 1px 20px 0 hsla(0, 0%, 78.7%, 0.31);
  }
  .msg-leaf img{
    max-width: 120px;
  }
  
  .w-inline-block{
      padding: 40px;
  }
  .highlight-social {
  display: inline-block;
  text-align: center;
  padding: 0px;
}
.highlight-social li {
  list-style: none;
  margin: 0 15px;
  display: inline-block;
}
.highlight-social li a {
  width: 45px;
  height: 45px;
  display: -webkit-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  text-align: center;
  color: #fff;
  font-size: 28px;
  background: #ccc;
  border-radius: 4px;
}
.highlight-social .instra-icon {
  background: #CF2B9C;
}
.highlight-social .instra-icon:hover {
  background: #B63BAF;
}
.highlight-social .facebook-icon {
  background: #2C73C7;
}
.highlight-social .facebook-icon:hover {
  background: #45568E;
}
.highlight-social .youtube-icon {
  background: #F60000;
}
.highlight-social .youtube-icon:hover {
  background: #BC3329;
}
.highlight-social .linkdin-icon {
  background: #0A63BC;
}
.highlight-social .linkdin-icon:hover {
  background: #0076B3;
}
</style>
  @if(config('app.lang')->slug == 'en' || config('app.lang')->slug == 'in')
    @section('title', '')
    @section('description', '')
    @section('keywords', '')
  @elseif(config('app.lang')->slug == 'sp')
    @section('title', '')
    @section('description', '')
    @section('keywords', '')
  @endif
  

@section('content')
<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/Sustainablity.png')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">{{ __('privacy.ecotact') }}</span>
        <h1>{{__('productdetails.thanku')}}</h1>
      </div>
    </div>
  </div>
</div>
<section class="section about-section pb0">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="message-wp text-center">
          <div class="msg-leaf">
            <img src="{{asset('assets/front/img/location.png')}}" class="image-29">
          </div>
          <div class="main-msg-text-wrapper">
            <h3 class="mb15">{{__('productdetails.thanku')}}</h3>
          </div>
          <hr>
          <h3 class="mb15">Follow us on</h3>
                <div class="msg-leaf" >
                    <ul class="highlight-social">

                  <li><a href="https://www.instagram.com/ecotact/" title="instagram" class="instra-icon"><i class="lab la-instagram"></i></a></li>
                  <li><a href="https://www.facebook.com/ecotact" class="facebook-icon"><i class="lab la-facebook-f"></i></a></li>
                  <li><a href="https://www.youtube.com/channel/UCpmDEdpAA2NLAQk9_uaBAQA" class="youtube-icon" ><i class="lab la-youtube"></i></a></li>
                  <li><a href="https://www.linkedin.com/company/ecotact/" class="linkdin-icon" ><i class="lab la-linkedin-in"></i></a></li>
                  </ul>
                </div>
        </div>
      </div>
    </div>
  </div>
</section>

@if($request)
    <script>
    var new_contact =
    {
        'First name': "{{$request['c_name']}}", //Replace with first name of the user
        'Last name': '',  //Replace with last name of the user
        'Email': "{{$request['c_email']}}", //Replace with email of the user
        'Alternate contact number': "{{$request['c_country']}}", //Replace with a custom field
        'company': {
            'Name': "{{$request['company']}}", //Replace with company name
            'Website': 'www.example.com' //Replace with website of company
        }
    };
    var identifier = "{{$request['c_email']}}";
    fwcrm.identify(identifier, new_contact);
</script>
@endif

@stop