<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('surat_keluar', function (Blueprint $table) {
        $table->string('tempat_lahir')->nullable();
        $table->date('tanggal_lahir')->nullable();
        $table->string('agama')->nullable();
        $table->string('jenis_pekerjaan')->nullable();
        $table->string('alamat')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('surat_keluar', function (Blueprint $table) {
        $table->dropColumn([
            'tempat_lahir',
            'tanggal_lahir',
            'agama',
            'jenis_pekerjaan',
            'alamat'
        ]);
    });
}
};