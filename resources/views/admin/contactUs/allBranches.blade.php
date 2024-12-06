@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Home </span> - {{ @$pageTitle }} Branches</h4>
		</div>

        <div class="heading-elements">
			<a href="{{ route('branches.create') }}" class="btn bg-blue heading-btn"><i class="icon-plus3"></i> Add New Branches</a>
		</div>
	</div>
</div>
<!-- /page header -->




<div class="content">
	<div class="pr-filters mb15">
		<div class="row">
			
				<form method="get" action="{{ route('branches.index') }}" class="form-inline">
					<div class="col-md-3">
						<div class="form-group">
							<label for="name">Continent</label>
							{{ Form::select('continent_id', [''=>'Choose One']+$continents,request('continent_id') ? request('continent_id') : null, ['class'=>'form-control', 'id'=>'continent_id']) }}
						</div>
					</div>
					<div class="col-lg-1 visible-lg">
					<div class="form-group">
						<button type="submit" class="btn bg-slate">Search</button>
					</div>
					</div>
					<div class="col-lg-1 visible-lg">
					<div class="form-group">
                        <a href="{{ route('branches.index') }}" class="btn bg-danger">Reset</a>
					</div>
					</div>
					
					
				</form>
                
			
		</div>
	</div>

	<div class="panel panel-flat">
		<div class="table-responsive ">
			<table class="table table-striped table-products-list">
				<thead>
					<tr>
						
						<th>Country Name</th>
						<th>Continent Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Branch Manager</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>	
					@forelse ($branches as $branch)
                        <tr>
                            <td>{{ @$branch->country_name }}</td>
                            <td>{{ @$branch->continent->name }}</td>
                            <td>{{ @$branch->email1 }} @if($branch->email2) | {{@$branch->email2}} @endif</td>
                            <td>{{ @$branch->phone1 }} @if($branch->phone2) | {{@$branch->phone2}} @endif</td>
                            <td>{{ @$branch->manager_name }}</td>
                            <td>{{ @$branch->company_name }} @if(@$branch->company_name),@endif {{ @$branch->house_no }}</td>
                            
                            <td>
                                <ul class="icons-list pull-right">
                                    <li><a href="{{ route('branches.edit',['branch' => $branch->id]) }}" data-popup="tooltip" data-original-title="Edit"><i class="icon-pencil4"></i></a></li>
                                    <li><a href="javascript:void(0)" data-popup="tooltip" onclick="deleteFun('delBranches{{ $branch->id }}')" data-original-title="Delete"><i class="icon-bin"></i></a></li>
                                </ul>
                            </td>
							<form id="delBranches{{ $branch->id }}" action="{{ route('branches.destroy',['branch' => $branch->id]) }}" method='POST'>
								@method('DELETE')
								@csrf
							</form>
                        </tr>
						
                    @empty
                        <td>No Data Found</td>
                    @endforelse
                </tbody>
			</table>
		</div>
	</div>
					
	<ul class="pagination pagination-sm mb30">
	    {{ $branches->appends(Request::only(['continent_id']))->render("pagination::bootstrap-4")  }}
	</ul>
</div>

@include('admin.adminLayout.footer')