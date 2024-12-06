@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Export</span> - All Exports</h4>
		</div>

	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
	<p>Export Orders</p>

	<div class="pr-filters mb15">
		<div class="row">
			<div class="col-lg-12 visible-lg">
			
			</div>
		</div>
	</div>



	<div class="panel-body" style="display: block;">
		<div class="row">
		    <form action="{{route('exportOrders',['OrderStatus'=>'all'])}}" method="post">
		        @csrf
		        <div class="col-md-4">
					<div class="form-group">
						<label>From Date : </label>
						<input type="text" name="start_date" class="form-control date-picker @error('start_date') is-invalid @enderror"  value="{{old('start_date')}}">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group" >
						<label>To Date : </label>
						<input type="text" name="end_date" class="form-control date-picker @error('end_date') is-invalid @enderror" value="{{old('end_date')}}">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					    <label></label>
						<button type="submit" class="btn btn-success btn-block">Export Order</button>
					</div>
				</div>
		    </form>
				
		</div>
	</div>



	<!-- Footer -->
	@include('admin.adminLayout.copyright')
	<!-- /footer -->
</div>
<!-- /content area -->

<!-- /content area -->
@include('admin.adminLayout.footer')