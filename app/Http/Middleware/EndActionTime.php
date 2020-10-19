<?php

namespace App\Http\Middleware;

use Closure;
use Config;

class EndActionTime
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
        $endTime = strtotime(Config::get('app.end_time'));
        if ($endTime < time() && $request->path() != 'end') return redirect('/end');
        elseif ($endTime > time() && $request->path() == 'end') return redirect('/dev');
        else return $next($request);
    }
}
