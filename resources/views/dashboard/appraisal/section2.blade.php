@extends('dashboard.layout.app')
@section('dashboard-content')
@include('dashboard.appraisal.section-link')
<form action="" class="form-horizontal" method="post" style="margin-top: 20px">
{{csrf_field()}}
<div class="row">
    @include('partials.form-errors')
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
    	{!!appraisalInputText(' - Process knowlegde and skills necessary to perform job', 19, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText(' - Keeps current in field', 20, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText(' -Understand operations and objectives of department)', 21, $user_ans, $user_appraisal->submit)!!}
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
    	{!!appraisalInputText(' - Expresses ideas in writing, clearly and persuasively', 22, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText(' - Expresses ideas verbally, clearly and persuasively', 23, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText(' - Encourages others to express their views', 24, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText(' - Shows tact and diplomacy in dealing with others', 25, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText(' - Keeps appropraite people informed in a timely manner', 26, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText(' - Displays sensitivity to issues in verbal and written communication', 27, $user_ans, $user_appraisal->submit)!!}
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
    	{!!appraisalInputText(' - Sustains positive work relationship with others',28, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText(' - Listen to and understands the views of others', 29, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText(' - Resolves interpersonal problems in workplace', 30, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText(' - Responds positively to constructive suggestions)', 31, $user_ans, $user_appraisal->submit)!!}
    	{!!appraisalInputText(' - Display objectivity in accessing situations', 32, $user_ans, $user_appraisal->submit)!!}
        {!!appraisalInputText(' - Contributes effectively on team assignments', 33, $user_ans, $user_appraisal->submit)!!}
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
                    @if($user_appraisal->submit == 1)
                        <p class="form-control-static">
                            {{$significant_achievement}}
                        </p>
                    @else
                        <textarea id="significant_achievement" name="significant_achievement" class="form-control" placeholder="What did the staff do well?">@if(!empty(old('significant_achievement'))){{old('significant_achievement')}}@else{{$significant_achievement}}@endif</textarea>
                    @endif
                </div>
            </td>
        </tr>
    </tbody>
    </table>
    @if($user_appraisal->submit == 0)
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-submit">Move to Section 3</button>
    </div>
    @endif
</div>
</form>
@endsection