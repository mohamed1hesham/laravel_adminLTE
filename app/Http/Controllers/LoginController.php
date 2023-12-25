<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function admin_dash()
    {

        return view('admin.homepage');
    }

    public function checkLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin_dashboard');
        }

        return redirect()->back()->withErrors(['Error' => 'Invalid Email or Password']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
