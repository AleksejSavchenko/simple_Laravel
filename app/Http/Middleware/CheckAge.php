<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;

class CheckAge
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

        Cookie::queue($request->path(), true, 5);

        return $next($request);

    }
}
