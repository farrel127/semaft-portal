<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between md:items-center gap-4">
            <h2 class="font-semibold text-xl text-semaft-navy leading-tight flex items-center">
                <i class="fa-regular fa-calendar-days mr-3 text-semaft-gold"></i> {{ __('Kalender Kegiatan') }}
            </h2>
            <a href="{{ route('kegiatan.create') }}" class="bg-semaft-navy text-white font-bold px-5 py-2.5 rounded-xl hover:bg-blue-900 transition shadow-md text-sm flex items-center gap-2 justify-center">
                <i class="fa-solid fa-plus"></i> Tandai Agenda Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-xl flex items-center shadow-sm">
                    <i class="fa-solid fa-circle-check text-green-500 text-xl mr-3"></i>
                    <span class="text-green-800 font-bold">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl border border-gray-100">
                <div class="p-6 md:p-8">
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 text-gray-500 text-sm uppercase tracking-wider border-b border-gray-200">
                                    <th class="p-4 font-bold rounded-tl-xl w-24 text-center">Tanggal</th>
                                    <th class="p-4 font-bold">Detail Agenda</th>
                                    <th class="p-4 font-bold">Penyelenggara</th>
                                    <th class="p-4 font-bold">Status</th>
                                    <th class="p-4 font-bold text-center rounded-tr-xl">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @forelse($kegiatans as $agenda)
                                    <tr class="hover:bg-blue-50/50 transition group">
                                        <td class="p-4">
                                            <div class="flex flex-col items-center justify-center bg-white border border-gray-200 rounded-xl w-14 h-14 shadow-sm mx-auto group-hover:border-semaft-gold transition">
                                                <span class="text-[10px] font-bold text-red-500 uppercase">{{ \Carbon\Carbon::parse($agenda->tanggal)->translatedFormat('M') }}</span>
                                                <span class="text-xl font-extrabold text-gray-700 leading-none">{{ \Carbon\Carbon::parse($agenda->tanggal)->format('d') }}</span>
                                            </div>
                                        </td>
                                        
                                        <td class="p-4">
                                            <p class="font-bold text-semaft-navy text-base mb-1">{{ $agenda->nama_kegiatan }}</p>
                                            @if($agenda->deskripsi)
                                                <p class="text-xs text-gray-500 line-clamp-1"><i class="fa-solid fa-location-dot mr-1"></i> {{ $agenda->deskripsi }}</p>
                                            @else
                                                <p class="text-xs text-gray-400 italic">Tidak ada deskripsi spesifik</p>
                                            @endif
                                        </td>

                                        <td class="p-4">
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-gray-100 text-gray-700 text-xs font-bold border border-gray-200">
                                                <i class="fa-solid fa-users"></i> {{ $agenda->himpunan->singkatan ?? 'SEMAFT' }}
                                            </span>
                                        </td>

                                        <td class="p-4">
                                            @if($agenda->status == 'Akan Datang')
                                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-600 border border-blue-200">Akan Datang</span>
                                            @elseif($agenda->status == 'Berlangsung')
                                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-50 text-green-600 border border-green-200 flex items-center gap-1.5 w-max">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span> Berlangsung
                                                </span>
                                            @else
                                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-500 border border-gray-200">Selesai</span>
                                            @endif
                                        </td>

                                        <td class="p-4 text-center">
                                            <form action="{{ route('kegiatan.destroy', $agenda->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini dari kalender?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-gray-400 hover:text-red-500 transition" title="Hapus Agenda">
                                                    <i class="fa-solid fa-trash-can text-lg"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="p-12 text-center text-gray-500">
                                            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-gray-200">
                                                <i class="fa-regular fa-calendar-xmark text-3xl text-gray-300"></i>
                                            </div>
                                            <p class="font-bold text-gray-600 mb-1">Belum Ada Agenda Terjadwal</p>
                                            <p class="text-sm">Silakan tambahkan kegiatan himpunan untuk mengisi kalender.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $kegiatans->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>