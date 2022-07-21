<html lang="en"><head>
    <meta charset="utf-8">
    <title>Register - Sign Up | {{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="light-style">
    <link href="{{asset('css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" disabled="disabled">


</head>

<body class="authentication-bg" data-layout-config="{&quot;darkMode&quot;:false}">

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card">
                    <!-- Logo-->
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="index.html">
                            <span><img src="assets/images/logo.png" alt="" height="18"></span>
                        </a>
                    </div>

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Free Sign Up</h4>
                            <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute </p>
                        </div>

                        <form action="{{route('admin.signup')}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input class="form-control" type="text" id="fullname" name="name" placeholder="Enter your name" required="">
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input class="form-control" type="email" id="email"  name="email" required="" placeholder="Enter your email">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control"  name="password" placeholder="Enter your password">
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gender">Giới tính</label>
                                <input type="radio" name="gender" value="1" checked>Nam
                                <input type="radio" name="gender" value="0">Nữ
                            </div>
                            <div class="form-group">
                                <label for="level">Chức vụ</label>
                                <input type="radio" name="level" value="1" checked>Admin

                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary" type="submit"> Sign Up </button>
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->


                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->


<!-- bundle -->
<script src="{{asset('js/vendor.min.js')}}"></script>
<script src="{{asset('js/app.min.js')}}"></script>



</body></html>
