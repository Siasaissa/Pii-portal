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
public function handle(Request $request, Closure $next, $roles)
{
    if (!Auth::check()) {
        return redirect()->route('login.form');
    }

    // Convert roles string into array (e.g. "user,customer" → ["user", "customer"])
    $rolesArray = is_array($roles) ? $roles : explode(',', $roles);

    if (! in_array(auth()->user()->role, $rolesArray)) {
        abort(403, 'Unauthorized action.');
    }

    return $next($request);
}

}
