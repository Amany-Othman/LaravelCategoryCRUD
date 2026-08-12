<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        //when someone requests this page open login.blade.php
        return view('admin.auth.login');
    }


    public function showRegister()
{
    // lma 7d ytlob /register yro7 l page el register 
return view('admin.auth.register');
}

public function register(Request $request)
{

//$request -> laravel by recieve el date ely gaya mn el request
$validated = $request->validate([
'name' => 'required|string|max:255',
'email' => 'required|email|unique:users,email',
//confirmed -> lazem yktbo mrten w ela el validation tfshl 
'password' => 'required|min:8|confirmed',
]);

//after validation is ok create user bl data de 
$user =User::create([
    'name' => $validated['name'],
    'email' => $validated['email'],
    //password already hashed fe user.php 3shan kda bnb3to mn gher hashing 
    //l2n laravel hy3ml hashing automatic
    'password' => $validated['password'],
]);
 //el user dh 7alien authenticated 
Auth::login($user);
//regenerate new session id after  login
$request->session()->regenerate();
//ykhosh el dashboard 
return redirect()->intended('/dashboard');


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