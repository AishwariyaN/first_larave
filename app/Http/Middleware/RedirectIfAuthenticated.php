<?php

namespace App\Http\Middleware;

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
        // if (Auth::guard($guard)->check()) {

        //     return redirect('user/register/show');   
        // }

        switch($guard)
        {
            case 'admin':
              if (Auth::guard($guard)->check()) {
                return redirect('admindashboard');   
            }
            break;
            
            default:
            if (Auth::guard($guard)->check()) {
                return redirect('user/register/show');   
            }
            break;

        }

        // if ( ! $this->auth->user() )
         //{
        // here you should redirect to login 
         //}

        return $next($request);
    }
}
