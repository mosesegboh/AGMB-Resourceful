<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

// Route::get('/appraisal', function(){
// 	return view('dashboard.appraisal');
// });

Route::group(['prefix' => 'do-ajax'], function(){
	Route::post('fetch-supervisor-appraisee', ['as' => 'ajax.fetch.appraisee', 'uses' => 'AppraisalController@fetchAppraisee' ]);
});

Route::group(['prefix' => 'auth'], function(){
	Route::get('/logout', ['as' => 'logout', 'uses' =>'Auth\AuthController@logout']);
	Route::get('/login', ['as' => 'login', 'uses' =>'Auth\AuthController@showLoginForm']);
	Route::get('password/{token}', 'Auth\PasswordController@showResetForm');
	Route::post('/login', 'Auth\AuthController@login');
	Route::post('/passord/email', 'Auth\PasswordController@sendResetLinkEmail');

	Route::post('/passord/reset', 'Auth\PasswordController@reset');

});

Route::group(['prefix' => 'dashboard'], function(){

	Route::get('/', ['as' => 'cpanel', 'uses' => 'DashboardController@index']);

	Route::group(['prefix' => 'user'], function(){
		Route::get('view', ['as' => 'view.users', 'uses' => 'Auth\AuthController@viewStaff']);
		Route::get('create', ['as' => 'create.user', 'uses' => 'Auth\AuthController@showRegistrationForm']);
		Route::post('create', ['as' => 'store.users', 'uses' => 'Auth\AuthController@register']);
		Route::get('{id}/edit', ['as' => 'edit.user', 'uses' => 'Auth\AuthController@edit']);
		Route::put('{id}/edit', ['as' => 'update.user', 'uses' => 'Auth\AuthController@update']);
		Route::put('{id}/activate', ['as' => 'activate.user', 'uses' => 'Auth\AuthController@activate']);
		Route::put('{id}/deactivate', ['as' => 'deactivate.user', 'uses' => 'Auth\AuthController@deactivate']);
		Route::delete('{id}/delete', ['as' => 'delete.user', 'uses' => 'Auth\AuthController@delete']);

		Route::get('profile', ['as' => 'user.profile', 'uses' => 'Auth\AuthController@profile']);
		Route::post('profile', ['as' => 'user.profile.post', 'uses' => 'Auth\AuthController@profilePost']);
		Route::get('password-update', ['as' => 'user.password', 'uses' => 'Auth\AuthController@passwordUpdate']);
		Route::post('password-update', ['as' => 'user.password.post', 'uses' => 'Auth\AuthController@passwordUpdatePost']);

		

		
	});

	Route::group(['prefix' => 'permission'], function(){
		Route::pattern('id', '[0-9]+');

		Route::get('staff', ['as' => 'view.staff.permission',  'uses' => 'PermissionController@viewStaff']);

		Route::put('{id}/admin/authorize', ['as' => 'admin.permission.authorize', 'uses' => 'PermissionController@adminPermissionAuthorize']);
		Route::put('{id}/admin/unauthorize', ['as' => 'admin.permission.unauthorize', 'uses' => 'PermissionController@adminPermissionUnauthorize']);
		Route::put('{id}/manager/authorize', ['as' => 'manager.permission.authorize', 'uses' => 'PermissionController@managerPermissionAuthorize']);
		Route::put('{id}/manager/unauthorize', ['as' => 'manager.permission.unauthorize', 'uses' => 'PermissionController@managerPermissionUnauthorize']);
		Route::put('{id}/auditor/authorize', ['as' => 'auditor.permission.authorize', 'uses' => 'PermissionController@auditorPermissionAuthorize']);
		Route::put('{id}/auditor/unauthorize', ['as' => 'auditor.permission.unauthorize', 'uses' => 'PermissionController@auditorPermissionUnauthorize']);
	});

	Route::group(['prefix' => 'assign-supervisor'], function(){
		Route::pattern('id', '[0-9]+');

		Route::get('/create', ['as' => 'assign.supervisor', 'uses' => 'DashboardController@assignSupervisor']);

		Route::post('/create', ['as' => 'assign.supervisor.submit', 'uses' => 'DashboardController@assignSupervisorSubmit']);

		Route::get('/view', ['as' => 'view.assign.supervisor', 'uses' => 'DashboardController@viewAssignSupervisor']);

		Route::get('{id}/edit', ['as' => 'edit.assign.supervisor', 'uses' => 'DashboardController@editAssignSupervisor']);

		Route::put('{id}/edit', ['as' => 'update.assign.supervisor', 'uses' => 'DashboardController@updateAssignSupervisor']);

		Route::delete('{id}/delete', ['as' => 'delete.assign.supervisor', 'uses' => 'DashboardController@deleteAssignSupervisor']);
	});

	Route::group(['prefix' => 'account'], function(){

		Route::pattern('id', '[0-9]+');
		Route::get('view', ['as' => 'view.account', 'uses' => 'AccountController@view']);
		Route::get('create', ['as' => 'create.account', 'uses' => 'AccountController@create']);
		Route::post('create', ['as' => 'store.account', 'uses' => 'AccountController@store']);

		Route::get('{id}/assign-account-to-staff', ['as' => 'assign.account.to.staff', 'uses' => 'AccountController@assignAccountToStaff']);

		Route::post('{id}/assign-account-to-staff', ['as' => 'assign.account.to.staff.submit', 'uses' => 'AccountController@assignAccountToStaffSubmit']);

		Route::get('{id}/edit', ['as' => 'edit.account', 'uses' => 'AccountController@edit']);
		Route::put('{id}/edit', ['as' => 'update.account', 'uses' => 'AccountController@update']);
		Route::delete('{id}/delete', ['as' => 'delete.account', 'uses' => 'AccountController@delete']);

	});

	Route::group(['prefix' => 'mobilisation'], function(){

		Route::pattern('id', '[0-9]+');
		Route::get('view', ['as' => 'view.deposit.mobilisation', 'uses' => 'DepositMobilisationController@view']);
		Route::get('create', ['as' => 'create.deposit.mobilisation', 'uses' => 'DepositMobilisationController@create']);
		Route::post('create', ['as' => 'store.deposit.mobilisation', 'uses' => 'DepositMobilisationController@store']);
		Route::get('{id}/edit', ['as' => 'edit.deposit.mobilisation', 'uses' => 'DepositMobilisationController@edit']);
		Route::put('{id}/edit', ['as' => 'update.deposit.mobilisation', 'uses' => 'DepositMobilisationController@update']);
		Route::delete('{id}/delete', ['as' => 'delete.deposit.mobilisation', 'uses' => 'DepositMobilisationController@delete']);

	});

	Route::group(['prefix' => 'account-verify'], function(){

		Route::pattern('id', '[0-9]+');
		Route::get('view', ['as' => 'view.account.for.verify', 'uses' => 'AccountController@viewAll']);
		Route::put('{id}/verified', ['as' => 'verified.account', 'uses' => 'AccountController@verified']);
		Route::put('{id}/pending', ['as' => 'pending.account', 'uses' => 'AccountController@pending']);

	});
	Route::group(['prefix' => 'mobilisation-verify'], function(){

		Route::pattern('id', '[0-9]+');
		Route::pattern('staff_id', '[0-9]+');
		Route::get('view', ['as' => 'view.deposit.mobilisation.for.verify', 'uses' => 'DepositMobilisationController@viewAll']);
		Route::put('{id}/verified', ['as' => 'verified.deposit.mobilisation', 'uses' => 'DepositMobilisationController@verified']);
		Route::put('{id}/pending', ['as' => 'pending.deposit.mobilisation', 'uses' => 'DepositMobilisationController@pending']);

		ROute::post('view', ['as' => 'post.view.staff.deposit.mobilisation.for.verify', 'uses' => 'DepositMobilisationController@postViewStaff']);

		Route::get('{staff_id}/view', ['as' => 'view.staff.deposit.mobilisation.for.verify', 'uses' => 'DepositMobilisationController@viewStaff']);

	});

	Route::group(['prefix' => 'account-type'], function(){

		Route::pattern('id', '[0-9]+');
		Route::get('view', ['as' => 'view.account_type', 'uses' => 'AccountTypeController@view']);
		Route::get('create', ['as' => 'create.account_type', 'uses' => 'AccountTypeController@create']);
		Route::post('create', ['as' => 'store.account_type', 'uses' => 'AccountTypeController@store']);
		Route::get('{id}/edit', ['as' => 'edit.account_type', 'uses' => 'AccountTypeController@edit']);
		Route::put('{id}/edit', ['as' => 'update.account_type', 'uses' => 'AccountTypeController@update']);
		Route::delete('{id}/delete', ['as' => 'delete.account_type', 'uses' => 'AccountTypeController@delete']);

	});


	Route::group(['prefix' => 'department'], function(){

		Route::pattern('id', '[0-9]+');
		Route::get('view', ['as' => 'view.department', 'uses' => 'DepartmentController@view']);
		Route::get('create', ['as' => 'create.department', 'uses' => 'DepartmentController@create']);
		Route::post('create', ['as' => 'store.department', 'uses' => 'DepartmentController@store']);
		Route::get('{id}/edit', ['as' => 'edit.department', 'uses' => 'DepartmentController@edit']);
		Route::put('{id}/edit', ['as' => 'update.department', 'uses' => 'DepartmentController@update']);
		Route::delete('{id}/delete', ['as' => 'delete.department', 'uses' => 'DepartmentController@delete']);

	});

	Route::group(['prefix' => 'job-title'], function(){

		Route::pattern('id', '[0-9]+');
		Route::get('view', ['as' => 'view.job_title', 'uses' => 'JobTitleController@view']);
		Route::get('create', ['as' => 'create.job_title', 'uses' => 'JobTitleController@create']);
		Route::post('create', ['as' => 'store.job_title', 'uses' => 'JobTitleController@store']);
		Route::get('{id}/edit', ['as' => 'edit.job_title', 'uses' => 'JobTitleController@edit']);
		Route::put('{id}/edit', ['as' => 'update.job_title', 'uses' => 'JobTitleController@update']);
		Route::delete('{id}/delete', ['as' => 'delete.job_title', 'uses' => 'JobTitleController@delete']);

	});

	Route::group(['prefix' => 'appraisal'], function(){


		Route::get('my-appraisal', ['as' => 'view.my.appraisal', 'uses' => 'AppraisalController@viewMyAppraisal']);

		Route::get('{id}/my-appraisal', ['as' => 'view.my.appraisal.static', 'uses' => 'AppraisalController@myAppraisal']);

		Route::post('{id}/my-appraisal', ['as' => 'view.my.appraisal.static', 'uses' => 'AppraisalController@myAppraisalPost']);

		Route::get('{id}/my-appraisal-after', ['as' => 'view.my.appraisal.static.after', 'uses' => 'AppraisalController@myAppraisalAfter']);

		Route::get('{id}/supervisor-appraisee-appraisal', ['as' => 'supervisor.appraisee.appraisal', 'uses' => 'AppraisalController@supervisorAppraiseeAppraisal']);

		Route::post('{id}/supervisor-appraisee-appraisal', ['as' => 'supervisor.appraisee.appraisal.post', 'uses' => 'AppraisalController@supervisorAppraiseeAppraisalPost']);

		Route::get('{id}/view-supervisor-appraisee-appraisal', ['as' => 'view.supervisor.appraisee.appraisal', 'uses' => 'AppraisalController@viewSupervisorAppraiseeAppraisal']);

		Route::get('{id}/hr-comments', ['as' => 'hr.comments', 'uses' => 'AppraisalController@hrComments']);

		Route::post('{id}/hr-comments', ['as' => 'hr.comments.post', 'uses' => 'AppraisalController@hrCommentsPost']);

		Route::get('{id}/view-hr-comments', ['as' => 'view.hr.comments', 'uses' => 'AppraisalController@viewHrComments']);

		Route::get('{id}/management-comments', ['as' => 'management.comments', 'uses' => 'AppraisalController@managementComments']);

		Route::post('{id}/management-comments', ['as' => 'management.comments.post', 'uses' => 'AppraisalController@managementCommentsPost']);

		Route::get('{id}/view-management-comments', ['as' => 'view.management.comments', 'uses' => 'AppraisalController@viewManagementComments']);

		Route::get('{id}/view-deposit-mobilisation', ['as' => 'view.staff.deposit.mobile', 'uses' => 'DepositMobilisationController@viewSingleDM']);

		Route::get('send-appraisal', ['as' => 'send.appraisal', 'uses' => 'AppraisalController@sendAppraisal']);

		Route::post('send-appraisal', ['as' => 'send.appraisal.post', 'uses' => 'AppraisalController@sendAppraisalPost']);

		Route::get('view', ['as' => 'view.appraisal', 'uses' => 'AppraisalController@viewAppraisal']);

		Route::get('admin/view', ['as' => 'admin.view.appraisal', 'uses' => 'AppraisalController@viewAllAppraisal']);

		Route::get('view/{supervisor_id}/{appraisee_id}/section-1', ['as' => 'view.section1.appraisal', 'uses' => 'AppraisalController@section1']);

		Route::put('{id}/close', ['as' => 'close.appraisal', 'uses' => 'AppraisalController@closeAppraisal']);

		Route::put('{id}/open', ['as' => 'open.appraisal', 'uses' => 'AppraisalController@openAppraisal']);

		Route::post('view/{supervisor_id}/{appraisee_id}/section-1', ['as' => 'view.section1.appraisal', 'uses' => 'AppraisalController@postsection1']);
		Route::get('view/{supervisor_id}/{appraisee_id}/section-2', ['as' => 'view.section2.appraisal', 'uses' => 'AppraisalController@section2']);
		Route::post('view/{supervisor_id}/{appraisee_id}/section-2', ['as' => 'view.section2.appraisal', 'uses' => 'AppraisalController@postsection2']);
		Route::get('view/{supervisor_id}/{appraisee_id}/section-3', ['as' => 'view.section3.appraisal', 'uses' => 'AppraisalController@section3']);
		Route::post('view/{supervisor_id}/{appraisee_id}/section-3', ['as' => 'view.section3.appraisal', 'uses' => 'AppraisalController@postsection3']);
		Route::get('view/{supervisor_id}/{appraisee_id}/section-4', ['as' => 'view.section4.appraisal', 'uses' => 'AppraisalController@section4']);
		Route::post('view/{supervisor_id}/{appraisee_id}/section-4', ['as' => 'view.section4.appraisal', 'uses' => 'AppraisalController@postsection4']);
		Route::get('view/{supervisor_id}/{appraisee_id}/section-4', ['as' => 'view.section4.appraisal', 'uses' => 'AppraisalController@section4']);
		Route::post('view/{supervisor_id}/{appraisee_id}/section-4', ['as' => 'view.section4.appraisal', 'uses' => 'AppraisalController@postsection4']);
	});
});

//Route::auth();

Route::get('/home', 'HomeController@index');
