<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //dd(Auth::id() !=1);
        if (Auth::id() !=1)
        {

           return redirect('/user/register/show');

            
        }   
       
             return $next($request);
          
    }
}
