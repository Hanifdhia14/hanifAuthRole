<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AKIO</title>
  <link rel="shortcut icon" href="http://156.67.218.233/superior/assets/images/logobaru2.jpg">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">


</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      @include('layouts.header')
      <!-- Main Content -->
      <div class="container-fluid">
          <!-- Content Wrapper. Contains page content -->
          @yield('content')

          <div class="container-fluid">
            @include('layouts.footer')
          </div>

      </div>
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Core plugin JavaScript-->
    <script src="sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="sbadmin2/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="sbadmin2/vendor/chart.js/Chart.min.js"></script>

    <!-- Page DataTable -->
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

      <script type="text/javascript">
      $(document).ready(function() {
    $('#example').DataTable();
} );
      </script>

    <!-- Datepicker custom scripts -->
    <script src="sbadmin2/js/demo/chart-area-demo.js"></script>
    <script src="sbadmin2/js/demo/chart-pie-demo.js"></script>
    <script src="/datepicker/js/" charset="utf-8"></script>
    <script>
    $(function() {
    $( "#kuadran","#kpi","#tgl_q1", "#tgl_q2", "#tgl_q3","#tgl_q4","#tgl_target_semester1", "#tgl_target_semester2","#tgl_target_tahun_unit" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
    });
    </script>



</body>
</html>
