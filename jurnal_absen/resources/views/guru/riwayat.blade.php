<!DOCTYPE html>
<html lang="id"  class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Jurnal</title>

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
        html { scroll-behavior: smooth; }
        body { overflow-x: hidden; }
        #scrollIndicator { transition: top 0.15s ease-out; }
    </style>
</head>

<body class="bg-bg-cream text-dark-green font-sans min-h-screen overflow-x-hidden w-full">
       <!-- MOBILE HEADER -->
    <div class="md:hidden bg-dark-green text-white p-4 flex items-center justify-between sticky top-0 z-40 shadow-sm">
        <div class="flex items-center gap-2">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
            <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
        </div>
        <button id="hamburgerBtn" type="button" class="w-9 h-9 rounded-lg flex items-center justify-center hover:bg-white/10 transition focus:outline-none">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    <!-- SIDEBAR OVERLAY (MOBILE) -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden"></div>

    <!-- SIDEBAR (disamakan dengan Dashboard Guru & Guru Piket) -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 w-60 md:w-56 bg-dark-green text-white p-6 flex flex-col justify-between z-50 -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">

        <div>
            <div class="flex flex-col items-center gap-2 mb-10 text-center">
                <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-16 h-auto">
                <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
            </div>

            <nav class="flex flex-col gap-5 font-semibold text-xs">

                <!-- UTAMA -->
                <div>
                    <div class="text-[10px] uppercase font-extrabold text-gray-400 tracking-wider mb-2 px-2">Utama</div>
                    <div class="space-y-1">
                        <a href="{{ url('/guru/dashboard') }}"
                            class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-house w-4 text-center"></i>
                            Dashboard
                        </a>

                        <a href="{{ url('/guru/jurnal') }}"
                            class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-book w-4 text-center"></i>
                            Jurnal
                        </a>

                        <a href="{{ url('/guru/riwayat') }}"
                            class="flex items-center gap-3 px-4 py-3 bg-white/10 text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-regular fa-calendar-days w-4 text-center"></i>
                            Riwayat
                        </a>
                    </div>
                </div>

@if(false)
    <div>
        <div class="text-[10px] uppercase font-extrabold text-gray-400 tracking-wider mb-2 px-2">
            Akses Piket
        </div>

        <div class="space-y-1">

            <a
                href="{{ url('/piket/dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">

                <i class="fa-solid fa-clipboard-user w-4 text-center"></i>

                <span>
                    Dashboard Piket
                </span>

            </a>

        </div>
    </div>
@endif
</div>
              
        <!-- FOOTER SIDEBAR -->
        <div class="flex flex-col gap-1 pt-3 border-t border-white/10 text-xs">

            <a href="{{ url('/guru/akun') }}"
                class="flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                <i class="fa-solid fa-user-circle w-4"></i>
                <span>Akun Guru</span>
            </a>

            <a href="{{ route('logout') }}"
                class="w-full flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                <i class="fa-solid fa-right-from-bracket w-4"></i>
                <span>Logout</span>
            </a>

        </div>

    </aside>

    <!-- MOBILE SCROLL HELPER -->
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


    <!-- MAIN -->
<main class="flex-1 p-4 pb-12 md:p-8 md:ml-56 max-w-full md:max-w-[calc(100%-14rem)] mx-auto min-w-0 space-y-4 md:space-y-6">     
       <!-- HEADER -->
        <header class="mb-5 md:mb-7">

            <div class="flex items-start justify-between gap-3">

                <div class="flex items-start gap-3">

                    <!-- TOMBOL KEMBALI -->
                    <a href="{{ url()->previous() }}"
                        aria-label="Kembali"
                        class="shrink-0 w-9 h-9 mt-0.5 rounded-full bg-white border border-emerald-100
                            flex items-center justify-center text-dark-green
                            hover:bg-emerald-50 hover:border-medium-green
                            active:scale-[0.95] transition">
                        <i class="fa-solid fa-arrow-left text-xs"></i>
                    </a>

                    <div>

                        <h1 class="text-xl md:text-2xl font-black tracking-tight">
                            Riwayat Jurnal
                        </h1>

                        <p class="text-[11px] md:text-xs text-medium-green
                            font-semibold mt-1">
                            Lihat jurnal yang telah Anda isi
                        </p>

                    </div>

                </div>


                <!-- DATE -->
                <div class="hidden sm:block text-right leading-tight">

                    <div id="live-date" class="text-[10px] md:text-xs
                        font-semibold text-medium-green whitespace-nowrap">

                        {{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}

                    </div>

                    <div id="live-clock" class="text-xs font-extrabold mt-0.5">

                        {{ now()->format('H.i') }} WIB

                    </div>

                </div>

            </div>

        </header>



        <section class="grid grid-cols-3 gap-2 md:gap-4 mb-5">

<!-- SEMUA -->
<button type="button"
    onclick="setStatusFilter('all')"
    id="summary-all"
    class="summary-card text-left bg-white rounded-xl border border-emerald-100
    p-3 md:p-4 transition-all duration-200
    hover:border-medium-green hover:shadow-md
    active:scale-[0.98]">

    <div class="flex items-center gap-2">

        <div class="w-7 h-7 md:w-9 md:h-9 rounded-lg
            bg-emerald-50 text-medium-green
            flex items-center justify-center">

            <i class="fa-solid fa-book text-xs md:text-sm"></i>

        </div>

        <div>
            <p class="text-[9px] md:text-[10px]
                text-gray-400 font-bold">
                Semua
            </p>

            <p class="text-base md:text-lg font-black">
                2
            </p>
        </div>

    </div>

</button>


<!-- VALID -->
<button type="button"
    onclick="setStatusFilter('valid')"
    id="summary-valid"
    class="summary-card text-left bg-white rounded-xl border border-emerald-100
    p-3 md:p-4 transition-all duration-200
    hover:border-emerald-400 hover:shadow-md
    active:scale-[0.98]">

    <div class="flex items-center gap-2">

        <div class="w-7 h-7 md:w-9 md:h-9 rounded-full
            bg-emerald-50 text-emerald-600
            flex items-center justify-center">

            <i class="fa-solid fa-check text-xs"></i>

        </div>

        <div>

            <p class="text-[9px] md:text-[10px]
                text-gray-400 font-bold">
                Tervalidasi
            </p>

            <p class="text-base md:text-lg font-black">
                1
            </p>

        </div>

    </div>

</button>


<!-- MENUNGGU -->
<button type="button"
    onclick="setStatusFilter('waiting')"
    id="summary-waiting"
    class="summary-card text-left bg-white rounded-xl border border-emerald-100
    p-3 md:p-4 transition-all duration-200
    hover:border-amber-300 hover:shadow-md
    active:scale-[0.98]">

    <div class="flex items-center gap-2">

        <div class="w-7 h-7 md:w-9 md:h-9 rounded-full
            bg-amber-50 text-amber-500
            flex items-center justify-center">

            <i class="fa-regular fa-clock text-xs"></i>

        </div>

        <div>

            <p class="text-[9px] md:text-[10px]
                text-gray-400 font-bold">
                Menunggu
            </p>

            <p class="text-base md:text-lg font-black">
                1
            </p>

        </div>

    </div>

</button>

</section>

        <!-- FILTER -->
        <section class="bg-white rounded-2xl border border-emerald-100
            p-3 md:p-4 mb-5">

            <div class="flex flex-col md:flex-row gap-2.5">

                <!-- SEARCH -->
                <div class="relative flex-1">

                    <i class="fa-solid fa-magnifying-glass
                        absolute left-3 top-1/2 -translate-y-1/2
                        text-gray-400 text-xs">
                    </i>

                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Cari mata pelajaran atau kelas..."
                        class="w-full pl-9 pr-3 py-2.5
                        rounded-xl bg-gray-50
                        border border-gray-100
                        text-xs outline-none
                        focus:border-medium-green
                        focus:ring-2 focus:ring-emerald-100">

                </div>

                <!-- DATE -->
                <select
                    id="dateFilter"
                    class="md:w-36 px-3 py-2.5
                    rounded-xl bg-gray-50
                    border border-gray-100
                    text-xs font-semibold
                    outline-none">


                    <option>
                        Semua Waktu
                    </option>

                    <option>
                        Hari Ini
                    </option>

                    <option>
                        Minggu Ini
                    </option>

                    <option>
                        Bulan Ini
                    </option>

                </select>

            </div>

        </section>



        <!-- ================= MOBILE ================= -->
        <section id="mobileList"
            class="space-y-3 md:hidden">


            <!-- CARD 1 -->
            <div class="riwayat-card bg-white rounded-2xl
                border border-emerald-100 p-4"
                data-status="valid"
                data-search="matematika xi pplg 1">

                <div class="flex items-start justify-between gap-3">

                    <div class="flex gap-3 min-w-0">

                        <div class="w-9 h-9 rounded-full
                            bg-emerald-50 text-emerald-600
                            flex items-center justify-center shrink-0">

                            <i class="fa-solid fa-check text-sm"></i>

                        </div>

                        <div class="min-w-0">

                            <h3 class="text-xs font-black truncate">
                                MATEMATIKA
                            </h3>

                            <p class="text-[10px] text-medium-green
                                font-semibold mt-0.5">
                                XI PPLG 1
                            </p>

                        </div>

                    </div>


                    <span class="shrink-0 px-2 py-1 rounded-full
                        bg-emerald-50 text-emerald-700
                        text-[9px] font-bold">

                        Tervalidasi

                    </span>

                </div>


                <div class="mt-3 pt-3 border-t border-gray-100">

                    <p class="text-[10px] text-gray-500 font-semibold">
                        Materi
                    </p>

                    <p class="text-xs font-bold mt-0.5">
                        Fungsi Kuadrat
                    </p>

                </div>


                <div class="flex items-center justify-between mt-3">

                    <div class="text-[10px] text-gray-400
                        flex items-center gap-1.5">

                        <i class="fa-regular fa-clock"></i>

                        09.00 - 09.40

                    </div>

                    <button
                        onclick="openDetail('MATEMATIKA','XI PPLG 1','Fungsi Kuadrat','09.00 - 09.40','Tervalidasi')"
                        class="text-[10px] text-medium-green
                        font-bold hover:text-dark-green">

                        Lihat Detail →

                    </button>

                </div>

            </div>



            <!-- CARD 2 -->
            <div class="riwayat-card bg-white rounded-2xl
                border border-amber-100 p-4"
                data-status="waiting"
                data-search="matematika xi tkj 2">

                <div class="flex items-start justify-between gap-3">

                    <div class="flex gap-3 min-w-0">

                        <div class="w-9 h-9 rounded-full
                            bg-amber-50 text-amber-600
                            flex items-center justify-center shrink-0">

                            <i class="fa-regular fa-clock text-sm"></i>

                        </div>

                        <div class="min-w-0">

                            <h3 class="text-xs font-black truncate">
                                MATEMATIKA
                            </h3>

                            <p class="text-[10px] text-medium-green
                                font-semibold mt-0.5">
                                XI TKJ 2
                            </p>

                        </div>

                    </div>


                    <span class="shrink-0 px-2 py-1 rounded-full
                        bg-amber-50 text-amber-700
                        text-[9px] font-bold">

                        Menunggu

                    </span>

                </div>


                <div class="mt-3 pt-3 border-t border-gray-100">

                    <p class="text-[10px] text-gray-500 font-semibold">
                        Materi
                    </p>

                    <p class="text-xs font-bold mt-0.5">
                        Matriks Lanjutan
                    </p>

                </div>


                <div class="flex items-center justify-between mt-3">

                    <div class="text-[10px] text-gray-400
                        flex items-center gap-1.5">

                        <i class="fa-regular fa-clock"></i>

                        10.00 - 10.40

                    </div>

                    <button
                        onclick="openDetail('MATEMATIKA','XI TKJ 2','Matriks Lanjutan','10.00 - 10.40','Menunggu Validasi')"
                        class="text-[10px] text-medium-green
                        font-bold">

                        Lihat Detail →

                    </button>

                </div>

            </div>
            </section>

        <!-- ================= DESKTOP ================= -->
        <section class="hidden md:block bg-white rounded-2xl
            border border-emerald-100 overflow-hidden">

            <div class="p-5 border-b border-gray-100">

                <h2 class="text-sm font-black">
                    Daftar Riwayat Jurnal
                </h2>

                <p class="text-[10px] text-gray-400 mt-1">
                    Jurnal terbaru yang telah Anda isi.
                </p>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-xs">

                    <thead>

                        <tr class="bg-gray-50/70
                            border-b border-gray-100
                            text-[10px] uppercase
                            tracking-wider text-gray-400">

                            <th class="p-4 text-left">
                                Tanggal
                            </th>

                            <th class="p-4 text-left">
                                Mata Pelajaran
                            </th>

                            <th class="p-4 text-left">
                                Kelas
                            </th>

                            <th class="p-4 text-left">
                                Jam
                            </th>

                            <th class="p-4 text-left">
                                Status
                            </th>

                            <th class="p-4 text-right">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        <!-- ROW 1 -->
                        <tr class="riwayat-card hover:bg-gray-50 transition"
    data-status="valid"
    data-search="matematika xi pplg 1">

                            <td class="p-4 text-gray-500">
                                21 Jul 2026
                            </td>

                            <td class="p-4 font-bold">
                                MATEMATIKA
                            </td>

                            <td class="p-4">
                                XI PPLG 1
                            </td>

                            <td class="p-4 text-gray-500">
                                09.00 - 09.40
                            </td>

                            <td class="p-4">

                                <span class="inline-flex items-center gap-1.5
                                    px-2.5 py-1 rounded-full
                                    bg-emerald-50 text-emerald-700
                                    text-[9px] font-bold">

                                    <i class="fa-solid fa-check text-[8px]"></i>

                                    Tervalidasi

                                </span>

                            </td>

                            <td class="p-4 text-right">

                                <button
                                    onclick="openDetail('MATEMATIKA','XI PPLG 1','Fungsi Kuadrat','09.00 - 09.40','Tervalidasi')"
                                    class="text-medium-green font-bold
                                    hover:text-dark-green">

                                    Detail →

                                </button>

                            </td>

                        </tr>


                        <!-- ROW 2 -->
                       <tr class="riwayat-card hover:bg-gray-50 transition"
    data-status="waiting"
    data-search="matematika xi tkj 2">

                            <td class="p-4 text-gray-500">
                                21 Jul 2026
                            </td>

                            <td class="p-4 font-bold">
                                MATEMATIKA
                            </td>

                            <td class="p-4">
                                XI TKJ 2
                            </td>

                            <td class="p-4 text-gray-500">
                                10.00 - 10.40
                            </td>

                            <td class="p-4">

                                <span class="inline-flex items-center gap-1.5
                                    px-2.5 py-1 rounded-full
                                    bg-amber-50 text-amber-700
                                    text-[9px] font-bold">

                                    <i class="fa-regular fa-clock text-[8px]"></i>

                                    Menunggu

                                </span>

                            </td>

                            <td class="p-4 text-right">

                                <button
                                    onclick="openDetail('MATEMATIKA','XI TKJ 2','Matriks Lanjutan','10.00 - 10.40','Menunggu Validasi')"
                                    class="text-medium-green font-bold">

                                    Detail →

                                </button>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </section>

    </main>



    <!-- ================= DETAIL MODAL ================= -->

    <div id="detailModal"
        class="fixed inset-0 bg-dark-green/60
        z-[60] hidden items-center justify-center
        p-4 backdrop-blur-sm">

        <div class="bg-white rounded-2xl
            p-5 md:p-6 w-full max-w-md
            shadow-2xl">

            <!-- MODAL HEADER -->
            <div class="flex items-start justify-between
                gap-3 pb-4 border-b border-gray-100">

                <div>

                    <p class="text-[9px] uppercase
                        tracking-wider text-medium-green
                        font-bold">
                        Detail Jurnal
                    </p>

                    <h2 id="detailMapel"
                        class="text-base font-black mt-1">
                        MATEMATIKA
                    </h2>

                    <p id="detailKelas"
                        class="text-[10px] text-medium-green
                        font-semibold">
                        XI PPLG 1
                    </p>

                </div>


                <button onclick="closeDetail()"
                    class="w-8 h-8 rounded-full
                    bg-emerald-50 hover:bg-mint-green
                    flex items-center justify-center
                    text-dark-green transition">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>


            <!-- STATUS -->
            <div class="mt-4 p-3 rounded-xl bg-emerald-50/60">

                <p class="text-[9px] text-gray-400 font-bold uppercase">
                    Status Validasi
                </p>

                <p id="detailStatus"
                    class="text-xs font-black text-emerald-700 mt-1">
                    Tervalidasi
                </p>

            </div>


            <!-- INFO -->
            <div class="grid grid-cols-2 gap-3 mt-3">

                <div class="p-3 rounded-xl bg-gray-50">

                    <p class="text-[9px] text-gray-400 font-semibold">
                        Jam Mengajar
                    </p>

                    <p id="detailJam"
                        class="text-xs font-bold mt-1">
                        09.00 - 09.40
                    </p>

                </div>


                <div class="p-3 rounded-xl bg-gray-50">

                    <p class="text-[9px] text-gray-400 font-semibold">
                        Materi
                    </p>

                    <p id="detailMateri"
                        class="text-xs font-bold mt-1">
                        Fungsi Kuadrat
                    </p>

                </div>

            </div>


            <!-- CLOSE -->
            <button onclick="closeDetail()"
                class="w-full mt-4 py-2.5
                rounded-xl bg-dark-green
                hover:bg-medium-green
                text-white text-xs font-bold transition">

                Tutup

            </button>

        </div>

    </div>



    <!-- SCRIPT -->
    <script>


        const hamburgerBtn =
            document.getElementById('hamburgerBtn');

        const sidebar =
            document.getElementById('sidebar');

        const sidebarOverlay =
            document.getElementById('sidebarOverlay');


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

        /* Tutup sidebar ketika link diklik di mobile (dulu belum ada) */
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


        /* ===== JAM LIVE (HEADER) — otomatis update tiap detik ===== */
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
            const progress = Math.min(1, Math.max(0, scrollTop / maxScroll));
            scrollIndicator.style.top = `${progress * (trackHeight - indicatorHeight)}px`;
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


        function openDetail(
            mapel,
            kelas,
            materi,
            jam,
            status
        ) {

            document.getElementById('detailMapel').textContent = mapel;

            document.getElementById('detailKelas').textContent = kelas;

            document.getElementById('detailMateri').textContent = materi;

            document.getElementById('detailJam').textContent = jam;

            document.getElementById('detailStatus').textContent = status;


            const modal =
                document.getElementById('detailModal');

            modal.classList.remove('hidden');

            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');

        }


        function closeDetail() {

            const modal =
                document.getElementById('detailModal');

            modal.classList.add('hidden');

            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');

        }


        document.getElementById('detailModal')
            .addEventListener('click', function(event) {

                if (event.target === this) {

                    closeDetail();

                }

            });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeDetail();
        });


       const searchInput = document.getElementById('searchInput');
const dateFilter = document.getElementById('dateFilter');

let activeStatus = 'all';

function setStatusFilter(status) {


activeStatus = status;

// Tandai card yang sedang aktif
document.querySelectorAll('.summary-card').forEach(card => {
    card.classList.remove(
        'ring-2',
        'ring-medium-green',
        'bg-emerald-50/40'
    );
});

const activeCard = document.getElementById(
    status === 'all'
        ? 'summary-all'
        : status === 'valid'
            ? 'summary-valid'
            : 'summary-waiting'
);

if (activeCard) {
    activeCard.classList.add(
        'ring-2',
        'ring-medium-green',
        'bg-emerald-50/40'
    );
}

filterCards();


}

function filterCards() {

const keyword = searchInput.value.toLowerCase().trim();

document.querySelectorAll('.riwayat-card').forEach(card => {

    const text = card.dataset.search.toLowerCase();
    const cardStatus = card.dataset.status;

    const matchSearch = text.includes(keyword);
    
const matchStatus =
    activeStatus === 'all' ||
    cardStatus === activeStatus;

    card.style.display =
        matchSearch && matchStatus
            ? ''
            : 'none';

});

}

// Search
if (searchInput) {
    searchInput.addEventListener('input', filterCards);
}

// Filter card pertama aktif saat halaman dibuka
setStatusFilter('all');

</script>

</body>
</html>