@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Shipping Charges</span> - All Charges</h4>
		</div>

	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">


    <div class="col-md-5">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">{{$ShippingCharge->id ? 'Edit ' : 'Add '}}</h5>
            </div>
            <div class="panel-body">
                @if($ShippingCharge->id)
                    {!! Form::open(['route' => ['postShippingCharge',$ShippingCharge->id], 'method' => 'post','id'=>"taxForm"]) !!}
                @else
                    {!! Form::open(['route' => ['postShippingCharge'], 'method' => 'post','id'=>"taxForm"]) !!}
                @endif
                    <div class="form-group">
                        <label>Amount :</label>
                        <input type="text" class="form-control @error('amt') is-invalid @enderror" name="amt" value="{{$ShippingCharge ? $ShippingCharge->amt : old('amt')}}">
                        @error('amt')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Rate(Tax including) :</label>
                        <input type="text" class="form-control @error('tax_inclusive_rate') is-invalid @enderror" name="tax_inclusive_rate" value="{{$ShippingCharge ? $ShippingCharge->tax_inclusive_rate : old('tax_inclusive_rate')}}">
                        @error('tax_inclusive_rate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Active :</label>
                        {{Form::select('active',[1=>'Active',0=>'Inactive'],$ShippingCharge ? $ShippingCharge->active : old('active'),['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn bg-slate">Save Delivery Charge</button>
                        <a href="{{ route('getShippingCharges') }}" class="btn bg-warning">Reset</a>
                    </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    <div class="col-md-7">
    	<div class="panel panel-flat">
    		<div class="table-responsive table-orders">
    			<table class="table table-striped table-products-list">
    				<thead>
    					<tr>
    						<th>Amount</th>
                            <th>Rate(Including Tax)</th>
    						<th>Active</th>
    						<th>Action</th>
    					</tr>
    				</thead>
    				<tbody>
    					@forelse ($ShippingCharges as $ShippingCharge)
        					<tr>
        						<td>{{$ShippingCharge->amt}}</td>
        						<td>{{$ShippingCharge->tax_inclusive_rate}}</td>
        						<td>{!!$ShippingCharge->active ? '<label class="label bg-success-400">YES</label>' : '<label class="label bg-danger-400">No</label>'!!}</td>
        						<td>
        							<a href="{{route('getShippingCharges',$ShippingCharge->id)}}" ><i class="icon-pencil"></i></a>
        						</td>
        					</tr>
                        @empty
                            <tr><td>No Charges Found</td></tr>
                        @endforelse
    				</tbody>
    			</table>
    		</div>
            {{$ShippingCharges->links()}}
    	</div>
    </div>
	<!-- Footer -->
    @include('admin.adminLayout.copyright')
    <!-- /footer -->
</div>
<!-- /content area -->

@include('admin.adminLayout.footer')