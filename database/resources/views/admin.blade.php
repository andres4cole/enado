<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title>{{$site->description }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href=" {{ asset('backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href=" {{ asset('backend/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href=" {{ asset('backend/css/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <link href=" {{ asset('backend/css/wysi.min.css')}}" rel="stylesheet" type="text/css" />
    <link href=" {{ asset('backend/css/css/skins/skin-blue.min.css')}}" rel="stylesheet" type="text/css" />
    <link href=" {{ asset('backend/css/pikaday.css')}}" rel="stylesheet" type="text/css" />
    <link href=" {{ asset('backend/css/app.css')}}" rel="stylesheet" type="text/css" />

  </head>
 
  <body class="skin-blue sidebar-mini" >
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header" >
        <!-- Logo -->
        <a href="{{url('/admin')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>E</b>xpn</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Expn</b> Admin</span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation" >
          <!-- Sidebar toggle button-->
          <a href="{{url('/admin')}} " class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <ul class="nav navbar-nav hidden-xs">
            <li><a href="{{url('/admin/services')}}">services</a></li>
            <li><a href="{{url('/admin/about')}}">about</a></li>
            <li><a href="{{url('/admin/developer')}}">developer</a></li>
            <li><a href="{{url('/admin/news')}}">news</a></li>
            <li><a href="{{url('/admin/portfolio')}}">portfolio</a></li>
            <li><a href="{{url('/admin/settings')}}">setting</a></li>
            <li><a href="{{url('/admin/support')}}">support</a></li>
          </ul>
          <form class="navbar-form navbar-left hidden-xs" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" name="search" id="search" placeholder="search">
                </div>
              </form>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">17</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu">
                      @foreach($ct as $c)
                      <li><!-- start message -->
                        <a href=" {{ url('/admin/contact/'.$c->id.'') }}">
                          <div class="pull-left">
                            <!-- User Image -->
                            <img src=" {{ asset('backend/img/user2-160x160.jpg')}}" class="img-circle" alt="" />
                          </div>
                          <!-- Message title and timestamp -->
                          <h4>
                            {{ $c->firstname }}  {{ $c->lastname }}
                            <small><i class="fa fa-clock-o"></i> {{ $c->created_at->format('d M') }} </small>
                          </h4>
                          <!-- The message -->
                          <p> {{ $c->subject }}</p>
                        </a>
                      </li><!-- end message -->
                      @endforeach
                    </ul><!-- /.menu -->
                  </li>
                  <li class="footer"><a href="{{ url('/admin/contact') }}">See All Messages</a></li>
                </ul>
              </li><!-- /.messages-menu -->

              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">110</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 110 notifications</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li><!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
    
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="{{ asset('files/user/'.Auth::user()->id.'/picture/'.Auth::user()->picture.'')}}" class="user-image" alt="" />
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header"  style="background-image: url({{ asset('files/user/'.Auth::user()->id.'/cover/'.Auth::user()->cover_image.'')}});">
                    <img src=" {{ asset('files/user/'.Auth::user()->id.'/picture/'.Auth::user()->picture.'')}}" class="img-circle" alt="" />
                    <p>
                      {{ Auth::user()->name }} - {{ Auth::user()->occupation }}
                      <small>Member since {{ Auth::user()->created_at->format('M Y') }}.</small>
                    </p>
                  </li>
                
                
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{url('/admin/account/'.Auth::user()->id.'') }}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('files/user/'.Auth::user()->id.'/picture/'.Auth::user()->picture.'')}}" class="img-thumbnail" alt="" />
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">HEADER MENU</li>
            <!-- Optionally, you can add icons to the links -->
          
               {{-- new tree view start form here --}}
               <li class="treeview {{ Request::is('about') ? 'active' : ''}}">
              <a href="#"><i class="fa fa-bookmark-o"></i> <span>about</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="{{ url('/admin/about')}}">about</a></li>
               <li><a href="{{ url('/admin/about/create')}}">create about</a></li>
              </ul>
            </li>
              {{-- tree ends here --}}



                  {{-- new tree view start form here --}}
               <li class="treeview {{ Request::is('contact') ? 'active' : ''}}">
              <a href="#"><i class="fa fa-envelope"></i> <span>contact</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="{{ url('/admin/contact')}}">contact</a></li>
              </ul>
            </li>
       {{-- tree ends here --}}




                  {{-- new tree view start form here --}}
               <li class="treeview {{ Request::is('developer') ? 'active' : ''}}">
              <a href="#"><i class="fa fa-group"></i> <span>developer</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="{{ url('/admin/developer')}}">developer</a></li>
               <li><a href="{{ url('/admin/developer/create')}}">create developer </a></li>
              </ul>
            </li>
       {{-- tree ends here --}}




                  {{-- new tree view start form here --}}
               <li class="treeview {{ Request::is('media') ? 'active' : ''}}">
              <a href="#"><i class="fa fa-camera"></i> <span>media</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="{{ url('/admin/media')}}">media</a></li>
              <li><a href="{{ url('/admin/media/create')}}">add files</a></li>
              </ul>
            </li>
       {{-- tree ends here --}}

        

                  {{-- new tree view start form here --}}
               <li class="treeview {{ Request::is('news') ? 'active' : ''}}">
              <a href="#"><i class="fa fa-rss-square"></i> <span>news</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="{{ url('/admin/news')}}">news</a></li>
               <li><a href="{{ url('/admin/news/create')}}">create news </a></li>
              </ul>
            </li>
       {{-- tree ends here --}}

                    {{-- new tree view start form here --}}
               <li class="treeview {{ Request::is('pages') ? 'active' : ''}}">
              <a href="#"><i class="fa fa-file"></i> <span>pages</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="{{ url('/admin/pages')}}">pages</a></li>
              <li><a href="{{ url('/admin/pages/create')}}">create page </a></li>
              </ul>
            </li>
       {{-- tree ends here --}}

              
                  {{-- new tree view start form here --}}
               <li class="treeview {{ Request::is('portfolio') ? 'active' : ''}}">
              <a href="#"><i class="fa fa-briefcase"></i> <span>portfolio</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="{{ url('/admin/portfolio')}}">portfolio</a></li>
              <li><a href="{{ url('/admin/portfolio/create')}}">add portfolio  </a></li>
              </ul>
            </li>
       {{-- tree ends here --}}

             {{-- new tree view start form here --}}
               <li class="treeview {{ Request::is('proposal') ? 'active' : ''}}">
              <a href="#"><i class="fa  fa-tasks"></i> <span>proposal</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="{{ url('/admin/proposal')}}">proposal</a></li>
              <li><a href="{{ url('/admin/proposal/create')}}">add proposal  </a></li>
              </ul>
            </li>
       {{-- tree ends here --}}



                  {{-- new tree view start form here --}}
               <li class="treeview {{ Request::is('services') ? 'active' : ''}}">
              <a href="#"><i class="fa  fa-cutlery"></i> <span>services</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="{{ url('/admin/services')}}">services</a></li>
              <li><a href="{{ url('/admin/services/create')}}">add services  </a></li>
              </ul>
            </li>
       {{-- tree ends here --}}

                  {{-- new tree view start form here --}}
               <li class="treeview {{ Request::is('settings') ? 'active' : ''}}">
              <a href="#"><i class="fa fa-gears"></i> <span>settings</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="{{ url('/admin/settings')}}">settings</a></li>
               <li><a href="{{ url('/admin/settings/create')}}">create settings</a></li>
              </ul>
            </li>
       {{-- tree ends here --}}

    
                  {{-- new tree view start form here --}}
               <li class="treeview {{ Request::is('sliders') ? 'active' : ''}}">
              <a href="#"><i class="fa fa-exchange"></i> <span>sliders</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="{{ url('/admin/sliders')}}">sliders</a></li>
               <li><a href="{{ url('/admin/sliders/create')}}">create sliders</a></li>
              </ul>
            </li>
       {{-- tree ends here --}}


        
     {{-- new tree view start form here --}}
               <li class="treeview {{ Request::is('support') ? 'active' : ''}}">
              <a href="#"><i class="fa fa-phone-square"></i> <span>support</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="{{ url('/admin/support')}}">support</a></li>
              </ul>
            </li>
       {{-- tree ends here --}}

           {{-- new tree view start form here --}}
               <li class="treeview {{ Request::is('testimonies') ? 'active' : ''}}">
              <a href="#"><i class="fa  fa-thumbs-up"></i> <span>testimonies</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="{{ url('/admin/testimonies')}}">testimonies</a></li>
              <li><a href="{{ url('/admin/testimonies/create')}}">add testimony </a></li>
              </ul>
            </li>
       {{-- tree ends here --}}
        

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper"  style="background-image: url({{ asset('files/user/'.Auth::user()->id.'/background/'.Auth::user()->background_img.'')}});">
        <!-- Content Header (Page header) -->

        <section class="content-header">
          <h1>
           {{-- Page Header --}}
            <small>{{-- Optional description --}}</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">


          {{-- session start here --}}
          
           @if (Session::has('success_msg'))
      <div class="col-md-8">
     <div class="alert alert-success">
        <span class="glyphicon glyphicon-check"> {{ Session::get('success_msg') }}</span>
    </div>
   </div>

    @endif

     @if (Session::has('error_msg'))
           <div class="col-md-8">
     <div class="alert alert-danger">
        <span class="glyphicon glyphicon-check"> {{ Session::get('error_msg') }}</span>
    </div>
     </div>
    @endif

    {{-- session ends here --}}

          <!-- Your Page Content Here -->
          <!-- row start here -->
          <div class="row">
           
          @yield('sidebar')
          @yield('content')
          
         </div><!-- row start here -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          <li><a href="localhost/expn"> design by expn</a></li>
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 1985 - {{ date('Y') }} {{$site->title }} .</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

          <script src=" {{ asset('backend/js/jQuery-2.1.4.min.js')}}" type="text/javascript"></script>
          <script src=" {{ asset('backend/js/bootstrap.min.js')}}" type="text/javascript"></script>
          <script src=" {{ asset('backend/js/app.min.js')}}" type="text/javascript"></script>
          <script src=" {{ asset('backend/js/wys.all.min.js')}}" type="text/javascript"></script>
            <script src=" {{ asset('backend/js/app.js')}}" type="text/javascript"></script>
          <script src="{{ asset('backend/js/pikaday.js') }}"></script>


    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
          <script>
      $(function () {
        //Add text editor
        $("#news").wysihtml5();
      });
    </script>


          
  </body>
</html>
