@extends('dashboard.layout.app')
@section('dashboard-content')
	<h4 class="appraisal-header">View Job Titles</h4>
	<table class="table">
    <thead>
        <tr>
            <th>Job Title</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($job_titles as $job_title)
    	<tr>
    		<td>{{$job_title->job_title}}</td>
    		<td>
				<button type="button" class="btn btn-primary" data-url="{{route('edit.job_title', ['id' => $job_title->id])}}" data-class="btn btn-primary" data-title="EDIT" data-toggle="modal" data-target="#editModal"> EDIT </button>
			</td>
			<td>
				<button type="button" class="btn btn-danger" data-url="{{route('delete.job_title', ['id' => $job_title->id])}}" data-class="btn btn-danger" data-title="DELETE" data-toggle="modal" data-target="#deleteModal"> DELETE </button>
			</td>
		</tr>
	@empty
		<tr class="danger">
			<td colspan="3">
				<span class="text-info"><i class="fa fa-fw fa-exclamation-triangle"></i> No Job Title has been created</span>  
			</td>
		</tr>
	@endforelse
    </tbody>
    </table>
@endsection