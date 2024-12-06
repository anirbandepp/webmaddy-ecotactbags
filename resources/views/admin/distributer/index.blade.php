@include('admin.adminLayout.header')

<style>
    .couponfrm {
        display: inline-block;
    }

    .table tr,
    .table th,
    .table td,
    .table-orders tbody tr td:last-child {
        text-align: center;
    }

    .table td a {
        color: #fff;
    }
</style>

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><span class="text-semibold">Distributer </span> - All Distributers</h4>
        </div>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

    <div class="col-md-12">

        <a href="{{ route('distributer.exportAllDistributors') }}">Download CSV format Of All Distributors ++</a>

        <div class="panel panel-flat">
            <div class="table-responsive table-orders">
                <table class="table table-striped table-products-list">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nmae</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th colspan="">Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($distributers as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('distributer.fetchDistributer', ['id' => $item->id]) }}"
                                        class="btn btn-primary">
                                        Edit
                                    </a>

                                    <form action="{{ route('distributer.deleteDistributer') }}" class="couponfrm"
                                        method="post" onclick="return confirm('Do you want to delete this coupn ?')">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $distributers->links() !!}
            </div>
        </div>
    </div>

</div>
<!-- /content area -->

@include('admin.adminLayout.footer')
