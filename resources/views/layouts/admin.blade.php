<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Futsal Booking Admin</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900"
          rel="stylesheet">

    <link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}"
          rel="stylesheet">
          
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; background-color: #f8fafc; }
        .bg-gradient-primary { background: linear-gradient(135deg, #10b981 0%, #0f766e 100%); }
        .text-primary { color: #10b981 !important; }
        .border-left-primary { border-left: 4px solid #10b981 !important; }
        .border-left-success { border-left: 4px solid #34d399 !important; }
        .border-left-info { border-left: 4px solid #0ea5e9 !important; }
        .border-left-warning { border-left: 4px solid #f59e0b !important; }
        .card { border: none; border-radius: 16px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01) !important; transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .card:hover { transform: translateY(-3px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important; }
        .card-header { background-color: #ffffff; border-bottom: 1px solid #f1f5f9; border-top-left-radius: 16px !important; border-top-right-radius: 16px !important; padding: 1.25rem 1.5rem; }
        .sidebar { box-shadow: 4px 0 24px 0 rgba(0,0,0,0.06); position: relative; z-index: 1040; }
        .sidebar .nav-item .nav-link { font-weight: 500; letter-spacing: 0.3px; }
        .sidebar .nav-item .nav-link i { font-size: 1.1rem; }
        .topbar { background: rgba(255, 255, 255, 0.9) !important; backdrop-filter: blur(10px); border-bottom: 1px solid rgba(226, 232, 240, 0.8); box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02) !important; position: relative; z-index: 1050; }
        .dropdown-menu { z-index: 1060; }
        .btn-primary { background-color: #10b981; border-color: #10b981; border-radius: 8px; font-weight: 500; }
        .btn-primary:hover { background-color: #059669; border-color: #059669; }
        .badge { padding: 0.5em 0.75em; border-radius: 6px; font-weight: 500; }
        .table th { border-top: none; text-transform: uppercase; font-size: 0.75rem; font-weight: 600; color: #64748b; letter-spacing: 0.5px; }
        .table td { vertical-align: middle; color: #334155; }
        .table-bordered { border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; }
        .h5 { font-weight: 700 !important; color: #1e293b !important; }
        .text-xs { font-size: 0.75rem; letter-spacing: 0.5px; color: #64748b !important; }
    </style>
</head>
<body id="page-top">

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
        id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center"
           href="{{ route('admin.dashboard') }}">

            <div class="sidebar-brand-icon">
                <i class="fas fa-futbol"></i>
            </div>

            <div class="sidebar-brand-text mx-3">
                FUTSAL BOOKING
            </div>
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link"
               href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link"
               href="{{ route('lapangan.index') }}">
                <i class="fas fa-futbol"></i>
                <span>Lapangan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link"
               href="{{ route('jadwal.index') }}">
                <i class="fas fa-calendar"></i>
                <span>Jadwal</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link"
               href="{{ route('kelola-booking.index') }}">
                <i class="fas fa-book"></i>
                <span>Booking</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link"
               href="{{ route('detail-pembayaran.index') }}">
                <i class="fas fa-money-bill"></i>
                <span>Pembayaran</span>
            </a>
        </li>


      
        <li class="nav-item">
            <a class="nav-link"
               href="{{ route('user-management.index') }}">
                <i class="fas fa-users"></i>
                <span>User</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link"
               href="{{ route('laporan-booking.index') }}">
                <i class="fas fa-file-alt"></i>
                <span>Laporan</span>
            </a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

    </ul>
    <!-- End Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper"
         class="d-flex flex-column">

        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown no-arrow">

                        <a class="nav-link dropdown-toggle"
                           href="#"
                           id="userDropdown"
                           role="button"
                           data-toggle="dropdown">

                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                {{ Auth::user()->name }}
                            </span>

                            <img class="img-profile rounded-circle"
                                 src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow">

                            <a class="dropdown-item"
                               href="{{ route('profile.edit') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>

                            <div class="dropdown-divider"></div>

                            <form method="POST"
                                  action="{{ route('logout') }}">
                                @csrf

                                <button class="dropdown-item">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </button>
                            </form>

                        </div>

                    </li>

                </ul>

            </nav>

            <!-- Main Content -->
            <div class="container-fluid">

                @yield('content')

            </div>

        </div>

    </div>

</div>

<script src="{{ asset('sbadmin/vendor/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<script src="{{ asset('sbadmin/js/sb-admin-2.min.js') }}"></script>

</body>
</html>