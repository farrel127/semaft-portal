<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - SEMA FT</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {!! NoCaptcha::renderJs() !!}

    <style>

        html{
            scroll-behavior:smooth;
        }

        body{
            overflow-x:hidden;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus{
            -webkit-box-shadow:0 0 0 1000px white inset !important;
        }

        /* Floating Logo */
        @keyframes floating{
            0%,100%{
                transform:translateY(0);
            }
            50%{
                transform:translateY(-10px);
            }
        }

        .floating-logo{
            animation:floating 4s ease-in-out infinite;
        }

        /* Fade Card */
        @keyframes fadeUp{
            from{
                opacity:0;
                transform:translateY(30px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        .animate-card{
            animation:fadeUp .7s ease;
        }

        /* Background Blob */
        @keyframes blob{
            0%{
                transform:translate(0px,0px) scale(1);
            }
            33%{
                transform:translate(30px,-50px) scale(1.1);
            }
            66%{
                transform:translate(-20px,20px) scale(.95);
            }
            100%{
                transform:translate(0px,0px) scale(1);
            }
        }

        .blob{
            animation:blob 15s infinite ease-in-out;
        }

        .blob2{
            animation:blob 20s infinite ease-in-out;
        }

        .recaptcha-wrapper{
            overflow-x:auto;
        }

        @media(max-width:400px){
            .g-recaptcha{
                transform:scale(.82);
                transform-origin:left top;
            }
        }

    </style>
</head>

<body class="bg-slate-100 min-h-screen relative">

    <!-- Background Decoration -->

    <div class="fixed inset-0 overflow-hidden -z-10">

        <div class="blob absolute top-0 left-0 w-96 h-96 bg-blue-200/30 rounded-full blur-3xl"></div>

        <div class="blob2 absolute bottom-0 right-0 w-[500px] h-[500px] bg-indigo-300/20 rounded-full blur-3xl"></div>

    </div>

    <div class="min-h-screen flex items-center justify-center px-4 py-10">

        <div class="w-full max-w-lg animate-card">

            <!-- Logo -->

            <div class="text-center mb-6">

                <div
                    class="floating-logo inline-flex items-center justify-center bg-white p-5 rounded-full shadow-xl">

                    <img
                        src="{{ asset('images/sema.png') }}"
                        alt="Logo SEMA FT"
                        class="w-20 h-20 object-contain">

                </div>

                <h1 class="mt-5 text-4xl font-black text-semaft-navy">
                    SEMA FT
                </h1>

                <p class="text-gray-500 mt-2">
                    Portal Administrasi Fakultas Teknik
                </p>

            </div>

            <!-- Card -->

            <div
                class="bg-white/90 backdrop-blur-xl border border-white rounded-3xl shadow-2xl p-8 md:p-10">

                <div class="mb-8 text-center">

                    <h2 class="text-3xl font-bold text-gray-900">
                        Masuk ke Akun
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Silakan masukkan kredensial administrator
                    </p>

                </div>

                <x-auth-session-status
                    class="mb-4"
                    :status="session('status')" />

                <form
                    method="POST"
                    action="{{ route('login') }}"
                    class="space-y-6">

                    @csrf

                    <!-- Email -->

                    <div>

                        <label
                            class="text-sm font-semibold text-gray-700 mb-2 block">

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

                                class="w-full pl-12 pr-4 py-4 rounded-xl border border-gray-300 focus:border-semaft-navy focus:ring-4 focus:ring-blue-100 transition-all duration-300"

                                placeholder="Masukkan email administrator">

                        </div>

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2" />

                    </div>

                    <!-- Password -->

                    <div>

                        <label
                            class="text-sm font-semibold text-gray-700 mb-2 block">

                            Kata Sandi

                        </label>

                        <div class="relative">

                            <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required

                                class="w-full pl-12 pr-12 py-4 rounded-xl border border-gray-300 focus:border-semaft-navy focus:ring-4 focus:ring-blue-100 transition-all duration-300"

                                placeholder="Masukkan kata sandi">

                            <button
                                type="button"
                                onclick="togglePassword()"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-semaft-navy transition">

                                <i id="eye-icon"
                                   class="fa-regular fa-eye"></i>

                            </button>

                        </div>

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2" />

                    </div>

                    <!-- Remember -->

                    <div class="flex justify-between items-center">

                        <label
                            class="flex items-center gap-2 cursor-pointer">

                            <input
                                type="checkbox"
                                name="remember"
                                class="rounded border-gray-300 text-semaft-navy focus:ring-semaft-navy">

                            <span class="text-sm text-gray-600">
                                Ingat saya
                            </span>

                        </label>

                        @if(Route::has('password.request'))

                            <a
                                href="{{ route('password.request') }}"
                                class="text-sm font-semibold text-yellow-600 hover:text-yellow-700">

                                Lupa sandi?

                            </a>

                        @endif

                    </div>

                    <!-- Captcha -->

                    <div class="recaptcha-wrapper flex justify-center">

                        {!! NoCaptcha::display() !!}

                    </div>

                    @if ($errors->has('g-recaptcha-response'))
                        <p class="text-red-500 text-sm">
                            {{ $errors->first('g-recaptcha-response') }}
                        </p>
                    @endif

                    <!-- Submit -->

                    <button
                        type="submit"

                        class="w-full py-4 rounded-xl bg-gradient-to-r from-semaft-navy to-indigo-700 text-white font-bold shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">

                        <i class="fa-solid fa-right-to-bracket mr-2"></i>
                        Masuk

                    </button>

                    <!-- Home -->

                    <a
                        href="{{ url('/') }}"

                        class="w-full flex items-center justify-center py-4 rounded-xl border border-gray-300 text-gray-700 font-semibold hover:bg-gray-50 transition">

                        <i class="fa-solid fa-house mr-2"></i>
                        Ke Beranda

                    </a>

                </form>

            </div>

            <p class="text-center text-gray-400 text-sm mt-6">
                © {{ date('Y') }} SEMA FT
            </p>

        </div>

    </div>

<script>

function togglePassword(){

    const password =
        document.getElementById('password');

    const icon =
        document.getElementById('eye-icon');

    if(password.type === 'password'){

        password.type = 'text';

        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');

    }else{

        password.type = 'password';

        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');

    }
}

</script>

</body>
</html>