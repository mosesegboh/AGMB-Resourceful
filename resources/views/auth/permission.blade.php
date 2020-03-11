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
            <th>Admin(HR)</th>
            <th>Auditor</th>
            <th>Manager</th>
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
    		 	@if($staff->admin == 0)
				<button type="button" class="btn btn-success" data-url="{{route('admin.permission.authorize', ['id' => $staff->id])}}" data-class="btn btn-success" data-title="AUTHORIZE USER" data-toggle="modal" data-target="#modalStatus"> AUTHORIZE </button>
				@else
				<button type="button" class="btn btn-warning" data-url="{{route('admin.permission.unauthorize', ['id' => $staff->id])}}" data-class="btn btn-warning" data-title="UNAUTHORIZE USER" data-toggle="modal" data-target="#modalStatus"> UNAUTHORIZE </button>	
				@endif
			</td>
    		<td>
				@if($staff->auditor == 0)
                <button type="button" class="btn btn-success" data-url="{{route('auditor.permission.authorize', ['id' => $staff->id])}}" data-class="btn btn-success" data-title="AUTHORIZE USER" data-toggle="modal" data-target="#modalStatus"> AUTHORIZE </button>
                @else
                <button type="button" class="btn btn-warning" data-url="{{route('auditor.permission.unauthorize', ['id' => $staff->id])}}" data-class="btn btn-warning" data-title="UNAUTHORIZE USER" data-toggle="modal" data-target="#modalStatus"> UNAUTHORIZE </button>   
                @endif
			</td>
			<td>
				@if($staff->manager == 0)
                <button type="button" class="btn btn-success" data-url="{{route('manager.permission.authorize', ['id' => $staff->id])}}" data-class="btn btn-success" data-title="AUTHORIZE USER" data-toggle="modal" data-target="#modalStatus"> AUTHORIZE </button>
                @else
                <button type="button" class="btn btn-warning" data-url="{{route('manager.permission.unauthorize', ['id' => $staff->id])}}" data-class="btn btn-warning" data-title="UNAUTHORIZE USER" data-toggle="modal" data-target="#modalStatus"> UNAUTHORIZE </button>   
                @endif
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