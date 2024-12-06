@extends('layouts.front-layout')

@if (config('app.lang')->slug == 'en' || config('app.lang')->slug == 'in')
    @section('title', 'Contact Us | Coffee Storage Bags | Ecotact')
    @section('description', 'For enquiry about coffee packaging and storage solutions, please contact us on 011-61381211
        / 47028340 or email us at info@aashirvad.in / aashirvad@gmail.com.')
    @section('keywords', '')
@elseif(config('app.lang')->slug == 'sp')
    @section('title', 'Contact Us | Coffee Storage Bags | Ecotact')
    @section('description', 'For enquiry about coffee packaging and storage solutions, please contact us on 011-61381211
        / 47028340 or email us at info@aashirvad.in / aashirvad@gmail.com.')
    @section('keywords', '')
@else
@endif

@section('content')
    <style type="text/css">
        @media (max-width: 991px) {
            .mobile-img {
                height: 400px;
            }
        }

        .h3-contact {
            line-height: 1.1;
            margin-top: 15px;
            font-weight: 400;
            font-family: Museo400, sans-serif;
        }
    </style>
    @include('hamburger-dropdown')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <div class="section contact" id="contact-banner" style="background-position: 0px 0px, 29% 0%;">
        <div class="main-wrapper">
            <div class="banner-content-wrapper">
                <div class="h2-wrapper white">
                    <h1 class="h2 center">{!! __('contactus.Contact') !!}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="map-wrapper"><img src="{{ asset('front-end/images/map.svg') }}" loading="lazy" width="35"
                alt="ecotactbags" class="map-img">
            <a data-toggle="tooltip" title="VENEZUELA" href="#CARABOBO"
                class="pointer venezuela-carabobo w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="ECUADOR" href="#GUAYAQUIL" class="pointer ecuador-guayaquil w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="BOLIVIA" href="#LA PAZ" class="pointer bolivia-la-paz w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="PERU" href="#LIMA" class="pointer peru-lima w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="COLOMBIA" href="#MANIZALES/BOGOTA" class="pointer bogota w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <!--<a href="#Manizales-Bogota" class="pointer manizales w-inline-block"><img src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>-->
            <a data-toggle="tooltip" title="COSTA RICA" href="#SAN JOSE"
                class="pointer costa-rica-san-jose w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="NICARAGUA" href="#MANAGUA" class="pointer managua w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="HONDURAS" href="#SAN PEDRO SULA"
                class="pointer san-pedro-sula w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="EL SALVADOR" href="#SAN SALVADOR"
                class="pointer san-salvador w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="GUATEMALA" href="#Guatemala-City"
                class="pointer guatemala-city w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="MEXICO" href="#TUXTLA GUTIERREZ"
                class="pointer mexico-tuxtla-gutierrez w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="TANZANIA" href="#DAR-ES-SALAAM"
                class="pointer tanzania-dar-es-salaam w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="BURUNDI" href="#BUJUMBURA"
                class="pointer burundi-bujumbura w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="RWANDA" href="#KIGALI" class="pointer rwanda-kigali w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="KENYA" href="#NAIROBI" class="pointer nairobi w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="DEMOCRATIC REPUBLIC OF THE CONGO" href="#KINSHASHA"
                class="pointer kinshasha w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="ETHIOPIA" href="#ADDIS ABABA"
                class="pointer ethiopia-addis-ababa w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="UGANDA" href="#KAMPALA" class="pointer uganda-kampala w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="CAMEROON" href="#DOUALA" class="pointer cameroon-douala w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="PAPUA NEW GUINEA" href="#PAPUA-NEW-GUINEA"
                class="pointer papua-new-guinea w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="SOUTH KOREA" href="#SEOUL" class="pointer seoul w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="YEMEN" href="#SANA’A" class="pointer sana-a w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="UNITED ARAB EMIRATES" href="#DUBAI"
                class="pointer dubai w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="JAPAN" href="#EBINA CITY / YOKOHAMA"
                class="pointer yokohama w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <!--<a href="#Ebina-City-Yokohama" class="pointer ebina w-inline-block"><img src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>-->
            <a data-toggle="tooltip" title="TAIWAN" href="#TAICHUNG" class="pointer taichung w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <!--<a href="#Taichung" class="pointer taiwan w-inline-block"><img src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>-->
            <a data-toggle="tooltip" title="CHINA & HONGKONG" href="#YUNNAN, SIMAO"
                class="pointer simao w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <!--<a href="#Yunnan-Simao" class="pointer yunnan w-inline-block"><img src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>-->
            <!--<a href="#Yunnan-Simao" class="pointer hongkong w-inline-block"><img src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>-->
            <a data-toggle="tooltip" title="HQ" href="#DELHI" class="pointer hq w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="MYANMAR" href="#MANDALAY" class="pointer mandalay w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="INDONESIA" href="#JAKARTA / MEDAN" class="pointer medan w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <!--<a href="#Jakarta-Medan" class="pointer jakarta w-inline-block"><img src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img"></a>-->
            <a data-toggle="tooltip" title="THAILAND" href="#BANGKOK" class="pointer bangkok w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="BANGALORE" href="#BANGALORE" class="pointer bangalor w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="KOLKATA" href="#KOLKATA" class="pointer kolkata w-inline-block"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>

            <a data-toggle="tooltip" title="PHILIPPINES" href="#MUNTINLUPA" class="pointer w-inline-block"
                style="left: 77%;bottom: 54.5%;"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            {{-- <a data-toggle="tooltip" title= "NEPAL" href="#Darshan_Chhajer" class="pointer w-inline-block" style="left: 70%;bottom: 45.5%;"><img src="{{asset('front-end/images/Ecotact_Segregation-Re1-01-1.png')}}" loading="lazy" width="25" height="25" alt="ecotactbags" class="pointer-img" ></a> --}}
            <a data-toggle="tooltip" title="NEPAL" href="#KATHMANDU" class="pointer w-inline-block"
                style="left: 69%;bottom: 51.5%;"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="NETHERLANDS" href="#ALMERE" class="pointer w-inline-block"
                style="left: 46%;bottom: 64.5%;"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="PANAMA" href="#David" class="pointer w-inline-block"
                style="left: 29%;bottom: 40.5%;"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="EAST TIMOR" href="#Dili" class="pointer w-inline-block"
                style="left: 79%;bottom: 30.5%;"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
            <a data-toggle="tooltip" title="UNITED STATES OF AMERICA" href="#Los Angeles" class="pointer w-inline-block"
                style="left: 15%;bottom: 60.5%;"><img
                    src="{{ asset('front-end/images/Ecotact_Segregation-Re1-01-1.png') }}" loading="lazy" width="25"
                    height="25" alt="ecotactbags" class="pointer-img"></a>
        </div>
    </div>
    <div class="section _0-100">
        <div class="main-wrapper">
            <div id="headquarters" class="main-location-card-wrapper">
                <div class="h2-wrapper left">
                    <h2 class="h2">{{ @$hqBranch->name }}</h2>
                </div>
                @foreach ($hqBranch->branches as $hqb)
                    <div class="location-card static w-inline-block">
                        <div id="DELHI" class="content-block">
                            <div class="location-main-wrapper">
                                <div class="location-icon"><img src="{{ asset('front-end/images/location.svg') }}"
                                        loading="lazy" alt="ecotactbags"></div>
                                <div>
                                    <div class="h3-wrapper contact">
                                        <h3 class="h3 green capital">{{ strtoupper(@$hqb->country_name) }}</h3>
                                    </div>
                                    <div class="city-name-wrapper">
                                        <div class="city">{{ strtoupper(@$hqb->state_name) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grey-location-divider"></div>
                        <div class="content-block">
                            <div class="location-content-container">
                                <div class="address">{{ @$hqb->company_name }},<br>{{ strtoupper(@$hqb->house_no) }}
                                </div>
                                <div class="location-details-wrapper">
                                    <div class="details-wrapper"><img src="{{ asset('front-end/images/Group.svg') }}"
                                            loading="lazy" alt="ecotactbags" class="image-16">
                                        <div class="address">{{ @$hqb->phone1 }} @if (@$hqb->phone2)
                                                /
                                            @endif {{ @$hqb->phone2 }} </div>
                                    </div>
                                    <div class="details-wrapper"><img src="{{ asset('front-end/images/Group-1.svg') }}"
                                            loading="lazy" alt="ecotactbags" class="image-16">
                                        <div class="address"><a href="mailto:{{ @$hqb->email1 }}"
                                                style="color:rgba(0, 0, 0, 0.9);">{{ @$hqb->email1 }}</a>
                                            @if (@$hqb->email2)
                                                |
                                            @endif <a href="mailto:{{ @$hqb->email2 }}"
                                                style="color:rgba(0, 0, 0, 0.9);">{{ @$hqb->email2 }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @forelse($continents as $continent)
                <div class="seperator"></div>
                <div id="{{ $continent->name }}" class="main-location-card-wrapper">
                    <div class="location-label-wrapper">
                        <div class="h2-wrapper contact">
                            <h2 class="h2">{{ strtoupper($continent->name) }}</h2>
                        </div><img src="{{ asset('front-end/images/Vector_1.svg') }}" loading="lazy"
                            style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(null) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(null) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(null) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(180deg) rotateY(null) rotateZ(0) skew(0, 0);transform-style:preserve-3d;display: none;"
                            data-w-id="4a4cf390-ed1a-e9c0-a144-3ea4297fa882" alt="ecotactbags" class="drop-down-arrow">
                    </div>
                    <div style="display:grid" class="w-layout-grid location-grid asia">
                        @forelse($continent->branches as $branch)
                            <div class="location-card w-inline-block">
                                <div id="{{ $branch->state_name }}" class="offset"></div>
                                <div class="content-block">
                                    <div class="location-main-wrapper">
                                        <div class="location-icon"><img
                                                src="{{ asset('front-end/images/location.svg') }}" loading="lazy"
                                                alt="ecotactbags">
                                        </div>
                                        <div class="location">
                                            <div class="h3-wrapper contact">
                                                <h3 class="h3 green capital">{{ strtoupper($branch->country_name) }}</h3>
                                            </div>
                                            <div class="city-name-wrapper">
                                                <div class="city">{{ strtoupper(@$branch->state_name) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grey-location-divider"></div>
                                <div class="content-block">
                                    <div class="location-content-container">
                                        <div class="name">{{ strtoupper(@$branch->manager_name) }}</div>
                                        <div class="location-details-wrapper">

                                            <div class="details-wrapper">
                                                @if (@$branch->email1)
                                                    <img src="{{ asset('front-end/images/Group-1.svg') }}" loading="lazy"
                                                        alt="ecotactbags" class="image-16">
                                                    <div class="address"><a href="mailto:{{ @$branch->email1 }}"
                                                            style="color:rgba(0, 0, 0, 0.9);">{{ @$branch->email1 }}</a>
                                                    </div>
                                                @else
                                                    <div class="name">COMING SOON</div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            @empty
            @endforelse

        </div>
    </div>
    <div class="section _0-0" id="enquiry-form">
        <div class="main-wrapper">
            <div class="form"><img src="{{ asset('front-end/images/cross.svg') }}" loading="lazy"
                    data-w-id="b2129d40-f7b4-a066-1e15-09be4036997a" alt="ecotactbags" class="close">
                <div class="w-layout-grid form-grid">
                    <div id="w-node-b2129d40-f7b4-a066-1e15-09be4036997c-40369979" class="form-img mobile-img"
                        style="background-image:url({{ asset('front-end/images/shutterstock_1055702987.jpg') }});background-position: bottom;background-size: cover;">
                        <!--<img src="{{ asset('front-end/images/Rectangle-145_1.png') }}" loading="lazy" alt="ecotactbags" sizes="(max-width: 479px) 63.48958206176758px, (max-width: 767px) 42vw, (max-width: 991px) 43vw, 421.9921875px" srcset="{{ asset('front-end/images/Rectangle-145_1-p-500.png') }} 500w" class="image-19">-->
                    </div>
                    <div class="form-content">
                        <div class="h2-wrapper">
                            <h3 class="h3-popup-heading">{{ __('globe.Enquiry Form') }}</h3>
                            <h2 class="h3 h3-contact">Contact us for hermetic packaging and storage solutions</h2>
                        </div>
                        <div class="form-block-2 w-form">
                            <form id="contact-us-form" name="email-form" data-name="Email Form"
                                action="{{ route('enquireNow') }}" method="post"> @csrf <label for="name-3"
                                    class="field-label">{!! __('globe.name') !!}</label>
                                <input type="hidden" value="{{ request('Utm_medium') }}" name="Utm_medium">
                                <input type="text" class="text-field w-input" maxlength="256" name="c_name"
                                    data-name="Name 2" placeholder="" id="c_name" value="{{ old('c_name') }}"
                                    required><label for="email-4" class="field-label">{!! __('globe.email') !!}</label>
                                <input type="email" class="text-field w-input" maxlength="256" name="c_email"
                                    data-name="Email 3" placeholder="" id="c_email" value="{{ old('c_email') }}"
                                    required><label for="email-4" class="field-label">{!! __('globe.company') !!}</label>
                                <input type="text" class="text-field w-input" maxlength="256" name="company"
                                    data-name="Email 2" placeholder="" id="company" value="{{ old('company') }}"
                                    required><label for="email-4" class="field-label">{!! __('globe.country') !!}</label>
                                <input type="text" class="text-field w-input" maxlength="256" name="c_country"
                                    data-name="Email 2" placeholder="" id="c_country" value="{{ old('c_country') }}"
                                    required><label for="email-4" class="field-label">{!! __('globe.comment') !!}</label>
                                <textarea onkeypress="magicvalidation(event)" placeholder="" maxlength="5000" id="c_message" name="c_message"
                                    class="textarea w-input">{{ old('c_message') }}</textarea>
                                <div style="width:100%;">
                                    @forelse($products as $product)
                                        <div style="display: inline-block;margin-right:10px;">
                                            <input type="checkbox" name="product[]"
                                                value="{{ $product->product_name }}">
                                            <label style="display: inline-block;font-weight:normal;" for="inlineCheckbox1"
                                                title="{{ $product->product_name }}">{{ \Illuminate\Support\Str::limit($product->product_name, $limit = 45, $end = '...') }}</label>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>

                                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                <div class="g-recaptcha" id="feedback-recaptcha"
                                    data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                <div class="button-wrapper">
                                    <div class="button-wrapper form">
                                        <!--<input type="submit" value="{{ __('globe.submit') }}" data-wait="Please wait..." class="button accent w-button">-->
                                        <a data-wait="Please wait..." onclick="test();"
                                            class="button accent w-button">{{ __('globe.submit') }}</a>
                                    </div>
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
        $('.pointer venezuela-carabobo w-inline-block').attr('title', $('.pointer venezuela-carabobo w-inline-block').text()
            .toUpperCase())


        function magicvalidation(e) {
            $(this).val($(this).val().replace(/[^a-z0-9]/gi, ''));
        }

        function test() {
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '179074224317808');
            fbq('track', 'Lead');






            if ($("#contact-us-form input:checkbox:checked").length > 0) {
                var valid = true;
            }
            var name = $('#c_name').val();
            var email = $('#c_email').val();
            var company = $('#company').val();
            var country = $('#c_country').val();
            if (name && email && company && country && valid) {
                console.log([name, email, company, country]);
                var new_contact = {
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






            } else {
                toastr.info('All Fields Are Required');
            }
        }
    </script>

    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=179074224317808&ev=Lead&noscript=1" /></noscript>

@stop
