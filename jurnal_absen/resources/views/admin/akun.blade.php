<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Akun Admin</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
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
                        'cream': '#FFF4E1'
                    }
                }
            }
        }
    </script>

    <style>
        html {
            overflow-x: hidden;
        }

        body {
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #FFF4E1;
        }

        ::-webkit-scrollbar-thumb {
            background: #89D7B7;
            border-radius: 999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #428475;
        }

        #scrollIndicator {
            transition: top 0.15s ease-out;
        }
    </style>
</head>


<body class="bg-[#FFF4E1] text-gray-700 min-h-screen">


    <!-- ========================================================= -->
    <!-- MOBILE HEADER -->
    <!-- ========================================================= -->

    <header class="md:hidden sticky top-0 z-40
                   bg-[#1A312C]
                   text-white
                   px-4 py-3
                   shadow-lg
                   flex items-center justify-between">

        <div class="flex items-center gap-3">

            <img src="{{ asset('image/logo.png') }}"
                 alt="Logo"
                 class="w-9 h-9 object-contain">

            <div>

                <p class="text-[10px]
                          text-[#89D7B7]
                          font-bold
                          uppercase">

                    Admin

                </p>

                <p class="text-sm font-extrabold">

                    Akun Saya

                </p>

            </div>

        </div>


        <!-- HAMBURGER -->
        <button
            type="button"
            onclick="openSidebar()"
            aria-label="Buka menu"
            class="w-9 h-9
                   rounded-xl
                   bg-white/10
                   hover:bg-white/20
                   flex items-center justify-center
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
                hidden md:hidden">
    </div>



    <!-- ========================================================= -->
    <!-- MOBILE SIDEBAR (disamakan dengan halaman admin lain) -->
    <!-- ========================================================= -->

    <aside id="mobileSidebar"
           class="fixed inset-y-0 left-0
                  w-64
                  bg-[#1A312C]
                  text-white
                  p-6
                  z-50
                  -translate-x-full
                  transition-transform duration-300 ease-in-out
                  md:hidden
                  flex flex-col justify-between">

        <div>

            <!-- LOGO -->
            <div class="flex flex-col items-center gap-2 mb-10 text-center">

                <img src="{{ asset('image/logo.png') }}"
                     alt="Logo"
                     class="w-16 h-auto">

                <span class="font-bold text-sm tracking-wide">
                    Jurnal Absensi
                </span>

            </div>


            <!-- NAVIGASI -->
            <nav class="flex flex-col gap-5 text-xs font-semibold">


                <!-- UTAMA -->
                <div>

                    <div class="text-[10px] uppercase font-extrabold
                                text-gray-400 tracking-wider
                                mb-2 px-2">

                        Utama

                    </div>


                    <div class="space-y-1">

                        <a href="{{ url('/admin/dashboard') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-[#89D7B7]
                                  rounded-xl
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-house w-4 text-center"></i>
                            Dashboard

                        </a>


                        <a href="{{ url('/admin/monitoring_jurnal') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-[#89D7B7]
                                  rounded-xl
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-book-bookmark w-4 text-center"></i>
                            Monitoring Jurnal

                        </a>


                        <a href="{{ url('/admin/data_dispensasi') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-[#89D7B7]
                                  rounded-xl
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-file-signature w-4 text-center"></i>
                            Dispensasi

                        </a>

                    </div>

                </div>



                <!-- DATA MASTER -->
                <div>

                    <div class="text-[10px] uppercase font-extrabold
                                text-gray-400 tracking-wider
                                mb-2 px-2">

                        Data Master

                    </div>


                    <div class="space-y-1">

                        <a href="{{ url('/admin/data_guru') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-[#89D7B7]
                                  rounded-xl
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-chalkboard-user w-4 text-center"></i>
                            Data Guru

                        </a>


                        <a href="{{ url('/admin/data_siswa') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-[#89D7B7]
                                  rounded-xl
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-user-graduate w-4 text-center"></i>
                            Data Siswa

                        </a>


                        <a href="{{ url('/admin/data_kelas') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-[#89D7B7]
                                  rounded-xl
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-school w-4 text-center"></i>
                            Data Kelas

                        </a>


                        <a href="{{ url('/admin/jadwal') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-[#89D7B7]
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


        <!-- FOOTER SIDEBAR -->
        <div class="flex flex-col gap-1
                    pt-3
                    border-t border-white/10
                    text-xs">

            <!-- AKUN ADMIN (ACTIVE) -->
            <a href="{{ url('/admin/akun') }}"
               class="flex items-center gap-2
                      px-2 py-2
                      rounded-lg
                      bg-white/10
                      text-[#89D7B7]
                      font-bold
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



    <!-- ========================================================= -->
    <!-- SIDEBAR DESKTOP -->
    <!-- ========================================================= -->

    <aside class="hidden md:flex
                  fixed left-0 top-0 bottom-0
                  w-56
                  bg-[#1A312C]
                  text-white
                  flex-col
                  z-50">

        <!-- LOGO -->

        <div class="px-5 py-6">

            <div class="flex flex-col items-center gap-1.5 text-center">

                <img src="{{ asset('image/logo.png') }}"
                     alt="Logo"
                     class="w-12 h-auto object-contain">

                <div class="min-w-0">

                    <p class="text-sm font-black">
                        Jurnal Absensi
                    </p>

                    <p class="text-[10px]
                              text-[#89D7B7]
                              font-semibold">

                        Administrator

                    </p>

                </div>

            </div>

        </div>



        <!-- NAVIGATION -->

        <nav class="flex-1 px-3 overflow-y-auto">

            <div class="space-y-4 text-xs font-semibold">

                <!-- UTAMA -->
                <div>

                    <div class="text-[10px] uppercase font-extrabold
                                text-gray-400 tracking-wider
                                mb-1.5 px-2">

                        Utama

                    </div>


                    <div class="space-y-0.5">

                        <a href="{{ url('/admin/dashboard') }}"
                           class="flex items-center gap-3
                                  px-3 py-2
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-[#89D7B7]
                                  rounded-xl
                                  transition">

                            <i class="fa-solid fa-house w-4 text-center"></i>
                            Dashboard

                        </a>


                        <a href="{{ url('/admin/monitoring_jurnal') }}"
                           class="flex items-center gap-3
                                  px-3 py-2
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-[#89D7B7]
                                  rounded-xl
                                  transition">

                            <i class="fa-solid fa-book-bookmark w-4 text-center"></i>
                            Monitoring Jurnal

                        </a>


                        <a href="{{ url('/admin/data_dispensasi') }}"
                           class="flex items-center gap-3
                                  px-3 py-2
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-[#89D7B7]
                                  rounded-xl
                                  transition">

                            <i class="fa-solid fa-file-signature w-4 text-center"></i>
                            Dispensasi

                        </a>

                    </div>

                </div>



                <!-- DATA MASTER -->
                <div>

                    <div class="text-[10px] uppercase font-extrabold
                                text-gray-400 tracking-wider
                                mb-1.5 px-2">

                        Data Master

                    </div>


                    <div class="space-y-0.5">

                        <a href="{{ url('/admin/data_guru') }}"
                           class="flex items-center gap-3
                                  px-3 py-2
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-[#89D7B7]
                                  rounded-xl
                                  transition">

                            <i class="fa-solid fa-chalkboard-user w-4 text-center"></i>
                            Data Guru

                        </a>


                        <a href="{{ url('/admin/data_siswa') }}"
                           class="flex items-center gap-3
                                  px-3 py-2
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-[#89D7B7]
                                  rounded-xl
                                  transition">

                            <i class="fa-solid fa-user-graduate w-4 text-center"></i>
                            Data Siswa

                        </a>


                        <a href="{{ url('/admin/data_kelas') }}"
                           class="flex items-center gap-3
                                  px-3 py-2
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-[#89D7B7]
                                  rounded-xl
                                  transition">

                            <i class="fa-solid fa-school w-4 text-center"></i>
                            Data Kelas

                        </a>


                        <a href="{{ url('/admin/jadwal') }}"
                           class="flex items-center gap-3
                                  px-3 py-2
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-[#89D7B7]
                                  rounded-xl
                                  transition">

                            <i class="fa-solid fa-calendar-days w-4 text-center"></i>
                            Jadwal

                        </a>

                    </div>

                </div>

            </div>

        </nav>



        <!-- SIDEBAR FOOTER -->

        <div class="px-3 pb-4">

            <div class="border-t border-white/10 pt-3 space-y-1">

                <!-- AKUN -->

                <a href="{{ url('/admin/akun') }}"
                   class="flex items-center gap-3
                          px-4 py-3
                          bg-white/10
                          text-[#89D7B7]
                          rounded-xl">

                    <i class="fa-solid fa-user-circle w-4 text-center"></i>

                    <span class="text-sm font-bold">
                        Akun Admin
                    </span>

                </a>


                <!-- LOGOUT -->

                <a href="{{ route('logout') }}"
                   class="flex items-center gap-3
                          px-4 py-3
                          text-gray-300
                          hover:bg-red-500/10
                          hover:text-red-300
                          rounded-xl
                          transition">

                    <i class="fa-solid fa-right-from-bracket w-4 text-center"></i>

                    <span class="text-sm">
                        Logout
                    </span>

                </a>

            </div>

        </div>

    </aside>



    <!-- ========================================================= -->
    <!-- SCROLL HELPER MOBILE -->
    <!-- SAMA SEPERTI HALAMAN ADMIN LAIN -->
    <!-- ========================================================= -->

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
            title="Kembali ke atas"
            class="w-7 h-7
                   rounded-full
                   bg-white/90
                   border border-emerald-100
                   shadow-sm
                   text-[#428475]
                   hover:bg-[#89D7B7]
                   transition
                   flex items-center justify-center">

            <i class="fa-solid fa-chevron-up text-[9px]"></i>

        </button>


        <!-- TRACK -->
        <div class="relative
                    w-1 h-24
                    bg-[#1A312C]/10
                    rounded-full">

            <div id="scrollIndicator"
                 class="absolute left-0
                        w-1 h-7
                        bg-[#428475]
                        rounded-full"
                 style="top: 0;">
            </div>

        </div>


        <!-- BAWAH -->
        <button
            type="button"
            onclick="scrollToBottom()"
            title="Ke bagian bawah"
            class="w-7 h-7
                   rounded-full
                   bg-white/90
                   border border-emerald-100
                   shadow-sm
                   text-[#428475]
                   hover:bg-[#89D7B7]
                   transition
                   flex items-center justify-center">

            <i class="fa-solid fa-chevron-down text-[9px]"></i>

        </button>

    </div>



    <!-- ========================================================= -->
    <!-- MAIN -->
    <!-- ========================================================= -->

    <main class="md:ml-56
                 min-h-screen
                 p-4
                 pb-8
                 md:p-8">

        <!-- PAGE HEADER -->

        <div class="max-w-4xl mx-auto mb-6">


            <h1 class="text-2xl md:text-3xl
                       font-black
                       text-[#1A312C]">

                Akun Admin

            </h1>


            <p class="text-xs md:text-sm
                      text-gray-500
                      mt-1">

                Informasi akun dan identitas administrator sistem.

            </p>

        </div>



        <!-- ===================================================== -->
        <!-- PROFILE CARD -->
        <!-- ===================================================== -->

        <section class="max-w-4xl mx-auto">

            <div class="bg-white
                        rounded-3xl
                        shadow-sm
                        border border-gray-100
                        overflow-hidden">


                <!-- ================================================= -->
                <!-- PROFILE HEADER -->
                <!-- ================================================= -->

                <div class="bg-[#1A312C]
                            px-5 py-6
                            md:px-7">

                    <div class="flex items-center gap-4">


                        <!-- AVATAR -->

                        <div class="w-16 h-16
                                    md:w-20 md:h-20
                                    rounded-2xl
                                    bg-[#89D7B7]
                                    text-[#1A312C]
                                    flex items-center justify-center
                                    shrink-0
                                    font-black
                                    text-2xl
                                    md:text-3xl">

                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

                        </div>



                        <!-- NAME -->

                        <div class="min-w-0">

                            <p class="text-[10px]
                                      uppercase
                                      tracking-wider
                                      text-[#89D7B7]
                                      font-bold
                                      mb-1">

                                Administrator

                            </p>


                            <h2 class="text-lg md:text-xl
                                       font-black
                                       text-white
                                       truncate">

                                {{ auth()->user()->name ?? 'Nama Admin' }}

                            </h2>


                            <div class="flex flex-wrap
                                        items-center
                                        gap-2
                                        mt-2">

                                <!-- ROLE -->

                                <span class="inline-flex
                                             items-center gap-1.5
                                             bg-white/10
                                             text-[#89D7B7]
                                             px-2.5 py-1
                                             rounded-lg
                                             text-[9px]
                                             font-bold">

                                    <i class="fa-solid fa-shield-halved"></i>

                                    Admin

                                </span>


                                <!-- STATUS -->

                                <span class="inline-flex
                                             items-center gap-1.5
                                             bg-emerald-400/10
                                             text-emerald-300
                                             px-2.5 py-1
                                             rounded-lg
                                             text-[9px]
                                             font-bold">

                                    <span class="w-1.5 h-1.5
                                                 rounded-full
                                                 bg-emerald-400">
                                    </span>

                                    Aktif

                                </span>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- CONTENT -->
                <!-- ================================================= -->

                <div class="p-5 md:p-7">


                    <!-- ================================================= -->
                    <!-- INFORMASI AKUN -->
                    <!-- ================================================= -->

                    <div class="mb-5">

                        <h3 class="text-sm
                                   font-black
                                   text-[#1A312C]">

                            Informasi Akun

                        </h3>

                        <p class="text-[10px]
                                  text-gray-400
                                  mt-1">

                            Data akun yang digunakan untuk masuk ke sistem.

                        </p>

                    </div>



                    <div class="grid grid-cols-1
                                md:grid-cols-2
                                gap-4">


                        <!-- USERNAME -->

                        <div class="border border-gray-100
                                    rounded-2xl
                                    p-4
                                    bg-gray-50/50">

                            <div class="flex items-start gap-3">

                                <div class="w-9 h-9
                                            rounded-xl
                                            bg-[#1A312C]
                                            text-[#89D7B7]
                                            flex items-center justify-center
                                            shrink-0">

                                    <i class="fa-solid fa-at text-xs"></i>

                                </div>


                                <div class="min-w-0">

                                    <p class="text-[9px]
                                              uppercase
                                              tracking-wider
                                              font-bold
                                              text-gray-400">

                                        Username

                                    </p>

                                    <p class="text-sm
                                              font-bold
                                              text-[#1A312C]
                                              mt-1
                                              break-all">

                                        {{ auth()->user()->username ?? '-' }}

                                    </p>

                                </div>

                            </div>

                        </div>



                        <!-- EMAIL -->

                        <div class="border border-gray-100
                                    rounded-2xl
                                    p-4
                                    bg-gray-50/50">

                            <div class="flex items-start gap-3">

                                <div class="w-9 h-9
                                            rounded-xl
                                            bg-[#1A312C]
                                            text-[#89D7B7]
                                            flex items-center justify-center
                                            shrink-0">

                                    <i class="fa-solid fa-envelope text-xs"></i>

                                </div>


                                <div class="min-w-0">

                                    <p class="text-[9px]
                                              uppercase
                                              tracking-wider
                                              font-bold
                                              text-gray-400">

                                        Email

                                    </p>

                                    <p class="text-sm
                                              font-bold
                                              text-[#1A312C]
                                              mt-1
                                              break-all">

                                        {{ auth()->user()->email ?? '-' }}

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>



                    <!-- ================================================= -->
                    <!-- DATA IDENTITAS -->
                    <!-- ================================================= -->

                    <div class="mt-8 mb-5">

                        <h3 class="text-sm
                                   font-black
                                   text-[#1A312C]">

                            Data Identitas

                        </h3>

                        <p class="text-[10px]
                                  text-gray-400
                                  mt-1">

                            Informasi identitas dasar administrator.

                        </p>

                    </div>



                    <div class="grid grid-cols-1
                                md:grid-cols-2
                                gap-4">


                        <!-- NIP / NIK -->

                        <div class="border border-gray-100
                                    rounded-2xl
                                    p-4
                                    bg-gray-50/30">

                            <p class="text-[9px]
                                      uppercase
                                      tracking-wider
                                      font-bold
                                      text-gray-400">

                                NIP / NIK

                            </p>

                            <p class="text-sm
                                      font-bold
                                      text-[#1A312C]
                                      mt-1
                                      break-all">

                                {{ auth()->user()->nip ?? auth()->user()->nik ?? '-' }}

                            </p>

                        </div>



                        <!-- NOMOR HP -->

                        <div class="border border-gray-100
                                    rounded-2xl
                                    p-4
                                    bg-gray-50/30">

                            <p class="text-[9px]
                                      uppercase
                                      tracking-wider
                                      font-bold
                                      text-gray-400">

                                Nomor HP

                            </p>

                            <p class="text-sm
                                      font-bold
                                      text-[#1A312C]
                                      mt-1
                                      break-all">

                                {{ auth()->user()->no_hp ?? auth()->user()->phone ?? '-' }}

                            </p>

                        </div>

                    </div>

                    <!-- ================================================= -->
                    <!-- INFO ADMIN -->
                    <!-- ================================================= -->

                    <div class="mt-6
                                rounded-2xl
                                bg-[#89D7B7]/15
                                border border-[#89D7B7]/40
                                p-4">

                        <div class="flex items-start gap-3">

                            <div class="w-9 h-9
                                        rounded-xl
                                        bg-[#1A312C]
                                        text-[#89D7B7]
                                        flex items-center justify-center
                                        shrink-0">

                                <i class="fa-solid fa-shield-halved text-xs"></i>

                            </div>


                            <div class="min-w-0">

                                <p class="text-xs
                                          font-black
                                          text-[#1A312C]">

                                    Akun Administrator

                                </p>

                                <p class="text-[10px]
                                          leading-relaxed
                                          text-gray-600
                                          mt-1">

                                    Akun ini memiliki akses untuk mengelola
                                    data dan fitur administrasi sistem.
                                    Pastikan informasi akun tetap aman dan
                                    jangan membagikan kata sandi kepada orang lain.

                                </p>

                            </div>

                        </div>

                    </div>


                </div>

            </div>

        </section>



        <!-- ========================================================= -->
        <!-- FOOTER -->
        <!-- ========================================================= -->

        <div class="max-w-4xl mx-auto
                    mt-6
                    text-center">

            <p class="text-[10px]
                      text-gray-400">

                Jurnal Absensi Sekolah

                <span class="mx-1">•</span>

                Akun Admin

            </p>

        </div>

    </main>


    <!-- ========================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ========================================================= -->

    <script>

        /* =======================================================
           SIDEBAR MOBILE
        ======================================================= */

        const mobileSidebar =
            document.getElementById('mobileSidebar');

        const sidebarOverlay =
            document.getElementById('sidebarOverlay');


        function openSidebar() {

            mobileSidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');

        }


        function closeSidebar() {

            mobileSidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');

        }


        /* Tutup sidebar ketika link diklik di mobile */
        document.querySelectorAll('#mobileSidebar a').forEach(link => {

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

            const scrollTop = window.scrollY;

            const maxScroll =
                document.documentElement.scrollHeight -
                window.innerHeight;


            if (maxScroll <= 0) {

                scrollIndicator.style.top = '0px';
                return;

            }


            const trackHeight = 96;
            const indicatorHeight = 28;

            const percentage = scrollTop / maxScroll;
            const maxTop = trackHeight - indicatorHeight;


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


        window.addEventListener('scroll', updateScrollIndicator);
        window.addEventListener('resize', updateScrollIndicator);

        updateScrollIndicator();

    </script>

</body>
</html>