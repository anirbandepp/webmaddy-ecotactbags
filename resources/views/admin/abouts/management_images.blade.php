@include('admin.adminLayout.header')

	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Images</span> - {{$management->name}}</h4>
			</div>
		</div>
	</div>
	<!-- /page header -->


	<!-- Content area -->
	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="mb15 pull-right">
					<a href="{{route('managementImageGet',['management' => $management->id])}}" class="btn btn-sm border-slate text-slate-600 btn-flat"><i class="icon-add position-left"></i> Add Image</a>
					<a href="{{ route('managementGet',$management->id) }}" class="btn btn-sm border-slate text-slate-600 btn-flat">Edit</a>
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
									<th>Base Image</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@forelse($managementImages as $image)
									<tr>
										<td>
											<a href="#"><img src="{{$image->url}}" class="pr-img"></a>
										</td>
										<td>
											<div class="checkbox">
												<label>
													@if($image->base_image)
														<span class="label border-left-success label-striped">Base Image</span>
													@else
														<a href="{{route('makeBaseImageManagement',['management' => $management->id, 'image' => $image->id])}}"> <span class="label border-right-warning label-striped">Set Base Image</span> </a>
													@endif
													
												</label>
											</div>
										</td>
										<td>
											<ul class="icons-list ">
											
												<li>
													{!! Form::open(['route' => ['managementImageDelete', 'image' => $image->id],'method'=>'DELETE','id'=>'dltImgFrm'.$image->id]) !!}
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

			{{-- <ul class="pagination pagination-sm mb30">
			  {{managementImages->appends($input)->links()}}
			</ul> --}}
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
