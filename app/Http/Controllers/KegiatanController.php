<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Himpunan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    // 1. Menampilkan daftar semua agenda di kalender admin
    public function index()
    {
        // Mengambil data kegiatan beserta nama himpunannya, diurutkan dari jadwal terdekat
        $kegiatans = Kegiatan::with('himpunan')->orderBy('tanggal', 'asc')->paginate(10);
        return view('kegiatan.index', compact('kegiatans'));
    }

    // 2. Menampilkan form "Tambah Agenda" (yang baru saja kita buat)
    public function create()
    {
        $himpunans = Himpunan::all();
        return view('kegiatan.create', compact('himpunans'));
    }

    // 3. Menyimpan data agenda ke database (Tanpa proses upload gambar)
    public function store(Request $request)
    {
        // Validasi hanya untuk 3 kolom yang ada di form
        $request->validate([
            'tanggal'       => 'required|date',
            'nama_kegiatan' => 'required|string|max:255',
            'himpunan_id'   => 'required|exists:himpunans,id',
        ]);

        // Simpan ke database dengan suntikan nilai default otomatis
        Kegiatan::create([
            'tanggal'       => $request->tanggal,
            'nama_kegiatan' => $request->nama_kegiatan,
            'himpunan_id'   => $request->himpunan_id,
            'deskripsi'     => '-',                // <-- Ubah dari null menjadi '-' agar database menerima datanya
            'status'        => 'Akan Datang',      
            'waktu_mulai'   => '08:00:00',         
            'lokasi'        => '-',                
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Agenda baru berhasil ditandai di kalender!');
    }

    // 4. Menghapus agenda
    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Agenda berhasil dihapus dari kalender!');
    }
}