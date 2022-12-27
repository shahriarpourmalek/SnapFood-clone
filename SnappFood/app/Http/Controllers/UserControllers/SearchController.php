<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResturantInfoResource;
use App\Models\Address;
use App\Models\Resturant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function findRestaurant()
    {
        $user = Auth::user();
        $currentAddress = Address::find($user->current_address);
$nearRestaurants = [];
        $restuarants = Resturant::all();

        foreach ($restuarants as $restuarant){

            if ($currentAddress->latitude <=$restuarant->latitude +5 && $currentAddress->longitude <= $restuarant->longitude + 5){

                $nearRestaurants[] = $restuarant;
            }

        }
        if (empty($nearRestaurants)){
            return ['massage' => 'there is  no restaurant near you'];
        }
return           ResturantInfoResource::collection( $nearRestaurants);
;

    }
}
