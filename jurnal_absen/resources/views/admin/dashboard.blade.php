<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FontAwesome -->
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
    </style>
</head>


<body class="bg-bg-cream text-dark-green font-sans
             min-h-screen overflow-x-hidden overscroll-none">


    <!-- ===================================================== -->
    <!-- MOBILE HEADER -->
    <!-- ===================================================== -->

    <div class="md:hidden
                bg-dark-green text-white
                p-4
                flex items-center justify-between
                sticky top-0 z-40
                shadow-sm">

        <div class="flex items-center gap-2">

            <img src="{{ asset('image/logo.png') }}"
                 alt="Logo"
                 class="w-8 h-8 object-contain">

            <span class="font-bold text-sm tracking-wide">
                Jurnal Absensi
            </span>

        </div>


        <button id="hamburgerBtn"
                type="button"
                class="w-9 h-9
                       rounded-lg
                       flex items-center justify-center
                       hover:bg-white/10
                       transition
                       focus:outline-none">

            <i class="fa-solid fa-bars"></i>

        </button>

    </div>



    <!-- ===================================================== -->
    <!-- MOBILE SIDEBAR OVERLAY -->
    <!-- ===================================================== -->

    <div id="sidebarOverlay"
         class="fixed inset-0
                bg-black/50
                z-40
                hidden
                md:hidden">
    </div>



    <!-- ===================================================== -->
    <!-- SIDEBAR -->
    <!-- ===================================================== -->

    <aside id="sidebar"
           class="fixed inset-y-0 left-0
                  w-60
                  bg-dark-green text-white
                  p-6
                  flex flex-col justify-between
                  z-50
                  -translate-x-full
                  md:translate-x-0
                  transition-transform duration-300">


        <!-- ================================================= -->
        <!-- SIDEBAR TOP -->
        <!-- ================================================= -->

        <div>


            <!-- LOGO -->

            <div class="flex flex-col
                        items-center
                        gap-2
                        mb-10
                        text-center">

                <img src="{{ asset('image/logo.png') }}"
                     alt="Logo"
                     class="w-16 h-auto">

                <span class="font-bold text-sm tracking-wide">
                    Jurnal Absensi
                </span>

            </div>



            <!-- ================================================= -->
            <!-- NAVIGATION -->
            <!-- ================================================= -->

            <nav class="flex flex-col gap-5
                        font-semibold text-xs">


                <!-- ========================= -->
                <!-- UTAMA -->
                <!-- ========================= -->

                <div>

                    <div class="text-[10px]
                                uppercase
                                font-extrabold
                                text-gray-400
                                tracking-wider
                                mb-2
                                px-2">

                        Utama

                    </div>


                    <div class="space-y-1">


                        <!-- DASHBOARD -->

                        <a href="{{ url('/admin/dashboard') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  bg-white/10
                                  text-mint-green
                                  rounded-xl
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-house w-4 text-center"></i>

                            Dashboard

                        </a>



                        <!-- MONITORING JURNAL -->

                        <a href="{{ url('/admin/data_jurnal') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-mint-green
                                  rounded-xl
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-book-bookmark w-4 text-center"></i>

                            Monitoring Jurnal

                        </a>



                        <!-- DISPENSASI -->

                        <a href="{{ url('/admin/data_dispensasi') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-mint-green
                                  rounded-xl
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-file-signature w-4 text-center"></i>

                            Dispensasi

                        </a>

                    </div>

                </div>



                <!-- ========================= -->
                <!-- DATA MASTER -->
                <!-- ========================= -->

                <div>

                    <div class="text-[10px]
                                uppercase
                                font-extrabold
                                text-gray-400
                                tracking-wider
                                mb-2
                                px-2">

                        Data Master

                    </div>


                    <div class="space-y-1">


                        <!-- DATA GURU -->

                        <a href="{{ url('/admin/data_guru') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-mint-green
                                  rounded-xl
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-chalkboard-user w-4 text-center"></i>

                            Data Guru

                        </a>



                        <!-- DATA SISWA -->

                        <a href="{{ url('/admin/data_siswa') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-mint-green
                                  rounded-xl
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-user-graduate w-4 text-center"></i>

                            Data Siswa

                        </a>



                        <!-- DATA KELAS -->

                        <a href="{{ url('/admin/data_kelas') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-mint-green
                                  rounded-xl
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-school w-4 text-center"></i>

                            Data Kelas

                        </a>



                        <!-- JADWAL -->

                        <a href="{{ url('/admin/jadwal') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-mint-green
                                  rounded-xl
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-calendar-days w-4 text-center"></i>

                            Jadwal

                        </a>

                    </div>

                </div>

            </nav>

        </div>



        <!-- ================================================= -->
        <!-- FOOTER SIDEBAR -->
        <!-- ================================================= -->

        <div class="flex flex-col gap-1
                    pt-3
                    border-t border-white/10
                    text-xs">


            <!-- AKUN ADMIN -->

            <a href="{{ url('/admin/akun') }}"
               class="flex items-center gap-2
                      px-2 py-2
                      rounded-lg
                      hover:bg-white/10
                      active:scale-[0.98]
                      transition-all duration-200">

                <i class="fa-solid fa-user-circle w-4"></i>

                <span>Akun Admin</span>

            </a>



            <!-- LOGOUT -->

            <a href="{{ route('logout') }}"
               class="w-full
                      flex items-center gap-2
                      px-2 py-2
                      rounded-lg
                      hover:bg-white/10
                      active:scale-[0.98]
                      transition-all duration-200">

                <i class="fa-solid fa-right-from-bracket w-4"></i>

                <span>Logout</span>

            </a>

        </div>

    </aside>



    <!-- ===================================================== -->
    <!-- MAIN CONTENT -->
    <!-- ===================================================== -->

    <main class="min-w-0
                 p-4 pb-10
                 md:p-8
                 md:ml-60
                 max-w-full
                 md:max-w-[calc(100%-15rem)]
                 space-y-4 md:space-y-6">


        <!-- ================================================= -->
        <!-- HEADER -->
        <!-- ================================================= -->

        <header class="flex items-center justify-between gap-3">

            <div class="min-w-0">

                <h1 class="text-lg sm:text-xl md:text-2xl
                           font-black
                           text-dark-green
                           tracking-tight">

                    Dashboard Admin

                </h1>


                <p class="text-[11px] sm:text-xs
                          text-medium-green
                          font-semibold
                          mt-1">

                    SMK Negeri 1 Boyolangu

                </p>

            </div>


            <!-- JAM -->

            <div class="text-right leading-tight shrink-0">

                <div id="live-date"
                     class="text-[9px] sm:text-[10px] md:text-xs
                            font-semibold
                            text-medium-green
                            whitespace-nowrap">

                    {{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}

                </div>


                <div id="live-clock"
                     class="text-[10px] sm:text-xs
                            font-extrabold
                            text-dark-green
                            mt-0.5">

                    {{ now()->format('H.i') }} WIB

                </div>

            </div>

        </header>



        <!-- ================================================= -->
        <!-- 3 SUMMARY CARDS -->
        <!-- ================================================= -->

        <section class="grid grid-cols-3
                        gap-2.5 sm:gap-3 md:gap-4">


            <!-- CARD JURNAL -->

            <a href="{{ url('/admin/data_jurnal') }}"
               class="group
                      bg-white
                      rounded-2xl
                      p-3.5 sm:p-4 md:p-5
                      shadow-sm
                      border border-gray-100
                      hover:shadow-md
                      hover:-translate-y-1
                      transition-all duration-200
                      active:scale-[0.98]">


                <div class="flex items-center
                            justify-between
                            mb-3 md:mb-4">

                    <div class="w-10 h-10
                                md:w-11 md:h-11
                                rounded-xl
                                bg-green-100
                                flex items-center
                                justify-center
                                shrink-0
                                group-hover:scale-105
                                transition">

                        <i class="fa-solid fa-book-open
                                  text-[#428475]
                                  text-base md:text-lg">
                        </i>

                    </div>


                    <i class="fa-solid fa-arrow-right
                              text-gray-300
                              text-sm
                              md:text-base
                              group-hover:text-medium-green
                              transition">
                    </i>

                </div>


                <p class="text-xs
                          md:text-sm
                          text-gray-500">

                    Jurnal

                </p>


                <h3 class="text-xl
                           md:text-2xl
                           font-black
                           text-dark-green
                           mt-1">

                    -

                </h3>


                <p class="text-[10px]
                          md:text-xs
                          text-gray-400
                          mt-0.5 md:mt-1
                          whitespace-nowrap">

                    Data jurnal

                </p>

            </a>



            <!-- CARD GURU -->

            <a href="{{ url('/admin/data_guru') }}"
               class="group
                      bg-white
                      rounded-2xl
                      p-3.5 sm:p-4 md:p-5
                      shadow-sm
                      border border-gray-100
                      hover:shadow-md
                      hover:-translate-y-1
                      transition-all duration-200
                      active:scale-[0.98]">


                <div class="flex items-center
                            justify-between
                            mb-3 md:mb-4">

                    <div class="w-10 h-10
                                md:w-11 md:h-11
                                rounded-xl
                                bg-blue-100
                                flex items-center
                                justify-center
                                shrink-0
                                group-hover:scale-105
                                transition">

                        <i class="fa-solid fa-chalkboard-teacher
                                  text-blue-600
                                  text-base md:text-lg">
                        </i>

                    </div>


                    <i class="fa-solid fa-arrow-right
                              text-gray-300
                              text-sm
                              md:text-base
                              group-hover:text-medium-green
                              transition">
                    </i>

                </div>


                <p class="text-xs
                          md:text-sm
                          text-gray-500">

                    Guru

                </p>


                <h3 class="text-xl
                           md:text-2xl
                           font-black
                           text-dark-green
                           mt-1">

                    -

                </h3>


                <p class="text-[10px]
                          md:text-xs
                          text-gray-400
                          mt-0.5 md:mt-1
                          whitespace-nowrap">

                    Data guru

                </p>

            </a>



            <!-- CARD SISWA -->

            <a href="{{ url('/admin/data_siswa') }}"
               class="group
                      bg-white
                      rounded-2xl
                      p-3.5 sm:p-4 md:p-5
                      shadow-sm
                      border border-gray-100
                      hover:shadow-md
                      hover:-translate-y-1
                      transition-all duration-200
                      active:scale-[0.98]">


                <div class="flex items-center
                            justify-between
                            mb-3 md:mb-4">

                    <div class="w-10 h-10
                                md:w-11 md:h-11
                                rounded-xl
                                bg-purple-100
                                flex items-center
                                justify-center
                                shrink-0
                                group-hover:scale-105
                                transition">

                        <i class="fa-solid fa-user-graduate
                                  text-purple-600
                                  text-base md:text-lg">
                        </i>

                    </div>


                    <i class="fa-solid fa-arrow-right
                              text-gray-300
                              text-sm
                              md:text-base
                              group-hover:text-medium-green
                              transition">
                    </i>

                </div>


                <p class="text-xs
                          md:text-sm
                          text-gray-500">

                    Siswa

                </p>


                <h3 class="text-xl
                           md:text-2xl
                           font-black
                           text-dark-green
                           mt-1">

                    -

                </h3>


                <p class="text-[10px]
                          md:text-xs
                          text-gray-400
                          mt-0.5 md:mt-1
                          whitespace-nowrap">

                    Data siswa

                </p>

            </a>

        </section>



        <!-- ================================================= -->
        <!-- PENGAJUAN DISPENSASI -->
        <!-- ================================================= -->

        <section class="bg-white
                        p-4 md:p-5
                        rounded-2xl
                        shadow-sm
                        border border-gray-100">


            <div class="flex items-start
                        justify-between
                        gap-3
                        mb-4">

                <div class="min-w-0">

                    <h2 class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Pengajuan Dispensasi

                    </h2>


                    <p class="text-[10px] md:text-xs
                              text-gray-400
                              mt-1">

                        Data siswa yang mengajukan dispensasi

                    </p>

                </div>


                <a href="{{ url('/admin/data_dispensasi') }}"
                   class="text-[10px] md:text-xs
                          font-bold
                          text-medium-green
                          hover:text-dark-green
                          whitespace-nowrap">

                    Lihat semua →

                </a>

            </div>



            <div class="space-y-3">


                <!-- DISPENSASI 1 -->

                <div class="flex flex-col
                            sm:flex-row
                            sm:items-center
                            justify-between
                            gap-3
                            p-3
                            rounded-xl
                            bg-gray-50
                            hover:bg-gray-100
                            transition">

                    <div class="min-w-0">

                        <p class="text-xs sm:text-sm
                                  font-bold
                                  text-dark-green">

                            Andi Pratama

                        </p>


                        <p class="text-[10px] sm:text-xs
                                  text-gray-500
                                  mt-1">

                            XI RPL 2

                        </p>


                        <p class="text-[10px] sm:text-xs
                                  text-gray-600
                                  mt-1">

                            Kebutuhan: Lomba

                        </p>

                    </div>


                    <span class="self-start
                                 sm:self-center
                                 bg-amber-100
                                 text-amber-700
                                 font-bold
                                 px-2.5 py-1
                                 rounded-md
                                 text-[9px] sm:text-[10px]">

                        Menunggu

                    </span>

                </div>



                <!-- DISPENSASI 2 -->

                <div class="flex flex-col
                            sm:flex-row
                            sm:items-center
                            justify-between
                            gap-3
                            p-3
                            rounded-xl
                            bg-gray-50
                            hover:bg-gray-100
                            transition">

                    <div class="min-w-0">

                        <p class="text-xs sm:text-sm
                                  font-bold
                                  text-dark-green">

                            Siti Nurhaliza

                        </p>


                        <p class="text-[10px] sm:text-xs
                                  text-gray-500
                                  mt-1">

                            XI DKV 1

                        </p>


                        <p class="text-[10px] sm:text-xs
                                  text-gray-600
                                  mt-1">

                            Kebutuhan: Keperluan keluarga

                        </p>

                    </div>


                    <span class="self-start
                                 sm:self-center
                                 bg-amber-100
                                 text-amber-700
                                 font-bold
                                 px-2.5 py-1
                                 rounded-md
                                 text-[9px] sm:text-[10px]">

                        Menunggu

                    </span>

                </div>


            </div>

        </section>



        <!-- ================================================= -->
        <!-- RIWAYAT JURNAL HARI INI -->
        <!-- ================================================= -->

        <section class="bg-white
                        p-4 md:p-5
                        rounded-2xl
                        shadow-sm
                        border border-gray-100">


            <div class="flex items-start
                        justify-between
                        gap-3
                        mb-4">

                <div class="min-w-0">

                    <h2 class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Riwayat Jurnal Hari Ini

                    </h2>


                    <p class="text-[10px] md:text-xs
                              text-gray-400
                              mt-1">

                        Jurnal yang telah diisi guru hari ini

                    </p>

                </div>


                <a href="{{ url('/admin/data_jurnal') }}"
                   class="text-[10px] md:text-xs
                          font-bold
                          text-medium-green
                          hover:text-dark-green
                          whitespace-nowrap">

                    Lihat semua →

                </a>

            </div>



            <!-- MOBILE JOURNAL LIST -->

            <div class="space-y-2.5 md:hidden">


                <!-- ITEM 1 -->

                <div class="p-3
                            rounded-xl
                            border border-gray-100
                            bg-gray-50">

                    <div class="flex items-start
                                justify-between
                                gap-3">

                        <div class="min-w-0">

                            <p class="text-xs
                                      font-extrabold
                                      text-dark-green
                                      truncate">

                                Sulistyowati, S.Pd.

                            </p>


                            <p class="text-[10px]
                                      text-medium-green
                                      font-semibold
                                      mt-1">

                                XI RPL 2

                            </p>


                            <p class="text-[10px]
                                      text-gray-500
                                      mt-1
                                      truncate">

                                Matematika Terapan

                            </p>

                        </div>


                        <span class="shrink-0
                                     bg-emerald-50
                                     text-emerald-700
                                     font-bold
                                     px-2 py-1
                                     rounded-md
                                     text-[9px]">

                            Terisi

                        </span>

                    </div>

                </div>



                <!-- ITEM 2 -->

                <div class="p-3
                            rounded-xl
                            border border-gray-100
                            bg-gray-50">

                    <div class="flex items-start
                                justify-between
                                gap-3">

                        <div class="min-w-0">

                            <p class="text-xs
                                      font-extrabold
                                      text-dark-green
                                      truncate">

                                Bambang S., M.Pd.

                            </p>


                            <p class="text-[10px]
                                      text-medium-green
                                      font-semibold
                                      mt-1">

                                XI TKJ 3

                            </p>


                            <p class="text-[10px]
                                      text-gray-500
                                      mt-1
                                      truncate">

                                PJOK / Olahraga

                            </p>

                        </div>


                        <span class="shrink-0
                                     bg-emerald-50
                                     text-emerald-700
                                     font-bold
                                     px-2 py-1
                                     rounded-md
                                     text-[9px]">

                            Terisi

                        </span>

                    </div>

                </div>


            </div>



            <!-- DESKTOP TABLE -->

            <div class="hidden md:block
                        overflow-x-auto
                        border border-gray-100
                        rounded-xl">


                <table class="w-full
                              text-left
                              text-xs">


                    <thead>

                        <tr class="text-gray-400
                                   border-b border-gray-100
                                   bg-gray-50/50
                                   text-[10px]
                                   uppercase
                                   tracking-wider">


                            <th class="p-3 font-bold">
                                Guru
                            </th>


                            <th class="p-3 font-bold">
                                Kelas
                            </th>


                            <th class="p-3 font-bold">
                                Mata Pelajaran
                            </th>


                            <th class="p-3
                                       font-bold
                                       text-right">

                                Status

                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">


                        <!-- JOURNAL 1 -->

                        <tr class="hover:bg-gray-50
                                   transition">


                            <td class="p-3
                                       font-bold
                                       text-dark-green">

                                Sulistyowati, S.Pd.

                            </td>


                            <td class="p-3
                                       text-gray-500">

                                XI RPL 2

                            </td>


                            <td class="p-3
                                       text-gray-600">

                                Matematika Terapan

                            </td>


                            <td class="p-3
                                       text-right">

                                <span class="bg-emerald-50
                                             text-emerald-700
                                             font-bold
                                             px-2.5 py-1
                                             rounded-md
                                             text-[10px]">

                                    Terisi

                                </span>

                            </td>

                        </tr>



                        <!-- JOURNAL 2 -->

                        <tr class="hover:bg-gray-50
                                   transition">


                            <td class="p-3
                                       font-bold
                                       text-dark-green">

                                Bambang S., M.Pd.

                            </td>


                            <td class="p-3
                                       text-gray-500">

                                XI TKJ 3

                            </td>


                            <td class="p-3
                                       text-gray-600">

                                PJOK / Olahraga

                            </td>


                            <td class="p-3
                                       text-right">

                                <span class="bg-emerald-50
                                             text-emerald-700
                                             font-bold
                                             px-2.5 py-1
                                             rounded-md
                                             text-[10px]">

                                    Terisi

                                </span>

                            </td>

                        </tr>


                    </tbody>

                </table>

            </div>

        </section>


    </main>



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



    <!-- ===================================================== -->
    <!-- SCRIPT MOBILE SIDEBAR + SCROLL HELPER -->
    <!-- ===================================================== -->

    <script>

        /* =====================================================
           MOBILE SIDEBAR
        ====================================================== */

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


        /*
         * Kalau layar berubah dari mobile
         * ke desktop, reset sidebar.
         */

        window.addEventListener('resize', () => {

            if (window.innerWidth >= 768) {

                sidebarOverlay.classList.add('hidden');

                document.body.classList.remove('overflow-hidden');

            }

        });



        /* =====================================================
           JAM LIVE (HEADER)
           SAMA SEPERTI HALAMAN GURU PIKET
        ====================================================== */

        function updateLiveTime() {

            const now = new Date();

            const dateEl = document.getElementById('live-date');
            const clockEl = document.getElementById('live-clock');


            if (dateEl) {

                dateEl.textContent = now.toLocaleDateString('id-ID', {
                    weekday: 'long',
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
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


            /*
             * Kalau halaman tidak cukup panjang
             * untuk di-scroll.
             */

            if (maxScroll <= 0) {

                scrollIndicator.style.top = '0px';

                return;

            }


            /*
             * Tinggi track:
             * h-28 = 112px
             *
             * Tinggi indicator:
             * h-8 = 32px
             */

            const trackHeight = 112;

            const indicatorHeight = 32;


            const maxTop =
                trackHeight - indicatorHeight;


            /*
             * Hitung posisi scroll
             * 0 = paling atas
             * 1 = paling bawah
             */

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


        /*
         * Update indikator ketika halaman di-scroll.
         */

        window.addEventListener(
            'scroll',
            updateScrollIndicator,
            { passive: true }
        );


        /*
         * Update ketika ukuran layar berubah.
         */

        window.addEventListener(
            'resize',
            updateScrollIndicator
        );


        /*
         * Tombol kembali ke atas.
         */

        function scrollToTop() {

            window.scrollTo({

                top: 0,

                behavior: 'smooth'

            });

        }


        /*
         * Tombol langsung ke bagian paling bawah.
         */

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