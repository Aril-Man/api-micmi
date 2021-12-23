<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        Auth::viaRemember();
        if (Auth::check()) {
            return redirect()->intended('dashboard');
        }
        return view('auth.login');
    }


    public function customLogin(Request $request)
    {
        $remember = $request->remember ? true : false;

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }

        return redirect('auth.login')->withSuccess('Login details are not valid');
    }


    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard.index');
        }

        return redirect('login')->withSuccess('You are not allowed to access');
    }


    public function signOut()
    {
        Auth::logout();

        return Redirect('login');
    }
}
