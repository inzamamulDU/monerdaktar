<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Articlecategory;
use App\Model\User;

class Article extends Model
{
    protected $fillable = [
        'title', 'article_content','user_id','articlecategory_id','publish','positive_vote',
        'negative_vote'
    ];

    public function category(){
        return $this->belongsTo('App\Model\Articlecategory');
    }

    public function user(){
        $this->belongsTo('App\Model\User');
    }
}
