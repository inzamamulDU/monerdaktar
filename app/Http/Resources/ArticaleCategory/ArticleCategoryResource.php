<?php

namespace App\Http\Resources\ArticleCategory;

use Illuminate\Http\Resources\Json\Resource;

class ArticleCategoryResource extends Resource
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
