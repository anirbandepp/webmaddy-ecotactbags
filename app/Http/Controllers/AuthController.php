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
            return ['type'=>'success','msg' => 'Otp send to your email','code' => session()->get('code'),'email' => session()->get('user_email'),'page'=>request('page')];
        }else{
            return ['type'=>'error','msg' => 'You\'r not registered','page'=>'fail'];
        }
    }
    public function postLogin()
    {
        \DB::beginTransaction();
        try{
            $user = \App\User::where('email',session()->get('user_email'))->first();
            if($user)
            {
                if(session()->get('code') == request('code')){
                    Auth::login($user);
                    session()->forget('code');
                    session()->forget('user_email');
                    $user->update([
                        'last_login' => \Carbon\Carbon::now(),
                    ]);
                    return ['type'=>'success','msg' => 'Logged in successfully','route' => url()->previous()];
                }else{
                    return ['type'=>'error','msg' => 'Incorrect Code'];
                }
            }else{
                return ['type'=>'error','msg' => 'Invalid Email'];
            }
        }catch(\Exception $e){
            return ['type'=>'error','msg' => $e->getMessage()];
        }
    }

    public function sendOtpRegister()
    {
        $user = \App\User::where('email',request('email'))->first();
        if($user){
            return ['type'=>'error','msg' => 'User Already Exist'];
        }else{
            $code = random_int(100000, 999999);
            session()->put('code',$code);
            \Session::put('user', ['email' => request('email'), 'country' => request('country'), 'business_name' => request('business_name'),'name' => request('name')]);
            FacadesNotification::route('mail', request('email'))->notify(new SendOtp($code));
            return ['type'=>'success','msg' => 'Code Send Tou Your Email','code' => session()->get('code'),'page'=>request('page')];
        }
    }
    public function postRegister()
    {
        if(\Session::get('user')['email'] && session()->get('code') == request('code')){
            $user = \App\User::create(['email' => \Session::get('user')['email'],'country' => \Session::get('user')['country'],'business_name' => \Session::get('user')['business_name'],'name' => \Session::get('user')['name'],'email_verified_at' => \Carbon\Carbon::now(),'role_id' => 2]);
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
        return view('new_my_orders',compact('orders'));
    }
    public function myOrderDetails(Request $request,$id){
        if($id){
            $order = \App\OrderProduct::findOrFail($id);
            return view('new_my_order_details',compact('order'));
        }
        else{
            abort(404);
        }
    }
    public function logout(Request $request){
        // return auth()->user();
        auth()->logout();
        return redirect()->route('home');
    }

}
