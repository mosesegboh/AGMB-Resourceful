@extends('layouts.app')

@section('content')

    <!-- <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Login</h1>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section> -->
    <!--/#page-breadcrumb-->
<div class="container">
    <div class="col-md-4 col-sm-12" style="margin:auto; float:none;">
        <div class="contact-form bottom">
            @include('partials.form-errors')
            <h2>Login</h2>
            <form  name="login-form" method="post" action="">
            {{csrf_field()}}
                <div class="form-group">
                    <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="password">
                </div>
                                   
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-submit" value="Login">
                </div>
                <!-- <h3>if you are a new user please register <a href="register.html" >here</a></h3> -->
            </form>
        </div>
    </div>
</div>
@endsection
