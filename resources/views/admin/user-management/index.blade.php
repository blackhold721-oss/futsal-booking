@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Manajemen User
</h1>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card shadow mb-4">


<div class="card-header py-3 d-flex justify-content-between align-items-center">

    <h6 class="m-0 font-weight-bold text-primary">
        Data User
    </h6>

    <a href="{{ route('admin.dashboard') }}"
       class="btn btn-secondary btn-sm">

        <i class="fas fa-arrow-left"></i>
        Kembali

    </a>

</div>

<div class="card-body">

    <div class="table-responsive">

        <table class="table table-bordered table-hover">

            <thead class="thead-light">

                <tr>

                    <th width="60">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal Daftar</th>
                    <th width="180">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($users as $user)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $user->name }}
                    </td>

                    <td>
                        {{ $user->email }}
                    </td>

                    <td>
                        {{ $user->created_at->format('d-m-Y') }}
                    </td>

                    <td>

                        <a href="{{ route('user-management.show',$user->id) }}"
                           class="btn btn-info btn-sm">

                            <i class="fas fa-eye"></i>

                        </a>

                        <form action="{{ route('user-management.destroy',$user->id) }}"
                              method="POST"
                              style="display:inline-block">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Yakin hapus user ini?')"
                                    class="btn btn-danger btn-sm">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">

                        Data user kosong

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>


</div>

@endsection
