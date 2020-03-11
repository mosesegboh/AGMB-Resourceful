@extends('dashboard.layout.app')
@section('dashboard-content')
@include('dashboard.appraisal.section-link')
<form action="" class="form-horizontal" method="post" style="margin-top: 20px">
{{csrf_field()}}
<div class="row">
    @include('partials.form-errors')
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
    	{!!appraisalSection3(' - What is the employees\'s strong traits?', 'trait', $user_appraisal)!!}
        {!!appraisalSection3(' - How employee could improve in areas of weakness?', 'improve', $user_appraisal)!!}
        {!!appraisalSection3(' - Identify employee training needs', 'training', $user_appraisal)!!}
    </tbody>
    </table>
    @if($user_appraisal->submit == 0)
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-submit">Move to Section 4</button>
    </div>
    @endif
</div>
</form>
@endsection