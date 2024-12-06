@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Excel Downloud</span> - {{ucfirst(config('app.orderStatus'))}} Orders</h4>
		</div>

	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
	{{-- <p>Showing Orders for Last 3 months</p> --}}
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5>Excel Downloud</h5>
                </div>
                <div class="panel-body">
                	<form class="form-inline" action="{{route('exportOrders',['OrderStatus' => config('app.orderStatus')])}}" method="post">
						@csrf
						<input type="text" class="form-control" name="date_range" id="reportrange">
						<div class="form-group">
							<button type="submit" class="btn bg-slate">Submit</button>
						</div>
					</form>
                </div>
            </div>
        </div>
        <!-- Footer -->
				@include('admin.adminLayout.copyright')
    </div>

@include('admin.adminLayout.footer')