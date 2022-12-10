<?php

namespace App\Http\Controllers\managercontrollers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManagerRequest;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterManagerController extends Controller
{


    public function create(){
        return view('managers.index');
    }

    public function store(ManagerRequest $request)
    {
        $request->validated();
$manager =   Manager::create([
           'name' => $request->input('username'),
           'email' => $request->input('email'),
           'phone' => $request->input('phone'),
           'password' => bcrypt($request->input('password'))
        ]);

Auth::login($manager);
        return redirect('/managers-login')->with('success', "Account successfully registered.");
    }
}
