@extends('dashboard.layout.app')
@section('dashboard-content')

	<div class="contact-form bottom">
		@include('partials.form-errors')
	    <h2>Create Account Type</h2>
		<form action="" class="form-horizontal" method="post">
			{{csrf_field()}}
			<div class="form-group">
		        <input type="text" name="account_type" class="form-control" placeholder="Account Type Name" value="{{old('account_type')}}">
		    </div>
		    <div class="form-group">
	            <input type="submit" name="submit" class="btn btn-submit" value="Create Account Type">
	        </div>
		</form>
	</div>
@endsection