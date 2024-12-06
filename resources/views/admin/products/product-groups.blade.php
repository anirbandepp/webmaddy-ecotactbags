@include('admin.adminLayout.header')

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Groups</span></h4>
				<p class="text-muted">Manage Group For Products.</p>
			</div>
		</div>
	</div>
	<!-- /page header -->


	<!-- Content area -->
	<div class="content">

		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-flat">
					<div class="panel-heading">
						@if($group->id)
	                      <h5 class="panel-title">Edit Group </h5>
	                    @else
	                      <h5 class="panel-title">Add New Group Products</h5>
	                    @endif
                    </div>
                    <div class="panel-body">
						@if($group->id)
                            {!! Form::open(['route' => ['product-groups.update','product_group' => $group->id], 'method' => 'PUT','id' => 'groupFrm','files'=>true]) !!}
                        @else
                            {!! Form::open(['route' => ['product-groups.store'], 'method' => 'post','id' => 'groupFrm','files'=>true]) !!}
                        @endif
                        	<div class="form-group">
								<label>Name :</label>
								<input type="text" name="name" class="form-control" placeholder="Attribute Name"value="{{$group->name ? $group->name : old('name')}}" required="true">
							</div>
							<div class="form-group">
								<label>Products :</label>
								{{Form::select('products[]',[]+$products,$group ? $group->products()->pluck('product_id')->all() : null,['class'=>'form-control chosen-select','multiple' => true])}}
							</div>
							<div class="form-group">
								<button type="submit" class="btn bg-slate">Submit</button>
								<a href="{{ route('product-groups.index') }}" class="btn bg-warning">Reset</a>
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
									<th>Group Name</th>
									<th>Products</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@forelse($groups as $group)
								<tr>
									<td>{{$group->name}}</td>
									<td>
										@forelse($group->products()->get() as $groupProduct)
											<a href="{{ route('products.edit',$groupProduct->id) }}"><span class="label border-right-success label-striped label-striped-right">{{$groupProduct->name}}</span></a>
										@empty

										@endforelse
									</td>
									<td><a href="{{ route('product-groups.edit',$group->id) }}"><i class=" icon-pencil7"></i></a></td>
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