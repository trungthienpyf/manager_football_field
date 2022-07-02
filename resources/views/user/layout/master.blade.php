<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Blog - Get Shit Done Kit Pro by Creative Tim</title>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta name="viewport" content="width=device-width">


    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/index_app.css')}}" rel="stylesheet">
    <link href="{{asset('css/gsdk.css')}}" rel="stylesheet">
    <link href="{{asset('css/examples.css')}}" rel="stylesheet">


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Grand+Hotel|Open+Sans:400,300" rel="stylesheet" type="text/css">

    <link href="{{asset('css/pe-icon-7-stroke.css')}}" rel="stylesheet">


</head>

<body class="blog-page" style="">

@include('user.layout.topbar')


<div class="wrapper">


    <!-- section -->


    <div class="section">
        @yield('search')
        @yield('content')

    </div>

    <!-- section -->

    @include('user.layout.footer')


</div> <!-- wrapper -->

<!--  jQuery and Bootstrap core files    -->



<script src="{{asset('js/jquery.js')}}" type="text/javascript"></script>


<script src="{{asset('js/jquery-ui.custom.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

<script src="{{asset('js/jquery.flexisel.js')}}" type="text/javascript"></script>
{{--<script src="{{asset('js/bootstrap-datepicker.js')}}" type="text/javascript"></script>--}}
<script src="{{asset('js/jquery.tagsinput.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap-select.js')}}" type="text/javascript"></script>



<!--  Plugins -->
<script src="../assets/js/gsdk-checkbox.js"></script>
<script src="../assets/js/gsdk-morphing.js"></script>
<script src="../assets/js/gsdk-radio.js"></script>
<script src="../assets/js/gsdk-bootstrapswitch.js"></script>


<script src="../assets/js/chartist.min.js"></script>



<!--  Get Shit Done Kit PRO Core javascript 	 -->
<script src="../assets/js/get-shit-done.js"></script>



@stack('scripts')
</body>
</html>
