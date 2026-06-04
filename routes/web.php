<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\HimpunanController;
use Illuminate\Support\Facades\Route;

// ==========================================
// RUTE FRONTEND (HALAMAN PUBLIK)
// ==========================================
Route::get('/', [FrontendController::class, 'index'])->name('beranda');

Route::get('/portal-berita', [FrontendController::class, 'berita'])->name('frontend.berita');
Route::get('/portal-berita/{slug}', [FrontendController::class, 'bacaBerita'])->name('frontend.baca');

Route::get('/aspirasi', [FrontendController::class, 'aspirasi'])->name('frontend.aspirasi');
Route::post('/aspirasi', [FrontendController::class, 'storeAspirasi'])->name('frontend.aspirasi.store');

Route::get('/kegiatan', [FrontendController::class, 'kegiatan'])->name('frontend.kegiatan');
Route::get('/tentang', [FrontendController::class, 'tentang'])->name('frontend.tentang');


// ==========================================
// RUTE BACKEND (DASHBOARD ADMIN)
// ==========================================
Route::get('/dashboard', function () {
    // Menghitung statistik untuk Dashboard
    $total_berita = \App\Models\Berita::count();
    $aspirasi_baru = \App\Models\Aspirasi::where('status', 'Menunggu')->count();
    $kegiatan_aktif = \App\Models\Kegiatan::whereIn('status', ['Akan Datang', 'Berlangsung'])->count();
    $total_himpunan = \App\Models\Himpunan::count();
    // Ambil data kegiatan untuk ditampilkan sebagai titik penanda di kalender
    $jadwal_kegiatan = \App\Models\Kegiatan::with('himpunan')->get();

    return view('dashboard', compact('total_berita', 'aspirasi_baru', 'kegiatan_aktif', 'total_himpunan'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Rute Profile Akun
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rute untuk update checklist widget (Cukup 1 baris ini saja tambahannya)
    Route::post('/profile/widget', [ProfileController::class, 'updateWidget'])->name('profile.widget');
    
    // Rute Manajemen Pengguna
    Route::resource('admin/pengguna', App\Http\Controllers\UserController::class)->names('pengguna')->except(['show']);
    
    // Rute CRUD Manajemen Admin
    Route::resource('admin/berita', BeritaController::class)->names('berita');
    Route::resource('admin/aspirasi', AspirasiController::class)->names('aspirasi')->only(['index', 'update', 'destroy']);
    Route::resource('admin/kegiatan', KegiatanController::class)->names('kegiatan');
    Route::resource('admin/himpunan', HimpunanController::class)->names('himpunan')->only(['index', 'edit', 'update']);
});

// Memanggil rute otentikasi bawaan Laravel
require __DIR__.'/auth.php';