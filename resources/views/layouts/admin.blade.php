<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SD HRM - Best Human Resource Management</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/backend/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/backend/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/backend/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/backend/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/backend/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <link href="{{ asset('public') }}/backend/assets/toastrjs/toastr.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Core JS files -->
    <script src="{{ asset('public/backend/js/main/jquery.min.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('public/backend/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('public/backend/js/plugins/visualization/d3/d3.min.js')}}"></script>
    <script src="{{ asset('public/backend/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
    <script src="{{ asset('public/backend/js/plugins/forms/styling/switchery.min.js')}}"></script>
    <script src="{{ asset('public/backend/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script src="{{ asset('public/backend/js/plugins/pickers/daterangepicker.js')}}"></script>

    <script src="{{ asset('public/backend/assets/js/app.js') }}"></script>
    <script src="{{ asset('public/backend/js/demo_pages/dashboard.js') }}"></script>
    <script src="{{ asset('public/backend/js/demo_charts/pages/dashboard/light/streamgraph.js') }}"></script>
    <script src="{{ asset('public/backend/js/demo_charts/pages/dashboard/light/sparklines.js') }}"></script>
    <script src="{{ asset('public/backend/js/demo_charts/pages/dashboard/light/lines.js') }}"></script> 
    <script src="{{ asset('public/backend/js/demo_charts/pages/dashboard/light/areas.js') }}"></script>
    <script src="{{ asset('public/backend/js/demo_charts/pages/dashboard/light/donuts.js') }}"></script>
    <script src="{{ asset('public/backend/js/demo_charts/pages/dashboard/light/bars.js') }}"></script>
    <script src="{{ asset('public/backend/js/demo_charts/pages/dashboard/light/progress.js') }}"></script>
    <script src="{{ asset('public/backend/js/demo_charts/pages/dashboard/light/heatmaps.js') }}"></script>
    <script src="{{ asset('public/backend/js/demo_charts/pages/dashboard/light/pies.js') }}"></script>
    <script src="{{ asset('public/backend/js/demo_charts/pages/dashboard/light/bullets.js') }}"></script>
    <!-- /theme JS files -->

    <script src="{{asset('public/backend/js/plugins/uploaders/fileinput/plugins/purify.min.js')}}"></script>
    <script src="{{asset('public/backend/js/plugins/uploaders/fileinput/plugins/sortable.min.js')}}"></script>
    <script src="{{asset('public/backend/js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>
    <script src="{{asset('public/backend/js/demo_pages/uploader_bootstrap.js')}}"></script>
    <script src="{{ asset('public') }}/backend/assets/toastrjs/toastr.min.js"></script>
    <script src="{{ asset('public') }}/backend/assets/sweet-alert/sweet-alert.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- Date-Time Picker -->
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script-->
        <script src="{{asset('public/backend/js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/jquery.datetimepicker.css')}}"/ >
        
        <script src="{{asset('public/backend/js/jquery.js')}}"></script>
        <script src="{{asset('public/backend/js/jquery.datetimepicker.full.min.js')}}"></script>



</head>

<body>

    @guest 
    @else
    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark">
        <div class="navbar-brand">
            <a href="{{ route('admin.home') }}" class="d-inline-block">
                <img src="{{ asset('public/backend/images/logo_light.png') }}" alt="">
            </a>
        </div>

        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-mobile">
           
            <ul class="navbar-nav" id="noti_panel">
       			
       			<li class="nav-item">
       			    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
       			        <i class="icon-paragraph-justify3"></i>
       			    </a>
       			</li>
       			<li class="nav-item dropdown">
       			    <a href="#" class="navbar-nav-link dropdown-toggle caret-0 bell-icon" data-toggle="dropdown">
       			        <i class="icon-bell2"></i>
       			        <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">0</span>
       			    </a>

       			    <div class="dropdown-menu dropdown-content wmin-md-350"  style="background-color: #F4F4F4;">
       			        <div class="dropdown-content-header">
       			            <span class="font-weight-semibold">Notification</span>
       			            <a href="#" class="text-default"><i class="icon-sync"></i></a>
       			        </div>
       			        <div class="dropdown-content-body dropdown-scrollable" >
       			            <ul class="media-list">
       			                <li class="media p-1" >
       			                    <div class="mr-3">
       			                        <a href="#" class="btn bg-transparent border-success text-success rounded-round border-2 btn-icon"> <i class="icon-bell-check"></i></a>
       			                    </div>
       			                    <div class="media-body">
       			                      <a href="#" class="text-muted"> asdasdasdasdasdas
       			                        <div class="text-muted font-size-sm">25 minutes ago</div> </a>
       			                    </div>
       			                </li>
       			            </ul>
       			        </div>
       			        <div class="dropdown-content-footer bg-light">
       			            <a href="#" class="text-grey mr-auto">All Notification</a>
       			            <div>
       			                <a href="#" class="text-grey" data-popup="tooltip" title="Mark all as read"><i class="icon-radio-unchecked"></i></a>
       			                <a href="#" class="text-grey ml-2" data-popup="tooltip" title="Bug tracker"><i class="icon-bug2"></i></a>
       			            </div>
       			        </div>
       			    </div>
       			</li>
            </ul>
           
            <span class="badge bg-success ml-md-3 mr-md-auto">Online</span>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                        <i class="icon-people"></i>
                        <span class="d-md-none ml-2">Users</span>
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-300">
                        <div class="dropdown-content-header">
                            <span class="font-weight-semibold">Users online</span>
                            <a href="#" class="text-default"><i class="icon-search4 font-size-base"></i></a>
                        </div>

                        <div class="dropdown-content-body dropdown-scrollable">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="mr-3">
                                        <img src="images/demo/users/face18.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Jordana Ansley</a>
                                        <span class="d-block text-muted font-size-sm">Lead web developer</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span class="badge badge-mark border-success"></span></div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="images/demo/users/face24.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Will Brason</a>
                                        <span class="d-block text-muted font-size-sm">Marketing manager</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span class="badge badge-mark border-danger"></span></div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="images/demo/users/face17.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Hanna Walden</a>
                                        <span class="d-block text-muted font-size-sm">Project manager</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span class="badge badge-mark border-success"></span></div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="images/demo/users/face19.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Dori Laperriere</a>
                                        <span class="d-block text-muted font-size-sm">Business developer</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span class="badge badge-mark border-warning-300"></span></div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="images/demo/users/face16.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Vanessa Aurelius</a>
                                        <span class="d-block text-muted font-size-sm">UX expert</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span class="badge badge-mark border-grey-400"></span></div>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown-content-footer bg-light">
                            <a href="#" class="text-grey mr-auto">All users</a>
                            <a href="#" class="text-grey"><i class="icon-gear"></i></a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                        <i class="icon-bubbles4"></i>
                        <span class="d-md-none ml-2">Messages</span>
                        <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">2</span>
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                        <div class="dropdown-content-header">
                            <span class="font-weight-semibold">Messages</span>
                            <a href="#" class="text-default"><i class="icon-compose"></i></a>
                        </div>

                        <div class="dropdown-content-body dropdown-scrollable">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="mr-3 position-relative">
                                        <img src="../../../../global_assets/images/demo/users/face10.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">James Alexander</span>
                                                <span class="text-muted float-right font-size-sm">04:58</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3 position-relative">
                                        <img src="../../../../global_assets/images/demo/users/face3.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">Margo Baker</span>
                                                <span class="text-muted float-right font-size-sm">12:16</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">That was something he was unable to do because...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/demo/users/face24.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">Jeremy Victorino</span>
                                                <span class="text-muted float-right font-size-sm">22:48</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">But that would be extremely strained and suspicious...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/demo/users/face4.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">Beatrix Diaz</span>
                                                <span class="text-muted float-right font-size-sm">Tue</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/demo/users/face25.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">Richard Vango</span>
                                                <span class="text-muted float-right font-size-sm">Mon</span>
                                            </a>
                                        </div>
                                        
                                        <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown-content-footer justify-content-center p-0">
                            <a href="#" class="bg-light text-grey w-100 py-2" data-popup="tooltip" title="Load more"><i class="icon-menu7 d-block top-0"></i></a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                        <img src="../../../../global_assets/images/demo/users/face11.jpg" class="rounded-circle mr-2" height="34" alt="">
                        <span>Victoria</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                        <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                        <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                        <a href="{{ route('logout') }}" class="dropdown-item"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>                             
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
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
                                <a href="#"><img src="{{ asset(Auth::user()->photo) }}" width="38" height="38" class="rounded-circle" alt=""></a>
                            </div>

                            <div class="media-body">
                                <div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>
                                <div class="font-size-xs opacity-50">
                                    <i class="icon-envelop4 font-size-sm"></i> &nbsp;{{ Auth::user()->email }}
                                </div>
                            </div>

                            <div class="ml-3 align-self-center">
                                <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="card card-sidebar-mobile">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">

                        <!-- Main -->
                        <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                        <li class="nav-item">
                            <a href="{{ route('admin.home') }}" class="nav-link active">
                                <i class="icon-home4"></i>
                                <span>
                                    Dashboard
                                </span>
                            </a>
                        </li>
                      
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Department</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Themes">
                                <li class="nav-item"><a href="{{ route('department') }}" class="nav-link">Department</a></li>
                                <li class="nav-item"><a href="{{ route('division') }}" class="nav-link">Division</a></li> 
                            </ul>
                        </li>

                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Employee</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Themes">
                                <li class="nav-item"><a href="{{ route('position') }}" class="nav-link">Position</a></li>
                                <li class="nav-item"><a href="{{ route('employee.create') }}" class="nav-link">Add Employee</a></li> 
                                <li class="nav-item"><a href="{{ route('employee') }}" class="nav-link">All Employee</a></li> 
                            </ul>
                        </li>  

                        
                        
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Attendance</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Themes">
                                <li class="nav-item"><a href="{{ route('attendance.create') }}" class="nav-link">Attendance Form</a></li>
                                <!--attendance/Home/index-->
                                <li class="nav-item"><a href="{{ 'put' }}" class="nav-link">Monthly Attendance</a></li> 
                                <!--attendance/Home/monthly_manual_attendance-->
                                <li class="nav-item"><a href="{{ 'put' }}" class="nav-link">Missing Attendance</a></li> 
                                <!--attendance/Home/missing_attendance-->
                                <li class="nav-item"><a href="{{ 'put' }}" class="nav-link">Attendance Log</a></li> 
                                <!--attendance/Home/att_log_report-->
                            </ul>
                        </li>

                        

                        <li class="nav-item">
                            <a href="{{ route('award') }}" class="nav-link"><i class="icon-copy"></i> <span>Award</span></a>
                        </li>
                       
                    </ul>
                </div>
                <!-- /main navigation -->
            </div>
            <!-- /sidebar content -->    
        </div>
        <!-- /main sidebar -->
        @endguest
        <!-- Main content -->
        <div class="content-wrapper">
            @yield('content')
       </div>
      <!-- /main content -->
    </div>

</body>
</html>
