@extends('dashboard.layout.app')
@section('dashboard-content')
	<h4 class="appraisal-header">View Account Types</h4>
	<table class="table">
    <thead>
        <tr>
            <th>Account Type</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($account_types as $account_type)
    	<tr>
    		<td>{{$account_type->name}}</td>
    		<td>
				<button type="button" class="btn btn-primary" data-url="{{route('edit.account_type', ['id' => $account_type->id])}}" data-class="btn btn-primary" data-title="EDIT" data-toggle="modal" data-target="#editModal"> EDIT </button>
			</td>
			<td>
				@if($account_type->id != 1)
				<button type="button" class="btn btn-danger" data-url="{{route('delete.account_type', ['id' => $account_type->id])}}" data-class="btn btn-danger" data-title="DELETE" data-toggle="modal" data-target="#deleteModal"> DELETE </button>
				@else
				<p class="bg-info" style="padding:5px">You can only Edit this Type of Account</p>
				@endif
			</td>
		</tr>
	@empty
		<tr class="danger">
			<td colspan="3">
				<span class="text-info"><i class="fa fa-fw fa-exclamation-triangle"></i> No Account Type has been created</span>  
			</td>
		</tr>
	@endforelse
    </tbody>
    </table>
@endsection