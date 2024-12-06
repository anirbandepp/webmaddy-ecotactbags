@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Manage Categories</span> </h4>
		</div>

	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <div class="col-md-12">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Add Category</h5>
            </div>
            <div class="panel-body">
                @if($category->id)
                    {!! Form::open(['route' => ['postCategory',$category->id], 'method' => 'post','id'=>"categoryForm"]) !!}
                @else
                    {!! Form::open(['route' => ['postCategory'], 'method' => 'post','id'=>"categoryForm"]) !!}
                @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category Name :</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$category ? $category->name : old('name')}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category Details :</label>
                                <input type="text" class="form-control @error('details') is-invalid @enderror" name="details" value="{{$category ? $category->details : old('details')}}">
                                @error('details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Parent :</label>
                                {{Form::select('parent_id',[''=>'Select']+$parentCats,$category->parent_id ? $category->parent_id : old('parent_id'),['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status :</label>
                                {{Form::select('active',[1=>'Active',0=>'Inactive'],$category ? $category->active : old('active'),['class'=>'form-control'])}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image :</label>
                                {{Form::file('img',['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Meta Title :</label>
                                <input type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{$category ? $category->meta_title : old('meta_title')}}">
                                @error('meta_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Meta Descp :</label>
                                <input type="text" class="form-control @error('meta_desc') is-invalid @enderror" name="meta_desc" value="{{$category ? $category->meta_desc : old('meta_desc')}}">
                                @error('meta_desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Meta Keys :</label>
                                <input type="text" class="form-control @error('meta_keys') is-invalid @enderror" name="meta_keys" value="{{$category ? $category->meta_keys : old('meta_keys')}}">
                                @error('meta_keys')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn bg-slate">Save Category</button>
                        <a href="{{ route('allCategories') }}" class="btn bg-warning">Reset</a>
                    </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    <div class="col-md-12"> 
    	<div class="panel panel-flat">
    		<div class="table-responsive table-orders">
    			<table class="table table-striped table-products-list">
    				<thead>
    					<tr>
    						<th>Name</th>
                            <th>Slug</th>
                            <th>Details</th>
                            <th>Parent</th>
                            <th>Status</th>
    						<th>Image</th>
    						<th>Seo Details</th>
    						<th>Action</th>
    					</tr>
    				</thead>
    				<tbody>
    					@forelse ($categories as $cat)
        					<tr>
        						<td>{{$cat->name}}</td>
                                <td>{{$cat->slug}}</td>
                                <td>{{$cat->details}}</td>
                                <td>{{@$cat->parent->name}}</td>
                                <td>{!!$cat->active ? '<label class="label bg-success-400">YES</label>' : '<label class="label bg-danger-400">No</label>'!!}</td>
        						<td>{{$cat->img}}</td>
        						<td> <strong>Meta Title: </strong> {{@$cat->meta_title}} <br><strong>Meta Desc: </strong> {{@$cat->meta_desc}}<br><strong>Meta Keys: </strong> {{@$cat->meta_keys}}</td>
        						<td>
        							<a href="{{route('allCategories',['category'=>$cat->id])}}"><i class="icon-pencil"></i></a>
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
	  {{$categories->links()}}
	</ul>



	<!-- Footer -->
    @include('admin.adminLayout.copyright')
    <!-- /footer -->
</div>
<!-- /content area -->
@include('admin.adminLayout.footer')