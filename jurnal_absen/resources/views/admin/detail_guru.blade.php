<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Guru</title>

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
    <!-- SIDEBAR OVERLAY -->
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
               p-5
               z-50
               -translate-x-full
               md:translate-x-0
               transition-transform duration-300 ease-in-out
               shadow-xl md:shadow-none">


        <div>

            <!-- LOGO -->

            <div class="flex flex-col items-center justify-center
                        gap-1.5 mb-6 text-center">

                <div class="w-full flex items-center
                            justify-between md:justify-center">

                    <div class="flex flex-col items-center
                                justify-center gap-1.5">

                        <img src="{{ asset('image/logo.png') }}"
                             alt="Logo"
                             class="w-12 h-auto object-contain">

                        <span class="text-sm font-bold tracking-wide">
                            Jurnal Absensi
                        </span>

                    </div>


                    <!-- CLOSE -->

                    <button
                        type="button"
                        onclick="closeSidebar()"
                        aria-label="Tutup menu"
                        class="md:hidden
                               w-8 h-8
                               rounded-lg
                               bg-white/10
                               hover:bg-white/15
                               flex items-center
                               justify-center
                               transition">

                        <i class="fa-solid fa-xmark text-sm"></i>

                    </button>

                </div>

            </div>



            <!-- NAVIGASI -->

            <nav class="flex flex-col gap-4 text-sm font-semibold">


                <!-- UTAMA -->

                <div>

                    <div class="text-[10px] uppercase
                                font-extrabold
                                text-gray-400
                                tracking-wider
                                mb-1.5 px-2">

                        Utama

                    </div>


                    <div class="space-y-0.5">


                        <!-- DASHBOARD -->

                        <a href="{{ url('/admin/dashboard') }}"
                           class="flex items-center gap-3
                                  px-3 py-2.5
                                  rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition">

                            <i class="fa-solid fa-house
                                      w-4 text-center"></i>

                            <span>Dashboard</span>

                        </a>



                        <!-- MONITORING -->

                        <a href="{{ url('/admin/data_jurnal') }}"
                           class="flex items-center gap-3
                                  px-3 py-2.5
                                  rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition">

                            <i class="fa-solid fa-book-bookmark
                                      w-4 text-center"></i>

                            <span>Monitoring Jurnal</span>

                        </a>



                        <!-- DISPENSASI -->

                        <a href="{{ url('/admin/data_dispensasi') }}"
                           class="flex items-center gap-3
                                  px-3 py-2.5
                                  rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition">

                            <i class="fa-solid fa-file-signature
                                      w-4 text-center"></i>

                            <span>Dispensasi</span>

                        </a>

                    </div>

                </div>



                <!-- DATA MASTER -->

                <div>

                    <div class="text-[10px] uppercase
                                font-extrabold
                                text-gray-400
                                tracking-wider
                                mb-1.5 px-2">

                        Data Master

                    </div>


                    <div class="space-y-0.5">


                        <!-- DATA GURU ACTIVE -->

                        <a href="{{ url('/admin/data_guru') }}"
                           class="flex items-center gap-3
                                  px-3 py-2.5
                                  rounded-xl
                                  bg-white/10
                                  text-mint-green
                                  font-bold">

                            <i class="fa-solid fa-chalkboard-user
                                      w-4 text-center"></i>

                            <span>Data Guru</span>

                        </a>



                        <!-- DATA SISWA -->

                        <a href="{{ url('/admin/data_siswa') }}"
                           class="flex items-center gap-3
                                  px-3 py-2.5
                                  rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition">

                            <i class="fa-solid fa-user-graduate
                                      w-4 text-center"></i>

                            <span>Data Siswa</span>

                        </a>



                        <!-- DATA KELAS -->

                        <a href="{{ url('/admin/data_kelas') }}"
                           class="flex items-center gap-3
                                  px-3 py-2.5
                                  rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition">

                            <i class="fa-solid fa-school
                                      w-4 text-center"></i>

                            <span>Data Kelas</span>

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


                        <!-- JADWAL -->

                        <a href="{{ url('/admin/jadwal') }}"
                           class="flex items-center gap-3
                                  px-3 py-2.5
                                  rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition">

                            <i class="fa-solid fa-calendar-days
                                      w-4 text-center"></i>

                            <span>Jadwal</span>

                        </a>

                    </div>

                </div>

            </nav>

        </div>



        <!-- FOOTER -->

        <div
            class="flex flex-col gap-1
                   pt-3
                   border-t border-white/10
                   text-sm">


            <a href="{{ url('/admin/akun') }}"
               class="flex items-center gap-3
                      px-3 py-2.5
                      rounded-lg
                      text-gray-300
                      hover:bg-white/10
                      hover:text-white
                      transition">

                <i class="fa-solid fa-user-circle w-4"></i>

                <span>Akun Admin</span>

            </a>


            <a href="{{ route('logout') }}"
               class="w-full flex items-center gap-3
                      px-3 py-2.5
                      rounded-lg
                      text-gray-300
                      hover:bg-white/10
                      hover:text-white
                      transition">

                <i class="fa-solid fa-right-from-bracket w-4"></i>

                <span>Logout</span>

            </a>

        </div>

    </aside>



    <!-- ========================================================= -->
    <!-- SCROLL HELPER -->
    <!-- ========================================================= -->

    <div
        id="scrollHelper"
        class="md:hidden fixed right-2 sm:right-3
               top-1/2
               -translate-y-1/2
               z-30
               flex flex-col
               items-center
               gap-1">


        <!-- UP -->

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


        <!-- DOWN -->

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
                class="flex flex-col
                       sm:flex-row
                       sm:items-center
                       sm:justify-between
                       gap-3">

                <div>

                    <a href="{{ url('/admin/data_guru') }}"
                       class="inline-flex items-center gap-2
                              text-sm md:text-base
                              font-bold
                              text-medium-green
                              hover:text-dark-green
                              transition
                              mb-4 md:mb-5">

                        <i class="fa-solid fa-arrow-left
                                  text-xs md:text-sm"></i>

                        <h1
                            class="text-xl md:text-2xl
                                   font-extrabold
                                   text-dark-green">

                            Detail Guru

                        </h1>

                    </a>


                    <p
                        class="text-sm md:text-sm
                               text-gray-500
                               leading-relaxed">

                        Informasi lengkap mengenai data dan aktivitas guru.

                    </p>

                </div>


                <!-- EDIT -->

                <button
                    type="button"
                    onclick="openEditGuru()"
                    class="self-start
                           sm:self-center
                           inline-flex
                           items-center
                           justify-center
                           gap-2
                           bg-dark-green
                           text-white
                           hover:bg-medium-green
                           text-sm
                           font-bold
                           px-4 py-3
                           rounded-xl
                           transition">

                    <i class="fa-solid fa-pen"></i>

                    Edit Guru

                </button>

            </div>

        </header>



        <!-- ================================================= -->
        <!-- INFORMASI GURU -->
        <!-- ================================================= -->

        <section
            class="bg-white
                   rounded-2xl
                   shadow-sm
                   p-4 md:p-5">


            <!-- SECTION HEADER -->

            <div
                class="flex items-center
                       gap-3
                       mb-4 md:mb-5">


                <div
                    class="w-10 h-10
                           shrink-0
                           rounded-xl
                           bg-emerald-50
                           text-medium-green
                           flex items-center
                           justify-center">

                    <i class="fa-solid fa-chalkboard-user"></i>

                </div>


                <div>

                    <h2
                        class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Informasi Guru

                    </h2>


                    <p
                        class="text-xs
                               text-gray-500
                               mt-0.5">

                        Informasi dasar guru.

                    </p>

                </div>

            </div>



            <!-- DATA -->

            <div
                class="grid
                       grid-cols-2
                       gap-2.5
                       sm:grid-cols-2
                       sm:gap-3">


                <!-- NAMA -->

                <div
                    class="col-span-2
                           bg-gray-50
                           rounded-xl
                           p-3.5">

                    <p
                        class="text-[10px]
                               uppercase
                               tracking-wider
                               font-bold
                               text-gray-400
                               mb-1">

                        Nama

                    </p>


                    <p
                        class="text-sm
                               font-extrabold
                               text-dark-green
                               leading-snug">

                        Sulistyowati, S.Pd.

                    </p>

                </div>



                <!-- NIP -->

                <div
                    class="bg-gray-50
                           rounded-xl
                           p-3.5">

                    <p
                        class="text-[10px]
                               uppercase
                               tracking-wider
                               font-bold
                               text-gray-400
                               mb-1">

                        NIP

                    </p>


                    <p
                        class="text-sm
                               font-bold
                               text-dark-green">

                        198xxxxxxxxx

                    </p>

                </div>



                <!-- STATUS -->

                <div
                    class="bg-gray-50
                           rounded-xl
                           p-3.5">

                    <p
                        class="text-[10px]
                               uppercase
                               tracking-wider
                               font-bold
                               text-gray-400
                               mb-1">

                        Status

                    </p>


                    <span
                        class="inline-flex
                               items-center
                               bg-emerald-50
                               text-emerald-700
                               text-xs
                               font-bold
                               px-3 py-1.5
                               rounded-lg">

                        Aktif

                    </span>

                </div>



                <!-- MATA PELAJARAN -->

                <div
                    class="col-span-2
                           bg-gray-50
                           rounded-xl
                           p-3.5">

                    <p
                        class="text-[10px]
                               uppercase
                               tracking-wider
                               font-bold
                               text-gray-400
                               mb-1">

                        Mata Pelajaran

                    </p>


                    <p
                        class="text-sm
                               font-bold
                               text-dark-green
                               leading-snug">

                        Matematika Terapan

                    </p>

                </div>

            </div>

        </section>



        <!-- ================================================= -->
        <!-- KELAS YANG DIAJAR -->
        <!-- ================================================= -->

        <section
            class="bg-white
                   rounded-2xl
                   shadow-sm
                   p-4 md:p-5">


            <div
                class="flex items-center
                       gap-3
                       mb-4 md:mb-5">


                <div
                    class="w-10 h-10
                           shrink-0
                           rounded-xl
                           bg-emerald-50
                           text-medium-green
                           flex items-center
                           justify-center">

                    <i class="fa-solid fa-school"></i>

                </div>


                <div>

                    <h2
                        class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Kelas yang Diajar

                    </h2>


                    <p
                        class="text-xs
                               text-gray-500
                               mt-0.5">

                        Daftar kelas yang diajar oleh guru.

                    </p>

                </div>

            </div>



            <div class="flex flex-wrap gap-2.5">


                <span
                    class="inline-flex
                           items-center
                           bg-emerald-50
                           text-emerald-700
                           text-xs
                           font-bold
                           px-3 py-2
                           rounded-lg">

                    XI RPL 1

                </span>


                <span
                    class="inline-flex
                           items-center
                           bg-emerald-50
                           text-emerald-700
                           text-xs
                           font-bold
                           px-3 py-2
                           rounded-lg">

                    XI RPL 2

                </span>


                <span
                    class="inline-flex
                           items-center
                           bg-emerald-50
                           text-emerald-700
                           text-xs
                           font-bold
                           px-3 py-2
                           rounded-lg">

                    XII RPL 1

                </span>

            </div>

        </section>



        <!-- ================================================= -->
        <!-- JADWAL MENGAJAR -->
        <!-- ================================================= -->

        <section
            class="bg-white
                   rounded-2xl
                   shadow-sm
                   p-4 md:p-5">


            <div
                class="flex items-center
                       justify-between
                       gap-3
                       mb-5">


                <div>

                    <h2
                        class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Jadwal Mengajar

                    </h2>


                    <p
                        class="text-xs
                               text-gray-500
                               mt-0.5">

                        Semester Ganjil 2026–2027

                    </p>

                </div>


                <div
                    class="w-10 h-10
                           rounded-xl
                           bg-emerald-50
                           text-medium-green
                           flex items-center
                           justify-center
                           shrink-0">

                    <i class="fa-solid fa-calendar-days"></i>

                </div>

            </div>



            <div class="space-y-5">


                <!-- SENIN -->

                <div>

                    <div
                        class="inline-flex
                               items-center
                               bg-dark-green
                               text-mint-green
                               text-[10px]
                               font-extrabold
                               px-3 py-1.5
                               rounded-lg
                               mb-3">

                        Senin

                    </div>


                    <div
                        class="flex gap-3
                               overflow-x-auto
                               pb-1">


                        <!-- JADWAL 1 -->

                        <div
                            class="min-w-[190px]
                                   bg-gray-50
                                   rounded-xl
                                   p-3.5
                                   shrink-0">

                            <div
                                class="flex items-center
                                       justify-between
                                       gap-2
                                       mb-2">

                                <span
                                    class="text-[10px]
                                           text-gray-400
                                           whitespace-nowrap">

                                    <i class="fa-regular fa-clock mr-1"></i>

                                    07.00 – 08.20

                                </span>


                                <span
                                    class="bg-emerald-100
                                           text-emerald-700
                                           text-[8px]
                                           font-bold
                                           px-2 py-1
                                           rounded-md">

                                    SELESAI

                                </span>

                            </div>


                            <p
                                class="text-sm
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </p>


                            <div
                                class="flex items-center
                                       gap-3
                                       mt-3
                                       text-[10px]
                                       text-gray-400">

                                <span>

                                    <i class="fa-solid fa-school mr-1"></i>

                                    XI RPL 2

                                </span>


                                <span>

                                    <i class="fa-solid fa-door-open mr-1"></i>

                                    R 58

                                </span>

                            </div>

                        </div>



                        <!-- JADWAL 2 -->

                        <div
                            class="min-w-[190px]
                                   bg-gray-50
                                   rounded-xl
                                   p-3.5
                                   shrink-0">

                            <div
                                class="flex items-center
                                       justify-between
                                       gap-2
                                       mb-2">

                                <span
                                    class="text-[10px]
                                           text-gray-400
                                           whitespace-nowrap">

                                    <i class="fa-regular fa-clock mr-1"></i>

                                    10.00 – 12.40

                                </span>


                                <span
                                    class="bg-emerald-100
                                           text-emerald-700
                                           text-[8px]
                                           font-bold
                                           px-2 py-1
                                           rounded-md">

                                    SELESAI

                                </span>

                            </div>


                            <p
                                class="text-sm
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </p>


                            <div
                                class="flex items-center
                                       gap-3
                                       mt-3
                                       text-[10px]
                                       text-gray-400">

                                <span>

                                    <i class="fa-solid fa-school mr-1"></i>

                                    XII TKJ 1

                                </span>


                                <span>

                                    <i class="fa-solid fa-door-open mr-1"></i>

                                    R 12

                                </span>

                            </div>

                        </div>



                        <!-- JADWAL 3 -->

                        <div
                            class="min-w-[190px]
                                   bg-gray-50
                                   rounded-xl
                                   p-3.5
                                   shrink-0">

                            <div
                                class="flex items-center
                                       justify-between
                                       gap-2
                                       mb-2">

                                <span
                                    class="text-[10px]
                                           text-gray-400
                                           whitespace-nowrap">

                                    <i class="fa-regular fa-clock mr-1"></i>

                                    10.00 – 12.40

                                </span>


                                <span
                                    class="bg-emerald-100
                                           text-emerald-700
                                           text-[8px]
                                           font-bold
                                           px-2 py-1
                                           rounded-md">

                                    SELESAI

                                </span>

                            </div>


                            <p
                                class="text-sm
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </p>


                            <div
                                class="flex items-center
                                       gap-3
                                       mt-3
                                       text-[10px]
                                       text-gray-400">

                                <span>

                                    <i class="fa-solid fa-school mr-1"></i>

                                    XII TKJ 1

                                </span>


                                <span>

                                    <i class="fa-solid fa-door-open mr-1"></i>

                                    R 12

                                </span>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- SELASA -->

                <div>

                    <div
                        class="inline-flex
                               items-center
                               bg-dark-green
                               text-mint-green
                               text-[10px]
                               font-extrabold
                               px-3 py-1.5
                               rounded-lg
                               mb-3">

                        Selasa

                    </div>


                    <div
                        class="flex gap-3
                               overflow-x-auto
                               pb-1">


                        <!-- JADWAL 1 -->

                        <div
                            class="min-w-[190px]
                                   bg-gray-50
                                   rounded-xl
                                   p-3.5
                                   shrink-0">

                            <div
                                class="flex items-center
                                       justify-between
                                       gap-2
                                       mb-2">

                                <span
                                    class="text-[10px]
                                           text-gray-400
                                           whitespace-nowrap">

                                    <i class="fa-regular fa-clock mr-1"></i>

                                    07.00 – 09.40

                                </span>


                                <span
                                    class="bg-emerald-100
                                           text-emerald-700
                                           text-[8px]
                                           font-bold
                                           px-2 py-1
                                           rounded-md">

                                    BERLANGSUNG

                                </span>

                            </div>


                            <p
                                class="text-sm
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </p>


                            <div
                                class="flex items-center
                                       gap-3
                                       mt-3
                                       text-[10px]
                                       text-gray-400">

                                <span>

                                    <i class="fa-solid fa-school mr-1"></i>

                                    XI DKV 2

                                </span>


                                <span>

                                    <i class="fa-solid fa-door-open mr-1"></i>

                                    R 47

                                </span>

                            </div>

                        </div>



                        <!-- JADWAL 2 -->

                        <div
                            class="min-w-[190px]
                                   bg-gray-50
                                   rounded-xl
                                   p-3.5
                                   shrink-0">

                            <div
                                class="flex items-center
                                       justify-between
                                       gap-2
                                       mb-2">

                                <span
                                    class="text-[10px]
                                           text-gray-400
                                           whitespace-nowrap">

                                    <i class="fa-regular fa-clock mr-1"></i>

                                    10.00 – 12.40

                                </span>


                                <span
                                    class="bg-amber-100
                                           text-amber-700
                                           text-[8px]
                                           font-bold
                                           px-2 py-1
                                           rounded-md">

                                    MENDATANG

                                </span>

                            </div>


                            <p
                                class="text-sm
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </p>


                            <div
                                class="flex items-center
                                       gap-3
                                       mt-3
                                       text-[10px]
                                       text-gray-400">

                                <span>

                                    <i class="fa-solid fa-school mr-1"></i>

                                    XI RPL 1

                                </span>


                                <span>

                                    <i class="fa-solid fa-door-open mr-1"></i>

                                    Lab RPL 1

                                </span>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- KAMIS -->

                <div>

                    <div
                        class="inline-flex
                               items-center
                               bg-gray-500
                               text-white
                               text-[10px]
                               font-extrabold
                               px-3 py-1.5
                               rounded-lg
                               mb-3">

                        Kamis

                    </div>


                    <div
                        class="flex gap-3
                               overflow-x-auto
                               pb-1">


                        <!-- JADWAL 1 -->

                        <div
                            class="min-w-[190px]
                                   bg-gray-50
                                   rounded-xl
                                   p-3.5
                                   shrink-0">

                            <div
                                class="flex items-center
                                       justify-between
                                       gap-2
                                       mb-2">

                                <span
                                    class="text-[10px]
                                           text-gray-400
                                           whitespace-nowrap">

                                    <i class="fa-regular fa-clock mr-1"></i>

                                    07.00 – 09.40

                                </span>


                                <span
                                    class="bg-gray-100
                                           text-gray-500
                                           text-[8px]
                                           font-bold
                                           px-2 py-1
                                           rounded-md">

                                    MENDATANG

                                </span>

                            </div>


                            <p
                                class="text-sm
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </p>


                            <div
                                class="flex items-center
                                       gap-3
                                       mt-3
                                       text-[10px]
                                       text-gray-400">

                                <span>

                                    <i class="fa-solid fa-school mr-1"></i>

                                    XI RPL 1

                                </span>


                                <span>

                                    <i class="fa-solid fa-door-open mr-1"></i>

                                    R 57

                                </span>

                            </div>

                        </div>



                        <!-- JADWAL 2 -->

                        <div
                            class="min-w-[190px]
                                   bg-gray-50
                                   rounded-xl
                                   p-3.5
                                   shrink-0">

                            <div
                                class="flex items-center
                                       justify-between
                                       gap-2
                                       mb-2">

                                <span
                                    class="text-[10px]
                                           text-gray-400
                                           whitespace-nowrap">

                                    <i class="fa-regular fa-clock mr-1"></i>

                                    10.00 – 12.40

                                </span>


                                <span
                                    class="bg-gray-100
                                           text-gray-500
                                           text-[8px]
                                           font-bold
                                           px-2 py-1
                                           rounded-md">

                                    MENDATANG

                                </span>

                            </div>


                            <p
                                class="text-sm
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </p>


                            <div
                                class="flex items-center
                                       gap-3
                                       mt-3
                                       text-[10px]
                                       text-gray-400">

                                <span>

                                    <i class="fa-solid fa-school mr-1"></i>

                                    XII RPL 2

                                </span>


                                <span>

                                    <i class="fa-solid fa-door-open mr-1"></i>

                                    R 58

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        <!-- ================================================= -->
        <!-- JADWAL PIKET -->
        <!-- ================================================= -->

        <section
            class="bg-white
                   rounded-2xl
                   shadow-sm
                   p-4 md:p-5">


            <div
                class="flex items-center
                       gap-3
                       mb-4 md:mb-5">


                <div
                    class="w-10 h-10
                           shrink-0
                           rounded-xl
                           bg-emerald-50
                           text-medium-green
                           flex items-center
                           justify-center">

                    <i class="fa-solid fa-calendar-check"></i>

                </div>


                <div>

                    <h2
                        class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Jadwal Piket

                    </h2>


                    <p
                        class="text-xs
                               text-gray-500
                               mt-0.5">

                        Jadwal piket guru.

                    </p>

                </div>

            </div>



            <div class="space-y-2.5">


                <!-- PIKET 1 -->

                <div
                    class="border border-gray-100
                           rounded-xl
                           p-3.5">


                    <div
                        class="flex items-start
                               gap-3">


                        <div
                            class="w-10 h-10
                                   rounded-xl
                                   bg-dark-green
                                   text-mint-green
                                   flex items-center
                                   justify-center
                                   shrink-0">

                            <i class="fa-solid fa-calendar-check"></i>

                        </div>


                        <div class="flex-1 min-w-0">

                            <div
                                class="flex flex-col
                                       sm:flex-row
                                       sm:items-center
                                       sm:justify-between
                                       gap-2">


                                <div>

                                    <p
                                        class="text-sm
                                               font-extrabold
                                               text-dark-green">

                                        Selasa, 1 September 2026

                                    </p>


                                    <p
                                        class="text-xs
                                               text-gray-500
                                               mt-1">

                                        Petugas Piket KBM Pagi

                                    </p>

                                </div>


                                <span
                                    class="bg-blue-50
                                           text-blue-700
                                           text-xs
                                           font-bold
                                           px-3 py-1.5
                                           rounded-lg
                                           self-start">

                                    07.00 – 11.00

                                </span>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- PIKET 2 -->

                <div
                    class="border border-gray-100
                           rounded-xl
                           p-3.5">


                    <div
                        class="flex items-start
                               gap-3">


                        <div
                            class="w-10 h-10
                                   rounded-xl
                                   bg-dark-green
                                   text-mint-green
                                   flex items-center
                                   justify-center
                                   shrink-0">

                            <i class="fa-solid fa-calendar-check"></i>

                        </div>


                        <div class="flex-1 min-w-0">

                            <div
                                class="flex flex-col
                                       sm:flex-row
                                       sm:items-center
                                       sm:justify-between
                                       gap-2">


                                <div>

                                    <p
                                        class="text-sm
                                               font-extrabold
                                               text-dark-green">

                                        Selasa, 15 September 2026

                                    </p>


                                    <p
                                        class="text-xs
                                               text-gray-500
                                               mt-1">

                                        Petugas Piket KBM Pagi

                                    </p>

                                </div>


                                <span
                                    class="bg-blue-50
                                           text-blue-700
                                           text-xs
                                           font-bold
                                           px-3 py-1.5
                                           rounded-lg
                                           self-start">

                                    07.00 – 11.00

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        <!-- ================================================= -->
        <!-- BOTTOM -->
        <!-- ================================================= -->

        <div class="flex justify-start pb-5">

            <a href="{{ url('/admin/data_guru') }}"
               class="inline-flex items-center
                      justify-center
                      gap-2
                      bg-gray-100
                      hover:bg-gray-200
                      text-gray-600
                      text-sm
                      font-bold
                      px-4 py-3
                      rounded-xl
                      transition">

                <i class="fa-solid fa-arrow-left"></i>

                Kembali ke Data Guru

            </a>

        </div>

    </main>



    <!-- ========================================================= -->
    <!-- POPUP EDIT GURU -->
    <!-- ========================================================= -->

    <div
        id="editGuruModal"
        class="fixed inset-0 z-50
               hidden items-center
               justify-center
               bg-black/40
               px-4">


        <div
            class="bg-white
                   w-full
                   max-w-md
                   rounded-2xl
                   shadow-xl
                   overflow-hidden">


            <!-- HEADER -->

            <div
                class="px-5 py-4
                       border-b border-gray-100
                       flex items-center
                       justify-between">


                <div>

                    <h2
                        class="text-sm
                               font-extrabold
                               text-dark-green">

                        Edit Data Guru

                    </h2>


                    <p
                        class="text-xs
                               text-gray-400
                               mt-1">

                        Ubah informasi dasar guru.

                    </p>

                </div>


                <button
                    type="button"
                    onclick="closeEditGuru()"
                    class="w-9 h-9
                           rounded-lg
                           bg-gray-100
                           text-gray-500
                           hover:bg-gray-200
                           flex items-center
                           justify-center
                           transition">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>



            <!-- FORM -->

            <form
                id="editGuruForm"
                onsubmit="showConfirmSave(event)">


                <div class="p-5 space-y-4">


                    <!-- NAMA -->

                    <div>

                        <label
                            for="editNama"
                            class="block
                                   text-xs
                                   font-bold
                                   uppercase
                                   tracking-wider
                                   text-gray-500
                                   mb-1.5">

                            Nama Lengkap

                        </label>


                        <input
                            type="text"
                            id="editNama"
                            name="nama"
                            value="Sulistyowati, S.Pd."
                            class="w-full
                                   border border-gray-200
                                   rounded-xl
                                   px-3.5 py-3
                                   text-sm
                                   text-dark-green
                                   outline-none
                                   focus:border-medium-green
                                   focus:ring-2
                                   focus:ring-medium-green/10">

                    </div>



                    <!-- NIP -->

                    <div>

                        <label
                            for="editNip"
                            class="block
                                   text-xs
                                   font-bold
                                   uppercase
                                   tracking-wider
                                   text-gray-500
                                   mb-1.5">

                            NIP

                        </label>


                        <input
                            type="text"
                            id="editNip"
                            name="nip"
                            value="198xxxxxxxxx"
                            class="w-full
                                   border border-gray-200
                                   rounded-xl
                                   px-3.5 py-3
                                   text-sm
                                   text-dark-green
                                   outline-none
                                   focus:border-medium-green
                                   focus:ring-2
                                   focus:ring-medium-green/10">

                    </div>



                    <!-- MATA PELAJARAN -->

                    <div>

                        <label
                            for="editMapel"
                            class="block
                                   text-xs
                                   font-bold
                                   uppercase
                                   tracking-wider
                                   text-gray-500
                                   mb-1.5">

                            Mata Pelajaran

                        </label>


                        <select
                            id="editMapel"
                            name="mapel"
                            class="w-full
                                   border border-gray-200
                                   rounded-xl
                                   px-3.5 py-3
                                   text-sm
                                   text-dark-green
                                   bg-white
                                   outline-none
                                   focus:border-medium-green
                                   focus:ring-2
                                   focus:ring-medium-green/10">

                            <option selected>
                                Matematika Terapan
                            </option>

                            <option>
                                Bimbingan Konseling
                            </option>

                            <option>
                                Bahasa Daerah
                            </option>

                            <option>
                                Bahasa Indonesia
                            </option>

                            <option>
                                Bahasa Inggris
                            </option>

                            <option>
                                Informatika
                            </option>

                        </select>

                    </div>



                    <!-- STATUS -->

                    <div>

                        <label
                            for="editStatus"
                            class="block
                                   text-xs
                                   font-bold
                                   uppercase
                                   tracking-wider
                                   text-gray-500
                                   mb-1.5">

                            Status

                        </label>


                        <select
                            id="editStatus"
                            name="status"
                            class="w-full
                                   border border-gray-200
                                   rounded-xl
                                   px-3.5 py-3
                                   text-sm
                                   text-dark-green
                                   bg-white
                                   outline-none
                                   focus:border-medium-green
                                   focus:ring-2
                                   focus:ring-medium-green/10">

                            <option
                                value="aktif"
                                selected>

                                Aktif

                            </option>

                            <option
                                value="nonaktif">

                                Nonaktif

                            </option>

                        </select>

                    </div>

                </div>



                <!-- FOOTER -->

                <div
                    class="px-5 py-4
                           bg-gray-50
                           border-t border-gray-100
                           grid
                           grid-cols-1
                           sm:flex
                           sm:flex-row-reverse
                           sm:justify-start
                           gap-2">


                    <button
                        type="submit"
                        class="w-full sm:w-auto
                               px-4 py-3
                               rounded-xl
                               bg-dark-green
                               hover:bg-medium-green
                               text-white
                               text-sm
                               font-bold
                               transition
                               inline-flex
                               items-center
                               justify-center
                               gap-2">

                        <i class="fa-solid fa-check"></i>

                        Simpan Perubahan

                    </button>


                    <button
                        type="button"
                        onclick="closeEditGuru()"
                        class="w-full sm:w-auto
                               px-4 py-3
                               rounded-xl
                               bg-white
                               border border-gray-200
                               text-gray-600
                               text-sm
                               font-bold
                               hover:bg-gray-100
                               transition">

                        Batal

                    </button>

                </div>

            </form>

        </div>

    </div>



    <!-- ========================================================= -->
    <!-- POPUP KONFIRMASI -->
    <!-- ========================================================= -->

    <div
        id="confirmSaveModal"
        class="fixed inset-0 z-[60]
               hidden items-center
               justify-center
               bg-black/40
               px-4">


        <div
            class="bg-white
                   w-full
                   max-w-sm
                   rounded-2xl
                   shadow-xl
                   p-5">


            <div
                class="flex items-start
                       gap-3">


                <div
                    class="w-11 h-11
                           rounded-xl
                           bg-amber-50
                           text-amber-600
                           flex items-center
                           justify-center
                           shrink-0">

                    <i class="fa-solid fa-triangle-exclamation"></i>

                </div>


                <div>

                    <h2
                        class="text-base
                               font-extrabold
                               text-dark-green">

                        Simpan perubahan?

                    </h2>


                    <p
                        class="text-xs
                               text-gray-500
                               mt-1.5
                               leading-relaxed">

                        Pastikan data guru yang kamu ubah
                        sudah benar. Perubahan akan disimpan
                        ke data guru.

                    </p>

                </div>

            </div>



            <div
                class="grid
                       grid-cols-2
                       gap-2
                       mt-5">


                <button
                    type="button"
                    onclick="closeConfirmSave()"
                    class="w-full
                           px-4 py-3
                           rounded-xl
                           bg-gray-100
                           hover:bg-gray-200
                           text-gray-600
                           text-sm
                           font-bold
                           transition">

                    Batal

                </button>


                <button
                    type="button"
                    onclick="confirmSave()"
                    class="w-full
                           px-4 py-3
                           rounded-xl
                           bg-dark-green
                           hover:bg-medium-green
                           text-white
                           text-sm
                           font-bold
                           transition
                           inline-flex
                           items-center
                           justify-center
                           gap-2">

                    <i class="fa-solid fa-check"></i>

                    Ya, Simpan

                </button>

            </div>

        </div>

    </div>



    <!-- ========================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ========================================================= -->

    <script>

        /* =========================================================
           SIDEBAR MOBILE
        ========================================================= */

        const sidebar =
            document.getElementById('sidebar');

        const sidebarOverlay =
            document.getElementById('sidebarOverlay');


        function openSidebar() {

            sidebar.classList.remove(
                '-translate-x-full'
            );

            sidebarOverlay.classList.remove(
                'hidden'
            );

            document.body.classList.add(
                'overflow-hidden'
            );

        }


        function closeSidebar() {

            sidebar.classList.add(
                '-translate-x-full'
            );

            sidebarOverlay.classList.add(
                'hidden'
            );

            document.body.classList.remove(
                'overflow-hidden'
            );

        }


        document
            .querySelectorAll('#sidebar a')
            .forEach(link => {

                link.addEventListener(
                    'click',
                    function () {

                        if (window.innerWidth < 768) {

                            closeSidebar();

                        }

                    }
                );

            });



        /* =========================================================
           SCROLL HELPER
        ========================================================= */

        const scrollIndicator =
            document.getElementById(
                'scrollIndicator'
            );


        function updateScrollIndicator() {

            const scrollTop =
                window.scrollY;

            const maxScroll =
                document.documentElement.scrollHeight -
                window.innerHeight;


            if (maxScroll <= 0) {

                scrollIndicator.style.top =
                    '0px';

                return;

            }


            const trackHeight = 96;

            const indicatorHeight = 28;

            const percentage =
                scrollTop / maxScroll;

            const maxTop =
                trackHeight -
                indicatorHeight;


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

                top:
                    document.documentElement
                        .scrollHeight,

                behavior: 'smooth'

            });

        }


        updateScrollIndicator();



        /* =========================================================
           MODAL EDIT GURU
        ========================================================= */

        function openEditGuru() {

            const modal =
                document.getElementById(
                    'editGuruModal'
                );

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


        function closeEditGuru() {

            const modal =
                document.getElementById(
                    'editGuruModal'
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



        /* =========================================================
           MODAL KONFIRMASI
        ========================================================= */

        function showConfirmSave(event) {

            event.preventDefault();

            const modal =
                document.getElementById(
                    'confirmSaveModal'
                );

            modal.classList.remove(
                'hidden'
            );

            modal.classList.add(
                'flex'
            );

        }


        function closeConfirmSave() {

            const modal =
                document.getElementById(
                    'confirmSaveModal'
                );

            modal.classList.add(
                'hidden'
            );

            modal.classList.remove(
                'flex'
            );

        }



        /* =========================================================
           SIMPAN
        ========================================================= */

        function confirmSave() {

            /*
             * FE sementara.
             * Nanti bagian ini diganti dengan submit
             * ke route backend setelah API/controller siap.
             */

            closeConfirmSave();

            closeEditGuru();

            alert(
                'Perubahan data guru berhasil disimpan.'
            );

        }



        /* =========================================================
           ESCAPE
        ========================================================= */

        document.addEventListener(
            'keydown',
            function (event) {

                if (event.key !== 'Escape') {
                    return;
                }


                const confirmModal =
                    document.getElementById(
                        'confirmSaveModal'
                    );

                const editModal =
                    document.getElementById(
                        'editGuruModal'
                    );


                if (
                    !confirmModal.classList.contains(
                        'hidden'
                    )
                ) {

                    closeConfirmSave();

                    return;

                }


                if (
                    !editModal.classList.contains(
                        'hidden'
                    )
                ) {

                    closeEditGuru();

                    return;

                }


                if (
                    window.innerWidth < 768 &&
                    !sidebar.classList.contains(
                        '-translate-x-full'
                    )
                ) {

                    closeSidebar();

                }

            }
        );

    </script>

</body>
</html>