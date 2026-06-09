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
        [x-cloak] { display: none !important; }
        /* Scrollbar kustom yang elegan */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f8fafc; }
        ::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #64748b; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased flex flex-col min-h-screen selection:bg-semaft-gold selection:text-semaft-navy" x-data="{ open: false }" :class="{'overflow-hidden': open}">

    <header class="fixed top-4 inset-x-0 z-50 flex justify-center px-4 pointer-events-none transition-all duration-300">
        
        <nav class="pointer-events-auto w-full max-w-6xl bg-semaft-navy/90 backdrop-blur-lg border border-white/10 rounded-full shadow-[0_8px_30px_rgb(0,0,0,0.12)] px-3 py-2.5 flex items-center justify-between">
            
            <a href="{{ url('/') }}" class="flex items-center gap-3 pl-3 group">
                <div class="bg-white/10 p-1.5 rounded-full group-hover:bg-white/20 transition duration-300">
                    <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" class="h-8 w-auto object-contain drop-shadow-md group-hover:scale-110 transition-transform duration-300">
                </div>
                <span class="font-extrabold text-xl tracking-widest text-white group-hover:text-semaft-gold transition-colors duration-300">SEMA<span class="text-semaft-gold">FT</span></span>
            </a>
            
            <div class="hidden md:flex items-center gap-1 bg-white/5 rounded-full p-1 border border-white/5">
                <a href="{{ url('/') }}" class="px-5 py-2 rounded-full text-sm font-semibold transition-all duration-300 {{ request()->is('/') ? 'bg-semaft-gold text-semaft-navy shadow-md' : 'text-gray-300 hover:text-white hover:bg-white/10' }}">Beranda</a>
                
                <a href="{{ url('/tentang') }}" class="px-5 py-2 rounded-full text-sm font-semibold transition-all duration-300 {{ request()->is('tentang') ? 'bg-semaft-gold text-semaft-navy shadow-md' : 'text-gray-300 hover:text-white hover:bg-white/10' }}">Profil</a>
                
                <a href="{{ route('frontend.berita') }}" class="px-5 py-2 rounded-full text-sm font-semibold transition-all duration-300 {{ request()->routeIs('frontend.berita') ? 'bg-semaft-gold text-semaft-navy shadow-md' : 'text-gray-300 hover:text-white hover:bg-white/10' }}">Berita</a>
                
                <a href="{{ url('/aspirasi') }}" class="px-5 py-2 rounded-full text-sm font-semibold transition-all duration-300 {{ request()->is('aspirasi') ? 'bg-semaft-gold text-semaft-navy shadow-md' : 'text-gray-300 hover:text-white hover:bg-white/10' }}">Aspirasi</a>
            </div>

            <div class="hidden md:block pr-1">
                @auth
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 bg-gradient-to-r from-semaft-gold to-yellow-500 text-semaft-navy font-bold px-6 py-2 rounded-full hover:shadow-[0_0_15px_rgba(255,215,0,0.5)] transform hover:-translate-y-0.5 transition-all duration-300">
                        <i class="fa-solid fa-table-columns text-sm"></i> Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="flex items-center gap-2 bg-white/10 text-white border border-white/20 font-bold px-6 py-2 rounded-full hover:bg-semaft-gold hover:text-semaft-navy hover:border-semaft-gold transform hover:-translate-y-0.5 transition-all duration-300">
                        <i class="fa-solid fa-right-to-bracket text-sm"></i> Login
                    </a>
                @endauth
            </div>

            <div class="md:hidden pr-2">
                <button @click="open = !open" class="w-10 h-10 bg-white/10 border border-white/20 rounded-full flex items-center justify-center text-white hover:bg-semaft-gold hover:text-semaft-navy transition-colors focus:outline-none focus:ring-2 focus:ring-semaft-gold">
                    <i class="fa-solid fa-bars text-lg" x-show="!open"></i>
                    <i class="fa-solid fa-xmark text-lg" x-show="open" x-cloak></i>
                </button>
            </div>
            
        </nav>

        <div x-show="open" 
             x-cloak
             @click.away="open = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="absolute top-20 left-4 right-4 bg-semaft-navy/95 backdrop-blur-xl border border-white/10 rounded-3xl shadow-2xl p-4 md:hidden pointer-events-auto">
            
            <div class="flex flex-col space-y-2">
                <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-white hover:bg-white/10 transition-colors {{ request()->is('/') ? 'bg-semaft-gold/20 text-semaft-gold border border-semaft-gold/30' : '' }}">
                    <i class="fa-solid fa-house w-5 text-center"></i> Beranda
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-white hover:bg-white/10 transition-colors">
                    <i class="fa-solid fa-users w-5 text-center"></i> Profil
                </a>
                <a href="{{ route('frontend.berita') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-white hover:bg-white/10 transition-colors {{ request()->routeIs('frontend.berita') ? 'bg-semaft-gold/20 text-semaft-gold border border-semaft-gold/30' : '' }}">
                    <i class="fa-solid fa-newspaper w-5 text-center"></i> Portal Berita
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-white hover:bg-white/10 transition-colors">
                    <i class="fa-solid fa-bullhorn w-5 text-center"></i> Aspirasi
                </a>
                
                <div class="pt-4 mt-2 border-t border-white/10">
                    <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 w-full bg-semaft-gold text-semaft-navy font-bold px-4 py-3 rounded-xl shadow-md">
                        <i class="fa-solid fa-right-to-bracket"></i> Login Administrator
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow pt-32 pb-12">
        @yield('content')
    </main>

    <footer class="bg-semaft-navy text-gray-300 pt-16 pb-8 border-t-[6px] border-semaft-gold mt-auto relative overflow-hidden">
        
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-semaft-gold rounded-full blur-[120px] opacity-20 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                
                <div class="space-y-5">
                    <a href="{{ url('/') }}" class="flex items-center gap-3 mb-4 group">
                        <div class="bg-white p-1.5 rounded-xl group-hover:scale-105 transition-transform">
                            <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" class="h-12 w-auto object-contain">
                        </div>
                        <span class="font-extrabold text-2xl tracking-widest text-white">SEMA<span class="text-semaft-gold">FT</span></span>
                    </a>
                    <p class="text-sm leading-relaxed text-gray-400">
                        Senat Mahasiswa Fakultas Teknik Universitas Sangga Buana YPKP. Wadah aspirasi dan sinergi untuk membangun mahasiswa teknik yang solid dan inovatif.
                    </p>
                    <div class="flex items-start gap-3 text-sm text-gray-300 mt-4 bg-white/5 p-3 rounded-xl border border-white/5">
                        <i class="fa-solid fa-location-dot text-semaft-gold mt-1"></i> 
                        <span>Jl. PHH. Mustofa No.68, Cikutra, Cibeunying Kidul, Kota Bandung.</span>
                    </div>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-6 relative inline-block">
                        Tautan Eksplorasi
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-semaft-gold rounded-full"></span>
                    </h3>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <a href="{{ url('/') }}" class="group flex items-center gap-3 bg-white/5 border border-white/10 p-3 rounded-xl hover:bg-semaft-gold hover:border-semaft-gold transition-all duration-300 shadow-sm hover:shadow-[0_4px_15px_rgba(255,215,0,0.2)] transform hover:-translate-y-1">
                            <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-semaft-gold group-hover:bg-white/20 group-hover:text-semaft-navy transition-colors">
                                <i class="fa-solid fa-house text-sm"></i>
                            </div>
                            <span class="text-xs font-bold text-gray-300 group-hover:text-semaft-navy transition-colors">Beranda</span>
                        </a>
                        <a href="{{ url('/tentang') }}" class="group flex items-center gap-3 bg-white/5 border border-white/10 p-3 rounded-xl hover:bg-semaft-gold hover:border-semaft-gold transition-all duration-300 shadow-sm hover:shadow-[0_4px_15px_rgba(255,215,0,0.2)] transform hover:-translate-y-1">
                            <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-semaft-gold group-hover:bg-white/20 group-hover:text-semaft-navy transition-colors">
                                <i class="fa-solid fa-users text-sm"></i>
                            </div>
                            <span class="text-xs font-bold text-gray-300 group-hover:text-semaft-navy transition-colors">Profil</span>
                        </a>
                        <a href="{{ route('frontend.berita') }}" class="group flex items-center gap-3 bg-white/5 border border-white/10 p-3 rounded-xl hover:bg-semaft-gold hover:border-semaft-gold transition-all duration-300 shadow-sm hover:shadow-[0_4px_15px_rgba(255,215,0,0.2)] transform hover:-translate-y-1">
                            <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-semaft-gold group-hover:bg-white/20 group-hover:text-semaft-navy transition-colors">
                                <i class="fa-solid fa-newspaper text-sm"></i>
                            </div>
                            <span class="text-xs font-bold text-gray-300 group-hover:text-semaft-navy transition-colors">Berita</span>
                        </a>
                        <a href="{{ url('/kegiatan') }}" class="group flex items-center gap-3 bg-white/5 border border-white/10 p-3 rounded-xl hover:bg-semaft-gold hover:border-semaft-gold transition-all duration-300 shadow-sm hover:shadow-[0_4px_15px_rgba(255,215,0,0.2)] transform hover:-translate-y-1">
                            <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-semaft-gold group-hover:bg-white/20 group-hover:text-semaft-navy transition-colors">
                                <i class="fa-regular fa-calendar-check text-sm"></i>
                            </div>
                            <span class="text-xs font-bold text-gray-300 group-hover:text-semaft-navy transition-colors">Kegiatan</span>
                        </a>
                        <a href="{{ url('/aspirasi') }}" class="col-span-2 group flex items-center gap-3 bg-white/5 border border-white/10 p-3 rounded-xl hover:bg-semaft-gold hover:border-semaft-gold transition-all duration-300 shadow-sm hover:shadow-[0_4px_15px_rgba(255,215,0,0.2)] transform hover:-translate-y-1">
                            <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-semaft-gold group-hover:bg-white/20 group-hover:text-semaft-navy transition-colors">
                                <i class="fa-solid fa-bullhorn text-sm"></i>
                            </div>
                            <span class="text-xs font-bold text-gray-300 group-hover:text-semaft-navy transition-colors">Suarakan Aspirasi Anda</span>
                            <i class="fa-solid fa-arrow-right ml-auto text-gray-500 group-hover:text-semaft-navy opacity-0 group-hover:opacity-100 transition-opacity"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-6 relative inline-block">
                        Layanan Humas
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-semaft-gold rounded-full"></span>
                    </h3>
                    <p class="text-sm text-gray-400 mb-5 leading-relaxed">Punya pertanyaan atau ingin berkolaborasi? Layanan humas kami siap membantu Anda.</p>
                    
                    <div class="space-y-3">
                        <a href="https://wa.me/6281234567890" target="_blank" class="group flex items-center gap-3 bg-[#25D366]/10 border border-[#25D366]/30 text-[#25D366] hover:bg-[#25D366] hover:text-white px-4 py-3 rounded-xl transition-all duration-300 font-bold text-sm w-full shadow-sm hover:shadow-[0_4px_15px_rgba(37,211,102,0.3)] transform hover:-translate-y-1">
                            <i class="fa-brands fa-whatsapp text-xl group-hover:animate-bounce"></i> Chat WhatsApp
                        </a>
                        <a href="mailto:semaft.usb@gmail.com" class="group flex items-center gap-3 bg-white/5 border border-white/10 text-gray-300 hover:bg-white hover:text-semaft-navy px-4 py-3 rounded-xl transition-all duration-300 text-sm w-full shadow-sm transform hover:-translate-y-1">
                            <i class="fa-solid fa-envelope text-semaft-gold group-hover:text-semaft-navy transition-colors"></i> semaft.usb@gmail.com
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-6 relative inline-block">
                        Terkoneksi
                        <span class="absolute -bottom-2 left-0 w-12 h-1 bg-semaft-gold rounded-full"></span>
                    </h3>
                    
                    <div class="mb-6">
                        <a href="https://instagram.com/semaft_usby" target="_blank" class="group flex items-center gap-3 bg-gradient-to-r from-[#833ab4] via-[#fd1d1d] to-[#fcb045] p-[1px] rounded-xl transition-transform hover:-translate-y-1 hover:shadow-[0_4px_15px_rgba(253,29,29,0.3)] block">
                            <div class="flex items-center gap-3 bg-semaft-navy px-4 py-2.5 rounded-xl w-full h-full group-hover:bg-transparent transition-colors duration-300">
                                <i class="fa-brands fa-instagram text-xl text-white"></i>
                                <span class="font-bold text-sm text-white">@semaft_usby</span>
                            </div>
                        </a>
                    </div>

                    <div>
                        <p class="text-xs text-gray-400 mb-3 font-semibold tracking-wider uppercase">Bagikan Portal Ini</p>
                        <div class="flex gap-3">
                            <button onclick="copyToClipboard()" class="w-11 h-11 rounded-full bg-white/10 border border-white/10 hover:bg-semaft-gold hover:text-semaft-navy hover:border-semaft-gold transition-all duration-300 flex items-center justify-center shadow-sm transform hover:-translate-y-1" title="Salin Link Website">
                                <i class="fa-solid fa-link"></i>
                            </button>
                            <a href="https://api.whatsapp.com/send?text=Halo!%20Kunjungi%20Portal%20Resmi%20SEMAFT%20USB%20YPKP%20di%20sini:%20{{ url('/') }}" target="_blank" class="w-11 h-11 rounded-full bg-white/10 border border-white/10 hover:bg-[#25D366] hover:text-white hover:border-[#25D366] transition-all duration-300 flex items-center justify-center shadow-sm transform hover:-translate-y-1" title="Bagikan ke WhatsApp">
                                <i class="fa-brands fa-whatsapp text-lg"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ url('/') }}&text=Kunjungi%20Portal%20Senat%20Mahasiswa%20Fakultas%20Teknik!" target="_blank" class="w-11 h-11 rounded-full bg-white/10 border border-white/10 hover:bg-[#000000] hover:text-white hover:border-gray-700 transition-all duration-300 flex items-center justify-center shadow-sm transform hover:-translate-y-1" title="Bagikan ke Twitter/X">
                                <i class="fa-brands fa-x-twitter text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="border-t border-white/10 pt-8 pb-4 mt-8">
                <p class="text-center text-xs font-bold text-gray-500 uppercase tracking-widest mb-6">Disponsori & Didukung Oleh</p>
                <div class="flex flex-wrap justify-center items-center gap-10 md:gap-16">
                    
                    <a href="#" class="flex items-center justify-center group" title="Kahf - Sponsor Resmi">
                        <img src="{{ asset('images/kahf.png') }}" alt="Kahf" class="h-10 md:h-12 w-auto object-contain grayscale opacity-40 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500 hover:scale-105">
                    </a>

                    <a href="#" class="flex items-center justify-center group" title="FluxWallet">
                        <span class="font-extrabold text-2xl text-gray-500 opacity-50 group-hover:opacity-100 group-hover:text-blue-400 transition-all duration-500 tracking-tighter hover:scale-105">Flux<span class="font-light">Wallet</span></span>
                    </a>

                    <a href="#" class="flex items-center justify-center group" title="AWS Educate">
                        <i class="fa-brands fa-aws text-4xl text-gray-500 opacity-50 group-hover:opacity-100 group-hover:text-[#FF9900] transition-all duration-500 hover:scale-105"></i>
                    </a>

                </div>
            </div>
            
            <div class="border-t border-white/10 pt-6 mt-6 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500 font-medium">
                <p>&copy; {{ date('Y') }} Senat Mahasiswa Fakultas Teknik USB YPKP. All rights reserved.</p>
                <p class="flex items-center gap-1.5 hover:text-gray-300 transition-colors">
                    Designed with by <span class="font-bold text-white tracking-wider">vicnitnizzmt</span>.
                </p>
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