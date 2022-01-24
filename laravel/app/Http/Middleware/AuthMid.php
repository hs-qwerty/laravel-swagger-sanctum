<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMid
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

        if (!session()->has('logUser') && ($request->path() != 'login' && $request->path() != 'register'))
        {
            return redirect('login')->with('fail','Login Required');
        }

        if (session()->has('logUser') && ($request->path() == 'login' || $request->path() == 'register' ))
        {
            return back();
        }

        return $next($request);
    }
}
