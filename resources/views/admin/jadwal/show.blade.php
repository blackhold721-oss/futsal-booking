@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Detail Jadwal
</h1>

<div class="card shadow mb-4">

<div class="card-header py-3">

    <h6 class="m-0 font-weight-bold text-success">
        Informasi Jadwal
    </h6>

</div>

<div class="card-body">

    <table class="table table-bordered">

        <tr>

            <th width="250">
                Nama Lapangan
            </th>

            <td>
                {{ $jadwal->lapangan->nama_lapangan }}
            </td>

        </tr>

        <tr>

            <th>
                Jam Mulai
            </th>

            <td>
                {{ $jadwal->jam_mulai }}
            </td>

        </tr>

        <tr>

            <th>
                Jam Selesai
            </th>

            <td>
                {{ $jadwal->jam_selesai }}
            </td>

        </tr>

        <tr>

            <th>
                Durasi
            </th>

            <td>

                {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->diffInHours(\Carbon\Carbon::parse($jadwal->jam_selesai)) }}

                Jam

            </td>

        </tr>

    </table>

    <a href="{{ route('jadwal.edit', $jadwal->id) }}"
       class="btn btn-warning">

        <i class="fas fa-edit"></i>
        Edit

    </a>

    <a href="{{ route('jadwal.index') }}"
       class="btn btn-secondary">

        <i class="fas fa-arrow-left"></i>
        Kembali

    </a>

</div>

</div>

@endsection
