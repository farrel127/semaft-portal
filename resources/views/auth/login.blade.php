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
            -webkit-box-shadow: 0 0 0 30px rgba(11, 6, 34, 0.9) inset !important;
            -webkit-text-fill-color: white !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        /* Animasi pendaran wallpaper */
        @keyframes aurora {
            0% { transform: scale(1) translate(0, 0); opacity: 0.6; }
            50% { transform: scale(1.1) translate(20px, -30px); opacity: 0.8; }
            100% { transform: scale(1) translate(0, 0); opacity: 0.6; }
        }
        .animate-aurora { animation: aurora 15s infinite alternate ease-in-out; }
    </style>
</head>

<body class="min-h-screen relative flex items-center justify-center overflow-hidden font-sans antialiased" style="background-color: #0b061a;">

    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0 flex items-center justify-center">
        <div class="absolute top-0 w-[40vw] h-[40vw] rounded-full animate-aurora mix-blend-screen" style="background: radial-gradient(circle, rgba(109,40,217,0.2) 0%, transparent 60%); filter: blur(80px);"></div>
        <div class="absolute -bottom-[10%] w-[50vw] h-[50vw] rounded-full animate-aurora mix-blend-screen" style="background: radial-gradient(circle, rgba(244,195,50,0.12) 0%, transparent 60%); filter: blur(100px); animation-delay: -5s;"></div>
        
        <div class="absolute inset-0 opacity-10" style="background-image: linear-gradient(rgba(255,255,255,0.2) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.2) 1px, transparent 1px); background-size: 40px 40px;"></div>
    </div>

    <div class="relative z-10 w-full max-w-[420px] px-5 py-8 md:py-12 mx-auto transform transition-all duration-500">
        
        <div class="rounded-[2.5rem] p-8 md:p-10 overflow-hidden relative"
             style="background: linear-gradient(180deg, rgba(30,17,96,0.4) 0%, rgba(15,8,45,0.6) 100%);
                    backdrop-filter: blur(40px) saturate(200%);
                    -webkit-backdrop-filter: blur(40px) saturate(200%);
                    border: 1px solid rgba(255, 255, 255, 0.12);
                    box-shadow: 0 40px 80px rgba(0, 0, 0, 0.6), inset 0 1px 0 rgba(255, 255, 255, 0.15);">
            
            <div class="absolute top-0 inset-x-0 h-1" style="background: linear-gradient(90deg, transparent, rgba(244,195,50,0.6), transparent);"></div>

            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-[1.25rem] mb-5 transform hover:scale-105 transition-transform duration-500"
                     style="background: rgba(0,0,0,0.4); border: 1px solid rgba(255,255,255,0.1); box-shadow: inset 0 2px 10px rgba(255,255,255,0.05);">
                    <img src="{{ asset('images/sema.png') }}" alt="Logo SEMA FT" class="w-10 h-10 object-contain">
                </div>
                <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-white mb-1.5">Authentikasi</h1>
                <p class="text-[10px] md:text-xs font-semibold tracking-[0.15em] uppercase" style="color: rgba(255,255,255,0.5);">SEMA Fakultas Teknik</p>
            </div>

            <x-auth-session-status class="mb-5" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4" novalidate>
                @csrf

                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-yellow-400 transition-colors">
                        <i class="fa-regular fa-envelope text-sm"></i>
                    </div>
                    <input type="email" name="email" required
                           class="w-full pl-11 pr-4 py-3.5 rounded-2xl outline-none transition-all duration-300 placeholder-white/30 text-white font-medium text-sm"
                           style="background: rgba(0,0,0,0.25); border: 1px solid rgba(255,255,255,0.08); box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);"
                           onfocus="this.style.background='rgba(0,0,0,0.4)'; this.style.borderColor='rgba(244,195,50,0.5)';"
                           onblur="this.style.background='rgba(0,0,0,0.25)'; this.style.borderColor='rgba(255,255,255,0.08)';"
                           placeholder="Alamat Email">
                    <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-[11px] text-red-400" />
                </div>

                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-yellow-400 transition-colors">
                        <i class="fa-solid fa-lock text-sm"></i>
                    </div>
                    <input id="password" type="password" name="password" required
                           class="w-full pl-11 pr-12 py-3.5 rounded-2xl outline-none transition-all duration-300 placeholder-white/30 text-white font-medium text-sm"
                           style="background: rgba(0,0,0,0.25); border: 1px solid rgba(255,255,255,0.08); box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);"
                           onfocus="this.style.background='rgba(0,0,0,0.4)'; this.style.borderColor='rgba(244,195,50,0.5)';"
                           onblur="this.style.background='rgba(0,0,0,0.25)'; this.style.borderColor='rgba(255,255,255,0.08)';"
                           placeholder="Kata Sandi">
                    
                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-white transition-colors focus:outline-none">
                        <i id="eye-icon" class="fa-regular fa-eye text-sm"></i>
                    </button>
                    <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-[11px] text-red-400" />
                </div>

                <div class="flex items-center justify-between pt-1 pb-1">
                    <label class="flex items-center gap-2.5 cursor-pointer group">
                        <div class="relative flex items-center">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-400 appearance-none outline-none cursor-pointer transition-all duration-300 checked:bg-yellow-400 checked:border-yellow-400" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15);">
                            <i class="fa-solid fa-check absolute inset-0 text-[10px] text-black m-auto opacity-0 pointer-events-none transition-opacity duration-300"></i>
                        </div>
                        <span class="text-[11px] md:text-xs font-medium text-gray-400 group-hover:text-white transition-colors">Ingat sesi</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-[11px] md:text-xs font-medium text-gray-400 hover:text-yellow-400 transition-colors">
                            Lupa sandi?
                        </a>
                    @endif
                </div>

                <div class="flex justify-center py-2">
                    <div class="transform scale-[0.85] sm:scale-95 origin-center overflow-hidden rounded-md" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05);">
                        {!! NoCaptcha::display() !!}
                    </div>
                </div>
                @if ($errors->has('g-recaptcha-response'))
                    <p class="text-red-400 text-[11px] text-center mt-0">
                        {{ $errors->first('g-recaptcha-response') }}
                    </p>
                @endif

                <div class="pt-3">
                    <button type="submit" id="submit-btn"
                            class="w-full py-3.5 rounded-2xl font-bold text-sm tracking-wide transition-all duration-300 flex justify-center items-center gap-2 transform active:scale-[0.98] outline-none"
                            style="background: #f4c332; color: #1e1160; box-shadow: 0 4px 15px rgba(244,195,50,0.3), inset 0 1px 0 rgba(255,255,255,0.4);"
                            onmouseover="this.style.boxShadow='0 8px 25px rgba(244,195,50,0.5), inset 0 1px 0 rgba(255,255,255,0.4)';"
                            onmouseout="this.style.boxShadow='0 4px 15px rgba(244,195,50,0.3), inset 0 1px 0 rgba(255,255,255,0.4)';">
                        <i class="fa-solid fa-lock-open" id="submit-icon"></i> 
                        <span id="submit-text">Akses Sistem</span>
                    </button>
                </div>
            </form>

            <div class="mt-4">
                <a href="{{ url('/') }}" class="w-full py-3.5 rounded-2xl font-medium text-[11px] md:text-xs flex justify-center items-center gap-2 transition-all duration-300 outline-none"
                   style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); color: rgba(255,255,255,0.6);"
                   onmouseover="this.style.background='rgba(255,255,255,0.08)'; this.style.color='#ffffff';"
                   onmouseout="this.style.background='rgba(255,255,255,0.03)'; this.style.color='rgba(255,255,255,0.6)';">
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
        icon.style.opacity = this.checked ? '1' : '0';
    });

    // Toggle Password Visibility
    function togglePassword(){
        const password = document.getElementById('password');
        const icon = document.getElementById('eye-icon');
        
        if(password.type === 'password'){
            password.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
            icon.style.color = '#f4c332';
        } else {
            password.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
            icon.style.color = '';
        }
    }

    // UX Feedback: Animasi Loading saat form disubmit
    document.querySelector('form').addEventListener('submit', function() {
        const btn = document.getElementById('submit-btn');
        const icon = document.getElementById('submit-icon');
        const text = document.getElementById('submit-text');
        
        btn.style.opacity = '0.8';
        btn.style.cursor = 'wait';
        icon.className = 'fa-solid fa-circle-notch fa-spin';
        text.innerText = 'Memproses...';
    });
</script>

</body>
</html>