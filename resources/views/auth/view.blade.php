@extends('dashboard.layout.app')
@section('dashboard-content')
	<h4 class="appraisal-header">View Staff</h4>
	<table class="table">
    <thead>
        <tr>
            <th>Staff Name</th>
            <th>Staff Email</th>
            <th>Staff Mobile Number</th>
            <th>Staff Address</th>
            <th colspan="3">Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($staffs as $staff)
    	<tr>
    		<td>{{$staff->fullname}}</td>
    		<td>{{$staff->email}}</td>
    		<td>{{$staff->phone}}</td>
    		<td>{{$staff->address}}</td>
    		<td>
    		 	@if($staff->activate == 0)
				<button type="button" class="btn btn-success" data-url="{{route('activate.user', ['id' => $staff->id])}}" data-class="btn btn-success" data-title="ACTIVATE" data-toggle="modal" data-target="#modalStatus"> ACTIVATE </button>
				@else
				<button type="button" class="btn btn-warning" data-url="{{route('deactivate.user', ['id' => $staff->id])}}" data-class="btn btn-warning" data-title="DEACTIVATE" data-toggle="modal" data-target="#modalStatus"> DEACTIVATE </button>	
				@endif
			</td>
    		<td>
				<button type="button" class="btn btn-primary" data-url="{{route('edit.user', ['id' => $staff->id])}}" data-class="btn btn-primary" data-title="EDIT" data-toggle="modal" data-target="#editModal"> EDIT </button>
			</td>
			<td>
				<button type="button" class="btn btn-danger" data-url="{{route('delete.user', ['id' => $staff->id])}}" data-class="btn btn-danger" data-title="DELETE" data-toggle="modal" data-target="#deleteModal"> DELETE </button>
			</td>
		</tr>
	@empty
		<tr class="danger">
			<td colspan="7">
				<span class="text-info"><i class="fa fa-fw fa-exclamation-triangle"></i> No Department has been created</span>  
			</td>
		</tr>
	@endforelse
    </tbody>
    </table>
@endsection