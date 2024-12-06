@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Order</span> - Order Details</h4>
		</div>

	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
	<div class="row">
		<div class="col-md-9">

				<div class="panel panel-flat panel-order-details">
					<div class="panel-body">
						<h2>Order ID : {{$order->invoice_no}} @if($order->status == 'Cancelled') <span class="label label-danger pull-right">{{$order->status}}</span> @else <span class="label bg-blue pull-right">{{$order->status}}</span> @endif</h2>
						<p class="datetime">{{Carbon::parse($order->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a'))}}</p>



						<div class="row">
						    <div class="col-md-6">
								<p class="address">
									<strong>Delivery Address</strong><br>
									<span class="name">{{@$order->name}}</span><br>
									@if($order->full_address)
									    {{$order->full_address}}
									@endif
									@if($order->house_no) {{ $order->house_no }}, @endif @if($order->apertment_no) {{ $order->apertment_no }}, @endif @if($order->area) {{ $order->area }}, @endif @if($order->landmark) {{ $order->landmark }}, @endif<br>
									 	
										@if($order->city) {{$order->city}}, @endif @if($order->state) {{$order->state}}, @endif @if($order->pincode) {{$order->pincode}}, @endif @if($order->country) {{$order->country}} @endif<br>
									Phone: {{$order->contact_no}}
								</p>
							</div>
							<!--<div class="col-md-6">-->
							<!--	<p class="address">-->
							<!--		<strong>Delivery Address</strong><br>-->
							<!--		<span class="name">{{$order->s_full_name}}</span><br>-->
							<!--		{{$order->s_addr1}}, {{$order->s_addr2}}<br>-->
							<!--		{{$order->s_country}},{{$order->s_state}}-->
							<!--		{{$order->s_city}} <br>-->
							<!--		Phone: {{$order->user->phone}}-->
							<!--	</p>-->
							<!--</div>-->
							<div class="col-md-12">
								<p><strong>Email: </strong>{{$order->email}}</p>
								@if($order->tracking_info) <p><strong>Tracking Url: </strong>{{$order->tracking_info}}</p> @else No Tracking Service Assigned @endif
							</div>
						</div>
						
						
					</div><!-- panel body -->

					<div class="table-responsive">
						    <table class="table table-lg">
						        <thead>
						            <tr>
						                <th>Description</th>
						                <th class="col-sm-1">Price</th>
						                <th class="col-sm-1">Qty</th>
						                <th class="col-sm-1">Pack of</th>
						                <th class="col-sm-1">Total</th>
						            </tr>
						        </thead>
						        <tbody>
						        	@forelse($order->orderProducts as $orderProduct)
							            <tr>
							                <td>
							                	<h6 class="no-margin">{{@$orderProduct->stock->product->productDetails()->first()->product_name}}</h6>
							                	<span style="font-size: 9px;">{{@$orderProduct->stock->size }} </span>
							                	<!--<span class="text-muted">SKU: {{$orderProduct->stock->sku}} -  <a href="{{ route('products.edit',$orderProduct->stock->product->id) }}">View</a></span>-->
						                	</td>
							                <td>{{@$orderProduct->stock->currency}}{{$orderProduct->price}}</td>
							                <td>{{$orderProduct->qty}}</td>
							                <td>{{$orderProduct->stock->pieces}}</td>
							                <td class="text-right"><span class="text-semibold">{{@$orderProduct->stock->currency}}{{ round($orderProduct->price * $orderProduct->qty * $orderProduct->stock->pieces,2) }}</span></td>
							            </tr>
						            @empty
						            	<tr><td>No Products Found</td></tr>
						            @endforelse
						            
						        </tbody>
						    </table>
						</div>

						<div class="panel-body">
							<div class="row invoice-payment">
								<div class="col-md-7"></div>
								<div class="col-sm-5">
									<div class="content-group">
										<div class="table-responsive no-border">
											<table class="table table-subtotal">
												<tbody>
												    @if($order->status == 'Pending')
													<tr>
															<th>{{@$order->discount_type}}:</th>
															<td class="text-right">{{@$order->orderProducts()->first()->stock->currency}} {{$order->discount_amt}}</td>
														</tr>
													@else
													@if($order->discount_amt)
														<tr>
															<th>Coupon Discount :</th>
															<td class="text-right">{{@$order->orderProducts()->first()->stock->currency}} {{$order->discount_amt}}</td>
														</tr>
													@endif
													@endif
												    <tr>
														<th>User Discount:</th>
														<td class="text-right">{{@$order->orderProducts()->first()->stock->currency}} {{($order->discount_amt + $order->extra_discount)}} ({{round($order->user_discount_percentage+$order->max_allowed_discount_percentage)}}%)</td>
													</tr>
													
												    @if($order->tax_inclusive > 0)
												    <tr>
														<th>GST:</th>
														<td class="text-right">{{@$order->orderProducts()->first()->stock->currency}} {{$order->tax_inclusive}}</td>
													</tr>
													@endif
													<tr>
														<th>Subtotal:</th>
														<td class="text-right">{{@$order->orderProducts()->first()->stock->currency}} {{$order->gross_amt}}</td>
													</tr>
													
													@if($order->shipping_charges)
														<tr>
															<th>Shipping Charge(with tax for india):</th>
															<td class="text-right">{{@$order->orderProducts()->first()->stock->currency}} {{($order->shipping_charges + $order->shipping_gst)}}</td>
														</tr>
													@endif
													<!--<tr>-->
													<!--	<th>Shipping & Handling Charges:</th>-->
													<!--	<td class="text-right">$ {{@$order->shipping_charges}}</td>-->
													<!--</tr>-->
													<!--<tr>-->
													<!--	<th>Tax: <span class="text-regular">(18%)</span></th>-->
													<!--	<td class="text-right">$ {{round(($order->net_amt/118)*100)}}</td>-->
													<!--</tr>-->
													<tr>
														<th>Total:</th>
														<td class="text-right text-primary"><h5 class="text-semibold">{{@$order->orderProducts()->first()->stock->currency}} {{$order->net_amt}}</h5></td>
													</tr>
												</tbody>
											</table>
										</div>

									
									</div>
								</div>
							</div>
						</div>

				</div>

				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Transaction Details<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
						<div class="heading-elements">
							<ul class="icons-list">
	          		<li><a data-action="collapse" class=""></a></li>
	          	</ul>
	        	</div>
					</div>
					<div class="panel-body">
						Razorpay details<br>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
				</div>

		</div>


		<div class="col-md-3">
			<a href="{{route('invoiceDownloud',['OrderStatus' => config('app.orderStatus'), $order->id])}}" class="btn btn-default btn-block btn-label mb15"><i class="icon-file-pdf position-left"></i> Download Invoice</a>

			@if($order->status != 'Cancelled')
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Order Status <a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
						<div class="heading-elements">
							<ul class="icons-list">
	          					<li><a data-action="collapse" class=""></a></li>
	          				</ul>
	        			</div>
					</div>
					<div class="panel-body" style="display: block;">
						<form action="{{route('orders.update',['OrderStatus' => config('app.orderStatus'), 'order' => $order->id])}}" method="post">
							@method('put')
							@csrf
							<div class="form-group">
								@if($order->status == 'Confirmed')
			                        {{Form::select('status',['' => 'Select Status','Shipped' => 'Shipped','Cancelled' => 'Cancelled'],null,['class' => 'form-control','required' => 'required'])}}
			                    @elseif($order->status == 'Shipped')
			                        {{Form::select('status',['' => 'Select Status','Cancelled' => 'Cancelled','Delivered' => 'Delivered'],null,['class' => 'form-control','required' => 'required'])}}
			                    @elseif($order->status == 'Returned')
			                        {{Form::select('status',['' => 'Select Status','Cancelled' => 'Cancelled','Refunded' => 'Refunded','Shipped' => 'Shipped'],null,['class' => 'form-control','required' => 'required'])}}
			                    @elseif($order->status == 'Refunded')
			                        {{Form::select('status',['' => 'Select Status','Cancelled' => 'Cancelled'],null,['class' => 'form-control','required' => 'required'])}}
			                    @elseif($order->status == 'Delivered')
			                        {{Form::select('status',['' => 'Select Status','Returned' => 'Returned'],null,['class' => 'form-control','required' => 'required'])}}
			                    @elseif($order->status == 'Pending')
			                        {{Form::select('status',['' => 'Select Status','Confirmed' => 'Confirmed'],null,['class' => 'form-control','required' => 'required'])}}
			                    @endif
							</div>
							@if($order->status == 'Confirmed' && $order->carrier_partner == 5)
    							<div class="form-group">
    							    <div class="row">
    							        <div class="col-md-12">
    							            <input type="text" class="form-control" name="breadth" placeholder="Box Breadth">
    							        </div>
    							        <div class="col-md-12">
    							            <input type="text" class="form-control" name="count" placeholder="Box Count">
    							        </div>
    							    </div>
    							    <div class="row" style="margin-top: 5px;">
    							        <div class="col-md-12">
    							            <input type="text" class="form-control" name="height" placeholder="Box Height">
    							        </div>
    							        <div class="col-md-12">
    							            <input type="text" class="form-control" name="length" placeholder="Box Length">
    							        </div>
    							    </div>
    							    <div class="row" style="margin-top: 5px;">
    							        <div class="col-md-12">
    							            <input type="text" class="form-control" name="pickdate" placeholder="Pick Date EX: yyyy-mm-dd">
    							        </div>
    							        <div class="col-md-12">
    							            <input type="text" class="form-control" name="time" placeholder="Pick Time Ex: 1200">
    							        </div>
    							    </div>
    							</div>
							@endif
							<button type="submit" class="btn btn-success btn-block">Update Status</button>
						</form>
					</div>
				</div><!-- panel -->
			@endif
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Tracking Details <a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
					<div class="heading-elements">
						<ul class="icons-list">
          					<li><a data-action="collapse" class=""></a></li>
          				</ul>
        			</div>
				</div>

				<div class="panel-body" style="display: block;">
					<form action="{{route('orders.update',['OrderStatus' => config('app.orderStatus'), 'order' => $order->id])}}" method="post">
						@method('put')
						@csrf
						<div class="form-group">
							{{Form::select('tracking_service',['' => 'Delivery partner']+$delivaryServices,null,['class' => 'form-control','required' => 'required'])}}
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="trackingNumber" placeholder="Tracking Number">
						</div>
						<button type="submit" class="btn bg-slate btn-block">Add Tracking Number</button>
					</form>
				</div>
				

			</div><!-- panel -->

		</div>
	</div>
	<!-- Footer -->
	@include('admin.adminLayout.copyright')
	<!-- /footer -->
</div>
<!-- /content area -->


@include('admin.adminLayout.footer')