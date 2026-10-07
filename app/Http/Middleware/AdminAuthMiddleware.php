<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('admin_authenticated')) {
            return redirect()->route('admin.login')->with('error', 'Silakan masukkan PIN Admin untuk mengakses Admin Panel.');
        }

        return $next($request);
    }
}
