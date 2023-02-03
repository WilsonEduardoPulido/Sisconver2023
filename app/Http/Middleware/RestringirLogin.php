<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RestringirLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        if(auth()->check() && (auth()->user()->Estado=='Inactivo')){

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->with('error','Su cuenta se encuentra inactiva, por favor contacte al administrador');
        }else{

            if(auth()->check() && (auth()->user()->Estado=='Sancionado')){
               Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('login')->with('errorsancionado','Su cuenta se encuentra sancionada, por favor contacte al administrador');
        }




        return $next($request);
    }
}}

