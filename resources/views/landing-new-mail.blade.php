
<hr>
	<strong>
		<p>You have an enquiry received from {{$fullName}}</p>
	</strong>
<hr>
<h4>Sender Name: {{$fullName}} , </h4>
@if(@$utm) <p>Utm_medium: <strong> {{$utm}}</strong></p> @endif
<p>Email: <strong> {{$email}}</strong></p>
<p>Company: <strong> {{$company_name}}</strong></p>
<p>Country:  <strong> {{$country}}</strong></p>
<p>Product:  <strong> {{$products}}</strong></p>
<br>
<br>
<p>Warm Regards,</p>
<p><strong>{{$fullName}}</strong>	</p>