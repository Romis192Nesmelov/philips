<?php

namespace App\Http\Middleware;

use Closure;
use Config;

class SecretMiddleware
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
        if (!$request->has('key') || $request->input('key') != Config::get('app.key')) return redirect('/');
        return $next($request);
    }
}
