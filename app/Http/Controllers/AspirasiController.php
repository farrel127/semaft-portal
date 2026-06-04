<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    // Menampilkan daftar aspirasi di Dashboard Admin
    public function index()
    {
        // Mengambil data aspirasi dari yang terbaru
        $aspirasis = Aspirasi::latest()->paginate(10);
        return view('aspirasi.index', compact('aspirasis'));
    }

    // Mengubah status aspirasi (Menunggu -> Dibaca -> Selesai)
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Dibaca,Selesai'
        ]);

        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->update([
            'status' => $request->status
        ]);

        return redirect()->route('aspirasi.index')->with('success', 'Status aspirasi berhasil diperbarui!');
    }

    // Menghapus aspirasi
    public function destroy($id)
    {
        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->delete();

        return redirect()->route('aspirasi.index')->with('success', 'Data aspirasi berhasil dihapus!');
    }
}