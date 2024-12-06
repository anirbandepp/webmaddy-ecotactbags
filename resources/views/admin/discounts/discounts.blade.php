@include('admin.adminLayout.header')
<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">{{ucfirst(config('app.discountType'))}} Discounts</span> </h4>
		</div>

		<div class="heading-elements">
			<a href="#" class="btn bg-blue heading-btn" data-toggle="modal" data-target="#addDiscountModal"><i class="icon-plus3"></i> Add New Discount</a>
		</div>

	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

	<div class="pr-filters mb15">
		<div class="row">
			<div class="col-lg-7 visible-lg">
				<form class="form-inline" action="#" method="get">
					<div class="form-group">
						<input type="text" class="form-control" name="name" placeholder="Search by Name" value="{{  @$request->name }}">
					</div>
					<div class="form-group">
						<button type="submit" class="btn bg-slate">Submit</button>
					</div>
					<div class="form-group">
						<a href="{{ route('discounts.index',['discountType' => config('app.discountType')]) }}" class="btn btn-default">Reset</a>
					</div>	

				</form>
			</div>

			<div class="col-lg-5">
				<form class="form-inline pull-right" action="" method="get">
					<div class="form-group">
						{{ Form::select('filter',['' => 'Filter By', 'active' => 'Active', 'inactive' => 'Inactive', 'expired' => 'Expired'],@$request->filter,['class' => "form-control",'onchange' => "this.form.submit();"]) }}
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
						<th>Name</th>
						<th>Discount</th>
						<th>Min Cart Value</th>
						<th>Expires</th>
						<th>Description</th>
						<th>Active</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@forelse($discounts as $discount)
						<tr>
							<td>{{ $discount->name }}</td>
							<td>{!! $discount->type == 'percent' ? $discount->value.'%' : '₹'.$discount->value !!}</td>
							<td>₹{{ $discount->min_cart_amt }}</td>
							<td>
								{{ Carbon::parse($discount->expiry_date)->isoFormat('MMMM Do YYYY, h:mm:ss a') }}</td>
							<td>{{ $discount->details }}</td>
							<td>
								{!! Form::open(['route' => ['discounts.update', 'discountType' => config('app.discountType'),'discount'=> $discount->id],'method'=>'put','id'=>'statusDis'.$discount->id]) !!}
								{{-- @method('post') --}}
									@if($discount->active)
										<a onclick="statusChange('statusDis'+{{$discount->id}})" href="javascript:void(0);"><span class="label bg-success-400">YES</span></a>
									@else
										<a onclick="statusChange('statusDis'+{{$discount->id}})" href="javascript:void(0);"><span class="label bg-danger-400">No</span></a>
									@endif
								{!! Form::close() !!}
							</td>
							<td>
								{!! Form::open(['route' => ['discounts.destroy', 'discountType' => config('app.discountType'),'discount'=> $discount->id],'method'=>'DELETE','id'=>'deleteDis'.$discount->id]) !!}

									<a  onclick="deleteDiscount('deleteDis'+{{$discount->id}})" href="javascript:void(0);" data-popup="tooltip" data-original-title="Delete"><i class="icon-trash"></i></a>
                            	{!! Form::close() !!}
							</td>
						</tr>
					@empty
						<tr><td>No Discounts Found</td></tr>
					@endforelse
				</tbody>
			</table>
		</div>


	</div>
					
	<ul class="pagination pagination-sm mb30">
	  {{ $discounts->appends($input)->links() }}
	</ul>









	<!-- Footer -->
		@include('admin.adminLayout.copyright')
	<!-- /footer -->
</div>
<!-- /content area -->



<!-- Modal -->
<div id="addDiscountModal" class="modal fade " role="dialog">
  <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content modal-stock">
      <div class="modal-header bg-slate">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add {{ucfirst(config('app.discountType'))}} Discount</h4>
      </div>
      	<form action="{{ route('discounts.store',['discountType' => config('app.discountType')]) }}" method="post" id="cartDiscount">
      		@csrf
      		<div class="modal-body">
		    	<div class="form-group row">
		    		<div class="col-md-4">
		    			<label>Rule Name</label>
		    		</div>
		    		<div class="col-md-8">
		    			<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Rule Name">
		    			@error('name')
				            <span class="invalid-feedback" role="alert">
				              <strong>{{ $message }}</strong>
				            </span>
				        @enderror
		    		</div>
		    	</div>
		    	<div class="form-group row">
		    		<div class="col-md-4">
		    			<label>Description</label>
		    		</div>
		    		<div class="col-md-8">
		    			<input type="text" class="form-control @error('details') is-invalid @enderror" name="details" placeholder="Enter Decription">
		    		</div>
		    		@error('details')
			            <span class="invalid-feedback" role="alert">
			              <strong>{{ $message }}</strong>
			            </span>
			        @enderror
		    	</div>
		    	<div class="form-group row">
		    		<div class="col-md-4">
		    			<label>Discount Value</label>
		    		</div>
		    		<div class="col-md-4">
		    			<input type="text" class="form-control @error('value') is-invalid @enderror" name="value" placeholder="Enter Discount Value">
		    		</div>
		    		@error('value')
			            <span class="invalid-feedback" role="alert">
			              <strong>{{ $message }}</strong>
			            </span>
			        @enderror
		    		<div class="col-md-4">
		    			<select class="form-control" name="type">
		    				<option value="percent">Percentage</option>
		    				<option value="amt">Amount</option>
		    			</select>
		    		</div>
		    	</div>

		    	<div class="form-group row">
		    		<div class="col-md-4">
		    			<label>Min Cart Value</label>
		    		</div>
		    		<div class="col-md-8">
		    			<input type="text" class="form-control @error('min_cart_amt') is-invalid @enderror" name="min_cart_amt" placeholder="Enter Minimum Cart">
		    		</div>
		    		@error('min_cart_amt')
			            <span class="invalid-feedback" role="alert">
			              <strong>{{ $message }}</strong>
			            </span>
			        @enderror
		    	</div>
		    	

		    	<div class="form-group row">
		    		<div class="col-md-4">
		    			<label>Expires on</label>
		    		</div>
		    		<div class="col-md-8">
		    			<input type="text" class="form-control date-picker @error('expiry_at') is-invalid @enderror" name="expiry_at">
		    		</div>
		    		@error('expiry_at')
			            <span class="invalid-feedback" role="alert">
			              <strong>{{ $message }}</strong>
			            </span>
			        @enderror
		    	</div>


		    	<div class="form-group row">
		    		<div class="col-md-4">
		    			<label>Active</label>
		    		</div>
		    		<div class="col-md-8">
		    			{{ Form::select('active',['1' => 'Yes', '0' => 'No'],old('active'),['class' => 'form-control']) }}
		    		</div>
		    	</div>
		    </div>
		    <div class="modal-footer">
		        <button type="submit" class="btn btn-primary">Add Discount</button>
		    </div>
		</form>
    </div>
  </div>
</div>

<script>
	@if (count($errors) > 0)
	    $('#addDiscountModal').modal('show');
	@endif
	function deleteDiscount(id) {
		swal({
            title: "Are you sure?",
            text: "You will not be able to recover this Discount!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF7043",
            confirmButtonText: "Yes, delete it!"
        },
        function(isConfirm){
		  if (isConfirm) {
		    $('#'+id).submit();
		  } else {
		    swal("Cancelled", "Your imaginary file is safe :)", "error");
		  }
		});
	}
	function statusChange(id) {
		$('#'+id).submit();
	}

</script>
@include('admin.adminLayout.footer')

