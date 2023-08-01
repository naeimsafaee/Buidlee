<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class login
{

    public function handle(Request $request, Closure $next)
    {
        if (auth()->guard('jobseeker')->check() || auth()->guard('employer')->check())
            return redirect()->route('home');

        else
            return $next($request);

    }
}
