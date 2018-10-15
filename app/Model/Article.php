<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Articlecategory;
use App\Model\User;
use App\Model\Commnet;

class Article extends Model
{
    protected $fillable = [
        'title', 'article_content','user_id','articlecategory_id','publish','positive_vote',
        'negative_vote'
    ];

    public function articlecategory(){
        return $this->belongsTo(Articlecategory::class);
    }

    public function user(){
        return $this->belongsTo(User::Class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
