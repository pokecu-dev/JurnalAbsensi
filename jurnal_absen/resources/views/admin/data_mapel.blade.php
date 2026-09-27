<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mapel - Jurnal Absensi</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-green': '#132E27',
                        'medium-green': '#3B7A69',
                        'mint-green': '#89D7B7',
                        'cream-bg': '#FFF5EA',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-cream-bg text-gray-800 antialiased min-h-screen flex">

    <!-- ================= SIDEBAR ================= -->
    <aside class="hidden md:flex md:w-56 bg-dark-green text-white flex-col justify-between p-5 shrink-0 h-screen sticky top-0">
        <div>
            <!-- LOGO BRAND -->
            <div class="flex flex-col items-center justify-center gap-1.5 mb-6 text-center">
                <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-12 h-auto object-contain">
                <span class="text-sm font-bold tracking-wide">Jurnal Absensi</span>
            </div>

            <!-- MENU NAVIGASI -->
            <nav class="flex flex-col gap-4 text-xs font-semibold">
                <div>
                    <div class="text-[10px] uppercase font-extrabold text-gray-400 tracking-wider mb-1.5 px-2">Utama</div>
                    <div class="space-y-0.5">
                        <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 transition">
                            <i class="fa-solid fa-house w-4 text-center"></i> Dashboard
                        </a>
                        <a href="{{ url('/admin/monitoring_jurnal') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 transition">
                            <i class="fa-solid fa-book-bookmark w-4 text-center"></i> Monitoring Jurnal
                        </a>
                        <a href="{{ url('/admin/data_dispensasi') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 transition">
                            <i class="fa-solid fa-file-signature w-4 text-center"></i> Dispensasi
                        </a>
                    </div>
                </div>

                <div>
                    <div class="text-[10px] uppercase font-extrabold text-gray-400 tracking-wider mb-1.5 px-2">Data Master</div>
                    <div class="space-y-0.5">
                        <a href="{{ url('/admin/data_guru') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 transition">
                            <i class="fa-solid fa-chalkboard-user w-4 text-center"></i> Data Guru
                        </a>
                        <a href="{{ url('/admin/data_siswa') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 transition">
                            <i class="fa-solid fa-user-graduate w-4 text-center"></i> Data Siswa
                        </a>
                        <a href="{{ url('/admin/data_kelas') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 transition">
                            <i class="fa-solid fa-school w-4 text-center"></i> Data Kelas
                        </a>
                        <a href="{{ url('/admin/data_mapel') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl bg-white/10 text-mint-green font-bold">
                            <i class="fa-solid fa-book-open w-4 text-center"></i> Mata Pelajaran
                        </a>
                        <a href="{{ url('/admin/jadwal') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 transition">
                            <i class="fa-solid fa-calendar-days w-4 text-center"></i> Jadwal
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="flex flex-col gap-1 pt-3 border-t border-white/10 text-xs">
            <a href="{{ url('/admin/akun') }}" class="flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 transition">
                <i class="fa-solid fa-user-circle w-4"></i>
                <span>Akun Admin</span>
            </a>
            <a href="{{ route('logout') }}" class="w-full flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 transition">
                <i class="fa-solid fa-right-from-bracket w-4"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- ================= MAIN CONTENT ================= -->
    <div class="flex-1 flex flex-col min-w-0 bg-cream-bg">
        <main class="p-8 space-y-6 flex-1">
            
            <!-- HEADER HALAMAN -->
            <div>
                <span class="text-[11px] font-extrabold uppercase tracking-wider text-medium-green block mb-0.5">DATA MASTER</span>
               <h1 class="text-xl md:text-2xl font-extrabold text-dark-green"> Data Mata Pelajaran</h1>
                <p class="text-xs text-gray-500 font-medium mt-1">Kelola dan tambahkan seluruh mata pelajaran terdaftar.</p>
            </div>

            <!-- Flash Message Alert Success -->
            @if (session('success'))
                <div class="p-4 rounded-xl bg-emerald-100/70 border border-emerald-300 text-emerald-900 flex items-center justify-between shadow-sm text-xs font-semibold">
                    <div class="flex items-center space-x-2">
                        <i class="fa-solid fa-circle-check text-emerald-600 text-sm"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-emerald-700 hover:text-emerald-900">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            @endif

            <!-- Flash Message Alert Error -->
            @if (session('error'))
                <div class="p-4 rounded-xl bg-red-100/70 border border-red-300 text-red-900 flex items-center justify-between shadow-sm text-xs font-semibold">
                    <div class="flex items-center space-x-2">
                        <i class="fa-solid fa-circle-exclamation text-red-600 text-sm"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-red-700 hover:text-red-900">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            @endif

            <!-- CARD TAMBAH MAPEL LANGSUNG & PENCARIAN -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">
                
                <!-- FORM INPUT TAMBAH MAPEL LANGSUNG (7 Kolom) -->
                <div class="lg:col-span-7 bg-white rounded-2xl p-4 shadow-sm border border-gray-100/60">
                    <form action="{{ route('admin.data_mapel.store') }}" method="POST" class="flex flex-col sm:flex-row items-center gap-3">
                        @csrf
                        <div class="relative w-full flex-1">
                            <i class="fa-solid fa-book-open absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Ketik nama mata pelajaran baru..." class="w-full pl-9 pr-4 py-2 bg-gray-50/50 border border-gray-200 rounded-xl text-xs focus:outline-none focus:border-medium-green focus:ring-1 focus:ring-medium-green transition-all" required>
                        </div>
                        <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-dark-green hover:bg-opacity-90 text-white text-xs font-bold px-4 py-2 rounded-xl transition-all shadow-sm shrink-0">
                            <i class="fa-solid fa-plus"></i>
                            <span>Tambah Mapel</span>
                        </button>
                    </form>
                    @error('name')
                        <p class="text-red-500 text-[11px] font-semibold mt-1.5 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CARI MAPEL OTOMATIS (5 Kolom) -->
                <div class="lg:col-span-5 bg-white rounded-2xl p-4 shadow-sm border border-gray-100/60">
                    <form id="searchForm" action="{{ url('/admin/data_mapel') }}" method="GET" class="flex items-center gap-2">
                        <div class="relative w-full">
                            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                            <input type="text" id="searchInput" name="search" value="{{ request('search') }}" placeholder="Cari nama mapel..." class="w-full pl-9 pr-4 py-2 bg-gray-50/50 border border-gray-200 rounded-xl text-xs focus:outline-none focus:border-medium-green focus:ring-1 focus:ring-medium-green transition-all" autocomplete="off">
                        </div>

                        <!-- Tombol Reset Manual jika ada keyword -->
                        @if(request('search'))
                            <a href="{{ url('/admin/data_mapel') }}" class="inline-flex items-center justify-center gap-1.5 bg-gray-100 hover:bg-gray-200 text-gray-600 text-xs font-bold px-3 py-2 rounded-xl transition-all shrink-0" title="Reset Pencarian">
                                <i class="fa-solid fa-rotate-left text-xs"></i>
                                <span>Reset</span>
                            </a>
                        @endif
                    </form>
                </div>

            </div>

            <!-- CARD TABEL DATA -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100/60 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="bg-gray-50/80 text-gray-500 font-bold border-b border-gray-100 text-[11px] uppercase tracking-wider">
                            <tr>
                                <th class="py-4 px-6 w-16 text-center">No</th>
                                <th class="py-4 px-6">Nama Mata Pelajaran</th>
                                <th class="py-4 px-6 w-28 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 font-medium text-gray-700">
                            @forelse ($mapels as $index => $mapel)
                                <tr class="hover:bg-gray-50/60 transition-colors">
                                    <td class="py-4 px-6 text-center font-bold text-gray-400">
                                        {{ method_exists($mapels, 'firstItem') ? $mapels->firstItem() + $index : $index + 1 }}
                                    </td>
                                    <td class="py-4 px-6 font-bold text-gray-800 text-sm">
                                        {{ $mapel->name }}
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <div class="flex items-center justify-center">
                                            <form action="{{ url('/admin/data_mapel/' . $mapel->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data mapel ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus Mapel">
                                                    <i class="fa-solid fa-trash-can text-sm"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-12 text-center text-gray-400">
                                        <div class="flex flex-col items-center justify-center space-y-2">
                                            <i class="fa-solid fa-book-open-reader text-4xl text-gray-300"></i>
                                            <p class="text-xs font-semibold">Tidak ada mata pelajaran yang cocok.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if(method_exists($mapels, 'hasPages') && $mapels->hasPages())
                    <div class="p-4 border-t border-gray-100 bg-gray-50/50">
                        {{ $mapels->links() }}
                    </div>
                @endif
            </div>
        </main>
    </div>

    <!-- SCRIPT JAVASCRIPT UNTUK LIVE SEARCH & AUTO RESET -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const searchForm = document.getElementById('searchForm');
            let timer = null;

            if (searchInput) {
                // Pertahankan fokus kursor di akhir kata setelah halaman dimuat ulang
                if (searchInput.value) {
                    searchInput.focus();
                    const val = searchInput.value;
                    searchInput.value = '';
                    searchInput.value = val;
                }

                // Jalankan pencarian otomatis saat user mengetik atau menghapus teks
                searchInput.addEventListener('input', function () {
                    clearTimeout(timer);
                    
                    // Menunggu 0.4 detik (400ms) setelah user berhenti mengetik
                    timer = setTimeout(() => {
                        searchForm.submit();
                    }, 400);
                });
            }
        });
    </script>

</body>
</html>