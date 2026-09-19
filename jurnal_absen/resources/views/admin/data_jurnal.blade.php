<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Jurnal Kelas - Waka</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-green': '#1A312C',
                        'medium-green': '#428475',
                        'mint-green': '#89D7B7',
                        'bg-cream': '#FFF4E1',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-bg-cream text-dark-green font-sans flex min-h-screen">

    <!-- 1. SIDEBAR (Pakai Struktur Baru + Data Master) -->
    <aside class="hidden md:flex md:w-56 bg-dark-green text-white flex-col justify-between p-5 shrink-0 h-screen sticky top-0">
        <div>
            <!-- LOGO BRAND -->
            <div class="flex flex-col items-center justify-center gap-1.5 mb-6 text-center">
                <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-12 h-auto object-contain">
                <span class="text-sm font-bold tracking-wide">Jurnal Absensi</span>
            </div>

            <!-- MENU NAVIGASI (Dengan Grup) -->
            <nav class="flex flex-col gap-4 text-xs font-semibold">
                <!-- Grup Utama -->
                <div>
                    <div class="text-[10px] uppercase font-extrabold text-gray-400 tracking-wider mb-1.5 px-2">Utama</div>
                    <div class="space-y-0.5">
                        <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-house w-4 text-center"></i> Dashboard
                        </a>
                        <a href="{{ url('/admin/monitoring_jurnal') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl bg-white/10 text-mint-green font-bold">
                            <i class="fa-solid fa-book-bookmark w-4 text-center"></i> Monitoring Jurnal
                        </a>
                        <a href="{{ url('/admin/data_dispensasi') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-file-signature w-4 text-center"></i> Dispensasi
                        </a>
                    </div>
                </div>

                <!-- Grup Data Master -->
                <div>
                    <div class="text-[10px] uppercase font-extrabold text-gray-400 tracking-wider mb-1.5 px-2">Data Master</div>
                    <div class="space-y-0.5">
                        <a href="{{ url('/admin/data_guru') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-chalkboard-user w-4 text-center"></i> Data Guru
                        </a>
                        <a href="{{ url('/admin/data_siswa') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-user-graduate w-4 text-center"></i> Data Siswa
                        </a>
                        <a href="{{ url('/admin/data_kelas') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-school w-4 text-center"></i> Data Kelas
                        </a>
                        <a href="{{ url('/admin/data_mapel') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-book-open w-4 text-center"></i> Mata Pelajaran
                        </a>
                        <a href="{{ url('/admin/jadwal') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-calendar-days w-4 text-center"></i> Jadwal
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- FOOTER SIDEBAR -->
        <div class="flex flex-col gap-1 pt-3 border-t border-white/10 text-xs">
            <button class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 transition w-full text-left">
                <i class="fa-solid fa-gear w-4 text-center"></i> Pengaturan
            </button>
            <button class="flex items-center gap-3 px-3 py-2 rounded-xl text-red-400 hover:bg-red-500/10 transition w-full text-left">
                <i class="fa-solid fa-arrow-right-from-bracket w-4 text-center"></i> Logout
            </button>
        </div>
    </aside>

    <!-- 2. MAIN CONTENT -->
    <main class="flex-1 p-4 md:p-6 overflow-y-auto">
        
        <!-- HEADER RINGKAS (Tanpa Paragraf Panjang) -->
        <header class="mb-5 flex justify-between items-center">
            <div>
                <h1 class="text-xl md:text-2xl font-extrabold text-dark-green">Monitoring Jurnal Kelas</h1>
                <p class="text-xs text-medium-green font-medium">Pantau keterisian buku jurnal KBM harian seluruh rombel.</p>
            </div>
            <div class="text-right text-xs font-semibold text-gray-500 hidden sm:block">
                <span>Selasa, 21 Juli 2026</span>
            </div>
        </header>

        <!-- KARTU METRIK RINGKAS (Tombol 'Tambah Jurnal' Sudah Dihapus Biar Rapi) -->
        <section class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-5">
            <div class="bg-white p-3.5 rounded-2xl shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">Rombel Aktif</span>
                    <span class="text-xl font-black text-dark-green">24 <small class="text-xs font-medium text-emerald-600">Kelas</small></span>
                </div>
                <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center text-sm">
                    <i class="fa-solid fa-school"></i>
                </div>
            </div>

            <div class="bg-white p-3.5 rounded-2xl shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">Keterisian KBM</span>
                    <span class="text-xl font-black text-dark-green">91.7%</span>
                </div>
                <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-sm">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
            </div>

            <div class="bg-white p-3.5 rounded-2xl shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">Valid Sekre</span>
                    <span class="text-xl font-black text-dark-green">118 <small class="text-xs font-medium text-gray-400">Sesi</small></span>
                </div>
                <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
            </div>

            <div class="bg-white p-3.5 rounded-2xl shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">Atensi Waka</span>
                    <span class="text-xl font-black text-red-600">3 <small class="text-xs font-medium text-red-500">Sesi</small></span>
                </div>
                <div class="w-9 h-9 rounded-xl bg-red-50 text-red-600 flex items-center justify-center text-sm">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
            </div>
        </section>

        <!-- FILTER TOOLBAR (Simpel) -->
        <section class="bg-white p-3 rounded-2xl shadow-sm mb-5 flex flex-wrap gap-2 items-center">
            <input type="date" value="2026-07-21" class="bg-gray-50 border border-gray-200 text-xs font-bold rounded-xl px-3 py-2 text-dark-green outline-none">
            
            <select class="bg-gray-50 border border-gray-200 text-xs font-bold rounded-xl px-3 py-2 text-dark-green outline-none">
                <option>Tingkat XI (Fase F)</option>
            </select>

            <select class="bg-gray-50 border border-gray-200 text-xs font-bold rounded-xl px-3 py-2 text-dark-green outline-none">
                <option>Semua Konsentrasi Keahlian</option>
            </select>

            <input type="text" placeholder="Cari kelas / guru..." class="bg-gray-50 border border-gray-200 text-xs font-medium rounded-xl px-3 py-2 text-dark-green outline-none flex-1 min-w-[150px]">
        </section>

        <!-- KARTU KELAS 1 (XI RPL 2) -->
        <section class="bg-white rounded-2xl shadow-sm overflow-hidden mb-4 border border-emerald-100">
            <!-- Header Kartu Kelas -->
            <div class="bg-emerald-50/50 p-4 border-b border-emerald-100 flex flex-wrap justify-between items-center gap-2">
                <div class="flex items-center gap-3">
                    <div class="bg-dark-green text-mint-green font-black px-3 py-1.5 rounded-xl text-xs">
                        XI RPL 2
                    </div>
                    <div>
                        <div class="text-sm font-extrabold text-dark-green flex items-center gap-2">
                            Kelas XI Rekayasa Perangkat Lunak 2 
                            <span class="bg-emerald-100 text-emerald-800 text-[10px] font-bold px-2 py-0.5 rounded-md">4/4 Sesi Valid</span>
                        </div>
                        <div class="text-[11px] text-gray-500 font-medium">
                            Walikelas: <b>Budi Santoso, S.Kom.</b> • Presensi: <span class="text-emerald-700 font-bold">34/36 Hadir</span>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/data_kelas/1/siswa') }}" class="bg-white hover:bg-gray-50 text-dark-green border border-gray-200 text-xs font-bold px-3 py-1.5 rounded-xl transition flex items-center gap-1.5">
                    <i class="fa-solid fa-users text-medium-green"></i> Inspeksi Siswa
                </a>
            </div>

            <!-- List Jam Pelajaran Kronologis -->
            <div class="p-4 space-y-3 text-xs">
                <!-- Jam 1-2 -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between p-2.5 rounded-xl bg-gray-50 hover:bg-emerald-50/30 transition gap-2">
                    <div class="flex items-start gap-3">
                        <div class="font-bold text-gray-400 w-20 shrink-0">Jam 1 - 2<br><small class="font-normal text-[10px]">07.00 - 08.20</small></div>
                        <div>
                            <div class="font-extrabold text-dark-green">Matematika Terapan</div>
                            <div class="text-[11px] text-gray-500">Sulistyowati, S.Pd. • <span class="text-emerald-600 font-medium">Materi: Polynomial & Teorema Sisa</span></div>
                        </div>
                    </div>
                    <span class="bg-emerald-100 text-emerald-800 font-bold px-2.5 py-1 rounded-lg text-[10px] self-start sm:self-center">
                        <i class="fa-solid fa-check-double mr-1"></i> Validasi Sekretaris
                    </span>
                </div>

                <!-- Jam 3-4 -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between p-2.5 rounded-xl bg-gray-50 hover:bg-emerald-50/30 transition gap-2">
                    <div class="flex items-start gap-3">
                        <div class="font-bold text-gray-400 w-20 shrink-0">Jam 3 - 4<br><small class="font-normal text-[10px]">08.20 - 09.40</small></div>
                        <div>
                            <div class="font-extrabold text-dark-green">Bimbingan Konseling (BK)</div>
                            <div class="text-[11px] text-gray-500">Widodo, S.Kom. • <span class="text-amber-600 font-medium">Tugas Piket: Asesmen Diagnostik</span></div>
                        </div>
                    </div>
                    <span class="bg-amber-100 text-amber-800 font-bold px-2.5 py-1 rounded-lg text-[10px] self-start sm:self-center">
                        <i class="fa-solid fa-user-shield mr-1"></i> Disposisi Piket ACC
                    </span>
                </div>

                <!-- Jam 5-6 -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between p-2.5 rounded-xl bg-gray-50 hover:bg-emerald-50/30 transition gap-2">
                    <div class="flex items-start gap-3">
                        <div class="font-bold text-gray-400 w-20 shrink-0">Jam 5 - 6<br><small class="font-normal text-[10px]">10.00 - 11.20</small></div>
                        <div>
                            <div class="font-extrabold text-dark-green">Bahasa Daerah (Jawa)</div>
                            <div class="text-[11px] text-gray-500">Laili Ermawati, M.Pd. • <span class="text-emerald-600 font-medium">Materi: Geguritan</span></div>
                        </div>
                    </div>
                    <span class="bg-emerald-100 text-emerald-800 font-bold px-2.5 py-1 rounded-lg text-[10px] self-start sm:self-center">
                        <i class="fa-solid fa-check-double mr-1"></i> Validasi Sekretaris
                    </span>
                </div>
            </div>
            <!-- Footnote Panjang Sudah Dihapus Agar Tidak Kebanyakan Teks -->
        </section>

    </main>

</body>
</html>