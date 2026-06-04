<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-semaft-navy leading-tight flex items-center gap-3">
            <a href="{{ route('kegiatan.index') }}" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-semaft-gold hover:text-white transition">
                <i class="fa-solid fa-arrow-left text-sm"></i>
            </a>
            {{ __('Tandai Kalender') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen flex items-start justify-center">
        <div class="w-full max-w-lg px-4 sm:px-0">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-3xl border border-gray-100">
                
                <div class="bg-semaft-navy px-8 py-5 text-white flex items-center justify-between">
                    <h3 class="text-xl font-extrabold tracking-tight">Agenda Baru</h3>
                    <i class="fa-regular fa-calendar-plus text-2xl text-semaft-gold"></i>
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

                <form action="{{ route('kegiatan.store') }}" method="POST" class="p-8 space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block text-sm font-extrabold text-semaft-navy mb-2">Tanggal Kegiatan <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal" required 
                            class="w-full rounded-xl border-gray-200 focus:border-semaft-navy focus:ring focus:ring-semaft-navy/20 py-3 text-gray-800 font-bold bg-gray-50 cursor-pointer shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-extrabold text-semaft-navy mb-2">Keterangan / Nama Acara <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_kegiatan" required 
                            class="w-full rounded-xl border-gray-200 focus:border-semaft-navy focus:ring focus:ring-semaft-navy/20 py-3 text-gray-800 font-bold bg-gray-50" 
                            placeholder="Contoh: Rapat Evaluasi Bulanan">
                    </div>

                    <div>
                        <label class="block text-sm font-extrabold text-semaft-navy mb-2">Himpunan Penyelenggara <span class="text-red-500">*</span></label>
                        <select name="himpunan_id" required 
                            class="w-full rounded-xl border-gray-200 focus:border-semaft-navy focus:ring focus:ring-semaft-navy/20 py-3 text-gray-700 font-medium bg-gray-50 cursor-pointer">
                            <option value="" disabled selected>-- Pilih Himpunan --</option>
                            @foreach($himpunans as $himpunan)
                                <option value="{{ $himpunan->id }}">{{ $himpunan->singkatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="pt-6 border-t border-gray-100 flex justify-end">
                        <button type="submit" class="w-full bg-semaft-navy text-white font-bold py-3.5 rounded-xl hover:bg-blue-900 transition duration-300 shadow-md text-sm flex items-center justify-center gap-2">
                            <i class="fa-solid fa-check"></i> Simpan Penanda Kalender
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>