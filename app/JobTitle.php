<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    protected $table = 'job_titles';

    protected $fillable = ['job_title'];

    public static $rules = [
    		'job_title' => 'required|unique:job_titles,job_title'
    		];
}
