<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PatientInfo extends Model
{
    protected $fillable = [
        'user_id','address','postcode','city','country'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
