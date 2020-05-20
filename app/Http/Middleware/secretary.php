<?php

namespace App\Http\Middleware;

use Closure;

class secretary
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
        if (auth()->user()->data_entry == '1') {
            return $next($request);
        }
            return redirect()->route('home');
    }
}
