@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Manage Sizes</span> </h4>
		</div>

		<div class="heading-elements">
			<a href="{{route('getSizes')}}" class="btn bg-blue heading-btn" ><i class="icon-plus3"></i> Add New Size</a>
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
                    <h5 class="panel-title">Add New Size</h5>
                </div>
                <div class="panel-body">
                    @if($size->id)
                        {!! Form::open(['route' => ['postSize','size' => $size->id], 'method' => 'post','id' => 'sizeForm']) !!}
                    @else
                        {!! Form::open(['route' => ['postSize'], 'method' => 'post','id' => 'sizeForm']) !!}
                    @endif
                        <div class="form-group">
                            <label>Size</label>
                            <input type="text" class="form-control @error('value') is-invalid @enderror" name="value" value="{{$size->value ? $size->value : old('value')}}">
                            @error('value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if($size->id)
                            <!--<div class="form-group">-->
                            <!--    <label>Slug</label>-->
                            <!--    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{$size->slug ? $size->slug : old('slug')}}">-->
                            <!--    @error('slug')-->
                            <!--        <span class="invalid-feedback" role="alert">-->
                            <!--            <strong>{{ $message }}</strong>-->
                            <!--        </span>-->
                            <!--    @enderror-->
                            <!--</div>-->
                        @endif
                        <div class="form-group">
                            <button type="submit" class="btn bg-slate">Save Size</button>
                            <a href="{{ route('getSizes') }}" class="btn bg-warning">Reset</a>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
        <div class="col-md-8">
        	<div class="panel panel-flat">
        		<div class="table-responsive table-orders">
        			<table class="table table-striped table-products-list">
        				<thead>
        					<tr>
        						<th>Size</th>
        						<th>Slug</th>
        						<th>Action</th>
        					</tr>
        				</thead>
        				<tbody>

        					@forelse ($sizes as $size)
        					<tr>
        						<td>{{$size->value}}</td>
        						<td>{{$size->slug}}</td>
        						<td>
        							<a href="{{route('getSizes',['size'=>$size->id])}}"><i class="icon-pencil"></i></a>
        						</td>
        					</tr>
        					@empty
                            @endforelse
        				</tbody>
        			</table>
        		</div>
        	</div>
        					
        	<ul class="pagination pagination-sm mb30">
        	  {{$sizes->links()}}
        	</ul>
        </div>
    </div>


	<!-- Footer -->
    @include('admin.adminLayout.copyright')
    <!-- /footer -->
</div>
<!-- /content area -->


@include('admin.adminLayout.footer')