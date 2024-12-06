<!-- 
	HTML Email Starter Kit
	Documentation: https://github.com/timothylong/html-email-starter-kit
-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" initial-scale="1">
    <!--[if !mso]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="x-apple-disable-message-reformatting">
    <title>Emailer</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <!--[if mso]>
        <style>
            * { font-family: sans-serif !important; }
        </style>
    <![endif]-->
    <!--[if !mso]><!-->
        <!-- Insert font reference, e.g. <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet"> -->
    <!--<![endif]-->
    <style>
        *,
        *:after,
        *:before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        html,
        body,
        .document {
            width: 100% !important;
            height: 100% !important;
            margin: 0;
            padding: 0;
        }
        body {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }
        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        table {
            border-spacing: 0;
            border-collapse: collapse;
            table-layout: fixed;
            margin: 0 auto;
        }
        img {
            -ms-interpolation-mode: bicubic;
            max-width: 100%;
            border: 0;
        }
        *[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
        }
        .x-gmail-data-detectors,
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
        }
        .btn {
            -webkit-transition: all 200ms ease;
            transition: all 200ms ease;
        }
        .btn:hover {
            background-color: dodgerblue;
        }
        @media screen and (max-width: 750px) {
            .container {
                width: 100%;
                margin: auto;
            }
            .stack {
                display: block;
                width: 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body style="background: #f1f1f1; font-family: 'Roboto', sans-serif;">
    <div style="display: none; max-height: 0px; overflow: hidden;">
        <!-- Preheader message here -->
    </div>
    <div style="display: none; max-height: 0px; overflow: hidden;"></div>
    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" class="document" style="margin-top: 30px;margin-bottom: 30px;">
        <tr>
            <td valign="top">
                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="620" class="container" style="background: #ffffff; width:620px;">
                    <tr>
                        <td>
                            <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" >
                                <tr>
                                    <td colspan="3">
                                       <a href="https://ecotactbags.com/"> <img src="https://www.ecotactbags.com/front-end/logo-green.jpg" loading="lazy" alt="ecotactbags" style="width: 120px; margin: 15px auto; display: block;"></a>
                                       
                                    </td>
                                </tr>
                                @if($order->status == 'Cancelled')
                                    <tr style="text-align: center;background-color: #f44336; color: #fff;">
                                        <td colspan="3"><h3 style="font-weight: 500; font-size: 24px;">{{ __('confirmMail.title') }}</h3></td>
                                    </tr>
                                @else
                                    <tr style="text-align: center;background-color: #039439; color: #fff;">
                                        <td colspan="3"><h3 style="font-weight: 500; font-size: 24px;">{{ __('confirmMail.title') }}</h3></td>
                                    </tr>
                                @endif
                                <tr >
                                    <td style="padding: 30px; padding-bottom: 15px; " colspan="3">
                                        <p><strong>{{ __('confirmMail.Hi') }} {{$order->name}},</strong></p>
                                       <p> {{ __('confirmMail.subTitle') }}</p>
                                    </td>
                                </tr>
                            </table>


                            <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="620" class="container" style="background: #ffffff;">
                                <tr valign="top">
                                    <td width="50%" style="padding: 15px 30px; border-top: 1px solid #f1f1f1;" valign="top">
                                        <p><strong>{{ __('confirmMail.Delivery Details') }}</strong><br>
                                        <strong>{{ $order->name }}</strong><br>
							{{ $order->full_address ? $order->full_address :  $order->house_no .','. $order->apertment_no .','. $order->area .','. $order->landmark.','}}<br>
							
						{{$order->city .','. $order->state .','. $order->pincode .','. $order->country }} </p>
						
                                    </td>
                                    <td style="padding: 15px 30px; border-top: 1px solid #f1f1f1;" valign="top">
                                        <p><strong>{{ __('confirmMail.Billing Details') }}</strong><br>
                                        <strong>{{ $order->name }}</strong><br>
							{{ $order->full_address ? $order->full_address :  $order->billing_house_no .','. $order->billing_apertment_no .','. $order->billing_area .','. $order->billing_landmark.','}}<br>
						{{$order->billing_city .','. $order->billing_state .','. $order->billing_pin .','. $order->billing_country }} </p>
                                            
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px 30px; border-top: 1px solid #f1f1f1;" valign="top" colspan="2">
                                        <p style="font-size: 13px;"><strong>Contact Details</strong><br>
                                        {{ __('confirmMail.email') }}: {{ $order->user->email }}
                                        <br>
                                        {{ __('confirmMail.phone') }}: {{ $order->contact_no }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px 30px;" colspan="3">
                                        <h4 style="color: #039439;">{{ __('confirmMail.ORDER ID') }} #{{$order->invoice_no}}</h4>
                                    </td>
                                </tr>
                                @if($order->status == 'Shipped')
                                    <tr>
                                        <td style="padding: 0px 30px;" colspan="3">
                                            <h4 style="color: #039439;" >Tracking Url <a href="{{ $order->tracking_info }}">{{ $order->tracking_info }}</a></h4>
                                        </td>
                                    </tr>
                                @endif

                                <tr valign="top">
                                    <td colspan="3">
                                       
                                        <table style="width: 100%;"  width="100%">
                                            @foreach($order->orderProducts as $orderProduct)
                                                <tr valign="top">
                                                    <td style="padding: 10px 30px;" valign="top">
                                                        <img src="{{ asset('product_images/medium/'.$orderProduct->stock->product->base_img) }}" style="width: 120px;">
                                                    </td>
                                                    <td style="padding: 10px 30px;" valign="top">
                                                        <strong>{{@$orderProduct->stock->product->productDetails[0]['product_name']}}</strong><br>
                                                        @if($orderProduct->stock->pieces)<strong>Size : </strong> {!!__('sizes.'.$orderProduct->stock->size)!!}<br> @endif 
                                                        
                                                        @if($orderProduct->stock->pieces)<strong>Pack of : </strong> {{$orderProduct->stock->pieces}}<br> @endif 
                                                        @if($orderProduct->qty)<strong>{{ __('confirmMail.Qty') }} : </strong> {{$orderProduct->qty}}<br> @endif 
                                                        <br>
                                                    </td >
                                                    <td style="text-align: right; padding: 10px 30px;" valign="top"><strong>{{config('app.lang')->currency}} {{$orderProduct->price}}</strong></td>
                                                </tr>
                                            @endforeach
                                             <tr>
                                                <td style="padding: 10px 30px;" valign="top">
                                                   <div style="width: 120px; height: 50px;"></div>
                                                </td>
                                                <td valign="top" style="padding: 10px 30px;">
                                                    
                                                    @if($order->discount_amt != $order->gross_amt)
                                                    <strong>Total</strong><br>
                                                    <strong>Discount</strong><br>
                                                    @endif
                                                    @if($order->shipping_charges > 0)
                                                    <strong>Shipping Charge</strong><br>
                                                    @endif
                                                    @if($order->tax_inclusive > 0)
                                                    @if(strtolower($order->state) == 'delhi')
                                                    <strong>CGST</strong><br>
                                                    <strong>SGST</strong><br>
                                                    @else
                                                    <strong>IGST</strong><br>
                                                    @endif
                                                    @endif
                                                    
                                                    
                                                        <!--<strong>{{ __('confirmMail.Qty') }}</strong><br>-->
                                                        <!--@if($orderProduct->stock->pieces)<strong>Pack of</strong><br> @endif <br>-->
                                                        <strong>{{ __('confirmMail.Payable Amount') }} </strong></p>
                                                </td style="padding: 10px 30px;">
                                                <td valign="top" style="text-align: right; padding: 10px 30px;">
                                                     @if($order->discount_amt != $order->gross_amt)
                                                     <strong>{{config('app.lang')->currency}} {{$order->gross_amt - $order->tax_inclusive}}</strong><br>
                                                     <strong>{{config('app.lang')->currency}} {{($order->discount_amt + $order->extra_discount)}}</strong><br>
                                                     @endif
                                                     @if($order->shipping_charges > 0)
                                                    <strong>{{config('app.lang')->currency}} {{$order->shipping_charges}}</strong><br>
                                                    @endif
                                                     @if($order->tax_inclusive > 0)
                                                        @if(strtolower($order->state) == 'delhi')
                                                        <strong>{{config('app.lang')->currency}} {{($order->tax_inclusive+$order->shipping_gst)/2}}</strong><br>
                                                        <strong>{{config('app.lang')->currency}} {{($order->tax_inclusive+$order->shipping_gst)/2}}</strong><br>
                                                        @else
                                                        <strong>{{config('app.lang')->currency}} {{$order->tax_inclusive+$order->shipping_gst}}</strong><br>
                                                        @endif
                                                    @endif
                                                    
                                                     <!--<strong>{{ $orderProduct->qty }}</strong><br>-->
                                                      <!--@if($orderProduct->stock->pieces)<strong>{{ $orderProduct->stock->pieces * $orderProduct->qty }}</strong><br> @endif <br>-->
                                                        <strong>{{config('app.lang')->currency}} {{$order->net_amt}}</strong></p>
                                                </td>
                                            </tr>

                                        </table>

                                       

                                    </td>    
                                </tr>


                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 12px;padding: 10px 30px;">
                            <img src="{{asset('sign-01.png')}}" class="img-responsive">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 12px;padding: 10px 30px;">
                            <p><strong style="color:#039439;">{{ __('confirmMail.Have a question?') }}</strong><br>
                                {!! __('confirmMail.feelFee') !!} </p>
                        </td>
                    </tr>
                    <tr>
                        <td >
                             <a href="http://ecotactbags.com/"><img src="https://www.ecotactbags.com/front-end/logo-green.jpg" loading="lazy" alt="ecotactbags" style="width: 100px; margin: 15px auto; display: block;"></a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>