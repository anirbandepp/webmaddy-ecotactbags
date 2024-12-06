
<hr>
	<strong>
		<p>You have an enquiry received from {{$c_name}}</p>
	</strong>
<hr>
<h4>Sender Name: {{$c_name}} , </h4>
@if(@$utm) <p>Utm_medium: <strong> {{$utm}}</strong></p> @endif
<p>Email: <strong> {{$c_email}}</strong></p>
<p>Country: <strong> {{$c_country}}</strong></p>
<p>Company:  <strong> {{$company}}</strong></p>
<p>Product:  <strong> {{$product}}</strong></p>
<br>
<p>{{$c_message}}</p>
<br>
<br>
<p>Warm Regards,</p>
<p><strong>{{$c_name}}</strong>	</p>