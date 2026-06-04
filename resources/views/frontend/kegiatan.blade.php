@extends('layouts.frontend')

@section('title', 'Kalender Kegiatan')

@section('content')
    <!-- Hero Section -->
    <section class="bg-semaft-navy py-16 relative overflow-hidden text-center">
        <div class="absolute top-0 right-0 w-64 h-64 bg-semaft-gold opacity-10 rounded-full -mr-20 -mt-20 blur-3xl"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Agenda & <span class="text-semaft-gold">Kegiatan</span></h1>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                Pantau terus jadwal acara, workshop, dan seminar terbaru dari SEMAFT beserta seluruh Himpunan Mahasiswa Program Studi.
            </p>
        </div>
    </section>

    <!-- Daftar Kegiatan -->
    <section class="py-16 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @forelse($kegiatans as $item)
                    <div class="bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group flex flex-col h-full">
                        
                        <!-- Area Poster -->
                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            @if($item->gambar_poster)
                                <img src="{{ asset('storage/' . $item->gambar_poster) }}" alt="{{ $item->nama_kegiatan }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <!-- Gambar Default/Placeholder jika tidak ada poster -->
                                <div class="w-full h-full flex flex-col items-center justify-center bg-blue-50 text-blue-200">
                                    <i class="fa-solid fa-calendar-days text-5xl mb-2"></i>
                                    <span class="text-sm font-semibold">Poster Tidak Tersedia</span>
                                </div>
                            @endif

                            <!-- Badge Status -->
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold shadow-md 
                                    {{ $item->status == 'Akan Datang' ? 'bg-yellow-400 text-yellow-900' : ($item->status == 'Berlangsung' ? 'bg-green-500 text-white' : 'bg-gray-800 text-white') }}">
                                    {{ $item->status }}
                                </span>
                            </div>
                        </div>

                        <!-- Area Detail Konten -->
                        <div class="p-6 flex-grow flex flex-col">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="bg-blue-50 text-semaft-navy text-xs font-bold px-3 py-1 rounded-md tracking-wider">
                                    {{ $item->himpunan ? $item->himpunan->singkatan : 'SEMAFT' }}
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-semaft-navy mb-4 leading-tight group-hover:text-semaft-gold transition">
                                {{ $item->nama_kegiatan }}
                            </h3>

                            <!-- Info Waktu & Lokasi -->
                            <div class="space-y-2 mb-6">
                                <div class="flex items-center text-sm text-gray-600">
                                    <div class="w-8 flex justify-center"><i class="fa-regular fa-calendar text-semaft-gold"></i></div>
                                    <span class="font-medium">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <div class="w-8 flex justify-center"><i class="fa-regular fa-clock text-semaft-gold"></i></div>
                                    <span>{{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H:i') }} WIB - {{ $item->waktu_selesai ? \Carbon\Carbon::parse($item->waktu_selesai)->format('H:i') . ' WIB' : 'Selesai' }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <div class="w-8 flex justify-center"><i class="fa-solid fa-location-dot text-semaft-gold"></i></div>
                                    <span>{{ $item->lokasi }}</span>
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div class="text-gray-600 text-sm border-t border-gray-100 pt-4 flex-grow">
                                {!! nl2br(e($item->deskripsi)) !!}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 py-20 text-center">
                        <div class="text-6xl text-gray-300 mb-4"><i class="fa-regular fa-calendar-xmark"></i></div>
                        <h3 class="text-xl font-bold text-semaft-navy mb-2">Belum Ada Agenda</h3>
                        <p class="text-gray-500">Saat ini belum ada jadwal kegiatan atau event yang dipublikasikan.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
@endsection