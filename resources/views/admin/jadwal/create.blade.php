@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Tambah Jadwal
</h1>

<div class="card shadow mb-4">

<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
        Form Tambah Jadwal
    </h6>
</div>

<div class="card-body">

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('jadwal.store') }}" method="POST">

        @csrf

        <div class="form-group">

            <label>Lapangan</label>

            <select name="lapangan_id"
                    class="form-control"
                    required>

                <option value="">
                    -- Pilih Lapangan --
                </option>

                @foreach($lapangans as $lapangan)

                    <option value="{{ $lapangan->id }}">
                        {{ $lapangan->nama_lapangan }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="form-group">

            <label>Jam Mulai</label>

            <input type="time"
                   name="jam_mulai"
                   class="form-control"
                   required>

        </div>

        <div class="form-group">

            <label>Jam Selesai</label>

            <input type="time"
                   name="jam_selesai"
                   class="form-control"
                   required>

        </div>

        <hr>

        <button type="submit"
                class="btn btn-primary">

            <i class="fas fa-save"></i>
            Simpan

        </button>

        <a href="{{ route('jadwal.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            Kembali

        </a>

    </form>

</div>

</div>

@endsection
