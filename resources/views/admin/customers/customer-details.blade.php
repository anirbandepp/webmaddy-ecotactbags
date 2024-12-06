@include('admin.adminLayout.header')

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Customer Details</span> </h4>
			</div>

			
		</div>
	</div>
	<!-- /page header -->


	<!-- Content area -->
	<div class="content" ng-app="myApp" ng-controller="mainController">

		<div class="row">
			<div class="col-md-8">
				<!-- Simple panel -->

				{!! Form::open(['route' => ['customers-management.update', $user->id], 'method' => 'put','id' => 'editUserFrm']) !!}
					<div class="panel panel-flat panel-customer-details">
						<div class="panel-heading">
							<h5 class="panel-title">Personal Info</h5>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<label>Name :</label>
								</div>
								<div class="col-md-9">
									<input type="text" class="form-control" name="name" value="{{$user->name}}">
								</div>
							</div><!-- row -->
							<div class="row">
								<div class="col-md-3">
									<label>Email :</label>
								</div>
								<div class="col-md-5 col-xs-10">
									{{Form::label('email', $user->email,['class'=>'form-control'])}}
								</div>
								<div class="col-md-4 col-xs-2">
									{!! $user->email_verified_at ?
										'<i class="icon-checkmark4 text-success" data-popup="tooltip" data-original-title="Verified"></i>' :
										'<i class="icon-checkmark4 text-success" data-popup="tooltip" data-original-title="Not Verified"></i>'
									!!}
								</div>
							</div><!-- row -->
							<div class="row">
								<div class="col-md-3">
									<label>Mobile no :</label>
								</div>
								<div class="col-md-5">
									{{Form::label('email', $user->phone,['class'=>'form-control'])}}
								</div>
								<div class="col-md-4">
									<div class="form-group radio">
										<label class="radio-inline" style="margin-top: 0px;">
											<input type="radio" class="styled" name="phone_verified_at" value="1" @if($user->phone_verified_at) checked="checked" @endif>
											Verified
										</label>

										<label class="radio-inline">
											<input type="radio" class="styled" name="phone_verified_at" value="0" @if(!$user->phone_verified_at) checked="checked" @endif>
											Not Verified
										</label>
									</div>
								</div>
							</div><!-- row -->
							<div class="row">
								<div class="col-md-3">
									<label>Distributor :</label>
								</div>
								<div class="col-md-4">
									<div class="form-group radio">
										<label class="radio-inline" style="margin-top: 0px;">
											<input type="radio" class="styled" name="dristibutor" value="1" @if($user->dristibutor) checked="checked" @endif>
											Yes
										</label>

										<label class="radio-inline">
											<input type="radio" class="styled" name="dristibutor" value="0" @if(!$user->dristibutor) checked="checked" @endif>
											No
										</label>
									</div>
								</div>
							</div><!-- row -->
						</div>
					</div>
					<!-- /simple panel -->
					<div class="form-group">
						<button class="btn btn-success btn-lg" type="submit"><i class="icon-floppy-disk position-left"></i> Save information</button>
					</div>
				{{Form::close()}}


				<!-- Simple panel
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Delivery Details</h5>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-products-list">
							<thead>
								<tr>
									<th>Address</th>
									<th>Pin</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@forelse(@$user->addresses()->get() as $userAddress)
									<tr>
										<td>{{$userAddress->addr_line2}}</td>
										<td>{{$userAddress->pin}}</td>
										<td>
											<a href="javascript:void(0)" data-form="{{route('userAddressUpdate',['userAddressId'=> $userAddress->id])}}" ng-click="edAddress($event,{{$userAddress}}); "><i class="icon-pencil"></i></a>
										</td>
									</tr>
								@empty
									<tr><td>No Records Found</td></tr>
								@endforelse

							</tbody>
						</table>
					</div>
				</div>


					<div id="ProfileEdit" class="panel panel-flat panel-customer-details" ng-show="ProfileEditShow">
						<div class="panel-heading">
							<h5 class="panel-title">Edit Address</h5>
						</div>
						<form class="panel-body" action="" id="ediAddFrmId" ng-submit="editAdressSubmit()">
							<div class="row">
								<div class="col-md-3">
									<label>Address Line 1 :</label>
								</div>
								<div class="col-md-9">
									<input type="text" class="form-control" name="addr_line1" ng-model="formData.addr_line1">
			                        @error('addr_line1')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<label>Address Line 2 :</label>
								</div>
								<div class="col-md-9">
									<input type="text" class="form-control" name="addr_line2" ng-model="formData.addr_line2">
			                        @error('addr_line2')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<label>State :</label>
								</div>
								<div class="col-md-9">
									{{Form::select('state_id',[]+$states,null,['class'=>'form-control','ng-model'=>"formData.state_id"])}}
			                        @error('state_id')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<label>City :</label>
								</div>
								<div class="col-md-9">
									<input type="text" class="form-control" name="city" ng-model="formData.city">
			                        @error('city')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<label>PIN :</label>
								</div>
								<div class="col-md-9">
									<input type="text" class="form-control" name="pin" ng-model="formData.pin">
			                        @error('pin')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                        @enderror
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">								
									<button class="btn btn-primary" type="submit">submit</button>
								</div>
								<div class="col-md-9">
									<a href="javascript:void(0);" ng-click="ProfileEditShow = false;"> Cancel </a>
								</div>
							</div>
						</form>
					</div> -->
				<!-- /simple panel -->

			</div>

			<div class="col-md-4">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Customer Statistics</h5>
						<div class="heading-elements">
							<ul class="icons-list">
				          		<li><a data-action="collapse"></a></li>
				          	</ul>
        				</div>
					</div>
					<div class="panel-body">
						<div class="row text-center">
							<div class="col-md-6">
								<div class="content-group no-margin">
								    @if($user->totalPurchaseInr > 0)
									<h5 class="text-semibold no-margin"><i class="icon-cash4 position-left text-green"></i> ₹ {{$user->totalPurchaseInr}}</h5>
									@endif
									@if($user->totalPurchaseDol > 0)
									<h5 class="text-semibold no-margin"><i class="icon-cash4 position-left text-green"></i> $ {{$user->totalPurchaseDol}}</h5>
									@endif
									<span class="text-muted text-size-small">Lifetime Purchase</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="content-group no-margin">
									<h5 class="text-semibold no-margin"><i class="icon-cart position-left text-info"></i> {{$user->orderCount ? $user->orderCount : 0 }}</h5>
									<span class="text-muted text-size-small">Total Orders</span>
								</div>
							</div>
						</div>
					</div>
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td><strong>Last Login</strong></td>
									<td>:{{ \Carbon::parse($user->last_login_at)->toDateTimeString()}}</td>
								</tr>
								<!--<tr>-->
								<!--	<td><strong>Last Order Placed</strong></td>-->
								<!--	<td>: {{ \Carbon::parse($user->last_order_at)->toDateTimeString()}}</td>-->
								<!--</tr>-->
								<!--<tr>-->
								<!--	<td><strong>Last Order Value</strong></td>-->
								<!--	<td>: {{$user->last_order_amt ? $user->last_order_amt : 0 }}</td>-->
								<!--</tr>-->
							</tbody>
						</table>
					</div>
				</div><!-- panel -->

				{{-- <div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Favourites</h5>
						<div class="heading-elements">
							<ul class="icons-list">
				          		<li><a data-action="collapse"></a></li>
				          	</ul>
        				</div>
					</div>
					<table class="table table-products-list">
						<thead>
							<tr>
								<th>Product</th>
								<th>Added</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><a href="#" target="_blank">Product Name Here one</a></td>
								<td>3 Days Ago</td>
							</tr>
							<tr>
								<td><a href="#" target="_blank">Product Name Here one</a></td>
								<td>3 Days Ago</td>
							</tr>
							<tr>
								<td><a href="#" target="_blank">Product Name Here one</a></td>
								<td>3 Days Ago</td>
							</tr>
						</tbody>
					</table>

					<div class="panel-body">
						<a href="#" class="btn bg-slate">Send Marketing Mail</a>
						<a href="#" class="btn btn-link">View Format</a>
					</div>

				</div>

				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">In Cart</h5>
						<div class="heading-elements">
							<ul class="icons-list">
				          		<li><a data-action="collapse"></a></li>
				          	</ul>
        				</div>
					</div>
					<table class="table table-products-list">
						<thead>
							<tr>
								<th>Product</th>
								<th>Added</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><a href="#" target="_blank">Product Name Here one</a></td>
								<td>3 Days Ago</td>
							</tr>
							<tr>
								<td><a href="#" target="_blank">Product Name Here one</a></td>
								<td>3 Days Ago</td>
							</tr>
							<tr>
								<td><a href="#" target="_blank">Product Name Here one</a></td>
								<td>3 Days Ago</td>
							</tr>
						</tbody>
					</table>

					<div class="panel-body">
						<a href="#" class="btn bg-slate">Send Marketing Mail</a>
						<a href="#" class="btn btn-link">View Format</a>
					</div>
				</div> --}}

				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Coupon</h5>
						<div class="heading-elements">
							<ul class="icons-list">
				          		<li><a data-action="collapse"></a></li>
				          	</ul>
        				</div>
					</div>
					
					<div class="panel-body">
						@forelse($user->userTokens()->get() as $userToken)
							<div class="token-box">
								<h4>{{$userToken->code}} <a href="{{route('deleteToken',$userToken->id)}}" class="label label-danger pull-right" style="margin-left: 5px;"><i class="icon-trash"></i></a> {!! $userToken->used_at ? '<label class="label label-success pull-right">Used</label>' : '<label class="label label-danger pull-right">Un-used</label>' !!}</h4>
								<p>Discount of <strong>{{$userToken->type == 'amt' ? 'FLAT ' : '%'}}{{$userToken->value}}</strong> on min purchase Amount of <strong>{{$userToken->min_cart_amt}}</strong>,<br> Expires on <strong>{{\Carbon::parse($userToken->expiry_at)->toDateString('Y-m-d')}}</strong> </p>
							</div>
						@empty
							<div class="token-box">
								<label>No Token Assigned</label>
							</div>
						@endforelse
						<h5 style="font-weight: 500; font-size: 14px;">Generate Token</h5>
						<div class="row new-token-box">
							<form ng-submit="generateToken('{{route('createToken',['customer'=>$user->id])}}')" id="tokenFrm">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" name="value" ng-model="formData.value" placeholder="Discount value">
									</div>
								</div>
								@csrf
								<div class="col-md-6">
									<div class="form-group">
										<select class="form-control" name="type" ng-model="formData.type">
											<option value="" disabled selected>Choose Type</option>
											<option value="amt">Amount</option>
											<option value="percent">Percentage</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" name="min_cart_amt" ng-model="formData.min_cart_amt" placeholder="Min Cart Value">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control date-picker" name="expiry_at" ng-model="formData.expiry_at" placeholder="Expiry">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<button class="btn btn-default" type="submit">Generate</button>
										<i class="icon-spinner9 spinner" ng-show="spinner"></i>
									</div>
								</div>
							</form>
						</div>

						<!--<div class="mt15">-->
						<!--	<a href="#" class="btn bg-slate">Send Marketing Mail</a>-->
						<!--	<a href="#" class="btn btn-link">View Format</a>-->
						<!--</div>-->
					</div>
				</div><!-- panel -->

                <!-- Swarnadeep -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Discount</h5>
						<div class="heading-elements">
							<ul class="icons-list">
				          		<li><a data-action="collapse"></a></li>
				          	</ul>
        				</div>
					</div>
					
					<div class="panel-body">
							<div class="token-box">
								@if($user->dis_val)
								<p>Discount is <strong>{{$user->dis_val}} {{$user->dis_type == '0' ? '%' : 'Flat' }}</strong><a href="{{route('deleteDiscount',$user->id)}}" class="label label-danger pull-right" style="margin-left: 5px;"><i class="icon-trash"></i></a> </p>
								@else
								<label>No Discount Assigned</label>
								@endif
							</div>
						<h5 style="font-weight: 500; font-size: 14px;">Generate Discount</h5>
						<div class="row new-token-box">
							<form action="{{route('createDiscount',$user->id)}}"  method='post' id="disFrm">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" name="dis_val" id="dis_val" placeholder="Discount value" required>
									</div>
								</div>
								@csrf
								<div class="col-md-6">
									<div class="form-group">
										<select class="form-control" name="dis_type" required>
											<option value="1" disabled selected>Choose Type</option>
											<option value="1">Amount</option>
											<option value="0">Percentage</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<button class="btn btn-default" type="submit">Generate</button>
										<i class="icon-spinner9 spinner" ng-show="spinner"></i>
									</div>
								</div>
							</form>
						</div>

						<!--<div class="mt15">-->
						<!--	<a href="#" class="btn bg-slate">Send Marketing Mail</a>-->
						<!--	<a href="#" class="btn btn-link">View Format</a>-->
						<!--</div>-->
					</div>
				</div><!-- panel -->
				<!-- Swarnadeep end -->
			</div>
		</div>
		<!-- Footer -->
		@include('admin.adminLayout.copyright')
		<!-- /footer -->
		<div class="ldr" ng-show="loading"><div class="loader" style="right: 156px;"></div></div>
	</div>
	<!-- /content area -->
@include('admin.adminLayout.footer')