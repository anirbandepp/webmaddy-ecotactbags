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
			<div class="mb15 pull-right">
				<a href="{{route('workspaceImages')}}" class="btn btn-sm border-slate text-slate-600 btn-flat"><i class="icon-images3 position-left"></i> Workspace Images</a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-flat panel-customer-details">
				<div class="panel-heading">
					<h5 class="panel-title">Upload Workspace Images</h5>
				</div>
				<div class="panel-body">
				    @if($workspace->id)
				        {!! Form::open(['route' => ['workspaceImage',['workspace' => $workspace->id]], 'method' => 'post','files' =>true]) !!}
				    @else
				        {!! Form::open(['route' => ['workspaceImage'], 'method' => 'post','files' =>true]) !!}
				    @endif
					{!! Form::open(['route' => ['workspaceImage'], 'method' => 'post','files' =>true]) !!}
					<div class="row">
					    <div class="col-md-4">
    						<div class="form-group">
    							<label class="col-lg-2 control-label text-semibold">Status</label>
    							<div class="col-lg-10">
    								{{Form::select('active',['1' => 'Enabled', '0' => 'Disabled'],$workspace->id ? $workspace->active : old('active'),['class' => 'form-control'])}}
    							</div>
    						</div>
    					</div>
    					<div class="col-md-4">
    						<div class="form-group">
    							<label class="col-lg-2 control-label text-semibold">Priority</label>
    							<div class="col-lg-10">
    								<input type="number" class="form-control" name="priority" value="{{$workspace->id ? $workspace->priority : old('priority')}}">
    							</div>
    						</div>
    					</div>
    					@if($workspace->id) 
    					<div class="col-md-4">
    					    <div class="form-group">
    					        <button type="submit" class="btn btn-primary">Save</button>
    					    </div>
    					</div>
    				    @endif
					</div>
					@if(!$workspace->id)  
					<div class="form-group">
						<label class="col-lg-2 control-label text-semibold">Multiple file upload:</label>
						<div class="col-lg-10">
							<input type="file" class="file-input" multiple="multiple" name="images[]" accept="image/*">
						</div>
					</div>
					@endif
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