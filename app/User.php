<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'email', 'username', 'password', 'address', 'phone', 'department_id', 'job_title_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function accounts(){
        return $this->hasMany('App\Account', 'staff_id');
    }

    public function mobilisation(){
        return $this->hasMany('App\DepositMobilisation', 'staff_id');
    }

    public function appraisee(){
        return $this->hasMany('App\Appraisal', 'appraisee_id');
    }

    public function supervisor(){
        return $this->hasMany('App\Appraisal', 'supervisor_id');
    }

    public function supervisor_assign(){
        return  $this->belongsToMany('App\User', 'supervisor_appraisee', 'appraisee_id', 'supervisor_id')->withTimestamps();
    }

    public function appraisee_assign(){
        return  $this->belongsToMany('App\User', 'supervisor_appraisee', 'supervisor_id', 'appraisee_id')->withTimestamps();
    }

}
