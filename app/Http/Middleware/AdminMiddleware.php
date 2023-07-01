<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
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
        // ログインしているユーザーのis_adminが1なら、
        if ( Auth::user()->is_admin == 1 ){

            // web.phpで、次のRouteにいける！
            return $next($request); 
        }

        // じゃないと、Routeのhomeにいく。
        return redirect()->route('home');

    }
    
}
