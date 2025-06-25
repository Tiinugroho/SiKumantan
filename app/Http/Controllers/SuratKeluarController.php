<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $data = SuratKeluar::all();
        return view('admin.suratkeluar.index', compact('data'));
    }
      public function show($id)
    {
        $data = SuratKeluar::findOrFail($id);
        return view('admin.suratkeluar.show', compact('data'));
    }

    public function edit($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        return view('admin.suratkeluar.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_surat' => 'required',
            'tanggal_keluar' => 'required|date',
            'keperluan' => 'required|string',
            'status' => 'required'
        ]);

        $surat = SuratKeluar::findOrFail($id);
        $surat->update($request->all());

        return redirect()->route('admin.suratkeluar')->with('success', 'Data surat berhasil diperbarui.');
    }
}
