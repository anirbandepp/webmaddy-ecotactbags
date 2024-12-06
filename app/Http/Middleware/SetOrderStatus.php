<?php

namespace App\Http\Middleware;

use Closure;

class SetOrderStatus
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
        if($request->route('OrderStatus') != null) 
        {
            config(['app.orderStatus' => $request->route('OrderStatus')]);
            return $next($request);
        }
        elseif($request->status){
            config(['app.orderStatus' => $request->status]);
            return $next($request);
        }
        else {
            return redirect()->route('notFound');
        }

        return $next($request);
    }
}
