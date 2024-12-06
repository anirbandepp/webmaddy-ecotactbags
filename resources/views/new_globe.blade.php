@extends('layouts.new_frontlayout')
@section('title', 'Global presence of Ecotact, from harvest to consumption')
@section('description', 'Redefining food storage around the world. The global presence of Ecotact allows freshness at every stage of storage and transit')
@section('keywords', 'Global presence of Ecotact')

@section('content')

<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/globe.jpg')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">{!! __('globe.Globally') !!}</span>
        <h1>{!! __('globe.Multiplying') !!}</h1>
      </div>
    </div>
  </div>
</div>

<section class="section about-section pb0">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb50">
        <div class="row">
          <div class="col-md-12 text-center mb15">
            <div class="about-text story-text">
              <p class="mb20">{!! __('globe.Ecotact') !!}</p>
            </div>
            <div class="gap-70"></div>
            <div class="globe-image-area text-center mb50">
              <img src="{{asset('assets/front/img/globe-image.jpg')}}" alt="ecotactbags" class="img-responsive">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section globe-family pt0">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="graw-bg-family">
          <div class="left-image">
            <img src="{{asset('assets/front/img/hands.jpg')}}" alt="ecotactbags" class="img-responsive">
          </div>
          <div class="right-form details-form">
            <h2 class="mb30">{!! __('globe.join') !!}</h2>
            <form id="email-form" name="email-form" action="{{route('enquireNow')}}" method="post">
                @csrf
              <div class="from-group mb15">
                <label>{!! __('globe.name') !!}</label>
                <input type="hidden" name="subject" value="{!! __('globe.join') !!}">
                <input type="text" name="c_name" placeholder="Type Here" id="name-2" class="input-control">
                
              </div>
              <div class="from-group mb15">
                <label>{!! __('globe.email') !!}</label>
                <input type="email" name="c_email" class="input-control" placeholder="Type Here" id="email-3" required="">
              </div>
              <div class="from-group mb15">
                <label>{!! __('globe.company') !!}</label>
                <input type="text" name="company" class="input-control" placeholder="Type Here" id="email-2" required="">
              </div>
              <div class="from-group mb15">
                <label>{!! __('globe.country') !!}</label>
                <input type="text" name="c_country" class="input-control" placeholder="Type Here" id="email-2" required="">
              </div>
              <div class="from-group mb15">
                <label>{!! __('globe.comment') !!}</label>
                <textarea class="input-control" placeholder="Type Here" maxlength="5000" id="field" name="c_message"></textarea>
              </div>
              <div class="g-recaptcha" data-sitekey="6LdyGgkbAAAAAHrMrah5HKcY_hMpywtEFFpokMtm"></div>
              
              <div class="from-group">
                  <div class="button-wrapper form"><input type="submit" value="{!! __('globe.submit') !!}" data-wait="Please wait..." class="btn btn-primary"></div>
                <!--<button type="submit" class="btn btn-primary">Submit</button>-->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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