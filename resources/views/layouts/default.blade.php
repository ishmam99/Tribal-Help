<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>ক্ষুদ্র নৃ-গোষ্ঠী সেবা কর্ণার</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="../favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="{{asset('plugins/bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/ionicons/dist/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/icon-kit/dist/css/iconkit.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/select2/dist/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/summernote/dist/summernote-bs4.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/mohithg-switchery/dist/switchery.min.css')}}">
        <link rel="stylesheet" href="{{asset('dist/css/theme.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/css/app-lite.css')}}">

        <link rel="stylesheet" href="{{asset('plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">

        <link href="{{asset('assets/css/bootstrap-fileupload.min.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('assets\css\maintemp.css')}}">

        <link rel="stylesheet" href="{{asset('assets\toastr.css')}}">
      
        @yield('cssesevent')
        @yield('cssesIgCroper')

        @yield('csesOne')

        <!--=========================================
                //    cutom css
         ======================================-->
        <link rel="stylesheet" href="{{asset('assets\css\style.css')}}">

        @yield('csses')
        <script src="{{asset('src/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>

    <body class="vertical-layout vertical-menu" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper">

            <header class="header-top bg-chartbg" header-theme="light" >
                <div class="container-fluid">
                    <div class="header_main d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                            <div class="header-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close bg-chartbg"><i class="ik ik-x bg-chartbg"></i></span>
                                    <input type="text" class="form-control navsearch">
                                    <span class="input-group-addon search-btn bg-chartbg"><i class="ik ik-search"></i></span>
                                </div>
                            </div>
                            <button type="button" id="navbar-fullscreen" class="nav-link bg-chartbg"><i class="ik ik-maximize"></i></button>
                        </div>
                        <div class="header_title">
                           <h3>ক্ষুদ্র নৃ-গোষ্ঠী সেবা কর্ণার</h3>
                        </div>


                        @if(Auth::check())
                        <div id="user_module" class="top-menu d-flex align-items-center">
                            <div class="dropdown">
                                <a class="nav-link " href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-plus"></i></a>
                                <div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
                                    <a class="dropdown-item" href="{{URL::to('/')}}" data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="ik ik-bar-chart-2"></i></a>
                                    <a class="dropdown-item" href="{{URL::to('userlist')}}" data-toggle="tooltip" data-placement="top" title="Users"><i class="ik ik-users"></i></a>
                                    <a class="dropdown-item" href="{{URL::to('case/create')}}" data-toggle="tooltip" data-placement="top" title="Create Case"><i class="ik ik-edit"></i></a>
                                    <a class="dropdown-item" href="{{URL::to('case/pandinglistall')}}" data-toggle="tooltip" data-placement="top" title="List of ALL Case"><i class="ik ik-layers"></i></a>
                                    <a class="dropdown-item" href="{{URL::to('case/pandinglist')}}" data-toggle="tooltip" data-placement="top" title="Cases of Today"><i class="ik ik-bell"></i></a>
                                    <a class="dropdown-item" href="{{URL::to('create-user')}}" data-toggle="tooltip" data-placement="top" title="Create User"><i class="ik ik-user-plus"></i></a>
                                    <a class="dropdown-item" href="{{URL::to('claimant/list')}}" data-toggle="tooltip" data-placement="top" title="Claimant List"><i class="ik ik-server"></i></a>
                                    <a class="dropdown-item" href="{{URL::to('claimant/create')}}" data-toggle="tooltip" data-placement="top" title="Create Claimant"><i class="ik ik-clipboard"></i></a>
                                </div>
                            </div>
                            <button type="button" class="nav-link ml-10 bg-chartbg"  id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i  class="ik ik-grid"></i></button>

                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{asset('img/userlogo.png')}}" alt=""></a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{url()->to('users/'.Session::get('userid').'/edit')}}"><i class="ik ik-user dropdown-icon"></i>প্রোফাইল({{Session::get('name')}})</a>
                                     <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="ik ik-power dropdown-icon"></i> লগ-আউট
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </header>

            <div class="page-wrap ">

                @include('includes.app_sidebar')
                @yield('content')

                @include('includes.right_slidebar')

                @include('includes.chat_panel')

                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">কপিরাইট © ২০২২ অটোমেট ইনফোসিস</span>
                        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center"><i class="fa fa-heart text-danger"></i> <a href="http://automateinfosys.com/" class="text-dark" target="_blank"> অটোমেট ইনফোসিস</a></span>
                    </div>
                </footer>
            </div>
        </div>




        <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="quick-search">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto">
                                    <div class="input-wrap">
                                        <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                        <i class="ik ik-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="container">
                            <div class="apps-wrap">
                                <div class="app-item">
                                    <a href="{{URL::to('/')}}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="{{URL::to('userlist')}}"><i class="ik ik-users"></i><span>Users</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="{{URL::to('case/pandinglist')}}"><i class="ik ik-bell"></i><span>Cases Of Today</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="{{URL::to('case/pandinglistall')}}"><i class="ik ik-layers"></i><span>List of All Cases</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="{{URL::to('case/create')}}"><i class="ik ik-edit"></i><span>Create Mamla</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="{{URL::to('create-user')}}"><i class="ik ik-user-plus"></i><span>Create USer</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="{{URL::to('claimant/list')}}"><i class="ik ik-server"></i><span>Claimant List</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="{{URL::to('claimant/create')}}"><i class="ik ik-clipboard"></i><span>Create Claimant</span></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

        <script src="{{asset('js/datatables.js')}}"></script>
        <script src="{{asset('js/tables.js')}}"></script>
        <script src="{{asset('plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>

        <script src="{{asset('plugins/screenfull/dist/screenfull.js')}}"></script>
        <script src="{{asset('plugins/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{asset('plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('plugins/select2/dist/js/select2.min.js')}}"></script>
        <script src="{{asset('plugins/summernote/dist/summernote-bs4.min.js')}}"></script>
        <script src="{{asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
        <script src="{{asset('plugins/jquery.repeater/jquery.repeater.min.js')}}"></script>
        <script src="{{asset('plugins/mohithg-switchery/dist/switchery.min.js')}}"></script>
        <script src="{{asset('dist/js/theme.min.js')}}"></script>
        <script src="{{asset('js/form-advanced.js')}}"></script>



        <script src="{{asset('js/form-advanced.js')}}"></script>

        <script src="{{asset('plugins/jvectormap/jquery-jvectormap.min.js')}}"></script>
        <script src="{{asset('plugins/moment/moment.js')}}"></script>
        <script src="{{asset('plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js')}}"></script>

        <script src="{{asset('plugins/d3/dist/d3.min.js')}}"></script>
        <script src="{{asset('plugins/c3/c3.min.js')}}"></script>


        <script src="{{asset('assets/js/bootstrap-fileupload.js')}}"></script>
        <script src="https:://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

        <script type="text/javascript" src="{{asset('assets\toastr.js')}}"></script>

        @yield('scriptsimg')
        @yield('scripts_dah_charts')
        @yield('scripts1')
        @yield('scripts')


        <!--=========================================
                //    cutom js
         ======================================-->
         <script src="{{ asset('assets/js/main.js') }}"></script>

    </body>
</html>
