<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport"
      content="width=device-width, initial-scale=1">

<title>Futsal Booking</title>

<!-- SB Admin 2 -->

<link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}"
      rel="stylesheet">

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
    .navbar { background: rgba(255, 255, 255, 0.9) !important; backdrop-filter: blur(10px); box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05) !important; position: relative; z-index: 1050; }
    .dropdown-menu { z-index: 1060; }
    .btn-primary { background-color: #10b981; border-color: #10b981; border-radius: 8px; font-weight: 500; padding: 0.5rem 1.25rem; transition: all 0.2s; }
    .btn-primary:hover { background-color: #059669; border-color: #059669; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3); }
    .badge { padding: 0.5em 0.75em; border-radius: 6px; font-weight: 500; }
    .table th { border-top: none; text-transform: uppercase; font-size: 0.75rem; font-weight: 600; color: #64748b; letter-spacing: 0.5px; }
    .table td { vertical-align: middle; color: #334155; }
    .h5 { font-weight: 700 !important; color: #1e293b !important; }
    .text-xs { font-size: 0.75rem; letter-spacing: 0.5px; color: #64748b !important; }
    /* Override SB admin container padding */
    .container-fluid { padding-left: 2rem; padding-right: 2rem; }
    @media (max-width: 768px) { .container-fluid { padding-left: 1rem; padding-right: 1rem; } }
</style>
</head>

<body id="page-top">

@include('layouts.navigation')

<div class="container-fluid mt-4">

    @yield('content')

</div>

<script src="{{ asset('sbadmin/vendor/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('sbadmin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
