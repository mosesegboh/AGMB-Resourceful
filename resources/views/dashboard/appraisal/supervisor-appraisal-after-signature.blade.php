@extends('dashboard.layout.app')
@section('dashboard-content')
<div class="row">
	<h4 class="appraisal-header">Section 1: QUANTITATIVE EVALUATION<strong style="float: right;clear:both; color:green;">Grade : {{$appraisal_forms->grade}}%</strong></h4>
	<p class="header-content"></p>
	<table class="table">
    <thead>
        <tr>
            <th colpsan="2">QUALITY/PRODUCTION/DEPENDABILITY</th>
            <th>RATING</th>
            <th>COMMENTS</th>
        </tr>
    </thead>
    <tbody>
    	{!!appraisalInputText('  Meets work quantity requirements of job', 1, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText('  Completes appropriate amount of work', 2, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText('  Work effectively under pressure(Balance Multiple Objective)', 3, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText('  Work independently (Need minimal supervision)', 4, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText('  Completes work on time', 5, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText('  Demonstrates care for health and safety of others', 6, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText('  Has infrequent unscheduled absences', 7, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    </tbody>
    </table>
    <hr>
    <table class="table">
    <thead>
        <tr>
            <th colpsan="2">INITIATIVE/CREATIVITY/SERVICE</th>
            <th>RATING</th>
            <th>COMMENTS</th>
        </tr>
    </thead>
    <tbody>

    	{!!appraisalInputText('  Recognize need for action and reacts appropriately (Self Starter)', 8, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText('  Takes on additional responsibility where needed', 9, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText('  Identifies and implements innovation and efficiencies', 10, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText('  Adapts well to change in priorities, methods)', 11, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText('  Functions effectively in uncertain environment', 12, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText('  Make consistent efforts to listen to understand and satisfy client/user needs', 13, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    </tbody>
    </table>
    <hr>
    <table class="table">
    <thead>
        <tr>
            <th colpsan="2">PLLANNING/RESOURCE MANAGEMENT</th>
            <th>RATING</th>
            <th>COMMENTS</th>
        </tr>
    </thead>
    <tbody>
    	{!!appraisalInputText('  Anticipates and plans for future',14, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText('  Set goals and plan for achieving them', 15, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText('  Manages time effectively', 16, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText('  Manages monetary resources effectively)', 17, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText('  Introduces appropriate technology into work environment', 18, json_decode($appraisal_forms->section_1, true), $appraisal_forms->submit)!!}
    </tbody>
    </table>
</div>

<div class="row">
	<h4 class="appraisal-header">Section 2: QUALITATIVE EVALUATION</h4>
	<p class="header-content"></p>
	<table class="table">
    <thead>
        <tr>
            <th colpsan="2">JOB KNOWLEDGE</th>
            <th>RATING</th>
            <th>COMMENTS</th>
        </tr>
    </thead>
    <tbody>
    	{!!appraisalInputText(' - Process knowlegde and skills necessary to perform job', 19, json_decode($appraisal_forms->section_2, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText(' - Keeps current in field', 20, json_decode($appraisal_forms->section_2, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText(' -Understand operations and objectives of department)', 21, json_decode($appraisal_forms->section_2, true), $appraisal_forms->submit)!!}
    </tbody>
    </table>
    <hr>
    <table class="table">
    <thead>
        <tr>
            <th colpsan="2">COMMUNICATION SKILLS</th>
            <th>RATING</th>
            <th>COMMENTS</th>
        </tr>
    </thead>
    <tbody>
    	{!!appraisalInputText(' - Expresses ideas in writing, clearly and persuasively', 22, json_decode($appraisal_forms->section_2, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText(' - Expresses ideas verbally, clearly and persuasively', 23, json_decode($appraisal_forms->section_2, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText(' - Encourages others to express their views', 24, json_decode($appraisal_forms->section_2, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText(' - Shows tact and diplomacy in dealing with others', 25, json_decode($appraisal_forms->section_2, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText(' - Keeps appropraite people informed in a timely manner', 26, json_decode($appraisal_forms->section_2, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText(' - Displays sensitivity to issues in verbal and written communication', 27, json_decode($appraisal_forms->section_2, true), $appraisal_forms->submit)!!}
    </tbody>
    </table>
    <hr>
    <table class="table">
    <thead>
        <tr>
            <th colpsan="2">INTERPERSONAL EFFECTIVENESS</th>
            <th>RATING</th>
            <th>COMMENTS</th>
        </tr>
    </thead>
    <tbody>
    	{!!appraisalInputText(' - Sustains positive work relationship with others',28, json_decode($appraisal_forms->section_2, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText(' - Listen to and understands the views of others', 29, json_decode($appraisal_forms->section_2, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText(' - Resolves interpersonal problems in workplace', 30, json_decode($appraisal_forms->section_2, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText(' - Responds positively to constructive suggestions)', 31, json_decode($appraisal_forms->section_2, true), $appraisal_forms->submit)!!}
    	{!!appraisalInputText(' - Display objectivity in accessing situations', 32, json_decode($appraisal_forms->section_2, true), $appraisal_forms->submit)!!}
        {!!appraisalInputText(' - Contributes effectively on team assignments', 33, json_decode($appraisal_forms->section_2, true), $appraisal_forms->submit)!!}
    </tbody>
    </table>
    <hr>
    <table class="table">
    <thead>
        <tr>
            <th colpsan="4">SIGNIFICANT ACHIEVEMENT</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <div class="form-group">
                    <label for="significant_achievement" class="control-label">What did the staff do well?</label>
                    <p class="form-control-static">
                        {{$appraisal_forms->significant_achievement}}
                    </p>
                </div>
            </td>
        </tr>
    </tbody>
    </table>
</div>

<div class="row">
	<h4 class="appraisal-header">Section 3: EMPLOYMENT DEVELOPMENT & CARRER STEPS</h4>
	<p class="header-content"></p>
	<table class="table">
    <thead>
        <tr>
            <th width="40%">EMPLOYMENT DEVELOPMENT & CARRER STEPS</th>
            <th width="60%">COMMENT</th>
        </tr>
    </thead>
    <tbody>
    	{!!appraisalSection3(' - What is the employees\'s strong traits?', 'trait', $appraisal_forms)!!}
        {!!appraisalSection3(' - How employee could improve in areas of weakness?', 'improve', $appraisal_forms)!!}
        {!!appraisalSection3(' - Identify employee training needs', 'training', $appraisal_forms)!!}
    </tbody>
    </table>
</div>

<div class="row">
	<h4 class="appraisal-header">Section 4: DEPOSIT MOBALISATION</h4>
	<p class="header-content"></p>
	<table class="table">
    <thead>
        <tr>
            <th colpsan="2">DEPOSIT MOBALISATION REPORT</th>
            <th>RATING</th>
            <th>COMMENTS</th>
        </tr>
    </thead>
    <tbody>
    	{!!appraisalInputText(' Fresh Deposit mobilised within the period in view', 34, json_decode($appraisal_forms->section_4, true), $appraisal_forms->submit)!!}
        {!!appraisalInputText(' Existing Account (Balance)', 35,json_decode($appraisal_forms->section_4, true), $appraisal_forms->submit)!!}
    </tbody>
    </table>
</div>
<form class="form-horizontal signature">
<div class="row">
    <hr>
    <div class="col-sm-12">
        <div class="form-group">
            <p class="form-control-static" >The primary duties, performance areas, development plans, and evaluations have been discussed with me, I <span style="color:red; font-weight: bold;">{{$appraisal_forms->appraisee_decision == 1 ? 'Agree' : 'Disagree'}}</span> with the comments made</p>
        </div>
    </div>
    <hr>
    <div class="col-sm-12" style="border-bottom: 1px solid #eeeeee">
        <div class="form-group">
            <label>Appraisee Comment</label>   
            <p class="form-control-static">
                {{$appraisal_forms->appraisee_comment}}<
            </p>
        </div>
    </div>
    
    <div class="col-sm-8">
        <div class="col-sm-12">
            <strong>Appraisee Signature</strong>
        </div>
        <div class="col-sm-12" style="padding:0;">
            <img src="{{url($appraisal_forms->appraisee_signature)}}" class="img img-responsive" style="border-bottom: 1px solid">
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Appraisee Date</label>
            <p class="form-control-static">
                {{\Carbon\Carbon::parse($appraisal_forms->appraisee_date)->format('jS M, Y')}}
            </p>
        </div>
    </div>
</div>
</form>
<hr>
<form class="form-horizontal signature">
<div class="row">>
    <hr>
    <div class="col-sm-12" style="border-bottom: 1px solid #eeeeee">
        <div class="form-group">
            <label>Supervisor Comment</label>   
            <p class="form-control-static">
                {{$appraisal_forms->supervisor_comment}}
            </p>
        </div>
    </div>
    
    <div class="col-sm-8">
        <div class="col-sm-12">
            <strong>Supervisor Signature</strong>
        </div>
        <div class="col-sm-12" style="padding:0;">
            <img src="{{url($appraisal_forms->supervisor_signature)}}" class="img img-responsive" style="border-bottom: 1px solid">
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Supervisor Date</label>
            <p class="form-control-static">
                {{\Carbon\Carbon::parse($appraisal_forms->supervisor_date)->format('jS M, Y')}}
            </p>
        </div>
    </div>
</form>
</div>
@endsection