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
            <h4><span class="text-semibold">Coupon </span> - Add Coupon</h4>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">

    <form action="{{ route('coupon.createAutoGenerateCoupon') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">

                <div class="form-group d-flex">
                    <label for="number_coupon_code">Number of coupone :</label>
                    <input type="number" class="form-control" placeholder="Enter number of coupon"
                        name="number_coupon_code" id="number_coupon_code" value="{{ old('number_coupon_code') }}" />
                    <span class="err">
                        @error('number_coupon_code')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="coupon_value">Coupon Value(Discount amount):</label>
                    <input type="number" class="form-control" placeholder="Enter coupon value" name="coupon_value"
                        id="coupon_value" />
                    <span class="err">
                        @error('coupon_value')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="coupon_type">Coupon Type:</label>
                    <select name="coupon_type" id="coupon_type" class="form-control">
                        <option value="percentage">Percentage</option>
                        <option value="flat_value">Flat Value</option>
                    </select>
                    <span class="err">
                        @error('coupon_type')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="expiry_at">Expiry At:</label>
                    <input type="date" class="form-control" name="expiry_at" id="expiry_at" />
                    <span class="err">
                        @error('expiry_at')
                            {{ $message }}
                        @enderror
                    </span>
                </div>


                <input type="submit" class="btn btn-success btn-block" value="Auto Generate coupone">
            </div>
        </div>
    </form>

</div>
<!-- /content area -->

@include('admin.adminLayout.footer')
