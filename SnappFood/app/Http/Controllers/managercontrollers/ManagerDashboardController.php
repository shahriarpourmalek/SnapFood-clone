<?php

namespace App\Http\Controllers\managercontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:manager');
    }

    public function dashboard()
    {
        return view('managers.managers-dashboard.dashboard');
    }

}
