@include('admin.adminLayout.header')

<style>
    .couponfrm {
        display: inline-block;
    }

    .table tr,
    .table th,
    .table td {
        text-align: center;
    }

    .table-products-list a {
        color: #fff;
    }

    span.bg_danger {
        background: #EF5350;
        color: #fff;
        padding: 5px 5px;
        border-radius: 5px;
        border: 1px solid #ef5350;
    }

    span.bg_success {
        background: #66BB6A;
        color: #fff;
        padding: 5px 5px;
        border-radius: 5px;
        border: 1px solid #66BB6A;
    }
</style>

<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><span class="text-semibold">Coupon </span> - All Coupons</h4>
        </div>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

    <a href="{{ route('coupon.exportAllCoupons') }}">Download CSV format of all coupons ++</a>

    <div class="panel panel-flat">
        <div class="table-responsive table-orders">
            <table class="table table-striped table-products-list">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Coupon Code</th>
                        <th>Coupon Value</th>
                        <th>Coupon Type</th>
                        <th>Expiry At</th>
                        <th>Is used</th>
                        <th colspan="3">Active</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coupons as $item)
                        @php
                            $isUsed = 'No';
                            if ($item->is_used == 1) {
                                $isUsed = 'Yes';
                            }
                        @endphp
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->coupon_code }}</td>
                            <td>{{ $item->coupon_value }}</td>
                            <td style="text-transform: uppercase;">
                                {{ preg_replace('/_[0-9]*/', ' ', $item->coupon_type) }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->expiry_at)->format('d/m/Y') }}
                            </td>
                            <td>
                                <span class="{{ $item->is_used == 0 ? 'bg_danger' : 'bg_success' }}">
                                    {{ $isUsed }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('coupon.couponStatusChange') }}" class="couponfrm"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="hidden" name="action"
                                        value="{{ $item->status == 'active' ? 'inactive' : 'active' }}">
                                    <input type="submit" class="btn btn-success"
                                        value="{{ $item->status == 'active' ? 'Active' : 'Inactive' }}">
                                </form>

                                <a href="{{ route('coupon.fetchCoupon', ['slug' => $item->slug]) }}"
                                    class="btn btn-primary">
                                    Edit
                                </a>

                                <form action="{{ route('coupon.deleteCoupon') }}" class="couponfrm" method="post"
                                    onclick="return confirm('Do you want to delete this coupn ?')">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $coupons->links() !!}
        </div>
    </div>

</div>
<!-- /content area -->

@include('admin.adminLayout.footer')
