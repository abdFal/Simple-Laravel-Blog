<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //
    public function login()
    {
        # code...
        if(!Auth::check()){
            return view('auth.login');
        }
        else{
            return redirect('posts');
        }
    }
    public function authenticate(Request $request)
    {
        # code...
        $cridential = $request->only('email', 'password');
        if(Auth::attempt($cridential)){
            return redirect('posts');
        } else{
            return redirect('login')->with('error_msg', 'wrong email or password');
        }
    }
    public function logout()
    {
        # code...
        Auth::logout();
        Session::flush();
        return redirect('login')->with('log_msg', 'Kamu Udah Keluar, Masukin lagi dong');

    }
    public function register_form()
    {
        # code...
        return view('auth.register');
    }
    public function register(Request $request)
    {
        # code...
        $request->validate([
            'emal' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',

        ]);
    }
}
