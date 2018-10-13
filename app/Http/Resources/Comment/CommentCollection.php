<?php

namespace App\Http\Resources\Comment;

use Illuminate\Http\Resources\Json\Resource;

class CommentCollection extends Resource
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
            'text'          => $this->text,
            'article_id'          => $this->article_id,
            'user_id'          => $this->user_id,
            'publish'          => $this->publish,


        ];
    }
}
