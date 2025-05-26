<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
  public function index()
{
    $suratMasuk = SuratMasuk::latest()->get();
    return view('admin.surat-masuk.index', compact('suratmasuk'));
}

public function store(Request $request)
{
    $request->validate([
        'nomor_surat' => 'required',
        'tanggal_surat' => 'required|date',
        'pengirim' => 'required',
        'perihal' => 'required',
        'file_surat' => 'required|file|mimes:pdf,jpg,jpeg,png'
    ]);

    $file = $request->file('file_surat')->store('suratmasuk');

    SuratMasuk::create([
        'nomor_surat' => $request->nomor_surat,
        'tanggal_surat' => $request->tanggal_surat,
        'pengirim' => $request->pengirim,
        'perihal' => $request->perihal,
        'file_surat' => $file
    ]);

    return redirect()->back()->with('success', 'Surat masuk berhasil disimpan.');
}

}
