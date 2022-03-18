<aside id="bg-color" class="main-sidebar sidebar-dark-primary elevation-4 bg-lightM">
    <a href="{{route('dashboard.admin.home')}}" class="brand-link">
        <img src="{{asset('assets/images/Logo ADRA2.jpg')}}" alt="ADRA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-weight: 800px; font-size: 20px;">ADRA</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!-- div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div -->
        </div>

        <!-- div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @can('admin')
                <li class="nav-item menu-openM {{setMenuClass('admin.projets.', 'menu-open')}}">
                    <a href="#" class="nav-link active {{setMenuClass('admin.projets.', 'active')}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Projet
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.projets.listes.index')}}" class="nav-link activeM {{setMenuActive('admin.projets.listes.index')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-openM {{setMenuClass('admin.agents.', 'menu-open')}}">
                    <a href="#" class="nav-link active {{setMenuClass('admin.agents.', 'active')}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Agents
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.agents.listesAgents.index')}}" class="nav-link activeM {{setMenuActive('admin.agents.listesAgents.index')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-openM {{setMenuClass('admin.conges.', 'menu-open')}}">
                    <a href="#" class="nav-link active {{setMenuClass('admin.conges.', 'active')}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Congé
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.conges.listesConge.index')}}" class="nav-link activeM {{setMenuActive('admin.conges.listesConge.index')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- li class="nav-item">
                    <a href="#" class="nav-link activeM">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Projet M
                        </p>
                    </a>
                </li -->               
                @endcan
                <!-- li class="nav-item">
                    <a href="#" class="nav-link activeM">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li -->
            </ul>
        </nav>
    </div>
</aside>