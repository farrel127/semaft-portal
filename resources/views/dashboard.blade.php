@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <!-- Header Dashboard -->
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 px-4 sm:px-0">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-800 tracking-tight">
                    Halo, {{ auth()->user()->name }}! 👋
                </h1>
                <p class="text-sm sm:text-base text-gray-500 mt-1">Pantau pergerakan dan aktivitas SEMA FT hari ini.</p>
            </div>
            <div>
                <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center gap-2 bg-white border border-gray-200 text-gray-700 hover:text-blue-600 hover:bg-gray-50 font-semibold px-4 py-2 rounded-lg shadow-sm transition-all duration-200 text-sm">
                    <i class="fa-solid fa-earth-asia text-blue-500"></i> Kunjungi Web
                </a>
            </div>
        </div>

        <!-- Grid Widget Dinamis -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 px-4 sm:px-0">
            
            {{-- WIDGET ASPIRASI --}}
            @if(auth()->user()->show_aspirasi)
            <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden group border border-gray-100">
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-red-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="flex items-center justify-between relative z-10">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Aspirasi Menunggu</p>
                        <h3 class="text-3xl font-black text-gray-800">12</h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-red-100 text-red-500 flex items-center justify-center text-xl shadow-inner">
                        <i class="fa-solid fa-bullhorn"></i>
                    </div>
                </div>
            </div>
            @endif

            {{-- WIDGET AGENDA --}}
            @if(auth()->user()->show_agenda)
            <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden group border border-gray-100">
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-green-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="flex items-center justify-between relative z-10">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Agenda Aktif</p>
                        <h3 class="text-3xl font-black text-gray-800">4</h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center text-xl shadow-inner">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                </div>
            </div>
            @endif

            {{-- WIDGET BERITA --}}
            @if(auth()->user()->show_berita)
            <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden group border border-gray-100">
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="flex items-center justify-between relative z-10">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Berita</p>
                        <h3 class="text-3xl font-black text-gray-800">38</h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl shadow-inner">
                        <i class="fa-solid fa-newspaper"></i>
                    </div>
                </div>
            </div>
            @endif

            {{-- WIDGET HIMPUNAN --}}
            @if(auth()->user()->show_himpunan)
            <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden group border border-gray-100">
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-yellow-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="flex items-center justify-between relative z-10">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Data Himpunan</p>
                        <h3 class="text-3xl font-black text-gray-800">6</h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-yellow-100 text-yellow-600 flex items-center justify-center text-xl shadow-inner">
                        <i class="fa-solid fa-users-gear"></i>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection