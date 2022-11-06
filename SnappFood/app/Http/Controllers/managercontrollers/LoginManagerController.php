<?php

namespace App\Http\Controllers\managercontrollers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginManagerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use thecodeholic\phpmvc\View;

class LoginManagerController extends Controller
{
    public function create()
    {
        return view('login.manager_login.loginmanager');
    }

    public function authenticate(LoginManagerRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::guard('manager')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/managerdashboard')->with('session', 'mothafucka');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        return view('login.manager_login.loginmanager');
    }

    public function destroy()
    {
        Auth::guard('manager')->logout();
        return redirect('/');
    }
}
