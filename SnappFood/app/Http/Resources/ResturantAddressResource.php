<?php

namespace App\Http\Resources;

use App\Models\Resturant;
use Illuminate\Http\Resources\Json\JsonResource;

class ResturantAddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return Resturant::all()->map(function ($resturant) {
            return ['id' => $resturant->id,
                'title' => $resturant->name,
                'type' =>
                    Resturant::with('categories')
                        ->get()
                        ->map(function ($resturant) {
                            return $resturant->categories->map(function ($category) {
                                return $category->name;
                            });
                        })
                ,
                'address' => [
                    'address' => $resturant->address,
                    'latitude' => $resturant->latitude,
                    'longitude' => $resturant->longitude
                ]


            ];
        });

        return parent::toArray($request);
    }
}
