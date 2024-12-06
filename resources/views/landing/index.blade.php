@include('landing.header')

<?php 
$countries = array("AF" => "Afghanistan",
"AX" => "Åland Islands",
"AL" => "Albania",
"DZ" => "Algeria",
"AS" => "American Samoa",
"AD" => "Andorra",
"AO" => "Angola",
"AI" => "Anguilla",
"AQ" => "Antarctica",
"AG" => "Antigua and Barbuda",
"AR" => "Argentina",
"AM" => "Armenia",
"AW" => "Aruba",
"AU" => "Australia",
"AT" => "Austria",
"AZ" => "Azerbaijan",
"BS" => "Bahamas",
"BH" => "Bahrain",
"BD" => "Bangladesh",
"BB" => "Barbados",
"BY" => "Belarus",
"BE" => "Belgium",
"BZ" => "Belize",
"BJ" => "Benin",
"BM" => "Bermuda",
"BT" => "Bhutan",
"BO" => "Bolivia",
"BA" => "Bosnia and Herzegovina",
"BW" => "Botswana",
"BV" => "Bouvet Island",
"BR" => "Brazil",
"IO" => "British Indian Ocean Territory",
"BN" => "Brunei Darussalam",
"BG" => "Bulgaria",
"BF" => "Burkina Faso",
"BI" => "Burundi",
"KH" => "Cambodia",
"CM" => "Cameroon",
"CA" => "Canada",
"CV" => "Cape Verde",
"KY" => "Cayman Islands",
"CF" => "Central African Republic",
"TD" => "Chad",
"CL" => "Chile",
"CN" => "China",
"CX" => "Christmas Island",
"CC" => "Cocos (Keeling) Islands",
"CO" => "Colombia",
"KM" => "Comoros",
"CG" => "Congo",
"CD" => "Congo, The Democratic Republic of The",
"CK" => "Cook Islands",
"CR" => "Costa Rica",
"CI" => "Cote D'ivoire",
"HR" => "Croatia",
"CU" => "Cuba",
"CY" => "Cyprus",
"CZ" => "Czech Republic",
"DK" => "Denmark",
"DJ" => "Djibouti",
"DM" => "Dominica",
"DO" => "Dominican Republic",
"EC" => "Ecuador",
"EG" => "Egypt",
"SV" => "El Salvador",
"GQ" => "Equatorial Guinea",
"ER" => "Eritrea",
"EE" => "Estonia",
"ET" => "Ethiopia",
"FK" => "Falkland Islands (Malvinas)",
"FO" => "Faroe Islands",
"FJ" => "Fiji",
"FI" => "Finland",
"FR" => "France",
"GF" => "French Guiana",
"PF" => "French Polynesia",
"TF" => "French Southern Territories",
"GA" => "Gabon",
"GM" => "Gambia",
"GE" => "Georgia",
"DE" => "Germany",
"GH" => "Ghana",
"GI" => "Gibraltar",
"GR" => "Greece",
"GL" => "Greenland",
"GD" => "Grenada",
"GP" => "Guadeloupe",
"GU" => "Guam",
"GT" => "Guatemala",
"GG" => "Guernsey",
"GN" => "Guinea",
"GW" => "Guinea-bissau",
"GY" => "Guyana",
"HT" => "Haiti",
"HM" => "Heard Island and Mcdonald Islands",
"VA" => "Holy See (Vatican City State)",
"HN" => "Honduras",
"HK" => "Hong Kong",
"HU" => "Hungary",
"IS" => "Iceland",
"IN" => "India",
"ID" => "Indonesia",
"IR" => "Iran, Islamic Republic of",
"IQ" => "Iraq",
"IE" => "Ireland",
"IM" => "Isle of Man",
"IL" => "Israel",
"IT" => "Italy",
"JM" => "Jamaica",
"JP" => "Japan",
"JE" => "Jersey",
"JO" => "Jordan",
"KZ" => "Kazakhstan",
"KE" => "Kenya",
"KI" => "Kiribati",
"KP" => "Korea, Democratic People's Republic of",
"KR" => "Korea, Republic of",
"KW" => "Kuwait",
"KG" => "Kyrgyzstan",
"LA" => "Lao People's Democratic Republic",
"LV" => "Latvia",
"LB" => "Lebanon",
"LS" => "Lesotho",
"LR" => "Liberia",
"LY" => "Libyan Arab Jamahiriya",
"LI" => "Liechtenstein",
"LT" => "Lithuania",
"LU" => "Luxembourg",
"MO" => "Macao",
"MK" => "Macedonia, The Former Yugoslav Republic of",
"MG" => "Madagascar",
"MW" => "Malawi",
"MY" => "Malaysia",
"MV" => "Maldives",
"ML" => "Mali",
"MT" => "Malta",
"MH" => "Marshall Islands",
"MQ" => "Martinique",
"MR" => "Mauritania",
"MU" => "Mauritius",
"YT" => "Mayotte",
"MX" => "Mexico",
"FM" => "Micronesia, Federated States of",
"MD" => "Moldova, Republic of",
"MC" => "Monaco",
"MN" => "Mongolia",
"ME" => "Montenegro",
"MS" => "Montserrat",
"MA" => "Morocco",
"MZ" => "Mozambique",
"MM" => "Myanmar",
"NA" => "Namibia",
"NR" => "Nauru",
"NP" => "Nepal",
"NL" => "Netherlands",
"AN" => "Netherlands Antilles",
"NC" => "New Caledonia",
"NZ" => "New Zealand",
"NI" => "Nicaragua",
"NE" => "Niger",
"NG" => "Nigeria",
"NU" => "Niue",
"NF" => "Norfolk Island",
"MP" => "Northern Mariana Islands",
"NO" => "Norway",
"OM" => "Oman",
"PK" => "Pakistan",
"PW" => "Palau",
"PS" => "Palestinian Territory, Occupied",
"PA" => "Panama",
"PG" => "Papua New Guinea",
"PY" => "Paraguay",
"PE" => "Peru",
"PH" => "Philippines",
"PN" => "Pitcairn",
"PL" => "Poland",
"PT" => "Portugal",
"PR" => "Puerto Rico",
"QA" => "Qatar",
"RE" => "Reunion",
"RO" => "Romania",
"RU" => "Russian Federation",
"RW" => "Rwanda",
"SH" => "Saint Helena",
"KN" => "Saint Kitts and Nevis",
"LC" => "Saint Lucia",
"PM" => "Saint Pierre and Miquelon",
"VC" => "Saint Vincent and The Grenadines",
"WS" => "Samoa",
"SM" => "San Marino",
"ST" => "Sao Tome and Principe",
"SA" => "Saudi Arabia",
"SN" => "Senegal",
"RS" => "Serbia",
"SC" => "Seychelles",
"SL" => "Sierra Leone",
"SG" => "Singapore",
"SK" => "Slovakia",
"SI" => "Slovenia",
"SB" => "Solomon Islands",
"SO" => "Somalia",
"ZA" => "South Africa",
"GS" => "South Georgia and The South Sandwich Islands",
"ES" => "Spain",
"LK" => "Sri Lanka",
"SD" => "Sudan",
"SR" => "Suriname",
"SJ" => "Svalbard and Jan Mayen",
"SZ" => "Swaziland",
"SE" => "Sweden",
"CH" => "Switzerland",
"SY" => "Syrian Arab Republic",
"TW" => "Taiwan, Province of China",
"TJ" => "Tajikistan",
"TZ" => "Tanzania, United Republic of",
"TH" => "Thailand",
"TL" => "Timor-leste",
"TG" => "Togo",
"TK" => "Tokelau",
"TO" => "Tonga",
"TT" => "Trinidad and Tobago",
"TN" => "Tunisia",
"TR" => "Turkey",
"TM" => "Turkmenistan",
"TC" => "Turks and Caicos Islands",
"TV" => "Tuvalu",
"UG" => "Uganda",
"UA" => "Ukraine",
"AE" => "United Arab Emirates",
"GB" => "United Kingdom",
"US" => "United States",
"UM" => "United States Minor Outlying Islands",
"UY" => "Uruguay",
"UZ" => "Uzbekistan",
"VU" => "Vanuatu",
"VE" => "Venezuela",
"VN" => "Viet Nam",
"VG" => "Virgin Islands, British",
"VI" => "Virgin Islands, U.S.",
"WF" => "Wallis and Futuna",
"EH" => "Western Sahara",
"YE" => "Yemen",
"ZM" => "Zambia",
"ZW" => "Zimbabwe");

$products = array("Multilayered Hermetic Storage Bags" => "Multilayered Hermetic Storage Bags",
"Troiseal Bags" => "Troiseal Bags",
"Multilayered Hermetic Sampler Bags"=>"Multilayered Hermetic Sampler Bags",
"Sterile Vacuum Bags" => "Sterile Vacuum Bags",
"Supergreen 40" => "Supergreen 40",
"Hermetic FIBC Bags" => "Hermetic FIBC Bags",
"Ship Shield Hermetic Container Liners" => "Ship Shield Hermetic Container Liners",
"ECOVAC 20-2" => "ECOVAC 20-2",
"ECOVAC 50" => "ECOVAC 50",
"ADD-ONS: High Quality Corrugated Boxes" => "ADD-ONS: High Quality Corrugated Boxes",
"ADD-ONS: Metal Detectable Cable Ties" => "ADD-ONS: Metal Detectable Cable Ties");
?>
<style>
    .chosen-container{
        width:100%;
    }
    .chosen-container .chosen-choices{
        min-height: 44px;
        padding:5px !important;
        height:auto !important;
    }
    .chosen-container .chosen-choices span{
        font-size:14px;
    }
    .chosen-container .chosen-choices li{
        font-size: 17px !important;
        padding-left: 9px !important;
    }
    .chosen-container .chosen-choices li:after{
        display:none;
    }
    .chosen-drop .chosen-results .active-result{
        color:#000;
        font-size:14px;
    }
    .chosen-drop .chosen-results .result-selected{
        color:#555;
        font-size:14px;
    }
    .chosen-drop .chosen-results .result-selected:after{
        display:none;
    }
    .chosen-drop .chosen-results .active-result:after{
        display:none;
    }
    @media only screen and (max-width : 991px) {
      .visible-xs {
        display: inline-block !important;
      }
      .hidden-xs{
        display: none !important;
      }
    }
    .modal-dialog{
      top: 50%;
      position: absolute;
      transform: translateY(-50%) !important;
    }
</style>
<!-- <section class="header-gap"></section> -->
<div id="get-quote"></div>
<section class="banner-area" id="Key" style="background: #ccc url({{ asset('marketingleadsenglishasset/img/banner.jpg')}});">
  <div class="elementor-background-overlay"></div>
  <div class="baner-overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h2 class="mb30 banner-head-text">Our 9 layers of hermetic packaging cater to the optimum storage requirements of your green coffee for a safe transition.</h2>
          <ul>
            <li>High level of temperature tolerance (- 30 degrees C to + 90 degrees C)</li>
            <li>Aroma and moisture level maintained</li>
            <li>Sensitive food and vitamin content protected</li>
            <li>Protects flavour and quality</li>
            <li>Increased shelf life for more than a year</li>
            <li>100% Reusable and Recyclable</li>
            <li>Extra-clear transparent bags for clean visibility</li>
          </ul>
        </div>
        <div class="col-md-4 col-md-offset-1 hidden-xs ancor">
          <div class="banner-form-outer">
            <div class="banner-form">
              <div id="submitMessage"></div>
              <form class="contact-form" id="contact-form" method="post" action="{{route('landingPagePost')}}">
                  @csrf
                 <h3>Get A FREE Quote!</h3>
                 <p>Feel free to contact Us! </p>
                 <div class="form-group mb15">
                     <input type="hidden" value="{{request('Utm_medium')}}" name="Utm_medium">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                </div>
                <div class="form-group mb15">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="form-group mb15">
                  <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Company Name" required>
                </div>
                <div class="form-group">
                  <select class="form-control" id="conProducts" name="products[]" data-placeholder="Choose a Product..." multiple>
                      
                    <?php
                    
                    foreach($products as $key => $value) {
                      ?>
                      <option value="<?= $value ?>"><?= htmlspecialchars($value) ?></option>
                      <?php
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group mb15">
                  <select class="form-control" id="conCountry" name="country" required>
                  <option value="">Country Select</option>
                    <?php
                    asort($countries);
                    foreach($countries as $key => $value) {

                      ?>
                      <option value="<?= $value ?>"><?= htmlspecialchars($value) ?></option>
                      <?php
                      
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group mb15">
                  <textarea class="form-control" id="conMessage" rows="4" name="message" placeholder="Message"></textarea>
                </div>
                <div class="form-group mb0">
                  <input type="submit" id="contact-form-submit" name="submit" value="Send" class="btn btn-primary">
                  <!-- <a href="https://api.whatsapp.com/send?phone=918448848948" target="_blank" class="btn btn-primary whatsapp-btn"><i class="lab la-whatsapp"></i></a> -->
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-12 text-center mt30 visible-xs">
          <a href="" class="btn btn-primary" data-toggle="modal" data-target=".mymodal">Get Quote</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section deta-counter pb0">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6">
        <div class="counter text-center">
          <span class="counter-image"><img src="{{ asset('marketingleadsenglishasset/img/icon2.png')}}"></span>
          <div class="counter-info">
            <h2 class="timer count-title" data-max="15">+</h2>
            <p class="count-text">Million bags sold</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="counter text-center">
          <span class="counter-image"><img src="{{ asset('marketingleadsenglishasset/img/icon1.png')}}"></span>
          <div class="counter-info">
            <h2 class="timer count-title" data-max="45">+</h2>
            <p class="count-text">Countries covered</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="counter text-center">
          <span class="counter-image"><img src="{{ asset('marketingleadsenglishasset/img/icon3.png')}}"></span>
          <div class="counter-info">
            <h2 class="timer count-title" data-max="30">+</h2>
            <p class="count-text">Country channel partners</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <section class="why-choose who-we-are">
  <div class="container">
    <div class="row flex-row">
          <div class="col-md-8 col-lg-6">
            <figure class="rounded">
              <span class="green-leaf"><img src="{{ asset('marketingleadsenglishasset/img/banner-leafe-green.png')}}" alt=""></span>
              <img src="{{ asset('marketingleadsenglishasset/img/about9.jpg')}}" srcset="" alt="">
              <a href="https://www.youtube.com/watch?v=9wvjbDjbyq8" class="play-btn image-link"><img src="{{ asset('marketingleadsenglishasset/img/play.png')}}"></a>
            </figure>
          </div>
          <div class="col-lg-5 col-xl-4 col-lg-offset-1">
            <h2 class="sub-header text-left">Who we are?</h2>
            <h5 class="lead">Company that believes in the power of creative strategy.</h5>
            <div class="d-flex">
              <div>
                <span class="icon"><span class="number fs-18"><i class="las la-check"></i></span></span>
              </div>
              <div>
                <h4 class="">Some meaningful titel here</h4>
                <p class="">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
              </div>
            </div>
            <div class="d-flex">
              <div>
                <span class="icon"><span class="number fs-18"><i class="las la-check"></i></span></span>
              </div>
              <div>
                <h4 class="">Some meaningful titel here</h4>
                <p class="">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
              </div>
            </div>
          </div>
        </div>
  </div>
</section> -->

<section class="section body-area" id="Products">
  <div class="product-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center mb30">
          <h2 class="sub-header">Your grains intact and fresh</h2>
        </div>
          <div class="col-md-12">
            <div id="products-carousel" class="owl-carousel owl-theme products-carousel">
              <div class="item">
                <div class="product-box text-center">
                  <div class="product-image">
                    <img src="{{ asset('marketingleadsenglishasset/img/products/1.jpg')}}" alt="" class="img-responsive">
                  </div>
                  <div class="product-name">
                    <h4>Multilayered Hermetic Storage Bags</h4>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="product-box text-center">
                  <div class="product-image">
                    <img src="{{ asset('marketingleadsenglishasset/img/products/2.jpg')}}" alt="" class="img-responsive">
                  </div>
                  <div class="product-name">
                    <h4>Troiseal Bags</h4>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="product-box text-center">
                  <div class="product-image">
                    <img src="{{ asset('marketingleadsenglishasset/img/products/3.jpg')}}" alt="" class="img-responsive">
                  </div>
                  <div class="product-name">
                    <h4>Multilayered Hermetic Sampler Bags</h4>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="product-box text-center">
                  <div class="product-image">
                    <img src="{{ asset('marketingleadsenglishasset/img/products/4.jpg')}}" alt="" class="img-responsive">
                  </div>
                  <div class="product-name">
                    <h4>Sterile Vacuum Bags</h4>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="product-box text-center">
                  <div class="product-image">
                    <img src="{{ asset('marketingleadsenglishasset/img/products/5.jpg')}}" alt="" class="img-responsive">
                  </div>
                  <div class="product-name">
                    <h4>Supergreen 40</h4>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="product-box text-center">
                  <div class="product-image">
                    <img src="{{ asset('marketingleadsenglishasset/img/products/7.jpg')}}" alt="" class="img-responsive">
                  </div>
                  <div class="product-name">
                    <h4>Hermetic FIBC Bags</h4>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="product-box text-center">
                  <div class="product-image">
                    <img src="{{ asset('marketingleadsenglishasset/img/products/8.jpg')}}" alt="" class="img-responsive">
                  </div>
                  <div class="product-name">
                    <h4>Ship Shield Hermetic Container Liners</h4>
                  </div>
                </div>
              </div>
              <!-- <div class="item">
                <div class="product-box text-center">
                  <div class="product-image">
                    <img src="{{ asset('marketingleadsenglishasset/img/products/9.jpg')}}" alt="" class="img-responsive">
                  </div>
                  <div class="product-name">
                    <h4>ECOVAC 20-2</h4>
                  </div>
                </div>
              </div> -->
              <!-- <div class="item">
                <div class="product-box text-center">
                  <div class="product-image">
                    <img src="{{ asset('marketingleadsenglishasset/img/products/10.jpg')}}" alt="" class="img-responsive">
                  </div>
                  <div class="product-name">
                    <h4>ECOVAC 50</h4>
                  </div>
                </div>
              </div> -->
              <div class="item">
                <div class="product-box text-center">
                  <div class="product-image">
                    <img src="{{ asset('marketingleadsenglishasset/img/products/11.jpg')}}" alt="" class="img-responsive">
                  </div>
                  <div class="product-name">
                    <h4>ADD-ONS: High Quality Corrugated Boxes</h4>
                  </div>
                </div>
              </div>
              <!-- <div class="item">
                <div class="product-box text-center">
                  <div class="product-image">
                    <img src="{{ asset('marketingleadsenglishasset/img/products/12.jpg')}}" alt="" class="img-responsive">
                  </div>
                  <div class="product-name">
                    <h4>ADD-ONS: Metal Detectable Cable Ties</h4>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
          <div class="col-md-12 text-center mt30">
            <a href="" class="btn btn-primary visible-xs" data-toggle="modal" data-target=".mymodal">Get Quote</a>
            <a href="#get-quote" class="btn btn-primary hidden-xs ancor">Get Quote</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="deta-counter featured-logos">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center mb30">
        <h2 class="sub-header">As Featured In</h2>
      </div>
      <div class="col-md-12">
        <div class="clients-rows">
          <a href="#"><img src="{{ asset('marketingleadsenglishasset/img/pdg.png')}}" alt=""></a>
          <a href="#"><img src="{{ asset('marketingleadsenglishasset/img/sca.png')}}" alt=""></a>
          <a href="#"><img src="{{ asset('marketingleadsenglishasset/img/crg.png')}}" alt=""></a>
          <!-- <a href="#"><img src="{{ asset('marketingleadsenglishasset/img/ciologo.png')}}" alt=""></a>
          <a href="#"><img src="{{ asset('marketingleadsenglishasset/img/sejsearchengine.png')}}" alt=""></a> -->
        </div>
      </div>
    </div>
  </div>
</section>

<section class="why-choose">
  <div class="container">
    <div class="row flex-row">
      <!--/column -->
      <div class="col-lg-5 col-xl-4">
        <h2 class="sub-header text-left mb30">Why Choose Ecotact?</h2>
        <!-- <h5 class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida vulputate fermentum. Sed dui leo, malesuada vitae libero sed. </h5> -->
        <div class="d-flex row-flex">
          <div>
            <span class="icon"><span class="number fs-18">1</span></span>
          </div>
          <div>
            <h4 class="mb0">Customer first approach </h4>
            <!-- <p class="">Nulla vitae elit libero pharetra augue dapibus. Praesent commodo cursus.</p> -->
          </div>
        </div>
        <div class="d-flex row-flex">
          <div>
            <span class="icon"><span class="number fs-18">2</span></span>
          </div>
          <div>
            <h4 class="mb0">Reliable supply chain and delivery</h4>
            <!-- <p class="">Vivamus sagittis lacus vel augue laoreet. Etiam porta sem malesuada magna.</p> -->
          </div>
        </div>
        <div class="d-flex row-flex">
          <div>
            <span class="icon"><span class="number fs-18">3</span></span>
          </div>
          <div>
            <h4 class="mb0">Competitively priced</h4>
            <!-- <p class="">Cras mattis consectetur purus sit amet. Aenean lacinia bibendum nulla sed.</p> -->
          </div>
        </div>
        <div class="d-flex row-flex">
          <div>
            <span class="icon"><span class="number fs-18">4</span></span>
          </div>
          <div>
            <h4 class="mb0">Customizable as per your requirement</h4>
            <!-- <p class="">Cras mattis consectetur purus sit amet. Aenean lacinia bibendum nulla sed.</p> -->
          </div>
        </div>
        <div class="d-flex row-flex">
          <div>
            <span class="icon"><span class="number fs-18">5</span></span>
          </div>
          <div>
            <h4 class="mb0">Global distribution in over 45+ countries</h4>
            <!-- <p class="">Cras mattis consectetur purus sit amet. Aenean lacinia bibendum nulla sed.</p> -->
          </div>
        </div>
        <div class="d-flex row-flex">
          <a href="" class="btn btn-primary visible-xs" data-toggle="modal" data-target=".mymodal">Get Quote</a>
            <a href="#get-quote" class="btn btn-primary hidden-xs ancor">Get Quote</a>
        </div>
      </div>
      <!--/column -->
      <div class="col-md-8 col-lg-6 col-lg-offset-1">
        <figure class="rounded">
          <span class="green-leaf"><img src="{{ asset('marketingleadsenglishasset/img/banner-leafe-green.png')}}" alt=""></span>
          <img src="{{ asset('marketingleadsenglishasset/img/about7.jpg')}}" srcset="" alt="">
        </figure>
      </div>
    </div>
  </div>
</section>

<section class="testimonials-area" id="Testimonials">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h5>Clients Says</h5>
        <h2>Hear it from our happy customers</h2>
        <!-- <p>Incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco reprehenderit voluptate.</p> -->
        <img src="{{ asset('marketingleadsenglishasset/img/banner-leafe.png')}}" class="opacity-img" alt="">
      </div>
      <div class="col-md-8">
        <div class="all-testimonials">
          <div id="testimonial-slider" class="owl-carousel">
            <div class="item">
              <div class="testi-box">
               <div class="testi-dtls">
                 <a href="#" class="rating-star"><img src="{{ asset('marketingleadsenglishasset/img/star.png')}}" alt=""></a>
                 <a href="#" class="google-img"><img src="{{ asset('marketingleadsenglishasset/img/google.png')}}" alt=""></a>
                 <p>We have been using Ecotact bags for three and a half years and have found Ecotact bags very economical and easy to obtain in most of the countries of origin for coffee.</p>
               </div>
               <div class="testi-user media">
                <div class="media-left">
                  <span><img src="{{ asset('marketingleadsenglishasset/img/testi7.jpg')}}" class="media-object"></span>
                </div>
                <div class="media-body">
                  <h5>Scott Bennett</h5>
                  <p>H.A. Bennett, Australia</p>
                </div>
               </div>
             </div>
            </div>
            <!-- <div class="item">
              <div class="testi-box">
               <div class="testi-dtls">
                 <a href="#" class="rating-star"><img src="{{ asset('marketingleadsenglishasset/img/star.png')}}" alt=""></a>
                 <a href="#" class="google-img"><img src="{{ asset('marketingleadsenglishasset/img/google.png')}}" alt=""></a>
                 <p>Service and products of Ecotact are really good, pricing has been really great for such a product.</p>
               </div>
               <div class="testi-user media">
                <div class="media-left">
                  <span><img src="https://via.placeholder.com/150x150" class="media-object"></span>
                </div>
                <div class="media-body">
                  <h5>Carlos Melen</h5>
                  <p>Good Coffee Farms</p>
                </div>
               </div>
             </div>
            </div>
            <div class="item">
              <div class="testi-box">
               <div class="testi-dtls">
                 <a href="#" class="rating-star"><img src="{{ asset('marketingleadsenglishasset/img/star.png')}}" alt=""></a>
                 <a href="#" class="google-img"><img src="{{ asset('marketingleadsenglishasset/img/google.png')}}" alt=""></a>
                 <p>We have been using Ecotact bags for three and a half years and have found Ecotact bags very economical and easy to obtain in most of the countries of origin for coffee.</p>
               </div>
               <div class="testi-user media">
                <div class="media-left">
                  <span><img src="https://via.placeholder.com/150x150" class="media-object"></span>
                </div>
                <div class="media-body">
                  <h5>Scott Bennett</h5>
                  <p>H.A. Bennett, Australia</p>
                </div>
               </div>
             </div>
            </div>
            <div class="item">
              <div class="testi-box">
               <div class="testi-dtls">
                 <a href="#" class="rating-star"><img src="{{ asset('marketingleadsenglishasset/img/star.png')}}" alt=""></a>
                 <a href="#" class="google-img"><img src="{{ asset('marketingleadsenglishasset/img/google.png')}}" alt=""></a>
                 <p>Ecotact has excellent timely service. They deliver their products promptly to any part of the world.</p>
               </div>
               <div class="testi-user media">
                <div class="media-left">
                  <span><img src="https://via.placeholder.com/150x150" class="media-object"></span>
                </div>
                <div class="media-body">
                  <h5>JJ, RTC, Rwanda</h5>
                  <p>H.A. Bennett, Australia</p>
                </div>
               </div>
             </div>
            </div> -->
            <div class="item">
              <div class="testi-box">
               <div class="testi-dtls">
                 <a href="#" class="rating-star"><img src="{{ asset('marketingleadsenglishasset/img/star.png')}}" alt=""></a>
                 <a href="#" class="google-img"><img src="{{ asset('marketingleadsenglishasset/img/google.png')}}" alt=""></a>
                 <p><span class=""><small><strong>Positive:</strong> Professionalism, Quality, Responsiveness, Value</small></span><br> The perfect product for protecting, storing and transporting produce, coffee and other grains. This was what I was looking for.</p>
               </div>
               <div class="testi-user media">
                <div class="media-left">
                  <span><img src="{{ asset('marketingleadsenglishasset/img/testi3.jpg')}}" class="media-object"></span>
                </div>
                <div class="media-body">
                  <h5>Hirano Yuji</h5>
                  <p>Japan</p>
                </div>
               </div>
             </div>
            </div>
            <div class="item">
              <div class="testi-box">
               <div class="testi-dtls">
                 <a href="#" class="rating-star"><img src="{{ asset('marketingleadsenglishasset/img/star.png')}}" alt=""></a>
                 <a href="#" class="google-img"><img src="{{ asset('marketingleadsenglishasset/img/google.png')}}" alt=""></a>
                 <p>Most innovative company when it comes to packaging solutions for grains. Always setting the trend and delivering on time!</p>
               </div>
               <div class="testi-user media">
                <div class="media-left">
                  <span><img src="{{ asset('marketingleadsenglishasset/img/testi4.jpg')}}" class="media-object"></span>
                </div>
                <div class="media-body">
                  <h5>Stephane Cuchet</h5>
                  <p>Guatemala</p>
                </div>
               </div>
             </div>
            </div>
            <div class="item">
              <div class="testi-box">
               <div class="testi-dtls">
                 <a href="#" class="rating-star"><img src="{{ asset('marketingleadsenglishasset/img/star.png')}}" alt=""></a>
                 <a href="#" class="google-img"><img src="{{ asset('marketingleadsenglishasset/img/google.png')}}" alt=""></a>
                 <p>International markets specialist with very strong product offering</p>
               </div>
               <div class="testi-user media">
                <div class="media-left">
                  <span><img src="{{ asset('marketingleadsenglishasset/img/testi6.jpg')}}" class="media-object"></span>
                </div>
                <div class="media-body">
                  <h5>JJ Ndayisenga</h5>
                  <p>RTC, Rwanda</p>
                </div>
               </div>
             </div>
            </div>
            <!-- <div class="item">
              <div class="testi-box">
               <div class="testi-dtls">
                 <a href="#" class="rating-star"><img src="{{ asset('marketingleadsenglishasset/img/star.png')}}" alt=""></a>
                 <a href="#" class="google-img"><img src="{{ asset('marketingleadsenglishasset/img/google.png')}}" alt=""></a>
                 <p>International markets specialist with very strong product offering</p>
               </div>
               <div class="testi-user media">
                <div class="media-left">
                  <span><img src="{{ asset('marketingleadsenglishasset/img/testi6.jpg')}}" class="media-object"></span>
                </div>
                <div class="media-body">
                  <h5>Mohit Manocha</h5>
                  <p>India</p>
                </div>
               </div>
             </div>
            </div> -->
            <div class="item">
              <div class="testi-box">
               <div class="testi-dtls">
                 <a href="#" class="rating-star"><img src="{{ asset('marketingleadsenglishasset/img/star.png')}}" alt=""></a>
                 <a href="#" class="google-img"><img src="{{ asset('marketingleadsenglishasset/img/google.png')}}" alt=""></a>
                 <p>The service from Ecotact is great and the products are really good, The price is really great for such a good quality product</p>
               </div>
               <div class="testi-user media">
                <div class="media-left">
                  <span><img src="{{ asset('marketingleadsenglishasset/img/testi5.jpg')}}" class="media-object"></span>
                </div>
                <div class="media-body">
                  <h5>Carlos Menon</h5>
                  <p>Japan / Guatemala</p>
                </div>
               </div>
             </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <section class="contact-area" id="Contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center mb15">
        <h2 class="sub-header">Get In Touch</h2>
      </div>
      <div class="col-md-8 col-md-offset-2">

        <div id="submitMessage2"></div>
        <form class="contact-form" id="contact-form2" method="post" action="mail/contact.js">
          <div class="col-md-12 col-sm-12 mb15">
            <textarea class="form-control" id="conMessage2" rows="4" name="message" placeholder="Message"></textarea>
          </div>
          <div class="col-md-4 col-sm-12 mb15">
            <input type="text" class="form-control" id="conName2" name="name" placeholder="Full Name">
          </div>
          <div class="col-md-4 col-sm-12 mb15">
            <input type="text" class="form-control" id="conEmail2" name="email" placeholder="Email Address">
          </div>
          <div class="col-md-4 col-sm-12 mb15">
              <select class="form-control" id="conCountry2" name="country">
                <option value="">Country Select</option>
                <?php
                asort($countries);
                foreach($countries as $key => $value) {

                  ?>
                  <option value="<?= $value ?>"><?= htmlspecialchars($value) ?></option>
                  <?php
                  
                  }
                ?>
              </select>
          </div>
          <div class="col-md-12 text-center">
            <input type="button" id="contact-form-submit2" name="submit" value="Send" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</section> -->

<!-- Modal -->
<div class="modal fade mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" style="padding: 0;">
        <div class="banner-form-outer">
          <div class="banner-form" style="margin-top: 0;">
            <form class="contact-form" id="contact-form" method="post" action="mail/contact.js">
               <h3>Get A FREE Quote!</h3>
               <p>Feel free to contact Us! </p>
               <div class="form-group mb15">
                <input type="text" class="form-control" id="conName" name="name" placeholder="Full Name">
              </div>
              <div class="form-group mb15">
                <input type="text" class="form-control" id="conEmail" name="email" placeholder="Email Address">
              </div>
              <div class="form-group mb15">
                <input type="text" class="form-control" id="conCompanyName" name="companyname" placeholder="Company Name">
              </div>
              <div class="form-group">
                <select class="form-control" id="conProducts" name="products[]" data-placeholder="Choose a Product..." >
                    
                  <?php
                  
                  foreach($products as $key => $value) {
                    ?>
                    <option value="<?= $value ?>"><?= htmlspecialchars($value) ?></option>
                    <?php
                    }
                  ?>
                </select>
              </div>
              <div class="form-group mb15">
                <select class="form-control" id="conCountry1" name="country">
                <option value="">Country Select</option>
                  <?php
                  asort($countries);
                  foreach($countries as $key => $value) {

                    ?>
                    <option value="<?= $value ?>"><?= htmlspecialchars($value) ?></option>
                    <?php
                    
                    }
                  ?>
                </select>
              </div>
              <div class="form-group mb15">
                <textarea class="form-control" id="conMessage" rows="4" name="message" placeholder="Message"></textarea>
              </div>
              <div class="form-group mb0">
                <input type="button" id="contact-form-submit" name="submit" value="Send" class="btn btn-primary">
                <!-- <a href="https://api.whatsapp.com/send?phone=918448848948" target="_blank" class="btn btn-primary whatsapp-btn"><i class="lab la-whatsapp"></i></a> -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('landing.footer')