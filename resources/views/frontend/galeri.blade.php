@extends('layouts.frontend') <!-- Sesuaikan dengan nama layout utama Anda -->

@section('content')
<!-- GALERI: macOS PHOTOS AESTHETIC -->
<section class="relative w-full min-h-screen pt-32 pb-20 overflow-hidden" style="background-color: #080414;">

    <!-- Ambient Glow Background -->
    <div style="position: fixed; top: -10%; left: -10%; width: 50vw; height: 50vw; background: radial-gradient(circle, rgba(30,17,96,0.3) 0%, transparent 60%); filter: blur(100px); pointer-events: none; z-index: 0;"></div>
    <div style="position: fixed; bottom: -10%; right: -10%; width: 50vw; height: 50vw; background: radial-gradient(circle, rgba(244,195,50,0.1) 0%, transparent 60%); filter: blur(120px); pointer-events: none; z-index: 0;"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Galeri -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 tracking-tight" style="letter-spacing: -0.02em;">Arsip Visual</h1>
            <p class="text-gray-400 text-sm md:text-base max-w-2xl mx-auto">Kumpulan rekam jejak, desain kreatif, dan dokumentasi perjalanan Senat Mahasiswa Fakultas Teknik.</p>
        </div>

        <!-- Filter Bar (macOS Segmented Control Style) -->
        <div class="flex justify-center mb-12">
            <div class="inline-flex items-center p-1 rounded-2xl" 
                 style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(20px);">
                <!-- Tombol Filter (Bisa dibuat interaktif nanti dengan JS) -->
                <button class="px-5 py-2 rounded-xl text-sm font-semibold transition-all duration-300 shadow-sm" style="background: rgba(255,255,255,0.1); color: white;">Semua</button>
                <button class="px-5 py-2 rounded-xl text-sm font-medium transition-all duration-300 hover:text-white" style="color: rgba(255,255,255,0.5);">Monthly Recap</button>
                <button class="px-5 py-2 rounded-xl text-sm font-medium transition-all duration-300 hover:text-white" style="color: rgba(255,255,255,0.5);">Kreatif & Bisnis</button>
                <button class="px-5 py-2 rounded-xl text-sm font-medium transition-all duration-300 hover:text-white" style="color: rgba(255,255,255,0.5);">Kegiatan</button>
            </div>
        </div>

        <!-- Photo Grid -->
        @if($galeris->count() > 0)
            <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 space-y-6">
                @foreach($galeris as $item)
                    <!-- Photo Card -->
                    <div class="relative group rounded-3xl overflow-hidden cursor-pointer transform transition-all duration-500 hover:-translate-y-2"
                         style="border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                        
                        <!-- Gambar (Anggap ada folder storage/galeri) -->
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-auto object-cover transition-transform duration-700 group-hover:scale-110">
                        
                        <!-- Overlay Kaca Muncul Saat Hover -->
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6"
                             style="background: linear-gradient(to top, rgba(11,5,26,0.9) 0%, rgba(11,5,26,0.2) 50%, transparent 100%);">
                            
                            <span class="inline-block px-3 py-1 mb-2 text-[10px] font-bold uppercase tracking-wider rounded-lg self-start"
                                  style="background: rgba(244,195,50,0.2); color: #f4c332; backdrop-filter: blur(10px);">
                                {{ $item->kategori }}
                            </span>
                            
                            <h3 class="text-white font-bold text-lg leading-tight mb-1">{{ $item->judul }}</h3>
                            
                            @if($item->deskripsi)
                                <p class="text-gray-300 text-xs line-clamp-2">{{ $item->deskripsi }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="flex flex-col items-center justify-center py-20 opacity-50">
                <i class="fa-regular fa-images text-6xl mb-4 text-gray-500"></i>
                <p class="text-gray-400 font-medium">Belum ada arsip visual yang dipublikasikan.</p>
            </div>
        @endif

    </div>
</section>
@endsection