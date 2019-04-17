<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/paper_img/s-logo-blue.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Syahrin Seth Contact Form</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="/bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="/assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="/assets/css/demo.css" rel="stylesheet" />
    <link href="/assets/css/examples.css" rel="stylesheet" />
    <link href="/assets/css/all.css" rel="stylesheet"/>



    <!-- Custom CSS -->
    <link href="/css/custom.css" rel="stylesheet"/>
    <link href="/assets/css/all.css" rel="stylesheet"/>

    <!--     Data Tables     -->
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.min.css"/>

    <!-- Portfolio UI CSS File -->
    <link rel="stylesheet" href="/css/basscss.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <style>
        .cover-img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Contact Form</h1>
                <div class="card">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <br>
                        <p>{{$contactForm->name}}</p>
                    </div>
                    <div class="form-group">
                        <label for="name">Email:</label>
                        <br>
                        <p>{{$contactForm->email}}</p>
                    </div>
                    <div class="form-group">
                        <label for="name">Message:</label>
                        <br>
                        <p>{{$contactForm->message}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

<!-- Portfolio UI JS File -->
<script src="/js/index.js"></script>


<script>
    var pre = document.querySelectorAll("pre");
    for(i=0;pre.length > 0;i++){
        pre[i].classList.add("prettyprint");
    }
</script>

<!-- Code Syntex highlight -->
<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>

</html>
