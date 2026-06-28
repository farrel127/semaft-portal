<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard | SEMA FT</title>
    
    <!-- Tailwind CSS & FontAwesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'semaft-navy': '#1e293b',
                        'semaft-gold': '#f4c332',
                        'midone-bg': '#f1f5f9',
                    }
                }
            }
        }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-midone-bg text-slate-800 font-sans antialiased overflow-hidden" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen w-full">

        <!-- OVERLAY UNTUK MOBILE -->
        <div x-show="sidebarOpen" 
             x-transition.opacity 
             @click="sidebarOpen = false"
             class="fixed inset-0 bg-black/50 z-40 lg:hidden backdrop-blur-sm"></div>

        <!-- SIDEBAR NAVIGASI KIRI -->
        <nav :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
             class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-slate-300 transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:w-64 flex flex-col shadow-2xl lg:shadow-none">
            
            <!-- LOGO SEMA FT (Di atas Main Menu) -->
            <div class="flex items-center justify-center gap-3 h-20 border-b border-white/5 mt-4 lg:mt-0 px-4">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-semaft-gold to-yellow-600 flex items-center justify-center text-slate-900 font-black shadow-lg shadow-yellow-500/20">
                    S
                </div>
                <span class="font-bold text-xl tracking-wide text-white">SEMA <span class="text-semaft-gold font-black">FT</span></span>
            </div>

            <!-- MENU LIST LENGKAP -->
            <div class="flex-1 overflow-y-auto py-6 px-4 space-y-1">
                <p class="px-3 text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Main Menu</p>
                
                <!-- 1. Dashboard -->
                <a href="/dashboard" class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all {{ request()->is('dashboard') ? 'bg-white/10 text-white font-semibold' : 'hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-house w-5 text-center {{ request()->is('dashboard') ? 'text-blue-400' : '' }}"></i> 
                    <span class="text-sm">Dashboard Utama</span>
                </a>

                <!-- 2. Data Himpunan -->
                <a href="{{ route('himpunan.index') ?? '#' }}" class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all {{ request()->routeIs('himpunan.*') ? 'bg-white/10 text-white font-semibold' : 'hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-building-columns w-5 text-center {{ request()->routeIs('himpunan.*') ? 'text-yellow-400' : '' }}"></i> 
                    <span class="text-sm">Data Himpunan</span>
                </a>

                <!-- 3. Portal Berita -->
                <a href="{{ route('berita.index') ?? '#' }}" class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all {{ request()->routeIs('berita.*') ? 'bg-white/10 text-white font-semibold' : 'hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-newspaper w-5 text-center {{ request()->routeIs('berita.*') ? 'text-blue-400' : '' }}"></i> 
                    <span class="text-sm">Portal Berita</span>
                </a>

                <!-- 4. Agenda Kegiatan -->
                <a href="{{ route('kegiatan.index') ?? '#' }}" class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all {{ request()->routeIs('kegiatan.*') ? 'bg-white/10 text-white font-semibold' : 'hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-calendar-check w-5 text-center {{ request()->routeIs('kegiatan.*') ? 'text-emerald-400' : '' }}"></i> 
                    <span class="text-sm">Agenda Kegiatan</span>
                </a>

                <!-- 5. Kotak Aspirasi -->
                <a href="{{ route('aspirasi.index') ?? '#' }}" class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all {{ request()->routeIs('aspirasi.*') ? 'bg-white/10 text-white font-semibold' : 'hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-envelope-open-text w-5 text-center {{ request()->routeIs('aspirasi.*') ? 'text-red-400' : '' }}"></i> 
                    <span class="text-sm">Kotak Aspirasi</span>
                </a>

                <!-- 6. Arsip Visual -->
                <a href="{{ route('admin.galeri') ?? '#' }}" class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all {{ request()->routeIs('admin.galeri') ? 'bg-white/10 text-white font-semibold' : 'hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-images w-5 text-center {{ request()->routeIs('admin.galeri') ? 'text-emerald-400' : '' }}"></i> 
                    <span class="text-sm">Arsip Visual</span>
                </a>
            </div>
            
            <!-- FOOTER KECIL DI SIDEBAR -->
            <div class="p-4 border-t border-white/5 flex items-center justify-center">
                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Sistem SEMA FT</span>
            </div>
        </nav>

        <!-- AREA KANAN (TOPBAR, KONTEN & FOOTER GLOBAL) -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden relative">
            
            <!-- TOPBAR -->
            <header class="h-20 px-6 flex items-center justify-between z-10 shrink-0">
                <button @click="sidebarOpen = true" class="lg:hidden text-slate-500 hover:text-slate-700 transition-colors">
                    <i class="fa-solid fa-bars-staggered text-2xl"></i>
                </button>

                <div class="hidden lg:flex items-center text-sm font-medium text-slate-500">
                    <span class="hover:text-slate-800 cursor-pointer">Aplikasi</span>
                    <i class="fa-solid fa-chevron-right text-[10px] mx-3"></i>
                    <span class="text-slate-800 font-bold truncate">Dashboard</span>
                </div>
                
                <div class="flex items-center gap-6 ml-auto">
                    <!-- Dropdown Profil -->
                    <div class="relative" x-data="{ profileOpen: false }">
                        <div @click="profileOpen = !profileOpen" @click.outside="profileOpen = false" class="flex items-center gap-3 cursor-pointer group">
                            <div class="text-right hidden sm:block">
                                <div class="text-sm font-bold text-slate-700 group-hover:text-blue-600 transition-colors">{{ auth()->user()->name ?? 'Administrator' }}</div>
                                <div class="text-[10px] text-slate-400 uppercase tracking-wider font-bold">Admin Panel</div>
                            </div>
                            <div class="w-9 h-9 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold shadow-md group-hover:ring-4 ring-blue-600/20 transition-all">
                                {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                            </div>
                        </div>

                        <!-- Isi Dropdown Profil -->
                        <div x-show="profileOpen" 
                             x-transition.enter="transition ease-out duration-200"
                             x-transition.enter-start="opacity-0 scale-95 translate-y-2"
                             x-transition.enter-end="opacity-100 scale-100 translate-y-0"
                             x-transition.leave="transition ease-in duration-150"
                             x-transition.leave-start="opacity-100 scale-100 translate-y-0"
                             x-transition.leave-end="opacity-0 scale-95 translate-y-2"
                             class="absolute right-0 mt-3 w-56 bg-white rounded-xl shadow-xl border border-slate-100 overflow-hidden z-50" style="display: none;">
                            
                            <div class="p-4 border-b border-slate-100 bg-slate-50/50">
                                <div class="font-bold text-slate-800 truncate">{{ auth()->user()->name ?? 'Administrator' }}</div>
                                <div class="text-xs text-slate-500 truncate">{{ auth()->user()->email ?? 'admin@semaft.my.id' }}</div>
                            </div>
                            
                            <div class="p-2 border-t border-slate-100">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 text-sm text-red-600 font-semibold hover:bg-red-50 rounded-lg transition-colors">
                                        <i class="fa-solid fa-arrow-right-from-bracket w-4"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- AREA KONTEN (Bisa di-scroll) -->
            <main class="flex-1 overflow-y-auto px-4 pb-4 lg:px-6 flex flex-col">
                
                <!-- Kotak Konten Utama -->
                <div class="bg-white rounded-3xl p-6 lg:p-8 shadow-sm border border-slate-200/60 relative flex-1">
                    @yield('content')
                </div>

                <!-- FOOTER GLOBAL BAWAH (Menyambung dengan area konten) -->
                <footer class="mt-6 mb-2 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-400 px-4">
                    <p>&copy; {{ date('Y') }} Senat Mahasiswa Fakultas Teknik. All rights reserved.</p>
                    <div class="flex items-center gap-1 mt-2 sm:mt-0">
                        Dibuat dengan <i class="fa-solid fa-heart text-red-400"></i> untuk SEMA FT
                    </div>
                </footer>

            </main>
            
        </div>
    </div>

</body>
</html>