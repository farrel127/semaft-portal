<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - SEMAFT</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    {!! NoCaptcha::renderJs() !!}

    <style>
        /* Mengatur autofill bawaan browser agar background tidak berubah warna */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active{
            -webkit-box-shadow: 0 0 0 30px white inset !important;
        }
        /* Skala reCAPTCHA untuk HP */
        @media (max-width: 400px) {
            .recaptcha-wrapper { transform: scale(0.85); transform-origin: 0 0; }
        }
    </style>
</head>
<body class="font-sans antialiased bg-white min-h-screen flex selection:bg-semaft-navy selection:text-white">

    <div class="flex flex-col md:flex-row w-full min-h-screen">
        
        <div class="relative w-full md:w-5/12 bg-semaft-navy flex flex-col justify-center items-center p-10 md:p-12 text-white min-h-[35vh] md:min-h-screen z-10">
            
            <div class="text-center max-w-sm relative z-20">
                <h1 class="text-2xl md:text-3xl font-medium mb-6">Selamat Datang di</h1>
                
                <a href="{{ url('/') }}" class="inline-block bg-white p-4 rounded-full shadow-lg mb-6 group">
                    <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" class="h-16 md:h-20 w-auto group-hover:scale-105 transition-transform duration-300">
                </a>
                
                <h2 class="text-3xl md:text-4xl font-extrabold tracking-wider mb-4">SEMA FT</h2>
                <p class="text-sm md:text-base text-gray-300 font-light leading-relaxed">
                    Portal Administrasi Senat Mahasiswa Fakultas Teknik. Masuk untuk mengelola berita, agenda, dan informasi fakultas.
                </p>
            </div>

            <div class="hidden md:block absolute top-0 -right-[40px] h-full w-[45px] z-10">
                <svg viewBox="0 0 100 1000" preserveAspectRatio="none" class="h-full w-full text-white fill-current">
                    <path d="M0,0 C60,50 100,100 20,200 C-30,300 80,400 40,500 C0,600 90,700 20,800 C-40,900 60,950 0,1000 L0,1000 L100,1000 L100,0 Z"></path>
                </svg>
            </div>

            <div class="block md:hidden absolute -bottom-[20px] left-0 w-full h-[40px] z-10 overflow-hidden">
                <svg viewBox="0 0 1000 100" preserveAspectRatio="none" class="h-full w-full text-white fill-current transform scale-y-[-1]">
                    <path d="M0,0 C150,80 250,-20 500,50 C750,120 850,20 1000,80 L1000,100 L0,100 Z"></path>
                </svg>
            </div>
        </div>

        <div class="w-full md:w-7/12 flex items-center justify-center p-8 sm:p-12 md:pl-20 relative z-20">
            <div class="w-full max-w-md">
                
                <div class="mb-10 text-center md:text-left">
                    <h3 class="text-3xl font-extrabold text-gray-900">Masuk ke Akun</h3>
                    <p class="text-gray-500 mt-2 font-medium">Silakan masukkan kredensial Anda</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-8">
                    @csrf

                    <div class="relative">
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-1">Email Administrator</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                            class="block w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-semaft-navy px-0 py-2.5 text-gray-900 bg-transparent transition-colors text-base"
                            placeholder="Ketik email Anda di sini...">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm" />
                    </div>

                    <div class="relative">
                        <label for="password" class="block text-sm font-bold text-gray-700 mb-1">Kata Sandi</label>
                        <div class="relative flex items-center">
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                class="block w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-semaft-navy px-0 py-2.5 text-gray-900 bg-transparent transition-colors text-base pr-10"
                                placeholder="Ketik sandi Anda di sini...">
                            
                            <button type="button" onclick="togglePassword()" class="absolute right-0 text-gray-400 hover:text-semaft-navy focus:outline-none transition-colors pb-1">
                                <i id="eye-icon" class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm" />
                    </div>

                    <div class="flex items-center justify-between pt-2">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                            <input id="remember_me" type="checkbox" name="remember" 
                                class="rounded border-gray-300 text-semaft-navy focus:ring-semaft-navy w-4 h-4 cursor-pointer">
                            <span class="ml-2 text-sm text-gray-500 font-medium group-hover:text-semaft-navy transition-colors">Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm font-bold text-semaft-gold hover:text-yellow-600 transition-colors" href="{{ route('password.request') }}">
                                Lupa sandi?
                            </a>
                        @endif
                    </div>

                    <div class="pt-2 recaptcha-wrapper">
                        {!! NoCaptcha::display() !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <p class="text-sm text-red-500 font-bold mt-2">
                                <i class="fa-solid fa-triangle-exclamation mr-1"></i> {{ $errors->first('g-recaptcha-response') }}
                            </p>
                        @endif
                    </div>

                    <div class="pt-4 flex flex-col sm:flex-row gap-4">
                        <button type="submit" class="w-full sm:w-1/2 flex justify-center items-center py-3.5 px-6 rounded-full shadow-lg text-sm font-bold text-white bg-semaft-navy hover:bg-blue-900 focus:outline-none focus:ring-4 focus:ring-blue-900/30 transition-all duration-300 transform hover:-translate-y-0.5">
                            Masuk
                        </button>
                        
                        <a href="{{ url('/') }}" class="w-full sm:w-1/2 flex justify-center items-center py-3.5 px-6 rounded-full border border-gray-300 text-sm font-bold text-gray-600 hover:bg-gray-50 hover:text-semaft-navy focus:outline-none transition-all duration-300">
                            Ke Beranda
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>