<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | SEMA FT</title>
    
    <!-- Memuat Tailwind CSS via CDN untuk sementara agar langsung rapi -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Konfigurasi warna kustom SEMA FT untuk Tailwind CDN */
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'semaft-navy': '#0b061a',
                        'semaft-gold': '#f4c332',
                    }
                }
            }
        }
    </style>
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden">

    <!-- SIDEBAR NAVIGASI KIRI -->
    <nav class="w-64 bg-slate-900 text-white min-h-screen p-4 hidden md:block border-r border-slate-800">
        <div class="font-bold text-xl mb-10 mt-2 text-center text-semaft-gold flex items-center justify-center gap-2">
            <i class="fa-solid fa-shield-halved"></i> SEMA FT-Core
        </div>
        <ul class="space-y-2">
            <li>
                <a href="/dashboard" class="flex items-center gap-3 p-3 rounded-xl transition-all {{ request()->is('dashboard') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-house w-5"></i> <span class="font-semibold text-sm">Dashboard Utama</span>
                </a>
            </li>
            <li>
                <!-- Pastikan nama route ini sesuai dengan yang ada di web.php Anda -->
                <a href="{{ route('admin.galeri') ?? '#' }}" class="flex items-center gap-3 p-3 rounded-xl transition-all {{ request()->routeIs('admin.galeri') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-images w-5"></i> <span class="font-semibold text-sm">Arsip Visual</span>
                </a>
            </li>
            <!-- Anda bisa menambahkan menu lain di sini nanti -->
        </ul>
    </nav>

    <!-- AREA KANAN (TOPBAR & KONTEN) -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        
        <!-- TOPBAR ATAS -->
        <header class="bg-white shadow-sm border-b px-6 py-4 flex justify-between items-center z-10">
            <div class="text-gray-600 font-semibold flex items-center gap-4">
                <i class="fa-solid fa-bars cursor-pointer md:hidden text-lg hover:text-blue-600 transition-colors"></i>
                <span class="hidden sm:inline-block text-sm font-medium bg-gray-100 px-3 py-1 rounded-full text-gray-500">Versi 1.0</span>
            </div>
            
            <div class="flex items-center gap-4">
                <!-- Dropdown Profil Sederhana -->
                <div class="flex items-center gap-3 cursor-pointer group">
                    <div class="text-right hidden sm:block">
                        <div class="text-sm font-bold text-gray-700 group-hover:text-blue-600 transition-colors">{{ auth()->user()->name ?? 'Admin SEMA' }}</div>
                        <div class="text-[10px] text-gray-400 uppercase tracking-wider font-bold">Administrator</div>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-700 font-bold border border-blue-200 group-hover:ring-2 ring-blue-300 transition-all">
                        {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                    </div>
                </div>
            </div>
        </header>

        <!-- AREA KONTEN DINAMIS (Di sinilah isi dashboard.blade.php akan disuntikkan) -->
        <main class="flex-1 overflow-y-auto p-0 md:p-4 bg-gray-50">
            @yield('content')
        </main>
        
    </div>

</body>
</html>