@extends('layouts.midone') <!-- 1. MENGGUNAKAN MASTER LAYOUT BARU -->

@section('content') <!-- 2. MEMULAI AREA KONTEN -->

    <!-- Load Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Header (Pengganti x-slot name="header") -->
    <div class="mb-6">
        <h2 class="font-bold text-xl text-semaft-navy leading-tight border-b pb-4">
            {{ __('Dashboard Utama') }}
        </h2>
    </div>

    <!-- AREA KONTEN UTAMA (Kodingan asli Anda tetap utuh di sini) -->
    <div class="bg-gray-50 min-h-screen rounded-2xl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
            
            <div class="mb-10 flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6 px-4 sm:px-0">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-blue-100 text-blue-700 text-xs font-bold mb-3 border border-blue-200 shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span> Ruang Kendali SEMA FT
                    </div>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                        Halo, <span class="text-semaft-navy">{{ explode(' ', auth()->user()->name)[0] }}</span>! 👋
                    </h1>
                    <p class="text-sm sm:text-base text-gray-500 mt-2 max-w-2xl">Selamat datang di pusat manajemen. Pantau pergerakan, kelola informasi, dan kawal aspirasi mahasiswa Teknik hari ini.</p>
                </div>
                <div>
                    <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center gap-2 bg-white border border-gray-200 text-gray-700 hover:text-semaft-navy hover:border-semaft-navy font-bold px-5 py-2.5 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 text-sm group">
                        <i class="fa-solid fa-earth-asia text-semaft-gold group-hover:animate-spin"></i> Kunjungi Web Portal
                    </a>
                </div>
            </div>

            <!-- CARD STATISTIK -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 px-4 sm:px-0">
                
                @if(auth()->user()->show_aspirasi)
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-500 relative overflow-hidden group border border-gray-100 flex flex-col justify-between h-full">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-red-50 rounded-full opacity-80 group-hover:scale-150 transition-transform duration-700 ease-out"></div>
                    <div class="flex items-start justify-between relative z-10 mb-4">
                        <div>
                            <p class="text-[11px] font-extrabold text-gray-400 uppercase tracking-widest mb-1">Aspirasi Menunggu</p>
                            <h3 class="text-4xl font-black text-gray-800 tracking-tight">{{ $aspirasi_baru ?? 0 }}</h3>
                        </div>
                        <div class="w-14 h-14 rounded-2xl bg-red-50 text-red-500 flex items-center justify-center text-2xl shadow-inner group-hover:bg-red-500 group-hover:text-white transition-colors duration-300">
                            <i class="fa-solid fa-envelope-open-text"></i>
                        </div>
                    </div>
                    <div class="mt-auto pt-4 border-t border-gray-50 relative z-10">
                        <a href="{{ route('aspirasi.index') ?? '#' }}" class="text-xs font-bold text-red-500 hover:text-red-700 flex items-center gap-1 group/link transition-colors">Tindak Lanjuti <i class="fa-solid fa-arrow-right transform group-hover/link:translate-x-1 transition-transform"></i></a>
                    </div>
                </div>
                @endif

                @if(auth()->user()->show_agenda)
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-500 relative overflow-hidden group border border-gray-100 flex flex-col justify-between h-full">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-emerald-50 rounded-full opacity-80 group-hover:scale-150 transition-transform duration-700 ease-out"></div>
                    <div class="flex items-start justify-between relative z-10 mb-4">
                        <div>
                            <p class="text-[11px] font-extrabold text-gray-400 uppercase tracking-widest mb-1">Agenda Aktif</p>
                            <h3 class="text-4xl font-black text-gray-800 tracking-tight">{{ $kegiatan_aktif ?? 0 }}</h3>
                        </div>
                        <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-500 flex items-center justify-center text-2xl shadow-inner group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                    </div>
                    <div class="mt-auto pt-4 border-t border-gray-50 relative z-10">
                        <a href="{{ route('kegiatan.index') ?? '#' }}" class="text-xs font-bold text-emerald-500 hover:text-emerald-700 flex items-center gap-1 group/link transition-colors">Kelola Jadwal <i class="fa-solid fa-arrow-right transform group-hover/link:translate-x-1 transition-transform"></i></a>
                    </div>
                </div>
                @endif

                @if(auth()->user()->show_berita)
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-500 relative overflow-hidden group border border-gray-100 flex flex-col justify-between h-full">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 rounded-full opacity-80 group-hover:scale-150 transition-transform duration-700 ease-out"></div>
                    <div class="flex items-start justify-between relative z-10 mb-4">
                        <div>
                            <p class="text-[11px] font-extrabold text-gray-400 uppercase tracking-widest mb-1">Total Publikasi</p>
                            <h3 class="text-4xl font-black text-gray-800 tracking-tight">{{ $total_berita ?? 0 }}</h3>
                        </div>
                        <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl shadow-inner group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                    </div>
                    <div class="mt-auto pt-4 border-t border-gray-50 relative z-10">
                        <a href="{{ route('berita.index') ?? '#' }}" class="text-xs font-bold text-blue-600 hover:text-blue-800 flex items-center gap-1 group/link transition-colors">Tulis Artikel Baru <i class="fa-solid fa-arrow-right transform group-hover/link:translate-x-1 transition-transform"></i></a>
                    </div>
                </div>
                @endif

                @if(auth()->user()->show_himpunan)
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-500 relative overflow-hidden group border border-gray-100 flex flex-col justify-between h-full">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-yellow-50 rounded-full opacity-80 group-hover:scale-150 transition-transform duration-700 ease-out"></div>
                    <div class="flex items-start justify-between relative z-10 mb-4">
                        <div>
                            <p class="text-[11px] font-extrabold text-gray-400 uppercase tracking-widest mb-1">Data Himpunan</p>
                            <h3 class="text-4xl font-black text-gray-800 tracking-tight">{{ $total_himpunan ?? 0 }}</h3>
                        </div>
                        <div class="w-14 h-14 rounded-2xl bg-yellow-50 text-yellow-600 flex items-center justify-center text-2xl shadow-inner group-hover:bg-yellow-500 group-hover:text-white transition-colors duration-300">
                            <i class="fa-solid fa-building-columns"></i>
                        </div>
                    </div>
                    <div class="mt-auto pt-4 border-t border-gray-50 relative z-10">
                        <a href="{{ route('himpunan.index') ?? '#' }}" class="text-xs font-bold text-yellow-600 hover:text-yellow-700 flex items-center gap-1 group/link transition-colors">Lihat Direktori <i class="fa-solid fa-arrow-right transform group-hover/link:translate-x-1 transition-transform"></i></a>
                    </div>
                </div>
                @endif
            </div>

            <!-- AREA CHART -->
            <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-6 px-4 sm:px-0">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 lg:col-span-2 relative">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-extrabold text-gray-800 flex items-center gap-2">
                            <i class="fa-solid fa-chart-line text-blue-500"></i> Produktivitas Publikasi Berita
                        </h3>
                        <span class="text-[10px] font-bold bg-blue-50 text-blue-600 px-3 py-1.5 rounded-full uppercase tracking-wider">6 Bulan Terakhir</span>
                    </div>
                    <div class="relative w-full" style="height: 300px;">
                        <canvas id="beritaChart"></canvas>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 relative">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-extrabold text-gray-800 flex items-center gap-2">
                            <i class="fa-solid fa-chart-pie text-red-500"></i> Rasio Status Aspirasi
                        </h3>
                    </div>
                    <div class="relative w-full flex justify-center items-center" style="height: 300px;">
                        <canvas id="aspirasiChart"></canvas>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Script Chart.js -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // (Script Chart.js Anda tetap sama persis seperti sebelumnya)
            // ...
        });
    </script>

@endsection <!-- 3. MENUTUP AREA KONTEN -->