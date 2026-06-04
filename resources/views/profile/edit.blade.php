<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-6">
    <div class="max-w-xl">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                Pengaturan Tampilan Dashboard
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                Pilih widget apa saja yang ingin Anda tampilkan di halaman dashboard.
            </p>
        </header>

        <form method="post" action="{{ route('profile.widget') }}" class="mt-6 space-y-6">
            @csrf
            
            <div class="space-y-4">
                {{-- Toggle Aspirasi --}}
                <label class="flex items-center justify-between cursor-pointer p-3 bg-gray-50 rounded-lg">
                    <span class="text-sm font-medium text-gray-700">Widget Aspirasi</span>
                    <input type="checkbox" name="show_aspirasi" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" {{ auth()->user()->show_aspirasi ? 'checked' : '' }}>
                </label>

                {{-- Toggle Agenda --}}
                <label class="flex items-center justify-between cursor-pointer p-3 bg-gray-50 rounded-lg">
                    <span class="text-sm font-medium text-gray-700">Widget Agenda</span>
                    <input type="checkbox" name="show_agenda" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" {{ auth()->user()->show_agenda ? 'checked' : '' }}>
                </label>

                {{-- Toggle Berita --}}
                <label class="flex items-center justify-between cursor-pointer p-3 bg-gray-50 rounded-lg">
                    <span class="text-sm font-medium text-gray-700">Widget Berita</span>
                    <input type="checkbox" name="show_berita" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" {{ auth()->user()->show_berita ? 'checked' : '' }}>
                </label>

                {{-- Toggle Himpunan --}}
                <label class="flex items-center justify-between cursor-pointer p-3 bg-gray-50 rounded-lg">
                    <span class="text-sm font-medium text-gray-700">Widget Himpunan</span>
                    <input type="checkbox" name="show_himpunan" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" {{ auth()->user()->show_himpunan ? 'checked' : '' }}>
                </label>
            </div>

            <div class="flex items-center gap-4 mt-6">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition">
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
</div>