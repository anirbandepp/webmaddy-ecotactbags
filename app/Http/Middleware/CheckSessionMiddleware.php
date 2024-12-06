<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Session;
use App\PendingOrder;
use Closure;

class CheckSessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::has('orderId')){
            if(PendingOrder::where('id',Session::get('orderId'))->first()){
                return $next($request);
            }
        }
        return redirect()->route('home')->with('global','Something wrong! order not found')->with('type','warning');
    }
}
