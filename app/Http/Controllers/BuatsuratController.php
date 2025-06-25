<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuatsuratController extends Controller
{
    // Tampilkan halaman form buat surat
    public function create()
    {
        return view('Buatsurat'); // pastikan views-nya di resources/views/Buatsurat.blade.php
    }

    // Proses simpan data surat
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'jenis_surat' => 'required',
            'nama_pemohon' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'keperluan' => 'required',
            'tanggal_surat' => 'required',
            'ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Proses upload KTP
        $ktpName = time().'.'.$request->ktp->extension();
        $request->ktp->move(public_path('uploads/ktp'), $ktpName);

        // Simpan ke database (contoh tanpa model)
        // Bisa pakai DB::table atau model kalau sudah siap model-nya

        // Contoh pakai model Surat
        // Surat::create([
        //     'jenis_surat' => $request->jenis_surat,
        //     ...
        // ]);

        // Redirect + kirim flash message
        return redirect()->route('Buatsurat')->with('message', 'Data surat berhasil disimpan!');
    }
}
