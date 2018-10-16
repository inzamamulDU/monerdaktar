<?php

namespace App\Http\Resources\Article;

use Illuminate\Http\Resources\Json\Resource;

class ArticleResource extends Resource
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
            'id'          => $this->id,
            'title'          => $this->title,
            'article_content'          => $this->article_content,
            'articlecategory_id'         => $this->articlecategory_id,
            'user_id'          => $this->user_id,
            'articlecategory'          => $this->articlecategory,
            'user'          => $this->user,
            'comments'          => $this->comments


        ];
    }
}
