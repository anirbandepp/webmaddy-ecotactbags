<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
<div class="nav-bar-pop-up-wp">

  <div class="pop-up-wp order-tracker" id="track-order-pop" style="display: none;">
    <div class="pop-up-layer" >
      <div class="track-order" style="width: 40%;">
        <div class="track-order-wp">
          <div class="sub-title">{!! __('popup.Track your order') !!}</div>
          <div class="form-block-4 w-form">
            <form id="track-form-2" name="email-form-2" data-name="Email Form 2" action="{{route('trackUrl')}}" method="post">
                <!--<input type="text" class="text-field bottom-margin w-input" maxlength="256" name="tracking_id" data-name="tracking_id" placeholder="Tracking ID" id="tracking_id">-->
                @csrf
                  <select class="text-field bottom-margin w-input" name="d_service_id" id="d_service_idd">
                      @foreach($deliveryLinks as $deliveryLink)
                        <option value="{{$deliveryLink->tracking_url}}">{{$deliveryLink->name}}</option>
                      @endforeach
                  </select>
              
            </form>
          </div>
        </div>
        <a data-w-id="4ec1c025-5bdb-3864-6059-d09b9e13aef1" href="#" onclick="$('#track-order-pop').css('display','none')" class="close-icon-wp w-inline-block"><img src="{{ asset('front-end/images/entypo_cross.svg') }}" loading="lazy" alt="" class="close-icon"></a>
        <div class="cart-divider order"></div>
        <div class="track-order-wp">
          <a onclick="window.open($('#d_service_idd').val())" class="button accent dark-text w-button">{!! __('popup.Track Order') !!}</a>
        </div>
      </div>
    </div>
  </div>
  <div class="pop-up-wp track-wo-login">
    <div class="options wo-login">
      <a href="#" class="button accent dark-text w-button">{!! __('popup.Login') !!}</a>
      <div class="div-block-28">
        <a href="#" class="small-text color font-weight">{!! __('popup.Track without Login') !!}</a>
      </div>
    </div>
  </div>
  <div class="pop-up-wp user-options" id="myList" style="display: none;overflow-y: scroll;">
    <div class="div-block-33">
      <div class="options">
        <a href="{{ route('myOrders') }}" class="pop-up-link-block w-inline-block"><img src="{{asset('front-end/images/604651fac35d4910e8b620c0_cart-green.svg')}}" loading="lazy" alt="Cart Icon" class="option-icon">
          <div class="small-text font-color">{!! __('popup.My Orders') !!}</div>
        </a>
        <div class="cart-divider color"></div>
        <a onclick="viewTrackOrderFun();" data-w-id="24bdf1d5-a858-f78c-e6b9-2dc035e46d29" href="#" class="pop-up-link-block w-inline-block">
            <img src="#" loading="lazy" alt="" class="option-icon">
          <div class="small-text font-color">{!! __('popup.Track Order') !!}</div>
        </a>
        <!--<div class="cart-divider color"></div>-->
        <!--<a href="#" class="pop-up-link-block w-inline-block"><img src="images/604651fbfb63566c2f46e085_login-green.svg" loading="lazy" alt="" class="option-icon">-->
        <!--  <div class="small-text font-color">My Profile</div>-->
        <!--</a>-->
        <div class="cart-divider color"></div>
        <a href="{{route('userLogout')}}" class="pop-up-link-block w-inline-block"><img src="{{asset('front-end/images/604651fbfb63566c2f46e085_login-green-2.svg')}}" loading="lazy" alt="Right Arrow Icon" class="option-icon">
          <div class="small-text font-color">{!! __('popup.Logout') !!}</div>
        </a>
      </div>
    </div>
  </div>
  {{-- signup-otp --}}
  <div class="pop-up-wp signup-otp" id="signUpOtp" style="display: none;overflow-y: scroll;">
    <div class="pop-up-layer">
      <div class="login-pop-up">
        <div data-duration-in="300" data-duration-out="100" class="w-tabs">
          <div class="login-signup-wp w-tab-menu">
            <a data-w-tab="Tab 1" class="login-signup w-inline-block w-tab-link w--current">
              <div class="login">{!! __('popup.Signup Using OTP') !!}</div>
            </a>
          </div>
          <div class="w-tab-content">
            <div data-w-tab="Tab 1" class="w-tab-pane w--tab-active">
              <div class="google-wp">
                <div class="text-block-19">{!! __('popup.Please check the One Time Password sent to your email address') !!} <a  class="email signUp-email" >abc@email.com</a>
                </div>
                <a class="small-text color" onclick="changeEmail()" style="cursor: pointer;">{!! __('popup.Change Email') !!}</a>
              </div>
              <div class="divider-wp margin">
                <div class="otp-text">{!! __('popup.Enter One Time Password') !!}</div>
              </div>
              <div class="w-form">
                <form id="email-form" name="email-form" data-name="Email Form" class="form login-form">
                  <div class="text-field-wp">
                    <div class="otp">
                      <input type="text" class="text-field otp w-input otp-input-signup1 sign-otp-focus" maxlength="1" name="field-1" data-name="Field 6" placeholder="7" id="field-6" required="" autofocus>
                      <input type="text" class="text-field otp w-input otp-input-signup2 sign-otp-focus" maxlength="1" name="field-2" data-name="Email 3" placeholder="5" id="email-3" required="">
                      <input type="text" class="text-field otp w-input otp-input-signup3 sign-otp-focus" maxlength="1" name="field-3" data-name="Field 2" placeholder="7" id="field-2" required="">
                      <input type="text" class="text-field otp w-input otp-input-signup4 sign-otp-focus" maxlength="1" name="field-4" data-name="Field 3" placeholder="8" id="field-3" required="">
                      <input type="text" class="text-field otp w-input otp-input-signup5 sign-otp-focus" maxlength="1" name="field-5" data-name="Field 4" placeholder="2" id="field-4" required="">
                      <input type="text" class="text-field otp w-input otp-input-signup6 sign-otp-focus" maxlength="1" name="field-6" data-name="Field 5" placeholder="4" id="field-5" required="">
                    </div>
                    <a style="cursor: pointer;" class="small-text color" id="resendSignUpCode" onclick="resendOtpSignup()">{!! __('popup.Resend code') !!}</a>
                  </div>
                  <a onclick="signUp();" data-wait="Please wait..." class="button accent dark-text w-button">{!! __('popup.Sign Up') !!}</a>
                </form>
                <div class="w-form-done">
                  <div>{!! __('popup.Thank you! Your submission has been received!') !!}</div>
                </div>
                <div class="w-form-fail">
                  <div>{!! __('popup.Oops! Something went wrong while submitting the form.') !!}</div>
                </div>
              </div>
              <div class="agree-text-wp">
                <div class="agree-text">{!! __('popup.By continuing, you agree to our') !!} <a href="{{route('terms')}}" class="signup-link">{!! __('popup.Terms and Conditions') !!}</a> {!! __('popup.and') !!} <a href="{{route('privacy')}}" class="signup-link">{!! __('popup.Privacy Policy') !!}</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a data-w-id="e0bc12e0-4c9a-3738-c628-08b57c65e428" href="#" onclick="$('#signUpOtp').hide();" class="close-icon-wp w-inline-block"><img src="{{ asset('front-end/images/entypo_cross.svg') }}" loading="lazy" alt="Entypo Cross Icon" class="close-icon"></a>
      </div>
    </div>
  </div>
  {{-- login-otp --}}
  <div class="pop-up-wp login-otp" id="signInOtp" style="display: none;overflow-y: scroll;">
    <div class="pop-up-layer">
      <div class="login-pop-up">
        <div data-duration-in="300" data-duration-out="100" class="w-tabs">
          <div class="login-signup-wp w-tab-menu">
            <a data-w-tab="Tab 1" class="login-signup w-inline-block w-tab-link w--current">
              <div class="login">{!! __('popup.Login Using OTP') !!}</div>
            </a>
          </div>
          <div class="w-tab-content">
            <div data-w-tab="Tab 1" class="w-tab-pane w--tab-active">
              <div class="google-wp">
                <div class="text-block-19">{!! __('Please check the One Time Password sent to your email address') !!} <a href="#" class="email login-email"></a>
                </div>
                <a onclick="changeEmail()" style="cursor: pointer;" class="small-text color">{!! __('popup.Change Email') !!}</a>
              </div>
              <div class="divider-wp margin">
                <div class="otp-text">{!! __('popup.Enter One Time Password') !!}</div>
              </div>
              <div class="w-form">
                <form id="email-form" name="email-form" data-name="Email Form" class="form login-form">
                  <div class="text-field-wp">
                    <div class="otp">
                      <input type="text" class="text-field otp w-input otp-input-login1 login-otp-focus" maxlength="1" name="field-7" data-name="Field 7" placeholder="7" id="field-7" required="" autofocus>
                      <input type="text" class="text-field otp w-input otp-input-login2 login-otp-focus" maxlength="1" name="email-3" data-name="Email 3" placeholder="5" id="email-3" required="">
                      <input type="text" class="text-field otp w-input otp-input-login3 login-otp-focus" maxlength="1" name="field-2" data-name="Field 2" placeholder="7" id="field-2" required="">
                      <input type="text" class="text-field otp w-input otp-input-login4 login-otp-focus" maxlength="1" name="field-3" data-name="Field 3" placeholder="8" id="field-3" required="">
                      <input type="text" class="text-field otp w-input otp-input-login5 login-otp-focus" maxlength="1" name="field-4" data-name="Field 4" placeholder="2" id="field-4" required="">
                      <input type="text" class="text-field otp w-input otp-input-login6 login-otp-focus" maxlength="1" name="field-5" data-name="Field 5" placeholder="4" id="field-5" required="">
                    </div>
                    <a class="small-text color" id="resendLoginCOde" onclick="resendOtpLogin()" style="cursor: pointer;">{!! __('popup.Resend code') !!}</a>
                  </div><a data-wait="Please wait..." class="button accent dark-text w-button" onclick="signIn()">{!! __('popup.Login') !!}</a>
                </form>

              </div>
              <div class="agree-text-wp">
                <div class="agree-text">{!! __('popup.By continuing, you agree to our') !!} <a href="{{route('terms')}}" class="signup-link">{!! __('popup.Terms and Conditions') !!}</a> {!! __('popup.and') !!} <a href="{{route('privacy')}}" class="signup-link">{!! __('popup.Privacy Policy') !!}</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a data-w-id="e3a9f9b1-03cc-4ca8-dcfb-7ca8649bdebf" href="#" onclick="$('#signInOtp').hide();" class="close-icon-wp w-inline-block"><img src="{{ asset('front-end/images/entypo_cross.svg') }}" loading="lazy" alt="" class="close-icon"></a>
      </div>
    </div>
  </div>
  {{-- sign-up/Sign-in --}}
  <div class="pop-up-wp sign-up" id="signup" style="display: none;overflow-y: scroll;">

    <div class="pop-up-layer">
      <div class="login-pop-up">
        <div data-duration-in="300" data-duration-out="100" class="w-tabs">
          <div class="login-signup-wp w-tab-menu">
            <a data-w-tab="Tab 1" class="login-signup w-inline-block w-tab-link w--current">
              <div class="login">{!! __('popup.Login') !!}</div>
            </a>
            <a data-w-tab="Tab 2" class="login-signup w-inline-block w-tab-link">
              <div class="login">{!! __('popup.Sign Up') !!}</div>
            </a>
          </div>
          <div class="w-tab-content">
            <div data-w-tab="Tab 1" class="w-tab-pane w--tab-active">
              <div class="google-wp">
                <a href="{{ url('/login/google') }}" class="div-block-12 w-inline-block"><img src="{{ asset('front-end/images/flat-color-icons_google.svg')}}" loading="lazy" alt="Google Icon" class="icon-login">
                  <div class="google">Google</div>
                </a>
                <a href="{{ url('/login/facebook') }}" class="div-block-12 fb w-inline-block"><img src="{{ asset('front-end/images/Group-486.svg')}}" loading="lazy" height="46" alt="" class="icon-login facebook">
                  <div class="google facebook">Facebook</div>
                </a>
              </div>
              <div class="divider-wp">
                <div class="cart-divider login"></div>
                <div class="text-block-14">{!! __('popup.Or') !!}</div>
                <div class="cart-divider login"></div>
              </div>
              <div class="w-form">
                <form id="email-form" name="email-form" data-name="Email Form" class="form login-form">
                    <input type="email" class="text-field email w-input" maxlength="256" name="email-4" data-name="Email 4" placeholder="Email ID" id="email-login" required="">
                  <a data-w-id="3fc5b974-932d-4051-d4d2-3b63acfe4cf4" class="button accent dark-text w-button" onclick="sendOtpLogin();" id="signInButton">{!! __('popup.Login Using One Time Password') !!}</a>
                </form>

              </div>
              <div class="agree-text-wp">
                <div class="agree-text">{!! __('popup.By continuing, you agree to our') !!} <a href="{{route('terms')}}" class="signup-link">{!! __('popup.Terms and Conditions') !!}</a> {!! __('popup.and') !!} <a href="{{route('privacy')}}" class="signup-link">{!! __('popup.Privacy Policy') !!}</a>
                </div>
              </div>
            </div>
            <div data-w-tab="Tab 2" class="w-tab-pane">
              <div class="google-wp">
                <a href="{{ url('/login/google') }}" class="div-block-12 w-inline-block"><img src="{{ asset('front-end/images/flat-color-icons_google.svg')}}" loading="lazy" alt="" class="icon-login">
                  <div class="google">Google</div>
                </a>
                <a href="{{ url('/login/facebook') }}" class="div-block-12 fb w-inline-block"><img src="{{ asset('front-end/images/Group-486.svg')}}" loading="lazy" height="46" alt="" class="icon-login facebook">
                  <div class="google facebook">Facebook</div>
                </a>
              </div>
              <div class="divider-wp">
                <div class="cart-divider login"></div>
                <div class="text-block-14">{!! __('popup.Or') !!}</div>
                <div class="cart-divider login"></div>
              </div>
              <div class="w-form">
                <form id="email-form" name="email-form" data-name="Email Form" class="form login-form">
                    <input type="text" class="text-field email w-input" maxlength="256" name="name" data-name="name" placeholder="Name" required="" id="name-signup">
                    <input type="email" class="text-field email w-input" maxlength="256" name="email-2" data-name="Email 2" placeholder="Email ID" id="email-signup" required="">
                    <input type="text" class="text-field email w-input" maxlength="256" name="business_name" data-name="Email 2" placeholder="Name of the Company" required="" id="business_name-signup">
                    <input type="text" class="text-field email w-input" maxlength="256" name="country" data-name="Email 2" placeholder="Country" required="" id="country-signup">
                    
                  <a data-w-id="3fc5b974-932d-4051-d4d2-3b63acfe4d16" id="signUpButton" onclick="sendOtpSignup()" class="button accent dark-text w-button">{!! __('popup.Signup Using One Time Password') !!}</a>
                </form>

              </div>
              <div class="agree-text-wp">
                <div class="agree-text">{!! __('popup.By continuing, you agree to our') !!} <a href="{{route('terms')}}" class="signup-link">{!! __('popup.Terms and Conditions') !!}</a> {!! __('popup.and') !!} <a href="{{route('privacy')}}" class="signup-link">{!! __('popup.Privacy Policy') !!}</a>
                </div>
              </div>
            </div>

          </div>
        </div>
        <a data-w-id="3fc5b974-932d-4051-d4d2-3b63acfe4d26" href="#" onclick="$('#signup').css('display','none')" class="close-icon-wp w-inline-block"><img src="{{ asset('front-end/images/entypo_cross.svg') }}" loading="lazy" alt="" class="close-icon"></a>
      </div>
    </div>
  </div>
  <div class="pop-up-wp cart">
    <div class="main-pop-up-wp">
      <div class="cart-pop-up">
        <div class="product-info-wp">
          <div class="product-detail"><img src="images/Rectangle-149-1.png" loading="lazy" height="" width="88" alt="" class="product-img">
            <div class="product-info">
              <div class="product">{!! __('popup.Multi-layered Hermetic') !!}<br>{!! __('popup.Plastic Storage Bags') !!}</div>
              <div class="div-block-11">
                <div class="per-item price">US $ 159.00</div>
                <div class="per-item-wp">
                  <div class="per-item">{!! __('productdetails.Per bag') !!}</div>
                </div>
              </div>
              <a href="#" class="remove">{!! __('cart.Remove') !!}</a>
            </div>
          </div>
          <div class="ince-decr-wp small">
            <a href="#" class="incr-decr">-</a>
            <div class="number-item">1</div>
            <a href="#" class="incr-decr">+</a>
          </div>
        </div>
        <div class="product-info-wp">
          <div class="product-detail"><img src="images/Rectangle-149-1.png" loading="lazy" height="" width="88" alt="" class="product-img">
            <div class="product-info">
              <div class="product">{!! __('popup.Multi-layered Hermetic') !!}<br>{!! __('popup.Plastic Storage Bags') !!}</div>
              <div class="div-block-11">
                <div class="per-item price">US $ 159.00</div>
                <div class="per-item-wp">
                  <div class="per-item">{!! __('productdetails.Per bag') !!}</div>
                </div>
              </div>
              <a href="#" class="remove">{!! __('cart.Remove') !!}</a>
            </div>
          </div>
          <div class="ince-decr-wp small">
            <a href="#" class="incr-decr">-</a>
            <div class="number-item">1</div>
            <a href="#" class="incr-decr">+</a>
          </div>
        </div>
        <div class="cart-divider"></div>
        <div class="total-price-wp">
          <div class="text-block-11">{!! __('cart.Subtotal') !!} :</div>
          <div class="total-price">US $ 159.00</div>
        </div>
        <a href="#" class="button accent dark-text w-button">{!! __('popup.CONTINUE TO CHECKOUT') !!}</a>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<script>
  function sendOtpLogin(){
    notify('Please Wait..','warning');
    $('#signInButton').attr('disabled',true);
    var email = $("#email-login").val();
    $('.login-email').html(email);
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      type:'POST',
      url:"{{ route('sendLoginOtp') }}",
      data:{_token: CSRF_TOKEN,email:email},
      success:function(data){
        notify(data.msg,data.type);
        if(data.type == 'success'){
            localStorage.setItem('localEmail',data.email);
          $('#signup').css('display','none');
          $('#signInOtp').css('display','block');
        }
        $('#signInButton').attr('disabled',false);
      }
    });
  };

  function resendOtpLogin(){
    notify('Please Wait..','warning');
    var email = localStorage.getItem('localEmail');
    console.log(email);
    if(email.length){
      $('#resendLoginCOde').attr('disabled',true);
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        type:'POST',
        url:"{{ route('sendLoginOtp') }}",
        data:{_token: CSRF_TOKEN,email:email},
        success:function(data){
          notify(data.msg,data.type);
          if(data.type == 'success'){
          }
        }
      });
      $('#resendLoginCOde').attr('disabled',false);
    }else{
      notify('something went wrong','warning');
    }
  };

  function changeEmail(){
    $('#signInOtp').css('display','none');
    $('#signup').css('display','block');
    $("#email-login").val('');
    $('.signUp-email').val('');
  }
  function notify(msg,type){
    toastr.options = {
      "closeButton": true,
      "newestOnTop": true,
      "positionClass": "toast-top-right"
    };
    toastr.remove();
    toastr[type](msg);
  }
  function signIn(){
    notify('Please Wait..','warning');
    var valNeed = '';
    for (var i = 1; i <=6; i++) {
      valNeed += $('.otp-input-login'+i).val();
    }
    console.log([valNeed.trim().length,valNeed])
    if (valNeed.trim().length >= 6) {
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        type:'POST',
        url:"{{ route('sendLoginOtpPost') }}",
        data:{_token: CSRF_TOKEN,code:valNeed},
        success:function(data){
          notify(data.msg,data.type);
          if(data.type == 'success'){
            $('#signInOtp').css('display','none');
            window.location.replace(data.route);
          }
        }
      });
    }else{
      notify('Enter Valid COde');
    }
  }



    function sendOtpSignup(){
        notify('Please Wait..','warning');
        $('#signUpButton').attr('disabled',true);
        var email = $("#email-signup").val();
        var country = $("#country-signup").val();
        var business_name = $("#business_name-signup").val();
        var name = $("#name-signup").val();
        if(IsEmail(email)){
            if(email && country && business_name && name){
                $('.signUp-email').html(email);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                  type:'POST',
                  url:"{{ route('sendRegisterOtp') }}",
                  data:{_token: CSRF_TOKEN,email:email,counrty:country,business_name:business_name,name:name},
                  success:function(data){
                    notify(data.msg,data.type);
                    if(data.type == 'success'){
                      $('#signup').css('display','none');
                      $('#signUpOtp').css('display','block');
                    }
                    $('#signUpButton').attr('disabled',false);
                  }
                });
            }else{
                notify('All fields are required','error');
            }
        }else{
            notify('Enter Valid Email','error');
        }
    };

  function resendOtpSignup(){
    notify('Please Wait..','warning');
    var email = '{{ session()->get('user') ? session()->get('user')['email'] : '' }}';
    if(email.length){
      $('#resendSignUpCode').attr('disabled',true);
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        type:'POST',
        url:"{{ route('sendRegisterOtp') }}",
        data:{_token: CSRF_TOKEN,email:email},
        success:function(data){
          notify(data.msg,data.type);
          if(data.type == 'success'){
          }
        }
      });
      $('#resendSignUpCode').attr('disabled',false);
    }else{
      notify('something went wrong','warning');
    }
  };

  function signUp(){
    notify('Please Wait..','warning');
    var valNeed = '';
    for (var i = 1; i <=6; i++) {
      valNeed += $('.otp-input-signup'+i).val();
    }
    console.log([valNeed.trim().length,valNeed]);
    if (valNeed.trim().length >= 6) {
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        type:'POST',
        url:"{{ route('sendRegisterPostOtp') }}",
        data:{_token: CSRF_TOKEN,code:valNeed},
        success:function(data){
          notify(data.msg,data.type);
          if(data.type == 'success'){
            $('#signUpOtp').css('display','none');
            window.location.replace(data.route);
          }
        }
      });
    }else{
      notify('Enter Valid COde');
    }
  }
  function viewTrackOrderFun(){
    $('#track-order-pop').css('display','block');
    $('#myList').css('display','none');
  }
    $(".login-otp-focus").keyup(function () {
        if (this.value.length == 1) {
          $(this).next('.login-otp-focus').focus();
        }
    });
    $('.login-otp-focus').keyup(function(e) {
        if ((e.which == 8 || e.which == 46) && $(this).val() =='') {
            $(this).prev('.login-otp-focus').focus();
        }
    });
    
    $(".sign-otp-focus").keyup(function () {
        if (this.value.length == 1) {
          $(this).next('.sign-otp-focus').focus();
        }
    });
    $('.sign-otp-focus').keyup(function(e) {
        if ((e.which == 8 || e.which == 46) && $(this).val() =='') {
            $(this).prev('.sign-otp-focus').focus();
        }
    });
    
    
    
    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
    }


</script>
