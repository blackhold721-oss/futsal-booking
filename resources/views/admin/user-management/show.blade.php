@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Detail User
</h1>

<div class="card shadow mb-4">

<div class="card-header py-3">

    <h6 class="m-0 font-weight-bold text-primary">
        Informasi User
    </h6>

</div>

<div class="card-body">

    <table class="table table-bordered">

        <tr>

            <th width="250">
                Nama Lengkap
            </th>

            <td>
                {{ $user->name }}
            </td>

        </tr>

        <tr>

            <th>
                Email
            </th>

            <td>
                {{ $user->email }}
            </td>

        </tr>

        <tr>

            <th>
                Tanggal Daftar
            </th>

            <td>
                {{ $user->created_at->format('d F Y H:i') }}
            </td>

        </tr>

    </table>

    <a href="{{ route('user-management.index') }}"
       class="btn btn-secondary">

        <i class="fas fa-arrow-left"></i>
        Kembali

    </a>

</div>

</div>

@endsection
