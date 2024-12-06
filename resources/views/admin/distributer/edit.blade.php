@include('admin.adminLayout.header')

<style>
    .err {
        display: block;
        color: red;
    }
</style>

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><span class="text-semibold">Distributer </span> - Edit Distributer</h4>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">

    <div class="row">
        <div class="col-md-4">
            <form action="{{ route('distributer.updateDistributer') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $distributer->id }}">
                <div class="form-group d-flex">
                    <label for="distributor_name">Distributor name:</label>
                    <input type="text" class="form-control" placeholder="Enter distributor_name" name="name"
                        id="distributor_name" value="{{ $distributer->name }}" />
                    <span class="err">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="distributor_email">Distributor email:</label>
                    <input type="email" class="form-control"placeholder="Enter distributor email" name="email"
                        id="distributor_email" value="{{ $distributer->email }}" />
                    <span class="err">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

</div>
<!-- /content area -->

@include('admin.adminLayout.footer')
