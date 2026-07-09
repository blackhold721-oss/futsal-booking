@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Tambah Lapangan
</h1>

<div class="card shadow mb-4">

<div class="card-header py-3">

    <h6 class="m-0 font-weight-bold text-primary">
        Form Tambah Lapangan
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

    <form action="{{ route('lapangan.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="form-group">

            <label>Nama Lapangan</label>

            <input type="text"
                   name="nama_lapangan"
                   class="form-control"
                   value="{{ old('nama_lapangan') }}"
                   required>

        </div>

        <div class="form-group">

            <label>Jenis Rumput</label>

            <select name="jenis_rumput"
                    class="form-control"
                    required>

                <option value="">
                    -- Pilih Jenis Rumput --
                </option>

                <option value="Sintetis">
                    Sintetis
                </option>

                <option value="Interlock">
                    Interlock
                </option>

                <option value="Vinyil">
                    Vinyil
                </option>

                <option value="Semen">
                    Semen
                </option>

            </select>

        </div>

        <div class="form-group">

            <label>Harga Per Jam</label>

            <input type="number"
                   name="harga_per_jam"
                   class="form-control"
                   value="{{ old('harga_per_jam') }}"
                   required>

        </div>

        <div class="form-group">

            <label>Foto Lapangan</label>

            <input type="file"
                   name="foto_lapangan"
                   class="form-control-file">

        </div>

        <div class="form-group">

            <label>Deskripsi</label>

            <textarea name="deskripsi"
                      rows="4"
                      class="form-control">{{ old('deskripsi') }}</textarea>

        </div>

        <div class="form-group">

            <label>Status</label>

            <select name="status"
                    class="form-control">

                <option value="Tersedia">
                    Tersedia
                </option>

                <option value="Perbaikan">
                    Perbaikan
                </option>

            </select>

        </div>

        <hr>

        <button type="submit"
                class="btn btn-primary">

            <i class="fas fa-save"></i>
            Simpan

        </button>

        <a href="{{ route('lapangan.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            Kembali

        </a>

    </form>

</div>

</div>

@endsection
