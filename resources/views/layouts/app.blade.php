<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SEMAFT') }}</title>

        <!-- Fonts & Icons -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="icon" href="{{ asset('favicon.png') }}?v=2" type="image/png">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            [x-cloak] { display: none !important; }
            .hide-scrollbar::-webkit-scrollbar { display: none; }
            .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-900" x-data="{ sidebarOpen: false }">
        
        <div class="flex h-screen overflow-hidden">
            
            <!-- Memanggil Sidebar Navigation -->
            @include('layouts.navigation')

            <!-- Area Konten Utama -->
            <div class="flex-1 flex flex-col overflow-hidden w-full bg-gray-50 relative">
                
                <!-- Header Atas (Top Bar) -->
                <header class="bg-white border-b border-gray-100 shadow-sm z-10 h-16 flex items-center justify-between px-4 sm:px-6 lg:px-8">
                    <!-- Judul Halaman & Tombol Hamburger Mobile -->
                    <div class="flex items-center gap-4">
                        <button @click="sidebarOpen = true" class="md:hidden text-gray-500 hover:text-semaft-navy focus:outline-none transition">
                            <i class="fa-solid fa-bars text-xl"></i>
                        </button>
                        
                        @if (isset($header))
                            <div class="hidden sm:block">
                                {{ $header }}
                            </div>
                        @endif
                    </div>

                    <!-- Menu Kanan Header (Web Publik & Profil) -->
                    <div class="flex items-center gap-4">
                        <a href="{{ url('/') }}" target="_blank" class="text-sm font-bold text-gray-400 hover:text-semaft-gold transition hidden md:flex items-center gap-2">
                            <i class="fa-solid fa-globe"></i> Lihat Web Publik
                        </a>
                        
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center gap-2 px-3 py-2 border border-transparent text-sm leading-4 font-bold rounded-xl text-gray-600 bg-gray-50 hover:text-gray-900 hover:bg-gray-100 focus:outline-none transition ease-in-out duration-150">
                                    <div class="w-8 h-8 rounded-full bg-semaft-navy text-semaft-gold flex items-center justify-center">
                                        <i class="fa-solid fa-user-tie text-sm"></i>
                                    </div>
                                    <div class="hidden sm:block">{{ Auth::user()->name }}</div>
                                    <i class="fa-solid fa-chevron-down text-xs text-gray-400"></i>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    <i class="fa-solid fa-user-gear mr-2 text-gray-500"></i> {{ __('Profil Saya') }}
                                </x-dropdown-link>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600 hover:text-red-700 font-medium">
                                        <i class="fa-solid fa-right-from-bracket mr-2"></i> {{ __('Keluar Sistem') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </header>

                <!-- Main Content (Scrollable) -->
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 flex flex-col">
                    
                    <!-- Header untuk Mobile (Karena di atas tertutup) -->
                    @if (isset($header))
                        <div class="sm:hidden bg-white border-b border-gray-100 px-4 py-3">
                            {{ $header }}
                        </div>
                    @endif

                    <!-- Slot Konten (Isi Dashboard) -->
                    <div class="flex-1">
                        {{ $slot }}
                    </div>
                    
                    <!-- Footer SEMAFT -->
                    <footer class="bg-white border-t border-gray-200 mt-auto py-5">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-3">
                            <div class="text-sm text-gray-500 font-medium text-center md:text-left">
                                &copy; {{ date('Y') }} Senat Mahasiswa Fakultas Teknik (SEMAFT) USB YPKP.
                            </div>
                            <div class="text-xs font-bold text-gray-400 flex items-center gap-2">
                                <i class="fa-solid fa-code text-semaft-gold"></i> Dikelola oleh Admin Hub
                            </div>
                        </div>
                    </footer>

                </main>
            </div>
        </div>
        
    </body>
</html>