@extends('layouts.new_frontlayout')


@section('content')
<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/Sustainablity.png')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">Site Map</span>
        <h1>Site Map</h1>
      </div>
    </div>
  </div>
</div>

<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="row">
          <div class="col-md-6">
            <ul class="site-map">
              <li><a href="https://www.ecotactbags.com/"><i class="las la-angle-double-right"></i> Home</a></li>
              <li><a href="https://www.ecotactbags.com/about-us"><i class="las la-angle-double-right"></i> About Us</a></li>
              <li><a href="https://www.ecotactbags.com/eco-products/packaging"><i class="las la-angle-double-right"></i> Products</a></li>
              <ul class="sub-site-map" style="margin-left: 15px; padding: 0;">
                <li><a href="https://www.ecotactbags.com/eco-products/packaging"><i class="las la-angle-right"></i> Packaging</a></li>
                <li><a href="https://www.ecotactbags.com/eco-products/storage"><i class="las la-angle-right"></i> Storage</a></li>
                <li><a href="https://www.ecotactbags.com/eco-products/packaging-equipment"><i class="las la-angle-right"></i> Packaging equipment</a></li>
                <li><a href="https://www.ecotactbags.com/eco-products/accessories"><i class="las la-angle-right"></i> Accessories</a></li>
              </ul>
              <li><a href="https://www.ecotactbags.com/sustainablity"><i class="las la-angle-double-right"></i> Sustainability</a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="site-map">
              <li><a href="https://www.ecotactbags.com/initiatives"><i class="las la-angle-double-right"></i> Initiatives</a></li>
              <li><a href="https://www.ecotactbags.com/blog"><i class="las la-angle-double-right"></i> Blog</a></li>
              <li><a href="https://www.ecotactbags.com/contact-us"><i class="las la-angle-double-right"></i> Contact</a></li>
              <li><a href="https://www.ecotactbags.com/faq"><i class="las la-angle-double-right"></i> FAQs</a></li>
              <li><a href="https://www.ecotactbags.com/privacy"><i class="las la-angle-double-right"></i> Privacy</a></li>
              <li><a href="https://www.ecotactbags.com/refunds-and-returns"><i class="las la-angle-double-right"></i> Refunds & Returns</a></li>
              <li><a href="https://www.ecotactbags.com/terms"><i class="las la-angle-double-right"></i> Terms</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop