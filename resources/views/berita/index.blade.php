<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-semaft-navy leading-tight">
                <i class="fa-solid fa-newspaper mr-2"></i> {{ __('Manajemen Berita') }}
            </h2>
            <a href="{{ route('berita.create') }}" class="bg-semaft-navy text-white px-5 py-2 rounded-lg font-semibold hover:bg-blue-900 transition shadow-md">
                <i class="fa-solid fa-plus mr-2"></i> Tulis Berita Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Notifikasi Sukses (Akan muncul jika ada aksi berhasil) -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-lg flex items-center justify-between shadow-sm">
                    <div class="flex items-center">
                        <i class="fa-solid fa-circle-check text-green-500 text-xl mr-3"></i>
                        <span class="text-green-800 font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-8 text-gray-900">
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 text-semaft-navy border-b-2 border-semaft-gold">
                                    <th class="py-4 px-6 font-bold uppercase tracking-wider text-sm">Judul Berita</th>
                                    <th class="py-4 px-6 font-bold uppercase tracking-wider text-sm">Penulis / Prodi</th>
                                    <th class="py-4 px-6 font-bold uppercase tracking-wider text-sm">Tanggal</th>
                                    <th class="py-4 px-6 font-bold uppercase tracking-wider text-sm text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($berita as $item)
                                    <tr class="hover:bg-gray-50 transition duration-200">
                                        <td class="py-4 px-6">
                                            <p class="font-semibold text-semaft-navy">{{ $item->judul }}</p>
                                        </td>
                                        <td class="py-4 px-6">
                                            <p class="font-medium text-gray-800">{{ $item->user->name }}</p>
                                            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-bold">
                                                {{ $item->himpunan ? $item->himpunan->singkatan : 'SEMAFT' }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-6 text-gray-500 text-sm">
                                            {{ $item->created_at->format('d M Y') }}
                                        </td>
                                        <td class="py-4 px-6 text-center space-x-2 whitespace-nowrap">
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('berita.edit', $item->id) }}" class="inline-block text-blue-500 hover:text-blue-700 bg-blue-50 p-2 rounded-lg transition" title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus berita ini secara permanen?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 bg-red-50 p-2 rounded-lg transition" title="Hapus">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-12 text-center text-gray-500">
                                            <div class="text-6xl mb-4 opacity-30"><i class="fa-regular fa-folder-open"></i></div>
                                            <p class="text-lg">Belum ada berita yang dipublikasikan.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>