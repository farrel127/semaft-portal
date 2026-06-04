<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-semaft-navy leading-tight flex items-center gap-3">
            <a href="{{ route('pengguna.index') }}" class="text-gray-400 hover:text-semaft-gold transition"><i class="fa-solid fa-arrow-left"></i></a>
            {{ __('Tambah Akun Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-8">
                
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-xl">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pengguna.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Pengurus / HMJ</label>
                            <input type="text" name="name" required class="w-full rounded-xl border-gray-300 focus:border-semaft-gold focus:ring-semaft-gold" placeholder="Contoh: Admin HMTI">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Email Login</label>
                            <input type="email" name="email" required class="w-full rounded-xl border-gray-300 focus:border-semaft-gold focus:ring-semaft-gold" placeholder="hmti@semaft.com">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Password Login</label>
                            <input type="password" name="password" required class="w-full rounded-xl border-gray-300 focus:border-semaft-gold focus:ring-semaft-gold" placeholder="Minimal 8 karakter">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tingkat Jabatan (Role)</label>
                            <select name="role" required class="w-full rounded-xl border-gray-300 focus:border-semaft-gold focus:ring-semaft-gold">
                                <option value="operator" selected>Operator (Pengurus Harian / HMJ)</option>
                                <option value="superadmin">Super Admin (Pimpinan SEMAFT)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Pilihan Checklist Fitur -->
                    <div class="pt-6 border-t border-gray-100">
                        <label class="block text-base font-extrabold text-semaft-navy mb-4"><i class="fa-solid fa-list-check text-semaft-gold mr-2"></i> Delegasi Hak Akses Fitur (RBAC)</label>
                        <p class="text-sm text-gray-500 mb-6">Centang fitur spesifik di bawah ini yang boleh dioperasikan oleh akun ini. (Abaikan jika akun adalah Super Admin).</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-gray-50 p-6 rounded-2xl border border-gray-100">
                            
                            <div>
                                <h4 class="font-extrabold text-gray-700 mb-3 flex items-center gap-2 border-b border-gray-200 pb-2">
                                    <i class="fa-solid fa-bullhorn text-semaft-navy"></i> Konten Publikasi
                                </h4>
                                <div class="space-y-3">
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" name="hak_akses[]" value="berita_kelola" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy">
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Tulis & Kelola Berita</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" name="hak_akses[]" value="agenda_kelola" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy">
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Buat & Kelola Agenda Kegiatan</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" name="hak_akses[]" value="galeri_kelola" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy">
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Upload Dokumentasi / Galeri</span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <h4 class="font-extrabold text-gray-700 mb-3 flex items-center gap-2 border-b border-gray-200 pb-2">
                                    <i class="fa-solid fa-users text-semaft-navy"></i> Interaksi Mahasiswa
                                </h4>
                                <div class="space-y-3">
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" name="hak_akses[]" value="aspirasi_lihat" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy">
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Baca Kotak Masuk Aspirasi</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" name="hak_akses[]" value="aspirasi_tindak" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy">
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Ubah Status & Tindak Lanjut Aspirasi</span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <h4 class="font-extrabold text-gray-700 mb-3 flex items-center gap-2 border-b border-gray-200 pb-2">
                                    <i class="fa-solid fa-folder-tree text-semaft-navy"></i> Administrasi Sistem
                                </h4>
                                <div class="space-y-3">
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" name="hak_akses[]" value="himpunan_edit" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy">
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Update Profil & Logo Himpunan</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" name="hak_akses[]" value="statistik_lihat" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy">
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition">Lihat Grafik Statistik Dashboard</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer group mt-2">
                                        <input type="checkbox" name="hak_akses[]" value="kalender_lihat" class="w-5 h-5 text-semaft-navy border-gray-300 rounded focus:ring-semaft-navy">
                                        <span class="ml-3 text-sm font-bold text-gray-600 group-hover:text-semaft-navy transition"><i class="fa-solid fa-calendar-days mr-1 text-gray-400"></i> Widget Kalender Interaktif</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="pt-6 text-right">
                        <button type="submit" class="bg-semaft-navy text-white font-bold px-8 py-3 rounded-xl hover:bg-blue-900 transition shadow-lg text-lg">
                            <i class="fa-solid fa-floppy-disk mr-2"></i> Simpan Akun Baru
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>