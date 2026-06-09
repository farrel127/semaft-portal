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
        /* Skala reCAPTCHA agar proporsional dan tidak merusak layout di HP */
        @media (max-width: 400px) {
            .recaptcha-wrapper {
                transform: scale(0.85);
                transform-origin: 0 0;
            }
            .recaptcha-container {
                height: 66px; /* Menjaga tinggi form agar tidak lompat */
            }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8 selection:bg-semaft-navy selection:text-white">

    <div class="sm:mx-auto sm:w-full sm:max-w-md mb-8 text-center px-4">
        <a href="{{ url('/') }}" class="inline-block">
            <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" class="h-16 w-auto mx-auto mb-6">
        </a>
        <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">Selamat Datang Kembali</h2>
        <p class="text-sm text-gray-500 mt-2 font-medium">Masuk ke Portal Admin SEMAFT</p>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md w-full px-4 sm:px-0">
        <div class="bg-white py-8 px-6 sm:px-10 shadow-sm rounded-2xl border border-gray-100">
            
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">Alamat Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                        class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-semaft-navy/20 focus:border-semaft-navy sm:text-sm transition-all duration-200"
                        placeholder="admin@semaft.my.id">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">Kata Sandi</label>
                    <div class="relative">
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-semaft-navy/20 focus:border-semaft-navy sm:text-sm transition-all duration-200 pr-10"
                            placeholder="••••••••">
                        
                        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors focus:outline-none">
                            <i id="eye-icon" class="fa-regular fa-eye text-sm"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" 
                            class="h-4.5 w-4.5 text-semaft-navy focus:ring-semaft-navy border-gray-300 rounded cursor-pointer transition-colors">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-600 font-medium cursor-pointer select-none">
                            Ingat sesi saya
                        </label>
                    </div>

                    <div class="text-sm">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="font-semibold text-semaft-navy hover:text-blue-800 transition-colors">
                                Lupa sandi?
                            </a>
                        @endif
                    </div>
                </div>

                <div class="recaptcha-container flex justify-center sm:justify-start">
                    <div class="recaptcha-wrapper">
                        {!! NoCaptcha::display() !!}
                    </div>
                </div>
                @if ($errors->has('g-recaptcha-response'))
                    <p class="text-sm text-red-600 mt-1 font-medium">
                        {{ $errors->first('g-recaptcha-response') }}
                    </p>
                @endif

                <div class="pt-2">
                    <button type="submit" 
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-semaft-navy hover:bg-blue-900 focus:outline-none focus:ring-4 focus:ring-semaft-navy/20 transition-all duration-200">
                        Masuk
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-10 text-center">
            <a href="{{ url('/') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 transition-colors flex items-center justify-center gap-2">
                <i class="fa-solid fa-arrow-left text-xs"></i> Kembali ke Beranda
            </a>
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