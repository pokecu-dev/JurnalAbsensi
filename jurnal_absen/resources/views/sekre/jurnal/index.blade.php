<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal Mengajar</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
        html {
            scroll-behavior: smooth;
        }

        body {
            overflow-x: hidden;
        }

        #scrollIndicator {
            transition: top 0.15s ease-out;
        }

        /* =========================
           JOURNAL CARD
        ========================= */

        .journal-card {
            background: #FFFFFF;
            border: 1.5px solid #E5DCCE;
            border-radius: 18px;
            overflow: hidden;
            transition: all 0.2s ease;
        }

        .journal-card:hover {
            border-color: #89D7B7;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(26, 49, 44, 0.07);
        }

        .journal-card-top {
            padding: 18px 20px 15px;
            border-bottom: 1px solid #F0E8DC;
        }

        .journal-time {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 11px;
            font-weight: 700;
            color: #428475;
            background: #E2F2EB;
            padding: 6px 10px;
            border-radius: 999px;
        }

        .journal-mapel {
            margin-top: 13px;
            font-size: 17px;
            line-height: 1.3;
            font-weight: 700;
            color: #1A312C;
        }

        .journal-card-bottom {
            padding: 15px 20px 18px;
        }

        .journal-info {
            display: flex;
            align-items: center;
            gap: 9px;
            min-width: 0;
        }

        .journal-info + .journal-info {
            margin-top: 10px;
        }

        .journal-info-icon {
            width: 30px;
            height: 30px;
            flex: 0 0 30px;
            border-radius: 9px;
            background: #F2F8F5;
            color: #428475;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        .journal-info-text {
            min-width: 0;
        }

        .journal-info-label {
            display: block;
            font-size: 10px;
            color: #9AAEA7;
            font-weight: 600;
            margin-bottom: 1px;
        }

        .journal-info-value {
            display: block;
            color: #283633;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .journal-material {
            margin-top: 15px;
            padding: 11px 12px;
            background: #FFF8EB;
            border-radius: 11px;
        }

        .journal-material-label {
            font-size: 10px;
            color: #9AAEA7;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .journal-material-text {
            margin-top: 3px;
            color: #4B5A56;
            font-size: 12px;
            line-height: 1.45;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .journal-card-action {
            margin-top: 15px;
        }

        .btn-detail {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 14px;
            border-radius: 11px;
            background: #1A312C;
            color: #89D7B7;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-detail:hover {
            background: #428475;
            color: #FFFFFF;
        }

        /* =========================
           SENT (SUDAH DIKIRIM KE KURIKULUM)
        ========================= */

        .journal-card.sent {
            border-color: #7FCBA6;
            background: #F7FCF9;
        }

        .journal-card.sent .journal-card-top {
            border-bottom-color: #D7EEE3;
        }

        .journal-sent-strip {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 15px;
            padding: 10px 12px;
            border-radius: 11px;
            background: #E4F5EC;
            border: 1px solid #C6E9D7;
            color: #15803D;
            font-size: 12px;
            font-weight: 700;
        }

        .journal-note {
            margin-top: 10px;
            padding: 10px 12px;
            background: #FFF8EB;
            border: 1px dashed #E8D9B8;
            border-radius: 11px;
        }

        .journal-note-label {
            font-size: 10px;
            color: #9AAEA7;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .journal-note-text {
            margin-top: 3px;
            color: #4B5A56;
            font-size: 12px;
            line-height: 1.45;
        }

        /* =========================
           STATUS
        ========================= */

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 9px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge.pending {
            background: #FFF4D6;
            color: #D97706;
        }

        .badge.approved {
            background: #D9F5E8;
            color: #15803D;
        }

        .badge.rejected {
            background: #FFE0E0;
            color: #DC2626;
        }

        /* =========================
           EMPTY STATE
        ========================= */

        .empty-state {
            background: #FFFFFF;
            border: 1.5px dashed #DCCFBE;
            border-radius: 18px;
            padding: 55px 20px;
            text-align: center;
            color: #7A8985;
        }

        .empty-state-icon {
            width: 58px;
            height: 58px;
            margin: 0 auto 14px;
            border-radius: 16px;
            background: #EAF5F0;
            color: #428475;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 767px) {
            .page-title {
                font-size: 21px;
            }

            .page-subtitle {
                font-size: 12px;
                line-height: 1.5;
            }

            .journal-card {
                border-radius: 15px;
            }

            .journal-card-top {
                padding: 16px;
            }

            .journal-card-bottom {
                padding: 14px 16px 16px;
            }

            .journal-mapel {
                font-size: 16px;
            }

            .journal-info-value {
                font-size: 12px;
            }
        }
    </style>
</head>

<body class="bg-bg-cream text-dark-green font-sans min-h-screen overflow-x-hidden overscroll-none">

    <!-- =========================
         MOBILE HEADER
    ========================== -->

    <div
        class="md:hidden bg-dark-green text-white p-4 flex items-center gap-3 sticky top-0 z-40 shadow-sm">

        <button
            id="hamburgerBtn"
            type="button"
            class="w-9 h-9 rounded-lg flex items-center justify-center
                   hover:bg-white/10 transition focus:outline-none shrink-0"
            aria-label="Buka menu">

            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="flex items-center gap-2">
            <img
                src="{{ asset('image/logo.png') }}"
                alt="Logo"
                class="w-8 h-8 object-contain">

            <span class="font-bold text-sm tracking-wide">
                Jurnal Absensi
            </span>
        </div>
    </div>


    <!-- =========================
         MOBILE OVERLAY
    ========================== -->

    <div
        id="sidebarOverlay"
        class="fixed inset-0 bg-black/50 z-40 hidden md:hidden">
    </div>


    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside
        id="sidebar"
        class="fixed inset-y-0 left-0 w-60 bg-dark-green text-white p-6
               flex flex-col justify-between z-50
               -translate-x-full md:translate-x-0
               transition-transform duration-300">

        <div>

            <!-- LOGO -->
            <div class="flex flex-col items-center gap-2 mb-10 text-center">

                <img
                    src="{{ asset('image/logo.png') }}"
                    alt="Logo Jurnal Absensi"
                    class="w-16 h-auto">

                <span class="font-bold text-sm tracking-wide">
                    Jurnal Absensi
                </span>

            </div>


            <!-- MENU -->
            <nav class="flex flex-col gap-3 font-semibold text-xs">

                <a
                    href="{{ url('/sekre/dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-300
                           hover:bg-white/10 hover:text-mint-green
                           rounded-xl transition active:scale-[0.98]">

                    <i class="fa-solid fa-house w-4 text-center"></i>
                    <span>Dashboard</span>

                </a>

                <a
                    href="{{ url('/sekre/jurnal') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-white/10
                           text-mint-green rounded-xl transition active:scale-[0.98]">

                    <i class="fa-solid fa-book-open w-4 text-center"></i>
                    <span>Jurnal</span>

                </a>

                <a
                    href="{{ url('/sekre/jadwal') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-300
                           hover:bg-white/10 hover:text-mint-green
                           rounded-xl transition active:scale-[0.98]">

                    <i class="fa-regular fa-calendar-days w-4 text-center"></i>
                    <span>Jadwal Mata Pelajaran</span>

                </a>

            </nav>

        </div>


        <!-- FOOTER SIDEBAR -->

        <div
            class="flex flex-col gap-1 pt-3 border-t border-white/10 text-xs">

            <a
                href="{{ route('profile') }}"
                class="flex items-center gap-2 px-2 py-2 rounded-lg
                       hover:bg-white/10 active:scale-[0.98]
                       transition-all duration-200">

                <i class="fa-regular fa-user w-4"></i>
                <span>Profile</span>

            </a>


            <a
                href="{{ route('logout') }}"
                class="flex items-center gap-2 px-2 py-2 rounded-lg
                       hover:bg-white/10 active:scale-[0.98]
                       transition-all duration-200">

                <i class="fa-solid fa-arrow-right-from-bracket w-4"></i>
                <span>Logout</span>

            </a>

        </div>

    </aside>


    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <main
        class="min-w-0 p-4 pb-12 md:p-8 md:ml-60
               max-w-full md:max-w-[calc(100%-15rem)]
               space-y-4 md:space-y-6">


        <!-- HEADER -->

        <header class="flex items-center justify-between gap-3">

            <div class="min-w-0">

                <div class="flex items-center gap-2.5 min-w-0">

                    <a href="{{ route('sekre.dashboard') }}"
                        class="md:hidden w-8 h-8 shrink-0 rounded-lg bg-white border border-[#DFD5C7] flex items-center justify-center text-dark-green hover:bg-gray-50 active:scale-95 transition"
                        aria-label="Kembali ke dashboard">

                        <i class="fa-solid fa-arrow-left text-xs"></i>

                    </a>

                    <h2
                        class="text-lg sm:text-xl md:text-2xl font-bold text-dark-green truncate">

                        Jurnal Mengajar

                    </h2>

                </div>

                <p
                    class="text-[11px] sm:text-xs text-gray-400 font-semibold mt-1">

                    Periksa jurnal dari guru, beri catatan bila perlu, lalu kirim ke Kurikulum.

                </p>

            </div>


            <div
                class="flex items-center gap-2 sm:gap-3 shrink-0">


                <div class="text-right leading-tight">

                    <div
                        class="text-[9px] sm:text-[10px] md:text-xs font-semibold text-medium-green whitespace-nowrap"
                        id="live-date">

                        memuat tanggal....

                    </div>

                    <div
                        class="text-[10px] sm:text-xs font-extrabold text-dark-green mt-0.5"
                        id="live-clock">

                        00.00 WIB

                    </div>

                </div>

            </div>

        </header>


        <!-- FLASH MESSAGE -->

        @if (session('success'))

            <div
                class="flex items-center gap-2.5 p-3.5 px-4 rounded-xl
                       bg-[#E8F5E9] text-[#2E7D32]
                       border border-[#C8E6C9]
                       text-[13px] font-semibold">

                <i class="fa-solid fa-circle-check"></i>

                <span>{{ session('success') }}</span>

            </div>

        @endif


        @if (session('error'))

            <div
                class="flex items-center gap-2.5 p-3.5 px-4 rounded-xl
                       bg-[#FFEBEE] text-[#C62828]
                       border border-[#FFCDD2]
                       text-[13px] font-semibold">

                <i class="fa-solid fa-circle-exclamation"></i>

                <span>{{ session('error') }}</span>

            </div>

        @endif


        <!-- JOURNAL LIST -->

        @php
            $tanggalHariIni = now()->locale('id')->translatedFormat('d M Y');

            // Dummy jurnal masuk dari guru (kelas XI RPL 2).
            // Sebagian sudah diteruskan sekre ke Kurikulum (approved),
            // sebagian masih menunggu pemeriksaan sekre (pending).
            $dummyJurnals = [
                [
                    'jam' => '07.00 – 08.20', 'mapel' => 'Informatika',
                    'guru' => 'Dedi Kurniawan, S.Kom.', 'kelas' => 'XI RPL 2',
                    'materi' => 'Algoritma dan Pseudocode',
                    'status' => 'approved',
                    'catatan_sekre' => 'Cek ulang absen Budi, statusnya sudah sesuai surat.',
                ],
                [
                    'jam' => '08.20 – 09.40', 'mapel' => 'Matematika',
                    'guru' => 'Arvia Rienetasary, S.Pd.', 'kelas' => 'XI RPL 2',
                    'materi' => 'Fungsi Kuadrat dan Grafiknya',
                    'status' => 'pending',
                    'catatan_sekre' => null,
                ],
                [
                    'jam' => '10.00 – 11.20', 'mapel' => 'Basis Data',
                    'guru' => 'Dedi Kurniawan, S.Kom.', 'kelas' => 'XI RPL 2',
                    'materi' => 'Konsep Basis Data dan Tabel Relasional',
                    'status' => 'approved',
                    'catatan_sekre' => null,
                ],
                [
                    'jam' => '11.20 – 12.40', 'mapel' => 'Pendidikan Pancasila',
                    'guru' => 'Wiwik Yuniarsih, S.Pd.', 'kelas' => 'XI RPL 2',
                    'materi' => 'Norma dan Keadilan',
                    'status' => 'pending',
                    'catatan_sekre' => null,
                ],
                [
                    'jam' => '13.15 – 14.25', 'mapel' => 'Pemrograman Berorientasi Objek',
                    'guru' => 'Bayu Anggoro, S.Kom.', 'kelas' => 'XI RPL 2',
                    'materi' => 'Class dan Object dalam Java',
                    'status' => 'approved',
                    'catatan_sekre' => 'Materi sudah sesuai RPP.',
                ],
                [
                    'jam' => '14.25 – 15.00', 'mapel' => 'Bahasa Indonesia',
                    'guru' => 'Sari Wulandari, S.Pd.', 'kelas' => 'XI RPL 2',
                    'materi' => 'Teks Eksposisi',
                    'status' => 'pending',
                    'catatan_sekre' => null,
                ],
            ];

            $jumlahMenunggu = collect($dummyJurnals)->where('status', 'pending')->count();
            $jumlahTerkirim = collect($dummyJurnals)->where('status', 'approved')->count();
        @endphp

        @if (count($dummyJurnals) > 0)

            <section>


                <!-- RESPONSIVE GRID -->

                <div
                    class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3
                           gap-4">


                    @foreach ($dummyJurnals as $jurnal)

                        @php $terkirim = $jurnal['status'] === 'approved'; @endphp

                        <article class="journal-card {{ $terkirim ? 'sent' : '' }}">


                            <!-- CARD TOP -->

                            <div class="journal-card-top">

                                <div
                                    class="flex items-start justify-between gap-3">

                                    <div class="min-w-0">

                                        <span class="journal-time">

                                            <i class="fa-regular fa-clock"></i>

                                            {{ $jurnal['jam'] }}

                                        </span>


                                        <h3 class="journal-mapel">

                                            {{ $jurnal['mapel'] }}

                                        </h3>

                                    </div>


                                    @if ($terkirim)

                                        <span class="badge approved">

                                            <i class="fa-solid fa-check"></i>

                                            Terkirim ke Kurikulum

                                        </span>

                                    @else

                                        <span class="badge pending">

                                            <i class="fa-regular fa-clock"></i>

                                            Menunggu Pemeriksaan

                                        </span>

                                    @endif

                                </div>

                            </div>


                            <!-- CARD BOTTOM -->

                            <div class="journal-card-bottom">


                                <!-- GURU -->

                                <div class="journal-info">

                                    <div class="journal-info-icon">

                                        <i class="fa-regular fa-user"></i>

                                    </div>

                                    <div class="journal-info-text">

                                        <span class="journal-info-label">
                                            Guru
                                        </span>

                                        <span class="journal-info-value">

                                            {{ $jurnal['guru'] }}

                                        </span>

                                    </div>

                                </div>


                                <!-- KELAS -->

                                <div class="journal-info">

                                    <div class="journal-info-icon">

                                        <i class="fa-solid fa-users"></i>

                                    </div>

                                    <div class="journal-info-text">

                                        <span class="journal-info-label">
                                            Kelas
                                        </span>

                                        <span class="journal-info-value">

                                            {{ $jurnal['kelas'] }}

                                        </span>

                                    </div>

                                </div>


                                <!-- TANGGAL -->

                                <div class="journal-info">

                                    <div class="journal-info-icon">

                                        <i class="fa-regular fa-calendar"></i>

                                    </div>

                                    <div class="journal-info-text">

                                        <span class="journal-info-label">
                                            Tanggal
                                        </span>

                                        <span class="journal-info-value">

                                            {{ $tanggalHariIni }}

                                        </span>

                                    </div>

                                </div>


                                <!-- MATERI -->

                                <div class="journal-material">

                                    <div class="journal-material-label">
                                        Materi
                                    </div>

                                    <div class="journal-material-text">

                                        {{ $jurnal['materi'] ?: 'Materi belum diisi.' }}

                                    </div>

                                </div>


                                <!-- CATATAN SEKRE (jika sudah dikirim) -->

                                @if ($terkirim && $jurnal['catatan_sekre'])

                                    <div class="journal-note">

                                        <div class="journal-note-label">
                                            Catatan Sekretaris
                                        </div>

                                        <div class="journal-note-text">

                                            {{ $jurnal['catatan_sekre'] }}

                                        </div>

                                    </div>

                                @endif


                                <!-- ACTION -->

                                <div class="journal-card-action space-y-2">

                                    <a
                                        href="#"
                                        class="btn-detail">

                                        <span>
                                            Lihat Detail Jurnal
                                        </span>

                                        <i class="fa-solid fa-arrow-right"></i>

                                    </a>

                                    @if ($terkirim)

                                        <div class="journal-sent-strip">

                                            <i class="fa-solid fa-circle-check"></i>

                                            Sudah diteruskan ke Kurikulum

                                        </div>

                                    @else

                                        <button
                                            type="button"
                                            onclick="kirimKeKurikulum(this)"
                                            class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-[11px] bg-medium-green hover:bg-dark-green text-white text-xs font-bold transition active:scale-[0.98]">

                                            <i class="fa-solid fa-paper-plane"></i>
                                            Kirim ke Kurikulum

                                        </button>

                                    @endif

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>

            </section>

        @else

            <!-- EMPTY -->

            <div class="empty-state">

                <div class="empty-state-icon">

                    <i class="fa-regular fa-folder-open"></i>

                </div>

                <h3
                    class="text-sm font-bold text-dark-green">

                    Tidak Ada Jurnal

                </h3>

                <p
                    class="text-xs text-[#7A8985] mt-1">

                    Belum ada guru yang mengirim jurnal untuk kelas ini.

                </p>

            </div>

        @endif

    </main>


    <!-- =========================
         MOBILE SCROLL HELPER
    ========================== -->

    <div
        id="scrollHelper"
        class="md:hidden fixed right-2 sm:right-3 top-1/2
               -translate-y-1/2 z-30
               flex flex-col items-center gap-1">

        <button
            type="button"
            onclick="scrollToTop()"
            aria-label="Kembali ke atas"
            class="w-7 h-7 rounded-full bg-white/95
                   border border-emerald-100 shadow-md
                   text-medium-green flex items-center
                   justify-center active:scale-90 transition">

            <i class="fa-solid fa-chevron-up text-[9px]"></i>

        </button>


        <div
            class="relative w-1 h-28 bg-dark-green/10
                   rounded-full overflow-hidden">

            <div
                id="scrollIndicator"
                class="absolute left-0 top-0 w-1 h-8
                       bg-medium-green rounded-full">
            </div>

        </div>


        <button
            type="button"
            onclick="scrollToBottom()"
            aria-label="Ke bagian bawah"
            class="w-7 h-7 rounded-full bg-white/95
                   border border-emerald-100 shadow-md
                   text-medium-green flex items-center
                   justify-center active:scale-90 transition">

            <i class="fa-solid fa-chevron-down text-[9px]"></i>

        </button>

    </div>


    <!-- =========================
         JAVASCRIPT
    ========================== -->

    <script>

        /* =========================
           MOBILE SIDEBAR
        ========================== */

        const hamburgerBtn =
            document.getElementById('hamburgerBtn');

        const sidebar =
            document.getElementById('sidebar');

        const sidebarOverlay =
            document.getElementById('sidebarOverlay');


        function openSidebar() {

            if (!sidebar || !sidebarOverlay) return;

            sidebar.classList.remove('-translate-x-full');

            sidebarOverlay.classList.remove('hidden');

            document.body.classList.add('overflow-hidden');

        }


        function closeSidebar() {

            if (!sidebar || !sidebarOverlay) return;

            sidebar.classList.add('-translate-x-full');

            sidebarOverlay.classList.add('hidden');

            document.body.classList.remove('overflow-hidden');

        }


        if (hamburgerBtn) {
            hamburgerBtn.addEventListener(
                'click',
                openSidebar
            );
        }


        if (sidebarOverlay) {
            sidebarOverlay.addEventListener(
                'click',
                closeSidebar
            );
        }


        if (sidebar) {

            sidebar.querySelectorAll('a').forEach(link => {

                link.addEventListener('click', () => {

                    if (window.innerWidth < 768) {
                        closeSidebar();
                    }

                });

            });

        }


        window.addEventListener('resize', () => {

            if (window.innerWidth >= 768) {

                if (sidebarOverlay) {
                    sidebarOverlay.classList.add('hidden');
                }

                document.body.classList.remove(
                    'overflow-hidden'
                );

                if (sidebar) {
                    sidebar.classList.remove(
                        '-translate-x-full'
                    );
                }

            } else {

                if (sidebar) {
                    sidebar.classList.add(
                        '-translate-x-full'
                    );
                }

            }

        });


        /* =========================
           CLOCK
        ========================== */

        function updateClock() {

            const now = new Date();

            const dateOptions = {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            };


            const dateEl =
                document.getElementById('live-date');

            const clockEl =
                document.getElementById('live-clock');


            if (dateEl) {

                dateEl.textContent =
                    now.toLocaleDateString(
                        'id-ID',
                        dateOptions
                    );

            }


            if (clockEl) {

                clockEl.textContent =
                    String(now.getHours()).padStart(2, '0') +
                    '.' +
                    String(now.getMinutes()).padStart(2, '0') +
                    ' WIB';

            }

        }


        updateClock();

        setInterval(updateClock, 1000);


        /* =========================
           MOBILE SCROLL HELPER
        ========================== */

        const scrollIndicator =
            document.getElementById(
                'scrollIndicator'
            );


        function updateScrollIndicator() {

            if (!scrollIndicator) return;


            const scrollTop =
                window.scrollY ||
                window.pageYOffset;


            const documentHeight =
                document.documentElement.scrollHeight;


            const windowHeight =
                window.innerHeight;


            const maxScroll =
                documentHeight - windowHeight;


            if (maxScroll <= 0) {

                scrollIndicator.style.top = '0px';

                return;

            }


            const trackHeight = 112;

            const indicatorHeight = 32;

            const maxTop =
                trackHeight - indicatorHeight;


            const progress =
                Math.min(
                    1,
                    Math.max(
                        0,
                        scrollTop / maxScroll
                    )
                );


            scrollIndicator.style.top =
                `${progress * maxTop}px`;

        }


        window.addEventListener(
            'scroll',
            updateScrollIndicator,
            { passive: true }
        );


        window.addEventListener(
            'resize',
            updateScrollIndicator
        );


        function scrollToTop() {

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

        }


        function scrollToBottom() {

            window.scrollTo({
                top:
                    document.documentElement
                        .scrollHeight,
                behavior: 'smooth'
            });

        }


        /* =========================
           SIMULASI KIRIM KE KURIKULUM
           (dummy — data tidak benar-benar dikirim)
        ========================= */

        function kirimKeKurikulum(btn) {
            if (!confirm('Kirim jurnal ini ke Kurikulum?')) return;

            const card = btn.closest('.journal-card');
            if (card) card.classList.add('sent');

            const badge = card.querySelector('.badge');
            if (badge) {
                badge.className = 'badge approved';
                badge.innerHTML = '<i class="fa-solid fa-check"></i> Terkirim ke Kurikulum';
            }

            const wrap = btn.closest('.journal-card-action');
            if (wrap) {
                btn.remove();
                const strip = document.createElement('div');
                strip.className = 'journal-sent-strip';
                strip.innerHTML = '<i class="fa-solid fa-circle-check"></i> Sudah diteruskan ke Kurikulum';
                wrap.appendChild(strip);
            }
        }


        updateScrollIndicator();

    </script>

</body>
</html>