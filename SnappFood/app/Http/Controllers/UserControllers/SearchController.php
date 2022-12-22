<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Resturant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function findResturant()
    {
        $user = Auth::user();
        $restuarants = Resturant::get();
 
    }
}
