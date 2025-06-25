<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratTidakMampu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\SuratKeluar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class SuratTidakMampuController extends Controller
{
    // Admin lihat data surat
    public function index()
    {
        $data = SuratTidakMampu::all();
        return view('admin.admin-datasurat.keterangan_tidak_mampu', compact('data'));
    }

    // Form pengajuan user
    public function User()
    {
        return view('User.keterangan_tidak_mampu');
    }

    public function detail($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        return view('admin.suratkeluar.detail', compact('surat'));
    }

    // Simpan pengajuan surat
    public function store(Request $request)
    {
        $request->validate([
            'foto_kk'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foto_pengantar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'keperluan'      => 'required|string'
        ]);

        $kk        = $request->file('foto_kk')->store('kk', 'public');
        $pengantar = $request->file('foto_pengantar')->store('pengantar', 'public');

        SuratTidakMampu::create([
            'user_id'        => Auth::id(),
            'foto_kk'        => $kk,
            'foto_pengantar' => $pengantar,
            'keperluan'      => $request->keperluan,
            'tanggal_surat'  => date('Y-m-d'),
            'status'         => 'Menunggu Verifikasi'
        ]);

        return redirect()->back()->with('success', 'Surat berhasil diajukan!');
    }

    // Verifikasi surat (ubah status ke Disetujui)
    public function verifikasi($id)
    {
        $surat = SuratTidakMampu::findOrFail($id);
        $surat->update([
            'status' => 'Disetujui'
        ]);

        return redirect()->back()->with('success', 'Surat berhasil diverifikasi.');
    }

    // Form input no_surat & tanggal_keluar
    public function buatSurat($id)
    {
        $surat = SuratTidakMampu::findOrFail($id);
        return view('admin.Buatsurat.Suket_Tidak_Mampu', compact('surat'));
    }

    // Simpan surat ke SuratKeluar
    public function storeSurat(Request $request, $id)
    {
        $request->validate([
            'no_surat'       => 'required|string',
            'tanggal_keluar' => 'required|date'
        ]);
        
        // Ambil data surat dan user-nya
        $surat = SuratTidakMampu::findOrFail($id);
        $user  = User::findOrFail($surat->user_id); // <-- langsung fresh dari tabel user
        // Masukkan ke tabel surat_keluar
        SuratKeluar::create([
            'nama_surat'     => 'Surat Keterangan Tidak Mampu',
            'no_surat'       => $request->no_surat,
            'tanggal_keluar' => $request->tanggal_keluar,
            'nik'            => $user->nik,
            'nama'           => $user->name,
            'jenis_kelamin'  => $user->jenis_kelamin,
            'tempat_lahir'   => $user->tempat_lahir,
            'tanggal_lahir'  => $user->tanggal_lahir,
            'agama'          => $user->agama,
            'jenis_pekerjaan' => $user->jenis_pekerjaan,
            'alamat'         => $user->alamat,
            'keperluan'      => $surat->keperluan,
            'status'         => 'Menunggu ACC Sekda',
            'tanggal_surat'  => $surat->tanggal_surat
        ]);

        // Update status di tabel surat_tidak_mampu
        $surat->update([
            'status' => 'Menunggu Tanda Tangan Sekretaris'
        ]);

        return redirect()->route('admin.admin-datasurat.keterangan_tidak_mampu')->with('success', 'Surat berhasil diterbitkan.');
    }


    public function previewSurat($id)
    {
        $surat = SuratKeluar::findOrFail($id);

        

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('formsurat.suket_tidak_mampu_pdf', [
            'no_surat'       => $surat->no_surat,
            'nama'           => $surat->nama,
            'nik'            => $surat->nik,
            'jenis_kelamin'  => $surat->jenis_kelamin,
            'tempat_lahir'   => $surat->tempat_lahir,
            'tanggal_lahir'  => $surat->tanggal_lahir,
            'agama'          => $surat->agama,
            'jenis_pekerjaan' => $surat->jenis_pekerjaan,
            'alamat'         => $surat->alamat,
            'keperluan'      => $surat->keperluan,
            'tanggal_keluar' => $surat->tanggal_keluar,
            'tanggal_surat'  => $surat->tanggal_surat,
        ])->setPaper('A4', 'portrait');

        return $pdf->stream('Surat_Tidak_Mampu_' . $surat->nama . '.pdf');
    }

    public function downloadSurat($id)
    {
        $surat = SuratKeluar::findOrFail($id);

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('formsurat.suket_tidak_mampu_pdf', [
            'no_surat'       => $surat->no_surat,
            'nama'           => $surat->nama,
            'nik'            => $surat->nik,
            'jenis_kelamin'  => $surat->jenis_kelamin,
            'tempat_lahir'   => $surat->tempat_lahir ?? '-', // pastikan kolom ini ada di DB
            'tanggal_lahir'  => $surat->tanggal_lahir ?? '-',
            'agama'          => $surat->agama ?? '-',
            'jenis_pekerjaan' => $surat->jenis_pekerjaan ?? '-',
            'alamat'         => $surat->alamat ?? '-',
            'keperluan'      => $surat->keperluan,
            'tanggal_keluar' => $surat->tanggal_keluar,
        ])->setPaper('A4', 'portrait');

        return $pdf->download('Surat_Tidak_Mampu_' . $surat->nama . '.pdf');
    }
}
