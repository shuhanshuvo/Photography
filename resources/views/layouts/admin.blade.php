<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/abstack/layouts/green/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jan 2020 20:38:39 GMT -->

<head>
    <meta charset="utf-8" />
    <title>{{$gnrlstng->name}}</title>
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style>
        .p_container {
            max-width: 1170px;
            margin: auto;
        }
        
        img {
            max-width: 100%;
        }
        
        .inbox_people {
            background: #f8f8f8 none repeat scroll 0 0;
            float: left;
            overflow: hidden;
            width: 40%;
            border-right: 1px solid #c4c4c4;
        }
        
        .inbox_msg {
            border: 1px solid #c4c4c4;
            clear: both;
            overflow: hidden;
        }
        
        .top_spac {
            margin: 20px 0 0;
        }
        
        .recent_heading {
            float: left;
            width: 40%;
        }
        
        .srch_bar {
            display: inline-block;
            text-align: right;
            width: 60%;
            padding:
        }
        
        .headind_srch {
            padding: 10px 29px 10px 20px;
            overflow: hidden;
            border-bottom: 1px solid #c4c4c4;
        }
        
        .recent_heading h4 {
            color: #05728f;
            font-size: 21px;
            margin: auto;
        }
        
        .srch_bar input {
            border: 1px solid #cdcdcd;
            border-width: 0 0 1px 0;
            width: 80%;
            padding: 2px 0 4px 6px;
            background: none;
        }
        
        .srch_bar .input-group-addon button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            padding: 0;
            color: #707070;
            font-size: 18px;
        }
        
        .srch_bar .input-group-addon {
            margin: 0 0 0 -27px;
        }
        
        .chat_ib h5 {
            font-size: 15px;
            color: #464646;
            margin: 0 0 8px 0;
        }
        
        .chat_ib h5 span {
            font-size: 13px;
            float: right;
        }
        
        .chat_ib p {
            font-size: 14px;
            color: #989898;
            margin: auto
        }
        
        .chat_img {
            float: left;
            width: 11%;
        }
        
        .chat_ib {
            float: left;
            padding: 0 0 0 15px;
            width: 88%;
        }
        
        .chat_people {
            overflow: hidden;
            clear: both;
        }
        
        .chat_list {
            border-bottom: 1px solid #c4c4c4;
            margin: 0;
            padding: 18px 16px 10px;
        }
        
        .inbox_chat {
            height: auto;
            overflow-y: scroll;
        }
        
        .active_chat {
            background: #ebebeb;
        }
        
        .incoming_msg_img {
            display: inline-block;
            width: 6%;
        }
        
        .received_msg {
            display: inline-block;
            padding: 0 0 0 10px;
            vertical-align: top;
            width: 92%;
        }
        
        .received_withd_msg p {
            background: #ebebeb none repeat scroll 0 0;
            border-radius: 3px;
            color: #646464;
            font-size: 14px;
            margin: 0;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }
        
        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
            margin: 8px 0 0;
        }
        
        .received_withd_msg {
            width: 57%;
        }
        
        .mesgs {
            float: left;
            padding: 30px 15px 0 25px;
            width: 60%;
        }
        
        .sent_msg p {
            background: #05728f none repeat scroll 0 0;
            border-radius: 3px;
            font-size: 14px;
            margin: 0;
            color: #fff;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }
        
        .outgoing_msg {
            overflow: hidden;
            margin: 26px 0 26px;
        }
        
        .sent_msg {
            float: right;
            width: 46%;
        }
        
        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
        }
        
        .type_msg {
            border-top: 1px solid #c4c4c4;
            position: relative;
        }
        
        .msg_send_btn {
            background: #05728f none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            height: 33px;
            position: absolute;
            right: 0;
            top: 11px;
            width: 33px;
        }
        
        .messaging {
            padding: 0 0 50px 0;
        }
        
        .msg_history {
            height: 516px;
            overflow-y: auto;
        }
    </style>

    @yield('css')
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom" style="background-color: {{$gnrlstng->color}}; ">

            <!-- 
            <ul class="navbar-nav ml-auto nav-flex-icons">
              <li class="nav-item avatar dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <span class="badge badge-danger ml-2">4</span>
                  <i class="fas fa-bell"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                  <a class="dropdown-item waves-effect waves-light" href="#">Action <span class="badge badge-danger ml-2">4</span></a>
                  <a class="dropdown-item waves-effect waves-light" href="#">Another action <span class="badge badge-danger ml-2">1</span></a>
                  <a class="dropdown-item waves-effect waves-light" href="#">Something else here <span class="badge badge-danger ml-2">4</span></a>
                </div>
              </li>
            </ul> -->

            <ul class="list-unstyled topnav-menu float-right mb-0 ">

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle " id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <?php
                  
                          $pending = App\Order::where('order_status',0)->count();
                          
                        ?>

                    <span class="badge badge-danger ml-2">{{ $pending }}</span>
                    <i class="fas fa-bell"></i>
                       <?php

                         $orders = App\Order::join('services','orders.service_id','=','services.id')
                                  ->where('orders.order_status','=',0)
                                  ->select('orders.*', 'services.service_name')
                                  ->orderBy('orders.id','DESC')
                                  ->take(5)
                                  ->get();

                          ?>
                    </a>
                    <div class="p_container">
                        <div class="inbox_chat dropdown-menu">
                          @foreach($orders as $order)
                            <div class="chat_list active_chat">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="chat_ib">
                                         <span class="chat_date"></span>
                                        <!-- <p>Test, </p> -->{{ $order->service_name }}
                                          <p class="app-notification__meta">
                                            <?php
                                              $mytime = Carbon\Carbon::parse($order->created_at);
                                            ?>
                                          {{ $mytime }}
                                          </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <a href="{{route('admin.all.order')}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;See all notification</a>
                        </div>
                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                        <span class="ml-1">Welcome! {{Auth::user('admin')->name}} <i class="mdi mdi-chevron-down"></i> </span>

                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->

                        <!-- item-->
                        <a href="{{route('admin.change.pass')}}" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>Change Password</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="{{route('admin.logout')}}" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="#" class="logo text-center">
                    <span class="logo-lg">

                     <span class="logo-lg-text-light"><img src="../../assets/logo/{{$gnrlstng->logo}}"></span>
                    </span>
                    <span class="logo-sm">
                        <span class="logo-sm-text-dark"><img src="../../assets/logo/{{$gnrlstng->logo}}"></span>

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
        <div class="left-side-menu" style="background-color: {{$gnrlstng->navbar_color}};">

            <div class="slimscroll-menu">

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <li class="menu-title">Main Menu</li>

                        <li>
                            <a href="{{route('admin.dashbord')}}">
                                <i class="fe-airplay"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.general.settings')}}">
                                <i class="fas fa-cogs"></i>
                                <span> General Settings </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('get.photographers')}}">
                                <i class="fe-airplay"></i>
                                <span> Photographers </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('get.users')}}">
                                <i class="fe-airplay"></i>
                                <span> Users </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('add.service.page')}}">
                                <i class="fe-airplay"></i>
                                <span> Add Services </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('all.services')}}">
                                <i class="fe-airplay"></i>
                                <span>All Services </span>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-airplay"></i>
                                <span>Orders</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right ">

                                <a href="{{route('admin.all.order')}}" class="dropdown-item ">

                                    <span>All Orders</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a href="{{route('admin.complete.order')}}" class="dropdown-item notify-item">

                                    <span>Complete Order</span>
                                </a>
                                <a href="{{route('admin.reject.order')}}" class="dropdown-item notify-item">

                                    <span>Reject Order</span>
                                </a>
                            </div>

                        </li>

                        <li>
                            <a href="{{route('admin.all.tran')}}">
                                <i class="fe-airplay"></i>
                                <span>Transaction Table</span>
                            </a>
                        </li>

                        {{--
                        <li>--}} {{-- <a href="javascript: void(0);">--}}
{{--                            <i class="fe-briefcase"></i>--}}
{{--                            <span> UI Kit </span>--}}
{{--                            <span class="menu-arrow"></span>--}}
{{--                        </a>--}} {{--
                            <ul class="nav-second-level" aria-expanded="false">--}} {{--
                                <li><a href="ui-typography.html">Typography</a></li>--}} {{-- </ul>--}} {{-- </li>--}}

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

                    @yield('admin')

                </div>
                <!-- end container-fluid -->

            </div>
            <!-- end content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                        $date = \Carbon\Carbon::now()->format('Y');
                        ?>
                                {{$date}} &copy; Developed by <a href="#">{{$gnrlstng->fotr_btm_txt}}</a>
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
    <script src="{{asset('assets/dashboard/')}}/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="{{asset('assets/dashboard/')}}/js/app.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.js"></script>
    @yield('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('layouts.message')

    <script>
        $(document).ready(function() {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: '',
                tabsize: 2,
                height: 100
            });

            $('#summernote_footer').summernote({
                placeholder: '',
                tabsize: 2,
                height: 100
            });

            $('#summernote_footer_bottom').summernote({
                placeholder: '',
                tabsize: 2,
                height: 100
            });

        })
    </script>
</body>

<!-- Mirrored from coderthemes.com/abstack/layouts/green/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jan 2020 20:39:58 GMT -->

</html>