@include('admin.adminLayout.header')

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Attributes</span> - Attribute Set</h4>
				<p class="text-muted">Attributes let you define extra product data, such as size or color.</p>
			</div>
		</div>
	</div>
	<!-- /page header -->


	<!-- Content area -->
	<div class="content" ng-app="myApp" ng-controller="mainController">

		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-flat">
					<div class="panel-heading" ng-init="init('{{config('app.attribute')->type}}');">
						@if($attributeValue->id)
	                      <h5 class="panel-title">Edit Attribute Value </h5>
	                    @else
	                      <h5 class="panel-title">Add New Attribute Values</h5>
	                    @endif
                    </div>
                    <div class="panel-body">
						@if($attributeValue->id)
                            {!! Form::open(['route' => ['postAttributeValue','attributeId' => config('app.attribute')->id, 'attributeValue' => $attributeValue->id], 'method' => 'post','id' => 'attributeData','files'=>true]) !!}
                        @else
                            {!! Form::open(['route' => ['postAttributeValue','attributeId' => config('app.attribute')->id], 'method' => 'post','id' => 'attributeData','files'=>true]) !!}
                        @endif
                        	<div class="form-group">
                        		<label>Attribute :</label>
                        		<label class="form-control">{{config('app.attribute')->name}}</label>

                        	</div>
                        	<div class="form-group">
								<label>Name :</label>
								<input type="text" name="name" class="form-control" placeholder="Attribute Value"value="{{$attributeValue->name ? $attributeValue->name : old('name')}}">
							</div>
							@if($attributeValue->id)
								<div class="form-group">
									<label>Slug :</label>
									<input type="text" name="slug" class="form-control" placeholder="Slug" value="{{$attributeValue->slug ? $attributeValue->slug : old('slug')}}">
								</div>
							@endif
							<div class="form-group" ng-hide="!valueShow">
								<label>Choose Color :</label><br>
								<input type="text" class="form-control colorpicker-show-input" name="colorPicker" data-preferred-format="hex" value="{{$attributeValue->value ? $attributeValue->value : old('value')}}">
							</div>

							<div class="form-group" ng-show="imageShow">
								<label>Select Image : @if($attributeValue->id && $attributeValue->attribute->type == 'img')<img class="img-responsive" src="{{ asset($attributeValue->value) }}" style="width: 47px; height:35px;">@endif</label>
								<input type="file" name="fileToUpload" id="fileToUpload" class="form-control required">
								<p>Recommended Size 100x100 Pixels for best display</p>
							</div>

							<div class="form-group">
								<button type="submit" class="btn bg-slate">Save Attribute Set</button>
								<a href="{{ route('attributeValues',['attributeId' => config('app.attribute')->id]) }}" class="btn btn-warning">Reset</a>
							</div>
						{{Form::close()}}
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<!-- Simple panel -->
				<div class="panel panel-flat">
					<div class="table-responsive table-products-list">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Attribute</th>
									<th>Value</th>
									<th>Name</th>
									<th>Slug</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@forelse($attributeValues as $attributeValue)
								<tr>
									<td>{{$attributeValue->attribute->name}}</td>
									<td>
                                        @if($attributeValue->attribute->type == 'color')
                                            <div style="background-color:{{ $attributeValue->value }}; width:36px; height:23px"></div>
                                        @elseif($attributeValue->attribute->type == 'img')
                                            <img class="img-responsive" src="{{ asset($attributeValue->value) }}" style="width:auto; height:100px;">
                                        @endif
                                    </td>
									<td>{{$attributeValue->name}}</td>
									<td>{{$attributeValue->slug}}</td>
									<td><a href="{{ route('attributeValues',['attributeId' => config('app.attribute')->id, 'attributeValue' => $attributeValue->id]) }}"><i class=" icon-pencil7"></i></a></td>
								</tr>
								@empty
									<tr><td>No Records Found</td></tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
				<!-- /simple panel -->
			</div>
		</div>





		<!-- Footer -->
		@include('admin.adminLayout.copyright')
		<!-- /footer -->

	</div>
<!-- /content area -->
@include('admin.adminLayout.footer')
