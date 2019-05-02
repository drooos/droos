<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
class checkIsver
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
        if( Auth::User()->verified == 0 && Auth::User()->userRule!='admin' ){
            return redirect('home');
        }
        return $next($request);
    }
}
