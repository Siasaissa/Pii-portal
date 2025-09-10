<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
public function handle(Request $request, Closure $next, ...$roles)
{
    if (!Auth::check()) {
        return redirect()->route('login.form');
    }

    // Now $roles is already an array: ['user', 'admin']
    if (! in_array(auth()->user()->role, $roles)) {
        abort(403, 'Unauthorized action.');
    }

    return $next($request);
}


}
