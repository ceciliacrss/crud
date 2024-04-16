<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isEditor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(Auth::user()->admin >= 1){
            return $next($request);
        }

        if(Auth::user()->admin <1){
            dd($request);
            return redirect('/')->with('unauthorised', 'You are
                  unauthorised to access this page');
        }
        return redirect()->back()->with('unauthorised', 'You are
                  unauthorised to access this page');
    }
}
