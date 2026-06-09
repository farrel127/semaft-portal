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
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }
        @keyframes fadeInUp {
            to { opacity: 1; transform: translateY(0); }
        }
        /* Mengakali reCAPTCHA agar tidak meluber di HP layar kecil */
        @media (max-width: 400px) {
            .g-recaptcha { transform: scale(0.85); transform-origin: center; }
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased bg-semaft-navy relative overflow-x-hidden min-h-screen flex items-center justify-center selection:bg-semaft-gold selection:text-white">

    <div class="absolute top-[-10%] left-[-10%] w-[300px] sm:w-[500px] h-[300px] sm:h-[500px] bg-semaft-gold opacity-20 rounded-full blur-[80px] sm:blur-[100px] animate-pulse"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[300px] sm:w-[500px] h-[300px] sm:h-[500px] bg-blue-500 opacity-20 rounded-full blur-[80px] sm:blur-[100px]"></div>

    <div class="animate-fade-in-up w-full max-w-md px-6 py-10 sm:px-10 sm:py-12 bg-white/95 backdrop-blur-md shadow-[0_20px_50px_rgba(0,0,0,0.3)] rounded-3xl relative z-10 border border-white/40 border-t-4 border-t-semaft-gold mx-4 my-8">
        
        <div class="flex flex-col items-center justify-center mb-8">
            <a href="{{ url('/') }}" class="group block p-2">
                <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" class="h-20 sm:h-24 w-auto mb-3 drop-shadow-lg group-hover:scale-110 group-hover:rotate-3 transition duration-500">
            </a>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-semaft-navy tracking-tight">Portal Admin</h2>
            <p class="text-xs sm:text-sm text-gray-500 mt-1 font-medium bg-gray-100 px-3 py-1 rounded-full">Senat Mahasiswa Fakultas Teknik</p>
        </div>

        <x-auth-session-status class="mb-4 rounded-xl" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div class="group">
                <label for="email" class="block font-bold text-sm text-semaft-navy mb-2 ml-1">Email Administrator</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within:text-semaft-gold text-gray-400">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                        class="block w-full pl-11 pr-4 py-3.5 sm:py-4 border border-gray-200 rounded-xl focus:ring-2 focus:ring-semaft-gold/50 focus:border-semaft-gold transition-all duration-300 bg-gray-50/50 focus:bg-white text-sm outline-none"
                        placeholder="Masukkan email anda...">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 ml-1" />
            </div>

            <div class="group">
                <label for="password" class="block font-bold text-sm text-semaft-navy mb-2 ml-1">Kata Sandi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within:text-semaft-gold text-gray-400">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="block w-full pl-11 pr-12 py-3.5 sm:py-4 border border-gray-200 rounded-xl focus:ring-2 focus:ring-semaft-gold/50 focus:border-semaft-gold transition-all duration-300 bg-gray-50/50 focus:bg-white text-sm outline-none"
                        placeholder="Masukkan kata sandi...">
                    
                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-semaft-navy transition-colors focus:outline-none">
                        <i id="eye-icon" class="fa-regular fa-eye"></i>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 ml-1" />
            </div>

            <div class="flex items-center justify-between pt-1 px-1">
                <label for="remember_me" class="inline-flex items-center cursor-pointer group/cb">
                    <div class="relative flex items-center justify-center">
                        <input id="remember_me" type="checkbox" class="peer rounded-md border-gray-300 text-semaft-gold focus:ring-semaft-gold w-4.5 h-4.5 cursor-pointer transition-all" name="remember">
                    </div>
                    <span class="ml-2 text-xs sm:text-sm text-gray-500 font-medium group-hover/cb:text-semaft-navy transition-colors">Ingat sesi saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-xs sm:text-sm font-bold text-semaft-gold hover:text-yellow-600 transition-colors" href="{{ route('password.request') }}">
                        Lupa sandi?
                    </a>
                @endif
            </div>

            <div class="pt-3 pb-1 flex flex-col items-center justify-center overflow-hidden">
                {!! NoCaptcha::display() !!}
                
                @if ($errors->has('g-recaptcha-response'))
                    <p class="text-xs sm:text-sm text-red-500 font-bold mt-2 animate-pulse bg-red-50 px-3 py-1 rounded-lg">
                        <i class="fa-solid fa-triangle-exclamation mr-1"></i> 
                        {{ $errors->first('g-recaptcha-response') }}
                    </p>
                @endif
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full flex justify-center items-center py-3.5 sm:py-4 px-4 border border-transparent rounded-xl shadow-[0_8px_20px_rgba(15,23,42,0.2)] text-sm font-bold text-white bg-semaft-navy hover:bg-blue-900 active:scale-[0.98] focus:outline-none focus:ring-4 focus:ring-blue-900/30 transition-all duration-300 gap-2 overflow-hidden relative group">
                    <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-white rounded-full group-hover:w-56 group-hover:h-56 opacity-10"></span>
                    <i class="fa-solid fa-right-to-bracket relative z-10"></i> 
                    <span class="relative z-10">Masuk ke Dashboard</span>
                </button>
            </div>
            
            <div class="text-center mt-8 border-t border-gray-100 pt-6">
                <a href="{{ url('/') }}" class="inline-flex items-center justify-center gap-2 text-sm text-gray-400 hover:text-semaft-navy transition-colors font-medium px-4 py-2 rounded-full hover:bg-gray-50">
                    <i class="fa-solid fa-arrow-left-long"></i> Kembali ke Halaman Utama
                </a>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash', 'text-semaft-gold');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash', 'text-semaft-gold');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>