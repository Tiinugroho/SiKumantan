<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kadesRole = Role::where('name', 'kades')->first();
        $sekretaris = Role::where('name', 'sekretaris')->first();
        $staffRole = Role::where('name', 'staff-Tu')->first();
        $masyarakatRole = Role::where('name', 'masyarakat')->first();

        // Kades
        $kades = User::firstOrCreate(
            ['nip' => '112233445566778899'],
            [
                'name' => 'Kepala Desa',
                'email' => 'kades@desa.com',
                'password' => Hash::make('kepaladesa2025'),
                'status' => 'aktif'
            ]
        );
        $kades->assignRole($kadesRole);

        // Sekda
        $sekda = User::firstOrCreate(
            ['nip' => '223344556677889900'],
            [
                'name' => 'Sekretaris Desa',
                'email' => 'sekda1@desa.com',
                'password' => Hash::make('sekretaris2025'),
                'status' => 'aktif'
            ]
        );
        $sekda->assignRole($sekretaris);

        // Staff TU
        $staff = User::firstOrCreate(
            ['nip' => '334455667788990011'],
            [
                'name' => 'Staff Tata Usaha',
                'email' => 'staff@desa.com',
                'password' => Hash::make('staff2025'),
                'status' => 'aktif'
            ]
        );
        $staff->assignRole($staffRole);
    }
}
