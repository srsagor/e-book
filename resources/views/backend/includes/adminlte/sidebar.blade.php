<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(auth()->user()->avatar) }}" class="img-circle elevation-2"
                     alt="{{ auth()->user()->name }}">
            </div>
            <div class="info">
                <a href="{{route('backend.users.profile', Auth::user()->id)}}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('backend.dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{__("Dashboard")}}
                        </p>
                    </a>
                </li>

                <li class="nav-header">{{__('Settings')}}</li>
                @can('edit_settings')
                    <li class="nav-item">
                        <a href="{{route('backend.settings.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                {{__("Settings")}}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('view_backups')
                    <li class="nav-item">
                        <a href="{{route('backend.backups.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-archive"></i>
                            <p>
                                {{__("Backups")}}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('view_countries')
                    <li class="nav-item">
                        <a href="{{route('backend.countries.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-map-marked"></i>
                            <p>
                                {{__("Countries")}}
                            </p>
                        </a>
                    </li>
                @endcan


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-secret nav-icon"></i>
                        <p>{{__('Access Control')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        @can('view_users')
                            <li class="nav-item">
                                <a href="{{route('backend.users.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{__("Users")}}</p>
                                </a>
                            </li>
                        @endcan
                        @can('view_roles')
                            <li class="nav-item">
                                <a href="{{route('backend.roles.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{__('Roles')}}</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>

                @can('view_logs')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-history nav-icon"></i>
                        <p>{{__('Log Viewer')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{route('log-viewer::dashboard')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{__("Dashboard")}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('log-viewer::logs.list')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{__('Logs By Days')}}</p>
                                </a>
                            </li>
                    </ul>
                </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
