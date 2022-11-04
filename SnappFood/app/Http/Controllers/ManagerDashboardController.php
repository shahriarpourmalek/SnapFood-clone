<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerDashboardController extends Controller
{
    public function dashboard()
    {
        return view('managers.managers-dashboard.dashboard');
    }

}
