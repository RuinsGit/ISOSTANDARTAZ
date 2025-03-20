<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('locale')) {
            $locale = Session::get('locale');
            App::setLocale($locale);
        } else {
            // Varsayılan dil
            App::setLocale('az'); 
            Session::put('locale', 'az');
        }
        
        return $next($request);
    }
} 