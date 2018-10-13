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
            'host_id'          => $this->host_id,
            'guest_id'          => $this->guest_id,
            'appoinment_time'          => $this->appoinment_time


        ];
    }
}
