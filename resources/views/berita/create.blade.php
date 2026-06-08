<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-semaft-navy leading-tight flex items-center gap-3">
            <a href="{{ route('berita.index') }}" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-semaft-gold hover:text-white transition">
                <i class="fa-solid fa-arrow-left text-sm"></i>
            </a>
            {{ __('Tambah Berita') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen flex items-start justify-center">
        <div class="w-full max-w-3xl px-4 sm:px-0">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-3xl border border-gray-100">
                
                <div class="bg-semaft-navy px-8 py-5 text-white flex items-center justify-between">
                    <h3 class="text-xl font-extrabold tracking-tight">Berita Baru</h3>
                    <i class="fa-solid fa-newspaper text-2xl text-semaft-gold"></i>
                </div>

                @if ($errors->any())
                    <div class="mx-8 mt-6 p-4 bg-red-50 text-red-700 rounded-xl text-sm font-bold">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- WAJIB ADA enctype="multipart/form-data" AGAR BISA UPLOAD GAMBAR --}}
                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block text-sm font-extrabold text-semaft-navy mb-2">Judul Berita <span class="text-red-500">*</span></label>
                        <input type="text" name="judul" required 
                            class="w-full rounded-xl border-gray-200 focus:border-semaft-navy focus:ring focus:ring-semaft-navy/20 py-3 text-gray-800 font-bold bg-gray-50" 
                            placeholder="Contoh: Persiapan CREABIZ 2026 Mendekati Tahap Final">
                    </div>

                    <div>
                        <label class="block text-sm font-extrabold text-semaft-navy mb-2">Asal Himpunan <span class="text-red-500">*</span></label>
                        <select name="himpunan_id" required 
                            class="w-full rounded-xl border-gray-200 focus:border-semaft-navy focus:ring focus:ring-semaft-navy/20 py-3 text-gray-700 font-medium bg-gray-50 cursor-pointer">
                            <option value="" disabled selected>-- Pilih Himpunan --</option>
                            @foreach($himpunans as $himpunan)
                                <option value="{{ $himpunan->id }}">{{ $himpunan->singkatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-extrabold text-semaft-navy mb-2">Gambar Cover <span class="text-red-500">*</span></label>
                        <input type="file" name="gambar" accept="image/*" required 
                            class="w-full rounded-xl border-gray-200 focus:border-semaft-navy focus:ring focus:ring-semaft-navy/20 py-2 text-gray-800 font-bold bg-gray-50 shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-semaft-navy file:text-white hover:file:bg-blue-900 cursor-pointer">
                        <p class="text-xs text-gray-500 mt-2">Format yang disarankan: JPG, PNG, atau WEBP. Maksimal ukuran biasanya 2MB.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-extrabold text-semaft-navy mb-2">Isi Berita <span class="text-red-500">*</span></label>
                        <textarea name="isi" rows="8" required 
                            class="w-full rounded-xl border-gray-200 focus:border-semaft-navy focus:ring focus:ring-semaft-navy/20 py-3 text-gray-800 bg-gray-50" 
                            placeholder="Tuliskan paragraf berita selengkapnya di sini..."></textarea>
                    </div>

                    <div class="pt-6 border-t border-gray-100 flex justify-end">
                        <button type="submit" class="w-full bg-semaft-navy text-white font-bold py-3.5 rounded-xl hover:bg-blue-900 transition duration-300 shadow-md text-sm flex items-center justify-center gap-2">
                            <i class="fa-solid fa-paper-plane"></i> Publikasikan Berita
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>