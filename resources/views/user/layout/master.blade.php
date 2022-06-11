<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- App css -->

    <link href="{{asset('css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="light-style">




{{--        <link href="{{asset('css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style">--}}
    {{--    <link href="assets/css/app-creative.min.css" rel="stylesheet" type="text/css" id="light-style">--}}
    {{--    <link href="assets/css/app-creative-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" disabled="disabled">--}}
    <style>
        body {
            font-family: Montserrat, sans-serif;
        }
        .navbar-brand {
            background-image: url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgZGF0YS1uYW1lPSJMYXllciAxIiBpZD0iTGF5ZXJfMSIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZmlsbD0id2hpdGUiIGQ9Ik01MDQuMzMsNDQ5Yy0xLjc3LTYuOC00NC43My0xNjcuNTItMTY0LjIxLTIzMi45MS00NC42NS0yNC40My05Ni4yLTQxLjQ1LTE0Ni01Ny45MUMxMTUsMTMyLjA4LDQwLjI5LDEwNy40MiwyNiw1OS42NWE2LjIyLDYuMjIsMCwwLDAtMTIsLjI0Yy0uOSwzLjUtMjEuNTMsODYuMzgsMTUuNjUsMTM3Ljk0LDE2LjgsMjMuMjksNDIuNjYsMzYuMzMsNzYuODUsMzguNzUsMi44OC4yLDUuNjEuNDIsOC40NC42Myw0LjE1LDE1LjE2LDIyLjE0LDYwLjYzLDg5LjYxLDY2LDEyLjI1LDEsMjQuMTcsMi4yNSwzNS45LDMuNjUsNC45MiwxNC4xNiwyNi44NCw1Ny42LDExNCw3My4wNyw2Mi43OCwxMS4xNCwxMTQsMzEuMTgsMTMxLjIxLDUxLjI1LDQuMzksMTIuNjgsNi41MywyMC42Miw2LjYzLDIxYTYuMiw2LjIsMCwwLDAsNiw0LjY1LDYuNTYsNi41NiwwLDAsMCwxLjU3LS4yQTYuMjMsNi4yMywwLDAsMCw1MDQuMzMsNDQ5Wk0zOS43NCwxOTAuNThDMTYsMTU3LjczLDE4Ljc1LDEwOC41MiwyMi41NSw4MS44M2MyNi4wNyw0MS40Myw5Mi4zNCw2My4zMSwxNjcuNjIsODguMTYsNDkuMzIsMTYuMjksMTAwLjMzLDMzLjEzLDE0NCw1NywzMS40NiwxNy4yMSw1Ny41Myw0MS44LDc4LjgsNjguNDRDMzcyLDI2OS4zOCwzMDUuNTgsMjM4LjIyLDEwNy4zNSwyMjQuMTgsNzcsMjIyLDU0LjI4LDIxMC43MywzOS43NCwxOTAuNThabTg4LjM2LDQ3LjY0YzIwMi4zOCwxNi40MiwyNTQuMzYsNTEuNDYsMjkyLjY0LDc3LjI4LDQuMzYsMi45NSw4LjU4LDUuOCwxMi44NCw4LjUxLDUuMDksNy43Nyw5LjgxLDE1LjU1LDE0LjE4LDIzLjIyLTM4LjM3LTE5Ljc4LTExNS42OS00MS40Mi0yMDEuMTktNTIuMTUtLjE0LDAtLjI5LDAtLjQ0LS4wNi0xMy4zOS0xLjY3LTI2Ljk0LTMuMTMtNDAuNjEtNC4yMkMxNTAuNDksMjg2LjQzLDEzMy4yMSwyNTMuNTMsMTI4LjEsMjM4LjIyWk0zNTYuNjMsMzY3LjY4Yy03MC44My0xMi41Ny05NC41MS00My43OS0xMDItNTkuMTEsMTEwLjI0LDE0Ljg3LDE5Mi43Nyw0Ni4yNywyMDUuNjEsNjIsNi43NSwxMy41NSwxMi4yOSwyNi4yNSwxNi44MSwzNy41QzQ1MS4xLDM5MS40OSw0MDcuOTQsMzc2Ljc4LDM1Ni42MywzNjcuNjhaIi8+PC9zdmc+");
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            width: 48px;
            height: 48px;
        }

        .navbar-nav .nav-item:hover {
            background-color: rgba(180, 190, 203, 0.4);
        }

    </style>
</head>

<body >
<!-- Begin page -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" >
            <ul class="navbar-nav ms-md-auto gap-2">
                <li class="nav-item rounded">
                    <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-house-fill me-2"></i>Home</a>
                </li>
                <li class="nav-item rounded">
                    <a class="nav-link" href="#"><i class="bi bi-people-fill me-2"></i>About</a>
                </li>
                <li class="nav-item rounded">
                    <a class="nav-link" href="#"><i class="bi bi-telephone-fill me-2"></i>Contact</a>
                </li>
                <li class="nav-item dropdown rounded">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill me-2"></i>Profile</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Account</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="content-page">
    <div class="container-fluid">
        @yield('content')
    </div>
</div>
<div class="bg-dark text-white">
    <p class="text-center p-2 m-0">Footer Content</p>
</div>
<script src="{{asset('js/vendor.min.js')}}"></script>
<script src="{{asset('js/app.min.js')}}"></script>


@stack('scripts')
</body>
</html>
