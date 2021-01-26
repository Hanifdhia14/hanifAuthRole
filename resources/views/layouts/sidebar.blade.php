<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3"> Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{url('/home')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
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
                    <li><a href="{{url('tipe_penilaian.index')}}" class="collapse-item"><i class="fa fa-circle-o"></i> Tipe Penilaian</a></li>
                    <li><a href="{{url('satuan.index')}}" class="collapse-item"><i class="fa fa-circle-o"></i> Satuan</a></li>
                    <li><a href="{{url('nilai_maksimal.index')}}" class="collapse-item"><i class="fa fa-circle-o"></i> Nilai Maksimal</a></li>
                    <li><a href="{{url('document.index')}}" class="collapse-item"><i class="fa fa-circle-o"></i> Dokument</a></li>
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
                      <li><a href="{{url('hakakses.index')}}" class="collapse-item"><i class="fa fa-circle-o"></i> Hak Akses</a></li>
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
                    <li><a href="#" class="collapse-item"><i class="fa fa-circle-o"></i> KPI</a></li>
                    <li><a href="#" class="collapse-item"><i class="fa fa-circle-o"></i> Employee</a></li>

                  </ul>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>





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
                      <li><a href="{{url('user.target_kerja.index')}}" class="collapse-item"><i  class="fa fa-circle-o"></i> Setting Kerja</a></li>
                      <li><a href="{{url('user.nilai_target.index')}}" class="collapse-item"><i class="fa fa-circle-o"></i> Validasi Kerja</a></li>
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
                    <li><a href="#" class="collapse-item"><i class="fa fa-circle-o"></i>#</a></li>

                  </ul>
                </div>
            </div>
        </li>



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
                      <li><a href="#" class="collapse-item"><i  class="fa fa-circle-o"></i> Setting Kerja</a></li>
                      <li><a href="#" class="collapse-item"><i class="fa fa-circle-o"></i> Validasi Kerja</a></li>
                      <li><a href="#" class="collapse-item"><i class="fa fa-circle-o"></i> Approve Set Kerja</a></li>
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
                    <li><a href="#" class="collapse-item"><i class="fa fa-circle-o"></i> Nilai Target</a></li>
                    <li><a href="#" class="collapse-item"><i class="fa fa-circle-o"></i>#</a></li>

                  </ul>
                </div>
            </div>
        </li>















        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout')}}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt "></i>
                <span>Log Out</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->

  <div class="d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle" ></button>
  </div>


    </ul>
    <!-- End of Sidebar -->
  </section>
  <!-- /.sidebar -->
</aside>
