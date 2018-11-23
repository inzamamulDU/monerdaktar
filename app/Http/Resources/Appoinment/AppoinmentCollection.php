<?php

namespace App\Http\Resources\Appoinment;

use Illuminate\Http\Resources\Json\Resource;

class AppoinmentCollection extends Resource
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
            'title'          => $this->title,
            'doctor_id'          => $this->doctor_id,
            'doctor'          => $this->doctor,
            'doctor_secret_key'          => $this->doctor_secret_key,
            'patient_id'          => $this->patient_id,
            'patient'          => $this->patient,
            'patient_secret_key'          => $this->patient_secret_key,
            'start_time'          => $this->start_time,
            'end_time'          => $this->end_time



        ];
    }
}
