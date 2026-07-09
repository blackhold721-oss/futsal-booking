@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Detail Booking
    </h1>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    @if(session('error'))

        <div class="alert alert-danger">

            {{ session('error') }}

        </div>

    @endif

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Informasi Booking
            </h6>

        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>

                    <th width="250">
                        ID Booking
                    </th>

                    <td>
                        {{ $booking->id }}
                    </td>

                </tr>

                <tr>

                    <th>
                        Nama Lapangan
                    </th>

                    <td>
                        {{ $booking->lapangan->nama_lapangan }}
                    </td>

                </tr>

                <tr>

                    <th>
                        Tanggal Main
                    </th>

                    <td>
                        {{ \Carbon\Carbon::parse($booking->tanggal_main)->format('d-m-Y') }}
                    </td>

                </tr>

                <tr>

                    <th>
                        Jam Main
                    </th>

                    <td>
                        {{ $booking->jadwal->jam_mulai }}
                        -
                        {{ $booking->jadwal->jam_selesai }}
                    </td>

                </tr>

                <tr>

                    <th>
                        Durasi
                    </th>

                    <td>
                        {{ $booking->durasi }} Jam
                    </td>

                </tr>

                <tr>

                    <th>
                        Total Harga
                    </th>

                    <td>
                        Rp {{ number_format($booking->total_harga,0,',','.') }}
                    </td>

                </tr>

                <tr>

                    <th>
                        Status Booking
                    </th>

                    <td>

                        @if($booking->status_booking == 'Menunggu Pembayaran')

                            <span class="badge badge-primary">
                                Menunggu Pembayaran
                            </span>

                        @elseif($booking->status_booking == 'Menunggu Verifikasi')

                            <span class="badge badge-warning">
                                Menunggu Verifikasi
                            </span>

                        @elseif($booking->status_booking == 'Disetujui')

                            <span class="badge badge-success">
                                Disetujui
                            </span>

                        @else

                            <span class="badge badge-danger">
                                {{ $booking->status_booking }}
                            </span>

                        @endif

                    </td>

                </tr>

            </table>

            <hr>

            <a href="{{ route('user.booking.index') }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>
                Kembali

            </a>

            @if($booking->status_booking != 'Disetujui')

                <form action="{{ route('booking.destroy',$booking->id) }}"
                      method="POST"
                      class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            onclick="return confirm('Yakin ingin membatalkan booking ini?')"
                            class="btn btn-danger">

                        <i class="fas fa-times"></i>
                        Batalkan Booking

                    </button>

                </form>

            @endif

        </div>

    </div>

</div>

@endsection