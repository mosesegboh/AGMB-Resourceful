@extends('dashboard.layout.app')
@section('dashboard-content')
	<h4 class="appraisal-header">View Assign Supervisor</h4>
	<table class="table">
    <thead>
        <tr>
            <th>Supervisor</th>
            <th>Staff</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($supervisors as $supervisor)
    	<tr>
    		<td>{{$supervisor->fullname}}</td>
    		<td>
    		@forelse(getAssignStaff($supervisor->id) as $staff)
				<p  class="bg-agmk-color" style=""><strong>{{$staff->fullname}}</strong></p>
    		@empty
				<p class="bg-danger"><strong><i class="fa fa-fw fa-exclamation-triangle"></i> Sorry, No Staff has been assign to the supervisor</strong></p>
    		@endforelse
    		</td>
    		<td>
				<button type="button" class="btn btn-primary" data-url="{{route('edit.assign.supervisor', ['id' => $supervisor->id])}}" data-class="btn btn-primary" data-title="EDIT" data-toggle="modal" data-target="#editModal"> EDIT </button>
			</td>
			<td>
				<button type="button" class="btn btn-danger" data-url="{{route('delete.assign.supervisor', ['id' => $supervisor->id])}}" data-class="btn btn-danger" data-title="DELETE" data-toggle="modal" data-target="#deleteModal"> DELETE </button>
			</td>
		</tr>
	@empty
		<tr class="danger">
			<td colspan="3">
				<span class="text-info"><i class="fa fa-fw fa-exclamation-triangle"></i> No Supervisor has been to staff</span>  
			</td>
		</tr>
	@endforelse
    </tbody>
    </table>
@endsection