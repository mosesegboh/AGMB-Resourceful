@extends('dashboard.layout.app')
@section('dashboard-content')
	<h4 class="appraisal-header">View Departments</h4>
	<table class="table">
    <thead>
        <tr>
            <th>Account Name</th>
            <th>Account Number</th>
            <th>Account Type</th>
            <th>Deposit Target</th>
            <th>Balance at Appraisal</th>
            <th>Date Opened</th>
            <th>Account Brought By</th>
            <th>Status</th>
            <th>Actions</th>
            <th>Transfer Acct To Staff</th>
        </tr>
    </thead>
    <tbody>
    @forelse($accounts as $account)
    	<tr>
    		<td>{{$account->account_name}}</td>
    		<td>{{$account->account_no}}</td>
    		<td>{{$account->accountType->name}}</td>
    		<td>{{$account->deposit_target}}</td>
    		<td>{{$account->balance_at_appraisal}}</td>
            <td>{{\Carbon\Carbon::parse($account->date_account_opened)->format('jS M, Y ')}}</td>
            <td>{{$account->appraisee->fullname}}</td>
            <td>
                @if($account->status == 1)
                    <p class="bg-success" style="padding:5px;">VERIFIED</p>
                @else
                    <p class="bg-danger" style="padding:5px;">PENDING</p>
                @endif
            </td>
    		<td>
            @if(auth()->user()->auditor == 1)
                @if($account->status == 1)
				<button type="button" class="btn btn-danger" data-url="{{route('pending.account', ['id' => $account->id])}}" data-class="btn btn-danger" data-title="PEND" data-toggle="modal" data-target="#modalStatus"> PEND </button>
                @else
                 <button type="button" class="btn btn-success" data-url="{{route('verified.account', ['id' => $account->id])}}" data-class="btn btn-success" data-title="VERIFY" data-toggle="modal" data-target="#modalStatus"> VERIFY </button>
                @endif
            @endif
			</td>
            <td>
                <button type="button" class="btn btn-primary" data-url="{{route('assign.account.to.staff', ['id' => $account->id])}}" data-class="btn btn-primary" data-title="TRANSFER" data-toggle="modal" data-target="#transferModal"> TRANSFER </button>
            </td>
		</tr>
	@empty
		<tr class="danger">
			<td colspan="8">
				<span class="text-info"><i class="fa fa-fw fa-exclamation-triangle"></i> No Account has been created</span>  
			</td>
		</tr>
	@endforelse
    </tbody>
    </table>
@endsection