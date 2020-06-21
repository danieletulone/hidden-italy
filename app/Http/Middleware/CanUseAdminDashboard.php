<?php

namespace App\Http\Middleware;

use Closure;

class CanUseAdminDashboard
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
        if (auth()->user() && in_array('use-admin-dashboard', auth()->user()->role->scopes)) {
            return $next($request);
        }
        
        abort(401);
    }
}
