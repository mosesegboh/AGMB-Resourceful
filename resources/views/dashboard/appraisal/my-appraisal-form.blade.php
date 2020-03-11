@extends('dashboard.layout.app')
@section('dashboard-content')
	<h4 class="appraisal-header">View Staff</h4>
	<table class="table">
    <thead>
        <tr>
            <th>Supervisor</th>
            <th>Appraisee</th>
            <th>Appraisal Form Type</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
    @forelse($appraisal_forms as $appraisal_form)
    	<tr>
            <td>{{$appraisal_form->user_sup->fullname}}</td>
    		<td>{{auth()->user()->fullname}}</td>
    		<td>{{$appraisal_form->type}}</td>
    		<td>
            @if($appraisal_form->submit == 1)
				<a href="{{route('view.my.appraisal.static', ['id' => $appraisal_form->id])}}" class="btn btn-primary"  > VIEW MY APPRAISAL </a>
            @else

            @endif
			</td>
            <td>
            @if($appraisal_form->submit == 1 && $appraisal_form->appraisee_decision !== NULL)
                <a href="{{route('view.my.appraisal.static.after', ['id' => $appraisal_form->id])}}" class="btn btn-primary"  > VIEW MY APPRAISAL WITH SIGNATURE </a>
            @else

            @endif 
            </td>
		</tr>
	@empty
		<tr class="danger">
			<td colspan="5">
				<span class="text-info"><i class="fa fa-fw fa-exclamation-triangle"></i> No Appraisal has been assign to you</span>  
			</td>
		</tr>
	@endforelse
    </tbody>
    </table>
@endsection