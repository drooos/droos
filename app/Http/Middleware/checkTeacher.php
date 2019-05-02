<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
class checkTeacher
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
        if(Auth::User()->userRule != "teacher"){
            return redirect('home');
        }
        return $next($request);
    }
}
