<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DoctorInfo extends Model
{
    protected $fillable = [
        'user_id','address','postcode','city','country','biography','designation','institute','degree'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
