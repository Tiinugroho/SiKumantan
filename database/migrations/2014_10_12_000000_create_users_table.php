<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique()->nullable(); // untuk admin/staff
            $table->string('nik')->unique()->nullable(); // untuk masyarakat
            $table->string('name');
            $table->string('email')->unique()->nullable(); // optional kalau mau membolehkan user tanpa email
                    
            // Informasi tambahan
            $table->string('alamat')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('jenis_pekerjaan')->nullable();
            $table->string('photo_ktp')->nullable();
            //tabel status ada di tabel verifikasi ya
            $table->string('password'); // untuk login


            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
