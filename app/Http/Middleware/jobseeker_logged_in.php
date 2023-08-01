<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class jobseeker_logged_in
{

    public function handle(Request $request, Closure $next)
    {
        if (auth()->guard('jobseeker')->check())
            return $next($request);
        else
            return redirect()->route('login');

    }
}
