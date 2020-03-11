@extends('dashboard.layout.app')
@section('dashboard-content')
<div class="contact-form bottom">
@include('partials.form-errors')
    <h2>Send Appraisal Form</h2>
    <form method="post" action="" class="form register">
        {{csrf_field()}}
        <div class="col-sm-6 form-padding-left"> 
            <div class="form-group">
                <select class="form-control supervisor-select" name="supervisor" data-href="{{route('ajax.fetch.appraisee')}}">
                    <option value="">Supervisor</option>
                    @forelse($supervisors as $user)
                    <option value="{{$user->supervisor_id}}" @if(!empty(old('supervisor'))) {{$user->supervisor_id == old('supervisor') ? 'selected="selected"' : ''}} @endif>{{$user->supervisor}}</option>
                    @empty
                    @endforelse
                </select>
            </div>
        </div>
        <div class="col-sm-6 form-padding-right"> 
            <div class="form-group">
                <select class="form-control appraisee-wrapper" name="appraisee">
                    <option value="">Appraisee</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6 form-padding-left"> 
	        <div class="form-group">
	           <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
				    <input type="text" class="form-control" name="period_begin" placeholder="Period Beign" value="{{old('period_begin')}}">
				    <div class="input-group-addon">
				        <span class="glyphicon glyphicon-th"></span>
				    </div>
				</div>
	        </div>
        </div>
        <div class="col-sm-6 form-padding-right"> 
	        <div class="form-group">
	            <div class="input-group date"  data-provide="datepicker" data-date-format="yyyy-mm-dd">
				    <input type="text" class="form-control" name="period_end" placeholder="Period Ends"  value="{{old('period_end')}}">
				    <div class="input-group-addon">
				        <span class="glyphicon glyphicon-th"></span>
				    </div>
				</div>
	        </div>
        </div>
        <div class="form-group">
            <input type="text" name="reason" class="form-control" value="{{old('reason')}}" placeholder="Reason for Appraisal: Confirmation, Quarterly, Annual (Indicate whichever is appropraite)">
        </div>

        <div class="col-sm-6 form-padding-left"> 
            <div class="form-group">
                <select class="form-control" name="appraisal_type">
                    <option value="">Appraisal Type</option>
                    @forelse($appraisal_types as $appraisal_type)
                    <option value="{{$appraisal_type}}" @if(!empty(old('appraisal_type'))) {{$appraisal_type == old('appraisal_type') ? 'selected="selected"' : ''}} @endif>{{$appraisal_type}}</option>
                    @empty
                    @endforelse
                </select>
            </div>
        </div>
        <div class="col-sm-6 form-padding-right"> 
	        <div class="form-group">
	            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
				    <input type="text" class="form-control" name="deadline" value="{{old('deadline')}}" placeholder="Deadline">
				    <div class="input-group-addon">
				        <span class="glyphicon glyphicon-th"></span>
				    </div>
				</div>
	        </div>
        </div>
                           
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-submit" value="Send Appraisal Form">
        </div>
        
    </form>
</div>
@endsection