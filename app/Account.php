<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';

    protected $fillable = ['staff_id', 'deposit_target', 'account_name', 'account_no', 'date_account_opened', 'balance_at_appraisal', 'account_type'];

    public static $rules = [
    						'deposit_target' => 'required|array|account_answer_checker:deposit_target,new_account',
    						'account_name' => 'required|array|account_answer_checker:account_name,new_account',
                            'account_type' => 'required|array|account_answer_checker:account_type,new_account',
    						'account_number' => 'required|array|account_answer_checker:account_number,new_account|account_uniqueness',
    						'date_account_opened' => 'required|array|account_answer_checker:date_account_opened,new_account',
    						'balance' => 'required|array|account_answer_checker:balance_as_at_appraisal_date,new_account'
    						];

    public function appraisee(){
    	return $this->belongsTo('App\User', 'staff_id');
    }

    public function mobilisation(){
        return $this->hasMany('App\DepositMobilisation', 'staff_id');
    }

    public function accountType(){
        return $this->belongsTo('App\AccountType', 'account_type');
    }
}
