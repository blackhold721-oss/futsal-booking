@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Detail Booking
</h1>

<div class="card shadow mb-4">

<div class="card-header py-3">

    <h6 class="m-0 font-weight-bold text-primary">
        Informasi Booking
    </h6>

</div>

<div class="card-body">

    <table class="table table-bordered">

        <tr>
            <th width="250">Nama User</th>
            <td>{{ $booking->user->name }}</td>
        </tr>

        <tr>
            <th>Lapangan</th>
            <td>{{ $booking->lapangan->nama_lapangan }}</td>
        </tr>

        <tr>
            <th>Tanggal Main</th>
            <td>{{ $booking->tanggal_main }}</td>
        </tr>

        <tr>
            <th>Jam Main</th>
            <td>
                {{ $booking->jadwal->jam_mulai }}
                -
                {{ $booking->jadwal->jam_selesai }}
            </td>
        </tr>

        <tr>
            <th>Durasi</th>
            <td>{{ $booking->durasi }} Jam</td>
        </tr>

        <tr>
            <th>Total Harga</th>
            <td>
                Rp {{ number_format($booking->total_harga,0,',','.') }}
            </td>
        </tr>

        <tr>
            <th>Status Booking</th>
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
                        Dibatalkan
                    </span>

                @endif

            </td>
        </tr>

    </table>

    <a href="{{ route('kelola-booking.index') }}"
       class="btn btn-secondary">

        <i class="fas fa-arrow-left"></i>
        Kembali

    </a>

</div>

</div>

@endsection
