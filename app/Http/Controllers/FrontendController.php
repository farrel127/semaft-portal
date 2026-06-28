<?php

namespace App\Http\Controllers;

use App\Models\Himpunan;
use App\Models\Berita;
use App\Models\Aspirasi;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

// NAMA CLASS HARUS SESUAI DENGAN NAMA FILE
class FrontendController extends Controller
{
    // 1. Menampilkan Halaman Beranda Utama
    // 1. Menampilkan Halaman Beranda Utama
    public function index()
    {
        $himpunans = Himpunan::all();
        
        $berita_terbaru = Berita::latest()->take(3)->get();
        
        $agenda_terdekat = Kegiatan::whereIn('status', ['Akan Datang', 'Berlangsung'])
                                ->orderBy('tanggal', 'asc')
                                ->take(3)
                                ->get();

        // TAMBAHKAN BARIS INI: Mengambil 6 foto terbaru untuk ditampilkan di Beranda
        $galeri_terbaru = \App\Models\Gallery::latest()->take(6)->get();

        // JANGAN LUPA: Tambahkan 'galeri_terbaru' ke dalam compact()
        return view('welcome', compact('himpunans', 'berita_terbaru', 'agenda_terdekat', 'galeri_terbaru'));
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
        // Validasi disesuaikan dengan struktur kolom database aspirasis
        // (Pastikan ini sudah menggunakan himpunan_id sesuai perbaikan kita sebelumnya)
        $request->validate([
            'nama'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'himpunan_id' => 'required|exists:himpunans,id', 
            'kategori'    => 'required|string|max:255',
            'pesan'       => 'required|string|min:10',
        ]);

        // Menyimpan semua data dengan aman
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
    
    // 8. Menampilkan Halaman Galeri
    public function galeri()
    {
        // Mengambil semua data galeri, diurutkan dari yang terbaru
        $galeris = \App\Models\Gallery::latest()->get();
        return view('frontend.galeri', compact('galeris'));
    }
}