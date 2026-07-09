@extends('layouts.app')

@section('content')

<div class="container-fluid">

<!-- Hero Banner -->

<div class="card shadow-lg mb-5 border-0 overflow-hidden" style="border-radius: 20px;">
    <div class="card-body p-0 position-relative">
        <div style="
            background: url('{{ asset('sbadmin/img/foto.png') }}');
            background-size: cover;
            background-position: center;
            min-height: 320px;
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            z-index: 1;
        "></div>
        <div style="
            background: linear-gradient(to right, rgba(16, 185, 129, 0.9), rgba(15, 118, 110, 0.7));
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            z-index: 2;
        "></div>
        
        <div class="position-relative p-5 text-white d-flex flex-column justify-content-center h-100" style="z-index: 3; min-height: 320px;">
            <div class="row">
                <div class="col-lg-8">
                    <span class="badge bg-white text-success mb-3 px-3 py-2 rounded-pill" style="font-weight: 600; letter-spacing: 1px;">PREMIUM FUTSAL BOOKING</span>
                    <h1 class="display-4 font-weight-bold mb-3" style="font-family: 'Outfit', sans-serif;">
                        Selamat Datang, {{ Auth::user()->name }}
                    </h1>
                    <p class="lead mb-4 opacity-75" style="max-width: 600px;">
                        Pesan lapangan futsal favorit Anda dengan cepat, mudah, dan aman. Nikmati fasilitas terbaik untuk performa maksimal.
                    </p>
                    <a href="{{ route('user.booking.create') }}" class="btn btn-light btn-lg text-success font-weight-bold px-5 py-3 shadow-sm rounded-pill" style="transition: transform 0.2s;">
                        Mulai Booking <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistik -->

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card border-left-primary shadow h-100 py-2">

            <div class="card-body">

                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Booking
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $totalBooking }}
                        </div>

                    </div>

                    <div class="col-auto">

                        <i class="fas fa-calendar-check fa-2x text-gray-300"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card border-left-warning shadow h-100 py-2">

            <div class="card-body">

                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Menunggu Bayar
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $bookingBayar }}
                        </div>

                    </div>

                    <div class="col-auto">

                        <i class="fas fa-wallet fa-2x text-gray-300"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card border-left-info shadow h-100 py-2">

            <div class="card-body">

                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Verifikasi
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $bookingVerifikasi }}
                        </div>

                    </div>

                    <div class="col-auto">

                        <i class="fas fa-search-dollar fa-2x text-gray-300"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card border-left-success shadow h-100 py-2">

            <div class="card-body">

                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Disetujui
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $bookingDisetujui }}
                        </div>

                    </div>

                    <div class="col-auto">

                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Lapangan -->

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">

            Pilih Lapangan

        </h6>

    </div>

    <div class="card-body">

        <div class="row">

            @foreach(\App\Models\Lapangan::take(4)->get() as $lapangan)

            <div class="col-md-3 mb-4">

                <div class="card shadow h-100">

                    <img
                        src="{{ asset('storage/'.$lapangan->foto_lapangan) }}"
                        style="height:180px;object-fit:cover"
                        class="card-img-top">

                    <div class="card-body">

                        <h5>

                            {{ $lapangan->nama_lapangan }}

                        </h5>

                        <small>

                            {{ $lapangan->jenis_rumput }}

                        </small>

                        <hr>

                        <strong>

                            Rp {{ number_format($lapangan->harga_per_jam,0,',','.') }}/Jam

                        </strong>

                    </div>

                    <div class="card-footer bg-white">

                        <a href="{{ route('user.booking.create') }}"
                           class="btn btn-primary btn-block">

                            Booking

                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

<!-- Booking Terbaru -->

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">

            Booking Saya

        </h6>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>Lapangan</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Total</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($bookingTerbaru as $booking)

                    <tr>

                        <td>
                            {{ $booking->lapangan->nama_lapangan }}
                        </td>

                        <td>
                            {{ $booking->tanggal_main }}
                        </td>

                        <td>
                            {{ $booking->jadwal->jam_mulai }}
                            -
                            {{ $booking->jadwal->jam_selesai }}
                        </td>

                        <td>
                            Rp {{ number_format($booking->total_harga,0,',','.') }}
                        </td>

                        <td>

                            @if($booking->status_booking == 'Disetujui')

                                <span class="badge badge-success">
                                    Disetujui
                                </span>

                            @elseif($booking->status_booking == 'Menunggu Verifikasi')

                                <span class="badge badge-warning">
                                    Verifikasi
                                </span>

                            @elseif($booking->status_booking == 'Menunggu Pembayaran')

                                <span class="badge badge-info">
                                    Pembayaran
                                </span>

                            @else

                                <span class="badge badge-danger">
                                    Dibatalkan
                                </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5" class="text-center">

                            Belum ada booking

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</div>

@endsection
