<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'nip',
        'nik',
        'name',
        'email',
        'status',
        'alamat',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan',
        'jenis_pekerjaan',
        'photo_ktp',
        'password',
    ];

    protected $hidden = ['password', 'remember_token'];

    // Scope masyarakat
    public function scopeMasyarakat($query)
    {
        return $query->role('masyarakat')->where('status', 'aktif');
    }
}
