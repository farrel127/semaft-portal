<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEMAFT - @yield('title', 'Senat Mahasiswa Fakultas Teknik')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" href="{{ asset('images/sema.png') }}?v=3" type="image/png">

    <style>
        /* Mengamankan efek transisi Alpine agar tidak berkedip saat pertama kali dimuat */
        [x-cloak] { display: none !important; }
        
        /* Modifikasi scrollbar agar lebih elegan */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased flex flex-col min-h-screen selection:bg-semaft-gold selection:text-white">

    <header x-data="{ open: false, scrolled: false }" 
            @scroll.window="scrolled = (window.pageYOffset > 20)"
            x-effect="document.body.classList.toggle('overflow-hidden', open)"
            class="fixed top-0 left-0 w-full z-50 transition-all duration-500"
            :class="scrolled ? 'bg-semaft-navy/95 backdrop-blur-md shadow-lg border-b border-white/10' : 'bg-semaft-navy border-b border-semaft-gold/20 shadow-xl'">
        
        <div class="hidden md:flex w-full bg-gray-900 items-center justify-between text-[11px] font-semibold tracking-widest text-gray-300 transition-all duration-500 overflow-hidden"
             :class="scrolled ? 'h-0 opacity-0 px-6 py-0' : 'h-9 opacity-100 px-6 py-2 border-b border-white/5'">
            <div class="flex items-center gap-2.5">
                <span class="relative flex h-2.5 w-2.5">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-semaft-gold opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-semaft-gold"></span>
                </span>
                <span class="uppercase">Senat Mahasiswa Fakultas Teknik USB YPKP Bandung</span>
            </div>
            <div class="flex items-center gap-4 text-semaft-gold/80">
                <i class="fa-solid fa-building-columns"></i> Portal Navigasi Resmi
            </div>
        </div>

        <div class="w-full transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center transition-all duration-500"
                     :class="scrolled ? 'h-16' : 'h-20'">
                    
                    <div class="flex-shrink-0 flex items-center relative z-50">
                        <a href="{{ url('/') }}" class="flex items-center gap-3 sm:gap-4 group">
                            <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" 
                                 class="w-auto transition-all duration-500 drop-shadow-lg group-hover:scale-105 group-hover:rotate-2"
                                 :class="scrolled ? 'h-9 sm:h-10' : 'h-11 sm:h-12'">
                            <div class="flex flex-col justify-center border-l border-white/20 pl-3 sm:pl-4 transition-all duration-300">
                                <span class="font-extrabold text-white tracking-wide leading-none group-hover:text-semaft-gold transition-colors"
                                      :class="scrolled ? 'text-lg' : 'text-xl'">SEMA FT</span>
                                <span class="text-[9px] sm:text-[10px] font-bold text-semaft-gold tracking-[0.2em] uppercase mt-1">Portal Resmi</span>
                            </div>
                        </a>
                    </div>

                    <div class="flex items-center relative z-50">
                        <button @click="open = !open" 
                                class="group flex items-center justify-center w-10 h-10 sm:w-12 sm:h-12 rounded-full border border-white/10 bg-white/5 hover:bg-white/10 hover:border-semaft-gold/50 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-semaft-gold/50">
                            
                            <div class="relative w-5 h-4 flex flex-col justify-between transform transition-all duration-300">
                                <span class="w-full h-[2px] rounded-full transition-all duration-300 origin-left" 
                                      :class="open ? 'bg-semaft-gold rotate-45 translate-y-[-1px] w-[22px]' : 'bg-white group-hover:bg-semaft-gold'"></span>
                                <span class="w-full h-[2px] rounded-full transition-all duration-300" 
                                      :class="open ? 'bg-semaft-gold opacity-0 translate-x-3' : 'bg-white group-hover:bg-semaft-gold'"></span>
                                <span class="w-full h-[2px] rounded-full transition-all duration-300 origin-left" 
                                      :class="open ? 'bg-semaft-gold -rotate-45 -translate-y-[-1px] w-[22px]' : 'bg-white group-hover:bg-semaft-gold'"></span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="open" 
             x-cloak
             class="fixed inset-0 h-screen w-screen z-30 bg-semaft-navy/80 backdrop-blur-sm"
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="open = false">
        </div>

        <div x-show="open" 
             x-cloak
             class="fixed top-0 right-0 h-screen w-full sm:w-[420px] bg-white shadow-[0_0_50px_rgba(0,0,0,0.3)] z-40 flex flex-col pt-28 pb-10 px-8 sm:px-12 transform transition-transform duration-500 ease-[cubic-bezier(0.77,0,0.175,1)] sm:rounded-l-3xl overflow-y-auto"
             x-transition:enter="transition transform duration-500 delay-75"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition transform duration-500"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full">
            
            <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-gray-50 rounded-full blur-3xl opacity-50 pointer-events-none"></div>

            <div class="relative z-10 flex-1 flex flex-col">
                <p class="text-gray-400 font-bold text-[10px] tracking-[0.25em] uppercase mb-8 flex items-center gap-3">
                    <span class="w-8 h-[1px] bg-gray-300"></span> Eksplorasi
                </p>

                <nav class="flex flex-col space-y-2">
                    <a href="{{ url('/') }}" class="group flex items-center justify-between p-4 rounded-2xl hover:bg-gray-50 transition-all duration-300 border border-transparent hover:border-gray-100">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-blue-50 text-semaft-navy flex items-center justify-center group-hover:bg-semaft-navy group-hover:text-white transition-colors duration-300 shadow-sm">
                                <i class="fa-solid fa-house text-sm"></i>
                            </div>
                            <span class="text-xl font-extrabold text-gray-800 group-hover:text-semaft-navy transition-colors duration-300">Beranda</span>
                        </div>
                        <i class="fa-solid fa-chevron-right text-gray-300 group-hover:text-semaft-gold group-hover:translate-x-1 transition-all duration-300 text-sm"></i>
                    </a>

                    <a href="{{ route('frontend.berita') }}" class="group flex items-center justify-between p-4 rounded-2xl hover:bg-gray-50 transition-all duration-300 border border-transparent hover:border-gray-100">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-blue-50 text-semaft-navy flex items-center justify-center group-hover:bg-semaft-navy group-hover:text-white transition-colors duration-300 shadow-sm">
                                <i class="fa-solid fa-newspaper text-sm"></i>
                            </div>
                            <span class="text-xl font-extrabold text-gray-800 group-hover:text-semaft-navy transition-colors duration-300">Portal Berita</span>
                        </div>
                        <i class="fa-solid fa-chevron-right text-gray-300 group-hover:text-semaft-gold group-hover:translate-x-1 transition-all duration-300 text-sm"></i>
                    </a>

                    <a href="#" class="group flex items-center justify-between p-4 rounded-2xl hover:bg-gray-50 transition-all duration-300 border border-transparent hover:border-gray-100">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-blue-50 text-semaft-navy flex items-center justify-center group-hover:bg-semaft-navy group-hover:text-white transition-colors duration-300 shadow-sm">
                                <i class="fa-regular fa-calendar-check text-sm"></i>
                            </div>
                            <span class="text-xl font-extrabold text-gray-800 group-hover:text-semaft-navy transition-colors duration-300">Agenda Kegiatan</span>
                        </div>
                        <i class="fa-solid fa-chevron-right text-gray-300 group-hover:text-semaft-gold group-hover:translate-x-1 transition-all duration-300 text-sm"></i>
                    </a>
                </nav>

                <div class="mt-auto pt-10">
                    <a href="{{ route('login') }}" class="relative flex items-center justify-center w-full px-6 py-4 rounded-2xl bg-semaft-navy text-white font-bold text-sm hover:bg-blue-900 shadow-[0_8px_20px_rgba(15,23,42,0.2)] transform hover:-translate-y-1 transition-all duration-300 group overflow-hidden">
                        <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-white rounded-full group-hover:w-full group-hover:h-56 opacity-10"></span>
                        <i class="fa-solid fa-shield-halved mr-2 group-hover:text-semaft-gold transition-colors relative z-10"></i> 
                        <span class="relative z-10">Portal Administrator</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="pt-28 flex-grow">
        @yield('content')
    </main>
    <!-- Footer Global -->
    <footer class="bg-semaft-navy text-gray-300 py-12 border-t-4 border-semaft-gold mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                
                <div class="space-y-4">
                    <a href="{{ url('/') }}" class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" class="h-12 w-auto object-contain">
                        <span class="font-bold text-2xl tracking-widest text-semaft-gold">SEMAFT</span>
                    </a>
                    <p class="text-sm leading-relaxed text-justify">
                        Senat Mahasiswa Fakultas Teknik Universitas Sangga Buana YPKP. Wadah aspirasi dan sinergi untuk membangun mahasiswa teknik yang solid dan inovatif.
                    </p>
                    <p class="text-sm mt-4">
                        <i class="fa-solid fa-location-dot text-semaft-gold mr-2"></i> Jl. PHH. Mustofa No.68, Bandung
                    </p>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-4 border-b border-gray-600 pb-2 inline-block">Tautan Cepat</h3>
                    <ul class="space-y-3 text-sm">
                        <li>
                            <a href="{{ url('/') }}" class="flex items-center hover:text-semaft-gold transition duration-300 {{ request()->is('/') ? 'text-semaft-gold' : '' }}">
                                <i class="fa-solid fa-angle-right text-semaft-gold mr-2"></i> Beranda Utama
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center hover:text-semaft-gold transition duration-300">
                                <i class="fa-solid fa-angle-right text-semaft-gold mr-2"></i> Profil Fakultas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.berita') }}" class="flex items-center hover:text-semaft-gold transition duration-300 {{ request()->routeIs('frontend.berita') ? 'text-semaft-gold' : '' }}">
                                <i class="fa-solid fa-angle-right text-semaft-gold mr-2"></i> Portal Berita
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/aspirasi') }}" class="flex items-center hover:text-semaft-gold transition duration-300 {{ request()->is('aspirasi') ? 'text-semaft-gold' : '' }}">
                                <i class="fa-solid fa-angle-right text-semaft-gold mr-2"></i> Aspirasi
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/kegiatan') }}" class="flex items-center hover:text-semaft-gold transition duration-300 {{ request()->is('kegiatan') ? 'text-semaft-gold' : '' }}">
                                <i class="fa-solid fa-angle-right text-semaft-gold mr-2"></i> Kegiatan
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/tentang') }}" class="flex items-center hover:text-semaft-gold transition duration-300 {{ request()->is('tentang') ? 'text-semaft-gold' : '' }}">
                                <i class="fa-solid fa-angle-right text-semaft-gold mr-2"></i> Profil
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-4 border-b border-gray-600 pb-2 inline-block">Layanan Humas</h3>
                    <p class="text-sm mb-4">Punya pertanyaan atau ingin menyampaikan aspirasi secara langsung? Hubungi Humas kami:</p>
                    <ul class="space-y-3">
                        <li>
                            <a href="https://wa.me/6281234567890" target="_blank" class="flex items-center justify-center gap-2 bg-green-600 hover:bg-green-500 text-white px-4 py-2.5 rounded-lg transition shadow-md w-full font-bold text-sm">
                                <i class="fa-brands fa-whatsapp text-lg"></i> Hubungi via WhatsApp
                            </a>
                        </li>
                        <li>
                            <a href="mailto:semaft.usb@gmail.com" class="hover:text-semaft-gold transition text-sm flex items-center gap-2 mt-3">
                                <i class="fa-solid fa-envelope text-semaft-gold"></i> semaft.usb@gmail.com
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-4 border-b border-gray-600 pb-2 inline-block">Ikuti & Bagikan</h3>
                    
                    <div class="mb-6">
                        <p class="text-sm mb-3">Media Sosial Resmi:</p>
                        <a href="https://instagram.com/semaft_usby" target="_blank" class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-500 via-pink-500 to-orange-500 text-white px-4 py-2.5 rounded-lg hover:opacity-90 transition shadow-md font-bold text-sm">
                            <i class="fa-brands fa-instagram text-lg"></i> Follow Instagram
                        </a>
                    </div>

                    <div>
                        <p class="text-sm mb-3">Bagikan Website Ini:</p>
                        <div class="flex gap-3">
                            <button onclick="copyToClipboard()" class="w-10 h-10 rounded-full bg-gray-700 hover:bg-semaft-gold hover:text-semaft-navy transition flex items-center justify-center shadow-sm" title="Salin Link Website">
                                <i class="fa-solid fa-link"></i>
                            </button>
                            <a href="https://api.whatsapp.com/send?text=Halo!%20Kunjungi%20Portal%20Resmi%20SEMAFT%20USB%20YPKP%20di%20sini:%20{{ url('/') }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-700 hover:bg-green-500 hover:text-white transition flex items-center justify-center shadow-sm" title="Bagikan ke WhatsApp">
                                <i class="fa-brands fa-whatsapp text-lg"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ url('/') }}&text=Kunjungi%20Portal%20Senat%20Mahasiswa%20Fakultas%20Teknik!" target="_blank" class="w-10 h-10 rounded-full bg-gray-700 hover:bg-blue-400 hover:text-white transition flex items-center justify-center shadow-sm" title="Bagikan ke Twitter/X">
                                <i class="fa-brands fa-x-twitter text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            
            <!-- BAGIAN SPONSOR & PARTNER -->
            <!-- <div class="border-t border-gray-700 pt-8 pb-4 mt-4">
                <p class="text-center text-xs font-bold text-gray-500 uppercase tracking-widest mb-6">Disponsori & Didukung Oleh</p>
                <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16">
                     -->
                    <!-- Sponsor 1: Kahf -->
                    <!-- <a href="#" class="flex items-center justify-center group" title="Kahf - Sponsor Resmi">
                        <img src="{{ asset('images/kahf.png') }}" alt="Kahf" class="h-10 md:h-12 w-auto object-contain grayscale group-hover:grayscale-0 opacity-60 group-hover:opacity-100 transition duration-500">
                    </a> -->

                    <!-- Sponsor 2: FluxWallet (Contoh Text Logo) -->
                    <!-- <a href="#" class="flex items-center justify-center group" title="FluxWallet">
                        <span class="font-extrabold text-2xl text-gray-400 opacity-60 group-hover:opacity-100 group-hover:text-blue-400 transition duration-500 tracking-tighter">Flux<span class="font-light">Wallet</span></span>
                    </a> -->

                    <!-- Sponsor 3: AWS Educate (Contoh Icon Brand) -->
                    <!-- <a href="#" class="flex items-center justify-center group" title="AWS Educate">
                        <i class="fa-brands fa-aws text-4xl text-gray-400 opacity-60 group-hover:opacity-100 group-hover:text-[#FF9900] transition duration-500"></i>
                    </a> -->

                <!-- </div> -->
            </div>
            
            <div class="border-t border-gray-700 pt-6 mt-6 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-400">
                <p>&copy; {{ date('Y') }} Senat Mahasiswa Fakultas Teknik. All rights reserved.</p>
                <p>Designed with by vicnitnizzmt.</p>
            </div>
        </div>
    </footer>

    <script>
        function copyToClipboard() {
            navigator.clipboard.writeText("{{ url('/') }}").then(() => {
                alert("Link website SEMAFT berhasil disalin ke clipboard!");
            }).catch(err => {
                console.error('Gagal menyalin teks: ', err);
            });
        }
    </script>

</body>
</html>