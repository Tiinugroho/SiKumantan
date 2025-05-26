<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'nip',
        'nik',
        'name',
        'email',
        'photo_ktp',
        'password',
        'status', // tambahin ini biar mass assignment bisa juga update status kalau butuh
    ];
}
