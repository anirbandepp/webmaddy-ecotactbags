@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Home </span> - {{ @$pageTitle }} Continents</h4>
		</div>

        <div class="heading-elements">
			<a href="{{ route('continents.create') }}" class="btn bg-blue heading-btn"><i class="icon-plus3"></i> Add New Continents</a>
		</div>
	</div>
</div>
<!-- /page header -->




<div class="content">
	<div class="pr-filters mb15">
		<div class="row">
			
				<form method="get" action="{{ route('continents.index') }}" class="form-inline">
				    <div class="col-lg-3 visible-lg">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Continent Name" value="{{ request('name') }}">
					</div>
					</div>
					<div class="col-lg-1 visible-lg">
					<div class="form-group">
						<button type="submit" class="btn bg-slate">Search</button>
					</div>
					</div>
					<div class="col-lg-1 visible-lg">
					<div class="form-group">
                        <a href="{{ route('continents.index') }}" class="btn bg-danger">Reset</a>
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
						<th>Continent Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>	
					@forelse ($continents as $continent)
                        <tr>
                            <td>{{ $continent->name }}</td>
                            
                            <td>
                                <ul class="icons-list pull-right">
                                    <li><a href="{{ route('continents.edit',['continent' => $continent->id]) }}" data-popup="tooltip" data-original-title="Edit"><i class="icon-pencil4"></i></a></li>
                                    <li><a href="javascript:void(0)" data-popup="tooltip" onclick="deleteFun('delContinents{{ $continent->id }}')" data-original-title="Delete"><i class="icon-bin"></i></a></li>
                                </ul>
                            </td>
							<form id="delContinents{{ $continent->id }}" action="{{ route('continents.destroy',['continent' => $continent->id]) }}" method='POST'>
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
	    {{ $continents->appends(Request::only(['name']))->render("pagination::bootstrap-4")  }}
	</ul>
</div>

@include('admin.adminLayout.footer')