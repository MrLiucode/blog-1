<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Gate;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ((!Gate::allows('check-super-permission')) && ($routeName = Route::currentRouteName())) {
            if (!Gate::allows('route-permission', $routeName)) {
                die("没有权限!");
            }
        }
        return $next($request);
    }
}
