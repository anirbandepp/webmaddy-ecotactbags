@extends('layouts.new_frontlayout')
@if(config('app.lang')->slug == 'en' || config('app.lang')->slug == 'in')
  @section('title', 'About Us | Green Coffee Bag Manufacturers | Envases Para Cafe')
  @section('description', 'As coffee bag manufacturer, we offer bolsas para sellar al vacio, 9-layer hermetic storage & packaging for green coffee and other grains to keep the freshness intact.')
  @section('keywords', 'coffee bag manufacturers,bolsas para sellar al vacio,envases para cafe')
@elseif(config('app.lang')->slug == 'sp')
  @section('title', 'About Us | Green Coffee Bag Manufacturers | Envases Para Cafe')
  @section('description', 'As coffee bag manufacturer, we offer bolsas para sellar al vacio, 9-layer hermetic storage & packaging for green coffee and other grains to keep the freshness intact.')
  @section('keywords', 'coffee bag manufacturers,bolsas para sellar al vacio,envases para cafe')

@endif


@section('content')

<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/about-us.png')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">{!! __('about.aboutUs')!!}</span>
        <h1>{!! __('about.Foc')!!}</h1>
      </div>
    </div>
  </div>
</div>

<section class="section about-section">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center">
        <div class="common-header mb30">
          <h2>{!! __('about.ourStory')!!}</h2>
        </div>
      </div>
      <div class="col-md-10 col-md-offset-1">
        <div class="row">
          <div class="col-md-12 text-center mb50">
            <div class="about-text story-text mb30">
              <p>{!! __('about.ourStoryTxt')!!}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="story-video">
          <video autoplay muted loop id="myVideo">
            <source src="{{asset('assets/front/img/Ecotact Corporate AV_ English.mp4')}}" type="video/mp4">
          </video>
        </div>
      </div>
      <div class="col-md-6">
        <div class="about-text mb30">
          <h2>{!! __('about.Trust')!!}</h2>
          <p>{!! __('about.TrustTxt')!!}</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="about-text mb30">
          <h2>{!! __('about.Value')!!}</h2>
          <p>{!! __('about.valueTxt')!!}</p>
          <a href="{{route('sustainablity')}}" class="btn btn-primary">{!! __('about.Our Recycling Solutions')!!}</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section about-md bg-graw">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center">
        <div class="common-header mb30">
          <h4>MANAGEMENT</h4>
          <h2>Leading with care</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="team-project">
          <div class="grid-item">
            <div class="item-boxes" data-aos="fade-up" data-aos-delay="200">
              <a href="" data-toggle="modal" data-target="#myModal55">
                <div class="slideshow-block img">
                    <ul class="slides">
                      <li>
                        <img src="{{asset('assets/front/img/hanuman1.jpg')}}" class="img-responsive" alt="">
                      </li>
                      <li>
                        <img src="{{asset('assets/front/img/hanuman2.jpg')}}" class="img-responsive" alt="">
                      </li>
                      <li>
                        <img src="{{asset('assets/front/img/hanuman3.jpg')}}" class="img-responsive" alt="">
                      </li> 
                    <ul>
                </div>
                <div class="overlay-mem">
                  <span>
                    <h4 class="pre_title">Hanuman Jain,</h4>
                    <p class="text-white">Founder & Chief Executive Officer (CEO)</p>
                    <p class="btn-green">Read more <i class="las la-arrow-up"></i></p>
                  </span>
                </div>
              </a>
            </div>
          </div>
          <div class="grid-item">
              <div class="item-boxes">
                <a href="" data-toggle="modal" data-target="#myModal5">
                  <div class="slideshow-block6 img">
                    <ul class="slides">
                      <li>
                        <img src="{{asset('assets/front/img/nagraj1.jpg')}}" class="img-responsive" alt="">
                      </li>
                      <li>
                        <img src="{{asset('assets/front/img/nagraj2.jpg')}}" class="img-responsive" alt="">
                      </li>
                    <ul>
                  </div>
                  <div class="overlay-mem">
                    <span>
                      <h4 class="pre_title">Nagraj Jain,</h4>
                      <p class="text-white">Chairman</p>
                      <p class="btn-green">Read more <i class="bi bi-arrow-up-right"></i></p>
                    </span>
                  </div>
                  <!-- <div class="item-text mb30">
                    <h4 class="pre_title text-orange"><span class="bg-white">Pragati Jain,</span></h4>
                    <p>Director of Sales</p>
                  </div> -->
                </a>
              </div>
            </div>
          <div class="grid-item">
            <div class="item-boxes" data-aos="fade-up" data-aos-delay="200">
              <a href="" data-toggle="modal" data-target="#myModal1">
                <div class="slideshow-block2 img">
                  <ul class="slides">
                    <li>
                      <img src="{{asset('assets/front/img/navneet1.jpg')}}" class="img-responsive" alt="">
                    </li>
                    <li>
                      <img src="{{asset('assets/front/img/navneet2.jpg')}}" class="img-responsive" alt="">
                    </li>
                    <li>
                      <img src="{{asset('assets/front/img/navneet3.jpg')}}" class="img-responsive" alt="">
                    </li> 
                  <ul>
                </div>
                <div class="overlay-mem">
                  <span>
                    <h4 class="pre_title">Navneet Jain,</h4>
                    <p class="text-white">Chief Financial Officer (CFO) & Director of Exports</p>
                    <p class="btn-green">Read more <i class="las la-arrow-up"></i></p>
                  </span>
                </div>
              </a>
            </div>
          </div>
          <div class="grid-item">
            <div class="item-boxes" data-aos="fade-up" data-aos-delay="200">
              <a href="" data-toggle="modal" data-target="#myModal2">
                <div class="slideshow-block3 img">
                  <ul class="slides">
                    <li>
                      <img src="{{asset('assets/front/img/karishma1.jpg')}}" class="img-responsive" alt="">
                    </li>
                    <li>
                      <img src="{{asset('assets/front/img/karishma2.jpg')}}" class="img-responsive" alt="">
                    </li>
                    <li>
                      <img src="{{asset('assets/front/img/karishma3.jpg')}}" class="img-responsive" alt="">
                    </li> 
                  <ul>
                </div>
                <div class="overlay-mem">
                  <span>
                    <h4 class="pre_title">Karishma Sharma,</h4>
                    <p class="text-white">Chief Marketing Officer (CMO) & Director of Business Strategy</p>
                    <p class="btn-green">Read more <i class="las la-arrow-up"></i></p>
                  </span>
                </div>
              </a>
            </div>
          </div>
          <div class="grid-item">
            <div class="item-boxes" data-aos="fade-up" data-aos-delay="200">
              <a href="" data-toggle="modal" data-target="#myModal3">
                <div class="slideshow-block4 img">
                  <ul class="slides">
                    <li>
                      <img src="{{asset('assets/front/img/naman1.jpg')}}" class="img-responsive" alt="">
                    </li>
                    <li>
                      <img src="{{asset('assets/front/img/naman2.jpg')}}" class="img-responsive" alt="">
                    </li>
                    <li>
                      <img src="{{asset('assets/front/img/naman3.jpg')}}" class="img-responsive" alt="">
                    </li> 
                  <ul>
                </div>
                <div class="overlay-mem">
                  <span>
                    <h4 class="pre_title">Naman Jain,</h4>
                    <p class="text-white">Director of Business Development & Sustainability</p>
                    <p class="btn-green">Read more <i class="las la-arrow-up"></i></p>
                  </span>
                </div>
              </a>
            </div>
          </div>
          <div class="grid-item">
              <div class="item-boxes">
                <a href="" data-toggle="modal" data-target="#myModal6">
                  <div class="slideshow-block7 img">
                    <ul class="slides">
                      <li>
                        <img src="{{asset('assets/front/img/himanshu1.jpg')}}" class="img-responsive" alt="">
                      </li>
                      <li>
                        <img src="{{asset('assets/front/img/himanshu2.jpg')}}" class="img-responsive" alt="">
                      </li>
                      <li>
                        <img src="{{asset('assets/front/img/himanshu3.jpg')}}" class="img-responsive" alt="">
                      </li>
                    <ul>
                  </div>
                  <div class="overlay-mem">
                    <span>
                      <h4 class="pre_title">Himanshu Baid,</h4>
                      <p class="text-white">Director of Procurement and International Sales</p>
                      <p class="btn-green">Read more <i class="bi bi-arrow-up-right"></i></p>
                    </span>
                  </div>
                  <!-- <div class="item-text mb30">
                    <h4 class="pre_title text-orange"><span class="bg-white">Pragati Jain,</span></h4>
                    <p>Director of Sales</p>
                  </div> -->
                </a>
              </div>
            </div>
          <div class="grid-item">
            <div class="item-boxes" data-aos="fade-up" data-aos-delay="200">
              <a href="" data-toggle="modal" data-target="#myModal4">
                <div class="slideshow-block5 img">
                  <ul class="slides">
                    <li>
                      <img src="{{asset('assets/front/img/pragati1.jpg')}}" class="img-responsive" alt="">
                    </li>
                    <li>
                      <img src="{{asset('assets/front/img/pragati2.jpg')}}" class="img-responsive" alt="">
                    </li>
                    <li>
                      <img src="{{asset('assets/front/img/pragati3.jpg')}}" class="img-responsive" alt="">
                    </li> 
                  <ul>
                </div>
                <div class="overlay-mem">
                  <span>
                    <h4 class="pre_title">Pragati Jain,</h4>
                    <p class="text-white">Director of Sales</p>
                    <p class="btn-green">Read more <i class="las la-arrow-up"></i></p>
                  </span>
                </div>
              </a>
            </div>
          </div>
          
            
        </div>
      </div>
    </div>
  </div>
</section>
{{-- <section class="section funded-section leading-care pt0">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="funded-bg">
          <div class="row">
            <div class="col-md-12 text-center">
              <div class="funded-head mb50">
                <p class="green-color mb5">{!! __('about.MANAGEMENT')!!}</p>
                <h2 class="black-color">{!! __('about.led')!!}</h2>
              </div>
            </div>
            <div class="col-md-4 col-sm-12 text-center">
              <div class="funded-info mb20">
                <img src="{{asset('assets/front/img/about-man1.png')}}" alt="ecotactbags" class="about-man-image mb20">
                <p>"{!! __('about.ledTxt')!!}"</p>
                <h2>Hanuman Jain</h2>
                <span class="mb10 black-color">CEO</span>
              </div>
            </div>
            <div class="col-md-4 col-sm-12 text-center">
              <div class="funded-info mb20">
                <img src="{{asset('assets/front/img/about-man2.png')}}" alt="ecotactbags" class="about-man-image mb20">
                <p>"{!! __('about.ledTxt2')!!}"</p>
                <h2>Navneet Jain</h2>
                <span class="mb10 black-color">{!! __('about.role2')!!}</span>
              </div>
            </div>
            <div class="col-md-4 col-sm-12 text-center">
              <div class="funded-info">
                <img src="{{asset('assets/front/img/about-man3.png')}}" alt="ecotactbags" class="about-man-image mb20">
                <p>"{!! __('about.ledTxt3')!!}"</p>
                <h2>Himanshu Baid</h2>
                <span class="mb10 black-color">{!! __('about.role3')!!}</span>
              </div>
            </div>
            <div class="col-md-4 col-sm-12 text-center">
              <div class="funded-info">
                <img src="{{asset('assets/front/img/nagraj1.jpg')}}" alt="ecotactbags" class="about-man-image mb20">
                <p>"{!! __('about.ledTxt3')!!}"</p>
                <h2>Nagraj Jain</h2>
                <span class="mb10 black-color">{!! __('about.role4')!!}</span>
              </div>
            </div>
            <div class="col-md-4 col-sm-12 text-center">
              <div class="funded-info">
                <img src="{{asset('assets/front/img/himanshu1.jpg')}}" alt="ecotactbags" class="about-man-image mb20">
                <p>"{!! __('about.ledTxt3')!!}"</p>
                <h2>Himanshu Baid</h2>
                <span class="mb10 black-color">{!! __('about.role5')!!}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}


<section class="section about-section pb0">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <div class="about-text mb50 pt0">
              <h2 class="mb30">{!! __('about.infa')!!}</h2>
              <p>{!! __('about.infaTxt')!!}</p>
            </div>
          </div>
          <div class="col-md-5 col-md-offset-1 mb50">
            <div class="about-image">
              <img src="{{asset('assets/front/img/about2.png')}}" class="img-responsive" alt="ecotactbags">
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="gap-70"></div>
          <div class="col-md-5 mb30">
            <div class="about-image">
              <img src="{{asset('assets/front/img/about3.png')}}" class="img-responsive" alt="ecotactbags">
            </div>
          </div>
          <div class="col-md-6 col-md-offset-1">
            <div class="about-text mb30 pt0">
              <h2 class="mb30">{!! __('about.quali')!!}</h2>
              <p></p>{!! __('about.qualiTxt')!!}</p>
              <div class="market-logos pt15">
                <li><img src="{{asset('assets/front/img/Frame1.svg')}}" alt="ecotactbags"></li>
                <li><img src="{{asset('assets/front/img/brc-logo.png')}}" alt="ecotactbags"></li>
                <li><img src="{{asset('assets/front/img/image-3.svg')}}" alt="ecotactbags"></li>
                <li>
                  <a href="{{asset('assets/front/img/big-image1.jpeg')}}" data-fancybox="images">
                    <img src="{{asset('assets/front/img/big-image1.jpeg')}}" alt="ecotactbags"/>
                  </a>

                  <a href="{{asset('assets/front/img/big-image2.jpeg')}}" data-fancybox="images">
                    <img src="{{asset('assets/front/img/big-image2.jpeg')}}" alt="ecotactbags"/>
                  </a>
                </li>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section bg-graw">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center">
        <div class="common-header mb30">
          <h2>Our Workspace</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mt30 workspace-slider-image">
        <div id="workspace-slider"  class="owl-carousel">
          <div class="item">
            <a href="{{asset('assets/front/img/our-workspace.jpg')}}" data-fancybox="images1">
              <img src="{{asset('assets/front/img/our-workspace.jpg')}}" />
            </a>
          </div>
          <div class="item">
            <a href="{{asset('assets/front/img/our-workspace2.jpg')}}" data-fancybox="images1">
              <img src="{{asset('assets/front/img/our-workspace2.jpg')}}" />
            </a>
          </div>
          <div class="item">
            <a href="{{asset('assets/front/img/our-workspace3.jpg')}}" data-fancybox="images1">
              <img src="{{asset('assets/front/img/our-workspace3.jpg')}}" />
            </a>
          </div>
          <div class="item">
            <a href="{{asset('assets/front/img/our-workspace4.jpg')}}" data-fancybox="images1">
              <img src="{{asset('assets/front/img/our-workspace4.jpg')}}" />
            </a>
          </div> 
          <div class="item">
            <a href="{{asset('assets/front/img/our-workspace5.jpg')}}" data-fancybox="images1">
              <img src="{{asset('assets/front/img/our-workspace5.jpg')}}" />
            </a>
          </div> 
          <div class="item">
            <a href="{{asset('assets/front/img/our-workspace6.jpg')}}" data-fancybox="images1">
              <img src="{{asset('assets/front/img/our-workspace6.jpg')}}" />
            </a>
          </div> 
          <div class="item">
            <a href="{{asset('assets/front/img/our-workspace7.jpg')}}" data-fancybox="images1">
              <img src="{{asset('assets/front/img/our-workspace7.jpg')}}" />
            </a>
          </div> 
          <div class="item">
            <a href="{{asset('assets/front/img/our-workspace8.jpg')}}" data-fancybox="images1">
              <img src="{{asset('assets/front/img/our-workspace8.jpg')}}" />
            </a>
          </div> 
          <div class="item">
            <a href="{{asset('assets/front/img/our-workspace9.jpg')}}" data-fancybox="images1">
              <img src="{{asset('assets/front/img/our-workspace9.jpg')}}" />
            </a>
          </div> 
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Modal -->
<div class="modal right fade" id="myModal55" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <i class="las la-times-circle" data-dismiss="modal" aria-label="Close"></i>
      <div class="modal-body no-padding">
        <div class="modal-grid">
          <div class="items items-green">
            <img src="{{asset('assets/front/img/about-man1.jpg')}}" class="img-responsive" alt="">
          </div>
          <div class="items">
            <h3 class="pre_title text-orange"><span class="bg-white">Hanuman Jain,</span></h3>
            <p><strong>Founder & Chief Executive Officer (CEO)</strong></p>
            <p>As the Founder and CEO of Ecotact, Hanuman Jain has served almost 20 years building a rock-solid empire in the packaging industry. Mr. Jain comes with a strong background in finance & marketing which has helped him become the mastermind behind Ecotact and its massive global expansion. Apart from being a successful leader & a business magnate, he is an adventure enthusiast and a globe trotter. His curiosity and love for various cultures have turned him into a polyglot. If you’re Spanish, French, Nepali, or an Indian (Bengali, Hindi, and Marwari), Mr. Jain can definitely spark a conversation with his gregarious persona. </p>
            <p>His sense of discipline stems from his love for fitness. He is a “sportsman at heart” who enjoys cricket & yoga. A lesser-known fact about Mr. Jain is his aspiration to take to the skies with professional pilot training someday.</p>
            <h4 class="connect-head">Connect at</h4>
            <div class="clear-fix"></div>
            <a href="linkedin.com/in/hanumanjainindia"><i class="lab la-linkedin-in linkdin-icon"></i></a>
          </div>
        </div>
      </div>

    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- Modal -->
<div class="modal right fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <i class="las la-times-circle" data-dismiss="modal" aria-label="Close"></i>
      <div class="modal-body no-padding">
        <div class="modal-grid">
          <div class="items items-green">
            <img src="{{asset('assets/front/img/about-man2.jpg')}}" class="img-responsive">
          </div>
          <div class="items">
            <h3 class="pre_title text-orange"><span class="bg-white">Navneet Jain,</span></h3>
            <p><strong>Chief Financial Officer (CFO) & Director of Exports</strong></p>
            <p>Mr. Navneet Jain is the face of Ecotact’s financial services. He is the expert on inbound & outbound shipments and also heads the planning & management at Ecotact. He is a finance visionary who has a Master's degree in International Business. In his leisure time, Mr. Jain enjoy's his music and with his inclination toward travelling, he aspires to be a globetrotter someday. He believes in living a disciplined and healthy lifestyle which keeps him optimistic & clear-headed. He is multilingual and is found to be fluent in English, Hindi, Bengali, and Marwari.</p>
            <h4 class="connect-head">Connect at</h4>
            <div class="clear-fix"></div>
            <a href="https://www.linkedin.com/in/navneet-jain-5459381b0/"><i class="lab la-linkedin-in linkdin-icon"></i></a>
          </div>
        </div>
      </div>

    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- Modal -->
<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <i class="las la-times-circle" data-dismiss="modal" aria-label="Close"></i>
      <div class="modal-body no-padding">
        <div class="modal-grid">
          <div class="items items-green">
            <img src="{{asset('assets/front/img/about-man3.jpg')}}" class="img-responsive">
          </div>
          <div class="items">
            <h3 class="pre_title text-orange"><span class="bg-white">Karishma Sharma,</span></h3>
            <p><strong>Chief Marketing Officer (CMO) & Director of Business Strategy</strong></p>
            <p>Karishma is the face of Ecotact in the global market. She supervises the corporate and marketing plans by setting them in place, mapping them out & implementing them sharply. Being the self-proclaimed “nerd of Ecotact”, she ensures everything from Ecotact’s reputation to the brand’s marketing actions are at the top-most level. Her specialization in Digital & Social Media Marketing makes her an accomplished contributor in accelerating the company’s marketing strategy & brand awareness around the globe.</p>
            <p>Karishma is an epicurean at heart & a coffee enthusiast who enjoys food blogging. On the other hand, she is very passionate about staying fit & energetic. As a philanthropist & a leader who believes in advocating for women in leadership roles, she has been a role model to many. Her keen eye for detail makes her inquisitive and witty.  Karishma also aims to be an author of a book on marketing someday.</p>
            <h4 class="connect-head">Connect at</h4>
            <div class="clear-fix"></div>
            <a href="linkedin.com/in/karisharma"><i class="lab la-linkedin-in linkdin-icon"></i></a>

          </div>
        </div>
      </div>

    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- Modal -->
<div class="modal right fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <i class="las la-times-circle" data-dismiss="modal" aria-label="Close"></i>
      <div class="modal-body no-padding">
        <div class="modal-grid">
          <div class="items items-green">
            <img src="{{asset('assets/front/img/about-man4.jpg')}}" class="img-responsive">
          </div>
          <div class="items">
            <h3 class="pre_title text-orange"><span class="bg-white">Naman Jain,</span></h3>
            <p><strong>Director of Business Development & Sustainability</strong></p>
            <p>Naman is the man behind driving Ecotact’s vision ahead. He is a catalyst in building the brand through exceptional product innovation and purpose-driven initiatives. He has a green thumb and works to enhance Ecotact’s sustainability initiatives in the industry. With a Master’s degree in Supply Chain Management and a Lean Six Sigma yellow belt certification, he gravitates toward strong business development. Naman is an adrenaline junkie who loves trekking, spending time in the mountains and aspires to be a certified skydiver someday. When it comes to music, one will always find him rooting for his favourite band, Coldplay. As a sportsperson, he likes to indulge in a game of basketball or squash. Naman is found to be fluent in English, Hindi, Bengali, Spanish and Marwari.</p>
            <h4 class="connect-head">Connect at</h4>
            <div class="clear-fix"></div>
            <a href="https://www.linkedin.com/in/namanjain9/"><i class="lab la-linkedin-in linkdin-icon"></i></a>
          </div>
        </div>
      </div>

    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- Modal -->
<div class="modal right fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <i class="las la-times-circle" data-dismiss="modal" aria-label="Close"></i>
      <div class="modal-body no-padding">
        <div class="modal-grid">
          <div class="items items-green">
            <img src="{{asset('assets/front/img/about-man5.jpg')}}" class="img-responsive">
          </div>
          <div class="items">
            <h3 class="pre_title text-orange"><span class="bg-white">Pragati Jain,</span></h3>
            <p><strong>Director of Sales</strong></p>
            <p>Pragati is the primary force that ensures a steady flow of sales and builds consistency in Ecotact-client relationships. The clients see her as the face of Ecotact. As a Director of Sales, she ensures systematic plan executions & implements initiatives to exceed client expectations through smooth feedback incorporation. Apart from her expertise in sales, she has certifications in International Marketing Strategy & Digital Marketing (FIEO) as well as Intensive Crop to Cup Training Programme (Kappi Machines). Outside of work, Pragati is a total fitness freak and a coffee enthusiast. Her passion for sightseeing and travelling makes her a real backpacker. In fact, she is determined to travel the whole wide world on four wheels! Pragati is also an environmentalist and an ardent lover of nature. Pragati is found to be fluent in English, Hindi, and Marwari.</p>

            <h4 class="connect-head">Connect at</h4>
            <div class="clear-fix"></div>
            <a href="https://www.linkedin.com/in/pragatijain1/"><i class="lab la-linkedin-in linkdin-icon"></i></a>
          </div>
        </div>
      </div>

    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- Modal -->
  <div class="modal right fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <i class="las la-times-circle" data-dismiss="modal" aria-label="Close"></i>
        <div class="modal-body no-padding">
          <div class="modal-grid">
            <div class="items items-green">
              <img src="{{asset('assets/front/img/nagraj1.jpg')}}" class="img-responsive">
            </div>
            <div class="items">
              <h3 class="pre_title text-orange"><span class="bg-white">Nagraj Jain,</span></h3>
              <p><strong>Chairman</strong></p>
              <p>Mr Nagraj Jain serves as the Chairman of Ecotact. As a prominent leader of the Board, his
              role primarily involves planning the business architecture and focusing mainly towards
              strategic matters. He is responsible for overseeing the overall alignment between the
              organizational vision and mission, simultaneously ensuring that it is in line with business
              objectives and practices. Mr. Nagraj has a Bachelor in Commerce(Honors) and has an
              experience of over 30 years in the industry. His interests span traveling, humming to the
              tunes of Retro Bollywood music and he is a proud gourmet who also loves to cook. Because
              he enjoys hospitality so much, he enjoys spending quality time cooking unique special
              dishes every now and then. If given the opportunity, he wouldn’t miss a chance to travel the
              globe with family and peacefully find refuge in the hills someday! Mr. Jain is found to be
              fluent in several dialects such as English, Hindi, Nepali, Bengali, and Marwari.</p>
            </div>
          </div>
        </div>
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->
  <!-- Modal -->
  <div class="modal right fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <i class="las la-times-circle" data-dismiss="modal" aria-label="Close"></i>
        <div class="modal-body no-padding">
          <div class="modal-grid">
            <div class="items items-green">
              <img src="{{asset('assets/front/img/himanshu1.jpg')}}" class="img-responsive">
            </div>
            <div class="items">
              <h3 class="pre_title text-orange"><span class="bg-white">Himanshu Baid,</span></h3>
              <p><strong>Director of Procurement and International Sales</strong></p>
              <p>Mr Himanshu is the Director of Procurement and International Sales. His expertise lies in
              setting up and ensuring smooth operations of Ecotact’s state-of-the-art manufacturing facility
              at Kolkata. He has a Bachelor&#39;s Degree in Information Technology from Manipal Institute of
              Technology and also has certifications in courses such as Plastics Processing Techniques
              and Quality Control-Reg from Central Institute of Petrochemicals Engineering &amp; Technology.
              When not at work, Mr Himanshu is a keen travel buff with an amiable disposition. He loves
              food and paneer tikka tops the list! He is a multi-tasker and a polyglot. He is fluent in English,
              Hindi, Bengali, and Marwari. Someday, he wishes to travel around the world.</p>
            </div>
          </div>
        </div>
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->
  

@stop