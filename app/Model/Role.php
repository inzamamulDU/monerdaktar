<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class Role extends Model
{

    protected $fillable = [
        'name'
    ];


    public function users(){
        return $this->hasMany(User::class);
    }
}
