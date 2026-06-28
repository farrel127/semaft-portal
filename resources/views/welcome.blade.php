@extends('layouts.frontend')

@section('title', 'Beranda Utama')

@section('content')
   <!-- HERO SECTION: APPLE macOS "VIBRANCY" AESTHETIC -->
<section class="relative w-full h-screen min-h-[750px] flex items-center justify-center overflow-hidden" style="background-color: #0b0622;">

    <div style="position: absolute; top: -10%; left: 15%; width: 55vw; height: 55vw; background: radial-gradient(circle, rgba(255,255,255,0.28) 0%, transparent 65%); filter: blur(130px); pointer-events: none; mix-blend-mode: screen;"></div>
    
    <div style="position: absolute; top: 15%; right: -5%; width: 50vw; height: 50vw; background: radial-gradient(circle, rgba(244,195,50,0.18) 0%, transparent 60%); filter: blur(120px); pointer-events: none;"></div>
    
    <div style="position: absolute; bottom: -15%; left: 10%; width: 60vw; height: 60vw; background: radial-gradient(circle, rgba(30,17,96,0.6) 0%, transparent 70%); filter: blur(140px); pointer-events: none;"></div>

    <div style="position: absolute; inset: 0; background-image: radial-gradient(rgba(255,255,255,0.08) 1px, transparent 1px); background-size: 32px 32px; opacity: 0.5; pointer-events: none;"></div>

    <div class="relative z-10 w-full max-w-5xl mx-4 sm:mx-6 px-6 sm:px-12 py-16 md:py-22 rounded-[24px] flex flex-col items-center text-center transform hover:scale-[1.005] transition-transform duration-700"
         style="background: linear-gradient(135deg, rgba(30, 17, 96, 0.25) 0%, rgba(255, 255, 255, 0.02) 100%);
                backdrop-filter: blur(40px);
                -webkit-backdrop-filter: blur(40px);
                border: 1px solid rgba(255, 255, 255, 0.14);
                box-shadow: 0 40px 80px rgba(6, 3, 20, 0.6), inset 0 1px 0 rgba(255, 255, 255, 0.25);">
        
        <div class="absolute top-6 left-6 flex gap-2">
            <div style="width: 12px; height: 12px; border-radius: 50%; background-color: #ff5f56; border: 0.5px solid rgba(0,0,0,0.15);"></div>
            <div style="width: 12px; height: 12px; border-radius: 50%; background-color: #ffbd2e; border: 0.5px solid rgba(0,0,0,0.15);"></div>
            <div style="width: 12px; height: 12px; border-radius: 50%; background-color: #27c93f; border: 0.5px solid rgba(0,0,0,0.15);"></div>
        </div>

        <div class="mt-6 md:mt-0 inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full mb-8" 
             style="background: rgba(16, 8, 54, 0.4); border: 1px solid rgba(244, 195, 50, 0.25); box-shadow: inset 0 1px 0 rgba(255,255,255,0.05);">
            <i class="fa-solid fa-microchip text-xs" style="color: #f4c332;"></i>
            <span class="text-[10px] sm:text-xs font-bold tracking-[0.2em] uppercase" style="color: #e2e8f0;">Senat Mahasiswa Fakultas Teknik</span>
        </div>

        <h1 class="text-4xl sm:text-5xl md:text-7xl font-extrabold tracking-tight mb-8" style="letter-spacing: -0.03em; line-height: 1.05;">
            <span style="background: linear-gradient(180deg, #ffffff 0%, #cbd5e1 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Sinergi Membangun
            </span>
            <br class="hidden sm:block" />
            <span style="background: linear-gradient(135deg, #fef08a 0%, #f4c332 50%, #ca8a04 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; filter: drop-shadow(0 8px 20px rgba(244,195,50,0.3));">
                Fakultas Teknik yang Solid
            </span>
        </h1>

        <p class="text-base md:text-xl max-w-2xl leading-relaxed mb-12" style="color: rgba(226, 232, 240, 0.75); font-weight: 400; letter-spacing: -0.01em;">
            Rumah aspirasi dan kolaborasi bagi seluruh elemen mahasiswa teknik untuk berkarya, berinovasi, dan bergerak bersama.
        </p>

        <div class="flex flex-col items-center opacity-50 hover:opacity-100 transition-opacity duration-300 animate-bounce cursor-default mt-2">
            <span class="text-[9px] font-bold tracking-[0.25em] uppercase mb-3" style="color: rgba(255,255,255,0.4);">Eksplorasi</span>
            <i class="fa-solid fa-chevron-down text-xs" style="color: #f4c332;"></i>
        </div>

    </div>

    <div class="absolute bottom-0 inset-x-0 h-40 pointer-events-none" style="background: linear-gradient(to top, #f9fafb, transparent);"></div>
</section>

    <section class="py-16 sm:py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative bg-slate-50/50">
        <div class="text-center mb-12 sm:mb-16">
            <span class="text-semaft-gold font-bold tracking-wider text-sm sm:text-base uppercase mb-2 block">Keluarga Besar SEMA FT</span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#1e1160] uppercase tracking-tight">Menaungi 6 Program Studi</h2>
            <div class="w-16 sm:w-24 h-1 sm:h-1.5 bg-gradient-to-r from-semaft-gold to-yellow-300 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
           @foreach($himpunans as $himpunan)
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 p-6 sm:p-8 text-center border border-gray-100 group flex flex-col h-full transform hover:-translate-y-2 cursor-pointer relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gray-100 group-hover:bg-semaft-gold transition-colors duration-300"></div>

                <div class="h-20 sm:h-28 flex items-center justify-center mb-4 sm:mb-6">
                    @if($himpunan->logo)
                        <img src="{{ asset('storage/' . $himpunan->logo) }}" alt="Logo {{ $himpunan->singkatan }}" class="max-h-full max-w-full object-contain transform group-hover:scale-110 transition duration-500 drop-shadow-md shrink-0">
                    @else
                        <div class="text-5xl sm:text-7xl text-gray-200 group-hover:text-semaft-gold transition-colors duration-500 shrink-0">
                            <i class="fa-solid fa-building-columns"></i>
                        </div>
                    @endif
                </div>
                
                <div class="flex-grow flex flex-col justify-center items-center">
                    <h3 class="text-sm sm:text-xl font-bold text-[#1e1160] leading-tight sm:leading-snug mb-3 group-hover:text-blue-700 transition-colors">
                        {{ $himpunan->nama }}
                    </h3>
                    <span class="inline-block bg-blue-50/80 text-blue-700 font-bold px-3 sm:px-4 py-1 sm:py-1.5 rounded-lg text-xs sm:text-sm tracking-wide border border-blue-100">
                        {{ $himpunan->singkatan }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    @if($agenda_terdekat->count() > 0)
    <section class="py-16 sm:py-20 bg-white border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-8 sm:mb-12 gap-4">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1e1160] uppercase tracking-tight">Agenda Terdekat</h2>
                    <div class="w-16 sm:w-20 h-1 sm:h-1.5 bg-semaft-gold mt-3 rounded-full"></div>
                </div>
                <a href="{{ route('frontend.kegiatan') }}" class="text-sm sm:text-base font-bold text-gray-500 hover:text-semaft-gold transition flex items-center gap-2 group shrink-0">
                    Lihat Semua Agenda <i class="fa-solid fa-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                @foreach($agenda_terdekat as $agenda)
                <div class="bg-gray-50 rounded-2xl p-4 sm:p-6 border border-gray-100 hover:border-semaft-gold hover:shadow-lg hover:bg-white transition-all duration-300 group flex items-center sm:items-start gap-4 sm:gap-5">
                    
                    <div class="flex flex-col items-center justify-center bg-white border border-gray-200 rounded-xl min-w-[65px] sm:min-w-[80px] py-2 sm:py-3 shadow-sm group-hover:bg-[#1e1160] group-hover:border-[#1e1160] group-hover:text-white transition duration-300 shrink-0">
                        <span class="text-[10px] sm:text-xs font-bold uppercase text-red-500 group-hover:text-semaft-gold">{{ \Carbon\Carbon::parse($agenda->tanggal)->translatedFormat('M') }}</span>
                        <span class="text-xl sm:text-3xl font-black text-slate-800 group-hover:text-white leading-none mt-1">{{ \Carbon\Carbon::parse($agenda->tanggal)->format('d') }}</span>
                    </div>
                    
                    <div class="flex-1 min-w-0">
                        <span class="text-[10px] sm:text-xs font-bold px-2 sm:px-3 py-1 rounded-md mb-2 inline-block {{ $agenda->status == 'Berlangsung' ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-yellow-100 text-yellow-700 border border-yellow-200' }}">
                            {{ $agenda->status }}
                        </span>
                        <h3 class="font-bold text-sm sm:text-lg text-[#1e1160] leading-tight mb-1 sm:mb-2 group-hover:text-blue-600 transition truncate">
                            {{ $agenda->nama_kegiatan }}
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-500 flex items-center gap-1.5 truncate">
                            <i class="fa-solid fa-location-dot text-gray-400 shrink-0"></i> {{ $agenda->lokasi }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- SECTION: ARSIP VISUAL (GALERI TERBARU) -->
<section class="py-16 md:py-24 relative overflow-hidden" style="background-color: #0b061a;">
    
    <!-- Efek Cahaya Latar Belakang -->
    <div class="absolute top-0 right-0 w-[40vw] h-[40vw] bg-indigo-900/20 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Judul Section & Tombol Lihat Semua -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-10 gap-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full mb-3" style="background: rgba(244,195,50,0.1); border: 1px solid rgba(244,195,50,0.2);">
                    <i class="fa-solid fa-camera text-xs" style="color: #f4c332;"></i>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-yellow-400">Galeri SEMA FT</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight">Arsip Visual</h2>
            </div>
            
            <a href="{{ route('frontend.galeri') }}" class="hidden sm:inline-flex items-center gap-2 text-sm font-semibold transition-all duration-300 hover:gap-3" style="color: #f4c332;">
                Eksplorasi Semua Karya <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <!-- Grid Foto -->
        @if($galeri_terbaru->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                @foreach($galeri_terbaru as $foto)
                    <a href="{{ route('frontend.galeri') }}" class="group relative rounded-2xl overflow-hidden aspect-square border shadow-lg transform transition-all duration-500 hover:-translate-y-2" style="border-color: rgba(255,255,255,0.1);">
                        
                        <!-- Gambar -->
                        <img src="{{ asset('storage/' . $foto->gambar) }}" alt="{{ $foto->judul }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        
                        <!-- Filter Gelap Muncul Saat Hover -->
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4 md:p-6"
                             style="background: linear-gradient(to top, rgba(11,5,26,0.9) 0%, rgba(11,5,26,0.2) 50%, transparent 100%);">
                            <span class="text-[10px] md:text-xs font-bold uppercase tracking-wider mb-1" style="color: #f4c332;">
                                {{ $foto->kategori }}
                            </span>
                            <h3 class="text-white font-bold text-sm md:text-lg truncate">{{ $foto->judul }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <!-- Jika Admin Belum Upload Foto -->
            <div class="w-full py-12 rounded-2xl flex flex-col items-center justify-center border border-dashed" style="border-color: rgba(255,255,255,0.2); background: rgba(255,255,255,0.02);">
                <i class="fa-regular fa-image text-4xl mb-3 text-gray-600"></i>
                <p class="text-gray-500 text-sm font-medium">Dokumentasi kegiatan akan segera diunggah.</p>
            </div>
        @endif

        <!-- Tombol Lihat Semua (Versi Mobile) -->
        <div class="mt-8 text-center sm:hidden">
            <a href="{{ route('frontend.galeri') }}" class="inline-flex items-center justify-center w-full py-3 rounded-xl text-sm font-bold transition-all" style="background: rgba(244,195,50,0.15); border: 1px solid rgba(244,195,50,0.3); color: #f4c332;">
                Eksplorasi Semua Karya <i class="fa-solid fa-arrow-right ml-2"></i>
            </a>
        </div>

    </div>
</section>

    <section class="py-16 sm:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 sm:mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#1e1160] uppercase tracking-tight">Kabar <span class="text-blue-600">Teknik</span></h2>
                <div class="w-16 sm:w-24 h-1 sm:h-1.5 bg-semaft-gold mx-auto mt-4 rounded-full"></div>
                <p class="text-sm sm:text-base text-gray-500 mt-4 max-w-2xl mx-auto px-4">Pantau terus informasi terbaru, pergerakan, dan rilis pers dari dinamika mahasiswa Fakultas Teknik.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @forelse($berita_terbaru as $berita)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 group flex flex-col h-full transform hover:-translate-y-2">
                        <div class="h-48 sm:h-56 overflow-hidden relative shrink-0">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            @if($berita->gambar_thumbnail)
                                <img src="{{ asset('storage/' . $berita->gambar_thumbnail) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                            @else
                                <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-300">
                                    <i class="fa-solid fa-image text-5xl"></i>
                                </div>
                            @endif
                            
                            <div class="absolute top-4 left-4 z-20">
                                <span class="bg-white/90 backdrop-blur-sm text-[#1e1160] text-[10px] sm:text-xs font-extrabold px-3 py-1.5 rounded-lg shadow-sm">
                                    <i class="fa-regular fa-clock text-semaft-gold mr-1"></i> {{ $berita->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="p-5 sm:p-7 flex-grow flex flex-col bg-white relative z-20">
                            <h3 class="text-lg sm:text-xl font-bold text-slate-800 mb-3 leading-snug group-hover:text-blue-600 transition-colors line-clamp-2">
                                <a href="{{ route('frontend.baca', $berita->slug) }}" class="focus:outline-none">
                                    {{ $berita->judul }}
                                </a>
                            </h3>
                            <p class="text-sm text-gray-500 flex-grow mb-4 sm:mb-6 line-clamp-3">
                                {{ Str::limit(strip_tags($berita->konten), 120) }}
                            </p>
                            
                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <a href="{{ route('frontend.baca', $berita->slug) }}" class="inline-flex items-center gap-2 text-sm font-bold text-[#1e1160] hover:text-blue-600 transition-colors group/link shrink-0">
                                    Baca Selengkapnya 
                                    <i class="fa-solid fa-arrow-right text-xs transform group-hover/link:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center py-12 sm:py-20 bg-white rounded-3xl border border-gray-100 border-dashed">
                        <div class="text-4xl text-gray-300 mb-3"><i class="fa-solid fa-folder-open"></i></div>
                        <p class="text-gray-500 font-medium">Belum ada rilis berita saat ini.</p>
                    </div>
                @endforelse
            </div>
            
            <div class="text-center mt-12 sm:mt-16">
                <a href="{{ route('frontend.berita') }}" class="w-full sm:w-auto inline-block bg-transparent border-2 border-[#1e1160] text-[#1e1160] font-bold px-10 py-3.5 rounded-full hover:bg-[#1e1160] hover:text-white transition-all duration-300 shadow-sm text-sm sm:text-base shrink-0">
                    Jelajahi Portal Berita
                </a>
            </div>
        </div>
    </section>
@endsection