<?php

namespace App\Http\Middleware;

use Closure;

class CommingSoon
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

        if (config('conf.comming_soon')) {
            if ($request->user() && ($request->user()->status == 'active')) {
                return $next($request);
            }
            return redirect()->route('coming.soon');
        }
        return $next($request);
    }
}