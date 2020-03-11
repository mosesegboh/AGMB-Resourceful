<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\DepositMobilisation;

use App\Account;

use App\Appraisal;

use Validator;


class DepositMobilisationController extends Controller
{
   public function __construct(){
   		$this->middleware('auth');
      $this->middleware('auditor', ['only' => ['viewAll']]);
   }

   public function view(){
   	$title = 'View Staff Deposit Mobilisation';

   	$staff_mobilisation = DepositMobilisation::where('staff_id', auth()->id())
   											->get();

   	return view('dashboard.mobilisation.view', compact('title', 'staff_mobilisation'));

   }

   public function viewAll(){
    	$title = 'View All Staff Deposit Mobilisation';

    	$deposits = DepositMobilisation::orderBy('created_at', 'desc')
    						->paginate(50);

    	$staff_ids = DepositMobilisation::distinct()
    									->select('staff_id')
    									->get();

    	return view('dashboard.mobilisation.view-all', compact('title', 'deposits', 'staff_ids'));

    }

    public function postViewStaff(Request $request){

    	$validate = Validator::make($request->all(), [
    				'staff' => 'required',
    				'start' => 'required|date',
    				'end' => 'required|date'
    		]);

    	if($validate->passes()){

	    	session()->put('start', $request->start);
	    	session()->put('end', $request->end);
	    	return redirect()->route('view.staff.deposit.mobilisation.for.verify', ['staff_id' => $request->staff]);
    	}

    	flash('Something is wrong')->error();

    	return redirect()->back()
    					->withErrors($validate)
    					->withInput();


    }

    public function viewSingleDM($id){

      $staff_appraisal = Appraisal::findOrFail($id);

      session()->put('start', $staff_appraisal->period_begin);
      session()->put('end', $staff_appraisal->period_end);

      return $this->viewStaff($staff_appraisal->appraisee_id);

    }

    public function viewStaff($staff_id){
    	$title = 'View Staff Deposit Mobilisation';

    	$deposits = DepositMobilisation::where('staff_id', $staff_id)
    						->orderBy('created_at', 'desc')
    						->where('created_at', '>=', session()->get('start'))
    						->where('created_at', '<=', session()->get('end'))
    						->get();

    	$balance = DepositMobilisation::where('staff_id', $staff_id)
    						->orderBy('created_at', 'desc')
    						->where('created_at', '>=', session()->get('start'))
    						->where('created_at', '<=', session()->get('end'))
    						->where('status', 1)
    						->get();

    	$target =  Account::where('staff_id', $staff_id)
    						->orderBy('created_at', 'desc')
    						->where('created_at', '>=', session()->get('start'))
    						->where('created_at', '<=', session()->get('end'))
    						->where('status', 1)
    						->get();

    	$staff_ids = DepositMobilisation::distinct()
    									->select('staff_id')
    									->get();

    	$staff = \App\User::findOrFail($staff_id);

    	return view('dashboard.mobilisation.view-staff', compact('title', 'deposits', 'staff_ids', 'staff', 'target', 'balance'));

    }

   public function create(){
   	$title = 'Create Deposit Mobilisation';

   	$staff_accounts = Account::where('staff_id', auth()->id())
   							->whereRaw("`account_rollover` IS NULL")
   							->get();

   	return view('dashboard.mobilisation.create', compact('title', 'staff_accounts'));

   }

   public function store(Request $request){

   	$validate = Validator::make($request->all(),DepositMobilisation::$rules);

   	if($validate->passes()){

   		for ($i=0; $i < count($request->input('account_id')); $i++) {
    			$insert[]  = array(
    							'staff_id' => auth()->id(),
								'account_id' => $request->account_id[$i],
								'debit_turnover' => $request->debit_turnover[$i],
								'credit_turnover' => $request->credit_turnover[$i],
								'current_balance' => ($request->credit_turnover[$i] - $request->debit_turnover[$i])
    							);
    		}

    		DepositMobilisation::insert($insert);

    		flash('You have successfully created account(s)')->success();

    		return redirect()->route('view.deposit.mobilisation');

   	}

   	return redirect()->back()
   					->withErrors($validate)
   					->withInput();


   }
   public function edit($id){

   	$title = 'Edit Deposit Mobilisation';

    	$accounts = Account::where('staff_id', auth()->id())
   							->whereRaw("`account_rollover` IS NULL")
   							->get();

    	$deposit = DepositMobilisation::findOrFail($id);

    	return view('dashboard.mobilisation.edit', compact('title', 'accounts', 'deposit'));

   }

   public function update($id, Request $request){
   		$validate = Validator::make($request->all(),[
   				'account_id' => 'required',
    			'credit_turnover' => 'required',
                'debit_turnover' => 'required'
   			]);

    	if($validate->passes()){

    		$mobilisation = DepositMobilisation::findOrFail($id);

    		$mobilisation->update([
    				'staff_id' => auth()->id(),
    				'account_id' => $request->account_id,
					'debit_turnover' => $request->debit_turnover,
					'credit_turnover' => $request->credit_turnover,
					'current_balance' => ($request->credit_turnover - $request->debit_turnover)
    			]);

    		flash('You have successfully updated Deposit Mobilisation')->success();

    		return redirect()->route('view.deposit.mobilisation');

    	}

    	flash('Something is wrong')->error();

    	return redirect()->back()
    					->withErrors($validate)
    					->withInput();
   }

   public function verified($id){

    	$mobilisation = DepositMobilisation::findOrFail($id);

    	$mobilisation->status = 1;

    	$mobilisation->save();

    	flash('You have Successfully Verified the deposite mobilisation')->success();

    	return redirect()->back();
    }

    public function pending($id){

    	$mobilisation = DepositMobilisation::findOrFail($id);

    	$mobilisation->status = 0;

    	$mobilisation->save();

    	flash('You have Successfully change the status of the deposit mobilisation to PENDING')->success();

    	return redirect()->back();
    }

    public function delete($id){

    	$mobilisation = DepositMobilisation::findOrFail($id);

    	$mobilisation->delete();

    	flash('You have Successfully delete the deposit mobilisation')->success();

    	return redirect()->back();
    }
}
