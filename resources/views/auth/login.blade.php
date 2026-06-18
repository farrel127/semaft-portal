<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akses Sistem - SEMA FT</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {!! NoCaptcha::renderJs() !!}

    <style>
        /* Mengamankan autofill browser agar tidak merusak desain kaca */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active{
            -webkit-box-shadow: 0 0 0 30px rgba(30, 17, 96, 0.8) inset !important;
            -webkit-text-fill-color: white !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        /* Animasi pendaran wallpaper */
        @keyframes aurora {
            0% { transform: scale(1) translate(0, 0); opacity: 0.8; }
            33% { transform: scale(1.2) translate(30px, -50px); opacity: 1; }
            66% { transform: scale(0.9) translate(-40px, 20px); opacity: 0.7; }
            100% { transform: scale(1) translate(0, 0); opacity: 0.8; }
        }
        .animate-aurora { animation: aurora 15s infinite alternate ease-in-out; }
        .animate-aurora-slow { animation: aurora 20s infinite alternate-reverse ease-in-out; }
    </style>
</head>

<body class="min-h-screen relative flex items-center justify-center overflow-hidden font-sans antialiased" style="background-color: #090414;">

    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0">
        <div class="absolute -top-[10%] -left-[10%] w-[50vw] h-[50vw] rounded-full animate-aurora mix-blend-screen" style="background: radial-gradient(circle, rgba(147,51,234,0.35) 0%, transparent 60%); filter: blur(90px);"></div>
        <div class="absolute top-[20%] -right-[10%] w-[60vw] h-[60vw] rounded-full animate-aurora-slow mix-blend-screen" style="background: radial-gradient(circle, rgba(37,99,235,0.25) 0%, transparent 60%); filter: blur(100px);"></div>
        <div class="absolute -bottom-[20%] left-[20%] w-[50vw] h-[50vw] rounded-full animate-aurora mix-blend-screen" style="background: radial-gradient(circle, rgba(244,195,50,0.15) 0%, transparent 60%); filter: blur(80px);"></div>
        
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(rgba(255,255,255,0.2) 1px, transparent 1px); background-size: 24px 24px;"></div>
    </div>

    <div class="relative z-10 w-full max-w-[420px] px-6 py-10 transform transition-all">
        
        <div class="rounded-[2.5rem] p-8 md:p-10 shadow-2xl overflow-hidden relative"
             style="background: linear-gradient(145deg, rgba(255, 255, 255, 0.08) 0%, rgba(255, 255, 255, 0.02) 100%);
                    backdrop-filter: blur(40px) saturate(180%);
                    -webkit-backdrop-filter: blur(40px) saturate(180%);
                    border: 1px solid rgba(255, 255, 255, 0.15);
                    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.2);">
            
            <div class="absolute top-0 inset-x-0 h-1" style="background: linear-gradient(90deg, transparent, rgba(244,195,50,0.8), transparent);"></div>

            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center p-3 rounded-2xl mb-5 transform hover:scale-110 transition-transform duration-500"
                     style="background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); box-shadow: inset 0 2px 10px rgba(255,255,255,0.05);">
                    <img src="{{ asset('images/sema.png') }}" alt="Logo SEMA FT" class="w-14 h-14 object-contain">
                </div>
                <h1 class="text-3xl font-bold tracking-tight text-white mb-1">Authentikasi</h1>
                <p class="text-xs font-medium tracking-widest uppercase" style="color: rgba(255,255,255,0.5);">SEMA Fakultas Teknik</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5" novalidate>
                @csrf

                <div>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-yellow-400 transition-colors">
                            <i class="fa-regular fa-envelope text-sm"></i>
                        </div>
                        <input type="email" name="email" required
                               class="w-full pl-11 pr-4 py-3.5 rounded-xl outline-none transition-all duration-300 placeholder-white/30 text-white font-medium text-sm"
                               style="background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);"
                               onfocus="this.style.background='rgba(0,0,0,0.4)'; this.style.borderColor='rgba(244,195,50,0.5)';"
                               onblur="this.style.background='rgba(0,0,0,0.2)'; this.style.borderColor='rgba(255,255,255,0.1)';"
                               placeholder="Alamat Email">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-400" />
                </div>

                <div>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-yellow-400 transition-colors">
                            <i class="fa-solid fa-lock text-sm"></i>
                        </div>
                        <input id="password" type="password" name="password" required
                               class="w-full pl-11 pr-12 py-3.5 rounded-xl outline-none transition-all duration-300 placeholder-white/30 text-white font-medium text-sm"
                               style="background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);"
                               onfocus="this.style.background='rgba(0,0,0,0.4)'; this.style.borderColor='rgba(244,195,50,0.5)';"
                               onblur="this.style.background='rgba(0,0,0,0.2)'; this.style.borderColor='rgba(255,255,255,0.1)';"
                               placeholder="Kata Sandi">
                        
                        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-white transition-colors">
                            <i id="eye-icon" class="fa-regular fa-eye text-sm"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-400" />
                </div>

                <div class="flex items-center justify-between mt-2">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <div class="relative flex items-center">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-400 appearance-none outline-none cursor-pointer transition-all duration-300 checked:bg-yellow-400 checked:border-yellow-400" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);">
                            <i class="fa-solid fa-check absolute inset-0 text-[10px] text-black m-auto opacity-0 pointer-events-none transition-opacity duration-300"></i>
                        </div>
                        <span class="text-xs font-medium text-gray-300 group-hover:text-white transition-colors">Ingat sesi</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs font-medium text-gray-300 hover:text-yellow-400 transition-colors">
                            Lupa sandi?
                        </a>
                    @endif
                </div>

                <div class="flex justify-center pt-2">
                    <div class="transform scale-90 sm:scale-100 origin-center" style="background: rgba(255,255,255,0.05); border-radius: 4px; padding: 2px;">
                        {!! NoCaptcha::display() !!}
                    </div>
                </div>
                @if ($errors->has('g-recaptcha-response'))
                    <p class="text-red-400 text-xs text-center">
                        {{ $errors->first('g-recaptcha-response') }}
                    </p>
                @endif

                <div class="pt-4">
                    <button type="submit" 
                            class="w-full py-3.5 rounded-xl font-bold text-sm tracking-wide transition-all duration-300 flex justify-center items-center gap-2 transform active:scale-95"
                            style="background: #f4c332; color: #1e1160; box-shadow: 0 4px 15px rgba(244,195,50,0.4), inset 0 1px 0 rgba(255,255,255,0.4);"
                            onmouseover="this.style.boxShadow='0 8px 25px rgba(244,195,50,0.6), inset 0 1px 0 rgba(255,255,255,0.4)';"
                            onmouseout="this.style.boxShadow='0 4px 15px rgba(244,195,50,0.4), inset 0 1px 0 rgba(255,255,255,0.4)';">
                        <i class="fa-solid fa-lock-open"></i> Akses Sistem
                    </button>
                </div>
            </form>

            <div class="mt-6">
                <a href="{{ url('/') }}" class="w-full py-3 rounded-xl font-medium text-xs flex justify-center items-center gap-2 transition-all duration-300"
                   style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: rgba(255,255,255,0.7);"
                   onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.color='#ffffff';"
                   onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.color='rgba(255,255,255,0.7)';">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>

        </div>
        
        <p class="text-center text-[10px] font-semibold tracking-widest mt-8 uppercase" style="color: rgba(255,255,255,0.3);">
            © {{ date('Y') }} SEMA FT USB YPKP
        </p>
    </div>

<script>
    // Fix untuk animasi checkbox custom
    document.querySelector('input[name="remember"]').addEventListener('change', function() {
        const icon = this.nextElementSibling;
        if(this.checked) {
            icon.style.opacity = '1';
        } else {
            icon.style.opacity = '0';
        }
    });

    // Toggle Password Visibility
    function togglePassword(){
        const password = document.getElementById('password');
        const icon = document.getElementById('eye-icon');
        
        if(password.type === 'password'){
            password.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
            icon.style.color = '#f4c332'; // Menyala saat di-show
        } else {
            password.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
            icon.style.color = ''; // Kembali normal
        }
    }
</script>
</body>
</html>