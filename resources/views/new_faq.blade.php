@extends('layouts.new_frontlayout')


@section('content')
<div class="banner inner-banner" style="background:#333 url({{asset('assets/front/img/Sustainablity.png')}});">
  <div class="banner-content">
    <div class="container">
      <div class="banner-text">
        <span class="white-color">{{ __('privacy.ecotact') }}</span>
        <h1>{!! __('faq.faq') !!}</h1>
      </div>
    </div>
  </div>
</div>

<section class="section faq-section">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">{!! __('faq.PRODUCT') !!}
                      <i class="more-less las la-angle-down"></i>
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <h4>{!! __('faq.qus1') !!}</h4>
                  <p class="mb30">{!! __('faq.ans1') !!}</p>

                  <h4>{!! __('faq.qus2') !!}</h4>
                  <p class="mb30">{!! __('faq.ans2') !!}</p>

                  <h4>{!! __('faq.qus3') !!}</h4>
                  <p class="mb30">{!! __('faq.ans3') !!}</p>

                  <h4>{!! __('faq.qus4') !!}</h4>
                  <p class="mb30">{!! __('faq.ans4') !!}</p>

                  <h4>{!! __('faq.qus5') !!}</h4>
                  <p class="mb30">{!! __('faq.ans5') !!}</p>

                  <h4>{!! __('faq.qus6') !!}</h4>
                  <p class="mb30">{!! __('faq.ans6') !!}</p>

                  <h4>{!! __('faq.qus7') !!}</h4>
                  <p class="mb30">{!! __('faq.ans7') !!}</p>

                  <h4>{!! __('faq.qus8') !!}</h4>
                  <p class="mb30">{!! __('faq.ans8') !!}</p>

                  <h4>{!! __('faq.qus9') !!}</h4>
                  <p class="mb30">{!! __('faq.ans9') !!}</p>

                  <h4>{!! __('faq.qus10') !!}</h4>
                  <p class="mb30">{!! __('faq.ans10') !!}</p>

                  <h4>{!! __('faq.qus11') !!}</h4>
                  <p class="mb30">{!! __('faq.ans11') !!}</p>

                  <h4>{!! __('faq.qus12') !!}</h4>
                  <p class="mb30">{!! __('faq.ans12') !!}</p>

                  <h4>{!! __('faq.qus13') !!}</h4>
                  <p class="mb30">{!! __('faq.ans13') !!}</p>

                  <h4>{!! __('faq.qus14') !!}</h4>
                  <p class="mb30">{!! __('faq.ans14') !!}</p>

                  <h4>{!! __('faq.qus15') !!}</h4>
                  <p class="mb30">{!! __('faq.ans15') !!}</p>

                  <h4>{!! __('faq.qus16') !!}</h4>
                  <p class="mb30">{!! __('faq.ans16') !!}</p>

                  <h4>{!! __('faq.qus17') !!}</h4>
                  <p class="mb30">{!! __('faq.ans17') !!}</p>

                  <h4>{!! __('faq.qus18') !!}</h4>
                  <p class="mb30">{!! __('faq.ans18') !!}</p>
                  
                  <h4>{!! __('faq.qus19') !!}</h4>
                  <p class="mb30">{!! __('faq.ans19') !!}</p>
                  
                  <h4>{!! __('faq.qus20') !!}</h4>
                  <p class="mb30">{!! __('faq.ans20') !!}</p>
                  
                  <h4>{!! __('faq.qus21') !!}</h4>
                  <p class="mb30">{!! __('faq.ans21') !!}</p>
                  
                  <h4>{!! __('faq.qus22') !!}</h4>
                  <p class="mb30">{!! __('faq.ans22') !!}</p>
                  
                  <h4>{!! __('faq.qus23') !!}</h4>
                  <p class="mb30">{!! __('faq.ans23') !!}</p>
                  
                  <h4>{!! __('faq.qus24') !!}</h4>
                  <p class="mb30">{!! __('faq.ans24') !!}</p>
                  
                  <h4>{!! __('faq.qus25') !!}</h4>
                  <p class="mb30">{!! __('faq.ans25') !!}</p>
                  
                  <h4>{!! __('faq.qus26') !!}</h4>
                  <p class="mb30">{!! __('faq.ans26') !!}</p>
                  
                  <h4>{!! __('faq.qus27') !!}</h4>
                  <p class="mb30">{!! __('faq.ans27') !!}</p>
                  
                  <h4>{!! __('faq.qus28') !!}</h4>
                  <p class="mb30">{!! __('faq.ans28') !!}</p>

                  
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      {!! __('faq.PRICING') !!}
                      <i class="more-less las la-angle-down"></i>
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                  <h4>{!! __('faq.qus29') !!}</h4>
                  <p class="mb30">{!! __('faq.ans29') !!}</p>

                  <h4>{!! __('faq.qus30') !!}</h4>
                  <p class="">{!! __('faq.ans30') !!}</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      {!! __('faq.BUYING') !!}
                      <i class="more-less las la-angle-down"></i>
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                  <h4>{!! __('faq.qus31') !!}</h4>
                  <p class="mb30">{!! __('faq.ans31') !!}</p>

                  <h4>{!! __('faq.qus32') !!}</h4>
                  <p class="mb30">{!! __('faq.ans32') !!}</p>

                  <h4>{!! __('faq.qus33') !!}</h4>
                  <p class="mb30">{!! __('faq.ans33') !!}</p>

                  <h4>{!! __('faq.qus34') !!}</h4>
                  <p class="mb30">{!! __('faq.ans34') !!}</p>

                  <h4>{!! __('faq.qus35') !!}</h4>
                  <p class="mb30">{!! __('faq.ans35') !!}</p>

                  <h4>{!! __('faq.qus36')!!} </h4>
                  <p class="mb30">{!! __('faq.ans36')!!}</p>

                  <h4>{!! __('faq.qus37')!!} </h4>
                  <p class="mb30">{!! __('faq.ans37')!!}</p>

                  <h4>{!! __('faq.qus38')!!} </h4>
                  <p class="mb30">{!! __('faq.ans38')!!}</p>

                  <h4>{!! __('faq.qus39')!!} </h4>
                  <p class="mb30">{!! __('faq.ans39')!!}</p>

                  <h4>{!! __('faq.qus40')!!} </h4>
                  <p class="mb15">{!! __('faq.ans41')!!}</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingfour">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                      {!! __('faq.CANCELLATION') !!}
                      <i class="more-less las la-angle-down"></i>
                    </a>
                </h4>
            </div>
            <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                <div class="panel-body">
                  <h4>{!! __('faq.qus42') !!}</h4>
                  <p class="mb30">{!! __('faq.ans42') !!}</p>

                  <h4>{!! __('faq.qus43') !!}</h4>
                  <p class="mb30">{!! __('faq.ans43') !!}</p>

                  <h4>{!! __('faq.qus44') !!}</h4>
                  <p class="mb30">{!! __('faq.ans44') !!}</p>

                  <h4>{!! __('faq.qus45') !!}</h4>
                  <p class="mb30">{!! __('faq.ans45') !!}</p>

                  <h4>{!! __('faq.qus46') !!}</h4>
                  <p class="mb15">{!! __('faq.ans46') !!}</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingfive">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                      {!! __('faq.SUSTAINABILITY') !!}
                      <i class="more-less las la-angle-down"></i>
                    </a>
                </h4>
            </div>
            <div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                <div class="panel-body">
                  <h4>{!! __('faq.qus47') !!}</h4>
                  <p class="mb30">{!! __('faq.ans47') !!}</p>

                  <h4>{!! __('faq.qus48') !!}</h4>
                  <p class="mb30">{!! __('faq.ans48') !!}</p>

                  <h4>{!! __('faq.qus49') !!}</h4>
                  <p class="mb30">{!! __('faq.ans49') !!}</p>

                  <h4>{!! __('faq.qus50') !!}</h4>
                  <p>{!! __('faq.ans50') !!}</p>
                </div>
            </div>
        </div>

        </div><!-- panel-group -->
      </div>
    </div>
  </div>
</section>

<script type=""application/ld+json"">
{
  ""@context"": ""https://schema.org"",
  ""@type"": ""FAQPage"",
  ""mainEntity"": [{
    ""@type"": ""Question"",
    ""name"": ""What is the meaning of hermetic packaging?"",
    ""acceptedAnswer"": {
      ""@type"": ""Answer"",
      ""text"": ""Hermetic packaging is a type of advanced packaging that makes the contents inside not only air-tight but offers high barrier protection against external elements like oxygen, air, and other gases.""
    }
  },{
    ""@type"": ""Question"",
    ""name"": ""Are the bags food grade? Is there any certificate to prove that? (Are you food grade certified?)"",
    ""acceptedAnswer"": {
      ""@type"": ""Answer"",
      ""text"": ""Ecotact bags are food grade and are compliant with USFDA & EU Regulations. Yes, we have certificates from SGS for the same. Latest certifications can be shared with you on request.""
    }
  }]
}
</script>
@stop