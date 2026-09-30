<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jurnal Piket</title>

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
        /* Scrollbar kecil untuk isi jurnal */
        .journal-scroll::-webkit-scrollbar {
            width: 5px;
        }

        .journal-scroll::-webkit-scrollbar-track {
            background: #f3f4f6;
            border-radius: 999px;
        }

        .journal-scroll::-webkit-scrollbar-thumb {
            background: #89D7B7;
            border-radius: 999px;
        }

        .journal-scroll::-webkit-scrollbar-thumb:hover {
            background: #428475;
        }

        /* Firefox */
        .journal-scroll {
            scrollbar-width: thin;
            scrollbar-color: #89D7B7 #f3f4f6;
        }
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
                            class="relative flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-house w-4 text-center"></i>
                            Dashboard
                        </a>

                        <a href="{{ url('/piket/jurnal') }}"
                            class="flex items-center gap-3 px-4 py-3 bg-white/10 text-mint-green rounded-xl transition active:scale-[0.98]">
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

    <!-- ========================================================= -->
    <!-- MAIN CONTENT -->
    <!-- ========================================================= -->

    <main class="md:ml-60
                 p-4 pb-12
                 md:p-8
                 max-w-full
                 min-w-0">


        <!-- ===================================================== -->
        <!-- HEADER -->
        <!-- ===================================================== -->

        <header class="flex items-center justify-between
                       gap-3
                       mb-5">

            <div class="min-w-0">
                
                <h1 class="text-xl sm:text-2xl
                           md:text-3xl
                           font-black
                           text-dark-green
                           tracking-tight">

                    Jurnal Hari Ini

                </h1>


                <p class="text-[11px] sm:text-xs
                          text-medium-green
                          font-semibold
                          mt-1">

                    Pantau jurnal setiap kelas dan tangani guru yang tidak hadir.

                </p>

            </div>


            <!-- TANGGAL -->

            <div class="text-right shrink-0">

                <div class="text-[9px] sm:text-xs
                            font-semibold
                            text-medium-green
                            whitespace-nowrap">

                    {{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}

                </div>

                <div class="text-[10px] sm:text-xs
                            font-extrabold
                            text-dark-green
                            mt-0.5">

                    {{ now()->format('H.i') }} WIB

                </div>

            </div>

        </header>

        <!-- ===================================================== -->
        <!-- SUMMARY -->
        <!-- ===================================================== -->

        <section class="grid grid-cols-3
                        gap-2 md:gap-4
                        mb-5">


            <!-- TOTAL KELAS -->

            <div class="bg-white
                        rounded-xl
                        border border-emerald-100/60
                        p-3 md:p-4
                        flex items-center gap-2.5">

                <div class="w-8 h-8 md:w-10 md:h-10
                            rounded-lg
                            bg-emerald-50
                            text-dark-green
                            flex items-center justify-center
                            shrink-0">

                    <i class="fa-solid fa-school
                              text-xs md:text-sm">
                    </i>

                </div>


                <div class="min-w-0">

                    <p class="text-[9px] md:text-xs
                              font-bold
                              text-gray-500">

                        Kelas

                    </p>

                    <p class="text-base md:text-xl
                              font-black
                              text-dark-green">

                        4

                    </p>

                    <p class="text-[8px] md:text-[10px]
                              text-medium-green">

                        Hari ini

                    </p>

                </div>

            </div>


            <!-- JURNAL -->

            <div class="bg-white
                        rounded-xl
                        border border-emerald-100/60
                        p-3 md:p-4
                        flex items-center gap-2.5">

                <div class="w-8 h-8 md:w-10 md:h-10
                            rounded-full
                            bg-emerald-500
                            text-white
                            flex items-center justify-center
                            shrink-0">

                    <i class="fa-solid fa-book text-xs"></i>

                </div>


                <div class="min-w-0">

                    <p class="text-[9px] md:text-xs
                              font-bold
                              text-gray-500">

                        Jurnal

                    </p>

                    <p class="text-base md:text-xl
                              font-black
                              text-dark-green">

                        12

                    </p>

                    <p class="text-[8px] md:text-[10px]
                              text-medium-green">

                        Masuk

                    </p>

                </div>

            </div>


            <!-- TIDAK HADIR -->

            <div class="bg-white
                        rounded-xl
                        border border-rose-100
                        p-3 md:p-4
                        flex items-center gap-2.5">

                <div class="w-8 h-8 md:w-10 md:h-10
                            rounded-full
                            bg-rose-500
                            text-white
                            flex items-center justify-center
                            shrink-0">

                    <i class="fa-solid fa-user-xmark text-xs"></i>

                </div>


                <div class="min-w-0">

                    <p class="text-[9px] md:text-xs
                              font-bold
                              text-gray-500">

                        Tidak Hadir

                    </p>

                    <p class="text-base md:text-xl
                              font-black
                              text-rose-600">

                        2

                    </p>

                    <p class="text-[8px] md:text-[10px]
                              text-rose-500">

                        Perlu ditangani

                    </p>

                </div>

            </div>

        </section>


        <!-- ===================================================== -->
        <!-- FILTER -->
        <!-- ===================================================== -->

        <section class="bg-white
                        rounded-2xl
                        border border-emerald-100
                        p-4 md:p-5
                        mb-5">

            <div class="flex flex-col
                        md:flex-row
                        md:items-end
                        gap-3">


                <!-- SEARCH -->

                <div class="flex-1">

                    <label class="block
                                  text-[10px]
                                  font-extrabold
                                  text-gray-500
                                  mb-1.5">

                        Cari Kelas / Mata Pelajaran / Guru

                    </label>


                    <div class="relative">

                        <i class="fa-solid fa-magnifying-glass
                                  absolute
                                  left-3
                                  top-1/2
                                  -translate-y-1/2
                                  text-gray-400
                                  text-xs">
                        </i>


                        <input id="searchInput"
                            type="text"
                            placeholder="Contoh: XI TKI 1..."
                            class="w-full
                                   pl-9 pr-3
                                   py-2.5
                                   rounded-xl
                                   border border-gray-200
                                   bg-gray-50
                                   text-xs
                                   outline-none
                                   focus:border-medium-green
                                   focus:ring-2
                                   focus:ring-mint-green/30
                                   transition">

                    </div>

                </div>


                <!-- STATUS -->

                <div class="md:w-44">

                    <label class="block
                                  text-[10px]
                                  font-extrabold
                                  text-gray-500
                                  mb-1.5">

                        Status Guru

                    </label>


                    <select id="statusFilter"
                        class="w-full
                               px-3 py-2.5
                               rounded-xl
                               border border-gray-200
                               bg-gray-50
                               text-xs
                               font-semibold
                               outline-none
                               focus:border-medium-green
                               focus:ring-2
                               focus:ring-mint-green/30">

                        <option value="semua">
                            Semua
                        </option>

                        <option value="hadir">
                            Hadir
                        </option>

                        <option value="tidak-hadir">
                            Tidak Hadir
                        </option>

                    </select>

                </div>

            </div>

        </section>


        <!-- ===================================================== -->
        <!-- JURNAL PER KELAS -->
        <!-- ===================================================== -->

        <section>

            <div class="flex items-center
                        justify-between
                        mb-3">

                <div>

                    <h2 class="text-sm md:text-base
                               font-black
                               text-dark-green">

                        Jurnal Per Kelas

                    </h2>

                    <p class="text-[10px] md:text-xs
                              text-gray-400
                              mt-0.5">

                        Jurnal dikelompokkan berdasarkan kelas.

                    </p>

                </div>


                <span class="text-[9px] md:text-xs
                             font-bold
                             text-medium-green">

                    Hari ini

                </span>

            </div>


            <!-- ================================================= -->
            <!-- CARD LIST -->
            <!-- ================================================= -->

            <div id="journalList"
                class="grid grid-cols-1
                       lg:grid-cols-2
                       gap-3 md:gap-4">


                <!-- ================================================= -->
                <!-- KELAS XI TKI 1 -->
                <!-- ================================================= -->

                <article
                    class="journal-card
                           bg-white
                           rounded-2xl
                           border border-emerald-100
                           overflow-hidden
                           hover:shadow-md
                           transition"
                    data-class="XI TKI 1"
                    data-statuses="hadir">


                    <!-- HEADER CARD -->

                    <div class="p-4 pb-3">

                        <div class="flex items-start
                                    justify-between
                                    gap-3">

                            <div class="flex items-center gap-2">

                                <div class="w-9 h-9
                                            rounded-xl
                                            bg-emerald-50
                                            text-dark-green
                                            flex items-center justify-center
                                            shrink-0">

                                    <i class="fa-solid fa-school"></i>

                                </div>


                                <div>

                                    <h3 class="text-sm
                                               font-black
                                               text-dark-green">

                                        XI TKI 1

                                    </h3>


                                    <p class="text-[10px]
                                              text-medium-green
                                              font-semibold">

                                        6 Jurnal Hari Ini

                                    </p>

                                </div>

                            </div>


                            <span class="shrink-0
                                         px-2.5 py-1
                                         rounded-full
                                         bg-emerald-100
                                         text-emerald-700
                                         text-[9px]
                                         font-black">

                                Lengkap

                            </span>

                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- SCROLL AREA -->
                    <!-- ================================================= -->

                    <div class="journal-scroll
                                max-h-[360px]
                                overflow-y-auto
                                px-4
                                pb-4
                                space-y-2">


                        <!-- JURNAL 1 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="bahasa indonesia xi tki 1 yani">

                            <div class="flex items-start
                                        justify-between
                                        gap-3">

                                <div class="min-w-0">

                                    <p class="text-[10px]
                                              font-black
                                              text-dark-green">

                                        BAHASA INDONESIA

                                    </p>

                                    <p class="text-[10px]
                                              text-gray-500
                                              mt-0.5">

                                        Yani, S.Pd.

                                    </p>

                                    <div class="mt-2
                                                text-[9px]
                                                text-gray-400">

                                        <i class="fa-regular fa-clock mr-1"></i>

                                        07.00 - 08.20

                                    </div>

                                </div>


                                <span class="px-2 py-1
                                             rounded-md
                                             bg-emerald-100
                                             text-emerald-700
                                             text-[8px]
                                             font-bold
                                             shrink-0">

                                    Hadir

                                </span>

                            </div>


                           <button
                                onclick="openJournal(
                                    'Matematika',
                                    'XI TKI 1',
                                    'Arvia Rienetasary, S.Pd.',
                                    'Hadir',
                                    'Jurnal pembelajaran telah diisi oleh guru.'
                                )"
                                class="mt-2.5
                                       text-[9px]
                                       font-bold
                                       text-medium-green">

                                Lihat Detail →

                            </button>

                        </div>


                        <!-- JURNAL 2 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="matematika xi tki 1 arvia rienetasary">

                            <div class="flex items-start
                                        justify-between
                                        gap-3">

                                <div class="min-w-0">

                                    <p class="text-[10px]
                                              font-black
                                              text-dark-green">

                                        MATEMATIKA

                                    </p>

                                    <p class="text-[10px]
                                              text-gray-500
                                              mt-0.5">

                                        Arvia Rienetasary, S.Pd.

                                    </p>

                                    <div class="mt-2
                                                text-[9px]
                                                text-gray-400">

                                        <i class="fa-regular fa-clock mr-1"></i>

                                        08.20 - 09.40

                                    </div>

                                </div>


                                <span class="px-2 py-1
                                             rounded-md
                                             bg-emerald-100
                                             text-emerald-700
                                             text-[8px]
                                             font-bold
                                             shrink-0">

                                    Hadir

                                </span>

                            </div>


                            <button
                                onclick="openJournal(
                                    'Matematika',
                                    'XI TKI 1',
                                    'Arvia Rienetasary, S.Pd.',
                                    'Hadir',
                                    'Jurnal pembelajaran telah diisi oleh guru.'
                                )"
                                class="mt-2.5
                                       text-[9px]
                                       font-bold
                                       text-medium-green">

                                Lihat Detail →

                            </button>

                        </div>


                        <!-- JURNAL 3 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="pendidikan pancasila xi tki 1 wiwik yuniarsih">

                            <div class="flex items-start
                                        justify-between
                                        gap-3">

                                <div class="min-w-0">

                                    <p class="text-[10px]
                                              font-black
                                              text-dark-green">

                                        PENDIDIKAN PANCASILA

                                    </p>

                                    <p class="text-[10px]
                                              text-gray-500
                                              mt-0.5">

                                        Wiwik Yuniarsih, S.Pd.

                                    </p>

                                    <div class="mt-2
                                                text-[9px]
                                                text-gray-400">

                                        <i class="fa-regular fa-clock mr-1"></i>

                                        09.40 - 11.00

                                    </div>

                                </div>


                                <span class="px-2 py-1
                                             rounded-md
                                             bg-emerald-100
                                             text-emerald-700
                                             text-[8px]
                                             font-bold
                                             shrink-0">

                                    Hadir

                                </span>

                            </div>


                            <button
                                onclick="openJournal(
                                    'Pendidikan Pancasila',
                                    'XI TKI 1',
                                    'Wiwik Yuniarsih, S.Pd.',
                                    'Hadir',
                                    'Jurnal pembelajaran telah diisi oleh guru.'
                                )"
                                class="mt-2.5
                                       text-[9px]
                                       font-bold
                                       text-medium-green">

                                Lihat Detail →

                            </button>

                        </div>


                        <!-- JURNAL 4 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="sejarah xi tki 1 ista nofasari">

                            <div class="flex items-start
                                        justify-between
                                        gap-3">

                                <div class="min-w-0">

                                    <p class="text-[10px]
                                              font-black
                                              text-dark-green">

                                        SEJARAH

                                    </p>

                                    <p class="text-[10px]
                                              text-gray-500
                                              mt-0.5">

                                        Ista Nofasari, S.Pd.

                                    </p>

                                    <div class="mt-2
                                                text-[9px]
                                                text-gray-400">

                                        <i class="fa-regular fa-clock mr-1"></i>

                                        11.00 - 12.20

                                    </div>

                                </div>


                                <span class="px-2 py-1
                                             rounded-md
                                             bg-emerald-100
                                             text-emerald-700
                                             text-[8px]
                                             font-bold
                                             shrink-0">

                                    Hadir

                                </span>

                            </div>


                            <button
                                onclick="openJournal(
                                    'Sejarah',
                                    'XI TKI 1',
                                    'Ista Nofasari, S.Pd.',
                                    'Hadir',
                                    'Jurnal pembelajaran telah diisi oleh guru.'
                                )"
                                class="mt-2.5
                                       text-[9px]
                                       font-bold
                                       text-medium-green">

                                Lihat Detail →

                            </button>

                        </div>


                        <!-- JURNAL 5 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="bahasa jawa xi tki 1 yustin febrini">

                            <div class="flex items-start
                                        justify-between
                                        gap-3">

                                <div class="min-w-0">

                                    <p class="text-[10px]
                                              font-black
                                              text-dark-green">

                                        BAHASA JAWA

                                    </p>

                                    <p class="text-[10px]
                                              text-gray-500
                                              mt-0.5">

                                        Yustin Febrini, S.Pd.

                                    </p>

                                    <div class="mt-2
                                                text-[9px]
                                                text-gray-400">

                                        <i class="fa-regular fa-clock mr-1"></i>

                                        13.00 - 14.20

                                    </div>

                                </div>


                                <span class="px-2 py-1
                                             rounded-md
                                             bg-emerald-100
                                             text-emerald-700
                                             text-[8px]
                                             font-bold
                                             shrink-0">

                                    Hadir

                                </span>

                            </div>


                            <button
                                onclick="openJournal(
                                    'Bahasa Jawa',
                                    'XI TKI 1',
                                    'Yustin Febrini, S.Pd.',
                                    'Hadir',
                                    'Jurnal pembelajaran telah diisi oleh guru.'
                                )"
                                class="mt-2.5
                                       text-[9px]
                                       font-bold
                                       text-medium-green">

                                Lihat Detail →

                            </button>

                        </div>


                        <!-- JURNAL 6 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="informatika xi tki 1 lutfia marsalina">

                            <div class="flex items-start
                                        justify-between
                                        gap-3">

                                <div class="min-w-0">

                                    <p class="text-[10px]
                                              font-black
                                              text-dark-green">

                                        INFORMATIKA

                                    </p>

                                    <p class="text-[10px]
                                              text-gray-500
                                              mt-0.5">

                                        Lutfia Marsalina, S.Pd.I, M.Pd.

                                    </p>

                                    <div class="mt-2
                                                text-[9px]
                                                text-gray-400">

                                        <i class="fa-regular fa-clock mr-1"></i>

                                        14.20 - 15.40

                                    </div>

                                </div>


                                <span class="px-2 py-1
                                             rounded-md
                                             bg-emerald-100
                                             text-emerald-700
                                             text-[8px]
                                             font-bold
                                             shrink-0">

                                    Hadir

                                </span>

                            </div>


                            <button
                                onclick="openJournal(
                                    'Informatika',
                                    'XI TKI 1',
                                    'Lutfia Marsalina, S.Pd.I, M.Pd.',
                                    'Hadir',
                                    'Jurnal pembelajaran telah diisi oleh guru.'
                                )"
                                class="mt-2.5
                                       text-[9px]
                                       font-bold
                                       text-medium-green">

                                Lihat Detail →

                            </button>

                        </div>

                    </div>

                </article>


                <!-- ================================================= -->
                <!-- KELAS XI TKI 2 -->
                <!-- ================================================= -->

                <article
                    class="journal-card
                           bg-white
                           rounded-2xl
                           border border-rose-200
                           overflow-hidden
                           hover:shadow-md
                           transition"
                    data-class="XI TKI 2"
                    data-statuses="hadir tidak-hadir">


                    <!-- HEADER -->

                    <div class="p-4 pb-3">

                        <div class="flex items-start
                                    justify-between
                                    gap-3">

                            <div class="flex items-center gap-2">

                                <div class="w-9 h-9
                                            rounded-xl
                                            bg-rose-50
                                            text-rose-500
                                            flex items-center justify-center
                                            shrink-0">

                                    <i class="fa-solid fa-school"></i>

                                </div>


                                <div>

                                    <h3 class="text-sm
                                               font-black
                                               text-dark-green">

                                        XI TKI 2

                                    </h3>


                                    <p class="text-[10px]
                                              text-medium-green
                                              font-semibold">

                                        6 Jurnal Hari Ini

                                    </p>

                                </div>

                            </div>


                            <span class="shrink-0
                                         px-2.5 py-1
                                         rounded-full
                                         bg-rose-100
                                         text-rose-600
                                         text-[9px]
                                         font-black">

                                Perlu Tindakan

                            </span>

                        </div>

                    </div>


                    <!-- SCROLL AREA -->

                    <div class="journal-scroll
                                max-h-[360px]
                                overflow-y-auto
                                px-4
                                pb-4
                                space-y-2">


                        <!-- TIDAK HADIR -->

                        <div class="p-3
                                    rounded-xl
                                    bg-rose-50/50
                                    border border-rose-100
                                    journal-item"
                            data-status="tidak-hadir"
                            data-search="bahasa indonesia xi tki 2 yani">

                            <div class="flex items-start
                                        justify-between
                                        gap-3">

                                <div class="min-w-0">

                                    <p class="text-[10px]
                                              font-black
                                              text-dark-green">

                                        BAHASA INDONESIA

                                    </p>

                                    <p class="text-[10px]
                                              text-gray-500
                                              mt-0.5">

                                        Yani, S.Pd.

                                    </p>

                                    <div class="mt-2
                                                text-[9px]
                                                text-gray-400">

                                        <i class="fa-regular fa-clock mr-1"></i>

                                        07.00 - 08.20

                                    </div>

                                </div>


                                <span class="px-2 py-1
                                             rounded-md
                                             bg-rose-100
                                             text-rose-600
                                             text-[8px]
                                             font-bold
                                             shrink-0">

                                    Tidak Hadir

                                </span>

                            </div>


                            <div class="mt-2
                                        p-2
                                        rounded-lg
                                        bg-white
                                        border border-rose-100">

                                <p class="text-[9px]
                                          text-gray-500">

                                    Guru tidak hadir mengajar hari ini.

                                </p>

                            </div>


                            <div class="flex gap-2 mt-2.5">

                                <button
                                    onclick="openJournal(
                                        'Bahasa Indonesia',
                                        'XI TKI 2',
                                        'Yani, S.Pd.',
                                        'Tidak Hadir',
                                        'Guru tidak hadir mengajar hari ini.'
                                    )"
                                    class="flex-1
                                           text-[9px]
                                           font-bold
                                           text-medium-green
                                           bg-white
                                           border border-gray-200
                                           py-2
                                           rounded-lg
                                           hover:border-medium-green
                                           transition">

                                    Detail

                                </button>


                                <button
                                    onclick="openSendModal(
                                        'Bahasa Indonesia',
                                        'XI TKI 2',
                                        'Yani, S.Pd.'
                                    )"
                                    class="flex-1
                                           text-[9px]
                                           font-black
                                           text-white
                                           bg-dark-green
                                           py-2
                                           rounded-lg
                                           hover:bg-medium-green
                                           transition">

                                    <i class="fa-solid fa-paper-plane mr-1"></i>

                                    Kirim

                                </button>

                            </div>

                        </div>


                        <!-- HADIR -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="matematika xi tki 2 arvia rienetasary">

                            <div class="flex items-start
                                        justify-between
                                        gap-3">

                                <div>

                                    <p class="text-[10px]
                                              font-black
                                              text-dark-green">

                                        MATEMATIKA

                                    </p>

                                    <p class="text-[10px]
                                              text-gray-500
                                              mt-0.5">

                                        Arvia Rienetasary, S.Pd.

                                    </p>

                                    <div class="mt-2
                                                text-[9px]
                                                text-gray-400">

                                        <i class="fa-regular fa-clock mr-1"></i>

                                        08.20 - 09.40

                                    </div>

                                </div>


                                <span class="px-2 py-1
                                             rounded-md
                                             bg-emerald-100
                                             text-emerald-700
                                             text-[8px]
                                             font-bold">

                                    Hadir

                                </span>

                            </div>


                            <button
                                onclick="openJournal(
                                    'Matematika',
                                    'XI TKI 2',
                                    'Arvia Rienetasary, S.Pd.',
                                    'Hadir',
                                    'Jurnal pembelajaran telah diisi oleh guru.'
                                )"
                                class="mt-2.5
                                       text-[9px]
                                       font-bold
                                       text-medium-green">

                                Lihat Detail →

                            </button>

                        </div>


                        <!-- HADIR -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="pendidikan pancasila xi tki 2 wiwik yuniarsih">

                            <div class="flex items-start
                                        justify-between
                                        gap-3">

                                <div>

                                    <p class="text-[10px]
                                              font-black">

                                        PENDIDIKAN PANCASILA

                                    </p>

                                    <p class="text-[10px]
                                              text-gray-500 mt-0.5">

                                        Wiwik Yuniarsih, S.Pd.

                                    </p>

                                    <div class="mt-2
                                                text-[9px]
                                                text-gray-400">

                                        <i class="fa-regular fa-clock mr-1"></i>

                                        09.40 - 11.00

                                    </div>

                                </div>


                                <span class="px-2 py-1
                                             rounded-md
                                             bg-emerald-100
                                             text-emerald-700
                                             text-[8px]
                                             font-bold">

                                    Hadir

                                </span>

                            </div>

                        </div>


                        <!-- HADIR -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="dasar tki xi tki 2 sri kusumastuti">

                            <div class="flex items-start
                                        justify-between
                                        gap-3">

                                <div>

                                    <p class="text-[10px]
                                              font-black">

                                        DASAR TKI

                                    </p>

                                    <p class="text-[10px]
                                              text-gray-500 mt-0.5">

                                        Sri Kusumastuti, S.Pd.

                                    </p>

                                    <div class="mt-2
                                                text-[9px]
                                                text-gray-400">

                                        <i class="fa-regular fa-clock mr-1"></i>

                                        11.00 - 12.20

                                    </div>

                                </div>


                                <span class="px-2 py-1
                                             rounded-md
                                             bg-emerald-100
                                             text-emerald-700
                                             text-[8px]
                                             font-bold">

                                    Hadir

                                </span>

                            </div>

                        </div>


                        <!-- HADIR -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="sejarah xi tki 2 ista nofasari">

                            <div class="flex items-start
                                        justify-between
                                        gap-3">

                                <div>

                                    <p class="text-[10px]
                                              font-black">

                                        SEJARAH

                                    </p>

                                    <p class="text-[10px]
                                              text-gray-500 mt-0.5">

                                        Ista Nofasari, S.Pd.

                                    </p>

                                    <div class="mt-2
                                                text-[9px]
                                                text-gray-400">

                                        <i class="fa-regular fa-clock mr-1"></i>

                                        13.00 - 14.20

                                    </div>

                                </div>


                                <span class="px-2 py-1
                                             rounded-md
                                             bg-emerald-100
                                             text-emerald-700
                                             text-[8px]
                                             font-bold">

                                    Hadir

                                </span>

                            </div>

                        </div>


                        <!-- HADIR -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="bahasa jawa xi tki 2 yustin febrini">

                            <div class="flex items-start
                                        justify-between
                                        gap-3">

                                <div>

                                    <p class="text-[10px]
                                              font-black">

                                        BAHASA JAWA

                                    </p>

                                    <p class="text-[10px]
                                              text-gray-500 mt-0.5">

                                        Yustin Febrini, S.Pd.

                                    </p>

                                    <div class="mt-2
                                                text-[9px]
                                                text-gray-400">

                                        <i class="fa-regular fa-clock mr-1"></i>

                                        14.20 - 15.40

                                    </div>

                                </div>


                                <span class="px-2 py-1
                                             rounded-md
                                             bg-emerald-100
                                             text-emerald-700
                                             text-[8px]
                                             font-bold">

                                    Hadir

                                </span>

                            </div>

                        </div>

                    </div>

                </article>


                <!-- ================================================= -->
                <!-- KELAS X TKI 1 -->
                <!-- ================================================= -->

                <article
                    class="journal-card
                           bg-white
                           rounded-2xl
                           border border-emerald-100
                           overflow-hidden
                           hover:shadow-md
                           transition"
                    data-class="X TKI 1"
                    data-statuses="hadir">


                    <div class="p-4 pb-3">

                        <div class="flex items-start
                                    justify-between
                                    gap-3">

                            <div class="flex items-center gap-2">

                                <div class="w-9 h-9
                                            rounded-xl
                                            bg-emerald-50
                                            text-dark-green
                                            flex items-center justify-center">

                                    <i class="fa-solid fa-school"></i>

                                </div>


                                <div>

                                    <h3 class="text-sm font-black">
                                        X TKI 1
                                    </h3>

                                    <p class="text-[10px]
                                              text-medium-green
                                              font-semibold">

                                        6 Jurnal Hari Ini

                                    </p>

                                </div>

                            </div>


                            <span class="px-2.5 py-1
                                         rounded-full
                                         bg-emerald-100
                                         text-emerald-700
                                         text-[9px]
                                         font-black">

                                Lengkap

                            </span>

                        </div>

                    </div>


                    <!-- SCROLL -->

                    <div class="journal-scroll
                                max-h-[360px]
                                overflow-y-auto
                                px-4
                                pb-4
                                space-y-2">


                        <!-- 1 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="bahasa indonesia x tki 1 yani">

                            <div class="flex items-start justify-between gap-3">

                                <div>

                                    <p class="text-[10px] font-black">
                                        BAHASA INDONESIA
                                    </p>

                                    <p class="text-[10px] text-gray-500 mt-0.5">
                                        Yani, S.Pd.
                                    </p>

                                    <div class="mt-2 text-[9px] text-gray-400">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        07.00 - 08.20
                                    </div>

                                </div>

                                <span class="px-2 py-1 rounded-md
                                             bg-emerald-100 text-emerald-700
                                             text-[8px] font-bold">
                                    Hadir
                                </span>

                            </div>

                        </div>


                        <!-- 2 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="pjok x tki 1 ilham sungeidi">

                            <div class="flex items-start justify-between gap-3">

                                <div>

                                    <p class="text-[10px] font-black">
                                        PJOK
                                    </p>

                                    <p class="text-[10px] text-gray-500 mt-0.5">
                                        Ilham Sungeidi, S.Pd.
                                    </p>

                                    <div class="mt-2 text-[9px] text-gray-400">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        08.20 - 09.40
                                    </div>

                                </div>

                                <span class="px-2 py-1 rounded-md
                                             bg-emerald-100 text-emerald-700
                                             text-[8px] font-bold">
                                    Hadir
                                </span>

                            </div>

                        </div>


                        <!-- 3 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="bahasa inggris x tki 1 mutoatul khosiah">

                            <div class="flex items-start justify-between gap-3">

                                <div>

                                    <p class="text-[10px] font-black">
                                        BAHASA INGGRIS
                                    </p>

                                    <p class="text-[10px] text-gray-500 mt-0.5">
                                        Muto'atul Khosi'ah, S.Pd.
                                    </p>

                                    <div class="mt-2 text-[9px] text-gray-400">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        09.40 - 11.00
                                    </div>

                                </div>

                                <span class="px-2 py-1 rounded-md
                                             bg-emerald-100 text-emerald-700
                                             text-[8px] font-bold">
                                    Hadir
                                </span>

                            </div>

                        </div>


                        <!-- 4 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="bahasa jawa x tki 1 yustin febrini">

                            <div class="flex items-start justify-between gap-3">

                                <div>

                                    <p class="text-[10px] font-black">
                                        BAHASA JAWA
                                    </p>

                                    <p class="text-[10px] text-gray-500 mt-0.5">
                                        Yustin Febrini, S.Pd.
                                    </p>

                                    <div class="mt-2 text-[9px] text-gray-400">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        11.00 - 12.20
                                    </div>

                                </div>

                                <span class="px-2 py-1 rounded-md
                                             bg-emerald-100 text-emerald-700
                                             text-[8px] font-bold">
                                    Hadir
                                </span>

                            </div>

                        </div>


                        <!-- 5 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="seni budaya x tki 1 anang prasetyo">

                            <div class="flex items-start justify-between gap-3">

                                <div>

                                    <p class="text-[10px] font-black">
                                        SENI BUDAYA
                                    </p>

                                    <p class="text-[10px] text-gray-500 mt-0.5">
                                        Anang Prasetyo, S.Pd.
                                    </p>

                                    <div class="mt-2 text-[9px] text-gray-400">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        13.00 - 14.20
                                    </div>

                                </div>

                                <span class="px-2 py-1 rounded-md
                                             bg-emerald-100 text-emerald-700
                                             text-[8px] font-bold">
                                    Hadir
                                </span>

                            </div>

                        </div>


                        <!-- 6 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="ipas x tki 1 khuriyatul kamila">

                            <div class="flex items-start justify-between gap-3">

                                <div>

                                    <p class="text-[10px] font-black">
                                        IPAS
                                    </p>

                                    <p class="text-[10px] text-gray-500 mt-0.5">
                                        Khuriyatul Kamila, S.Si.
                                    </p>

                                    <div class="mt-2 text-[9px] text-gray-400">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        14.20 - 15.40
                                    </div>

                                </div>

                                <span class="px-2 py-1 rounded-md
                                             bg-emerald-100 text-emerald-700
                                             text-[8px] font-bold">
                                    Hadir
                                </span>

                            </div>

                        </div>

                    </div>

                </article>


                <!-- ================================================= -->
                <!-- KELAS X TKI 2 -->
                <!-- ================================================= -->

                <article
                    class="journal-card
                           bg-white
                           rounded-2xl
                           border border-emerald-100
                           overflow-hidden
                           hover:shadow-md
                           transition"
                    data-class="X TKI 2"
                    data-statuses="hadir">


                    <div class="p-4 pb-3">

                        <div class="flex items-start
                                    justify-between
                                    gap-3">

                            <div class="flex items-center gap-2">

                                <div class="w-9 h-9
                                            rounded-xl
                                            bg-emerald-50
                                            text-dark-green
                                            flex items-center justify-center">

                                    <i class="fa-solid fa-school"></i>

                                </div>


                                <div>

                                    <h3 class="text-sm font-black">
                                        X TKI 2
                                    </h3>

                                    <p class="text-[10px]
                                              text-medium-green
                                              font-semibold">

                                        6 Jurnal Hari Ini

                                    </p>

                                </div>

                            </div>


                            <span class="px-2.5 py-1
                                         rounded-full
                                         bg-emerald-100
                                         text-emerald-700
                                         text-[9px]
                                         font-black">

                                Lengkap

                            </span>

                        </div>

                    </div>


                    <!-- SCROLL -->

                    <div class="journal-scroll
                                max-h-[360px]
                                overflow-y-auto
                                px-4
                                pb-4
                                space-y-2">


                        <!-- 1 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="bahasa indonesia x tki 2 yani">

                            <div class="flex items-start justify-between gap-3">

                                <div>

                                    <p class="text-[10px] font-black">
                                        BAHASA INDONESIA
                                    </p>

                                    <p class="text-[10px] text-gray-500 mt-0.5">
                                        Yani, S.Pd.
                                    </p>

                                    <div class="mt-2 text-[9px] text-gray-400">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        07.00 - 08.20
                                    </div>

                                </div>

                                <span class="px-2 py-1 rounded-md
                                             bg-emerald-100 text-emerald-700
                                             text-[8px] font-bold">
                                    Hadir
                                </span>

                            </div>

                        </div>


                        <!-- 2 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="matematika x tki 2 arvia rienetasary">

                            <div class="flex items-start justify-between gap-3">

                                <div>

                                    <p class="text-[10px] font-black">
                                        MATEMATIKA
                                    </p>

                                    <p class="text-[10px] text-gray-500 mt-0.5">
                                        Arvia Rienetasary, S.Pd.
                                    </p>

                                    <div class="mt-2 text-[9px] text-gray-400">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        08.20 - 09.40
                                    </div>

                                </div>

                                <span class="px-2 py-1 rounded-md
                                             bg-emerald-100 text-emerald-700
                                             text-[8px] font-bold">
                                    Hadir
                                </span>

                            </div>

                        </div>


                        <!-- 3 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="pendidikan pancasila x tki 2 wiwik yuniarsih">

                            <div class="flex items-start justify-between gap-3">

                                <div>

                                    <p class="text-[10px] font-black">
                                        PENDIDIKAN PANCASILA
                                    </p>

                                    <p class="text-[10px] text-gray-500 mt-0.5">
                                        Wiwik Yuniarsih, S.Pd.
                                    </p>

                                    <div class="mt-2 text-[9px] text-gray-400">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        09.40 - 11.00
                                    </div>

                                </div>

                                <span class="px-2 py-1 rounded-md
                                             bg-emerald-100 text-emerald-700
                                             text-[8px] font-bold">
                                    Hadir
                                </span>

                            </div>

                        </div>


                        <!-- 4 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="dasar tki x tki 2 sri kusumastuti">

                            <div class="flex items-start justify-between gap-3">

                                <div>

                                    <p class="text-[10px] font-black">
                                        DASAR TKI
                                    </p>

                                    <p class="text-[10px] text-gray-500 mt-0.5">
                                        Sri Kusumastuti, S.Pd.
                                    </p>

                                    <div class="mt-2 text-[9px] text-gray-400">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        11.00 - 12.20
                                    </div>

                                </div>

                                <span class="px-2 py-1 rounded-md
                                             bg-emerald-100 text-emerald-700
                                             text-[8px] font-bold">
                                    Hadir
                                </span>

                            </div>

                        </div>


                        <!-- 5 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="sejarah x tki 2 ista nofasari">

                            <div class="flex items-start justify-between gap-3">

                                <div>

                                    <p class="text-[10px] font-black">
                                        SEJARAH
                                    </p>

                                    <p class="text-[10px] text-gray-500 mt-0.5">
                                        Ista Nofasari, S.Pd.
                                    </p>

                                    <div class="mt-2 text-[9px] text-gray-400">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        13.00 - 14.20
                                    </div>

                                </div>

                                <span class="px-2 py-1 rounded-md
                                             bg-emerald-100 text-emerald-700
                                             text-[8px] font-bold">
                                    Hadir
                                </span>

                            </div>

                        </div>


                        <!-- 6 -->

                        <div class="p-3
                                    rounded-xl
                                    bg-gray-50
                                    border border-gray-100
                                    journal-item"
                            data-status="hadir"
                            data-search="koding kecerdasan artifisial x tki 2 endang ary handayani">

                            <div class="flex items-start justify-between gap-3">

                                <div>

                                    <p class="text-[10px] font-black">
                                        KODING DAN KECERDASAN ARTIFISIAL
                                    </p>

                                    <p class="text-[10px] text-gray-500 mt-0.5">
                                        Endang Ary Handayani, S.T., M.Pd.
                                    </p>

                                    <div class="mt-2 text-[9px] text-gray-400">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        14.20 - 15.40
                                    </div>

                                </div>

                                <span class="px-2 py-1 rounded-md
                                             bg-emerald-100 text-emerald-700
                                             text-[8px] font-bold">
                                    Hadir
                                </span>

                            </div>

                        </div>

                    </div>

                </article>


            </div>


            <!-- EMPTY -->

            <div id="emptyState"
                class="hidden
                       bg-white
                       rounded-2xl
                       border border-gray-100
                       p-10
                       text-center
                       mt-3">

                <div class="w-12 h-12
                            rounded-full
                            bg-gray-100
                            text-gray-400
                            flex items-center justify-center
                            mx-auto mb-3">

                    <i class="fa-solid fa-magnifying-glass"></i>

                </div>


                <p class="text-xs
                          font-bold
                          text-gray-500">

                    Jurnal tidak ditemukan.

                </p>

            </div>

        </section>

    </main>


    <!-- ========================================================= -->
    <!-- MODAL DETAIL JURNAL -->
    <!-- ========================================================= -->

    <div id="journalModal"
        class="fixed inset-0
               bg-dark-green/60
               z-[60]
               hidden
               items-center justify-center
               p-4
               backdrop-blur-sm">

        <div class="bg-white
                    rounded-2xl
                    w-full
                    max-w-lg
                    max-h-[85vh]
                    overflow-y-auto
                    shadow-2xl">

            <div class="p-5">

                <div class="flex items-start
                            justify-between
                            gap-3
                            pb-4
                            border-b border-gray-100">

                    <div>

                        <span class="text-[9px]
                                     uppercase
                                     tracking-wider
                                     font-black
                                     text-medium-green">

                            Detail Jurnal

                        </span>


                        <h2 id="modalMapel"
                            class="text-lg
                                   font-black
                                   text-dark-green
                                   mt-1">

                            -

                        </h2>


                        <p id="modalKelas"
                            class="text-xs
                                  text-medium-green
                                  font-semibold">

                            -

                        </p>

                    </div>


                    <button onclick="closeModal('journalModal')"
                        class="w-8 h-8
                               rounded-full
                               bg-emerald-50
                               text-dark-green
                               flex items-center justify-center
                               hover:bg-mint-green
                               transition">

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>


                <div class="space-y-3 mt-4">


                    <!-- GURU -->

                    <div class="p-3
                                rounded-xl
                                bg-gray-50">

                        <p class="text-[9px]
                                  text-gray-400
                                  font-bold
                                  uppercase">

                            Guru

                        </p>


                        <p id="modalGuru"
                            class="text-xs
                                  font-bold
                                  text-dark-green
                                  mt-1">

                            -

                        </p>

                    </div>


                    <!-- STATUS -->

                    <div class="p-3
                                rounded-xl
                                bg-gray-50">

                        <p class="text-[9px]
                                  text-gray-400
                                  font-bold
                                  uppercase">

                            Status Kehadiran

                        </p>


                        <p id="modalStatus"
                            class="text-xs
                                  font-black
                                  text-dark-green
                                  mt-1">

                            -

                        </p>

                    </div>


                    <!-- KETERANGAN -->

                    <div class="p-3
                                rounded-xl
                                bg-gray-50">

                        <p class="text-[9px]
                                  text-gray-400
                                  font-bold
                                  uppercase">

                            Keterangan

                        </p>


                        <p id="modalKeterangan"
                            class="text-xs
                                  text-gray-600
                                  leading-relaxed
                                  mt-1">

                            -

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- ========================================================= -->
    <!-- MODAL KIRIM KE SEKRE -->
    <!-- ========================================================= -->

    <div id="sendModal"
        class="fixed inset-0
               bg-dark-green/60
               z-[70]
               hidden
               items-center justify-center
               p-4
               backdrop-blur-sm">

        <div class="bg-white
                    rounded-2xl
                    w-full
                    max-w-md
                    shadow-2xl">

            <div class="p-5">

                <div class="flex items-start
                            justify-between
                            gap-3">

                    <div>

                        <div class="w-10 h-10
                                    rounded-xl
                                    bg-emerald-50
                                    text-dark-green
                                    flex items-center justify-center
                                    mb-3">

                            <i class="fa-solid fa-paper-plane"></i>

                        </div>


                        <h2 class="text-base
                                   font-black
                                   text-dark-green">

                            Kirim ke Sekre?

                        </h2>


                        <p class="text-[10px]
                                  text-gray-400
                                  mt-1">

                            Jurnal guru yang tidak hadir akan
                            diteruskan kepada Sekretaris.

                        </p>

                    </div>


                    <button onclick="closeModal('sendModal')"
                        class="w-8 h-8
                               rounded-full
                               bg-gray-100
                               text-gray-500
                               flex items-center justify-center">

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>


                <!-- DATA JURNAL -->

                <div class="mt-4
                            p-3
                            rounded-xl
                            bg-gray-50
                            border border-gray-100">

                    <p id="sendMapel"
                        class="text-xs
                              font-black
                              text-dark-green">

                        -

                    </p>


                    <p id="sendKelas"
                        class="text-[10px]
                              text-medium-green
                              font-semibold
                              mt-0.5">

                        -

                    </p>


                    <p id="sendGuru"
                        class="text-[10px]
                              text-gray-500
                              mt-2">

                        -

                    </p>

                </div>


                <!-- BUTTON -->

                <div class="flex gap-2 mt-5">

                    <button onclick="closeModal('sendModal')"
                        class="flex-1
                               py-2.5
                               rounded-xl
                               bg-gray-100
                               text-gray-600
                               text-xs
                               font-bold">

                        Batal

                    </button>


                    <button onclick="sendToSekre()"
                        class="flex-1
                               py-2.5
                               rounded-xl
                               bg-dark-green
                               hover:bg-medium-green
                               text-white
                               text-xs
                               font-black
                               transition">

                        <i class="fa-solid fa-paper-plane mr-1"></i>

                        Kirim

                    </button>

                </div>

            </div>

        </div>

    </div>


    <!-- ========================================================= -->
    <!-- TOAST -->
    <!-- ========================================================= -->

    <div id="toast"
        class="fixed
               bottom-5
               left-1/2
               -translate-x-1/2
               z-[100]
               hidden">

        <div class="bg-dark-green
                    text-white
                    px-4 py-3
                    rounded-xl
                    shadow-xl
                    flex items-center gap-2">

            <i class="fa-solid fa-circle-check
                      text-mint-green">
            </i>


            <span id="toastText"
                class="text-xs font-bold">

                Berhasil dikirim.

            </span>

        </div>

    </div>

    <!-- POPUP DETAIL JURNAL -->
<div
    id="jurnalDetailModal"
    class="fixed inset-0 z-[999] hidden items-center justify-center bg-black/50 px-4 py-6"
    onclick="closeJurnalDetail(event)"
>
    <div
        class="w-full max-w-2xl max-h-[90vh] overflow-y-auto rounded-3xl bg-white shadow-2xl"
        onclick="event.stopPropagation()"
    >

        <!-- Header -->
        <div class="sticky top-0 z-10 flex items-center justify-between border-b border-gray-100 bg-white px-6 py-5">
            <div>
                <h2 class="text-xl font-bold text-[#1A312C]">
                    Detail Jurnal
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Jurnal yang diinput oleh guru
                </p>
            </div>

            <button
                type="button"
                onclick="closeJurnalDetail()"
                class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- Isi -->
        <div class="space-y-5 p-6">

            <!-- Informasi Jurnal -->
            <div class="rounded-2xl bg-[#F8FAF9] p-5">
                <h3 class="mb-4 font-bold text-[#1A312C]">
                    Informasi Jurnal
                </h3>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                    <div>
                        <p class="text-xs text-gray-500">Tanggal</p>
                        <p id="detailTanggal" class="mt-1 font-semibold text-gray-800">
                            -
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500">Jam</p>
                        <p id="detailJam" class="mt-1 font-semibold text-gray-800">
                            -
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500">Kelas</p>
                        <p id="detailKelas" class="mt-1 font-semibold text-gray-800">
                            -
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500">Mata Pelajaran</p>
                        <p id="detailMapel" class="mt-1 font-semibold text-gray-800">
                            -
                        </p>
                    </div>

                </div>
            </div>

            <!-- Kehadiran Guru -->
            <div>
                <p class="mb-2 text-sm font-semibold text-gray-600">
                    Kehadiran Guru
                </p>

                <div class="rounded-2xl border border-gray-100 bg-white p-4">
                    <p id="detailStatus" class="font-semibold text-[#428475]">
                        -
                    </p>
                </div>
            </div>

            <!-- Materi -->
            <div id="detailMateriBox">
                <p class="mb-2 text-sm font-semibold text-gray-600">
                    Materi
                </p>

                <div class="rounded-2xl bg-[#FFF4E1] p-4">
                    <p id="detailMateri" class="text-sm leading-6 text-gray-700">
                        -
                    </p>
                </div>
            </div>

            <!-- Keterangan -->
            <div id="detailKeteranganBox">
                <p class="mb-2 text-sm font-semibold text-gray-600">
                    Keterangan / Aktivitas
                </p>

                <div class="rounded-2xl bg-gray-50 p-4">
                    <p id="detailKeterangan" class="text-sm leading-6 text-gray-700">
                        -
                    </p>
                </div>
            </div>

            <!-- Instruksi Tugas -->
            <div id="detailInstruksiBox" class="hidden">
                <p class="mb-2 text-sm font-semibold text-gray-600">
                    Instruksi Tugas
                </p>

                <div class="rounded-2xl bg-[#FFF4E1] p-4">
                    <p id="detailInstruksi" class="text-sm leading-6 text-gray-700">
                        -
                    </p>
                </div>
            </div>

            <!-- Alasan -->
            <div id="detailAlasanBox" class="hidden">
                <p class="mb-2 text-sm font-semibold text-gray-600">
                    Alasan Tidak Hadir
                </p>

                <div class="rounded-2xl bg-gray-50 p-4">
                    <p id="detailAlasan" class="text-sm leading-6 text-gray-700">
                        -
                    </p>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="border-t border-gray-100 px-6 py-4">
            <button
                type="button"
                onclick="closeJurnalDetail()"
                class="w-full rounded-2xl bg-[#1A312C] py-3 font-semibold text-white transition hover:opacity-90"
            >
                Tutup
            </button>
        </div>

    </div>
</div>


    <!-- ========================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ========================================================= -->

    <script>

        // ========================================================
        // SIDEBAR MOBILE
        // ========================================================

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


        // ========================================================
        // DETAIL JOURNAL
        // ========================================================

        function openJournal(
            mapel,
            kelas,
            guru,
            status,
            keterangan
        ) {

            document.getElementById('modalMapel').textContent =
                mapel;

            document.getElementById('modalKelas').textContent =
                kelas;

            document.getElementById('modalGuru').textContent =
                guru;

            document.getElementById('modalStatus').textContent =
                status;

            document.getElementById('modalKeterangan').textContent =
                keterangan;


            const modal =
                document.getElementById('journalModal');

            modal.classList.remove('hidden');

            modal.classList.add('flex');

        }


        // ========================================================
        // SEND MODAL
        // ========================================================

        let selectedJournal = {};


        function openSendModal(
            mapel,
            kelas,
            guru
        ) {

            selectedJournal = {
                mapel: mapel,
                kelas: kelas,
                guru: guru
            };


            document.getElementById('sendMapel').textContent =
                mapel;

            document.getElementById('sendKelas').textContent =
                kelas;

            document.getElementById('sendGuru').textContent =
                guru;


            const modal =
                document.getElementById('sendModal');

            modal.classList.remove('hidden');

            modal.classList.add('flex');

        }


        // ========================================================
        // KIRIM KE SEKRE
        // ========================================================

        function sendToSekre() {

            closeModal('sendModal');

            showToast(
                'Jurnal berhasil diteruskan ke Sekre.'
            );

        }


        // ========================================================
        // CLOSE MODAL
        // ========================================================

        function closeModal(id) {

            const modal =
                document.getElementById(id);

            modal.classList.add('hidden');

            modal.classList.remove('flex');

        }


        // CLOSE DETAIL MODAL

        document
            .getElementById('journalModal')
            .addEventListener('click', function(event) {

                if (event.target === this) {

                    closeModal('journalModal');

                }

            });


        // CLOSE SEND MODAL

        document
            .getElementById('sendModal')
            .addEventListener('click', function(event) {

                if (event.target === this) {

                    closeModal('sendModal');

                }

            });


        // ========================================================
        // SEARCH + FILTER
        // ========================================================

        const searchInput =
            document.getElementById('searchInput');

        const statusFilter =
            document.getElementById('statusFilter');

        const cards =
            document.querySelectorAll('.journal-card');

        const emptyState =
            document.getElementById('emptyState');


        function filterJournals() {

            const search =
                searchInput.value
                    .toLowerCase()
                    .trim();

            const status =
                statusFilter.value;

            let visibleCards = 0;


            cards.forEach(card => {

                const className =
                    card.dataset.class
                        .toLowerCase();


                const statuses =
                    card.dataset.statuses
                        .toLowerCase()
                        .split(' ');


                /*
                 * Cari berdasarkan kelas,
                 * mapel, atau guru.
                 */

                const items =
                    card.querySelectorAll('.journal-item');


                let cardHasSearchMatch = false;

                let cardHasStatusMatch = false;


                items.forEach(item => {

                    const itemSearch =
                        item.dataset.search
                            .toLowerCase();

                    const itemStatus =
                        item.dataset.status;


                    const matchSearch =
                        search === '' ||
                        className.includes(search) ||
                        itemSearch.includes(search);


                    const matchStatus =
                        status === 'semua' ||
                        itemStatus === status;


                    if (
                        matchSearch &&
                        matchStatus
                    ) {

                        item.classList.remove('hidden');

                        cardHasSearchMatch = true;

                        cardHasStatusMatch = true;

                    } else {

                        item.classList.add('hidden');

                    }

                });


                /*
                 * Card tetap tampil jika
                 * minimal satu jurnal cocok.
                 */

                if (
                    cardHasSearchMatch &&
                    cardHasStatusMatch
                ) {

                    card.classList.remove('hidden');

                    visibleCards++;

                } else {

                    card.classList.add('hidden');

                }

            });


            if (visibleCards === 0) {

                emptyState.classList.remove('hidden');

            } else {

                emptyState.classList.add('hidden');

            }

        }


        searchInput.addEventListener(
            'input',
            filterJournals
        );


        statusFilter.addEventListener(
            'change',
            filterJournals
        );


        // ========================================================
        // TOAST
        // ========================================================

        let toastTimer;


        function showToast(message) {

            const toast =
                document.getElementById('toast');

            const toastText =
                document.getElementById('toastText');


            toastText.textContent =
                message;

            toast.classList.remove('hidden');


            clearTimeout(toastTimer);


            toastTimer = setTimeout(() => {

                toast.classList.add('hidden');

            }, 2500);

        }
function openJurnalDetail(button) {
    const modal = document.getElementById('jurnalDetailModal');

    document.getElementById('detailTanggal').textContent =
        button.dataset.tanggal || '-';

    document.getElementById('detailJam').textContent =
        button.dataset.jam || '-';

    document.getElementById('detailKelas').textContent =
        button.dataset.kelas || '-';

    document.getElementById('detailMapel').textContent =
        button.dataset.mapel || '-';

    document.getElementById('detailStatus').textContent =
        button.dataset.status || '-';

    document.getElementById('detailMateri').textContent =
        button.dataset.materi || '-';

    document.getElementById('detailKeterangan').textContent =
        button.dataset.keterangan || '-';

    document.getElementById('detailInstruksi').textContent =
        button.dataset.instruksi || '-';

    document.getElementById('detailAlasan').textContent =
        button.dataset.alasan || '-';

    // Reset tampilan
    document.getElementById('detailMateriBox').classList.remove('hidden');
    document.getElementById('detailKeteranganBox').classList.remove('hidden');
    document.getElementById('detailInstruksiBox').classList.add('hidden');
    document.getElementById('detailAlasanBox').classList.add('hidden');

    // Sesuaikan dengan status guru
    const status = button.dataset.status || '';

    if (status.includes('Memberikan Tugas')) {
        document.getElementById('detailMateriBox').classList.add('hidden');
        document.getElementById('detailInstruksiBox').classList.remove('hidden');
    }

    if (status.includes('Perlu Penanganan')) {
        document.getElementById('detailMateriBox').classList.add('hidden');
        document.getElementById('detailKeteranganBox').classList.add('hidden');
        document.getElementById('detailAlasanBox').classList.remove('hidden');
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');

    document.body.classList.add('overflow-hidden');
}

function closeJurnalDetail(event = null) {
    if (event && event.target !== event.currentTarget) {
        return;
    }

    const modal = document.getElementById('jurnalDetailModal');

    modal.classList.add('hidden');
    modal.classList.remove('flex');

    document.body.classList.remove('overflow-hidden');
}

    </script>

    

</body>

</html>