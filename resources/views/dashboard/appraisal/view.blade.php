@extends('dashboard.layout.app')
@section('dashboard-content')
	<h4 class="appraisal-header">View Staff</h4>
	<table class="table">
    <thead>
        <tr>
            <th>Supervisor</th>
            <th>Appraisee</th>
            <th>Appraisal Form Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @forelse($appraisal_forms as $appraisal_form)
    	<tr>
    		<td>{{auth()->user()->fullname}}</td>
    		<td>{{$appraisal_form->user->fullname}}</td>
    		<td>{{$appraisal_form->type}}</td>
    		<td>
            @if($appraisal_form->type == 'staff-appraisal')
				<a href="{{route('view.section1.appraisal', ['appraisee_id' => $appraisal_form->appraisee_id, 'supervisor_id' => $appraisal_form->supervisor_id ])}}" class="btn btn-primary"  > VIEW APPRAISAL </a>
            @else

            @endif
			</td>
		</tr>
	@empty
		<tr class="danger">
			<td colspan="4">
				<span class="text-info"><i class="fa fa-fw fa-exclamation-triangle"></i> No Appraisal has been assign to you</span>  
			</td>
		</tr>
	@endforelse
    </tbody>
    </table>
@endsection