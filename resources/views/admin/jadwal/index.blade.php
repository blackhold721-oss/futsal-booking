@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Kelola Jadwal Lapangan
</h1>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card shadow mb-4">

<div class="card-header py-3 d-flex justify-content-between align-items-center">

    <h6 class="m-0 font-weight-bold text-primary">
        Data Jadwal Lapangan
    </h6>

    <a href="{{ route('jadwal.create') }}"
       class="btn btn-primary btn-sm">

        <i class="fas fa-plus"></i>
        Tambah Jadwal

    </a>

</div>

<div class="card-body">

    <div class="table-responsive">

        <table class="table table-bordered table-hover">

            <thead class="thead-light">

                <tr>

                    <th width="60">No</th>
                    <th>Lapangan</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th width="220">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($jadwals as $jadwal)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $jadwal->lapangan->nama_lapangan }}
                    </td>

                    <td>
                        {{ $jadwal->jam_mulai }}
                    </td>

                    <td>
                        {{ $jadwal->jam_selesai }}
                    </td>

                    <td>

                        <a href="{{ route('jadwal.show', $jadwal->id) }}"
                           class="btn btn-info btn-sm">

                            <i class="fas fa-eye"></i>

                        </a>

                        <a href="{{ route('jadwal.edit', $jadwal->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                        </a>

                        <form
                            action="{{ route('jadwal.destroy', $jadwal->id) }}"
                            method="POST"
                            style="display:inline-block">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                onclick="return confirm('Yakin ingin menghapus jadwal ini?')"
                                class="btn btn-danger btn-sm">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">

                        Belum ada data jadwal

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection
