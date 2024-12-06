<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->redirectTo = route('adminDashboard');
    }
    public function showLoginForm()
    {
        return view('admin.login');
    }
    protected function attemptLogin(Request $request)
    {
        $credentials = array_merge( $this->credentials($request), ['role_id'=>1] );
        if( $this->guard()->attempt( $credentials, $request->filled('remember') ) ) {
            return true;
        }
        return false;
    }
    protected function loggedOut(Request $request)
    {
        return redirect()->route('adminLogin');
    }

}
