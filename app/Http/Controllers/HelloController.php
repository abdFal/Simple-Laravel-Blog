<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
    public function index()
    {
        # code...
        echo "Hello";
    }

    public function landing()
    {
        # code...
        return view('welcome');
    }

    public function worldmsg()
    {
        # code...
        echo "Wolrd is wide";
    }
}
