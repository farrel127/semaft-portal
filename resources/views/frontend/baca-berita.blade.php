@extends('layouts.frontend')

@section('title', $berita->judul)

@section('content')
    <div class="bg-gray-50 py-10 md:py-16 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-6">
                <a href="{{ route('frontend.berita') }}" class="inline-flex items-center text-sm font-bold text-gray-500 hover:text-semaft-navy transition duration-300 bg-white px-4 py-2 rounded-full shadow-sm border border-gray-200">
                    <i class="fa-solid fa-arrow-left-long mr-2"></i> Kembali ke Portal Berita
                </a>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                
                <div class="p-6 md:p-12 pb-4 md:pb-6">
                    <div class="mb-5">
                        <span class="bg-blue-50 text-semaft-navy font-bold px-4 py-1.5 rounded-full text-xs md:text-sm uppercase tracking-wider">
                            {{ $berita->himpunan ? $berita->himpunan->nama : 'Senat Mahasiswa Fakultas Teknik' }}
                        </span>
                    </div>
                    
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-semaft-navy leading-tight mb-6">
                        {{ $berita->judul }}
                    </h1>
                    
                    <div class="flex flex-wrap items-center gap-4 md:gap-6 text-gray-500 text-sm md:text-base font-medium border-b border-gray-100 pb-6">
                        <span class="flex items-center bg-gray-50 px-3 py-1.5 rounded-lg"><i class="fa-regular fa-user mr-2 text-semaft-gold"></i> {{ $berita->user->name }}</span>
                        <span class="flex items-center bg-gray-50 px-3 py-1.5 rounded-lg"><i class="fa-regular fa-calendar mr-2 text-semaft-gold"></i> {{ $berita->created_at->translatedFormat('d F Y') }}</span>
                    </div>
                </div>

                @if($berita->gambar)
                    <div class="px-6 md:px-12">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-auto max-h-[450px] object-cover rounded-2xl shadow-sm border border-gray-100">
                    </div>
                @endif

                <div class="p-6 md:p-12 pt-6 md:pt-8">
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed text-justify">
                        {!! nl2br(e($berita->konten)) !!}
                    </div>
                </div>

               <div class="bg-gray-50 p-6 md:px-12 text-center border-t border-gray-100 mt-4">
                    <p class="text-sm text-gray-500 font-medium">Bagikan informasi ini ke rekan mahasiswa lainnya!</p>
                    
                    @php
                        // Menyiapkan teks dan URL yang akan dibagikan
                        $shareUrl = urlencode(url()->current());
                        $shareText = urlencode('Cek berita terbaru: ' . $berita->judul);
                    @endphp

                    <div class="flex justify-center gap-4 mt-3">
                        <a href="https://wa.me/?text={{ $shareText }}%20{{ $shareUrl }}" target="_blank" rel="noopener noreferrer" 
                           class="w-10 h-10 rounded-full bg-green-100 text-green-600 hover:bg-green-600 hover:text-white transition flex items-center justify-center" title="Bagikan ke WhatsApp">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                        
                        <a href="https://twitter.com/intent/tweet?text={{ $shareText }}&url={{ $shareUrl }}" target="_blank" rel="noopener noreferrer" 
                           class="w-10 h-10 rounded-full bg-blue-100 text-blue-500 hover:bg-blue-500 hover:text-white transition flex items-center justify-center" title="Bagikan ke Twitter">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        
                        <button onclick="salinTautan()" class="w-10 h-10 rounded-full bg-gray-200 text-gray-600 hover:bg-gray-600 hover:text-white transition flex items-center justify-center" title="Salin Tautan">
                            <i class="fa-solid fa-link"></i>
                        </button>
                    </div>
                </div>

                <script>
                    function salinTautan() {
                        navigator.clipboard.writeText(window.location.href).then(() => {
                            alert('Tautan berita berhasil disalin!');
                        }).catch(err => {
                            alert('Gagal menyalin tautan.');
                            console.error(err);
                        });
                    }
                </script>

            </div>
        </div>
    </div>
@endsection