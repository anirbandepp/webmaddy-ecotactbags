<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ __('confirmMail.invoice') }}</title>
      <style type="text/css">
     		 body{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
            line-height: 1.4;
        } 
				h1, h2, h3, h4, h5, p {
					margin: 0px;
				}
        .text-sm {
            font-size: 10px;
        }
        .container{
            width: 100%;
        }
        .logo{
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
            width: 120px;
            display: inline-block;
        }
        .logo img{
            width: 150px;
        }
       
        table{
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
            border-collapse: collapse;
            border:1px solid grey;
            margin-bottom: 10px;
            padding:7px 25px;

        }
        table th{
            font-size: 10px;
            font-weight: 700;
            text-align: left;
            border-bottom: 1px solid grey;
            padding: 7px 10px;
            background-color:#ffdda6;
            font-family: Arial, Helvetica, sans-serif;
        }
        table td{
           vertical-align: top;
           padding:7px 25px;
        }
        table th {
					padding: 7px 25px;
        }
        .page-break {
            page-break-after: always;
        }
        .table-top{
            margin-bottom: 15px;
        }
        .pdesc {
            font-size: 8px;
            margin-top: 8px;
        }
        .logo-bottom {
            text-align: center;
            margin-bottom: 30px;
            margin-top: 30px;
        }
        .invoicedetails {
        	margin-top: 45px;
        }
        .compname {
        	font-size: 14px;
        }
        .fornm {
        	margin-top: 30px;
        	margin-bottom: 50px;
        	text-align: right;
        }
        .amountwords {
        	margin-top: 30px;
        }
        .authsign {
        	text-align: right;
        }
        .table-amount tr th:last-child {
					text-align: right;
					padding-right: 10px;
        }
        .table-amount tr td:last-child {
					text-align: right;
					padding-right: 10px;
        }
        .link {
        	text-align: center;
        	font-size: 12px;
        }
  		</style>
</head>
<body>
	<div class="container">
        
        
        <table style="border:none;">
		    <tr>
		        <td col="2" style="text-align:center;"><h3><img src="http://ecotactbags.com/front-end/images/logo-green.svg" loading="lazy" alt="Ecotact Logo"  style="width:100px;"></h3></td>
		    </tr>
		</table>
		<table>
			<tr>
				<td width="47%">
					<h1>{{ __('confirmMail.tax_invoice') }}</h1>
					<p></p>
					<p class="invoicedetails">{{ __('confirmMail.invoice_no') }}. # {{$order['invoice_no']}}<br>
					{{ __('confirmMail.invoice_date') }} : {{\Carbon\Carbon::parse($order['created_at'])->isoFormat('ll')}}</p>
				</td>
				<td>
					<h2>AASHIRVAD INTERNATIONAL </h2>
					<p>NO-18, BLOCK C-2, UGF, ASHOK VIHAR PH-2,<br>
					 DELHI-110052, INDIA<br> 
					 GSTIN - 07AALFA3978J1ZZ<br>
					 E: info@ecotactbags.com</p>
				</td>
			</tr>
		</table>


		<table>
			<thead>
				<tr>
					<th><h3>{{ __('confirmMail.Order Date') }} : {{Carbon::parse($order->created_at)->toFormattedDateString()}}</h3></th>
					<th><h3>{{ __('confirmMail.Order Status') }} : ({{$order['status']}})</h3></th>
				</tr>
				<tr>
					<th><h3>{{ __('confirmMail.b_details') }} :</h3></th>
					<th><h3>{{ __('confirmMail.Shipping Details') }} :</h3></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<p><strong>{{ $order->name }} <br> {{ $order->email }}</strong><br>
							{{ $order->full_address ? $order->full_address :  $order->house_no .','. $order->apertment_no .','. $order->area .','. $order->landmark}}<br>
						{{ $order->s_country, $order->state, $order->city }} <br><strong>Phone:</strong> {{$order->contact_no}} </p>
					</td>
					<td>
						<p><strong>{{ $order->name }} <br> {{ $order->email }}</strong><br>
							{{ $order->full_address ? $order->full_address :  $order->house_no .','. $order->apertment_no .','. $order->area .','. $order->landmark}}<br>
						{{ $order->s_country, $order->state, $order->city }} <br><strong>Phone:</strong> {{$order->contact_no}} </p>
					</td>
				</tr>
			</tbody>
		</table>

		<table>
			<thead>
				<tr>
					<th><h3>{{ __('confirmMail.Payment Method') }}</h3></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{$order->order_type}}</td>
				</tr>
			</tbody>
		</table>

		<table class="table-amount">
			<thead>
				<tr>
					<th><h3>{{ __('confirmMail.product') }}</h3></th>
					<th><h3>{{ __('confirmMail.Size') }}</h3></th>
					<th><h3>{{ __('confirmMail.Price') }}</h3></th>
					<th><h3>{{ __('confirmMail.Qty') }}.</h3></th>
					<th><h3>{{ __('confirmMail.Amount') }}</h3></th>
				</tr>
			</thead>
			<tbody>
				@foreach($order->orderProducts as $orderProduct)
				<tr>
					<td>
					    <p>{{@$orderProduct->stock->product->productDetails[0]['product_name']}}
					    @if($orderProduct->stock->pieces)<br><strong>Pack of : </strong>{{@$orderProduct->stock->pieces}}@endif</p>
					</td>
					<td>@if($orderProduct->stock->size_tag) <strong>{{$orderProduct->stock->size_tag}}</strong> @endif {!! $orderProduct->stock->size!!}</td>
					<td>${{$orderProduct->price}}</td>
					<td>{{$orderProduct->qty}}</td>
					@if($orderProduct->stock->pieces)
					    <td>${{$orderProduct->price *  $orderProduct->qty * $orderProduct->stock->pieces}}</td>
					  @else
					    <td>${{$orderProduct->price * $orderProduct->qty}}</td>
					 @endif
					 
				</tr>
				@endforeach
				<tr>
				    <td></td>
					<td></td>
					<td></td>
					<td colspan="1"><strong>{{ __('confirmMail.Total Amount') }}</strong></td>
					<td>$ @if($order->discount_amt != $order->gross_amt) {{$order->gross_amt}} @else {{$order->net_amt}} @endif</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td colspan="1">@if($order->discount_amt != $order->gross_amt)<strong>Discount</strong>@endif
					</td>
					<td>@if($order->discount_amt != $order->gross_amt) ${{$order->discount_amt}} @else  @endif</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td colspan="1">@if($order->discount_amt != $order->gross_amt)<strong>Payable</strong>@endif</td>
					<td>@if($order->discount_amt != $order->gross_amt) ${{$order->net_amt}} @else  @endif</td>
				</tr>
				<tr>
					<td colspan="5">
						<p class="amountwords" style="text-transform: capitalize;"><strong>{{ __('confirmMail.Amount in Words') }}: {{$wrd}}</strong></p>
					</td>
				</tr>
			</tbody>
		</table>
    
		<p>Shipping details will be shared upon order processing</p><br>
		<p>*{{ __('confirmMail.Inclusive All Taxes') }}*</p>
		
		<div class="logo-bottom">
            <p><strong style="color:#ffa718;">{{ __('confirmMail.Have a question?') }}</strong><br>
                {!! __('confirmMail.feelFee') !!}
            </p>
            <p>
                Visit <a href="https://www.ecotactbags.com" _target="_blank" style="color:#ffa718;">www.ecotactbags.com</a> for more
            </p>
        </div>
  

    

	</div>

    
</body>
</html>