<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\DaftarPoliController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\JadwalPeriksaController;
use App\Http\Controllers\PasienController;


// Halaman utama (publik)
Route::get('/', fn () => view('layouts.landing_page'))->name('landing');

// ========== AUTH ==========
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ========== ADMIN ==========
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/pasien', [AdminController::class, 'pasien'])->name('admin.pasien');
    Route::post('/pasien', [AdminController::class, 'storePasien'])->name('admin.pasien.store');
    

    Route::get('/poli', [PoliController::class, 'index'])->name('admin.poli');
    Route::get('/poli/create', [PoliController::class, 'create'])->name('admin.poli.create');
    Route::post('/poli', [PoliController::class, 'store'])->name('admin.poli.store');
    Route::get('/poli/{id}/edit', [PoliController::class, 'edit'])->name('admin.poli.edit');
    Route::put('/poli/{id}', [PoliController::class, 'update'])->name('admin.poli.update');
    Route::delete('/poli/{id}', [PoliController::class, 'destroy'])->name('admin.poli.destroy');

       Route::get('/obat', [App\Http\Controllers\ObatController::class, 'index'])->name('admin.obat');
    Route::get('/obat/create', [App\Http\Controllers\ObatController::class, 'create'])->name('admin.obat.create');
    Route::post('/obat', [App\Http\Controllers\ObatController::class, 'store'])->name('admin.obat.store');
    Route::get('/obat/{id}/edit', [App\Http\Controllers\ObatController::class, 'edit'])->name('admin.obat.edit');
    Route::put('/obat/{id}', [App\Http\Controllers\ObatController::class, 'update'])->name('admin.obat.update');
    Route::delete('/obat/{id}', [App\Http\Controllers\ObatController::class, 'destroy'])->name('admin.obat.destroy');

    Route::resource('dokter', \App\Http\Controllers\DokterController::class)->middleware(['auth', 'role:admin']);

});




// ========== DOKTER ==========
Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->group(function () {
    Route::get('/dashboard', fn () => view('dokter.dashboard'))->name('dokter.dashboard');

    // Daftar Poli
    Route::get('/daftar-poli', [DokterController::class, 'daftarPoli'])->name('dokter.daftar-poli');

    // Jadwal Periksa
    Route::get('/jadwal-periksa', [JadwalPeriksaController::class, 'index'])->name('dokter.jadwal.index');
    Route::get('/jadwal-periksa/create', [JadwalPeriksaController::class, 'create'])->name('dokter.jadwal.create');
    Route::post('/jadwal-periksa', [JadwalPeriksaController::class, 'store'])->name('dokter.jadwal.store');
    Route::get('/jadwal-periksa/{jadwal}/edit', [JadwalPeriksaController::class, 'edit'])->name('dokter.jadwal.edit');
    Route::put('/jadwal-periksa/{jadwal}', [JadwalPeriksaController::class, 'update'])->name('dokter.jadwal.update');

    // Pemeriksaan Pasien
    Route::get('/memeriksa', [PeriksaController::class, 'index'])->name('dokter.periksa.index');
    Route::get('/memeriksa/{id}', [PeriksaController::class, 'edit'])->name('dokter.periksa.edit');
    Route::post('/memeriksa/{id}', [PeriksaController::class, 'update'])->name('dokter.periksa.update');


    
    Route::get('/memeriksa', [PeriksaController::class, 'index'])->name('dokter.periksa.index');
    Route::get('/riwayat', [PeriksaController::class, 'riwayat'])->name('dokter.riwayat');
    Route::get('/profil', [DokterController::class, 'profil'])->name('dokter.profil');
    Route::post('/profil/update', [DokterController::class, 'updateProfil'])->name('dokter.profil.update');

    Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
});


// ========== PASIEN ==========
    Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->group(function () {
    Route::get('/dashboard', [PasienController::class, 'index'])->name('pasien.dashboard');
    Route::get('/poli', [PasienController::class, 'poli'])->name('pasien.poli');
    Route::post('/daftar-poli', [PasienController::class, 'storePoli'])->name('pasien.daftar-poli');
    Route::get('/detail_periksa/{id}', [PasienController::class, 'detailPeriksa'])->name('pasien.detail_periksa');
    Route::get('/pasien/periksa/{id}', [PasienController::class, 'detailPeriksa'])->name('pasien.detail_periksa');

});



