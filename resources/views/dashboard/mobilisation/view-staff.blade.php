@extends('dashboard.layout.app')
@section('dashboard-content')
@include('partials.form-errors')
	<h4 class="appraisal-header">View <strong>{{$staff->fullname}}'s</strong> Deposit Mobilisation ( {{\Carbon\Carbon::parse(session()->get('start'))->format('jS M, Y')}}  <small style="color:red;">to</small> {{\Carbon\Carbon::parse(session()->get('end'))->format('jS M, Y')}})</h4> 
    <form class="form-horizontal search-staff" action="{{route('post.view.staff.deposit.mobilisation.for.verify')}}" method="post">
        {{csrf_field()}}
        <div class="col-sm-4"> 
            <div class="form-group">
                <label class="sr-only" for="inputEmail">Search By Staff</label>
                <select class="form-control" name="staff">
                    <option value="">Staff</option>
                    @forelse($staff_ids as $staff)
                    <option value="{{$staff->staff_id}}" {{$staff->staff_id == old('staff') ? 'selected="selected"' : ''}}>{{strtoupper($staff->staff->fullname)}}</option>
                    @empty
                    @endforelse
                </select>
                <p class="help-block">Search By Staff</p>
            </div> 
        </div>
        <div class="col-sm-4">
            <div class="form-group"> 
            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                <input type="text" class="form-control" name="start" placeholder="Start" value="{{old('start')}}">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
            <p class="help-block">Start</p>
            </div>
        </div>
        <div class="col-sm-4"> 
            <div class="form-group">
            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                <input type="text" class="form-control" name="end" placeholder="End" value="{{old('end')}}">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
            <p class="help-block">End</p>
            </div>
        </div>
        <div class="col-sm-12"> 
            <div class="form-group" >
            <input type="submit" name="submit" class="btn btn-submit" value="View Staff Mobilisation">
            </div> 
        </div>
    </form>
	<table class="table">
    <thead>
        <tr>
        @if($target->sum('deposit_target'))
            <td colspan="2">Target <br><strong>&#8358; {{number_format($target->sum('deposit_target'), 2, '.', ',')}}</strong></td>
            <td colspan="2">Target Hit <br><strong>&#8358; {{number_format($balance->sum('current_balance'), 2, '.', ',')}}</strong></td>
            <td colspan="2">Target Hit (%)<br> <strong>{{percentage($balance->sum('current_balance'), $target->sum('deposit_target'))}}%</strong></td>
            <td colspan="2">Target Remain (%) <br><strong>{{percentage(($target->sum('deposit_target') - $balance->sum('current_balance')), $target->sum('deposit_target'))}}%</strong></td>
        @else
            <td colspan="8"><p class="bg-info" style="padding:5px;"> Either Account or Deposit Mobilisation has not been verified</p></td>
        @endif
        </tr>
        <tr>
            <th>Account Name</th>
            <th>Account Number & Account Type</th>
            <th>Staff</th>
            <th>Debit Turn Over</th>
            <th>Credit Turn Over</th>
            <th>Current Balance</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($deposits as $deposit)
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
                @if($deposit->status == 1)
				<button type="button" class="btn btn-danger" data-url="{{route('pending.deposit.mobilisation', ['id' => $deposit->id])}}" data-class="btn btn-danger" data-title="PEND" data-toggle="modal" data-target="#modalStatus"> PEND </button>
                @else
                 <button type="button" class="btn btn-success" data-url="{{route('verified.deposit.mobilisation', ['id' => $deposit->id])}}" data-class="btn btn-success" data-title="VERIFY" data-toggle="modal" data-target="#modalStatus"> VERIFY </button>
                @endif
			</td>
		</tr>
	@empty
		<tr class="danger">
			<td colspan="8">
				<span class="text-info"><i class="fa fa-fw fa-exclamation-triangle"></i> No Deposit Mobilisation has been created</span>  
			</td>
		</tr>
	@endforelse
    </tbody>
    </table>
@endsection