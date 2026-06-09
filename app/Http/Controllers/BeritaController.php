<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::with(['user', 'himpunan'])->latest()->get();
        return view('berita.index', compact('berita'));
    }

    public function create()
{
    // Mengambil semua data himpunan dari database
    // (Pastikan nama modelnya benar, misalnya Himpunan)
    $himpunans = \App\Models\Himpunan::all(); 

    // Mengirim data $himpunans ke file tampilan (view)
    return view('berita.create', compact('himpunans'));
}

    public function store(Request $request)
{
    // 1. Validasi Input
    $request->validate([
        'judul' => 'required|string|max:255',
        'konten' => 'required',
        'himpunan_id' => 'required', // Tambahkan validasi himpunan_id
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Saya tambahkan webp untuk fleksibilitas
    ]);

    // 2. Proses Upload Gambar
    $gambarPath = null;
    if ($request->hasFile('gambar')) {
        // Simpan ke brankas public/berita_gambar
        $gambarPath = $request->file('gambar')->store('berita_gambar', 'public');
    }

    // 3. Simpan ke Database
    Berita::create([
        'judul' => $request->judul,
        'slug' => Str::slug($request->judul) . '-' . time(),
        'konten' => $request->konten,
        'gambar' => $gambarPath,
        'user_id' => Auth::id(), 
        'himpunan_id' => $request->himpunan_id, // Ubah ini agar mengambil dari pilihan form
    ]);

    return redirect()->route('berita.index')->with('success', 'Berita berhasil dipublikasikan!');
}

    // 3. Menampilkan form Edit
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    // 4. Memproses update data ke database
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Cek jika ada gambar baru yang diupload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            // Simpan gambar baru
            $berita->gambar = $request->file('gambar')->store('berita_gambar', 'public');
        }

        // Update data lainnya
        $berita->judul = $request->judul;
        $berita->slug = Str::slug($request->judul) . '-' . time();
        $berita->konten = $request->konten;
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    // 5. Menghapus data
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        
        // Hapus file gambar dari penyimpanan jika ada
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }
        
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}