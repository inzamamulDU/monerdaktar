<?php

namespace App\Http\Resources\OAuthClients;

use Illuminate\Http\Resources\Json\Resource;

class OAuthClientsResource extends Resource
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
            'secret'          => $this->secret


        ];
    }
}
