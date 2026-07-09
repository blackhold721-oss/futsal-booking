@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Laporan Booking Lapangan
</h1>

<div class="card shadow mb-4">

<div class="card-header py-3">

    <h6 class="m-0 font-weight-bold text-primary">
        Filter Laporan
    </h6>

</div>

<div class="card-body">

    <form method="GET"
          action="{{ route('laporan-booking.index') }}">

        <div class="row">

            <div class="col-md-3">

                <input type="date"
                       name="tanggal"
                       value="{{ request('tanggal') }}"
                       class="form-control">

            </div>

            <div class="col-md-9">

                <button type="submit"
                        class="btn btn-primary">

                    <i class="fas fa-search"></i>
                    Filter

                </button>

                <a href="{{ route('laporan-booking.index') }}"
                   class="btn btn-secondary">

                    <i class="fas fa-sync"></i>
                    Reset

                </a>

                <a href="{{ route('laporan-booking.pdf') }}"
                   target="_blank"
                   class="btn btn-danger">

                    <i class="fas fa-file-pdf"></i>
                    Cetak PDF

                </a>

            </div>

        </div>

    </form>

</div>


</div>

<div class="row">


<div class="col-lg-4">

    <div class="card border-left-success shadow mb-4">

        <div class="card-body">

            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Total Pendapatan
            </div>

            <div class="h5 mb-0 font-weight-bold text-gray-800">

                Rp {{ number_format($bookings->sum('total_harga'),0,',','.') }}

            </div>

        </div>

    </div>

</div>

<div class="col-lg-4">

    <div class="card border-left-primary shadow mb-4">

        <div class="card-body">

            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Total Booking
            </div>

            <div class="h5 mb-0 font-weight-bold text-gray-800">

                {{ $bookings->count() }}

            </div>

        </div>

    </div>

</div>

</div>

<div class="card shadow mb-4">


<div class="card-header py-3">

    <h6 class="m-0 font-weight-bold text-primary">
        Data Booking
    </h6>

</div>

<div class="card-body">

    <div class="table-responsive">

        <table class="table table-bordered table-hover">

            <thead class="thead-light">

                <tr>

                    <th>No</th>
                    <th>User</th>
                    <th>Lapangan</th>
                    <th>Tanggal Main</th>
                    <th>Jam</th>
                    <th>Durasi</th>
                    <th>Total Harga</th>
                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

            @forelse($bookings as $booking)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $booking->user->name }}
                    </td>

                    <td>
                        {{ $booking->lapangan->nama_lapangan }}
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($booking->tanggal_main)->format('d-m-Y') }}
                    </td>

                    <td>

                        {{ $booking->jadwal->jam_mulai }}
                        -
                        {{ $booking->jadwal->jam_selesai }}

                    </td>

                    <td>

                        {{ $booking->durasi }} Jam

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
                                Menunggu Verifikasi
                            </span>

                        @elseif($booking->status_booking == 'Menunggu Pembayaran')

                            <span class="badge badge-info">
                                Menunggu Pembayaran
                            </span>

                        @else

                            <span class="badge badge-danger">
                                {{ $booking->status_booking }}
                            </span>

                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8" class="text-center">

                        Tidak ada data booking

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection
