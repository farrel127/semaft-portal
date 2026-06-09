<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEMAFT - @yield('title', 'Senat Mahasiswa Fakultas Teknik')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" href="{{ asset('images/sema.png') }}?v=3" type="image/png">
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased flex flex-col min-h-screen">

    <!-- Navbar Global dengan Hamburger Menu Kreatif -->
    <nav class="bg-semaft-navy text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" 
                         class="h-10 w-auto object-contain drop-shadow-md transition-transform group-hover:scale-110 duration-300">
                    <span class="font-bold text-2xl tracking-widest text-semaft-gold">SEMAFT</span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8 font-medium">
                    <a href="{{ url('/') }}" 
                       class="hover:text-semaft-gold transition-all duration-300 relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:bg-semaft-gold after:w-0 hover:after:w-full {{ request()->is('/') ? 'text-semaft-gold' : '' }}">
                        Beranda
                    </a>
                    <a href="#" 
                       class="hover:text-semaft-gold transition-all duration-300 relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:bg-semaft-gold after:w-0 hover:after:w-full">
                        Profil
                    </a>
                    <a href="{{ route('frontend.berita') }}" 
                       class="hover:text-semaft-gold transition-all duration-300 relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:bg-semaft-gold after:w-0 hover:after:w-full {{ request()->routeIs('frontend.berita') ? 'text-semaft-gold' : '' }}">
                        Berita
                    </a>
                    <a href="#" 
                       class="hover:text-semaft-gold transition-all duration-300 relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:bg-semaft-gold after:w-0 hover:after:w-full">
                        Aspirasi
                    </a>
                </div>

                <!-- Right Side: Auth + Hamburger -->
                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ route('dashboard') }}" 
                           class="hidden sm:block bg-semaft-gold text-semaft-navy font-bold px-6 py-2.5 rounded-xl hover:bg-yellow-400 transition-all shadow-md hover:shadow-xl">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="hidden sm:block bg-semaft-gold text-semaft-navy font-bold px-6 py-2.5 rounded-xl hover:bg-yellow-400 transition-all shadow-md hover:shadow-xl">
                            Login Portal
                        </a>
                    @endauth

                    <!-- Hamburger Button (Creative) -->
                    <button id="hamburger" 
                            class="md:hidden w-11 h-11 flex items-center justify-center focus:outline-none group">
                        <div class="space-y-1.5 transition-all duration-300">
                            <span id="bar1" 
                                  class="block w-6 h-0.5 bg-white rounded transition-all duration-300 group-active:scale-110"></span>
                            <span id="bar2" 
                                  class="block w-6 h-0.5 bg-white rounded transition-all duration-300 group-active:scale-110"></span>
                            <span id="bar3" 
                                  class="block w-6 h-0.5 bg-white rounded transition-all duration-300 group-active:scale-110"></span>
                        </div>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (Slide Down + Creative) -->
        <div id="mobileMenu" 
             class="hidden md:hidden bg-semaft-navy border-t border-semaft-gold/30 shadow-xl max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
            <div class="px-6 py-8 space-y-6 text-lg">
                <a href="{{ url('/') }}" 
                   class="flex items-center gap-4 text-white hover:text-semaft-gold transition-all py-3 border-b border-gray-700/50">
                    <i class="fa-solid fa-house w-6"></i>
                    <span>Beranda</span>
                </a>
                <a href="#" 
                   class="flex items-center gap-4 text-white hover:text-semaft-gold transition-all py-3 border-b border-gray-700/50">
                    <i class="fa-solid fa-user-graduate w-6"></i>
                    <span>Profil</span>
                </a>
                <a href="{{ route('frontend.berita') }}" 
                   class="flex items-center gap-4 text-white hover:text-semaft-gold transition-all py-3 border-b border-gray-700/50">
                    <i class="fa-solid fa-newspaper w-6"></i>
                    <span>Berita</span>
                </a>
                <a href="#" 
                   class="flex items-center gap-4 text-white hover:text-semaft-gold transition-all py-3 border-b border-gray-700/50">
                    <i class="fa-solid fa-lightbulb w-6"></i>
                    <span>Aspirasi</span>
                </a>

                <!-- Auth Button di Mobile -->
                <div class="pt-6">
                    @auth
                        <a href="{{ route('dashboard') }}" 
                           class="block text-center bg-semaft-gold text-semaft-navy font-bold py-4 rounded-2xl hover:bg-yellow-400 transition-all shadow-lg">
                            Masuk ke Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="block text-center bg-semaft-gold text-semaft-navy font-bold py-4 rounded-2xl hover:bg-yellow-400 transition-all shadow-lg">
                            Login Portal Mahasiswa
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Dinamis -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer tetap sama (disingkat untuk kebersihan) -->
    <!-- <footer class="bg-semaft-navy text-gray-300 py-12 border-t-4 border-semaft-gold mt-auto"> -->
        <!-- ... (Footer kode Anda tetap sama) ... -->
        <!-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> -->
            <!-- Isi footer Anda di sini (sama seperti sebelumnya) -->
            <!-- @include('partials.footer-content') Saran: pisahkan footer jika terlalu panjang -->
        <!-- </div> -->
    <!-- </footer> -->

    <script>
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');
        const bar1 = document.getElementById('bar1');
        const bar2 = document.getElementById('bar2');
        const bar3 = document.getElementById('bar3');

        let isOpen = false;

        hamburger.addEventListener('click', () => {
            isOpen = !isOpen;

            if (isOpen) {
                mobileMenu.classList.remove('hidden');
                setTimeout(() => {
                    mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
                }, 10);

                // Transform ke X (Close Icon)
                bar1.style.transform = 'rotate(45deg) translate(5px, 5px)';
                bar2.style.opacity = '0';
                bar3.style.transform = 'rotate(-45deg) translate(6px, -6px)';
            } else {
                mobileMenu.style.maxHeight = '0px';
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 400);

                // Kembali ke Hamburger
                bar1.style.transform = 'none';
                bar2.style.opacity = '1';
                bar3.style.transform = 'none';
            }
        });

        // Close menu jika klik link (opsional)
        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', () => {
                if (isOpen) hamburger.click();
            });
        });
    </script>

</body>
</html>