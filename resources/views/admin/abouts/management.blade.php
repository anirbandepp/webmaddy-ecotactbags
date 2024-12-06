@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">About Management</span></h4>
		</div>
		<div class="heading-elements">
    		<a href="{{route('managements')}}" class="btn bg-blue heading-btn"><i class="icon-list3"></i> Managements </a>
    		@if($management->id)
    		<a href="{{route('managementImageGet',['management' => $management->id])}}" class="btn bg-blue heading-btn"><i class="icon-plus3"></i> Add Management Images </a>
    		@endif
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
					<h5 class="panel-title">Upload Management</h5>
				</div>
				<div class="panel-body">
					@if($management->id)
					    <form method="post" action="{{route('management',$management->id)}}">
					@else
					    <form method="post" action="{{route('management')}}">
					@endif
					<div class="row">
					    <div class="col-md-6">
					        <div class="form-group">
    							<label class="col-lg-2 control-label text-semibold">Name</label>
    							<div class="col-lg-10">
    								<input type="text" class="form-control" name="name" value="{{$management->id ? $management->name : null}}">
    							</div>
    						</div>
					    </div>
					    <div class="col-md-6">
					        <div class="form-group">
    							<label class="col-lg-2 control-label text-semibold">Designation</label>
    							<div class="col-lg-10">
    								<input type="text" class="form-control" name="designation" value="{{$management->id ? $management->designation : null}}">
    							</div>
    						</div>
					    </div>
					</div>
					<div class="row">
					    <div class="col-md-12">
					        <div class="form-group">
        						<label class="col-lg-1 control-label text-semibold">Description</label>
        						<div class="col-lg-10">
        							<textarea type="text" class="form-control summernote" name="description">{{$management->id ? $management->description : null}}</textarea>
        						</div>
        					</div>
					    </div>
					</div> 
					<div class="row">
					    <div class="col-md-4">
    						<div class="form-group">
    							<label class="col-lg-3 control-label text-semibold">Linkedin</label>
    							<div class="col-lg-9">
    								<input type="text" class="form-control" name="linkedin" value="{{$management->id ? $management->linkedin : null}}">
    							</div>
    						</div>
    					</div>
    					@csrf
    					<div class="col-md-4">
    						<div class="form-group">
    							<label class="col-lg-2 control-label text-semibold">Status</label>
    							<div class="col-lg-10">
    								{{Form::select('active',['1' => 'Enabled', '0' => 'Disabled'],$management->id ? $management->active : old('active'),['class' => 'form-control'])}}
    							</div>
    						</div>
    					</div>
    					<div class="col-md-4">
    					    <button type="submit" class="btn btn-primary">Save</button>
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