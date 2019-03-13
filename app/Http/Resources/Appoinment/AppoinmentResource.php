<?php

namespace App\Http\Resources\Appoinment;

use Illuminate\Http\Resources\Json\Resource;

class AppoinmentResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'           =>$this->id,
            'title'          => $this->title,
            'type'          => $this->type,
            'doctor_id'          => $this->doctor_id,
            'doctor'          => $this->doctor,
            'patient_id'          => $this->patient_id,
            'patient'          => $this->patient,
            'room'          => $this->room,
            'start_time'          => $this->start_time,
            'end_time'          => $this->end_time


        ];
    }
}
