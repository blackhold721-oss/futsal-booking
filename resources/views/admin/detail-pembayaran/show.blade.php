        @extends('layouts.admin')

        @section('content')

        <h1 class="h3 mb-4 text-gray-800">
            Detail Pembayaran
        </h1>

        <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Verifikasi Pembayaran
            </h6>

        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="250">User</th>
                    <td>{{ $pembayaran->booking->user->name }}</td>
                </tr>

                <tr>
                    <th>Lapangan</th>
                    <td>{{ $pembayaran->booking->lapangan->nama_lapangan }}</td>
                </tr>

                <tr>
                    <th>Metode Pembayaran</th>
                    <td>{{ $pembayaran->metode_pembayaran }}</td>
                </tr>

                <tr>
                    <th>Total Bayar</th>
                    <td>
                        Rp {{ number_format($pembayaran->jumlah_bayar,0,',','.') }}
                    </td>
                </tr>

                <tr>
                    <th>Status</th>
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
                </tr>

            </table>

            <hr>

            <h5 class="font-weight-bold mb-3">
                Bukti Transfer
            </h5>

            <div class="text-center">

    <img src="{{ asset('bukti_transfer/'.$pembayaran->bukti_transfer) }}"
         class="img-thumbnail shadow"
         style="max-width:250px; height:auto;">

</div>

            @if($pembayaran->status_pembayaran == 'Pending')

                <div class="mt-4">

                    <form action="{{ route('detail-pembayaran.setujui',$pembayaran->id) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('PUT')

                        <button class="btn btn-success">

                            <i class="fas fa-check"></i>
                            Setujui

                        </button>

                    </form>

                    <form action="{{ route('detail-pembayaran.tolak',$pembayaran->id) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('PUT')

                        <button class="btn btn-danger">

                            <i class="fas fa-times"></i>
                            Tolak

                        </button>

                    </form>

                </div>

            @endif

            <hr>

            <a href="{{ route('detail-pembayaran.index') }}"
            class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>
                Kembali

            </a>

        </div>

        </div>

        @endsection
