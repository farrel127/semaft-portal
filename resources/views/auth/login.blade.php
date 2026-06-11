<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - SEMA FT</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {!! NoCaptcha::renderJs() !!}

    <style>
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active{
            -webkit-box-shadow: 0 0 0 30px white inset !important;
        }

        .recaptcha-wrapper{
            overflow-x:auto;
        }

        @media(max-width:400px){
            .g-recaptcha{
                transform:scale(.85);
                transform-origin:left top;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-100 via-gray-100 to-slate-200 font-sans antialiased">

<div class="min-h-screen flex items-center justify-center p-4 lg:p-8">

    <div class="w-full max-w-6xl bg-white rounded-[32px] overflow-hidden shadow-[0_20px_80px_rgba(0,0,0,0.15)]">

        <div class="grid lg:grid-cols-2">

            <!-- LEFT SIDE -->
            <div class="hidden lg:flex relative overflow-hidden bg-gradient-to-br from-semaft-navy via-indigo-900 to-purple-900">

                <!-- Decorative -->
                <div class="absolute inset-0">

                    <div class="absolute -top-20 -left-20 w-72 h-72 rounded-full border border-white/10"></div>

                    <div class="absolute bottom-10 right-10 w-96 h-96 rounded-full border border-white/10"></div>

                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] rounded-full border border-white/5"></div>

                </div>

                <div class="relative z-10 flex flex-col justify-center items-center text-center p-12 text-white">

                    <div class="bg-white p-5 rounded-full shadow-2xl mb-8">
                        <img
                            src="{{ asset('images/sema.png') }}"
                            alt="Logo SEMA FT"
                            class="w-24 h-24 object-contain">
                    </div>

                    <h1 class="text-5xl font-extrabold tracking-wide mb-4">
                        SEMA FT
                    </h1>

                    <div class="w-20 h-1 bg-yellow-400 rounded-full mb-6"></div>

                    <p class="max-w-md text-gray-200 text-lg leading-relaxed">
                        Portal Administrasi Senat Mahasiswa Fakultas Teknik.
                        Kelola berita, agenda kegiatan, informasi organisasi,
                        dan seluruh kebutuhan administrasi dalam satu tempat.
                    </p>

                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="flex items-center justify-center p-6 md:p-10 lg:p-14 bg-white">

                <div class="w-full max-w-md">

                    <!-- Mobile Header -->
                    <div class="lg:hidden text-center mb-8">

                        <div class="inline-flex bg-white shadow-lg p-4 rounded-full mb-4">
                            <img
                                src="{{ asset('images/sema.png') }}"
                                alt="Logo"
                                class="w-16 h-16 object-contain">
                        </div>

                        <h2 class="text-3xl font-extrabold text-semaft-navy">
                            SEMA FT
                        </h2>

                    </div>

                    <!-- Heading -->
                    <div class="mb-8">

                        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">
                            Masuk ke Akun
                        </h2>

                        <p class="mt-2 text-gray-500">
                            Silakan masukkan kredensial administrator
                        </p>

                    </div>

                    <x-auth-session-status
                        class="mb-4"
                        :status="session('status')"
                    />

                    <form
                        method="POST"
                        action="{{ route('login') }}"
                        class="space-y-6">

                        @csrf

                        <!-- EMAIL -->
                        <div>

                            <label
                                for="email"
                                class="block mb-2 text-sm font-semibold text-gray-700">
                                Email Administrator
                            </label>

                            <div class="relative">

                                <i class="fa-regular fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    placeholder="Masukkan email administrator"
                                    class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-gray-300 focus:border-semaft-navy focus:ring-4 focus:ring-blue-100 transition duration-300">

                            </div>

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2" />

                        </div>

                        <!-- PASSWORD -->
                        <div>

                            <label
                                for="password"
                                class="block mb-2 text-sm font-semibold text-gray-700">
                                Kata Sandi
                            </label>

                            <div class="relative">

                                <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Masukkan kata sandi"
                                    class="w-full pl-12 pr-12 py-3.5 rounded-xl border border-gray-300 focus:border-semaft-navy focus:ring-4 focus:ring-blue-100 transition duration-300">

                                <button
                                    type="button"
                                    onclick="togglePassword()"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-semaft-navy">

                                    <i id="eye-icon" class="fa-regular fa-eye"></i>

                                </button>

                            </div>

                            <x-input-error
                                :messages="$errors->get('password')"
                                class="mt-2" />

                        </div>

                        <!-- Remember -->
                        <div class="flex items-center justify-between">

                            <label class="flex items-center gap-2 cursor-pointer">

                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    name="remember"
                                    class="rounded border-gray-300 text-semaft-navy focus:ring-semaft-navy">

                                <span class="text-sm text-gray-600">
                                    Ingat saya
                                </span>

                            </label>

                            @if (Route::has('password.request'))
                                <a
                                    href="{{ route('password.request') }}"
                                    class="text-sm font-semibold text-yellow-600 hover:text-yellow-700">
                                    Lupa sandi?
                                </a>
                            @endif

                        </div>

                        <!-- CAPTCHA -->
                        <div class="recaptcha-wrapper">

                            {!! NoCaptcha::display() !!}

                            @if ($errors->has('g-recaptcha-response'))
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $errors->first('g-recaptcha-response') }}
                                </p>
                            @endif

                        </div>

                        <!-- BUTTONS -->
                        <div class="space-y-3 pt-2">

                            <button
                                type="submit"
                                class="w-full py-3.5 rounded-xl bg-gradient-to-r from-semaft-navy to-indigo-800 text-white font-bold shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all duration-300">

                                <i class="fa-solid fa-right-to-bracket mr-2"></i>
                                Masuk

                            </button>

                            <a
                                href="{{ url('/') }}"
                                class="w-full flex justify-center items-center py-3.5 rounded-xl border border-gray-300 text-gray-700 font-semibold hover:bg-gray-50 transition">

                                <i class="fa-solid fa-house mr-2"></i>
                                Ke Beranda

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
    function togglePassword() {

        const passwordInput =
            document.getElementById('password');

        const eyeIcon =
            document.getElementById('eye-icon');

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