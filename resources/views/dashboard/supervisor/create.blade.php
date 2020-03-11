@extends('dashboard.layout.app')
@section('dashboard-content')

	<div class="contact-form bottom">
		@include('partials.form-errors')
	    <h2>Assign Supervisor</h2>
		<form action="" class="form-horizontal" method="post">
			{{csrf_field()}}
			<div class="row">
		        <div class="col-sm-12 col-md-6">
		    		<div class="form-group" style="padding: 15px;">
			        <label style="display:block;">Supervisor</label>
			        <input type="hidden" name="supervisor" value="{{old('supervisor')}}">
			        		@forelse($users as $supervisor)
				        		<div class="single-select-button disable-select btn-submit @if(!empty(old('supervisor'))) {{$supervisor->id == old('supervisor') ? 'active' : ''}} @endif">
				        			{{$supervisor->fullname}}
				        			<input type="radio" value="{{$supervisor->id}}" @if(!empty(old('supervisor'))) {{$supervisor->id == old('supervisor') ? 'checked="checked"' : ''}} @endif>
				        		</div>
				        	@empty
			        		@endforelse
		           </div>
		        </div>
		        <div class="col-sm-12 col-md-6">
		        	<div class="form-group" style="padding: 15px;">
		        		<label style="display:block;">Staff</label>
		        		@forelse($users as $staff)
			        		<div class="multiple-select-button disable-select btn-submit @if(!empty(old('staff'))) {{in_array($staff->id, old('staff')) ? 'active' : ''}} @endif">
			        			{{$staff->fullname}}
			        			<input type="checkbox" name="staff[]" value="{{$staff->id}}" @if(!empty(old('staff'))) {{in_array($staff->id, old('staff')) ? 'checked="checked"' : ''}} @endif>
			        		</div>
		        		@empty
		        		@endforelse
		            </div>
		        </div>
		    </div>
		    <div class="form-group">
	            <input type="submit" name="submit" class="btn btn-submit" value="Assign SUpervisor">
	        </div>
		</form>
	</div>
@endsection