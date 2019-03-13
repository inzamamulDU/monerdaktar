<?php

namespace App\Http\Resources\PatientInfo;

use Illuminate\Http\Resources\Json\Resource;

class PatientInfoResource extends Resource
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
            'user' => $this->user,
            'user_id' => $this->user_id
        ];
    }
}
