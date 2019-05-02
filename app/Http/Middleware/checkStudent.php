<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class checkStudent
{
    public function handle($request, Closure $next)
    {
        if(Auth::User()->userRule != "student"){
            return redirect('home');
        }
        return $next($request);
    }
}
