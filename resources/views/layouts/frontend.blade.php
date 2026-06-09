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
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased flex flex-col min-h-screen selection:bg-semaft-gold selection:text-white">

    <header x-data="{ open: false }" 
            x-effect="document.body.classList.toggle('overflow-hidden', open)"
            class="fixed top-0 left-0 w-full z-50 bg-semaft-navy shadow-lg text-white">
        
        <div class="hidden md:flex w-full px-6 py-2 items-center justify-between text-xs tracking-widest border-b border-white/20">
            <div class="flex items-center gap-3">
                <span class="w-2 h-2 rounded-full bg-semaft-gold animate-pulse"></span>
                <span class="uppercase font-semibold">Senat Mahasiswa Fakultas Teknik USB YPKP Bandung</span>
            </div>
            <div class="flex items-center gap-2 text-gray-200">
                <i class="fa-solid fa-building-columns"></i> Portal Navigasi Resmi
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-b border-white/10">
            <div class="flex justify-between items-center h-20">
                
                <div class="flex-shrink-0 flex items-center relative z-50 h-full py-2">
                    <a href="{{ url('/') }}" class="flex items-center gap-4 group h-full">
                        <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" 
                             class="h-14 w-auto object-contain drop-shadow-md group-hover:scale-105 transition-transform duration-300">
                        
                        <div class="flex flex-col justify-center border-l border-white/30 pl-4">
                            <span class="font-extrabold text-xl tracking-widest leading-none">SEMA FT</span>
                            <span class="text-[10px] font-bold text-semaft-gold tracking-[0.2em] uppercase mt-1.5">Portal Resmi</span>
                        </div>
                    </a>
                </div>

                <div class="flex items-center relative z-50">
                    <button @click="open = !open" 
                            class="flex items-center justify-center w-12 h-12 rounded-full border border-white/30 bg-transparent hover:bg-white/10 transition-all duration-300 focus:outline-none">
                        <i class="fa-solid fa-bars text-lg" x-show="!open"></i>
                        <i class="fa-solid fa-xmark text-xl text-semaft-gold" x-show="open" x-cloak></i>
                    </button>
                </div>
            </div>
        </div>

        <div x-show="open" 
             x-cloak
             class="fixed inset-0 h-screen w-screen z-30 bg-black/70 backdrop-blur-sm"
             x-transition.opacity.duration.300ms
             @click="open = false">
        </div>

        <div x-show="open" 
             x-cloak
             class="fixed top-0 right-0 h-screen w-full sm:w-[400px] bg-white shadow-2xl z-40 flex flex-col pt-28 pb-10 px-8 transform transition-transform duration-500 overflow-y-auto text-gray-800"
             x-transition:enter="transition transform duration-500"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition transform duration-500"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full">
            
            <p class="text-gray-400 font-bold text-[10px] tracking-[0.25em] uppercase mb-6 flex items-center gap-3">
                <span class="w-8 h-[1px] bg-gray-300"></span> Menu Utama
            </p>

            <nav class="flex flex-col space-y-2">
                <a href="{{ url('/') }}" class="group flex items-center justify-between p-4 rounded-xl hover:bg-blue-50 transition-colors duration-300">
                    <span class="text-xl font-extrabold group-hover:text-semaft-navy transition-colors">Beranda</span>
                    <i class="fa-solid fa-chevron-right text-gray-300 group-hover:text-semaft-gold group-hover:translate-x-1 transition-all"></i>
                </a>

                <a href="{{ route('frontend.berita') }}" class="group flex items-center justify-between p-4 rounded-xl hover:bg-blue-50 transition-colors duration-300">
                    <span class="text-xl font-extrabold group-hover:text-semaft-navy transition-colors">Portal Berita</span>
                    <i class="fa-solid fa-chevron-right text-gray-300 group-hover:text-semaft-gold group-hover:translate-x-1 transition-all"></i>
                </a>

                <a href="#" class="group flex items-center justify-between p-4 rounded-xl hover:bg-blue-50 transition-colors duration-300">
                    <span class="text-xl font-extrabold group-hover:text-semaft-navy transition-colors">Agenda Kegiatan</span>
                    <i class="fa-solid fa-chevron-right text-gray-300 group-hover:text-semaft-gold group-hover:translate-x-1 transition-all"></i>
                </a>
            </nav>

            <div class="mt-auto pt-10">
                <a href="{{ route('login') }}" class="flex items-center justify-center w-full px-6 py-4 rounded-xl bg-semaft-navy text-white font-bold text-sm hover:bg-blue-900 transition-colors group">
                    <i class="fa-solid fa-shield-halved mr-2 group-hover:text-semaft-gold transition-colors"></i> Portal Administrator
                </a>
            </div>
        </div>
    </header>

    <main class="pt-32 flex-grow">
        @yield('content')
    </main>

    <footer class="bg-semaft-navy text-gray-300 py-6 mt-auto border-t border-white/20">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4 text-xs tracking-wide">
            <div>
                &copy; {{ date('Y') }} Senat Mahasiswa Fakultas Teknik. All rights reserved.
            </div>
            <div class="flex items-center gap-1.5 opacity-80 hover:opacity-100 transition-opacity">
                Designed with <i class="fa-solid fa-heart text-red-500"></i> by <span class="font-bold text-white tracking-wider">vicnitnizzmt</span>.
            </div>
        </div>
    </footer>

</body>
</html>