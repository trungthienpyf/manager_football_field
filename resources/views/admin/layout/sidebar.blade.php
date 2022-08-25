<div class="left-side-menu mm-show">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                    </span>
    </a>

    <div class="h-100 mm-active" id="left-side-menu-container" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;">
                        <div class="simplebar-content" style="padding: 0px;">

                            <!--- Sidemenu -->
                            <ul class="metismenu side-nav mm-show">
                                <li class="side-nav-title side-nav-item">Navigation</li>

                                <li class="side-nav-item">
                                    <a href="{{route('admin.index')}}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>

                                        <span> Trang Chủ </span>
                                    </a>

                                </li>
                                <li class="side-nav-item">
                                    <a href="javascript: void(0);" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span> Hóa Đơn </span>
                                    </a>
                                    <ul class="side-nav-second-level mm-collapse" aria-expanded="false">
                                        <li>
                                            <a href="{{route('admin.booking.index')}}">Đơn chờ duyệt</a>

                                        </li>
                                        <li>
                                            <a href="{{route('admin.booking.index')}}?status=1">Đơn đã duyệt</a>

                                        </li>
                                        <li>
                                            <a href="{{route('admin.booking.index')}}?status=2">Đơn đã hủy</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="side-nav-item">
                                    <a href="javascript: void(0);" class="side-nav-link">
                                        <i class="uil-home-alt"></i>

                                        <span> Khu Vực </span>
                                    </a>
                                    <ul class="side-nav-second-level mm-collapse" aria-expanded="false">
                                        <li>
                                            <a href="{{route('admin.area.index')}}">Xem</a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.area.create')}}">Thêm</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="side-nav-item">
                                    <a href="javascript: void(0);" class="side-nav-link">
                                        <i class="uil-home-alt"></i>

                                        <span> Sân </span>
                                    </a>
                                    <ul class="side-nav-second-level mm-collapse" aria-expanded="false">
                                        <li>
                                            <a href="{{route('admin.pitch.index')}}">Xem</a>

                                        </li><li>
                                            <a href="{{route('admin.pitch.create')}}">Thêm sân</a>

                                        </li>

                                    </ul>
                                </li>


                            </ul>

                            <!-- Help Box -->

                            <!-- end Help Box -->
                            <!-- End Sidebar -->

                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 60px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
            <div class="simplebar-scrollbar"
                 style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
        </div>
    </div>
    <!-- Sidebar -left -->

</div>
