<?php

namespace App\Http\Middleware;

use Closure;

class SetDiscountType
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
        if($request->route('discountType') != null && in_array($request->route('discountType'),['cart','coupon'])) 
        {
            config(['app.discountType' => $request->route('discountType')]);
            return $next($request);
        }
        elseif($request->discountType && in_array($request->route('discountType'),['cart','coupon','category'])){
            config(['app.discountType' => $request->discountType]);
            return $next($request);
        }
        else {
            return abort(404);
        }

        return $next($request);
    }
}
