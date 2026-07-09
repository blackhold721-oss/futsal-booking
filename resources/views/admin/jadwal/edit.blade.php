@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Edit Jadwal
</h1>

<div class="card shadow mb-4">

<div class="card-header py-3">

    <h6 class="m-0 font-weight-bold text-warning">
        Form Edit Jadwal
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

    <form action="{{ route('jadwal.update', $jadwal->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">

            <label>Lapangan</label>

            <select name="lapangan_id"
                    class="form-control"
                    required>

                @foreach($lapangans as $lapangan)

                    <option value="{{ $lapangan->id }}"
                        {{ $jadwal->lapangan_id == $lapangan->id ? 'selected' : '' }}>

                        {{ $lapangan->nama_lapangan }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="form-group">

            <label>Jam Mulai</label>

            <input type="time"
                   name="jam_mulai"
                   value="{{ $jadwal->jam_mulai }}"
                   class="form-control"
                   required>

        </div>

        <div class="form-group">

            <label>Jam Selesai</label>

            <input type="time"
                   name="jam_selesai"
                   value="{{ $jadwal->jam_selesai }}"
                   class="form-control"
                   required>

        </div>

        <hr>

        <button type="submit"
                class="btn btn-warning">

            <i class="fas fa-edit"></i>
            Update

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
