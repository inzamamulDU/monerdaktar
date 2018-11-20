<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Model\Role;
use App\Model\Comment;
use App\Model\DoctorInfo;
use App\Model\PatientInfo;

class User extends Model
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name','email', 'password','phone','patient_info_id','doctor_info_id','role_id','photo','active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function patientInfo(){
        return $this->hasOne(PatientInfo::class);
    }

    public function doctorInfo(){
        return $this->hasOne(DoctorInfo::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }



}
