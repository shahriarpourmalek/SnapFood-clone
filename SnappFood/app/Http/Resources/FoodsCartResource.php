<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodsCartResource extends JsonResource
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

            'id' => $this->id,
            'title' => $this->name,
            'price' => $this->final_price,
            'count' => $this->getOriginal()['pivot_count']
        ];
        return parent::toArray($request);
    }
}
