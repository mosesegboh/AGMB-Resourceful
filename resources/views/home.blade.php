@extends('layouts.app')

@section('banner')
<section id="home-slider">
    <div class="container">
        <div class="row">
            <div class="main-slider">
                <div class="slide-text">
                    <h1>Resourceful</h1>
                    <p>Fully Functional Human Resource Appraisal Manager.It's that easy</p>
                    <a href="register.html" class="btn btn-common">SIGN UP</a>
                </div>
                <img src="{{url('images/home/slider/hill.png')}}" class="slider-hill" alt="slider image">
                <img src="{{url('images/home/slider/house.png')}}" class="slider-house" alt="slider image">
                <img src="{{url('images/home/slider/sun.png')}}" class="slider-sun" alt="slider image">
                <img src="{{url('images/home/slider/birds1.png')}}" class="slider-birds1" alt="slider image">
                <img src="{{url('images/home/slider/birds2.png')}}" class="slider-birds2" alt="slider image">
            </div>
        </div>
    </div>
    <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
</section>
    <!--/#home-slider-->
@endsection

@section('content')
<section id="services">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                            <img src="{{url('images/home/icon1.png')}}" alt="">
                        </div>
                        <h2>Incredibly Responsive</h2>
                        <p>The Human Resource appraisal manager is fully responsive.Layouts fully functional on all devices from mobile to tablets to desktop.</p>
                    </div>
                </div>
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
                            <img src="{{url('images/home/icon2.png')}}" alt="">
                        </div>
                        <h2>Amazingly Scalable</h2>
                        <p>Database fully scalable to handle your volumes of data comfortably.All your records are processed effectively making your process smooth.</p>
                    </div>
                </div>
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
                            <img src="{{url('images/home/icon3.png')}}" alt="">
                        </div>
                        <h2>Powerful Security</h2>
                        <p>Built with the latest web technology.HRR is fully secured.Carry on your processes without any worries in mind.Let us handle the security.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#services-->

    <section id="action" class="responsive">
        <div class="vertical-center">
             <div class="container">
                <div class="row">
                    <div class="action take-tour">
                        <div class="col-sm-7 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                            <h1 class="title">Resourceful Appraisal Manager</h1>
                            <p>Appraisals is that easy.</p>
                        </div>
                        <div class="col-sm-5 text-center wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                            <div class="tour-button">
                                <a href="{{url('register')}}" class="btn btn-common">REGISTER</a>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->


    <section id="clients">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="clients text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                        <p><img src="{{url('images/home/clients.png')}}" class="img-responsive" alt=""></p>
                        <h1 class="title">Happy Users</h1>
                        <p>A smooth appraisal process makes the team work. <br> Get your appraisals done effectively </p>
                    </div>
                    
                </div>
            </div>
        </div>
     </section>
    <!--/#clients-->
@endsection
