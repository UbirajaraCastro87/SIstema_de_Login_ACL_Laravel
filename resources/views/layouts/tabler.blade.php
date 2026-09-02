<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <title>{{ config('app.name', 'Sistema BI') }}</title>
    <!-- Tabler CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
   <!-- Garanta que esta linha está presente -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        #sidebar-menu {
            width: 16rem;
            min-width: 16rem;
            transition: width 0.25s ease-in-out, min-width 0.25s ease-in-out;
        }

        body.sidebar-collapsed #sidebar-menu {
            width: 4.5rem;
            min-width: 4.5rem;
        }

        body.sidebar-collapsed #sidebar-menu .navbar-brand,
        body.sidebar-collapsed #sidebar-menu .nav-link-title,
        body.sidebar-collapsed #sidebar-menu .sidebar-header-text {
            display: none;
        }

        body.sidebar-collapsed #sidebar-menu .navbar-brand + #toggle-sidebar {
            margin: 0 auto;
        }

        body.sidebar-collapsed #sidebar-menu .nav-link {
            justify-content: center;
            padding-left: 0;
            padding-right: 0;
        }
    </style>
</head>
<body>
    <div class="page">
        <!-- Sidebar / Menu Lateral com Collapsed/Ocultar -->
        @include('layouts.partials.tabler-sidebar')

        <!-- Header / Navbar Superior -->
        @include('layouts.partials.tabler-navbar')

        <!-- Conteúdo Principal -->
        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>
            
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-12 col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">Sistema BI &copy; {{ date('Y') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButton = document.getElementById('toggle-sidebar');
            const toggleIcon = document.getElementById('toggle-icon');
            const body = document.body;

            function updateSidebarState(isCollapsed) {
                body.classList.toggle('sidebar-collapsed', isCollapsed);
                localStorage.setItem('sidebar-collapsed', isCollapsed);

                if (toggleIcon) {
                    toggleIcon.classList.toggle('ti-chevron-right', isCollapsed);
                    toggleIcon.classList.toggle('ti-chevron-left', !isCollapsed);
                }
            }

            if (localStorage.getItem('sidebar-collapsed') === 'true') {
                updateSidebarState(true);
            }

            if (toggleButton) {
                toggleButton.addEventListener('click', function () {
                    updateSidebarState(!body.classList.contains('sidebar-collapsed'));
                });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
</body>
</html>