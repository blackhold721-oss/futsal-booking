@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Detail Pembayaran
    </h1>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Informasi Pembayaran
            </h6>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="250">Lapangan</th>
                    <td>{{ $pembayaran->booking->lapangan->nama_lapangan }}</td>
                </tr>

                <tr>
                    <th>Total Bayar</th>
                    <td>
                        Rp {{ number_format($pembayaran->jumlah_bayar,0,',','.') }}
                    </td>
                </tr>

                <tr>
                    <th>Metode Pembayaran</th>
                    <td>{{ $pembayaran->metode_pembayaran }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>

                        @if($pembayaran->status_pembayaran == 'Lunas')
                            <span class="badge bg-success">
                                Lunas
                            </span>

                        @elseif($pembayaran->status_pembayaran == 'Pending')
                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>

                        @else
                            <span class="badge bg-danger">
                                Ditolak
                            </span>
                        @endif

                    </td>
                </tr>

                <tr>
                    <th>Tanggal Bayar</th>
                    <td>{{ $pembayaran->tanggal_bayar }}</td>
                </tr>

            </table>

            <hr>

            <h5 class="fw-bold mb-3">
                Bukti Transfer
            </h5>

            <img src="{{ asset('bukti_transfer/'.$pembayaran->bukti_transfer) }}"
                 class="img-thumbnail shadow"
         style="max-width:250px; height:auto;">

            <hr>

            <a href="{{ route('user.pembayaran.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </div>

</div>

@endsection