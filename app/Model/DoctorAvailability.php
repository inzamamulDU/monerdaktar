<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\DoctorInfo;

class DoctorAvailability extends Model
{
    protected $fillable = [
        'doctor_info_id','day','state_time','end_time'
    ];


    public function doctorInfo(){
        return $this->belongsTo(DoctorInfo::class);
    }



}
