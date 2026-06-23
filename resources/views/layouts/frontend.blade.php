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
        /* Mencegah menu berkedip sebelum Alpine.js siap */
        [x-cloak] { display: none !important; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f8fafc; }
        ::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 10px; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased flex flex-col min-h-screen" 
      x-data="{ isMenuOpen: false }">

  <header class="absolute top-4 md:top-6 inset-x-0 flex flex-col items-center justify-center w-full pointer-events-none" style="z-index: 9999; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    <div class="relative w-full px-4 sm:px-6 pointer-events-auto flex justify-center">

        <nav class="w-full max-w-4xl rounded-[18px] px-4 py-2 flex items-center justify-between transition-all duration-500"
             style="background: rgba(30, 17, 96, 0.4);
                    backdrop-filter: blur(30px) saturate(210%);
                    -webkit-backdrop-filter: blur(30px) saturate(210%);
                    border: 0.5px solid rgba(255, 255, 255, 0.2);
                    box-shadow: 0 12px 40px rgba(16, 8, 54, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.15);">

            <a href="{{ url('/') }}" class="flex items-center gap-3 shrink-0 transition-all duration-300 hover:scale-105">
                <img src="{{ asset('images/sema.png') }}" alt="Logo" class="h-7 md:h-8 w-auto object-contain drop-shadow-md">
                <span style="font-weight: 800; font-size: 16px; color: #ffffff; letter-spacing: 0.8px;">
                    SEMA<span style="color: #f4c332;">FT</span>
                </span>
            </a>

            <button @click="isMenuOpen = !isMenuOpen" class="flex items-center gap-2 px-3 py-1.5 rounded-[10px] transition-all focus:outline-none"
                    style="background: rgba(244, 195, 50, 0.15); border: 0.5px solid rgba(244, 195, 50, 0.3); box-shadow: 0 2px 8px rgba(0,0,0,0.15);"
                    onmouseover="this.style.backgroundColor='rgba(244, 195, 50, 0.25)'"
                    onmouseout="this.style.backgroundColor='rgba(244, 195, 50, 0.15)'">
                <i class="fa-brands fa-apple" style="color: #f4c332; font-size: 14px;"></i>
                <span style="color: #ffffff; font-size: 13px; font-weight: 600; letter-spacing: 0.3px;">Menu</span>
            </button>
        </nav>

        <div x-show="isMenuOpen"
             x-cloak
             @click.away="isMenuOpen = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
             class="absolute top-[calc(100%+0.75rem)] right-4 sm:right-[calc(50%-450px)] sm:max-w-max w-[260px] rounded-[18px] p-2 flex flex-col origin-top-right z-50"
             style="background: rgba(21, 10, 56, 0.75);
                    backdrop-filter: blur(50px) saturate(220%);
                    -webkit-backdrop-filter: blur(50px) saturate(220%);
                    border: 0.5px solid rgba(255, 255, 255, 0.15);
                    box-shadow: 0 30px 60px rgba(11, 5, 30, 0.6), inset 0 1px 0 rgba(255, 255, 255, 0.1);">

             <div class="px-3 pt-1 pb-1.5">
                 <p style="color: rgba(244,195,50,0.6); font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">Navigasi Portal</p>
             </div>

             <a href="{{ url('/') }}" class="flex items-center gap-3 px-3 py-1.5 rounded-[10px] transition-colors cursor-default"
                style="{{ request()->is('/') ? 'background: #f4c332; color: #1e1160; font-weight: 700;' : 'color: rgba(255,255,255,0.9);' }}"
                onmouseover="this.style.backgroundColor='{{ request()->is('/') ? '#f4c332' : 'rgba(255,255,255,0.08)' }}';"
                onmouseout="this.style.backgroundColor='{{ request()->is('/') ? '#f4c332' : 'transparent' }}';">
                <div class="w-7 h-7 flex items-center justify-center rounded-md" style="background: {{ request()->is('/') ? 'rgba(0,0,0,0.15)' : 'rgba(255,255,255,0.05)' }};">
                    <i class="fa-solid fa-house text-xs"></i>
                </div>
                <span style="font-size: 13px;">Beranda Utama</span>
             </a>

             <!-- <a href="{{ url('/tentang') }}" class="flex items-center gap-3 px-3 py-1.5 rounded-[10px] transition-colors cursor-default"
                style="{{ request()->is('tentang') ? 'background: #f4c332; color: #1e1160; font-weight: 700;' : 'color: rgba(255,255,255,0.9);' }}"
                onmouseover="this.style.backgroundColor='{{ request()->is('tentang') ? '#f4c332' : 'rgba(255,255,255,0.08)' }}';"
                onmouseout="this.style.backgroundColor='{{ request()->is('tentang') ? '#f4c332' : 'transparent' }}';">
                <div class="w-7 h-7 flex items-center justify-center rounded-md" style="background: {{ request()->is('tentang') ? 'rgba(0,0,0,0.15)' : 'rgba(255,255,255,0.05)' }};">
                    <i class="fa-solid fa-users text-xs"></i>
                </div>
                <span style="font-size: 13px;">Profil Organisasi</span>
             </a> -->

             <div style="height: 1px; background: rgba(255,255,255,0.08); margin: 6px 12px;"></div>

             <a href="{{ route('frontend.berita') }}" class="flex items-center gap-3 px-3 py-1.5 rounded-[10px] transition-colors cursor-default"
                style="{{ request()->routeIs('frontend.berita') ? 'background: #f4c332; color: #1e1160; font-weight: 700;' : 'color: rgba(255,255,255,0.9);' }}"
                onmouseover="this.style.backgroundColor='{{ request()->routeIs('frontend.berita') ? '#f4c332' : 'rgba(255,255,255,0.08)' }}';"
                onmouseout="this.style.backgroundColor='{{ request()->routeIs('frontend.berita') ? '#f4c332' : 'transparent' }}';">
                <div class="w-7 h-7 flex items-center justify-center rounded-md" style="background: {{ request()->routeIs('frontend.berita') ? 'rgba(0,0,0,0.15)' : 'rgba(255,255,255,0.05)' }};">
                    <i class="fa-solid fa-newspaper text-xs"></i>
                </div>
                <span style="font-size: 13px;">Portal Berita</span>
             </a>

             <a href="{{ url('/kegiatan') }}" class="flex items-center gap-3 px-3 py-1.5 rounded-[10px] transition-colors cursor-default"
                style="{{ request()->is('kegiatan') ? 'background: #f4c332; color: #1e1160; font-weight: 700;' : 'color: rgba(255,255,255,0.9);' }}"
                onmouseover="this.style.backgroundColor='{{ request()->is('kegiatan') ? '#f4c332' : 'rgba(255,255,255,0.08)' }}';"
                onmouseout="this.style.backgroundColor='{{ request()->is('kegiatan') ? '#f4c332' : 'transparent' }}';">
                <div class="w-7 h-7 flex items-center justify-center rounded-md" style="background: {{ request()->is('kegiatan') ? 'rgba(0,0,0,0.15)' : 'rgba(255,255,255,0.05)' }};">
                    <i class="fa-regular fa-calendar-check text-xs"></i>
                </div>
                <span style="font-size: 13px;">Agenda Kegiatan</span>
             </a>

             <div style="height: 1px; background: rgba(255,255,255,0.08); margin: 6px 12px;"></div>

             <a href="{{ url('/aspirasi') }}" class="flex items-center gap-3 px-3 py-2 rounded-[10px] transition-colors mt-1 cursor-default"
                style="background: rgba(244,195,50,0.15); border: 0.5px solid rgba(244,195,50,0.4); color: #f4c332;"
                onmouseover="this.style.backgroundColor='rgba(244,195,50,0.25)';"
                onmouseout="this.style.backgroundColor='rgba(244,195,50,0.15)';">
                <div class="w-7 h-7 flex items-center justify-center rounded-md" style="background: rgba(244,195,50,0.2); color: #f4c332;">
                    <i class="fa-solid fa-bullhorn text-xs"></i>
                </div>
                <span style="font-size: 13px; font-weight: 700;">Suarakan Aspirasi</span>
             </a>

             <a href="{{ route('login') }}" class="flex items-center justify-between px-3 py-2 rounded-[10px] transition-colors mt-2 cursor-default"
                style="background: rgba(0,0,0,0.25); border: 0.5px solid rgba(255,255,255,0.05); color: rgba(255,255,255,0.5);"
                onmouseover="this.style.backgroundColor='rgba(255,255,255,0.08)'; this.style.color='#ffffff';"
                onmouseout="this.style.backgroundColor='rgba(0,0,0,0.25)'; this.style.color='rgba(255,255,255,0.5)';">
                <span style="font-size: 11px; font-weight: 600;"><i class="fa-solid fa-lock mr-2" style="color: #f4c332;"></i>Admin Access</span>
                <i class="fa-solid fa-chevron-right text-[9px]"></i>
             </a>
        </div>

    </div>
</header>

    <main class="flex-grow pt-28 md:pt-36 pb-20 relative z-0">
        @yield('content')
    </main>

    <footer class="bg-semaft-navy text-gray-300 pt-16 pb-12 md:pb-16 border-t-[6px] border-semaft-gold mt-auto relative overflow-hidden z-10">
        
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

    <div class="mt-12">
        <h4 class="text-xs font-bold text-gray-400 tracking-[0.15em] uppercase mb-4 flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
            Live Traffic
        </h4>
        
        <div class="bg-white/5 border border-white/10 rounded-2xl p-4 flex flex-col gap-3 shadow-inner">
            
            <div class="flex items-center justify-between group cursor-default">
                <div class="flex items-center gap-3 text-gray-400 group-hover:text-white transition-colors">
                    <div class="w-8 h-8 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shadow-sm">
                        <i class="fa-solid fa-user-clock text-xs"></i>
                    </div>
                    <span class="text-sm font-medium">Hari ini</span>
                </div>
                <span class="text-white font-black font-mono tracking-wider">
                    {{ number_format($todayVisitors, 0, ',', '.') }}
                </span>
            </div>

            <div class="flex items-center justify-between group cursor-default">
                <div class="flex items-center gap-3 text-gray-400 group-hover:text-white transition-colors">
                    <div class="w-8 h-8 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shadow-sm">
                        <i class="fa-solid fa-calendar-days text-xs"></i>
                    </div>
                    <span class="text-sm font-medium">Bulan ini</span>
                </div>
                <span class="text-white font-black font-mono tracking-wider">
                    {{ number_format($monthVisitors, 0, ',', '.') }}
                </span>
            </div>

            <div class="flex items-center justify-between group pt-4 border-t border-white/10 cursor-default">
                <div class="flex items-center gap-3 text-gray-400 group-hover:text-semaft-gold transition-colors">
                    <div class="w-8 h-8 rounded-xl bg-semaft-gold/10 border border-semaft-gold/20 text-semaft-gold flex items-center justify-center shadow-sm">
                        <i class="fa-solid fa-chart-line text-xs"></i>
                    </div>
                    <span class="text-sm font-bold">Total Kunjungan</span>
                </div>
                <span class="text-semaft-gold font-black font-mono tracking-wider text-lg drop-shadow-[0_0_8px_rgba(244,195,50,0.5)]">
                    {{ number_format($totalVisitors, 0, ',', '.') }}
                </span>
            </div>

        </div>
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
                <p>Designed with by vicnitnizzmt</p>
            </div>
        </div>
    </footer>
</body>
</html>