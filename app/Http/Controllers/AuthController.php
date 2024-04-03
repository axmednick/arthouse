<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Giriş sayfasını göster
    public function showLoginForm()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {

            return redirect()->intended('/');

        }

        return back()->withErrors(['email' => 'Email veya şifre hatalı']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
