@extends('layouts.new_landing_layout')
@section('content')


<style type="text/css">
  .footer-area .fot-box h4{
    color:#5e5e5e;
  }
  .footer-area .below-footer .other-links ul li a{
    color:#5e5e5e;
  }
  h4.text-pink{
    font-size: 16px;
  }
  .one-item-meat .only-show-titel h4{
    font-size: 16px;
  }
  .owl-stage-outer{
	  height: 600px;
  }
  .item-detls{
    width:288px;
  }
  .only-show-titel{
    width:288px;    
  }
  .modal-title{
    display: inline-block;
  }
  .modal-inquary-form{
    padding: 40px 15px 40px 15px;
    /*background-color: #fff;*/
  }
  .modal-inquary-form input:focus-visible {
    outline: none;
  }
  .modal-inquary-form .close-button-align{
    position: absolute;
    top: 5px;
    right: 9px;
  }
  .meat-inquary-form input:focus-visible {
    outline: none;
  }
  .manage-padding{
    padding-left: 0;
    padding-top: 50px;
  }
  @media only screen and (max-width : 768px) {
    .item-detls{
        width:240px;
    }
    .only-show-titel{
        width:240px;    
    }
    .owl-stage-outer{
      height: 615px;
    }
    .one-item-meat .full-show .item-image img{
      top: -26px;
    }
    .one-item-meat .full-show .item-image img.extra-style{
      width: 270px;
      left: 0
    }
  }
</style>

<div class="banner inner-banner meat-cheese-banner">
  <div class="mobile-overlay"></div>
  <div class="left-text-area">
    <span class="leafe-img"><img src="{{asset('assets/front/img/leafe.png')}}" alt=""></span>
  </div>
  <div class="right-slider-area">
    <div id="meat-slider"  class="owl-carousel">
      <div class="item">
        <img src="{{asset('assets/front/img/cheese.webp')}}" alt="" class="img-responsive">
      </div>
      <div class="item">
        <img src="{{asset('assets/front/img/row-meat.webp')}}" alt="" class="img-responsive">
      </div> 
      <div class="item">
        <img src="{{asset('assets/front/img/veg.webp')}}" alt="" class="img-responsive">
      </div>
      <!-- <div class="item">
        <img src="{{asset('assets/front/img/meat.jpg')}}" alt="" class="img-responsive">
      </div> -->
    </div>
  </div>
  <div class="meat-banner-text">
    <div class="banner-content">
      <div class="container">
        <div class="banner-text">
          <!-- <h1>We’re Keeping <br> It Fresh!</h1> -->
          <svg viewBox="0 0 495 272" xmlns="http://www.w3.org/2000/svg" style="position: absolute;">
            <defs>
            </defs>
              <text x="10" y="140"><h1 id="myText" style="color:#fff !important;"></h1></text> 
          </svg>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="section meat-body-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb30">
        <div class="about-text story-text text-center mb30" data-aos="fade-up">
          <h3 class="mb15 text-pink"> Hermetic Fresh Food Packaging</h3>
          <p>Ecotact has been spreading the message of freshness and sustainability since its inception in 2005. Enjoying farm-fresh grains shouldn't come at the cost of destroying the Earth. So with eco-friendly technologies and processes, we strive to create reliable products sustainably for the world.</p>
          <p>With our unmatched expertise in Hermetic Packaging and Storage Solutions, we want to extend the same into your kitchens too! This is why Ecotact is now unveiling hermetic packaging for fresh and frozen food!</p>
          <p>Ecotact’s multilayered packaging keeps your food fresh no matter the transit period, all while preserving the products from oxidation, microbial infestation, vitamin loss and much more. Our packaging is committed to keeping sensitive minerals & fiber content intact so that you receive the healthiest nourishment always.</p>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-12">
        <div class="big-center-slider">
          <div id="main-meat-slider" class="owl-carousel" data-aos="fade-up">
            <div class="item">
              <div class="one-item-meat">
                <div class="full-show">
                  <span class="item-image"><img src="{{asset('assets/front/img/item-image4.webp')}}" alt=""></span>
                  <div class="item-titel">
                    <h3 class="text-pink">ECOMAP</h3>
                    <h4 class="text-pink">Modified Atmosphere Packaging</h4>
                  </div>
                  <div class="item-detls">
                    <p>Our ECOMAP packaging prevents oxidation of the packed food which significantly extends its shelf life. This is a result of the atmosphere inside the flexible or rigid films of our packaging which is modified by drawing a vacuum and flushing it with gas (typically nitrogen).</p>
                    <a href="#enquire" class="btn btn-primary">Enquire Now</a>
                  </div>
                </div>
                <div class="only-show-titel">
                  <h3 class="text-pink">ECOMAP</h3>
                  <h4 class="">Changing Packaging, One Step At a Time</h4>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="one-item-meat">
                <div class="full-show">
                  <span class="item-image"><img src="{{asset('assets/front/img/item-image2.webp')}}" alt=""></span>
                  <div class="item-titel">
                    <h3 class="text-pink">ECOFORM</h3>
                    <h4 class="text-pink">Thermoforming</h4>
                  </div>
                  <div class="item-detls">
                    <p>ECOFORM packaging is durable, resilient, and tamper-resistant. Not only that, its ability to take the shape of the product and the design flexibility provides extra protection and attractive packaging! Ecotact’s films are made of PA and EVOH to achieve the best barrier performance.</p>
                    <a href="#enquire" class="btn btn-primary">Enquire Now</a>
                  </div>
                </div>
                <div class="only-show-titel">
                  <h3 class="text-pink">ECOFORM</h3>
                  <h4 class="">Molding Sustainability with Packaging</h4>
                </div>
              </div>
            </div> 
            <div class="item">
              <div class="one-item-meat">
                <div class="full-show">
                  <span class="item-image"><img src="{{asset('assets/front/img/item-image1.webp')}}" alt=""></span>
                  <div class="item-titel">
                    <h3 class="text-pink">ECOBARR</h3>
                    <h4 class="text-pink">Vertical Form Fill and Seal</h4>
                  </div>
                  <div class="item-detls">
                    <p>The simplicity and the minimalism of the ECOBARR PA/EVOH packaging make it an attractive choice. The PA and EVOH films provide a high barrier protection and help retain and preserve the taste, aroma, flavor, color, and texture of dry, frozen, or liquid products.</p>
                    <a href="#enquire" class="btn btn-primary">Enquire Now</a>
                  </div>
                </div>
                <div class="only-show-titel">
                  <h3 class="text-pink">ECOBARR</h3>
                  <h4 class="">Protected at All Costs!</h4>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="one-item-meat">
                <div class="full-show">
                  <span class="item-image"><img src="{{asset('assets/front/img/item-image5.webp')}}" class="extra-style" alt=""></span>
                  <div class="item-titel">
                    <h3 class="text-pink">ECOMPOST</h3>
                    <h4 class="text-pink">Compostable Food Bags</h4>
                  </div>
                  <div class="item-detls">
                    <p>ECOMPOST compostable packaging films marry the best of both worlds for your plate and the planet. They imitate the constructive qualities of durability, protection, and shelf-life stability just like any conventional plastic but with one major difference – it is fully compostable!</p>
                    <a href="#enquire" class="btn btn-primary">Enquire Now</a>
                  </div>
                </div>
                <div class="only-show-titel">
                  <h3 class="text-pink">ECOMPOST</h3>
                  <h4 class="">The Best of Both Worlds!</h4>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="one-item-meat">
                <div class="full-show">
                  <span class="item-image"><img src="{{asset('assets/front/img/item-image3.webp')}}" alt=""></span>
                  <div class="item-titel">
                    <h3 class="text-pink">COMPOSTABLE HEAT SHRINK FILM</h3>
                    <h4 class="text-pink">Shrinkable Films</h4>
                  </div>
                  <div class="item-detls">
                    <p>Ecotact compostable heat shrink films have multiple benefits for you and the earth! They offer flexibility, strength, composability, and illustration capability. These eco-friendly corn-based shrink films boast of the added benefit of having a zero carbon footprint.</p>
                    <a href="#enquire" class="btn btn-primary">Enquire Now</a>
                  </div>
                </div>
                <div class="only-show-titel">
                  <h3 class="text-pink">COMPOSTABLE HEAT SHRINK FILM</h3>
                  <h4 class="">Eco-friendly Film For All Needs!</h4>
                </div>
              </div>
            </div>
          </div>
          <div id="enquire"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section meat-inquary-form" data-aos="fade-up">
  <span class="form-top-image"><img src="{{asset('assets/front/img/form-top-image.jpg')}}"></span>
  <span class="form-below-image"><img src="{{asset('assets/front/img/form-below-image.jpg')}}"></span>
  <div class="container">
    <div class="row">
      <form action="{{route('landingEnquiry')}}" method="post" id="enquiry-form">
        <div class="col-md-8 col-sm-12">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="from-group mb15">
                <input type="text" class="from-control" name="name"  id="name" placeholder="Name *" required>
              </div>
              <div class="from-group mb15">
                <input type="text" class="from-control" name="company_name" id="company_name" placeholder="Company Name *" required>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="from-group mb15">
                <input type="text" class="from-control" name="email" id="email" placeholder="Email *" required>
              </div>
              <div class="from-group mb15">
                <input type="text" class="from-control" id="country" name="country" placeholder="Country *" required>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 mt15">
              <p class="text-white mb15">Products interested in: *</p>
              <div class="custom-check-box">
                <input id="checkize" type="checkbox" value="ECOMAP" name="products[]"> 
                <label for="checkize" class="">
                  <span class="check find_chek"></span>
                  <span class="box W25 boxx"></span>
                  <h6 class="text-white">ECOMAP</h6>
                </label>
              </div>
              <div class="custom-check-box">
                <input id="checkize1" type="checkbox" value="ECOFORM" name="products[]"> 
                <label for="checkize1" class="">
                  <span class="check find_chek"></span>
                  <span class="box W25 boxx"></span>
                  <h6 class="text-white">ECOFORM</h6>
                </label>
              </div>
              <div class="custom-check-box">
                <input id="checkize2" type="checkbox" value="ECOBARR" name="products[]"> 
                <label for="checkize2" class="">
                  <span class="check find_chek"></span>
                  <span class="box W25 boxx"></span>
                  <h6 class="text-white">ECOBARR</h6>
                </label>
              </div>
              <div class="custom-check-box">
                <input id="checkize3" type="checkbox" value="ECOMPOST" name="products[]"> 
                <label for="checkize3" class="">
                  <span class="check find_chek"></span>
                  <span class="box W25 boxx"></span>
                  <h6 class="text-white">ECOMPOST</h6>
                </label>
              </div>
              <div class="custom-check-box">
                <input id="checkize4" type="checkbox" value="COMPOSTABLE HEAT SHRINK FILM" name="products[]"> 
                <label for="checkize4" class="">
                  <span class="check find_chek"></span>
                  <span class="box W25 boxx"></span>
                  <h6 class="text-white">COMPOSTABLE HEAT SHRINK FILM</h6>
                </label>
              </div>
            </div>
          </div>
          @csrf
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="manage-top-padd">
            <div class="custom-check-box">
              <input id="checkize5" type="checkbox" name="agree"  required> 
              <label for="checkize5" class="">
                <span class="check find_chek"></span>
                <span class="box W25 boxx"></span>
                <h6 class="text-white">I accept terms & conditions *</h6>
              </label>
            </div>
            <!-- <button type="submit" class="btn btn-primary ml40" id="e-brochure">Enquiry Now</button> -->
            <a onclick="test();" class="btn btn-primary ml40">Enquiry Now</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- <a href="#enquire" class="brochure-btn btn-primary2" id="download-e-brochure">Download E-Brochure  </a> -->
<a href="#enquire" class="brochure-btn btn-primary2" data-toggle="modal" data-target="#exampleModal">Download E-Brochure  </a>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:4px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body modal-inquary-form meat-inquary-form" style="overflow: hidden;">
        <button type="button" class="close close-button-align" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form action="{{route('landingEnquiry')}}" method="post" id="enquiry-form1">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="from-group mb15">
                  <input type="text" class="from-control" name="name"  id="name1" placeholder="Name *" required>
                </div>
                <div class="from-group mb15">
                  <input type="text" class="from-control" name="company_name" id="company_name1" placeholder="Company Name *" required>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="from-group mb15">
                  <input type="text" class="from-control" name="email" id="email1" placeholder="Email *" required>
                </div>
                <div class="from-group mb15">
                  <input type="text" class="from-control" id="country1" name="country" placeholder="Country *" required>
                </div>
              </div>
              @csrf
              <div class="col-md-12 col-sm-12 mt15">
                <p class="text-white mb15">Products interested in: *</p>
                <div class="custom-check-box">
                  <input id="checkize01" type="checkbox" value="ECOMAP" name="products[]"> 
                  <label for="checkize01" class="">
                    <span class="check find_chek"></span>
                    <span class="box W25 boxx"></span>
                    <h6 class="text-white">ECOMAP</h6>
                  </label>
                </div>
                <div class="custom-check-box">
                  <input id="checkize02" type="checkbox" value="ECOFORM" name="products[]"> 
                  <label for="checkize02" class="">
                    <span class="check find_chek"></span>
                    <span class="box W25 boxx"></span>
                    <h6 class="text-white">ECOFORM</h6>
                  </label>
                </div>
                <div class="custom-check-box">
                  <input id="checkize03" type="checkbox" value="ECOBARR" name="products[]"> 
                  <label for="checkize03" class="">
                    <span class="check find_chek"></span>
                    <span class="box W25 boxx"></span>
                    <h6 class="text-white">ECOBARR</h6>
                  </label>
                </div>
                <div class="custom-check-box">
                  <input id="checkize04" type="checkbox" value="ECOMPOST" name="products[]"> 
                  <label for="checkize04" class="">
                    <span class="check find_chek"></span>
                    <span class="box W25 boxx"></span>
                    <h6 class="text-white">ECOMPOST</h6>
                  </label>
                </div>
                <div class="custom-check-box">
                 <input id="checkize05" type="checkbox" value="COMPOSTABLE HEAT SHRINK FILM" name="products[]"> 
                  <label for="checkize05" class="">
                    <span class="check find_chek"></span>
                    <span class="box W25 boxx"></span>
                    <h6 class="text-white">COMPOSTABLE HEAT SHRINK FILM</h6>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="manage-top-padd manage-padding">
              <div class="custom-check-box">
                <input id="checkize06" type="checkbox"> 
                <label for="checkize06" class="">
                  <span class="check find_chek"></span>
                  <span class="box W25 boxx"></span>
                  <h6 class="text-white">I accept terms & conditions *</h6>
                </label>
              </div>
              <!-- <button type="submit" class="btn btn-primary ml40" id="e-brochure">Enquiry Now</button> -->
            </div>
          </div>
          <div class="col-md-12"><hr></div>
          <div class="col-md-12">
              <input type="hidden" name="downloud" value="1">
           <a onclick="test2();" class="btn btn-primary ml40">Download E-Brochure</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>

function test(){
    if ($("#enquiry-form input:checkbox:checked").length > 0 ){
        var valid = true;
        if (!$('#name').val()) {
            toastr.error('Name Fields Are Required');
        }else if (!$('#company_name').val()) {
            toastr.error('Company Name Fields Are Required');
        }else if (!$('#email').val()) {
            toastr.error('Email Fields Are Required');
        }else if (!$('#country').val()) {
            toastr.error('Country Fields Are Required');
        }else{
            $('#enquiry-form').submit();
        }
      
    }else{
        toastr.error('All Fields Are Required');
    }
}
function test2(){
    if ($("#enquiry-form1 input:checkbox:checked").length > 0 ){
        var valid = true;
        if (!$('#name1').val()) {
            toastr.error('Name Fields Are Required');
        }else if (!$('#company_name1').val()) {
            toastr.error('Company Name Fields Are Required');
        }else if (!$('#email1').val()) {
            toastr.error('Email Fields Are Required');
        }else if (!$('#country1').val()) {
            toastr.error('Country Fields Are Required');
        }else{
            $('#enquiry-form1').submit();
        }
      
    }else{
        toastr.error('All Fields Are Required');
    }
}
      
    
</script>

@stop