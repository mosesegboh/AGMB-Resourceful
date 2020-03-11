@extends('dashboard.layout.app')
@section('dashboard-content')
<div class="contact-form bottom">
@include('partials.form-errors')
    <h2>Edit Staff</h2>
    <form method="post" action="" class="form register">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <input type="text" name="fullname" class="form-control" placeholder="Fullname" @if(!empty(old('fullname'))) value="{{old('fullname')}}" @else value="{{$staff->fullname}}" @endif>
        </div>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" @if(!empty(old('username'))) value="{{old('username')}}" @else value="{{$staff->username}}" @endif>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email"  @if(!empty(old('email'))) value="{{old('email')}}" @else value="{{$staff->email}}" @endif>
        </div>
        <div class="col-sm-6 form-padding-left"> 
            <div class="form-group">
                <select class="form-control" name="department">
                    <option value="">Department</option>
                    @forelse($departments as $dept)
                    <option value="{{$dept->id}}" @if(!empty(old('department'))) {{$dept->id == old('department') ? 'selected="selected"' : ''}} 
                    @else
						{{$dept->id == $staff->department_id ? 'selected="selected"' : ''}}
                    @endif>{{$dept->department}}</option>
                    @empty
                    @endforelse
                </select>
            </div>
        </div>
        <div class="col-sm-6 form-padding-right"> 
            <div class="form-group">
                <select class="form-control" name="job_title">
                    <option value="">Job Title</option>
                    @forelse($job_titles as $jt)
                    <option value="{{$jt->id}}" @if(!empty(old('job_title'))) 
                    	{{$jt->id == old('job_title') ? 'selected="selected"' : ''}} 
                    @else
						{{$jt->id == $staff->job_title_id ? 'selected="selected"' : ''}}
                    @endif>{{$jt->job_title}}</option>
                    @empty
                    @endforelse
                </select>
            </div>
        </div>
        <div class="form-group">
            <input type="text" name="address" class="form-control" placeholder="Home Address" @if(!empty(old('address'))) value="{{old('address')}}" @else value="{{$staff->address}}" @endif>
        </div>
        <div class="form-group">
            <input type="text" name="phone" class="form-control" placeholder="Mobile Number" @if(!empty(old('phone'))) value="{{old('phone')}}" @else value="{{$staff->phone}}" @endif>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="password">
        </div>

        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control" placeholder="confirm password">
        </div>
                           
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-submit" value="Register">
        </div>
        
    </form>
</div>
@endsection