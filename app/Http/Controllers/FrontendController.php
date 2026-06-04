<?php

namespace App\Http\Controllers;

use App\Models\Himpunan;
use App\Models\Berita;
use App\Models\Aspirasi;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // 1. Menampilkan Halaman Beranda Utama
    public function index()
    {
        $himpunans = Himpunan::all();
        
        $berita_terbaru = Berita::latest()->take(3)->get();
        
        $agenda_terdekat = Kegiatan::whereIn('status', ['Akan Datang', 'Berlangsung'])
                                ->orderBy('tanggal', 'asc')
                                ->take(3)
                                ->get();

        return view('welcome', compact('himpunans', 'berita_terbaru', 'agenda_terdekat'));
    }

    // 2. Menampilkan Halaman Daftar Semua Berita
    public function berita()
    {
        $semuaBerita = Berita::with(['user', 'himpunan'])->latest()->paginate(9);
        return view('frontend.berita', compact('semuaBerita'));
    }

    // 3. Menampilkan Halaman Baca Berita (Detail)
    public function bacaBerita($slug)
    {
        $berita = Berita::with(['user', 'himpunan'])->where('slug', $slug)->firstOrFail();
        return view('frontend.baca-berita', compact('berita'));
    }

    // 4. Menampilkan Halaman Form Aspirasi
    public function aspirasi()
    {
        $himpunans = Himpunan::all();
        return view('frontend.aspirasi', compact('himpunans'));
    }

    // 5. Menyimpan Data Aspirasi ke Database
    public function storeAspirasi(Request $request)
    {
        // Validasi disesuaikan dengan struktur kolom database aspirasis kamu
        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'prodi'    => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'pesan'    => 'required|string|min:10',
        ]);

        // Menyimpan semua data dengan aman (status otomatis menjadi 'Menunggu' dari migration)
        Aspirasi::create($request->all());

        return redirect()->back()->with('success', 'Terima kasih! Aspirasi Anda telah berhasil dikirim ke Senat Mahasiswa Fakultas Teknik.');
    }

    // 6. Menampilkan Halaman Kalender Kegiatan (Publik)
    public function kegiatan()
    {
        $kegiatans = Kegiatan::with('himpunan')
                        ->orderBy('tanggal', 'desc')
                        ->get();
                        
        return view('frontend.kegiatan', compact('kegiatans'));
    }

    // 7. Menampilkan Halaman Tentang SEMAFT
    public function tentang()
    {
        $himpunans = Himpunan::all();
        return view('frontend.tentang', compact('himpunans'));
    }
}