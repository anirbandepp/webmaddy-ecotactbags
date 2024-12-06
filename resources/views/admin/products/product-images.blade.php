@include('admin.adminLayout.header')

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Images</span> - {{config('app.product')->name}}</h4>
			</div>
		</div>
	</div>
	<!-- /page header -->


	<!-- Content area -->
	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="mb15 pull-right">
					<a href="{{route('images.create',['productId' => config('app.product')->id])}}" class="btn btn-sm border-slate text-slate-600 btn-flat"><i class="icon-add position-left"></i> Add Image</a>
					<a href="{{route('stock.index',['productId' => config('app.product')->id])}}" class="btn border-slate text-slate-600 btn-flat"><i class="icon-stack3 position-left"></i> Manage Stocks</a>
					<a href="{{ route('products.edit',config('app.product')->id) }}" class="btn btn-sm border-slate text-slate-600 btn-flat">Edit Product</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">

					<div class="table-responsive ">
						<table class="table table-striped table-products-list table-stocks">
							<thead>
								<tr>
									<th><i class="icon-image4"></i></th>
									<th>Alt</th>
									<th>Active</th>
									<th>Date</th>
									<th>Base Image</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@forelse($images as $image)
									<tr>
										<td>
											<a href="#"><img src="{{asset('product_images/small/'.$image->url)}}" class="pr-img"></a>
										</td>
										<td>
											<input type="text" name="alt{{$image->id}}" value="{{$image->alt}}" class="form-control" id="alt{{$image->id}}" readonly="readonly"> 
											
										</td>
										<td>
											
											<span id="oldStatus{{$image->id}}">
												{!!$image->active ? '<span class="badge badge-success">YES</span>' : '<span class="badge badge-danger">No</span>'!!}
											</span>
                                    		{{Form::select('active',['1'=>'Active','0'=>'In-Active'],$image->active,['id'=>'active'.$image->id,'class'=> 'form-control','style' => 'display:none;'])}} 
										</td>
										<td>
											<input type="text" name="publish_at{{$image->id}}" value="{{\Carbon::parse($image->publish_at)->toDateString()}}" class="form-control date-picker" id="publish_at{{$image->id}}" readonly="readonly"> 
											
										</td>
										<td>
											<div class="checkbox">
												<label>
													@if($base_img == $image->url)
														<span class="label border-left-success label-striped">Base Image</span>
													@else
														<a href="{{route('makeBaseImage',['productId' => config('app.product')->id, 'image' => $image->id])}}"> <span class="label border-right-warning label-striped">Set Base Image</span> </a>
													@endif
													
												</label>
											</div>
										</td>
										<td>
											<ul class="icons-list pull-right">
												<a href="javascript:void(0)" id="editImage{{$image->id}}" onclick="startSaveImage({{$image->id}})" title="Edit"><i class="icon-pencil4"></i></a>
        										<a href="javascript:void(0)" style="display:none;" onclick="saveimage('{{$image->id}}','{{route('images.update',['productId'=> config('app.product')->id, 'image' => $image->id])}}')" id="saveImage{{$image->id}}" data-popup="tooltip" title="Save"><i class="icon-floppy-disk"></i></a>
        										<i class="icon-spinner9 spinner" id="loading" style="display: none;"></i>
												<li>
													{!! Form::open(['route' => ['images.destroy','productId'=> config('app.product')->id, 'image' => $image->id],'method'=>'DELETE','id'=>'dltImgFrm'.$image->id]) !!}
														<a  onclick="deleteImage('dltImgFrm'+{{$image->id}})" href="javascript:void(0);" data-popup="tooltip" data-original-title="Delete"><i class="icon-trash"></i></a>
			                                    	{!! Form::close() !!}
                                    			</li>
											</ul>
										</td>
									</tr>
								@empty
									<tr><td>No Data Found</td></tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<ul class="pagination pagination-sm mb30">
			  {{$images->appends($input)->links()}}
			</ul>
		</div>
		<!-- Footer -->
		@include('admin.adminLayout.copyright')
		<!-- /footer -->
	</div>
	<!-- /content area -->

<script>
	function deleteImage(id) {
		swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!" + id,
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

</script>
@include('admin.adminLayout.footer')
