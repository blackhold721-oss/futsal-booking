<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Jika role user tidak sesuai dengan yang diminta halaman, lempar ke dashboard masing-masing
        if (Auth::user()->role !== $role) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}