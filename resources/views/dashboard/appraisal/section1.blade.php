@extends('dashboard.layout.app')
@section('dashboard-content')
@include('dashboard.appraisal.section-link')
<form action="" class="form-horizontal" method="post" style="margin-top: 20px">
{{csrf_field()}}
<div class="row">
    @include('partials.form-errors')
	<h4 class="appraisal-header">Section 1: QUANTITATIVE EVALUATION</h4>
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
    	{!!appraisalInputText('  Meets work quantity requirements of job', 1, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText('  Completes appropriate amount of work', 2, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText('  Work effectively under pressure(Balance Multiple Objective)', 3, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText('  Work independently (Need minimal supervision)', 4, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText('  Completes work on time', 5, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText('  Demonstrates care for health and safety of others', 6, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText('  Has infrequent unscheduled absences', 7, $user_ans, $user_appraisal->submit)!!}
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
    	{!!appraisalInputText('  Recognize need for action and reacts appropriately (Self Starter)', 8, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText('  Takes on additional responsibility where needed', 9, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText('  Identifies and implements innovation and efficiencies', 10, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText('  Adapts well to change in priorities, methods)', 11, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText('  Functions effectively in uncertain environment', 12, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText('  Make consistent efforts to listen to understand and satisfy client/user needs', 13, $user_ans, $user_appraisal->submit)!!}
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
    	{!!appraisalInputText('  Anticipates and plans for future',14, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText('  Set goals and plan for achieving them', 15, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText('  Manages time effectively', 16, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText('  Manages monetary resources effectively)', 17, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText('  Introduces appropriate technology into work environment', 18, $user_ans, $user_appraisal->submit)!!}
    </tbody>
    </table>
    @if($user_appraisal->submit == 0)
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-submit">Move to Section 2</button>
    </div>
    @endif
</div>
</form>
@endsection