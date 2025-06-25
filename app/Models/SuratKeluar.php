<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';

    protected $fillable = [
        'nama_surat',
        'no_surat',
        'tanggal_keluar',
        'nik',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'jenis_pekerjaan',
        'alamat',
        'keperluan',
        'status',
        'tanggal_surat',
        'qr_code',
    ];
}
