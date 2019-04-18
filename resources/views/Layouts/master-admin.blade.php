<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../admin-assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/paper_img/s-logo-blue.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="description" content="Syahrin Seth is a Malaysian Software Engineer and a Martial Artist who create web and mobile application to life.">
  <meta name="keywords" content="web development, website, code, software engineer, development, syahrinseth, syahrin seth, programmer, mobile development, mobile apps, web apps, martial arts, travel, freelance">
  <title>
    Admin - @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="/admin-assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/admin-assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/admin-assets/demo/demo.css" rel="stylesheet" />

<!-- Font Awesome file -->
  <link href="/assets/css/all.css" rel="stylesheet"/>

  <!-- HTML editor -->
  <link href="/assets/dist/summernote-lite.css" rel="stylesheet"/>
  <!-- <link rel="stylesheet" href=""> -->

  <!--     Data Tables     -->
  <!-- <link rel="stylesheet" type="text/css" href="/DataTables/datatables.min.css"/> -->
  @yield('custom-css')
</head>

<body class="">

  <div class="wrapper ">
    @include('Layouts.sidebar-admin')
    <div class="main-panel">
      @include('Layouts.nav-admin')

      @yield('content')

      @include('Layouts.footer-admin')
    </div>
    <!-- end main panel -->
  </div>
    <!-- end wrapper -->
  <!--   Core JS Files   -->
  <script src="/admin-assets/js/core/jquery.min.js"></script>
  <script src="/admin-assets/js/core/popper.min.js"></script>
  <script src="/admin-assets/js/core/bootstrap.min.js"></script>
  <script src="/admin-assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="/admin-assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="/admin-assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/admin-assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="/admin-assets/demo/demo.js"></script>
  <!-- HTML text editor -->
  <script src="/assets/dist/summernote-lite.js" type="text/javascript"></script>

  <script type="text/javascript" src="/DataTables/datatables.min.js"></script>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in admin-assets/admin-assets-for-demo/js/demo.js
      demo.initChartsPages();
    });

  </script>
  @yield('custom-javascript')
</body>

</html>
