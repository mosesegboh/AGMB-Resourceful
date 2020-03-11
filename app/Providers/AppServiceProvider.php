<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Validator;

use Input;

use App\User;

use App\Appraisal;

use DB;

use App\Account;

use App\AccountType;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('answer_checker', function($attribute, $values, $parameters, $validator){
            foreach ($values as $key => $value) {
                if(empty($value)){
                    return false;
                }
            }

        return true;

        });

        Validator::extend('account_answer_checker', function($attribute, $values, $parameters, $validator){
            foreach ($values as $key => $value) {
                if(empty($value)){
                    return false;
                }
            }

        return true;

        });
        

        Validator::extend('fixed_account_check', function($attribute, $values, $parameters, $validator){
                $count = AccountType::all();

            return $count > 0;

        });

        Validator::extend('account_uniqueness', function($attribute, $values, $parameters, $validator){
            $where_clause = "( '".implode("', '", $values)."' )";

           // dd($where_clause);

            $count = Account::whereRaw('`account_no` IN '.$where_clause)
                            ->count();

           // dd($count);

            return $count === 0;

        });


        Validator::extend('activate_rule', function($attribute, $values, $parameters, $validator){
            
            $count = User::where('email', Input::get($attribute))
            ->where('activate', 1)
            ->count();

            return $count == 1;

        });

        Validator::extend('check_active_appraisal', function($attribute, $values, $parameters, $validator){
            
            $count = Appraisal::where('supervisor_id', Input::get('supervisor'))
            ->where('appraisee_id', Input::get('appraisee'))
            ->where('status', 1)
            ->count();

            return $count == 0;

        });

        Validator::extend('rank_min_max', function($attribute, $values, $parameters, $validator){
            foreach ($values as $key => $value) {
                if($value < 0 || $value > 100){
                    return false;
                }
            }

        return true;

        });

        Validator::extend('different_array', function($attribute, $values, $parameters, $validator){
            return !in_array(Input::get('supervisor'), Input::get('staff'));
        });

        Validator::extend('supervisor_assign_check', function($attribute, $values, $parameters, $validator){
            $staff_selected = '('.implode(', ', Input::get('staff')).')';

            if(!empty($parameters)){
                $supervisor_id = $parameters[0];
                 $staff = DB::table('supervisor_appraisee')->select('supervisor_id', 'appraisee_id')
                 ->where('supervisor_id', '!=', $supervisor_id)
                 ->whereRaw("appraisee_id IN ".$staff_selected)
                    ->count();
            }else{
                $staff = DB::table('supervisor_appraisee')->select('supervisor_id', 'appraisee_id')->whereRaw("supervisor_id !=  appraisee_id IN ".$staff_selected)
                ->count();
            }

            return $staff == 0;
        });

        Validator::replacer('answer_checker', function($message, $attribute, $rule, $parameters){

            $values = Input::get($attribute);

            $err_msg = '';

            foreach ($values as $key => $value) {
                if(empty($value)){
                    $err_msg .= 'The '.$parameters[1].' of Question '.$key.' of '.ucwords(str_replace('_', ' ', $parameters[0])).' is required<br>';
                }
            }

            return $err_msg;
        });

        Validator::replacer('account_answer_checker', function($message, $attribute, $rule, $parameters){

            $values = Input::get($attribute);

            $err_msg = '';

            foreach ($values as $key => $value) {
                if(empty($value)){
                    $err_msg .= 'The '.ucwords(str_replace('_', ' ', $parameters[0])).' of '.ordinal(($key+1)).' '.ucwords(str_replace('_', ' ', $parameters[1])).' is required<br>';
                }
            }

            return $err_msg;
        });

        Validator::replacer('rank_min_max', function($message, $attribute, $rule, $parameters){

            $values = Input::get($attribute);

            $err_msg = '';

            foreach ($values as $key => $value) {
                if($value < 0 || $value > 100){
                    $err_msg .= 'The '.$parameters[1].' of Question '.$key.' of '.ucwords(str_replace('_', ' ', $parameters[0])).' must be between 0 and 100<br>';
                }
            }

            return $err_msg;
        });

         Validator::replacer('activate_rule', function($message, $attribute, $rule, $parameters){
            
            return "Your account has not been activated";

        });


         Validator::replacer('check_active_appraisal', function($message, $attribute, $rule, $parameters){
            
            return "You have an active Appraisal for the appraisee by the supervisor";

        });

         Validator::replacer('fixed_account_check', function($message, $attribute, $rule, $parameters){
            
            return "Consult the developer to rectify the issue";

        });

         Validator::replacer('account_uniqueness', function($message, $attribute, $rule, $parameters){

            $msg = '';
            
            $where_clause = "( '".implode("', '", Input::get('account_number'))."' )";

            $already_exist_accounts = Account::whereRaw('`account_no` IN '.$where_clause)
                            ->get();

            foreach ($already_exist_accounts as $account) {
                $msg .= 'Account Number <strong>'.$account->account_no.'</strong> already exist<br>';
            }

            return $msg;

        });

         Validator::replacer('different_array', function($message, $attribute, $rule, $parameters){

            $user = User::find(Input::get('supervisor'));
            
            return "You can not select ".strtoupper($user->fullname)." as supervisor and staff at the same time";

        });

          Validator::replacer('supervisor_assign_check',  function($message, $attribute, $rule, $parameters){

            $msg = '';

            $staff_selected = '('.implode(', ', Input::get('staff')).')';

            if(!empty($parameters)){
                $supervisor_id = $parameters[0];

                $staffs = DB::table('supervisor_appraisee')
            ->select('supervisor_appraisee.supervisor_id', 'supervisor_appraisee.appraisee_id', 'users.fullname as appraisee')
            ->leftJoin('users', function($leftJoin){
                                $leftJoin->on('users.id', '=', 'supervisor_appraisee.appraisee_id');
                            })
            ->where('supervisor_id', '!=', $supervisor_id)
            ->whereRaw('supervisor_appraisee.appraisee_id IN '.$staff_selected)
            ->get();

            $supervisors = DB::table('supervisor_appraisee')
            ->select('supervisor_appraisee.supervisor_id', 'supervisor_appraisee.appraisee_id', 'users.fullname as supervisor')
            ->leftJoin('users', function($leftJoin){
                                $leftJoin->on('users.id', '=', 'supervisor_appraisee.supervisor_id');
                            })
            ->where('supervisor_id', '!=', $supervisor_id)
            ->whereRaw('supervisor_appraisee.appraisee_id IN '.$staff_selected)
            ->get();


            }else{
            $staffs = DB::table('supervisor_appraisee')
            ->select('supervisor_appraisee.supervisor_id', 'supervisor_appraisee.appraisee_id', 'users.fullname as appraisee')
            ->leftJoin('users', function($leftJoin){
                                $leftJoin->on('users.id', '=', 'supervisor_appraisee.appraisee_id');
                            })
            ->whereRaw('supervisor_appraisee.appraisee_id IN '.$staff_selected)
            ->get();

            $supervisors = DB::table('supervisor_appraisee')
            ->select('supervisor_appraisee.supervisor_id', 'supervisor_appraisee.appraisee_id', 'users.fullname as supervisor')
            ->leftJoin('users', function($leftJoin){
                                $leftJoin->on('users.id', '=', 'supervisor_appraisee.supervisor_id');
                            })
            ->whereRaw('supervisor_appraisee.appraisee_id IN '.$staff_selected)
            ->get();

            }

            foreach ($staffs as $key => $staff) {
                $msg .= strtoupper($supervisors[$key]->supervisor).' has been assigned to supervise '.strtoupper($staff->appraisee).'<br>';
            }

            return $msg;


        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
