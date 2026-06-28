@extends('layouts.midone')

@section('content')
<!-- Header Halaman -->
<div class="flex flex-col sm:flex-row items-center justify-between border-b border-slate-200/60 pb-5 mb-6">
    <div class="w-full sm:w-auto text-center sm:text-left mb-4 sm:mb-0">
        <h2 class="text-2xl font-black text-slate-800 tracking-tight">Kelola Arsip Visual</h2>
        <p class="text-slate-500 text-sm mt-1">Unggah dan kelola dokumentasi galeri SEMA Fakultas Teknik.</p>
    </div>
</div>

<!-- Alert Success -->
@if(session('success'))
    <div x-data="{ show: true }" x-show="show" class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-600 px-4 py-3 rounded-xl flex items-center justify-between">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-circle-check text-lg"></i>
            <span class="font-semibold text-sm">{{ session('success') }}</span>
        </div>
        <button @click="show = false" class="text-emerald-400 hover:text-emerald-600">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- BAGIAN KIRI: FORM UPLOAD (Col span 4) -->
    <div class="lg:col-span-4">
        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
            <h3 class="font-bold text-slate-800 flex items-center gap-2 mb-5">
                <i class="fa-solid fa-cloud-arrow-up text-blue-600"></i> Unggah Arsip Baru
            </h3>
            
            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                
                <!-- Input Judul -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Judul Gambar</label>
                    <input type="text" name="judul" required class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-sm bg-white" placeholder="Contoh: Rapat Kerja 2026">
                    @error('judul') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Input Kategori -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Kategori</label>
                    <select name="kategori" required class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-sm bg-white">
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
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">File Gambar</label>
                    <input type="file" name="gambar" required accept="image/*" class="w-full px-3 py-2 rounded-lg border border-slate-200 bg-white focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-sm file:mr-4 file:py-1.5 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 cursor-pointer">
                    <p class="text-[10px] text-slate-400 mt-1.5"><i class="fa-solid fa-circle-info mr-1"></i> Format JPG/PNG, Maks. 2MB.</p>
                    @error('gambar') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Input Deskripsi -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Deskripsi Singkat</label>
                    <textarea name="deskripsi" rows="3" class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-sm resize-none bg-white" placeholder="Opsional..."></textarea>
                    @error('deskripsi') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-4 rounded-lg transition-all duration-200 transform active:scale-95 shadow-lg shadow-blue-500/30 flex justify-center items-center gap-2 text-sm mt-2">
                    <i class="fa-solid fa-upload"></i> Simpan Arsip
                </button>
            </form>
        </div>
    </div>

    <!-- BAGIAN KANAN: DAFTAR ARSIP (Col span 8) -->
    <div class="lg:col-span-8">
        
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-slate-700">Daftar Arsip Tersimpan</h3>
            <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full border border-blue-200">{{ $galeris->count() }} Item</span>
        </div>

        @if($galeris->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
                @foreach($galeris as $item)
                    <div class="group relative bg-white rounded-xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl hover:border-slate-300 transition-all duration-300">
                        <!-- Gambar -->
                        <div class="aspect-w-16 aspect-h-10 bg-slate-100 w-full h-40 overflow-hidden relative">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            
                            <!-- Label Kategori -->
                            <div class="absolute top-2 left-2">
                                <span class="bg-slate-900/70 backdrop-blur-sm text-white text-[9px] font-bold px-2 py-1 rounded shadow-sm uppercase tracking-wider">
                                    {{ $item->kategori }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Info Detail -->
                        <div class="p-4 flex flex-col justify-between h-32">
                            <div>
                                <h3 class="font-bold text-slate-800 text-sm mb-1 truncate" title="{{ $item->judul }}">{{ $item->judul }}</h3>
                                <p class="text-[11px] text-slate-500 line-clamp-2 leading-relaxed">{{ $item->deskripsi ?? 'Tidak ada deskripsi yang ditambahkan.' }}</p>
                            </div>
                            
                            <div class="flex justify-between items-center border-t border-slate-100 pt-3 mt-2">
                                <span class="text-[10px] text-slate-400 font-medium">
                                    <i class="fa-regular fa-clock mr-1"></i> {{ $item->created_at->format('d M Y') }}
                                </span>
                                
                                <!-- Tombol Hapus -->
                                <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus arsip visual ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 hover:bg-red-50 p-1.5 rounded transition-colors text-xs flex items-center gap-1 font-bold">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- State Kosong (Empty State) -->
            <div class="flex flex-col items-center justify-center py-20 bg-slate-50 rounded-2xl border border-slate-100 border-dashed text-center h-full">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mb-4 shadow-sm border border-slate-100">
                    <i class="fa-regular fa-images text-2xl text-slate-400"></i>
                </div>
                <h3 class="text-slate-700 font-bold mb-1">Ruang Arsip Masih Kosong</h3>
                <p class="text-slate-500 text-xs max-w-xs mx-auto leading-relaxed">Mulai unggah foto dokumentasi kegiatan, recap, atau desain himpunan melalui formulir di samping.</p>
            </div>
        @endif
    </div>

</div>
@endsection