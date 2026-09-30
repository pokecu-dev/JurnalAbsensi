<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Jadwal</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >

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
        * {
            -webkit-tap-highlight-color: transparent;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            overflow-x: hidden;
        }

        .search-dropdown {
            scrollbar-width: thin;
        }

        .search-result {
            transition: background-color .15s ease;
        }

        .search-result:hover {
            background: rgba(137, 215, 183, .12);
        }

        .search-result:active {
            background: rgba(137, 215, 183, .2);
        }

        .schedule-scroll {
            scrollbar-width: thin;
        }

        .schedule-scroll::-webkit-scrollbar,
        .search-dropdown::-webkit-scrollbar {
            height: 5px;
            width: 5px;
        }

        .schedule-scroll::-webkit-scrollbar-thumb,
        .search-dropdown::-webkit-scrollbar-thumb {
            background: rgba(66, 132, 117, .3);
            border-radius: 999px;
        }

        .schedule-tab {
            transition: all .2s ease;
        }

        .mobile-sidebar {
            transition: transform .25s ease;
        }

        .mobile-overlay {
            transition: opacity .2s ease;
        }

        #scrollIndicator {
            transition: top 0.15s ease-out;
        }

        select,
        input,
        button {
            font-family: inherit;
        }

        @media (max-width: 639px) {
            input,
            select {
                font-size: 16px !important;
            }
        }
    </style>
</head>


<body class="bg-bg-cream text-dark-green font-sans min-h-screen">


    <!-- =========================================================
         MOBILE HEADER
    ========================================================== -->

    <header
        class="md:hidden fixed top-0 left-0 right-0 z-40 h-16 bg-dark-green text-white shadow-lg"
    >

        <div class="h-full px-4 flex items-center justify-between">

            <div class="flex items-center gap-3 min-w-0">

                <img
                    src="{{ asset('image/logo.png') }}"
                    alt="Logo"
                    class="w-9 h-9 object-contain shrink-0"
                >

                <div class="min-w-0">
                    <h1 class="font-bold text-sm leading-tight">
                        Jurnal Absensi
                    </h1>

                    <p class="text-[10px] text-white/60">
                        Admin
                    </p>
                </div>

            </div>


            <button
                id="mobileMenuButton"
                type="button"
                class="w-10 h-10 rounded-xl flex items-center justify-center hover:bg-white/10 active:bg-white/20"
                aria-label="Buka menu"
            >
                <i class="fa-solid fa-bars text-lg"></i>
            </button>

        </div>

    </header>



    <!-- =========================================================
         MOBILE OVERLAY
    ========================================================== -->

    <div
        id="mobileOverlay"
        class="md:hidden fixed inset-0 z-40 bg-black/50 hidden"
    ></div>



    <!-- =========================================================
         MOBILE SIDEBAR
    ========================================================== -->

    <!-- MOBILE SIDEBAR (disamakan dengan Dashboard Admin) -->
    <aside id="mobileSidebar" class="fixed left-0 top-0 bottom-0 z-50 w-64 bg-dark-green text-white p-6 -translate-x-full transition-transform duration-200 md:hidden flex flex-col justify-between">

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
                    <div class="text-[10px] uppercase font-extrabold text-gray-400 tracking-wider mb-2 px-2">
                        Utama
                    </div>

                    <div class="space-y-1">

                        <a href="{{ url('/admin/dashboard') }}"
                           class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-house w-4 text-center"></i>
                            Dashboard
                        </a>

                        <a href="{{ url('/admin/monitoring_jurnal') }}"
                           class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-book-bookmark w-4 text-center"></i>
                            Monitoring Jurnal
                        </a>

                        <a href="{{ url('/admin/data_dispensasi') }}"
                           class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-file-signature w-4 text-center"></i>
                            Dispensasi
                        </a>

                    </div>
                </div>

                <!-- DATA MASTER -->
                <div>
                    <div class="text-[10px] uppercase font-extrabold text-gray-400 tracking-wider mb-2 px-2">
                        Data Master
                    </div>

                    <div class="space-y-1">

                        <a href="{{ url('/admin/data_guru') }}"
                           class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-chalkboard-user w-4 text-center"></i>
                            Data Guru
                        </a>

                        <a href="{{ url('/admin/data_siswa') }}"
                           class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-user-graduate w-4 text-center"></i>
                            Data Siswa
                        </a>

                        <a href="{{ url('/admin/data_kelas') }}"
                           class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-school w-4 text-center"></i>
                            Data Kelas
                        </a>
                        <!-- DATA MATA PELAJARAN -->
                         <a href="{{ route('admin.data_mapel.index') }}" 
                             class="flex items-center gap-3
                                  px-4 py-3
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-mint-green
                                  rounded-xl
                                  transition
                                  active:scale-[0.98]">
                            <i class="fa-solid fa-book-open w-4 text-center"></i> Data Mata Pelajaran
                         </a>

                        <a href="{{ url('/admin/jadwal') }}"
                           class="flex items-center gap-3 px-4 py-3 bg-white/10 text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-calendar-days w-4 text-center"></i>
                            Jadwal
                        </a>

                    </div>
                </div>

            </nav>

        </div>

        <!-- FOOTER SIDEBAR -->
        <div class="flex flex-col gap-1 pt-3 border-t border-white/10 text-xs">

            <a href="{{ url('/admin/akun') }}"
               class="flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                <i class="fa-solid fa-user-circle w-4"></i>
                <span>Akun Admin</span>
            </a>

            <a href="{{ route('logout') }}"
               class="w-full flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                <i class="fa-solid fa-right-from-bracket w-4"></i>
                <span>Logout</span>
            </a>

        </div>

    </aside>



    <!-- =========================================================
         DESKTOP SIDEBAR
    ========================================================== -->

    <aside
        class="hidden md:flex fixed top-0 left-0 bottom-0 z-30 w-56 bg-dark-green text-white flex-col"
    >

        <div class="px-4 pt-6 pb-4">

            <div class="flex flex-col items-center text-center">

                <img
                    src="{{ asset('image/logo.png') }}"
                    alt="Logo"
                    class="w-14 h-14 object-contain mb-2"
                >

                <h2 class="font-bold text-sm">
                    Jurnal Absensi
                </h2>

                <p class="text-[10px] text-white/45 mt-0.5">
                    Panel Admin
                </p>

            </div>

        </div>


        <nav class="flex-1 overflow-y-auto px-3 pb-4 space-y-1">

            <a
                href="{{ url('/admin/dashboard') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-white/70 hover:bg-white/10 hover:text-white transition"
            >
                <i class="fa-solid fa-house w-5 text-center"></i>
                <span>Dashboard</span>
            </a>


            <p class="px-3 pt-5 pb-2 text-[9px] uppercase tracking-wider font-bold text-white/30">
                Jurnal
            </p>


            <a
                href="{{ url('/admin/monitoring-jurnal') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-white/70 hover:bg-white/10 hover:text-white transition"
            >
                <i class="fa-solid fa-book-open w-5 text-center"></i>
                <span>Monitoring Jurnal</span>
            </a>


            <a
                href="{{ url('/admin/dispen') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-white/70 hover:bg-white/10 hover:text-white transition"
            >
                <i class="fa-solid fa-file-circle-check w-5 text-center"></i>
                <span>Pengajuan Dispen</span>
            </a>


            <p class="px-3 pt-5 pb-2 text-[9px] uppercase tracking-wider font-bold text-white/30">
                Data Master
            </p>


            <a
                href="{{ url('/admin/guru') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-white/70 hover:bg-white/10 hover:text-white transition"
            >
                <i class="fa-solid fa-chalkboard-user w-5 text-center"></i>
                <span>Data Guru</span>
            </a>


            <a
                href="{{ url('/admin/siswa') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-white/70 hover:bg-white/10 hover:text-white transition"
            >
                <i class="fa-solid fa-user-graduate w-5 text-center"></i>
                <span>Data Siswa</span>
            </a>


            <a
                href="{{ url('/admin/kelas') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-white/70 hover:bg-white/10 hover:text-white transition"
            >
                <i class="fa-solid fa-users w-5 text-center"></i>
                <span>Data Kelas</span>
            </a>


            <a
                href="{{ url('/admin/mapel') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-white/70 hover:bg-white/10 hover:text-white transition"
            >
                <i class="fa-solid fa-book w-5 text-center"></i>
                <span>Data Mapel</span>
            </a>


            <a
                href="{{ url('/admin/jadwal') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-white/10 text-mint-green font-semibold text-sm"
            >
                <i class="fa-solid fa-calendar-days w-5 text-center"></i>
                <span>Jadwal</span>
            </a>


            <p class="px-3 pt-5 pb-2 text-[9px] uppercase tracking-wider font-bold text-white/30">
                Lainnya
            </p>


            <a
                href="{{ url('/admin/akun') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-white/70 hover:bg-white/10 hover:text-white transition"
            >
                <i class="fa-solid fa-user-gear w-5 text-center"></i>
                <span>Pengaturan Akun</span>
            </a>

        </nav>


        <div class="px-4 py-4 border-t border-white/10">

            <div class="flex items-center gap-3">

                <div class="w-9 h-9 rounded-xl bg-mint-green/15 flex items-center justify-center">
                    <i class="fa-solid fa-user-shield text-mint-green text-sm"></i>
                </div>

                <div class="min-w-0">
                    <p class="text-xs font-semibold truncate">
                        Admin
                    </p>

                    <p class="text-[10px] text-white/40">
                        Administrator
                    </p>
                </div>

            </div>

        </div>

    </aside>



    <!-- =========================================================
         MAIN
    ========================================================== -->

    <main class="flex-1 md:ml-56 pt-16 md:pt-0 min-w-0">

        <div class="p-4 sm:p-6 lg:p-8 max-w-[1600px] mx-auto">


            <!-- PAGE HEADER -->

            <div class="mb-5 sm:mb-6">

                <div class="flex items-start justify-between gap-4">

                    <div class="min-w-0">

                        <div class="flex items-center gap-2 mb-1">

                            <span class="text-[10px] sm:text-xs font-semibold text-medium-green uppercase tracking-wide">
                                Data Master
                            </span>

                        </div>

                        <h1 class="text-xl sm:text-2xl font-bold text-dark-green">
                            Jadwal
                        </h1>

                        <p class="text-xs sm:text-sm text-dark-green/55 mt-1 max-w-2xl">
                            Kelola jadwal mengajar guru dan jadwal piket sekolah.
                        </p>

                    </div>


                    <div class="hidden sm:flex w-11 h-11 rounded-2xl bg-dark-green text-mint-green items-center justify-center shrink-0">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>

                </div>

            </div>



            <!-- =================================================
                 PERIODE
            ================================================== -->

            <div class="bg-white rounded-2xl border border-emerald-100 shadow-sm p-4 sm:p-5 mb-4">

                <div class="flex items-center gap-3 mb-4">

                    <div class="w-9 h-9 rounded-xl bg-mint-green/15 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-calendar-check text-medium-green text-sm"></i>
                    </div>

                    <div>
                        <h2 class="font-bold text-sm sm:text-base">
                            Periode Akademik
                        </h2>

                        <p class="text-[11px] text-dark-green/50">
                            Pilih tahun pelajaran dan semester.
                        </p>
                    </div>

                </div>


                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                    <div>

                        <label
                            for="tahunPelajaran"
                            class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                        >
                            Tahun Pelajaran
                        </label>

                        <select
                            id="tahunPelajaran"
                            class="w-full rounded-xl border border-gray-200 bg-white px-3 py-2.5 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                        >
                            <option value="2026/2027">
                                2026/2027
                            </option>

                            <option value="2025/2026">
                                2025/2026
                            </option>
                        </select>

                    </div>


                    <div>

                        <label
                            for="semester"
                            class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                        >
                            Semester
                        </label>

                        <select
                            id="semester"
                            class="w-full rounded-xl border border-gray-200 bg-white px-3 py-2.5 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                        >
                            <option value="1">
                                Semester 1
                            </option>

                            <option value="2">
                                Semester 2
                            </option>
                        </select>

                    </div>

                </div>

            </div>



            <!-- =================================================
                 TABS
            ================================================== -->

            <div class="grid grid-cols-3 gap-2 sm:gap-3 mb-4">

                <button
                    type="button"
                    data-tab="siswa"
                    class="schedule-tab active-tab bg-dark-green text-white rounded-xl sm:rounded-2xl p-3 sm:p-4 text-left"
                >

                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3">

                        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg sm:rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-users text-mint-green text-xs sm:text-sm"></i>
                        </div>

                        <div class="min-w-0">

                            <p class="text-[10px] sm:text-xs font-bold truncate">
                                Mapel Siswa
                            </p>

                            <p class="hidden sm:block text-[10px] text-white/50 mt-0.5">
                                Berdasarkan kelas
                            </p>

                        </div>

                    </div>

                </button>


                <button
                    type="button"
                    data-tab="guru"
                    class="schedule-tab bg-white border border-emerald-100 rounded-xl sm:rounded-2xl p-3 sm:p-4 text-left"
                >

                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3">

                        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg sm:rounded-xl bg-mint-green/10 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-chalkboard-user text-medium-green text-xs sm:text-sm"></i>
                        </div>

                        <div class="min-w-0">

                            <p class="text-[10px] sm:text-xs font-bold truncate">
                                Guru Mengajar
                            </p>

                            <p class="hidden sm:block text-[10px] text-dark-green/40 mt-0.5">
                                Berdasarkan guru
                            </p>

                        </div>

                    </div>

                </button>


                <button
                    type="button"
                    data-tab="piket"
                    class="schedule-tab bg-white border border-emerald-100 rounded-xl sm:rounded-2xl p-3 sm:p-4 text-left"
                >

                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3">

                        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg sm:rounded-xl bg-mint-green/10 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-people-group text-medium-green text-xs sm:text-sm"></i>
                        </div>

                        <div class="min-w-0">

                            <p class="text-[10px] sm:text-xs font-bold truncate">
                                Guru Piket
                            </p>

                            <p class="hidden sm:block text-[10px] text-dark-green/40 mt-0.5">
                                Berdasarkan petugas
                            </p>

                        </div>

                    </div>

                </button>

            </div>



            <!-- =================================================
                 PANEL SISWA
            ================================================== -->

            <section
                id="panel-siswa"
                class="schedule-panel"
            >

                <div class="bg-white rounded-2xl border border-emerald-100 shadow-sm p-4 sm:p-5">

                    <div class="mb-4">

                        <h2 class="font-bold text-sm sm:text-base">
                            Jadwal Mata Pelajaran Siswa
                        </h2>

                        <p class="text-[11px] sm:text-xs text-dark-green/50 mt-1">
                            Cari kelas untuk melihat jadwal pelajaran dalam satu minggu.
                        </p>

                    </div>


                    <!-- SEARCH -->

                    <div
                        id="classSearchWrapper"
                        class="relative mb-4"
                    >

                        <label
                            for="classSearchInput"
                            class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                        >
                            Cari Kelas
                        </label>


                        <div class="relative">

                            <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <i class="fa-solid fa-magnifying-glass text-gray-400 text-xs"></i>
                            </div>


                            <input
                                id="classSearchInput"
                                type="text"
                                autocomplete="off"
                                placeholder="Ketik nama kelas..."
                                class="w-full rounded-xl border border-gray-200 bg-white pl-9 pr-10 py-3 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                            >


                            <button
                                id="clearClassSearch"
                                type="button"
                                class="hidden absolute right-2 top-1/2 -translate-y-1/2 w-7 h-7 rounded-lg hover:bg-gray-100 text-gray-400"
                            >
                                <i class="fa-solid fa-xmark text-xs"></i>
                            </button>

                        </div>


                        <div
                            id="classSearchDropdown"
                            class="search-dropdown hidden absolute left-0 right-0 top-full mt-2 z-30 bg-white border border-gray-100 rounded-2xl shadow-xl max-h-64 overflow-y-auto"
                        ></div>

                    </div>


                    <!-- SELECTED CLASS -->

                    <div
                        id="selectedClassInfo"
                        class="hidden mb-4 p-3 rounded-xl bg-mint-green/10 border border-mint-green/20"
                    ></div>


                    <!-- SCHEDULE -->

                    <div
                        id="siswaScheduleContainer"
                        class="space-y-3"
                    ></div>

                </div>

            </section>



            <!-- =================================================
                 PANEL GURU
            ================================================== -->

            <section
                id="panel-guru"
                class="schedule-panel hidden"
            >

                <div class="bg-white rounded-2xl border border-emerald-100 shadow-sm p-4 sm:p-5">

                    <div class="mb-4">

                        <h2 class="font-bold text-sm sm:text-base">
                            Jadwal Mengajar Guru
                        </h2>

                        <p class="text-[11px] sm:text-xs text-dark-green/50 mt-1">
                            Cari nama guru untuk melihat jadwal mengajarnya.
                        </p>

                    </div>


                    <div
                        id="teacherSearchWrapper"
                        class="relative mb-4"
                    >

                        <label
                            for="teacherSearchInput"
                            class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                        >
                            Cari Guru
                        </label>


                        <div class="relative">

                            <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <i class="fa-solid fa-magnifying-glass text-gray-400 text-xs"></i>
                            </div>


                            <input
                                id="teacherSearchInput"
                                type="text"
                                autocomplete="off"
                                placeholder="Ketik nama guru..."
                                class="w-full rounded-xl border border-gray-200 bg-white pl-9 pr-10 py-3 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                            >


                            <button
                                id="clearTeacherSearch"
                                type="button"
                                class="hidden absolute right-2 top-1/2 -translate-y-1/2 w-7 h-7 rounded-lg hover:bg-gray-100 text-gray-400"
                            >
                                <i class="fa-solid fa-xmark text-xs"></i>
                            </button>

                        </div>


                        <div
                            id="teacherSearchDropdown"
                            class="search-dropdown hidden absolute left-0 right-0 top-full mt-2 z-30 bg-white border border-gray-100 rounded-2xl shadow-xl max-h-64 overflow-y-auto"
                        ></div>

                    </div>


                    <div
                        id="selectedTeacherInfo"
                        class="hidden mb-4 p-3 rounded-xl bg-mint-green/10 border border-mint-green/20"
                    ></div>


                    <div
                        id="guruScheduleContainer"
                        class="space-y-3"
                    ></div>

                </div>

            </section>



            <!-- =================================================
                 PANEL PIKET
            ================================================== -->

            <section
                id="panel-piket"
                class="schedule-panel hidden"
            >

                <div class="bg-white rounded-2xl border border-emerald-100 shadow-sm p-4 sm:p-5">

                    <div class="mb-4">

                        <h2 class="font-bold text-sm sm:text-base">
                            Jadwal Guru Piket
                        </h2>

                        <p class="text-[11px] sm:text-xs text-dark-green/50 mt-1">
                            Cari guru piket untuk melihat jadwal tugasnya.
                        </p>

                    </div>


                    <div
                        id="piketSearchWrapper"
                        class="relative mb-4"
                    >

                        <label
                            for="piketSearchInput"
                            class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                        >
                            Cari Guru Piket
                        </label>


                        <div class="relative">

                            <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <i class="fa-solid fa-magnifying-glass text-gray-400 text-xs"></i>
                            </div>


                            <input
                                id="piketSearchInput"
                                type="text"
                                autocomplete="off"
                                placeholder="Ketik nama guru piket..."
                                class="w-full rounded-xl border border-gray-200 bg-white pl-9 pr-10 py-3 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                            >


                            <button
                                id="clearPiketSearch"
                                type="button"
                                class="hidden absolute right-2 top-1/2 -translate-y-1/2 w-7 h-7 rounded-lg hover:bg-gray-100 text-gray-400"
                            >
                                <i class="fa-solid fa-xmark text-xs"></i>
                            </button>

                        </div>


                        <div
                            id="piketSearchDropdown"
                            class="search-dropdown hidden absolute left-0 right-0 top-full mt-2 z-30 bg-white border border-gray-100 rounded-2xl shadow-xl max-h-64 overflow-y-auto"
                        ></div>

                    </div>


                    <div
                        id="selectedPiketInfo"
                        class="hidden mb-4 p-3 rounded-xl bg-mint-green/10 border border-mint-green/20"
                    ></div>


                    <div
                        id="piketScheduleContainer"
                        class="space-y-3"
                    ></div>

                </div>

            </section>

        </div>

    </main>



    <!-- =========================================================
         MOBILE SCROLL HELPER
    ========================================================== -->

    <div
        id="scrollHelper"
        class="md:hidden fixed right-2 sm:right-3 top-1/2
               -translate-y-1/2 z-30
               flex flex-col items-center gap-1">

        <!-- SCROLL KE ATAS -->

        <button
            type="button"
            onclick="scrollToTop()"
            aria-label="Kembali ke atas"
            class="w-7 h-7 rounded-full
                   bg-white/95
                   border border-emerald-100
                   shadow-md
                   text-medium-green
                   flex items-center justify-center
                   active:scale-90
                   transition">

            <i class="fa-solid fa-chevron-up text-[9px]"></i>

        </button>


        <!-- SCROLL INDICATOR -->

        <div
            class="relative
                   w-1
                   h-28
                   bg-dark-green/10
                   rounded-full
                   overflow-hidden">

            <div
                id="scrollIndicator"
                class="absolute left-0 top-0
                       w-1 h-8
                       bg-medium-green
                       rounded-full">
            </div>

        </div>


        <!-- SCROLL KE BAWAH -->

        <button
            type="button"
            onclick="scrollToBottom()"
            aria-label="Ke bagian bawah"
            class="w-7 h-7 rounded-full
                   bg-white/95
                   border border-emerald-100
                   shadow-md
                   text-medium-green
                   flex items-center justify-center
                   active:scale-90
                   transition">

            <i class="fa-solid fa-chevron-down text-[9px]"></i>

        </button>

    </div>



    <!-- =========================================================
         SCHEDULE MODAL
    ========================================================== -->

    <div
        id="scheduleModal"
        class="fixed inset-0 z-[100] hidden items-end sm:items-center justify-center p-0 sm:p-4"
    >

        <div
            id="modalOverlay"
            class="absolute inset-0 bg-black/50 backdrop-blur-sm"
        ></div>


        <div
            class="relative w-full sm:max-w-lg bg-white rounded-t-3xl sm:rounded-3xl shadow-2xl max-h-[94vh] overflow-hidden flex flex-col"
        >

            <!-- MODAL HEADER -->

            <div class="px-5 py-4 border-b border-gray-100 shrink-0">

                <div class="flex items-start justify-between gap-4">

                    <div class="min-w-0">

                        <h2
                            id="modalTitle"
                            class="text-base sm:text-lg font-bold text-dark-green"
                        >
                            Tambah Jadwal
                        </h2>

                        <p
                            id="modalSubtitle"
                            class="text-xs text-dark-green/50 mt-1"
                        >
                            Tambahkan jadwal baru.
                        </p>

                    </div>


                    <button
                        type="button"
                        onclick="closeScheduleModal()"
                        class="w-9 h-9 rounded-xl bg-gray-100 hover:bg-gray-200 flex items-center justify-center shrink-0"
                    >
                        <i class="fa-solid fa-xmark text-sm"></i>
                    </button>

                </div>

            </div>


            <!-- FORM -->

            <form
                id="scheduleForm"
                class="flex-1 overflow-y-auto"
            >

                <input
                    type="hidden"
                    id="editId"
                >


                <div class="p-5 space-y-5">

                    <!-- WAKTU -->

                    <div>

                        <p class="text-xs font-bold text-dark-green mb-3">
                            Waktu
                        </p>


                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

                            <div>

                                <label
                                    for="formHari"
                                    class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                                >
                                    Hari
                                </label>

                                <select
                                    id="formHari"
                                    class="w-full rounded-xl border border-gray-200 bg-white px-3 py-2.5 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                                >
                                    <option>Senin</option>
                                    <option>Selasa</option>
                                    <option>Rabu</option>
                                    <option>Kamis</option>
                                    <option>Jumat</option>
                                    <option>Sabtu</option>
                                </select>

                            </div>


                            <div>

                                <label
                                    for="formMulai"
                                    class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                                >
                                    Mulai
                                </label>

                                <input
                                    type="time"
                                    id="formMulai"
                                    required
                                    class="w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                                >

                            </div>


                            <div>

                                <label
                                    for="formSelesai"
                                    class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                                >
                                    Selesai
                                </label>

                                <input
                                    type="time"
                                    id="formSelesai"
                                    required
                                    class="w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                                >

                            </div>

                        </div>

                    </div>



                    <!-- DETAIL MENGAJAR -->

                    <div
                        id="teachingFields"
                        class="space-y-4"
                    >

                        <p class="text-xs font-bold text-dark-green">
                            Detail Mengajar
                        </p>


                        <div>

                            <label
                                for="formMapel"
                                class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                            >
                                Mata Pelajaran
                            </label>

                            <input
                                type="text"
                                id="formMapel"
                                class="w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                                placeholder="Contoh: Matematika"
                            >

                        </div>


                        <div>

                            <label
                                for="formGuru"
                                class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                            >
                                Guru
                            </label>

                            <input
                                type="text"
                                id="formGuru"
                                class="w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                                placeholder="Nama guru"
                            >

                        </div>


                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                            <div>

                                <label
                                    for="formKelas"
                                    class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                                >
                                    Kelas
                                </label>

                                <input
                                    type="text"
                                    id="formKelas"
                                    class="w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                                    placeholder="XI RPL 2"
                                >

                            </div>


                            <div>

                                <label
                                    for="formRuang"
                                    class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                                >
                                    Ruang
                                </label>

                                <input
                                    type="text"
                                    id="formRuang"
                                    class="w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                                    placeholder="R58"
                                >

                            </div>

                        </div>

                    </div>



                    <!-- DETAIL PIKET -->

                    <div
                        id="piketFields"
                        class="hidden space-y-4"
                    >

                        <p class="text-xs font-bold text-dark-green">
                            Detail Piket
                        </p>


                        <div>

                            <label
                                for="formPetugas"
                                class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                            >
                                Petugas Piket
                            </label>

                            <input
                                type="text"
                                id="formPetugas"
                                class="w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                                placeholder="Nama guru"
                            >

                        </div>


                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                            <div>

                                <label
                                    for="formShift"
                                    class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                                >
                                    Shift
                                </label>

                                <input
                                    type="text"
                                    id="formShift"
                                    class="w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                                    placeholder="Piket Pagi"
                                >

                            </div>


                            <div>

                                <label
                                    for="formLokasi"
                                    class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                                >
                                    Lokasi
                                </label>

                                <input
                                    type="text"
                                    id="formLokasi"
                                    class="w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                                    placeholder="Gerbang Utama"
                                >

                            </div>

                        </div>

                    </div>

                </div>



                <!-- MODAL FOOTER -->

                <div class="sticky bottom-0 bg-white border-t border-gray-100 px-5 py-4">

                    <div class="flex flex-col-reverse sm:flex-row gap-2 sm:justify-between">

                        <button
                            type="button"
                            id="deleteScheduleButton"
                            onclick="deleteCurrentSchedule()"
                            class="hidden w-full sm:w-auto px-4 py-2.5 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 text-sm font-semibold"
                        >
                            <i class="fa-solid fa-trash mr-1.5"></i>
                            Hapus
                        </button>


                        <div class="flex gap-2 sm:ml-auto">

                            <button
                                type="button"
                                onclick="closeScheduleModal()"
                                class="flex-1 sm:flex-none px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-semibold text-dark-green hover:bg-gray-50"
                            >
                                Batal
                            </button>


                            <button
                                type="submit"
                                class="flex-1 sm:flex-none px-5 py-2.5 rounded-xl bg-dark-green text-white text-sm font-semibold hover:bg-medium-green transition"
                            >
                                <i class="fa-solid fa-check mr-1.5"></i>
                                Simpan
                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>



    <!-- =========================================================
         JAVASCRIPT
    ========================================================== -->

    <script>

        /*
        |--------------------------------------------------------------------------
        | BACKEND DATA
        |--------------------------------------------------------------------------
        */

        const backendTeachingSchedules = @json($jadwals ?? []);
        const backendTeachers = @json($gurus ?? []);
        const backendSubjects = @json($mapels ?? []);
        const backendClasses = @json($kelas ?? []);



        /*
        |--------------------------------------------------------------------------
        | DUMMY FALLBACK
        |--------------------------------------------------------------------------
        */

        let teachingSchedules = [

            {
                id: 1,
                tahun: '2026/2027',
                semester: 1,
                hari: 'Senin',
                mulai: '07:00',
                selesai: '08:20',
                mapel: 'Matematika',
                guru: 'Sulistyowati',
                kelas: 'XI RPL 2',
                ruang: 'R58'
            },

            {
                id: 2,
                tahun: '2026/2027',
                semester: 1,
                hari: 'Senin',
                mulai: '10:00',
                selesai: '12:40',
                mapel: 'Matematika',
                guru: 'Sulistyowati',
                kelas: 'XII TKJ 1',
                ruang: 'R12'
            },

            {
                id: 3,
                tahun: '2026/2027',
                semester: 1,
                hari: 'Senin',
                mulai: '07:45',
                selesai: '10:00',
                mapel: 'KIK',
                guru: 'Anisa',
                kelas: 'XI RPL 2',
                ruang: 'R58'
            },

            {
                id: 4,
                tahun: '2026/2027',
                semester: 1,
                hari: 'Senin',
                mulai: '10:00',
                selesai: '11:20',
                mapel: 'Bahasa Inggris',
                guru: 'Fajar',
                kelas: 'XI RPL 2',
                ruang: 'R58'
            },

            {
                id: 5,
                tahun: '2026/2027',
                semester: 1,
                hari: 'Senin',
                mulai: '11:20',
                selesai: '13:00',
                mapel: 'Konsentrasi RPL',
                guru: 'Badrus',
                kelas: 'XI RPL 2',
                ruang: 'Lab RPL 2'
            },

            {
                id: 6,
                tahun: '2026/2027',
                semester: 1,
                hari: 'Selasa',
                mulai: '07:00',
                selesai: '09:40',
                mapel: 'Matematika',
                guru: 'Sulistyowati',
                kelas: 'XI DKV 2',
                ruang: 'R47'
            },

            {
                id: 7,
                tahun: '2026/2027',
                semester: 1,
                hari: 'Selasa',
                mulai: '10:00',
                selesai: '12:40',
                mapel: 'Matematika',
                guru: 'Sulistyowati',
                kelas: 'XI RPL 1',
                ruang: 'Lab RPL 1'
            },

            {
                id: 8,
                tahun: '2026/2027',
                semester: 1,
                hari: 'Kamis',
                mulai: '07:00',
                selesai: '09:40',
                mapel: 'Matematika',
                guru: 'Sulistyowati',
                kelas: 'XI RPL 1',
                ruang: 'R57'
            },

            {
                id: 9,
                tahun: '2026/2027',
                semester: 1,
                hari: 'Kamis',
                mulai: '10:00',
                selesai: '12:40',
                mapel: 'Matematika',
                guru: 'Sulistyowati',
                kelas: 'XII RPL 2',
                ruang: 'R58'
            },

            {
                id: 10,
                tahun: '2026/2027',
                semester: 1,
                hari: 'Rabu',
                mulai: '07:00',
                selesai: '08:20',
                mapel: 'Bahasa Indonesia',
                guru: 'Dewi Lestari',
                kelas: 'XI RPL 2',
                ruang: 'R58'
            },

            {
                id: 11,
                tahun: '2026/2027',
                semester: 1,
                hari: 'Jumat',
                mulai: '07:00',
                selesai: '08:20',
                mapel: 'Pendidikan Pancasila',
                guru: 'Andi Setiawan',
                kelas: 'XI RPL 2',
                ruang: 'R58'
            }

        ];



        let piketSchedules = [

            {
                id: 101,
                tahun: '2026/2027',
                semester: 1,
                hari: 'Senin',
                mulai: '07:00',
                selesai: '10:00',
                petugas: 'Budi Santoso',
                shift: 'Piket Pagi',
                lokasi: 'Gerbang Utama'
            },

            {
                id: 102,
                tahun: '2026/2027',
                semester: 1,
                hari: 'Senin',
                mulai: '10:00',
                selesai: '13:00',
                petugas: 'Siti Aminah',
                shift: 'Piket Siang',
                lokasi: 'Gedung A'
            },

            {
                id: 103,
                tahun: '2026/2027',
                semester: 1,
                hari: 'Selasa',
                mulai: '07:00',
                selesai: '10:00',
                petugas: 'Andi Setiawan',
                shift: 'Piket Pagi',
                lokasi: 'Gerbang Utama'
            },

            {
                id: 104,
                tahun: '2026/2027',
                semester: 1,
                hari: 'Rabu',
                mulai: '07:00',
                selesai: '10:00',
                petugas: 'Dewi Lestari',
                shift: 'Piket Pagi',
                lokasi: 'Gedung B'
            },

            {
                id: 105,
                tahun: '2026/2027',
                semester: 1,
                hari: 'Kamis',
                mulai: '07:00',
                selesai: '10:00',
                petugas: 'Fajar Wahyu Pratiwi',
                shift: 'Piket Pagi',
                lokasi: 'Gerbang Utama'
            },

            {
                id: 106,
                tahun: '2026/2027',
                semester: 1,
                hari: 'Jumat',
                mulai: '07:00',
                selesai: '10:00',
                petugas: 'Anisa Kusumawati',
                shift: 'Piket Pagi',
                lokasi: 'Gedung A'
            }

        ];



        /*
        |--------------------------------------------------------------------------
        | BACKEND OVERRIDE
        |--------------------------------------------------------------------------
        */

        if (
            Array.isArray(backendTeachingSchedules) &&
            backendTeachingSchedules.length
        ) {

            teachingSchedules =
                backendTeachingSchedules.map(item => ({

                    id:
                        item.id ??
                        item.id_jadwal ??
                        Date.now(),

                    tahun:
                        item.tahun ??
                        item.tahun_pelajaran ??
                        '2026/2027',

                    semester:
                        item.semester ??
                        1,

                    hari:
                        item.hari ??
                        '-',

                    mulai:
                        item.mulai ??
                        item.jam_mulai ??
                        '07:00',

                    selesai:
                        item.selesai ??
                        item.jam_selesai ??
                        '08:00',

                    mapel:
                        item.mapel ??
                        item.nama_mapel ??
                        '-',

                    guru:
                        item.guru ??
                        item.nama_guru ??
                        '-',

                    kelas:
                        item.kelas ??
                        item.nama_kelas ??
                        '-',

                    ruang:
                        item.ruang ??
                        '-'

                }));

        }



        /*
        |--------------------------------------------------------------------------
        | CONFIG
        |--------------------------------------------------------------------------
        */

        const dayOrder = [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu'
        ];

        let currentModalType = 'mengajar';

        let selectedClass = '';

        let selectedTeacher = '';

        let selectedPiketTeacher = '';



        /*
        |--------------------------------------------------------------------------
        | ELEMENTS
        |--------------------------------------------------------------------------
        */

        const tahunPelajaran =
            document.getElementById(
                'tahunPelajaran'
            );

        const semester =
            document.getElementById(
                'semester'
            );


        const classSearchInput =
            document.getElementById(
                'classSearchInput'
            );

        const classSearchDropdown =
            document.getElementById(
                'classSearchDropdown'
            );

        const clearClassSearch =
            document.getElementById(
                'clearClassSearch'
            );


        const teacherSearchInput =
            document.getElementById(
                'teacherSearchInput'
            );

        const teacherSearchDropdown =
            document.getElementById(
                'teacherSearchDropdown'
            );

        const clearTeacherSearch =
            document.getElementById(
                'clearTeacherSearch'
            );


        const piketSearchInput =
            document.getElementById(
                'piketSearchInput'
            );

        const piketSearchDropdown =
            document.getElementById(
                'piketSearchDropdown'
            );

        const clearPiketSearch =
            document.getElementById(
                'clearPiketSearch'
            );


        const selectedClassInfo =
            document.getElementById(
                'selectedClassInfo'
            );

        const selectedTeacherInfo =
            document.getElementById(
                'selectedTeacherInfo'
            );

        const selectedPiketInfo =
            document.getElementById(
                'selectedPiketInfo'
            );


        const siswaScheduleContainer =
            document.getElementById(
                'siswaScheduleContainer'
            );

        const guruScheduleContainer =
            document.getElementById(
                'guruScheduleContainer'
            );

        const piketScheduleContainer =
            document.getElementById(
                'piketScheduleContainer'
            );



        /*
        |--------------------------------------------------------------------------
        | HELPERS
        |--------------------------------------------------------------------------
        */

        function escapeHtml(value) {

            return String(value ?? '')
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');

        }


        function formatTime(value) {

            if (!value) {
                return '-';
            }

            return String(value)
                .substring(0, 5);

        }


        function getCurrentPeriod() {

            return {

                tahun:
                    tahunPelajaran.value,

                semester:
                    Number(
                        semester.value
                    )

            };

        }


        function getTeachingByPeriod() {

            const period =
                getCurrentPeriod();

            return teachingSchedules.filter(
                item =>
                    String(item.tahun) ===
                        String(period.tahun) &&
                    Number(item.semester) ===
                        Number(period.semester)
            );

        }


        function getPiketByPeriod() {

            const period =
                getCurrentPeriod();

            return piketSchedules.filter(
                item =>
                    String(item.tahun) ===
                        String(period.tahun) &&
                    Number(item.semester) ===
                        Number(period.semester)
            );

        }


        function getUniqueClasses() {

            const backendNames =
                Array.isArray(backendClasses)
                    ? backendClasses
                        .map(item =>
                            typeof item === 'string'
                                ? item
                                : (
                                    item.nama_kelas ??
                                    item.kelas ??
                                    item.nama ??
                                    ''
                                )
                        )
                        .filter(Boolean)
                    : [];


            const scheduleNames =
                teachingSchedules
                    .map(item => item.kelas)
                    .filter(Boolean);


            return [
                ...new Set([
                    ...backendNames,
                    ...scheduleNames
                ])
            ].sort();

        }


        function getUniqueTeachers() {

            const backendNames =
                Array.isArray(backendTeachers)
                    ? backendTeachers
                        .map(item =>
                            typeof item === 'string'
                                ? item
                                : (
                                    item.nama_guru ??
                                    item.nama ??
                                    item.guru ??
                                    ''
                                )
                        )
                        .filter(Boolean)
                    : [];


            const teachingNames =
                teachingSchedules
                    .map(item => item.guru)
                    .filter(Boolean);


            const piketNames =
                piketSchedules
                    .map(item => item.petugas)
                    .filter(Boolean);


            return [
                ...new Set([
                    ...backendNames,
                    ...teachingNames,
                    ...piketNames
                ])
            ].sort();

        }


        function closeSearchDropdowns() {

            classSearchDropdown.classList.add(
                'hidden'
            );

            teacherSearchDropdown.classList.add(
                'hidden'
            );

            piketSearchDropdown.classList.add(
                'hidden'
            );

        }


        function searchItemHtml(
            name,
            icon = 'fa-user'
        ) {

            return `

                <button
                    type="button"
                    class="search-result w-full text-left px-3 py-2.5 flex items-center gap-3 border-b border-gray-50 last:border-0"
                    data-search-value="${escapeHtml(name)}"
                >

                    <div class="w-8 h-8 rounded-lg bg-mint-green/15 flex items-center justify-center shrink-0">

                        <i class="fa-solid ${icon} text-medium-green text-xs"></i>

                    </div>

                    <span class="text-sm font-medium">
                        ${escapeHtml(name)}
                    </span>

                </button>

            `;

        }



        /*
        |--------------------------------------------------------------------------
        | SHOW CLASS RESULTS
        |--------------------------------------------------------------------------
        */

        function showClassResults(keyword = '') {

            const query =
                keyword.trim().toLowerCase();


            const classes =
                getUniqueClasses()
                    .filter(kelas =>
                        kelas
                            .toLowerCase()
                            .includes(query)
                    );


            if (!classes.length) {

                classSearchDropdown.innerHTML = `

                    <div class="px-4 py-5 text-center">

                        <i class="fa-solid fa-magnifying-glass text-gray-300 text-lg mb-2"></i>

                        <p class="text-xs text-gray-500">
                            Kelas tidak ditemukan
                        </p>

                    </div>

                `;

            } else {

                classSearchDropdown.innerHTML =
                    classes
                        .map(kelas =>
                            searchItemHtml(
                                kelas,
                                'fa-users'
                            )
                        )
                        .join('');

            }


            classSearchDropdown.classList.remove(
                'hidden'
            );


            classSearchDropdown
                .querySelectorAll('.search-result')
                .forEach(button => {

                    button.addEventListener(
                        'click',
                        function() {

                            const value =
                                this.dataset.searchValue;

                            selectedClass =
                                value;

                            classSearchInput.value =
                                value;

                            clearClassSearch.classList.remove(
                                'hidden'
                            );

                            classSearchDropdown.classList.add(
                                'hidden'
                            );

                            renderSiswa();

                        }
                    );

                });

        }



        /*
        |--------------------------------------------------------------------------
        | SHOW TEACHER RESULTS
        |--------------------------------------------------------------------------
        */

        function showTeacherResults(keyword = '') {

            const query =
                keyword.trim().toLowerCase();


            const teachers =
                getUniqueTeachers()
                    .filter(guru =>
                        guru
                            .toLowerCase()
                            .includes(query)
                    );


            if (!teachers.length) {

                teacherSearchDropdown.innerHTML = `

                    <div class="px-4 py-5 text-center">

                        <i class="fa-solid fa-user-xmark text-gray-300 text-lg mb-2"></i>

                        <p class="text-xs text-gray-500">
                            Guru tidak ditemukan
                        </p>

                    </div>

                `;

            } else {

                teacherSearchDropdown.innerHTML =
                    teachers
                        .map(guru =>
                            searchItemHtml(
                                guru,
                                'fa-chalkboard-user'
                            )
                        )
                        .join('');

            }


            teacherSearchDropdown.classList.remove(
                'hidden'
            );


            teacherSearchDropdown
                .querySelectorAll('.search-result')
                .forEach(button => {

                    button.addEventListener(
                        'click',
                        function() {

                            const value =
                                this.dataset.searchValue;

                            selectedTeacher =
                                value;

                            teacherSearchInput.value =
                                value;

                            clearTeacherSearch.classList.remove(
                                'hidden'
                            );

                            teacherSearchDropdown.classList.add(
                                'hidden'
                            );

                            renderGuru();

                        }
                    );

                });

        }



        /*
        |--------------------------------------------------------------------------
        | SHOW PIKET RESULTS
        |--------------------------------------------------------------------------
        */

        function showPiketResults(keyword = '') {

            const query =
                keyword.trim().toLowerCase();


            const teachers =
                getUniqueTeachers()
                    .filter(guru => {

                        return piketSchedules.some(
                            item =>
                                item.petugas === guru
                        );

                    })
                    .filter(guru =>
                        guru
                            .toLowerCase()
                            .includes(query)
                    );


            if (!teachers.length) {

                piketSearchDropdown.innerHTML = `

                    <div class="px-4 py-5 text-center">

                        <i class="fa-solid fa-user-xmark text-gray-300 text-lg mb-2"></i>

                        <p class="text-xs text-gray-500">
                            Guru piket tidak ditemukan
                        </p>

                    </div>

                `;

            } else {

                piketSearchDropdown.innerHTML =
                    teachers
                        .map(guru =>
                            searchItemHtml(
                                guru,
                                'fa-people-group'
                            )
                        )
                        .join('');

            }


            piketSearchDropdown.classList.remove(
                'hidden'
            );


            piketSearchDropdown
                .querySelectorAll('.search-result')
                .forEach(button => {

                    button.addEventListener(
                        'click',
                        function() {

                            const value =
                                this.dataset.searchValue;

                            selectedPiketTeacher =
                                value;

                            piketSearchInput.value =
                                value;

                            clearPiketSearch.classList.remove(
                                'hidden'
                            );

                            piketSearchDropdown.classList.add(
                                'hidden'
                            );

                            renderPiket();

                        }
                    );

                });

        }



        /*
        |--------------------------------------------------------------------------
        | TEACHING CARD
        |--------------------------------------------------------------------------
        */

        function teachingCard(item) {

            return `

                <div class="min-w-[210px] sm:min-w-[220px] max-w-[240px] bg-gray-50 rounded-xl p-3 shrink-0 border border-gray-100 hover:border-mint-green/50 transition">

                    <div class="flex items-start justify-between gap-2">

                        <div class="text-xs font-bold text-medium-green">

                            <i class="fa-regular fa-clock mr-1"></i>

                            ${escapeHtml(formatTime(item.mulai))}
                            –
                            ${escapeHtml(formatTime(item.selesai))}

                        </div>


                        <button
                            type="button"
                            onclick="openEditTeachingModal(${item.id})"
                            class="w-7 h-7 rounded-lg bg-white text-dark-green/50 hover:bg-dark-green hover:text-white transition shrink-0"
                        >

                            <i class="fa-solid fa-pen text-[10px]"></i>

                        </button>

                    </div>


                    <div class="mt-3">

                        <p class="font-bold text-sm leading-snug line-clamp-2">
                            ${escapeHtml(item.mapel)}
                        </p>

                        <p class="text-xs text-dark-green/60 mt-1 line-clamp-1">
                            ${escapeHtml(item.guru)}
                        </p>

                    </div>


                    <div class="mt-3 space-y-1">

                        <p class="text-[11px] text-gray-500 flex items-center gap-1.5">

                            <i class="fa-solid fa-users text-[9px]"></i>

                            ${escapeHtml(item.kelas)}

                        </p>


                        <p class="text-[11px] text-gray-500 flex items-center gap-1.5">

                            <i class="fa-solid fa-door-open text-[9px]"></i>

                            ${escapeHtml(item.ruang)}

                        </p>

                    </div>

                </div>

            `;

        }



        /*
        |--------------------------------------------------------------------------
        | PIKET CARD
        |--------------------------------------------------------------------------
        */

        function piketCard(item) {

            return `

                <div class="min-w-[210px] sm:min-w-[220px] max-w-[240px] bg-gray-50 rounded-xl p-3 shrink-0 border border-gray-100 hover:border-mint-green/50 transition">

                    <div class="flex items-start justify-between gap-2">

                        <div class="text-xs font-bold text-medium-green">

                            <i class="fa-regular fa-clock mr-1"></i>

                            ${escapeHtml(formatTime(item.mulai))}
                            –
                            ${escapeHtml(formatTime(item.selesai))}

                        </div>


                        <button
                            type="button"
                            onclick="openEditPiketModal(${item.id})"
                            class="w-7 h-7 rounded-lg bg-white text-dark-green/50 hover:bg-dark-green hover:text-white transition shrink-0"
                        >

                            <i class="fa-solid fa-pen text-[10px]"></i>

                        </button>

                    </div>


                    <div class="mt-3">

                        <p class="text-[10px] text-medium-green font-bold uppercase tracking-wide">
                            Petugas Piket
                        </p>

                        <p class="font-bold text-sm leading-snug mt-1 line-clamp-2">
                            ${escapeHtml(item.petugas)}
                        </p>

                    </div>


                    <div class="mt-3 space-y-1">

                        <p class="text-[11px] text-gray-500 flex items-center gap-1.5">

                            <i class="fa-solid fa-shuffle text-[9px]"></i>

                            ${escapeHtml(item.shift)}

                        </p>


                        <p class="text-[11px] text-gray-500 flex items-center gap-1.5">

                            <i class="fa-solid fa-location-dot text-[9px]"></i>

                            ${escapeHtml(item.lokasi)}

                        </p>

                    </div>

                </div>

            `;

        }



        /*
        |--------------------------------------------------------------------------
        | ADD CARD
        |--------------------------------------------------------------------------
        */

        function addScheduleCard(type, day) {

            return `

                <button
                    type="button"
                    onclick="openScheduleModal('${type}', null, '${day}')"
                    class="min-w-[210px] sm:min-w-[220px] max-w-[240px] min-h-[145px] shrink-0 rounded-xl border-2 border-dashed border-medium-green/30 bg-white hover:bg-mint-green/10 hover:border-medium-green/60 transition flex flex-col items-center justify-center gap-2 text-medium-green group"
                >

                    <span class="w-10 h-10 rounded-full bg-mint-green/20 group-hover:bg-mint-green/40 flex items-center justify-center transition">

                        <i class="fa-solid fa-plus"></i>

                    </span>


                    <span class="text-xs font-bold">
                        Tambah Jadwal
                    </span>

                </button>

            `;

        }



        /*
        |--------------------------------------------------------------------------
        | SELECTION REQUIRED
        |--------------------------------------------------------------------------
        */

        function selectionRequired(type) {

            const label =
                type === 'guru'
                    ? 'guru'
                    : type === 'piket'
                        ? 'guru piket'
                        : 'kelas';


            return `

                <div class="py-12 text-center">

                    <div class="w-14 h-14 mx-auto rounded-2xl bg-mint-green/15 flex items-center justify-center mb-3">

                        <i class="fa-solid fa-magnifying-glass text-medium-green text-xl"></i>

                    </div>


                    <h3 class="font-bold text-sm">
                        Pilih ${label} terlebih dahulu
                    </h3>


                    <p class="text-xs text-dark-green/50 mt-1 px-5">
                        Ketik pada kolom pencarian lalu pilih dari dropdown.
                    </p>

                </div>

            `;

        }



        /*
        |--------------------------------------------------------------------------
        | EMPTY DAY
        |--------------------------------------------------------------------------
        */

        function renderDay(day, cards, type) {

            return `

                <div class="bg-white rounded-2xl border border-gray-100 p-3 sm:p-4">

                    <div class="mb-3">

                        <span class="inline-flex items-center gap-2 bg-dark-green text-mint-green px-3 py-1.5 rounded-lg text-xs font-bold">

                            <i class="fa-regular fa-calendar"></i>

                            ${day}

                        </span>

                    </div>


                    <div class="flex gap-3 overflow-x-auto schedule-scroll pb-1">

                        ${cards}

                        ${addScheduleCard(type, day)}

                    </div>

                </div>

            `;

        }



        /*
        |--------------------------------------------------------------------------
        | RENDER SISWA
        |--------------------------------------------------------------------------
        */

        function renderSiswa() {

            if (!selectedClass) {

                selectedClassInfo.classList.add(
                    'hidden'
                );

                siswaScheduleContainer.innerHTML =
                    selectionRequired('kelas');

                return;

            }


            selectedClassInfo.classList.remove(
                'hidden'
            );


            selectedClassInfo.innerHTML = `

                <div class="flex items-center gap-3">

                    <div class="w-9 h-9 rounded-xl bg-medium-green/10 flex items-center justify-center shrink-0">

                        <i class="fa-solid fa-users text-medium-green"></i>

                    </div>

                    <div class="min-w-0">

                        <p class="text-[10px] uppercase tracking-wide font-bold text-medium-green">
                            Kelas yang dipilih
                        </p>

                        <p class="font-bold text-sm truncate">
                            ${escapeHtml(selectedClass)}
                        </p>

                    </div>

                </div>

            `;


            const data =
                getTeachingByPeriod()
                    .filter(item =>
                        item.kelas === selectedClass
                    );


            let html = '';


            dayOrder.forEach(day => {

                const dayData =
                    data
                        .filter(item =>
                            item.hari === day
                        );


                const cards =
                    dayData
                        .sort((a, b) =>
                            String(a.mulai)
                                .localeCompare(
                                    String(b.mulai)
                                )
                        )
                        .map(item =>
                            teachingCard(item)
                        )
                        .join('');


                html +=
                    renderDay(
                        day,
                        cards,
                        'mengajar'
                    );

            });


            siswaScheduleContainer.innerHTML =
                html;

        }



        /*
        |--------------------------------------------------------------------------
        | RENDER GURU
        |--------------------------------------------------------------------------
        */

        function renderGuru() {

            if (!selectedTeacher) {

                selectedTeacherInfo.classList.add(
                    'hidden'
                );

                guruScheduleContainer.innerHTML =
                    selectionRequired('guru');

                return;

            }


            selectedTeacherInfo.classList.remove(
                'hidden'
            );


            selectedTeacherInfo.innerHTML = `

                <div class="flex items-center gap-3">

                    <div class="w-9 h-9 rounded-xl bg-medium-green/10 flex items-center justify-center shrink-0">

                        <i class="fa-solid fa-chalkboard-user text-medium-green"></i>

                    </div>

                    <div class="min-w-0">

                        <p class="text-[10px] uppercase tracking-wide font-bold text-medium-green">
                            Guru yang dipilih
                        </p>

                        <p class="font-bold text-sm truncate">
                            ${escapeHtml(selectedTeacher)}
                        </p>

                    </div>

                </div>

            `;


            const data =
                getTeachingByPeriod()
                    .filter(item =>
                        item.guru === selectedTeacher
                    );


            let html = '';


            dayOrder.forEach(day => {

                const dayData =
                    data
                        .filter(item =>
                            item.hari === day
                        );


                const cards =
                    dayData
                        .sort((a, b) =>
                            String(a.mulai)
                                .localeCompare(
                                    String(b.mulai)
                                )
                        )
                        .map(item =>
                            teachingCard(item)
                        )
                        .join('');


                html +=
                    renderDay(
                        day,
                        cards,
                        'mengajar'
                    );

            });


            guruScheduleContainer.innerHTML =
                html;

        }



        /*
        |--------------------------------------------------------------------------
        | RENDER PIKET
        |--------------------------------------------------------------------------
        */

        function renderPiket() {

            if (!selectedPiketTeacher) {

                selectedPiketInfo.classList.add(
                    'hidden'
                );

                piketScheduleContainer.innerHTML =
                    selectionRequired('piket');

                return;

            }


            selectedPiketInfo.classList.remove(
                'hidden'
            );


            selectedPiketInfo.innerHTML = `

                <div class="flex items-center gap-3">

                    <div class="w-9 h-9 rounded-xl bg-medium-green/10 flex items-center justify-center shrink-0">

                        <i class="fa-solid fa-people-group text-medium-green"></i>

                    </div>

                    <div class="min-w-0">

                        <p class="text-[10px] uppercase tracking-wide font-bold text-medium-green">
                            Guru piket yang dipilih
                        </p>

                        <p class="font-bold text-sm truncate">
                            ${escapeHtml(selectedPiketTeacher)}
                        </p>

                    </div>

                </div>

            `;


            const data =
                getPiketByPeriod()
                    .filter(item =>
                        item.petugas === selectedPiketTeacher
                    );


            let html = '';


            dayOrder.forEach(day => {

                const dayData =
                    data
                        .filter(item =>
                            item.hari === day
                        );


                const cards =
                    dayData
                        .sort((a, b) =>
                            String(a.mulai)
                                .localeCompare(
                                    String(b.mulai)
                                )
                        )
                        .map(item =>
                            piketCard(item)
                        )
                        .join('');


                html +=
                    renderDay(
                        day,
                        cards,
                        'piket'
                    );

            });


            piketScheduleContainer.innerHTML =
                html;

        }



        /*
        |--------------------------------------------------------------------------
        | RENDER ALL
        |--------------------------------------------------------------------------
        */

        function renderAll() {

            renderSiswa();

            renderGuru();

            renderPiket();

        }



        /*
        |--------------------------------------------------------------------------
        | CLEAR SEARCH
        |--------------------------------------------------------------------------
        */

        function clearClassSearchHandler() {

            selectedClass = '';

            classSearchInput.value = '';

            clearClassSearch.classList.add(
                'hidden'
            );

            classSearchDropdown.classList.add(
                'hidden'
            );

            renderSiswa();

            classSearchInput.focus();

        }


        function clearTeacherSearchHandler() {

            selectedTeacher = '';

            teacherSearchInput.value = '';

            clearTeacherSearch.classList.add(
                'hidden'
            );

            teacherSearchDropdown.classList.add(
                'hidden'
            );

            renderGuru();

            teacherSearchInput.focus();

        }


        function clearPiketSearchHandler() {

            selectedPiketTeacher = '';

            piketSearchInput.value = '';

            clearPiketSearch.classList.add(
                'hidden'
            );

            piketSearchDropdown.classList.add(
                'hidden'
            );

            renderPiket();

            piketSearchInput.focus();

        }



        /*
        |--------------------------------------------------------------------------
        | SEARCH EVENTS
        |--------------------------------------------------------------------------
        */

        classSearchInput.addEventListener(
            'focus',
            function() {

                showClassResults(
                    this.value
                );

            }
        );


        classSearchInput.addEventListener(
            'input',
            function() {

                selectedClass = '';

                clearClassSearch.classList.toggle(
                    'hidden',
                    !this.value
                );

                showClassResults(
                    this.value
                );

                renderSiswa();

            }
        );


        teacherSearchInput.addEventListener(
            'focus',
            function() {

                showTeacherResults(
                    this.value
                );

            }
        );


        teacherSearchInput.addEventListener(
            'input',
            function() {

                selectedTeacher = '';

                clearTeacherSearch.classList.toggle(
                    'hidden',
                    !this.value
                );

                showTeacherResults(
                    this.value
                );

                renderGuru();

            }
        );


        piketSearchInput.addEventListener(
            'focus',
            function() {

                showPiketResults(
                    this.value
                );

            }
        );


        piketSearchInput.addEventListener(
            'input',
            function() {

                selectedPiketTeacher = '';

                clearPiketSearch.classList.toggle(
                    'hidden',
                    !this.value
                );

                showPiketResults(
                    this.value
                );

                renderPiket();

            }
        );


        clearClassSearch.addEventListener(
            'click',
            clearClassSearchHandler
        );


        clearTeacherSearch.addEventListener(
            'click',
            clearTeacherSearchHandler
        );


        clearPiketSearch.addEventListener(
            'click',
            clearPiketSearchHandler
        );



        /*
        |--------------------------------------------------------------------------
        | CLICK OUTSIDE SEARCH
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'click',
            function(event) {

                const classWrapper =
                    document.getElementById(
                        'classSearchWrapper'
                    );

                const teacherWrapper =
                    document.getElementById(
                        'teacherSearchWrapper'
                    );

                const piketWrapper =
                    document.getElementById(
                        'piketSearchWrapper'
                    );


                if (
                    classWrapper &&
                    !classWrapper.contains(
                        event.target
                    )
                ) {

                    classSearchDropdown.classList.add(
                        'hidden'
                    );

                }


                if (
                    teacherWrapper &&
                    !teacherWrapper.contains(
                        event.target
                    )
                ) {

                    teacherSearchDropdown.classList.add(
                        'hidden'
                    );

                }


                if (
                    piketWrapper &&
                    !piketWrapper.contains(
                        event.target
                    )
                ) {

                    piketSearchDropdown.classList.add(
                        'hidden'
                    );

                }

            }
        );



        /*
        |--------------------------------------------------------------------------
        | PERIOD CHANGE
        |--------------------------------------------------------------------------
        */

        tahunPelajaran.addEventListener(
            'change',
            function() {

                renderAll();

            }
        );


        semester.addEventListener(
            'change',
            function() {

                renderAll();

            }
        );



        /*
        |--------------------------------------------------------------------------
        | MODAL
        |--------------------------------------------------------------------------
        */

        function openScheduleModal(
            type,
            id = null,
            day = null
        ) {

            currentModalType =
                type;


            const modal =
                document.getElementById(
                    'scheduleModal'
                );


            const form =
                document.getElementById(
                    'scheduleForm'
                );


            const modalTitle =
                document.getElementById(
                    'modalTitle'
                );


            const modalSubtitle =
                document.getElementById(
                    'modalSubtitle'
                );


            const teachingFields =
                document.getElementById(
                    'teachingFields'
                );


            const piketFields =
                document.getElementById(
                    'piketFields'
                );


            const deleteButton =
                document.getElementById(
                    'deleteScheduleButton'
                );


            form.reset();


            document.getElementById(
                'editId'
            ).value =
                id ?? '';


            document.getElementById(
                'formHari'
            ).value =
                day ?? 'Senin';


            if (type === 'mengajar') {

                teachingFields.classList.remove(
                    'hidden'
                );

                piketFields.classList.add(
                    'hidden'
                );


                modalTitle.textContent =
                    id
                        ? 'Edit Jadwal Mengajar'
                        : 'Tambah Jadwal Mengajar';


                modalSubtitle.textContent =
                    id
                        ? 'Perbarui jadwal guru mengajar.'
                        : 'Tambahkan jadwal pada hari dan jam tertentu.';


                deleteButton.classList.toggle(
                    'hidden',
                    !id
                );


                if (id) {

                    const item =
                        teachingSchedules.find(
                            item =>
                                Number(item.id) ===
                                Number(id)
                        );


                    if (item) {

                        document.getElementById(
                            'formHari'
                        ).value =
                            item.hari;

                        document.getElementById(
                            'formMulai'
                        ).value =
                            item.mulai;

                        document.getElementById(
                            'formSelesai'
                        ).value =
                            item.selesai;

                        document.getElementById(
                            'formMapel'
                        ).value =
                            item.mapel;

                        document.getElementById(
                            'formGuru'
                        ).value =
                            item.guru;

                        document.getElementById(
                            'formKelas'
                        ).value =
                            item.kelas;

                        document.getElementById(
                            'formRuang'
                        ).value =
                            item.ruang;

                    }

                }

            }


            if (type === 'piket') {

                teachingFields.classList.add(
                    'hidden'
                );

                piketFields.classList.remove(
                    'hidden'
                );


                modalTitle.textContent =
                    id
                        ? 'Edit Jadwal Piket'
                        : 'Tambah Jadwal Piket';


                modalSubtitle.textContent =
                    id
                        ? 'Perbarui jadwal guru piket.'
                        : 'Tambahkan jadwal piket pada hari dan jam tertentu.';


                deleteButton.classList.toggle(
                    'hidden',
                    !id
                );


                if (id) {

                    const item =
                        piketSchedules.find(
                            item =>
                                Number(item.id) ===
                                Number(id)
                        );


                    if (item) {

                        document.getElementById(
                            'formHari'
                        ).value =
                            item.hari;

                        document.getElementById(
                            'formMulai'
                        ).value =
                            item.mulai;

                        document.getElementById(
                            'formSelesai'
                        ).value =
                            item.selesai;

                        document.getElementById(
                            'formPetugas'
                        ).value =
                            item.petugas;

                        document.getElementById(
                            'formShift'
                        ).value =
                            item.shift;

                        document.getElementById(
                            'formLokasi'
                        ).value =
                            item.lokasi;

                    }

                }

            }


            modal.classList.remove(
                'hidden'
            );

            modal.classList.add(
                'flex'
            );

            document.body.classList.add(
                'overflow-hidden'
            );

        }


        function openEditTeachingModal(id) {

            openScheduleModal(
                'mengajar',
                id
            );

        }


        function openEditPiketModal(id) {

            openScheduleModal(
                'piket',
                id
            );

        }



        /*
        |--------------------------------------------------------------------------
        | CLOSE MODAL
        |--------------------------------------------------------------------------
        */

        function closeScheduleModal() {

            const modal =
                document.getElementById(
                    'scheduleModal'
                );


            modal.classList.add(
                'hidden'
            );

            modal.classList.remove(
                'flex'
            );

            document.body.classList.remove(
                'overflow-hidden'
            );

        }



        /*
        |--------------------------------------------------------------------------
        | DELETE
        |--------------------------------------------------------------------------
        */

        function deleteCurrentSchedule() {

            const id =
                Number(
                    document.getElementById(
                        'editId'
                    ).value
                );


            if (!id) {
                return;
            }


            if (
                !confirm(
                    'Yakin ingin menghapus jadwal ini?'
                )
            ) {
                return;
            }


            if (
                currentModalType ===
                'mengajar'
            ) {

                teachingSchedules =
                    teachingSchedules.filter(
                        item =>
                            Number(item.id) !==
                            id
                    );

            }


            if (
                currentModalType ===
                'piket'
            ) {

                piketSchedules =
                    piketSchedules.filter(
                        item =>
                            Number(item.id) !==
                            id
                    );

            }


            closeScheduleModal();

            renderAll();

        }



        /*
        |--------------------------------------------------------------------------
        | SUBMIT FORM
        |--------------------------------------------------------------------------
        */

        document
            .getElementById('scheduleForm')
            .addEventListener(
                'submit',
                function(event) {

                    event.preventDefault();


                    const idValue =
                        document.getElementById(
                            'editId'
                        ).value;


                    const id =
                        idValue
                            ? Number(idValue)
                            : null;


                    const period =
                        getCurrentPeriod();


                    const hari =
                        document.getElementById(
                            'formHari'
                        ).value;


                    const mulai =
                        document.getElementById(
                            'formMulai'
                        ).value;


                    const selesai =
                        document.getElementById(
                            'formSelesai'
                        ).value;


                    if (
                        currentModalType ===
                        'mengajar'
                    ) {

                        const item = {

                            id:
                                id ??
                                Date.now(),

                            tahun:
                                period.tahun,

                            semester:
                                period.semester,

                            hari:
                                hari,

                            mulai:
                                mulai,

                            selesai:
                                selesai,

                            mapel:
                                document.getElementById(
                                    'formMapel'
                                ).value.trim() ||
                                '-',

                            guru:
                                document.getElementById(
                                    'formGuru'
                                ).value.trim() ||
                                '-',

                            kelas:
                                document.getElementById(
                                    'formKelas'
                                ).value.trim() ||
                                '-',

                            ruang:
                                document.getElementById(
                                    'formRuang'
                                ).value.trim() ||
                                '-'

                        };


                        if (id) {

                            const index =
                                teachingSchedules.findIndex(
                                    item =>
                                        Number(item.id) ===
                                        id
                                );


                            if (index !== -1) {

                                teachingSchedules[index] =
                                    item;

                            }

                        } else {

                            teachingSchedules.push(
                                item
                            );

                        }

                    }


                    if (
                        currentModalType ===
                        'piket'
                    ) {

                        const item = {

                            id:
                                id ??
                                Date.now(),

                            tahun:
                                period.tahun,

                            semester:
                                period.semester,

                            hari:
                                hari,

                            mulai:
                                mulai,

                            selesai:
                                selesai,

                            petugas:
                                document.getElementById(
                                    'formPetugas'
                                ).value.trim() ||
                                '-',

                            shift:
                                document.getElementById(
                                    'formShift'
                                ).value.trim() ||
                                '-',

                            lokasi:
                                document.getElementById(
                                    'formLokasi'
                                ).value.trim() ||
                                '-'

                        };


                        if (id) {

                            const index =
                                piketSchedules.findIndex(
                                    item =>
                                        Number(item.id) ===
                                        id
                                );


                            if (index !== -1) {

                                piketSchedules[index] =
                                    item;

                            }

                        } else {

                            piketSchedules.push(
                                item
                            );

                        }

                    }


                    closeScheduleModal();

                    renderAll();

                }
            );



        /*
        |--------------------------------------------------------------------------
        | TABS
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll('.schedule-tab')
            .forEach(button => {

                button.addEventListener(
                    'click',
                    function() {

                        const target =
                            this.dataset.tab;


                        document
                            .querySelectorAll(
                                '.schedule-tab'
                            )
                            .forEach(tab => {

                                tab.classList.remove(
                                    'active-tab',
                                    'bg-dark-green',
                                    'text-white'
                                );

                                tab.classList.add(
                                    'bg-white'
                                );


                                const icon =
                                    tab.querySelector(
                                        'i'
                                    );


                                if (icon) {

                                    icon.classList.remove(
                                        'text-mint-green'
                                    );

                                    icon.classList.add(
                                        'text-medium-green'
                                    );

                                }

                            });


                        this.classList.add(
                            'active-tab',
                            'bg-dark-green',
                            'text-white'
                        );

                        this.classList.remove(
                            'bg-white'
                        );


                        const activeIcon =
                            this.querySelector(
                                'i'
                            );


                        if (activeIcon) {

                            activeIcon.classList.remove(
                                'text-medium-green'
                            );

                            activeIcon.classList.add(
                                'text-mint-green'
                            );

                        }


                        document
                            .querySelectorAll(
                                '.schedule-panel'
                            )
                            .forEach(panel => {

                                panel.classList.add(
                                    'hidden'
                                );

                            });


                        document
                            .getElementById(
                                `panel-${target}`
                            )
                            .classList.remove(
                                'hidden'
                            );

                    }
                );

            });



        /*
        |--------------------------------------------------------------------------
        | MOBILE SIDEBAR
        |--------------------------------------------------------------------------
        */

        const mobileMenuButton =
            document.getElementById(
                'mobileMenuButton'
            );


        const mobileSidebar =
            document.getElementById(
                'mobileSidebar'
            );


        const mobileOverlay =
            document.getElementById(
                'mobileOverlay'
            );


        function openMobileSidebar() {

            mobileSidebar.classList.remove(
                '-translate-x-full'
            );

            mobileOverlay.classList.remove(
                'hidden'
            );

            document.body.classList.add(
                'overflow-hidden'
            );

        }


        function closeSidebar() {

            mobileSidebar.classList.add(
                '-translate-x-full'
            );

            mobileOverlay.classList.add(
                'hidden'
            );

            document.body.classList.remove(
                'overflow-hidden'
            );

        }


        mobileMenuButton.addEventListener(
            'click',
            openMobileSidebar
        );


        mobileOverlay.addEventListener(
            'click',
            closeSidebar
        );

        if (mobileSidebar) {

            mobileSidebar.querySelectorAll('a').forEach(link => {

                link.addEventListener('click', () => {

                    if (window.innerWidth < 768) {

                        closeSidebar();

                    }

                });

            });

        }



        /*
        |--------------------------------------------------------------------------
        | MODAL OVERLAY
        |--------------------------------------------------------------------------
        */

        document
            .getElementById('modalOverlay')
            .addEventListener(
                'click',
                closeScheduleModal
            );



        /*
        |--------------------------------------------------------------------------
        | ESC
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'keydown',
            function(event) {

                if (
                    event.key ===
                    'Escape'
                ) {

                    closeScheduleModal();

                    closeSidebar();

                    closeSearchDropdowns();

                }

            }
        );



        /*
        |--------------------------------------------------------------------------
        | INITIAL
        |--------------------------------------------------------------------------
        */

        renderAll();


        /* =====================================================
           MOBILE SCROLL HELPER
        ====================================================== */

        const scrollIndicator =
            document.getElementById('scrollIndicator');


        function updateScrollIndicator() {

            if (!scrollIndicator) return;


            const scrollTop =
                window.scrollY || window.pageYOffset;


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


            const indicatorTop =
                progress * maxTop;


            scrollIndicator.style.top =
                `${indicatorTop}px`;

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
                    document.documentElement.scrollHeight,

                behavior: 'smooth'

            });

        }

        updateScrollIndicator();

    </script>

</body>

</html>