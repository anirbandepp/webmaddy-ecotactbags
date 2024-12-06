@include('admin.adminLayout.header')

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Configuration</span> - Global Settings </h4>
			</div>

			
		</div>
	</div>
	<!-- /page header -->


	<!-- Content area -->
	<div class="content ">

		<div class="row">
			<div class="col-md-8">
				
				<div class="panel panel-flat panel-order-details">
					<div class="panel-body">
						<h2>{{ config('companyconfig.name') }}</h2>
						<p class="datetime">{{ config('companyconfig.tax_name') }}: {{ config('companyconfig.tax_registration_no') }}</p>
						

						<div class="row">
							<div class="col-md-6">
								<p class="address">
									<strong>Registered Address</strong><br>
									{{ config('companyconfig.tax_name') }} <br>
									Address Line 1<br>
									Address Line 2<br>
									City, State<br>
									PIN - pin
								</p>
							</div>
							<div class="col-md-6">
								<p class="address">
									<strong>GSTIN Settings</strong><br>
									GSTN: {{ config('companyconfig.tax_registration_no') }}<br>
									GST Tax applicable : YES<br>
									GST Registration: West Bengal <br>
									IGST: 5%<br>
									SGST: 2.5%<br>
									CGST: 2.5%<br>
									GST Included in product price: YES
								</p>
							</div>
						</div>
						
						
					</div><!-- panel body -->	
				</div>


				<div class="panel panel-flat panel-order-details">
					<div class="panel-heading">
						<h5 class="panel-title">Contact Details<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
					</div>

				

						<table class="table">
							<tbody>
								<tr>
									<td>Contact Phone</td>
									<td>:</td>
									<td>{{ config('companyconfig.phone') }}</td>
								</tr>
								<tr>
									<td>Contact Email</td>
									<td>:</td>
									<td>{{ config('companyconfig.order_email') }}</td>
								</tr>
								<tr>
									<td>Order Emails (Not Displayed)</td>
									<td>:</td>
									<td>{{ config('companyconfig.order_email') }}</td>
								</tr>
							</tbody>	
						</table>

					</div>

					<div class="panel panel-flat panel-order-details">
					<div class="panel-heading">
						<h5 class="panel-title">Social Media Links<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
					</div>

						<table class="table">
							<tbody>
								<tr>
									<td>Facebook</td>
									<td>:</td>
									<td>https://www.facebook.com</td>
								</tr>
								<tr>
									<td>Instagram</td>
									<td>:</td>
									<td>https://www.instagram.com</td>
								</tr>
								<tr>
									<td>Twitter</td>
									<td>:</td>
									<td>https://www.facebook.com</td>
								</tr>
								<tr>
									<td>Youtube</td>
									<td>:</td>
									<td>https://www.instagram.com</td>
								</tr>
								<tr>
									<td>Pinterest</td>
									<td>:</td>
									<td>https://www.facebook.com</td>
								</tr>
								<tr>
									<td>Linkedin</td>
									<td>:</td>
									<td>https://www.instagram.com</td>
								</tr>
								<tr>
									<td>Quora</td>
									<td>:</td>
									<td>https://www.instagram.com</td>
								</tr>
								
							</tbody>	
						</table>

					</div>


				<div class="alert alert-info alert-bordered alert-rounded">
						 To change this configuration, contact <a href="https://www.webmaddy.com" target="_blank">Webmaddy</a> 
				</div>
				

			</div>

			<div class="col-md-4">
				

			</div>
		</div>

		







		<!-- Footer -->
		@include('admin.adminLayout.copyright')

	</div>
	<!-- /content area -->


@include('admin.adminLayout.footer')