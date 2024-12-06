<?php

namespace App\Http\Controllers;

use App\Notifications\SendOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class AuthController extends Controller
{
    public function sendOtpLogin()
    {
        $user = \App\User::where('email',request('email'))->first();
        if($user){
            $code = random_int(100000, 999999);
            session()->put('code',$code);
            session()->put('user_email',$user->email);
            FacadesNotification::send($user, new SendOtp($code));
            return ['type'=>'success','msg' => 'Otp send to your email','code' => session()->get('code')];
        }else{
            return ['type'=>'error','msg' => 'You\'r not registered'];
        }
    }
    public function postLogin()
    {
        $user = \App\User::where('email',session()->get('user_email'))->first();
        if($user)
        {
            if(session()->get('code') == request('code')){
                Auth::login($user);
                session()->forget('code');
                session()->forget('user_email');
                return ['type'=>'success','msg' => 'Logged in successfully','route' => route(\Route::currentRouteName())];
            }else{
                return ['type'=>'error','msg' => 'Incorrect Code'];
            }
        }else{
            return ['type'=>'error','msg' => 'Invalid Email'];
        }
    }

    public function sendOtpRegister()
    {
        $user = \App\User::where('email',request('email'))->first();
        if($user){
            return ['type'=>'error','msg' => 'User Already Exist'];
        }else{
            $user = \App\User::create(['email' => request('email')]);
            $code = random_int(100000, 999999);
            session()->put('code',$code);
            session()->put('user_email',$user->email);
            FacadesNotification::send($user, new SendOtp($code));
            $user->delete();
            return ['type'=>'success','msg' => 'Code Send Tou Your Email','code' => session()->get('code')];
        }
    }
    public function postRegister()
    {
        if(session()->get('user_email') && session()->get('code') == request('code')){
            $user = \App\User::create(['email' => session()->get('user_email'),'email_verified_at' => \Carbon\Carbon::now(),'role_id' => 2]);
            Auth::login($user);
            session()->forget('code');
            session()->forget('user_email');
            return ['type'=>'success','msg' => 'Registered Successfully','route' => route('home')];

        }else{
            return ['type'=>'error','msg' => 'Invalid Details'];
        }
    }

    public function myOrders(Request $request){
        $orders = auth()->user()->orders()->with('orderProducts')->get();
        return view('my_orders',compact('orders'));
    }
    
    public function logout(Request $request){
        auth()->logout();
        return redirect()->route('home');
    }
    public function myOrderDetails(Request $request,$id){
        if($id){
            $order = \App\OrderProduct::with('stock')->findOrFail($id);
            return view('my_order_details',compact('order'));
        }
        else{
            abort(404);
        }
    }
}
