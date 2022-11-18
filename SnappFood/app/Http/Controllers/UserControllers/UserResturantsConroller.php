<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResturantAddressResource;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Foods;
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
        $schedules = Schedule::all()->where('resturant_id', $resturant_id)->map(function ($schedule) {
            return [$schedule->day_of_week => [
                'open' => $schedule->open_time,
                'close' => $schedule->close_time
            ]];
        });


        return [
            Resturant::find($resturant_id),
            'schedule' => $schedules
        ];
    }

    public function getAllAdrresses()
    {
        return ResturantAddressResource::collection(Resturant::all());
    }

    public function getAllFoods($resturant_id)
    {
return [
    'categories' => Resturant::find($resturant_id)->foods()->get()->map(function ($food){
        return $food->foodCategory()->get()->map(function ($category){
            return [
              'id' =>$category->id,
              'title' => $category->name,
                'foods' => Foods::where('foods_category_id',$category->id)->get()->map(function ($food){
                       $discount = Discount::find($food->discount_id);

                    return [
                        'id' => $food->id,
                        'title' => $food->name,
                        'price' => $food->price,
                        'off' => [
                      $discount

                        ],

                        'raw_material' => $food->raw_material,
                        'image' => $food->image,
                    ];
                })
            ];
        });
    })
];


    }
}
