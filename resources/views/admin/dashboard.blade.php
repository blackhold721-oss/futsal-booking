@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-0 text-gray-800">
    Dashboard Admin
</h1>

<p class="mb-4">
    Selamat datang, Admin!
</p>

<div class="row">

<!-- Total Booking -->
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
                    <i class="fas fa-book fa-2x text-gray-300"></i>
                </div>

            </div>

        </div>

    </div>

</div>

<!-- Pendapatan -->
<div class="col-xl-3 col-md-6 mb-4">

    <div class="card border-left-success shadow h-100 py-2">

        <div class="card-body">

            <div class="row no-gutters align-items-center">

                <div class="col mr-2">

                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pendapatan
                    </div>

                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        Rp {{ number_format($totalPendapatan,0,',','.') }}
                    </div>

                </div>

                <div class="col-auto">
                    <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                </div>

            </div>

        </div>

    </div>

</div>

<!-- Lapangan -->
<div class="col-xl-3 col-md-6 mb-4">

    <div class="card border-left-info shadow h-100 py-2">

        <div class="card-body">

            <div class="row no-gutters align-items-center">

                <div class="col mr-2">

                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Lapangan
                    </div>

                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $totalLapangan }}
                    </div>

                </div>

                <div class="col-auto">
                    <i class="fas fa-futbol fa-2x text-gray-300"></i>
                </div>

            </div>

        </div>

    </div>

</div>

<!-- User -->
<div class="col-xl-3 col-md-6 mb-4">

    <div class="card border-left-warning shadow h-100 py-2">

        <div class="card-body">

            <div class="row no-gutters align-items-center">

                <div class="col mr-2">

                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        User
                    </div>

                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $totalUser }}
                    </div>

                </div>

                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>

            </div>

        </div>

    </div>

</div>

</div>

<div class="row">
<!-- Booking Terbaru -->
<div class="col-lg-8">

    <div class="card shadow mb-4 border-0">

        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
            <h6 class="m-0 font-weight-bold text-primary">Booking Terbaru</h6>
            <a href="{{ route('kelola-booking.index') }}" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Semua</a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-borderless table-hover mb-0 align-middle">
                    <thead class="bg-light text-muted">
                        <tr>
                            <th class="pl-4">Pelanggan</th>
                            <th>Lapangan</th>
                            <th>Jadwal</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookingTerbaru as $booking)
                        <tr>
                            <td class="pl-4">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mr-3" style="width: 40px; height: 40px; font-weight: bold;">
                                        {{ substr($booking->user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0 font-weight-bold text-gray-800">{{ $booking->user->name }}</h6>
                                        <small class="text-muted">{{ $booking->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="font-weight-bold">{{ $booking->lapangan->nama_lapangan }}</span>
                            </td>
                            <td>
                                <div><i class="far fa-calendar-alt text-primary mr-2"></i>{{ \Carbon\Carbon::parse($booking->tanggal_main)->format('d M Y') }}</div>
                            </td>
                            <td class="text-center">
                                @if($booking->status_booking=='Disetujui')
                                    <span class="badge badge-success px-3 py-2 rounded-pill"><i class="fas fa-check mr-1"></i> Disetujui</span>
                                @elseif($booking->status_booking=='Menunggu Verifikasi')
                                    <span class="badge badge-warning px-3 py-2 rounded-pill text-white"><i class="fas fa-clock mr-1"></i> Menunggu</span>
                                @else
                                    <span class="badge badge-danger px-3 py-2 rounded-pill"><i class="fas fa-times mr-1"></i> Ditolak</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="fas fa-inbox fa-3x mb-3 text-gray-300"></i>
                                <p>Belum ada booking terbaru</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Grafik -->
<div class="col-lg-4">

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Booking Per Bulan
            </h6>

        </div>

        <div class="card-body">

            <canvas id="bookingChart"></canvas>

        </div>

    </div>

    <div class="card shadow">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Status Lapangan
            </h6>

        </div>

        <div class="card-body">

            @foreach($lapangans as $lapangan)

                <div class="d-flex justify-content-between mb-2">

                    <span>
                        {{ $lapangan->nama_lapangan }}
                    </span>

                    <span class="text-success">
                        Tersedia
                    </span>

                </div>

            @endforeach

        </div>

    </div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(document.getElementById('bookingChart'), {

    type: 'bar',

    data: {

        labels: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun'
        ],

        datasets: [{

            label: 'Booking',

            data: [
                12,
                19,
                8,
                15,
                22,
                10
            ]

        }]

    }

});

</script>

@endsection
