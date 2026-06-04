<!-- Sidebar Desktop -->
<aside class="hidden md:flex flex-col w-64 bg-semaft-navy text-white transition-all duration-300 z-20 shadow-xl border-r border-blue-900 shrink-0">
    <!-- Sidebar Header (Logo) -->
    <div class="flex items-center justify-center h-16 border-b border-gray-800 shrink-0 bg-blue-900/20">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
            <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" class="h-8 w-auto group-hover:scale-105 transition">
            <span class="font-extrabold text-xl tracking-widest group-hover:text-semaft-gold transition">SEMAFT</span>
        </a>
    </div>

    <!-- Sidebar Navigation Links -->
    <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1.5 hide-scrollbar">
        <p class="px-2 text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Menu Utama</p>
        
        <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-semaft-gold text-semaft-navy font-bold shadow-md' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <i class="fa-solid fa-gauge-high w-6 text-center text-lg"></i> 
            <span class="ml-3 text-sm">Dashboard</span>
        </a>

        @if(Auth::user()->role === 'superadmin' || (is_array(Auth::user()->hak_akses) && in_array('aspirasi_lihat', Auth::user()->hak_akses)))
        <a href="{{ route('aspirasi.index') }}" class="flex items-center px-3 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('aspirasi.*') ? 'bg-semaft-gold text-semaft-navy font-bold shadow-md' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <i class="fa-solid fa-envelope-open-text w-6 text-center text-lg"></i> 
            <span class="ml-3 text-sm">Kotak Aspirasi</span>
        </a>
        @endif

        @if(Auth::user()->role === 'superadmin' || (is_array(Auth::user()->hak_akses) && in_array('berita_kelola', Auth::user()->hak_akses)))
        <a href="{{ route('berita.index') }}" class="flex items-center px-3 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('berita.*') ? 'bg-semaft-gold text-semaft-navy font-bold shadow-md' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <i class="fa-solid fa-newspaper w-6 text-center text-lg"></i> 
            <span class="ml-3 text-sm">Portal Berita</span>
        </a>
        @endif

        @if(Auth::user()->role === 'superadmin' || (is_array(Auth::user()->hak_akses) && in_array('agenda_kelola', Auth::user()->hak_akses)))
        <a href="{{ route('kegiatan.index') }}" class="flex items-center px-3 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('kegiatan.*') ? 'bg-semaft-gold text-semaft-navy font-bold shadow-md' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <i class="fa-solid fa-calendar-check w-6 text-center text-lg"></i> 
            <span class="ml-3 text-sm">Agenda Kegiatan</span>
        </a>
        @endif

        @if(Auth::user()->role === 'superadmin' || (is_array(Auth::user()->hak_akses) && in_array('himpunan_edit', Auth::user()->hak_akses)))
        <a href="{{ route('himpunan.index') }}" class="flex items-center px-3 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('himpunan.*') ? 'bg-semaft-gold text-semaft-navy font-bold shadow-md' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <i class="fa-solid fa-sitemap w-6 text-center text-lg"></i> 
            <span class="ml-3 text-sm">Data Himpunan</span>
        </a>
        @endif

        @if(Auth::user()->role === 'superadmin')
        <div class="pt-6 pb-2">
            <p class="px-2 text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Administrator</p>
            <a href="{{ route('pengguna.index') }}" class="flex items-center px-3 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('pengguna.*') ? 'bg-semaft-gold text-semaft-navy font-bold shadow-md' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <i class="fa-solid fa-users-gear w-6 text-center text-lg"></i> 
                <span class="ml-3 text-sm">Manajemen Akun</span>
            </a>
        </div>
        @endif
    </nav>
</aside>

<!-- Sidebar Mobile (Off-canvas panel) -->
<div x-cloak x-show="sidebarOpen" class="relative z-50 md:hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <!-- Background Overlay -->
    <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm transition-opacity"></div>
    
    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 left-0 flex max-w-full pr-16">
                <!-- Panel -->
                <div x-show="sidebarOpen" 
                     x-transition:enter="transform transition ease-in-out duration-300" 
                     x-transition:enter-start="-translate-x-full" 
                     x-transition:enter-end="translate-x-0" 
                     x-transition:leave="transform transition ease-in-out duration-300" 
                     x-transition:leave-start="translate-x-0" 
                     x-transition:leave-end="-translate-x-full" 
                     class="pointer-events-auto relative w-screen max-w-xs flex flex-col bg-semaft-navy h-full shadow-2xl">
                    
                    <!-- Close button -->
                    <div class="absolute top-0 right-0 -mr-12 pt-4">
                        <button @click="sidebarOpen = false" class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            <i class="fa-solid fa-xmark text-white text-2xl"></i>
                        </button>
                    </div>

                    <!-- Logo Mobile -->
                    <div class="flex items-center justify-center h-16 border-b border-gray-800 shrink-0 bg-blue-900/20">
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                            <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" class="h-8 w-auto">
                            <span class="font-extrabold text-xl tracking-widest text-white">SEMAFT</span>
                        </a>
                    </div>

                    <!-- Navigation Mobile Links -->
                    <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1.5">
                        <p class="px-2 text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Menu Utama</p>
                        
                        <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-semaft-gold text-semaft-navy font-bold' : 'text-gray-300' }}">
                            <i class="fa-solid fa-gauge-high w-6 text-center text-lg"></i> <span class="ml-3 text-sm font-medium">Dashboard</span>
                        </a>

                        @if(Auth::user()->role === 'superadmin' || (is_array(Auth::user()->hak_akses) && in_array('aspirasi_lihat', Auth::user()->hak_akses)))
                        <a href="{{ route('aspirasi.index') }}" class="flex items-center px-3 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('aspirasi.*') ? 'bg-semaft-gold text-semaft-navy font-bold' : 'text-gray-300' }}">
                            <i class="fa-solid fa-envelope-open-text w-6 text-center text-lg"></i> <span class="ml-3 text-sm font-medium">Kotak Aspirasi</span>
                        </a>
                        @endif

                        @if(Auth::user()->role === 'superadmin' || (is_array(Auth::user()->hak_akses) && in_array('berita_kelola', Auth::user()->hak_akses)))
                        <a href="{{ route('berita.index') }}" class="flex items-center px-3 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('berita.*') ? 'bg-semaft-gold text-semaft-navy font-bold' : 'text-gray-300' }}">
                            <i class="fa-solid fa-newspaper w-6 text-center text-lg"></i> <span class="ml-3 text-sm font-medium">Portal Berita</span>
                        </a>
                        @endif

                        @if(Auth::user()->role === 'superadmin' || (is_array(Auth::user()->hak_akses) && in_array('agenda_kelola', Auth::user()->hak_akses)))
                        <a href="{{ route('kegiatan.index') }}" class="flex items-center px-3 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('kegiatan.*') ? 'bg-semaft-gold text-semaft-navy font-bold' : 'text-gray-300' }}">
                            <i class="fa-solid fa-calendar-check w-6 text-center text-lg"></i> <span class="ml-3 text-sm font-medium">Agenda Kegiatan</span>
                        </a>
                        @endif

                        @if(Auth::user()->role === 'superadmin' || (is_array(Auth::user()->hak_akses) && in_array('himpunan_edit', Auth::user()->hak_akses)))
                        <a href="{{ route('himpunan.index') }}" class="flex items-center px-3 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('himpunan.*') ? 'bg-semaft-gold text-semaft-navy font-bold' : 'text-gray-300' }}">
                            <i class="fa-solid fa-sitemap w-6 text-center text-lg"></i> <span class="ml-3 text-sm font-medium">Data Himpunan</span>
                        </a>
                        @endif

                        @if(Auth::user()->role === 'superadmin')
                        <div class="pt-6 pb-2">
                            <p class="px-2 text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Administrator</p>
                            <a href="{{ route('pengguna.index') }}" class="flex items-center px-3 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('pengguna.*') ? 'bg-semaft-gold text-semaft-navy font-bold' : 'text-gray-300' }}">
                                <i class="fa-solid fa-users-gear w-6 text-center text-lg"></i> <span class="ml-3 text-sm font-medium">Manajemen Akun</span>
                            </a>
                        </div>
                        @endif
                    </nav>
                    
                    <!-- Profile Card in Mobile Sidebar -->
                    <div class="p-4 border-t border-gray-800 bg-gray-900/30">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-semaft-gold flex items-center justify-center text-semaft-navy font-bold">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-sm font-bold text-white truncate">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>