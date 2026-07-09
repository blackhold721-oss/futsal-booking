@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Kelola Booking
</h1>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

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

                    <th width="60">No</th>
                    <th>User</th>
                    <th>Lapangan</th>
                    <th>Tanggal Main</th>
                    <th>Status</th>
                    <th width="180">Aksi</th>

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

                        @if($booking->status_booking == 'Disetujui')

                            <span class="badge badge-success">
                                Disetujui
                            </span>

                        @elseif($booking->status_booking == 'Menunggu Pembayaran')

                            <span class="badge badge-warning">
                                Menunggu Pembayaran
                            </span>

                        @elseif($booking->status_booking == 'Menunggu Verifikasi')

                            <span class="badge badge-info">
                                Menunggu Verifikasi
                            </span>

                        @elseif($booking->status_booking == 'Ditolak')

                            <span class="badge badge-danger">
                                Ditolak
                            </span>

                        @else

                            <span class="badge badge-secondary">
                                {{ $booking->status_booking }}
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('kelola-booking.show', $booking->id) }}"
                           class="btn btn-info btn-sm">

                            <i class="fas fa-eye"></i>

                        </a>

                        <form action="{{ route('kelola-booking.destroy', $booking->id) }}"
                              method="POST"
                              style="display:inline-block">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                onclick="return confirm('Hapus booking ini?')"
                                class="btn btn-danger btn-sm">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center">

                        Belum ada data booking

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection
