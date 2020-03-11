@extends('dashboard.layout.app')
@section('dashboard-content')

	<div class="contact-form bottom">
	@include('partials.form-errors')
	    <h2>You are about to transfer {{$account->account_name}} with Account Number {{$account->account_no}} to</h2>
		<form action="" class="form-horizontal" method="post">
			{{csrf_field()}}
			<input type="hidden" name="account" value="{{$account->id}}">
            <div class="form-group">
            <label>Staff</label>
			<select class="form-control" name="staff">
				<option value="">Staff</option>
				@forelse($staffs as $staff)
				<option value="{{$staff->id}}" @if(!empty(old('staff'))) {{$staff->id == old('staff') ? 'selected="selected"' : ''}} @endif>{{$staff->fullname}}</option>
				@empty
				@endforelse
			</select>
            </div>
            
			
		    <div class="form-group">
	            <input type="submit" name="submit" class="btn btn-submit" value="Transfer Account">
	        </div>
		</form>
	</div>
@endsection