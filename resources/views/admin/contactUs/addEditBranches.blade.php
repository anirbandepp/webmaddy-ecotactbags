@include('admin.adminLayout.header')

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><span class="text-semibold">Home </span> - {{ @$pageTitle }} Branches</h4>
        </div>

        <div class="heading-elements">
            <a href="{{ route('branches.index') }}" class="btn bg-blue heading-btn"> All Branches</a>
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
                    <h5 class="panel-title">{{ @$pageTitle }} Branches<a class="heading-elements-toggle"><i
                                class="icon-more"></i></a></h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse" class=""></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body" style="display: block;">
                    @if ($branch)
                        <form action="{{ route('branches.update', ['branch' => $branch->id]) }}" id="formID"
                            method="POST">
                            @method('PUT')
                        @else
                            <form action="{{ route('branches.store') }}" id="formID" method="POST">
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="country_name">Country Name</label>
                                <input type="text" class="form-control @error('country_name') is-invalid @enderror"
                                    id="country_name" placeholder="Enter Branch Country Name" name="country_name"
                                    value="{{ $branch ? $branch->country_name : old('country_name') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Continent</label>
                                {{ Form::select('continent_id', ['' => 'Choose One'] + $continents, $branch ? $branch->continent_id : null, ['class' => 'form-control', 'id' => 'continent_id']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email1">Email</label>
                                <input type="email" class="form-control @error('email1') is-invalid @enderror"
                                    id="email1" placeholder="Enter Branch Email" name="email1"
                                    value="{{ $branch ? $branch->email1 : old('email1') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email2">Email(Optional)</label>
                                <input type="email" class="form-control @error('email2') is-invalid @enderror"
                                    id="email2" placeholder="Enter Branch Email" name="email2"
                                    value="{{ $branch ? $branch->email2 : old('email2') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="manager_name">Manager Name</label>
                                <input type="text" class="form-control @error('manager_name') is-invalid @enderror"
                                    id="manager_name" placeholder="Enter Branch Manager Name" name="manager_name"
                                    value="{{ $branch ? $branch->manager_name : old('manager_name') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                    id="company_name" placeholder="Enter Branch Company Name" name="company_name"
                                    value="{{ $branch ? $branch->company_name : old('company_name') }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone1">Phone</label>
                                <input type="text" class="form-control @error('phone1') is-invalid @enderror"
                                    id="phone1" placeholder="Enter Branch Phone" name="phone1"
                                    value="{{ $branch ? $branch->phone1 : old('phone1') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone2">Phone(Optional)</label>
                                <input type="text" class="form-control @error('phone2') is-invalid @enderror"
                                    id="phone2" placeholder="Enter Branch Phone" name="phone2"
                                    value="{{ $branch ? $branch->phone2 : old('phone2') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="house_no">Address</label>
                                <input type="text" class="form-control @error('house_no') is-invalid @enderror"
                                    id="house_no" placeholder="Enter Branch Address" name="house_no"
                                    value="{{ $branch ? $branch->house_no : old('house_no') }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="state_name">State Name</label>
                                <input type="text" class="form-control @error('state_name') is-invalid @enderror"
                                    id="state_name" placeholder="Enter Branch State Name" name="state_name"
                                    value="{{ $branch ? $branch->state_name : old('state_name') }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">{{ $branch ? 'Update' : 'Add' }} Branches<i
                                class="icon-arrow-right14 position-right"></i></button>
                    </div>
                    </form>
                </div>
            </div><!-- panel -->

        </div><!-- col 9 -->
    </div>
</div>
<!-- /content area -->


@include('admin.adminLayout.footer')
