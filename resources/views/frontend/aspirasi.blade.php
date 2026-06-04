@extends('layouts.frontend')

@section('title', 'Layanan Aspirasi Mahasiswa')

@section('content')
    <section class="bg-semaft-navy py-20 relative overflow-hidden text-center">
        <div class="absolute top-0 right-0 w-64 h-64 bg-semaft-gold opacity-10 rounded-full -mr-20 -mt-20 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-500 opacity-10 rounded-full -ml-20 -mb-20 blur-3xl"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Suara Anda, <span class="text-semaft-gold">Kemajuan Teknik</span></h1>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                Sampaikan aspirasi, kritik, atau saran Anda secara langsung kepada Senat Mahasiswa. Kami menjamin kerahasiaan identitas Anda.
            </p>
        </div>
    </section>

    <section class="py-16 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                        <div class="w-14 h-14 bg-blue-50 text-semaft-navy rounded-2xl flex items-center justify-center text-2xl mb-6">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <h3 class="text-xl font-bold text-semaft-navy mb-3">Keamanan Data</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Setiap aspirasi yang masuk akan langsung ditinjau oleh pimpinan Senat. Privasi alamat email Anda akan dijaga ketat.
                        </p>
                    </div>

                    <div class="bg-semaft-gold p-8 rounded-3xl shadow-lg border border-yellow-400">
                        <div class="w-14 h-14 bg-white/20 text-semaft-navy rounded-2xl flex items-center justify-center text-2xl mb-6">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>
                        <h3 class="text-xl font-bold text-semaft-navy mb-3">Proses Alur</h3>
                        <p class="text-sm text-semaft-navy/80 leading-relaxed font-medium">
                            Aspirasi &rarr; Verifikasi &rarr; Rapat Senat &rarr; Tindak Lanjut ke Dekanat.
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-gray-100">
                        
                        @if(session('success'))
                            <div class="mb-6 p-5 bg-green-50 border-l-4 border-green-500 rounded-r-2xl flex items-center gap-4">
                                <i class="fa-solid fa-circle-check text-green-600 text-2xl"></i>
                                <p class="text-green-800 font-bold">{{ session('success') }}</p>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="mb-6 p-5 bg-red-50 border-l-4 border-red-500 rounded-r-2xl">
                                <p class="text-red-800 font-bold mb-2"><i class="fa-solid fa-triangle-exclamation mr-2"></i> Gagal mengirim! Periksa hal berikut:</p>
                                <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('frontend.aspirasi.store') }}" method="POST" class="space-y-6">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-semaft-navy mb-2 flex items-center gap-2">
                                        <i class="fa-solid fa-user"></i> Nama Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="nama" value="{{ old('nama') }}" required 
                                        class="w-full border-gray-200 focus:border-semaft-gold focus:ring focus:ring-semaft-gold/20 rounded-xl px-4 py-3" 
                                        placeholder="Masukkan nama Anda">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-semaft-navy mb-2 flex items-center gap-2">
                                        <i class="fa-solid fa-envelope"></i> Alamat Email <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" name="email" value="{{ old('email') }}" required 
                                        class="w-full border-gray-200 focus:border-semaft-gold focus:ring focus:ring-semaft-gold/20 rounded-xl px-4 py-3" 
                                        placeholder="email@mhs.usbypkp.ac.id">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-semaft-navy mb-2 flex items-center gap-2">
                                        <i class="fa-solid fa-graduation-cap"></i> Program Studi <span class="text-red-500">*</span>
                                    </label>
                                    <select name="prodi" required 
                                        class="w-full border-gray-200 focus:border-semaft-gold focus:ring focus:ring-semaft-gold/20 rounded-xl px-4 py-3">
                                        <option value="" disabled selected>Pilih Prodi Anda</option>
                                        @foreach($himpunans as $himpunan)
                                            <option value="{{ $himpunan->nama }}" {{ old('prodi') == $himpunan->nama ? 'selected' : '' }}>
                                                {{ $himpunan->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-semaft-navy mb-2 flex items-center gap-2">
                                        <i class="fa-solid fa-tags"></i> Kategori Aspirasi <span class="text-red-500">*</span>
                                    </label>
                                    <select name="kategori" required 
                                        class="w-full border-gray-200 focus:border-semaft-gold focus:ring focus:ring-semaft-gold/20 rounded-xl px-4 py-3">
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        <option value="Akademik" {{ old('kategori') == 'Akademik' ? 'selected' : '' }}>Akademik & Perkuliahan</option>
                                        <option value="Fasilitas" {{ old('kategori') == 'Fasilitas' ? 'selected' : '' }}>Fasilitas Kampus</option>
                                        <option value="Pelayanan" {{ old('kategori') == 'Pelayanan' ? 'selected' : '' }}>Pelayanan & Administrasi</option>
                                        <option value="Organisasi" {{ old('kategori') == 'Organisasi' ? 'selected' : '' }}>Kegiatan Kemahasiswaan</option>
                                        <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-semaft-navy mb-2 flex items-center gap-2">
                                    <i class="fa-solid fa-pen-nib"></i> Isi Aspirasi / Keluhan <span class="text-red-500">*</span>
                                </label>
                                <textarea name="pesan" rows="6" required 
                                    class="w-full border-gray-200 focus:border-semaft-gold focus:ring focus:ring-semaft-gold/20 rounded-xl px-4 py-3" 
                                    placeholder="Tuliskan kritik, saran, atau keluhan Anda secara detail di sini...">{{ old('pesan') }}</textarea>
                                <p class="text-xs text-gray-400 mt-2 italic">* Minimal 10 karakter</p>
                            </div>

                            <div class="pt-4">
                                <button type="submit" class="w-full bg-semaft-navy text-white font-extrabold py-4 rounded-xl hover:bg-blue-900 transition shadow-lg flex items-center justify-center gap-3 text-lg">
                                    <i class="fa-solid fa-paper-plane"></i> Kirim Aspirasi Sekarang
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection