<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags always come first -->
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Lorax - Bootstrap 4 Admin Dashboard Template</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700"rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700"rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('assets/v1/admin/css/styles/all-themes.css')}}">
<link rel="stylesheet" href="{{asset('assets/v1/admin/js/bundles/materialize-rtl/materialize-rtl.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/v1/admin/css/app.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/v1/admin/css/style.css')}}">
<link rel="icon" href="{{asset('assets/v1/admin/images/favicon.ico')}}" type="image/x-icon">
@yield('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="light rtl">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30">
                <img class="loading-img-spin" src="" width="20" height="20" alt="admin">
            </div>
            <p>لطفا صبر کنید...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"
                    aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">
                    <img src="" alt="" />
                    <span class="logo-name">لوراکس</span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="pull-right">
                    <li>
                        <a href="javascript:void(0);" class="sidemenu-collapse">
                            <i class="material-icons">reorder</i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown user_profile">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <img src="" width="32" height="32" alt="User">
                        </a>
                        <ul class="dropdown-menu pullDown">
                            <li class="body">
                                <ul class="user_dw_menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <i class="material-icons">person</i>پروفایل
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <i class="material-icons">power_settings_new</i>خروج
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <div>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="sidebar-user-panel active">
                        <div class="user-panel">
                            <div class=" image">
                                <img src="" class="img-circle user-img-circle" alt="User Image" />
                            </div>
                        </div>
                        <div class="profile-usertitle">
                            <div class="sidebar-userpic-name"> آرش خادملو </div>
                            <div class="profile-usertitle-job ">مدیر </div>
                        </div>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>خانه</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="active">
                                <a href="index.html">مقالات</a>
                            </li>
                            <li>
                                <a href="{{route('articles.create')}}">درج</a>
                            </li>
                            <li>
                                <a href="{{route('articles.index')}}">لیست</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="pages/apps/calendar.html">
                            <i class="far fa-calendar"></i>
                            <span>رویدادها</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
    </div>
    @yield('content')
    @yield('alert')
    @yield('sweet')
     <!-- Plugins Js -->
     <script src="{{asset('assets/v1/admin/js/app.min.js')}}"></script>
     <script src="{{asset('assets/v1/admin/js/chart.min.js')}}"></script>
     <!-- Custom Js -->
     <script src="{{asset('assets/v1/admin/js/admin.js')}}"></script>
     <script src="{{asset('assets/v1/admin/js/pages/index.js')}}"></script>
     @yield('script-tables')
     @yield('ckdrop')
 </body>
</html>
