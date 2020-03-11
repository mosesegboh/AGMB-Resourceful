@extends('dashboard.layout.app')

@section('dashboard-content')
<!-- <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Register  Here</h1>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section> -->
    <!--/#page-breadcrumb-->
<div class="contact-form bottom">
@include('partials.form-errors')
    <h2>Create Staff</h2>
    <form method="post" action="" class="form register">
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" name="fullname" class="form-control" placeholder="Fullname" value="{{old('fullname')}}">
        </div>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" value="{{old('username')}}">
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
        </div>
        <div class="col-sm-6 form-padding-left"> 
            <div class="form-group">
                <select class="form-control" name="department">
                    <option value="">Department</option>
                    @forelse($departments as $dept)
                    <option value="{{$dept->id}}" @if(!empty(old('department'))) {{$dept->id == old('department') ? 'selected="selected"' : ''}} @endif>{{$dept->department}}</option>
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
                    <option value="{{$jt->id}}" @if(!empty(old('job_title'))) {{$jt->id == old('job_title') ? 'selected="selected"' : ''}} @endif>{{$jt->job_title}}</option>
                    @empty
                    @endforelse
                </select>
            </div>
        </div>
        <div class="form-group">
            <input type="text" name="address" class="form-control" placeholder="Home Address" value="{{old('address')}}">
        </div>
        <div class="form-group">
            <input type="text" name="phone" class="form-control" placeholder="Mobile Number" value="{{old('phone')}}">
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
