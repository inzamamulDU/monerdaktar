<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [
        'name'
    ];


    public function users(){
        return $this->hasMany('App\Model\User');
    }
}
