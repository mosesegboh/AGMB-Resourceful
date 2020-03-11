<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\AccountType;

use Validator;

class AccountTypeController extends Controller
{
    public function __construct(){

    }

    public function view(){

    	$title = 'View Account Type';

    	$account_types =  AccountType::all();

    	return view('dashboard.account-type.view', compact('title', 'account_types'));

    }

    public function create(){

    	$title = 'Create Account Type';

    	return view('dashboard.account-type.create', compact('title'));
    }

    public function store(Request $request){

    	$validate = Validator::make($request->all(), AccountType::$rules);

    	if($validate->passes()){

    		AccountType::create([
    			'name' => $request->account_type
    			]);

    		flash('You have successfully created account type')->success();

    		return redirect()->back();

    	}

    	flash('Something is wrong')->error();

    	return redirect()->back()
    					->withErrors($validate)
    					->withInput();

    }

    public function edit($id){
    	$title = "Edit Account Type";

    	$account_type = AccountType::findOrFail($id);

    	return view('dashboard.account-type.edit', compact('account_type', 'title'));
    }

    public function update($id, Request $request){
    	$title = "Edit Account Type";

    	$account_type = AccountType::findOrFail($id);

    	AccountType::$rules['account_type'] = 'required|unique:account_types,name,'.$id;

    	$validate = Validator::make($request->all(), AccountType::$rules);

    	if($validate->passes()){

    		$account_type->name = $request->account_type;

    		$account_type->save();

    		flash('You have successfully update account type')->success();

    		return redirect()->back();

    	}

    	flash('Something is wrong')->error();

    	return redirect()->back()
    					->withErrors($validate)
    					->withInput();
    }

    public function delete($id){
    	flash('You have successfully deleted account type')->success();
    	$account_type = AccountType::findOrFail($id);

    	$account_type->delete();

    	return redirect()->back();
    }
}
