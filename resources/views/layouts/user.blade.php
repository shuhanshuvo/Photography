<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/abstack/layouts/green/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jan 2020 20:38:39 GMT -->
<head>
    <meta charset="utf-8" />
    <title>PHOTOGRAPHY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/dashboard/')}}/images/favicon.ico">

    <!-- App css -->
    <link href="{{asset('assets/dashboard/')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/dashboard/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/dashboard/')}}/css/app.min.css" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

<body>

<!-- Begin page -->
<div id="wrapper">


    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">


              <li class="nav-item avatar dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <?php
                    $all_not = App\Order::orderBy('order_status','DESC')->count();
                    $admin_app_not = App\Order::where('order_status',1)->count();
                    $pending = App\Order::where('order_status',0)->count();
                    $reject = App\Order::where('order_status',2)->count();
                ?>
               
                  <span class="badge badge-danger ml-2">{{ $all_not }}</span>
                  <i class="fas fa-bell"></i>
                  
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                  <a class="dropdown-item waves-effect waves-light" href="#"> Another<span class="badge badge-danger ml-2">{{ $admin_app_not }}</span></a>
                  <a class="dropdown-item waves-effect waves-light" href="#">Another action <span class="badge badge-danger ml-2">{{ $pending }}</span></a>
                  <a class="dropdown-item waves-effect waves-light" href="#">Something else here <span class="badge badge-danger ml-2">{{ $reject }}</span></a>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="">see all</a>
                </div>
              </li>

<!-- 
              <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><span class="badge badge-danger"></span><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have  new order notifications.</li></ul></li> -->




            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="ml-1">Welcome! {{Auth::user()->first_name}} {{Auth::user()->last_name}}<i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->


                    <!-- item-->
                    <a href="{{route('user.change.pass')}}" class="dropdown-item notify-item">
                        <i class="fe-lock"></i>
                        <span>Change Password</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            </li>




        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{route('home')}}" class="logo text-center">
                        <span class="logo-lg">

                     <span class="logo-lg-text-light">PHOTOGRAPHY</span>
                        </span>
                <span class="logo-sm">
                        <span class="logo-sm-text-dark">PHOTOGRAPHY</span>

                        </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>


        </ul>
    </div>
    <!-- end Topbar -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="slimscroll-menu">

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Main Menu</li>

                    <li>
                        <a href="{{route('home')}}">
                            <i class="fe-airplay"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.profile')}}">
                            <i class="fe-airplay"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('show.services')}}">
                            <i class="fe-airplay"></i>
                            <span>Services</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="#">
                            <i class="fe-airplay"></i>
                            <span> Pdf </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fe-airplay"></i>
                            <span> My Archives Pdf</span>
                        </a>
                    </li> -->

                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
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
                
                @yield('user')



            </div> <!-- end container-fluid -->

        </div> <!-- end content -->



        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            $date = \Carbon\Carbon::now()->format('Y');
                        ?>
                        {{$date}} &copy; Developed by <a href="#">Galaxy Global It</a>
                    </div>

                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>



        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            $date = \Carbon\Carbon::now()->format('Y');
                        ?>
                        {{$date}} &copy; Developed by <a href="#">Galaxy Global It</a>
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

<!-- Right Sidebar -->

<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{asset('assets/dashboard/')}}/js/vendor.min.js"></script>

<!-- Chart JS -->
<script src="{{asset('assets/dashboard/')}}/libs/chart-js/Chart.bundle.min.js"></script>

<!-- Init js -->


<!-- App js -->
<script src="{{asset('assets/dashboard/')}}/js/app.min.js"></script>
@yield('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('layouts.message')
</body>

<!-- Mirrored from coderthemes.com/abstack/layouts/green/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jan 2020 20:39:58 GMT -->
</html>
