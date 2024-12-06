@extends('layouts.new_frontlayout')

@if(config('app.lang')->slug == 'en' || config('app.lang')->slug == 'in')
  @section('title', 'Contact Us | Coffee Storage Bags | Ecotact')
  @section('description', 'For enquiry about coffee packaging and storage solutions, please contact us on 011-61381211 / 47028340 or email us at info@aashirvad.in / aashirvad@gmail.com.')
  @section('keywords', '')
@elseif(config('app.lang')->slug == 'sp')
  @section('title', 'Contact Us | Coffee Storage Bags | Ecotact')
  @section('description', 'For enquiry about coffee packaging and storage solutions, please contact us on 011-61381211 / 47028340 or email us at info@aashirvad.in / aashirvad@gmail.com.')
  @section('keywords', '')
@else

@endif

@section('content')

<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/ecotact-banner-image.png')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">&nbsp;</span>
        <h1>{!! __('contactus.Contact') !!}</h1>
      </div>
    </div>
  </div>
</div>

<section class="section cotact-map pb0">
    <div class="contact-wrapper">
        <img src="{{asset('assets/front/img/map.svg')}}" alt="ecotactbags" class="">
    <a class="pointer page-scroll netherlands" href="#NETHERLANDS" ><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="NETHERLANDS"></a>
    <a class="pointer page-scroll MEXICO" href="#GUAYAQUIL"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="GUAYAQUIL"></a>
    <a class="pointer page-scroll honduras" href="#LAPAZ"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="LA PAZ"></a>
    <a class="pointer page-scroll GUATEMALA" href="#LIMA"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="LIMA"></a>
    <a class="pointer page-scroll EL-SALVADOR" href="#MANIZALES/BOGOTA"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="MANIZALES/BOGOTA"></a>
    <a class="pointer page-scroll NICARAGUA" href="#PANAMA"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="PANAMA"></a>
    <a class="pointer page-scroll PANAMA" href="#SANJOSE"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="SAN JOSE"></a>
    <a class="pointer page-scroll COSTARICA" href="#MANAGUA"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="MANAGUA"></a>
    <a class="pointer page-scroll COLOMBIA" href="#SANPEDROSULA"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="SAN PEDRO SULA"></a>
    <a class="pointer page-scroll VENEZUELA" href="#SANSALVADOR"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="SAN SALVADOR"></a>
    <a class="pointer page-scroll ECUADOR" href="#Guatemala-City"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="Guatemala-City"></a>
    <a class="pointer page-scroll PERU" href="#TUXTLAGUTIERREZ"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="TUXTLA GUTIERREZ"></a>
    <a class="pointer page-scroll BOLIVIA" href="#DAR-ES-SALAAM"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="DAR-ES-SALAAM"></a>
    <a class="pointer page-scroll CAMEROON" href="#BUJUMBURA"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="BUJUMBURA"></a>
    <a class="pointer page-scroll CONGO" href="#KIGALI"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="KIGALI"></a>
    <a class="pointer page-scroll EMIRATES" href="#NAIROBI"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="NAIROBI"></a>
    <a class="pointer page-scroll YEMEN" href="#KINSHASHA"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="KINSHASHA"></a>
    <a class="pointer page-scroll ETHIOPIA" href="#ADDISABABA"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="ADDIS ABABA"></a>
    <a class="pointer page-scroll UGANDA" href="#KAMPALA"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="KAMPALA"></a>
    <a class="pointer page-scroll KENYA" href="#DOUALA"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="DOUALA"></a>
    <a class="pointer page-scroll BURUNDI" href="#PAPUA-NEW-GUINEA"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="PAPUA-NEW-GUINEA"></a>
    <a class="pointer page-scroll RWANDA" href="#SEOUL"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="SEOUL"></a>
    <a class="pointer page-scroll TANZANIA" href="#SANA’A"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="SANA’A"></a>
    <a class="pointer page-scroll HQ" href="#DUBAI"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="DUBAI"></a>
    <a class="pointer page-scroll BANGALORE" href="#MUNTINLUPA"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="MUNTINLUPA"></a>
    <a class="pointer page-scroll NEPAL" href="#EBINACITY/YOKOHAMA"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="EBINA CITY / YOKOHAMA"></a>
    <a class="pointer page-scroll KOLKATA" href="#TAICHUNG"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="TAICHUNG"></a>
    <a class="pointer page-scroll MYANMAR" href="#YUNNAN,SIMAO"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="YUNNAN, SIMAO"></a>
    <a class="pointer page-scroll CHINA" href="#DELHI"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="DELHI"></a>
    <a class="pointer page-scroll THAILAND" href="#MANDALAY"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="MANDALAY"></a>
    <a class="pointer page-scroll INDONESIA" href="#JAKARTA/MEDAN"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="JAKARTA / MEDAN"></a>
    <a class="pointer page-scroll NEW-GUINEA" href="#BANGKOK"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="BANGKOK"></a>
    <a class="pointer page-scroll PHILIPPINES" href="#BANGALORE"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="BANGALORE"></a>
    <a class="pointer page-scroll TAIWAN" href="#KOLKATA"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="KOLKATA"></a>
    <a class="pointer page-scroll PHILIPPINES2" href="#MUNTINLUPA"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="MUNTINLUPA"></a>
    <a class="pointer page-scroll SOUTH-KOREA" href="#KATHMANDU"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="KATHMANDU"></a>
    <a class="pointer page-scroll JAPAN" href="#ALMERE"><img src="{{asset('assets/front/img/location.png')}}" alt="ecotactbags" title="ALMERE"></a>
    </div>

</section>

<section class="section">
    <div class="container">
        <div class="row">
        <div class="col-md-12 mb30">
            <h2 class="location-heading">{{@$hqBranch->name}}</h2>
        </div>
        @foreach($hqBranch->branches as $hqb)
        <div class="col-md-4 col-sm-6 mb30" id="HQ">
            <div class="location-box">
            <div class="location-head">
                <div class="location-icon">
                <img src="{{asset('assets/front/img/location.svg')}}" alt="ecotactbags">
                </div>
                <div class="location-city">
                <h4>{{strtoupper(@$hqb->country_name)}}</h4>
                <p>{{strtoupper(@$hqb->state_name)}}</p>
                </div>
            </div>
            <div class="location-body">
                <p>{{@$hqb->company_name}}, <br>{{strtoupper(@$hqb->house_no)}}</p>
                <p><img src="{{asset('assets/front/img/call.svg')}}" alt="ecotactbags">{{@$hqb->phone1}} @if(@$hqb->phone2) / @endif {{@$hqb->phone2}}</p>
                <p><img src="{{asset('assets/front/img/mail.svg')}}" alt="ecotactbags"> <span class="address"><a href="mailto:{{@$hqb->email1}}">{{@$hqb->email1}}</a> @if(@$hqb->email2) | @endif <a href="mailto:{{@$hqb->email2}}">{{@$hqb->email2}}</a> </span> </p>
            </div>
            </div>
        </div>
        @endforeach
        <div class="col-md-12">
            <div class="contact-devider"></div>
        </div>
        </div>
        @forelse($continents as $continent)
        <div class="row">
            <div class="col-md-12 mb30" id="{{$continent->name}}">
                <h2 class="location-heading">{{strtoupper($continent->name)}}</h2>
            </div>
            @forelse($continent->branches as $branch)
            <div class="col-md-4 col-sm-6 mb30" id="{{str_replace(' ', '', $branch->state_name)}}">
                <div class="location-box">
                    <div class="location-head">
                        <div class="location-icon">
                            <img src="{{asset('assets/front/img/location.svg')}}" alt="ecotactbags">
                        </div>
                        <div class="location-city">
                            <h4>{{strtoupper($branch->country_name)}}</h4>
                            <p>{{strtoupper(@$branch->state_name)}}</p>
                        </div>
                    </div>
                    <div class="location-body">
                        <p>{{strtoupper(@$branch->manager_name)}}</p>
                        @if(@$branch->email1)
                            <p><img src="{{asset('assets/front/img/mail.svg')}}" alt="ecotactbags"> <span class="address"><a href="mailto:{{@$branch->email1}}">{{@$branch->email1}}</a> </span> </p>
                        @else
                            <div class="name">COMING SOON</div>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            @endforelse

            <div class="col-md-12">
                <div class="contact-devider"></div>
            </div>
        </div>
        @empty
        @endforelse
    </div>
</section>

<section class="section contact-bg pt0 pb0" id="contact-form">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="graw-bg-family">
          <div class="contact-left-image">
            <!--<img src="{{asset('assets/front/img/contact-img.jpg')}}" alt="ecotactbags" class="img-responsive">-->
          </div>
          <div class="right-form details-form">
            <h2 class="mb30">{{ __('globe.Enquiry Form') }}</h2>
            <form id="contact-us-form" action="{{route('enquireNow')}}" method="post">
                @csrf
              <div class="from-group mb15">
                <label>{!! __('globe.name') !!}</label>
                <input type="text" name="c_name" class="input-control" placeholder="" id="c_name" value="{{old('c_name')}}" required>
              </div>
              <div class="from-group mb15">
                <label>{!! __('globe.email') !!}</label>
                <input type="email" name="" class="input-control" placeholder="" name="c_email" id="c_email" value="{{old('c_email')}}" required>
              </div>
              <div class="from-group mb15">
                <label>{!! __('globe.company') !!}</label>
                <input type="text" name="company" class="input-control" placeholder="" id="company" value="{{old('company')}}" required>
              </div>
              <div class="from-group mb15">
                <label>{!! __('globe.country') !!}</label>
                <input type="text" name="" class="input-control" placeholder="" name="c_country" id="c_country" value="{{old('c_country')}}" required>
              </div>
              <div class="from-group mb15">
                <label>{!! __('globe.comment') !!}</label>
                <textarea class="input-control" placeholder="" onkeypress="magicvalidation(event)" id="c_message" name="c_message">{{ old('c_message') }}</textarea>
              </div>
              @forelse($products as $product)
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="product[]" value="{{$product->product_name}}">
                <label class="form-check-label" for="exampleCheck1"><h6 style="font-size: 17px;font-weight: 400;">{{ \Illuminate\Support\Str::limit($product->product_name, $limit = 45, $end = '...') }}</h6></label>
              </div>
              @empty
              @endforelse
              <script src="https://www.google.com/recaptcha/api.js" async defer></script>
              <div class="from-group mb15">
                <a href="{{ env('GOOGLE_RECAPTCHA_KEY')  }}"><img src="{{asset('assets/front/img/capta.jpg')}}" alt="ecotactbags"></a>
              </div>
              <div class="from-group">
                <button type="submit" onclick="test();" class="btn btn-primary">{{__('globe.submit') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

 <script>
       $('.pointer venezuela-carabobo w-inline-block').attr('title', $('.pointer venezuela-carabobo w-inline-block').text().toUpperCase())
       
       
    function magicvalidation(e){
        $(this).val($(this).val().replace(/[^a-z0-9]/gi, ''));
        }
        
        function test(){
            !function(f,b,e,v,n,t,s)
                {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '179074224317808');
                fbq('track', 'Lead');

            
            
            if ($("#contact-us-form input:checkbox:checked").length > 0){
              var valid = true;
            }
            var name = $('#c_name').val();
            var email = $('#c_email').val();
            var company = $('#company').val();
            var country = $('#c_country').val();
            if(name && email && company && country && valid){
                var new_contact =
                {
                    'First name': name, 
                    'Last name': '',  
                    'Email': email, 
                    'Alternate contact number': '', 
                    'company': {
                        'Name': company, //Replace with company name
                        'Website': 'www.ecotact.com' //Replace with website of company
                    }
                };
                var identifier = email;
                fwcrm.identify(identifier, new_contact);
                $('#contact-us-form').submit();
            }else{
                toastr.info('All Fields Are Required');
            }
        }
        
   </script> 
      <noscript><img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id=179074224317808&ev=Lead&noscript=1"
                /></noscript>
    
@stop