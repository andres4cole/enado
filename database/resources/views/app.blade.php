<!DOCTYPE html>
<html lang="en">
<head>
    @yield('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Innovative web design ans social utility">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $site->description }}">
    <meta name="author" content="Nosakhare Andrew">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>  {{ $site->title }}</title>
	{{-- asset('bt/') --}}
	<!-- core CSS -->
    <link href="{{ asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('frontend/images/ico/icon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('frontend/images/ico/icon.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('frontend/images/ico/icon144.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('frontend/images/ico/icon1.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('frontend/images/ico/icon2.png')}}">

</head><!--/head-->

<body class="homepage" style="background-image: url({{ asset('/files/setting/background/'.$site->background_image.'')}})">

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <div class="top-number "><p><i class="fa fa-phone-square"></i>{{ $site->phone }}</p></div>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="//facebook.com/{{$site->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="//twitter.com/{{$site->twitter}}"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                            <div class="search hidden-xs">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
                                </form>
                           </div>
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('files/setting/logo/'.$site->logo.'') }}" alt="Enado"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                       <li class="{{ (Request::is('about') ? 'active' : '')}} "><a href="{{url('about')}}">about</a></li>
                       <li class="{{ (Request::is('services') ? 'active' : '')}} "><a href="{{url('services')}}">services</a></li>
                       <li class="{{ (Request::is('portfolio') ? 'active' : '')}} "><a href="{{url('portfolio')}}">portfolio</a></li>
                       <li class="{{ (Request::is('news') ? 'active' : '')}} "><a href="{{url('news')}}">news</a></li>
                       <li class="{{ (Request::is('testimonies') ? 'active' : '')}} "><a href="{{url('testimonies')}}">testimonies</a></li>
                       <li class="{{ (Request::is('contact') ? 'active' : '')}} "><a href="{{url('contact')}}">contact</a></li>
                      <li class="{{ (Request::is('request') ? 'active' : '')}} "><a href="{{url('request')}}">proposal</a></li>
                       <li class="{{ (Request::is('developer') ? 'active' : '')}} "><a href="{{url('developer')}}">developer</a></li>
                 
                                             
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->

@yield('slider')
@yield('headerapp')

 @if (Session::has('success_msg'))
  <div class="container">
    <div class="row">
      <div class="col-md-12">
     <div class="alert alert-success">
        <span class="glyphicon glyphicon-check"> {{ Session::get('success_msg') }}</span>
    </div>
   </div>
  </div>
</div>
    @endif

     @if (Session::has('error_msg'))
     <div class="container">
    <div class="row">
     <div class="col-md-12">
     <div class="alert alert-danger">
        <span class="glyphicon glyphicon-check"> {{ Session::get('error_msg') }}</span>
    </div>
     </div>
     </div>
      </div>
    @endif

<section class="container"><!-- section start here, sorry if you are developer fuck u -->
<div class="row">

 @yield('content')
 @yield('sidebar')
    
</div>
</section><!-- section ends here -->



   <div class="mid-footer footer-background">
        <div class="container">

                      <div class="row">
                    <div class="col-footer col-md-3 col-sm-6 col-xs-12">
                    
                        <h3>Our Latest Work</h3>
                        <div class="portfolio-picture">
                        @foreach($portfolio as $portfolio)  
                 <a href="{{ url('portfolio/'.$portfolio->id.'')}} "><img src="{{ asset('/files/portfolio/'.$portfolio->image.'') }}" alt="{{ $portfolio->name }}"></a>
                           
                        @endforeach
                    </div>
                </div>


                    
                    <div class="col-footer col-md-3 col-sm-6 col-xs-12 mid-contact">
                        <h3>Contacts</h3>
                        <p class="contact-us-details">
                            <b>Address:</b>{{$site->address}}<br/>
                            <b>Phone:</b> {{$site->phone}}<br/>
                            <b>Fax:</b> {{$site->fax}}<br/>
                            <b>Email:</b> <a href="{{$site->email}}">{{$site->email}}</a>
                        </p>
                        <h4> subscrbe to our newsletter </h4>
                        <div class="form-close">
                          <form class="form-horizontal" role="form" id="form" action=" {{ url('/save/e')}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group input-group {{{ $errors->has('email') ? 'has-error' : ''}}}">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="enter email address" class="form-control input-sm" id="email">
                            <div class="error"> {{ $errors->first('email')}}</div>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default btn-sm">GO</button>
                            </span>
                        </div>
                          </form>
                      </div>
                    </div>

                      <div class="col-footer col-md-3 col-sm-6 col-xs-12">
                       <h3>menu</h3>
                       <ul class="menu-space">
                        <li><a href="{{ url('about') }}">about us</a></li>
                        <li><a href="{{ url('contact') }}">contact us</a></li>
                        <li><a href="{{ url('portfolio') }}">portfolio</a></li>
                        <li><a href="{{ url('services') }}">services</a></li>
                        <li><a href="{{ url('news') }}">news</a></li>
                        <li><a href="{{ url('testimonies') }}">testimony</a></li>
                        <li><a href="{{ url('developer') }}">developer</a></li>
                        <li><a href="{{url('request')}}">Proposal</a></li>
                       </ul>
                                              
                   
                    </div>
                    <div class="col-footer col-md-3 col-sm-6 col-xs-12">
                        <h3>Stay Connected</h3>
                        <ul class="footer-stay-connected no-list-style">
                            <li><a href="//facebook.com/{{$site->facebook}}" class="facebook"></a></li>
                            <li><a href="//twitter.com/{{$site->twitter}}" class="twitter"></a></li>
                            <li><a href="//google.com/{{$site->google}}" class="googleplus"></a></li>
                        </ul>
            
                    </div>
               
                </div>
             </div>
         </div>



 @yield('footer')
        <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2012 - {{ date('Y')}} <a target="_blank" href="" title=""> Enadoo inc </a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="{{ url('/') }}">Home</a></li>
                         <li><a href="{{ url('about') }}">About us</a></li>
                          <li><a href="{{ url('support') }}">support</a></li>
                           <li><a href="{{ url('contact') }}">Contact us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->



    <script src="{{ asset('frontend/js/jquery.js')}}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.isotope.min.js')}}"></script>
    <script src="{{ asset('frontend/js/main.js')}}"></script>
    <script src="{{ asset('frontend/js/wow.min.js')}}"></script>


</body>
</html>