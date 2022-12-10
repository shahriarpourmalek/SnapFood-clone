<?php

namespace App\Http\Resources;

use App\Models\Schedule;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

            return [$this->day_of_week => [
                'open' => $this->open_time,
                'close' => $this->close_time
            ]];

        return parent::toArray($request);
    }
}
