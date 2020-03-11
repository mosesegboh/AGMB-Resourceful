@extends('dashboard.layout.app')
@section('dashboard-content')
@include('dashboard.appraisal.section-link')
<form action="" class="form-horizontal" method="post" style="margin-top: 20px">
{{csrf_field()}}
<div class="row">
    @include('partials.form-errors')
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
    	{!!appraisalInputText(' Fresh Deposit mobilised within the period in view', 34, $user_ans, $user_appraisal->submit)!!}
        {!!appraisalInputText(' Existing Account (Balance)', 35, $user_ans, $user_appraisal->submit)!!}
    </tbody>
    </table>
    @if($user_appraisal->submit == 0)
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-submit finish">Finish Appraisal</button>
    </div>
    @endif
</div>
</form>
@endsection