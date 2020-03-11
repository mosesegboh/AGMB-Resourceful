<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{isset($title) ? $title.' | ' : ''}} Resourceful HR Manager</title>
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">


    <!-- Styles -->
    <link href="{{ url(elixir('css/all.css')) }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{url('images/ico/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{url('images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{url('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{url('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="{{url('apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png')}}">
</head>
<body>
    <header id="header">      
        <!-- <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                        <a href="login.html" class="btn btn-common">LOG IN</a>
                        </ul>
                    </div> 
                </div>
             </div>
        </div> -->

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
        <div class="navbar navbar-inverse" id="page-breadcrumb" role="banner" style="background-image: url('{{url('/images/home/tour-bg.png')}}'); padding-top:20px;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="index.html">
                        <h1><img src="{{url('images/logo.png')}}" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="{{url('/')}}">Home</a></li>
                       <li><a href="{{route('view.appraisal')}}">Dashboard</a></li>
                        @if(auth()->check())
                            <li><a href="{{route('logout')}}">LOG OUT</a></li>  
                        @else
                            <li><a href="{{route('login')}}">LOG IN</a></li>           
                        @endif
                    </ul>
                </div>
                <div class="search">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->

    @if (Session::has('flash_notification'))
        <div style="position:absolute; margin-top: 10px; left: 20%; right: 20%; z-index:9999999;" class="notification-wrapper">
            @include('flash::message')
        </div>
    @endif

    @yield('banner')

    @yield('content')

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="{{ url('images/home/under.png') }}" class="img-responsive inline" alt="">
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="testimonial bottom">
                        <h2>News From Our Twitter Page</h2>
                     <a class="twitter-timeline" data-width="400" data-height="250" href="https://twitter.com/TwitterDev/lists/national-parks?ref_src=twsrc%5Etfw">A Twitter List by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>  
                    </div> 
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="contact-info bottom">
                        <h2>Contacts</h2>
                        <address>
                        E-mail: <a href="mailto:someone@example.com">info@agmortgagebank.com</a> <br> 
                        Phone: +1-2704634<br> 
                       
                        </address>

                        <h2>Address</h2>
                        <address>
                        96 Opebi Road., <br> 
                        Ikeja, <br> 
                        Lagos State, <br> 
                        Nigeria. <br> 
                        </address>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="contact-form bottom">
                        <h2>Send a message</h2>
                        <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email Id">
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your text here"></textarea>
                            </div>                        
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; AG  Mortgage Bank {{date('Y')}}. All Rights Reserved.</p>
                        <p>Designed by <a target="_blank" href="http://www.mosesonline.net">MOSESonline.NET</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!--[if lt IE 9]>
<script type="text/javascript" src="{{ url(elixir('js/flashcanvas.js')) }}"></script>
<![endif]-->
    <script src="{{ url(elixir('js/all.js')) }}"></script>
</body>
</html>
