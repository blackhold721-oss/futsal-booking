@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Detail Lapangan
</h1>

<div class="card shadow mb-4">

<div class="card-header py-3">

    <h6 class="m-0 font-weight-bold text-primary">
        Informasi Lapangan
    </h6>

</div>

<div class="card-body">

    <div class="row">

        <div class="col-md-4">

            @if($lapangan->foto_lapangan)

                <img src="{{ asset('storage/'.$lapangan->foto_lapangan) }}"
                     class="img-fluid img-thumbnail">

            @else

                <img src="https://via.placeholder.com/400x300?text=No+Image"
                     class="img-fluid img-thumbnail">

            @endif

        </div>

        <div class="col-md-8">

            <table class="table table-bordered">

                <tr>

                    <th width="200">
                        Nama Lapangan
                    </th>

                    <td>
                        {{ $lapangan->nama_lapangan }}
                    </td>

                </tr>

                <tr>

                    <th>
                        Jenis Rumput
                    </th>

                    <td>
                        {{ $lapangan->jenis_rumput }}
                    </td>

                </tr>

                <tr>

                    <th>
                        Harga Per Jam
                    </th>

                    <td>

                        Rp {{ number_format($lapangan->harga_per_jam,0,',','.') }}

                    </td>

                </tr>

                <tr>

                    <th>
                        Status
                    </th>

                    <td>

                        @if($lapangan->status == 'Tersedia')

                            <span class="badge badge-success">
                                Tersedia
                            </span>

                        @else

                            <span class="badge badge-danger">
                                Perbaikan
                            </span>

                        @endif

                    </td>

                </tr>

                <tr>

                    <th>
                        Deskripsi
                    </th>

                    <td>
                        {{ $lapangan->deskripsi }}
                    </td>

                </tr>

            </table>

            <a href="{{ route('lapangan.edit',$lapangan->id) }}"
               class="btn btn-warning">

                <i class="fas fa-edit"></i>
                Edit

            </a>

            <a href="{{ route('lapangan.index') }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>
                Kembali

            </a>

        </div>

    </div>

</div>

</div>

@endsection
