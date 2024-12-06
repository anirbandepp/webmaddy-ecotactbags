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

    .coupons li {
        list-style: none;
        display: inline;
        background: green;
        color: #fff;
        padding: 5px 5px;
        border-radius: 5px;
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
        <a href="{{ route('distributer.exportAllDistributorsWithCoupons') }}">
            Download CSV format Of All Distributors with coupons ++
        </a>
        <div class="panel panel-flat">
            <div class="table-responsive table-orders">
                <table class="table table-striped table-products-list">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nmae</th>
                            <th>Email</th>
                            <th>coupons</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($distributers as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <ul class="coupons">
                                        @foreach ($item->coupons as $coupon)
                                            <li>{{ $coupon->coupon_code }}</li>
                                        @endforeach
                                    </ul>
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
