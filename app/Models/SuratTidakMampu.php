<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratTidakMampu extends Model
{
    use HasFactory;

    protected $table = 'surat_tidak_mampu'; 

    protected $fillable = [
        'user_id',
        'foto_kk',
        'foto_pengantar',
        'keperluan',
        'tanggal_surat',
        'status',
        'alasan_tolak'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
