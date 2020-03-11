@extends('dashboard.layout.app')
@section('dashboard-content')

	<div class="contact-form bottom">
		@include('partials.form-errors')
	    <h2>Create Department</h2>
		<form action="" class="form-horizontal" method="post">
			{{csrf_field()}}
			<div class="form-group">
		        <input type="text" name="department" class="form-control" placeholder="Department Name" value="{{old('department')}}">
		    </div>
		    <div class="form-group">
	            <input type="submit" name="submit" class="btn btn-submit" value="Create Department">
	        </div>
		</form>
	</div>
@endsection