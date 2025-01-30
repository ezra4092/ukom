<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        // dd($request->all());
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->with('errors', 'Login gagal. Silahkan login ulang dan periksa username serta password anda.');
    }

    public function index(){
        return view('login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
