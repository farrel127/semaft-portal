<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - SEMAFT</title>
    
    <!-- Memanggil Tailwind & CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Script Google reCAPTCHA -->
    {!! NoCaptcha::renderJs() !!}
</head>
<body class="font-sans text-gray-900 antialiased bg-semaft-navy relative overflow-hidden min-h-screen flex items-center justify-center">

    <!-- Efek Cahaya Abstrak (Glowing Background) -->
    <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-semaft-gold opacity-20 rounded-full blur-[100px] animate-pulse"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-blue-500 opacity-20 rounded-full blur-[100px]"></div>

    <!-- Container Form Login -->
    <div class="w-full max-w-md px-8 py-10 bg-white shadow-2xl rounded-3xl relative z-10 border-t-4 border-semaft-gold mx-4">
        
        <!-- Header & Logo SEMAFT -->
        <div class="flex flex-col items-center justify-center mb-8">
            <a href="{{ url('/') }}" class="group">
                <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" class="h-24 w-auto mb-4 drop-shadow-md group-hover:scale-105 transition duration-300">
            </a>
            <h2 class="text-3xl font-extrabold text-semaft-navy tracking-tight">Portal Admin</h2>
            <p class="text-sm text-gray-500 mt-2 font-medium">Senat Mahasiswa Fakultas Teknik</p>
        </div>

        <!-- Notifikasi Error/Status bawaan Laravel -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Kolom Email -->
            <div>
                <label for="email" class="block font-bold text-sm text-semaft-navy mb-2">Email Administrator</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-solid fa-envelope text-gray-400"></i>
                    </div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                        class="block w-full pl-11 pr-4 py-3.5 border border-gray-200 rounded-xl focus:ring focus:ring-semaft-gold/30 focus:border-semaft-gold transition bg-gray-50 hover:bg-white text-sm"
                        placeholder="Masukkan email anda...">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Kolom Password -->
            <div>
                <label for="password" class="block font-bold text-sm text-semaft-navy mb-2">Kata Sandi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-solid fa-lock text-gray-400"></i>
                    </div>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="block w-full pl-11 pr-4 py-3.5 border border-gray-200 rounded-xl focus:ring focus:ring-semaft-gold/30 focus:border-semaft-gold transition bg-gray-50 hover:bg-white text-sm"
                        placeholder="Masukkan kata sandi...">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Ingat Saya & Lupa Sandi -->
            <div class="flex items-center justify-between pt-2">
                <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-semaft-gold focus:ring-semaft-gold w-4 h-4 cursor-pointer" name="remember">
                    <span class="ml-2 text-sm text-gray-500 font-medium group-hover:text-semaft-navy transition">Ingat sesi saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm font-bold text-semaft-gold hover:text-yellow-600 transition" href="{{ route('password.request') }}">
                        Lupa sandi?
                    </a>
                @endif
            </div>

            <!-- Pengecekan Keamanan reCAPTCHA -->
            <div class="pt-2 flex flex-col items-center justify-center">
                {!! NoCaptcha::display() !!}
                
                @if ($errors->has('g-recaptcha-response'))
                    <p class="text-sm text-red-500 font-bold mt-2 animate-pulse">
                        <i class="fa-solid fa-triangle-exclamation mr-1"></i> 
                        {{ $errors->first('g-recaptcha-response') }}
                    </p>
                @endif
            </div>

            <!-- Tombol Masuk -->
            <div class="pt-2">
                <button type="submit" class="w-full flex justify-center items-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-semaft-navy hover:bg-blue-900 focus:outline-none focus:ring-4 focus:ring-blue-900/30 transition duration-300 gap-2 transform hover:-translate-y-0.5">
                    <i class="fa-solid fa-right-to-bracket"></i> Masuk ke Dashboard
                </button>
            </div>
            
            <!-- Link Kembali ke Web Publik -->
            <div class="text-center mt-8 border-t border-gray-100 pt-6">
                <a href="{{ url('/') }}" class="text-sm text-gray-400 hover:text-semaft-gold transition flex items-center justify-center gap-2 font-medium">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Halaman Utama
                </a>
            </div>
        </form>
    </div>
</body>
</html>