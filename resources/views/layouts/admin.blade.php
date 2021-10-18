<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/template/img/Logo.png')}}">
    <title>SipBos - Admin</title>
    <!-- Custom CSS -->
    <link href="{{asset('/admin/css/style.min.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @stack('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="index.html" class="logo">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="{{asset('/template/img/Logo.png')}}" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="{{asset('/template/img/Logo.png')}}" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            {{-- <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="{{asset('/admin/images/text-dark.png')}}" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="{{asset('/admin/images/text-light.png')}}" class="light-logo" alt="homepage" />
                            </span> --}}
                        </a>
                        <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                            <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <!-- <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="mdi mdi-menu font-24"></i>
                            </a>
                        </li> -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{-- <img src="{{asset('/admin/images/users/2.jpg')}}" alt="user" class="rounded-circle" style="width: 40px;height:40px;"> --}}
                                <img src="@if(Auth::user()->user_pict !== null) {{asset('/img/user/'.Auth::user()->user_pict)}} @else {{asset('/img/user/user.png')}} @endif" alt="user" class="rounded-circle" style="width: 40px;height:40px;">
                                <span class="m-l-5 font-medium d-none d-sm-inline-block">{{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="@if(Auth::user()->user_pict !== null) {{asset('/img/user/'.Auth::user()->user_pict)}} @else {{asset('/img/user/user.png')}} @endif" alt="user" class="rounded-circle" width="60" height="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">{{Auth::user()->name}}</h4>
                                        <p class=" m-b-0">{{Auth::user()->email}}</p>
                                    </div>
                                </div>
                                <div class="profile-dis scrollable">
                                    <a class="dropdown-item" href="/adminsipbos/user/profile">
                                        <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                    {{-- <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a> --}}
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    <div class="dropdown-divider"></div>
                                </div>
                                {{-- <div class="p-l-30 p-10">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a>
                                </div> --}}
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Personal</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="/adminsipbos" aria-expanded="false">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Home </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-tune"></i>
                                <span class="hide-menu">Website </span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="sidebar-item">
                                    <a href="/adminsipbos/website/banner" class="sidebar-link">
                                        <i class="mdi mdi-view-quilt"></i>
                                        <span class="hide-menu"> Banner </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/adminsipbos/website/produk" class="sidebar-link">
                                        <i class="mdi mdi-view-parallel"></i>
                                        <span class="hide-menu"> Produk </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/adminsipbos/website/contactus" class="sidebar-link">
                                        <i class="mdi mdi-account-alert"></i>
                                        <span class="hide-menu"> Contact Us </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/adminsipbos/website/faq" class="sidebar-link">
                                        <i class="mdi mdi-comment-question-outline"></i>
                                        <span class="hide-menu"> FAQ </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @if(Auth::user()->role == 'admin')
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="/adminsipbos/user" aria-expanded="false">
                                <i class="mdi mdi-account-multiple"></i>
                                <span class="hide-menu">User </span>
                            </a>
                        </li>
                        @endif
                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Other</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">
                                <i class="mdi mdi-directions"></i>
                                <span class="hide-menu">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Dashboard SipBos</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    @if(@$pageDetail['level'] == '1')
                                        <li class="breadcrumb-item active" aria-current="page">{{@$pageDetail['breadcrumb']}}</li>
                                    @endif
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @yield('main')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Koperasi Berkat Artha Sentosa All Rights Reserved.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->

    <div class="chat-windows"></div>

    <!-- Logout Form -->
       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    <!-- End Logout Form -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('/admin/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('/admin/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('/admin/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <script src="{{asset('/admin/js/app.min.js')}}"></script>
    <script src="{{asset('/admin/js/app.init.js')}}"></script>
    <script src="{{asset('/admin/js/app-style-switcher.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('/admin/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('/admin/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('/admin/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('/admin/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('/admin/js/custom.min.js')}}"></script>
    {{-- Autosize Textarea --}}
    <script src="{{asset('/admin/extra-libs/autosize/autosize.min.js')}}"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}
    <!--This page JavaScript -->
    {{-- <!--chartis chart-->
    <script src="{{asset('/admin/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('/admin/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <!--c3 charts -->
    <script src="{{asset('/admin/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{asset('/admin/extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{asset('/admin/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('/admin/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('/admin/js/pages/dashboards/dashboard1.js')}}"></script> --}}

    @stack('script')
@include('error')

</body>

</html>
