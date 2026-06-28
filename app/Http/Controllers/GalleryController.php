<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // Menampilkan daftar galeri di panel admin
    public function index()
    {
        $galeris = Gallery::latest()->get();
        return view('admin.galeri.index', compact('galeris'));
    }

    // Menyimpan gambar baru ke database dan folder storage
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'kategori'  => 'required|string',
            'gambar'    => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maksimal 2MB
            'deskripsi' => 'nullable|string',
        ]);

        // Proses Upload Gambar
        $imagePath = $request->file('gambar')->store('galeri', 'public');

        // Simpan ke Database
        Gallery::create([
            'judul'     => $request->judul,
            'kategori'  => $request->kategori,
            'gambar'    => $imagePath,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->back()->with('success', 'Arsip visual berhasil ditambahkan!');
    }

    // Menghapus gambar dari database dan folder
    public function destroy($id)
    {
        $galeri = Gallery::findOrFail($id);

        // Hapus file fisik gambar dari storage
        if (Storage::disk('public')->exists($galeri->gambar)) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        // Hapus data dari database
        $galeri->delete();

        return redirect()->back()->with('success', 'Arsip visual berhasil dihapus!');
    }
}