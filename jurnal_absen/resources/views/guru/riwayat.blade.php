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
</head>

<body class="bg-bg-cream text-dark-green font-sans min-h-screen overflow-x-hidden w-full">
       <!-- MOBILE HEADER -->
    <div class="md:hidden bg-dark-green text-white p-4 flex items-center justify-between sticky top-0 z-40 shadow-sm">
        <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
        <button id="hamburgerBtn" class="text-xl focus:outline-none"><i class="fa-solid fa-bars"></i></button>
    </div>

    <!-- SIDEBAR OVERLAY (MOBILE) -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden"></div>

    <!-- SIDEBAR -->
<aside id="sidebar"
    class="fixed inset-y-0 left-0 w-60 bg-dark-green text-white p-6 flex flex-col justify-between z-50 -translate-x-full md:translate-x-0 transition-transform duration-300">        <div>
            <div class="flex flex-col items-center gap-2 mb-10 text-center">
                <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-16 h-auto">
                <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
            </div>

            <nav class="flex flex-col gap-2 font-semibold text-xs">
                <a href="{{ url('/guru/dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition">
                    <i class="fa-solid fa-house w-4"></i> Dashboard
                </a>
                <a href="{{ url('/guru/jurnal') }}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition">
                    <i class="fa-solid fa-book w-4"></i> Jurnal
                </a>
                <a href="{{ url('/guru/riwayat') }}" class="flex items-center gap-3 px-4 py-3 bg-white/10 text-mint-green rounded-xl transition">
                    <i class="fa-regular fa-calendar-days w-4"></i> Riwayat
                </a>
            </nav>
        </div>

        <div class="space-y-2 pt-4 border-t border-white/10">
            <button class="w-full flex items-center gap-3 px-4 py-3 text-xs font-semibold bg-white/5 hover:bg-white/15 rounded-xl transition text-left">
                <i class="fa-regular fa-user w-4"></i> Profile
            </button>
            <button class="w-full flex items-center gap-3 px-4 py-3 text-xs font-semibold bg-white/5 hover:bg-white/15 rounded-xl transition text-left text-red-300">
                <i class="fa-solid fa-arrow-right-from-bracket w-4"></i> Logout
            </button>
        </div>
    </aside>


    <!-- MAIN -->
<main class="flex-1 p-4 pb-12 md:p-8 md:ml-60 max-w-full md:max-w-[calc(100%-15rem)] mx-auto min-w-0 space-y-4 md:space-y-6">     
       <!-- HEADER -->
        <header class="mb-5 md:mb-7">

            <div class="flex items-start justify-between gap-3">

                <div>

                    <h1 class="text-xl md:text-2xl font-black tracking-tight">
                        Riwayat Jurnal
                    </h1>

                    <p class="text-[11px] md:text-xs text-medium-green
                        font-semibold mt-1">
                        Lihat jurnal yang telah Anda isi
                    </p>

                </div>


                <!-- DATE -->
                <div class="hidden sm:block text-right leading-tight">

                    <div class="text-[10px] md:text-xs
                        font-semibold text-medium-green whitespace-nowrap">

                        {{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}

                    </div>

                    <div class="text-xs font-extrabold mt-0.5">

                        {{ now()->format('H.i') }} WIB

                    </div>

                </div>

            </div>

        </header>



        <!-- SUMMARY STATUS -->
        <section class="grid grid-cols-3 gap-2 md:gap-4 mb-5">

            <!-- SEMUA -->
            <div class="bg-white rounded-xl border border-emerald-100
                p-3 md:p-4">

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
                            12
                        </p>

                    </div>

                </div>

            </div>


            <!-- VALID -->
            <div class="bg-white rounded-xl border border-emerald-100
                p-3 md:p-4">

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
                            9
                        </p>

                    </div>

                </div>

            </div>


            <!-- MENUNGGU -->
            <div class="bg-white rounded-xl border border-emerald-100
                p-3 md:p-4">

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
                            2
                        </p>

                    </div>

                </div>

            </div>

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


                <!-- STATUS -->
                <select
                    id="statusFilter"
                    class="md:w-44 px-3 py-2.5
                    rounded-xl bg-gray-50
                    border border-gray-100
                    text-xs font-semibold
                    outline-none
                    focus:border-medium-green">

                    <option value="all">
                        Semua Status
                    </option>

                    <option value="valid">
                        Tervalidasi
                    </option>

                    <option value="waiting">
                        Menunggu Validasi
                    </option>

                    <option value="revision">
                        Perlu Diperbaiki
                    </option>

                </select>


                <!-- DATE -->
                <select
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



            <!-- CARD 3 -->
            <div class="riwayat-card bg-white rounded-2xl
                border border-rose-100 p-4"
                data-status="revision"
                data-search="informatika xi tki 2">

                <div class="flex items-start justify-between gap-3">

                    <div class="flex gap-3 min-w-0">

                        <div class="w-9 h-9 rounded-full
                            bg-rose-50 text-rose-500
                            flex items-center justify-center shrink-0">

                            <i class="fa-solid fa-rotate text-sm"></i>

                        </div>

                        <div class="min-w-0">

                            <h3 class="text-xs font-black truncate">
                                INFORMATIKA
                            </h3>

                            <p class="text-[10px] text-medium-green
                                font-semibold mt-0.5">
                                XI TKI 2
                            </p>

                        </div>

                    </div>


                    <span class="shrink-0 px-2 py-1 rounded-full
                        bg-rose-50 text-rose-600
                        text-[9px] font-bold">

                        Perlu Diperbaiki

                    </span>

                </div>


                <div class="mt-3 pt-3 border-t border-gray-100">

                    <p class="text-[10px] text-gray-500 font-semibold">
                        Materi
                    </p>

                    <p class="text-xs font-bold mt-0.5">
                        Algoritma Dasar
                    </p>

                </div>


                <div class="flex items-center justify-between mt-3">

                    <div class="text-[10px] text-gray-400
                        flex items-center gap-1.5">

                        <i class="fa-regular fa-clock"></i>

                        11.00 - 11.40

                    </div>

                    <button
                        onclick="openDetail('INFORMATIKA','XI TKI 2','Algoritma Dasar','11.00 - 11.40','Perlu Diperbaiki')"
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
                        <tr class="hover:bg-gray-50 transition">

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
                        <tr class="hover:bg-gray-50 transition">

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


                        <!-- ROW 3 -->
                        <tr class="hover:bg-gray-50 transition">

                            <td class="p-4 text-gray-500">
                                20 Jul 2026
                            </td>

                            <td class="p-4 font-bold">
                                INFORMATIKA
                            </td>

                            <td class="p-4">
                                XI TKI 2
                            </td>

                            <td class="p-4 text-gray-500">
                                11.00 - 11.40
                            </td>

                            <td class="p-4">

                                <span class="inline-flex items-center gap-1.5
                                    px-2.5 py-1 rounded-full
                                    bg-rose-50 text-rose-600
                                    text-[9px] font-bold">

                                    <i class="fa-solid fa-rotate text-[8px]"></i>

                                    Perlu Diperbaiki

                                </span>

                            </td>

                            <td class="p-4 text-right">

                                <button
                                    onclick="openDetail('INFORMATIKA','XI TKI 2','Algoritma Dasar','11.00 - 11.40','Perlu Diperbaiki')"
                                    class="text-medium-green font-bold">

                                    Detail →

                                </button>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </section>



        <!-- PAGINATION -->
        <div class="flex items-center justify-between mt-4">

            <span class="text-[10px] text-gray-400">
                Menampilkan 3 dari 12 jurnal
            </span>

            <div class="flex items-center gap-1">

                <button
                    class="w-7 h-7 rounded-lg bg-white
                    border border-gray-100
                    text-gray-400 text-xs">

                    <i class="fa-solid fa-chevron-left"></i>

                </button>

                <button
                    class="w-7 h-7 rounded-lg bg-dark-green
                    text-white text-[10px] font-bold">

                    1

                </button>

                <button
                    class="w-7 h-7 rounded-lg bg-white
                    border border-gray-100
                    text-gray-500 text-[10px]">

                    2

                </button>

                <button
                    class="w-7 h-7 rounded-lg bg-white
                    border border-gray-100
                    text-gray-500 text-[10px]">

                    3

                </button>

                <button
                    class="w-7 h-7 rounded-lg bg-white
                    border border-gray-100
                    text-gray-400 text-xs">

                    <i class="fa-solid fa-chevron-right"></i>

                </button>

            </div>

        </div>

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


        hamburgerBtn.addEventListener('click', () => {

            sidebar.classList.remove('-translate-x-full');

            sidebarOverlay.classList.remove('hidden');

        });


        sidebarOverlay.addEventListener('click', () => {

            sidebar.classList.add('-translate-x-full');

            sidebarOverlay.classList.add('hidden');

        });


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

        }


        function closeDetail() {

            const modal =
                document.getElementById('detailModal');

            modal.classList.add('hidden');

            modal.classList.remove('flex');

        }


        document.getElementById('detailModal')
            .addEventListener('click', function(event) {

                if (event.target === this) {

                    closeDetail();

                }

            });


        const searchInput =
            document.getElementById('searchInput');

        const statusFilter =
            document.getElementById('statusFilter');


        function filterCards() {

            const keyword =
                searchInput.value.toLowerCase();

            const status =
                statusFilter.value;


            document.querySelectorAll('.riwayat-card')
                .forEach(card => {

                    const text =
                        card.dataset.search.toLowerCase();

                    const cardStatus =
                        card.dataset.status;


                    const matchSearch =
                        text.includes(keyword);

                    const matchStatus =
                        status === 'all' ||
                        cardStatus === status;


                    card.style.display =
                        matchSearch && matchStatus
                            ? ''
                            : 'none';

                });

        }


        searchInput.addEventListener(
            'input',
            filterCards
        );


        statusFilter.addEventListener(
            'change',
            filterCards
        );

    </script>

</body>
</html>