<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        //when someone requests this page open login.blade.php
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        //lazem ykon email mawgod w sh +password mwgod
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //(Auth::attempt($credentials :laravel checks in users table if there is a user 
        //with this email and password 
        if (Auth::attempt($credentials)) {
            //lw mwgod hydkhlo 3la el dashboard
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        // lw msh mwgod fel database
        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // btnhy el curr session wt generate csrf token gded
        // w trg3o ll login page tany 
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}