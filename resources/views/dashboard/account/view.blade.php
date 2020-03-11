@extends('dashboard.layout.app')
@section('dashboard-content')
	<h4 class="appraisal-header">View Departments</h4>
	<table class="table">
    <thead>
        <tr>
            <th>Account Name</th>
            <th>Account Number</th>
            <th>Account Type</th>
            <th>Date Opened</th>
            <th>Balance at Appraisal</th>
            <th>Deposit Target</th>
            <th>Status</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($accounts as $account)
    	<tr>
    		<td>{{$account->account_name}}</td>
    		<td>{{$account->account_no}}</td>
    		<td>{{$account->accountType->name}}</td>
    		<td>{{$account->deposit_target}}</td>
    		<td>{{\Carbon\Carbon::parse($account->date_account_opened)->format('jS M, Y ')}}</td>
    		<td>{{$account->balance_at_appraisal}}</td>
    		<td>
    			@if($account->status == 1)
					<p class="bg-success" style="padding:5px;">VERIFIED</p>
    			@else
					<p class="bg-danger" style="padding:5px;">PENDING</p>
    			@endif
    		</td>
    		<td>
    			
    		</td>
    		<td>
    			@if($account->status == 1)
				<p class="bg-info" style="padding: 5px;">You do not have access to this action any longer</p>
    			@else
				<button type="button" class="btn btn-primary" data-url="{{route('edit.account', ['id' => $account->id])}}" data-class="btn btn-primary" data-title="EDIT" data-toggle="modal" data-target="#editModal"> EDIT </button>
				@endif
			</td>
			<td>
				@if($account->status == 1)
				<p class="bg-info" style="padding: 5px;">You do not have access to this action any longer</p>
    			@else
				<button type="button" class="btn btn-danger" data-url="{{route('delete.account', ['id' => $account->id])}}" data-class="btn btn-danger" data-title="DELETE" data-toggle="modal" data-target="#deleteModal"> DELETE </button>
				@endif
			</td>
		</tr>
	@empty
		<tr class="danger">
			<td colspan="9">
				<span class="text-info"><i class="fa fa-fw fa-exclamation-triangle"></i> No Account has been created</span>  
			</td>
		</tr>
	@endforelse
    </tbody>
    </table>
@endsection