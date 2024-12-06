@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Home </span> - {{ @$pageTitle }} Continents</h4>
		</div>

        <div class="heading-elements">
			<a href="{{ route('continents.index') }}" class="btn bg-blue heading-btn"> All Continents</a>
		</div>
	</div>
</div>
<!-- /page header -->




<!-- Content area -->
<div class="content content-product-add">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">{{ @$pageTitle }} Continents<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
					<div class="heading-elements">
						<ul class="icons-list">
          					<li><a data-action="collapse" class=""></a></li>
          				</ul>
        			</div>
				</div>

				<div class="panel-body" style="display: block;">
					@if($continent)
					<form action="{{ route('continents.update',['continent'=>$continent->id])}}" id="formID" method="POST">
						@method('PUT')
					@else
					<form action="{{ route('continents.store') }}"  id="formID" method="POST">
					@endif
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Continents Name" name="name" value="{{ $continent ? $continent->name : old('name') }}">
								</div>
							</div>
                        </div>
                       
						<div class="form-group text-right">
							<button type="submit" class="btn btn-primary">{{ $continent ? 'Update' : 'Add' }} Continents<i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</form>
				</div>
			</div><!-- panel -->

		</div><!-- col 9 -->
	</div>
</div>
<!-- /content area -->


@include('admin.adminLayout.footer')