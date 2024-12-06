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
        return FacadesSocialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $userSocial =   FacadesSocialite::driver($provider)->stateless()->user();
        $users       =   User::where(['email' => $userSocial->getEmail()])->first();
        if($users){
            Auth::login($users);
            return redirect()->route('home')->with('global','Logged In Successfully')->with('type','success');
        }else{
            $user = \App\User::create(['name' => $userSocial->getName(),'email' => $userSocial->getEmail(),'email_verified_at' => \Carbon\Carbon::now(),'provider_id'   => $userSocial->getId(),'provider' => $provider]);
            return redirect()->route('home')->with('global','Logged In Successfully')->with('type','success');
        }
    }
}
