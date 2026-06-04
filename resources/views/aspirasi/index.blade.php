<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-semaft-navy leading-tight flex items-center">
            <i class="fa-solid fa-envelope-open-text mr-3 text-semaft-gold"></i> {{ __('Kotak Masuk Aspirasi') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-lg flex items-center shadow-sm">
                    <i class="fa-solid fa-circle-check text-green-500 text-xl mr-3"></i>
                    <span class="text-green-800 font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-6 md:p-8">
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 text-gray-500 text-sm uppercase tracking-wider border-b border-gray-200">
                                    <th class="p-4 font-bold rounded-tl-xl">Tanggal</th>
                                    <th class="p-4 font-bold">Pengirim</th>
                                    <th class="p-4 font-bold">Pesan Aspirasi</th>
                                    <th class="p-4 font-bold text-center">Status</th>
                                    <th class="p-4 font-bold text-center rounded-tr-xl">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                <!-- PERHATIKAN BARIS INI: Kita gunakan $aspirasis as $aspirasi agar seragam -->
                                @forelse($aspirasis as $aspirasi)
                                    <tr class="hover:bg-blue-50/50 transition">
                                        <td class="p-4 text-gray-500 whitespace-nowrap">
                                            {{ $aspirasi->created_at->format('d M Y, H:i') }}
                                        </td>
                                        <td class="p-4">
                                            <p class="font-bold text-semaft-navy">{{ $aspirasi->nama }}</p>
                                            <p class="text-xs text-gray-500">{{ $aspirasi->email }}</p>
                                        </td>
                                        <td class="p-4 min-w-[300px]">
                                            <span class="inline-block bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded mb-2 font-semibold">
                                                {{ $aspirasi->kategori }}
                                            </span>
                                            <p class="text-gray-700 leading-relaxed">{{ $aspirasi->pesan }}</p>
                                        </td>
                                        <td class="p-4 text-center whitespace-nowrap">
                                            <!-- Form Update Status -->
                                            <form action="{{ route('aspirasi.update', $aspirasi->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" onchange="this.form.submit()" class="text-xs font-bold rounded-full px-3 py-1 border-0 ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-semaft-navy cursor-pointer
                                                    {{ $aspirasi->status == 'Menunggu' ? 'bg-red-50 text-red-700 ring-red-600/20' : '' }}
                                                    {{ $aspirasi->status == 'Dibaca' ? 'bg-yellow-50 text-yellow-700 ring-yellow-600/20' : '' }}
                                                    {{ $aspirasi->status == 'Selesai' ? 'bg-green-50 text-green-700 ring-green-600/20' : '' }}">
                                                    <option value="Menunggu" {{ $aspirasi->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                                    <option value="Dibaca" {{ $aspirasi->status == 'Dibaca' ? 'selected' : '' }}>Dibaca</option>
                                                    <option value="Selesai" {{ $aspirasi->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td class="p-4 text-center whitespace-nowrap">
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('aspirasi.destroy', $aspirasi->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-gray-400 hover:text-red-500 transition" title="Hapus Aspirasi">
                                                    <i class="fa-solid fa-trash-can text-lg"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="p-10 text-center text-gray-500">
                                            <i class="fa-solid fa-inbox text-4xl mb-3 text-gray-300 block"></i>
                                            Belum ada aspirasi yang masuk.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $aspirasis->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>