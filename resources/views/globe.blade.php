@extends('layouts.front-layout')
@section('title', 'Global presence of Ecotact, from harvest to consumption')
@section('description', 'Redefining food storage around the world. The global presence of Ecotact allows freshness at every stage of storage and transit')
@section('keywords', 'Global presence of Ecotact')
@section('content')
<style type="text/css">
    
    @media (max-width: 991px) {
      .mobile-img{
        height:400px;
      }
    }
  </style>
  <script src="{{asset('newGlob/globe.gl.min.js')}}"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  @include('hamburger-dropdown')
    <script src="https://d3js.org/d3.v4.min.js"></script>
    <script src="//unpkg.com/polished@3.5.2/dist/polished.js"></script>
    <script src="https://d3js.org/topojson.v1.min.js"></script>
  <div class="section globe">
    <div class="main-wrapper">
      <div class="banner-content-wrapper">
        <div class="title-caption-wrapper">
          <div class="title-caption center">{!! __('globe.Globally') !!}</div>
        </div>
        <div class="h2-wrapper">
          <h2 class="h2 center white">{!! __('globe.Multiplying') !!}</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="main-wrapper">
      <div class="body-text-wrapper">
        <div class="body-text center">{!! __('globe.Ecotact') !!}</div>
      </div>
    </div>
  </div>
  <div class="section _0-100">
    <div class="main-wrapper">
      <div class="globe" class="globe" style="width: 80%; margin: 0 auto;overflow: hidden;">
          <div id="globe-wrapper" class="globe-wrapper loading-container ">
			<div id="globe-overlay-title"></div>
			<div id="globeViz"></div>
		</div>
          
        <div style="display:none" class="locator-card">
          <!--<div class="info-wrapper">-->
          <!--  <div class="info-title">Cameroon</div>-->
          <!--  <div class="info-sub-title">Pradeep Sharma</div>-->
          <!--  <a href="#" class="link-2">cameroon@aashirvad.in</a>-->
          <!--</div>-->
        </div>
      </div>
    </div>
  </div>
  <div class="section _0-100">
    <div class="main-wrapper">
      <div class="form"><img src="{{asset('front-end/images/cross.svg')}}" loading="lazy" data-w-id="b2129d40-f7b4-a066-1e15-09be4036997a" alt="ecotactbags" class="close">
        <div class="w-layout-grid form-grid">
          <div id="w-node-b2129d40-f7b4-a066-1e15-09be4036997c-40369979" class="form-img mobile-img" style="background-image:url({{asset('front-end/images/hands.jpg')}});background-position: bottom;background-size: cover;"><!---<img src="{{asset('front-end/images/hands-1063442_1920.jpg')}}" loading="lazy" alt="ecotactbags" sizes="(max-width: 479px) 94vw, (max-width: 767px) 95vw, (max-width: 991px) 46vw, 100vw" srcset="{{asset('front-end/images/hands-1063442_1920-p-500.jpeg')}} 500w, {{asset('front-end/images/hands-1063442_1920-p-800.jpeg')}} 800w, {{asset('front-end/images/hands-1063442_1920-p-1080.jpeg')}} 1080w, {{asset('front-end/images/hands-1063442_1920-p-1600.jpeg')}} 1600w" class="image-19">--></div>
          <div class="form-content">
            <div class="h2-wrapper">
              <h3 class="h3-popup-heading">{!! __('globe.join') !!}</h3>
            </div>
            <div class="form-block-2 w-form">
              <form id="email-form" name="email-form" data-name="Email Form" action="{{route('enquireNow')}}" method="post"> @csrf <label for="name-3" class="field-label">{!! __('globe.name') !!}</label>
              <input type="hidden" name="subject" value="{!! __('globe.join') !!}">
              <input type="text" class="text-field w-input" maxlength="256" name="c_name" data-name="Name 2" placeholder="" id="name-2"><label for="email-4" class="field-label">{!! __('globe.email') !!}</label>
              <input type="email" class="text-field w-input" maxlength="256" name="c_email" data-name="Email 3" placeholder="" id="email-3" required=""><label for="email-4" class="field-label">{!! __('globe.company') !!}</label>
              <input type="text" class="text-field w-input" maxlength="256" name="company" data-name="Email 2" placeholder="" id="email-2" required=""><label for="email-4" class="field-label">{!! __('globe.country') !!}</label>
              <input type="text" class="text-field w-input" maxlength="256" name="c_country" data-name="Email 2" placeholder="" id="email-2" required=""><label for="email-4" class="field-label">{!! __('globe.comment') !!}</label><textarea placeholder="" maxlength="5000" id="field" name="c_message" class="textarea w-input"></textarea>
              <div class="g-recaptcha" data-sitekey="6LdyGgkbAAAAAHrMrah5HKcY_hMpywtEFFpokMtm"></div>
                <div class="button-wrapper form"><input type="submit" value="{!! __('globe.submit') !!}" data-wait="Please wait..." class="button accent w-button"></div>
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
    </div>
  </div>
    
    <script>

      const catColor = d3.scaleOrdinal(d3.schemeCategory10.map(col => polished.transparentize(0.2, col)));

    const getAlt = d => d.elevation * 5e-5;

    // const getTooltip = d => `
    //   <div style="text-align: center">
    //     <div><b>${d.name}</b>, ${d.country}</div>
    //     <div>(${d.type})</div>
    //     <div>Elevation: <em>${d.elevation}</em>m</div>
    //   </div>
    // `;


    const myGlobe = Globe()
      .globeImageUrl('//unpkg.com/three-globe/example/img/earth-day.jpg')
      .backgroundColor('#ffffff')
      .labelColor(() => altitude())
    //   .pointLabel(getTooltip)
      .onLabelHover(d => test(d))
      .onLabelClick(d => getClick(d))
      .labelLat('lat')
      .labelLng('lon')
      .labelDotRadius(2)
      .labelDotOrientation(() => 'bottom')
      .labelText('name')
      .labelSize(0)
      .labelResolution(2)
      .labelLabel(d => getTooltip(d))
      (document.getElementById('globeViz'));

    @if(config('app.lang')->slug == 'sp')
        fetch('{{asset('newGlob/location_spanish.geojson')}}').then(res => res.json()).then(volcanoes => {
          myGlobe.pointsData(volcanoes)
            .labelsData(volcanoes)
            .controls().autoRotate = true;
        });
    @else
        fetch('{{asset('newGlob/location.geojson')}}').then(res => res.json()).then(volcanoes => {
          myGlobe.pointsData(volcanoes)
            .labelsData(volcanoes)
            .controls().autoRotate = true;
        });
    @endif

    function test(d) {
      if(d) {
        myGlobe.controls().autoRotate = false; 
      }
      else {
        myGlobe.controls().autoRotate = true; 
      }
    }
    function getTooltip(d) {
      console.log(d)
      // myGlobe.controls().autoRotate = false;
      if(d) {        
        return `
          <div style="text-align: center">
            <div><b>${d.name}</b>,<br> ${d.country}</div>
          </div>
        `;
      }
    }
    function getClick(d) {
        var url = 'http://ecotactbags.com/contact-us#'+d.name;
        window.location.replace(encodeURI(url));
    }
    function altitude() {
        var red = Math.floor(Math.random() * 255);
        var green = 254; //Math.floor(Math.random() * 255);
        var blue = 254; //Math.floor(Math.random() * 255);
        return 'rgba('+red+','+ green+','+ blue+', 0.85)';
        //console.log("altitude");
      }
    
    
      
    </script>
@stop