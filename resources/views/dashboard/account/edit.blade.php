@extends('dashboard.layout.app')
@section('dashboard-content')

	<div class="contact-form bottom">
	@include('partials.form-errors')
	    <h2>Edit Account</h2>
		<form action="" class="form-horizontal" method="post">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="put">
            <div class="form-group">
            <label>Account Name</label>
            <input type="text" name="account_name" class="form-control" placeholder="Account Name" @if(!empty(old('account_name'))) value="{{old('account_name')}}" @else value="{{$account->account_name}}" @endif >
            </div>
            <div class="form-group">
            <label>Account Type</label>
			<select class="form-control" name="account_type">
				<option value="">Account Type</option>
				@forelse($account_types as $account_type)
				<option value="{{$account_type->id}}" @if(!empty(old('account_type'))) {{$account_type->id == old('account_type') ? 'selected="selected"' : ''}} @else {{$account_type->id == $account->account_type ? 'selected="selected"' : ''}}@endif>{{$account_type->name}}</option>
				@empty
				@endforelse
			</select>
            </div>
            <div class="form-group">
				<label>Account Number</label>
            	<input type="number" name="account_number" class="form-control" placeholder="Account Number" @if(!empty(old('account_number'))) value="{{old('account_number')}}" @else value="{{$account->account_no}}" @endif>
            </div>
            <div class="form-group">
            	<label>Deposit Target</label>
            	<input type="number" name="deposit_target" class="form-control" placeholder="Deposit Target" @if(!empty(old('deposit_target'))) value="{{old('deposit_target')}}" @else value="{{$account->deposit_target}}" @endif>
            </div>
            <div class="form-group">
            	<label>Date Account Opened</label>
            	<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
				    <input type="text" class="form-control" name="date_account_opened" placeholder="Date Account Opened" @if(!empty(old('date_account_opened'))) value="{{old('date_account_opened')}}" @else value="{{\Carbon\Carbon::parse($account->date_account_opened)->format('Y-m-d')}}" @endif>
				    <div class="input-group-addon">
				        <span class="glyphicon glyphicon-th"></span>
				    </div>
				</div>
            </div>
            <div class="form-group">
            	<label>Balance as at appraisal</label>
            	<input type="number" name="balance" class="form-control" placeholder="Balance As At Appraisal Date" @if(!empty(old('balance'))) value="{{old('balance')}}" @else value="{{$account->balance_at_appraisal}}" @endif>
            </div>
			
		    <div class="form-group">
	            <input type="submit" name="submit" class="btn btn-submit" value="Update Account">
	        </div>
		</form>
	</div>
@endsection