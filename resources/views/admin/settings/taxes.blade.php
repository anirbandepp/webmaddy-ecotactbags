@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Manage Taxes</span> </h4>
            <p class="text-muted">These Tax will be applied in the cart. GST (For India) will be added from Configuration Page.</p>
		</div>

	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
    <div class="col-md-4">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Add Tax</h5>
            </div>
            <div class="panel-body">
                @if($taxSlab->id)
                    {!! Form::open(['route' => ['postTaxSlabs',$taxSlab->id], 'method' => 'post','id'=>"taxForm"]) !!}
                @else
                    {!! Form::open(['route' => ['postTaxSlabs'], 'method' => 'post','id'=>"taxForm"]) !!}
                @endif
                    <div class="form-group">
                        <label>Tax Name :</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$taxSlab ? $taxSlab->name : old('name')}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Percent Rate :</label>
                        <input type="text" class="form-control @error('percent_rate') is-invalid @enderror" name="percent_rate" value="{{$taxSlab ? $taxSlab->percent_rate : old('percent_rate')}}">
                        @error('percent_rate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status :</label>
                        {{Form::select('active',[1=>'Active',0=>'Inactive'],$taxSlab ? $taxSlab->active : old('active'),['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn bg-slate">Save Tax</button>
                        <a href="{{ route('getTaxSlabs') }}" class="btn bg-warning">Reset</a>
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
    						<th>Tax Name</th>
    						<th>Tax Rate</th>
    						<th>Active</th>
    						<th>Action</th>
    					</tr>
    				</thead>
    				<tbody>
    					@forelse ($taxes as $tax)
    					<tr>
    						<td>{{$tax->name}}</td>
    						<td>{{$tax->percent_rate}}</td>
    						<td>{!!$tax->active ? '<label class="label bg-success-400">YES</label>' : '<label class="label bg-danger-400">No</label>'!!}</td>
    						<td>
    							<a href="{{route('getTaxSlabs',['taxSlab'=>$tax->id])}}"><i class="icon-pencil"></i></a>
    						</td>
    					</tr>
    					@empty
                        @endforelse
    				</tbody>
    			</table>
    		</div>
    	</div>
    </div>

	<ul class="pagination pagination-sm mb30">
	  {{$taxes->links()}}
	</ul>



	<!-- Footer -->
    @include('admin.adminLayout.copyright')
    <!-- /footer -->
</div>
<!-- /content area -->
@include('admin.adminLayout.footer')
