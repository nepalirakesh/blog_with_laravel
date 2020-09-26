<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
//    public function handle($request, Closure $next, $guard = null)
//    {
//        if (Auth::guard($guard)->check()) {
//            return redirect(RouteServiceProvider::HOME);
//        }
//
//        return $next($request);
//    }

    public function handle($request, Closure $next, $guard =null)
    {

        switch ($guard){
            case 'admin':
                if (Auth::guard('admin')->check()){
                    return redirect()->route('admin_home');
                }
                break;

            case 'editor':
                if (Auth::guard('editor')->check()){
                    return redirect()->route('editor_home');
                }
                break;

            default:
                if(Auth::guard('web')->check()){
                    return redirect()->route('blog');
                }

        }
        return $next($request);
    }


}
