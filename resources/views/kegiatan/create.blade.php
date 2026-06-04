<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-semaft-navy leading-tight flex items-center gap-3">
            <a href="{{ route('kegiatan.index') }}" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-semaft-gold hover:text-white transition"><i class="fa-solid fa-arrow-left text-sm"></i></a>
            {{ __('Tandai Agenda Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-3xl border border-gray-100">
                
                <div class="bg-semaft-navy px-8 py-6 text-white border-b-4 border-semaft-gold flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-white/10 flex items-center justify-center backdrop-blur-sm border border-white/20">
                        <i class="fa-regular fa-calendar-plus text-3xl text-semaft-gold"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-extrabold tracking-tight">Jadwalkan Kegiatan</h3>
                        <p class="text-sm text-blue-200 mt-1 font-medium">Agenda yang Anda simpan di sini akan otomatis muncul sebagai titik penanda di Kalender Dashboard.</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="mx-8 mt-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl">
                        <ul class="list-disc list-inside text-sm font-bold">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('kegiatan.store') }}" method="POST" class="p-8">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                        
                        <div class="md:col-span-7 space-y-6">
                            <div>
                                <label class="block text-sm font-extrabold text-gray-700 mb-2">
                                    <i class="fa-solid fa-heading text-semaft-gold mr-1"></i> Nama Kegiatan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="nama_kegiatan" required 
                                    class="w-full rounded-xl border-gray-200 focus:border-semaft-navy focus:ring focus:ring-semaft-navy/20 py-3.5 bg-gray-50 hover:bg-white transition text-gray-800 font-bold" 
                                    placeholder="Contoh: Seminar Nasional AI 2026">
                            </div>

                            <div>
                                <label class="block text-sm font-extrabold text-gray-700 mb-2">
                                    <i class="fa-solid fa-users text-semaft-gold mr-1"></i> Himpunan Penyelenggara <span class="text-red-500">*</span>
                                </label>
                                <select name="himpunan_id" required 
                                    class="w-full rounded-xl border-gray-200 focus:border-semaft-navy focus:ring focus:ring-semaft-navy/20 py-3.5 bg-gray-50 hover:bg-white transition text-gray-700 font-medium cursor-pointer">
                                    <option value="" disabled selected>-- Pilih Penanggung Jawab --</option>
                                    @foreach($himpunans as $himpunan)
                                        <option value="{{ $himpunan->id }}">{{ $himpunan->nama }} ({{ $himpunan->singkatan }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-extrabold text-gray-700 mb-2">
                                    <i class="fa-solid fa-align-left text-semaft-gold mr-1"></i> Keterangan & Lokasi Acara <span class="text-gray-400 font-normal text-xs">(Akan muncul di tooltip kalender)</span>
                                </label>
                                <textarea name="deskripsi" rows="4" 
                                    class="w-full rounded-xl border-gray-200 focus:border-semaft-navy focus:ring focus:ring-semaft-navy/20 py-3.5 bg-gray-50 hover:bg-white transition text-gray-700 leading-relaxed" 
                                    placeholder="Tuliskan detail waktu (misal: 08:00 - Selesai) dan lokasi acara di sini..."></textarea>
                            </div>
                        </div>

                        <div class="md:col-span-5 bg-gray-50 p-6 rounded-2xl border border-gray-100 space-y-6 h-max">
                            
                            <div>
                                <label class="block text-sm font-extrabold text-semaft-navy mb-2">
                                    <i class="fa-solid fa-calendar-check text-blue-500 mr-1"></i> Tandai Tanggal <span class="text-red-500">*</span>
                                </label>
                                <input type="date" name="tanggal" required 
                                    class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-500/20 py-3 text-gray-800 font-bold shadow-sm cursor-pointer">
                            </div>

                            <div>
                                <label class="block text-sm font-extrabold text-semaft-navy mb-2">
                                    <i class="fa-solid fa-signal text-green-500 mr-1"></i> Status Saat Ini <span class="text-red-500">*</span>
                                </label>
                                <div class="space-y-3 mt-3">
                                    <label class="flex items-center p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-blue-50 transition bg-white">
                                        <input type="radio" name="status" value="Akan Datang" class="w-5 h-5 text-blue-600 border-gray-300 focus:ring-blue-500" checked>
                                        <span class="ml-3 font-bold text-gray-700">Akan Datang</span>
                                    </label>
                                    <label class="flex items-center p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-green-50 transition bg-white">
                                        <input type="radio" name="status" value="Berlangsung" class="w-5 h-5 text-green-600 border-gray-300 focus:ring-green-500">
                                        <span class="ml-3 font-bold text-gray-700">Sedang Berlangsung</span>
                                    </label>
                                    <label class="flex items-center p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-100 transition bg-white">
                                        <input type="radio" name="status" value="Selesai" class="w-5 h-5 text-gray-600 border-gray-300 focus:ring-gray-500">
                                        <span class="ml-3 font-bold text-gray-700">Selesai</span>
                                    </label>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="pt-8 mt-6 border-t border-gray-100 flex items-center justify-end gap-4">
                        <a href="{{ route('kegiatan.index') }}" class="px-6 py-3 text-sm font-bold text-gray-500 hover:text-gray-800 transition">Batal</a>
                        <button type="submit" class="bg-semaft-navy text-white font-bold px-8 py-3.5 rounded-xl hover:bg-blue-900 transition duration-300 shadow-lg shadow-blue-900/20 text-sm flex items-center gap-3 transform hover:-translate-y-0.5">
                            <i class="fa-solid fa-thumbtack text-lg"></i> Sematkan ke Kalender
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>