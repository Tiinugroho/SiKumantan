<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $datauser = User::with('status')->get();
        return view('users.index', compact('users')); // kirim ke view users/index.blade.php
    }

   public function verifikasi($id)
{
    $user = User::findOrFail($id);
    $user->status = 'aktif';
    $user->save();

    return redirect()->back()->with('success', 'Akun berhasil diverifikasi!');
}


}

