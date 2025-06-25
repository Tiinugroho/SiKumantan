<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('surat_tidak_mampu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('tanggal_surat')->nullable();
            $table->string('foto_kk');
            $table->string('foto_pengantar');
            $table->text('keperluan');
            $table->string('status')->default('Menunggu Verifikasi');
            $table->text('alasan_tolak')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_tidak_mampu');
    }
};
