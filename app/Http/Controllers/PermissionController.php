<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class PermissionController extends Controller
{
    public function __construct(){

    	$this->middleware('admin');

    }

    public function viewStaff(){
    	$title = 'View All Staff';

        $staffs = User::paginate(50);

        return view('auth.permission', compact('title', 'staffs'));
    }

    public function adminPermissionAuthorize($id){
    	$staff = User::findOrFail($id);
        $staff->admin = 1;
        $staff->save();
        flash('You have successfully given staff admin access')->success();
        return redirect()->back();
    }
    public function adminPermissionUnauthorize($id){

    	$staff = User::findOrFail($id);
        $staff->admin = 0;
        $staff->save();
        flash('You have successfully remove staff admin access')->success();
        return redirect()->back();

    }
    public function managerPermissionAuthorize($id){
    	$staff = User::findOrFail($id);
        $staff->manager = 1;
        $staff->save();
        flash('You have successfully given staff manager access')->success();
        return redirect()->back();
    }
    public function managerPermissionUnauthorize($id){

    	$staff = User::findOrFail($id);
        $staff->manager = 0;
        $staff->save();
        flash('You have successfully remove staff manager access')->success();
        return redirect()->back();

    }
    public function auditorPermissionAuthorize($id){

    	$staff = User::findOrFail($id);
        $staff->auditor = 1;
        $staff->save();
        flash('You have successfully given staff auditor access')->success();
        return redirect()->back();

    }
    public function auditorPermissionUnauthorize($id){

    	$staff = User::findOrFail($id);
        $staff->auditor = 0;
        $staff->save();
        flash('You have successfully remove staff auditor access')->success();
        return redirect()->back();

    }
}
