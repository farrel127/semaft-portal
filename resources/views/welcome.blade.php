@extends('layouts.frontend')

@section('title', 'Beranda Utama')

@section('content')
    <section class="bg-semaft-navy py-20 md:py-32 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-semaft-gold opacity-5 rounded-full -mr-20 -mt-20 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-500 opacity-10 rounded-full -ml-20 -mb-20 blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight mb-6">
                Sinergi Membangun <br class="hidden md:block"/> 
                <span class="text-semaft-gold">Fakultas Teknik</span> yang Solid
            </h1>
            <p class="mt-4 text-lg md:text-xl text-gray-300 max-w-2xl mx-auto mb-10">
                Senat Mahasiswa Fakultas Teknik USB YPKP. Rumah aspirasi dan kolaborasi bagi seluruh elemen mahasiswa teknik untuk berkarya bersama.
            </p>
            <div class="flex justify-center gap-4">
                <a href="{{ url('/aspirasi') }}" class="bg-semaft-gold text-semaft-navy font-bold px-8 py-3 rounded-md hover:bg-yellow-400 transition shadow-lg text-lg">
                    Sampaikan Aspirasi
                </a>
            </div>
        </div>
    </section>

    <section class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-semaft-navy uppercase tracking-wide">Menaungi 6 Program Studi</h2>
            <div class="w-24 h-1 bg-semaft-gold mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
           @foreach($himpunans as $himpunan)
            <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition duration-300 p-8 text-center border border-gray-100 group flex flex-col h-full">
                
                <div class="h-24 flex items-center justify-center mb-6">
                    @if($himpunan->logo)
                        <img src="{{ asset('storage/' . $himpunan->logo) }}" alt="Logo {{ $himpunan->singkatan }}" class="max-h-full max-w-full object-contain group-hover:scale-110 transition duration-300 drop-shadow-md">
                    @else
                        <div class="text-6xl text-semaft-navy transform group-hover:-translate-y-2 group-hover:text-semaft-gold transition duration-300">
                            <i class="fa-solid fa-building-columns"></i>
                        </div>
                    @endif
                </div>
                
                <div class="flex-grow flex items-center justify-center mb-6">
                    <h3 class="text-xl font-bold text-semaft-navy leading-snug">
                        {{ $himpunan->nama }}
                    </h3>
                </div>
                
                <div>
                    <span class="inline-block bg-blue-50 text-semaft-navy font-semibold px-4 py-1.5 rounded-full text-sm tracking-widest">
                        {{ $himpunan->singkatan }}
                    </span>
                </div>

            </div>
            @endforeach
        </div>
    </section>
    <!-- Section Agenda Mendatang -->
    @if($agenda_terdekat->count() > 0)
    <section class="py-16 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-4">
                <div>
                    <h2 class="text-3xl font-bold text-semaft-navy uppercase tracking-wide">Agenda Terdekat</h2>
                    <div class="w-20 h-1 bg-semaft-gold mt-3 rounded-full"></div>
                </div>
                <a href="{{ route('frontend.kegiatan') }}" class="text-sm font-bold text-gray-500 hover:text-semaft-navy transition flex items-center gap-2">
                    Lihat Semua Agenda <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($agenda_terdekat as $agenda)
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100 hover:border-semaft-gold transition duration-300 group flex items-start gap-4">
                    <!-- Kalender Ikon -->
                    <div class="flex flex-col items-center justify-center bg-white border border-gray-200 rounded-xl min-w-[70px] py-2 shadow-sm group-hover:bg-semaft-navy group-hover:text-white transition duration-300">
                        <span class="text-xs font-bold uppercase text-red-500 group-hover:text-semaft-gold">{{ \Carbon\Carbon::parse($agenda->tanggal)->translatedFormat('M') }}</span>
                        <span class="text-2xl font-extrabold">{{ \Carbon\Carbon::parse($agenda->tanggal)->format('d') }}</span>
                    </div>
                    <!-- Detail Agenda -->
                    <div>
                        <span class="text-xs font-bold px-2 py-0.5 rounded-md mb-2 inline-block {{ $agenda->status == 'Berlangsung' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ $agenda->status }}
                        </span>
                        <h3 class="font-bold text-semaft-navy leading-tight mb-2 group-hover:text-semaft-gold transition">
                            {{ $agenda->nama_kegiatan }}
                        </h3>
                        <p class="text-xs text-gray-500 flex items-center gap-1">
                            <i class="fa-solid fa-location-dot"></i> {{ Str::limit($agenda->lokasi, 25) }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Section Berita Terbaru -->
    <section class="py-20 bg-gray-50 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-semaft-navy uppercase tracking-wide">Kabar TEKNIK</h2>
                <div class="w-24 h-1 bg-semaft-gold mx-auto mt-4 rounded-full"></div>
                <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Pantau terus informasi terbaru, artikel, dan rilis pers dari kegiatan mahasiswa Teknik.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($berita_terbaru as $berita)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-gray-100 group flex flex-col h-full">
                        <div class="h-48 overflow-hidden relative">
                            @if($berita->gambar_thumbnail)
                                <img src="{{ asset('storage/' . $berita->gambar_thumbnail) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            @else
                                <div class="w-full h-full bg-blue-50 flex items-center justify-center text-blue-200">
                                    <i class="fa-solid fa-newspaper text-5xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-6 flex-grow flex flex-col">
                            <div class="text-xs font-bold text-semaft-gold mb-2 flex items-center gap-2">
                                <i class="fa-regular fa-clock"></i> {{ $berita->created_at->diffForHumans() }}
                            </div>
                            <h3 class="text-lg font-bold text-semaft-navy mb-3 leading-snug group-hover:text-blue-700 transition">
                                <a href="{{ route('frontend.baca', $berita->slug) }}">{{ $berita->judul }}</a>
                            </h3>
                            <p class="text-sm text-gray-500 flex-grow mb-4">
                                {{ Str::limit(strip_tags($berita->konten), 90) }}
                            </p>
                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <a href="{{ route('frontend.baca', $berita->slug) }}" class="text-sm font-bold text-semaft-navy hover:text-semaft-gold transition flex items-center gap-1">
                                    Baca Selengkapnya <i class="fa-solid fa-arrow-right text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-10">
                        <p class="text-gray-500">Belum ada berita yang dipublikasikan.</p>
                    </div>
                @endforelse
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('frontend.berita') }}" class="inline-block bg-white border-2 border-semaft-navy text-semaft-navy font-bold px-8 py-3 rounded-full hover:bg-semaft-navy hover:text-white transition shadow-sm">
                    Jelajahi Portal Berita
                </a>
            </div>
        </div>
    </section>
@endsection