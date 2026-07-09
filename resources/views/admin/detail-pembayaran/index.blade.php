@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Verifikasi Pembayaran
</h1>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card shadow mb-4">


<div class="card-header py-3">

    <h6 class="m-0 font-weight-bold text-primary">
        Data Pembayaran
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
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th width="120">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($pembayarans as $pembayaran)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $pembayaran->booking->user->name }}
                    </td>

                    <td>
                        {{ $pembayaran->booking->lapangan->nama_lapangan }}
                    </td>

                    <td>

                        Rp {{ number_format($pembayaran->jumlah_bayar,0,',','.') }}

                    </td>

                    <td>

                        @if($pembayaran->status_pembayaran == 'Pending')

                            <span class="badge badge-warning">
                                Pending
                            </span>

                        @elseif($pembayaran->status_pembayaran == 'Lunas')

                            <span class="badge badge-success">
                                Lunas
                            </span>

                        @elseif($pembayaran->status_pembayaran == 'Ditolak')

                            <span class="badge badge-danger">
                                Ditolak
                            </span>

                        @else

                            <span class="badge badge-secondary">
                                {{ $pembayaran->status_pembayaran }}
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('detail-pembayaran.show',$pembayaran->id) }}"
                           class="btn btn-info btn-sm">

                            <i class="fas fa-eye"></i>
                            Detail

                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center">

                        Belum ada pembayaran

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection
