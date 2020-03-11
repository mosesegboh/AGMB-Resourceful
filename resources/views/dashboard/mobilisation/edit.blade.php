@extends('dashboard.layout.app')
@section('dashboard-content')

	<div class="contact-form bottom">
	@include('partials.form-errors')
	    <h2>Edit Deposit Mobilisation</h2>
		<form action="" class="form-horizontal" method="post">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="put">
			<input type="hidden" name="account_id" value="{{$deposit->account_id}}">
            <div class="form-group">
            <label>Account Name</label>
			<p class="form-control-static">{{strtoupper($deposit->account->account_name)}} ({{$deposit->account->account_no}} => {{$deposit->account->accountType->name}})</p>
            </div>
            <div class="form-group">
				<label>Debit Turn Over</label>
            	<input type="number" name="debit_turnover" class="form-control" placeholder="Debit Turn Over" @if(!empty(old('debit_turnover'))) value="{{old('debit_turnover')}}" @else value="{{$deposit->debit_turnover}}" @endif>
            </div>
            <div class="form-group">
            	<label>Credit Turn Over</label>
            	<input type="number" name="credit_turnover" class="form-control" placeholder="Credit Turn Over" @if(!empty(old('credit_turnover'))) value="{{old('credit_turnover')}}" @else value="{{$deposit->credit_turnover}}" @endif>
            </div>
		    <div class="form-group">
	            <input type="submit" name="submit" class="btn btn-submit" value="Update Deposit Mobilisation">
	        </div>
		</form>
	</div>
@endsection