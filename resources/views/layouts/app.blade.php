<!DOCTYPE html>
<html>
<head>
    <title>TMS</title>
    <link rel="shortcut icon" href="{{ asset('public/favicon.jpg') }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
    <script src="{{asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('home')}}" class="logo">
      <!-- mini logo for siiiidebar mini 50x50 pixels -->
      <span class="logo-mini">{{Auth::user()->name}}</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Dashboard</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
                      <ul class="dropdown-menu">
                <ul class="menu">
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(Auth::user()->image == "")
              <img src="{{asset('public/images/avatar.png')}}" class="user-image">
              @else
              <img src="{{asset('public/images/'.Auth::user()->image)}}" class="user-image">
              @endif
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                  @if(Auth::user()->image =='')
                      <img src="{{asset('public/images/avatar.png')}}" class="img-circle">
                  @else
                      <img src="{{asset('public/images/'.Auth::user()->image)}}" class="img-circle">
                  @endif
                <p>
                 <br> {{Auth::user()->name}}
                  <small>Member since {{Auth::user()->created_at->diffForHumans()}}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('profiles',Auth::user()->id)}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{url('logout')}}" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(Auth::user()->image =='')
              <img src="{{asset('public/images/avatar.png')}}" class="img-circle">
              @else
              <img src="{{asset('public/images/'.Auth::user()->image)}}" class="img-circle">
              @endif
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
        </div>
      </div>
        <ul class="sidebar-menu" data-widget="tree">
            @can('create', App\User::class)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>User</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('users/create')}}"><i class="fa fa-user-plus"></i> Create User</a></li>
                        @endcan
                        @can('viewAny', App\User::class)
                            <li>
                                <a href="{{url('users')}}"><i class="fa fa-users"></i> View Registered Users</a></li>
                    </ul>
            @endcan
            @if(Auth::user()->hasRole('super admin'))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Roles</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('roles')}}"><i class="fa fa-user-o"></i>Users</a></li>
                    <li><a href="{{url('permissions')}}"><img src="{{url('public/roles.svg')}}" height="21" width="21">Roles</a></li>
                </ul>
            </li>
                @endif
            @can('create', App\Team::class)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>Team</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('teams/create')}}"><img src="{{asset('public/teams.svg')}}" height="21" width="21">Create Team</a></li>
                        @endcan
                        @can('viewAny', App\Team::class)
                            <li><a href="{{url('teams')}}"> <img src="{{asset('public/team.svg')}}" height="21" width="21">Teams</a></li>
                        @endcan
                    </ul>
                </li>
                @if(!Auth::user()->hasRole('member'))
                @can('viewAny', App\Project::class)
                    <li><a href="{{url('projects')}}"><i style="font-size:15px" class="fa fa-check"></i><span>Projects</span></a></li>
                @endcan
                <li><a href="{{url('tasks')}}"><i class="glyphicon glyphicon-tasks"></i> <span>Tasks</span></a></li>
                @endif
                @yield('sidebar')
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

        <section class="content">
  @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>© 2017 - <?php echo date("Y"); ?> Copyright. <a href="https://www.datatrixsoft.com">DatatrixSoft</a>.</strong> All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
    $(function () {
        $(".select2").select2();
        $(".btn-success").click(function(){
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $("body").on("click",".btn-danger",function(){
            $(this).parents(".control-group").remove();
        });

    })
</script>
</body>

</html>
