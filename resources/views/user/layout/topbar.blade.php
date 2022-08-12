<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="{{route('index')}}">{{config('app.name')}}</a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="components.html">
                        Zalo
                    </a>
                </li> <li>
                    <a href="components.html">
                        Phone
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        More
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-with-icons">
                        <li>
                            <a href="contact-us.html">
                                <i class="pe-7s-mail-open-file"></i> Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="about-us.html">
                                <i class="pe-7s-info"></i> About Us
                            </a>
                        </li>
                        <li>
                            <a href="pricing.html">
                                <i class="pe-7s-cash"></i> Pricing Page
                            </a>
                        </li>
                        <li>
                            <a href="sidebar.html">
                                <i class="pe-7s-menu"></i> Sidebar Menu
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="pe-7s-gift"></i> More (soon)
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
