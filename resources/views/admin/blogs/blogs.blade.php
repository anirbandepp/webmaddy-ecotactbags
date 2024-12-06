@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Manage Blogs</span> </h4>
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
    						<!--<th>Title</th>-->
          <!--                  <th>Desc</th>-->
                            <th>Image</th>
                            <th>Fullview Image</th>
                            <!--<th>Date</th>-->
                            <th>Status</th>
    						<th>Action</th>
    					</tr>
    				</thead>
    				<tbody>
    					@forelse ($blogs as $blog)
        					<tr>
        						<!--<td>{{$blog->title}}</td>-->
              <!--                  <td>{{$blog->short_desc ?? $blog->desc}}</td>-->
                                <td><img src="{{asset('blogs/'.$blog->image)}}" style="width: 100px; height: 100px;"></td>
                                <td><img src="{{asset('blogs/fullview/'.$blog->fullview_image)}}" style="width: 100px; height: 100px;"></td>
                                <!--<td>{{$blog->date}}</td>-->
                                <td>{!!$blog->status ? '<label class="label bg-success-400">YES</label>' : '<label class="label bg-danger-400">No</label>'!!}</td>
        						<td>
        							<a href="{{route('blogs.edit',['blog'=>$blog->id])}}"><i class="icon-pencil"></i></a>
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
	  {{$blogs->links()}}
	</ul>



	<!-- Footer -->
    @include('admin.adminLayout.copyright')
    <!-- /footer -->
</div>
<!-- /content area -->
@include('admin.adminLayout.footer')