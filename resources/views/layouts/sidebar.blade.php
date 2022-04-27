<!-- Sidebar user (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
    </div>
</div>

<!-- SidebarSearch Form -->
<div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
    </div>
</div>

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item {{ request()->segment(1) == 'users' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->segment(1) == 'users' ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    User & Role
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @if (akses('view-users'))
                    <li class="nav-item">
                        <a href="{{ url('users/index') }}"
                            class="nav-link {{ request()->segment(1) == 'users' && request()->segment(2) == 'index' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Manage Users</p>
                        </a>
                    </li>
                @endif

                @if (akses('view-roles'))
                    <li class="nav-item">
                        <a href="{{ url('users/roles') }}"
                            class="nav-link {{ request()->segment(1) == 'users' && request()->segment(2) == 'roles' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Manage Role</p>
                        </a>
                    </li>
                @endif
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{ url('keluar') }}" class="nav-link">
                <i class="nav-icon fas fa-columns"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->
