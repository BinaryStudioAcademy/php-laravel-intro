<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AgeMiddleware
{
    const MIN_AGE = 18;

    public function handle(Request $request, Closure $next)
    {
        if(isset($request->age) &&$request->age < self::MIN_AGE) {
            return abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
