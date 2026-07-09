@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Edit Lapangan
</h1>

<div class="card shadow mb-4">

<div class="card-header py-3">

    <h6 class="m-0 font-weight-bold text-primary">
        Form Edit Lapangan
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

    <form action="{{ route('lapangan.update', $lapangan->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group">

            <label>Nama Lapangan</label>

            <input type="text"
                   name="nama_lapangan"
                   class="form-control"
                   value="{{ old('nama_lapangan',$lapangan->nama_lapangan) }}"
                   required>

        </div>

        <div class="form-group">

            <label>Jenis Rumput</label>

            <select name="jenis_rumput"
                    class="form-control">

                <option value="Sintetis" {{ $lapangan->jenis_rumput == 'Sintetis' ? 'selected' : '' }}>
                    Sintetis
                </option>

                <option value="Interlock" {{ $lapangan->jenis_rumput == 'Interlock' ? 'selected' : '' }}>
                    Interlock
                </option>

                <option value="Vinyil" {{ $lapangan->jenis_rumput == 'Vinyil' ? 'selected' : '' }}>
                    Vinyil
                </option>

                <option value="Semen" {{ $lapangan->jenis_rumput == 'Semen' ? 'selected' : '' }}>
                    Semen
                </option>

            </select>

        </div>

        <div class="form-group">

            <label>Harga Per Jam</label>

            <input type="number"
                   name="harga_per_jam"
                   class="form-control"
                   value="{{ old('harga_per_jam',$lapangan->harga_per_jam) }}"
                   required>

        </div>

        <div class="form-group">

            <label>Foto Saat Ini</label>

            <br>

            @if($lapangan->foto_lapangan)

                <img src="{{ asset('storage/'.$lapangan->foto_lapangan) }}"
                     width="250"
                     class="img-thumbnail mb-3">

            @else

                <p class="text-muted">
                    Tidak ada foto
                </p>

            @endif

        </div>

        <div class="form-group">

            <label>Ganti Foto</label>

            <input type="file"
                   name="foto_lapangan"
                   class="form-control-file">

        </div>

        <div class="form-group">

            <label>Deskripsi</label>

            <textarea name="deskripsi"
                      rows="4"
                      class="form-control">{{ old('deskripsi',$lapangan->deskripsi) }}</textarea>

        </div>

        <div class="form-group">

            <label>Status</label>

            <select name="status"
                    class="form-control">

                <option value="Tersedia"
                    {{ $lapangan->status == 'Tersedia' ? 'selected' : '' }}>
                    Tersedia
                </option>

                <option value="Perbaikan"
                    {{ $lapangan->status == 'Perbaikan' ? 'selected' : '' }}>
                    Perbaikan
                </option>

            </select>

        </div>

        <hr>

        <button type="submit"
                class="btn btn-warning">

            <i class="fas fa-save"></i>
            Update

        </button>

        <a href="{{ route('lapangan.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

</div>

@endsection
