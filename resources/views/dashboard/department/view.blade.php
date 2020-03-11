@extends('dashboard.layout.app')
@section('dashboard-content')
	<h4 class="appraisal-header">View Departments</h4>
	<table class="table">
    <thead>
        <tr>
            <th>Department</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($departments as $department)
    	<tr>
    		<td>{{$department->department}}</td>
    		<td>
				<button type="button" class="btn btn-primary" data-url="{{route('edit.department', ['id' => $department->id])}}" data-class="btn btn-primary" data-title="EDIT" data-toggle="modal" data-target="#editModal"> EDIT </button>
			</td>
			<td>
				<button type="button" class="btn btn-danger" data-url="{{route('delete.department', ['id' => $department->id])}}" data-class="btn btn-danger" data-title="DELETE" data-toggle="modal" data-target="#deleteModal"> DELETE </button>
			</td>
		</tr>
	@empty
		<tr class="danger">
			<td colspan="3">
				<span class="text-info"><i class="fa fa-fw fa-exclamation-triangle"></i> No Department has been created</span>  
			</td>
		</tr>
	@endforelse
    </tbody>
    </table>
@endsection