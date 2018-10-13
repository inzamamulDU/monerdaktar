<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    protected $fillable = [
        'title','host_id','guest_id','appoinment_time'
    ];

}
