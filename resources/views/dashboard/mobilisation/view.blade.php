@extends('dashboard.layout.app')
@section('dashboard-content')
	<h4 class="appraisal-header">View Deposit Mobilisation</h4>
	<table class="table">
    <thead>
        <tr>
            <th>Account Name</th>
            <th>Account Number & Account Type</th>
            <th>Staff</th>
            <th>Debit Turn Over</th>
            <th>Credit Turn Over</th>
            <th>Current Balance</th>
            <th>Status</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($staff_mobilisation as $deposit)
    	<tr>
    		<td>{{$deposit->account->account_name}}</td>
    		<td>{{$deposit->account->account_no}} ({{$deposit->account->accountType->name}})</td>
    		<td>{{$deposit->staff->fullname}}</td>
    		<td>&#8358;{{number_format($deposit->debit_turnover, 0,'.',',')}}</td>
            <td>&#8358;{{number_format($deposit->credit_turnover, 0,'.',',')}}</td>
            <td>&#8358;{{number_format($deposit->current_balance, 0,'.',',')}}</td>
    		<td>
    			@if($deposit->status == 1)
					<p class="bg-success" style="padding:5px;">VERIFIED</p>
    			@else
					<p class="bg-danger" style="padding:5px;">PENDING</p>
    			@endif
    		</td>
    		<td>
    			
    		</td>
    		<td>
    			@if($deposit->status == 1)
				<p class="bg-info" style="padding: 5px;">You do not have access to this action any longer</p>
    			@else
				<button type="button" class="btn btn-primary" data-url="{{route('edit.deposit.mobilisation', ['id' => $deposit->id])}}" data-class="btn btn-primary" data-title="EDIT" data-toggle="modal" data-target="#editModal"> EDIT </button>
				@endif
			</td>
			<td>
				@if($deposit->status == 1)
				<p class="bg-info" style="padding: 5px;">You do not have access to this action any longer</p>
    			@else
				<button type="button" class="btn btn-danger" data-url="{{route('delete.deposit.mobilisation', ['id' => $deposit->id])}}" data-class="btn btn-danger" data-title="DELETE" data-toggle="modal" data-target="#deleteModal"> DELETE </button>
				@endif
			</td>
		</tr>
	@empty
		<tr class="danger">
			<td colspan="9">
				<span class="text-info"><i class="fa fa-fw fa-exclamation-triangle"></i> No Deposit Mobilisation has been created</span>  
			</td>
		</tr>
	@endforelse
    </tbody>
    </table>
@endsection