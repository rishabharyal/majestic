<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="https://image.flaticon.com/icons/svg/21/21104.svg"/
                        style="width: 20px;">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{ Auth::user()->name }} <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="login.html">Logout</a></li>
                    </ul>
                </div>
            </li>
            <li {{ (Request::is('admin') ? 'class=active' : '') }}>
                <a href="{{ action('Admin\DashboardController@index') }}"><i class="fa fa-diamond"></i> <span
                        class="nav-label">Dashboard</span></a>
            </li>
            <li {{ (Request::is('admin/users*') ? 'class=active' : '') }}>
                <a href="{{ action('Admin\UserController@index') }}"><i class="fa fa-users"></i> <span
                        class="nav-label">Users</span></a>
            </li>
            <li {{ (Request::is('admin/city*') ? 'class=active' : '') }}>
                <a href="{{ action('Admin\CityController@index') }}"><i class="fa fa-building"></i> <span
                        class="nav-label">City</span></a>
            </li>
            <li {{ (Request::is('admin/postcode*') ? 'class=active' : '') }}>
                <a href="{{ action('Admin\PostcodeController@index') }}"><i class="fa fa-users"></i> <span
                        class="nav-label">Postcode</span></a>
            </li>
            <li {{ (Request::is('admin/setting*') ? 'class=active' : '') }}>
                <a href="{{ action('Admin\SettingController@index') }}"><i class="fa fa-gear"></i> <span
                        class="nav-label">Settings</span></a>
            </li>
            <li {{ (Request::is('admin/service*') ? 'class=active' : '') }}>
                <a href="{{ action('Admin\ServiceController@index') }}"><i class="fa fa-life-ring"></i> <span
                        class="nav-label">Services</span></a>
            </li>
            <li {{ (Request::is('admin/service*') ? 'class=active' : '') }}>
                <a href="{{ action('Admin\ServiceController@index') }}"><i class="fa fa-life-ring"></i> <span
                        class="nav-label">Services</span></a>
            </li>
            <li {{ (Request::is('admin/portfolio*') ? 'class=active' : '') }}>
                <a href="{{ action('Admin\PortfolioController@index') }}"><i class="fa fa-user"></i> <span
                        class="nav-label">Portfolios</span></a>
            </li>
            <li {{ (Request::is('admin/blog*') ? 'class=active' : '') }}>
                <a href="{{ action('Admin\BlogController@index') }}"><i class="fa fa-file"></i> <span
                        class="nav-label">Blogs</span></a>
            </li>
        </ul>

    </div>
</nav>