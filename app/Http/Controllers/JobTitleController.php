<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\JobTitle;

use Validator;

class JobTitleController extends Controller
{
    public function __construct(){

    }

    public function view(){

    	$title = 'View JobTitle';

    	$job_titles =  JobTitle::all();

    	return view('dashboard.jobtitle.view', compact('title', 'job_titles'));

    }

    public function create(){

    	$title = 'Create Job Title';

    	return view('dashboard.jobtitle.create', compact('title'));
    }

    public function store(Request $request){

    	$validate = Validator::make($request->all(), JobTitle::$rules);

    	if($validate->passes()){

    		JobTitle::create([
    			'job_title' => $request->job_title
    			]);

    		flash('You have successfully created job title')->success();

    		return redirect()->back();

    	}

    	flash('Something is wrong')->error();

    	return redirect()->back()
    					->withErrors($validate)
    					->withInput();

    }

    public function edit($id){
    	$title = "Edit Job Title";

    	$job_title = JobTitle::findOrFail($id);

    	return view('dashboard.jobtitle.edit', compact('job_title', 'title'));
    }

    public function update($id, Request $request){
    	$title = "Edit JobTitle";

    	$jobtitle = JobTitle::findOrFail($id);

    	JobTitle::$rules['job_title'] = 'required|unique:job_titles,job_title,'.$id;

    	$validate = Validator::make($request->all(), JobTitle::$rules);

    	if($validate->passes()){

    		$jobtitle->job_title = $request->job_title;

    		$jobtitle->save();

    		flash('You have successfully update job title')->success();

    		return redirect()->back();

    	}

    	flash('Something is wrong')->error();

    	return redirect()->back()
    					->withErrors($validate)
    					->withInput();
    }

    public function delete($id){
    	flash('You have successfully deleted jobtitle')->success();
    	$jobtitle = JobTitle::findOrFail($id);

    	$jobtitle->delete();

    	return redirect()->back();
    }
}
