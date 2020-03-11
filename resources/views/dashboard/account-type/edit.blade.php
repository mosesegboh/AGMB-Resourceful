@extends('dashboard.layout.app')
@section('dashboard-content')

	<div class="contact-form bottom">
	@include('partials.form-errors')
	    <h2>Edit Account Type</h2>
		<form action="" class="form-horizontal" method="post">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="put">
			<div class="form-group">
		        <input type="text" name="account_type" class="form-control"  placeholder="Account Type Name" @if(!empty(old('account_type'))) value="{{old('account_type')}}" @else value="{{$account_type->account_type}}" @endif>
		    </div>
		    <div class="form-group">
	            <input type="submit" name="submit" class="btn btn-submit" value="Update Account Type">
	        </div>
		</form>
	</div>
@endsection