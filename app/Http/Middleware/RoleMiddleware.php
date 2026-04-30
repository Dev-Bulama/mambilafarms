<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): mixed
    {
        if (!auth()->check() || auth()->user()->role !== $role) {
            if (!auth()->check()) return redirect()->route('login');
            abort(403, 'Unauthorised.');
        }
        return $next($request);
    }
}
