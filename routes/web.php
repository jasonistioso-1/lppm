<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\AbdimasController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KontakController;

// Public Front-end Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/tentang-kami', [ProfilController::class, 'tentangKami'])->name('tentang');
    Route::get('/visi-misi', [ProfilController::class, 'visiMisi'])->name('visi');
    Route::get('/struktur-organisasi', [ProfilController::class, 'strukturOrganisasi'])->name('struktur');
    Route::get('/prestasi', [ProfilController::class, 'prestasi'])->name('prestasi');
});

Route::prefix('penelitian')->name('penelitian.')->group(function () {
    Route::get('/skema', [PenelitianController::class, 'skema'])->name('skema');
    Route::get('/data-penelitian', [PenelitianController::class, 'dataPenelitian'])->name('data');
    Route::get('/pengumuman', [PenelitianController::class, 'pengumuman'])->name('pengumuman');
});

Route::prefix('abdimas')->name('abdimas.')->group(function () {
    Route::get('/skema', [AbdimasController::class, 'skema'])->name('skema');
    Route::get('/data-abdimas', [AbdimasController::class, 'dataAbdimas'])->name('data');
    Route::get('/pengumuman', [AbdimasController::class, 'pengumuman'])->name('pengumuman');
});

Route::prefix('publikasi')->name('publikasi.')->group(function () {
    Route::get('/jurnal', [PublikasiController::class, 'jurnal'])->name('jurnal');
    Route::get('/artikel-ilmiah', [PublikasiController::class, 'artikelIlmiah'])->name('artikel');
    Route::get('/prosiding', [PublikasiController::class, 'prosiding'])->name('prosiding');
});

Route::prefix('dokumen')->name('dokumen.')->group(function () {
    Route::get('/panduan', [DokumenController::class, 'panduan'])->name('panduan');
    Route::get('/template', [DokumenController::class, 'template'])->name('template');
    Route::get('/unduhan', [DokumenController::class, 'unduhan'])->name('unduhan');
});

Route::prefix('dosen')->name('dosen.')->group(function () {
    Route::get('/akuntansi', [DosenController::class, 'akuntansi'])->name('akuntansi');
    Route::get('/manajemen', [DosenController::class, 'manajemen'])->name('manajemen');
    Route::get('/ilmu-komunikasi', [DosenController::class, 'ilmuKomunikasi'])->name('ilmukomunikasi');
    Route::get('/ilmu-administrasi-bisnis', [DosenController::class, 'ilmuAdministrasiBisnis'])->name('ilmuadministrasibisnis');
    Route::get('/sistem-informasi', [DosenController::class, 'sistemInformasi'])->name('sisteminf');
    Route::get('/teknik-informatika', [DosenController::class, 'teknikInformatika'])->name('teknikinf');
});

Route::prefix('kontak')->name('kontak.')->group(function () {
    Route::get('/informasi-kontak', [KontakController::class, 'informasiKontak'])->name('informasi');
    Route::get('/jam-layanan', [KontakController::class, 'jamLayanan'])->name('jam');
    Route::get('/lokasi-kampus', [KontakController::class, 'lokasiKampus'])->name('lokasi');
});

// Laravel Breeze Auth Routes (for frontend users if needed)
require __DIR__.'/auth.php';

// Dashboard redirect to Filament Admin Panel
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/admin');
    })->name('dashboard');
});
