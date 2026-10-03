<!DOCTYPE html>
<html lang="id" class="overscroll-none">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru Piket - Jurnal Absensi</title>

    <script src="https://cdn.tailwindcss.com"></script>
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

    <style>
        html { scroll-behavior: smooth; }
        body { overflow-x: hidden; }
        #scrollIndicator { transition: top 0.15s ease-out; }
    </style>
</head>

<body class="bg-bg-cream text-dark-green font-sans min-h-screen overflow-x-hidden overscroll-none">

    <!-- ============================================================= -->
    <!-- MOBILE HEADER -->
    <!-- ============================================================= -->
    <div class="md:hidden bg-dark-green text-white p-4 flex items-center justify-between sticky top-0 z-40 shadow-sm">
        <div class="flex items-center gap-2">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
            <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
        </div>
        <button id="hamburgerBtn" type="button" class="w-9 h-9 rounded-lg flex items-center justify-center hover:bg-white/10 transition focus:outline-none">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    <!-- MOBILE OVERLAY -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden"></div>

    <!-- ============================================================= -->
    <!-- SIDEBAR -->
    <!-- ============================================================= -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 w-60 bg-dark-green text-white p-6 flex flex-col justify-between z-50
               -translate-x-full md:translate-x-0 transition-transform duration-300">

        <!-- SIDEBAR TOP -->
        <div>
            <!-- LOGO -->
            <div class="flex flex-col items-center gap-2 mb-10 text-center">
                <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-16 h-auto">
                <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
            </div>

            <!-- NAVIGATION -->
            <nav class="flex flex-col gap-5 font-semibold text-xs">

                <!-- UTAMA -->
                <div>
                    <div class="text-[10px] uppercase font-extrabold text-gray-400 tracking-wider mb-2 px-2">Utama</div>
                    <div class="space-y-1">
                        <a href="{{ url('/piket/dashboard') }}"
                            class="flex items-center gap-3 px-4 py-3 bg-white/10 text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-house w-4 text-center"></i>
                            Dashboard
                        </a>

                        <a href="{{ url('/piket/jurnal') }}"
                            class="relative flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-inbox w-4 text-center"></i>
                            Jurnal Masuk
                        </a>

                        <a href="{{ url('/piket/dispensasi') }}"
                            class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-regular fa-calendar-days w-4 text-center"></i>
                            Dispensasi
                        </a>

                        <a href="{{ url('/piket/jadwal') }}"
                            class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-clipboard-check w-4 text-center"></i>
                            Jadwal Piket
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- FOOTER SIDEBAR -->
        <div class="flex flex-col gap-1 pt-3 border-t border-white/10 text-xs">
            <a href="{{ url('/piket/akun') }}"
                class="flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                <i class="fa-solid fa-user-circle w-4"></i>
                <span>Akun</span>
            </a>
             <!-- LOGOUT -->
           <a href="{{ route('logout') }}"
            class="w-full flex items-center gap-2 px-2 py-2 rounded-lg
                    hover:bg-white/10
                    active:scale-[0.98]
                    transition-all duration-200">
                <i class="fa-solid fa-right-from-bracket w-4"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- ============================================================= -->
    <!-- MAIN -->
    <!-- ============================================================= -->
    <main class="min-w-0 p-4 pb-12 md:p-8 md:ml-60 max-w-full md:max-w-[calc(100%-15rem)] mx-auto space-y-4 md:space-y-6">

        <!-- HEADER -->
        <header class="flex items-center justify-between gap-3">
            <div class="min-w-0">
                <h1 class="text-base sm:text-lg md:text-2xl font-black text-dark-green tracking-tight leading-snug">
                    Selamat Datang, {{ Auth::user()->name }}!
                </h1>
                <p class="text-[11px] sm:text-xs text-medium-green font-semibold mt-0.5">
                    Pantau jurnal, ketidakhadiran siswa, dan dispensasi hari ini.
                </p>
            </div>
            <div class="text-right leading-tight shrink-0">
                <div id="live-date" class="text-[9px] sm:text-[10px] md:text-xs font-semibold text-medium-green whitespace-nowrap">
                    {{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}
                </div>
                <div id="live-clock" class="text-[10px] sm:text-xs font-extrabold text-dark-green mt-0.5">
                    {{ now()->format('H.i') }} WIB
                </div>
            </div>
        </header>

        <!-- BANNER TUGAS PIKET -->
        <section class="bg-dark-green text-white rounded-2xl p-4 sm:p-5 shadow-md">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <span class="text-[9px] sm:text-[10px] text-mint-green/80 uppercase tracking-wider font-extrabold">Tugas Hari Ini</span>
                    <h2 class="text-lg sm:text-xl md:text-2xl font-black tracking-wide leading-tight mt-1">Piket Pagi</h2>
                </div>
                <div class="w-10 h-10 rounded-xl bg-white/10 text-mint-green flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
            </div>
            <div class="border-t border-white/10 mt-4 pt-3 flex items-center justify-between gap-3">
                <div class="flex items-center gap-2 text-[10px] sm:text-xs text-emerald-100">
                    <i class="fa-regular fa-clock text-mint-green"></i>
                    <span>07.00 &ndash; 11.00</span>
                </div>
                <span class="bg-mint-green text-dark-green font-extrabold text-[10px] px-3 py-1.5 rounded-lg">Piket Aktif</span>
            </div>
        </section>

        <!-- RINGKASAN -->
        <section class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4">
            <a href="#jurnalMasuk" class="group bg-white px-2.5 py-2 md:p-4 rounded-xl border border-emerald-100/60 flex items-center gap-2 min-h-[72px] md:min-h-[80px] hover:border-medium-green hover:shadow-sm active:scale-[0.98] transition-all">
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-lg bg-emerald-50 text-dark-green flex items-center justify-center text-[11px] md:text-sm shrink-0">
                    <i class="fa-solid fa-inbox"></i>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-[8px] md:text-xs font-bold text-gray-500 truncate">Jurnal Masuk</p>
                    <p class="text-sm md:text-xl font-black text-dark-green">4</p>
                </div>
                <i class="fa-solid fa-chevron-right text-[8px] text-gray-300 group-hover:text-medium-green shrink-0"></i>
            </a>

            <a href="#ketidakhadiranSiswa" class="group bg-white px-2.5 py-2 md:p-4 rounded-xl border border-blue-100 flex items-center gap-2 min-h-[72px] md:min-h-[80px] hover:border-blue-300 hover:shadow-sm active:scale-[0.98] transition-all">
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-[10px] md:text-sm shrink-0">
                    <i class="fa-solid fa-user-check"></i>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-[8px] md:text-xs font-bold text-gray-500 leading-tight">Belum Kembali</p>
                    <p id="absenceCount" class="text-sm md:text-xl font-black text-blue-600">0</p>
                </div>
                <i class="fa-solid fa-chevron-right text-[8px] text-gray-300 group-hover:text-blue-500 shrink-0"></i>
            </a>

            <a href="#pengajuanDispensasi" class="group bg-white px-2.5 py-2 md:p-4 rounded-xl border border-purple-100 flex items-center gap-2 min-h-[72px] md:min-h-[80px] hover:border-purple-300 hover:shadow-sm active:scale-[0.98] transition-all">
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center text-[10px] md:text-sm shrink-0">
                    <i class="fa-regular fa-calendar-days"></i>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-[8px] md:text-xs font-bold text-gray-500 truncate">Dispensasi</p>
                    <p id="dispenCount" class="text-sm md:text-xl font-black text-purple-600">1</p>
                </div>
                <i class="fa-solid fa-chevron-right text-[8px] text-gray-300 group-hover:text-purple-500 shrink-0"></i>
            </a>
            <a href="#ketidakhadiranSiswa" onclick="absenTab='telat'; renderAbsen();" class="group bg-white px-2.5 py-2 md:p-4 rounded-xl border border-violet-100 flex items-center gap-2 min-h-[72px] md:min-h-[80px] hover:border-violet-300 hover:shadow-sm active:scale-[0.98] transition-all">
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-violet-50 text-violet-600 flex items-center justify-center text-[10px] md:text-sm shrink-0">
                    <i class="fa-regular fa-clock"></i>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-[8px] md:text-xs font-bold text-gray-500 truncate">Terlambat Hari Ini</p>
                    <p id="lateCount" class="text-sm md:text-xl font-black text-violet-600">0</p>
                </div>
                <i class="fa-solid fa-chevron-right text-[8px] text-gray-300 group-hover:text-violet-500 shrink-0"></i>
            </a>
        </section>

        <!-- ============================================================= -->
        <!-- JURNAL MASUK DARI SEKRE -->
        <!-- ============================================================= -->
<section
    id="guruTidakHadir"
    class="bg-white rounded-2xl border border-emerald-100 shadow-sm p-4 md:p-5 scroll-mt-20">

<!-- HEADER -->
<div class="flex items-start justify-between gap-3 mb-4">

    <div class="min-w-0">

        <div class="flex items-center gap-2.5">

            <div
                class="w-10 h-10 rounded-xl bg-emerald-50 text-medium-green flex items-center justify-center shrink-0">
                <i class="fa-solid fa-user-clock"></i>
            </div>

            <div class="min-w-0">

                <h2 class="text-sm md:text-base font-extrabold text-dark-green">
                    Guru Tidak Hadir
                </h2>

                <p class="text-[10px] md:text-xs text-gray-400 mt-0.5">
                    Informasi guru yang tidak hadir pada jadwal mengajar.
                </p>

            </div>

        </div>

    </div>

    <!-- JUMLAH -->
    <div
        class="shrink-0 px-3 py-1.5 rounded-full bg-emerald-50 border border-emerald-100">
        <span class="text-[10px] font-extrabold text-medium-green">
            2 Guru
        </span>
    </div>

</div>


<!-- LIST GURU -->
<div class="space-y-3">


    <!-- ===================================================== -->
    <!-- GURU 1 -->
    <!-- ===================================================== -->
    <div
        class="group rounded-2xl border border-gray-100 bg-gray-50/70 p-3.5 md:p-4 hover:border-emerald-200 hover:bg-emerald-50/30 transition">

        <!-- BAGIAN ATAS -->
        <div class="flex items-start justify-between gap-3">

            <div class="flex items-center gap-3 min-w-0">

                <!-- ICON -->
                <div
                    class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-user"></i>
                </div>

                <!-- NAMA -->
                <div class="min-w-0">

                    <p
                        class="text-xs md:text-sm font-extrabold text-dark-green truncate">
                        Erna Rinawati, S.Pd
                    </p>

                    <p class="text-[10px] text-medium-green font-semibold mt-0.5">
                        Bahasa Indonesia
                    </p>

                </div>

            </div>


            <!-- STATUS -->
            <span
                class="shrink-0 inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-50 border border-amber-100 text-[9px] font-extrabold text-amber-700">

                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>

                Tidak Hadir

            </span>

        </div>


        <!-- INFO -->
        <div class="grid grid-cols-3 gap-2 mt-3">

            <div class="bg-white border border-gray-100 rounded-xl px-2.5 py-2.5">

                <p class="text-[8px] uppercase tracking-wider font-bold text-gray-400">
                    Kelas
                </p>

                <p class="text-[10px] md:text-xs font-extrabold text-dark-green mt-1 truncate">
                    X DKV 1
                </p>

            </div>


            <div class="bg-white border border-gray-100 rounded-xl px-2.5 py-2.5">

                <p class="text-[8px] uppercase tracking-wider font-bold text-gray-400">
                    Ruang
                </p>

                <p class="text-[10px] md:text-xs font-extrabold text-dark-green mt-1 truncate">
                    15
                </p>

            </div>


            <div class="bg-white border border-gray-100 rounded-xl px-2.5 py-2.5">

                <p class="text-[8px] uppercase tracking-wider font-bold text-gray-400">
                    Jam
                </p>

                <p class="text-[10px] md:text-xs font-extrabold text-dark-green mt-1 truncate">
                    07.00 - 07.40
                </p>

            </div>

        </div>


        <!-- FOOTER CARD -->
        <div
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2.5 mt-3 pt-3 border-t border-gray-200">

            <div class="flex items-center gap-2">

                <span class="text-[9px] text-gray-400">
                    Kondisi:
                </span>

                <span
                    class="inline-flex items-center gap-1 px-2 py-1 rounded-lg bg-emerald-50 text-medium-green text-[9px] font-bold">

                    <i class="fa-solid fa-clipboard-check text-[8px]"></i>
                    Ada Tugas

                </span>

            </div>


            <button
                type="button"
                onclick="openGuruDetail(1)"                
                class="w-full sm:w-auto px-4 py-2.5 rounded-xl bg-dark-green hover:bg-medium-green text-white text-[10px] font-bold transition flex items-center justify-center gap-2">

                <i class="fa-solid fa-eye"></i>
                Lihat Detail
            </button>

        </div>

    </div>


    <!-- ===================================================== -->
    <!-- GURU 2 -->
    <!-- ===================================================== -->
    <div
        class="group rounded-2xl border border-gray-100 bg-gray-50/70 p-3.5 md:p-4 hover:border-emerald-200 hover:bg-emerald-50/30 transition">

        <!-- BAGIAN ATAS -->
        <div class="flex items-start justify-between gap-3">

            <div class="flex items-center gap-3 min-w-0">

                <!-- ICON -->
                <div
                    class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-user"></i>
                </div>

                <!-- NAMA -->
                <div class="min-w-0">

                    <p
                        class="text-xs md:text-sm font-extrabold text-dark-green truncate">
                        Sri Rahayu, S.Pd
                    </p>

                    <p class="text-[10px] text-medium-green font-semibold mt-0.5">
                        Bahasa Indonesia
                    </p>

                </div>

            </div>


            <!-- STATUS -->
            <span
                class="shrink-0 inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-50 border border-amber-100 text-[9px] font-extrabold text-amber-700">

                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>

                Tidak Hadir

            </span>

        </div>


        <!-- INFO -->
        <div class="grid grid-cols-3 gap-2 mt-3">

            <div class="bg-white border border-gray-100 rounded-xl px-2.5 py-2.5">

                <p class="text-[8px] uppercase tracking-wider font-bold text-gray-400">
                    Kelas
                </p>

                <p class="text-[10px] md:text-xs font-extrabold text-dark-green mt-1 truncate">
                    X TKJ 2
                </p>

            </div>


            <div class="bg-white border border-gray-100 rounded-xl px-2.5 py-2.5">

                <p class="text-[8px] uppercase tracking-wider font-bold text-gray-400">
                    Ruang
                </p>

                <p class="text-[10px] md:text-xs font-extrabold text-dark-green mt-1 truncate">
                    33
                </p>

            </div>


            <div class="bg-white border border-gray-100 rounded-xl px-2.5 py-2.5">

                <p class="text-[8px] uppercase tracking-wider font-bold text-gray-400">
                    Jam
                </p>

                <p class="text-[10px] md:text-xs font-extrabold text-dark-green mt-1 truncate">
                    08.20 - 09.00
                </p>

            </div>

        </div>


        <!-- FOOTER CARD -->
        <div
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2.5 mt-3 pt-3 border-t border-gray-200">

            <div class="flex items-center gap-2">

                <span class="text-[9px] text-gray-400">
                    Kondisi:
                </span>

                <span
                    class="inline-flex items-center gap-1 px-2 py-1 rounded-lg bg-gray-100 text-gray-600 text-[9px] font-bold">

                    <i class="fa-solid fa-circle-minus text-[8px]"></i>
                    Tidak Ada Tugas

                </span>

            </div>


            <button
                type="button"
                onclick="openGuruDetail(2)"
                class="w-full sm:w-auto px-4 py-2.5 rounded-xl bg-dark-green hover:bg-medium-green text-white text-[10px] font-bold transition flex items-center justify-center gap-2">

                <i class="fa-solid fa-eye"></i>
                Lihat Detail

            </button>

        </div>

    </div>
</div>
</section>

        <!-- ============================================================= -->
        <!-- KETIDAKHADIRAN SISWA: daftar bersama semua guru piket -->
        <!-- ============================================================= -->
        <section id="ketidakhadiranSiswa" class="bg-white rounded-2xl shadow-sm border-2 border-blue-100 p-4 md:p-6 scroll-mt-20">
            <div class="flex items-start justify-between gap-3 mb-4">
                <div class="min-w-0">
                    <div class="flex items-center gap-2">
                        <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-user-check text-sm"></i>
                        </div>
                        <div>
                            <h2 class="text-sm md:text-base font-extrabold text-dark-green">Kehadiran Siswa</h2>
                            <p class="text-[10px] md:text-xs text-gray-400 mt-0.5">Siswa tidak masuk (surat sakit/izin) dan siswa terlambat (surat izin masuk kelas). Daftar bersama semua guru piket.</p>
                        </div>
                    </div>
                </div>
                <span id="absencePendingBadge" class="bg-amber-50 text-amber-700 px-2.5 py-1 rounded-lg text-[9px] font-extrabold shrink-0">-</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                <button type="button" onclick="openStudentAbsenceModal()"
                    class="w-full bg-dark-green hover:bg-medium-green active:scale-[0.98] text-white rounded-xl p-3.5 transition-all text-left">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/10 text-mint-green flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-envelope-open-text"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-extrabold">Catat Surat Sakit / Izin</p>
                            <p class="text-[10px] text-gray-300 mt-0.5">Siswa tidak masuk, foto surat ke Sekre</p>
                        </div>
                        <i class="fa-solid fa-chevron-right text-xs text-mint-green shrink-0"></i>
                    </div>
                </button>

                <button type="button" onclick="openLate()"
                    class="w-full bg-violet-600 hover:bg-violet-700 active:scale-[0.98] text-white rounded-xl p-3.5 transition-all text-left">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/10 text-white flex items-center justify-center shrink-0">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-extrabold">Siswa Terlambat</p>
                            <p class="text-[10px] text-violet-100 mt-0.5">Surat izin masuk kelas + TTD Waka</p>
                        </div>
                        <i class="fa-solid fa-chevron-right text-xs shrink-0"></i>
                    </div>
                </button>
            </div>

            <!-- TAB: BELUM KEMBALI / SUDAH KEMBALI -->
            <div id="absenTabs" class="flex items-center gap-2 mt-4"></div>

            <div id="studentAbsenceList" class="mt-3 space-y-2.5"></div>
        </section>

        <!-- ============================================================= -->
        <!-- PENGAJUAN DISPENSASI -->
        <!-- ============================================================= -->
        <section id="pengajuanDispensasi" class="bg-white rounded-2xl shadow-sm border-2 border-purple-100 p-4 md:p-6 scroll-mt-20">
            <div class="flex items-start justify-between gap-3 mb-4">
                <div class="flex items-center gap-2">
                    <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                        <i class="fa-regular fa-calendar-days text-sm"></i>
                    </div>
                    <div>
                        <h2 class="text-sm md:text-base font-extrabold text-dark-green">Pengajuan Dispensasi</h2>
                        <p class="text-[10px] md:text-xs text-gray-400 mt-0.5">Diteruskan otomatis ke WhatsApp Waka Kesiswaan untuk persetujuan.</p>
                    </div>
                </div>
                <span id="dispenPendingBadge" class="bg-purple-50 text-purple-700 px-2.5 py-1 rounded-lg text-[9px] font-extrabold shrink-0">1 Menunggu</span>
            </div>

            <button type="button" onclick="openDispensasiModal()"
                class="w-full bg-purple-600 hover:bg-purple-700 active:scale-[0.98] text-white rounded-xl p-3.5 transition-all text-left">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-white/10 text-white flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-extrabold">Ajukan Dispensasi Siswa</p>
                        <p class="text-[10px] text-purple-100 mt-0.5">Kirim otomatis via WhatsApp ke Waka/Admin</p>
                    </div>
                    <i class="fa-solid fa-chevron-right text-xs shrink-0"></i>
                </div>
            </button>

           <div id="dispensasiList" class="mt-4 space-y-2.5">
                <div class="dispensasi-item flex items-center justify-between gap-3 rounded-xl bg-purple-50 border border-purple-100 p-3" data-status="Menunggu Persetujuan">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-calendar-days text-xs"></i>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[11px] font-extrabold text-dark-green truncate">Lomba Film Pendek Antar SMK</p>
                            <p class="text-[10px] text-gray-500 truncate">4 siswa &middot; 3 kelas &middot; 2&ndash;3 Sep 2026</p>
                        </div>
                    </div>
                    <span class="dispensasi-status-badge bg-purple-100 text-purple-700 text-[9px] font-bold px-2 py-1 rounded-lg shrink-0">Menunggu</span>
                </div>
            </div>

            <a href="{{ url('/piket/dispensasi') }}" class="block mt-3 text-center text-[11px] font-bold text-purple-600 hover:text-purple-700">
                Lihat Riwayat Dispensasi <i class="fa-solid fa-arrow-right ml-1"></i>
            </a>
        </section>

    </main>

    <!-- ============================================================= -->
    <!-- MOBILE SCROLL HELPER -->
    <!-- ============================================================= -->
    <div id="scrollHelper"
        class="md:hidden fixed right-2 sm:right-3 top-1/2 -translate-y-1/2 z-30 flex flex-col items-center gap-1">

        <button type="button" onclick="scrollToTop()" aria-label="Kembali ke atas"
            class="w-7 h-7 rounded-full bg-white/95 border border-emerald-100 shadow-md text-medium-green flex items-center justify-center active:scale-90 transition">
            <i class="fa-solid fa-chevron-up text-[9px]"></i>
        </button>

        <div class="relative w-1 h-28 bg-dark-green/10 rounded-full overflow-hidden">
            <div id="scrollIndicator" class="absolute left-0 top-0 w-1 h-8 bg-medium-green rounded-full"></div>
        </div>

        <button type="button" onclick="scrollToBottom()" aria-label="Ke bagian bawah"
            class="w-7 h-7 rounded-full bg-white/95 border border-emerald-100 shadow-md text-medium-green flex items-center justify-center active:scale-90 transition">
            <i class="fa-solid fa-chevron-down text-[9px]"></i>
        </button>
    </div>

    <!-- TOAST -->
    <div id="toast" class="fixed bottom-5 left-1/2 -translate-x-1/2 z-[100] hidden">
        <div class="bg-dark-green text-white px-4 py-3 rounded-xl shadow-xl flex items-center gap-2">
            <i class="fa-solid fa-circle-check text-mint-green"></i>
            <span id="toastText" class="text-xs font-bold">Berhasil.</span>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- MODAL: CATAT SURAT SAKIT / IZIN -->
    <!-- ================================================================= -->
    <div id="studentAbsenceModal" class="fixed inset-0 z-[70] hidden items-end md:items-center justify-center bg-dark-green/60 backdrop-blur-sm p-0 md:p-4">
        <div class="bg-white rounded-t-3xl md:rounded-2xl w-full md:max-w-lg max-h-[92vh] overflow-y-auto shadow-2xl" onclick="event.stopPropagation()">
            <div class="sticky top-0 z-10 bg-white flex items-center justify-between gap-3 px-5 py-4 border-b border-gray-100">
                <div>
                    <h2 class="text-sm md:text-base font-extrabold text-dark-green">Catat Surat Sakit / Izin</h2>
                    <p class="text-[10px] text-gray-400 mt-0.5">Berdasarkan surat yang diterima piket. Untuk lomba atau tugas sekolah, pakai Ajukan Dispensasi.</p>
                </div>
                <button type="button" onclick="closeStudentAbsenceModal()" class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center hover:bg-gray-200">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="p-5 space-y-4">
                <!-- SISWA -->
                <div id="absenPicker">
                    <label class="text-[10px] font-bold text-gray-500">Siswa</label>
                    <div class="relative mt-1.5">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px]"></i>
                        <input id="absenSearch" type="text" placeholder="Cari nama atau kelas, lalu pilih..." autocomplete="off"
                            oninput="cariSiswaAbsen(this.value)"
                            class="w-full pl-8 pr-3 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-xs text-dark-green outline-none focus:border-medium-green focus:bg-white transition">
                        <div id="absenResults" class="hidden absolute left-0 right-0 top-full mt-1 z-20 bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden"></div>
                    </div>
                    <div id="absenChip" class="mt-2"></div>
                </div>

                <!-- JENIS -->
                <div>
                    <label class="text-[10px] font-bold text-gray-500">Jenis</label>
                    <div class="grid grid-cols-2 gap-2 mt-1.5">
                        <button type="button" data-jenis="Sakit" onclick="pilihJenisAbsen('Sakit')" class="absen-jenis rounded-xl border border-gray-200 px-2 py-3 text-[10px] font-bold text-gray-600 transition">
                            <i class="fa-solid fa-kit-medical mb-1 block"></i>Sakit
                        </button>
                        <button type="button" data-jenis="Izin" onclick="pilihJenisAbsen('Izin')" class="absen-jenis rounded-xl border border-gray-200 px-2 py-3 text-[10px] font-bold text-gray-600 transition">
                            <i class="fa-solid fa-file-signature mb-1 block"></i>Izin
                        </button>
                    </div>
                </div>

                <!-- MASA TIDAK MASUK -->
                <div>
                    <label class="text-[10px] font-bold text-gray-500">Apa yang tertulis di surat?</label>
                    <div class="grid grid-cols-1 gap-2 mt-1.5">
                        <button type="button" data-periode="default" onclick="pilihPeriodeAbsen('default')" class="absen-periode text-left rounded-xl border border-gray-200 px-3 py-2.5 transition">
                            <p class="text-[11px] font-bold">Tidak ada keterangan tanggal</p>
                            <p class="text-[10px] opacity-70 mt-0.5">Berlaku 1 hari saja</p>
                        </button>
                        <button type="button" data-periode="surat" onclick="pilihPeriodeAbsen('surat')" class="absen-periode text-left rounded-xl border border-gray-200 px-3 py-2.5 transition">
                            <p class="text-[11px] font-bold">Ada periode tidak masuk</p>
                            <p class="text-[10px] opacity-70 mt-0.5">Contoh: "izin tanggal 5 sampai 7, masuk kembali tanggal 8"</p>
                        </button>
                        <button type="button" data-periode="dokter" onclick="pilihPeriodeAbsen('dokter')" class="absen-periode text-left rounded-xl border border-gray-200 px-3 py-2.5 transition">
                            <p class="text-[11px] font-bold">Surat keterangan dokter</p>
                            <p class="text-[10px] opacity-70 mt-0.5">Istirahat sesuai anjuran dokter (khusus sakit)</p>
                        </button>
                    </div>

                    <!-- 1 hari -->
                    <div id="absenFieldSatu" class="mt-3">
                        <label class="text-[10px] font-bold text-gray-500">Tanggal tidak masuk</label>
                        <input id="absenTanggal" type="date" onchange="updateInfoKembali()"
                            class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-medium-green focus:bg-white transition">
                    </div>

                    <!-- periode -->
                    <div id="absenFieldRange" class="mt-3 hidden">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="text-[10px] font-bold text-gray-500">Mulai tidak masuk</label>
                                <input id="absenMulai" type="date" onchange="updateInfoKembali()"
                                    class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-medium-green focus:bg-white transition">
                            </div>
                            <div>
                                <label class="text-[10px] font-bold text-gray-500">Sampai tanggal</label>
                                <input id="absenSelesai" type="date" onchange="updateInfoKembali()"
                                    class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-medium-green focus:bg-white transition">
                            </div>
                        </div>
                    </div>
                    <p id="absenInfoKembali" class="mt-2 text-[10px] font-semibold text-medium-green">-</p>
                </div>

                <!-- FOTO SURAT -->
                <div>
                    <label class="text-[10px] font-bold text-gray-500">Foto Surat <span class="font-normal text-gray-400">(wajib, maks. 3 foto)</span></label>
                    <label for="absenFoto"
                        class="mt-1.5 flex items-center justify-center gap-2 rounded-xl border-2 border-dashed border-emerald-200 bg-emerald-50/40 hover:bg-emerald-50 py-4 text-[11px] font-bold text-medium-green cursor-pointer transition">
                        <i class="fa-solid fa-camera"></i> Ambil / pilih foto surat
                    </label>
                    <input id="absenFoto" type="file" accept="image/*" multiple class="hidden" onchange="pilihFotoAbsen(this)">
                    <div id="absenFotoPreview" class="grid grid-cols-3 gap-2 mt-2"></div>
                </div>

                <!-- CATATAN -->
                <div>
                    <label class="text-[10px] font-bold text-gray-500">Catatan <span class="font-normal text-gray-400">(opsional)</span></label>
                    <textarea id="studentAbsenceNote" rows="2" placeholder="Contoh: Surat diantar ibunya langsung ke gerbang."
                        class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-medium-green focus:bg-white transition resize-none"></textarea>
                </div>

                <div class="rounded-xl bg-blue-50 border border-blue-100 p-3">
                    <div class="flex gap-2">
                        <i class="fa-solid fa-circle-info text-blue-500 text-xs mt-0.5"></i>
                        <p class="text-[10px] text-blue-700 leading-relaxed">
                            Data tersimpan di daftar bersama semua guru piket. Kalau periode surat sudah lewat tapi siswa belum tercatat kembali, siswa muncul sebagai "Perlu Dikonfirmasi".
                        </p>
                    </div>
                </div>

                <div class="flex gap-2 pt-1">
                    <button type="button" onclick="closeStudentAbsenceModal()" class="flex-1 rounded-xl border border-gray-200 py-2.5 text-xs font-bold text-gray-500 hover:bg-gray-50 transition">Batal</button>
                    <button type="button" onclick="saveStudentAbsence()" class="flex-1 rounded-xl bg-dark-green py-2.5 text-xs font-bold text-white hover:bg-medium-green transition">Simpan &amp; Kirim ke Sekre</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- MODAL: PERPANJANG -->
    <!-- ================================================================= -->
    <div id="extendModal" class="fixed inset-0 z-[75] hidden items-end md:items-center justify-center bg-dark-green/60 backdrop-blur-sm p-0 md:p-4">
        <div class="bg-white rounded-t-3xl md:rounded-2xl w-full md:max-w-sm max-h-[90vh] overflow-y-auto shadow-2xl" onclick="event.stopPropagation()">
            <div class="flex items-center justify-between gap-3 px-5 py-4 border-b border-gray-100">
                <div>
                    <h2 class="text-sm md:text-base font-extrabold text-dark-green">Perpanjang Ketidakhadiran</h2>
                    <p id="extendInfo" class="text-[10px] text-gray-400 mt-0.5">-</p>
                </div>
                <button type="button" onclick="closeExtend()" class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center hover:bg-gray-200">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="p-5 space-y-4">
                <div>
                    <label class="text-[10px] font-bold text-gray-500">Tidak masuk sampai tanggal</label>
                    <input id="extendDate" type="date" onchange="updateInfoExtend()"
                        class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-medium-green focus:bg-white transition">
                    <p id="extendKembali" class="mt-2 text-[10px] font-semibold text-medium-green">-</p>
                </div>
                <div>
                    <label class="text-[10px] font-bold text-gray-500">Keterangan <span class="font-normal text-gray-400">(opsional)</span></label>
                    <textarea id="extendNote" rows="2" placeholder="Contoh: Ortu mengabari masih demam."
                        class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-medium-green focus:bg-white transition resize-none"></textarea>
                </div>
                <div class="flex gap-2 pt-1">
                    <button type="button" onclick="closeExtend()" class="flex-1 rounded-xl border border-gray-200 py-2.5 text-xs font-bold text-gray-500 hover:bg-gray-50 transition">Batal</button>
                    <button type="button" onclick="saveExtend()" class="flex-1 rounded-xl bg-dark-green py-2.5 text-xs font-bold text-white hover:bg-medium-green transition">Perpanjang</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- MODAL: SURAT IZIN MASUK KELAS (SISWA TERLAMBAT) -->
    <!-- ================================================================= -->
    <div id="lateModal" class="fixed inset-0 z-[70] hidden items-end md:items-center justify-center bg-dark-green/60 backdrop-blur-sm p-0 md:p-4">
        <div class="bg-white rounded-t-3xl md:rounded-2xl w-full md:max-w-lg max-h-[92vh] overflow-y-auto shadow-2xl" onclick="event.stopPropagation()">
            <div class="sticky top-0 z-10 bg-white flex items-center justify-between gap-3 px-5 py-4 border-b border-gray-100">
                <div>
                    <h2 class="text-sm md:text-base font-extrabold text-dark-green">Surat Izin Masuk Kelas</h2>
                    <p class="text-[10px] text-gray-400 mt-0.5">Untuk siswa terlambat. Satu surat untuk satu kelas, boleh banyak siswa.</p>
                </div>
                <button type="button" onclick="closeLate()" class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center hover:bg-gray-200">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="p-5 space-y-4">
                <!-- KELAS -->
                <div>
                    <label class="text-[10px] font-bold text-gray-500">Kelas</label>
                    <select id="lateKelas" onchange="gantiKelasLate()"
                        class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-violet-400 focus:bg-white transition"></select>
                </div>

                <!-- SISWA -->
                <div id="latePicker">
                    <div class="flex items-center justify-between">
                        <label class="text-[10px] font-bold text-gray-500">Siswa yang terlambat</label>
                        <span id="lateSummary" class="text-[10px] font-semibold text-violet-600">Belum ada siswa</span>
                    </div>
                    <div class="relative mt-1.5">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px]"></i>
                        <input id="lateSearch" type="text" placeholder="Pilih kelas dulu, lalu cari nama siswa..." autocomplete="off" disabled
                            oninput="cariSiswaLate(this.value)" onfocus="cariSiswaLate(this.value)"
                            class="w-full pl-8 pr-3 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-xs text-dark-green outline-none focus:border-violet-400 focus:bg-white transition disabled:opacity-60">
                        <div id="lateResults" class="hidden absolute left-0 right-0 top-full mt-1 z-20 bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden"></div>
                    </div>
                    <div id="lateList" class="mt-2.5 space-y-2"></div>
                </div>

                <!-- ALASAN UMUM -->
                <div>
                    <label class="text-[10px] font-bold text-gray-500">Alasan terlambat <span class="font-normal text-gray-400">(dipakai untuk semua siswa yang alasannya dikosongkan)</span></label>
                    <div id="lateChips" class="flex flex-wrap gap-1.5 mt-1.5"></div>
                    <input id="lateAlasanUmum" type="text" placeholder="Contoh: Ban motor bocor" oninput="renderLateSiswa()"
                        class="w-full mt-2 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-violet-400 focus:bg-white transition">
                </div>

                <!-- WAKTU -->
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-[10px] font-bold text-gray-500">Tiba pukul</label>
                        <input id="lateWaktu" type="time" onchange="updateJamLate()"
                            class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-violet-400 focus:bg-white transition">
                    </div>
                    <div>
                        <label class="text-[10px] font-bold text-gray-500">Masuk di jam ke-</label>
                        <select id="lateJam" onchange="infoJamLate()"
                            class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-violet-400"></select>
                    </div>
                </div>
                <p id="lateJamInfo" class="-mt-2 text-[10px] font-semibold text-violet-600">-</p>

                <div class="rounded-xl bg-violet-50 border border-violet-100 p-3">
                    <div class="flex gap-2">
                        <i class="fa-solid fa-signature text-violet-500 text-xs mt-0.5"></i>
                        <p id="lateInfoTtd" class="text-[10px] text-violet-700 leading-relaxed">-</p>
                    </div>
                </div>

                <div class="flex gap-2 pt-1">
                    <button type="button" onclick="closeLate()" class="flex-1 rounded-xl border border-gray-200 py-2.5 text-xs font-bold text-gray-500 hover:bg-gray-50 transition">Batal</button>
                    <button type="button" onclick="saveLate()" class="flex-1 rounded-xl bg-violet-600 py-2.5 text-xs font-bold text-white hover:bg-violet-700 transition">Simpan &amp; TTD Piket</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- MODAL: PRATINJAU / CETAK SURAT IZIN MASUK KELAS -->
    <!-- ================================================================= -->
    <div id="letterModal" class="fixed inset-0 z-[80] hidden items-end md:items-center justify-center bg-dark-green/60 backdrop-blur-sm p-0 md:p-4">
        <div class="bg-white rounded-t-3xl md:rounded-2xl w-full md:max-w-xl max-h-[92vh] flex flex-col shadow-2xl overflow-hidden" onclick="event.stopPropagation()">
            <div class="shrink-0 flex items-center justify-between gap-3 px-5 py-4 border-b border-gray-100">
                <div>
                    <h2 class="text-sm md:text-base font-extrabold text-dark-green">Pratinjau Surat</h2>
                    <p class="text-[10px] text-gray-400 mt-0.5">Sama dengan isi buku keterlambatan.</p>
                </div>
                <button type="button" onclick="closeLetter()" class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center hover:bg-gray-200">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="overflow-y-auto p-4 md:p-5 bg-gray-50">
                <div id="letterBody" class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm"></div>
            </div>
            <div class="shrink-0 flex gap-2 px-5 py-3 border-t border-gray-100">
                <button type="button" onclick="closeLetter()" class="flex-1 rounded-xl border border-gray-200 py-2.5 text-xs font-bold text-gray-500 hover:bg-gray-50 transition">Tutup</button>
                <button type="button" onclick="cetakSuratTelat()" class="flex-1 rounded-xl bg-violet-600 py-2.5 text-xs font-bold text-white hover:bg-violet-700 transition">
                    <i class="fa-solid fa-print mr-1.5"></i>Cetak
                </button>
            </div>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- MODAL: PENGAJUAN DISPENSASI -->
    <!-- ================================================================= -->
    <div id="dispensasiModal" class="fixed inset-0 z-[70] hidden items-end md:items-center justify-center bg-dark-green/60 backdrop-blur-sm p-0 md:p-4">
    <div class="bg-white rounded-t-3xl md:rounded-2xl w-full md:max-w-lg max-h-[92vh] overflow-y-auto shadow-2xl" onclick="event.stopPropagation()">
        <div class="sticky top-0 z-10 bg-white flex items-center justify-between gap-3 px-5 py-4 border-b border-gray-100">
            <div>
                <h2 class="text-sm md:text-base font-extrabold text-dark-green">Ajukan Dispensasi</h2>
                <p class="text-[10px] text-gray-400 mt-0.5">Satu pengajuan bisa untuk banyak siswa dari kelas berbeda.</p>
            </div>
            <button type="button" onclick="closeDispensasiModal()" class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center hover:bg-gray-200">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="p-5 space-y-4">
            <!-- KEGIATAN -->
            <div>
                <label class="text-[10px] font-bold text-gray-500">Kegiatan / Keperluan</label>
                <input id="dispenKegiatan" type="text" placeholder="Contoh: Lomba Film Pendek Antar SMK"
                    class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-purple-400 focus:bg-white transition">
            </div>

            <!-- JENIS -->
            <div>
                <label class="text-[10px] font-bold text-gray-500">Jenis Dispensasi</label>
                <div class="grid grid-cols-3 gap-2 mt-1.5">
                    <button type="button" onclick="selectDispenType(this, 'Lomba / Kegiatan')" class="dispen-type rounded-xl border border-gray-200 px-2 py-3 text-[10px] font-bold text-gray-600 transition">
                        <i class="fa-solid fa-medal mb-1 block"></i>Lomba / Kegiatan
                    </button>
                    <button type="button" onclick="selectDispenType(this, 'Tugas Sekolah')" class="dispen-type rounded-xl border border-gray-200 px-2 py-3 text-[10px] font-bold text-gray-600 transition">
                        <i class="fa-solid fa-briefcase mb-1 block"></i>Tugas Sekolah
                    </button>
                    <button type="button" onclick="selectDispenType(this, 'Lainnya')" class="dispen-type rounded-xl border border-gray-200 px-2 py-3 text-[10px] font-bold text-gray-600 transition">
                        <i class="fa-solid fa-ellipsis mb-1 block"></i>Lainnya
                    </button>
                </div>
            </div>

            <!-- SISWA (BANYAK, BEDA KELAS) -->
            <div id="dispenPicker">
                <div class="flex items-center justify-between">
                    <label class="text-[10px] font-bold text-gray-500">Siswa yang Didispensasi</label>
                    <span id="dispenSiswaSummary" class="text-[10px] font-semibold text-purple-600">Belum ada siswa</span>
                </div>
                <div class="relative mt-1.5">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px]"></i>
                    <input id="dispenSearch" type="text" placeholder="Cari nama atau kelas, lalu pilih..." autocomplete="off"
                        oninput="cariSiswaDispen(this.value)"
                        class="w-full pl-8 pr-3 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-xs text-dark-green outline-none focus:border-purple-400 focus:bg-white transition">
                    <div id="dispenResults" class="hidden absolute left-0 right-0 top-full mt-1 z-20 bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden"></div>
                </div>
                <div id="dispenChips" class="mt-2.5"></div>
            </div>

            <!-- WAKTU -->
            <div>
                <label class="text-[10px] font-bold text-gray-500">Lama Dispensasi</label>
                <div class="grid grid-cols-3 gap-2 mt-1.5">
                    <button type="button" data-mode="jam"   onclick="setDispenMode('jam')"   class="dispen-mode rounded-xl border border-gray-200 px-2 py-2.5 text-[10px] font-bold text-gray-600 transition">Beberapa jam</button>
                    <button type="button" data-mode="hari"  onclick="setDispenMode('hari')"  class="dispen-mode rounded-xl border border-gray-200 px-2 py-2.5 text-[10px] font-bold text-gray-600 transition">1 hari penuh</button>
                    <button type="button" data-mode="range" onclick="setDispenMode('range')" class="dispen-mode rounded-xl border border-gray-200 px-2 py-2.5 text-[10px] font-bold text-gray-600 transition">Beberapa hari</button>
                </div>

                <div id="fieldTanggal" class="mt-3">
                    <label class="text-[10px] font-bold text-gray-500">Tanggal</label>
                    <input id="dispenDate" type="date"
                        class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-purple-400 focus:bg-white transition">
                </div>

                <div id="fieldJam" class="mt-3">
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="text-[10px] font-bold text-gray-500">Dari Jam Ke-</label>
                            <select id="dispenJamDari" onchange="updateJamInfo()"
                                class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-purple-400"></select>
                        </div>
                        <div>
                            <label class="text-[10px] font-bold text-gray-500">Sampai Jam Ke-</label>
                            <select id="dispenJamSampai" onchange="updateJamInfo()"
                                class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-purple-400"></select>
                        </div>
                    </div>
                    <p id="dispenJamInfo" class="mt-1.5 text-[10px] font-semibold text-purple-600">-</p>
                </div>

                <div id="fieldRange" class="mt-3 hidden">
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="text-[10px] font-bold text-gray-500">Tanggal Mulai</label>
                            <input id="dispenStart" type="date"
                                class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-purple-400 focus:bg-white transition">
                        </div>
                        <div>
                            <label class="text-[10px] font-bold text-gray-500">Tanggal Selesai</label>
                            <input id="dispenEnd" type="date"
                                class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-purple-400 focus:bg-white transition">
                        </div>
                    </div>
                </div>
            </div>

            <!-- FOTO SURAT -->
            <div>
                <label class="text-[10px] font-bold text-gray-500">Foto Surat Dispensasi <span class="font-normal text-gray-400">(maks. 3 foto)</span></label>
                <label for="dispenFoto"
                    class="mt-1.5 flex items-center justify-center gap-2 rounded-xl border-2 border-dashed border-purple-200 bg-purple-50/40 hover:bg-purple-50 py-4 text-[11px] font-bold text-purple-600 cursor-pointer transition">
                    <i class="fa-solid fa-camera"></i> Ambil / pilih foto surat
                </label>
                <input id="dispenFoto" type="file" accept="image/*" multiple class="hidden" onchange="pilihFotoDispen(this)">
                <div id="dispenFotoPreview" class="grid grid-cols-3 gap-2 mt-2"></div>
            </div>

            <!-- CATATAN -->
            <div>
                <label class="text-[10px] font-bold text-gray-500">Catatan <span class="font-normal text-gray-400">(opsional)</span></label>
                <textarea id="dispenNote" rows="2" placeholder="Contoh: Berangkat dari sekolah pukul 07.30, didampingi Bu Rosa."
                    class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-purple-400 focus:bg-white transition resize-none"></textarea>
            </div>

            <div class="rounded-xl bg-emerald-50 border border-emerald-100 p-3">
                <div class="flex gap-2">
                    <i class="fa-brands fa-whatsapp text-emerald-600 text-sm mt-0.5"></i>
                    <p class="text-[10px] text-emerald-700 leading-relaxed">
                        Pengajuan tersimpan di aplikasi (admin melihat foto surat di sana), lalu WhatsApp terbuka dengan pesan pemberitahuan ke Waka.
                    </p>
                </div>
            </div>

            <div class="flex gap-2 pt-1">
                <button type="button" onclick="closeDispensasiModal()" class="flex-1 rounded-xl border border-gray-200 py-2.5 text-xs font-bold text-gray-500 hover:bg-gray-50 transition">Batal</button>
                <button type="button" onclick="saveDispensasi()" class="flex-1 rounded-xl bg-purple-600 py-2.5 text-xs font-bold text-white hover:bg-purple-700 transition flex items-center justify-center gap-2">
                    <i class="fa-brands fa-whatsapp"></i> Ajukan &amp; Kirim WA
                </button>
            </div>
        </div>
    </div>
</div>

    <!-- ================================================================= -->
    <!-- MODAL DETAIL GURU 1 & 2 -->
    <!-- ================================================================= -->
   <!-- MODAL DETAIL GURU TIDAK HADIR (dinamis) -->
<div id="detailGuru" class="fixed inset-0 bg-dark-green/60 z-[60] hidden items-end md:items-center justify-center p-0 md:p-4 backdrop-blur-sm">
    <div class="bg-white rounded-t-3xl md:rounded-2xl w-full md:max-w-lg max-h-[92vh] overflow-y-auto shadow-2xl">
        <div class="sticky top-0 z-10 bg-white flex items-center justify-between px-5 py-4 border-b border-gray-100">
            <div>
                <h2 class="text-sm md:text-base font-extrabold text-dark-green">Detail Jurnal</h2>
                <p class="text-[10px] text-gray-400 mt-0.5">Jurnal yang diisi guru pengajar</p>
            </div>
            <button type="button" onclick="closeDetail('detailGuru')" class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-500 flex items-center justify-center transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div id="detailGuruBody" class="p-5 space-y-4"></div>
        <div class="px-5 pb-5 flex gap-2">
            <button type="button" onclick="closeDetail('detailGuru')" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-600 text-xs font-bold py-2.5 rounded-xl transition">Tutup</button>
        </div>
    </div>
</div>
    <!-- ================================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ================================================================= -->
    <script>
        // GANTI nomor ini dengan nomor WA Waka Kesiswaan / Admin yang sesungguhnya (format 62xxxxxxxxxx tanpa "+")
        const WAKA_WA_NUMBER = '6287850809474';

        // Nama guru piket yang sedang login (dummy). Nanti diganti nama user login.
        const ME = 'Arif Setyobudi, S.Pd';

        // Dummy. Nanti ganti dengan pencarian ke database (siswa dari SEMUA kelas).
        const DATA_SISWA = [
            { id: 1,  nama: 'Ahmad Fauzan',   kelas: 'XI DKV 2' },
            { id: 2,  nama: 'Citra Ayu',      kelas: 'XI DKV 2' },
            { id: 3,  nama: 'Dewi Lestari',   kelas: 'XI DKV 2' },
            { id: 4,  nama: 'Bagas Setiawan', kelas: 'XI PPLG 1' },
            { id: 5,  nama: 'Dimas Prasetyo', kelas: 'XI PPLG 1' },
            { id: 6,  nama: 'Rina Marlina',   kelas: 'XI TKI 2' },
            { id: 7,  nama: 'Budi Santoso',   kelas: 'XI TKJ 2' },
            { id: 8,  nama: 'Siti Nurhaliza', kelas: 'XII DKV 1' },
            { id: 9,  nama: 'Eko Prasetyo',   kelas: 'XII RPL 2' },
            { id: 10, nama: 'Gita Permata',   kelas: 'X DKV 1' },
            { id: 11, nama: 'Hendra Wijaya',  kelas: 'X TKJ 2' },
            { id: 12, nama: 'Indah Sari',     kelas: 'XII TKJ 1' },
            { id: 13, nama: 'Wahyu Hidayat',  kelas: 'XI PPLG 1' },
            { id: 14, nama: 'Nanda Putri',    kelas: 'XI PPLG 1' },
            { id: 15, nama: 'Rizky Maulana',  kelas: 'XI DKV 2' },
            { id: 16, nama: 'Salsa Aulia',    kelas: 'XI DKV 2' },
            { id: 17, nama: 'Tegar Wibowo',   kelas: 'XI TKJ 2' },
            { id: 18, nama: 'Umi Kalsum',     kelas: 'XI TKI 2' },
        ];

        /* ===== LIVE CLOCK (update sendiri tanpa refresh) ===== */
        function updateLiveTime() {
            const now = new Date();
            const dateEl = document.getElementById('live-date');
            const clockEl = document.getElementById('live-clock');

            if (dateEl) {
                dateEl.textContent = now.toLocaleDateString('id-ID', {
                    weekday: 'long', day: 'numeric', month: 'long', year: 'numeric'
                });
            }
            if (clockEl) {
                const jam = String(now.getHours()).padStart(2, '0');
                const menit = String(now.getMinutes()).padStart(2, '0');
                clockEl.textContent = `${jam}.${menit} WIB`;
            }
        }
        updateLiveTime();
        setInterval(updateLiveTime, 1000);

        /* ===== MOBILE SIDEBAR ===== */
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }
        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
        if (hamburgerBtn) hamburgerBtn.addEventListener('click', openSidebar);
        if (sidebarOverlay) sidebarOverlay.addEventListener('click', closeSidebar);
        if (sidebar) {
            sidebar.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 768) closeSidebar();
                });
            });
        }
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                sidebarOverlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });

        /* ===== MOBILE SCROLL HELPER ===== */
        const scrollIndicator = document.getElementById('scrollIndicator');

        function updateScrollIndicator() {
            if (!scrollIndicator) return;
            const scrollTop = window.scrollY || window.pageYOffset;
            const documentHeight = document.documentElement.scrollHeight;
            const windowHeight = window.innerHeight;
            const maxScroll = documentHeight - windowHeight;

            if (maxScroll <= 0) {
                scrollIndicator.style.top = '0px';
                return;
            }

            const trackHeight = 112; // h-28
            const indicatorHeight = 32; // h-8
            const maxTop = trackHeight - indicatorHeight;
            const progress = Math.min(1, Math.max(0, scrollTop / maxScroll));
            scrollIndicator.style.top = `${progress * maxTop}px`;
        }

        window.addEventListener('scroll', updateScrollIndicator, { passive: true });
        window.addEventListener('resize', updateScrollIndicator);

        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        function scrollToBottom() {
            window.scrollTo({ top: document.documentElement.scrollHeight, behavior: 'smooth' });
        }
        updateScrollIndicator();

        /* ===== TOAST ===== */
        let toastTimer;
        function showToast(pesan) {
            const t = document.getElementById('toast');
            document.getElementById('toastText').textContent = pesan;
            t.classList.remove('hidden');
            clearTimeout(toastTimer);
            toastTimer = setTimeout(() => t.classList.add('hidden'), 2600);
        }

        /* ===== DETAIL MODAL GURU ===== */
        function openDetail(id) {
            const modal = document.getElementById(id);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }
        function closeDetail(id) {
            const modal = document.getElementById(id);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }
        document.querySelectorAll('[id^="detail"]').forEach(modal => {
            modal.addEventListener('click', function (event) {
                if (event.target === modal) closeDetail(modal.id);
            });
        });

        function sendToSekre(teacherName = 'Guru') {
            alert(`Jurnal ${teacherName} berhasil diteruskan ke Sekre.`);
        }

        const HARI_NAMA = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const DASAR_LABEL = {
            default: 'Surat tanpa periode (1 hari)',
            surat: 'Periode tertulis di surat',
            dokter: 'Surat dokter',
            diperpanjang: 'Diperpanjang',
        };

        /* ===== DATA JURNAL GURU TIDAK HADIR (dummy, nanti dari database) ===== */
const GURU_TIDAK_HADIR = [
    {
        id: 1,
        nama: 'Erna Rinawati, S.Pd',
        mapel: 'Bahasa Indonesia',
        kondisi: 'tugas', // 'tugas' | 'jamkos'
        alasan: { jenis: 'Sakit', keterangan: 'Demam, sedang periksa ke dokter.' },
        dikirimPada: '06.45',
        sekre: { kelas: 'X DKV 1', nama: 'Rina Marlina', status: 'Disetujui', pada: '06.55' },
        sesi: [
            {
                kelas: 'X DKV 1', ruang: 'R 15', jamKe: '1', jam: '07.00 - 07.40',
                tugas: {
                    judul: 'Membuat Teks Prosedur',
                    isi: 'Buat teks prosedur tentang cara membuat poster digital minimal 5 langkah. Dikerjakan individu di buku tulis, dikumpulkan ke ketua kelas.',
                    lampiran: ['soal-teks-prosedur.pdf'],
                    batas: 'Hari ini, sebelum jam pelajaran selesai',
                },
            },
        ],
    },
    {
        id: 2,
        nama: 'Sri Rahayu, S.Pd',
        mapel: 'Bahasa Indonesia',
        kondisi: 'jamkos',
        alasan: { jenis: 'Izin', keterangan: 'Ada keperluan keluarga mendadak.' },
        dikirimPada: '07.10',
        sekre: { kelas: 'X TKJ 2', nama: 'Budi Santoso', status: 'Menunggu', pada: null },
        sesi: [
            { kelas: 'X TKJ 2', ruang: 'R 33', jamKe: '3', jam: '08.20 - 09.00', tugas: null },
        ],
    },
];

function openGuruDetail(id) {
    const g = GURU_TIDAK_HADIR.find(x => x.id === id);
    if (!g) return;
    document.getElementById('detailGuruBody').innerHTML = guruDetailHtml(g);
    openDetail('detailGuru');
}

function guruDetailHtml(g) {
    const adaTugas = g.kondisi === 'tugas';
    const warnaJenis = { Sakit: 'bg-amber-100 text-amber-700', Izin: 'bg-blue-100 text-blue-700' }[g.alasan.jenis] || 'bg-gray-100 text-gray-600';

    const kondisiBadge = adaTugas
        ? '<span class="inline-flex items-center gap-1 px-2 py-1 rounded-lg bg-emerald-50 text-medium-green text-[9px] font-bold"><i class="fa-solid fa-clipboard-check text-[8px]"></i>Ada Tugas</span>'
        : '<span class="inline-flex items-center gap-1 px-2 py-1 rounded-lg bg-gray-100 text-gray-600 text-[9px] font-bold"><i class="fa-solid fa-circle-minus text-[8px]"></i>Tidak Ada Tugas (Jamkos)</span>';

    const sekreOk = g.sekre.status === 'Disetujui';
    const sekreBadge = sekreOk
        ? `<span class="bg-emerald-100 text-emerald-700 text-[9px] font-bold px-2 py-1 rounded-lg whitespace-nowrap"><i class="fa-solid fa-circle-check mr-1"></i>Disetujui Sekre ${esc(g.sekre.pada)}</span>`
        : '<span class="bg-amber-100 text-amber-700 text-[9px] font-bold px-2 py-1 rounded-lg whitespace-nowrap"><i class="fa-solid fa-hourglass-half mr-1"></i>Menunggu Sekre</span>';

    const sesiHtml = g.sesi.map(s => {
        const info = `
            <div class="grid grid-cols-3 gap-2">
                <div class="bg-white border border-gray-100 rounded-lg px-2.5 py-2">
                    <p class="text-[8px] uppercase tracking-wider font-bold text-gray-400">Kelas</p>
                    <p class="text-[11px] font-extrabold text-dark-green mt-0.5">${esc(s.kelas)}</p>
                </div>
                <div class="bg-white border border-gray-100 rounded-lg px-2.5 py-2">
                    <p class="text-[8px] uppercase tracking-wider font-bold text-gray-400">Ruang</p>
                    <p class="text-[11px] font-extrabold text-dark-green mt-0.5">${esc(s.ruang)}</p>
                </div>
                <div class="bg-white border border-gray-100 rounded-lg px-2.5 py-2">
                    <p class="text-[8px] uppercase tracking-wider font-bold text-gray-400">Jam ke-${esc(s.jamKe)}</p>
                    <p class="text-[11px] font-extrabold text-dark-green mt-0.5">${esc(s.jam)}</p>
                </div>
            </div>`;

        const tugas = s.tugas ? `
            <div class="mt-2.5 rounded-lg bg-emerald-50/60 border border-emerald-100 p-3">
                <p class="text-[9px] uppercase tracking-wider font-bold text-medium-green"><i class="fa-solid fa-clipboard-list mr-1"></i>Tugas untuk kelas</p>
                <p class="text-xs font-extrabold text-dark-green mt-1">${esc(s.tugas.judul)}</p>
                <p class="text-[11px] text-gray-600 mt-1 leading-relaxed whitespace-pre-line">${esc(s.tugas.isi)}</p>
                ${s.tugas.batas ? `<p class="text-[10px] text-gray-500 mt-2"><i class="fa-regular fa-clock mr-1"></i>${esc(s.tugas.batas)}</p>` : ''}
                ${(s.tugas.lampiran && s.tugas.lampiran.length) ? `
                    <div class="flex flex-wrap gap-1.5 mt-2">
                        ${s.tugas.lampiran.map(l => `<span class="inline-flex items-center gap-1.5 bg-white border border-emerald-200 text-medium-green text-[10px] font-semibold px-2.5 py-1 rounded-full"><i class="fa-solid fa-paperclip text-[9px]"></i>${esc(l)}</span>`).join('')}
                    </div>` : ''}
            </div>` : `
            <div class="mt-2.5 rounded-lg bg-gray-100 border border-gray-200 p-3 text-center">
                <p class="text-[11px] font-bold text-gray-500"><i class="fa-solid fa-circle-minus mr-1"></i>Tidak ada tugas &middot; jam kosong (jamkos)</p>
            </div>`;

        return `<div class="rounded-xl border border-gray-100 bg-gray-50 p-3">${info}${tugas}</div>`;
    }).join('');

    return `
        <!-- Identitas guru -->
        <div class="p-4 rounded-xl bg-amber-50 border border-amber-100">
            <div class="flex items-center justify-between gap-3">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center shrink-0"><i class="fa-solid fa-user-clock"></i></div>
                    <div class="min-w-0">
                        <p class="text-xs font-extrabold text-dark-green truncate">${esc(g.nama)}</p>
                        <p class="text-[10px] text-medium-green mt-0.5">${esc(g.mapel)}</p>
                    </div>
                </div>
                ${kondisiBadge}
            </div>
        </div>

        <!-- Alasan -->
        <div class="rounded-xl bg-gray-50 border border-gray-100 p-3">
            <div class="flex items-center justify-between gap-2">
                <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Alasan tidak hadir</p>
                <span class="${warnaJenis} text-[9px] font-bold px-2 py-0.5 rounded-lg">${esc(g.alasan.jenis)}</span>
            </div>
            <p class="text-xs text-dark-green font-semibold mt-1.5 leading-relaxed">${esc(g.alasan.keterangan)}</p>
        </div>

        <!-- Sesi mengajar + tugas -->
        <div>
            <p class="text-[10px] font-bold text-gray-500 mb-2">${adaTugas ? 'Jadwal & tugas yang ditinggalkan' : 'Jadwal mengajar yang kosong'}</p>
            <div class="space-y-2.5">${sesiHtml}</div>
        </div>

        <!-- Status pengiriman -->
        <div class="rounded-xl border border-gray-100 p-3 flex items-center justify-between gap-3">
            <div class="min-w-0">
                <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Dikirim guru pukul ${esc(g.dikirimPada)}</p>
                <p class="text-[11px] text-gray-600 mt-0.5 truncate">Sekre ${esc(g.sekre.kelas)} &middot; ${esc(g.sekre.nama)}</p>
            </div>
            ${sekreBadge}
        </div>`;
}

        function isoDari(d) {
            return `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`;
        }
        function isoOffset(n) { const d = new Date(); d.setDate(d.getDate() + n); return isoDari(d); }
        function parseISO(s) { return new Date(s + 'T00:00:00'); }
        function awalHariIni() { const n = new Date(); return new Date(n.getFullYear(), n.getMonth(), n.getDate()); }
        function jamSekarang() {
            const n = new Date();
            return `${String(n.getHours()).padStart(2, '0')}.${String(n.getMinutes()).padStart(2, '0')}`;
        }
        function fmtPendek(d) { return d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' }); }
        function fmtHariTgl(d) { return `${HARI_NAMA[d.getDay()]}, ${d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' })}`; }
        function hariSelisih(a, b) { return Math.round((Date.UTC(a.getFullYear(), a.getMonth(), a.getDate()) - Date.UTC(b.getFullYear(), b.getMonth(), b.getDate())) / 86400000); }
        function tambahHariTgl(d, n) { const x = new Date(d); x.setDate(x.getDate() + n); return x; }

        /* Hari sekolah berikutnya setelah tanggal 'selesai' (lewati Sabtu & Minggu) */
        function masukKembali(selesaiISO) {
            let d = tambahHariTgl(parseISO(selesaiISO), 1);
            while (d.getDay() === 0 || d.getDay() === 6) d = tambahHariTgl(d, 1);
            return d;
        }
        function waktuCatat(s) { // 'YYYY-MM-DD HH.MM'
            const p = s.split(' ');
            const sel = hariSelisih(awalHariIni(), parseISO(p[0]));
            const hari = sel === 0 ? 'hari ini' : (sel === 1 ? 'kemarin' : fmtPendek(parseISO(p[0])));
            return `${hari} ${p[1]}`;
        }

        let absenSeq = 100;
        const ABSEN = [
            { id: 1, siswaId: 1, jenis: 'Sakit', dasar: 'dokter', mulai: isoOffset(-1), selesai: isoOffset(1),
              alasan: 'Demam berdarah, istirahat 3 hari.', foto: 2,
              pencatat: 'Sunarti, S.Pd', pencatatPada: `${isoOffset(-1)} 07.10`, kembali: null, kembaliOleh: null },
            { id: 2, siswaId: 2, jenis: 'Izin', dasar: 'default', mulai: isoOffset(0), selesai: isoOffset(0),
              alasan: 'Acara keluarga.', foto: 1,
              pencatat: ME, pencatatPada: `${isoOffset(0)} 06.55`, kembali: null, kembaliOleh: null },
            { id: 3, siswaId: 7, jenis: 'Izin', dasar: 'surat', mulai: isoOffset(-3), selesai: isoOffset(-1),
              alasan: 'Mengurus administrasi keluarga di luar kota.', foto: 1,
              pencatat: 'Isti Mufadah, S.Pd', pencatatPada: `${isoOffset(-3)} 07.20`, kembali: null, kembaliOleh: null },
            { id: 4, siswaId: 5, jenis: 'Sakit', dasar: 'default', mulai: isoOffset(-1), selesai: isoOffset(-1),
              alasan: 'Sakit perut.', foto: 1,
              pencatat: 'Sunarti, S.Pd', pencatatPada: `${isoOffset(-1)} 07.15`,
              kembali: `${isoOffset(0)} 06.58`, kembaliOleh: ME },
        ];

        function siswaDari(id) { return DATA_SISWA.find(s => s.id === id) || { nama: '-', kelas: '-' }; }

        function stateAbsen(a) {
            if (a.kembali) return 'kembali';
            const t = awalHariIni();
            if (t < parseISO(a.mulai)) return 'terjadwal';
            if (t > parseISO(a.selesai)) return 'konfirmasi';
            return 'berlaku';
        }

        let absenTab = 'belum';

        function kartuBelum(a) {
            const s = siswaDari(a.siswaId);
            const st = stateAbsen(a);
            const sakit = a.jenis === 'Sakit';
            const m = parseISO(a.mulai), e = parseISO(a.selesai);
            const total = hariSelisih(e, m) + 1;
            const ke = hariSelisih(awalHariIni(), m) + 1;

            let tone = sakit ? 'bg-amber-50 border-amber-100' : 'bg-blue-50 border-blue-100';
            let ikon = sakit ? 'bg-amber-100 text-amber-600' : 'bg-blue-100 text-blue-600';
            let badge;
            if (st === 'konfirmasi') {
                tone = 'bg-red-50 border-red-200'; ikon = 'bg-red-100 text-red-600';
                badge = '<span class="bg-red-100 text-red-700 text-[9px] font-bold px-2 py-1 rounded-lg whitespace-nowrap"><i class="fa-solid fa-triangle-exclamation mr-1"></i>Perlu Dikonfirmasi</span>';
            } else if (st === 'terjadwal') {
                badge = `<span class="bg-gray-100 text-gray-500 text-[9px] font-bold px-2 py-1 rounded-lg whitespace-nowrap">Mulai ${fmtPendek(m)}</span>`;
            } else {
                badge = `<span class="${sakit ? 'bg-amber-100 text-amber-700' : 'bg-blue-100 text-blue-700'} text-[9px] font-bold px-2 py-1 rounded-lg whitespace-nowrap">Tidak masuk</span>`;
            }

            const periode = total === 1
                ? fmtHariTgl(m)
                : `${fmtHariTgl(m)} - ${fmtHariTgl(e)}`;
            const progres = (st === 'berlaku' && total > 1) ? ` &middot; hari ke-${ke} dari ${total}` : '';
            const kembaliTxt = st === 'konfirmasi'
                ? `<span class="text-red-600 font-semibold">Seharusnya sudah masuk ${esc(fmtHariTgl(masukKembali(a.selesai)))}, belum ada konfirmasi.</span>`
                : `Masuk kembali: <span class="font-semibold text-dark-green">${esc(fmtHariTgl(masukKembali(a.selesai)))}</span>`;

            return `
            <div class="absen-card rounded-xl border ${tone} p-3">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex items-start gap-3 min-w-0">
                        <div class="w-8 h-8 rounded-lg ${ikon} flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-user-clock text-xs"></i>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[11px] md:text-xs font-extrabold text-dark-green truncate">${esc(s.nama)}</p>
                            <p class="text-[10px] text-gray-500">${esc(s.kelas)} &middot; ${esc(a.jenis)} &middot; ${esc(DASAR_LABEL[a.dasar])}</p>
                        </div>
                    </div>
                    ${badge}
                </div>
                <div class="mt-2.5 space-y-0.5 text-[10px] text-gray-500 pl-11">
                    <p><i class="fa-regular fa-calendar w-3 mr-1"></i>${esc(periode)}${progres}</p>
                    <p><i class="fa-solid fa-door-open w-3 mr-1"></i>${kembaliTxt}</p>
                    ${a.alasan ? `<p class="truncate"><i class="fa-regular fa-comment w-3 mr-1"></i>${esc(a.alasan)}</p>` : ''}
                    <p class="text-gray-400"><i class="fa-solid fa-pen w-3 mr-1"></i>Dicatat ${esc(a.pencatat)} &middot; ${esc(waktuCatat(a.pencatatPada))}${a.foto ? ` &middot; ${a.foto} foto surat` : ''}</p>
                </div>
                <div class="mt-3 flex gap-2 pl-11">
                    <button type="button" onclick="openExtend(${a.id})"
                        class="flex-1 rounded-lg border border-gray-300 bg-white py-2 text-[10px] font-bold text-gray-600 hover:bg-gray-50 transition">
                        <i class="fa-solid fa-calendar-plus mr-1"></i>Perpanjang
                    </button>
                    <button type="button" onclick="tandaiKembali(${a.id})"
                        class="flex-1 rounded-lg bg-dark-green py-2 text-[10px] font-bold text-white hover:bg-medium-green transition">
                        <i class="fa-solid fa-person-walking-arrow-right mr-1"></i>Sudah Masuk 
                    </button>
                </div>
            </div>`;
        }

        function kartuKembali(a) {
            const s = siswaDari(a.siswaId);
            const p = a.kembali.split(' ');
            const sel = hariSelisih(awalHariIni(), parseISO(p[0]));
            const hari = sel === 0 ? 'hari ini' : (sel === 1 ? 'kemarin' : fmtPendek(parseISO(p[0])));
            return `
            <div class="absen-card rounded-xl border bg-emerald-50 border-emerald-100 p-3">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex items-start gap-3 min-w-0">
                        <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-circle-check text-xs"></i>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[11px] md:text-xs font-extrabold text-dark-green truncate">${esc(s.nama)}</p>
                            <p class="text-[10px] text-gray-500">${esc(s.kelas)} &middot; ${esc(a.jenis)} &middot; ${esc(fmtPendek(parseISO(a.mulai)))}${a.mulai !== a.selesai ? ' - ' + esc(fmtPendek(parseISO(a.selesai))) : ''}</p>
                        </div>
                    </div>
                    <span class="bg-emerald-100 text-emerald-700 text-[9px] font-bold px-2 py-1 rounded-lg whitespace-nowrap">Sudah kembali</span>
                </div>
                <div class="mt-2 flex items-center justify-between gap-3 pl-11">
                    <p class="text-[10px] text-gray-500">Masuk kembali ${hari} pukul ${esc(p[1])} &middot; dikonfirmasi ${esc(a.kembaliOleh || '-')}</p>
                    <button type="button" onclick="urungkanKembali(${a.id})" class="text-[10px] font-bold text-gray-400 hover:text-red-500 whitespace-nowrap">Urungkan</button>
                </div>
            </div>`;
        }

        /* ----- Aksi di daftar ----- */
        function tandaiKembali(id) {
            const a = ABSEN.find(x => x.id === id);
            if (!a) return;
            a.kembali = `${isoOffset(0)} ${jamSekarang()}`;
            a.kembaliOleh = ME;
            renderAbsen();
            showToast(`${siswaDari(a.siswaId).nama} tercatat sudah kembali masuk.`);
        }
        function urungkanKembali(id) {
            const a = ABSEN.find(x => x.id === id);
            if (!a) return;
            a.kembali = null;
            a.kembaliOleh = null;
            renderAbsen();
            showToast('Konfirmasi kembali dibatalkan.');
        }

        /* ----- Perpanjang ----- */
        let extendId = null;
        function openExtend(id) {
            const a = ABSEN.find(x => x.id === id);
            if (!a) return;
            extendId = id;
            const s = siswaDari(a.siswaId);
            document.getElementById('extendInfo').textContent = `${s.nama} \u00B7 ${s.kelas} \u00B7 saat ini sampai ${fmtHariTgl(parseISO(a.selesai))}`;
            const awal = tambahHariTgl(awalHariIni(), 0) > parseISO(a.selesai) ? awalHariIni() : tambahHariTgl(parseISO(a.selesai), 1);
            document.getElementById('extendDate').value = isoDari(awal);
            document.getElementById('extendNote').value = '';
            updateInfoExtend();
            const m = document.getElementById('extendModal');
            m.classList.remove('hidden');
            m.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }
        function closeExtend() {
            const m = document.getElementById('extendModal');
            m.classList.add('hidden');
            m.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
            extendId = null;
        }
        function updateInfoExtend() {
            const v = document.getElementById('extendDate').value;
            document.getElementById('extendKembali').textContent = v ? `Masuk kembali: ${fmtHariTgl(masukKembali(v))}` : '-';
        }
        function saveExtend() {
            const a = ABSEN.find(x => x.id === extendId);
            if (!a) return;
            const v = document.getElementById('extendDate').value;
            if (!v) { alert('Isi tanggal sampai kapan siswa tidak masuk.'); return; }
            if (parseISO(v) < awalHariIni() || v <= a.selesai && parseISO(a.selesai) >= awalHariIni()) {
                alert('Tanggal baru harus setelah tanggal selesai sebelumnya dan tidak boleh sebelum hari ini.');
                return;
            }
            const catatan = document.getElementById('extendNote').value.trim();
            a.selesai = v;
            a.dasar = 'diperpanjang';
            a.kembali = null;
            if (catatan) a.alasan = catatan;
            console.log({ perpanjang: a.id, selesai: v, catatan });
            closeExtend();
            absenTab = 'belum';
            renderAbsen();
            showToast(`Diperpanjang sampai ${fmtHariTgl(parseISO(v))}.`);
        }

        /* ----- Form catat surat ----- */
        let absenSiswaId = null;
        let absenJenis = '';
        let absenPeriode = 'default';
        let absenFotos = [];
        let absenFotoUrls = [];

        function openStudentAbsenceModal() {
            const modal = document.getElementById('studentAbsenceModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');

            absenSiswaId = null;
            absenJenis = '';
            absenFotos = [];
            document.getElementById('absenSearch').value = '';
            document.getElementById('absenResults').classList.add('hidden');
            document.getElementById('studentAbsenceNote').value = '';
            document.getElementById('absenFoto').value = '';
            const hari = isoOffset(0);
            ['absenTanggal', 'absenMulai', 'absenSelesai'].forEach(id => document.getElementById(id).value = hari);
            renderAbsenChip();
            renderFotoAbsen();
            renderJenisAbsen();
            pilihPeriodeAbsen('default');
            setTimeout(() => document.getElementById('absenSearch').focus(), 100);
        }
        function closeStudentAbsenceModal() {
            const modal = document.getElementById('studentAbsenceModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }

        function cariSiswaAbsen(q) {
            const box = document.getElementById('absenResults');
            const kata = q.trim().toLowerCase();
            if (!kata) { box.classList.add('hidden'); return; }
            const hasil = DATA_SISWA.filter(s => (s.nama + ' ' + s.kelas).toLowerCase().includes(kata)).slice(0, 6);
            box.innerHTML = hasil.length
                ? hasil.map(s => `
                    <button type="button" onclick="pilihSiswaAbsen(${s.id})"
                        class="w-full flex items-center justify-between gap-2 px-3 py-2 text-left hover:bg-emerald-50 transition">
                        <span class="text-xs font-semibold text-dark-green">${esc(s.nama)}</span>
                        <span class="text-[10px] text-gray-400">${esc(s.kelas)}</span>
                    </button>`).join('')
                : '<p class="px-3 py-2 text-[11px] text-gray-400">Siswa tidak ditemukan.</p>';
            box.classList.remove('hidden');
        }
        function pilihSiswaAbsen(id) {
            absenSiswaId = id;
            document.getElementById('absenSearch').value = '';
            document.getElementById('absenResults').classList.add('hidden');
            renderAbsenChip();
        }
        function renderAbsenChip() {
            const w = document.getElementById('absenChip');
            if (!absenSiswaId) { w.innerHTML = ''; return; }
            const s = siswaDari(absenSiswaId);
            w.innerHTML = `
            <span class="inline-flex items-center gap-2 bg-emerald-50 border border-emerald-200 text-medium-green text-[11px] font-bold pl-3 pr-2 py-1.5 rounded-full">
                ${esc(s.nama)} <span class="font-semibold text-gray-500">&middot; ${esc(s.kelas)}</span>
                <button type="button" onclick="pilihSiswaAbsen(null)" aria-label="Hapus siswa" class="w-5 h-5 rounded-full hover:bg-emerald-100 flex items-center justify-center">
                    <i class="fa-solid fa-xmark text-[9px]"></i>
                </button>
            </span>`;
        }

        function renderJenisAbsen() {
            document.querySelectorAll('.absen-jenis').forEach(b => {
                const aktif = b.dataset.jenis === absenJenis;
                b.classList.toggle('bg-dark-green', aktif);
                b.classList.toggle('text-white', aktif);
                b.classList.toggle('border-dark-green', aktif);
                b.classList.toggle('text-gray-600', !aktif);
                b.classList.toggle('border-gray-200', !aktif);
            });
        }
        function pilihJenisAbsen(j) {
            absenJenis = j;
            if (j !== 'Sakit' && absenPeriode === 'dokter') pilihPeriodeAbsen('default');
            renderJenisAbsen();
            // surat dokter hanya untuk sakit
            const bDokter = document.querySelector('.absen-periode[data-periode="dokter"]');
            bDokter.disabled = j === 'Izin';
            bDokter.classList.toggle('opacity-40', j === 'Izin');
            bDokter.classList.toggle('cursor-not-allowed', j === 'Izin');
        }

        function pilihPeriodeAbsen(p) {
            if (p === 'dokter' && absenJenis === 'Izin') return;
            absenPeriode = p;
            document.querySelectorAll('.absen-periode').forEach(b => {
                const aktif = b.dataset.periode === p;
                b.classList.toggle('bg-dark-green', aktif);
                b.classList.toggle('text-white', aktif);
                b.classList.toggle('border-dark-green', aktif);
                b.classList.toggle('text-dark-green', !aktif);
                b.classList.toggle('border-gray-200', !aktif);
            });
            document.getElementById('absenFieldSatu').classList.toggle('hidden', p !== 'default');
            document.getElementById('absenFieldRange').classList.toggle('hidden', p === 'default');
            updateInfoKembali();
        }

        function updateInfoKembali() {
            const info = document.getElementById('absenInfoKembali');
            let selesai;
            if (absenPeriode === 'default') {
                selesai = document.getElementById('absenTanggal').value;
            } else {
                const m = document.getElementById('absenMulai').value;
                selesai = document.getElementById('absenSelesai').value;
                if (m && selesai && selesai < m) {
                    info.textContent = 'Tanggal selesai tidak boleh sebelum tanggal mulai.';
                    info.className = 'mt-2 text-[10px] font-semibold text-red-500';
                    return;
                }
            }
            info.className = 'mt-2 text-[10px] font-semibold text-medium-green';
            info.textContent = selesai ? `Siswa diharapkan masuk kembali: ${fmtHariTgl(masukKembali(selesai))}` : '-';
        }

        function pilihFotoAbsen(input) {
            absenFotos = Array.from(input.files).slice(0, 3);
            renderFotoAbsen();
        }
        function renderFotoAbsen() {
            absenFotoUrls.forEach(u => URL.revokeObjectURL(u));
            absenFotoUrls = absenFotos.map(f => URL.createObjectURL(f));
            document.getElementById('absenFotoPreview').innerHTML = absenFotoUrls.map(u => `
                <div class="aspect-[3/4] rounded-lg overflow-hidden border border-gray-200 bg-gray-50">
                    <img src="${u}" alt="Foto surat" class="w-full h-full object-cover">
                </div>`).join('');
        }

        function saveStudentAbsence() {
            if (!absenSiswaId) { alert('Pilih siswa terlebih dahulu.'); return; }
            if (!absenJenis) { alert('Pilih jenis: sakit atau izin.'); return; }
            if (absenFotos.length === 0) { alert('Foto surat wajib dilampirkan.'); return; }

            let mulai, selesai;
            if (absenPeriode === 'default') {
                mulai = selesai = document.getElementById('absenTanggal').value;
                if (!mulai) { alert('Isi tanggal tidak masuk.'); return; }
            } else {
                mulai = document.getElementById('absenMulai').value;
                selesai = document.getElementById('absenSelesai').value;
                if (!mulai || !selesai) { alert('Isi tanggal mulai dan sampai tanggal.'); return; }
                if (selesai < mulai) { alert('Tanggal selesai tidak boleh sebelum tanggal mulai.'); return; }
            }

            const duplikat = ABSEN.find(a => a.siswaId === absenSiswaId && stateAbsen(a) !== 'kembali');
            if (duplikat) {
                alert('Siswa ini masih tercatat belum kembali masuk. Gunakan tombol Perpanjang di daftar, atau tandai sudah kembali dulu.');
                return;
            }

            const catatan = document.getElementById('studentAbsenceNote').value.trim();
            const baru = {
                id: ++absenSeq, siswaId: absenSiswaId, jenis: absenJenis, dasar: absenPeriode,
                mulai, selesai, alasan: catatan, foto: absenFotos.length,
                pencatat: ME, pencatatPada: `${isoOffset(0)} ${jamSekarang()}`, kembali: null, kembaliOleh: null,
            };
            ABSEN.unshift(baru);

            // Data yang nanti dikirim ke backend (FormData supaya foto ikut terupload)
            console.log({
                siswa_id: baru.siswaId, jenis: baru.jenis, dasar: baru.dasar,
                tanggal_mulai: mulai, tanggal_selesai: selesai, catatan, foto: absenFotos,
            });

            const nama = siswaDari(absenSiswaId).nama;
            closeStudentAbsenceModal();
            absenTab = 'belum';
            renderAbsen();
            showToast(`Surat ${nama} tersimpan dan diteruskan ke Sekre.`);
        }

        document.addEventListener('click', e => {
            const picker = document.getElementById('absenPicker');
            if (picker && !picker.contains(e.target)) document.getElementById('absenResults')?.classList.add('hidden');
        });

       
        const DEMO_MODE = true;

        // Piket Waka tetap per hari (dari jadwal piket). 1 = Senin ... 5 = Jumat
        const WAKA_PIKET_HARI = {
            1: 'Setiyo Winarko, S.Pd',
            2: 'Niken Hari Pratiwi, S.Psi., M.Pd',
            3: 'Hardini Indahing Budi, S.E., M.Pd',
            4: 'Hendro Suwignyo, ST',
            5: 'Fajar Luthfianto, S.Pd',
        };
        function wakaHariIni() { return WAKA_PIKET_HARI[new Date().getDay()] || 'Waka piket'; }

        const ALASAN_CEPAT = ['Kesiangan', 'Ban bocor', 'Macet', 'Mengantar keluarga', 'Keperluan keluarga', 'Sakit'];

        // Jam pelajaran (ALOKASI JAM KBM revisi). [jam ke, mulai, selesai]
        const JAM_SENIN_KAMIS = [
            [1, '07.00', '07.40'], [2, '07.40', '08.20'], [3, '08.20', '09.00'], [4, '09.00', '09.40'],
            [5, '10.00', '10.35'], [6, '10.35', '11.10'], [7, '11.10', '11.45'],
            [8, '13.15', '13.50'], [9, '13.50', '14.25'], [10, '14.25', '15.00'],
        ];
        const JAM_JUMAT = [
            [1, '07.00', '07.30'], [2, '07.30', '08.00'], [3, '08.00', '08.30'], [4, '08.30', '09.00'], [5, '09.00', '09.30'],
            [6, '09.50', '10.20'], [7, '10.20', '10.50'], [8, '10.50', '11.20'],
            [9, '13.00', '13.30'], [10, '13.30', '14.00'], [11, '14.00', '14.30'], [12, '14.30', '15.00'], [13, '15.00', '15.30'],
        ];
        function tabelJam() { return new Date().getDay() === 5 ? JAM_JUMAT : JAM_SENIN_KAMIS; }
        function menitDari(s) { const p = s.replace(':', '.').split('.').map(Number); return p[0] * 60 + p[1]; }
        function jamKeDari(waktu) {
            const m = menitDari(waktu);
            const t = tabelJam();
            for (const j of t) { if (m >= menitDari(j[1]) && m < menitDari(j[2])) return j[0]; }
            for (const j of t) { if (m < menitDari(j[1])) return j[0]; }   // saat istirahat -> jam berikutnya
            return t[t.length - 1][0];
        }
        function rentangJam(n) {
            const j = tabelJam().find(x => x[0] === Number(n));
            return j ? `${j[1]} - ${j[2]}` : '';
        }

        const SURAT_TELAT = [
            { id: 1, kelas: 'XI PPLG 1', tanggal: isoOffset(0), waktu: '07.12', jam: 1,
              siswa: [{ id: 4, alasan: 'Ban motor bocor' }, { id: 5, alasan: 'Kesiangan' }],
              ttdPiket: { nama: 'Sunarti, S.Pd', pada: '07.13' },
              ttdWaka: { nama: wakaHariIni(), pada: '07.18' },
              dikirim: { pada: '07.20', ke: ['Guru pengajar jam ke-1', 'Sekre XI PPLG 1'] } },
            { id: 2, kelas: 'XI TKI 2', tanggal: isoOffset(0), waktu: '07.28', jam: 1,
              siswa: [{ id: 6, alasan: 'Macet di jalan' }],
              ttdPiket: { nama: ME, pada: '07.29' }, ttdWaka: null, dikirim: null },
        ];
        let suratSeq = 100;
        let suratPratinjau = null;

        function statusSurat(s) { return s.dikirim ? 'terkirim' : (s.ttdWaka ? 'lengkap' : 'menunggu'); }

        function kartuTelat(s) {
            const st = statusSurat(s);
            const BADGE = {
                menunggu: ['bg-amber-100 text-amber-700', 'Menunggu TTD Waka'],
                lengkap:  ['bg-emerald-100 text-emerald-700', 'Lengkap, siap dikirim'],
                terkirim: ['bg-blue-100 text-blue-700', 'Terkirim'],
            }[st];
            const daftar = s.siswa.map(x => `
                <li class="flex items-start gap-1.5">
                    <i class="fa-solid fa-circle text-[4px] text-violet-400 mt-1.5 shrink-0"></i>
                    <span><span class="font-semibold text-dark-green">${esc(siswaDari(x.id).nama)}</span> &middot; ${esc(x.alasan)}</span>
                </li>`).join('');
            const ttd = `
                <span class="${s.ttdPiket ? 'text-emerald-600' : 'text-amber-600'} font-semibold"><i class="fa-solid ${s.ttdPiket ? 'fa-circle-check' : 'fa-hourglass-half'} mr-1"></i>Piket${s.ttdPiket ? ' ' + esc(s.ttdPiket.pada) : ''}</span>
                <span class="${s.ttdWaka ? 'text-emerald-600' : 'text-amber-600'} font-semibold"><i class="fa-solid ${s.ttdWaka ? 'fa-circle-check' : 'fa-hourglass-half'} mr-1"></i>Waka${s.ttdWaka ? ' ' + esc(s.ttdWaka.pada) : ' (' + esc(wakaHariIni().split(',')[0]) + ')'}</span>`;

            let aksi = `<button type="button" onclick="lihatSuratTelat(${s.id})" class="flex-1 rounded-lg border border-gray-300 bg-white py-2 text-[10px] font-bold text-gray-600 hover:bg-gray-50 transition"><i class="fa-regular fa-file-lines mr-1"></i>Lihat Surat</button>`;
            if (st === 'menunggu') {
                aksi += `<button type="button" onclick="mintaTtdWaka(${s.id})" class="flex-1 rounded-lg bg-emerald-600 py-2 text-[10px] font-bold text-white hover:bg-emerald-700 transition"><i class="fa-brands fa-whatsapp mr-1"></i>Minta TTD Waka</button>`;
            } else if (st === 'lengkap') {
                aksi += `<button type="button" onclick="kirimSuratTelat(${s.id})" class="flex-1 rounded-lg bg-dark-green py-2 text-[10px] font-bold text-white hover:bg-medium-green transition"><i class="fa-solid fa-paper-plane mr-1"></i>Kirim ke Guru &amp; Sekre</button>`;
            }

            return `
            <div class="rounded-xl border border-violet-100 bg-violet-50/50 p-3">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex items-start gap-3 min-w-0">
                        <div class="w-8 h-8 rounded-lg bg-violet-100 text-violet-600 flex items-center justify-center shrink-0">
                            <i class="fa-regular fa-clock text-xs"></i>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[11px] md:text-xs font-extrabold text-dark-green">${esc(s.kelas)} &middot; ${s.siswa.length} siswa</p>
                            <p class="text-[10px] text-gray-500">Tiba ${esc(s.waktu)} &middot; Masuk jam ke-${s.jam}</p>
                        </div>
                    </div>
                    <span class="${BADGE[0]} text-[9px] font-bold px-2 py-1 rounded-lg whitespace-nowrap">${BADGE[1]}</span>
                </div>
                <ul class="mt-2.5 space-y-1 text-[10px] text-gray-500 pl-11">${daftar}</ul>
                <p class="mt-2 text-[10px] text-gray-400 pl-11 flex flex-wrap items-center gap-x-3 gap-y-0.5"><span class="text-gray-400">TTD:</span>${ttd}</p>
                ${s.dikirim ? `<p class="mt-1.5 text-[10px] text-blue-600 pl-11"><i class="fa-solid fa-paper-plane mr-1"></i>Terkirim ${esc(s.dikirim.pada)} ke ${s.dikirim.ke.map(esc).join(' &amp; ')}</p>` : ''}
                <div class="mt-3 flex gap-2 pl-11">${aksi}</div>
                ${(DEMO_MODE && st === 'menunggu') ? `<button type="button" onclick="demoTtdWaka(${s.id})" class="mt-2 ml-11 text-[9px] font-bold text-gray-400 hover:text-violet-600 underline">(demo) tandai Waka sudah TTD</button>` : ''}
            </div>`;
        }

        function renderAbsen() {
            const hariIni = awalHariIni();
            const belum = ABSEN.filter(a => stateAbsen(a) !== 'kembali');
            const kembali = ABSEN.filter(a => a.kembali && hariSelisih(hariIni, parseISO(a.kembali.split(' ')[0])) <= 3);
            const konfirmasi = belum.filter(a => stateAbsen(a) === 'konfirmasi').length;
            const telatHariIni = SURAT_TELAT.filter(s => s.tanggal === isoOffset(0));
            const jumlahTelat = telatHariIni.reduce((n, s) => n + s.siswa.length, 0);
            const menungguWaka = telatHariIni.filter(s => statusSurat(s) === 'menunggu').length;

            // urutan: perlu dikonfirmasi dulu, lalu berlaku, lalu terjadwal
            const bobot = { konfirmasi: 0, berlaku: 1, terjadwal: 2 };
            belum.sort((x, y) => bobot[stateAbsen(x)] - bobot[stateAbsen(y)]);
            kembali.sort((x, y) => (y.kembali > x.kembali ? 1 : -1));
            telatHariIni.sort((x, y) => (y.id - x.id));

            document.getElementById('absenceCount').textContent = belum.length;
            document.getElementById('lateCount').textContent = jumlahTelat;

            const badge = document.getElementById('absencePendingBadge');
            if (konfirmasi > 0) {
                badge.textContent = `${konfirmasi} Perlu Dikonfirmasi`;
                badge.className = 'bg-red-50 text-red-700 px-2.5 py-1 rounded-lg text-[9px] font-extrabold shrink-0';
            } else if (menungguWaka > 0) {
                badge.textContent = `${menungguWaka} Menunggu TTD Waka`;
                badge.className = 'bg-amber-50 text-amber-700 px-2.5 py-1 rounded-lg text-[9px] font-extrabold shrink-0';
            } else {
                badge.textContent = `${belum.length} Belum Kembali`;
                badge.className = (belum.length === 0 ? 'bg-emerald-50 text-emerald-700' : 'bg-amber-50 text-amber-700') + ' px-2.5 py-1 rounded-lg text-[9px] font-extrabold shrink-0';
            }

            const tabs = [
                { k: 'belum', label: 'Belum Kembali', n: belum.length,   aktif: 'bg-dark-green text-white',  idle: 'bg-gray-100 text-gray-600' },
                { k: 'sudah', label: 'Sudah Kembali', n: kembali.length, aktif: 'bg-emerald-600 text-white', idle: 'bg-emerald-50 text-emerald-700' },
                { k: 'telat', label: 'Terlambat',     n: jumlahTelat,    aktif: 'bg-violet-600 text-white',  idle: 'bg-violet-50 text-violet-700' },
            ];
            const tabsEl = document.getElementById('absenTabs');
            tabsEl.innerHTML = tabs.map(t => `
                <button type="button" data-k="${t.k}" aria-pressed="${t.k === absenTab}"
                    class="absen-tab text-[10px] md:text-xs font-bold px-3.5 py-1.5 rounded-full transition ${t.k === absenTab ? t.aktif : t.idle}">
                    ${t.label} <span class="opacity-70">${t.n}</span>
                </button>`).join('');
            tabsEl.querySelectorAll('.absen-tab').forEach(b => b.addEventListener('click', () => { absenTab = b.dataset.k; renderAbsen(); }));

            const list = document.getElementById('studentAbsenceList');
            if (absenTab === 'belum') {
                list.innerHTML = belum.length
                    ? belum.map(kartuBelum).join('')
                    : '<p class="text-center text-xs text-gray-400 py-6">Semua siswa sudah kembali masuk.</p>';
            } else if (absenTab === 'sudah') {
                list.innerHTML = kembali.length
                    ? kembali.map(kartuKembali).join('')
                    : '<p class="text-center text-xs text-gray-400 py-6">Belum ada siswa yang kembali dalam 3 hari terakhir.</p>';
            } else {
                list.innerHTML = telatHariIni.length
                    ? telatHariIni.map(kartuTelat).join('')
                    : '<p class="text-center text-xs text-gray-400 py-6">Belum ada siswa terlambat hari ini.</p>';
            }
        }

        /* ----- Form surat terlambat ----- */
        let lateSiswa = [];          // [{ id, alasan }]

        function openLate() {
            const m = document.getElementById('lateModal');
            m.classList.remove('hidden');
            m.classList.add('flex');
            document.body.classList.add('overflow-hidden');

            const kelasUnik = Array.from(new Set(DATA_SISWA.map(s => s.kelas))).sort();
            document.getElementById('lateKelas').innerHTML =
                '<option value="">Pilih kelas...</option>' + kelasUnik.map(k => `<option value="${esc(k)}">${esc(k)}</option>`).join('');

            lateSiswa = [];
            document.getElementById('lateAlasanUmum').value = '';
            document.getElementById('lateSearch').value = '';
            document.getElementById('lateSearch').disabled = true;
            document.getElementById('lateSearch').placeholder = 'Pilih kelas dulu, lalu cari nama siswa...';
            document.getElementById('lateResults').classList.add('hidden');

            document.getElementById('lateChips').innerHTML = ALASAN_CEPAT.map(a =>
                `<button type="button" onclick="setAlasanUmum('${a}')" class="text-[10px] font-semibold text-violet-700 bg-violet-50 hover:bg-violet-100 border border-violet-100 px-2.5 py-1 rounded-full transition">${a}</button>`).join('');

            const n = new Date();
            document.getElementById('lateWaktu').value = `${String(n.getHours()).padStart(2, '0')}:${String(n.getMinutes()).padStart(2, '0')}`;
            document.getElementById('lateJam').innerHTML = tabelJam().map(j => `<option value="${j[0]}">Jam ke-${j[0]}</option>`).join('');
            updateJamLate();

            document.getElementById('lateInfoTtd').innerHTML =
                `TTD Guru Piket otomatis atas nama kamu. Surat lalu menunggu TTD <strong>Waka piket hari ini (${esc(wakaHariIni())})</strong>. Setelah lengkap, surat bisa dikirim ke guru yang sedang mengajar dan Sekre kelas.`;
            renderLateSiswa();
        }
        function closeLate() {
            const m = document.getElementById('lateModal');
            m.classList.add('hidden');
            m.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }

        function gantiKelasLate() {
            const k = document.getElementById('lateKelas').value;
            lateSiswa = [];
            const input = document.getElementById('lateSearch');
            input.value = '';
            input.disabled = !k;
            input.placeholder = k ? `Cari siswa ${k}...` : 'Pilih kelas dulu, lalu cari nama siswa...';
            document.getElementById('lateResults').classList.add('hidden');
            renderLateSiswa();
        }

        function cariSiswaLate(q) {
            const kelas = document.getElementById('lateKelas').value;
            const box = document.getElementById('lateResults');
            if (!kelas) { box.classList.add('hidden'); return; }
            const kata = q.trim().toLowerCase();
            const sudah = lateSiswa.map(x => x.id);
            const hasil = DATA_SISWA
                .filter(s => s.kelas === kelas && !sudah.includes(s.id) && (!kata || s.nama.toLowerCase().includes(kata)))
                .slice(0, 6);
            box.innerHTML = hasil.length
                ? hasil.map(s => `
                    <button type="button" onclick="tambahSiswaLate(${s.id})"
                        class="w-full flex items-center justify-between gap-2 px-3 py-2 text-left hover:bg-violet-50 transition">
                        <span class="text-xs font-semibold text-dark-green">${esc(s.nama)}</span>
                        <span class="text-[10px] text-gray-400">${esc(s.kelas)}</span>
                    </button>`).join('')
                : '<p class="px-3 py-2 text-[11px] text-gray-400">Tidak ada siswa lain di kelas ini.</p>';
            box.classList.remove('hidden');
        }
        function tambahSiswaLate(id) {
            if (!lateSiswa.some(x => x.id === id)) lateSiswa.push({ id, alasan: '' });
            const input = document.getElementById('lateSearch');
            input.value = '';
            document.getElementById('lateResults').classList.add('hidden');
            renderLateSiswa();
            input.focus();
        }
        function hapusSiswaLate(id) {
            lateSiswa = lateSiswa.filter(x => x.id !== id);
            renderLateSiswa();
        }
        function ubahAlasanLate(id, v) {
            const x = lateSiswa.find(y => y.id === id);
            if (x) x.alasan = v;
        }
        function setAlasanUmum(a) {
            document.getElementById('lateAlasanUmum').value = a;
            renderLateSiswa();
        }
        function renderLateSiswa() {
            const umum = document.getElementById('lateAlasanUmum').value.trim();
            document.getElementById('lateSummary').textContent = lateSiswa.length ? `${lateSiswa.length} siswa` : 'Belum ada siswa';
            document.getElementById('lateList').innerHTML = lateSiswa.map(x => `
                <div class="rounded-xl border border-violet-100 bg-violet-50/40 p-2.5">
                    <div class="flex items-center justify-between gap-2">
                        <span class="text-xs font-bold text-dark-green">${esc(siswaDari(x.id).nama)}</span>
                        <button type="button" onclick="hapusSiswaLate(${x.id})" aria-label="Hapus ${esc(siswaDari(x.id).nama)}"
                            class="w-5 h-5 rounded-full hover:bg-violet-100 text-violet-600 flex items-center justify-center">
                            <i class="fa-solid fa-xmark text-[9px]"></i>
                        </button>
                    </div>
                    <input type="text" value="${esc(x.alasan)}" oninput="ubahAlasanLate(${x.id}, this.value)"
                        placeholder="${umum ? esc(umum) + ' (alasan umum)' : 'Alasan terlambat siswa ini'}"
                        class="w-full mt-1.5 rounded-lg border border-violet-100 bg-white px-2.5 py-2 text-[11px] text-dark-green outline-none focus:border-violet-400 transition">
                </div>`).join('');
        }

        function updateJamLate() {
            const w = document.getElementById('lateWaktu').value;
            if (w) document.getElementById('lateJam').value = String(jamKeDari(w));
            infoJamLate();
        }
        function infoJamLate() {
            const j = document.getElementById('lateJam').value;
            document.getElementById('lateJamInfo').textContent = j ? `Jam ke-${j} \u00B7 ${rentangJam(j)}` : '-';
        }

        function saveLate() {
            const kelas = document.getElementById('lateKelas').value;
            const waktuRaw = document.getElementById('lateWaktu').value;
            const jam = Number(document.getElementById('lateJam').value);
            const umum = document.getElementById('lateAlasanUmum').value.trim();

            if (!kelas) { alert('Pilih kelas terlebih dahulu.'); return; }
            if (lateSiswa.length === 0) { alert('Pilih minimal 1 siswa.'); return; }
            if (!waktuRaw) { alert('Isi jam tiba siswa.'); return; }

            const siswa = [];
            for (const x of lateSiswa) {
                const alasan = x.alasan.trim() || umum;
                if (!alasan) { alert(`Isi alasan terlambat untuk ${siswaDari(x.id).nama}.`); return; }
                siswa.push({ id: x.id, alasan });
            }

            const waktu = waktuRaw.replace(':', '.');
            const baru = {
                id: ++suratSeq, kelas, tanggal: isoOffset(0), waktu, jam, siswa,
                ttdPiket: { nama: ME, pada: jamSekarang() }, ttdWaka: null, dikirim: null,
            };
            SURAT_TELAT.unshift(baru);

            // Data yang nanti dikirim ke backend
            console.log({ kelas, tanggal: baru.tanggal, waktu, jam_ke: jam, siswa, ttd_piket: ME });

            closeLate();
            absenTab = 'telat';
            renderAbsen();
            showToast(`Surat ${kelas} tersimpan. Menunggu TTD Waka.`);
        }

        /* ----- Aksi surat ----- */
        function mintaTtdWaka(id) {
            const s = SURAT_TELAT.find(x => x.id === id);
            if (!s) return;
            const daftar = s.siswa.map(x => `- ${siswaDari(x.id).nama} (${x.alasan})`).join('\n');
            const pesan =
`*PERMINTAAN TTD SURAT IZIN MASUK KELAS*

Kelas: ${s.kelas}
Tiba pukul ${s.waktu} (jam ke-${s.jam})
Siswa terlambat (${s.siswa.length}):
${daftar}

Mohon tanda tangan Waka piket (${wakaHariIni()}) di aplikasi Jurnal Absensi.`;
            window.open(`https://wa.me/${WAKA_WA_NUMBER}?text=${encodeURIComponent(pesan)}`, '_blank');
        }
        function demoTtdWaka(id) {
            const s = SURAT_TELAT.find(x => x.id === id);
            if (!s) return;
            s.ttdWaka = { nama: wakaHariIni(), pada: jamSekarang() };
            renderAbsen();
            showToast('Simulasi: Waka sudah menandatangani surat.');
        }
        function kirimSuratTelat(id) {
            const s = SURAT_TELAT.find(x => x.id === id);
            if (!s || !s.ttdWaka) return;
            // Backend: guru yang sedang mengajar di kelas ini pada jam tsb diambil dari jadwal pelajaran.
            s.dikirim = { pada: jamSekarang(), ke: [`Guru pengajar jam ke-${s.jam}`, `Sekre ${s.kelas}`] };
            renderAbsen();
            showToast(`Surat ${s.kelas} dikirim ke guru pengajar dan Sekre.`);
        }

        /* ----- Pratinjau & cetak ----- */
        function suratTelatHtml(s) {
            const tgl = parseISO(s.tanggal).toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' });
            const sel = 'border:1px solid #888;padding:6px 8px;';
            const baris = s.siswa.map((x, i) => `
                <tr>
                    <td style="${sel}text-align:center;width:36px">${i + 1}</td>
                    <td style="${sel}">${esc(siswaDari(x.id).nama)}</td>
                    <td style="${sel}">${esc(x.alasan)}</td>
                </tr>`).join('');
            const blokTtd = (judul, t, nama) => `
                <div style="text-align:center;width:48%">
                    <div style="font-size:12px">${judul}</div>
                    <div style="height:56px;display:flex;align-items:center;justify-content:center;font-size:11px;color:${t ? '#15803d' : '#b45309'}">
                        ${t ? '&#10003; Ditandatangani digital<br>pukul ' + esc(t.pada) : '(menunggu tanda tangan)'}
                    </div>
                    <div style="font-size:12px;font-weight:bold;text-decoration:underline">${esc(nama)}</div>
                </div>`;
            return `
            <div style="font-family:Georgia,'Times New Roman',serif;color:#111;font-size:13px;line-height:1.5">
                <div style="text-align:center;border-bottom:2px solid #111;padding-bottom:8px;margin-bottom:12px">
                    <div style="font-size:12px;letter-spacing:1px">PEMERINTAH PROVINSI JAWA TIMUR &middot; DINAS PENDIDIKAN</div>
                    <div style="font-size:16px;font-weight:bold">SMK NEGERI 1 BOYOLANGU</div>
                    <div style="font-size:10px">Jl. Ki Mangunsarkoro VI/3 Beji, Boyolangu, Tulungagung</div>
                </div>
                <div style="text-align:center;font-weight:bold;font-size:14px;text-decoration:underline;margin-bottom:12px">SURAT IZIN MASUK KELAS</div>
                <p style="margin:0 0 8px">Dengan ini menerangkan bahwa siswa berikut datang terlambat ke sekolah dan diperkenankan mengikuti pelajaran.</p>
                <table style="font-size:12px;margin-bottom:10px">
                    <tr><td style="padding-right:12px">Kelas</td><td>: <strong>${esc(s.kelas)}</strong></td></tr>
                    <tr><td style="padding-right:12px">Hari / tanggal</td><td>: ${esc(tgl)}</td></tr>
                    <tr><td style="padding-right:12px">Tiba pukul</td><td>: ${esc(s.waktu)} (masuk jam ke-${s.jam})</td></tr>
                </table>
                <table style="width:100%;border-collapse:collapse;font-size:12px">
                    <thead><tr style="background:#f3f4f6">
                        <th style="${sel}">No</th><th style="${sel}text-align:left">Nama Siswa</th><th style="${sel}text-align:left">Alasan Terlambat</th>
                    </tr></thead>
                    <tbody>${baris}</tbody>
                </table>
                <p style="margin:10px 0 14px;font-size:12px">Mohon Bapak/Ibu Guru mengizinkan siswa di atas mengikuti pelajaran.</p>
                <div style="display:flex;justify-content:space-between">
                    ${blokTtd('Guru Piket', s.ttdPiket, s.ttdPiket ? s.ttdPiket.nama : '-')}
                    ${blokTtd('Waka Piket', s.ttdWaka, s.ttdWaka ? s.ttdWaka.nama : wakaHariIni())}
                </div>
            </div>`;
        }
        function lihatSuratTelat(id) {
            const s = SURAT_TELAT.find(x => x.id === id);
            if (!s) return;
            suratPratinjau = id;
            document.getElementById('letterBody').innerHTML = suratTelatHtml(s);
            const m = document.getElementById('letterModal');
            m.classList.remove('hidden');
            m.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }
        function closeLetter() {
            const m = document.getElementById('letterModal');
            m.classList.add('hidden');
            m.classList.remove('flex');
            suratPratinjau = null;
            // modal form tetap menjaga body terkunci bila masih terbuka
            if (document.getElementById('lateModal').classList.contains('hidden')) document.body.classList.remove('overflow-hidden');
        }
        function cetakSuratTelat() {
            const s = SURAT_TELAT.find(x => x.id === suratPratinjau);
            if (!s) return;
            const w = window.open('', '_blank');
            if (!w) { alert('Izinkan pop-up untuk mencetak surat.'); return; }
            w.document.write(`<!doctype html><html><head><meta charset="utf-8"><title>Surat Izin Masuk Kelas - ${esc(s.kelas)}</title>` +
                `<style>body{margin:0;padding:32px}@media print{body{padding:0}}</style></head><body>${suratTelatHtml(s)}</body></html>`);
            w.document.close();
            w.focus();
            setTimeout(() => w.print(), 300);
        }

        document.addEventListener('click', e => {
            const picker = document.getElementById('latePicker');
            if (picker && !picker.contains(e.target)) document.getElementById('lateResults')?.classList.add('hidden');
        });

        /* ===== MODAL PENGAJUAN DISPENSASI ===== */
        const JAM_PELAJARAN = {
            1: ['07.00', '07.40'], 2: ['07.40', '08.20'], 3: ['08.20', '09.00'], 4: ['09.00', '09.40'],
            5: ['10.00', '10.40'], 6: ['10.40', '11.20'], 7: ['11.20', '12.00'], 8: ['12.00', '12.40'],
        };

        let selectedDispenType = '';
        let dispenMode = 'jam';      // 'jam' | 'hari' | 'range'
        let dispenSiswa = [];        // daftar id siswa terpilih
        let dispenFotos = [];        // File[]
        let dispenFotoUrls = [];

        function todayISO() {
            const d = new Date();
            return `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`;
        }

        function openDispensasiModal() {
            const modal = document.getElementById('dispensasiModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');

            ['dispenKegiatan', 'dispenNote', 'dispenSearch'].forEach(id => document.getElementById(id).value = '');
            const hariIni = todayISO();
            ['dispenDate', 'dispenStart', 'dispenEnd'].forEach(id => document.getElementById(id).value = hariIni);

            selectedDispenType = '';
            document.querySelectorAll('.dispen-type').forEach(btn => {
                btn.classList.remove('bg-purple-600', 'text-white', 'border-purple-600');
                btn.classList.add('text-gray-600', 'border-gray-200');
            });

            const opsiJam = Object.keys(JAM_PELAJARAN).map(j => `<option value="${j}">Jam ke-${j}</option>`).join('');
            document.getElementById('dispenJamDari').innerHTML = opsiJam;
            document.getElementById('dispenJamSampai').innerHTML = opsiJam;
            document.getElementById('dispenJamSampai').value = '2';

            dispenSiswa = [];
            renderDispenChips();
            dispenFotos = [];
            renderFotoPreview();
            document.getElementById('dispenFoto').value = '';
            document.getElementById('dispenResults').classList.add('hidden');

            setDispenMode('jam');
            setTimeout(() => document.getElementById('dispenKegiatan').focus(), 100);
        }

        function closeDispensasiModal() {
            const modal = document.getElementById('dispensasiModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }

        function selectDispenType(button, type) {
            selectedDispenType = type;
            document.querySelectorAll('.dispen-type').forEach(btn => {
                btn.classList.remove('bg-purple-600', 'text-white', 'border-purple-600');
                btn.classList.add('text-gray-600', 'border-gray-200');
            });
            button.classList.remove('text-gray-600', 'border-gray-200');
            button.classList.add('bg-purple-600', 'text-white', 'border-purple-600');
        }

        /* ----- Lama dispensasi ----- */
        function setDispenMode(mode) {
            dispenMode = mode;
            document.querySelectorAll('.dispen-mode').forEach(btn => {
                const aktif = btn.dataset.mode === mode;
                btn.classList.toggle('bg-purple-600', aktif);
                btn.classList.toggle('text-white', aktif);
                btn.classList.toggle('border-purple-600', aktif);
                btn.classList.toggle('text-gray-600', !aktif);
                btn.classList.toggle('border-gray-200', !aktif);
            });
            document.getElementById('fieldTanggal').classList.toggle('hidden', mode === 'range');
            document.getElementById('fieldJam').classList.toggle('hidden', mode !== 'jam');
            document.getElementById('fieldRange').classList.toggle('hidden', mode !== 'range');
            updateJamInfo();
        }

        function updateJamInfo() {
            const dari = Number(document.getElementById('dispenJamDari').value);
            const sampai = Number(document.getElementById('dispenJamSampai').value);
            const info = document.getElementById('dispenJamInfo');
            if (sampai < dari) {
                info.textContent = 'Jam selesai tidak boleh sebelum jam mulai.';
                info.className = 'mt-1.5 text-[10px] font-semibold text-red-500';
                return;
            }
            info.textContent = `Pukul ${JAM_PELAJARAN[dari][0]} - ${JAM_PELAJARAN[sampai][1]}`;
            info.className = 'mt-1.5 text-[10px] font-semibold text-purple-600';
        }

        /* ----- Siswa: banyak, beda kelas ----- */
        function cariSiswaDispen(q) {
            const box = document.getElementById('dispenResults');
            const kata = q.trim().toLowerCase();
            if (!kata) { box.classList.add('hidden'); return; }

            const hasil = DATA_SISWA
                .filter(s => !dispenSiswa.includes(s.id) && (s.nama + ' ' + s.kelas).toLowerCase().includes(kata))
                .slice(0, 6);

            box.innerHTML = hasil.length
                ? hasil.map(s => `
                    <button type="button" onclick="tambahSiswaDispen(${s.id})"
                        class="w-full flex items-center justify-between gap-2 px-3 py-2 text-left hover:bg-purple-50 transition">
                        <span class="text-xs font-semibold text-dark-green">${escapeHtml(s.nama)}</span>
                        <span class="text-[10px] text-gray-400">${escapeHtml(s.kelas)}</span>
                    </button>`).join('')
                : '<p class="px-3 py-2 text-[11px] text-gray-400">Siswa tidak ditemukan.</p>';
            box.classList.remove('hidden');
        }

        function tambahSiswaDispen(id) {
            if (!dispenSiswa.includes(id)) dispenSiswa.push(id);
            const input = document.getElementById('dispenSearch');
            input.value = '';
            document.getElementById('dispenResults').classList.add('hidden');
            renderDispenChips();
            input.focus();
        }

        function hapusSiswaDispen(id) {
            dispenSiswa = dispenSiswa.filter(x => x !== id);
            renderDispenChips();
        }

        function renderDispenChips() {
            const wadah = document.getElementById('dispenChips');
            const ringkas = document.getElementById('dispenSiswaSummary');
            if (dispenSiswa.length === 0) {
                wadah.innerHTML = '';
                ringkas.textContent = 'Belum ada siswa';
                return;
            }

            const perKelas = {};
            dispenSiswa.forEach(id => {
                const s = DATA_SISWA.find(x => x.id === id);
                if (!s) return;
                (perKelas[s.kelas] = perKelas[s.kelas] || []).push(s);
            });

            ringkas.textContent = `${dispenSiswa.length} siswa dari ${Object.keys(perKelas).length} kelas`;
            wadah.innerHTML = `<div class="rounded-xl border border-purple-100 bg-purple-50/50 p-2.5 space-y-2.5">` +
                Object.keys(perKelas).map(kelas => `
                    <div>
                        <p class="text-[9px] font-extrabold uppercase tracking-wide text-purple-700">${escapeHtml(kelas)} &middot; ${perKelas[kelas].length} siswa</p>
                        <div class="flex flex-wrap gap-1.5 mt-1">
                            ${perKelas[kelas].map(s => `
                                <span class="inline-flex items-center gap-1.5 bg-white border border-purple-200 text-purple-700 text-[10px] font-semibold pl-2.5 pr-1.5 py-1 rounded-full">
                                    ${escapeHtml(s.nama)}
                                    <button type="button" onclick="hapusSiswaDispen(${s.id})" aria-label="Hapus ${escapeHtml(s.nama)}"
                                        class="w-4 h-4 rounded-full hover:bg-purple-100 flex items-center justify-center">
                                        <i class="fa-solid fa-xmark text-[8px]"></i>
                                    </button>
                                </span>`).join('')}
                        </div>
                    </div>`).join('') + `</div>`;
        }

        document.addEventListener('click', e => {
            const picker = document.getElementById('dispenPicker');
            if (picker && !picker.contains(e.target)) {
                document.getElementById('dispenResults')?.classList.add('hidden');
            }
        });

        /* ----- Foto surat ----- */
        function pilihFotoDispen(input) {
            dispenFotos = Array.from(input.files).slice(0, 3);
            renderFotoPreview();
        }

        function renderFotoPreview() {
            dispenFotoUrls.forEach(u => URL.revokeObjectURL(u));
            dispenFotoUrls = dispenFotos.map(f => URL.createObjectURL(f));
            document.getElementById('dispenFotoPreview').innerHTML = dispenFotoUrls.map(u => `
                <div class="aspect-[3/4] rounded-lg overflow-hidden border border-gray-200 bg-gray-50">
                    <img src="${u}" alt="Foto surat" class="w-full h-full object-cover">
                </div>`).join('');
        }

        /* ----- Simpan ----- */
        function formatTanggalIndo(value) {
            if (!value) return '-';
            const d = new Date(value + 'T00:00:00');
            return d.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
        }

        function saveDispensasi() {
            const kegiatan = document.getElementById('dispenKegiatan').value.trim();
            const note = document.getElementById('dispenNote').value.trim();

            if (!kegiatan || !selectedDispenType) { alert('Isi kegiatan dan pilih jenis dispensasi.'); return; }
            if (dispenSiswa.length === 0) { alert('Pilih minimal 1 siswa.'); return; }
            if (dispenFotos.length === 0) { alert('Foto surat dispensasi wajib dilampirkan.'); return; }

            let tglMulai, tglSelesai, jamMulai = null, jamSelesai = null, waktuLabel, waktuSingkat;

            if (dispenMode === 'range') {
                tglMulai = document.getElementById('dispenStart').value;
                tglSelesai = document.getElementById('dispenEnd').value;
                if (!tglMulai || !tglSelesai) { alert('Isi tanggal mulai dan selesai.'); return; }
                if (tglSelesai < tglMulai) { alert('Tanggal selesai tidak boleh sebelum tanggal mulai.'); return; }
                waktuLabel = tglMulai === tglSelesai
                    ? formatTanggalIndo(tglMulai)
                    : `${formatTanggalIndo(tglMulai)} - ${formatTanggalIndo(tglSelesai)}`;
                waktuSingkat = waktuLabel;
            } else {
                tglMulai = tglSelesai = document.getElementById('dispenDate').value;
                if (!tglMulai) { alert('Isi tanggal dispensasi.'); return; }
                if (dispenMode === 'jam') {
                    const dari = Number(document.getElementById('dispenJamDari').value);
                    const sampai = Number(document.getElementById('dispenJamSampai').value);
                    if (sampai < dari) { alert('Jam selesai tidak boleh sebelum jam mulai.'); return; }
                    jamMulai = JAM_PELAJARAN[dari][0];
                    jamSelesai = JAM_PELAJARAN[sampai][1];
                    const rentang = dari === sampai ? `Jam ke-${dari}` : `Jam ke-${dari} s/d ${sampai}`;
                    waktuLabel = `${formatTanggalIndo(tglMulai)}, ${rentang} (${jamMulai} - ${jamSelesai})`;
                    waktuSingkat = `${formatTanggalIndo(tglMulai)} \u00B7 ${rentang}`;
                } else {
                    waktuLabel = `${formatTanggalIndo(tglMulai)} (1 hari penuh)`;
                    waktuSingkat = `${formatTanggalIndo(tglMulai)} \u00B7 1 hari`;
                }
            }

            // Kelompokkan siswa per kelas
            const perKelas = {};
            dispenSiswa.forEach(id => {
                const s = DATA_SISWA.find(x => x.id === id);
                if (s) (perKelas[s.kelas] = perKelas[s.kelas] || []).push(s.nama);
            });
            const jumlahKelas = Object.keys(perKelas).length;

            // Tambah ke daftar di dashboard
            const list = document.getElementById('dispensasiList');
            const item = document.createElement('div');
            item.className = 'dispensasi-item flex items-center justify-between gap-3 rounded-xl bg-purple-50 border border-purple-100 p-3';
            item.dataset.status = 'Menunggu Persetujuan';
            item.innerHTML = `
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-calendar-days text-xs"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-[11px] font-extrabold text-dark-green truncate">${escapeHtml(kegiatan)}</p>
                        <p class="text-[10px] text-gray-500 truncate">${dispenSiswa.length} siswa &middot; ${jumlahKelas} kelas &middot; ${escapeHtml(waktuSingkat)}</p>
                    </div>
                </div>
                <span class="dispensasi-status-badge bg-purple-100 text-purple-700 text-[9px] font-bold px-2 py-1 rounded-lg shrink-0">Menunggu</span>`;
            list.insertBefore(item, list.firstChild);
            updateDispenCount();

            // Data yang nanti dikirim ke backend (pakai FormData supaya foto ikut terupload)
            console.log({
                kegiatan, jenis: selectedDispenType, mode: dispenMode,
                tanggal_mulai: tglMulai, tanggal_selesai: tglSelesai,
                jam_mulai: jamMulai, jam_selesai: jamSelesai,
                siswa_ids: dispenSiswa, foto: dispenFotos, catatan: note,
            });

            // Pesan WhatsApp (daftar siswa dikelompokkan per kelas)
            const daftarSiswa = Object.keys(perKelas)
                .map(k => `${k}\n${perKelas[k].map(n => `- ${n}`).join('\n')}`)
                .join('\n\n');

            const pesan =
`*PERMOHONAN DISPENSASI SISWA*

Kegiatan: ${kegiatan}
Jenis: ${selectedDispenType}
Waktu: ${waktuLabel}
Jumlah: ${dispenSiswa.length} siswa (${jumlahKelas} kelas)

Daftar siswa:
${daftarSiswa}

Catatan: ${note || '-'}
Foto surat dapat dilihat di aplikasi Jurnal Absensi.

Diajukan oleh Guru Piket. Mohon persetujuan Bapak/Ibu Waka Kesiswaan.`;

            const waUrl = `https://wa.me/${WAKA_WA_NUMBER}?text=${encodeURIComponent(pesan)}`;
            closeDispensasiModal();
            window.open(waUrl, '_blank');
        }

        function updateDispenCount() {
            const pending = document.querySelectorAll('.dispensasi-item[data-status="Menunggu Persetujuan"]').length;
            const count = document.getElementById('dispenCount');
            const badge = document.getElementById('dispenPendingBadge');
            if (count) count.textContent = pending;
            if (badge) badge.textContent = `${pending} Menunggu`;
        }

        /* ===== HELPERS ===== */
        function escapeHtml(value) {
            const div = document.createElement('div');
            div.textContent = value;
            return div.innerHTML;
        }
        function esc(value) { return escapeHtml(value); }

        document.getElementById('studentAbsenceModal')?.addEventListener('click', function (e) {
            if (e.target === this) closeStudentAbsenceModal();
        });
        document.getElementById('extendModal')?.addEventListener('click', function (e) {
            if (e.target === this) closeExtend();
        });
        document.getElementById('dispensasiModal')?.addEventListener('click', function (e) {
            if (e.target === this) closeDispensasiModal();
        });
        document.getElementById('lateModal')?.addEventListener('click', function (e) {
            if (e.target === this) closeLate();
        });
        document.getElementById('letterModal')?.addEventListener('click', function (e) {
            if (e.target === this) closeLetter();
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeStudentAbsenceModal();
                closeExtend();
                closeLate();
                closeLetter();
                closeDispensasiModal();
                document.querySelectorAll('[id^="detail"]').forEach(modal => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                });
                document.body.classList.remove('overflow-hidden');
            }
        });

        /* ===== INIT ===== */
        renderAbsen();
        setInterval(renderAbsen, 60000); // status "Perlu Dikonfirmasi" ikut berganti saat tanggal berganti
    </script>
</body>
</html>