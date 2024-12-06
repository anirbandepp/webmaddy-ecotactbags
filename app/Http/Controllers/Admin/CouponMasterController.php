<?php

namespace App\Http\Controllers\Admin;

use App\Admin\CouponMaster;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportCoupons;

class CouponMasterController extends Controller
{
    public function index()
    {
        $coupons = CouponMaster::orderBy('id', 'DESC')->paginate(25);
        return view('admin.coupon.index')->with(['coupons' => $coupons]);
    }

    public function createCoupon()
    {
        return view('admin.coupon.create');
    }

    public function storeCouponCode(Request $r)
    {
        try {
            $this->validate($r, [
                'coupon_code' => 'required|unique:coupon_masters,coupon_code',
                'coupon_value' => 'required',
                'expiry_at' => 'required|date|after:now',
                'coupon_type' => [
                    'required',
                    Rule::in(['percentage', 'flat_value']),
                ]
            ]);

            $input = [
                'coupon_code' => $r->coupon_code,
                'coupon_value' => $r->coupon_value,
                'coupon_type' => $r->coupon_type,
                'expiry_at' => Carbon::parse($r->expiry_at)->format('Y-m-d'),
                'slug' => uniqid()
            ];

            CouponMaster::create($input);
            return redirect()->route('coupon.couponlist');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteCoupon(Request $r)
    {
        try {
            $this->validate($r, [
                'id' => 'required|exists:coupon_masters,id',
            ]);
            CouponMaster::destroy($r->id);
            return redirect()->route('coupon.couponlist');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function couponStatusChange(Request $r)
    {
        try {
            CouponMaster::where('id', $r->id)->update(['status' => $r->action]);
            return redirect()->route('coupon.couponlist');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function fetchCoupon($slug)
    {
        $coupon = CouponMaster::where('slug', $slug)->first();
        return view('admin.coupon.edit')->with(['coupon' => $coupon]);
    }

    public function updateCoupon(Request $r)
    {
        try {
            $this->validate($r, [
                'coupon_code' => [
                    'required',
                    Rule::unique('coupon_masters')->ignore($r->slug, 'slug')
                ],
                'coupon_value' => 'required',
                'expiry_at' => 'required|date|after:now',
                'coupon_type' => [
                    'required',
                    Rule::in(['percentage', 'flat_value']),
                ]
            ]);

            CouponMaster::where("slug", $r->slug)->update([
                "coupon_code" => $r->coupon_code,
                "coupon_value" => $r->coupon_value,
                "coupon_type" => $r->coupon_type,
                "expiry_at" => Carbon::parse($r->expiry_at)->format('Y-m-d')
            ]);
            return redirect()->route('coupon.couponlist');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function autoGenerateCoupon()
    {
        return view('admin.coupon.autoGenerateCoupon');
    }

    public function createAutoGenerateCoupon(Request $r)
    {
        try {
            $this->validate($r, [
                'number_coupon_code' => 'required|integer',
                'coupon_value' => 'required|integer',
                'expiry_at' => 'required|date|after:now',
                'coupon_type' => [
                    'required',
                    'string',
                    Rule::in(['percentage', 'flat_value']),
                ]
            ]);

            for ($i = 0; $i < $r->number_coupon_code; $i++) {

                $input = [
                    'coupon_code' => Str::random(10),
                    'coupon_value' => $r->coupon_value,
                    'coupon_type' => $r->coupon_type,
                    'expiry_at' => Carbon::parse($r->expiry_at)->format('Y-m-d'),
                    'slug' => uniqid()
                ];

                CouponMaster::create($input);
            }
            return redirect()->route('coupon.couponlist');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function exportAllCoupons()
    {
        $filename = time() . Str::random(30);
        return Excel::download(new ExportCoupons, $filename . '.csv');
    }
}
