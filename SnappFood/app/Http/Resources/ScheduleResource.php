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
        return      Schedule::all()->where('resturant_id', $resturant_id)->map(function ($schedule) {
            return [$schedule->day_of_week => [
                'open' => $schedule->open_time,
                'close' => $schedule->close_time
            ]];
        });
        return parent::toArray($request);
    }
}
