@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Riwayat Pembayaran
    </h1>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="mb-3">

        <a href="{{ route('user.pembayaran.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Upload Pembayaran

        </a>

    </div>

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

                            <th>No</th>
                            <th>Lapangan</th>
                            <th>Total Bayar</th>
                            <th>Metode</th>
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
                                {{ $pembayaran->booking->lapangan->nama_lapangan }}
                            </td>

                            <td>
                                Rp {{ number_format($pembayaran->jumlah_bayar,0,',','.') }}
                            </td>

                            <td>
                                {{ $pembayaran->metode_pembayaran }}
                            </td>

                            <td>

                                @if($pembayaran->status_pembayaran == 'Lunas')

                                    <span class="badge badge-success">
                                        Lunas
                                    </span>

                                @elseif($pembayaran->status_pembayaran == 'Pending')

                                    <span class="badge badge-warning">
                                        Pending
                                    </span>

                                @else

                                    <span class="badge badge-danger">
                                        Ditolak
                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('user.pembayaran.show',$pembayaran->id) }}"
                                   class="btn btn-info btn-sm">

                                    <i class="fas fa-eye"></i>
                                    Detail

                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6"
                                class="text-center">

                                Belum ada pembayaran

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