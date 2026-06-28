@extends('layouts.admin') <!-- Ganti 'layouts.admin' dengan nama file layout dashboard Anda -->

@section('content')
<div class="p-6 sm:p-10 space-y-6">
    
    <!-- Header -->
    <div class="flex flex-col space-y-2">
        <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Kelola Arsip Visual</h1>
        <p class="text-gray-500 text-sm">Unggah, lihat, dan kelola dokumentasi galeri SEMA Fakultas Teknik.</p>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg shadow-sm">
            <div class="flex items-center">
                <i class="fa-solid fa-circle-check text-green-500 mr-3"></i>
                <p class="text-green-700 font-medium text-sm">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- BAGIAN KIRI: FORM UPLOAD -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-6">
                <h2 class="text-lg font-bold text-gray-800 mb-5 border-b pb-3">Unggah Arsip Baru</h2>
                
                <!-- PENTING: enctype="multipart/form-data" wajib ada untuk upload file -->
                <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    
                    <!-- Input Judul -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Judul Gambar</label>
                        <input type="text" name="judul" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm" placeholder="Contoh: Rapat Kerja 2026">
                        @error('judul') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Input Kategori -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                        <select name="kategori" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm bg-white">
                            <option value="" disabled selected>Pilih Kategori...</option>
                            <option value="Monthly Recap">Monthly Recap</option>
                            <option value="Kreatif & Bisnis">Kreatif & Bisnis</option>
                            <option value="Kegiatan">Kegiatan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        @error('kategori') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Input File Gambar -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">File Gambar</label>
                        <input type="file" name="gambar" required accept="image/*" class="w-full px-3 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                        <p class="text-[11px] text-gray-400 mt-1">Format: JPG, PNG. Maksimal ukuran: 2MB.</p>
                        @error('gambar') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Input Deskripsi -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi Singkat (Opsional)</label>
                        <textarea name="deskripsi" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm resize-none" placeholder="Tambahkan keterangan singkat..."></textarea>
                        @error('deskripsi') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-xl transition-all duration-200 transform active:scale-95 shadow-md flex justify-center items-center gap-2 text-sm">
                        <i class="fa-solid fa-cloud-arrow-up"></i> Unggah Sekarang
                    </button>
                </form>
            </div>
        </div>

        <!-- BAGIAN KANAN: DAFTAR ARSIP (GRID) -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 min-h-full">
                <div class="flex justify-between items-center mb-6 border-b pb-3">
                    <h2 class="text-lg font-bold text-gray-800">Daftar Arsip Tersimpan</h2>
                    <span class="bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full">{{ $galeris->count() }} Item</span>
                </div>

                @if($galeris->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($galeris as $item)
                            <div class="group relative rounded-xl overflow-hidden border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                                <!-- Gambar -->
                                <div class="aspect-w-16 aspect-h-10 bg-gray-100 w-full h-48 overflow-hidden relative">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    
                                    <!-- Label Kategori -->
                                    <div class="absolute top-2 left-2">
                                        <span class="bg-black/60 backdrop-blur-md text-white text-[10px] font-bold px-2 py-1 rounded-md uppercase tracking-wide">
                                            {{ $item->kategori }}
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Info Detail -->
                                <div class="p-4">
                                    <h3 class="font-bold text-gray-800 text-sm mb-1 truncate">{{ $item->judul }}</h3>
                                    <p class="text-xs text-gray-500 line-clamp-2 mb-4">{{ $item->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                                    
                                    <div class="flex justify-between items-center border-t pt-3 mt-auto">
                                        <span class="text-[10px] text-gray-400"><i class="fa-regular fa-clock mr-1"></i> {{ $item->created_at->format('d M Y') }}</span>
                                        
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus arsip visual ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 hover:bg-red-50 p-1.5 rounded-lg transition-colors text-xs flex items-center gap-1 font-semibold">
                                                <i class="fa-solid fa-trash-can"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- State Kosong -->
                    <div class="flex flex-col items-center justify-center py-16 text-center">
                        <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4 border border-gray-100">
                            <i class="fa-regular fa-image text-3xl text-gray-400"></i>
                        </div>
                        <h3 class="text-gray-800 font-bold mb-1">Belum Ada Gambar</h3>
                        <p class="text-gray-500 text-sm">Gunakan formulir di sebelah kiri untuk mengunggah arsip visual pertama Anda.</p>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection