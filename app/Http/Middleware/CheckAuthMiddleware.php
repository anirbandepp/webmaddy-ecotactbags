<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuthMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next, $role)
  {
    $roles = explode(';', $role);
    $userRole = auth()->user()->role->name;

    if ($userRole == 'Admin') {
      session(['role' => 'Admin']);
    } else session()->forget('role');

    if (in_array($userRole, $roles)) {
      return $next($request);
    } else {
      return redirect('/');
    }
  }
}
