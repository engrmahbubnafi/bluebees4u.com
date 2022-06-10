<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $controllerAction = class_basename(Route::currentRouteAction());
        if (isset($controllerAction)) {
            list($current_location['controller'], $current_location['action']) = explode('@', $controllerAction);
            $permitedMenuArr                                                   = App::make('premitedMenuArr');
            if (count($permitedMenuArr) && !in_array($controllerAction, $permitedMenuArr)) {
                return $request->expectsJson()
                    ? abort(403, 'You are not allowed for requesting page')
                    : redirect()->back()->with('flash_warning', 'You are not allowed for requesting page');
            }
            return $next($request);
        }

    }
}
