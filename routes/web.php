<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\{
    AuthController,
    DashboardController,
    BuatsuratController,
    HalamansuratController,
    UserController,
    SuratTidakMampuController,
    SuratKeluarController
};

// Halaman utama
Route::get('/', fn() => view('welcome'))->name('welcome');

// Auth (untuk guest)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Area admin & user setelah login
Route::middleware('auth')->group(function () {

    // Prefix admin
    Route::prefix('admin')->middleware('role:kades|sekretaris|staff-Tu')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/data-user', [UserController::class, 'index'])->name('data.user');

        // Manajemen user (masyarakat)
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('users.index');
            Route::get('/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/', [UserController::class, 'store'])->name('users.store');
            Route::get('/verifikasi/{id}', [UserController::class, 'verifikasi'])->name('users.verifikasi');
            Route::post('/tolak/{id}', [UserController::class, 'tolak'])->name('users.tolak');
        });

        // Surat Tidak Mampu
        Route::get('/surat-tidak-mampu', [SuratTidakMampuController::class, 'index'])->name('admin.admin-datasurat.keterangan_tidak_mampu');
        Route::get('/surat-tidak-mampu/{id}/verifikasi', [SuratTidakMampuController::class, 'verifikasi'])->name('admin.surat_tidak_mampu.verifikasi');
        Route::get('/surat-tidak-mampu/{id}/buat-surat', [SuratTidakMampuController::class, 'buatSurat'])->name('admin.Buatsurat.Suket_Tidak_Mampu');
        Route::post('/surat-tidak-mampu/{id}/buat-surat', [SuratTidakMampuController::class, 'storeSurat'])->name('admin.surat_tidak_mampu.store_surat');

        // Surat Keluar
        Route::get('/surat-keluar', [SuratKeluarController::class, 'index'])->name('admin.suratkeluar.index');
        Route::get('/suratkeluar/{id}', [SuratKeluarController::class, 'show'])->name('admin.suratkeluar.show');
        Route::get('/surat-keluar/{id}/edit', [SuratKeluarController::class, 'edit'])->name('admin.suratkeluar.edit');
        Route::post('/surat-keluar/{id}/update', [SuratKeluarController::class, 'update'])->name('admin.suratkeluar.update');

        // Terbitkan Surat
        Route::get('/terbitkan-surat/{id}', [SuratTidakMampuController::class, 'terbitkanSurat'])->name('terbitkan.surat');
    });

    // Fitur User (masyarakat)
    Route::get('/user/surat-tidak-mampu', [SuratTidakMampuController::class, 'User'])->name('User.keterangan_tidak_mampu');
    Route::post('/user/surat-tidak-mampu', [SuratTidakMampuController::class, 'store'])->name('keterangan_tidak_mampu.store');

    // Halaman surat
    Route::get('/Halamansurat', [HalamansuratController::class, 'Halamansurat'])->name('Halamansurat');

    // Data user
    Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
    Route::get('/data-user/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/data-user/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/data-user/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    //preview surat
    Route::get('/surat_tidak_mampu/preview/{id}', [SuratTidakMampuController::class, 'previewSurat'])->name('surat_tidak_mampu.preview');
    Route::get('/surat_tidak_mampu/download/{id}', [SuratTidakMampuController::class, 'downloadSurat'])->name('surat_tidak_mampu.download');

    Route::get('/coba-pdf', function () {
        $pdf = Pdf::loadView('pdf.contoh'); // nanti kita buat blade-nya di resources/views/pdf/contoh.blade.php
        return $pdf->stream('contoh-surat.pdf');
    });
});
