<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name'=> 'kades']);
        Role::create(['name'=> 'sekretaris']);
        Role::create(['name'=> 'staff-Tu']);
        Role::create(['name'=> 'masyarakat']);
        
    }
}
