<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cekrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ... $role)
    {
        if (in_array($request->user()->role, $role)) {
            return $next($request);
        }
        return redirect('/');
    }
}
