<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Waka - Simple & Clean</title>
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

    <!-- SIDEBAR (Sembunyi di HP, Tampil di Laptop) -->
    <aside class="hidden md:flex md:w-52 bg-dark-green text-white flex-col justify-between p-5 shrink-0 h-screen sticky top-0">
        <div>
            <!-- LOGO -->
            <div class="flex flex-col items-center justify-center gap-2 mb-8 text-center">
                <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-14 h-auto object-contain">
                <span class="text-sm font-bold tracking-wide">Jurnal Absensi</span>
            </div>

            <!-- MENU NAVIGASI -->
            <nav class="flex flex-col gap-1 text-xs font-semibold text-gray-300">
                <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-white/10 text-mint-green font-bold">
                    <i class="fa-solid fa-house text-sm w-4"></i> Dashboard
                </a>
                <a href="{{ url('/admin/data_guru') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-white/5 hover:text-white transition">
                    <i class="fa-solid fa-book text-sm w-4"></i> Data Guru
                </a>
                <a href="{{ url('/admin/data_siswa') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-white/5 hover:text-white transition">
                    <i class="fa-regular fa-calendar-days text-sm w-4"></i> Data Siswa
                </a>
                <a href="{{ url('/admin/data_kelas') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-white/5 hover:text-white transition">
                    <i class="fa-solid fa-chalkboard text-sm w-4"></i> Data Kelas
                </a>
                <a href="{{ url('/admin/data_mapel') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-white/5 hover:text-white transition">
                    <i class="fa-solid fa-book-open text-sm w-4"></i> Mata Pelajaran
                </a>
                <a href="{{ url('/admin/data_jurnal') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-white/5 hover:text-white transition">
                    <i class="fa-solid fa-list-check text-sm w-4"></i> Data Jurnal
                </a>
                <a href="{{ url('/admin/data_dispensasi') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-white/5 hover:text-white transition">
                    <i class="fa-solid fa-user-check text-sm w-4"></i> Data Dispensasi
                </a>
            </nav>
        </div>

        <!-- FOOTER SIDEBAR -->
        <div class="flex flex-col gap-2 pt-4 border-t border-white/10 text-xs">
            <button class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-white/5 text-white hover:bg-white/15 transition w-full text-left">
                <i class="fa-regular fa-user text-sm w-4"></i> Profile
            </button>
            <button class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-white/5 text-red-400 hover:bg-red-500/20 transition w-full text-left">
                <i class="fa-solid fa-arrow-right-from-bracket text-sm w-4"></i> Logout
            </button>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-4 md:p-8 overflow-y-auto">
        
        <!-- HEADER RINGKAS -->
        <header class="mb-5 flex justify-between items-center">
            <div>
                <h1 class="text-xl md:text-2xl font-extrabold text-dark-green">Dashboard Waka</h1>
                <p class="text-xs text-medium-green font-medium">SMK Negeri 1 Boyolangu</p>
            </div>
            <!-- Tanggal Ringkas -->
            <div class="text-right text-xs font-semibold text-gray-500 hidden sm:block">
                <span>Selasa, 21 Juli 2026</span>
            </div>
        </header>

        <!-- 1. KARTU METRIK RINGKAS (Auto Responsive Grid) -->
        <section class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4 mb-6">
            <!-- Dispen -->
            <div class="bg-white p-3.5 md:p-4 rounded-2xl shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-[10px] md:text-xs font-bold text-gray-400 uppercase tracking-wider block">Dispen</span>
                    <span class="text-xl md:text-2xl font-black text-amber-600">5</span>
                </div>
                <div class="w-9 h-9 md:w-10 md:h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-sm md:text-base">
                    <i class="fa-solid fa-clock"></i>
                </div>
            </div>

            <!-- Jurnal Pending -->
            <div class="bg-white p-3.5 md:p-4 rounded-2xl shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-[10px] md:text-xs font-bold text-gray-400 uppercase tracking-wider block">Pending</span>
                    <span class="text-xl md:text-2xl font-black text-blue-600">8</span>
                </div>
                <div class="w-9 h-9 md:w-10 md:h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-sm md:text-base">
                    <i class="fa-solid fa-spinner"></i>
                </div>
            </div>

            <!-- Belum Diisi -->
            <div class="bg-white p-3.5 md:p-4 rounded-2xl shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-[10px] md:text-xs font-bold text-gray-400 uppercase tracking-wider block">Belum Isi</span>
                    <span class="text-xl md:text-2xl font-black text-red-600">3</span>
                </div>
                <div class="w-9 h-9 md:w-10 md:h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center text-sm md:text-base">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
            </div>

            <!-- Absen Guru -->
            <div class="bg-white p-3.5 md:p-4 rounded-2xl shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-[10px] md:text-xs font-bold text-gray-400 uppercase tracking-wider block">Absen Guru</span>
                    <span class="text-xl md:text-2xl font-black text-purple-600">2</span>
                </div>
                <div class="w-9 h-9 md:w-10 md:h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-sm md:text-base">
                    <i class="fa-solid fa-user-xmark"></i>
                </div>
            </div>
        </section>

        <!-- 2. ANTREAN DISPEN (SIMPEL & CEPAT) -->
        <section class="mb-6">
            <div class="flex justify-between items-center mb-3">
                <h2 class="text-sm md:text-base font-extrabold text-dark-green">Perlu Approval Dispen (2)</h2>
                <a href="#" class="text-xs font-bold text-medium-green hover:underline">Lihat Semua →</a>
            </div>

            <div class="space-y-2.5">
                <!-- Siswa 1 -->
                <div class="bg-white p-3.5 rounded-2xl shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 text-dark-green font-black flex items-center justify-center text-xs shrink-0">
                            AP
                        </div>
                        <div>
                            <div class="text-xs md:text-sm font-bold text-dark-green">
                                Andi Pratama <span class="text-gray-400 font-normal">(XI RPL 1)</span>
                            </div>
                            <div class="text-[11px] text-gray-500 font-medium">Lomba FLS2N Tingkat Kabupaten</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 self-end sm:self-center">
                        <button class="bg-medium-green hover:bg-dark-green text-white text-xs font-bold px-3 py-1.5 rounded-lg transition">
                            <i class="fa-solid fa-check mr-1"></i> ACC
                        </button>
                        <button class="bg-red-50 hover:bg-red-100 text-red-600 text-xs font-bold px-3 py-1.5 rounded-lg transition">
                            <i class="fa-solid fa-xmark mr-1"></i> Tolak
                        </button>
                    </div>
                </div>

                <!-- Siswa 2 -->
                <div class="bg-white p-3.5 rounded-2xl shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 text-dark-green font-black flex items-center justify-center text-xs shrink-0">
                            SN
                        </div>
                        <div>
                            <div class="text-xs md:text-sm font-bold text-dark-green">
                                Siti Nurhaliza <span class="text-gray-400 font-normal">(XI DKV 1)</span>
                            </div>
                            <div class="text-[11px] text-gray-500 font-medium">LDKS OSIS SMK</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 self-end sm:self-center">
                        <button class="bg-medium-green hover:bg-dark-green text-white text-xs font-bold px-3 py-1.5 rounded-lg transition">
                            <i class="fa-solid fa-check mr-1"></i> ACC
                        </button>
                        <button class="bg-red-50 hover:bg-red-100 text-red-600 text-xs font-bold px-3 py-1.5 rounded-lg transition">
                            <i class="fa-solid fa-xmark mr-1"></i> Tolak
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. MONITORING JURNAL RINGKAS -->
        <section class="bg-white p-4 md:p-5 rounded-2xl shadow-sm">
            <div class="flex justify-between items-center mb-3">
                <h2 class="text-sm md:text-base font-extrabold text-dark-green">Monitoring Jurnal Hari Ini</h2>
                <a href="#" class="text-xs font-bold text-medium-green hover:underline">Rekap Kelas →</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="text-gray-400 border-b border-gray-100 text-[10px] uppercase tracking-wider">
                            <th class="pb-2 font-bold">Guru & Class</th>
                            <th class="pb-2 font-bold hidden sm:table-cell">Mata Pelajaran</th>
                            <th class="pb-2 font-bold text-right sm:text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 font-medium">
                        <tr>
                            <td class="py-2.5">
                                <div class="font-bold text-dark-green">Sulistyowati, S.Pd.</div>
                                <div class="text-[10px] text-gray-400">XI RPL 2</div>
                            </td>
                            <td class="py-2.5 hidden sm:table-cell text-gray-600">Matematika Terapan</td>
                            <td class="py-2.5 text-right sm:text-left">
                                <span class="bg-emerald-50 text-emerald-700 font-bold px-2.5 py-1 rounded-md text-[10px]">Valid</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2.5">
                                <div class="font-bold text-dark-green">Bambang S., M.Pd.</div>
                                <div class="text-[10px] text-gray-400">XI TKJ 3</div>
                            </td>
                            <td class="py-2.5 hidden sm:table-cell text-gray-600">PJOK / Olahraga</td>
                            <td class="py-2.5 text-right sm:text-left">
                                <span class="bg-red-50 text-red-600 font-bold px-2.5 py-1 rounded-md text-[10px]">Belum Isi</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

    </main>

</body>
</html>