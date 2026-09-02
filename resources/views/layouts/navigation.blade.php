<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark bg-dark" id="sidebar-menu">
    <div class="container-fluid">
        <!-- Toggle para Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu-content">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Topo da Sidebar (Logo + Botão Toggle) -->
        <div class="d-flex align-items-center justify-content-between w-100 py-2">
            <h1 class="navbar-brand navbar-brand-autodark mb-0 px-2">
                <a href="{{ route('dashboard') }}" class="text-decoration-none">
                    <span class="font-weight-bold brand-text">Sistema BI</span>
                </a>
            </h1>

            <button type="button" id="toggle-sidebar" class="btn btn-icon btn-ghost-light btn-sm d-none d-lg-flex rounded-circle me-1" title="Encolher/Expandir Menu">
                <i class="ti ti-chevron-left fs-2" id="toggle-icon"></i>
            </button>
        </div>

        <!-- Conteúdo do Menu -->
        <div class="collapse navbar-collapse" id="sidebar-menu-content">
            <ul class="navbar-nav pt-lg-3">
                
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}" data-menu-title="Dashboard">
                        <span class="nav-link-icon d-inline-block">
                            <i class="ti ti-dashboard fs-2"></i>
                        </span>
                        <span class="nav-link-title">Dashboard</span>
                    </a>
                </li>

                @canany(['usuarios.visualizar', 'perfis.visualizar', 'permissoes.visualizar'])
                    <li class="nav-item header mt-3 mb-1 text-uppercase text-muted fs-6 px-3 sidebar-header-text">
                        <small>Gestão de Acessos</small>
                    </li>
                @endcanany

                @can('usuarios.visualizar')
                    <li class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('users.index') }}" data-menu-title="Usuários">
                            <span class="nav-link-icon d-inline-block">
                                <i class="ti ti-users fs-2"></i>
                            </span>
                            <span class="nav-link-title">Usuários</span>
                        </a>
                    </li>
                @endcan

                @can('perfis.visualizar')
                    <li class="nav-item {{ request()->routeIs('roles.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('roles.index') }}" data-menu-title="Perfis (Roles)">
                            <span class="nav-link-icon d-inline-block">
                                <i class="ti ti-shield-lock fs-2"></i>
                            </span>
                            <span class="nav-link-title">Perfis (Roles)</span>
                        </a>
                    </li>
                @endcan

                @can('permissoes.visualizar')
                    <li class="nav-item {{ request()->routeIs('permissions.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('permissions.index') }}" data-menu-title="Permissões">
                            <span class="nav-link-icon d-inline-block">
                                <i class="ti ti-key fs-2"></i>
                            </span>
                            <span class="nav-link-title">Permissões</span>
                        </a>
                    </li>
                @endcan

            </ul>
        </div>
    </div>
</aside>