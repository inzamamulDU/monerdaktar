<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
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
            'name'          => $this->name,
            'email'          => $this->email,
            'phone'          => $this->phone,
            'photo'          => $this->photo,
            'address'          => $this->address,
            'country'          => $this->country,
            'postcode'          => $this->postcode,
            'city'          => $this->country,
            'job_title'          => $this->job_title,
            'orgnization'          => $this->orgnization,
            'role_id'          => $this->role_id,
            'active'          => $this->active

        ];
    }
}
