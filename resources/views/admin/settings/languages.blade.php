@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Manage Languages</span> </h4>
		</div>

	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <div class="col-md-12">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Add Language</h5>
            </div>
            <div class="panel-body">
                @if($language->id)
                    {!! Form::open(['route' => ['languages.update',$language->id], 'method' => 'put','id'=>"languageForm",'files'=>true]) !!}
                @else
                    {!! Form::open(['route' => ['languages.store'], 'method' => 'post','id'=>"languageForm",'files'=>true]) !!}
                @endif
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Language Name :</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$language ? $language->name : old('name')}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Currency :</label>
                                <input type="text" class="form-control @error('currency') is-invalid @enderror" name="currency" value="{{$language ? $language->currency : old('currency')}}">
                                @error('currency')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Image :</label>
                                <input type="file" class="form-control @error('currency') is-invalid @enderror" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn bg-slate">Save Language</button>
                        <a href="{{ route('languages.index') }}" class="btn bg-warning">Reset</a>
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
                            <th>Currency</th>
                            <th>Slug</th>
                            <th>Logo</th>
    						<th>Action</th>
    					</tr>
    				</thead>
    				<tbody>
    					@forelse ($languages as $lan)
        					<tr>
        						<td>{{$lan->name}}</td>
                                <td>{{$lan->currency}}</td>
                                <td>{{$lan->slug}}</td>
                                <td>@if($lan->image) <img src="{{asset('languages/'.$lan->image)}}"> @else Not Uploaded @endif</td>
        						<td>
                                    @if($lan->is_default != 'Y')
                                        <a href="{{route('languages.edit',['language'=>$lan->id])}}"><i class="icon-pencil"></i></a>
                                    @endif
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



	<!-- Footer -->
    @include('admin.adminLayout.copyright')
    <!-- /footer -->
</div>
<!-- /content area -->
@include('admin.adminLayout.footer')