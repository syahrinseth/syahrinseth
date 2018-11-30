<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/paper_img/s-logo-blue.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Syahrin Seth - @yield('title')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="/bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="/assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="/assets/css/demo.css" rel="stylesheet" />
    <link href="/assets/css/examples.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="/css/custom.css" rel="stylesheet"/>
    <link href="/assets/css/all.css" rel="stylesheet"/>

    <!--     Data Tables     -->
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.min.css"/>
    <style>
        .cover-img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 40%;
        }
    </style>

</head>
<body>

    @include('Layouts.nav')

    @yield('content')

    @include('Layouts.footer')


</body>

<script src="/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="/assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

<script src="/bootstrap3/js/bootstrap.js" type="text/javascript"></script>

<!--  Plugins -->
<script src="/assets/js/ct-paper-checkbox.js"></script>
<script src="/assets/js/ct-paper-radio.js"></script>
<script src="/assets/js/bootstrap-select.js"></script>
<script src="/assets/js/bootstrap-datepicker.js"></script>

<script src="/assets/js/ct-paper.js"></script>

<script type="text/javascript" src="/DataTables/datatables.min.js"></script>


</html>
