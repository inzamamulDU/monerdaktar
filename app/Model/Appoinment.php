<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    protected $fillable = [
        'title','doctor_id','patient_id','patient_secret_key','doctor_secret_key','start_time','end_time'
    ];


    public function patient(){
        return $this->belongsTo(User::class);
    }

    public function doctor(){
        return $this->belongsTo(User::class);
    }
}
