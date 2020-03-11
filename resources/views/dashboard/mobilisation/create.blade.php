@extends('dashboard.layout.app')
@section('dashboard-content')

	<div class="contact-form bottom">
		@include('partials.form-errors')
	    <h2>Create Deposit Mobilisation</h2>
		<form action="" class="form-horizontal" method="post">
			{{csrf_field()}}
			<table class="table table-bordered">
			    <thead>
			        <tr>
			            <th colspan="3">Account Name (Account Number => Account Type )</th>
			            <th>Debit TurnOver</th>
			            <th>Credit TurnOver</th>
			        </tr>
			    </thead>
			    <tbody>
			    {{--dd(old('date_account_opened'))--}}
			    	@if(!empty(old('account_id')))
						@for($i = 0; $i < count(old('account_id')); $i++)
							<tr class="added-row">
					            <td colspan="3">
								<select class="form-control" name="account_id[]">
									<option value="">Account Name</option>
									@forelse($staff_accounts as $account)
									<option value="{{$account->id}}" {{$account->id == old('account_id')[$i] ? 'selected="selected"' : ''}}>{{strtoupper($account->account_name)}} ({{$account->account_no}} => {{$account->accountType->name}})</option>
									@empty
									@endforelse
								</select>
					            </td>
					            <td>
					            	<input type="number" name="debit_turnover[]" class="form-control" placeholder="Debit Turn Over" value="{{old('debit_turnover')[$i]}}">
					            </td>
					            <td>
					            	<input type="number" name="credit_turnover[]" class="form-control" placeholder="Credit Turn Over" value="{{old('credit_turnover')[$i]}}">
					            </td>
					        </tr>
						@endfor
			    	@else
			        <tr class="added-row">
			            <td colspan="3">
						<select class="form-control" name="account_id[]">
							<option value="">Account Name</option>
							@forelse($staff_accounts as $account)
							<option value="{{$account->id}}">{{strtoupper($account->account_name)}} ({{$account->account_no}} => {{$account->accountType->name}})</option>
							@empty
							@endforelse
						</select>
			            </td>
			            <td>
			            	<input type="number" name="debit_turnover[]" class="form-control" placeholder="Debit Turn Over">
			            </td>
			            <td>
			            	<input type="number" name="credit_turnover[]" class="form-control" placeholder="Credit Turn Over">
			            </td>
			        </tr>
			        @endif
			    </tbody>
			    <tfoot>
			    	<tr class="actions">
			    		<td colspan="5">
			    			<button type="button" class="btn btn-danger pull-right">Remove Deposit Mobilisation</button>
			    			<button type="button" class="btn btn-success pull-right" style="margin-right:15px">Add Deposit Mobilisation</button>
			    		</td>
			    	</tr>
			    	<tr>
			    		<td colspan="5">
			    			<div class="">
					            <input type="submit" name="submit" class="btn btn-submit" value="Submit Deposit Mobilisation">
					        </div>
			    		</td>
			    	</tr>
			    </tfoot>
			</table>
		</form>
	</div>
@endsection