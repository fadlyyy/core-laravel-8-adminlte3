<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Login_controller extends Controller
{
    public function index()
    {
        return view('login');
    }
}
