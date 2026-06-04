<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-semaft-navy leading-tight flex items-center">
            <i class="fa-solid fa-pen-to-square mr-3 text-semaft-gold"></i> Edit Himpunan: {{ $himpunan->singkatan }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6">
                <a href="{{ route('himpunan.index') }}" class="inline-flex items-center text-sm font-bold text-gray-600 hover:text-semaft-navy transition">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar Himpunan
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-8 md:p-10">
                    <form action="{{ route('himpunan.update', $himpunan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-semaft-navy mb-2">Nama Program Studi</label>
                                <input type="text" name="nama" value="{{ old('nama', $himpunan->nama) }}" required class="w-full border-gray-200 focus:border-semaft-gold focus:ring focus:ring-semaft-gold/20 rounded-xl px-4 py-3">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-semaft-navy mb-2">Singkatan (Misal: HIMATIF)</label>
                                <input type="text" name="singkatan" value="{{ old('singkatan', $himpunan->singkatan) }}" required class="w-full border-gray-200 focus:border-semaft-gold focus:ring focus:ring-semaft-gold/20 rounded-xl px-4 py-3">
                            </div>
                        </div>

                        <div class="mt-6 border-t border-gray-100 pt-6">
                            <label class="block text-sm font-bold text-semaft-navy mb-4">Upload Logo Himpunan</label>
                            
                            @if($himpunan->logo)
                                <div class="mb-6 flex items-center gap-4 p-4 bg-gray-50 rounded-xl border border-gray-100">
                                    <img src="{{ asset('storage/' . $himpunan->logo) }}" alt="Current Logo" class="h-16 w-16 object-contain bg-white rounded-lg p-1 border border-gray-200">
                                    <div>
                                        <p class="text-sm font-bold text-gray-700">Logo Saat Ini Aktif</p>
                                        <p class="text-xs text-gray-500">Unggah file baru di bawah jika ingin menggantinya.</p>
                                    </div>
                                </div>
                            @endif

                            <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-semaft-gold transition bg-gray-50/50">
                                <i class="fa-solid fa-cloud-arrow-up text-4xl text-gray-400 mb-3 block"></i>
                                <input type="file" name="logo" accept="image/png, image/jpeg, image/jpg" class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-semaft-navy hover:file:bg-blue-100 cursor-pointer">
                                <p class="text-xs text-gray-400 mt-3">Format yang didukung: PNG transparan (sangat disarankan), JPG. Maks 2MB.</p>
                            </div>
                        </div>

                        <div class="pt-6 flex justify-end gap-4 border-t border-gray-100 mt-6">
                            <button type="submit" class="bg-semaft-navy text-white font-bold px-8 py-3 rounded-xl hover:bg-blue-900 transition shadow-md text-sm flex items-center gap-2">
                                <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>