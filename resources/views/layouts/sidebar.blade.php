

  <!-- sidebar: style can be found in sidebar.less -->

  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
          <div class="pull-left image">
            <img src="{{ asset('logo.png') }}" width="100">
          </div>
        </a>
        <!-- Divider -->

        <hr class="sidebar-divider my-3">
<div class="text-center">
  <div class="user-pic">
   <img class="img-responsive img-rounded" src="{{ asset('logobaru.jpg') }}"
     alt="User picture" width="50">
  </div><br>
  <div class="user-info">
   <span class="user-name" style="color: white; font-family: Verdana; font-weight: bold">{{auth()->user()->nama}}</span><br>
   <span class="user-name" style="color: white; font-family: Verdana; font-weight: bold">{{auth()->user()->nik_id}}</span><br>
  <span class="user-role" style="color: white; font-family: Verdana;">{{auth()->user()->role}}</span>

  </div>
</div>

  <hr class="sidebar-divider my-0">
<!-- Nav Item - Dashboard -->
    @if(auth()->user()->role=="admin")
        <li class="nav-item active">
            <a class="nav-link" href="{{url('/home')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endif
      @if(auth()->user()->role=="user")
        <li class="nav-item active">
            <a class="nav-link" href="{{url('/home1')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endif
      @if(auth()->user()->role=="leader")
        <li class="nav-item active">
            <a class="nav-link" href="{{url('/home2')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
      @endif

        <!-- Divider -->


        <!-- Heading -->
        @if(auth()->user()->role=="admin")
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Admin Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-folder"></i>
                <span>Master Data:</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <ul class="treeview-menu">
                    <h6>Custom Utilities:</h6>
                    <li><a href="{{url('kuadran.index')}}" class="collapse-item"><i class="fa fa-circle-o"></i> Kuadran</a></li>
                    <li><a href="{{url('kpi.index')}}" class="collapse-item"><i class="fa fa-circle-o"></i> KPI</a></li>
                  </ul>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa fa-laptop"></i>
                <span>Master Employee</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <ul class="treeview-menu">
                        <h6 >Custom Utilities:</h6>
                      <li><a href="{{url('employee.index')}}" class="collapse-item"><i class="fa fa-circle-o"></i> Employee</a></li>
                      <!--<li><a href="{{url('hakakses.index')}}" class="collapse-item"><i class="fa fa-circle-o"></i> Hak Akses</a></li>-->
                    </ul>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-folder"></i>
                <span>User Management:</span>
            </a>
            <div id="collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <ul class="treeview-menu">
                    <h6>Custom Utilities:</h6>
                    <li><a href="{{url('create_user.index')}}" class="collapse-item"><i class="fa fa-circle-o"></i> Create User</a></li>

                  </ul>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Admin Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Report</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <ul class="treeview-menu">

                    <h6>Monitoring Screens:</h6>
                    <li><a href="{{url('repotkpi.index')}}" class="collapse-item"><i class="fa fa-circle-o"></i> KPI</a></li>
                    <li><a href="#" class="collapse-item"><i class="fa fa-circle-o"></i> Employee</a></li>

                  </ul>
                </div>
            </div>
        </li>
        @endif

      @if(auth()->user()->role=="user")
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          User Interface
        </div>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#userUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa fa-book"></i>
                <span>Target Kerja </span>
            </a>
            <div id="userUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <ul class="treeview-menu">
                        <h6 >Custom Utilities:</h6>
                      <li><a href="{{ route('user.target_kerja', Auth::id()) }}" class="collapse-item"><i  class="fa fa-circle-o"></i> Setting Kerja</a></li>
                      <li><a href="{{ route('user.nilai_target', Auth::id()) }}" class="collapse-item"><i class="fa fa-circle-o"></i> Validasi Kerja</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          User Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#userPages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Report Target</span>
            </a>
            <div id="userPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <ul class="treeview-menu">

                    <h6>Monitoring Screens:</h6>
                    <li><a href="{{url('user.repotuser.index')}}" class="collapse-item"><i class="fa fa-circle-o"></i> Nilai Target</a></li>

                  </ul>
                </div>
            </div>
        </li>
        @endif

      @if(auth()->user()->role=="leader")
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Leader Interface
        </div>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#leaderUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa fa-book"></i>
                <span>Target Kerja </span>
            </a>
            <div id="leaderUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <ul class="treeview-menu">
                        <h6 >Custom Utilities:</h6>

                      <li><a href="{{url('leader.approv.index')}}" class="collapse-item"><i class="fa fa-circle-o"></i>Approval</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Leader Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#leaderPages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Report Target</span>
            </a>
            <div id="leaderPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <ul class="treeview-menu">

                    <h6>Monitoring Screens:</h6>
                    <li><a href="{{url('leader.nilai_staff.index')}}" class="collapse-item"><i class="fa fa-circle-o"></i> Nilai Staff </a></li>
                  </ul>
                </div>
            </div>
        </li>
        @endif

        <!-- Nav Item - Tables -->
        <li class="nav-item" >
            <a class="nav-link" href="{{ url()->route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt "></i>
                <span onclick="return confirm('Apakah anda yakin ingin Log Out ?')">Log Out</span></a>
                 <form id="logout-form" action="{{ route('logout') }}"  method="POST" class="d-none">
                    @csrf
                </form>

        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->


    </ul>
  </div>
    <!-- End of Sidebar -->

  <!-- /.sidebar -->
