




<!doctype html>

<html class="no-js" lang="">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Ecotact</title>

        <meta name="description" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="google-site-verification" content="QptvViaTr2YtNdn-qgAmDWPtdrQNhsaD4uorlSd_lNY" />

        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <!-- Place favicon.ico in the root directory -->



        <link rel="stylesheet" href="{{ asset('backup/css/normalize.css') }}">

        <link rel="stylesheet" href="{{ asset('backup/css/meanmenu.css') }}">

        <link rel="stylesheet" href="{{ asset('backup/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('backup/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('backup/css/webmaddy.css') }}">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-N8H6S8Z');</script>
        <!-- End Google Tag Manager -->
    </head>

    <body>

        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N8H6S8Z"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <!--[if lt IE 8]>

            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>

        <![endif]-->



        <!-- Add your site or application content here -->

       <div class="wrapper green-border">

       		

<style type="text/css">
    #nav ul li {
        font-size: 15px;
    }
</style>
 
<header id="header" class="fw">
				
				<div id="languages">
                	@foreach($frontLanguages as $frontLanguage)
                        <a href="{{route('setLanguageRoute',['id' => $frontLanguage->id])}}" ><img src="{{asset('languages/'.$frontLanguage->image)}}" loading="lazy" width="30" alt="ecotact"></a>
                    @endforeach
                    
                    <!--<a href="coming-soon.php?lang=fr"><img src="{{ asset('img/fr.png')}}" title="French"/></a>-->
				</div>
				
            	<div class="header-top clearfix">

                	<div class="logo">
						<a href="index.php">
						    @if(config('app.lang')->slug == 'sp')						<img src="{{asset('front-end/images/logo-spanish.png')}}" alt="ecotact">
						    @elseif(config('app.lang')->slug == 'en')
						        <img src="{{asset('front-end/images/logo-green.svg')}}" alt="ecotact">
						    @else
						    
						    @endif
						    <!-- <img src="img/logo.png" alt="ecotact"> -->
						</a>
					</div>


                </div>

                <nav id="nav">

                	<ul>
						<li  >
                        	<a href="{{route('home')}}">Home</a>
                        </li>
						<li  >
                        	<a href="{{route('about-us')}}">{{__('home.about') }}</a>
                        </li>
						<li  >
                        	<a href="{{route('productsList',['slug' => 'packaging'])}}">{{__('home.products') }}</a>
                        </li>
                        <li  >
                            <a href="{{route('sustainablity')}}">{{__('home.sustain') }}</a>
                        </li>
						<li  >
                        	<a href="{{route('csr-activities')}}">{{__('home.initiatives') }}</a>
                        </li>  
                        <li  >
                            <a href="{{route('blog')}}">{{__('home.blog') }}</a>
                        </li>        	
						<li  >
                        	<a href="{{route('contact')}}"><img src="{{asset('front-end/images/email.svg')}}" loading="lazy" alt="ecotact" class="nav-img"></a>
                        </li>
                    </ul>

                </nav>

            </header>	

</html>	
            <section class="page-australia clearfix">

           
                <div class="tree-bg" style="background-image: url('{{ asset('backup/img/garden-bg.jpg')}}');">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-8 col-md-offset-2" style="text-align: center;">
                        <h2 style="font-weight: 400; text-align: center;" > {{ __('home.coming') }}</h2>
                        <img src="{{ asset('backup/img/plant.png')}}" class="img-responsive snippet" alt="Getting ready for a stronger brew" style="margin-top:30px;max-width: 400px;display: inline-block;width: 100%;">
                      </div>
                    </div>

                
                  </div>
                </div><!-- page -->
					           

     

            </section>

             <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <a target="_blank" href="https://wa.me/c/918448848948" class="whatsapplink">
          <div class="section-whatsapp">
            <i class="fa fa-whatsapp" aria-hidden="true"></i>
          </div>
        </a>

<style type="text/css">
	.section-whatsapp {
    background-color: #72b74c;
    /*width: 50px;*/
    /*height: 50px;*/
    left: 20px;
    border-radius: 50%;
    bottom: 30px;
    color: #fff;
    text-align: center;
    line-height: 50px;
    font-size: 30px;
    position: fixed;
    z-index: 1000000;
}
.section-whatsapp{
  width: 68px;
  height: 68px;
}
.section-whatsapp .fa {
  font-size: 46px;
  position: relative;
  top: 10px;
}
@media only screen and (max-width: 767px){
.section-whatsapp {
    right: 20px !important;
  }
}
</style>


    <footer id="footer">

            	<div class="fw">

                	<p class="copyright">Copyright © 2021 Ecotact. All Rights Reserved.
                		<br> | &nbsp; <a href="privacy-policy.php">{{__('home.privacy') }}</a>
                		<br> | &nbsp; <a href="refund.php">{{__('home.refunds') }}</a>
                		<br> | &nbsp; <a href="terms.php">{{__('home.terms') }}</a></p>
	
<div class="footerright">
                	<script type="text/javascript" src="//static.mailerlite.com/data/webforms/374260/m5y0q5.js?v1"></script>
                	
                </div>
                <a href="{{route('contact')}}#enquiry-form"><div  class="footerright-sticky" >
                	
                	{{__('home.enquire') }}             </div></a>
                </div>
            </footer>

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

  <link rel="stylesheet" href="{{ asset('backup/modal/remodal.css')}}">

  <link rel="stylesheet" href="{{ asset('backup/modal/remodal-default-theme.css')}}">

  <script src="modal/remodal.js"></script>

<script type="text/javascript" language="javascript">

 function isValidEmailAddress(emailAddress) {

    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,8}$/i);
    // alert( pattern.test(emailAddress) );
    return pattern.test(emailAddress);

};

	 

$(document).ready(function() {

		   

	   $('.sbbtbtn').click(function() {

		  var name=$('#name').val();
		  var country=$('#country').val();
		  //var contactno = $('#phone').val();
		  var email=$('#email').val();
		  var message=$('#message').val();

		  var company=$('#company').val();
		  var no_of_unit=$('#no_of_unit').val();


	

		

		   if(name=='')
		   {

			   alert('Please Enter your full name!!');
			   $('#name').focus();
		  

		   }

		    else if(company=='')
		   {

			   alert('Please Enter your company name!!');
			   $('#company').focus();
		  

		   }

		   else if(country=='')
		   {

			   alert('Please Enter your country!!');
			   $('#country').focus();
		  

		   }


		  //  else   if(contactno=='')

		  // {

			 //  alert('Please Enter Your Contact No.');

			 //  $('#phone').focus(); 

		  // }

		   //   else   if(contactno.length !=10)

			  // {

				 //  alert('Please Enter Your Valid Phone Number Digit.');

				 //  $('#phone').focus(); 

			  // }

		   // else if(isNaN(contactno))

			  // {

				 //  alert('Please Enter Your Valid Phone Number.');

				 //  $('#phone').focus(); 

			  // }

		  

		   else if(email=='')

				{

					alert('Please Enter Your Email!!');

					$('#email').focus();

				}	

			 else if(!isValidEmailAddress(email))

				{

					alert('Please Enter Your Valid Email!!');

					$('#email').focus();

				} 

			

		      else if(message=='')

			  {

				  alert('Please Enter Your Message!!');

				  $('#message').focus(); 

			  }			

			

		  else

		  {

			  //alert('Hello');
                /* 
			    $.ajax({

				  
				  type:'GET',
				  url:'enquiryemail.php',
				  data:'c_name='+name+'&c_country='+country+'&c_email='+email+'&c_message='+message+'&company='+company+'&no_of_unit='+no_of_unit,

				  success:function(data){ 
					// alert(data);

					alert('Thank you For Contacting Us!!');

					 window.location.href='thank-you.php';

					  

					  }

				  

				})
				*/
                
			  
                $.ajax({
                    type: "POST",
                    data: {
                        c_name:name,
                        c_country:country,
                        c_email:email,
                        c_message:message,
                        company:company,
                        no_of_unit:no_of_unit
                    },
                    url: "send_mail.php",
                    success: function(data){
                        //console.log(data);
                        //alert('Thank you For Contacting Us!!');
					    window.location.href='thank-you.php';
                    }
                });
			    
                
			  

		  } 

		   

		   

		   });

				

		

	});

	   

	   

	   

		   </script>


</html>	
       </div>



        <script src="{{ asset('backup/js/vendor/jquery-1.12.0.min.js')}}"></script>

        <script src="{{ asset('backup/js/plugins.js')}}"></script>

        <script src="{{ asset('backup/js/main.js')}}"></script>



    </body>

</html>
