<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-semaft-navy leading-tight flex items-center">
            <i class="fa-solid fa-gauge-high mr-3 text-semaft-gold"></i> {{ __('Dashboard SEMAFT') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-gradient-to-r from-semaft-navy to-blue-900 overflow-hidden shadow-lg sm:rounded-2xl mb-8 relative">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-20 -mt-20 blur-2xl"></div>
                <div class="p-8 relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div class="text-white">
                        <h3 class="text-2xl font-extrabold mb-2">Selamat datang kembali, {{ Auth::user()->name }}! 👋</h3>
                        <p class="text-blue-200 text-sm">
                            Ini adalah pusat kendali Portal SEMAFT. Pantau aspirasi mahasiswa, kelola berita terbaru, dan atur jadwal kegiatan fakultas dari sini.
                        </p>
                    </div>
                    <div class="shrink-0 text-center md:text-right">
                        <div class="inline-block bg-white/10 backdrop-blur-sm rounded-xl px-4 py-2 border border-white/20">
                            <p class="text-xs text-blue-200 uppercase tracking-wider mb-1">Status Sistem</p>
                            <p class="text-sm font-bold text-green-400 flex items-center justify-center md:justify-end gap-2">
                                <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span> Online & Berjalan
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                
                <div class="bg-white rounded-2xl p-6 border-l-4 border-red-500 shadow-sm hover:shadow-md transition group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-bold text-gray-500 mb-1">Aspirasi Menunggu</p>
                            <h4 class="text-3xl font-extrabold {{ $aspirasi_baru > 0 ? 'text-red-500' : 'text-gray-700' }}">{{ $aspirasi_baru }}</h4>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center text-red-500 text-xl group-hover:scale-110 transition">
                            <i class="fa-solid fa-envelope-open-text"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('aspirasi.index') }}" class="text-xs font-bold text-red-500 hover:text-red-700 transition flex items-center gap-1">
                            Cek Kotak Masuk <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 border-l-4 border-green-500 shadow-sm hover:shadow-md transition group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-bold text-gray-500 mb-1">Agenda Aktif</p>
                            <h4 class="text-3xl font-extrabold text-gray-700">{{ $kegiatan_aktif }}</h4>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center text-green-500 text-xl group-hover:scale-110 transition">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('kegiatan.index') }}" class="text-xs font-bold text-green-600 hover:text-green-800 transition flex items-center gap-1">
                            Kelola Kegiatan <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 border-l-4 border-blue-500 shadow-sm hover:shadow-md transition group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-bold text-gray-500 mb-1">Total Berita</p>
                            <h4 class="text-3xl font-extrabold text-gray-700">{{ $total_berita }}</h4>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center text-blue-500 text-xl group-hover:scale-110 transition">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('berita.index') }}" class="text-xs font-bold text-blue-600 hover:text-blue-800 transition flex items-center gap-1">
                            Tulis Artikel Baru <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 border-l-4 border-semaft-gold shadow-sm hover:shadow-md transition group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-bold text-gray-500 mb-1">Data Himpunan</p>
                            <h4 class="text-3xl font-extrabold text-gray-700">{{ $total_himpunan }}</h4>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center text-semaft-gold text-xl group-hover:scale-110 transition">
                            <i class="fa-solid fa-sitemap"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('himpunan.index') }}" class="text-xs font-bold text-yellow-600 hover:text-yellow-800 transition flex items-center gap-1">
                            Update Logo <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
@if(Auth::user()->role === 'superadmin' || (is_array(Auth::user()->hak_akses) && in_array('kalender_lihat', Auth::user()->hak_akses)))
            <div class="bg-white shadow-sm sm:rounded-2xl border border-gray-100 p-4 md:p-6 mb-8 w-full mx-auto relative overflow-hidden">
                
                <div class="flex flex-col items-center justify-center border-b border-gray-100 pb-4 mb-4 gap-3">
                    <h4 class="font-extrabold text-lg text-semaft-navy text-center w-full">
                        <i class="fa-solid fa-calendar-day text-semaft-gold mr-2"></i> Kalender Agenda
                    </h4>
                    
                    <div class="flex items-center justify-between bg-gray-50 rounded-full p-1 border border-gray-200 w-full max-w-[220px]">
                        <button id="prevMonth" class="w-7 h-7 rounded-full flex items-center justify-center text-gray-600 hover:bg-white hover:shadow transition shrink-0">
                            <i class="fa-solid fa-chevron-left text-xs"></i>
                        </button>
                        <h5 id="monthYearDisplay" class="font-bold text-gray-800 text-xs text-center shrink-0 tracking-wide px-1"></h5>
                        <button id="nextMonth" class="w-7 h-7 rounded-full flex items-center justify-center text-gray-600 hover:bg-white hover:shadow transition shrink-0">
                            <i class="fa-solid fa-chevron-right text-xs"></i>
                        </button>
                    </div>
                </div>

                <div class="w-full">
                    <div class="grid grid-cols-7 mb-2 text-center text-[9px] font-extrabold text-gray-400 tracking-tighter">
                        <div>MIN</div>
                        <div>SEN</div>
                        <div>SEL</div>
                        <div>RAB</div>
                        <div>KAM</div>
                        <div>JUM</div>
                        <div>SAB</div>
                    </div>
                    
                    <div id="calendarGrid" class="grid grid-cols-7 gap-y-2 gap-x-1"></div>
                </div>

                <div class="mt-6 flex flex-wrap gap-x-3 gap-y-2 text-[10px] font-bold text-gray-500 justify-center pt-4 border-t border-gray-50">
                    <div class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-blue-500 mr-1.5"></span> Akan Datang</div>
                    <div class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-green-500 mr-1.5"></span> Berlangsung</div>
                    <div class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-gray-400 mr-1.5"></span> Selesai</div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const kegiatanData = @json($jadwal_kegiatan ?? []);
                    const calendarGrid = document.getElementById('calendarGrid');
                    const monthYearDisplay = document.getElementById('monthYearDisplay');
                    let currentDate = new Date();

                    function renderCalendar() {
                        calendarGrid.innerHTML = '';
                        const year = currentDate.getFullYear();
                        const month = currentDate.getMonth();
                        
                        const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                        monthYearDisplay.textContent = `${monthNames[month]} ${year}`;

                        const firstDay = new Date(year, month, 1).getDay();
                        const daysInMonth = new Date(year, month + 1, 0).getDate();
                        const today = new Date();

                        // Kotak Kosong
                        for (let i = 0; i < firstDay; i++) {
                            const emptyDiv = document.createElement('div');
                            emptyDiv.className = 'w-7 h-7 mx-auto bg-transparent';
                            calendarGrid.appendChild(emptyDiv);
                        }

                        // Isi Tanggal
                        for (let day = 1; day <= daysInMonth; day++) {
                            const dateContainer = document.createElement('div');
                            dateContainer.className = 'flex justify-center items-center h-9'; // Container untuk sentralisasi
                            
                            const dateDiv = document.createElement('div');
                            // Ukuran w-7 h-7 menjamin lingkaran sempurna walau di ruang sempit
                            dateDiv.className = 'w-7 h-7 rounded-full flex flex-col items-center justify-center relative group cursor-default transition-colors duration-200';
                            
                            if (day === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                                dateDiv.classList.add('bg-semaft-navy', 'text-white', 'font-bold', 'shadow-md');
                            } else {
                                dateDiv.classList.add('text-gray-700', 'hover:bg-gray-100');
                            }

                            dateDiv.innerHTML = `<span class="text-xs z-10">${day}</span>`;

                            const checkDateString = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                            const agendaHariIni = kegiatanData.filter(k => k.tanggal === checkDateString);
                            
                            if (agendaHariIni.length > 0) {
                                const dotsContainer = document.createElement('div');
                                dotsContainer.className = 'absolute -bottom-1.5 flex gap-0.5 z-10';
                                
                                let tooltipText = '';

                                agendaHariIni.slice(0, 3).forEach(agenda => {
                                    const dot = document.createElement('span');
                                    dot.className = 'w-1 h-1 rounded-full shadow-sm';
                                    
                                    if(agenda.status === 'Akan Datang') dot.classList.add('bg-blue-500');
                                    else if(agenda.status === 'Berlangsung') dot.classList.add('bg-green-500');
                                    else dot.classList.add('bg-gray-400');
                                    
                                    dotsContainer.appendChild(dot);
                                    tooltipText += `• ${agenda.nama_kegiatan} (${agenda.status})\n`;
                                });

                                if (agendaHariIni.length > 3) {
                                    const plusDot = document.createElement('span');
                                    plusDot.className = 'text-[7px] leading-none font-bold text-gray-500';
                                    plusDot.innerText = '+';
                                    dotsContainer.appendChild(plusDot);
                                }

                                dateDiv.appendChild(dotsContainer);
                                dateDiv.title = tooltipText.trim();
                                
                                if (!dateDiv.classList.contains('bg-semaft-navy')) {
                                    dateDiv.classList.remove('hover:bg-gray-100');
                                    dateDiv.classList.add('bg-blue-50/60', 'border', 'border-blue-100');
                                }
                            }

                            dateContainer.appendChild(dateDiv);
                            calendarGrid.appendChild(dateContainer);
                        }
                    }

                    document.getElementById('prevMonth').addEventListener('click', () => {
                        currentDate.setMonth(currentDate.getMonth() - 1);
                        renderCalendar();
                    });

                    document.getElementById('nextMonth').addEventListener('click', () => {
                        currentDate.setMonth(currentDate.getMonth() + 1);
                        renderCalendar();
                    });

                    renderCalendar();
                });
            </script>
            @endif

            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-8 mb-8">
                <h4 class="font-bold text-lg text-semaft-navy mb-6 border-b border-gray-100 pb-3">Grafik Aktivitas Sistem</h4>
                <div class="relative h-72 w-full">
                    <canvas id="semaftChart"></canvas>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-8">
                <h4 class="font-bold text-lg text-semaft-navy mb-6 border-b border-gray-100 pb-3">Aksi Cepat (Shortcut)</h4>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="{{ route('kegiatan.create') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 rounded-xl hover:bg-semaft-navy hover:text-white transition group border border-gray-100">
                        <i class="fa-solid fa-calendar-plus text-2xl text-semaft-gold group-hover:text-white mb-2 transition"></i>
                        <span class="text-sm font-bold text-center">Buat Agenda</span>
                    </a>
                    <a href="{{ route('berita.create') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 rounded-xl hover:bg-semaft-navy hover:text-white transition group border border-gray-100">
                        <i class="fa-solid fa-pen-nib text-2xl text-semaft-gold group-hover:text-white mb-2 transition"></i>
                        <span class="text-sm font-bold text-center">Tulis Berita</span>
                    </a>
                    <a href="{{ url('/') }}" target="_blank" class="flex flex-col items-center justify-center p-4 bg-gray-50 rounded-xl hover:bg-semaft-navy hover:text-white transition group border border-gray-100">
                        <i class="fa-solid fa-globe text-2xl text-semaft-gold group-hover:text-white mb-2 transition"></i>
                        <span class="text-sm font-bold text-center">Lihat Website</span>
                    </a>
                    <a href="{{ route('profile.edit') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 rounded-xl hover:bg-semaft-navy hover:text-white transition group border border-gray-100">
                        <i class="fa-solid fa-user-gear text-2xl text-semaft-gold group-hover:text-white mb-2 transition"></i>
                        <span class="text-sm font-bold text-center">Pengaturan Akun</span>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('semaftChart').getContext('2d');
            
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Berita', 'Aspirasi Masuk', 'Agenda Aktif', 'Himpunan'],
                    datasets: [{
                        label: 'Total Data Sistem',
                        data: [
                            {{ $total_berita ?? 0 }}, 
                            {{ $aspirasi_baru ?? 0 }}, 
                            {{ $kegiatan_aktif ?? 0 }}, 
                            {{ $total_himpunan ?? 0 }}
                        ],
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.7)',
                            'rgba(239, 68, 68, 0.7)',
                            'rgba(34, 197, 94, 0.7)',
                            'rgba(234, 179, 8, 0.7)'
                        ],
                        borderColor: [
                            'rgb(59, 130, 246)',
                            'rgb(239, 68, 68)',
                            'rgb(34, 197, 94)',
                            'rgb(234, 179, 8)'
                        ],
                        borderWidth: 2,
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: { 
                            beginAtZero: true,
                            ticks: { precision: 0 }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>