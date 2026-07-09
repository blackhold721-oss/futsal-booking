@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Booking Saya
    </h1>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="mb-3">

        <a href="{{ route('user.booking.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Booking Baru

        </a>

    </div>

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">

                Riwayat Booking

            </h6>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="thead-light">

                        <tr>

                            <th width="60">No</th>
                            <th>Lapangan</th>
                            <th>Tanggal Main</th>
                            <th>Jadwal</th>
                            <th>Durasi</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th width="120">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($bookings as $booking)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
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

                                    @elseif($booking->status_booking == 'Menunggu Pembayaran')

                                        <span class="badge badge-primary">

                                            Menunggu Pembayaran

                                        </span>

                                    @elseif($booking->status_booking == 'Menunggu Verifikasi')

                                        <span class="badge badge-warning">

                                            Menunggu Verifikasi

                                        </span>

                                    @else

                                        <span class="badge badge-danger">

                                            {{ $booking->status_booking }}

                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('user.booking.show',$booking->id) }}"
                                       class="btn btn-info btn-sm">

                                        <i class="fas fa-eye"></i>
                                        Detail

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8"
                                    class="text-center">

                                    Belum ada data booking

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