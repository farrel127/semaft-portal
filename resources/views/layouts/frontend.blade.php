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
      x-data="{ open: false }" 
      :class="{'overflow-hidden': open}">

    <header class="fixed top-4 md:top-6 inset-x-0 z-[999] flex flex-col items-center justify-center w-full pointer-events-none">
        <div class="relative w-full max-w-5xl px-4 sm:px-6">
            
            <nav class="pointer-events-auto w-full bg-semaft-navy border border-white/20 rounded-full p-2 flex items-center justify-between shadow-2xl">
                
                <a href="{{ url('/') }}" class="flex items-center gap-3 pl-3 sm:pl-4 group shrink-0">
                    <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" class="h-8 md:h-10 w-auto object-contain">
                    <span class="font-extrabold text-xl tracking-widest text-white">SEMA<span class="text-semaft-gold">FT</span></span>
                </a>
                
                <div class="hidden md:flex items-center gap-2 border border-white/10 rounded-full p-1.5 bg-white/5">
                    <a href="{{ url('/') }}" class="px-6 py-1.5 rounded-full text-sm font-bold transition-all {{ request()->is('/') ? 'bg-semaft-gold text-semaft-navy shadow-md' : 'text-gray-200 hover:text-white hover:bg-white/10' }}">Beranda</a>
                    <a href="{{ url('/tentang') }}" class="px-6 py-1.5 rounded-full text-sm font-semibold transition-all {{ request()->is('tentang') ? 'bg-semaft-gold text-semaft-navy shadow-md' : 'text-gray-200 hover:text-white hover:bg-white/10' }}">Profil</a>
                    <a href="{{ route('frontend.berita') }}" class="px-6 py-1.5 rounded-full text-sm font-semibold transition-all {{ request()->routeIs('frontend.berita') ? 'bg-semaft-gold text-semaft-navy shadow-md' : 'text-gray-200 hover:text-white hover:bg-white/10' }}">Berita</a>
                    <a href="{{ url('/aspirasi') }}" class="px-6 py-1.5 rounded-full text-sm font-semibold transition-all {{ request()->is('aspirasi') ? 'bg-semaft-gold text-semaft-navy shadow-md' : 'text-gray-200 hover:text-white hover:bg-white/10' }}">Aspirasi</a>
                </div>

                <div class="hidden md:block pr-1.5">
                    <a href="{{ route('login') }}" class="flex items-center gap-2 bg-white/10 border border-white/20 text-white font-bold px-6 py-2 rounded-full hover:bg-semaft-gold hover:text-semaft-navy transition-all">
                        <i class="fa-solid fa-right-to-bracket text-sm shrink-0"></i> Login
                    </a>
                </div>

                <div class="md:hidden pr-1.5">
                    <button @click="open = !open" class="w-10 h-10 bg-white/10 border border-white/20 rounded-full flex items-center justify-center text-white focus:outline-none shrink-0">
                        <i class="fa-solid fa-bars text-lg" x-show="!open"></i>
                        <i class="fa-solid fa-xmark text-lg" x-show="open" x-cloak></i>
                    </button>
                </div>
            </nav>
        </div>

        <div x-show="open" x-cloak @click.away="open = false" class="absolute top-20 left-4 right-4 bg-semaft-navy border border-white/20 rounded-3xl shadow-2xl p-4 md:hidden pointer-events-auto">
            <div class="flex flex-col space-y-2">
                <a href="{{ url('/') }}" class="flex items-center gap-4 px-4 py-3.5 rounded-2xl text-white font-bold hover:bg-white/10">
                    <i class="fa-solid fa-house w-5 text-center shrink-0"></i> Beranda
                </a>
                <a href="{{ route('frontend.berita') }}" class="flex items-center gap-4 px-4 py-3.5 rounded-2xl text-white font-bold hover:bg-white/10">
                    <i class="fa-solid fa-newspaper w-5 text-center shrink-0"></i> Portal Berita
                </a>
                <div class="pt-4 mt-2 border-t border-white/20">
                    <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 w-full bg-semaft-gold text-semaft-navy font-extrabold px-4 py-3.5 rounded-2xl shadow-md">
                        <i class="fa-solid fa-right-to-bracket shrink-0"></i> Login Administrator
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow pt-28 md:pt-36 pb-24">
    @yield('content')
    </main>

    <footer class="bg-semaft-navy text-gray-300 pt-16 pb-10 md:pb-20 border-t-[6px] border-semaft-gold mt-auto relative overflow-hidden">
        
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-semaft-gold rounded-full blur-[120px] opacity-20 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 mt-8 md:mt-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10 mb-6 items-start">
                
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
                        Tautan Eksplorasi
                    </h3>
                    
                    <div class="flex flex-col space-y-3">
                        <a href="{{ url('/') }}" class="flex items-center gap-4 bg-white/5 border border-white/10 p-3 rounded-xl hover:bg-semaft-gold hover:text-semaft-navy transition-colors group">
                            <div class="w-8 h-8 shrink-0 rounded-lg bg-white/10 flex items-center justify-center text-semaft-gold group-hover:bg-semaft-navy group-hover:text-white">
                                <i class="fa-solid fa-house text-sm"></i>
                            </div>
                            <span class="text-sm font-bold text-gray-200 group-hover:text-semaft-navy">Beranda</span>
                        </a>
                        <a href="{{ url('/tentang') }}" class="flex items-center gap-4 bg-white/5 border border-white/10 p-3 rounded-xl hover:bg-semaft-gold hover:text-semaft-navy transition-colors group">
                            <div class="w-8 h-8 shrink-0 rounded-lg bg-white/10 flex items-center justify-center text-semaft-gold group-hover:bg-semaft-navy group-hover:text-white">
                                <i class="fa-solid fa-users text-sm"></i>
                            </div>
                            <span class="text-sm font-bold text-gray-200 group-hover:text-semaft-navy">Profil</span>
                        </a>
                        <a href="{{ route('frontend.berita') }}" class="flex items-center gap-4 bg-white/5 border border-white/10 p-3 rounded-xl hover:bg-semaft-gold hover:text-semaft-navy transition-colors group">
                            <div class="w-8 h-8 shrink-0 rounded-lg bg-white/10 flex items-center justify-center text-semaft-gold group-hover:bg-semaft-navy group-hover:text-white">
                                <i class="fa-solid fa-newspaper text-sm"></i>
                            </div>
                            <span class="text-sm font-bold text-gray-200 group-hover:text-semaft-navy">Portal Berita</span>
                        </a>
                        <a href="{{ url('/aspirasi') }}" class="flex items-center gap-4 bg-white/5 border border-white/10 p-3 rounded-xl hover:bg-semaft-gold hover:text-semaft-navy transition-colors group">
                            <div class="w-8 h-8 shrink-0 rounded-lg bg-white/10 flex items-center justify-center text-semaft-gold group-hover:bg-semaft-navy group-hover:text-white">
                                <i class="fa-solid fa-bullhorn text-sm"></i>
                            </div>
                            <span class="text-sm font-bold text-gray-200 group-hover:text-semaft-navy">Suarakan Aspirasi</span>
                        </a>
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
                        <a href="https://instagram.com/semaft_usby" target="_blank" class="flex items-center gap-3 bg-semaft-navy border border-pink-500 px-5 py-3 rounded-xl hover:bg-pink-600 transition-colors">
                            <i class="fa-brands fa-instagram text-xl text-white shrink-0"></i>
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
            
            <div class="border-t border-white/10 pt-2 !mt-20 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-400 font-medium">
                <p>&copy; {{ date('Y') }} Senat Mahasiswa Fakultas Teknik USB YPKP.</p>
                <p>Designed with by vicnitnizzmt</p>
            </div>
        </div>
    </footer>
</body>
</html>