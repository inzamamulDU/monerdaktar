<?php

namespace App\Http\Resources\DoctorAvailability;

use Illuminate\Http\Resources\Json\Resource;

class DoctorAvailabilityCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'           =>$this->id,

            'doctor_info_id' => $this->doctor_info_id,
            'doctorInfo' => $this->doctorInfo,
            'day'          => $this->day,
            'start_time'          => $this->start_time,
            'end_time'          => $this->end_time
        ];
    }
}
