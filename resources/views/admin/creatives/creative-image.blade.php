@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Add Image</span></h4>
		</div>
	</div>
</div>
<!-- /page header -->




<!-- Content area -->
<div class="content content-product-add">

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-flat panel-customer-details">
				<div class="panel-heading">
					<h5 class="panel-title">Upload Creative Images</h5>
				</div>
				<div class="panel-body">
					{!! Form::open(['route' => ['creativeImage',['creative' => $creative1->id]], 'method' => 'post']) !!}
					    <div class="row">
    					    <div class="col-md-4">
        						<div class="form-group">
        							<label class="col-lg-4 control-label text-semibold">Status</label>
        							<div class="col-lg-8">
        								{{Form::select('active',['1' => 'Enabled', '0' => 'Disabled'],$creative1->id ? $creative1->active : old('active'),['class' => 'form-control'])}}
        							</div>
        						</div>
        					</div>
        					<div class="col-md-4">
        						<div class="form-group">
        							<label class="col-lg-2 control-label text-semibold">Link</label>
        							<div class="col-lg-10">
        								<input type="text" class="form-control" name="link" value="{{$creative1->id ? $creative1->link : old('link')}}">
        							</div>
        						</div>
        					</div>
        					<div class="col-md-4">
    					        <button type="submit" class="btn btn-primary">Save</button>
    					    </div>
    					</div>
					{{Form::close()}}
					
				</div>
				<div class="panel-body">
					{!! Form::open(['route' => ['creativeImage',['creative' => $creative1->id]], 'method' => 'post','files' =>true]) !!}
					    <div class="row">
					        <div class="col-md-9">
        						<div class="form-group">
        							<label class="col-lg-4 control-label text-semibold">Creative upload:</label>
        							<div class="col-lg-8">
        								<input type="file" class="file-input" name="image" accept="image/*">
        							</div>
        						</div>
        					</div>
        					@if($creative1->url)
        					<div class="col-md-3">
    					       <img src="{{$creative1->url}}" class="img-responsive">
    					    </div>
    					    @endif
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