@extends('dashboard.layout.app')
@section('dashboard-content')

	<div class="contact-form bottom">
	@include('partials.form-errors')
	    <h2>Edit Job Title</h2>
		<form action="" class="form-horizontal" method="post">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="put">
			<div class="form-group">
		        <input type="text" name="job_title" class="form-control" placeholder="Job Title Name" @if(!empty(old('job_title'))) value="{{old('job_title')}}" @else value="{{$job_title->job_title}}" @endif>
		    </div>
		    <div class="form-group">
	            <input type="submit" name="submit" class="btn btn-submit" value="Update Job Title">
	        </div>
		</form>
	</div>
@endsection