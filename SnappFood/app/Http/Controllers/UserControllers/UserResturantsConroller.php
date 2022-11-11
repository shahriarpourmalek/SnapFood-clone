<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Resturant;
use App\Models\Schedule;
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
        $resturants = Resturant::all()->map(function ($resturant) {
            return ['id' => $resturant->id,
                'title' => $resturant->name,
                'type' => [
                    Resturant::with('categories')
                        ->get()
                        ->map(function ($resturant) {
                            return $resturant->categories->map(function ($category) {
                                return $category->name;
                            });
                        })
                ],
                'address' => [
                    'address' => $resturant->address,
                    'latitude' => $resturant->latitude,
                    'longitude' => $resturant->longitude
                ]


            ];
        });

        return $resturants;
    }
}
