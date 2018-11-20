<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\Resource;

class UserCollection extends Resource
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
            'name'          => $this->name,
            'email'          => $this->email,
            'phone'          => $this->phone,
            'photo'          => $this->photo,
            'role_id'          => $this->role_id,
            'role'          => $this->role,
            'patient_info_id' => $this->patient_info_id,
            'patientInfo' => $this->patientInfo,
            'doctor_info_id' => $this->doctor_info_id,
            'doctorInfo' => $this->doctorInfo,
            'active'          => $this->active

        ];
    }
}
