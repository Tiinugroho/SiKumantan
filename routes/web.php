<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuatsuratController;
use App\Http\Controllers\DatauserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HalamansuratController;
use App\Http\Controllers\CreateuserController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// bcak to welcome
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Auth Routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard URL route-nya
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:kades|sekretaris|staff-Tu']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Dashboard & Data User
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/data-user', [DatauserController::class, 'index'])->name('data.user');
});

// User Buat Surat
Route::get('/Halamansurat', [HalamansuratController::class, 'Halamansurat'])->middleware('ceklogin')->name('Halamansurat');
Route::post('/simpansurat', [HalamansuratController::class, 'store'])->name('simpansurat');
Route::get('/buatsurat', [BuatsuratController::class, 'create'])->name('buatsurat.create');
Route::get('/buatsurat', [BuatsuratController::class, 'create'])->middleware('ceklogin')->name('buatsurat');


// Surat Masuk
Route::prefix('suratmasuk')->group(function () {
    Route::get('/', [SuratMasukController::class, 'index'])->name('suratmasuk.index');
    Route::post('/store', [SuratMasukController::class, 'store'])->name('suratmasuk.store');
});

// Surat Keluar
Route::prefix('suratkeluar')->group(function () {
    Route::get('/', [SuratKeluarController::class, 'index'])->name('suratkeluar.index');
    Route::post('/store', [SuratKeluarController::class, 'store'])->name('suratkeluar.store');
});

// Data User Resource
Route::resource('user', CreateuserController::class);


//user
Route::get('/users', [UserController::class, 'index'])->name('users.index');

//verifikasi
Route::get('/user/verifikasi/{id}', [UserController::class, 'verifikasi'])->name('user.verifikasi');


