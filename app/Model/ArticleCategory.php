<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $fillable = [
        'name'
    ];


    public function articles(){
        return $this->hasMany(Article::class);
    }
}
