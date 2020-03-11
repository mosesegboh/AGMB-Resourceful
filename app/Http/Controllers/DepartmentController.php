<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Department;

use Validator;

class DepartmentController extends Controller
{
    public function __construct(){

    }

    public function view(){

    	$title = 'View Department';

    	$departments =  Department::all();

    	return view('dashboard.department.view', compact('title', 'departments'));

    }

    public function create(){

    	$title = 'Create Department';

    	return view('dashboard.department.create', compact('title'));
    }

    public function store(Request $request){

    	$validate = Validator::make($request->all(), Department::$rules);

    	if($validate->passes()){

    		Department::create([
    			'department' => $request->department
    			]);

    		flash('You have successfully created department')->success();

    		return redirect()->back();

    	}

    	flash('Something is wrong')->error();

    	return redirect()->back()
    					->withErrors($validate)
    					->withInput();

    }

    public function edit($id){
    	$title = "Edit Department";

    	$department = Department::findOrFail($id);

    	return view('dashboard.department.edit', compact('department', 'title'));
    }

    public function update($id, Request $request){
    	$title = "Edit Department";

    	$department = Department::findOrFail($id);

    	Department::$rules['department'] = 'required|unique:departments,department,'.$id;

    	$validate = Validator::make($request->all(), Department::$rules);

    	if($validate->passes()){

    		$department->department = $request->department;

    		$department->save();

    		flash('You have successfully update department')->success();

    		return redirect()->back();

    	}

    	flash('Something is wrong')->error();

    	return redirect()->back()
    					->withErrors($validate)
    					->withInput();
    }

    public function delete($id){
    	flash('You have successfully deleted department')->success();
    	$department = Department::findOrFail($id);

    	$department->delete();

    	return redirect()->back();
    }
}
