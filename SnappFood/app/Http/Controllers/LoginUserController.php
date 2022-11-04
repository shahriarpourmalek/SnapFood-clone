<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginUserController extends Controller
{
    public function index()
    {
        return view('login.user_login.loginuser');
    }
}
