@extends('layouts.frontend')

@section('title', 'Beranda Utama')

@section('content')
    <!-- HERO SECTION -->
    <section class="bg-semaft-navy py-20 sm:py-28 md:py-36 relative overflow-hidden flex items-center min-h-[85vh]">
        <!-- Efek Cahaya Latar Belakang (Blur Blobs) -->
        <div class="absolute top-0 right-0 w-48 sm:w-72 h-48 sm:h-72 bg-semaft-gold opacity-10 sm:opacity-5 rounded-full -mr-10 -mt-10 blur-2xl sm:blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-64 sm:w-96 h-64 sm:h-96 bg-blue-600 opacity-20 sm:opacity-10 rounded-full -ml-20 -mb-20 blur-2xl sm:blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center w-full">
            <!-- Label Organisasi -->
            <div class="inline-flex items-center gap-2 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full bg-white/5 border border-white/10 backdrop-blur-sm mb-6 sm:mb-8 text-xs sm:text-sm font-medium text-gray-300 tracking-wide shadow-lg">
                <span class="w-2 h-2 rounded-full bg-semaft-gold animate-ping"></span>
                Senat Mahasiswa Fakultas Teknik USB YPKP
            </div>

            <!-- Headline -->
            <h1 class="text-3xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-white leading-tight sm:leading-tight md:leading-tight mb-4 sm:mb-6 tracking-tight">
                Sinergi Membangun <br class="hidden sm:block"/> 
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-semaft-gold to-yellow-200">Fakultas Teknik</span> yang Solid
            </h1>
            
            <p class="mt-4 text-base sm:text-lg md:text-xl text-gray-300 max-w-2xl mx-auto mb-8 sm:mb-12 px-2 sm:px-0 leading-relaxed">
                Rumah aspirasi dan kolaborasi bagi seluruh elemen mahasiswa teknik untuk berkarya, berinovasi, dan bergerak bersama.
            </p>
            
            <!-- Tombol Aksi -->
            <div class="flex flex-col sm:flex-row justify-center gap-4 px-4 sm:px-0">
                <a href="{{ url('/aspirasi') }}" class="w-full sm:w-auto bg-semaft-gold text-semaft-navy font-bold px-8 py-3.5 rounded-xl hover:bg-yellow-400 transition-all duration-300 transform hover:-translate-y-1 shadow-[0_10px_20px_rgba(255,215,0,0.2)] text-base sm:text-lg flex items-center justify-center gap-2">
                    Sampaikan Aspirasi <i class="fa-solid fa-paper-plane"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION HIMPUNAN (6 PROGRAM STUDI) -->
    <section class="py-16 sm:py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative bg-slate-50/50">
        <div class="text-center mb-12 sm:mb-16">
            <span class="text-semaft-gold font-bold tracking-wider text-sm sm:text-base uppercase mb-2 block">Keluarga Besar SEMA FT</span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-semaft-navy uppercase tracking-tight">Menaungi 6 Program Studi</h2>
            <div class="w-16 sm:w-24 h-1 sm:h-1.5 bg-gradient-to-r from-semaft-gold to-yellow-300 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
           @foreach($himpunans as $himpunan)
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-500 p-6 sm:p-8 text-center border border-gray-100 group flex flex-col h-full transform hover:-translate-y-2 cursor-pointer relative overflow-hidden">
                <!-- Ornamen Garis Atas -->
                <div class="absolute top-0 left-0 w-full h-1 bg-gray-100 group-hover:bg-semaft-gold transition-colors duration-300"></div>

                <div class="h-20 sm:h-28 flex items-center justify-center mb-4 sm:mb-6">
                    @if($himpunan->logo)
                        <img src="{{ asset('storage/' . $himpunan->logo) }}" alt="Logo {{ $himpunan->singkatan }}" class="max-h-full max-w-full object-contain transform group-hover:scale-110 transition duration-500 drop-shadow-md">
                    @else
                        <div class="text-5xl sm:text-7xl text-gray-200 group-hover:text-semaft-gold transition-colors duration-500">
                            <i class="fa-solid fa-building-columns"></i>
                        </div>
                    @endif
                </div>
                
                <div class="flex-grow flex flex-col justify-center items-center">
                    <h3 class="text-base sm:text-xl font-bold text-semaft-navy leading-tight sm:leading-snug mb-3 group-hover:text-blue-700 transition-colors">
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

    <!-- SECTION AGENDA TERDEKAT -->
    @if($agenda_terdekat->count() > 0)
    <section class="py-16 sm:py-20 bg-white border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-8 sm:mb-12 gap-4">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-semaft-navy uppercase tracking-tight">Agenda Terdekat</h2>
                    <div class="w-16 sm:w-20 h-1 sm:h-1.5 bg-semaft-gold mt-3 rounded-full"></div>
                </div>
                <a href="{{ route('frontend.kegiatan') }}" class="text-sm sm:text-base font-bold text-gray-500 hover:text-semaft-gold transition flex items-center gap-2 group">
                    Lihat Semua Agenda <i class="fa-solid fa-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                @foreach($agenda_terdekat as $agenda)
                <div class="bg-gray-50 rounded-2xl p-4 sm:p-6 border border-gray-100 hover:border-semaft-gold hover:shadow-lg hover:bg-white transition-all duration-300 group flex items-center sm:items-start gap-4 sm:gap-5">
                    <!-- Kalender Ikon -->
                    <div class="flex flex-col items-center justify-center bg-white border border-gray-200 rounded-xl min-w-[65px] sm:min-w-[80px] py-2 sm:py-3 shadow-sm group-hover:bg-semaft-navy group-hover:border-semaft-navy group-hover:text-white transition duration-300">
                        <span class="text-[10px] sm:text-xs font-bold uppercase text-red-500 group-hover:text-semaft-gold">{{ \Carbon\Carbon::parse($agenda->tanggal)->translatedFormat('M') }}</span>
                        <span class="text-xl sm:text-3xl font-black text-slate-800 group-hover:text-white leading-none mt-1">{{ \Carbon\Carbon::parse($agenda->tanggal)->format('d') }}</span>
                    </div>
                    <!-- Detail Agenda -->
                    <div class="flex-1 min-w-0">
                        <span class="text-[10px] sm:text-xs font-bold px-2 sm:px-3 py-1 rounded-md mb-2 inline-block {{ $agenda->status == 'Berlangsung' ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-yellow-100 text-yellow-700 border border-yellow-200' }}">
                            {{ $agenda->status }}
                        </span>
                        <h3 class="font-bold text-sm sm:text-lg text-semaft-navy leading-tight mb-1 sm:mb-2 group-hover:text-blue-600 transition truncate sm:whitespace-normal">
                            {{ $agenda->nama_kegiatan }}
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-500 flex items-center gap-1.5 truncate">
                            <i class="fa-solid fa-location-dot text-gray-400"></i> {{ Str::limit($agenda->lokasi, 30) }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- SECTION BERITA TERBARU -->
    <section class="py-16 sm:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 sm:mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-semaft-navy uppercase tracking-tight">Kabar <span class="text-blue-600">Teknik</span></h2>
                <div class="w-16 sm:w-24 h-1 sm:h-1.5 bg-semaft-gold mx-auto mt-4 rounded-full"></div>
                <p class="text-sm sm:text-base text-gray-500 mt-4 max-w-2xl mx-auto px-4">Pantau terus informasi terbaru, pergerakan, dan rilis pers dari dinamika mahasiswa Fakultas Teknik.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @forelse($berita_terbaru as $berita)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 group flex flex-col h-full transform hover:-translate-y-2">
                        <div class="h-48 sm:h-56 overflow-hidden relative">
                            <!-- Overlay Gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            @if($berita->gambar_thumbnail)
                                <img src="{{ asset('storage/' . $berita->gambar_thumbnail) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                            @else
                                <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-300">
                                    <i class="fa-solid fa-image text-5xl"></i>
                                </div>
                            @endif
                            
                            <!-- Badge Kategori/Waktu melayang di atas gambar -->
                            <div class="absolute top-4 left-4 z-20">
                                <span class="bg-white/90 backdrop-blur-sm text-semaft-navy text-[10px] sm:text-xs font-extrabold px-3 py-1.5 rounded-lg shadow-sm">
                                    <i class="fa-regular fa-clock text-semaft-gold mr-1"></i> {{ $berita->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="p-5 sm:p-7 flex-grow flex flex-col bg-white relative z-20">
                            <h3 class="text-lg sm:text-xl font-bold text-slate-800 mb-3 leading-snug group-hover:text-blue-600 transition-colors">
                                <a href="{{ route('frontend.baca', $berita->slug) }}" class="focus:outline-none">
                                    {{-- Menggunakan Str::limit agar judul panjang tidak merusak card di HP --}}
                                    {{ Str::limit($berita->judul, 55) }}
                                </a>
                            </h3>
                            <p class="text-sm text-gray-500 flex-grow mb-4 sm:mb-6 line-clamp-3">
                                {{ Str::limit(strip_tags($berita->konten), 120) }}
                            </p>
                            
                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <a href="{{ route('frontend.baca', $berita->slug) }}" class="inline-flex items-center gap-2 text-sm font-bold text-semaft-navy hover:text-blue-600 transition-colors group/link">
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
                <a href="{{ route('frontend.berita') }}" class="w-full sm:w-auto inline-block bg-transparent border-2 border-semaft-navy text-semaft-navy font-bold px-8 py-3.5 rounded-xl hover:bg-semaft-navy hover:text-white transition-all duration-300 shadow-sm text-sm sm:text-base">
                    Jelajahi Portal Berita
                </a>
            </div>
        </div>
    </section>
@endsection