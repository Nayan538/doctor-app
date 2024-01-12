<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  \String  $AuthCheck
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('LoggedUser') && ($request->path() != 'login') && ($request->path() != 'forgot-password') && ($request->path() != 'forgot-password/send')){
            return redirect()->route('login')->with('failed','You must be Logged in to view this page.');
        }
        if(session()->has('LoggedUser') && ($request->path() == 'login') && ($request->path() == 'forgot-password')){
            return back();
        }
        return $next($request)->header('Cache-Control','no-cache','no-store','max-age=0','must-revalidate')
            ->header('Pragma','no-cache')
            ->header('Expires','Sat 01 1990 00:00:00 GMT');
    }
}
