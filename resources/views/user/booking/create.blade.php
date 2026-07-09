@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Booking Lapangan
    </h1>

    @if(session('error'))

        <div class="alert alert-danger">

            {{ session('error') }}

        </div>

    @endif

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Form Booking Lapangan
            </h6>

        </div>

        <div class="card-body">

            <form action="{{ route('user.booking.store') }}"
                  method="POST">

                @csrf

                <div class="form-group">

                    <label>Lapangan</label>

                    <select name="lapangan_id"
                            id="lapangan_id"
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

                    <label>Tanggal Main</label>

                    <input type="date"
                           name="tanggal_main"
                           id="tanggal_main"
                           class="form-control"
                           required>

                </div>

                <div class="form-group">

                    <label>Jadwal Tersedia</label>

                    <select name="jadwal_id"
                            id="jadwal_id"
                            class="form-control"
                            required>

                        <option value="">
                            -- Pilih Jadwal --
                        </option>

                    </select>

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    <i class="fas fa-save"></i>
                    Booking Sekarang

                </button>

                <a href="{{ route('user.booking.index') }}"
                   class="btn btn-secondary">

                    <i class="fas fa-arrow-left"></i>
                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

<script>

function loadJadwal() {

    let lapangan =
        document.getElementById('lapangan_id').value;

    let tanggal =
        document.getElementById('tanggal_main').value;

    if(lapangan === '' || tanggal === '') {
        return;
    }

    fetch(`/get-jadwal?lapangan_id=${lapangan}&tanggal=${tanggal}`)

    .then(response => response.json())

    .then(data => {

        let jadwal =
            document.getElementById('jadwal_id');

        jadwal.innerHTML =
            '<option value="">-- Pilih Jadwal --</option>';

        data.forEach(item => {

            jadwal.innerHTML += `
                <option value="${item.id}">
                    ${item.jam_mulai} - ${item.jam_selesai}
                </option>
            `;

        });

    });

}

document.getElementById('lapangan_id')
.addEventListener('change', loadJadwal);

document.getElementById('tanggal_main')
.addEventListener('change', loadJadwal);

</script>

@endsection