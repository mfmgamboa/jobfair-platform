<?php

namespace App\Http\Controllers\Government;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GovernmentAuthController extends Controller
{
    /**
     * Show the government login form.
     */
    public function showLoginForm()
    {
        return view('government.auth.login');
    }

    /**
     * Handle login attempt for government users (PESO or DOLE).
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login using the 'government' guard
        if (Auth::guard('government')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->filled('remember'))) {

            // Regenerate session to prevent fixation
            $request->session()->regenerate();

            return redirect()->intended(route('government.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Invalid credentials. Please try again.',
        ])->onlyInput('email');
    }

    /**
     * Handle logout for government users.
     */
    public function logout(Request $request)
    {
        Auth::guard('government')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('government.login');
    }
}
