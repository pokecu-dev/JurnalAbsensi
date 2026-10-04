<!DOCTYPE html>
<html lang="id" class="overscroll-none">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sekretaris</title>

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

        <div>
            <!-- LOGO -->
            <div class="flex flex-col items-center gap-2 mb-10 text-center">
                <img src="{{ asset('image/logo.png') }}" alt="Logo Jurnal Absensi" class="w-16 h-auto">
                <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
            </div>

            <!-- NAVIGATION -->
            <nav class="flex flex-col gap-3 font-semibold text-xs">
                <a href="{{ url('/sekre/dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-white/10 text-mint-green rounded-xl transition active:scale-[0.98]">
                    <i class="fa-solid fa-house w-4 text-center"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ url('/sekre/jurnal') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                    <i class="fa-solid fa-book-open w-4 text-center"></i>
                    <span>Jurnal</span>
                </a>

                <a href="{{ url('/sekre/jadwal') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                    <i class="fa-regular fa-calendar-days w-4 text-center"></i>
                    <span>Jadwal Mata Pelajaran</span>
                </a>
            </nav>
        </div>

        <!-- FOOTER SIDEBAR -->
        <div class="flex flex-col gap-1 pt-3 border-t border-white/10 text-xs">
             <a href="{{ url('/sekre/akun') }}"
                class="flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                <i class="fa-solid fa-user-circle w-4"></i>
                <span>Akun Sekre</span>
            </a>

            <!-- LOGOUT -->
            <a href="{{ route('logout') }}"
                class="flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                <i class="fa-solid fa-arrow-right-from-bracket w-4"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- ============================================================= -->
    <!-- MAIN CONTENT -->
    <!-- ============================================================= -->
    <main class="min-w-0 p-4 pb-12 md:p-8 md:ml-60 max-w-full md:max-w-[calc(100%-15rem)] space-y-4 md:space-y-6">

        <!-- HEADER -->
        <header class="flex items-center justify-between gap-3">
            <div class="min-w-0">
                <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-dark-green truncate">
                    Selamat Datang, {{ Auth::user()->name ?? 'Sekretaris' }}
                </h2>
                <p class="text-[11px] sm:text-xs text-gray-400 font-semibold mt-1">
                    Semangat menjalankan tugas jurnal hari ini!
                </p>
            </div>

            <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                <div class="text-right leading-tight">
                    <div id="live-date" class="text-[9px] sm:text-[10px] md:text-xs font-semibold text-medium-green whitespace-nowrap">memuat tanggal....</div>
                    <div id="live-clock" class="text-[10px] sm:text-xs font-extrabold text-dark-green mt-0.5">00.00 WIB</div>
                </div>
            </div>
        </header>

        <!-- JADWAL JAM INI: jurnal jam pelajaran berjalan di kelasmu, klik untuk lihat & approve -->
        <a href="{{ url('/sekre/jurnal/3') }}"
            class="group block bg-dark-green text-white rounded-2xl p-4 sm:p-5 md:px-7 md:py-5 hover:bg-[#20392F] transition">
            <div class="flex items-center justify-between gap-2 mb-3">
                <span class="inline-flex items-center gap-1.5 text-[10px] sm:text-[11px] text-mint-green/80 uppercase tracking-wider font-bold">
                    <i class="fa-regular fa-clock"></i> Jam ke-3 &middot; Sedang Berlangsung
                </span>
                <span class="bg-amber-400/15 text-amber-300 text-[9px] sm:text-[10px] font-bold px-2.5 py-1 rounded-full whitespace-nowrap">Menunggu Validasi</span>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-5">
                <div class="sm:flex-1 sm:pr-5 sm:border-r sm:border-[#2E524A]">
                    <h3 class="text-base sm:text-[17px] font-bold">Matematika</h3>
                    <p class="text-[11px] sm:text-xs text-[#8FBFB0] mt-0.5">Kelas XI DKV 2</p>
                </div>

                <div class="sm:flex-1 sm:pr-5 sm:border-r sm:border-[#2E524A]">
                    <div class="flex items-center gap-2 text-sm sm:text-[15px] font-semibold">
                        <i class="fa-regular fa-clock text-mint-green text-sm sm:text-base"></i>
                        <span>13.00 - 13.40</span>
                    </div>
                    <p class="text-[11px] sm:text-xs text-[#8FBFB0] mt-1">RUANG 18</p>
                </div>

                <div class="sm:flex-1">
                    <p class="text-[10px] sm:text-[11px] text-[#8FBFB0] uppercase tracking-wide">Diisi oleh</p>
                    <p class="text-sm sm:text-[15px] font-semibold">Arvia Rienetasary, S.Pd.</p>
                </div>

                <span class="flex items-center justify-center gap-2 bg-[#2E524A] border border-[#3D6B61] text-mint-green text-xs sm:text-[13px] font-semibold px-4 sm:px-[22px] py-2.5 rounded-full group-hover:bg-[#3D6B61] group-hover:text-white transition whitespace-nowrap shrink-0">
                    Lihat & Approve <i class="fa-solid fa-arrow-right"></i>
                </span>
            </div>
        </a>

        <!-- ============================================================= -->
        <!-- INFO PIKET HARI INI: siswa tidak masuk (surat) + siswa terlambat -->
        <!-- ============================================================= -->
        <div id="infoPiket" class="bg-white border-[1.5px] border-[#E5DCCE] rounded-2xl p-4 md:p-[22px_24px]">
            <div class="flex items-center justify-between gap-3 mb-1">
                <h3 class="text-sm md:text-[17px] font-bold text-dark-green">Info Piket Hari Ini</h3>
                <span class="text-[10px] md:text-xs font-bold text-medium-green bg-emerald-50 px-2.5 py-1 rounded-full shrink-0">5 siswa</span>
            </div>
            <p class="text-[10px] md:text-xs text-gray-400 mb-3">Dari guru piket: surat siswa tidak masuk & catatan keterlambatan.</p>

            <!-- FILTER -->
            <div class="flex flex-wrap items-center gap-2 mb-4">
                <button type="button" data-filter="all"
                    class="piket-tab bg-dark-green text-white text-[10px] md:text-xs font-bold px-3.5 py-1.5 rounded-full transition">
                    Semua <span class="opacity-70">5</span>
                </button>
                <button type="button" data-filter="absen"
                    class="piket-tab bg-blue-50 text-blue-600 text-[10px] md:text-xs font-bold px-3.5 py-1.5 rounded-full transition">
                    <i class="fa-solid fa-envelope-open-text mr-1"></i>Tidak Masuk <span class="opacity-70">3</span>
                </button>
                <button type="button" data-filter="telat"
                    class="piket-tab bg-violet-50 text-violet-600 text-[10px] md:text-xs font-bold px-3.5 py-1.5 rounded-full transition">
                    <i class="fa-regular fa-clock mr-1"></i>Terlambat <span class="opacity-70">2</span>
                </button>
            </div>

            <div class="flex flex-col gap-3">

                <!-- ===== TIDAK MASUK (BIRU) ===== -->
                <div data-type="absen" class="piket-item flex items-center justify-between gap-3 p-3 rounded-xl bg-blue-50/60 border border-blue-100">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-9 h-9 rounded-xl bg-blue-100 text-blue-500 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-envelope-open-text text-sm"></i>
                        </div>
                        <div class="min-w-0">
                            <div class="flex items-center gap-2 flex-wrap">
                                <p class="text-xs md:text-sm font-semibold text-dark-green">Ahmad Rizki</p>
                                <span class="text-[9px] font-bold text-blue-600 bg-blue-100 px-2 py-0.5 rounded-full">SAKIT</span>
                            </div>
                            <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5">XI TKJ 2 &middot; Surat diterima piket</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <button type="button" onclick="bukaSurat('Ahmad Rizki', 'SAKIT')"
                            class="bg-white border border-blue-200 text-blue-600 hover:bg-blue-50 text-[10px] md:text-xs font-bold px-3 py-2 rounded-full transition whitespace-nowrap">
                            <i class="fa-regular fa-image mr-1"></i>Surat
                        </button>
                    </div>
                </div>

                <div data-type="absen" class="piket-item flex items-center justify-between gap-3 p-3 rounded-xl bg-blue-50/60 border border-blue-100">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-9 h-9 rounded-xl bg-blue-100 text-blue-500 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-envelope-open-text text-sm"></i>
                        </div>
                        <div class="min-w-0">
                            <div class="flex items-center gap-2 flex-wrap">
                                <p class="text-xs md:text-sm font-semibold text-dark-green">Siti Nurhaliza</p>
                                <span class="text-[9px] font-bold text-blue-600 bg-blue-100 px-2 py-0.5 rounded-full">IZIN</span>
                            </div>
                            <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5">XI DKV 2 &middot; Surat diterima piket</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <button type="button" onclick="bukaSurat('Siti Nurhaliza', 'IZIN')"
                            class="bg-white border border-blue-200 text-blue-600 hover:bg-blue-50 text-[10px] md:text-xs font-bold px-3 py-2 rounded-full transition whitespace-nowrap">
                            <i class="fa-regular fa-image mr-1"></i>Surat
                        </button>
                    </div>
                </div>

                <!-- sudah dicatat sekre -->
                <div data-type="absen" class="piket-item flex items-center justify-between gap-3 p-3 rounded-xl bg-blue-50/30 border border-blue-100">
                    <div class="flex items-center gap-3 min-w-0 opacity-70">
                        <div class="w-9 h-9 rounded-xl bg-blue-100 text-blue-500 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-envelope-open-text text-sm"></i>
                        </div>
                        <div class="min-w-0">
                            <div class="flex items-center gap-2 flex-wrap">
                                <p class="text-xs md:text-sm font-semibold text-dark-green">Budi Santoso</p>
                                <span class="text-[9px] font-bold text-blue-600 bg-blue-100 px-2 py-0.5 rounded-full">SAKIT</span>
                            </div>
                            <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5">XI DKV 2 &middot; Surat diterima piket</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <button type="button" onclick="bukaSurat('Budi Santoso', 'SAKIT')"
                            class="bg-white border border-blue-200 text-blue-600 hover:bg-blue-50 text-[10px] md:text-xs font-bold px-3 py-2 rounded-full transition whitespace-nowrap">
                            <i class="fa-regular fa-image mr-1"></i>Surat
                        </button>
                       
                    </div>
                </div>

                <!-- ===== TERLAMBAT (UNGU) ===== -->
                <div data-type="telat" class="piket-item flex items-center justify-between gap-3 p-3 rounded-xl bg-violet-50/60 border border-violet-100">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-9 h-9 rounded-xl bg-violet-100 text-violet-500 flex items-center justify-center shrink-0">
                            <i class="fa-regular fa-clock text-sm"></i>
                        </div>
                        <div class="min-w-0">
                            <div class="flex items-center gap-2 flex-wrap">
                                <p class="text-xs md:text-sm font-semibold text-dark-green">Dimas Prasetyo</p>
                                <span class="text-[9px] font-bold text-violet-600 bg-violet-100 px-2 py-0.5 rounded-full">JAM KE-1</span>
                            </div>
                            <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5 truncate">XI PPLG 1 &middot; Ban motor bocor</p>
                            <p class="text-[10px] text-gray-400 mt-0.5">
                                <i class="fa-solid fa-signature mr-1"></i>TTD: Piket <i class="fa-solid fa-check text-emerald-500"></i>
                                &middot; Waka <i class="fa-solid fa-check text-emerald-500"></i>
                            </p>
                        </div>
                    </div>
                    <a href="#" class="bg-violet-500 hover:bg-violet-600 text-white text-[10px] md:text-xs font-bold px-3.5 py-2 rounded-full transition whitespace-nowrap shrink-0">Detail</a>
                </div>

                <div data-type="telat" class="piket-item flex items-center justify-between gap-3 p-3 rounded-xl bg-violet-50/60 border border-violet-100">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-9 h-9 rounded-xl bg-violet-100 text-violet-500 flex items-center justify-center shrink-0">
                            <i class="fa-regular fa-clock text-sm"></i>
                        </div>
                        <div class="min-w-0">
                            <div class="flex items-center gap-2 flex-wrap">
                                <p class="text-xs md:text-sm font-semibold text-dark-green">Rina Marlina</p>
                                <span class="text-[9px] font-bold text-violet-600 bg-violet-100 px-2 py-0.5 rounded-full">JAM KE-2</span>
                            </div>
                            <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5 truncate">XI TKI 2 &middot; Kesiangan</p>
                            <p class="text-[10px] text-gray-400 mt-0.5">
                                <i class="fa-solid fa-signature mr-1"></i>TTD: Piket <i class="fa-solid fa-check text-emerald-500"></i>
                                &middot; Waka <i class="fa-solid fa-hourglass-half text-amber-500"></i>
                            </p>
                        </div>
                    </div>
                    <a href="#" class="bg-violet-500 hover:bg-violet-600 text-white text-[10px] md:text-xs font-bold px-3.5 py-2 rounded-full transition whitespace-nowrap shrink-0">Detail</a>
                </div>
            </div>

            <p id="piketEmpty" class="hidden text-center text-xs text-gray-400 py-6">Belum ada data.</p>
        </div>

        <!-- ANTREAN VALIDASI: satu daftar, urut prioritas, satu tombol aksi per baris -->
        <div id="antreanValidasi" class="bg-white border-[1.5px] border-[#E5DCCE] rounded-2xl p-4 md:p-[22px_24px] scroll-mt-20">
            <div class="flex items-center justify-between gap-3 mb-1">
                <h3 class="text-sm md:text-[17px] font-bold text-dark-green">Antrean Validasi</h3>
                <span class="text-[10px] md:text-xs font-bold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-full shrink-0">4 menunggu</span>
            </div>
            <p class="text-[10px] md:text-xs text-gray-400 mb-4 md:mb-5">Diurutkan dari yang paling perlu perhatian.</p>

            <div class="flex flex-col gap-3">
                <!-- PERLU DIPERBAIKI: paling prioritas -->
                <div class="flex items-center justify-between gap-3 p-3 rounded-xl bg-red-50/60 border border-red-100">
                    <div class="flex items-center gap-3 min-w-0">
                        <span class="w-2.5 h-2.5 rounded-full bg-red-500 shrink-0"></span>
                        <div class="min-w-0">
                            <p class="text-xs md:text-sm font-semibold text-dark-green">MATEMATIKA &middot; XI TKI 2</p>
                            <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5">Jam ke 5 &middot; Materi belum lengkap</p>
                        </div>
                    </div>
                    <a href="#" class="bg-red-500 hover:bg-red-600 text-white text-[10px] md:text-xs font-bold px-3.5 py-2 rounded-full transition whitespace-nowrap shrink-0">Tinjau Ulang</a>
                </div>

                <!-- MENUNGGU VALIDASI x3 -->
                <div class="flex items-center justify-between gap-3 p-3 rounded-xl bg-amber-50/60 border border-amber-100">
                    <div class="flex items-center gap-3 min-w-0">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-500 shrink-0"></span>
                        <div class="min-w-0">
                            <p class="text-xs md:text-sm font-semibold text-dark-green">MATEMATIKA &middot; XI TKJ 2</p>
                            <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5">Jam ke 4 &middot; 09:00</p>
                        </div>
                    </div>
                    <a href="#" class="bg-dark-green hover:bg-medium-green text-white text-[10px] md:text-xs font-bold px-3.5 py-2 rounded-full transition whitespace-nowrap shrink-0">Validasi</a>
                </div>

                <div class="flex items-center justify-between gap-3 p-3 rounded-xl bg-amber-50/60 border border-amber-100">
                    <div class="flex items-center gap-3 min-w-0">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-500 shrink-0"></span>
                        <div class="min-w-0">
                            <p class="text-xs md:text-sm font-semibold text-dark-green">BAHASA INDONESIA &middot; XI PPLG 1</p>
                            <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5">Jam ke 8 &middot; 09:30</p>
                        </div>
                    </div>
                    <a href="#" class="bg-dark-green hover:bg-medium-green text-white text-[10px] md:text-xs font-bold px-3.5 py-2 rounded-full transition whitespace-nowrap shrink-0">Validasi</a>
                </div>

                <div class="flex items-center justify-between gap-3 p-3 rounded-xl bg-amber-50/60 border border-amber-100">
                    <div class="flex items-center gap-3 min-w-0">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-500 shrink-0"></span>
                        <div class="min-w-0">
                            <p class="text-xs md:text-sm font-semibold text-dark-green">IPA &middot; XI TKJ 1</p>
                            <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5">Jam ke 3 &middot; 10:10</p>
                        </div>
                    </div>
                    <a href="#" class="bg-dark-green hover:bg-medium-green text-white text-[10px] md:text-xs font-bold px-3.5 py-2 rounded-full transition whitespace-nowrap shrink-0">Validasi</a>
                </div>
            </div>

            <a href="{{ url('/sekre/jurnal') }}" class="block w-full mt-4 md:mt-5 py-2.5 md:py-3 bg-[#CBEAD9] hover:bg-[#b4e2ca] text-dark-green text-xs md:text-[13px] font-semibold text-center rounded-full transition">
                Lihat Semua Jurnal
            </a>
        </div>
    </main>

    <!-- ============================================================= -->
    <!-- MODAL SURAT -->
    <!-- ============================================================= -->
    <div id="modalSurat" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60" onclick="tutupSurat()"></div>
        <div class="relative bg-white rounded-2xl w-full max-w-md p-5 shadow-xl max-h-full overflow-y-auto">
            <div class="flex items-center justify-between mb-3">
                <div>
                    <h4 id="suratNama" class="text-sm font-bold text-dark-green">Nama</h4>
                    <span id="suratJenis" class="text-[9px] font-bold text-blue-600 bg-blue-100 px-2 py-0.5 rounded-full">SAKIT</span>
                </div>
                <button type="button" onclick="tutupSurat()" aria-label="Tutup" class="w-8 h-8 rounded-lg hover:bg-gray-100 text-gray-500">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Ganti src dengan foto surat dari database nanti -->
            <div class="bg-gray-100 rounded-xl overflow-hidden aspect-[3/4] flex items-center justify-center">
                <img id="suratFoto" src="" alt="Foto surat" class="w-full h-full object-contain hidden">
                <div id="suratKosong" class="text-center text-gray-400 text-xs">
                    <i class="fa-regular fa-image text-3xl mb-2"></i>
                    <p>Foto surat belum diupload</p>
                </div>
            </div>
        </div>
    </div>

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

    <!-- ============================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ============================================================= -->
    <script>
        /* ===== LIVE CLOCK ===== */
        function updateLiveTime() {
            const now = new Date();
            const opsi = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
            const dateEl = document.getElementById('live-date');
            const clockEl = document.getElementById('live-clock');
            if (dateEl) dateEl.textContent = now.toLocaleDateString('id-ID', opsi);
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

        /* ===== FILTER INFO PIKET ===== */
        (function () {
            const tabs = document.querySelectorAll('.piket-tab');
            const items = document.querySelectorAll('.piket-item');
            const empty = document.getElementById('piketEmpty');
            if (!tabs.length) return;

            const activeCls = {
                all:   ['bg-dark-green', 'text-white'],
                absen: ['bg-blue-500', 'text-white'],
                telat: ['bg-violet-500', 'text-white'],
            };
            const idleCls = {
                all:   ['bg-gray-100', 'text-gray-600'],
                absen: ['bg-blue-50', 'text-blue-600'],
                telat: ['bg-violet-50', 'text-violet-600'],
            };

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const f = tab.dataset.filter;

                    tabs.forEach(t => {
                        const k = t.dataset.filter;
                        t.classList.remove(...activeCls[k], ...idleCls[k]);
                        t.classList.add(...(k === f ? activeCls[k] : idleCls[k]));
                    });

                    let visible = 0;
                    items.forEach(el => {
                        const show = f === 'all' || el.dataset.type === f;
                        el.classList.toggle('hidden', !show);
                        if (show) visible++;
                    });
                    empty.classList.toggle('hidden', visible > 0);
                });
            });
        })();

        /* ===== MODAL SURAT ===== */
        function bukaSurat(nama, jenis, fotoUrl) {
            document.getElementById('suratNama').textContent = nama;
            document.getElementById('suratJenis').textContent = jenis;
            const foto = document.getElementById('suratFoto');
            const kosong = document.getElementById('suratKosong');
            if (fotoUrl) {
                foto.src = fotoUrl;
                foto.classList.remove('hidden');
                kosong.classList.add('hidden');
            } else {
                foto.removeAttribute('src');
                foto.classList.add('hidden');
                kosong.classList.remove('hidden');
            }
            const m = document.getElementById('modalSurat');
            m.classList.remove('hidden');
            m.classList.add('flex');
        }
        function tutupSurat() {
            const m = document.getElementById('modalSurat');
            m.classList.add('hidden');
            m.classList.remove('flex');
        }
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') tutupSurat();
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
    </script>

</body>
</html>