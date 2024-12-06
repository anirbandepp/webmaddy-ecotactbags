@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Customers</span> - All Customers</h4>
		</div>

	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
	<p>Showing Orders for Last 3 months</p>

	<div class="pr-filters mb15">
		<div class="row">
			<div class="col-lg-6 visible-lg">
				<form class="form-inline">
					<div class="form-group">
						<input type="text" class="form-control" name="search_value" placeholder="search" value="{{$request->search_value}}">
					</div>
					<div class="form-group">
						{{Form::select('search_by',[''=>'select','name'=>'Name','email'=>'Email','phone'=>'Phone'],$request->search_by,['class'=>'form-control'])}}
					</div>
					<div class="form-group">
						<button type="submit" class="btn bg-slate">Submit</button>
					</div>
					<div class="form-group">
						<a href="{{route('customers-management.index')}}" class="btn btn-default">Reset</a>
					</div>
					
					
					
					
					{{--<div class="form-group">
						<a href="{{route('userExportExcel',['OrderStatus'=>'all'])}}" class="btn btn-default">Export Excel</a>
					</div>--}}

				</form>
			</div>
			<div class="col-lg-6 visible-lg">
    	        <form class="form-inline" action="{{route('userExportExcel',['OrderStatus'=>'all'])}}" method="get">
    					<div class="form-group">
    						<input type="text" name="from_date" class="form-control date-picker @error('from_date') is-invalid @enderror"  value="{{old('from_date')}}" placeholder="Form Date">
    					</div>
    					<div class="form-group" >
    						<input type="text" name="to_date" class="form-control date-picker @error('to_date') is-invalid @enderror" value="{{old('to_date')}}" placeholder="To Date">
    					</div>
    					<div class="form-group">
    						<button type="submit" class="btn btn-success btn-block">Export Customer</button>
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
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Order Count</th>
						<th>Total Spent</th>
					</tr>
				</thead>
				<tbody>
					@forelse($users as $user)

						<tr>
						    <td>{{$user->id}}</td>
							<td>
								<a href="{{route('customers-management.edit',$user->id)}}">{{$user->name}}</a>
							</td>
							<td>{{$user->email}} {!!$user->email_verified_at ? '<i class="icon-checkmark2 text-danger"></i>' : '<i class="icon-checkmark2 text-success"></i>'!!}</td>
							<td>{{$user->phone}}</td>
							<td>{{$user->orderCount ? $user->orderCount : 0}}</td>
							<td>@if($user->totalPurchaseInr > 0)
							    ₹ {{$user->totalPurchaseInr}}
							    @endif
							    @if($user->totalPurchaseDol > 0)
							    $ {{$user->totalPurchaseDol}}
							    @endif
							</td>
						</tr>
					@empty
						<tr><td>No Records Found</td></tr>
					@endforelse
				</tbody>
			</table>
		</div>


	</div>

	<ul class="pagination pagination-sm mb30">
	  {{$users->appends(request()->all)->links()}}
	</ul>



	<!-- Footer -->
	@include('admin.adminLayout.copyright')
	<!-- /footer -->
</div>
<!-- /content area -->

<!-- /content area -->
@include('admin.adminLayout.footer')
