<?php

namespace App\Http\Resources;

use App\Models\Restaurant;
use App\Models\Resturant;
use Illuminate\Http\Resources\Json\JsonResource;

class CartsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'card id' => $this->id,
            'status' => $this->customer_status,
            'restaurant' => [
                'title' => Resturant::find($this->resturant_id)->name,
                'category' =>Resturant::find($this->resturant_id)->categories()->get()->map(function ($resturant){
                    return $resturant->name;
                })
]
            ,
            'food' => FoodsCartResource::collection($this->foods),
        ];
    }
}
