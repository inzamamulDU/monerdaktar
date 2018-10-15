<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Article;

class Articlecategory extends Model
{
    //
    protected $fillable = [
        'name'
    ];


    public function articles(){
        return $this->hasMany(Article::class);
    }
}
