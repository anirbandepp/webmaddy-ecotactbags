@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">All Managements</span> </h4>
		</div>
		<div class="heading-elements">
    		<a href="{{route('managementGet')}}" class="btn bg-blue heading-btn"><i class="icon-plus3"></i> Add Management </a>
    	</div>

	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <div class="col-md-12"> 
    	<div class="panel panel-flat">
    		<div class="table-responsive table-orders">
    			<table class="table table-striped table-products-list">
    				<thead>
    					<tr>
    						<th>Name</th>
                            <th>Designation</th>
                            <th>LinkedIn</th>
                            <th>Active</th>
    						<th>Action</th>
    					</tr>
    				</thead>
    				<tbody>
    					@forelse ($managements as $management)
        					<tr>
        						<td>{{$management->name}}</td>
                                <td>{{$management->designation}}</td>
                                <td>{{$management->linkedin}}</td>
                                <td>{!!$management->active ? '<label class="label bg-success-400">YES</label>' : '<label class="label bg-danger-400">No</label>'!!}</td>
        						<td>
        							<a href="{{route('managementGet',['management'=>$management->id])}}"><i class="icon-pencil"></i></a>
        							<a href="{{route('managementImages',['management' => $management->id])}}" ><i class="icon-images3"></i></a>
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
	  {{$managements->links()}}
	</ul> --}}



	<!-- Footer -->
    @include('admin.adminLayout.copyright')
    <!-- /footer -->
</div>
<!-- /content area -->
@include('admin.adminLayout.footer')