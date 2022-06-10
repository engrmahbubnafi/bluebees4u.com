<?php

namespace App\Http\Middleware;

use Closure;

class OnlyAjax
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
        if (!$request->ajax()) {
            return $request->expectsJson()
            ? abort(403, 'This is not ajax request.')
            : redirect()->back()->with('flash_warning', 'This is not ajax request.');
        }
        return $next($request);
    }
}