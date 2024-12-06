@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Orders</span> - {{ucfirst(config('app.orderStatus'))}} Orders</h4>
		</div>

	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content" ng-app="myApp" ng-controller="mainController" >
	{{-- <p>Showing Orders for Last 3 months</p> --}}

	<div class="pr-filters mb15" ng-init="setStatus('{{route('orders.index',['OrderStatus' => config('app.orderStatus')])}}')">
		<div class="row">
			<div class="col-lg-4 visible-lg">
				<form class="form-inline" action="{{route('postBulkOrderUpdate',['OrderStatus' => config('app.orderStatus')])}}" method="post">
					@csrf
					<div class="form-group">
						{{ Form::select('bulk_option',[''=> 'Bulk Option'] +$bulkArr,null,['class' => 'form-control']) }}
						{{-- <select class="form-control" name="bulk_option" >
							<option value="">Bulk Actions</option>
							<option value="Shipped">Change status to Shipped</option>
							<option value="Cancelled">Change status to Cancelled</option>
						</select> --}}
					</div>
					<input type="text" name="ids" ng-model="txt" value="" style="display: none;">
					<div class="form-group">
						<button type="submit" class="btn bg-slate">Submit</button>
					</div>
				</form>
			</div>
			<div class="col-lg-5 visible-lg">
				<form class="form-inline" action="{{route('orders.index',['OrderStatus'=> config('app.orderStatus')])}}">
					<div class="form-group">
						<input type="hidden" name="srchBy" value="invoice_no">
						<input type="text" name="srch_val" class="form-control" placeholder="Order Id" required value="{{$request ? $request->srch_val : null}}">
					</div>
					<div class="form-group">
						<button type="submit" class="btn bg-slate">Search</button>
					</div>
				</form>
			</div>
			<div class="col-lg-3">
				<form class="form-inline pull-right" method="get" id="srchStatusForm">
					<div class="form-group">
						{{Form::select('srch_val',$statusArray,null,['class' => 'form-control','required','ng-model' => 'srchbyOrderStatus','ng-change' => "actionUpdate()"])}}
					</div>
				</form>
				
			</div>
		</div>
	</div>

	

	<div class="panel panel-flat">

		<div class="table-responsive table-orders">
			<table class="table table-striped table-products-list">
				<thead>
					<tr>
						<th>
							<input type="checkbox" style="width: 18px; height: 18px;" ng-model="checkall" ng-click="checkUncheckAll('{{json_encode($orders->pluck('id')->all())}}')" ng-checked="checkall">
						</th>
						<th>Order ID</th>
						<th>Date</th>
						<th>Name</th>
						<th>Status</th>
						<th>Delivery Partner</th>
						<th class="text-right">Invoice Amount</th>
					</tr>
				</thead>
				<tbody>

					@forelse($orders as $order)
						<tr>
							<td>
								<label for="{{ $order['id'] }}">
				                    <input type="checkbox" name="selected[]" ng-checked="selection.indexOf({{ $order['id'] }}) > -1" ng-click="toggleSelection({{ $order['id'] }})" value="{{ $order['id'] }}" style="width: 18px; height: 18px;"/>
				                </label>
							</td>
							<td>
								@if(config('app.orderStatus') == 'Pending')
									{{$order->invoice_no}}
								@else
									<a href="{{route('orders.show',['OrderStatus' => config('app.orderStatus'), 'order' => $order->id])}}">{{$order->invoice_no}}</a>
								@endif
							</td>
							<td>{{Carbon::parse($order->created_at)->format('d-m-Y')}}</td>
							<td>{{@$order->user->name}}</td>
							<td>
								@if($order->status == 'Pending')
									<span class="label bg-orange-300">Pending</span>
								@elseif($order->status == 'Confirmed')
									<span class="label bg-success-400">Confirmed</span>
								@elseif($order->status == 'Shipped')
									<span class="label bg-blue">Shipped</span>
								@elseif($order->status == 'Returned')
									<span class="label bg-slate-400">Returned</span>
								@elseif($order->status == 'Refunded')
									<span class="label label-warning">Refund</span>
								@elseif($order->status == 'Cancelled')
									<span class="label label-danger">Cancelled</span>
								@elseif($order->status == 'Delivered')
									<span class="label label-primary">Delivered</span>
								@endif
							</td>
							<td>{{@$order->careerPartner->name}}</td>
							<td>{{@$order->orderProducts()->first()->stock->currency}}{{$order->net_amt}}</td>
						</tr>
					@empty
					    <tr><td>No Orders Found</td></tr>
					@endforelse
				</tbody>
			</table>
		</div>


	</div>
					
	<ul class="pagination pagination-sm mb30">
	  {{$orders->appends($input)->links()}}
	</ul>



	<!-- Footer -->
	@include('admin.adminLayout.copyright')
	<!-- /footer -->
</div>
<!-- /content area -->



@include('admin.adminLayout.footer')