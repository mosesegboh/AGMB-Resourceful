<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $table = 'account_types';

    protected $fillable = ['name'];

     public static $rules = [
    		'account_type' => 'required|unique:account_types,name|fixed_account_check'
    		];

    public function account(){
        return $this->hasMany('App\Account', 'account_type');
    }
}
