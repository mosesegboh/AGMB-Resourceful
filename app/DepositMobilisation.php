<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepositMobilisation extends Model
{
   protected $table = 'deposit_mobilisations';

   protected $fillable = ['staff_id', 'account_id', 'credit_turnover', 'debit_turnover', 'current_balance'];

   public static $rules = [
    						'account_id' => 'required|array|account_answer_checker:account_name,deposit_mobilisation',
    						'credit_turnover' => 'required|array|account_answer_checker:credit_turn_over,deposit_mobilisation',
                            'debit_turnover' => 'required|array|account_answer_checker:debit_turn_over,deposit_mobilisation'
    					];

    public function staff(){
    	return $this->belongsTo('App\User', 'staff_id');
    }

    public function account(){
    	return $this->belongsTo('App\Account', 'account_id');
    }
}
