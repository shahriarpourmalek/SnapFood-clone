<?php

namespace App\Http\Resources;

use App\Models\Discount;
use App\Models\Food;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodsResource extends JsonResource
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
    'categories' => $this->foods()->get()->map(function ($food){
        return $food->foodCategory()->get()->map(function ($category){
            return [
              'id' =>$category->id,
              'title' => $category->name,
                'foods' => Food::where('foods_category_id',$category->id)->get()->map(function ($food){
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

        return parent::toArray($request);
    }
}
