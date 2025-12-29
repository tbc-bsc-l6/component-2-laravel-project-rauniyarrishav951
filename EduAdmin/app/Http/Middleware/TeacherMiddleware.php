<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class TeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated and has teacher role
        if (auth()->check() && auth()->user()->role === 'teacher') {
            return $next($request);
        }
        
        // If not teacher, redirect to dashboard or home
        return redirect('/dashboard')->with('error', 'Access denied. Teacher role required.');
    }
}