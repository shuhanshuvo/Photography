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
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard){
            case 'web':
                if(Auth::guard($guard)->check()){
                    return redirect()->route('user.dashboard');
                }
                break;
                case 'admin':
                if(Auth::guard($guard)->check()){
                    return redirect()->route('admin.dashbord');
                }
                break;
                case 'photographer':
                if(Auth::guard($guard)->check()){
                    return redirect()->route('photo.dashbord');
                }
                break;

            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/home');
                }
                break;
        }
        return $next($request);
    }
}
