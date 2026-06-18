<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lock Screen - SEMA FT</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {!! NoCaptcha::renderJs() !!}

    <style>
        /* Mencegah autofill background putih yang merusak desain */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active{
            -webkit-box-shadow: 0 0 0 30px rgba(255, 255, 255, 0.05) inset !important;
            -webkit-text-fill-color: white !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        /* Animasi Wallpaper Ambient */
        @keyframes pulse-slow {
            0%, 100% { opacity: 0.5; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.1); }
        }
    </style>
</head>

<body style="background-color: #090514; min-height: 100vh; margin: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; overflow-x: hidden; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    <div style="position: fixed; inset: 0; z-index: 0; pointer-events: none; display: flex; align-items: center; justify-content: center; overflow: hidden;">
        <div style="position: absolute; width: 60vw; height: 60vw; max-width: 800px; max-height: 800px; background: radial-gradient(circle, rgba(76,29,149,0.25) 0%, transparent 60%); filter: blur(100px); animation: pulse-slow 10s infinite alternate;"></div>
        <div style="position: absolute; bottom: -20%; width: 70vw; height: 70vw; max-width: 900px; max-height: 900px; background: radial-gradient(circle, rgba(244,195,50,0.1) 0%, transparent 60%); filter: blur(120px); animation: pulse-slow 15s infinite alternate-reverse;"></div>
        
        <div style="position: absolute; inset: 0; background-image: radial-gradient(rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 32px 32px; opacity: 0.3;"></div>
    </div>

    <div style="position: relative; z-index: 10; width: 100%; max-width: 400px; padding: 20px; box-sizing: border-box;">
        
        <div style="background: rgba(255, 255, 255, 0.03); 
                    backdrop-filter: blur(50px) saturate(200%); 
                    -webkit-backdrop-filter: blur(50px) saturate(200%); 
                    border: 1px solid rgba(255, 255, 255, 0.1); 
                    border-radius: 32px; 
                    padding: 40px 30px; 
                    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.1);">
            
            <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 32px;">
                <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.15); display: flex; align-items: center; justify-content: center; margin-bottom: 16px; box-shadow: inset 0 2px 10px rgba(255,255,255,0.05);">
                    <img src="{{ asset('images/sema.png') }}" alt="Logo" style="width: 45px; height: 45px; object-fit: contain;">
                </div>
                <h1 style="color: white; font-size: 22px; font-weight: 700; margin: 0; letter-spacing: -0.5px;">Fakultas Teknik</h1>
                <p style="color: rgba(255,255,255,0.5); font-size: 11px; font-weight: 600; letter-spacing: 1.5px; text-transform: uppercase; margin-top: 4px;">Portal Administrator</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" novalidate style="display: flex; flex-direction: column; gap: 16px;">
                @csrf

                <div style="background: rgba(0,0,0,0.2); border-radius: 16px; border: 1px solid rgba(255,255,255,0.08); overflow: hidden;">
                    
                    <div style="position: relative; border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <div style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: rgba(255,255,255,0.4);">
                            <i class="fa-regular fa-envelope" style="font-size: 14px;"></i>
                        </div>
                        <input type="email" name="email" required placeholder="Alamat Email" 
                               style="width: 100%; padding: 14px 16px 14px 44px; background: transparent; border: none; color: white; font-size: 14px; outline: none; box-sizing: border-box;"
                               onfocus="this.parentElement.style.background='rgba(255,255,255,0.05)'" 
                               onblur="this.parentElement.style.background='transparent'">
                    </div>

                    <div style="position: relative;">
                        <div style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: rgba(255,255,255,0.4);">
                            <i class="fa-solid fa-lock" style="font-size: 14px;"></i>
                        </div>
                        <input id="password" type="password" name="password" required placeholder="Kata Sandi" 
                               style="width: 100%; padding: 14px 44px; background: transparent; border: none; color: white; font-size: 14px; outline: none; box-sizing: border-box;"
                               onfocus="this.parentElement.style.background='rgba(255,255,255,0.05)'" 
                               onblur="this.parentElement.style.background='transparent'">
                        <button type="button" onclick="togglePassword()" style="position: absolute; right: 16px; top: 50%; transform: translateY(-50%); background: none; border: none; color: rgba(255,255,255,0.4); cursor: pointer; padding: 0;">
                            <i id="eye-icon" class="fa-regular fa-eye" style="font-size: 14px;"></i>
                        </button>
                    </div>

                </div>

                @if ($errors->get('email') || $errors->get('password'))
                    <div style="color: #f87171; font-size: 12px; text-align: center; margin-top: -8px;">
                        Kredensial tidak valid. Silakan coba lagi.
                    </div>
                @endif

                <div style="display: flex; justify-content: space-between; align-items: center; padding: 0 4px;">
                    <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                        <input type="checkbox" name="remember" style="accent-color: #f4c332; width: 14px; height: 14px; cursor: pointer;">
                        <span style="color: rgba(255,255,255,0.6); font-size: 12px;">Ingat sesi</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="color: rgba(255,255,255,0.6); font-size: 12px; text-decoration: none;" onmouseover="this.style.color='#f4c332'" onmouseout="this.style.color='rgba(255,255,255,0.6)'">Lupa sandi?</a>
                    @endif
                </div>

                <div style="display: flex; justify-content: center; margin-top: 4px; transform: scale(0.9); transform-origin: center;">
                    <div style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); border-radius: 8px; overflow: hidden;">
                        {!! NoCaptcha::display() !!}
                    </div>
                </div>
                @if ($errors->has('g-recaptcha-response'))
                    <p style="color: #f87171; font-size: 11px; text-align: center; margin: 0;">{{ $errors->first('g-recaptcha-response') }}</p>
                @endif

                <button type="submit" id="submit-btn"
                        style="width: 100%; padding: 14px; margin-top: 8px; border-radius: 14px; background: #f4c332; color: #1e1160; font-weight: 700; font-size: 14px; border: none; cursor: pointer; box-shadow: 0 4px 15px rgba(244,195,50,0.3); display: flex; justify-content: center; align-items: center; gap: 8px; transition: 0.2s;"
                        onmouseover="this.style.transform='scale(1.02)'; this.style.boxShadow='0 8px 20px rgba(244,195,50,0.4)';"
                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 15px rgba(244,195,50,0.3)';">
                    <i id="submit-icon" class="fa-solid fa-arrow-right-to-bracket"></i>
                    <span id="submit-text">Akses Sistem</span>
                </button>
            </form>
        </div>

        <div style="text-center; margin-top: 24px; display: flex; justify-content: center;">
            <a href="{{ url('/') }}" 
               style="color: rgba(255,255,255,0.5); font-size: 12px; text-decoration: none; display: flex; align-items: center; gap: 6px; padding: 8px 16px; border-radius: 20px; transition: 0.2s;"
               onmouseover="this.style.color='white'; this.style.background='rgba(255,255,255,0.1)';"
               onmouseout="this.style.color='rgba(255,255,255,0.5)'; this.style.background='transparent';">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Portal Utama
            </a>
        </div>

    </div>

<script>
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
            icon.style.color = 'rgba(255,255,255,0.4)';
        }
    }

    // UX Feedback: Animasi Loading 
    document.querySelector('form').addEventListener('submit', function() {
        const btn = document.getElementById('submit-btn');
        const icon = document.getElementById('submit-icon');
        const text = document.getElementById('submit-text');
        
        btn.style.opacity = '0.8';
        btn.style.cursor = 'wait';
        icon.className = 'fa-solid fa-circle-notch fa-spin';
        text.innerText = 'Memverifikasi...';
    });
</script>

</body>
</html>