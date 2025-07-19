<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                // Redirect for government users
                if ($guard === 'government') {
                    return redirect()->route('government.dashboard');
                }

                // Redirect for default users with roles
                $user = Auth::guard($guard)->user();
                if ($user && method_exists($user, 'hasRole')) {
                    if ($user->hasRole('admin')) {
                        return redirect()->route('admin.dashboard');
                    }

                    if ($user->hasRole('employer')) {
                        return redirect()->route('employer.dashboard');
                    }

                    if ($user->hasRole('jobseeker')) {
                        return redirect()->route('jobseeker.dashboard');
                    }
                }

                // Fallback
                return redirect('/home');
            }
        }

        return $next($request);
    }
}
