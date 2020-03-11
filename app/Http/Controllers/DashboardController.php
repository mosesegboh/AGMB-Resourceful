<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Validator;

use DB;

class DashboardController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$title = 'Dashboard';

    	return view('dashboard.cpanel');
    }

    public function viewAssignSupervisor(){

        $title = 'View Assign Supervisor';

        $supervisors = DB::table('supervisor_appraisee')->distinct()->select('users.id', 'users.fullname')->
        leftJoin('users', function($leftJoin){
            $leftJoin->on('users.id', '=', 'supervisor_appraisee.supervisor_id');
        })
        ->get();

        return view('dashboard.supervisor.view', compact('title', 'supervisors'));

    }

    public function assignSupervisor(){
        $title = 'Assign Supervisor';

        $users = User::all();

        return view('dashboard.supervisor.create', compact('title', 'users'));

    }

    public function assignSupervisorSubmit(Request $request){
        $validate = Validator::make($request->all(), [
            'supervisor' => 'required',
            'staff' => 'required|array|different_array|supervisor_assign_check'
            ]);

        if($validate->passes()){
            $supervisor = User::findOrFail($request->input('supervisor'));
            $supervisor->appraisee_assign()->attach($request->input('staff'));

            flash('You have successfully assign supervisor to staff')->success();
            return redirect()->back()
                            ->withInput();
        }
        // $supervisor = User::findOrFail($request->input('supervisor'));
        flash('Something is wrong')->error();
        return redirect()->back()
                        ->withErrors($validate)
                            ->withInput();
    }

    public function editAssignSupervisor($id){

        $title = 'Edit Assign Supervisor';

        $users = User::all();

        $assign_supervisor = User::findOrFail($id);

        $assign_staff = array_pluck($assign_supervisor->appraisee_assign->toArray(), 'id');

        return view('dashboard.supervisor.edit', compact('title','assign_supervisor', 'users', 'assign_staff'));


    }

    public function updateAssignSupervisor($id, Request $request){
        $validate = Validator::make($request->all(), [
            'supervisor' => 'required',
            'staff' => 'required|array|different_array|supervisor_assign_check:'.$id
            ]);

        if($validate->passes()){

            $supervisor = User::findOrFail($request->input('supervisor'));

            $supervisor->appraisee_assign()->sync($request->input('staff'));

            flash('You have successfully updated staff assigned to supervisor')->success();
            return redirect()->back()
                            ->withInput();
        }
        // $supervisor = User::findOrFail($request->input('supervisor'));
        flash('Something is wrong')->error();
        return redirect()->back()
                        ->withErrors($validate)
                            ->withInput();
    }

    public function deleteAssignSupervisor($id){

        $supervisor = User::findOrFail($id);

        $supervisor->appraisee_assign()->detach();

        flash('You have successfully remove all staff under '.$supervisor->fullname)->success();

        return redirect()->route('view.assign.supervisor');

    }

    public function sendAppraisal(){
    	
    }
    public function deleteUser(){

    }
}
