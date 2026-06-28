<footer class="bg-semaft-navy text-gray-300 pt-16 pb-12 md:pb-16 border-t-[6px] border-semaft-gold mt-auto relative overflow-hidden z-10">
        
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-semaft-gold rounded-full blur-[120px] opacity-20 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 mt-8 md:mt-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10 mb-4 items-start">
                
                <div class="space-y-5">
                    <a href="{{ url('/') }}" class="flex items-center gap-3 mb-4 group inline-flex shrink-0">
                        <div class="bg-white p-1.5 rounded-xl shrink-0">
                            <img src="{{ asset('images/sema.png') }}" alt="Logo SEMAFT" class="h-10 sm:h-12 w-auto object-contain">
                        </div>
                        <span class="font-extrabold text-2xl tracking-widest text-white">SEMA<span class="text-semaft-gold">FT</span></span>
                    </a>
                    <p class="text-sm leading-relaxed text-gray-400">
                        Senat Mahasiswa Fakultas Teknik Universitas Sangga Buana YPKP. Wadah aspirasi dan sinergi untuk membangun mahasiswa teknik yang solid dan inovatif.
                    </p>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-6 relative inline-block pt-4">
                        <span class="absolute top-0 left-0 w-12 h-1 bg-semaft-gold rounded-full"></span>
                        Sponsored By
                    </h3>
                    
                    <div class="flex flex-col space-y-4">
                        <div class="bg-white/5 border border-white/10 rounded-xl p-3 flex items-center gap-4 hover:bg-white/10 transition-colors group cursor-pointer">
                            <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center p-2 shrink-0">
                                <img src="{{ asset('images/kahf.png') }}" alt="Kahf" class="max-h-full max-w-full object-contain grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100 transition-all">
                            </div>
                            <div class="flex flex-col">
                                <span class="font-bold text-gray-200">Kahf</span>
                                <span class="text-xs text-gray-500">Official Partner</span>
                            </div>
                        </div>

                        <div class="bg-white/5 border border-white/10 rounded-xl p-3 flex items-center gap-4 hover:bg-white/10 transition-colors group cursor-pointer">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center shrink-0 shadow-inner">
                                <i class="fa-solid fa-wallet text-white text-lg"></i>
                            </div>
                            <div class="flex flex-col">
                                <span class="font-extrabold text-gray-200 tracking-tight group-hover:text-blue-400 transition-colors">Flux<span class="font-light">Wallet</span></span>
                                <span class="text-xs text-gray-500">Financial Tech Support</span>
                            </div>
                        </div>

                        <div class="bg-white/5 border border-white/10 rounded-xl p-3 flex items-center gap-4 hover:bg-white/10 transition-colors group cursor-pointer">
                            <div class="w-12 h-12 bg-[#232F3E] rounded-lg flex items-center justify-center p-2 shrink-0">
                                <i class="fa-brands fa-aws text-2xl text-white opacity-80 group-hover:opacity-100 transition-opacity"></i>
                            </div>
                            <div class="flex flex-col">
                                <span class="font-bold text-gray-200">AWS Educate</span>
                                <span class="text-xs text-gray-500">Cloud Infrastructure</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
    <h3 class="text-white font-bold text-lg mb-6 relative inline-block pt-4">
        <span class="absolute top-0 left-0 w-12 h-1 bg-semaft-gold rounded-full"></span>
        Layanan Humas
    </h3>
    
    <div class="space-y-4">
        <a href="https://wa.me/6281234567890" target="_blank" class="flex items-center gap-4 bg-green-500/10 border border-green-500/30 text-green-400 hover:bg-green-500 hover:text-white px-4 py-3.5 rounded-xl transition-all font-bold text-sm shadow-sm">
            <i class="fa-brands fa-whatsapp text-xl shrink-0"></i> Chat WhatsApp
        </a>
        <a href="mailto:semaft.usb@gmail.com" class="flex items-center gap-4 bg-white/5 border border-white/10 text-gray-300 hover:bg-white hover:text-semaft-navy px-4 py-3.5 rounded-xl transition-all text-sm font-bold shadow-sm">
            <i class="fa-solid fa-envelope text-semaft-gold shrink-0"></i> 
            <span class="truncate">semaft.usb@gmail.com</span>
        </a>
    </div>

    <div class="mt-12">
        <h4 class="text-xs font-bold text-gray-400 tracking-[0.15em] uppercase mb-4 flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
            Live Traffic
        </h4>
        
        <div class="bg-white/5 border border-white/10 rounded-2xl p-4 flex flex-col gap-3 shadow-inner">
            
            <div class="flex items-center justify-between group cursor-default">
                <div class="flex items-center gap-3 text-gray-400 group-hover:text-white transition-colors">
                    <div class="w-8 h-8 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shadow-sm">
                        <i class="fa-solid fa-user-clock text-xs"></i>
                    </div>
                    <span class="text-sm font-medium">Hari ini</span>
                </div>
                <span class="text-white font-black font-mono tracking-wider">
                    {{ number_format($todayVisitors, 0, ',', '.') }}
                </span>
            </div>

            <div class="flex items-center justify-between group cursor-default">
                <div class="flex items-center gap-3 text-gray-400 group-hover:text-white transition-colors">
                    <div class="w-8 h-8 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shadow-sm">
                        <i class="fa-solid fa-calendar-days text-xs"></i>
                    </div>
                    <span class="text-sm font-medium">Bulan ini</span>
                </div>
                <span class="text-white font-black font-mono tracking-wider">
                    {{ number_format($monthVisitors, 0, ',', '.') }}
                </span>
            </div>

            <div class="flex items-center justify-between group pt-4 border-t border-white/10 cursor-default">
                <div class="flex items-center gap-3 text-gray-400 group-hover:text-semaft-gold transition-colors">
                    <div class="w-8 h-8 rounded-xl bg-semaft-gold/10 border border-semaft-gold/20 text-semaft-gold flex items-center justify-center shadow-sm">
                        <i class="fa-solid fa-chart-line text-xs"></i>
                    </div>
                    <span class="text-sm font-bold">Total Kunjungan</span>
                </div>
                <span class="text-semaft-gold font-black font-mono tracking-wider text-lg drop-shadow-[0_0_8px_rgba(244,195,50,0.5)]">
                    {{ number_format($totalVisitors, 0, ',', '.') }}
                </span>
            </div>

        </div>
    </div>
</div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-6 relative inline-block pt-4">
                        <span class="absolute top-0 left-0 w-12 h-1 bg-semaft-gold rounded-full"></span>
                        Terkoneksi
                    </h3>
                    <div class="mb-8">
                        <a href="https://instagram.com/semaft_usby" target="_blank" class="flex items-center gap-3 bg-semaft-navy border border-pink-500 px-5 py-3 rounded-xl hover:bg-pink-600 transition-colors group">
                            <i class="fa-brands fa-instagram text-xl text-white shrink-0 group-hover:scale-110 transition-transform"></i>
                            <span class="font-bold text-sm text-white truncate">@semaft_usby</span>
                        </a>
                    </div>
                    
                    <div>
                        <p class="text-xs text-gray-400 mb-4 font-semibold tracking-wider uppercase">Bagikan Portal Ini</p>
                        <div class="flex flex-wrap gap-3">
                            <button class="w-12 h-12 shrink-0 rounded-full bg-white/10 border border-white/10 hover:bg-semaft-gold hover:text-semaft-navy transition-all flex items-center justify-center">
                                <i class="fa-solid fa-link"></i>
                            </button>
                            <a href="#" class="w-12 h-12 shrink-0 rounded-full bg-white/10 border border-white/10 hover:bg-[#25D366] hover:text-white transition-all flex items-center justify-center">
                                <i class="fa-brands fa-whatsapp text-lg"></i>
                            </a>
                            <a href="#" class="w-12 h-12 shrink-0 rounded-full bg-white/10 border border-white/10 hover:bg-black hover:text-white transition-all flex items-center justify-center">
                                <i class="fa-brands fa-x-twitter text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="border-t border-white/10 pt-5 mt-4 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-400 font-medium">
                <p>&copy; {{ date('Y') }} Senat Mahasiswa Fakultas Teknik USB YPKP.</p>
                <p>Designed with by vicnitnizzmt</p>
            </div>
        </div>
    </footer>