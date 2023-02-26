<!--=========*App SideBar=======--->
<div class="app-sidebar colored">
    <!--=========*Sidebar-Header=======--->
    <div class="sidebar-header">
        <a class="header-brand" href="{{url()->to('/')}}">
            <span class="text"><span>সেবা কর্ণার</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <!--=========*Sidebar-Content=======--->
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">

                <div class="nav-item {{ '/' == request()->path() ? 'active' : ''}}">
                    <a href="{{url()->to('/')}}"><i class="ik ik-bar-chart-2"></i><span>ড্যাসবোর্ড</span></a>
                </div>


                <div class="nav-item has-sub open">
                    <a href="javascript:void(0)"><i class="far fa-paper-plane"></i><span>আবেদন</span></a>
                    <div class="submenu-content">
                        <a href="{{route('application.create')}}" class="menu-item"><span>আবেদন করুন</span></a>
                         @if(Auth::check())  <a href="{{route('application.index')}}" class="menu-item"><span>আবেদনের তালিকা</span></a>
                         @endif

                    </div>
                </div>
                  <div class="nav-item has-sub open">
                    <a href="javascript:void(0)"><i class="far fa-paper-plane"></i><span>সনদপত্র</span></a>
                    <div class="submenu-content">
                        <a href="{{route('certificate.create')}}" class="menu-item"><span>আবেদন করুন</span></a>
                         @if(Auth::check())  <a href="{{route('certificate.index')}}" class="menu-item"><span>আবেদনের তালিকা</span></a>
                         @endif

                    </div>
                </div>
                 @if(Auth::check())
                <div class="nav-item has-sub open">
                    <a href="javascript:void(0)"><i class="far fa-paper-plane"></i><span>ডিজিটাল কনটেন্ট</span></a>
                    <div class="submenu-content">
                        <a href="{{route('digitalContent.create')}}" class="menu-item"  ><span>নতুন ডিজিটাল কনটেন্ট</span></a>

                        <a href="{{route('digitalContent.index')}}" class="menu-item"><span>ডিজিটাল কনটেন্ট তালিকা</span></a>

                    </div>
                </div>



                <div class="nav-item has-sub open">
                    <a href="javascript:void(0)"><i class="ik ik-users"></i><span>ইউজার</span></a>
                    <div class="submenu-content">
                        <a href="{{route('users.create')}}" class="menu-item" ><span>ইউজার তৈরি</span></a>
                        <a href="{{route('users.index')}}" class="menu-item"><span>ইউজার তালিকা</span></a>
                    </div>
                </div>
                @endif
            </nav>
        </div>
    </div>
</div>
