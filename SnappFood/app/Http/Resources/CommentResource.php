<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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

                'cart Id' => $this->order->id,
                'author' => auth()->user()->name,
                'food' => $this->food->name,
                'score' => $this->score,
                'content' => $this->message,
                $this->mergeWhen(!is_null($this->answer), ['answer' => $this->answer]),

        ];
    }
}
