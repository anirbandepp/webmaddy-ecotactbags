@extends('layouts.front-layout')
@section('content')
    @include('hamburger-dropdown')
@section('title', 'cart')
<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .heightclass .select2-selection--single {
        height: 50px;
        border-color: #e0e0e0;
        border-radius: 10px;
    }

    .heightclass .select2-selection--single .select2-selection__rendered {
        line-height: 48px;
        font-size: 14px;
        color: #999;
        padding-left: 12px;
    }

    .heightclass .select2-selection--single .select2-selection__arrow {
        height: 48px;
    }
</style>
<div class="section cart wf-section">
    <div class="main-wrapper">
        <div class="cart-content-wp">
            <div class="caption-wp">
                <div class="title-caption center">{{ __('cart.YOUR CART') }}</div>
            </div>
            <h2 class="h2 center white">{{ __('cart.Refresh, Multiply') }}</h2>
        </div>
    </div>
</div>
<div class="section wf-section" ng-app="myApp" ng-controller="myCtrl">
    <div class="section _0-100 wf-section">
        <div class="main-wrapper">
            <div style="padding: 30px 0;"></div>
            <div style="display:grid" class="w-layout-grid location-grid asia">

                @foreach ($user_addresses as $key => $user_address)
                    <div class="location-card w-inline-block">
                        <div id="HQ" class="offset"></div>
                        <div class="content-block">
                            <div class="location-content-container">
                                <div class="city">{{ $user_address->name }}</div>
                                <div class="address">
                                    {{ $user_address->house_no }},<br>{{ $user_address->apertment_no }},
                                    {{ $user_address->area }}, {{ $user_address->landmark }}, {{ $user_address->city }},
                                    {{ $user_address->state }} {{ $user_address->pin }}, {{ $user_address->country }}
                                </div>
                                <div class="location-details-wrapper">
                                    <div class="details-wrapper"><img src="{{ asset('front-end/images/Group.svg') }}"
                                            loading="lazy" alt="ecotactbags" class="image-16">
                                        <div class="address">{{ $user_address->contact_no }} </div>
                                    </div>
                                    <div class="details-wrapper"><img src="{{ asset('front-end/images/Group-1.svg') }}"
                                            loading="lazy" alt="ecotactbags" class="image-16">
                                        <div class="address">{{ $user_address->email }}</div>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);"
                                onclick="event.preventDefault();document.getElementById('postSavedAddress{{ $user_address->id }}').submit();"
                                class="button w-button"
                                style="font-size: 12px; margin-top: 20px;padding: 6px 16px;background-color: #f2be69;color: #000; width: 100%; text-align: center;">{{ __('cart.Deliver to this address') }}</a>
                            <form
                                action="{{ route('postAddressConfirm', ['id' => $user_address->id, 'choosed' => 'yes']) }}"
                                method="post" id="postSavedAddress{{ $user_address->id }}">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="seperator"></div>
        </div>
    </div>

    <div class="main-wrapper" id="ttttt">
        <div class="product-main-wrapper">
            <div class="div-block-31">
                <form action="{{ route('postAddressConfirm', ['id' => $addr->id]) }}" method="post">
                    <div class="cart-contact-wp">
                        <div class="subtitle-wp">
                            {{-- <a href="cart.html" class="back-arrow w-inline-block"><img src="{{asset('front-end/images/Vector_6.svg')}}" loading="lazy" alt="ecotactbags" class="image-35"></a> --}}
                            <div class="select-size opacity">{{ __('cart.Contact Information') }}</div>
                        </div>
                        <div class="cart-contact-form-wp" ng-init="setAddDetails('{{ json_encode($codes) }}')">
                            @csrf
                            <div class="w-form">
                                <div id="email-form" name="email-form" data-name="Email Form"
                                    class="text-field-wp contact">
                                    <div class="fields-wp">
                                        <input type="text" class="text-field contact-info w-input" maxlength="256"
                                            name="name" data-name="Name" placeholder="Name" id="name"
                                            required="" value={{ $addr->id ? $addr->name : auth()->user()->name }}>
                                        <input type="email" class="text-field contact-info w-input" maxlength="256"
                                            name="email" data-name="Email" placeholder="Email" id="Email-2"
                                            required=""
                                            value={{ $addr->id ? $addr->email : auth()->user()->email }}>
                                        <!--<input type="number" min="0" class="text-field contact-info w-input" maxlength="256" name="contact_no" data-name="contact_no" placeholder="Contact Number" id="Contact-2" required="" value={{ $addr->id ? $addr->contact_no : auth()->user()->phone }}>-->
                                        <input type="tel" id="mobile-number" class="text-field contact-info w-input"
                                            maxlength="256" placeholder="e.g. +1 702 123 4567" required=""
                                            value="{{ $addr->id ? $addr->contact_no : auth()->user()->phone }}">
                                        {{-- <div class="contact-numb">
                                            <div data-hover="" data-delay="0" class="dropdown-4 w-dropdown" id="hv">
                                                <div class="dropdown-toggle-3 w-dropdown-toggle" id="dd">
                                                    <div class="w-icon-dropdown-toggle"></div>
                                                    <div>+@{{ sCode }}</div>
                                                </div>
                                                <nav class="dropdown-list-3 no-top-margin w-dropdown-list" style="overflow: scroll;height: 152px;margin-top:13px;" id="ddown">
                                                    <a href="#" class="details-dropdown-link w-dropdown-link" ng-repeat="code in codes" ng-click="setCode(code)">+@{{ code['code'] }}</a>
                                                </nav>
                                            </div>
                                            <div class="contact-text-wp">
                                                <input type="text" placeholder="Contact Number" class="text-block-20">
                                                <div class="text-block-20">{{ __('cart.Contact Number')}}</div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="cart-divider contact-form"></div>
                            <div class="select-size capital">{{ __('cart.Shipping address') }}</div>
                            <div class="cart-contact-form w-form">
                                <div id="email-form" name="email-form" data-name="Email Form"
                                    class="text-field-wp contact">
                                    <div class="fields-wp">
                                        <input type="text"
                                            class="text-field contact-info w-node-dc09a02e-f4b1-fded-3616-7650a68cb490-ac4c91ea w-input"
                                            maxlength="256" name="house_no" data-name="Name 3"
                                            placeholder="House Number" id="name-3" required=""
                                            value="{{ $addr->id ? $addr->house_no : old('house_no') }}">
                                        <input type="text"
                                            class="text-field contact-info apartment-name w-node-dc09a02e-f4b1-fded-3616-7650a68cb491-ac4c91ea w-input"
                                            maxlength="256" name="apertment_no" data-name="Name 4"
                                            placeholder="Apartment Name" id="name-4"
                                            value="{{ $addr->id ? $addr->apertment_no : old('apertment_no') }}"
                                            required="">
                                    </div>
                                    <div class="fields-wp">
                                        <input type="text" class="text-field contact-info w-input" maxlength="256"
                                            name="area" data-name="Name 3" placeholder="Area Details"
                                            id="name-5" required=""
                                            value="{{ $addr->id ? $addr->area : old('area') }}">
                                        <input type="text" class="text-field contact-info w-input" maxlength="256"
                                            name="landmark" data-name="Name 4" placeholder="Landmark" id="name-6"
                                            value="{{ $addr->id ? $addr->landmark : old('landmark') }}"
                                            required="">
                                        <input type="text" class="text-field contact-info w-input" maxlength="256"
                                            name="city" data-name="Name 3" placeholder="City" id="name-7"
                                            required="" value="{{ $addr->id ? $addr->city : old('city') }}">
                                    </div>
                                    <div class="fields-wp no-bottom-margin heightclass">
                                        {{-- <div data-hover="" data-delay="0" class="size-dropdown white w-dropdown">
                                            <div class="dropdown-toggle contact w-dropdown-toggle">
                                                <div class="icon w-icon-dropdown-toggle"></div>
                                                <div class="drop-down-text-wrapper">
                                                    <div class="text-block-20">State</div>
                                                </div>
                                            </div>
                                            <nav class="dropdown-list-3 w-dropdown-list">
                                                <a href="#" class="details-dropdown-link w-dropdown-link">Option 1</a>
                                                <a href="#" class="details-dropdown-link w-dropdown-link">Option 2</a>
                                            </nav>
                                        </div> --}}
                                        @if (config('app.lang')->slug != 'in')
                                            <select class="size-dropdown white w-dropdown js-example-basic-single "
                                                name="country" required="" id="firstCountry">
                                                @foreach ($countries as $key => $country)
                                                    <option value="{{ $country }}"
                                                        @if (strtoupper($addr->country) == strtoupper($country)) selected @endif>
                                                        {{ $country }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <select class="size-dropdown white w-dropdown js-example-basic-single "
                                                name="country" required="">
                                                <option value="INDIA">INDIA</option>
                                            </select>
                                        @endif

                                        {{-- <div data-hover="" data-delay="0" class="size-dropdown white w-dropdown" style="position: relative; z-index: 9;">
                                            <div class="dropdown-toggle contact w-dropdown-toggle">
                                                <div class="icon w-icon-dropdown-toggle"></div>
                                                <div class="drop-down-text-wrapper">
                                                    <input type="hidden" class="text-block-20" id="countryInput" name="country_id" value="{{ $addr->id ? $addr->country_id : old('country_id') }}">
                                                    <input type="hidden" class="text-block-20" id="countryInput2" name="country" value="{{ $addr->id ? $addr->country : old('country') }}">
                                                    <div class="text-block-20" id="cntryDiv">{{ $addr->id ? $addr->country : 'Country' }}</div>
                                                </div>
                                            </div>
                                            <nav class="dropdown-list-3 w-dropdown-list" style="overflow: scroll;height: 310px;">
                                                @foreach ($countries as $key => $country)
                                                    <a href="#" class="details-dropdown-link w-dropdown-link" onclick="$('#countryInput').val('{{ $key }}'); $('#countryInput2').val('{{ $country }}'); $('#cntryDiv').html('{{ $country }}');$('#w-dropdown-list-3').removeClass('w--open');$('#w-dropdown-toggle-3').removeClass('w--open');$('#w-dropdown-toggle-3').attr('aria-expanded','false');" >{{ $country }}</a>
                                                @endforeach
                                            </nav>
                                        </div> --}}
                                        <input type="text" class="text-field contact-info w-input" maxlength="256"
                                            name="state" data-name="Name 3" placeholder="State" id="name-8"
                                            required="" value="{{ $addr->id ? $addr->state : old('state') }}">
                                        <input type="text" class="text-field contact-info w-input" maxlength="256"
                                            name="pin" data-name="Name 3" placeholder="Pin Code" id="name-9"
                                            required="" value="{{ $addr->id ? $addr->pin : old('pin') }}">

                                        <input type="text" class="text-field contact-info w-input" maxlength="256"
                                            name="gstin" data-name="Name 3" placeholder="Gst Number(Optional)"
                                            id="gstin" value="{{ $addr->id ? $addr->gstin : old('gstin') }}">

                                    </div>
                                </div>
                            </div>


                            <div class="cart-divider contact-form"></div>
                            <div class="select-size capital">{{ __('cart.Billing Address') }}</div>
                            <div style="display: flex;align-items: center;">
                                <input type="checkbox" value="1" class="form-control" id="same"
                                    style="margin-top: 2px;">
                                <lable style="margin-left: 7px; font-size: 14px;">Same as Shipping Address</lable>
                            </div>
                            <div class="cart-contact-form w-form">
                                <div id="email-form" name="email-form" data-name="Email Form"
                                    class="text-field-wp contact">
                                    <div class="fields-wp">
                                        <input type="text"
                                            class="text-field contact-info w-node-dc09a02e-f4b1-fded-3616-7650a68cb490-ac4c91ea w-input"
                                            maxlength="256" name="billing_house_no" data-name="name-10"
                                            placeholder="House Number" id="name-10" required=""
                                            value="{{ old('billing_house_no') }}">

                                        <input type="text"
                                            class="text-field contact-info apartment-name w-node-dc09a02e-f4b1-fded-3616-7650a68cb491-ac4c91ea w-input"
                                            maxlength="256" name="billing_apertment_no" data-name="Name 11"
                                            placeholder="Apartment Name" id="name-11"
                                            value="{{ old('billing_apertment_no') }}" required="">

                                    </div>
                                    <div class="fields-wp">
                                        <input type="text" class="text-field contact-info w-input" maxlength="256"
                                            name="billing_area" data-name="Name 12" placeholder="Area Details"
                                            id="name-12" required="" value="{{ old('billing_area') }}">

                                        <input type="text" class="text-field contact-info w-input" maxlength="256"
                                            name="billing_landmark" data-name="Name 13" placeholder="Landmark"
                                            id="name-13" value="{{ old('billing_landmark') }}" required="">

                                        <input type="text" class="text-field contact-info w-input" maxlength="256"
                                            name="billing_city" data-name="Name 14" placeholder="City"
                                            id="name-14" required="" value="{{ old('billing_city') }}">
                                    </div>
                                    <div class="fields-wp no-bottom-margin heightclass">
                                        @if (config('app.lang')->slug != 'in')
                                            <select class="size-dropdown white w-dropdown js-example-basic-single "
                                                name="billing_country" required="">
                                                @foreach ($countries as $key => $country)
                                                    <option value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <select class="size-dropdown white w-dropdown js-example-basic-single "
                                                name="billing_country" required="">
                                                <option value="INDIA">INDIA</option>
                                            </select>
                                        @endif


                                        <input type="text" class="text-field contact-info w-input" maxlength="256"
                                            name="billing_state" data-name="Name 15" placeholder="State"
                                            id="name-15" required="" value="{{ old('billing_state') }}">

                                        <input type="text" class="text-field contact-info w-input" maxlength="256"
                                            name="billing_pin" data-name="Name 16" placeholder="Pin Code"
                                            id="name-16" required="" value="{{ old('billing_pin') }}">

                                        <input type="text" class="text-field contact-info w-input" maxlength="256"
                                            name="billing_gstin" data-name="Name 17"
                                            placeholder="Gst Number(Optional)" id="billing_gstin"
                                            value="{{ old('billing_gstin') }}">

                                    </div>
                                </div>
                            </div>
                            <div class="cart-divider contact-form"></div>

                        </div>
                        <div class="select-size capital">{{ __('cart.Select carrier Partner') }}</div>
                        <div class="cart-contact-form w-form">
                            <div id="email-form" name="email-form" data-name="Email Form"
                                class="text-field-wp contact">
                                <div class="fields-wp">
                                    {{ Form::select('carrier_partner', ['' => __('cart.Select carrier Partner')] + $partners, $addr->carrier_partner, ['class' => 'size-dropdown white w-dropdown dropdown-toggle contact w-dropdown-toggle', 'required']) }}

                                </div>
                            </div>
                        </div>
                        <div class="contact-form-btn-wp">
                            <button type="submit" class="button accent right w-button"
                                style="height: 48px;">{{ __('cart.Checkout') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if ($addr->id)
    <script>
        $('html, body').animate({
            scrollTop: $("#ttttt").offset().top
        }, 2000);
    </script>
@endif
<script>
    $(document).ready(function() {
        $('#same').click(function() {
            if ($('#same').is(':checked')) {
                console.log($('#firstCountry').val())
                $('select[name="billing_country"]').find('option[value="' + $('#firstCountry').val() +
                    '"]').attr("selected", true);
                $('select[name="billing_country"]').trigger('change');
                $('#name-10').val($('#name-3').val());
                $('#name-11').val($('#name-4').val());
                $('#name-12').val($('#name-5').val());
                $('#name-13').val($('#name-6').val());
                $('#name-14').val($('#name-7').val());
                $('#name-15').val($('#name-8').val());
                $('#name-16').val($('#name-9').val());
                $('#billing_gstin').val($('#gstin').val());
            } else {
                $('#name-10').val('');
                $('#name-11').val('');
                $('#name-12').val('');
                $('#name-13').val('');
                $('#name-14').val('');
                $('#name-15').val('');
                $('#name-16').val('');
                $('#billing_gstin').val('');
            };

        });
    });
</script>
@stop
