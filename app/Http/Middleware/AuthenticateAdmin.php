<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateAdmin
{
    public function handle($request, Closure $next)
    {
        if (!$request->session()->get('admin_id')) {
            return redirect()->route('adminlogin');
        }

        return $next($request);
    }
}
