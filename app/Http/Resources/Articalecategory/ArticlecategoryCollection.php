<?php

namespace App\Http\Resources\Articlecategory;

use Illuminate\Http\Resources\Json\Resource;

class ArticlecategoryCollection extends Resource
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
            'name'          => $this->name


        ];
    }
}
