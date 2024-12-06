<div class="footer text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb15">
          <!-- <ul class="footer-links">
            <li><a href="https://www.ecotactbags.com/about-us" target="_blank">Know more</a></li>
            <li><a href="https://www.ecotactbags.com/sustainablity" target="_blank">Sustainability initiatives</a></li>
            <li><a href="https://www.ecotactbags.com/contact-us" target="_blank">Contact us</a></li>
          </ul> -->
          <!-- <ul class="footer-socials">
            <li><a href="https://www.facebook.com/ecotact" target="_blank"><i class="lab la-facebook-f"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCpmDEdpAA2NLAQk9_uaBAQA" target="_blank"><i class="lab la-youtube"></i></a></li>
            <li><a href="https://www.instagram.com/ecotact/" target="_blank"><i class="lab la-instagram"></i></a></li>
            <li><a href="https://www.linkedin.com/company/ecotact/" target="_blank"><i class="lab la-linkedin-in"></i></a></li>
          </ul> -->
        </div>
        <div class="col-md-12 mb15">
          <div class="green-border"></div>
        </div>
        <div class="col-md-12">
          <!--<p><a href="javascript:void(0);" style="color:#23743a">Ecotact Bags</a></p>-->
          <p style="color:#23743a">Ecotact Bags</p>
          <p>© Aashirvad International</p>
        </div>
      </div>
    </div>
  </div>
  <style>
    label {
      font-weight: 400;
      font-size: 14px;
      color: #fff;
    }
    .products-carousel .owl-nav button {
    font-size: 20px;
    height: 40px;
    width: 40px;
    left: -6%;
    position: absolute;
    top: 45%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    color: #001922 !important;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    text-align: center;
    border-radius: 50px !important;
    background: #fff !important;
    border: 1px solid #001922 !important;
    background: #e2e2e2;
    color: #868686;
  }
  .products-carousel .owl-nav .owl-next {
    right: -6%;
    left: auto;
  }
  </style>
  
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="{{ asset('marketingleadsenglishasset/js/jquery-2.2.4.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{ asset('marketingleadsenglishasset/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('marketingleadsenglishasset/js/jquery.easing.min.js')}}"></script>
  <!-- owl.carousel -->
  <script src="{{ asset('marketingleadsenglishasset/js/owl.carousel.js')}}"></script>
  <!-- jquery.validate.min.js -->
  <script src="{{ asset('marketingleadsenglishasset/js/jquery.validate.min.js')}}"></script>
  <script src="{{ asset('marketingleadsenglishasset/mail/contact.js')}}"></script>
  <!-- main js -->
  <script type="text/javascript" src="{{ asset('marketingleadsenglishasset/js/jquery.magnific-popup.js')}}"></script>
  <script src="{{ asset('marketingleadsenglishasset/js/main.js')}}"></script>
  <script src="{{ asset('marketingleadsenglishasset/js/custom.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.5/chosen.jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
  
  @include('layouts.front_error')
  <script type="text/javascript">
   $(document).ready(function () {
    $('#conProducts').chosen();
    });
  </script>
  
  <script>
      $('#contact-form-submit').click(function() {
          console.log(products);
      });
  </script>
  
  
  <script type="text/javascript">
    $(function() {
        $('a.page-scroll').bind('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top-140
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    });
  
  // $("#myForm").validate({
  // rules: {
  //     name : {
  //     required: true,
  //     },
  //     country: {
  //     required: true,
  //     },
  //     message: {
  //     required: true,
  //     },
  //     company_name: {
  //     required: true,
  //     },
  //     email: {
  //     required: true,
  //     email: true
  //     },
  //   }
  // });
  // $("#myForm1").validate({
  // rules: {
  //     name : {
  //     required: true,
  //     },
  //     country: {
  //     required: true,
  //     },
  //     message: {
  //     required: true,
  //     },
  //     email: {
  //     required: true,
  //     email: true
  //     },
  //   }
  // });
  </script>
  
  <!-- Hotjar Tracking Code for https://www.ecotactbags.com/hermeticpackaginginquiry/ -->
  <script>
      (function(h,o,t,j,a,r){
          h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
          h._hjSettings={hjid:2757898,hjsv:6};
          a=o.getElementsByTagName('head')[0];
          r=o.createElement('script');r.async=1;
          r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
          a.appendChild(r);
      })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
  </script>
  <style>
    /*.error{
      color : red
    }*/
  </style>
  
    </body>
  </html>