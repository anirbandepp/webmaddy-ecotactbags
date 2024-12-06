<?php

namespace App\Http\Middleware;

use Closure;
use App\Product;
class CheckProductMiddleware
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
        if($request->route('productId') != null) {
            $p = Product::findorFail($request->route('productId'));
            if($p) {
                config(['app.product' => $p]);
            }
            else return abort('404');
        }
        return $next($request);
    }
}
