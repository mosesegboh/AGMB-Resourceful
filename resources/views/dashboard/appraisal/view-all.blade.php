@extends('dashboard.layout.app')
@section('dashboard-content')
	<h4 class="appraisal-header">View All Appraisal Sent</h4>
	<table class="table">
    <thead>
        <tr>
            <th>Supervisor</th>
            <th>Appraisee</th>
            <th>Grade</th>
            <th colspan="4">Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($appraisals as $appraisal_form)
    	<tr>
    		<td>{{$appraisal_form->user_sup->fullname}}</td>
    		<td>{{$appraisal_form->user->fullname}}</td>
    		<td>{{$appraisal_form->section_4 == NULL ? 'Not Avaliable' : $appraisal_form->grade.'%'}}</td>
    		<td>
    			@if($appraisal_form->status == 0)
				<button type="button" class="btn btn-success" data-url="{{route('open.appraisal', ['id' => $appraisal_form->id])}}" data-class="btn btn-success" data-title="OPEN" data-toggle="modal" data-target="#modalStatus"> OPEN </button>
				@else
				<button type="button" class="btn btn-warning" data-url="{{route('close.appraisal', ['id' => $appraisal_form->id])}}" data-class="btn btn-warning" data-title="CLOSE" data-toggle="modal" data-target="#modalStatus"> CLOSE </button>	
				@endif
    		</td>
    		<td>
            @if($appraisal_form->type == 'staff-appraisal')
				<a href="{{route('view.section1.appraisal', ['appraisee_id' => $appraisal_form->appraisee_id, 'supervisor_id' => $appraisal_form->supervisor_id ])}}" class="btn btn-primary"  > VIEW APPRAISAL </a>
            @else

            @endif
			</td>
            <td>
            @if($appraisal_form->appraisee_decision != NULL && auth()->user()->admin == 1)
               <a href="{{route('hr.comments', ['id' => $appraisal_form->id ])}}" class="btn btn-primary"  > HR COMMENT </a> 
            @endif
            </td>
            <td>
            @if($appraisal_form->appraisee_decision != NULL && auth()->user()->manager == 1)
               <a href="{{route('management.comments', ['id' => $appraisal_form->id ])}}" class="btn btn-primary"  > MANAGEMENT DECISION </a> <br><br>
               <a href="{{route('view.staff.deposit.mobile', ['id' => $appraisal_form->id ])}}" class="btn btn-primary"  > VIEW APPRAISEE DEP. MOB. </a>           
             @endif 
            </td>
		</tr>
	@empty
		<tr class="danger">
			<td colspan="7">
				<span class="text-info"><i class="fa fa-fw fa-exclamation-triangle"></i> No Appraisal has been assign</span>  
			</td>
		</tr>
	@endforelse
    </tbody>
    <tfoot>
    	<tr>
    		<td colspan="7">{{$appraisals->render()}}</td>
    	</tr>
    </tfoot>
    </table>
@endsection