<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-semaft-navy leading-tight flex items-center">
                <i class="fa-solid fa-users-gear mr-3 text-semaft-gold"></i> {{ __('Manajemen Akun') }}
            </h2>
            <a href="{{ route('pengguna.create') }}" class="bg-semaft-navy text-white font-bold px-4 py-2 rounded-xl hover:bg-blue-900 transition text-sm">
                <i class="fa-solid fa-plus mr-1"></i> Buat Akun Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-lg">
                    <span class="text-green-800 font-bold"><i class="fa-solid fa-check-circle mr-2"></i>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg">
                    <span class="text-red-800 font-bold"><i class="fa-solid fa-triangle-exclamation mr-2"></i>{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-8">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-500 text-sm uppercase tracking-wider border-b border-gray-200">
                            <th class="p-4 font-bold rounded-tl-xl">Nama & Email</th>
                            <th class="p-4 font-bold">Role</th>
                            <th class="p-4 font-bold">Hak Akses (Fitur)</th>
                            <th class="p-4 font-bold text-center rounded-tr-xl">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">
                        @foreach($users as $user)
                        <tr class="hover:bg-blue-50/50 transition">
                            <td class="p-4">
                                <p class="font-bold text-semaft-navy text-base">{{ $user->name }}</p>
                                <p class="text-xs text-gray-500">{{ $user->email }}</p>
                            </td>
                            <td class="p-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold {{ $user->role == 'superadmin' ? 'bg-semaft-gold text-white' : 'bg-blue-100 text-semaft-navy' }}">
                                    <i class="fa-solid {{ $user->role == 'superadmin' ? 'fa-crown' : 'fa-user-tie' }} mr-1"></i> {{ strtoupper($user->role) }}
                                </span>
                            </td>
                            <td class="p-4 flex flex-wrap gap-1">
                                @if($user->role == 'superadmin')
                                    <span class="text-xs bg-gray-100 text-gray-500 px-2 py-1 rounded">Akses Penuh (All)</span>
                                @elseif($user->hak_akses && count($user->hak_akses) > 0)
                                    @foreach($user->hak_akses as $akses)
                                        <span class="text-xs bg-green-50 border border-green-200 text-green-700 px-2 py-1 rounded-md font-semibold capitalize">
                                            {{ $akses }}
                                        </span>
                                    @endforeach
                                @else
                                    <span class="text-xs text-red-400 italic">Tidak ada akses fitur</span>
                                @endif
                            </td>
                            <td class="p-4 text-center">
                                <form action="{{ route('pengguna.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus akun ini secara permanen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-400 hover:text-red-500 transition" {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                                        <i class="fa-solid fa-trash-can text-lg"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex justify-center items-center gap-3">
                                    <a href="{{ route('pengguna.edit', $user->id) }}" class="text-gray-400 hover:text-blue-500 transition" title="Edit Akun & Hak Akses">
                                        <i class="fa-solid fa-pen-to-square text-lg"></i>
                                    </a>

                                    <form action="{{ route('pengguna.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus akun ini secara permanen?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-500 transition" {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                                            <i class="fa-solid fa-trash-can text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>