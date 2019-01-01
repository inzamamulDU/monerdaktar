<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    protected $fillable = [
        'title','type','doctor_id','patient_id','room','start_time','end_time'
    ];


    public function patient(){
        return $this->belongsTo(User::class);
    }

    public function doctor(){
        return $this->belongsTo(User::class);
    }
}
