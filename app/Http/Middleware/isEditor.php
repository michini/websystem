<?php

namespace App\Http\Middleware;

use Closure;

class isEditor
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
        if(Auth::user()->rol === "editor"){
            return $next($request);
        }
        else{
            abort(403);
        }
        return $next($request);
    }
}
