<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function form(Request $req)
    {
        return view('system/auth/index');
    }

    public function submit(Request $req)
    {
        if (Auth::guard('web')->attempt($req->only('email', 'password'))) {
            return redirect()->route('system.dashboard');
        }
        return back()->withInput($req->only('email'))->withErrors([
            'password' => 'Email/Password yang anda masukkan salah'
        ]);
    }

    public function logout(Request $req)
    {
        Session::flush();
        Auth::guard('web')->logout();
        return redirect()->route('system.login.form');
    }
}
