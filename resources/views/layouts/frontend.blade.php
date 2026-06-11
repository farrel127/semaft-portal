<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEMAFT - @yield('title', 'Senat Mahasiswa Fakultas Teknik')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" href="{{ asset('images/sema.png') }}?v=3" type="image/png">

    <style>
        [x-cloak] { display: none !important; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f8fafc; }
        ::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 10px; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased flex flex-col min-h-screen" 
      x-data="{ openSidebar: false }">

    <header class="fixed top-4 md:top-6 inset-x-0 flex flex-col items-center justify-center w-full pointer-events-none" style="z-index: 9999;">
        <div class="relative w-full max-w-5xl px-4 sm:px-6">
            
            <nav class="pointer-events-auto w-full bg-semaft-navy/95 backdrop-blur-xl border border-white/20 rounded-full p-2.5 pl-5 pr-3 flex items-center justify-between shadow-2xl relative z-20">
                
                <a href="{{ url('/') }}" class="flex items-center gap-3 group shrink-0">
                    <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" class="h-9 md:h-10 w-auto object-contain drop-shadow-md group-hover:scale-105 transition-transform duration-300">
                    <span class="font-extrabold text-xl tracking-widest text-white">SEMA<span class="text-semaft-gold">FT</span></span>
                </a>
                
                <button @click="openSidebar = !openSidebar" class="flex items-center gap-2.5 bg-semaft-gold text-semaft-navy hover:bg-yellow-400 px-5 py-2.5 rounded-full transition-all duration-300 font-extrabold shadow-md transform hover:scale-105 focus:outline-none">
                    <span class="hidden sm:block text-sm">Menu</span>
                    <i class="fa-solid fa-bars text-lg" x-show="!openSidebar"></i>
                    <i class="fa-solid fa-xmark text-lg" x-show="openSidebar" x-cloak></i>
                </button>
            </nav>

            <div x-show="openSidebar" 
                 x-cloak
                 @click.away="openSidebar = false"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-4 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                 x-transition:leave-end="opacity-0 -translate-y-4 scale-95"
                 class="absolute top-[calc(100%+0.75rem)] right-4 sm:right-6 w-[280px] bg-semaft-navy/95 backdrop-blur-xl border border-white/20 rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.5)] overflow-hidden pointer-events-auto z-10 flex flex-col origin-top-right">
                 
                 <div class="p-3 flex flex-col gap-1.5">
                    
                    <a href="{{ url('/') }}" class="group flex items-center gap-3 p-3 rounded-2xl transition-all duration-300 {{ request()->is('/') ? 'bg-semaft-gold text-semaft-navy shadow-md' : 'hover:bg-white/10 text-gray-200' }}">
                        <div class="w-9 h-9 shrink-0 rounded-xl flex items-center justify-center transition-colors {{ request()->is('/') ? 'bg-white/30 text-semaft-navy' : 'bg-white/10 text-semaft-gold group-hover:bg-semaft-gold group-hover:text-semaft-navy' }}">
                            <i class="fa-solid fa-house text-sm"></i>
                        </div>
                        <span class="font-bold text-sm">Beranda Utama</span>
                    </a>

                    <a href="{{ url('/tentang') }}" class="group flex items-center gap-3 p-3 rounded-2xl transition-all duration-300 {{ request()->is('tentang') ? 'bg-semaft-gold text-semaft-navy shadow-md' : 'hover:bg-white/10 text-gray-200' }}">
                        <div class="w-9 h-9 shrink-0 rounded-xl flex items-center justify-center transition-colors {{ request()->is('tentang') ? 'bg-white/30 text-semaft-navy' : 'bg-white/10 text-semaft-gold group-hover:bg-semaft-gold group-hover:text-semaft-navy' }}">
                            <i class="fa-solid fa-users text-sm"></i>
                        </div>
                        <span class="font-bold text-sm">Profil Organisasi</span>
                    </a>

                    <a href="{{ route('frontend.berita') }}" class="group flex items-center gap-3 p-3 rounded-2xl transition-all duration-300 {{ request()->routeIs('frontend.berita') ? 'bg-semaft-gold text-semaft-navy shadow-md' : 'hover:bg-white/10 text-gray-200' }}">
                        <div class="w-9 h-9 shrink-0 rounded-xl flex items-center justify-center transition-colors {{ request()->routeIs('frontend.berita') ? 'bg-white/30 text-semaft-navy' : 'bg-white/10 text-semaft-gold group-hover:bg-semaft-gold group-hover:text-semaft-navy' }}">
                            <i class="fa-solid fa-newspaper text-sm"></i>
                        </div>
                        <span class="font-bold text-sm">Portal Berita</span>
                    </a>

                    <a href="{{ url('/kegiatan') }}" class="group flex items-center gap-3 p-3 rounded-2xl transition-all duration-300 {{ request()->is('kegiatan') ? 'bg-semaft-gold text-semaft-navy shadow-md' : 'hover:bg-white/10 text-gray-200' }}">
                        <div class="w-9 h-9 shrink-0 rounded-xl flex items-center justify-center transition-colors {{ request()->is('kegiatan') ? 'bg-white/30 text-semaft-navy' : 'bg-white/10 text-semaft-gold group-hover:bg-semaft-gold group-hover:text-semaft-navy' }}">
                            <i class="fa-regular fa-calendar-check text-sm"></i>
                        </div>
                        <span class="font-bold text-sm">Agenda Kegiatan</span>
                    </a>

                    <a href="{{ url('/aspirasi') }}" class="group flex items-center gap-3 p-3 rounded-2xl transition-all duration-300 {{ request()->is('aspirasi') ? 'bg-semaft-gold text-semaft-navy shadow-md' : 'border border-semaft-gold/30 bg-semaft-gold/10 hover:bg-semaft-gold text-semaft-gold hover:text-semaft-navy' }}">
                        <div class="w-9 h-9 shrink-0 rounded-xl flex items-center justify-center transition-colors {{ request()->is('aspirasi') ? 'bg-white/30 text-semaft-navy' : 'bg-semaft-gold/20 text-semaft-gold group-hover:bg-[#1e1160] group-hover:text-white' }}">
                            <i class="fa-solid fa-bullhorn text-sm"></i>
                        </div>
                        <span class="font-bold text-sm">Suarakan Aspirasi</span>
                    </a>
                 </div>

                 <div class="p-3 border-t border-white/10 bg-black/20">
                     <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 w-full bg-white/10 border border-white/20 text-white hover:bg-semaft-gold hover:text-semaft-navy hover:border-transparent font-extrabold px-4 py-3 rounded-xl transition-all duration-300 text-sm">
                         <i class="fa-solid fa-right-to-bracket shrink-0"></i> Login Admin
                     </a>
                 </div>
            </div>

        </div>
    </header>

    <main class="flex-grow pt-28 md:pt-36 pb-20">

    <div x-show="openSidebar" x-cloak class="fixed inset-0 flex justify-end pointer-events-none" style="z-index: 9999;">
        
        <div x-show="openSidebar" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute inset-0 bg-black/70 backdrop-blur-sm pointer-events-auto" 
             @click="openSidebar = false">
        </div>
        
        <div x-show="openSidebar"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in duration-300 transform"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             class="relative w-full max-w-sm bg-semaft-navy h-full shadow-2xl border-l border-white/10 flex flex-col pointer-events-auto">
             
             <div class="flex items-center justify-between p-6 border-b border-white/10 bg-white/5">
                 <span class="font-extrabold text-xl text-white tracking-wide">Eksplorasi <span class="text-semaft-gold">Portal</span></span>
                 <button @click="openSidebar = false" class="w-10 h-10 rounded-full bg-white/10 hover:bg-red-500 hover:text-white text-gray-300 flex items-center justify-center transition-all duration-300 transform hover:rotate-90">
                     <i class="fa-solid fa-xmark text-lg"></i>
                 </button>
             </div>

             <div class="flex-1 overflow-y-auto p-6 space-y-4">
                <a href="{{ url('/') }}" class="group flex items-center gap-4 p-4 rounded-2xl transition-all duration-300 {{ request()->is('/') ? 'bg-semaft-gold text-semaft-navy shadow-lg transform scale-[1.02]' : 'bg-white/5 border border-white/10 text-gray-200 hover:bg-white/10 hover:-translate-y-1' }}">
                    <div class="w-11 h-11 shrink-0 rounded-xl flex items-center justify-center transition-colors shadow-inner {{ request()->is('/') ? 'bg-white/30 text-semaft-navy' : 'bg-black/20 text-semaft-gold' }}">
                        <i class="fa-solid fa-house text-lg"></i>
                    </div>
                    <span class="font-bold text-base">Beranda Utama</span>
                </a>

                <a href="{{ url('/tentang') }}" class="group flex items-center gap-4 p-4 rounded-2xl transition-all duration-300 {{ request()->is('tentang') ? 'bg-semaft-gold text-semaft-navy shadow-lg transform scale-[1.02]' : 'bg-white/5 border border-white/10 text-gray-200 hover:bg-white/10 hover:-translate-y-1' }}">
                    <div class="w-11 h-11 shrink-0 rounded-xl flex items-center justify-center transition-colors shadow-inner {{ request()->is('tentang') ? 'bg-white/30 text-semaft-navy' : 'bg-black/20 text-semaft-gold' }}">
                        <i class="fa-solid fa-users text-lg"></i>
                    </div>
                    <span class="font-bold text-base">Profil Organisasi</span>
                </a>

                <a href="{{ route('frontend.berita') }}" class="group flex items-center gap-4 p-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('frontend.berita') ? 'bg-semaft-gold text-semaft-navy shadow-lg transform scale-[1.02]' : 'bg-white/5 border border-white/10 text-gray-200 hover:bg-white/10 hover:-translate-y-1' }}">
                    <div class="w-11 h-11 shrink-0 rounded-xl flex items-center justify-center transition-colors shadow-inner {{ request()->routeIs('frontend.berita') ? 'bg-white/30 text-semaft-navy' : 'bg-black/20 text-semaft-gold' }}">
                        <i class="fa-solid fa-newspaper text-lg"></i>
                    </div>
                    <span class="font-bold text-base">Portal Berita</span>
                </a>

                <a href="{{ url('/kegiatan') }}" class="group flex items-center gap-4 p-4 rounded-2xl transition-all duration-300 {{ request()->is('kegiatan') ? 'bg-semaft-gold text-semaft-navy shadow-lg transform scale-[1.02]' : 'bg-white/5 border border-white/10 text-gray-200 hover:bg-white/10 hover:-translate-y-1' }}">
                    <div class="w-11 h-11 shrink-0 rounded-xl flex items-center justify-center transition-colors shadow-inner {{ request()->is('kegiatan') ? 'bg-white/30 text-semaft-navy' : 'bg-black/20 text-semaft-gold' }}">
                        <i class="fa-regular fa-calendar-check text-lg"></i>
                    </div>
                    <span class="font-bold text-base">Agenda Kegiatan</span>
                </a>

                <a href="{{ url('/aspirasi') }}" class="group flex items-center gap-4 p-4 rounded-2xl transition-all duration-300 border border-semaft-gold/30 bg-semaft-gold/10 hover:bg-semaft-gold hover:text-semaft-navy {{ request()->is('aspirasi') ? 'bg-semaft-gold text-semaft-navy shadow-lg transform scale-[1.02]' : 'text-semaft-gold hover:-translate-y-1' }}">
                    <div class="w-11 h-11 shrink-0 rounded-xl flex items-center justify-center transition-colors shadow-inner {{ request()->is('aspirasi') ? 'bg-white/30 text-semaft-navy' : 'bg-semaft-gold/20 text-semaft-gold group-hover:bg-semaft-navy group-hover:text-white' }}">
                        <i class="fa-solid fa-bullhorn text-lg"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-base group-hover:text-semaft-navy">Suarakan Aspirasi</span>
                        <span class="text-xs opacity-70">Layanan pengaduan</span>
                    </div>
                </a>
             </div>

             <div class="p-6 border-t border-white/10 bg-black/20">
                 <a href="{{ route('login') }}" class="flex items-center justify-center gap-3 w-full bg-white/10 border border-white/20 text-white hover:bg-semaft-gold hover:text-semaft-navy hover:border-transparent font-extrabold px-6 py-4 rounded-xl shadow-lg hover:scale-[1.03] transition-all duration-300">
                     <i class="fa-solid fa-right-to-bracket shrink-0"></i> Login Administrator
                 </a>
             </div>
        </div>
    </div>

    <main class="flex-grow bg-white pt-28 md:pt-36 pb-20">
        @yield('content')
    </main>

    <footer class="bg-semaft-navy text-gray-300 pt-16 pb-12 md:pb-16 border-t-[6px] border-semaft-gold mt-auto relative overflow-hidden">
        
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-semaft-gold rounded-full blur-[120px] opacity-20 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 mt-8 md:mt-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10 mb-4 items-start">
                
                <div class="space-y-5">
                    <a href="{{ url('/') }}" class="flex items-center gap-3 mb-4 group inline-flex shrink-0">
                        <div class="bg-white p-1.5 rounded-xl shrink-0">
                            <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" class="h-10 sm:h-12 w-auto object-contain">
                        </div>
                        <span class="font-extrabold text-2xl tracking-widest text-white">SEMA<span class="text-semaft-gold">FT</span></span>
                    </a>
                    <p class="text-sm leading-relaxed text-gray-400">
                        Senat Mahasiswa Fakultas Teknik Universitas Sangga Buana YPKP. Wadah aspirasi dan sinergi untuk membangun mahasiswa teknik yang solid dan inovatif.
                    </p>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-6 relative inline-block pt-4">
                        <span class="absolute top-0 left-0 w-12 h-1 bg-semaft-gold rounded-full"></span>
                        Sponsored By
                    </h3>
                    
                    <div class="flex flex-col space-y-4">
                        <div class="bg-white/5 border border-white/10 rounded-xl p-3 flex items-center gap-4 hover:bg-white/10 transition-colors group cursor-pointer">
                            <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center p-2 shrink-0">
                                <img src="{{ asset('images/kahf.png') }}" alt="Kahf" class="max-h-full max-w-full object-contain grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100 transition-all">
                            </div>
                            <div class="flex flex-col">
                                <span class="font-bold text-gray-200">Kahf</span>
                                <span class="text-xs text-gray-500">Official Partner</span>
                            </div>
                        </div>

                        <div class="bg-white/5 border border-white/10 rounded-xl p-3 flex items-center gap-4 hover:bg-white/10 transition-colors group cursor-pointer">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center shrink-0 shadow-inner">
                                <i class="fa-solid fa-wallet text-white text-lg"></i>
                            </div>
                            <div class="flex flex-col">
                                <span class="font-extrabold text-gray-200 tracking-tight group-hover:text-blue-400 transition-colors">Flux<span class="font-light">Wallet</span></span>
                                <span class="text-xs text-gray-500">Financial Tech Support</span>
                            </div>
                        </div>

                        <div class="bg-white/5 border border-white/10 rounded-xl p-3 flex items-center gap-4 hover:bg-white/10 transition-colors group cursor-pointer">
                            <div class="w-12 h-12 bg-[#232F3E] rounded-lg flex items-center justify-center p-2 shrink-0">
                                <i class="fa-brands fa-aws text-2xl text-white opacity-80 group-hover:opacity-100 transition-opacity"></i>
                            </div>
                            <div class="flex flex-col">
                                <span class="font-bold text-gray-200">AWS Educate</span>
                                <span class="text-xs text-gray-500">Cloud Infrastructure</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-6 relative inline-block pt-4">
                        <span class="absolute top-0 left-0 w-12 h-1 bg-semaft-gold rounded-full"></span>
                        Layanan Humas
                    </h3>
                    <div class="space-y-4">
                        <a href="https://wa.me/6281234567890" target="_blank" class="flex items-center gap-4 bg-green-500/10 border border-green-500/30 text-green-400 hover:bg-green-500 hover:text-white px-4 py-3.5 rounded-xl transition-all font-bold text-sm shadow-sm">
                            <i class="fa-brands fa-whatsapp text-xl shrink-0"></i> Chat WhatsApp
                        </a>
                        <a href="mailto:semaft.usb@gmail.com" class="flex items-center gap-4 bg-white/5 border border-white/10 text-gray-300 hover:bg-white hover:text-semaft-navy px-4 py-3.5 rounded-xl transition-all text-sm font-bold shadow-sm">
                            <i class="fa-solid fa-envelope text-semaft-gold shrink-0"></i> 
                            <span class="truncate">semaft.usb@gmail.com</span>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-6 relative inline-block pt-4">
                        <span class="absolute top-0 left-0 w-12 h-1 bg-semaft-gold rounded-full"></span>
                        Terkoneksi
                    </h3>
                    <div class="mb-8">
                        <a href="https://instagram.com/semaft_usby" target="_blank" class="flex items-center gap-3 bg-semaft-navy border border-pink-500 px-5 py-3 rounded-xl hover:bg-pink-600 transition-colors group">
                            <i class="fa-brands fa-instagram text-xl text-white shrink-0 group-hover:scale-110 transition-transform"></i>
                            <span class="font-bold text-sm text-white truncate">@semaft_usby</span>
                        </a>
                    </div>
                    
                    <div>
                        <p class="text-xs text-gray-400 mb-4 font-semibold tracking-wider uppercase">Bagikan Portal Ini</p>
                        <div class="flex flex-wrap gap-3">
                            <button class="w-12 h-12 shrink-0 rounded-full bg-white/10 border border-white/10 hover:bg-semaft-gold hover:text-semaft-navy transition-all flex items-center justify-center">
                                <i class="fa-solid fa-link"></i>
                            </button>
                            <a href="#" class="w-12 h-12 shrink-0 rounded-full bg-white/10 border border-white/10 hover:bg-[#25D366] hover:text-white transition-all flex items-center justify-center">
                                <i class="fa-brands fa-whatsapp text-lg"></i>
                            </a>
                            <a href="#" class="w-12 h-12 shrink-0 rounded-full bg-white/10 border border-white/10 hover:bg-black hover:text-white transition-all flex items-center justify-center">
                                <i class="fa-brands fa-x-twitter text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="border-t border-white/10 pt-5 mt-4 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-400 font-medium">
                <p>&copy; {{ date('Y') }} Senat Mahasiswa Fakultas Teknik USB YPKP.</p>
                <p>Designed with <i class="fa-solid fa-heart text-red-500 mx-1"></i> by vicnitnizzmt</p>
            </div>
        </div>
    </footer>
</body>
</html>