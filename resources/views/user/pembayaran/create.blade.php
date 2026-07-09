@extends('layouts.app')

@section('content')

<div class="container mt-4">

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-primary text-white">

                <h5 class="mb-0">
                    <i class="fas fa-credit-card mr-2"></i>
                    Upload Pembayaran
                </h5>

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

                <form action="{{ route('user.pembayaran.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">

                        <label>
                            Booking Yang Akan Dibayar
                        </label>

                        <select name="booking_id"
                                class="form-control"
                                required>

                            <option value="">
                                -- Pilih Booking --
                            </option>

                            @foreach($bookings as $booking)

                                <option value="{{ $booking->id }}">

                                    Booking #{{ $booking->id }}
                                    -
                                    {{ $booking->lapangan->nama_lapangan }}
                                    -
                                    Rp {{ number_format($booking->total_harga,0,',','.') }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="form-group">

                        <label>
                            Metode Pembayaran
                        </label>

                        <select name="metode_pembayaran"
                                class="form-control"
                                required>

                            <option value="Transfer Bank">
                                Transfer Bank
                            </option>

                            <option value="QRIS">
                                QRIS
                            </option>

                            <option value="Dana">
                                Dana
                            </option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>
                            Upload Bukti Transfer
                        </label>

                        <input type="file"
                               name="bukti_transfer"
                               class="form-control-file"
                               required>

                        <small class="text-muted">
                            Format: JPG, JPEG, PNG (Maksimal 2MB)
                        </small>

                    </div>

                    <hr>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-upload"></i>
                        Kirim Pembayaran

                    </button>

                    <a href="{{ route('user.pembayaran.index') }}"
                       class="btn btn-secondary">

                        <i class="fas fa-arrow-left"></i>
                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

</div>

@endsection
