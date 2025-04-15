<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan file Blade ini ada di resources/views/auth/login.blade.php
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Redirect berdasarkan role
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('researcher')) {
                return redirect()->route('researchers.dashboard');
            } else {
                return redirect('/'); // Default untuk user biasa
            }
        }
        
        return redirect()->back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('status', 'Logout berhasil');
    }
    public function showProfile() {
        return view('auth.profile', ['user' => Auth::user()]);
    }    
}

