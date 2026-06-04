@extends('layouts.frontend')

@section('title', 'Tentang SEMAFT')

@section('content')
    <!-- Hero Section Profil -->
    <section class="bg-semaft-navy py-20 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-semaft-gold opacity-10 rounded-full -mr-20 -mt-20 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-500 opacity-10 rounded-full -ml-20 -mb-20 blur-3xl"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT Besar" class="h-32 w-auto mx-auto mb-6 drop-shadow-2xl">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Profil <span class="text-semaft-gold">SEMAFT</span></h1>
            <p class="text-lg text-gray-300 max-w-3xl mx-auto">
                Senat Mahasiswa Fakultas Teknik Universitas Sangga Buana YPKP adalah lembaga legislatif dan eksekutif tertinggi di tingkat fakultas yang menaungi seluruh mahasiswa teknik.
            </p>
        </div>
    </section>

    <!-- Visi & Misi Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                
                <!-- Visi -->
                <div class="bg-blue-50 p-10 rounded-3xl border border-blue-100 hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 bg-semaft-navy text-semaft-gold rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-md">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-semaft-navy mb-4">Visi Kami</h2>
                    <p class="text-gray-600 leading-relaxed">
                        "Mewujudkan Fakultas Teknik yang sinergis, inovatif, dan berdaya saing tinggi melalui kolaborasi aktif seluruh elemen mahasiswa, serta menjunjung tinggi nilai-nilai Tri Dharma Perguruan Tinggi."
                    </p>
                </div>

                <!-- Misi -->
                <div class="bg-yellow-50 p-10 rounded-3xl border border-yellow-100 hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 bg-semaft-gold text-semaft-navy rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-md">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-semaft-navy mb-4">Misi Kami</h2>
                    <ul class="text-gray-600 leading-relaxed space-y-3 list-none">
                        <li class="flex gap-3"><i class="fa-solid fa-check text-semaft-gold mt-1"></i> Menampung dan menyalurkan aspirasi mahasiswa.</li>
                        <li class="flex gap-3"><i class="fa-solid fa-check text-semaft-gold mt-1"></i> Mengoptimalkan peran Himpunan Mahasiswa Jurusan (HMJ).</li>
                        <li class="flex gap-3"><i class="fa-solid fa-check text-semaft-gold mt-1"></i> Menyelenggarakan kegiatan yang mendukung minat, bakat, dan penalaran mahasiswa.</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- Struktur Organisasi -->
    <section class="py-16 bg-gray-50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-semaft-navy mb-4">Struktur Kepengurusan</h2>
            <div class="w-24 h-1 bg-semaft-gold mx-auto mb-12 rounded-full"></div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                
                <!-- Card Pengurus (Contoh) -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 group">
                    <div class="w-24 h-24 bg-gray-200 rounded-full mx-auto mb-4 overflow-hidden border-4 border-gray-50 group-hover:border-semaft-gold transition">
                        <i class="fa-solid fa-user text-4xl text-gray-400 mt-6"></i>
                        <!-- Bisa diganti tag img jika ada foto -->
                    </div>
                    <h3 class="font-bold text-lg text-semaft-navy">Dio Giovanny Achmar</h3>
                    <p class="text-sm text-semaft-gold font-semibold">Gubernur Mahasiswa</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 group">
                    <div class="w-24 h-24 bg-gray-200 rounded-full mx-auto mb-4 overflow-hidden border-4 border-gray-50 group-hover:border-semaft-gold transition">
                        <i class="fa-solid fa-user text-4xl text-gray-400 mt-6"></i>
                    </div>
                    <h3 class="font-bold text-lg text-semaft-navy">XXXX</h3>
                    <p class="text-sm text-semaft-gold font-semibold">Wakil Gubernur Mahasiswa</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 group">
                    <div class="w-24 h-24 bg-gray-200 rounded-full mx-auto mb-4 overflow-hidden border-4 border-gray-50 group-hover:border-semaft-gold transition">
                        <i class="fa-solid fa-user text-4xl text-gray-400 mt-6"></i>
                    </div>
                    <h3 class="font-bold text-lg text-semaft-navy">Naufal Farrel Pratama</h3>
                    <p class="text-sm text-semaft-gold font-semibold">Sekretaris Umum</p>
                </div>

            </div>
            <p class="mt-8 text-sm text-gray-500 italic">*Struktur lengkap akan diperbarui segera.</p>
        </div>
    </section>
@endsection