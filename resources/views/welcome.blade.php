@extends('layouts.frontend')

@section('title', 'Beranda Utama')

@section('content')
    <section class="relative w-full min-h-[90vh] flex items-center justify-center overflow-hidden bg-semaft-navy pt-20">
    
    <div class="absolute top-1/4 -left-10 w-72 md:w-96 h-72 md:h-96 bg-semaft-gold/30 rounded-full mix-blend-screen filter blur-[100px] animate-pulse pointer-events-none"></div>
    
    <div class="absolute bottom-1/4 -right-10 w-72 md:w-96 h-72 md:h-96 bg-[#8b5cf6]/20 rounded-full mix-blend-screen filter blur-[100px] pointer-events-none"></div>
    
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNSkiLz48L3N2Zz4=')] opacity-60 pointer-events-none"></div>

    <div class="relative z-10 text-center px-4 sm:px-6 max-w-5xl mx-auto">
        
        <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-white/5 border border-white/10 backdrop-blur-md shadow-2xl mb-8 transform hover:-translate-y-1 transition-all duration-300">
            <span class="relative flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-semaft-gold opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-semaft-gold"></span>
            </span>
            <span class="text-sm md:text-base font-semibold text-gray-200 tracking-wide">Senat Mahasiswa Fakultas Teknik USB YPKP Bandung</span>
        </div>

        <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-black text-white tracking-tight leading-[1.1] mb-8 drop-shadow-2xl">
            Sinergi Membangun <br class="hidden sm:block" />
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-semaft-gold via-yellow-200 to-semaft-gold">
                Fakultas Teknik yang Solid
            </span>
        </h1>

        <p class="text-lg md:text-xl lg:text-2xl text-gray-300 font-medium max-w-3xl mx-auto leading-relaxed drop-shadow-md">
            Rumah aspirasi dan kolaborasi bagi seluruh elemen mahasiswa teknik untuk berkarya, berinovasi, dan bergerak bersama.
        </p>
        
    </div>

    <div class="absolute bottom-0 inset-x-0 h-32 bg-gradient-to-t from-gray-50 to-transparent pointer-events-none"></div>
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