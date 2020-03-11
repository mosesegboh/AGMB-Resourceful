<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Department;
use App\JobTitle;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard/appraisal/view';

    protected $rules = [
            'fullname' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'address' => 'required',
            'phone' => 'required:min:7',
            'department' => 'required|integer',
            'job_title' => 'required|integer'
        ];
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => ['logout', 'viewStaff','showRegistrationForm','register', 'edit', 'delete','update','activate','deactivate','profile','profilePost','passwordUpdate','passwordUpdatePost']]);

        $this->middleware('auth', ['except' => ['logout', 'login','showLoginForm']]);

        $this->middleware('admin', ['except' => ['logout', 'login','showLoginForm','profile','profilePost','passwordUpdate','passwordUpdatePost']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     protected function validator(array $data)
    {
        return Validator::make($data, $this->rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'fullname' => $data['fullname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address' => $data['address'],
            'phone' => $data['phone'],
            'department_id' => $data['department'],
            'job_title_id' => $data['job_title']
        ]);
    }

    protected function staffUpdate($id, array $data)
    {
        $user =  User::findOrFail($id);

        if(!empty($data['password'])){
            $user->password = bcrypt($data['password']);
            $user->save();
        }

        return $user->update([
            'fullname' => $data['fullname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'department_id' => $data['department'],
            'job_title_id' => $data['job_title']
        ]);
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
                'email' => 'required|activate_rule',
                'password' => 'required'
            ]);
    }

    public function showRegistrationForm(){

        $title = 'Create new Staff';

        $departments = Department::all();

        $job_titles = JobTitle::all();

        return view('auth.register', compact('title', 'departments', 'job_titles'));
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());


        if ($validator->fails()) {
            flash('Something is wrong')->error();

            $this->throwValidationException(
                $request, $validator
            );
        }


       // Auth::guard($this->getGuard())->login($this->create($request->all()));
        $this->create($request->all());

        flash('You have successfully register')->success();


        return redirect()->route('view.users');
    }

    public function login(Request $request){

        $this->validateLogin($request);

        $throttles = $this->isUsingThrottlesLoginsTrait();
        
        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }


        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'activate' => 1]))
        {
            flash('You have successfully login')->success();
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles && ! $lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        flash('Sorry, something wrong')->error();

        return $this->sendFailedLoginResponse($request)->withInput();

     }

     public function edit($id){
        $title = 'Edit Staff';

        $staff = User::findOrFail($id);

        $departments = Department::all();

        $job_titles = JobTitle::all();

        return view('auth.edit', compact('title', 'staff', 'departments', 'job_titles'));
     }

     public function update($id, Request $request){
        $this->rules['username'] = 'required|unique:users,username,'.$id;
        $this->rules['email'] = 'required|email|unique:users,email,'.$id;
        $this->rules['password'] = 'sometimes|confirmed|min:6';

        $validator = $this->validator($request->all());


        if ($validator->fails()) {
            flash('Something is wrong')->error();

            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->staffUpdate($id, $request->all());

        flash('You have successfully updated Staff Information')->success();


        return redirect()->route('view.users');


     }

     public function viewStaff(){
        $title = 'View All Staff';

        $staffs = User::paginate(50);

        return view('auth.view', compact('title', 'staffs'));
     }

      public function activate($id){
        $staff = User::findOrFail($id);
        $staff->activate = 1;
        $staff->save();
        flash('You have successfully activate the staff account')->success();
        return redirect()->back();
    }


    public function deactivate($id){
        $staff = User::findOrFail($id);
        $staff->activate = 0;
        $staff->save();
        flash('You have successfully deactivate the staff account')->success();
        return redirect()->back();
    }

    public function delete($id){
        $staff = User::findOrFail($id);
        $staff->delete();
        flash('You have successfully deleted the staff')->success();
        return redirect()->back();

    }

     public function logout()
    {
        flash('You have successfully logout')->success();
        Auth::logout();
        return redirect()->route('login');
    }
}
