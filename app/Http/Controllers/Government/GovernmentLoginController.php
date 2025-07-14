<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GovernmentLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('government.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Try to login with government guard
        if (Auth::guard('government')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('government.dashboard');
        }

        return back()->with('error', 'Credentials do not match our records.');
    }

    public function logout(Request $request)
    {
        Auth::guard('government')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('government.login');
    }
}
