<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class SetLanguageMiddleware
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
        try{
			$ip = $request->ip();
            if($ip){
                if(!session()->has('previp') || !session()->has('geoloc') || (session()->has('previp') && session()->get('previp') != $ip)){
                     $ip_response = json_decode(file_get_contents('https://pro.ip-api.com/json/'.$ip.'?key=L6J8j8tIixQdQ80'));
                    //  dd($ip_response);
                    $countryCode = 'US'; 
                    if($ip_response && @$ip_response->countryCode){
                        $countryCode = $ip_response->countryCode;
                    }
                    session()->put('previp',$ip);
                    session()->put('geoloc',$countryCode);
                    if($countryCode == 'IN') {
                        $lang = \App\Language::orderBy('id','desc')->where('slug','like','%in%')->first();
                        session()->put('india',true);
                        config(['app.lang' => $lang]);
                        $value = $request->session()->get('lang');
                        //dd($value);
                        if($value && @$value['slug'] && !is_null(@$value) && isset($value)){
                            \App::setLocale($value['slug']);
                        }else{
                            \App::setLocale($lang->slug);
                        }
                        return $next($request);
                    }
                    elseif($countryCode != 'IN') 
                    {
                        $value = $request->session()->get('lang');
                        if(@$value['slug'] == 'in' || is_null(@$value['slug'])){
                            $defaultLanguage = \App\Language::where('is_default','Y')->first();
                            config(['app.lang' => $defaultLanguage]);
                            \App::setLocale('en');
                            session()->forget('india');
                            return $next($request);
                        }else{
                            config(['app.lang' => $value]);
                            \App::setLocale($value['slug']);
                            session()->forget('india');
                            return $next($request);
                        }
                        
                    }
                }else{
                    $geo =  session()->get('geoloc');
                    // dd($geo);
                    if($geo == 'IN') {
                        $lang = \App\Language::orderBy('id','desc')->where('slug','like','%in%')->first();
                        
                        session()->put('india',true);
                        config(['app.lang' => $lang]);
                        $value = $request->session()->get('lang');
                        //dd($value);
                        if($value && @$value['slug'] && !is_null(@$value) && isset($value)){
                            \App::setLocale($value['slug']);
                        }else{
                            \App::setLocale($lang->slug);
                        }
                        return $next($request);
                    }elseif($geo != 'IN') 
                    {
                        $value = $request->session()->get('lang');
                        if(@$value['slug'] == 'in' || is_null(@$value['slug'])){
                            $defaultLanguage = \App\Language::where('is_default','Y')->first();
                            config(['app.lang' => $defaultLanguage]);
                            \App::setLocale('en');
                            session()->forget('india');
                            return $next($request);
                        }else{
                            config(['app.lang' => $value]);
                            \App::setLocale($value['slug']);
                            session()->forget('india');
                            return $next($request);
                        }
                        
                    }
                }
            }else{
                session()->forget('geoloc');
                session()->forget('previp');
                session()->forget('india');
                $defaultLanguage = \App\Language::where('is_default','Y')->first();
                config(['app.lang' => $defaultLanguage]);
                \App::setLocale('en');
                return $next($request);
            }
        }catch(\Exception $e){
            // dd($e->getMessage());
            session()->forget('geoloc');
            session()->forget('previp');
            session()->forget('india');
            $defaultLanguage = \App\Language::where('is_default','Y')->first();
            config(['app.lang' => $defaultLanguage]);
            \App::setLocale('en');
            return $next($request);
        }
        
    }
}






