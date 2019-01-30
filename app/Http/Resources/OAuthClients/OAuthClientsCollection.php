<?php

namespace App\Http\Resources\OAuthClients;

use Illuminate\Http\Resources\Json\Resource;

class OAuthClientsCollection extends Resource
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
            'secret'          => $this->secret


        ];
    }
}
