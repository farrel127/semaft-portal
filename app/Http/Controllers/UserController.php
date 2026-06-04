<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\HasMiddleware;
use Closure;

// Tambahkan "implements HasMiddleware" di sini
class UserController extends Controller implements HasMiddleware
{
    // Format Middleware gaya baru khusus untuk Laravel 11 & 12
    public static function middleware(): array
    {
        return [
            function (Request $request, Closure $next) {
                // Hanya izinkan Superadmin
                if (auth()->user()->role !== 'superadmin') {
                    abort(403, 'Akses Ditolak. Halaman ini khusus Super Admin SEMAFT.');
                }
                return $next($request);
            },
        ];
    }

    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('pengguna.index', compact('users'));
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:superadmin,operator',
            'hak_akses' => 'nullable|array' // Array checkbox dari form
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'hak_akses' => $request->hak_akses,
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Akun berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Mencegah admin menghapus dirinya sendiri
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $user->delete();
        return redirect()->route('pengguna.index')->with('success', 'Akun berhasil dihapus!');
        
    }
    
    // Menampilkan halaman form edit akun & hak akses
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pengguna.edit', compact('user'));
    }

    // Menyimpan perubahan data akun & hak akses
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            // Validasi email unik, tetapi mengabaikan email milik user ini sendiri saat dicek
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8', // Bersifat opsional (boleh kosong)
            'role' => 'required|in:superadmin,operator',
            'hak_akses' => 'nullable|array'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        
        // Jika rolenya diubah jadi superadmin, otomatis bersihkan array hak akses karena superadmin memegang kendali penuh
        $user->hak_akses = $request->role === 'superadmin' ? null : $request->hak_akses;

        // MENANGKAP STATUS CHECKBOX WIDGET TAMPILAN
        $user->show_aspirasi = $request->has('show_aspirasi');
        $user->show_agenda   = $request->has('show_agenda');
        $user->show_berita   = $request->has('show_berita');
        $user->show_himpunan = $request->has('show_himpunan');

        // Jika kolom password diisi, lakukan enkripsi dan simpan
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('pengguna.index')->with('success', 'Data akun, hak akses, dan tampilan berhasil diperbarui!');
    }
}