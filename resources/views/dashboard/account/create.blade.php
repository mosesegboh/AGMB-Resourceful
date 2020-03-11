@extends('dashboard.layout.app')
@section('dashboard-content')

	<div class="contact-form bottom">
		@include('partials.form-errors')
	    <h2>Create Accounts</h2>
		<form action="" class="form-horizontal" method="post">
			{{csrf_field()}}
			<table class="table table-bordered">
			    <thead>
			        <tr>
			            <th>Account Name</th>
			            <th>Account Type</th>
			            <th>Account Number</th>
			            <th>Deposit Target</th>
			            <th>Date Account Opened</th>
			            <th>Balance as at Apparaisal Date</th>
			        </tr>
			    </thead>
			    <tbody>
			    {{--dd(old('date_account_opened'))--}}
			    	@if(!empty(old('account_number')))
						@for($i = 0; $i < count(old('account_number')); $i++)
							<tr class="added-row">
					            <td><input type="text" name="account_name[]" class="form-control" placeholder="Account Name" value="{{old('account_name')[$i]}}"></td>
					            <td>
								<select class="form-control" name="account_type[]">
									<option value="">Account Type</option>
									@forelse($account_types as $account_type)
									<option value="{{$account_type->id}}" {{$account_type->id == old('account_type')[$i] ? 'selected="selected"' : ''}}>{{$account_type->name}}</option>
									@empty
									@endforelse
								</select>
					            </td>
					            <td>
					            	<input type="number" name="account_number[]" class="form-control" placeholder="Account Number" value="{{old('account_number')[$i]}}">
					            </td>
					            <td>
					            	<input type="number" name="deposit_target[]" class="form-control" placeholder="Deposit Target" value="{{old('deposit_target')[$i]}}">
					            </td>
					            <td>
					            	<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
									    <input type="text" class="form-control" name="date_account_opened[]" placeholder="Date Account Opened" value="{{old('date_account_opened')[$i]}}" >
									    <div class="input-group-addon">
									        <span class="glyphicon glyphicon-th"></span>
									    </div>
									</div>
					            </td>
					            <td>
					            	<input type="number" name="balance[]" class="form-control" placeholder="Balance As At Appraisal Date" value="{{old('balance')[$i]}}">
					            </td>
					        </tr>
						@endfor
			    	@else
			        <tr class="added-row">
			            <td><input type="text" name="account_name[]" class="form-control" placeholder="Account Name"></td>
			            <td>
						<select class="form-control" name="account_type[]">
							<option value="">Account Type</option>
							@forelse($account_types as $account_type)
							<option value="{{$account_type->id}}">{{$account_type->name}}</option>
							@empty
							@endforelse
						</select>
			            </td>
			            <td>
			            	<input type="number" name="account_number[]" class="form-control" placeholder="Account Number">
			            </td>
			            <td>
			            	<input type="number" name="deposit_target[]" class="form-control" placeholder="Deposit Target">
			            </td>
			            <td>
			            	<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
							    <input type="text" class="form-control" name="date_account_opened[]" placeholder="Date Account Opened">
							    <div class="input-group-addon">
							        <span class="glyphicon glyphicon-th"></span>
							    </div>
							</div>
			            </td>
			            <td>
			            	<input type="number" name="balance[]" class="form-control" placeholder="Balance As At Appraisal Date">
			            </td>
			        </tr>
			        @endif
			    </tbody>
			    <tfoot>
			    	<tr class="actions">
			    		<td colspan="6">
			    			<button type="button" class="btn btn-danger pull-right">Remove Account</button>
			    			<button type="button" class="btn btn-success pull-right" style="margin-right:15px">Add Account</button>
			    		</td>
			    	</tr>
			    	<tr>
			    		<td colspan="6">
			    			<div class="">
					            <input type="submit" name="submit" class="btn btn-submit" value="Submit Accounts">
					        </div>
			    		</td>
			    	</tr>
			    </tfoot>
			</table>
		</form>
	</div>
@endsection