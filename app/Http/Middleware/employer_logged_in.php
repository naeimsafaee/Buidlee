<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class employer_logged_in
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guard('employer')->check())
            return $next($request);
        else
            return redirect()->route('login');
    }
}
