<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jadwal Piket</title>

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

        /* Hilangkan scrollbar horizontal */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>


<body class="bg-bg-cream text-dark-green font-sans min-h-screen overflow-x-hidden overscroll-none">


    <!-- ========================================================= -->
    <!-- MOBILE HEADER -->
    <!-- ========================================================= -->

    <header
        class="md:hidden fixed top-0 left-0 right-0 z-40 bg-dark-green text-white h-16 px-4 flex items-center justify-between shadow-lg">

        <div class="flex items-center gap-2">

            <img src="{{ asset('image/logo.png') }}"
                alt="Logo"
                class="w-8 h-8 object-contain">

            <div>
                <p class="font-bold text-sm tracking-wide">
                    Jurnal Absensi
                </p>

                <p class="text-[9px] text-white/60">
                    Guru Piket
                </p>
            </div>

        </div>


        <button
            id="hamburgerBtn"
            type="button"
            class="w-9 h-9 rounded-lg flex items-center justify-center
                   hover:bg-white/10 active:scale-95 transition">

            <i class="fa-solid fa-bars"></i>

        </button>

    </header>



    <!-- ========================================================= -->
    <!-- MOBILE OVERLAY -->
    <!-- ========================================================= -->

    <div
        id="sidebarOverlay"
        class="fixed inset-0 bg-black/50 z-40 hidden md:hidden">
    </div>



    <!-- ========================================================= -->
    <!-- SIDEBAR -->
    <!-- ========================================================= -->

    <aside
        id="sidebar"
        class="fixed inset-y-0 left-0 w-60 bg-dark-green text-white
               p-6 flex flex-col justify-between z-50
               -translate-x-full md:translate-x-0
               transition-transform duration-300">

        <!-- SIDEBAR TOP -->

        <div>

            <!-- LOGO -->

            <div class="flex flex-col items-center gap-2 mb-10 text-center">

                <img
                    src="{{ asset('image/logo.png') }}"
                    alt="Logo"
                    class="w-16 h-auto">

                <span class="font-bold text-sm tracking-wide">
                    Jurnal Absensi
                </span>

            </div>



            <!-- NAVIGATION -->

            <nav class="flex flex-col gap-5 font-semibold text-xs">


                <!-- UTAMA -->

                <div>

                    <div
                        class="text-[10px] uppercase font-extrabold
                               text-gray-400 tracking-wider mb-2 px-2">

                        Utama

                    </div>


                    <div class="space-y-1">


                        <!-- DASHBOARD -->

                        <a
                            href="{{ url('/piket/dashboard') }}"
                            class="flex items-center gap-3 px-4 py-3
                                   text-gray-300
                                   hover:bg-white/10
                                   hover:text-mint-green
                                   rounded-xl transition
                                   active:scale-[0.98]">

                            <i class="fa-solid fa-house w-4 text-center"></i>

                            Dashboard

                        </a>



                        <!-- JURNAL MASUK -->

                        <a
                            href="{{ url('/piket/jurnal') }}"
                            class="flex items-center gap-3 px-4 py-3
                                   text-gray-300
                                   hover:bg-white/10
                                   hover:text-mint-green
                                   rounded-xl transition
                                   active:scale-[0.98]">

                            <i class="fa-solid fa-inbox w-4 text-center"></i>

                            Jurnal Masuk

                        </a>



                        <!-- JADWAL PIKET ACTIVE -->

                        <a
                            href="{{ url('/piket/jadwal') }}"
                            class="flex items-center gap-3 px-4 py-3
                                   bg-white/10
                                   text-mint-green
                                   rounded-xl transition
                                   active:scale-[0.98]">

                            <i class="fa-solid fa-calendar-days w-4 text-center"></i>

                            Jadwal Piket

                        </a>

                    </div>

                </div>

            </nav>

        </div>



        <!-- SIDEBAR FOOTER -->

        <div
            class="flex flex-col gap-1 pt-3
                   border-t border-white/10 text-xs">


            <!-- AKUN -->

            <a
                href="{{ url('/piket/akun') }}"
                class="flex items-center gap-2 px-2 py-2
                       rounded-lg hover:bg-white/10
                       active:scale-[0.98] transition">

                <i class="fa-solid fa-user-circle w-4"></i>

                <span>
                    Akun guru
                </span>

            </a>



            <!-- LOGOUT -->

            <form
                method="POST"
                action="{{ route('logout') }}">

                @csrf

                <button
                    type="submit"
                    class="w-full flex items-center gap-2
                           px-2 py-2 rounded-lg
                           hover:bg-red-500/10
                           hover:text-red-300
                           active:scale-[0.98]
                           transition">

                    <i class="fa-solid fa-right-from-bracket w-4"></i>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </div>

    </aside>



    <!-- ========================================================= -->
    <!-- MAIN -->
    <!-- ========================================================= -->

    <main
        class="min-w-0
               p-4 pb-16
               pt-20
               md:pt-8
               md:ml-60
               md:p-8
               max-w-full
               md:max-w-[calc(100%-15rem)]
               mx-auto">


        <!-- ===================================================== -->
        <!-- HEADER -->
        <!-- ===================================================== -->

        <header
            class="flex items-start justify-between gap-3 mb-5">

            <div class="min-w-0">

                <h1
                    class="text-lg sm:text-xl md:text-2xl
                           font-black text-dark-green
                           tracking-tight leading-tight">

                    Jadwal Piket

                </h1>


                <p
                    class="text-[10px] sm:text-xs
                           text-medium-green
                           font-semibold mt-1">

                    Jadwal tugas Guru Piket KBM

                </p>

            </div>
        </header>



        <!-- ===================================================== -->
        <!-- INFO PERIODE -->
        <!-- ===================================================== -->

        <section
            class="bg-white rounded-2xl
                   border border-emerald-100
                   shadow-sm p-4 mb-5">


            <div
                class="flex items-center gap-3">


                <div
                    class="w-10 h-10
                           rounded-xl
                           bg-mint-green/20
                           text-medium-green
                           flex items-center justify-center
                           shrink-0">

                    <i class="fa-solid fa-calendar-check"></i>

                </div>


                <div class="min-w-0">

                    <p
                        class="text-[10px]
                               text-gray-400
                               font-semibold">

                        PERIODE JADWAL

                    </p>


                    <h2
                        class="text-sm
                               font-extrabold
                               text-dark-green">

                        Semester Ganjil 2026/2027

                    </h2>

                </div>

            </div>


            <div
                class="mt-3 pt-3
                       border-t border-gray-100
                       flex items-center justify-between">


                <div
                    class="flex items-center gap-2
                           text-[10px] text-gray-500">

                    <i
                        class="fa-regular fa-clock
                               text-medium-green">
                    </i>

                    <span>
                        Jam Piket: 07.00 - 14.00
                    </span>

                </div>


                <span
                    class="px-2.5 py-1
                           rounded-full
                           bg-emerald-50
                           text-emerald-700
                           text-[9px]
                           font-bold">

                    Aktif

                </span>

            </div>

        </section>



        <!-- ===================================================== -->
        <!-- JADWAL -->
        <!-- ===================================================== -->

        <section
            id="jadwalContainer"
            class="bg-white rounded-2xl
                   border border-emerald-100
                   shadow-sm p-3 sm:p-5">


            <!-- SECTION HEADER -->

            <div
                class="flex items-center
                       justify-between
                       gap-3 mb-5">


                <div>

                    <h2
                        class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Jadwal Piket Mingguan

                    </h2>


                    <p
                        class="text-[10px] md:text-xs
                               text-gray-400 mt-0.5">

                        Daftar jadwal tugas Guru Piket

                    </p>

                </div>


                <div
                    class="w-8 h-8
                           rounded-lg
                           bg-emerald-50
                           text-medium-green
                           flex items-center justify-center">

                    <i class="fa-solid fa-list text-xs"></i>

                </div>

            </div>



            <!-- ================================================= -->
            <!-- JADWAL HARIAN -->
            <!-- ================================================= -->

            <div class="space-y-5">



                <!-- ================================================= -->
                <!-- SENIN -->
                <!-- ================================================= -->

                <div class="schedule-day">

                    <!-- DAY HEADER -->

                    <div class="flex items-center gap-2 mb-2">

                        <span
                            class="px-2.5 py-1
                                   bg-dark-green
                                   text-mint-green
                                   rounded-lg
                                   text-[9px]
                                   font-extrabold">

                            Senin

                        </span>


                        <span
                            class="text-[9px]
                                   text-gray-400">

                            21 September 2026

                        </span>

                    </div>



                    <!-- CARDS -->

                    <div
                        class="grid grid-cols-2
                               gap-2">


                        <!-- CARD -->

                        <div
                            class="rounded-xl
                                   bg-gray-50
                                   border border-gray-100
                                   p-3
                                   hover:border-emerald-200
                                   transition">


                            <div
                                class="flex items-center
                                       justify-between gap-1
                                       mb-2">


                                <span
                                    class="text-[8px]
                                           text-gray-400
                                           flex items-center gap-1">

                                    <i class="fa-regular fa-clock"></i>

                                    07.00 - 08.20

                                </span>


                                <span
                                    class="text-[7px]
                                           px-1.5 py-1
                                           rounded-md
                                           bg-emerald-100
                                           text-emerald-700
                                           font-bold">

                                    SELESAI

                                </span>

                            </div>


                            <h3
                                class="text-[11px]
                                       font-extrabold
                                       text-dark-green
                                       truncate">

                                Matematika

                            </h3>


                            <div
                                class="mt-2
                                       flex items-center
                                       gap-2
                                       text-[8px]
                                       text-gray-400">

                                <span>
                                    <i class="fa-solid fa-users mr-1"></i>
                                    XI RPL 2
                                </span>

                                <span>
                                    <i class="fa-solid fa-door-open mr-1"></i>
                                    R 58
                                </span>

                            </div>

                        </div>



                        <!-- CARD -->

                        <div
                            class="rounded-xl
                                   bg-gray-50
                                   border border-gray-100
                                   p-3
                                   hover:border-emerald-200
                                   transition">


                            <div
                                class="flex items-center
                                       justify-between gap-1
                                       mb-2">

                                <span
                                    class="text-[8px]
                                           text-gray-400
                                           flex items-center gap-1">

                                    <i class="fa-regular fa-clock"></i>

                                    10.00 - 12.40

                                </span>


                                <span
                                    class="text-[7px]
                                           px-1.5 py-1
                                           rounded-md
                                           bg-emerald-100
                                           text-emerald-700
                                           font-bold">

                                    SELESAI

                                </span>

                            </div>


                            <h3
                                class="text-[11px]
                                       font-extrabold
                                       text-dark-green
                                       truncate">

                                Matematika

                            </h3>


                            <div
                                class="mt-2
                                       flex items-center
                                       gap-2
                                       text-[8px]
                                       text-gray-400">

                                <span>
                                    <i class="fa-solid fa-users mr-1"></i>
                                    XI TKJ 1
                                </span>

                                <span>
                                    <i class="fa-solid fa-door-open mr-1"></i>
                                    R 12
                                </span>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- SELASA -->
                <!-- ================================================= -->

                <div class="schedule-day">

                    <div class="flex items-center gap-2 mb-2">

                        <span
                            class="px-2.5 py-1
                                   bg-dark-green
                                   text-mint-green
                                   rounded-lg
                                   text-[9px]
                                   font-extrabold">

                            Selasa

                        </span>


                        <span
                            class="text-[9px]
                                   text-gray-400">

                            22 September 2026

                        </span>

                    </div>



                    <div
                        class="grid grid-cols-2
                               gap-2">


                        <!-- BERLANGSUNG -->

                        <div
                            class="rounded-xl
                                   bg-gray-50
                                   border border-emerald-200
                                   p-3">


                            <div
                                class="flex items-center
                                       justify-between gap-1
                                       mb-2">

                                <span
                                    class="text-[8px]
                                           text-gray-400
                                           flex items-center gap-1">

                                    <i class="fa-regular fa-clock"></i>

                                    07.00 - 09.40

                                </span>


                                <span
                                    class="text-[7px]
                                           px-1.5 py-1
                                           rounded-md
                                           bg-emerald-100
                                           text-emerald-700
                                           font-bold">

                                    BERLANGSUNG

                                </span>

                            </div>


                            <h3
                                class="text-[11px]
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </h3>


                            <div
                                class="mt-2
                                       flex items-center
                                       gap-2
                                       text-[8px]
                                       text-gray-400">

                                <span>
                                    <i class="fa-solid fa-users mr-1"></i>
                                    XI DKV 2
                                </span>

                                <span>
                                    <i class="fa-solid fa-door-open mr-1"></i>
                                    R 47
                                </span>

                            </div>

                        </div>



                        <!-- MENDATANG -->

                        <div
                            class="rounded-xl
                                   bg-gray-50
                                   border border-gray-100
                                   p-3">


                            <div
                                class="flex items-center
                                       justify-between gap-1
                                       mb-2">

                                <span
                                    class="text-[8px]
                                           text-gray-400
                                           flex items-center gap-1">

                                    <i class="fa-regular fa-clock"></i>

                                    10.00 - 12.40

                                </span>


                                <span
                                    class="text-[7px]
                                           px-1.5 py-1
                                           rounded-md
                                           bg-amber-100
                                           text-amber-700
                                           font-bold">

                                    MENDATANG

                                </span>

                            </div>


                            <h3
                                class="text-[11px]
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </h3>


                            <div
                                class="mt-2
                                       flex items-center
                                       gap-2
                                       text-[8px]
                                       text-gray-400">

                                <span>
                                    <i class="fa-solid fa-users mr-1"></i>
                                    XI RPL 1
                                </span>

                                <span>
                                    <i class="fa-solid fa-door-open mr-1"></i>
                                    Lab RPL
                                </span>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- RABU -->
                <!-- ================================================= -->

                <div class="schedule-day">

                    <div class="flex items-center gap-2 mb-2">

                        <span
                            class="px-2.5 py-1
                                   bg-gray-600
                                   text-white
                                   rounded-lg
                                   text-[9px]
                                   font-extrabold">

                            Rabu

                        </span>


                        <span
                            class="text-[9px]
                                   text-gray-400">

                            23 September 2026

                        </span>

                    </div>


                    <div
                        class="grid grid-cols-2
                               gap-2">


                        <!-- MENDATANG -->

                        <div
                            class="rounded-xl
                                   bg-gray-50
                                   border border-gray-100
                                   p-3">

                            <div
                                class="flex items-center
                                       justify-between gap-1
                                       mb-2">

                                <span
                                    class="text-[8px]
                                           text-gray-400
                                           flex items-center gap-1">

                                    <i class="fa-regular fa-clock"></i>

                                    07.00 - 09.40

                                </span>


                                <span
                                    class="text-[7px]
                                           px-1.5 py-1
                                           rounded-md
                                           bg-gray-100
                                           text-gray-500
                                           font-bold">

                                    MENDATANG

                                </span>

                            </div>


                            <h3
                                class="text-[11px]
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </h3>


                            <div
                                class="mt-2
                                       flex items-center
                                       gap-2
                                       text-[8px]
                                       text-gray-400">

                                <span>
                                    <i class="fa-solid fa-users mr-1"></i>
                                    XI RPL 1
                                </span>

                                <span>
                                    <i class="fa-solid fa-door-open mr-1"></i>
                                    R 57
                                </span>

                            </div>

                        </div>



                        <div
                            class="rounded-xl
                                   bg-gray-50
                                   border border-gray-100
                                   p-3">

                            <div
                                class="flex items-center
                                       justify-between gap-1
                                       mb-2">

                                <span
                                    class="text-[8px]
                                           text-gray-400
                                           flex items-center gap-1">

                                    <i class="fa-regular fa-clock"></i>

                                    10.00 - 12.40

                                </span>


                                <span
                                    class="text-[7px]
                                           px-1.5 py-1
                                           rounded-md
                                           bg-gray-100
                                           text-gray-500
                                           font-bold">

                                    MENDATANG

                                </span>

                            </div>


                            <h3
                                class="text-[11px]
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </h3>


                            <div
                                class="mt-2
                                       flex items-center
                                       gap-2
                                       text-[8px]
                                       text-gray-400">

                                <span>
                                    <i class="fa-solid fa-users mr-1"></i>
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



                <!-- ================================================= -->
                <!-- KAMIS -->
                <!-- ================================================= -->

                <div class="schedule-day">

                    <div class="flex items-center gap-2 mb-2">

                        <span
                            class="px-2.5 py-1
                                   bg-gray-500
                                   text-white
                                   rounded-lg
                                   text-[9px]
                                   font-extrabold">

                            Kamis

                        </span>


                        <span
                            class="text-[9px]
                                   text-gray-400">

                            24 September 2026

                        </span>

                    </div>


                    <div
                        class="grid grid-cols-2
                               gap-2">


                        <div
                            class="rounded-xl
                                   bg-gray-50
                                   border border-gray-100
                                   p-3">

                            <div
                                class="flex items-center
                                       justify-between gap-1
                                       mb-2">

                                <span
                                    class="text-[8px]
                                           text-gray-400">

                                    <i class="fa-regular fa-clock"></i>
                                    07.00 - 09.40

                                </span>


                                <span
                                    class="text-[7px]
                                           px-1.5 py-1
                                           rounded-md
                                           bg-gray-100
                                           text-gray-500
                                           font-bold">

                                    MENDATANG

                                </span>

                            </div>


                            <h3
                                class="text-[11px]
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </h3>


                            <div
                                class="mt-2
                                       flex items-center
                                       gap-2
                                       text-[8px]
                                       text-gray-400">

                                <span>
                                    <i class="fa-solid fa-users mr-1"></i>
                                    XI RPL 1
                                </span>

                                <span>
                                    <i class="fa-solid fa-door-open mr-1"></i>
                                    R 57
                                </span>

                            </div>

                        </div>



                        <div
                            class="rounded-xl
                                   bg-gray-50
                                   border border-gray-100
                                   p-3">

                            <div
                                class="flex items-center
                                       justify-between gap-1
                                       mb-2">

                                <span
                                    class="text-[8px]
                                           text-gray-400">

                                    <i class="fa-regular fa-clock"></i>
                                    10.00 - 12.40

                                </span>


                                <span
                                    class="text-[7px]
                                           px-1.5 py-1
                                           rounded-md
                                           bg-gray-100
                                           text-gray-500
                                           font-bold">

                                    MENDATANG

                                </span>

                            </div>


                            <h3
                                class="text-[11px]
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </h3>


                            <div
                                class="mt-2
                                       flex items-center
                                       gap-2
                                       text-[8px]
                                       text-gray-400">

                                <span>
                                    <i class="fa-solid fa-users mr-1"></i>
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



                <!-- ================================================= -->
                <!-- JUMAT -->
                <!-- ================================================= -->

                <div class="schedule-day">

                    <div class="flex items-center gap-2 mb-2">

                        <span
                            class="px-2.5 py-1
                                   bg-gray-500
                                   text-white
                                   rounded-lg
                                   text-[9px]
                                   font-extrabold">

                            Jumat

                        </span>


                        <span
                            class="text-[9px]
                                   text-gray-400">

                            25 September 2026

                        </span>

                    </div>


                    <div
                        class="grid grid-cols-2
                               gap-2">


                        <div
                            class="rounded-xl
                                   bg-gray-50
                                   border border-gray-100
                                   p-3">

                            <div
                                class="flex items-center
                                       justify-between gap-1
                                       mb-2">

                                <span
                                    class="text-[8px]
                                           text-gray-400">

                                    <i class="fa-regular fa-clock"></i>
                                    07.00 - 09.00

                                </span>


                                <span
                                    class="text-[7px]
                                           px-1.5 py-1
                                           rounded-md
                                           bg-gray-100
                                           text-gray-500
                                           font-bold">

                                    MENDATANG

                                </span>

                            </div>


                            <h3
                                class="text-[11px]
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </h3>


                            <div
                                class="mt-2
                                       flex items-center
                                       gap-2
                                       text-[8px]
                                       text-gray-400">

                                <span>
                                    <i class="fa-solid fa-users mr-1"></i>
                                    XI PPLG 1
                                </span>

                                <span>
                                    <i class="fa-solid fa-door-open mr-1"></i>
                                    R 12
                                </span>

                            </div>

                        </div>



                        <div
                            class="rounded-xl
                                   bg-gray-50
                                   border border-gray-100
                                   p-3">

                            <div
                                class="flex items-center
                                       justify-between gap-1
                                       mb-2">

                                <span
                                    class="text-[8px]
                                           text-gray-400">

                                    <i class="fa-regular fa-clock"></i>
                                    09.30 - 11.00

                                </span>


                                <span
                                    class="text-[7px]
                                           px-1.5 py-1
                                           rounded-md
                                           bg-gray-100
                                           text-gray-500
                                           font-bold">

                                    MENDATANG

                                </span>

                            </div>


                            <h3
                                class="text-[11px]
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </h3>


                            <div
                                class="mt-2
                                       flex items-center
                                       gap-2
                                       text-[8px]
                                       text-gray-400">

                                <span>
                                    <i class="fa-solid fa-users mr-1"></i>
                                    XI TKI 1
                                </span>

                                <span>
                                    <i class="fa-solid fa-door-open mr-1"></i>
                                    R 18
                                </span>

                            </div>

                        </div>

                    </div>

                </div>



            </div>

        </section>



        <!-- ===================================================== -->
        <!-- FOOTER -->
        <!-- ===================================================== -->

        <div class="py-5 text-center">

            <span
                class="text-[9px] md:text-[10px]
                       text-gray-400">

                Jurnal Absensi · Guru Piket

            </span>

        </div>

    </main>



    <!-- ========================================================= -->
    <!-- MOBILE SCROLL HELPER -->
    <!-- ========================================================= -->

    <div
        id="scrollHelper"
        class="md:hidden fixed
               right-2 sm:right-3
               top-1/2
               -translate-y-1/2
               z-30
               flex flex-col
               items-center gap-1">


        <!-- UP -->

        <button
            type="button"
            onclick="scrollToTop()"
            aria-label="Kembali ke atas"
            class="w-7 h-7
                   rounded-full
                   bg-white/95
                   border border-emerald-100
                   shadow-md
                   text-medium-green
                   flex items-center justify-center
                   active:scale-90
                   transition">

            <i class="fa-solid fa-chevron-up text-[9px]"></i>

        </button>



        <!-- TRACK -->

        <div
            class="relative
                   w-1 h-28
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



        <!-- DOWN -->

        <button
            type="button"
            onclick="scrollToBottom()"
            aria-label="Ke bagian bawah"
            class="w-7 h-7
                   rounded-full
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



    <!-- ========================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ========================================================= -->

    <script>


        /* =========================================================
           MOBILE SIDEBAR
        ========================================================= */

        const hamburgerBtn =
            document.getElementById('hamburgerBtn');

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

            sidebar
                .querySelectorAll('a')
                .forEach(link => {

                    link.addEventListener(
                        'click',
                        () => {

                            if (
                                window.innerWidth < 768
                            ) {

                                closeSidebar();

                            }

                        }
                    );

                });

        }


        window.addEventListener(
            'resize',
            () => {

                if (
                    window.innerWidth >= 768
                ) {

                    sidebarOverlay.classList.add(
                        'hidden'
                    );

                    document.body.classList.remove(
                        'overflow-hidden'
                    );

                }

            }
        );



        /* =========================================================
           SCROLL INDICATOR
        ========================================================= */

        const scrollIndicator =
            document.getElementById(
                'scrollIndicator'
            );


        function updateScrollIndicator() {

            if (!scrollIndicator) {
                return;
            }


            const scrollTop =
                window.scrollY ||
                window.pageYOffset;


            const documentHeight =
                document.documentElement
                    .scrollHeight;


            const windowHeight =
                window.innerHeight;


            const maxScroll =
                documentHeight -
                windowHeight;


            if (maxScroll <= 0) {

                scrollIndicator.style.top =
                    '0px';

                return;

            }


            const trackHeight = 112;

            const indicatorHeight = 32;

            const maxTop =
                trackHeight -
                indicatorHeight;


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
            {
                passive: true
            }
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