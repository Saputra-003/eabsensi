<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>


    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/datatables_basic.js') }}"></script>
    {{-- <script src="{{ asset('global_assets/js/demo_pages/dashboard.js') }}"></script> --}}
    <!-- /theme JS files -->

    <!-- Extra -->
    @yield('script')
    <!-- /Extra -->

</head>

<body>

    <!-- Main navbar -->

    <div class="navbar navbar-expand-md navbar-light">

        <!-- Header with logos -->
        <div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
            <div class="navbar-brand navbar-brand-md">
                <a href="{{ url('home') }}" class="d-inline-block">
                    {{-- <img src="{{ asset('global_assets/images/logo_light.png') }}" alt=""> --}}
                </a>
            </div>

            <div class="navbar-brand navbar-brand-xs">
                <a href="{{ url('home') }}" class="d-inline-block">
                    <img src="{{ asset('global_assets/images/logo_icon_light.png') }}" alt="">
                </a>
            </div>
        </div>
        <!-- /header with logos -->


        <!-- Mobile controls -->
        <div class="d-flex flex-1 d-md-none">
            <div class="navbar-brand mr-auto">
                <a href="{{ url('home') }}" class="d-inline-block">
                    <img src="{{ asset('global_assets/images/logo_dark.png') }}" alt="">
                </a>
            </div>
            @auth
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>

            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
            @endauth
        </div>
        <!-- /mobile controls -->

        @auth
        <!-- Navbar content -->
        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                        <i class="icon-paragraph-justify3"></i>
                    </a>
                </li>
            </ul>

            <span class="ml-md-3 mr-md-auto"></span>

            <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle"
                        data-toggle="dropdown">
                        <img src="{{ Auth::user()->profile->getPhoto() }}" class="rounded-circle mr-2" height="34"
                            alt="">
                        <span>
                            {{ Auth::user()->name }}
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('profile.index') }}" class="dropdown-item"><i class="icon-user-plus"></i> My
                            profile</a>
                        <a href="{{ route('changepassword') }}" class="dropdown-item"><i class="icon-lock5"></i> Change Password</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="dropdown-item"><i
                                class="icon-switch2"></i> {{ __('Logout') }}</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        @endauth
        <!-- /navbar content -->

    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        @auth
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                Navigation
                <a href="#" class="sidebar-mobile-expand">
                    <i class="icon-screen-full"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>
            <!-- /sidebar mobile toggler -->


            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-user">
                    <div class="card-body">
                        <div class="media">
                            <div class="mr-3">
                                <a href="#"><img src="{{ Auth::user()->profile->getPhoto() }}" width="38" height="38"
                                        class="rounded-circle" alt=""></a>
                            </div>

                            <div class="media-body">
                                <div class="media-title font-weight-semibold">{{ auth()->user()->name }}</div>
                                <div class="font-size-xs opacity-50">
                                    <i class="icon-pin font-size-sm"></i> &nbsp;Politeknik Aceh
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="card card-sidebar-mobile">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">

                        <!-- Main -->
                        <li class="nav-item-header">
                            <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu"
                                title="Main"></i>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
                                <i class="icon-home4"></i>
                                <span>
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-stack"></i> <span>Data</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Data">
                                <li class="nav-item"><a href="{{ route('prodi.index') }}" class="nav-link">
                                        Prodi
                                    </a>
                                </li>
                                <li class="nav-item"><a href="{{ route('kelas.index') }}" class="nav-link">
                                        Kelas
                                    </a>
                                </li>
                                <li class="nav-item"><a href="{{ route('mahasiswa.index') }}"
                                        class="nav-link {{ Request::is('mahasiswa') ? 'active' : '' }}">
                                        Mahasiswa
                                    </a>
                                </li>
                                <li class="nav-item"><a href="" class="nav-link">
                                        Mata Kuliah
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-stack"></i> <span>Mahasiswa</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Data-Mahasiswa">
                                <li class="nav-item"><a href="" class="nav-link">
                                        Akuntansi
                                    </a>
                                </li>
                                <li class="nav-item"><a href="" class="nav-link">
                                        Akuntansi Publik
                                    </a>
                                </li>
                                <li class="nav-item"><a href="" class="nav-link">
                                        Mekatronika
                                    </a>
                                </li>
                                <li class="nav-item"><a href="" class="nav-link">
                                        Teknologi Elektronika
                                    </a>
                                </li>
                                <li class="nav-item"><a href="" class="nav-link">
                                        Teknologi Informasi
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- /main -->

                    </ul>
                </div>
                <!-- /main navigation -->

            </div>
            <!-- /sidebar content -->

        </div>
        @endauth
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            @auth
            <div class="page-header">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">
                                @yield('page_title')</h4>
                        {{-- <a href="#" class="header-elements-toggle text-default d-md-none"><i
                                class="icon-more"></i></a> --}}
                    </div>
                </div>
            </div>
            @endauth
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                <!-- Dashboard content -->

                {{-- <div class="row"> --}}
                    @yield('content')
                    {{-- </div> --}}

                <!-- /dashboard content -->

            </div>
            <!-- /content area -->


            <!-- Footer -->
            <div class="navbar navbar-expand-lg navbar-light">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                        data-target="#navbar-footer">
                        <i class="icon-unfold mr-2"></i>
                        Footer
                    </button>
                </div>

                <div class="navbar-collapse collapse" id="navbar-footer">
                    <span class="navbar-text">
                        &copy; {{ date('Y') }} <a href="#">Politeknik Aceh</a>
                    </span>

                </div>
            </div>
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
</body>

</html>