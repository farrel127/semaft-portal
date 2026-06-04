<?php

namespace App\Http\Controllers;

use App\Models\Himpunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HimpunanController extends Controller
{
    // Menampilkan daftar 6 Himpunan
    public function index()
    {
        $himpunans = Himpunan::all();
        return view('himpunan.index', compact('himpunans'));
    }

    // Menampilkan form edit logo
    public function edit($id)
    {
        $himpunan = Himpunan::findOrFail($id);
        return view('himpunan.edit', compact('himpunan'));
    }

    // Menyimpan perubahan logo
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'singkatan' => 'required|string|max:50',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048' // Maksimal 2MB
        ]);

        $himpunan = Himpunan::findOrFail($id);
        $data = $request->only(['nama', 'singkatan']);

        // Jika admin mengunggah logo baru
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($himpunan->logo) {
                Storage::disk('public')->delete($himpunan->logo);
            }
            // Simpan logo baru
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $himpunan->update($data);

        return redirect()->route('himpunan.index')->with('success', 'Data & Logo Himpunan berhasil diperbarui!');
    }
}