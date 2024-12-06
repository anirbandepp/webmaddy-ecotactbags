@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Add Image</span> - {{config('app.product')->name}}</h4>
		</div>
	</div>
</div>
<!-- /page header -->




<!-- Content area -->
<div class="content content-product-add">
	<div class="row">
		<div class="col-md-12">
			<div class="mb15 pull-right">
				<a href="{{route('images.index',['productId' => config('app.product')->id])}}" class="btn btn-sm border-slate text-slate-600 btn-flat"><i class="icon-images3 position-left"></i> Images</a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-flat panel-customer-details">
				<div class="panel-heading">
					<h5 class="panel-title">Upload Product Images</h5>
				</div>
				<div class="panel-body">
					{!! Form::open(['route' => ['images.store', 'productId' => config('app.product')->id], 'method' => 'post','id' => 'editUserFrm','files' =>true]) !!}
						<div class="form-group">
							<label class="col-lg-2 control-label text-semibold">Multiple file upload:</label>
							<div class="col-lg-10">
								<input type="file" class="file-input" multiple="multiple" name="image[]" accept="image/*">
							</div>
						</div>
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	@include('admin.adminLayout.copyright')
	<!-- /footer -->
</div>
<!-- /content area -->


@include('admin.adminLayout.footer')