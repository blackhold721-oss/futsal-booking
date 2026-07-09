@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Data Lapangan
</h1>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card shadow mb-4">

<div class="card-header py-3 d-flex justify-content-between align-items-center">

    <h6 class="m-0 font-weight-bold text-primary">
        Daftar Lapangan
    </h6>

    <a href="{{ route('lapangan.create') }}"
       class="btn btn-primary btn-sm">

        <i class="fas fa-plus"></i>
        Tambah Lapangan

    </a>

</div>

<div class="card-body">

    <div class="table-responsive">

        <table class="table table-bordered table-hover">

            <thead class="thead-light">

                <tr>

                    <th width="50">No</th>
                    <th width="120">Foto</th>
                    <th>Nama Lapangan</th>
                    <th>Jenis Rumput</th>
                    <th>Harga/Jam</th>
                    <th>Status</th>
                    <th width="220">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($lapangans as $lapangan)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td class="text-center">

                        @if($lapangan->foto_lapangan)

                            <img
                                src="{{ asset('storage/'.$lapangan->foto_lapangan) }}"
                                width="100"
                                class="img-thumbnail">

                        @else

                            <span class="text-muted">
                                Tidak Ada Foto
                            </span>

                        @endif

                    </td>

                    <td>
                        {{ $lapangan->nama_lapangan }}
                    </td>

                    <td>
                        {{ $lapangan->jenis_rumput }}
                    </td>

                    <td>

                        Rp {{ number_format($lapangan->harga_per_jam,0,',','.') }}

                    </td>

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

                    <td>

                        <a href="{{ route('lapangan.show',$lapangan->id) }}"
                           class="btn btn-info btn-sm">

                            <i class="fas fa-eye"></i>

                        </a>

                        <a href="{{ route('lapangan.edit',$lapangan->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                        </a>

                        <form
                            action="{{ route('lapangan.destroy',$lapangan->id) }}"
                            method="POST"
                            style="display:inline-block">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                class="btn btn-danger btn-sm">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center">

                        Belum ada data lapangan

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection
