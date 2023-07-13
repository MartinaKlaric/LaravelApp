<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $tokenValue): Response
    {
        if ($request->isMethod('get')){
            return $next($request);
        }
        
        if ($request->input('token') !== $tokenValue){ 
            return redirect()->route('home'); 
        }
        return $next($request);
    }
}
