


<header class="main-header">
  <style media="screen">
    nav{
      top: 0px;
      display: flex;
      justify-content: space-between;
    }
#log{
  background-image: url('resources/css/img/logo.png');
}


  </style>
  <!-- Topbar Navbar -->
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">

                <div class="nav-item theme-logo">
                  <a>
                    <img id="log"  src="resources/css/img/logo.png" width="50px" height="50px"> ASDP Indonesia
                  </a>
                </div>


          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">User</span>
              <img class="img-profile rounded-circle" src="css/img/orang.png">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
              </a>
              <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
              </a>
              <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
              </a>
          </div>
      </li>

    </div>


  </nav>
<!-- End of Topbar -->
</header>
