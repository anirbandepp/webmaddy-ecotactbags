@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Delivery Services</span> - All Services</h4>
		</div>

	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">


    <div class="col-md-5">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">{{$deliveryService->id ? 'Edit Service' : 'Add Service'}}</h5>
            </div>
            <div class="panel-body">
                @if($deliveryService->id)
                    {!! Form::open(['route' => ['postDelivaryService',$deliveryService->id], 'method' => 'post','id'=>"taxForm"]) !!}
                @else
                    {!! Form::open(['route' => ['postDelivaryService'], 'method' => 'post','id'=>"taxForm"]) !!}
                @endif
                    <div class="form-group">
                        <label>Delivery Service Name :</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$deliveryService ? $deliveryService->name : old('name')}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @if($deliveryService->id)
                        <div class="form-group">
                            <label>Slug :</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{$deliveryService ? $deliveryService->slug : old('slug')}}">
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Description :</label>
                        <input type="text" class="form-control @error('details') is-invalid @enderror" name="details" value="{{$deliveryService ? $deliveryService->details : old('details')}}">
                        @error('details')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tracking URL:</label>
                        <input type="text" class="form-control @error('tracking_url') is-invalid @enderror" name="tracking_url" value="{{$deliveryService ? $deliveryService->tracking_url : old('tracking_url')}}">
                        @error('tracking_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Active :</label>
                        {{Form::select('active',[1=>'Active',0=>'Inactive'],$deliveryService ? $deliveryService->active : old('active'),['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn bg-slate">Save Delivery Service</button>
                        <a href="{{ route('getDelivaryService') }}" class="btn bg-warning">Reset</a>
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
    						<th>Service Name</th>
                            <th>Service Slug</th>
    						<th>Description</th>
    						<th>Tracking URL</th>
    						<th>Active</th>
    						<th></th>
    					</tr>
    				</thead>
    				<tbody>
    					@forelse ($deliveryServices as $deliveryService)
        					<tr>
        						<td>{{$deliveryService->name}}</td>
        						<td>{{$deliveryService->slug}}</td>
        						<td>{{$deliveryService->details}}</td>
                                <td>{{$deliveryService->tracking_url}}</td>
        						<td>{!!$deliveryService->active ? '<label class="label bg-success-400">YES</label>' : '<label class="label bg-danger-400">No</label>'!!}</td>
        						<td>
        							<a href="{{route('getDelivaryService',$deliveryService->id)}}" ><i class="icon-pencil"></i></a>
        						</td>
        					</tr>
                        @empty
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