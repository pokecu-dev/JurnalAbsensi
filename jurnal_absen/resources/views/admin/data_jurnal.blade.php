<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Monitoring Jurnal Kelas</title>

    <!-- Tailwind -->
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


<body class="bg-bg-cream text-dark-green font-sans min-h-screen">


    <!-- ========================================================= -->
    <!-- MOBILE HEADER -->
    <!-- ========================================================= -->

    <header class="md:hidden sticky top-0 z-40
                   bg-dark-green text-white
                   h-16 px-4
                   flex items-center justify-between
                   shadow-sm">

        <!-- LOGO -->
        <div class="flex items-center gap-2.5">

            <img src="{{ asset('image/logo.png') }}"
                 alt="Logo"
                 class="w-9 h-9 object-contain">

            <div>
                <div class="text-sm font-bold leading-tight">
                    Jurnal Absensi
                </div>

                <div class="text-[9px] text-gray-300">
                    Admin
                </div>
            </div>

        </div>


        <!-- HAMBURGER -->
        <button
            type="button"
            onclick="openSidebar()"
            class="w-9 h-9 rounded-xl
                   bg-white/10
                   flex items-center justify-center
                   hover:bg-white/20
                   transition">

            <i class="fa-solid fa-bars text-sm"></i>

        </button>

    </header>



    <!-- ========================================================= -->
    <!-- MOBILE OVERLAY -->
    <!-- ========================================================= -->

    <div id="sidebarOverlay"
         onclick="closeSidebar()"
         class="fixed inset-0 z-40
                bg-black/40
                hidden
                md:hidden">
    </div>

    <aside id="sidebar"
           class="fixed inset-y-0 left-0
                  w-60 md:w-56
                  bg-dark-green text-white
                  flex flex-col justify-between
                  p-6
                  z-50
                  -translate-x-full
                  md:translate-x-0
                  transition-transform duration-300 ease-in-out">


        <!-- ===================================================== -->
        <!-- BAGIAN ATAS -->
        <!-- ===================================================== -->

        <div>

            <!-- LOGO (disamakan dengan Dashboard: di tengah, tanpa tombol close) -->
            <div class="flex flex-col items-center
                        gap-2 mb-10 text-center">

                <img src="{{ asset('image/logo.png') }}"
                     alt="Logo"
                     class="w-16 h-auto">

                <span class="font-bold text-sm tracking-wide">
                    Jurnal Absensi
                </span>

            </div>


            <!-- ================================================= -->
            <!-- NAVIGASI -->
            <!-- ================================================= -->

            <nav class="flex flex-col gap-5 text-xs font-semibold">


                <!-- ================= UTAMA ================= -->

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
                                  rounded-xl
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-mint-green
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-house
                                      w-4 text-center"></i>

                            Dashboard

                        </a>


                        <!-- MONITORING JURNAL (ACTIVE) -->
                        <a href="{{ url('/admin/monitoring_jurnal') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  rounded-xl
                                  bg-white/10
                                  text-mint-green
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-book-bookmark
                                      w-4 text-center"></i>

                            Monitoring Jurnal

                        </a>


                        <!-- DISPENSASI -->
                        <a href="{{ url('/admin/data_dispensasi') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  rounded-xl
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-mint-green
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-file-signature
                                      w-4 text-center"></i>

                            Dispensasi

                        </a>

                    </div>

                </div>



                <!-- ================= DATA MASTER ================= -->

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
                                  rounded-xl
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-mint-green
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-chalkboard-user
                                      w-4 text-center"></i>

                            Data Guru

                        </a>


                        <!-- DATA SISWA -->
                        <a href="{{ url('/admin/data_siswa') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  rounded-xl
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-mint-green
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-user-graduate
                                      w-4 text-center"></i>

                            Data Siswa

                        </a>


                        <!-- DATA KELAS -->
                        <a href="{{ url('/admin/data_kelas') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  rounded-xl
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-mint-green
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-school
                                      w-4 text-center"></i>

                            Data Kelas

                        </a>


                        <!-- JADWAL -->
                        <a href="{{ url('/admin/jadwal') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  rounded-xl
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-mint-green
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-calendar-days
                                      w-4 text-center"></i>

                            Jadwal

                        </a>

                    </div>

                </div>

            </nav>

        </div>



        <!-- ===================================================== -->
        <!-- FOOTER SIDEBAR -->
        <!-- ===================================================== -->

        <div class="flex flex-col gap-1
                    pt-3
                    border-t border-white/10
                    text-xs">


            <!-- AKUN -->
            <a href="{{ url('/admin/akun') }}"
               class="flex items-center gap-2
                      px-2 py-2
                      rounded-lg
                      hover:bg-white/10
                      active:scale-[0.98]
                      transition-all duration-200">

                <i class="fa-solid fa-user-circle w-4"></i>

                <span>
                    Akun Admin
                </span>

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

                <span>
                    Logout
                </span>

            </a>

        </div>

    </aside>

    <div id="scrollHelper"
         class="md:hidden
                fixed right-2 sm:right-3
                top-1/2
                -translate-y-1/2
                z-30
                flex flex-col
                items-center
                gap-1">


        <!-- ATAS -->
        <button
            type="button"
            onclick="scrollToTop()"
            class="w-7 h-7
                   rounded-full
                   bg-white/90
                   border border-emerald-100
                   shadow-sm
                   text-medium-green
                   hover:bg-mint-green
                   transition
                   flex items-center
                   justify-center"
            title="Kembali ke atas">

            <i class="fa-solid fa-chevron-up text-[9px]"></i>

        </button>


        <!-- TRACK -->
        <div class="relative
                    w-1 h-24
                    bg-dark-green/10
                    rounded-full">

            <div id="scrollIndicator"
                 class="absolute left-0
                        w-1 h-7
                        bg-medium-green
                        rounded-full"
                 style="top: 0;">
            </div>

        </div>


        <!-- BAWAH -->
        <button
            type="button"
            onclick="scrollToBottom()"
            class="w-7 h-7
                   rounded-full
                   bg-white/90
                   border border-emerald-100
                   shadow-sm
                   text-medium-green
                   hover:bg-mint-green
                   transition
                   flex items-center
                   justify-center"
            title="Ke bagian bawah">

            <i class="fa-solid fa-chevron-down text-[9px]"></i>

        </button>

    </div>



    <!-- ========================================================= -->
    <!-- MAIN CONTENT -->
    <!-- ========================================================= -->

    <main class="min-w-0
                 p-4
                 pb-10
                 md:p-8
                 md:ml-56
                 max-w-full
                 md:max-w-[calc(100%-14rem)]
                 space-y-4
                 md:space-y-5">


        <!-- ===================================================== -->
        <!-- HEADER -->
        <!-- ===================================================== -->

        <header class="mb-1">

            <div class="flex flex-col
                        sm:flex-row
                        sm:items-center
                        sm:justify-between
                        gap-3">


                <!-- JUDUL -->
                <div>

                    <h1 class="text-xl md:text-2xl
                               font-extrabold
                               text-dark-green">

                        Monitoring Jurnal

                    </h1>


                    <p class="text-[11px] md:text-xs
                              text-medium-green
                              font-medium
                              mt-1">

                        Kelola dan pantau jurnal KBM berdasarkan kelas.

                    </p>

                </div>


                <!-- TAMBAH JURNAL -->
                <div class="flex">

                    <a href="#"
                       class="w-full sm:w-auto
                              bg-dark-green
                              hover:bg-medium-green
                              text-white
                              text-[11px] sm:text-xs
                              font-bold
                              px-4
                              py-2.5
                              rounded-xl
                              transition
                              inline-flex
                              items-center
                              justify-center
                              gap-2
                              whitespace-nowrap">

                        <i class="fa-solid fa-plus"></i>

                        Tambah Jurnal

                    </a>

                </div>

            </div>

        </header>



        <!-- ===================================================== -->
        <!-- FILTER -->
        <!-- ===================================================== -->

        <section class="bg-white
                        p-3.5 md:p-4
                        rounded-2xl
                        shadow-sm">


            <div class="grid grid-cols-1
                        sm:grid-cols-3
                        gap-3">


                <!-- TANGGAL -->
                <div>

                    <label class="block
                                  text-[10px]
                                  font-bold
                                  text-gray-400
                                  uppercase
                                  tracking-wider
                                  mb-1.5">

                        Tanggal

                    </label>


                    <input
                        type="date"
                        value="2026-07-21"
                        class="w-full
                               bg-gray-50
                               border border-gray-200
                               text-[11px] sm:text-xs
                               font-bold
                               rounded-xl
                               px-3 py-2.5
                               text-dark-green
                               outline-none
                               focus:border-medium-green">

                </div>


                <!-- KELAS -->
                <div>

                    <label class="block
                                  text-[10px]
                                  font-bold
                                  text-gray-400
                                  uppercase
                                  tracking-wider
                                  mb-1.5">

                        Kelas

                    </label>


                    <select
                        class="w-full
                               bg-gray-50
                               border border-gray-200
                               text-[11px] sm:text-xs
                               font-bold
                               rounded-xl
                               px-3 py-2.5
                               text-dark-green
                               outline-none
                               focus:border-medium-green">

                        <option>X AKL 1</option>
                        <option>X AKL 2</option>
                        <option>XI RPL 1</option>
                        <option>XI RPL 2</option>
                        <option>XI TKJ 1</option>

                    </select>

                </div>


                <!-- SEARCH -->
                <div>

                    <label class="block
                                  text-[10px]
                                  font-bold
                                  text-gray-400
                                  uppercase
                                  tracking-wider
                                  mb-1.5">

                        Cari

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


                        <input
                            type="text"
                            placeholder="Cari Jurnal Kelas...."
                            class="w-full
                                   bg-gray-50
                                   border border-gray-200
                                   text-[11px] sm:text-xs
                                   font-medium
                                   rounded-xl
                                   pl-9 pr-3
                                   py-2.5
                                   text-dark-green
                                   outline-none
                                   focus:border-medium-green">

                    </div>

                </div>

            </div>

        </section>



        <!-- ===================================================== -->
        <!-- KELAS XI RPL 2 -->
        <!-- ===================================================== -->

        <section class="bg-white
                        rounded-2xl
                        shadow-sm
                        overflow-hidden">


            <!-- HEADER KELAS -->
            <div class="p-3.5 md:p-4
                        border-b border-gray-100">

                <div class="flex items-center
                            justify-between
                            gap-3">


                    <!-- KIRI -->
                    <div class="flex items-center
                                gap-2.5
                                min-w-0">


                        <div class="w-10 h-10
                                    md:w-11 md:h-11
                                    rounded-xl
                                    bg-dark-green
                                    text-mint-green
                                    flex items-center
                                    justify-center
                                    font-black
                                    text-[10px] sm:text-xs
                                    shrink-0">

                            XI

                        </div>


                        <div class="min-w-0">

                            <div class="flex flex-wrap
                                        items-center
                                        gap-1.5">

                                <h2 class="text-sm
                                           font-extrabold
                                           text-dark-green">

                                    XI RPL 2

                                </h2>


                                <span
                                    class="bg-emerald-50
                                           text-emerald-700
                                           text-[9px] sm:text-[10px]
                                           font-bold
                                           px-2 py-0.5
                                           rounded-md">

                                    34/36 hadir

                                </span>

                            </div>


                            <p class="text-[10px] sm:text-[11px]
                                      text-gray-400
                                      mt-0.5">

                                Rabu, 23 September 2026

                            </p>

                        </div>

                    </div>


                    <!-- JUMLAH JURNAL -->
                    <span
                        class="bg-emerald-50
                               text-emerald-700
                               text-[9px] sm:text-[10px]
                               font-bold
                               px-2 sm:px-2.5
                               py-1
                               rounded-lg
                               shrink-0">

                        3 Jurnal

                    </span>

                </div>

            </div>



            <!-- ================================================= -->
            <!-- DAFTAR JURNAL -->
            <!-- ================================================= -->

            <div class="p-3 md:p-4
                        space-y-2.5 md:space-y-3">


                <!-- ================================================= -->
                <!-- JURNAL 1 -->
                <!-- ================================================= -->

                <div class="border border-gray-100
                            rounded-xl
                            p-3
                            hover:border-emerald-200
                            transition">

                    <div class="flex flex-col
                                sm:flex-row
                                sm:items-center
                                justify-between
                                gap-3">


                        <!-- INFO -->
                        <div class="flex items-start
                                    gap-2.5
                                    min-w-0">


                            <!-- JAM -->
                            <div class="w-12 sm:w-14
                                        shrink-0
                                        text-center">

                                <div class="text-[11px] sm:text-xs
                                            font-extrabold
                                            text-dark-green">

                                    1 - 2

                                </div>

                                <div class="text-[8px] sm:text-[9px]
                                            text-gray-400
                                            mt-0.5
                                            whitespace-nowrap">

                                    07.00 - 08.20

                                </div>

                            </div>


                            <!-- DETAIL -->
                            <div class="min-w-0">

                                <h3 class="text-[11px] sm:text-xs
                                           font-extrabold
                                           text-dark-green">

                                    Matematika Terapan

                                </h3>


                                <p class="text-[10px] sm:text-[11px]
                                          text-gray-500
                                          mt-1">

                                    Sulistyowati, S.Pd.

                                </p>


                                <p class="text-[9px] sm:text-[10px]
                                          text-gray-400
                                          mt-1
                                          leading-relaxed">

                                    Materi:

                                    <span class="text-gray-600">
                                        Polynomial & Teorema Sisa
                                    </span>

                                </p>

                            </div>

                        </div>


                        <!-- STATUS + DETAIL -->
                        <div class="flex items-center
                                    justify-end
                                    gap-1.5 sm:gap-2
                                    shrink-0">


                            <span
                                class="bg-emerald-50
                                       text-emerald-700
                                       text-[9px] sm:text-[10px]
                                       font-bold
                                       px-2 py-1
                                       rounded-lg">

                                <i class="fa-solid fa-check mr-1"></i>

                                Terisi

                            </span>


                            <a href="#"
                               class="inline-flex
                                      items-center
                                      gap-1
                                      bg-dark-green
                                      text-white
                                      hover:bg-medium-green
                                      text-[9px] sm:text-[10px]
                                      font-bold
                                      px-2.5 py-1.5
                                      rounded-lg
                                      transition">

                                <i class="fa-solid fa-eye"></i>

                                Detail

                            </a>

                        </div>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- JURNAL 2 -->
                <!-- ================================================= -->

                <div class="border border-gray-100
                            rounded-xl
                            p-3
                            hover:border-emerald-200
                            transition">

                    <div class="flex flex-col
                                sm:flex-row
                                sm:items-center
                                justify-between
                                gap-3">


                        <div class="flex items-start
                                    gap-2.5
                                    min-w-0">


                            <div class="w-12 sm:w-14
                                        shrink-0
                                        text-center">

                                <div class="text-[11px] sm:text-xs
                                            font-extrabold
                                            text-dark-green">

                                    3 - 4

                                </div>

                                <div class="text-[8px] sm:text-[9px]
                                            text-gray-400
                                            mt-0.5
                                            whitespace-nowrap">

                                    08.20 - 09.40

                                </div>

                            </div>


                            <div class="min-w-0">

                                <h3 class="text-[11px] sm:text-xs
                                           font-extrabold
                                           text-dark-green">

                                    Bimbingan Konseling

                                </h3>


                                <p class="text-[10px] sm:text-[11px]
                                          text-gray-500
                                          mt-1">

                                    Widodo, S.Kom.

                                </p>


                                <p class="text-[9px] sm:text-[10px]
                                          text-gray-400
                                          mt-1
                                          leading-relaxed">

                                    Materi:

                                    <span class="text-gray-600">
                                        Asesmen Diagnostik
                                    </span>

                                </p>

                            </div>

                        </div>


                        <div class="flex items-center
                                    justify-end
                                    gap-1.5 sm:gap-2
                                    shrink-0">


                            <span
                                class="bg-emerald-50
                                       text-emerald-700
                                       text-[9px] sm:text-[10px]
                                       font-bold
                                       px-2 py-1
                                       rounded-lg">

                                <i class="fa-solid fa-check mr-1"></i>

                                Terisi

                            </span>


                            <a href="#"
                               class="inline-flex
                                      items-center
                                      gap-1
                                      bg-dark-green
                                      text-white
                                      hover:bg-medium-green
                                      text-[9px] sm:text-[10px]
                                      font-bold
                                      px-2.5 py-1.5
                                      rounded-lg
                                      transition">

                                <i class="fa-solid fa-eye"></i>

                                Detail

                            </a>

                        </div>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- JURNAL 3 -->
                <!-- ================================================= -->

                <div class="border border-gray-100
                            rounded-xl
                            p-3
                            hover:border-emerald-200
                            transition">

                    <div class="flex flex-col
                                sm:flex-row
                                sm:items-center
                                justify-between
                                gap-3">


                        <div class="flex items-start
                                    gap-2.5
                                    min-w-0">


                            <div class="w-12 sm:w-14
                                        shrink-0
                                        text-center">

                                <div class="text-[11px] sm:text-xs
                                            font-extrabold
                                            text-dark-green">

                                    5 - 6

                                </div>

                                <div class="text-[8px] sm:text-[9px]
                                            text-gray-400
                                            mt-0.5
                                            whitespace-nowrap">

                                    10.00 - 11.20

                                </div>

                            </div>


                            <div class="min-w-0">

                                <h3 class="text-[11px] sm:text-xs
                                           font-extrabold
                                           text-dark-green">

                                    Bahasa Daerah

                                </h3>


                                <p class="text-[10px] sm:text-[11px]
                                          text-gray-500
                                          mt-1">

                                    Laili Ermawati, M.Pd.

                                </p>


                                <p class="text-[9px] sm:text-[10px]
                                          text-gray-400
                                          mt-1
                                          leading-relaxed">

                                    Materi:

                                    <span class="text-gray-600">
                                        Geguritan
                                    </span>

                                </p>

                            </div>

                        </div>


                        <div class="flex items-center
                                    justify-end
                                    gap-1.5 sm:gap-2
                                    shrink-0">


                            <span
                                class="bg-emerald-50
                                       text-emerald-700
                                       text-[9px] sm:text-[10px]
                                       font-bold
                                       px-2 py-1
                                       rounded-lg">

                                <i class="fa-solid fa-check mr-1"></i>

                                Terisi

                            </span>


                            <a href="#"
                               class="inline-flex
                                      items-center
                                      gap-1
                                      bg-dark-green
                                      text-white
                                      hover:bg-medium-green
                                      text-[9px] sm:text-[10px]
                                      font-bold
                                      px-2.5 py-1.5
                                      rounded-lg
                                      transition">

                                <i class="fa-solid fa-eye"></i>

                                Detail

                            </a>

                        </div>

                    </div>

                </div>


            </div>

        </section>


    </main>



    <!-- ========================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ========================================================= -->

    <script>

        /* =======================================================
           SIDEBAR MOBILE
        ======================================================= */

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


        /* Tutup sidebar ketika link diklik di mobile */
        document.querySelectorAll('#sidebar a').forEach(link => {

            link.addEventListener('click', function () {

                if (window.innerWidth < 768) {
                    closeSidebar();
                }

            });

        });


        /* =======================================================
           SCROLL HELPER
        ======================================================= */

        const scrollIndicator =
            document.getElementById('scrollIndicator');


        function updateScrollIndicator() {

            const scrollTop =
                window.scrollY;

            const maxScroll =
                document.documentElement.scrollHeight -
                window.innerHeight;


            if (maxScroll <= 0) {

                scrollIndicator.style.top = '0px';

                return;

            }


            const trackHeight = 96;

            const indicatorHeight = 28;

            const percentage =
                scrollTop / maxScroll;

            const maxTop =
                trackHeight - indicatorHeight;


            scrollIndicator.style.top =
                `${percentage * maxTop}px`;

        }


        function scrollToTop() {

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

        }


        function scrollToBottom() {

            window.scrollTo({
                top: document.documentElement.scrollHeight,
                behavior: 'smooth'
            });

        }


        window.addEventListener(
            'scroll',
            updateScrollIndicator
        );


        window.addEventListener(
            'resize',
            updateScrollIndicator
        );


        updateScrollIndicator();


    </script>

</body>
</html>