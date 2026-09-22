<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Mata Pelajaran</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FCF9F2] font-sans text-gray-800 antialiased min-h-screen">

    <!-- KONTEN UTAMA -->
    <main class="w-full">
        
        <!-- TOP HEADER BAR -->
        <header class="bg-white/60 backdrop-blur-md px-8 py-4 flex items-center justify-between text-xs border-b border-stone-200/60 sticky top-0 z-10">
            <div class="flex items-center gap-3">
                <span class="font-bold text-gray-800">Selamat Datang, Bpk. Michael Afton</span>
                <span class="text-gray-300">|</span>
                <span class="text-gray-500 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}
                </span>
                <span class="text-gray-300">•</span>
                <span class="text-gray-500">{{ \Carbon\Carbon::now()->format('H.i') }} WIB</span>
                <span class="bg-[#86F3B0]/40 text-[#0D2F24] font-semibold px-2.5 py-0.5 rounded-full text-[10px]">
                    Semester Ganjil 2026/2027
                </span>
            </div>

            <!-- Profil User Kanan -->
            <div class="flex items-center gap-3">
                <button class="text-gray-400 hover:text-gray-600 p-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                </button>
                <div class="text-right">
                    <span class="block font-bold text-gray-800">Bpk. Michael Afton</span>
                    <span class="block text-[10px] text-gray-500">NIP. 19840214 2008011003</span>
                </div>
                <div class="w-8 h-8 rounded-full bg-amber-200 overflow-hidden border border-gray-300">
                    <img src="https://ui-avatars.com/api/?name=Michael+Afton&background=d97706&color=fff" alt="Avatar" class="w-full h-full object-cover">
                </div>
            </div>
        </header>

        <!-- CONTAINER CONTENT -->
        <div class="p-8 space-y-6 max-w-7xl mx-auto">
            
            <!-- JUDUL HALAMAN & STATS -->
            <div class="flex items-start justify-between">
                <div>
                    <h1 class="text-2xl font-extrabold text-gray-900">Manajemen Mata Pelajaran</h1>
                    <p class="text-xs text-gray-500 mt-1">Kelola daftar kode dan nama mata pelajaran sekolah secara cepat, terstruktur, dan mandiri.</p>
                </div>

                <!-- Card Total Mapel -->
                <div class="bg-white px-5 py-2.5 rounded-2xl shadow-sm border border-stone-200/60 flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-[#86F3B0]/30 text-[#0D2F24] flex items-center justify-center font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <div>
                        <span class="block text-[10px] text-gray-400 font-medium">Total Mapel Aktif</span>
                        <span class="font-extrabold text-xs text-gray-800">
                            {{ method_exists($mapels, 'total') ? $mapels->total() : $mapels->count() }} Mapel
                        </span>
                    </div>
                </div>
            </div>

            <!-- FORM TAMBAH MAPEL -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-stone-200/60 space-y-4">
                <div class="flex items-center gap-2">
                    <div class="w-6 h-6 rounded-full bg-[#86F3B0]/40 text-[#0D2F24] flex items-center justify-center font-bold text-xs">+</div>
                    <h2 class="font-bold text-gray-800 text-xs">Tambah Mata Pelajaran</h2>
                    <span class="bg-[#86F3B0]/40 text-[#0D2F24] text-[10px] font-bold px-2 py-0.5 rounded-full">Mode Baru</span>
                </div>
                <p class="text-[11px] text-gray-400">Ketik kode unik dan nama mata pelajaran lalu tekan simpan</p>

                <!-- Notifikasi Sukses -->
                @if(session('success'))
                    <div class="p-3 bg-emerald-50 text-emerald-800 text-xs rounded-xl border border-emerald-200">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Validasi Error -->
                @if($errors->any())
                    <div class="p-3 bg-red-50 text-red-700 text-xs rounded-xl border border-red-200">
                        <ul class="list-disc pl-5 space-y-0.5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('mapels.store') }}" method="POST" class="flex items-end gap-3">
                    @csrf
                    <!-- Input Kode Mapel -->
                    <div class="w-1/4">
                        <label class="block text-[11px] font-bold text-gray-600 mb-1">Kode Mapel *</label>
                        <input type="text" name="kode_mapel" value="{{ $nextCode ?? 'MP001' }}" readonly 
                               class="w-full bg-[#F5F2EB] border-none rounded-xl px-3 py-2 text-xs font-bold text-gray-700 focus:outline-none cursor-not-allowed">
                    </div>

                    <!-- Input Nama Mapel -->
                    <div class="flex-1">
                        <label class="block text-[11px] font-bold text-gray-600 mb-1">Nama Mata Pelajaran *</label>
                        <input type="text" name="nama_mapel" value="{{ old('nama_mapel') }}" placeholder="Contoh: Pemrograman Web dan Perangkat Bergerak" required
                               class="w-full bg-[#F5F2EB] border-none rounded-xl px-3 py-2 text-xs text-gray-800 focus:bg-white focus:ring-2 focus:ring-emerald-500/30 transition focus:outline-none">
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex items-center gap-2">
                        <button type="submit" class="bg-[#0D2F24] hover:bg-[#082018] text-white px-4 py-2 rounded-xl text-xs font-semibold flex items-center gap-1.5 shadow-sm transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                            Simpan Mapel
                        </button>
                        <button type="reset" class="bg-[#F5F2EB] hover:bg-stone-200 text-gray-600 px-3 py-2 rounded-xl text-xs font-semibold flex items-center gap-1 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                            Reset
                        </button>
                    </div>
                </form>

                <p class="text-[10px] text-gray-400 flex items-center gap-1 pt-1">
                    <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Halaman ini khusus penambahan data katalog mata pelajaran.
                </p>
            </div>

            <!-- TABEL DATA MAPEL -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-stone-200/60 space-y-4">
                
                <!-- Search & Filters -->
                <div class="flex items-center justify-between text-xs">
                    <form action="{{ route('mapels.index') }}" method="GET" class="relative w-72">
                        <svg class="w-3.5 h-3.5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kode atau nama mapel..." 
                               class="w-full pl-9 pr-3 py-2 bg-[#F5F2EB] border-none rounded-xl text-xs focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:outline-none transition"
                               onkeydown="if(event.key === 'Enter') this.form.submit()">
                    </form>

                    <div class="flex items-center gap-4 text-gray-500 text-[11px]">
                        <span>Menampilkan <b>{{ $mapels->count() }}</b> dari total <b>{{ method_exists($mapels, 'total') ? $mapels->total() : $mapels->count() }}</b> mata pelajaran</span>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead>
                            <tr class="bg-[#F5F2EB]/60 text-gray-500 font-bold uppercase text-[10px]">
                                <th class="py-3 px-4 rounded-l-xl w-16">NO</th>
                                <th class="py-3 px-4 w-28">KODE</th>
                                <th class="py-3 px-4">NAMA MATA PELAJARAN</th>
                                <th class="py-3 px-4 text-center rounded-r-xl w-36">AKSI</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100 font-medium text-gray-700">
                            @forelse($mapels as $index => $mapel)
                                <tr class="hover:bg-stone-50/80 transition">
                                    <td class="py-3.5 px-4 text-gray-400">
                                        {{ method_exists($mapels, 'firstItem') ? $mapels->firstItem() + $index : $index + 1 }}
                                    </td>
                                    <td class="py-3.5 px-4">
                                        <span class="bg-[#F5F2EB] px-2 py-0.5 rounded-md text-gray-600 font-semibold text-[11px]">{{ $mapel->kode_mapel }}</span>
                                    </td>
                                    <td class="py-3.5 px-4 font-bold text-gray-800">{{ $mapel->nama_mapel }}</td>
                                    <td class="py-3.5 px-4 text-center">
                                        <div class="flex items-center justify-center gap-1.5">
                                            @if(Route::has('mapels.edit'))
                                                <a href="{{ route('mapels.edit', $mapel->id) }}" 
                                                   class="bg-emerald-50 text-emerald-700 hover:bg-emerald-100 px-2.5 py-1 rounded-lg text-[10px] font-bold flex items-center gap-1 transition">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21 3 21v-3.572L16.732 3.732z"/></svg> Edit
                                                </a>
                                            @endif
                                            <form action="{{ route('mapels.destroy', $mapel->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-red-50 text-red-600 hover:bg-red-100 px-2.5 py-1 rounded-lg text-[10px] font-bold flex items-center gap-1 transition">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-6 text-center text-gray-400">Belum ada data mata pelajaran.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Nav (Hanya tampil jika memanggil paginate() di Controller) -->
                @if(method_exists($mapels, 'links'))
                    <div class="pt-3">
                        {{ $mapels->withQueryString()->links() }}
                    </div>
                @endif

            </div>

        </div>
    </main>

</body>
</html>