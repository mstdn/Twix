<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->username !== 'stux')
        {
            abort(403); 
        }
        return $next($request);
    }
}
