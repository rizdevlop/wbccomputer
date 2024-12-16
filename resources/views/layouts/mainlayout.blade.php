<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href={{ asset('favicon.ico') }} />
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet"/>

    @stack('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">

    <!-- Style CSS -->
    <style>
        .sidebar-button {
            display: none; 
            }

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
                transition: all 0.2s ease-out;
                z-index: 999;
            }

            .sidebar-active {
                transform: translateX(0);
                transition: all 0.2s ease-out;
            }

            .sidebar-button {
                display: block; color: white; 
            }

            .background-dark {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 998;
                background-color: rgba(0, 0, 0, 0.5);
                opacity: 0;
                transform: scale(0);
                transition: opacity 0.2s ease-out;
            }

            .background-dark-active {
                opacity: 1;
                transform: scale(1);
                transition: opacity 0.2s ease-out;
            }

            .dropdown-menu { 
                left: auto; right: 0; 
            }
        }
    </style>
    <!-- Style CSS End -->

    <title>WBC Computer | @yield('title')</title>
</head>

<body>
    <!-- Container -->
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar col-9 col-sm-6 col-md-4 col-lg-3 col-xl-2 d-flex flex-column text-light bg-dark p-3 overflow-y-auto position-absolute top-0 bottom-0"
            style="height: 100vh; left: 0;">
            {{-- isi a href dibawah --}}
            <a href="#" class="mb-3">
                <img src="{{ asset('img/6.png') }}" alt="Logo" class="d-block mx-auto"
                    style="width: 100px; margin-bottom: 15px; margin-top: 15px;">
            </a>
            <ul class="nav nav-pills flex-column mb-auto">
                {{-- Sidebar Item --}}
                @yield('sidebar_item')
                {{-- Sidebar Item End --}}
            </ul>
        </div>
        <!-- Sidebar End -->

        <!-- Main -->
        <div class="col-12 col-lg-9 col-xl-10 bg-light overflow-y-auto position-absolute top-0 bottom-0" style="right: 0;">

            <!-- Content -->
            <div class="content">
                {{-- Content --}}
                @yield('content')
                {{-- Content End --}}
            </div>
            <!-- Content End -->

            <!-- Main Header -->
            <nav class="col-12 col-lg-9 col-xl-10 d-flex justify-content-between justify-content-lg-end align-items-center shadow-sm px-4 py-3 position-fixed top-0"
                style="background-color: #4378e9; right: 0">
                <i class="sidebar-button bi bi-list fs-3" id="sidebarButton"></i>
                <div class="dropdown">
                    <img src="{{ asset('img/profile.png') }}" alt="Profile" class="rounded-circle" height="40" width="40"
                        id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm mt-4 py-0" aria-labelledby="profileDropdown"
                        style="border-radius: 10px">
                        <div class="" style="background-color: #4378e9; padding: 20px 75px 40px 75px; border-top-left-radius: 10px; border-top-right-radius: 10px">
                            <img src="{{ asset('img/profile.png') }}" alt="Profile" class="d-block mx-auto rounded-circle" style="width: 70px; height: 70px">
                        </div>
                        <style>
                            .sign-out { background-color: #F76707; }
                            .sign-out:hover { background-color: #e95d00; }
                        </style>
                        <div class="d-flex justify-content-between align-items-center p-3">
                            <a class="btn btn-primary btn-sm" href="
                            {{ route('admin.profile') }}
                            ">
                                Profile
                            </a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="sign-out btn btn-sm text-light">Log Out</button>
                            </form>                                                       
                        </div>
                    </ul>
                </div>
            </nav>
            <!-- Main Header End -->

        </div>
        <!-- Main End -->

        <!-- Background Dark -->
        <div class="background-dark"></div>
        <!-- Background Dark End -->
    </div>
    <!-- Container End -->

    <!-- Script JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let sidebar = document.querySelector(".sidebar");
            let sidebarButton = document.getElementById("sidebarButton");
            let backgroundDark = document.querySelector(".background-dark");

            sidebarButton.addEventListener("click", function() {
                sidebar.classList.add("sidebar-active");
                backgroundDark.classList.add("background-dark-active");
            });

            document.addEventListener("click", function(event) {
                if (!sidebar.contains(event.target) && !sidebarButton.contains(event.target)) {
                    sidebar.classList.remove("sidebar-active");
                    backgroundDark.classList.remove("background-dark-active");
                }
            });
        });
    </script>
    <!-- Script JS End -->

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('js')
    <!-- Script for DataTables -->
    <script src="https://cdn.datatables.net/2.0.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
