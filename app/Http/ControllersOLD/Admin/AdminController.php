<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                ->where('created_at','>=',$start)
                ->groupBy('date')
                ->orderBy('date', 'ASC')
                ->pluck('sales')->toArray();
            $salesString = implode(',',$sales);
        	$todaySales = DB::table('orders')->whereDate('created_at',Carbon::today())->selectRaw('sum(net_amt) as amount')->selectRaw('count(*) as totalSales')->first();
        	$last7Sales = DB::table('orders')->whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('-7 days')))->selectRaw('sum(net_amt) as amount')->selectRaw('count(*) as totalSales')->first();
        	$lastMnth = DB::table('orders')->whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('-30 days')))->selectRaw('sum(net_amt) as amount')->selectRaw('count(*) as totalSales')->first();
        	
            return view('admin.dashboard.dashboard',compact('dateString','salesString','todaySales','last7Sales','lastMnth'));
        }
    /* Configuration */
        public function configuration()
        {
            return view('admin.configuration.configuration');
        }
}
