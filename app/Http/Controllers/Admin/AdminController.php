<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Creative;
use Str, Image;

class AdminController extends Controller
{
    /* GET Admin Login */
    public function adminDashboard()
    {
        $start = Carbon::now()->subDays(30);
        // 			$dates = array_map(fn ($day) => $start->copy()->addDays($day)->isoFormat('MMM Do'), range(0, 30));
        // 			$dateString = implode(',',$dates);
        $dateString = "";
        $sales = DB::table('orders')->select(array(
            DB::raw('DATE(`created_at`) as `date`'),
            DB::raw('SUM(net_amt) as `sales`')
        ))
            ->where('created_at', '>=', $start)
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->pluck('sales')->toArray();
        $salesString = implode(',', $sales);
        $todaySalesInr = DB::table('orders')->whereDate('created_at', Carbon::today())->whereIn('carrier_partner', ['1', '5'])->selectRaw('sum(net_amt) as amount')->selectRaw('count(*) as totalSales')->first();
        $todaySalesUsd = DB::table('orders')->whereDate('created_at', Carbon::today())->whereIn('carrier_partner', ['2', '3', '4'])->selectRaw('sum(net_amt) as amount')->selectRaw('count(*) as totalSales')->first();
        $last7SalesInr = DB::table('orders')->whereDate('created_at', '>=', date('Y-m-d H:i:s', strtotime('-7 days')))->whereIn('carrier_partner', ['1', '5'])->selectRaw('sum(net_amt) as amount')->selectRaw('count(*) as totalSales')->first();
        $last7SalesUsd = DB::table('orders')->whereDate('created_at', '>=', date('Y-m-d H:i:s', strtotime('-7 days')))->whereIn('carrier_partner', ['2', '3', '4'])->selectRaw('sum(net_amt) as amount')->selectRaw('count(*) as totalSales')->first();
        $lastMnthInr = DB::table('orders')->whereDate('created_at', '>=', date('Y-m-d H:i:s', strtotime('-30 days')))->whereIn('carrier_partner', ['1', '5'])->selectRaw('sum(net_amt) as amount')->selectRaw('count(*) as totalSales')->first();
        $lastMnthUsd = DB::table('orders')->whereDate('created_at', '>=', date('Y-m-d H:i:s', strtotime('-30 days')))->whereIn('carrier_partner', ['2', '3', '4'])->selectRaw('sum(net_amt) as amount')->selectRaw('count(*) as totalSales')->first();

        return view('admin.dashboard.dashboard', compact('dateString', 'salesString', 'todaySalesInr', 'todaySalesUsd', 'last7SalesInr', 'last7SalesUsd', 'lastMnthInr', 'lastMnthUsd'));
    }
    /* Configuration */
    public function configuration()
    {
        return view('admin.configuration.configuration');
    }

    public function creativeImageGet()
    {
        $creative = Creative::first();
        return view('admin.creatives.creative-image', ['creative1' => $creative]);
    }
    public function creativeImage(Creative $creative, Request $request)
    {
        $this->validate(request(), [
            'image' => 'required|sometimes',
            'link' => 'required|sometimes',
            'image.*' => 'mimes:jpeg,jpg,png,gif',
        ]);
        DB::beginTransaction();
        try {
            if ($creative->id) {
                if (request('image')) {
                    $uploadFile = request('image');
                    $uploadExt = $uploadFile->getClientOriginalExtension();
                    $uploadFilename = Str::random(10) . '.' . $uploadExt;
                    $destinationPathExtraLarge = 'front-end/creatives';
                    $thumbLarge = Image::make($uploadFile->getRealPath())->resize(900, 650, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPathExtraLarge . '/' . $uploadFilename, 100);
                    $creative->fill(['url' => $request->getSchemeAndHttpHost() . '/front-end/creatives/' . $uploadFilename]);
                } else {
                    $creative->fill(['active' => request('active'), 'link' => request('link')]);
                }
                $creative->save();
            }
            DB::commit();
            return redirect()->route('creativeImageGet', ['creative' => $creative->id])->with('global', 'Image Uploaded Successfully')->with('type', 'success');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('global', $e->getMessage())->with('type', 'error');
        }
    }
}
