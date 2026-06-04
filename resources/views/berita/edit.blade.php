<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('berita.index') }}" class="text-gray-500 hover:text-semaft-navy transition text-xl">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2 class="font-semibold text-xl text-semaft-navy leading-tight">
                {{ __('Edit Berita') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-8 md:p-12 text-gray-900">
                    
                    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT') <!-- Wajib ditambahkan untuk proses Update di Laravel -->

                        <div>
                            <label for="judul" class="block text-sm font-bold text-semaft-navy mb-2">Judul Berita <span class="text-red-500">*</span></label>
                            <input type="text" name="judul" id="judul" value="{{ $berita->judul }}" required
                                class="w-full border-gray-300 focus:border-semaft-gold focus:ring focus:ring-semaft-gold/30 rounded-lg shadow-sm px-4 py-3">
                        </div>

                        <div>
                            <label for="gambar" class="block text-sm font-bold text-semaft-navy mb-2">Gambar Sampul (Biarkan kosong jika tidak ingin diganti)</label>
                            
                            @if($berita->gambar)
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500 mb-2">Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Cover" class="h-32 object-cover rounded-lg border border-gray-200">
                                </div>
                            @endif

                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-semaft-gold transition bg-gray-50">
                                <div class="space-y-1 text-center">
                                    <i class="fa-solid fa-image text-4xl text-gray-400 mb-3"></i>
                                    <div class="flex text-sm text-gray-600 justify-center">
                                        <label for="gambar" class="relative cursor-pointer bg-white rounded-md font-medium text-semaft-navy hover:text-semaft-gold focus-within:outline-none px-2 py-1 shadow-sm border border-gray-200">
                                            <span>Upload gambar baru</span>
                                            <input id="gambar" name="gambar" type="file" class="sr-only" accept="image/*">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-2">PNG, JPG, JPEG maksimal 2MB</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="konten" class="block text-sm font-bold text-semaft-navy mb-2">Isi Konten <span class="text-red-500">*</span></label>
                            <textarea name="konten" id="konten" rows="8" required
                                class="w-full border-gray-300 focus:border-semaft-gold focus:ring focus:ring-semaft-gold/30 rounded-lg shadow-sm px-4 py-3">{{ $berita->konten }}</textarea>
                        </div>

                        <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                            <a href="{{ route('berita.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition">
                                Batal
                            </a>
                            <button type="submit" class="px-6 py-3 bg-semaft-gold text-semaft-navy font-bold rounded-lg hover:bg-yellow-400 transition shadow-md flex items-center gap-2">
                                <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>