<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <x-slot name="header">
        <h2 class="font-bold text-xl text-semaft-navy leading-tight">
            {{ __('Dashboard Utama') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-10 flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6 px-4 sm:px-0">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-blue-100 text-blue-700 text-xs font-bold mb-3 border border-blue-200 shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span> Ruang Kendali SEMA FT
                    </div>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                        Halo, <span class="text-semaft-navy">{{ explode(' ', auth()->user()->name)[0] }}</span>! 👋
                    </h1>
                    <p class="text-sm sm:text-base text-gray-500 mt-2 max-w-2xl">Selamat datang di pusat manajemen. Pantau pergerakan, kelola informasi, dan kawal aspirasi mahasiswa Teknik hari ini.</p>
                </div>
                <div>
                    <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center gap-2 bg-white border border-gray-200 text-gray-700 hover:text-semaft-navy hover:border-semaft-navy font-bold px-5 py-2.5 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 text-sm group">
                        <i class="fa-solid fa-earth-asia text-semaft-gold group-hover:animate-spin"></i> Kunjungi Web Portal
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 px-4 sm:px-0">
                
                @if(auth()->user()->show_aspirasi)
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-500 relative overflow-hidden group border border-gray-100 flex flex-col justify-between h-full">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-red-50 rounded-full opacity-80 group-hover:scale-150 transition-transform duration-700 ease-out"></div>
                    <div class="flex items-start justify-between relative z-10 mb-4">
                        <div>
                            <p class="text-[11px] font-extrabold text-gray-400 uppercase tracking-widest mb-1">Aspirasi Menunggu</p>
                            <h3 class="text-4xl font-black text-gray-800 tracking-tight">{{ $aspirasi_baru ?? 0 }}</h3>
                        </div>
                        <div class="w-14 h-14 rounded-2xl bg-red-50 text-red-500 flex items-center justify-center text-2xl shadow-inner group-hover:bg-red-500 group-hover:text-white transition-colors duration-300">
                            <i class="fa-solid fa-envelope-open-text"></i>
                        </div>
                    </div>
                    <div class="mt-auto pt-4 border-t border-gray-50 relative z-10">
                        <a href="{{ route('aspirasi.index') }}" class="text-xs font-bold text-red-500 hover:text-red-700 flex items-center gap-1 group/link transition-colors">Tindak Lanjuti <i class="fa-solid fa-arrow-right transform group-hover/link:translate-x-1 transition-transform"></i></a>
                    </div>
                </div>
                @endif

                @if(auth()->user()->show_agenda)
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-500 relative overflow-hidden group border border-gray-100 flex flex-col justify-between h-full">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-emerald-50 rounded-full opacity-80 group-hover:scale-150 transition-transform duration-700 ease-out"></div>
                    <div class="flex items-start justify-between relative z-10 mb-4">
                        <div>
                            <p class="text-[11px] font-extrabold text-gray-400 uppercase tracking-widest mb-1">Agenda Aktif</p>
                            <h3 class="text-4xl font-black text-gray-800 tracking-tight">{{ $kegiatan_aktif ?? 0 }}</h3>
                        </div>
                        <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-500 flex items-center justify-center text-2xl shadow-inner group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                    </div>
                    <div class="mt-auto pt-4 border-t border-gray-50 relative z-10">
                        <a href="{{ route('kegiatan.index') }}" class="text-xs font-bold text-emerald-500 hover:text-emerald-700 flex items-center gap-1 group/link transition-colors">Kelola Jadwal <i class="fa-solid fa-arrow-right transform group-hover/link:translate-x-1 transition-transform"></i></a>
                    </div>
                </div>
                @endif

                @if(auth()->user()->show_berita)
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-500 relative overflow-hidden group border border-gray-100 flex flex-col justify-between h-full">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 rounded-full opacity-80 group-hover:scale-150 transition-transform duration-700 ease-out"></div>
                    <div class="flex items-start justify-between relative z-10 mb-4">
                        <div>
                            <p class="text-[11px] font-extrabold text-gray-400 uppercase tracking-widest mb-1">Total Publikasi</p>
                            <h3 class="text-4xl font-black text-gray-800 tracking-tight">{{ $total_berita ?? 0 }}</h3>
                        </div>
                        <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl shadow-inner group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                    </div>
                    <div class="mt-auto pt-4 border-t border-gray-50 relative z-10">
                        <a href="{{ route('berita.index') }}" class="text-xs font-bold text-blue-600 hover:text-blue-800 flex items-center gap-1 group/link transition-colors">Tulis Artikel Baru <i class="fa-solid fa-arrow-right transform group-hover/link:translate-x-1 transition-transform"></i></a>
                    </div>
                </div>
                @endif

                @if(auth()->user()->show_himpunan)
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-500 relative overflow-hidden group border border-gray-100 flex flex-col justify-between h-full">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-yellow-50 rounded-full opacity-80 group-hover:scale-150 transition-transform duration-700 ease-out"></div>
                    <div class="flex items-start justify-between relative z-10 mb-4">
                        <div>
                            <p class="text-[11px] font-extrabold text-gray-400 uppercase tracking-widest mb-1">Data Himpunan</p>
                            <h3 class="text-4xl font-black text-gray-800 tracking-tight">{{ $total_himpunan ?? 0 }}</h3>
                        </div>
                        <div class="w-14 h-14 rounded-2xl bg-yellow-50 text-yellow-600 flex items-center justify-center text-2xl shadow-inner group-hover:bg-yellow-500 group-hover:text-white transition-colors duration-300">
                            <i class="fa-solid fa-building-columns"></i>
                        </div>
                    </div>
                    <div class="mt-auto pt-4 border-t border-gray-50 relative z-10">
                        <a href="{{ route('himpunan.index') }}" class="text-xs font-bold text-yellow-600 hover:text-yellow-700 flex items-center gap-1 group/link transition-colors">Lihat Direktori <i class="fa-solid fa-arrow-right transform group-hover/link:translate-x-1 transition-transform"></i></a>
                    </div>
                </div>
                @endif
            </div>

            <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-6 px-4 sm:px-0">
                
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 lg:col-span-2 relative">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-extrabold text-gray-800 flex items-center gap-2">
                            <i class="fa-solid fa-chart-line text-blue-500"></i> Produktivitas Publikasi Berita
                        </h3>
                        <span class="text-[10px] font-bold bg-blue-50 text-blue-600 px-3 py-1.5 rounded-full uppercase tracking-wider">6 Bulan Terakhir</span>
                    </div>
                    <div class="relative w-full" style="height: 300px;">
                        <canvas id="beritaChart"></canvas>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 relative">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-extrabold text-gray-800 flex items-center gap-2">
                            <i class="fa-solid fa-chart-pie text-red-500"></i> Rasio Status Aspirasi
                        </h3>
                    </div>
                    <div class="relative w-full flex justify-center items-center" style="height: 300px;">
                        <canvas id="aspirasiChart"></canvas>
                    </div>
                </div>

            </div>
            </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // Konfigurasi Chart 1: Tren Berita (Garis / Line)
            const ctxBerita = document.getElementById('beritaChart').getContext('2d');
            
            // Membuat efek gradasi warna biru di bawah garis
            let gradientBlue = ctxBerita.createLinearGradient(0, 0, 0, 300);
            gradientBlue.addColorStop(0, 'rgba(59, 130, 246, 0.4)'); // Biru pekat di atas
            gradientBlue.addColorStop(1, 'rgba(59, 130, 246, 0.0)'); // Transparan di bawah

            new Chart(ctxBerita, {
                type: 'line',
                data: {
                    labels: @json($label_bulan),
                    datasets: [{
                        label: 'Total Berita',
                        data: @json($data_berita),
                        borderColor: '#3b82f6', // Warna garis
                        backgroundColor: gradientBlue, // Warna area bawah garis
                        borderWidth: 3,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#3b82f6',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        fill: true,
                        tension: 0.4 // Membuat garis melengkung elegan (smooth curve)
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }, // Sembunyikan legenda atas
                        tooltip: {
                            backgroundColor: '#1e293b',
                            padding: 12,
                            titleFont: { size: 13 },
                            bodyFont: { size: 15, weight: 'bold' },
                            displayColors: false,
                            cornerRadius: 8,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { precision: 0 },
                            grid: { color: '#f1f5f9', drawBorder: false }
                        },
                        x: {
                            grid: { display: false, drawBorder: false }
                        }
                    }
                }
            });

            // Konfigurasi Chart 2: Status Aspirasi (Donat / Doughnut)
            const ctxAspirasi = document.getElementById('aspirasiChart').getContext('2d');
            new Chart(ctxAspirasi, {
                type: 'doughnut',
                data: {
                    labels: @json($label_aspirasi),
                    datasets: [{
                        data: @json($data_aspirasi),
                        backgroundColor: [
                            '#ef4444', // Merah (Misal: Menunggu)
                            '#f59e0b', // Kuning (Misal: Diproses)
                            '#10b981', // Hijau (Misal: Selesai)
                            '#3b82f6', // Biru
                            '#8b5cf6'  // Ungu
                        ],
                        borderWidth: 0,
                        hoverOffset: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '75%', // Ketebalan donat
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                padding: 20,
                                font: { weight: 'bold' }
                            }
                        },
                        tooltip: {
                            backgroundColor: '#1e293b',
                            padding: 12,
                            cornerRadius: 8,
                        }
                    }
                }
            });
            
        });
    </script>
</x-app-layout>