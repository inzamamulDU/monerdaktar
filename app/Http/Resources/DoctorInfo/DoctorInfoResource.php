<?php

namespace App\Http\Resources\DoctorInfo;

use Illuminate\Http\Resources\Json\Resource;

class DoctorInfoResource extends Resource
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
            'address'          => $this->address,
            'postcode'          => $this->postcode,
            'city'          => $this->city,
            'country'          => $this->country,
            'biography'          => $this->biography,
            'designation'          => $this->designation,
            'institute' => $this->institute,
            'available_time' => $this->available_time,
            'degree' => $this->degree,
            'user' => $this->user,
            'user_id' => $this->user_id
        ];
    }
}
