@include('admin.adminLayout.header')

<style>
    .err {
        display: block;
        color: red;
    }

    .d-none {
        display: none !important;
    }
</style>

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><span class="text-semibold">Distributer </span> - Add Distributer</h4>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">

    <form action="{{ route('distributer.storeDistributer') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group d-flex">
                    <label for="distributor_name">Distributor name:</label>
                    <input type="text" class="form-control" placeholder="Enter distributor_name"
                        name="distributor_name" id="distributor_name" value="{{ old('distributor_name') }}" />
                    <button type="button" id="couponCodeGenerate" class="btn btn-primary d-none">Generate</button>
                    <span class="err">
                        @error('distributor_name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="distributor_email">Distributor email:</label>
                    <input type="email" class="form-control"placeholder="Enter distributor email"
                        name="distributor_email" id="distributor_email" />
                    <span class="err">
                        @error('distributor_email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <input type="submit" class="btn btn-success btn-block" value="Create">
            </div>
        </div>
    </form>

</div>
<!-- /content area -->

@include('admin.adminLayout.footer')
