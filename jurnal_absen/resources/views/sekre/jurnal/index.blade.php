<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal Mengajar - Jurnal Absensi</title>

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
        class="md:hidden bg-dark-green text-white p-4 flex items-center justify-between sticky top-0 z-40 shadow-sm">

        <div class="flex items-center gap-2">
            <img
                src="{{ asset('image/logo.png') }}"
                alt="Logo"
                class="w-8 h-8 object-contain">

            <span class="font-bold text-sm tracking-wide">
                Jurnal Absensi
            </span>
        </div>

        <button
            id="hamburgerBtn"
            type="button"
            class="w-9 h-9 rounded-lg flex items-center justify-center
                   hover:bg-white/10 transition focus:outline-none"
            aria-label="Buka menu">

            <i class="fa-solid fa-bars"></i>
        </button>
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
                    <span>Home</span>

                </a>


                <a
                    href="{{ url('/sekre/jadwal') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-300
                           hover:bg-white/10 hover:text-mint-green
                           rounded-xl transition active:scale-[0.98]">

                    <i class="fa-regular fa-calendar-days w-4 text-center"></i>
                    <span>Jadwal</span>

                </a>


                <!-- JURNAL AKTIF -->
                <a
                    href="{{ url('/sekre/jurnal') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-white/10
                           text-mint-green rounded-xl transition active:scale-[0.98]">

                    <i class="fa-solid fa-book-open w-4 text-center"></i>
                    <span>Jurnal</span>

                </a>


                <a
                    href="{{ url('/sekre/status-validasi') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-300
                           hover:bg-white/10 hover:text-mint-green
                           rounded-xl transition active:scale-[0.98]">

                    <i class="fa-regular fa-file-lines w-4 text-center"></i>
                    <span>Status Validasi</span>

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
                <span>Akun Sekre</span>

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

        <header
            class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between
                   pb-5 md:pb-6 border-b border-[#E5DCCE]">

            <div>

                <h2
                    class="page-title text-[21px] md:text-[26px]
                           font-bold text-dark-green">

                    Jurnal Mengajar

                </h2>

                <p
                    class="page-subtitle text-xs md:text-[13px]
                           text-[#7A8985] mt-1">

                    Pilih sesi mengajar yang ingin diperiksa atau diperbaiki.

                </p>

            </div>


            <div
                class="flex items-center justify-between md:justify-end gap-4">

                <button
                    class="w-10 h-10 md:w-11 md:h-11 rounded-xl bg-white
                           border border-[#DFD5C7]
                           flex items-center justify-center
                           text-dark-green hover:bg-gray-50 transition"
                    type="button"
                    title="Notifikasi">

                    <i class="fa-regular fa-bell"></i>

                </button>


                <div class="flex flex-col text-right gap-0.5">

                    <span
                        class="text-xs md:text-[13px] font-semibold text-dark-green"
                        id="live-date">

                        memuat tanggal…

                    </span>

                    <span
                        class="text-[11px] md:text-xs
                               text-[#7A8985] font-semibold"
                        id="live-clock">

                        00:00 WIB

                    </span>

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


        <!-- INFO -->

        <div
            class="flex items-start gap-3 bg-white border border-[#E5DCCE]
                   rounded-2xl p-4 md:p-5">

            <div
                class="w-9 h-9 shrink-0 rounded-xl bg-[#E2F2EB]
                       text-medium-green flex items-center justify-center">

                <i class="fa-regular fa-calendar-days text-sm"></i>

            </div>

            <div>

                <h3
                    class="text-[13px] font-bold text-dark-green">

                    Sesi Jurnal

                </h3>

                <p
                    class="text-[11px] md:text-xs text-[#7A8985]
                           leading-relaxed mt-1">

                    Setiap kartu mewakili satu sesi mata pelajaran
                    dan guru yang mengajar pada sesi tersebut.

                </p>

            </div>

        </div>


        <!-- JOURNAL LIST -->

        @if ($jurnals->isNotEmpty())

            <section>

                <div
                    class="flex items-center justify-between mb-3">

                    <div>

                        <h3
                            class="text-sm md:text-base font-bold text-dark-green">

                            Daftar Sesi Mengajar

                        </h3>

                        <p
                            class="text-[11px] md:text-xs text-[#7A8985] mt-0.5">

                            {{ $jurnals->count() }} jurnal tersedia

                        </p>

                    </div>

                </div>


                <!-- RESPONSIVE GRID -->

                <div
                    class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3
                           gap-4">


                    @foreach ($jurnals as $jurnal)

                        <article class="journal-card">


                            <!-- CARD TOP -->

                            <div class="journal-card-top">

                                <div
                                    class="flex items-start justify-between gap-3">

                                    <div class="min-w-0">

                                        <span class="journal-time">

                                            <i class="fa-regular fa-clock"></i>

                                            {{ $jurnal->jadwal?->start_time ?? '--:--' }}
                                            –
                                            {{ $jurnal->jadwal?->end_time ?? '--:--' }}

                                        </span>


                                        <h3 class="journal-mapel">

                                            {{ $jurnal->jadwal?->mapel?->name ?? 'Tanpa Mapel' }}

                                        </h3>

                                    </div>


                                    <span class="badge {{ $jurnal->status }}">

                                        @if ($jurnal->status === 'pending')
                                            <i class="fa-regular fa-clock"></i>
                                        @elseif ($jurnal->status === 'approved')
                                            <i class="fa-solid fa-check"></i>
                                        @elseif ($jurnal->status === 'rejected')
                                            <i class="fa-solid fa-rotate-left"></i>
                                        @endif

                                        {{ $jurnal->status_label }}

                                    </span>

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

                                            {{ $jurnal->jadwal?->teacher?->name ?? '-' }}

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

                                            {{ $jurnal->jadwal?->kelas?->name ?? '-' }}

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

                                            {{ $jurnal->tgl?->translatedFormat('d M Y') ?? '-' }}

                                        </span>

                                    </div>

                                </div>


                                <!-- MATERI -->

                                <div class="journal-material">

                                    <div class="journal-material-label">
                                        Materi
                                    </div>

                                    <div class="journal-material-text">

                                        {{ $jurnal->materi ?: 'Materi belum diisi.' }}

                                    </div>

                                </div>


                                <!-- DETAIL -->

                                <div class="journal-card-action">

                                    <a
                                        href="{{ route('sekre.jurnal.show', $jurnal) }}"
                                        class="btn-detail">

                                        <span>
                                            Lihat Detail Jurnal
                                        </span>

                                        <i class="fa-solid fa-arrow-right"></i>

                                    </a>

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

                    Belum Ada Jurnal

                </h3>

                <p
                    class="text-xs text-[#7A8985] mt-1">

                    Belum ada jurnal mengajar yang tersedia untuk diperiksa.

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


        updateScrollIndicator();

    </script>

</body>
</html>