@include('admin.adminLayout.header')

<style>
    .table tr,
    .table th,
    .table td {
        text-align: center;
    }

    .err {
        display: block;
        color: red;
    }
</style>


<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><span class="text-semibold">Assign </span> - Coupons to Distributors</h4>
        </div>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

    <form action="{{ route('distributer.storeCouponToDistributors') }}" method="POST">

        @csrf

        <div class="row">

            <div class="col-md-3">

                <div class="form-group">
                    <label>Select Distributors :</label>
                    <select class="form-control" name="distributer">
                        @foreach ($distributors as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="submit" class="btn btn-success btn-block" value="Assign Coupons" />
            </div>

            <div class="col-md-9">

                <div class="col-md-12">

                    @error('couponId')
                        <span class="err">{{ $message }}</span>
                    @enderror

                    <div class="panel panel-flat">
                        <div class="table-responsive table-orders">
                            <table class="table table-striped table-products-list">
                                <thead>
                                    <tr>
                                        <th>Select</th>
                                        <th>Coupon Code</th>
                                        <th>Coupon Value</th>
                                        <th>Coupon Type</th>
                                        <th>Expiry At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $item)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="couponId[]" value="{{ $item->id }}" />
                                            </td>
                                            <td>{{ $item->coupon_code }}</td>
                                            <td>{{ $item->coupon_value }}</td>
                                            <td style="text-transform: uppercase;">
                                                {{ preg_replace('/_[0-9]*/', ' ', $item->coupon_type) }}
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($item->expiry_at)->format('d/m/Y') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </form>

</div>
<!-- /content area -->

@include('admin.adminLayout.footer')
