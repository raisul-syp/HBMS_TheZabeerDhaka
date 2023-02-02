<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        // if(!Auth::guard('admin')->role_as == '0'){
        //     return redirect()->with('message', 'Access Denied. As you are not Admin.');
        // }

        // if(!Auth::guard('admin')->check()){
        //     return redirect('admin/login')->route('admin.auth.login')->with('message', 'Access Denied. As you are not Admin.');
        // }

        if(!Auth::guard('admin')->check()){
            return redirect('admin/login')->with('message', 'Access Denied. As you are not Admin.');
        }
        return $next($request);
    }
}
