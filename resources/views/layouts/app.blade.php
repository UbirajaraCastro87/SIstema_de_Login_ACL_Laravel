<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Tabler Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

        <!-- Controle de Transição e Colapso da Sidebar -->
        <style>
    /* Força a largura expandida e recolhida com transição */
    #sidebar-container {
        width: 16rem !important;
        min-width: 16rem !important;
        transition: width 0.25s ease-in-out, min-width 0.25s ease-in-out !important;
    }

    body.sidebar-collapsed #sidebar-container {
        width: 4.5rem !important;
        min-width: 4.5rem !important;
    }

    /* Oculta textos e títulos no estado recolhido */
    body.sidebar-collapsed .sidebar-text {
        display: none !important;
    }

    /* Centraliza os ícones quando o menu estiver recolhido */
    body.sidebar-collapsed #sidebar-container .nav-item-link {
        justify-content: center !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    body.sidebar-collapsed #sidebar-container .sidebar-header {
        justify-content: center !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
    }
</style>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Vite Assets -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen flex">
            <!-- Sidebar Wrapper -->
            <div id="sidebar-container" class="flex-shrink-0 bg-slate-900 text-white min-h-screen">
                <!-- Aponta para a partial correta segundo a sua estrutura de pastas -->
                @include('layouts.partials.tabler-sidebar')
            </div>

            <!-- Conteúdo Principal -->
            <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <main class="flex-1 overflow-y-auto p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>

        <!-- Script de Alternância (Toggle) -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const toggleBtn = document.getElementById("toggle-sidebar");
                const toggleIcon = document.getElementById("toggle-icon");
                const body = document.body;

                // Restaura preferência salva
                if (localStorage.getItem("sidebar-collapsed") === "true") {
                    body.classList.add("sidebar-collapsed");
                    if (toggleIcon) {
                        toggleIcon.classList.replace("ti-chevron-left", "ti-chevron-right");
                    }
                }

                if (toggleBtn) {
                    toggleBtn.addEventListener("click", function (e) {
                        e.preventDefault();
                        body.classList.toggle("sidebar-collapsed");
                        
                        const isCollapsed = body.classList.contains("sidebar-collapsed");
                        localStorage.setItem("sidebar-collapsed", isCollapsed);

                        if (toggleIcon) {
                            if (isCollapsed) {
                                toggleIcon.classList.replace("ti-chevron-left", "ti-chevron-right");
                            } else {
                                toggleIcon.classList.replace("ti-chevron-right", "ti-chevron-left");
                            }
                        }
                    });
                }
            });
        </script>
    </body>
</html>