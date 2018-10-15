<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Article;
use App\Model\User;

class Comment extends Model
{
    //
    protected $fillable = [
        'text','user_id','article_id','publish'
    ];


    public function article(){

        return $this->belongsTo(Article::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }



}
