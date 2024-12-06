<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite as FacadesSocialite;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        \Session::put('affterLoginUrl',url()->previous());
        return FacadesSocialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $url = '/';
        if(\Session::get('affterLoginUrl')){
            $url = \Session::get('affterLoginUrl');
            \Session::forget('affterLoginUrl');
        }
        $userSocial =   FacadesSocialite::driver($provider)->stateless()->user();
        $users       =   User::where(['email' => $userSocial->getEmail()])->first();
        if($users){
            Auth::login($users);
            return redirect($url);
        }else{
            $user = \App\User::create(['name' => $userSocial->getName(),'email' => $userSocial->getEmail(),'email_verified_at' => \Carbon\Carbon::now(),'provider_id'   => $userSocial->getId(),'provider' => $provider,'role_id' => 2]);
            return redirect($url);
        }
    }
}
