<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengajuan Dispensasi</title>

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

    <header
        class="md:hidden sticky top-0 z-40
               bg-dark-green text-white
               h-16 px-4
               flex items-center justify-between
               shadow-sm">

        <div class="flex items-center gap-3">

            <img src="{{ asset('image/logo.png') }}"
                 alt="Logo"
                 class="w-9 h-9 object-contain">

            <div>
                <div class="text-sm font-extrabold leading-tight">
                    Jurnal Absensi
                </div>

                <div class="text-[10px] text-mint-green mt-0.5">
                    Admin
                </div>
            </div>

        </div>


        <!-- BUTTON SIDEBAR -->
        <button
            type="button"
            onclick="openSidebar()"
            aria-label="Buka menu"
            class="w-10 h-10
                   rounded-xl
                   bg-white/10
                   hover:bg-white/15
                   flex items-center justify-center
                   transition">

            <i class="fa-solid fa-bars text-sm"></i>

        </button>

    </header>



    <!-- ========================================================= -->
    <!-- SIDEBAR OVERLAY MOBILE -->
    <!-- ========================================================= -->

    <div
        id="sidebarOverlay"
        onclick="closeSidebar()"
        class="fixed inset-0 z-40
               bg-black/40
               hidden md:hidden">
    </div>



    <!-- ========================================================= -->
    <!-- SIDEBAR -->
    <!-- ========================================================= -->

    <aside
        id="sidebar"
        class="fixed inset-y-0 left-0
               w-60 md:w-56
               bg-dark-green text-white
               flex flex-col justify-between
               p-6
               z-50
               -translate-x-full
               md:translate-x-0
               transition-transform duration-300 ease-in-out
               shadow-xl md:shadow-none">


        <div>

          

            <div class="flex flex-col items-center gap-2
                        mb-10 text-center">

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


                <!-- ========================= -->
                <!-- UTAMA -->
                <!-- ========================= -->

                <div>

                    <div class="text-[10px] uppercase font-extrabold
                                text-gray-400 tracking-wider
                                mb-2 px-2">

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

                            <span>
                                Dashboard
                            </span>

                        </a>



                        <!-- MONITORING JURNAL -->

                        <a href="{{ url('/admin/data_jurnal') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  rounded-xl
                                  text-gray-300
                                  hover:bg-white/10
                                  hover:text-mint-green
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-book-bookmark
                                      w-4 text-center"></i>

                            <span>
                                Monitoring Jurnal
                            </span>

                        </a>



                        <!-- DISPENSASI ACTIVE -->

                        <a href="{{ url('/admin/data_dispensasi') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  rounded-xl
                                  bg-white/10
                                  text-mint-green
                                  transition
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-file-signature
                                      w-4 text-center"></i>

                            <span>
                                Dispensasi
                            </span>

                        </a>

                    </div>

                </div>



                <!-- ========================= -->
                <!-- DATA MASTER -->
                <!-- ========================= -->

                <div>

                    <div class="text-[10px] uppercase font-extrabold
                                text-gray-400 tracking-wider
                                mb-2 px-2">

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

                            <span>
                                Data Guru
                            </span>

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

                            <span>
                                Data Siswa
                            </span>

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

                            <span>
                                Data Kelas
                            </span>

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
                            <i class="fa-solid fa-book-open w-4 text-center">
                                
                            </i> Data Mata Pelajaran
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

                            <span>
                                Jadwal
                            </span>

                        </a>

                    </div>

                </div>

            </nav>

        </div>



        <!-- ================================================= -->
        <!-- FOOTER SIDEBAR -->
        <!-- ================================================= -->

        <div
            class="flex flex-col gap-1
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

                <span>
                    Akun Admin
                </span>

            </a>



            <!-- LOGOUT -->

            <a href="{{ route('logout') }}"
               class="w-full flex items-center gap-2
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



    <!-- ========================================================= -->
    <!-- SCROLL HELPER MOBILE -->
    <!-- SAMA SEPERTI DASHBOARD ADMIN -->
    <!-- ========================================================= -->

    <div
        id="scrollHelper"
        class="md:hidden fixed right-2 sm:right-3
               top-1/2 -translate-y-1/2
               z-30
               flex flex-col items-center gap-1">


        <!-- KE ATAS -->

        <button
            type="button"
            onclick="scrollToTop()"
            title="Kembali ke atas"
            class="w-7 h-7
                   rounded-full
                   bg-white/90
                   border border-emerald-100
                   shadow-sm
                   text-medium-green
                   hover:bg-mint-green
                   transition
                   flex items-center justify-center">

            <i class="fa-solid fa-chevron-up text-[9px]"></i>

        </button>



        <!-- TRACK -->

        <div
            class="relative
                   w-1 h-24
                   bg-dark-green/10
                   rounded-full">

            <div
                id="scrollIndicator"
                class="absolute left-0
                       w-1 h-7
                       bg-medium-green
                       rounded-full"
                style="top: 0;">
            </div>

        </div>



        <!-- KE BAWAH -->

        <button
            type="button"
            onclick="scrollToBottom()"
            title="Ke bagian bawah"
            class="w-7 h-7
                   rounded-full
                   bg-white/90
                   border border-emerald-100
                   shadow-sm
                   text-medium-green
                   hover:bg-mint-green
                   transition
                   flex items-center justify-center">

            <i class="fa-solid fa-chevron-down text-[9px]"></i>

        </button>

    </div>



    <!-- ========================================================= -->
    <!-- MAIN -->
    <!-- ========================================================= -->

    <main
        class="min-w-0
               w-full
               p-4 pb-10
               md:p-8
               md:ml-56
               md:max-w-[calc(100%-14rem)]
               space-y-5 md:space-y-6">


        <!-- ================================================= -->
        <!-- HEADER -->
        <!-- ================================================= -->

        <header>

            <div
                class="flex items-start
                       justify-between
                       gap-4">


                <!-- TITLE -->

                <div class="min-w-0">

                    <h1
                        class="text-xl md:text-2xl
                               font-extrabold
                               text-dark-green">

                        Pengajuan Dispensasi

                    </h1>


                    <p
                        class="text-xs md:text-sm
                               text-medium-green
                               font-medium
                               mt-1">

                        Kelola dan pantau permohonan dispensasi siswa.

                    </p>

                </div>

            </div>

        </header>



        <!-- ================================================= -->
        <!-- FILTER -->
        <!-- ================================================= -->

        <section
            class="bg-white
                   p-4 md:p-5
                   rounded-2xl
                   shadow-sm">


            <div
                class="grid
                       grid-cols-1
                       sm:grid-cols-2
                       lg:grid-cols-3
                       gap-4">


                <!-- TANGGAL -->

                <div>

                    <label
                        class="block
                               text-[11px]
                               md:text-xs
                               font-bold
                               text-gray-500
                               uppercase
                               tracking-wider
                               mb-1.5">

                        Tanggal

                    </label>


                    <input
                        type="date"
                        value="2026-09-23"
                        class="w-full
                               bg-gray-50
                               border border-gray-200
                               text-sm
                               rounded-xl
                               px-3 py-3
                               text-dark-green
                               outline-none
                               focus:border-medium-green
                               focus:ring-2
                               focus:ring-medium-green/10">

                </div>



                <!-- STATUS -->

                <div>

                    <label
                        class="block
                               text-[11px]
                               md:text-xs
                               font-bold
                               text-gray-500
                               uppercase
                               tracking-wider
                               mb-1.5">

                        Status

                    </label>


                    <select
                        class="w-full
                               bg-gray-50
                               border border-gray-200
                               text-sm
                               rounded-xl
                               px-3 py-3
                               text-dark-green
                               outline-none
                               focus:border-medium-green
                               focus:ring-2
                               focus:ring-medium-green/10">

                        <option>Semua Status</option>
                        <option>Menunggu</option>
                        <option>Disetujui</option>
                        <option>Ditolak</option>

                    </select>

                </div>



                <!-- SEARCH -->

                <div>

                    <label
                        class="block
                               text-[11px]
                               md:text-xs
                               font-bold
                               text-gray-500
                               uppercase
                               tracking-wider
                               mb-1.5">

                        Cari

                    </label>


                    <div class="relative">

                        <i
                            class="fa-solid fa-magnifying-glass
                                   absolute
                                   left-3 top-1/2
                                   -translate-y-1/2
                                   text-gray-400
                                   text-xs">
                        </i>


                        <input
                            type="text"
                            placeholder="Cari nama siswa..."
                            class="w-full
                                   bg-gray-50
                                   border border-gray-200
                                   text-sm
                                   rounded-xl
                                   pl-9 pr-3 py-3
                                   text-dark-green
                                   outline-none
                                   focus:border-medium-green
                                   focus:ring-2
                                   focus:ring-medium-green/10">

                    </div>

                </div>

            </div>

        </section>



        <!-- ================================================= -->
        <!-- DAFTAR PENGAJUAN -->
        <!-- ================================================= -->

        <section
            class="bg-white
                   rounded-2xl
                   shadow-sm
                   overflow-hidden">


            <!-- HEADER -->

            <div
                class="p-4 md:p-5
                       border-b border-gray-100">


                <div
                    class="flex
                           flex-col
                           sm:flex-row
                           sm:items-center
                           justify-between
                           gap-3">


                    <div>

                        <h2
                            class="text-base md:text-lg
                                   font-extrabold
                                   text-dark-green">

                            Pengajuan Terbaru

                        </h2>


                        <p
                            class="text-xs md:text-sm
                                   text-gray-500
                                   mt-1">

                            Permohonan yang dikirim oleh guru piket.

                        </p>

                    </div>


                    <span
                        class="self-start sm:self-auto
                               bg-gray-100
                               text-gray-600
                               text-xs
                               font-bold
                               px-3 py-1.5
                               rounded-lg">

                        3 Pengajuan

                    </span>

                </div>

            </div>



            <!-- ================================================= -->
            <!-- LIST -->
            <!-- ================================================= -->

            <div class="p-4 md:p-5 space-y-3">



                <!-- ================================================= -->
                <!-- PENGAJUAN 1 -->
                <!-- ================================================= -->

                <a
                    href="{{ url('/admin/data_dispensasi/1') }}"
                    class="block
                           border border-amber-100
                           bg-amber-50/30
                           rounded-xl
                           p-4
                           transition-all duration-200
                           hover:-translate-y-0.5
                           hover:shadow-md
                           hover:border-medium-green">


                    <div
                        class="flex
                               flex-col
                               lg:flex-row
                               lg:items-center
                               justify-between
                               gap-4">


                        <!-- INFORMASI -->

                        <div
                            class="flex
                                   items-start
                                   gap-3
                                   min-w-0">


                            <div
                                class="w-11 h-11
                                       shrink-0
                                       rounded-xl
                                       bg-dark-green
                                       text-mint-green
                                       flex items-center
                                       justify-center">

                                <i class="fa-solid fa-user-graduate text-sm"></i>

                            </div>


                            <div class="min-w-0">

                                <h3
                                    class="text-sm md:text-base
                                           font-extrabold
                                           text-dark-green
                                           break-words">

                                    MARVEL MAULANA SAPUTRA

                                </h3>


                                <p
                                    class="text-xs
                                           text-gray-500
                                           mt-1">

                                    XI RPL 2

                                </p>


                                <p
                                    class="text-xs
                                           text-gray-500
                                           mt-1">

                                    Keperluan:
                                    <span class="text-gray-700 font-medium">
                                        Lomba
                                    </span>

                                </p>


                                <p
                                    class="text-xs
                                           text-gray-500
                                           mt-1">

                                    Diajukan oleh:
                                    <span class="text-gray-700 font-medium">
                                        Guru Piket
                                    </span>

                                </p>

                            </div>

                        </div>



                        <!-- STATUS + DETAIL -->

                        <div
                            class="flex
                                   items-center
                                   gap-2
                                   self-start
                                   lg:self-center
                                   shrink-0">


                            <span
                                class="bg-amber-100
                                       text-amber-700
                                       text-xs
                                       font-bold
                                       px-3 py-1.5
                                       rounded-lg">

                                Menunggu

                            </span>


                            <span
                                class="inline-flex
                                       items-center
                                       gap-1.5
                                       bg-dark-green
                                       text-white
                                       text-xs
                                       font-bold
                                       px-3 py-1.5
                                       rounded-lg">

                                <i class="fa-solid fa-eye"></i>

                                Detail

                            </span>

                        </div>

                    </div>

                </a>



                <!-- ================================================= -->
                <!-- PENGAJUAN 2 -->
                <!-- ================================================= -->

                <a
                    href="{{ url('/admin/data_dispensasi/2') }}"
                    class="block
                           border border-gray-100
                           rounded-xl
                           p-4
                           transition-all duration-200
                           hover:-translate-y-0.5
                           hover:shadow-md
                           hover:border-medium-green">


                    <div
                        class="flex
                               flex-col
                               lg:flex-row
                               lg:items-center
                               justify-between
                               gap-4">


                        <!-- INFORMASI -->

                        <div
                            class="flex
                                   items-start
                                   gap-3
                                   min-w-0">


                            <div
                                class="w-11 h-11
                                       shrink-0
                                       rounded-xl
                                       bg-dark-green
                                       text-mint-green
                                       flex items-center
                                       justify-center">

                                <i class="fa-solid fa-user-graduate text-sm"></i>

                            </div>


                            <div class="min-w-0">

                                <h3
                                    class="text-sm md:text-base
                                           font-extrabold
                                           text-dark-green
                                           break-words">

                                    MARWA RIZQIANI PUTRI

                                </h3>


                                <p
                                    class="text-xs
                                           text-gray-500
                                           mt-1">

                                    XI RPL 2

                                </p>


                                <p
                                    class="text-xs
                                           text-gray-500
                                           mt-1">

                                    Keperluan:
                                    <span class="text-gray-700 font-medium">
                                        Kegiatan Sekolah
                                    </span>

                                </p>


                                <p
                                    class="text-xs
                                           text-gray-500
                                           mt-1">

                                    Diajukan oleh:
                                    <span class="text-gray-700 font-medium">
                                        Guru Piket
                                    </span>

                                </p>

                            </div>

                        </div>



                        <!-- STATUS + DETAIL -->

                        <div
                            class="flex
                                   items-center
                                   gap-2
                                   self-start
                                   lg:self-center
                                   shrink-0">


                            <span
                                class="bg-emerald-50
                                       text-emerald-700
                                       text-xs
                                       font-bold
                                       px-3 py-1.5
                                       rounded-lg">

                                Disetujui

                            </span>


                            <span
                                class="inline-flex
                                       items-center
                                       gap-1.5
                                       bg-dark-green
                                       text-white
                                       text-xs
                                       font-bold
                                       px-3 py-1.5
                                       rounded-lg">

                                <i class="fa-solid fa-eye"></i>

                                Detail

                            </span>

                        </div>

                    </div>

                </a>



                <!-- ================================================= -->
                <!-- PENGAJUAN 3 -->
                <!-- ================================================= -->

                <a
                    href="{{ url('/admin/data_dispensasi/3') }}"
                    class="block
                           border border-gray-100
                           rounded-xl
                           p-4
                           transition-all duration-200
                           hover:-translate-y-0.5
                           hover:shadow-md
                           hover:border-medium-green">


                    <div
                        class="flex
                               flex-col
                               lg:flex-row
                               lg:items-center
                               justify-between
                               gap-4">


                        <!-- INFORMASI -->

                        <div
                            class="flex
                                   items-start
                                   gap-3
                                   min-w-0">


                            <div
                                class="w-11 h-11
                                       shrink-0
                                       rounded-xl
                                       bg-dark-green
                                       text-mint-green
                                       flex items-center
                                       justify-center">

                                <i class="fa-solid fa-user-graduate text-sm"></i>

                            </div>


                            <div class="min-w-0">

                                <h3
                                    class="text-sm md:text-base
                                           font-extrabold
                                           text-dark-green
                                           break-words">

                                    NAZWA AFIFAH ANWAR

                                </h3>


                                <p
                                    class="text-xs
                                           text-gray-500
                                           mt-1">

                                    XI RPL 2

                                </p>


                                <p
                                    class="text-xs
                                           text-gray-500
                                           mt-1">

                                    Keperluan:
                                    <span class="text-gray-700 font-medium">
                                        Kejuaraan
                                    </span>

                                </p>


                                <p
                                    class="text-xs
                                           text-gray-500
                                           mt-1">

                                    Diajukan oleh:
                                    <span class="text-gray-700 font-medium">
                                        Guru Piket
                                    </span>

                                </p>

                            </div>

                        </div>



                        <!-- STATUS + DETAIL -->

                        <div
                            class="flex
                                   items-center
                                   gap-2
                                   self-start
                                   lg:self-center
                                   shrink-0">


                            <span
                                class="bg-red-50
                                       text-red-600
                                       text-xs
                                       font-bold
                                       px-3 py-1.5
                                       rounded-lg">

                                Ditolak

                            </span>


                            <span
                                class="inline-flex
                                       items-center
                                       gap-1.5
                                       bg-dark-green
                                       text-white
                                       text-xs
                                       font-bold
                                       px-3 py-1.5
                                       rounded-lg">

                                <i class="fa-solid fa-eye"></i>

                                Detail

                            </span>

                        </div>

                    </div>

                </a>


            </div>

        </section>

    </main>



    <!-- ========================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ========================================================= -->

    <script>

        /* =========================================================
           SIDEBAR MOBILE
        ========================================================= */

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



        document.querySelectorAll('#sidebar a').forEach(link => {

            link.addEventListener('click', function () {

                if (window.innerWidth < 768) {

                    closeSidebar();

                }

            });

        });


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

            const percentage =
                scrollTop / maxScroll;

            const maxTop =
                trackHeight - indicatorHeight;


            scrollIndicator.style.top =
                `${percentage * maxTop}px`;

        }


        window.addEventListener(
            'scroll',
            updateScrollIndicator
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

                top: document.documentElement.scrollHeight,

                behavior: 'smooth'

            });

        }


        updateScrollIndicator();

    </script>

</body>
</html>