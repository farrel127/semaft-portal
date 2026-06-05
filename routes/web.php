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
    $user = auth()->user();

    // 1. FILTER DATA BERITA (Berdasarkan Role)
    $beritaQuery = \App\Models\Berita::query();
    
    // Jika role operator, kunci data berita hanya untuk user tersebut
    // (Pastikan tabel 'beritas' memiliki kolom 'user_id')
    if ($user->role === 'operator') {
        $beritaQuery->where('user_id', $user->id);
    }
    
    $total_berita = (clone $beritaQuery)->count();

    // 2. DATA WIDGET ATAS LAINNYA
    $aspirasi_baru = \App\Models\Aspirasi::where('status', 'Menunggu')->count();
    $kegiatan_aktif = \App\Models\Kegiatan::whereIn('status', ['Akan Datang', 'Berlangsung'])->count();
    $total_himpunan = \App\Models\Himpunan::count();

    // 3. Data Grafik Aspirasi (Doughnut Chart)
    $aspirasi_raw = \App\Models\Aspirasi::selectRaw('status, COUNT(*) as count')
                        ->groupBy('status')
                        ->pluck('count', 'status')
                        ->toArray();

    $label_aspirasi = !empty($aspirasi_raw) ? array_keys($aspirasi_raw) : ['Belum Ada Data'];
    $data_aspirasi  = !empty($aspirasi_raw) ? array_values($aspirasi_raw) : [1];

    // 4. Data Grafik Tren Berita 6 Bulan Terakhir (Line Chart)
    $label_bulan = [];
    $data_berita = [];

    for ($i = 5; $i >= 0; $i--) {
        $date = \Carbon\Carbon::now()->subMonths($i);
        $label_bulan[] = $date->format('M Y'); // Contoh: Jun 2026
        
        // Gunakan clone beritaQuery agar filter operator tetap berlaku di grafik
        $data_berita[] = (clone $beritaQuery)
                            ->whereYear('created_at', $date->year)
                            ->whereMonth('created_at', $date->month)
                            ->count();
    }

    return view('dashboard', compact(
        'total_berita', 'aspirasi_baru', 'kegiatan_aktif', 'total_himpunan',
        'label_aspirasi', 'data_aspirasi', 'label_bulan', 'data_berita'
    ));
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