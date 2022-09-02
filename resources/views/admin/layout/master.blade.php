<html lang="en">
<head>
    <meta charset="utf-8">
    <title> {{$title ?? ''}} - {{ config('app.name') }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- App css -->
    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="light-style">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.css' rel='stylesheet' />
    {{--    <link href="{{asset('css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style">--}}
    {{--    <link href="assets/css/app-creative.min.css" rel="stylesheet" type="text/css" id="light-style">--}}
    {{--    <link href="assets/css/app-creative-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" disabled="disabled">--}}
    <style>
        *{
            padding:0;
            margin:0;
            border-box:none
        }
        body{
            min-height:1000px;
        }
        .pagination{
            margin:0 auto
        }
    </style>
</head>

<body
      data-layout-config="{&quot;leftSideBarTheme&quot;:&quot;dark&quot;,&quot;layoutBoxed&quot;:false, &quot;leftSidebarCondensed&quot;:false, &quot;leftSidebarScrollable&quot;:false,&quot;darkMode&quot;:false, &quot;showRightSidebarOnStart&quot;: true}"
      data-leftbar-theme="dark" >
<!-- Begin page -->
<div class="wrapper mm-active">
    <!-- ========== Left Sidebar Start ========== -->
@include('admin.layout.sidebar')
<!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page ">
        <div class="content">
            <!-- Topbar Start -->
        @include('admin.layout.topbar')
        <!-- end Topbar -->

            <!-- Start Content-->
            <div class="container-fluid ">

                <!-- start page title -->
                @yield('content')
                <!-- end page title -->


                <!-- end row -->


                <!-- end row -->


                <!-- end row -->

            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <!-- Footer Start -->
    @include('admin.layout.footer')
    <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->

<!-- /Right-bar -->

<!-- bundle -->
{{--<script src="assets/js/vendor.min.js"></script>--}}
<script src="{{asset('js/vendor.min.js')}}"></script>
<script src="{{asset('js/app.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.js'></script>

@stack('scripts')
</body>
</html>
