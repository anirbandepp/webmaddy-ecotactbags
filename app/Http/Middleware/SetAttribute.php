<?php

namespace App\Http\Middleware;

use Closure;

class SetAttribute
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
        if($request->route('attributeId') != null) {
            $a = \App\Attribute::findorFail($request->route('attributeId'));
            if($a) {
                config(['app.attribute' => $a]);
            }
            else return abort('404');
        }
        return $next($request);
    }
}
