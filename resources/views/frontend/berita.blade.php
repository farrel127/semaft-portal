@extends('layouts.frontend')

@section('title', 'Portal Berita')

@section('content')
    <!-- Banner Header -->
    <section class="bg-semaft-navy py-16 relative overflow-hidden text-center">
        <div class="absolute top-0 right-0 w-64 h-64 bg-semaft-gold opacity-10 rounded-full -mr-20 -mt-20 blur-3xl"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Portal <span class="text-semaft-gold">Berita</span></h1>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                Kabar terbaru, informasi akademik, dan dokumentasi program kerja dari Senat Mahasiswa dan seluruh Himpunan Program Studi Fakultas Teknik.
            </p>
        </div>
    </section>

    <!-- Grid Berita -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($semuaBerita as $item)
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition duration-300 overflow-hidden border border-gray-100 flex flex-col group">
                        <!-- Gambar Cover -->
                        <div class="h-56 bg-gray-200 overflow-hidden relative">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            @else
                                <div class="w-full h-full bg-semaft-navy flex items-center justify-center text-white text-5xl opacity-80">
                                    <i class="fa-solid fa-newspaper"></i>
                                </div>
                            @endif
                            
                            <!-- Badge Prodi -->
                            <div class="absolute top-4 left-4 bg-semaft-gold text-semaft-navy text-xs font-bold px-3 py-1 rounded-full shadow-md">
                                {{ $item->himpunan ? $item->himpunan->singkatan : 'SEMAFT' }}
                            </div>
                        </div>

                        <!-- Konten Card -->
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center text-xs text-gray-500 mb-3 space-x-4">
                                <span><i class="fa-regular fa-calendar mr-1"></i> {{ $item->created_at->format('d M Y') }}</span>
                                <span><i class="fa-regular fa-user mr-1"></i> {{ $item->user->name }}</span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-semaft-navy mb-3 line-clamp-2 hover:text-semaft-gold transition">
                                <a href="{{ route('frontend.baca', $item->slug) }}">{{ $item->judul }}</a>
                            </h3>
                            
                            <p class="text-gray-600 text-sm mb-6 line-clamp-3">
                                {{ Str::limit(strip_tags($item->konten), 120) }}
                            </p>

                            <!-- Tombol Baca -->
                            <div class="mt-auto">
                               <a href="{{ route('frontend.baca', $item->slug) }}" class="text-semaft-navy font-bold hover:text-semaft-gold transition flex items-center">
                                    Baca Selengkapnya <i class="fa-solid fa-arrow-right-long ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="text-6xl text-gray-300 mb-4"><i class="fa-regular fa-folder-open"></i></div>
                        <h3 class="text-xl font-bold text-gray-500">Belum ada berita yang dipublikasikan.</h3>
                    </div>
                @endforelse
            </div>

            <!-- Pagination (Jika berita lebih dari 9) -->
            <div class="mt-12 flex justify-center">
                {{ $semuaBerita->links() }}
            </div>

        </div>
    </section>
@endsection