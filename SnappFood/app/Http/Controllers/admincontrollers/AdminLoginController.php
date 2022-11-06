<?php

namespace App\Http\Controllers\admincontrollers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function create()
    {
        return view('login.admin-login.adminlogin');
    }

    public function authenticate(AdminLoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/admindashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        return view('login.admin-login.adminlogin');
    }

    public function destroy()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
