<?php

namespace App\Http\Controllers\admincontrollers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $user = Auth::guard('admin')->user();
        return view('admins.admin-dashboard.dashboard', ['user' => $user]);
    }
}
