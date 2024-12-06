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

    <form action="{{ route('coupon.storeCouponCode') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">

                <div class="form-group d-flex">
                    <label for="coupon_code" style="display: block;">Coupon Code:</label>
                    <input type="text" class="form-control" placeholder="Enter coupon code" name="coupon_code"
                        id="coupon_code" value="{{ old('coupon_code') }}" />
                    <button type="button" id="couponCodeGenerate" class="btn btn-primary d-none">Generate</button>
                    <span class="err">
                        @error('coupon_code')
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

                <input type="submit" class="btn btn-success btn-block" value="Create">
            </div>
        </div>
    </form>

</div>
<!-- /content area -->

@include('admin.adminLayout.footer')

<script>
    $(document).ready(function() {

        $(document).on('click', '#couponCodeGenerate', function(e) {
            e.preventDefault();

            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
            var string_length = 8;
            var randomstring = '';
            for (var i = 0; i < string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum, rnum + 1);
            }
            $("#coupon_code").val(randomstring);
        });

    });
</script>
