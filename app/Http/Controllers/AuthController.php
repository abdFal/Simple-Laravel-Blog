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
        return view('auth.login');
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
        return redirect('login')->with('log_msg', 'Anda Telah Logout, Masukin lagi dong');

    }
}
