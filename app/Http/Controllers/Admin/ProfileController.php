<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // 1. Menampilkan halaman form pengaturan profil/akun
    public function index()
    {
        return view('admin.profile.index');
    }

    // 2. Fungsi untuk menyimpan perubahan checklist widget
    public function updateWidget(Request $request)
    {
        $user = $request->user();
        
        $user->update([
            'show_aspirasi' => $request->has('show_aspirasi'),
            'show_agenda'   => $request->has('show_agenda'),
            'show_berita'   => $request->has('show_berita'),
            'show_himpunan' => $request->has('show_himpunan'),
        ]);

        return back()->with('status', 'widget-updated');
    }
}