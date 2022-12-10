<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodsResource;
use App\Http\Resources\ResturantAddressResource;
use App\Http\Resources\ResturantInfoResource;
use App\Http\Resources\ScheduleResource;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Food;
use App\Models\FoodsCatgory;
use App\Models\Resturant;
use App\Models\Schedule;
use app\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function React\Promise\map;

class UserResturantsConroller extends Controller
{
    public function getAddress($resturant_id)
    {
        return [
          ResturantInfoResource::collection( Resturant::all()->where('id',$resturant_id)),
            'schedule' => ScheduleResource::collection(Schedule::all()->where('resturant_id',$resturant_id))
        ];
    }

    public function getAllAdrresses()
    {
        return ResturantAddressResource::collection(Resturant::all());
    }

    public function getAllFoods($resturant_id)
    {
return FoodsResource::collection(Resturant::all()->where('id',$resturant_id));
    }
}
