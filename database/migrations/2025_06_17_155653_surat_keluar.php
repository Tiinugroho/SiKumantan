<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('nama_surat');
            $table->string('no_surat');
            $table->date('tanggal_keluar');
            $table->string('nik');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->text('keperluan');
            $table->string('status')->default('Aktif');
            $table->date('tanggal_surat');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_keluar');
    }
};
