<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
       //this method will redirect to dashboard, and administrator to dashboard admin
        if(auth()->check() && $request->user()->admin == 0) {
            return redirect()->guest('dashboard');
        }
        return $next($request);
    }
}
