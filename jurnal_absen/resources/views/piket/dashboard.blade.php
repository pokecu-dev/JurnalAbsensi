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
    <!-- SIDEBAR (sama seperti dashboard Admin) -->
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
                <span>Akun guru</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                    <i class="fa-solid fa-right-from-bracket w-4"></i>
                    <span>Logout</span>
                </button>
            </form>
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
                    <h2 class="text-lg sm:text-xl md:text-2xl font-black tracking-wide leading-tight mt-1">Guru Piket KBM</h2>
                    <p class="text-xs text-gray-300 font-semibold mt-1">
                        Terima laporan guru tidak hadir, catat surat ketidakhadiran siswa, dan ajukan dispensasi bila perlu.
                    </p>
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
        <section class="grid grid-cols-3 gap-2 md:gap-4">
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
                    <p class="text-[8px] md:text-xs font-bold text-gray-500 leading-tight">Ketidakhadiran</p>
                    <p id="absenceCount" class="text-sm md:text-xl font-black text-blue-600">2</p>
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
        </section>

        <!-- ============================================================= -->
        <!-- JURNAL MASUK DARI SEKRE -->
        <!-- ============================================================= -->
        <section id="jurnalMasuk" class="bg-white p-4 md:p-6 rounded-2xl shadow-sm border border-emerald-100 scroll-mt-20">
            <div class="flex items-center justify-between gap-3 mb-4">
                <div>
                    <h3 class="text-sm md:text-base font-extrabold text-dark-green">Guru Tidak Hadir</h3>
                    <p class="text-[10px] md:text-xs text-gray-400 mt-0.5">Terdeteksi otomatis dari jadwal &middot; isi tugas kelas lalu teruskan ke Sekre.</p>
                </div>
                <span class="px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 text-[9px] font-bold shrink-0">2 Perlu Ditangani</span>
            </div>

            <!-- MOBILE CARDS -->
            <div class="space-y-3 md:hidden">
                <div class="border border-amber-100 bg-amber-50/40 rounded-xl p-3">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex items-start gap-2.5 min-w-0">
                            <div class="w-9 h-9 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-user-clock text-xs"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs font-extrabold text-dark-green">Erna Rinawati, S.Pd</p>
                                <p class="text-[10px] text-medium-green font-semibold mt-0.5">Bahasa Indonesia</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 rounded-full bg-amber-100 text-amber-700 text-[9px] font-bold shrink-0">Belum Diproses</span>
                    </div>
                    <div class="mt-3 pt-2.5 border-t border-amber-100 space-y-1.5 text-[10px] text-gray-500">
                        <div class="flex items-center gap-2"><i class="fa-solid fa-school text-gray-400 w-3"></i><span>X DKV 1</span></div>
                        <div class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-gray-400 w-3"></i><span>R 15</span></div>
                    </div>
                    <button type="button" onclick="openDetail('detail1')" class="w-full mt-3 bg-dark-green hover:bg-medium-green text-white text-[10px] font-bold py-2 rounded-lg transition">Lihat Detail</button>
                </div>

                <div class="border border-amber-100 bg-amber-50/40 rounded-xl p-3">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex items-start gap-2.5 min-w-0">
                            <div class="w-9 h-9 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-user-clock text-xs"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs font-extrabold text-dark-green">Sri Rahayu, S.Pd</p>
                                <p class="text-[10px] text-medium-green font-semibold mt-0.5">Bahasa Indonesia</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 rounded-full bg-amber-100 text-amber-700 text-[9px] font-bold shrink-0">Belum Diproses</span>
                    </div>
                    <div class="mt-3 pt-2.5 border-t border-amber-100 space-y-1.5 text-[10px] text-gray-500">
                        <div class="flex items-center gap-2"><i class="fa-solid fa-school text-gray-400 w-3"></i><span>X TKJ 2</span></div>
                        <div class="flex items-center gap-2"><i class="fa-solid fa-location-dot text-gray-400 w-3"></i><span>R 33</span></div>
                    </div>
                    <button type="button" onclick="openDetail('detail2')" class="w-full mt-3 bg-dark-green hover:bg-medium-green text-white text-[10px] font-bold py-2 rounded-lg transition">Lihat Detail</button>
                </div>
            </div>

            <!-- DESKTOP TABLE -->
            <div class="hidden md:block border border-gray-100 rounded-xl overflow-hidden">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="text-gray-400 font-extrabold text-[10px] uppercase tracking-wider border-b border-gray-100 bg-gray-50/50">
                            <th class="p-3">Guru</th>
                            <th class="p-3">Mata Pelajaran</th>
                            <th class="p-3">Kelas</th>
                            <th class="p-3">Ruang</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 font-medium text-gray-700">
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-3 font-bold text-dark-green">Erna Rinawati, S.Pd</td>
                            <td class="p-3">Bahasa Indonesia</td>
                            <td class="p-3">X DKV 1</td>
                            <td class="p-3">R 15</td>
                            <td class="p-3"><span class="text-amber-600 font-bold">Belum Diproses</span></td>
                            <td class="p-3"><button type="button" onclick="openDetail('detail1')" class="bg-dark-green hover:bg-medium-green text-white px-3 py-1.5 rounded-lg text-[10px] font-bold transition">Detail</button></td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-3 font-bold text-dark-green">Sri Rahayu, S.Pd</td>
                            <td class="p-3">Bahasa Indonesia</td>
                            <td class="p-3">X TKJ 2</td>
                            <td class="p-3">R 33</td>
                            <td class="p-3"><span class="text-amber-600 font-bold">Belum Diproses</span></td>
                            <td class="p-3"><button type="button" onclick="openDetail('detail2')" class="bg-dark-green hover:bg-medium-green text-white px-3 py-1.5 rounded-lg text-[10px] font-bold transition">Detail</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- KETIDAKHADIRAN SISWA (Surat masuk dari orang tua/siswa) -->
        <!-- ============================================================= -->
        <section id="ketidakhadiranSiswa" class="bg-white rounded-2xl shadow-sm border-2 border-blue-100 p-4 md:p-6 scroll-mt-20">
            <div class="flex items-start justify-between gap-3 mb-4">
                <div class="min-w-0">
                    <div class="flex items-center gap-2">
                        <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-user-check text-sm"></i>
                        </div>
                        <div>
                            <h2 class="text-sm md:text-base font-extrabold text-dark-green">Ketidakhadiran Siswa</h2>
                            <p class="text-[10px] md:text-xs text-gray-400 mt-0.5">Catat surat sakit/izin yang diserahkan ke piket, lalu teruskan ke kelas &amp; Sekre.</p>
                        </div>
                    </div>
                </div>
                <span id="absencePendingBadge" class="bg-amber-50 text-amber-700 px-2.5 py-1 rounded-lg text-[9px] font-extrabold shrink-0">2 Belum Dikirim</span>
            </div>

            <button type="button" onclick="openStudentAbsenceModal()"
                class="w-full bg-dark-green hover:bg-medium-green active:scale-[0.98] text-white rounded-xl p-3.5 transition-all text-left">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-white/10 text-mint-green flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-extrabold">Catat Surat Ketidakhadiran</p>
                        <p class="text-[10px] text-gray-300 mt-0.5">Sakit, izin, atau dispensasi</p>
                    </div>
                    <i class="fa-solid fa-chevron-right text-xs text-mint-green shrink-0"></i>
                </div>
            </button>

            <div id="studentAbsenceList" class="mt-4 space-y-2.5">
                <div class="student-absence-item flex items-center justify-between gap-3 rounded-xl bg-amber-50 border border-amber-100 p-3" data-status="Belum Dikirim">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-8 h-8 rounded-lg bg-amber-100 text-amber-600 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-user-clock text-xs"></i>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[11px] font-extrabold text-dark-green truncate">Ahmad Fauzan</p>
                            <p class="text-[10px] text-gray-500">XI RPL 2 &middot; Sakit</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <span class="absence-status-badge bg-amber-100 text-amber-700 text-[9px] font-bold px-2 py-1 rounded-lg">Belum Dikirim</span>
                        <button type="button" onclick="sendStudentAbsence(this)" class="w-7 h-7 rounded-lg bg-dark-green text-white flex items-center justify-center hover:bg-medium-green transition">
                            <i class="fa-solid fa-paper-plane text-[9px]"></i>
                        </button>
                    </div>
                </div>

                <div class="student-absence-item flex items-center justify-between gap-3 rounded-xl bg-blue-50 border border-blue-100 p-3" data-status="Terkirim ke Sekre">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-user-clock text-xs"></i>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[11px] font-extrabold text-dark-green truncate">Citra Ayu</p>
                            <p class="text-[10px] text-gray-500">XI TKI 1 &middot; Izin</p>
                        </div>
                    </div>
                    <span class="absence-status-badge bg-blue-100 text-blue-700 text-[9px] font-bold px-2 py-1 rounded-lg shrink-0">Terkirim ke Sekre</span>
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- PENGAJUAN DISPENSASI (baru) -->
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
                            <p class="text-[11px] font-extrabold text-dark-green truncate">Bagas Setiawan &middot; XI PPLG 1</p>
                            <p class="text-[10px] text-gray-500">Acara Keluarga &middot; 2&ndash;3 Sep 2026</p>
                        </div>
                    </div>
                    <span class="dispensasi-status-badge bg-purple-100 text-purple-700 text-[9px] font-bold px-2 py-1 rounded-lg shrink-0">Menunggu</span>
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- JADWAL PIKET -->
        <!-- ============================================================= -->
        <section class="bg-white rounded-2xl shadow-sm border border-emerald-100 p-4 md:p-6">
            <div class="mb-4">
                <h2 class="text-sm md:text-base font-extrabold text-dark-green">Jadwal Piket</h2>
                <p class="text-[10px] md:text-xs text-gray-400 mt-0.5">Jadwal petugas piket KBM.</p>
            </div>
            <div class="space-y-3">
                <div class="border border-gray-100 rounded-xl p-3 hover:border-medium-green transition">
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-xl bg-dark-green text-mint-green flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-calendar-check text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                                <div>
                                    <p class="text-[11px] font-extrabold text-dark-green">Selasa, 1 September 2026</p>
                                    <p class="text-[10px] text-gray-500 mt-1">Petugas Piket KBM Pagi</p>
                                </div>
                                <span class="bg-blue-50 text-blue-700 text-[10px] font-bold px-2.5 py-1 rounded-lg self-start">07.00 &ndash; 11.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border border-gray-100 rounded-xl p-3 hover:border-medium-green transition">
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-xl bg-dark-green text-mint-green flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-calendar-check text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                                <div>
                                    <p class="text-[11px] font-extrabold text-dark-green">Selasa, 15 September 2026</p>
                                    <p class="text-[10px] text-gray-500 mt-1">Petugas Piket KBM Pagi</p>
                                </div>
                                <span class="bg-blue-50 text-blue-700 text-[10px] font-bold px-2.5 py-1 rounded-lg self-start">07.00 &ndash; 11.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <div class="flex justify-start pb-5">
            <span class="text-[9px] md:text-[10px] text-gray-400">Jurnal Absensi &middot; Guru Piket</span>
        </div>
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

    <!-- ================================================================= -->
    <!-- MODAL: KETIDAKHADIRAN SISWA -->
    <!-- ================================================================= -->
    <div id="studentAbsenceModal" class="fixed inset-0 z-[70] hidden items-end md:items-center justify-center bg-dark-green/60 backdrop-blur-sm p-0 md:p-4">
        <div class="bg-white rounded-t-3xl md:rounded-2xl w-full md:max-w-md max-h-[90vh] overflow-y-auto shadow-2xl" onclick="event.stopPropagation()">
            <div class="flex items-center justify-between gap-3 px-5 py-4 border-b border-gray-100">
                <div>
                    <h2 class="text-sm md:text-base font-extrabold text-dark-green">Catat Ketidakhadiran</h2>
                    <p class="text-[10px] text-gray-400 mt-0.5">Berdasarkan surat yang diterima piket.</p>
                </div>
                <button type="button" onclick="closeStudentAbsenceModal()" class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center hover:bg-gray-200">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="p-5 space-y-4">
                <div>
                    <label class="text-[10px] font-bold text-gray-500">Nama Siswa</label>
                    <input id="studentName" type="text" placeholder="Contoh: Ahmad Fauzan"
                        class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-medium-green focus:bg-white transition">
                </div>
                <div>
                    <label class="text-[10px] font-bold text-gray-500">Kelas</label>
                    <input id="studentClass" type="text" placeholder="Contoh: XI RPL 2"
                        class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-medium-green focus:bg-white transition">
                </div>
                <div>
                    <label class="text-[10px] font-bold text-gray-500">Alasan Ketidakhadiran</label>
                    <div class="grid grid-cols-3 gap-2 mt-1.5">
                        <button type="button" onclick="selectStudentAbsenceStatus(this, 'Sakit')" class="student-absence-status rounded-xl border border-gray-200 px-2 py-3 text-[10px] font-bold text-gray-600 transition">
                            <i class="fa-solid fa-kit-medical mb-1 block"></i>Sakit
                        </button>
                        <button type="button" onclick="selectStudentAbsenceStatus(this, 'Izin')" class="student-absence-status rounded-xl border border-gray-200 px-2 py-3 text-[10px] font-bold text-gray-600 transition">
                            <i class="fa-solid fa-file-signature mb-1 block"></i>Izin
                        </button>
                        <button type="button" onclick="selectStudentAbsenceStatus(this, 'Dispensasi')" class="student-absence-status rounded-xl border border-gray-200 px-2 py-3 text-[10px] font-bold text-gray-600 transition">
                            <i class="fa-solid fa-calendar-days mb-1 block"></i>Dispensasi
                        </button>
                    </div>
                </div>
                <div>
                    <label class="text-[10px] font-bold text-gray-500">Catatan <span class="font-normal text-gray-400">(opsional)</span></label>
                    <textarea id="studentAbsenceNote" rows="3" placeholder="Contoh: Surat dari orang tua sudah diterima."
                        class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-medium-green focus:bg-white transition resize-none"></textarea>
                </div>
                <div class="rounded-xl bg-blue-50 border border-blue-100 p-3">
                    <div class="flex gap-2">
                        <i class="fa-solid fa-circle-info text-blue-500 text-xs mt-0.5"></i>
                        <p class="text-[10px] text-blue-700 leading-relaxed">Setelah disimpan, data akan masuk ke daftar ketidakhadiran dan diteruskan ke kelas &amp; Sekre.</p>
                    </div>
                </div>
                <div class="flex gap-2 pt-1">
                    <button type="button" onclick="closeStudentAbsenceModal()" class="flex-1 rounded-xl border border-gray-200 py-2.5 text-xs font-bold text-gray-500 hover:bg-gray-50 transition">Batal</button>
                    <button type="button" onclick="saveStudentAbsence()" class="flex-1 rounded-xl bg-dark-green py-2.5 text-xs font-bold text-white hover:bg-medium-green transition">Simpan &amp; Kirim</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- MODAL: PENGAJUAN DISPENSASI (baru, dengan pemicu WA) -->
    <!-- ================================================================= -->
    <div id="dispensasiModal" class="fixed inset-0 z-[70] hidden items-end md:items-center justify-center bg-dark-green/60 backdrop-blur-sm p-0 md:p-4">
        <div class="bg-white rounded-t-3xl md:rounded-2xl w-full md:max-w-md max-h-[90vh] overflow-y-auto shadow-2xl" onclick="event.stopPropagation()">
            <div class="flex items-center justify-between gap-3 px-5 py-4 border-b border-gray-100">
                <div>
                    <h2 class="text-sm md:text-base font-extrabold text-dark-green">Ajukan Dispensasi</h2>
                    <p class="text-[10px] text-gray-400 mt-0.5">Akan dikirim otomatis ke WA Waka Kesiswaan.</p>
                </div>
                <button type="button" onclick="closeDispensasiModal()" class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center hover:bg-gray-200">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="p-5 space-y-4">
                <div>
                    <label class="text-[10px] font-bold text-gray-500">Nama Siswa</label>
                    <input id="dispenName" type="text" placeholder="Contoh: Bagas Setiawan"
                        class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-purple-400 focus:bg-white transition">
                </div>
                <div>
                    <label class="text-[10px] font-bold text-gray-500">Kelas</label>
                    <input id="dispenClass" type="text" placeholder="Contoh: XI PPLG 1"
                        class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-purple-400 focus:bg-white transition">
                </div>

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

                <div>
                    <label class="text-[10px] font-bold text-gray-500">Jenis Dispensasi</label>
                    <div class="grid grid-cols-3 gap-2 mt-1.5">
                        <button type="button" onclick="selectDispenType(this, 'Sakit Berkelanjutan')" class="dispen-type rounded-xl border border-gray-200 px-2 py-3 text-[10px] font-bold text-gray-600 transition">
                            <i class="fa-solid fa-kit-medical mb-1 block"></i>Sakit
                        </button>
                        <button type="button" onclick="selectDispenType(this, 'Acara Keluarga')" class="dispen-type rounded-xl border border-gray-200 px-2 py-3 text-[10px] font-bold text-gray-600 transition">
                            <i class="fa-solid fa-people-roof mb-1 block"></i>Keluarga
                        </button>
                        <button type="button" onclick="selectDispenType(this, 'Kegiatan Sekolah/Lomba')" class="dispen-type rounded-xl border border-gray-200 px-2 py-3 text-[10px] font-bold text-gray-600 transition">
                            <i class="fa-solid fa-medal mb-1 block"></i>Kegiatan
                        </button>
                    </div>
                </div>

                <div>
                    <label class="text-[10px] font-bold text-gray-500">Alasan / Keterangan</label>
                    <textarea id="dispenNote" rows="3" placeholder="Contoh: Mengikuti acara pernikahan keluarga di luar kota."
                        class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-purple-400 focus:bg-white transition resize-none"></textarea>
                </div>

                <div class="rounded-xl bg-emerald-50 border border-emerald-100 p-3">
                    <div class="flex gap-2">
                        <i class="fa-brands fa-whatsapp text-emerald-600 text-sm mt-0.5"></i>
                        <p class="text-[10px] text-emerald-700 leading-relaxed">
                            Klik "Ajukan &amp; Kirim WA" akan membuka WhatsApp dengan pesan permohonan yang sudah terisi otomatis, ditujukan ke Waka Kesiswaan.
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
    <div id="detail1" class="fixed inset-0 bg-dark-green/60 z-[60] hidden items-center justify-center p-4 backdrop-blur-sm">
        <div class="bg-white rounded-2xl w-full max-w-lg max-h-[85vh] overflow-y-auto shadow-2xl">
            <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
                <div>
                    <h2 class="text-sm md:text-base font-extrabold text-dark-green">Detail Jurnal</h2>
                    <p class="text-[10px] text-gray-400 mt-0.5">Guru tidak hadir</p>
                </div>
                <button type="button" onclick="closeDetail('detail1')" class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-500 flex items-center justify-center transition">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="p-5 space-y-4">
                <div class="p-4 rounded-xl bg-amber-50 border border-amber-100">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center">
                            <i class="fa-solid fa-user-clock"></i>
                        </div>
                        <div>
                            <p class="text-xs font-extrabold text-dark-green">Erna Rinawati, S.Pd</p>
                            <p class="text-[10px] text-medium-green mt-0.5">Bahasa Indonesia</p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Kelas</p>
                        <p class="text-xs font-extrabold text-dark-green mt-1">X DKV 1</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Ruang</p>
                        <p class="text-xs font-extrabold text-dark-green mt-1">R 15</p>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-xl p-3">
                    <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Status</p>
                    <p class="text-xs font-extrabold text-amber-600 mt-1">Guru Tidak Hadir</p>
                </div>
            </div>
            <div class="px-5 pb-5 flex gap-2">
                <button type="button" onclick="closeDetail('detail1')" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-600 text-xs font-bold py-2.5 rounded-xl transition">Tutup</button>
                <button type="button" onclick="sendToSekre('Erna Rinawati, S.Pd')" class="flex-1 bg-dark-green hover:bg-medium-green text-white text-xs font-bold py-2.5 rounded-xl transition">Kirim ke Sekre</button>
            </div>
        </div>
    </div>

    <div id="detail2" class="fixed inset-0 bg-dark-green/60 z-[60] hidden items-center justify-center p-4 backdrop-blur-sm">
        <div class="bg-white rounded-2xl w-full max-w-lg max-h-[85vh] overflow-y-auto shadow-2xl">
            <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
                <div>
                    <h2 class="text-sm md:text-base font-extrabold text-dark-green">Detail Jurnal</h2>
                    <p class="text-[10px] text-gray-400 mt-0.5">Guru tidak hadir</p>
                </div>
                <button type="button" onclick="closeDetail('detail2')" class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-500 flex items-center justify-center">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="p-5 space-y-4">
                <div class="p-4 rounded-xl bg-amber-50 border border-amber-100">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center">
                            <i class="fa-solid fa-user-clock"></i>
                        </div>
                        <div>
                            <p class="text-xs font-extrabold text-dark-green">Sri Rahayu, S.Pd</p>
                            <p class="text-[10px] text-medium-green">Bahasa Indonesia</p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Kelas</p>
                        <p class="text-xs font-extrabold text-dark-green mt-1">X TKJ 2</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Ruang</p>
                        <p class="text-xs font-extrabold text-dark-green mt-1">R 33</p>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-xl p-3">
                    <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Status</p>
                    <p class="text-xs font-extrabold text-amber-600 mt-1">Guru Tidak Hadir</p>
                </div>
            </div>
            <div class="px-5 pb-5 flex gap-2">
                <button type="button" onclick="closeDetail('detail2')" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-600 text-xs font-bold py-2.5 rounded-xl">Tutup</button>
                <button type="button" onclick="sendToSekre('Sri Rahayu, S.Pd')" class="flex-1 bg-dark-green hover:bg-medium-green text-white text-xs font-bold py-2.5 rounded-xl">Kirim ke Sekre</button>
            </div>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ================================================================= -->
    <script>
        // GANTI nomor ini dengan nomor WA Waka Kesiswaan / Admin yang sesungguhnya (format 62xxxxxxxxxx tanpa "+")
        const WAKA_WA_NUMBER = '6281234567890';

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

        /* ===== MOBILE SIDEBAR (sama seperti dashboard Admin) ===== */
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

        /* ===== MODAL KETIDAKHADIRAN SISWA ===== */
        let selectedStudentAbsenceStatus = '';

        function openStudentAbsenceModal() {
            const modal = document.getElementById('studentAbsenceModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');

            document.getElementById('studentName').value = '';
            document.getElementById('studentClass').value = '';
            document.getElementById('studentAbsenceNote').value = '';
            selectedStudentAbsenceStatus = '';

            document.querySelectorAll('.student-absence-status').forEach(btn => {
                btn.classList.remove('bg-dark-green', 'text-white', 'border-dark-green');
                btn.classList.add('text-gray-600', 'border-gray-200');
            });

            setTimeout(() => document.getElementById('studentName').focus(), 100);
        }
        function closeStudentAbsenceModal() {
            const modal = document.getElementById('studentAbsenceModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }
        function selectStudentAbsenceStatus(button, status) {
            selectedStudentAbsenceStatus = status;
            document.querySelectorAll('.student-absence-status').forEach(btn => {
                btn.classList.remove('bg-dark-green', 'text-white', 'border-dark-green');
                btn.classList.add('text-gray-600', 'border-gray-200');
            });
            button.classList.remove('text-gray-600', 'border-gray-200');
            button.classList.add('bg-dark-green', 'text-white', 'border-dark-green');
        }

        function saveStudentAbsence() {
            const name = document.getElementById('studentName').value.trim();
            const studentClass = document.getElementById('studentClass').value.trim();
            const note = document.getElementById('studentAbsenceNote').value.trim();

            if (!name || !studentClass || !selectedStudentAbsenceStatus) {
                alert('Lengkapi nama siswa, kelas, dan alasan ketidakhadiran.');
                return;
            }

            const list = document.getElementById('studentAbsenceList');
            let bgClass, borderClass, iconBg, iconText, badgeBg, badgeText;

            if (selectedStudentAbsenceStatus === 'Sakit') {
                bgClass = 'bg-amber-50'; borderClass = 'border-amber-100'; iconBg = 'bg-amber-100'; iconText = 'text-amber-600'; badgeBg = 'bg-amber-100'; badgeText = 'text-amber-700';
            } else if (selectedStudentAbsenceStatus === 'Izin') {
                bgClass = 'bg-blue-50'; borderClass = 'border-blue-100'; iconBg = 'bg-blue-100'; iconText = 'text-blue-600'; badgeBg = 'bg-blue-100'; badgeText = 'text-blue-700';
            } else {
                bgClass = 'bg-purple-50'; borderClass = 'border-purple-100'; iconBg = 'bg-purple-100'; iconText = 'text-purple-600'; badgeBg = 'bg-purple-100'; badgeText = 'text-purple-700';
            }

            const item = document.createElement('div');
            item.className = `student-absence-item flex items-center justify-between gap-3 rounded-xl ${bgClass} border ${borderClass} p-3`;
            item.dataset.status = 'Belum Dikirim';
            item.innerHTML = `
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-8 h-8 rounded-lg ${iconBg} ${iconText} flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-user-clock text-xs"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-[11px] font-extrabold text-dark-green truncate">${escapeHtml(name)}</p>
                        <p class="text-[10px] text-gray-500">${escapeHtml(studentClass)} &middot; ${escapeHtml(selectedStudentAbsenceStatus)}</p>
                    </div>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <span class="absence-status-badge ${badgeBg} ${badgeText} text-[9px] font-bold px-2 py-1 rounded-lg">Belum Dikirim</span>
                    <button type="button" onclick="sendStudentAbsence(this)" class="w-7 h-7 rounded-lg bg-dark-green text-white flex items-center justify-center hover:bg-medium-green transition">
                        <i class="fa-solid fa-paper-plane text-[9px]"></i>
                    </button>
                </div>`;

            list.insertBefore(item, list.firstChild);
            closeStudentAbsenceModal();
            updateAbsenceCount();

            console.log({ student_name: name, class_name: studentClass, status: selectedStudentAbsenceStatus, note: note });
        }

        function sendStudentAbsence(button) {
            const item = button.closest('.student-absence-item');
            if (!item) return;

            const badge = item.querySelector('.absence-status-badge');
            item.dataset.status = 'Terkirim ke Sekre';
            badge.className = 'absence-status-badge bg-emerald-100 text-emerald-700 text-[9px] font-bold px-2 py-1 rounded-lg';
            badge.textContent = 'Terkirim ke Sekre';
            button.remove();

            item.classList.remove('bg-amber-50', 'border-amber-100', 'bg-blue-50', 'border-blue-100', 'bg-purple-50', 'border-purple-100');
            item.classList.add('bg-emerald-50', 'border-emerald-100');

            const icon = item.querySelector('.fa-user-clock');
            if (icon) {
                icon.parentElement.className = 'w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0';
            }

            updateAbsenceCount();
            alert('Data ketidakhadiran berhasil diteruskan ke kelas & Sekre.');
        }

        function updateAbsenceCount() {
            const pending = document.querySelectorAll('.student-absence-item[data-status="Belum Dikirim"]').length;
            const count = document.getElementById('absenceCount');
            const badge = document.getElementById('absencePendingBadge');
            if (count) count.textContent = pending;
            if (badge) {
                badge.textContent = `${pending} Belum Dikirim`;
                badge.classList.toggle('bg-emerald-50', pending === 0);
                badge.classList.toggle('text-emerald-700', pending === 0);
                badge.classList.toggle('bg-amber-50', pending !== 0);
                badge.classList.toggle('text-amber-700', pending !== 0);
            }
        }

        /* ===== MODAL PENGAJUAN DISPENSASI + WA ===== */
        let selectedDispenType = '';

        function openDispensasiModal() {
            const modal = document.getElementById('dispensasiModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');

            document.getElementById('dispenName').value = '';
            document.getElementById('dispenClass').value = '';
            document.getElementById('dispenStart').value = '';
            document.getElementById('dispenEnd').value = '';
            document.getElementById('dispenNote').value = '';
            selectedDispenType = '';

            document.querySelectorAll('.dispen-type').forEach(btn => {
                btn.classList.remove('bg-purple-600', 'text-white', 'border-purple-600');
                btn.classList.add('text-gray-600', 'border-gray-200');
            });

            setTimeout(() => document.getElementById('dispenName').focus(), 100);
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

        function formatTanggalIndo(value) {
            if (!value) return '-';
            const d = new Date(value + 'T00:00:00');
            return d.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
        }

        function saveDispensasi() {
            const name = document.getElementById('dispenName').value.trim();
            const studentClass = document.getElementById('dispenClass').value.trim();
            const start = document.getElementById('dispenStart').value;
            const end = document.getElementById('dispenEnd').value;
            const note = document.getElementById('dispenNote').value.trim();

            if (!name || !studentClass || !start || !selectedDispenType) {
                alert('Lengkapi nama siswa, kelas, tanggal mulai, dan jenis dispensasi.');
                return;
            }

            const list = document.getElementById('dispensasiList');
            const item = document.createElement('div');
            item.className = 'dispensasi-item flex items-center justify-between gap-3 rounded-xl bg-purple-50 border border-purple-100 p-3';
            item.dataset.status = 'Menunggu Persetujuan';

            const rangeLabel = end && end !== start
                ? `${formatTanggalIndo(start)} &ndash; ${formatTanggalIndo(end)}`
                : formatTanggalIndo(start);

            item.innerHTML = `
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-calendar-days text-xs"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-[11px] font-extrabold text-dark-green truncate">${escapeHtml(name)} &middot; ${escapeHtml(studentClass)}</p>
                        <p class="text-[10px] text-gray-500">${escapeHtml(selectedDispenType)} &middot; ${rangeLabel}</p>
                    </div>
                </div>
                <span class="dispensasi-status-badge bg-purple-100 text-purple-700 text-[9px] font-bold px-2 py-1 rounded-lg shrink-0">Menunggu</span>`;

            list.insertBefore(item, list.firstChild);

            updateDispenCount();

            // ===== Susun pesan & buka WhatsApp otomatis ke Waka/Admin =====
            const pesan =
`*PERMOHONAN DISPENSASI SISWA*

Nama: ${name}
Kelas: ${studentClass}
Jenis: ${selectedDispenType}
Tanggal: ${rangeLabel}
Alasan: ${note || '-'}

Diajukan oleh Guru Piket melalui Jurnal Absensi.
Mohon persetujuan Bapak/Ibu Waka Kesiswaan.`;

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

        document.getElementById('studentAbsenceModal')?.addEventListener('click', function (e) {
            if (e.target === this) closeStudentAbsenceModal();
        });
        document.getElementById('dispensasiModal')?.addEventListener('click', function (e) {
            if (e.target === this) closeDispensasiModal();
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeStudentAbsenceModal();
                closeDispensasiModal();
                document.querySelectorAll('[id^="detail"]').forEach(modal => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                });
                document.body.classList.remove('overflow-hidden');
            }
        });
    </script>
</body>
</html>