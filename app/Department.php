<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = ['department'];

    public static $rules = [
    		'department' => 'required|unique:departments,department'
    		];


}
