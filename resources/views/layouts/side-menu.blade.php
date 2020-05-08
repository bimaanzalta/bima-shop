<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">

    <div class="slimscroll-menu" id="remove-scroll">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="index.html" class="logo">
                <span>
                    <img src="{{ url('admin/images/logo.png') }}" alt="" height="22">
                </span>
                <i>
                    <img src="{{ url('admin/images/logo_sm.png') }}" alt="" height="28">
                </i>
            </a>
        </div>

        <!-- User box -->
        <div class="user-box">
            <div class="user-img">
                <img src="{{ url('admin/images/users/avatar-1.jpg') }}" alt="user-img" title="Mat Helme"
                    class="rounded-circle img-fluid">
            </div>
            <h5><a href="#">{{ Auth::user()->name }}</a> </h5>
            <p class="text-muted">{{ json_decode(Auth::user()->roles)[0] }}</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <!--<li class="menu-title">Navigation</li>-->

                <li>
                    <a href="/">
                        <i class="fa fa-home"></i> <span> Home </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="fa fa-users"></i> <span> Users </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}">
                        <i class="fa fa-list"></i> <span> Categories </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('books.index') }}">
                        <i class="fa fa-book"></i> <span> Books </span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
