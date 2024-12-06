<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Distributer;
use App\Admin\CouponMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Exports\ExportDistributors;
use App\Exports\ExportDistributorsWithCoupons;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class DistributerController extends Controller
{
    public function index()
    {
        $distributers = Distributer::orderBy('id', 'DESC')->paginate(25);
        return view('admin.distributer.index')->with(['distributers' => $distributers]);
    }

    public function createDistributor()
    {
        return view('admin.distributer.create');
    }

    public function storeDistributer(Request $r)
    {
        try {
            $this->validate($r, [
                'distributor_name' => 'required',
                'distributor_email' => 'required|unique:distributers,email',
            ]);

            $input = [
                'name' => $r->distributor_name,
                'email' => $r->distributor_email,
            ];

            Distributer::create($input);
            return redirect()->route('distributer.distributerlist');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteDistributer(Request $r)
    {
        try {
            $this->validate($r, [
                'id' => 'required|exists:distributers,id',
            ]);
            Distributer::destroy($r->id);
            return redirect()->route('distributer.distributerlist');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function fetchDistributer($id)
    {
        $distributer = Distributer::where('id', $id)->first();
        return view('admin.distributer.edit')->with(['distributer' => $distributer]);
    }

    public function updateDistributer(Request $r)
    {
        try {
            $this->validate($r, [
                'name' => 'required',
                'email' => [
                    'required',
                    Rule::unique('distributers')->ignore($r->id, 'id')
                ],
            ]);

            Distributer::where("id", $r->id)->update([
                "name" => $r->name,
                "email" => $r->email,
            ]);
            return redirect()->route('distributer.distributerlist');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function assignCouponToDistributors()
    {
        $distributors = Distributer::orderBy('id', 'DESC')->get();
        $coupons =  CouponMaster::where(function ($query) {
            $query->where('is_used', 0);
            $query->where('status', 'active');
        })->orderBy('id', 'DESC')->get();

        return view('admin.coupon_distributor.index')->with([
            'distributors' => $distributors,
            'coupons' => $coupons,
        ]);
    }

    public function storeCouponToDistributors(Request $r)
    {
        try {
            $distributerId = $r->distributer;
            $coupons = $r->couponId;

            $this->validate($r, [
                'distributer' => 'required|exists:distributers,id',
                'couponId' => 'required|array',
                'couponId.*' => 'exists:coupon_masters,id'
            ], [
                'couponId.required' => 'Please select at least one coupon code.'
            ]);

            foreach ($coupons as $key => $couponId) {
                CouponMaster::where('id', $couponId)->update(['distributors_id' => $distributerId]);
            }
            CouponMaster::whereIn('id', $coupons)->update(['is_used' => 1]);

            return redirect()->route('distributer.assignCouponToDistributors');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function listAllAssignCouponToDistributors()
    {
        try {
            $distributers = Distributer::has('coupons')->paginate(25);


            return view('admin.distributer.assignCouponToDistributors')->with(['distributers' => $distributers]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function exportAllDistributors()
    {
        $filename = time() . Str::random(30);
        return Excel::download(new ExportDistributors, $filename . '.csv');
    }

    public function exportAllDistributorsWithCoupons()
    {
        $filename = time() . Str::random(30);
        return Excel::download(new ExportDistributorsWithCoupons, $filename . '.csv');
    }
}
