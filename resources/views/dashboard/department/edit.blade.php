@extends('dashboard.layout.app')
@section('dashboard-content')

	<div class="contact-form bottom">
	@include('partials.form-errors')
	    <h2>Edit Department</h2>
		<form action="" class="form-horizontal" method="post">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="put">
			<div class="form-group">
		        <input type="text" name="department" class="form-control"  placeholder="Department Name" @if(!empty(old('department'))) value="{{old('department')}}" @else value="{{$department->department}}" @endif>
		    </div>
		    <div class="form-group">
	            <input type="submit" name="submit" class="btn btn-submit" value="Update Department">
	        </div>
		</form>
	</div>
@endsection