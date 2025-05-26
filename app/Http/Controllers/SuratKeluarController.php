<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluar = SuratKeluar::latest()->get();
        return view('admin.surat-keluar.index', compact('suratKeluar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'tujuan' => 'required',
            'perihal' => 'required',
            'file_surat' => 'required|file|mimes:pdf,jpg,jpeg,png'
        ]);

        $file = $request->file('file_surat')->store('suratkeluar');

        SuratKeluar::create([
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'file_surat' => $file
        ]);

        return redirect()->back()->with('success', 'Surat keluar berhasil disimpan.');
    }
}
