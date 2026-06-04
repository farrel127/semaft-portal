<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-semaft-navy leading-tight flex items-center gap-3">
            <a href="{{ route('pengguna.index') }}" class="text-gray-400 hover:text-semaft-gold transition"><i class="fa-solid fa-arrow-left"></i></a>
            {{ __('Edit Akun & Hak Akses: ') }} {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-8">
                
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-xl">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pengguna.update', $user->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Bagian Data Profil Akun (Wajib Ada) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Pengurus / HMJ</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full rounded-xl border-gray-300 focus:border-semaft-gold focus:ring-semaft-gold">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Email Login</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full rounded-xl border-gray-300 focus:border-semaft-gold focus:ring-semaft-gold">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Password Baru <span class="text-xs text-gray-400 font-normal">(Kosongkan jika tidak ingin diubah)</span></label>
                            <input type="password" name="password" class="w-full rounded-xl border-gray-300 focus:border-semaft-gold focus:ring-semaft-gold" placeholder="Minimal 8 karakter">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tingkat Jabatan (Role)</label>
                            <select name="role" required class="w-full rounded-xl border-gray-300 focus:border-semaft-gold focus:ring-semaft-gold">
                                <option value="operator" {{ $user->role == 'operator' ? 'selected' : '' }}>Operator (Pengurus Harian / HMJ)</option>
                                <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>Super Admin (Pimpinan SEMAFT)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Pilihan Checklist Hak Akses Fitur -->
                    <div class="pt-6 border-t border-gray-100">
                        <label class="block text-base font-extrabold text-semaft-navy mb-4"><i class="fa-solid fa-list-check text-semaft-gold mr-2"></i> Modifikasi Delegasi Hak Akses & Tampilan</label>
                        <p class="text-sm text-gray-500 mb-6">Sesuaikan fitur spesifik dan tampilan dashboard yang boleh diakses oleh akun ini.</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-gray-50 p-6 rounded-2xl border border-gray-100">
                            
                            <!-- Kategori 1: Publikasi & Konten -->
                            <div>
                                <h4 class="font-extrabold text-gray-700 mb-3 flex items-center gap-2 border-b border-gray-200 pb-2">
                                    <i class="fa-solid fa-bullhorn text-semaft-navy"></i> Konten Publikasi
                                </h4>
                                <div class="space-y-3">
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" name="hak_akses[]" value="berita_kelola" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy"
                                            {{ is_array($user->hak_akses) && in_array('berita_kelola', $user->hak_akses) ? 'checked' : '' }}>
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Tulis & Kelola Berita</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" name="hak_akses[]" value="agenda_kelola" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy"
                                            {{ is_array($user->hak_akses) && in_array('agenda_kelola', $user->hak_akses) ? 'checked' : '' }}>
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Buat & Kelola Agenda Kegiatan</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" name="hak_akses[]" value="galeri_kelola" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy"
                                            {{ is_array($user->hak_akses) && in_array('galeri_kelola', $user->hak_akses) ? 'checked' : '' }}>
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Upload Dokumentasi / Galeri</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Kategori 2: Interaksi & Layanan -->
                            <div>
                                <h4 class="font-extrabold text-gray-700 mb-3 flex items-center gap-2 border-b border-gray-200 pb-2">
                                    <i class="fa-solid fa-users text-semaft-navy"></i> Interaksi Mahasiswa
                                </h4>
                                <div class="space-y-3">
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" name="hak_akses[]" value="aspirasi_lihat" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy"
                                            {{ is_array($user->hak_akses) && in_array('aspirasi_lihat', $user->hak_akses) ? 'checked' : '' }}>
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Baca Kotak Masuk Aspirasi</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" name="hak_akses[]" value="aspirasi_tindak" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy"
                                            {{ is_array($user->hak_akses) && in_array('aspirasi_tindak', $user->hak_akses) ? 'checked' : '' }}>
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Ubah Status & Tindak Lanjut Aspirasi</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Kategori 3: Administrasi Internal -->
                            <div>
                                <h4 class="font-extrabold text-gray-700 mb-3 flex items-center gap-2 border-b border-gray-200 pb-2">
                                    <i class="fa-solid fa-folder-tree text-semaft-navy"></i> Administrasi Sistem
                                </h4>
                                <div class="space-y-3">
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" name="hak_akses[]" value="himpunan_edit" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy"
                                            {{ is_array($user->hak_akses) && in_array('himpunan_edit', $user->hak_akses) ? 'checked' : '' }}>
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Update Profil & Logo Himpunan</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" name="hak_akses[]" value="statistik_lihat" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy"
                                            {{ is_array($user->hak_akses) && in_array('statistik_lihat', $user->hak_akses) ? 'checked' : '' }}>
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Lihat Grafik Statistik Dashboard</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer group mt-2">
                                        <input type="checkbox" name="hak_akses[]" value="kalender_lihat" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy"
                                            {{ is_array($user->hak_akses) && in_array('kalender_lihat', $user->hak_akses) ? 'checked' : '' }}>
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition"><i class="fa-solid fa-calendar-days mr-1 text-gray-400"></i> Widget Kalender Interaktif</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Kategori 4: Tampilan Widget (BARU) -->
                            <div>
                                <h4 class="font-extrabold text-gray-700 mb-3 flex items-center gap-2 border-b border-gray-200 pb-2">
                                    <i class="fa-solid fa-table-cells-large text-semaft-navy"></i> Tampilan Dashboard
                                </h4>
                                <div class="space-y-3">
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" name="show_aspirasi" value="1" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy"
                                            {{ $user->show_aspirasi ? 'checked' : '' }}>
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Tampilkan Widget Aspirasi</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" name="show_agenda" value="1" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy"
                                            {{ $user->show_agenda ? 'checked' : '' }}>
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Tampilkan Widget Agenda</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" name="show_berita" value="1" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy"
                                            {{ $user->show_berita ? 'checked' : '' }}>
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Tampilkan Widget Berita</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer group mt-2">
                                        <input type="checkbox" name="show_himpunan" value="1" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy"
                                            {{ $user->show_himpunan ? 'checked' : '' }}>
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Tampilkan Widget Himpunan</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="pt-6 text-right">
                        <button type="submit" class="bg-semaft-navy text-white font-bold px-8 py-3 rounded-xl hover:bg-blue-900 transition shadow-lg text-sm flex items-center gap-2 justify-center ml-auto">
                            <i class="fa-solid fa-square-check"></i> Perbarui Hak Akses Akun
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>