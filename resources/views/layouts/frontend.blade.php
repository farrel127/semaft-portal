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

    <header class="fixed top-6 inset-x-0 z-50 flex flex-col items-center justify-center w-full pointer-events-none">
        
        <div class="relative w-full max-w-5xl px-4 sm:px-6">
            
            <nav class="pointer-events-auto w-full bg-semaft-navy/95 backdrop-blur-lg border border-white/30 rounded-full p-2 flex items-center justify-between shadow-[0_8px_30px_rgb(0,0,0,0.3)]">
                
                <a href="{{ url('/') }}" class="flex items-center gap-3 pl-3 sm:pl-4 group shrink-0">
                    <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" class="h-8 md:h-10 w-auto object-contain drop-shadow-md group-hover:scale-105 transition-transform">
                    <span class="font-extrabold text-xl tracking-widest text-white group-hover:text-semaft-gold transition-colors">SEMA<span class="text-semaft-gold">FT</span></span>
                </a>
                
                <div class="hidden md:flex items-center gap-2 border border-white/20 rounded-full p-1.5 bg-white/5 shadow-inner">
                    <a href="{{ url('/') }}" class="px-6 py-1.5 rounded-full text-sm font-bold transition-all {{ request()->is('/') ? 'bg-semaft-gold text-semaft-navy shadow-md' : 'text-gray-200 hover:text-white hover:bg-white/10' }}">Beranda</a>
                    <a href="{{ url('/tentang') }}" class="px-6 py-1.5 rounded-full text-sm font-semibold transition-all {{ request()->is('tentang') ? 'bg-semaft-gold text-semaft-navy shadow-md' : 'text-gray-200 hover:text-white hover:bg-white/10' }}">Profil</a>
                    <a href="{{ route('frontend.berita') }}" class="px-6 py-1.5 rounded-full text-sm font-semibold transition-all {{ request()->routeIs('frontend.berita') ? 'bg-semaft-gold text-semaft-navy shadow-md' : 'text-gray-200 hover:text-white hover:bg-white/10' }}">Berita</a>
                    <a href="{{ url('/aspirasi') }}" class="px-6 py-1.5 rounded-full text-sm font-semibold transition-all {{ request()->is('aspirasi') ? 'bg-semaft-gold text-semaft-navy shadow-md' : 'text-gray-200 hover:text-white hover:bg-white/10' }}">Aspirasi</a>
                </div>

                <div class="hidden md:block pr-1.5">
                    <a href="{{ route('login') }}" class="flex items-center gap-2 bg-white/10 border border-white/30 text-white font-bold px-6 py-2 rounded-full hover:bg-semaft-gold hover:text-semaft-navy hover:border-semaft-gold transition-all shadow-sm">
                        <i class="fa-solid fa-right-to-bracket text-sm shrink-0"></i> Login
                    </a>
                </div>

                <div class="md:hidden pr-1.5">
                    <button @click="open = !open" class="w-10 h-10 bg-white/10 border border-white/30 rounded-full flex items-center justify-center text-white hover:bg-semaft-gold hover:text-semaft-navy transition-colors shrink-0">
                        <i class="fa-solid fa-bars text-lg" x-show="!open"></i>
                        <i class="fa-solid fa-xmark text-lg" x-show="open" x-cloak></i>
                    </button>
                </div>
            </nav>

            <div class="hidden md:flex absolute -bottom-11 right-10 pointer-events-auto items-center gap-2 bg-semaft-navy/90 backdrop-blur-md border border-white/30 rounded-full px-5 py-1.5 shadow-sm">
                <span class="w-2 h-2 rounded-full bg-semaft-gold animate-pulse"></span>
                <span class="text-white text-xs font-medium tracking-wide">Senat Mahasiswa Fakultas Teknik USB YPKP Bandung.</span>
            </div>
        </div>

        <div x-show="open" x-cloak @click.away="open = false" class="absolute top-20 left-4 right-4 bg-semaft-navy/95 backdrop-blur-xl border border-white/20 rounded-3xl shadow-2xl p-4 md:hidden pointer-events-auto text-white">
             </div>
    </header>

    <main class="flex-grow pt-32 pb-12">
        @yield('content')
    </main>

    <footer class="bg-semaft-navy text-gray-300 pt-14 pb-6 border-t-[6px] border-semaft-gold mt-auto relative overflow-hidden">

    <!-- Background Effect -->
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-semaft-gold rounded-full blur-[120px] opacity-20 pointer-events-none"></div>

    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- MAIN CONTENT -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 items-start">

            <!-- ABOUT -->
            <div class="flex flex-col h-full">
                <a href="{{ url('/') }}" class="flex items-center gap-3 mb-4 group">
                    <div class="bg-white p-1.5 rounded-xl group-hover:scale-105 transition-transform">
                        <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" class="h-12 w-auto object-contain">
                    </div>

                    <span class="font-extrabold text-2xl tracking-widest text-white">
                        SEMA<span class="text-semaft-gold">FT</span>
                    </span>
                </a>

                <p class="text-sm leading-relaxed text-gray-400">
                    Senat Mahasiswa Fakultas Teknik Universitas Sangga Buana YPKP.
                    Wadah aspirasi dan sinergi untuk membangun mahasiswa teknik yang
                    solid dan inovatif.
                </p>

                <div class="mt-5 flex items-start gap-3 bg-white/5 border border-white/10 rounded-xl p-4">
                    <i class="fa-solid fa-location-dot text-semaft-gold mt-1"></i>
                    <span class="text-sm">
                        Jl. PHH. Mustofa No.68, Cikutra,
                        Cibeunying Kidul, Kota Bandung.
                    </span>
                </div>
            </div>

            <!-- NAVIGATION -->
            <div class="flex flex-col h-full">
                <h3 class="text-white font-bold text-lg mb-6 relative inline-block">
                    Tautan Eksplorasi
                    <span class="absolute -bottom-2 left-0 w-12 h-1 bg-semaft-gold rounded-full"></span>
                </h3>

                <div class="grid grid-cols-2 gap-3">

                    <a href="{{ url('/') }}"
                        class="group flex items-center gap-3 bg-white/5 border border-white/10 p-3 rounded-xl hover:bg-semaft-gold hover:border-semaft-gold transition-all">
                        <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-semaft-gold">
                            <i class="fa-solid fa-house text-sm"></i>
                        </div>
                        <span class="text-xs font-bold">Beranda</span>
                    </a>

                    <a href="{{ url('/tentang') }}"
                        class="group flex items-center gap-3 bg-white/5 border border-white/10 p-3 rounded-xl hover:bg-semaft-gold hover:border-semaft-gold transition-all">
                        <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-semaft-gold">
                            <i class="fa-solid fa-users text-sm"></i>
                        </div>
                        <span class="text-xs font-bold">Profil</span>
                    </a>

                    <a href="{{ route('frontend.berita') }}"
                        class="group flex items-center gap-3 bg-white/5 border border-white/10 p-3 rounded-xl hover:bg-semaft-gold hover:border-semaft-gold transition-all">
                        <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-semaft-gold">
                            <i class="fa-solid fa-newspaper text-sm"></i>
                        </div>
                        <span class="text-xs font-bold">Berita</span>
                    </a>

                    <a href="{{ url('/kegiatan') }}"
                        class="group flex items-center gap-3 bg-white/5 border border-white/10 p-3 rounded-xl hover:bg-semaft-gold hover:border-semaft-gold transition-all">
                        <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-semaft-gold">
                            <i class="fa-regular fa-calendar-check text-sm"></i>
                        </div>
                        <span class="text-xs font-bold">Kegiatan</span>
                    </a>

                    <a href="{{ url('/aspirasi') }}"
                        class="col-span-2 group flex items-center gap-3 bg-white/5 border border-white/10 p-3 rounded-xl hover:bg-semaft-gold hover:border-semaft-gold transition-all">
                        <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-semaft-gold">
                            <i class="fa-solid fa-bullhorn text-sm"></i>
                        </div>

                        <span class="text-xs font-bold">
                            Suarakan Aspirasi Anda
                        </span>
                    </a>

                </div>
            </div>

            <!-- HUMAS -->
            <div class="flex flex-col h-full">
                <h3 class="text-white font-bold text-lg mb-6 relative inline-block">
                    Layanan Humas
                    <span class="absolute -bottom-2 left-0 w-12 h-1 bg-semaft-gold rounded-full"></span>
                </h3>

                <p class="text-sm text-gray-400 mb-5">
                    Punya pertanyaan atau ingin berkolaborasi?
                    Layanan humas kami siap membantu Anda.
                </p>

                <div class="space-y-3">

                    <a href="https://wa.me/6281234567890"
                        target="_blank"
                        class="flex items-center gap-3 bg-[#25D366]/10 border border-[#25D366]/30 text-[#25D366] px-4 py-3 rounded-xl hover:bg-[#25D366] hover:text-white transition-all">
                        <i class="fa-brands fa-whatsapp text-xl"></i>
                        Chat WhatsApp
                    </a>

                    <a href="mailto:semaft.usb@gmail.com"
                        class="flex items-center gap-3 bg-white/5 border border-white/10 px-4 py-3 rounded-xl hover:bg-white hover:text-semaft-navy transition-all">
                        <i class="fa-solid fa-envelope text-semaft-gold"></i>
                        semaft.usb@gmail.com
                    </a>

                </div>
            </div>

            <!-- SOCIAL -->
            <div class="flex flex-col h-full">
                <h3 class="text-white font-bold text-lg mb-6 relative inline-block">
                    Terkoneksi
                    <span class="absolute -bottom-2 left-0 w-12 h-1 bg-semaft-gold rounded-full"></span>
                </h3>

                <a href="https://instagram.com/semaft_usby"
                    target="_blank"
                    class="flex items-center gap-3 bg-white/5 border border-white/10 p-4 rounded-xl hover:border-semaft-gold transition-all mb-6">

                    <i class="fa-brands fa-instagram text-xl text-white"></i>

                    <span class="font-bold text-white">
                        @semaft_usby
                    </span>
                </a>

                <p class="text-xs text-gray-400 uppercase tracking-widest mb-3">
                    Bagikan Portal Ini
                </p>

                <div class="flex gap-3">

                    <button onclick="copyToClipboard()"
                        class="w-11 h-11 rounded-full bg-white/10 border border-white/10 flex items-center justify-center hover:bg-semaft-gold hover:text-semaft-navy transition-all">
                        <i class="fa-solid fa-link"></i>
                    </button>

                    <a href="https://api.whatsapp.com/send?text={{ url('/') }}"
                        target="_blank"
                        class="w-11 h-11 rounded-full bg-white/10 border border-white/10 flex items-center justify-center hover:bg-[#25D366] hover:text-white transition-all">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>

                    <a href="https://twitter.com/intent/tweet?url={{ url('/') }}"
                        target="_blank"
                        class="w-11 h-11 rounded-full bg-white/10 border border-white/10 flex items-center justify-center hover:bg-black hover:text-white transition-all">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>

                </div>
            </div>

        </div>

        <!-- SPONSOR -->
        <div class="border-t border-white/10 py-6 mt-8">

            <p class="text-center text-xs font-bold text-gray-500 uppercase tracking-widest mb-6">
                Disponsori & Didukung Oleh
            </p>

            <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12">

                <img src="{{ asset('images/kahf.png') }}"
                    alt="Kahf"
                    class="h-10 opacity-50 hover:opacity-100 transition-all">

                <span class="text-2xl font-bold text-gray-500 opacity-60">
                    FluxWallet
                </span>

                <i class="fa-brands fa-aws text-4xl text-gray-500 opacity-60"></i>

            </div>

        </div>

        <!-- COPYRIGHT -->
        <div class="border-t border-white/10 pt-5 mt-5 flex flex-col md:flex-row justify-between items-center gap-3 text-xs text-gray-500">

            <p>
                &copy; {{ date('Y') }}
                Senat Mahasiswa Fakultas Teknik USB YPKP.
                All rights reserved.
            </p>

            <p>
                Designed by
                <span class="font-bold text-white">
                    vicnitnizzmt
                </span>
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