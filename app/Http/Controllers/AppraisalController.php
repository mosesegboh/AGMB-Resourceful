<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Appraisal;

use Validator;

use App\User;

use DB;

use Image;

class AppraisalController extends Controller
{
    public function __construct(){

    	$this->middleware('auth');

    	$this->middleware('admin', ['only' => ['viewAllAppraisal', 'openAppraisal', 'closeAppraisal', 'hrComments', 'hrCommentsPost', 'viewHrComments']]);

       

    }

    public function fetchAppraisee(Request $request){

        if($request->ajax()){
            $supervisor = User::findOrFail($request->input('supervisor_id'));

            $build = '<option>Appraisee</option>';

            if(count($supervisor->appraisee_assign) > 0){

                foreach ($supervisor->appraisee_assign as $appraisee) {
                    $build .= '<option value="'.$appraisee->id.'">'.$appraisee->fullname.'</option>';
                }

            }

            return response()->json([
                'appraisee' => $build
                ]);
        }
    }

    public function sendAppraisal(){
    	$title = 'Send Appraisal';

        $supervisors = DB::table('supervisor_appraisee')
                        ->distinct()
                        ->select('supervisor_appraisee.supervisor_id', 'users.fullname as supervisor')
                        ->leftJoin('users', function($leftJoin){
                                $leftJoin->on('users.id', '=', 'supervisor_appraisee.supervisor_id');
                            })
                        ->get();

    	$appraisal_types = ['staff-appraisal', 'manager-appraisal'];

    	return view('dashboard.appraisal.send-appraisal', compact('title', 'supervisors','appraisal_types'));
    }

    public function sendAppraisalPost(Request $request){

    	$validate = Validator::make($request->all(), [
    			'supervisor' => 'required|integer|',
    			'appraisee' => 'required|integer|different:supervisor|check_active_appraisal',
    			'period_begin' => 'required|date',
    			'period_end' => 'required|date',
    			'reason' => 'required',
    			'appraisal_type' => 'required',
    			'deadline' => 'required'
    		]);

    	if($validate->passes()){

    		$appraisal = new Appraisal;

    		$supervisor = User::findOrFail($request->input('supervisor'));

    		$appraisal->supervisor_id = $request->input('supervisor');
    		$appraisal->appraisee_id = $request->input('appraisee');
    		$appraisal->period_begin = $request->input('period_begin');
    		$appraisal->period_end = $request->input('period_end');
    		$appraisal->type = $request->input('appraisal_type');
    		$appraisal->reason = $request->input('reason');
    		$appraisal->deadline = $request->input('deadline');

    		$appraisal->save();

    		flash('You have successfully send an appraisal for to '.$supervisor->fullname)->success();

    		return redirect()->back();

    	}

    	flash('Something is wrong')->error();

    	return redirect()->back()
    					->withErrors($validate)
    					->withInput();


    }

    public function viewAppraisal(){
    	$title = 'View Appraisal Form List';
    	//dd(auth()->id());
    	$appraisal_forms = Appraisal::where('supervisor_id',  auth()->id())
    				->where('status', 1)
    				->get();

    	return view('dashboard.appraisal.view', compact('title', 'appraisal_forms'));
    }

    public function section1($supervisor_id, $appraisee_id){
    	$title = 'Appraisal Section 1';

    	$user_appraisal = Appraisal::where('appraisee_id', $appraisee_id)
    	->where('supervisor_id', $supervisor_id)
    	->where('status', 1)
    	->first();

    	$user_ans = json_decode($user_appraisal->section_1, true);


    	return view('dashboard.appraisal.section1', compact('title', 'user_ans', 'user_appraisal', 'supervisor_id', 'appraisee_id'));
    }
    public function section2($supervisor_id, $appraisee_id){
    	$title = 'Appraisal Section 2';
    	$user_appraisal = Appraisal::where('appraisee_id', $appraisee_id)
    	->where('supervisor_id', $supervisor_id)
    	->where('status', 1)
    	->first();

    	$user_ans = json_decode($user_appraisal->section_2, true);
    	$significant_achievement = $user_appraisal->significant_achievement;
    	return view('dashboard.appraisal.section2', compact('title', 'user_ans', 'significant_achievement', 'user_appraisal', 'supervisor_id', 'appraisee_id'));
    }
    public function section3($supervisor_id, $appraisee_id){
    	$title = 'Appraisal Section 3';

    	$user_appraisal = Appraisal::where('appraisee_id', $appraisee_id)
    	->where('supervisor_id', $supervisor_id)
    	->where('status', 1)
    	->first();

    	return view('dashboard.appraisal.section3', compact('title', 'user_appraisal', 'supervisor_id', 'appraisee_id'));
    }
    public function section4($supervisor_id, $appraisee_id){
    	$title = 'Appraisal Section 4';

    	$user_appraisal = Appraisal::where('appraisee_id', $appraisee_id)
    	->where('supervisor_id', $supervisor_id)
    	->where('status', 1)
    	->first();

        $user_ans = json_decode($user_appraisal->section_4, true);

    	return view('dashboard.appraisal.section4', compact('title', 'user_ans', 'supervisor_id', 'appraisee_id', 'user_appraisal'));
    }

    public function postsection1($supervisor_id, $appraisee_id, Request $request){

    	$appraisal = Appraisal::where('supervisor_id', $supervisor_id)
    	->where('appraisee_id', $appraisee_id)
    	->where('status', 1)
    	->first();

    	$validate = Validator::make($request->all(), Appraisal::$rulesSection1);

    	$section_1 = array();

    	if($validate->passes() && $appraisal->count() > 0){

    		foreach($request->rank as $key => $rank){
    			$section_1[$key]['rank'] = $rank;
    		}

    		foreach($request->comment as $key => $comment){
    			$section_1[$key]['comment'] = $comment;
    		}

    		$appraisal->section_1 = json_encode($section_1);

    		$appraisal->save();

    		flash('You have successfully fill section 1')->success();

    		return redirect()->route('view.section2.appraisal', ['appraisee_id' => $appraisee_id, 'supervisor_id' => $supervisor_id]);
    	}

    	flash('Something is wrong')->error();

    	return redirect()->back()
    					->withErrors($validate)
    					->withInput();



    }
    public function postsection2($supervisor_id, $appraisee_id, Request $request){

    	$appraisal = Appraisal::where('supervisor_id', $supervisor_id)
    	->where('appraisee_id', $appraisee_id)
    	->where('status', 1)
    	->first();


    	$validate = Validator::make($request->all(), Appraisal::$rulesSection2);

    	$section_2 = array();

    	if($validate->passes() && $appraisal->count() > 0){

    		foreach($request->rank as $key => $rank){
    			$section_2[$key]['rank'] = $rank;
    		}

    		foreach($request->comment as $key => $comment){
    			$section_2[$key]['comment'] = $comment;
    		}

    		$appraisal->section_2 = json_encode($section_2);

            $appraisal->significant_achievement = $request->significant_achievement;


    		$appraisal->save();



    		flash('You have successfully fill section 2')->success();

    		return redirect()->route('view.section3.appraisal', ['appraisee_id' => $appraisee_id, 'supervisor_id' => $supervisor_id]);
    	}

    	flash('Something is wrong')->error();

    	return redirect()->back()
    					->withErrors($validate)
    					->withInput();
    	
    }
    public function postsection3($supervisor_id, $appraisee_id, Request $request){

    	$appraisal = Appraisal::where('supervisor_id', $supervisor_id)
    	->where('appraisee_id', $appraisee_id)
    	->where('status', 1)
    	->first();


    	$validate = Validator::make($request->all(), Appraisal::$rulesSection3);

    	if($validate->passes() && $appraisal->count() > 0){


    		$appraisal->trait = $request->input('trait');

    		$appraisal->improve = $request->input('improve');
    		$appraisal->training = $request->input('training');

    		$appraisal->save();

    		flash('You have successfully fill section 3')->success();

    		return redirect()->route('view.section4.appraisal', ['appraisee_id' => $appraisee_id, 'supervisor_id' => $supervisor_id]);
    	}

    	flash('Something is wrong')->error();

    	return redirect()->back()
    					->withErrors($validate)
    					->withInput();
    	
    }
    public function postsection4($supervisor_id, $appraisee_id, Request $request){


        $appraisal = Appraisal::where('supervisor_id', $supervisor_id)
        ->where('appraisee_id', $appraisee_id)
        ->where('status', 1)
        ->first();

        $validate = Validator::make($request->all(), Appraisal::$rulesSection4);

        $section_4 = array();

        if($validate->passes() && $appraisal->count() > 0){

            foreach($request->rank as $key => $rank){
                $section_4[$key]['rank'] = $rank;
            }

            foreach($request->comment as $key => $comment){
                $section_4[$key]['comment'] = $comment;
            }

            $section1_ans = json_decode($appraisal->section_1, true);

            $section2_ans = json_decode($appraisal->section_2, true);

            $appraisal->section_4 = json_encode($section_4);


            $appraisal->grade = collect(array_merge($section1_ans, $section2_ans, $section_4))->avg('rank');

            $appraisal->submit = 1;


            $appraisal->save();



            flash('You have completed the appraisal successfully')->success();

            return redirect()->route('view.appraisal');
        }

        flash('Something is wrong')->error();

        return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();
        
    }

    public function viewMyAppraisal(){
        $title = 'View My Appraisal Form';
        //dd(auth()->id());
        $appraisal_forms = Appraisal::where('appraisee_id',  auth()->id())
                    ->where('submit', 1)
                    ->where('status', 1)
                    ->get();

        return view('dashboard.appraisal.my-appraisal-form', compact('title', 'appraisal_forms'));
    }

    public function myAppraisal($id){
        $title = 'View My Appraisal';

        $appraisal_forms = Appraisal::findOrFail($id);

        return view('dashboard.appraisal.my-appraisal', compact('title', 'appraisal_forms'));

    }

    public function myAppraisalPost($id, Request $request){
        $validate = Validator::make($request->all(), [
                'signature_png' => 'sometimes',
                'appraisee_date' => 'required|date',
                'appraisee_decision' => 'required',
                'appraisee_comment' => 'required|min:3'
            ]);


        if($validate->passes()){
            $appraisal = Appraisal::findOrFail($id);

            $appraisal->appraisee_date = $request->appraisee_date;

            $appraisal->appraisee_decision = $request->appraisee_decision;

            $appraisal->appraisee_comment = $request->appraisee_comment;

            if(preg_match('/data:image/', $request->input('signature_png'))){

            @unlink(public_path($appraisal->appraisee_signature));

            $src = $request->input('signature_png');

                        // get the mimetype
                        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                        $mimetype = $groups['mime'];

                        // Generating a random filename
                        $filename = uniqid();
                        $filepath = "/images/signatures/$filename-".str_slug($appraisal->user->fullname).".$mimetype";

                        // @see http://image.intervention.io/api/
                        $image = Image::make($src)
                          // resize if required
                          ->resize(300,null, function($constraint)
                            {
                                $constraint->aspectRatio();

                            })
                          ->encode($mimetype, 100)  // encode file to the specified mimetype
                          ->save(public_path($filepath));

                          $appraisal->appraisee_signature = $filepath;

                    } // <!--endif

                $appraisal->save();
 
                flash('Successfully uploaded signatue')->success();

                return redirect()->route('view.my.appraisal.static.after', ['id' => $id]);
        }

        return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();

    }

    public function myAppraisalAfter($id){
        $title = 'View My Appraisal With Signature';

        $appraisal_forms = Appraisal::findOrFail($id);

        return view('dashboard.appraisal.my-appraisal-after-signature', compact('title', 'appraisal_forms'));

    }

    public function supervisorAppraiseeAppraisal($id){
        $title = 'View My Appraisal With Signature';

        $appraisal_forms = Appraisal::findOrFail($id);

        return view('dashboard.appraisal.supervisor-appraisal-after', compact('title', 'appraisal_forms'));
    }


    public function supervisorAppraiseeAppraisalPost($id, Request $request){
        $validate = Validator::make($request->all(), [
                'signature_png' => 'required',
                'supervisor_date' => 'required|date',
                'supervisor_comment' => 'required|min:3'
            ]);


        if($validate->passes()){
            $appraisal = Appraisal::findOrFail($id);

            $appraisal->supervisor_date = $request->supervisor_date;

            $appraisal->supervisor_comment = $request->supervisor_comment;

            if(preg_match('/data:image/', $request->input('signature_png'))){

            @unlink(public_path($appraisal->supervisor_signature));

            $src = $request->input('signature_png');

                        // get the mimetype
                        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                        $mimetype = $groups['mime'];

                        // Generating a random filename
                        $filename = uniqid();
                        $filepath = "/images/signatures/$filename-".str_slug($appraisal->user->fullname).".$mimetype";

                        // @see http://image.intervention.io/api/
                        $image = Image::make($src)
                          // resize if required
                          ->resize(300,null, function($constraint)
                            {
                                $constraint->aspectRatio();

                            })
                          ->encode($mimetype, 100)  // encode file to the specified mimetype
                          ->save(public_path($filepath));

                          $appraisal->supervisor_signature = $filepath;

                    } // <!--endif

                $appraisal->save();
 
                flash('Successfully uploaded signatue')->success();

                return redirect()->route('view.supervisor.appraisee.appraisal', ['id' => $id]);
        }

        return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();

    }

    public function hrComments($id){
        $title = 'View HR Comments';

        $appraisal_forms = Appraisal::findOrFail($id);

        return view('dashboard.appraisal.hr-appraisal', compact('title', 'appraisal_forms'));
    }

    public function hrCommentsPost($id, Request $request){

            $validate = Validator::make($request->all(), [
                'signature_png' => 'required',
                'hr_date' => 'required|date',
                'hr_comment' => 'required|min:3'
            ]);


        if($validate->passes()){
            $appraisal = Appraisal::findOrFail($id);

            $appraisal->hr_date = $request->hr_date;

            $appraisal->hr_comment = $request->hr_comment;

            if(preg_match('/data:image/', $request->input('signature_png'))){

            @unlink(public_path($appraisal->hr_signature));

            $src = $request->input('signature_png');

                        // get the mimetype
                        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                        $mimetype = $groups['mime'];

                        // Generating a random filename
                        $filename = uniqid();
                        $filepath = "/images/signatures/$filename-".$appraisal->id.'-hr-'.str_slug($appraisal->user->fullname).".$mimetype";

                        // @see http://image.intervention.io/api/
                        $image = Image::make($src)
                          // resize if required
                          ->resize(300,null, function($constraint)
                            {
                                $constraint->aspectRatio();

                            })
                          ->encode($mimetype, 100)  // encode file to the specified mimetype
                          ->save(public_path($filepath));

                          $appraisal->hr_signature = $filepath;

                    }



                $appraisal->save();
 
                flash('Successfully uploaded signature')->success();

                return redirect()->route('view.hr.comments', ['id' => $id]);
        }

        return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();
    }

    public function viewHrComments($id){

        $title = 'View HR Comments';

        $appraisal_forms = Appraisal::findOrFail($id);

        return view('dashboard.appraisal.view-hr-appraisal', compact('title', 'appraisal_forms'));

    }

    public function managementComments($id){
        $title = 'View Management Comments';

        $appraisal_forms = Appraisal::findOrFail($id);

        return view('dashboard.appraisal.management-appraisal', compact('title', 'appraisal_forms'));
    }

    public function managementCommentsPost($id, Request $request){

            $validate = Validator::make($request->all(), [
                'signature_png' => 'required',
                'management_date' => 'required|date',
                'management_comment' => 'required|min:3'
            ]);


        if($validate->passes()){
            $appraisal = Appraisal::findOrFail($id);

            $appraisal->manager_date = $request->management_date;

            $appraisal->management_decision = $request->management_comment;

            if(preg_match('/data:image/', $request->input('signature_png'))){

            @unlink(public_path($appraisal->manager_signature));

            $src = $request->input('signature_png');

                        // get the mimetype
                        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                        $mimetype = $groups['mime'];

                        // Generating a random filename
                        $filename = uniqid();
                        $filepath = "/images/signatures/$filename-".$appraisal->id.'-management-'.str_slug($appraisal->user->fullname).".$mimetype";

                        // @see http://image.intervention.io/api/
                        $image = Image::make($src)
                          // resize if required
                          ->resize(300,null, function($constraint)
                            {
                                $constraint->aspectRatio();

                            })
                          ->encode($mimetype, 100)  // encode file to the specified mimetype
                          ->save(public_path($filepath));

                          $appraisal->manager_signature = $filepath;

                    }



                $appraisal->save();
 
                flash('Successfully uploaded signature')->success();

                return redirect()->route('view.management.comments', ['id' => $id]);
        }

        return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();
    }

    public function viewManagementComments($id){

        $title = 'View Management Comments';

        $appraisal_forms = Appraisal::findOrFail($id);

        return view('dashboard.appraisal.view-management-appraisal', compact('title', 'appraisal_forms'));

    }

    public function viewSupervisorAppraiseeAppraisal($id){
        $title = 'View Supervisor Appraisee Appraisal With Signature';

        $appraisal_forms = Appraisal::findOrFail($id);

        return view('dashboard.appraisal.supervisor-appraisal-after-signature', compact('title', 'appraisal_forms'));
    }

    public function viewAllAppraisal(){

    	$title = 'View All Appraisal for Created';

    	$appraisals = Appraisal::paginate(20);

    	return view('dashboard.appraisal.view-all', compact('title', 'appraisals'));
    }

    public function openAppraisal($id){
        $staff = Appraisal::findOrFail($id);
        $staff->status = 1;
        $staff->save();
        flash('You have successfully open appraisal')->success();
        return redirect()->back();
    }


    public function closeAppraisal($id){
        $staff = Appraisal::findOrFail($id);
        $staff->status = 0;
        $staff->save();
        flash('You have successfully close appraisal')->success();
        return redirect()->back();
    }
}
