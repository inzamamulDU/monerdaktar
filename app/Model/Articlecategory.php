<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articlecategory extends Model
{
    //
    protected $fillable = [
        'name'
    ];


    public function articles(){
        return $this->hasMany('App\Articlecategory');
    }
}
