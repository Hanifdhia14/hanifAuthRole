<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

</head>
<body>
    <div id="app">
        <main class="py-1">
          <div id="wrapper">

              <!-- Left side column. contains the logo and sidebar -->
            @include('layouts.sidebar')


                  <div class="container-fluid">
                      <!-- Content Wrapper. Contains page content -->
                      @yield('content')

                      <div class="footer">
                          @include('layouts.footer')
                      </div>

                  </div>

          </div>

        </main>

    </div>
    <script src="sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="sbadmin2/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="sbadmin2/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="sbadmin2/js/demo/chart-area-demo.js"></script>
    <script src="sbadmin2/js/demo/chart-pie-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        "kuadran": "data/arrays.txt"
        } );
      } );

    </script>
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
