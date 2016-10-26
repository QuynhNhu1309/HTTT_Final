<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class adminDangNhap_Middleware
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
        if(Auth::check())
        {
            if(Auth::user()->idGroup == 1)
            {
                 return $next($request);
            }
            else{
                 return redirect('dangnhap');
            }
        }
        else
        {
            return redirect('dangnhap');
        }
        
    }
}
