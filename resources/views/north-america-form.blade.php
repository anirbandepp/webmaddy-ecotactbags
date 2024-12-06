@extends('layouts.front-layout')
<style type="text/css">
.grid-itemset{
    grid-template-columns: 1fr 1fr 1fr !important;
    grid-column-gap: 0 !important;
    grid-row-gap: 0 !important;
}
    @media (max-width: 991px) {
        .grid-itemset{
            grid-template-columns: none !important;
            display: block !important;
        }
    }
</style>
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@section('content')

  @include('hamburger-dropdown')
  <div class="section sustainability">
    <div class="main-wrapper">
      <div class="banner-content-wrapper">
        <div class="title-caption-wrapper">
          <div class="title-caption center">{!! __('sustain.SUSTAINABILITY') !!}</div>
        </div>
        <div class="h2-wrapper">
          <h2 class="h2 center white">{!! __('sustain.sustainText') !!}</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="section _100-0">
    <div class="main-wrapper">
      <div class="product-main-wrapper">
        <a href="#" class="product-image w-inline-block"><img src="{{ asset('front-end/images/Frame-337.png')}}" loading="lazy" sizes="(max-width: 479px) 73vw, (max-width: 991px) 350px, (max-width: 1279px) 33vw, 350px" width="350" srcset="{{ asset('front-end/images/Frame-337-p-500.png')}} 500w, {{ asset('front-end/images/Frame-337.png')}} 700w" alt="Ecotact Recycle Box For Ecotact Bags Only" class="image-10"></a>
        <div class="form-content">
          <div class="h2-wrapper">
            <h3 class="h3-popup-heading green">{!! __('sustain.Billing and Shipping details') !!}</h3>
          </div>
          <div class="form-block-2 w-form">
            <form id="email-form" name="email-form" data-name="Email Form"  action="{{route('createOrderSustain')}}" method="post"><label for="name" class="field-label">{!! __('sustain.Name')!!}</label><input type="text" class="text-field w-input" maxlength="256" name="name-2" data-name="Name 2" placeholder="" id="name-2"><label for="email" class="field-label">{!! __('sustain.Email')!!} </label><input type="email" class="text-field w-input" maxlength="256" name="email-3" data-name="Email 3" placeholder="" id="email-3" required=""><label for="email" class="field-label">{!! __('sustain.Phone')!!}</label><input type="number" class="text-field w-input" maxlength="256" name="phone-2" data-name="Email 2" placeholder="" id="phone-2" required=""><label for="email" class="field-label">{!! __('sustain.Country')!!}</label><input type="text" class="text-field w-input" maxlength="256" name="country-2" data-name="Email 2" placeholder="" id="email-2" required=""><label for="email" class="field-label">{!! __('sustain.Address')!!}</label><textarea name="address-2" maxlength="5000" id="field" data-name="Field" class="textarea w-input" required></textarea><label for="email" class="field-label">{!! __('sustain.Tax ID')!!}</label><textarea type="text" class="text-field w-input" maxlength="256" name="gstin" data-name="Email 2" placeholder="" id="email-2" ></textarea>
              <div class="total-main-wrapper bill">
                <div class="sub-title-wrapper">
                  <div class="sub-title order">{!! __('sustain.Ecotact Recycle Box Total Price')!!} :</div>
                </div>
                <div class="div-block-5">
                  <div class="total order">{{ $qty}} x US {{$product->stocks[0]['currency']}} {{round($product->stocks[0]['offer_price'])}} = US {{$product->stocks[0]['currency']}} {{$totPrice}}</div>
                </div>
              </div>
              <div class="g-recaptcha" data-sitekey="6LdyGgkbAAAAAHrMrah5HKcY_hMpywtEFFpokMtm"></div>
              <div class="button-wrapper">
                  <!--<input type="submit" value="Pay now" data-wait="Please wait..." class="button accent w-button">-->
                  
                  <input type="submit" value="{!! __('sustain.Pay now')!!}" class="button accent w-button">
              </div>
              <input type="hidden" value="{{ $qty}}" name="qty">
              {{csrf_field()}}
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
  <div class="section _0-100">
    <div class="main-wrapper">
      <div class="next-steps">
        <div class="h2-wrapper">
          <h2 class="h2 green">Next Steps</h2>
        </div>
        <div class="step-main-wrapper">
            <!--<img src="{{asset('front-end/images/ecotact-icon-2-01.png')}}">-->
            <div class="stats-content grid-itemset">
                @if(config('app.lang')->slug == 'sp')
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-span-icon-2-01-1.png')}}"></div>
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-span-icon-2-01-2.png')}}"></div>
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-span-icon-2-01-3.png')}}"></div>
                @else
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-icon-2-01-1.png')}}" alt="Order Ecotact recycle box from our website"></div>
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-icon-2-01-2.png')}}" alt="Fill up the box with used clean Ecotact Bags"></div>
                    <div class="mission" style="max-width:100%;"><img src="{{asset('front-end/images/ecotact-icon-2-01-3.png')}}" alt="Send it back using the pre-affixed shipping lable"></div>
                @endif
            </div>
          <!--<div class="steps-wrapper">-->
              
          <!--  <div class="next-step-content">-->
          <!--    <div class="yellow-bg"><img src="{{asset('front-end/images/box1.svg')}}" loading="lazy" alt=""></div>-->
          <!--    <div class="line"></div>-->
          <!--    <div class="grey-circle">-->
          <!--      <div class="number">01</div>-->
          <!--    </div>-->
          <!--    <div class="next-step-wrapper">-->
          <!--      <div class="next-step-text">Order Ecotact Recycle box from our website</div>-->
          <!--    </div>-->
          <!--  </div><img src="{{asset('front-end/images/dot-line.svg')}}" loading="lazy" id="w-node-_0cd4ca62-9b31-83ec-1741-402620fe04db-20fe04cb" alt="" class="image-13">-->
          <!--  <div class="next-step-content">-->
          <!--    <div class="yellow-bg"><img src="{{asset('front-end/images/box2.svg')}}" loading="lazy" alt=""></div>-->
          <!--    <div class="line"></div>-->
          <!--    <div class="grey-circle">-->
          <!--      <div class="number">02</div>-->
          <!--    </div>-->
          <!--    <div class="next-step-wrapper">-->
          <!--      <div class="next-step-text">Fill up the box with clean Ecotact bags</div>-->
          <!--    </div>-->
          <!--  </div><img src="{{asset('front-end/images/dot-line.svg')}}" loading="lazy" width="298" alt="" class="image-13">-->
          <!--  <div class="next-step-content">-->
          <!--    <div class="yellow-bg"><img src="{{asset('front-end/images/box3.svg')}}" loading="lazy" alt=""></div>-->
          <!--    <div class="line"></div>-->
          <!--    <div class="grey-circle">-->
          <!--      <div class="number">03</div>-->
          <!--    </div>-->
          <!--    <div class="next-step-wrapper">-->
          <!--      <div class="next-step-text">Send it back using the pre-affixed shipping label</div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
        </div>
      </div>
    </div>
  </div>
@stop