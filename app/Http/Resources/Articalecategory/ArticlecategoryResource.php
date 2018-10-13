<?php

namespace App\Http\Resources\Articlecategory;

use Illuminate\Http\Resources\Json\Resource;

class ArticlecategoryResource extends Resource
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
            'name'          => $this->name

        ];
    }
}
