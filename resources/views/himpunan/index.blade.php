<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-semaft-navy leading-tight flex items-center">
            <i class="fa-solid fa-sitemap mr-3 text-semaft-gold"></i> {{ __('Manajemen Himpunan') }}
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
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($himpunans as $item)
                            <div class="border border-gray-100 rounded-2xl p-6 text-center hover:shadow-lg transition duration-300 group bg-gray-50/50">
                                <div class="h-28 flex items-center justify-center mb-4 bg-white rounded-xl border border-gray-100 p-2">
                                    @if($item->logo)
                                        <img src="{{ asset('storage/' . $item->logo) }}" alt="Logo {{ $item->singkatan }}" class="max-h-full max-w-full object-contain group-hover:scale-105 transition">
                                    @else
                                        <i class="fa-solid fa-building-columns text-5xl text-gray-300"></i>
                                    @endif
                                </div>
                                <h3 class="font-extrabold text-semaft-navy text-xl">{{ $item->singkatan }}</h3>
                                <p class="text-sm text-gray-500 mb-6 font-medium">{{ $item->nama }}</p>
                                <a href="{{ route('himpunan.edit', $item->id) }}" class="inline-block w-full bg-white border-2 border-semaft-navy text-semaft-navy hover:bg-semaft-navy hover:text-white font-bold px-4 py-2.5 rounded-xl transition text-sm">
                                    <i class="fa-solid fa-pen-to-square mr-1"></i> Edit Data & Logo
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>