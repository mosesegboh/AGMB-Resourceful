@extends('dashboard.layout.app')
@section('dashboard-content')

	<div class="contact-form bottom">
		@include('partials.form-errors')
	    <h2>Create Job Title</h2>
		<form action="" class="form-horizontal" method="post">
			{{csrf_field()}}
			<div class="form-group">
		        <input type="text" name="job_title" class="form-control" placeholder="Job Title Name" value="{{old('job_title')}}">
		    </div>
		    <div class="form-group">
	            <input type="submit" name="submit" class="btn btn-submit" value="Create Job Title">
	        </div>
		</form>
	</div>
@endsection