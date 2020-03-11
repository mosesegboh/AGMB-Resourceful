<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\AccountType;

use App\Account;

use App\User;

use Validator;

class AccountController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');

        $this->middleware('auditor', ['only' => ['pending', 'verified']]);
    }

    public function view(){
    	$title = 'View Staff New Accounts';

    	$accounts = Account::where('staff_id', auth()->id())
    						->paginate(50);

    	return view('dashboard.account.view', compact('title', 'accounts'));

    }

    public function viewAll(){
    	$title = 'View All Staff Account';

    	$accounts = Account::orderBy('created_at', 'desc')
    						->paginate(50);

    	return view('dashboard.account.view-all', compact('title', 'accounts'));

    }

    public function assignAccountToStaff($id){
        $title = 'Transfer Account To Staff';

        $staffs = User::all();

        $account = Account::findOrFail($id);

        return view('dashboard.account.transfer', compact('account', 'staffs', 'title'));
    }

    public function assignAccountToStaffSubmit($id, Request $request){
        $validate = Validator::make($request->all(), [
                'account' => 'required|integer',
                'staff' => 'required'
            ]);

        if($validate->passes()){

            $account = Account::findOrFail($request->account);

            $account->staff_id = $request->staff;

            $account->save();

            flash('You have successfully transfer account to staff')->success();

            return redirect()->route('view.account.for.verify');

        }

        flash('Something is wrong')->error();

        return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();

    }

    public function create(){
    	$title = 'Create New Account';

    	$account_types = AccountType::all();

    	return view('dashboard.account.create', compact('title', 'account_types'));

    }

    public function store(Request $request){

    	$validate = Validator::make($request->all(), Account::$rules);

    	if($validate->passes()){
    		$insert = array();

    		for ($i=0; $i < count($request->input('account_number')); $i++) {
    			$insert[]  = array(
    							'staff_id' => auth()->id(),
								'deposit_target' => $request->deposit_target[$i],
								'account_name' => $request->account_name[$i],
								'account_no' => $request->account_number[$i],
								'date_account_opened' => $request->date_account_opened[$i],
								'balance_at_appraisal' => $request->balance[$i],
								'account_type' => $request->account_type[$i]
    							);
    		}

    		Account::insert($insert);

    		flash('You have successfully created account(s)')->success();

    		return redirect()->route('view.account');


    	}

    	flash('Something is wrong')->error();

    	return redirect()->back()
    					->withErrors($validate)
    					->withInput();
    }

    public function edit($id){
    	$title = 'Edit Account Type';

    	$account_types = AccountType::all();

    	$account = Account::findOrFail($id);

    	return view('dashboard.account.edit', compact('title', 'account_types', 'account'));
    }

    public function update($id, Request $request){
    	$validate = Validator::make($request->all(), [
    			'account_name' => 'required',
    			'account_number' => 'required|unique:accounts,account_no,'.$id,
    			'account_type' =>'required',
    			'deposit_target' => 'required',
    			'date_account_opened' => 'required',
    			'balance' => 'required'
    		]);

    	if($validate->passes()){

    		$account = Account::findOrFail($id);

    		$account->update([
    				'deposit_target' => $request->deposit_target,
					'account_name' => $request->account_name,
					'account_no' => $request->account_number,
					'date_account_opened' => $request->date_account_opened,
					'balance_at_appraisal' => $request->balance,
					'account_type' => $request->account_type
    			]);

    		flash('You have successfully updated account')->success();

    		return redirect()->route('view.account');

    	}

    	flash('Something is wrong')->error();

    	return redirect()->back()
    					->withErrors($validate)
    					->withInput();

    }

    public function rolloverView(){
    	$title = 'View Fixed Account For Roll Over';

    	$fixed_accounts = Account::where('staff_id', auth()->id())
    							->where('account_type', 1)
    							->whereRaw("`account_rollover` IS NULL")
    							->get();

    	return view('dashboard.account.rollover', compact('title', 'fixed_accounts'));

    }

    public function rollover(Request $request){

    }

    public function verified($id){

    	$account = Account::findOrFail($id);

    	$account->status = 1;

    	$account->save();

    	flash('You have Successfully Verified the account')->success();

    	return redirect()->back();
    }

    public function pending($id){

    	$account = Account::findOrFail($id);

    	$account->status = 0;

    	$account->save();

    	flash('You have Successfully change the status of the account to PENDING')->success();

    	return redirect()->back();
    }

    public function delete($id){

    	$account = Account::findOrFail($id);

    	$account->delete();

    	flash('You have Successfully delete the account')->success();

    	return redirect()->back();
    }
}
