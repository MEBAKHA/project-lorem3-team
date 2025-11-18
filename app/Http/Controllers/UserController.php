<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ---------- LOGIN PAGE ----------
    public function login()
    {
        return view('auth.login');
    }

    // ---------- LOGIN ACTION ----------
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // ---------- LOGOUT ----------
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // ---------- DASHBOARD ----------
    public function dashboard()
    {
        $user = Auth::user();
        return view('user.dashboard', ['user' => $user]);
    }

    // ---------- PROFILE ----------
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', ['user' => $user]);
    }

    // ---------- PROFILE UPDATE ----------
    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);
        
        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }
}
