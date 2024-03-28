<!DOCTYPE html>
<html lang="en">
@include('admin.layout.partials.header')

<body class="">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                {{-- <li class="d-none d-sm-block">
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="جست و جو...">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fe-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>F
                        </form>
                    </li> --}}

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        {{-- <img src="assets/images/users/user-1.jpg" alt="تصویر کاربر" class="rounded-circle"> --}}
                        <span class="pro-user-name ml-1">
                            {{ auth()->user()->name }} <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">


                        <!-- item-->
                        <a href="{{ route('profile.edit') }}" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>حساب کاربری</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('post')
                            <button class="dropdown-item notify-item" type="submit">
                                <i class="fe-log-out"></i>
                                <span>خروج</span>
                            </button>
                        </form>
                        {{-- <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>خروج</span>
                            </a> --}}

                    </div>
                </li>

                {{-- <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                            <i class="fe-settings noti-icon"></i>
                        </a>
                    </li> --}}


            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                {{-- <a href="index.html" class="logo text-center">
                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="تصویر" height="16">
                            <!-- <span class="logo-lg-text-light">Xeria</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">X</span> -->
                            <img src="assets/images/logo-sm.png" alt="تصویر" height="24">
                        </span>
                    </a> --}}
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <h4 class="page-title-main">سیستم مدیریت کلینیک دندان پزشکی</h4>
                </li>

            </ul>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            {{-- <div class="slimscroll-menu"> --}}



            <!--- Sidemenu -->
            @include('admin.layout.partials.sidebar')
            <!-- End Sidebar -->

            {{-- </div> --}}
            {{-- <div class="clearfix"></div> --}}
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    @yield('content')
                </div> <!-- container-fluid -->

            </div> <!-- content -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            تمام حقوق این نرم افزار برای کلینیک <a href="{{ 'erfandentalclinic.com' }}">عرفان</a> محفوظ
                            می
                            باشد
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript:void(0);">درباره ما</a>
                                <a href="javascript:void(0);">راهنما</a>
                                <a href="javascript:void(0);">تماس با ما</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->



    {{-- @include('sweetalert::alert') --}}
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    @include('admin.layout.partials.footer')

</body>

</html>
