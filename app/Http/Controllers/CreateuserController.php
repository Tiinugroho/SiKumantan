<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class CreateuserController extends Controller
{
    public function index()
    {
        $datauser = user::all();
        return view('admin.data-user.index', compact('datauser'));
    }

    public function create()
    {
        return view('admin.data-user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|unique:users,nik',
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'required|string',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'kewarganegaraan' => 'required|string',
        ]);

        user::create($request->all());

        return redirect()->route('user.index')->with('success', 'Data user berhasil ditambahkan!');
    }
}
