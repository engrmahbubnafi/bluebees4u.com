<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && !$request->user()->isAdministrator()) {
            return $request->expectsJson()
            ? abort(403, 'You are not administrator')
            : redirect()->back()->with('flash_warning', 'You are not administrator');
        }
        return $next($request);
    }
}