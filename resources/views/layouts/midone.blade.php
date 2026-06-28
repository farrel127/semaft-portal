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
    
    <!-- Alpine.js (Untuk animasi Dropdown & Mobile Menu tanpa repot nulis JS panjang) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        /* Konfigurasi khas Midone */
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'semaft-navy': '#1e293b', /* Slate 800 */
                        'semaft-gold': '#f4c332',
                        'midone-bg': '#f1f5f9', /* Slate 100 */
                    }
                }
            }
        }
        /* Efek scrollbar estetik */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<!-- x-data mendefinisikan state untuk mobile menu sidebar -->
<body class="bg-midone-bg text-slate-800 font-sans antialiased overflow-hidden" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen w-full">

        <!-- OVERLAY UNTUK MOBILE (Gelap saat menu HP terbuka) -->
        <div x-show="sidebarOpen" 
             x-transition.opacity 
             @click="sidebarOpen = false"
             class="fixed inset-0 bg-black/50 z-40 lg:hidden backdrop-blur-sm"></div>

        <!-- SIDEBAR NAVIGASI KIRI (Gaya Midone Dark) -->
        <nav :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
             class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-slate-300 transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:w-64 flex flex-col shadow-2xl lg:shadow-none">
            
            <!-- Logo SEMA FT -->
            <div class="flex items-center justify-center gap-3 h-20 border-b border-white/5 mt-4 lg:mt-0">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-semaft-gold to-yellow-600 flex items-center justify-center text-slate-900 font-black shadow-lg shadow-yellow-500/20">
                    S
                </div>
                <span class="font-bold text-xl tracking-wide text-white">SEMA <span class="text-semaft-gold font-black">FT</span></span>
            </div>

            <!-- Menu List -->
            <div class="flex-1 overflow-y-auto py-6 px-4 space-y-1">
                <p class="px-3 text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Main Menu</p>
                
                <a href="/dashboard" class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all {{ request()->is('dashboard') ? 'bg-white/10 text-white font-semibold' : 'hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-house w-5 text-center {{ request()->is('dashboard') ? 'text-blue-400' : '' }}"></i> 
                    <span class="text-sm">Dashboard Utama</span>
                </a>

                <a href="{{ route('admin.galeri') ?? '#' }}" class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all {{ request()->routeIs('admin.galeri') ? 'bg-white/10 text-white font-semibold' : 'hover:bg-white/5 hover:text-white' }}">
                    <i class="fa-solid fa-images w-5 text-center {{ request()->routeIs('admin.galeri') ? 'text-emerald-400' : '' }}"></i> 
                    <span class="text-sm">Arsip Visual</span>
                </a>

                <!-- Contoh menu lain (Anda bisa sesuaikan link-nya) -->
                <a href="#" class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all hover:bg-white/5 hover:text-white">
                    <i class="fa-solid fa-newspaper w-5 text-center"></i> <span class="text-sm">Portal Berita</span>
                </a>
            </div>
            
            <!-- Footer Sidebar -->
            <div class="p-4 border-t border-white/5 text-center text-xs text-slate-500">
                &copy; 2026 SEMA FT
            </div>
        </nav>

        <!-- AREA KANAN (TOPBAR & KONTEN) -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden">
            
            <!-- TOPBAR ATAS -->
            <header class="h-20 px-6 flex items-center justify-between z-10">
                <!-- Tombol Mobile Menu -->
                <button @click="sidebarOpen = true" class="lg:hidden text-slate-500 hover:text-slate-700 transition-colors">
                    <i class="fa-solid fa-bars-staggered text-2xl"></i>
                </button>

                <!-- Breadcrumb (Khas Midone) -->
                <div class="hidden lg:flex items-center text-sm font-medium text-slate-500">
                    <span class="hover:text-slate-800 cursor-pointer">Aplikasi</span>
                    <i class="fa-solid fa-chevron-right text-[10px] mx-3"></i>
                    <span class="text-slate-800 font-bold truncate">Dashboard</span>
                </div>
                
                <div class="flex items-center gap-6 ml-auto">
                    <!-- Ikon Notifikasi -->
                    <div class="relative cursor-pointer text-slate-500 hover:text-blue-600 transition-colors">
                        <i class="fa-regular fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full border-2 border-midone-bg"></span>
                    </div>

                    <!-- DROPDOWN PROFIL (Interaktif dengan Alpine.js) -->
                    <div class="relative" x-data="{ profileOpen: false }">
                        <div @click="profileOpen = !profileOpen" @click.outside="profileOpen = false" class="flex items-center gap-3 cursor-pointer group">
                            <div class="w-9 h-9 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold shadow-md group-hover:ring-4 ring-blue-600/20 transition-all overflow-hidden">
                                <!-- Jika ada foto profil, taruh img tag di sini. Jika tidak, inisial nama -->
                                {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                            </div>
                        </div>

                        <!-- Menu Dropdown -->
                        <div x-show="profileOpen" 
                             x-transition.enter="transition ease-out duration-200"
                             x-transition.enter-start="opacity-0 scale-95 translate-y-2"
                             x-transition.enter-end="opacity-100 scale-100 translate-y-0"
                             x-transition.leave="transition ease-in duration-150"
                             x-transition.leave-start="opacity-100 scale-100 translate-y-0"
                             x-transition.leave-end="opacity-0 scale-95 translate-y-2"
                             class="absolute right-0 mt-3 w-56 bg-white rounded-xl shadow-xl border border-slate-100 overflow-hidden z-50" style="display: none;">
                            
                            <!-- Header Dropdown -->
                            <div class="p-4 border-b border-slate-100 bg-slate-50/50">
                                <div class="font-bold text-slate-800 truncate">{{ auth()->user()->name ?? 'Administrator' }}</div>
                                <div class="text-xs text-slate-500 truncate">{{ auth()->user()->email ?? 'admin@semaft.my.id' }}</div>
                            </div>
                            
                            <!-- Link Dropdown -->
                            <div class="p-2">
                                <a href="/profile" class="flex items-center gap-2 px-3 py-2 text-sm text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">
                                    <i class="fa-regular fa-user w-4"></i> Profil Saya
                                </a>
                                <a href="{{ url('/') }}" target="_blank" class="flex items-center gap-2 px-3 py-2 text-sm text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">
                                    <i class="fa-solid fa-arrow-up-right-from-square w-4"></i> Lihat Web Portal
                                </a>
                            </div>
                            
                            <!-- Tombol Logout (Menggunakan Form agar aman) -->
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

            <!-- AREA KONTEN (BOXED LAYOUT KHAS MIDONE) -->
            <main class="flex-1 overflow-y-auto px-4 pb-4 lg:px-6 lg:pb-6">
                <!-- Wrapper box putih melengkung -->
                <div class="bg-white min-h-full rounded-3xl p-6 lg:p-8 shadow-sm border border-slate-200/60 relative">
                    @yield('content')
                </div>
            </main>
            
        </div>
    </div>

</body>
</html>