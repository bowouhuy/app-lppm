<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>LPPM | Internal</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" src="{{asset('icon/logo.png')}}">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{ asset('admin_template/assets/plugins/morris/morris.css') }}">

        <link href="{{ asset('admin_template/assets/plugins/dropzone/dist/dropzone.css')}} " rel="stylesheet" type="text/css">
        <!-- Basic Css files -->
        <link href="{{ asset('admin_template/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin_template/assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin_template/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin_template/assets/css/style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin_template/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('admin_template/assets/plugins/summernote/summernote-bs4.css') }}">
        <link href="{{ asset('admin_template/assets/plugins/sweet-alert2/sweetalert2.min.css')}} " rel="stylesheet" type="text/css">
        
        <script src="{{ asset('admin_template/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin_template/assets/js/bootstrap.bundle.min.js') }}"></script>
    </head>
    <body class="fixed-left">
        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="{{url('/')}}" class="logo">
                        <img src="{{asset('admin_template/assets/images/logo.png')}}" alt="" height="20" class="logo-large">
                        <img src="{{asset('admin_template/assets/images/logo-sm.png')}}" alt="" height="22" class="logo-sm">
                    </a>
                </div>

                <nav class="navbar-custom">
                    <!-- Search input -->
                    <div class="search-wrap" id="search-wrap">
                        <div class="search-bar">
                            <input class="search-input" type="search" placeholder="Search" />
                            <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                <i class="mdi mdi-close-circle"></i>
                            </a>
                        </div>
                    </div>

                    <ul class="navbar-right d-flex list-inline float-right mb-0">
                        <!-- User-->
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('admin_template/assets/images/users/avatar-6.jpg')}} " alt="user" class="rounded-circle">
                                <span class="d-none d-md-inline-block ml-1">{{Auth::user()->username}}<i class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted"></i> My Wallet</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"><i class="dripicons-exit text-muted"></i> Logout</a>
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>                        
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Main</li>
                            <li>
                                <a href="{{url('dosen')}}" class=" waves-effect">
                                    <i class="dripicons-meter"></i><span> Dosen </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('lppm')}}" class=" waves-effect">
                                    <i class="dripicons-briefcase"></i><span> LPPM </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('reviewer')}}" class=" waves-effect">
                                    <i class="dripicons-swap"></i><span> Reviewer </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->
            </div>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <h4 class="page-title mb-0"> {{$title}} </h4>
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @yield('body')
                    </div>
                </div>
                @extends('layouts.footer')
            </div>
        </div>
        @extends('layouts.script')
    </body>
</html>