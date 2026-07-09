<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Daftar user
     */
    public function index()
    {
        $users = User::latest()->get();

        return view(
            'admin.user-management.index',
            compact('users')
        );
    }

    /**
     * Detail user
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view(
            'admin.user-management.show',
            compact('user')
        );
    }

    /**
     * Hapus user
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()
            ->route('user-management.index')
            ->with(
                'success',
                'User berhasil dihapus.'
            );
    }
}
