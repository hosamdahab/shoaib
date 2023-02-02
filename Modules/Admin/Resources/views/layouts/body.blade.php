<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{ Route('dashboard.index') }}"><img src="{{ url('/') }}/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{ request()->segment(1)=='dashboard' && request()->segment(2)=='' ? 'active' : '' }} ">
                            <a href="{{ Route('dashboard.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                            <li class="sidebar-item {{ request()->segment('2')=='projects' ? 'active' : '' }} has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-building"></i>
                                    <span>Projects</span>
                                </a>
                                <ul class="submenu {{ request()->segment('2')=='projects' ? 'active' : '' }}">
                                 
                                        <li class="submenu-item  {{ request()->segment('2')=='projects' && request()->segment('3')=='index' ? 'active' : '' }}">
                                            <a href="{{ Route('projects.index') }}"> Projects List</a>
                                        </li>
                                        <li class="submenu-item  {{ request()->segment('2')=='projects' && request()->segment('3')=='create' ? 'active' : '' }}">
                                            <a href="{{ Route('project.create') }}">Add Project</a>
                                        </li>
                                    </ul>
                            </li>

                        

                            <li class="sidebar-item ">
                                <a href="{{ Route('logout') }}" class='sidebar-link'>
                                    <i class="bi bi-box-arrow-left"></i>
                                    <span>Logout</span>
                                </a>
                            </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
      
    </div>
</body>