<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Guru</title>

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

<body class="bg-bg-cream text-dark-green font-sans flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="hidden md:flex md:w-56 bg-dark-green text-white
                  flex-col justify-between p-5 shrink-0
                  h-screen sticky top-0">

        <div>

            <!-- LOGO -->
            <div class="flex flex-col items-center justify-center
                        gap-1.5 mb-6 text-center">

                <img src="{{ asset('image/logo.png') }}"
                     alt="Logo"
                     class="w-12 h-auto object-contain">

                <span class="text-sm font-bold tracking-wide">
                    Jurnal Absensi
                </span>

            </div>


            <!-- NAVIGASI -->
            <nav class="flex flex-col gap-4 text-xs font-semibold">

                <!-- UTAMA -->
                <div>

                    <div class="text-[10px] uppercase font-extrabold
                                text-gray-400 tracking-wider mb-1.5 px-2">
                        Utama
                    </div>

                    <div class="space-y-0.5">

                        <a href="{{ url('/admin/dashboard') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5
                                  hover:text-white transition">
                            <i class="fa-solid fa-house w-4 text-center"></i>
                            Dashboard
                        </a>

                        <a href="{{ url('/admin/monitoring_jurnal') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5
                                  hover:text-white transition">
                            <i class="fa-solid fa-book-bookmark w-4 text-center"></i>
                            Monitoring Jurnal
                        </a>

                        <a href="{{ url('/admin/data_dispensasi') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5
                                  hover:text-white transition">
                            <i class="fa-solid fa-file-signature w-4 text-center"></i>
                            Dispensasi
                        </a>

                    </div>

                </div>


                <!-- DATA MASTER -->
                <div>

                    <div class="text-[10px] uppercase font-extrabold
                                text-gray-400 tracking-wider mb-1.5 px-2">
                        Data Master
                    </div>

                    <div class="space-y-0.5">

                        <a href="{{ url('/admin/data_guru') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  bg-white/10 text-mint-green font-bold">
                            <i class="fa-solid fa-chalkboard-user w-4 text-center"></i>
                            Data Guru
                        </a>

                        <a href="{{ url('/admin/data_siswa') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5
                                  hover:text-white transition">
                            <i class="fa-solid fa-user-graduate w-4 text-center"></i>
                            Data Siswa
                        </a>

                        <a href="{{ url('/admin/data_kelas') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5
                                  hover:text-white transition">
                            <i class="fa-solid fa-school w-4 text-center"></i>
                            Data Kelas
                        </a>

                        <a href="{{ url('/admin/data_mapel') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5
                                  hover:text-white transition">
                            <i class="fa-solid fa-book-open w-4 text-center"></i>
                            Mata Pelajaran
                        </a>

                        <a href="{{ url('/admin/jadwal') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5
                                  hover:text-white transition">
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


           <a href="{{ url('/admin/akun') }}"
                class="flex items-center gap-2 px-2 py-2 rounded-lg
                        hover:bg-white/10
                        active:scale-[0.98]
                        transition-all duration-200">
                    <i class="fa-solid fa-user-circle w-4"></i>
                    <span>Akun Admin</span>
            </a>


            <!-- LOGOUT -->
           <a href="{{ route('logout') }}"
            class="w-full flex items-center gap-2 px-2 py-2 rounded-lg
                    hover:bg-white/10
                    active:scale-[0.98]
                    transition-all duration-200">
                <i class="fa-solid fa-right-from-bracket w-4"></i>
                <span>Logout</span>
            </a>

        </div>

    </aside>


    <!-- MAIN -->
    <main class="flex-1 p-4 md:p-6 overflow-y-auto">

        <!-- HEADER -->
        <header class="mb-5">

            <a href="{{ url('/admin/data_guru') }}"
               class="inline-flex items-center gap-2
                      text-xs font-bold text-medium-green
                      hover:text-dark-green transition mb-4">

                <i class="fa-solid fa-arrow-left"></i>
                Kembali ke Data Guru

            </a>


            <div class="flex flex-col sm:flex-row
                        sm:items-center sm:justify-between
                        gap-4">

                <div>

                    <p class="text-[10px] font-bold uppercase
                              tracking-wider text-medium-green mb-1">
                        Detail Guru
                    </p>

                    <h1 class="text-xl md:text-2xl
                               font-extrabold text-dark-green">
                        Sulistyowati, S.Pd.
                    </h1>

                    <p class="text-xs text-gray-500 mt-1">
                        Matematika Terapan
                    </p>

                </div>


                <!-- EDIT -->
               <button
                    type="button"
                    onclick="openEditGuru()"
                    class="bg-dark-green hover:bg-medium-green
                        text-white text-xs font-bold
                        px-4 py-2.5 rounded-xl
                        transition inline-flex items-center
                        gap-2 whitespace-nowrap">

                    <i class="fa-solid fa-pen"></i>
                    Edit Guru

                </button>

            </div>

        </header>


        <!-- IDENTITAS -->
        <section class="bg-white rounded-2xl shadow-sm p-5 mb-5">

            <div class="flex items-center gap-3 mb-4">

                <div class="w-11 h-11 rounded-xl
                            bg-dark-green text-mint-green
                            flex items-center justify-center">

                    <i class="fa-solid fa-chalkboard-user"></i>

                </div>

                <div>

                    <h2 class="text-sm font-extrabold text-dark-green">
                        Informasi Guru
                    </h2>

                    <p class="text-[10px] text-gray-400 mt-0.5">
                        Informasi dasar guru.
                    </p>

                </div>

            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <div>
                    <p class="text-[10px] font-bold uppercase
                              tracking-wider text-gray-400 mb-1">
                        Nama
                    </p>

                    <p class="text-xs font-bold text-dark-green">
                        Sulistyowati, S.Pd.
                    </p>
                </div>


                <div>
                    <p class="text-[10px] font-bold uppercase
                              tracking-wider text-gray-400 mb-1">
                        NIP
                    </p>

                    <p class="text-xs font-bold text-dark-green">
                        198xxxxxxxxx
                    </p>
                </div>


                <div>
                    <p class="text-[10px] font-bold uppercase
                              tracking-wider text-gray-400 mb-1">
                        Mata Pelajaran
                    </p>

                    <p class="text-xs font-bold text-dark-green">
                        Matematika Terapan
                    </p>
                </div>

            </div>

        </section>


        <!-- KELAS -->
        <section class="bg-white rounded-2xl shadow-sm p-5 mb-5">

            <div class="mb-4">

                <h2 class="text-sm font-extrabold text-dark-green">
                    Kelas yang Diajar
                </h2>

                <p class="text-[10px] text-gray-400 mt-0.5">
                    Daftar kelas yang diajar oleh guru.
                </p>

            </div>


            <div class="flex flex-wrap gap-2">

                <span class="bg-emerald-50 text-emerald-700
                             text-[10px] font-bold
                             px-3 py-1.5 rounded-lg">
                    XI RPL 1
                </span>

                <span class="bg-emerald-50 text-emerald-700
                             text-[10px] font-bold
                             px-3 py-1.5 rounded-lg">
                    XI RPL 2
                </span>

                <span class="bg-emerald-50 text-emerald-700
                             text-[10px] font-bold
                             px-3 py-1.5 rounded-lg">
                    XII RPL 1
                </span>

            </div>

        </section>

        <!-- JADWAL MENGAJAR -->
            <section class="bg-white rounded-2xl shadow-sm p-5 mb-5">

                <div class="flex items-center justify-between gap-3 mb-5">
                    <div>
                        <h2 class="text-sm font-extrabold text-dark-green">
                            Jadwal Mengajar
                        </h2>

                        <p class="text-[10px] text-gray-400 mt-0.5">
                            Semester Ganjil 2026–2027
                        </p>
                    </div>

                    <div class="w-9 h-9 rounded-xl bg-emerald-50
                                text-medium-green flex items-center justify-center">
                        <i class="fa-solid fa-calendar-days text-xs"></i>
                    </div>
                </div>


                <div class="space-y-5">

                    <!-- SENIN -->
                    <div>

                        <div class="inline-flex items-center bg-dark-green
                                    text-mint-green text-[9px] font-extrabold
                                    px-3 py-1.5 rounded-lg mb-3">
                            Senin
                        </div>


                        <div class="flex gap-3 overflow-x-auto pb-1">

                            <!-- Jadwal 1 -->
                            <div class="min-w-[145px] bg-gray-50 rounded-xl p-3 shrink-0">

                                <div class="flex items-center justify-between gap-2 mb-2">
                                    <span class="text-[8px] text-gray-400 whitespace-nowrap">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        07.00 – 08.20
                                    </span>

                                    <span class="bg-emerald-100 text-emerald-700
                                                text-[7px] font-bold px-1.5 py-1
                                                rounded-md">
                                        SELESAI
                                    </span>
                                </div>

                                <p class="text-xs font-extrabold text-dark-green">
                                    Matematika
                                </p>

                                <div class="flex items-center gap-3 mt-3 text-[8px] text-gray-400">
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


                            <!-- Jadwal 2 -->
                            <div class="min-w-[145px] bg-gray-50 rounded-xl p-3 shrink-0">

                                <div class="flex items-center justify-between gap-2 mb-2">
                                    <span class="text-[8px] text-gray-400 whitespace-nowrap">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        10.00 – 12.40
                                    </span>

                                    <span class="bg-emerald-100 text-emerald-700
                                                text-[7px] font-bold px-1.5 py-1
                                                rounded-md">
                                        SELESAI
                                    </span>
                                </div>

                                <p class="text-xs font-extrabold text-dark-green">
                                    Matematika
                                </p>

                                <div class="flex items-center gap-3 mt-3 text-[8px] text-gray-400">
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


                            <!-- Jadwal 3 -->
                            <div class="min-w-[145px] bg-gray-50 rounded-xl p-3 shrink-0">

                                <div class="flex items-center justify-between gap-2 mb-2">
                                    <span class="text-[8px] text-gray-400 whitespace-nowrap">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        10.00 – 12.40
                                    </span>

                                    <span class="bg-emerald-100 text-emerald-700
                                                text-[7px] font-bold px-1.5 py-1
                                                rounded-md">
                                        SELESAI
                                    </span>
                                </div>

                                <p class="text-xs font-extrabold text-dark-green">
                                    Matematika
                                </p>

                                <div class="flex items-center gap-3 mt-3 text-[8px] text-gray-400">
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

                        <div class="inline-flex items-center bg-dark-green
                                    text-mint-green text-[9px] font-extrabold
                                    px-3 py-1.5 rounded-lg mb-3">
                            Selasa
                        </div>


                        <div class="flex gap-3 overflow-x-auto pb-1">

                            <!-- Jadwal 1 -->
                            <div class="min-w-[145px] bg-gray-50 rounded-xl p-3 shrink-0">

                                <div class="flex items-center justify-between gap-2 mb-2">
                                    <span class="text-[8px] text-gray-400 whitespace-nowrap">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        07.00 – 09.40
                                    </span>

                                    <span class="bg-emerald-100 text-emerald-700
                                                text-[7px] font-bold px-1.5 py-1
                                                rounded-md">
                                        BERLANGSUNG
                                    </span>
                                </div>

                                <p class="text-xs font-extrabold text-dark-green">
                                    Matematika
                                </p>

                                <div class="flex items-center gap-3 mt-3 text-[8px] text-gray-400">
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


                            <!-- Jadwal 2 -->
                            <div class="min-w-[145px] bg-gray-50 rounded-xl p-3 shrink-0">

                                <div class="flex items-center justify-between gap-2 mb-2">
                                    <span class="text-[8px] text-gray-400 whitespace-nowrap">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        10.00 – 12.40
                                    </span>

                                    <span class="bg-amber-100 text-amber-700
                                                text-[7px] font-bold px-1.5 py-1
                                                rounded-md">
                                        MENDATANG
                                    </span>
                                </div>

                                <p class="text-xs font-extrabold text-dark-green">
                                    Matematika
                                </p>

                                <div class="flex items-center gap-3 mt-3 text-[8px] text-gray-400">
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

                        <div class="inline-flex items-center bg-gray-500
                                    text-white text-[9px] font-extrabold
                                    px-3 py-1.5 rounded-lg mb-3">
                            Kamis
                        </div>


                        <div class="flex gap-3 overflow-x-auto pb-1">

                            <!-- Jadwal 1 -->
                            <div class="min-w-[145px] bg-gray-50 rounded-xl p-3 shrink-0">

                                <div class="flex items-center justify-between gap-2 mb-2">
                                    <span class="text-[8px] text-gray-400 whitespace-nowrap">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        07.00 – 09.40
                                    </span>

                                    <span class="bg-gray-100 text-gray-500
                                                text-[7px] font-bold px-1.5 py-1
                                                rounded-md">
                                        MENDATANG
                                    </span>
                                </div>

                                <p class="text-xs font-extrabold text-dark-green">
                                    Matematika
                                </p>

                                <div class="flex items-center gap-3 mt-3 text-[8px] text-gray-400">
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


                            <!-- Jadwal 2 -->
                            <div class="min-w-[145px] bg-gray-50 rounded-xl p-3 shrink-0">

                                <div class="flex items-center justify-between gap-2 mb-2">
                                    <span class="text-[8px] text-gray-400 whitespace-nowrap">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        10.00 – 12.40
                                    </span>

                                    <span class="bg-gray-100 text-gray-500
                                                text-[7px] font-bold px-1.5 py-1
                                                rounded-md">
                                        MENDATANG
                                    </span>
                                </div>

                                <p class="text-xs font-extrabold text-dark-green">
                                    Matematika
                                </p>

                                <div class="flex items-center gap-3 mt-3 text-[8px] text-gray-400">
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


                    <!-- JADWAL PIKET -->
                    <section class="bg-white rounded-2xl shadow-sm p-5 mb-5">

                        <div class="mb-4">

                            <h2 class="text-sm font-extrabold text-dark-green">
                                Jadwal Piket
                            </h2>

                            <p class="text-[10px] text-gray-400 mt-0.5">
                                Jadwal piket guru.
                            </p>

                        </div>


                        <div class="space-y-3">

                            <div class="border border-gray-100
                                        rounded-xl p-3">

                                <div class="flex items-start gap-3">

                                    <div class="w-9 h-9 rounded-xl
                                                bg-dark-green text-mint-green
                                                flex items-center justify-center
                                                shrink-0">

                                        <i class="fa-solid fa-calendar-check text-xs"></i>

                                    </div>


                                    <div class="flex-1">

                                        <div class="flex flex-col sm:flex-row
                                                    sm:items-center
                                                    sm:justify-between gap-2">

                                            <div>

                                                <p class="text-[11px] font-extrabold text-dark-green">
                                                    Selasa, 1 September 2026
                                                </p>

                                                <p class="text-[10px] text-gray-500 mt-1">
                                                    Petugas Piket KBM Pagi
                                                </p>

                                            </div>


                                            <span class="bg-blue-50 text-blue-700
                                                        text-[10px] font-bold
                                                        px-2.5 py-1 rounded-lg
                                                        self-start">

                                                07.00 – 11.00

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            <div class="border border-gray-100
                                        rounded-xl p-3">

                                <div class="flex items-start gap-3">

                                    <div class="w-9 h-9 rounded-xl
                                                bg-dark-green text-mint-green
                                                flex items-center justify-center
                                                shrink-0">

                                        <i class="fa-solid fa-calendar-check text-xs"></i>

                                    </div>


                                    <div class="flex-1">

                                        <div class="flex flex-col sm:flex-row
                                                    sm:items-center
                                                    sm:justify-between gap-2">

                                            <div>

                                                <p class="text-[11px] font-extrabold text-dark-green">
                                                    Selasa, 15 September 2026
                                                </p>

                                                <p class="text-[10px] text-gray-500 mt-1">
                                                    Petugas Piket KBM Pagi
                                                </p>

                                            </div>


                                            <span class="bg-blue-50 text-blue-700
                                                        text-[10px] font-bold
                                                        px-2.5 py-1 rounded-lg
                                                        self-start">

                                                07.00 – 11.00

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </section>


        <!-- BOTTOM -->
        <div class="flex justify-start pb-5">

            <a href="{{ url('/admin/data_guru') }}"
               class="inline-flex items-center gap-2
                      bg-gray-100 hover:bg-gray-200
                      text-gray-600 text-xs font-bold
                      px-4 py-2.5 rounded-xl transition">

                <i class="fa-solid fa-arrow-left"></i>
                Kembali ke Data Guru

            </a>

        </div>

    </main>

    <!-- POPUP EDIT GURU -->
<div id="editGuruModal"
     class="fixed inset-0 z-50 hidden items-center justify-center p-4">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-dark-green/50 backdrop-blur-sm"
         onclick="closeEditGuru()"></div>

    <!-- Modal -->
    <div class="relative w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden">

        <!-- Header -->
        <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">

            <div>
                <h2 class="text-sm font-extrabold text-dark-green">
                    Edit Data Guru
                </h2>

                <p class="text-[10px] text-gray-400 mt-1">
                    Ubah informasi dasar guru.
                </p>
            </div>

            <button
                type="button"
                onclick="closeEditGuru()"
                class="w-8 h-8 rounded-lg bg-gray-100
                       text-gray-500 hover:bg-gray-200
                       flex items-center justify-center transition">

                <i class="fa-solid fa-xmark text-xs"></i>

            </button>

        </div>


        <!-- Form -->
        <form id="editGuruForm" onsubmit="showConfirmSave(event)">

            <div class="p-5 space-y-4">

                <!-- Nama -->
                <div>
                    <label for="editNama"
                           class="block text-[10px] font-bold
                                  uppercase tracking-wider
                                  text-gray-500 mb-1.5">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        id="editNama"
                        name="nama"
                        value="Sulistyowati, S.Pd."
                        class="w-full border border-gray-200
                               rounded-xl px-3.5 py-2.5
                               text-xs text-dark-green
                               outline-none
                               focus:border-medium-green
                               focus:ring-2 focus:ring-medium-green/10">
                </div>


                <!-- NIP -->
                <div>
                    <label for="editNip"
                           class="block text-[10px] font-bold
                                  uppercase tracking-wider
                                  text-gray-500 mb-1.5">
                        NIP
                    </label>

                    <input
                        type="text"
                        id="editNip"
                        name="nip"
                        value="198xxxxxxxxx"
                        class="w-full border border-gray-200
                               rounded-xl px-3.5 py-2.5
                               text-xs text-dark-green
                               outline-none
                               focus:border-medium-green
                               focus:ring-2 focus:ring-medium-green/10">
                </div>


                <!-- Mata Pelajaran -->
                <div>
                    <label for="editMapel"
                           class="block text-[10px] font-bold
                                  uppercase tracking-wider
                                  text-gray-500 mb-1.5">
                        Mata Pelajaran
                    </label>

                    <select
                        id="editMapel"
                        name="mapel"
                        class="w-full border border-gray-200
                               rounded-xl px-3.5 py-2.5
                               text-xs text-dark-green bg-white
                               outline-none
                               focus:border-medium-green
                               focus:ring-2 focus:ring-medium-green/10">

                        <option selected>Matematika Terapan</option>
                        <option>Bimbingan Konseling</option>
                        <option>Bahasa Daerah</option>
                        <option>Bahasa Indonesia</option>
                        <option>Bahasa Inggris</option>
                        <option>Informatika</option>

                    </select>
                </div>


                <!-- Status -->
                <div>
                    <label for="editStatus"
                           class="block text-[10px] font-bold
                                  uppercase tracking-wider
                                  text-gray-500 mb-1.5">
                        Status
                    </label>

                    <select
                        id="editStatus"
                        name="status"
                        class="w-full border border-gray-200
                               rounded-xl px-3.5 py-2.5
                               text-xs text-dark-green bg-white
                               outline-none
                               focus:border-medium-green
                               focus:ring-2 focus:ring-medium-green/10">

                        <option value="aktif" selected>Aktif</option>
                        <option value="nonaktif">Nonaktif</option>

                    </select>
                </div>

            </div>


            <!-- Footer -->
            <div class="px-5 py-4 bg-gray-50 border-t border-gray-100
                        flex flex-col-reverse sm:flex-row
                        justify-end gap-2">

                <button
                    type="button"
                    onclick="closeEditGuru()"
                    class="px-4 py-2.5 rounded-xl
                           bg-white border border-gray-200
                           text-gray-600 text-[11px] font-bold
                           hover:bg-gray-100 transition">
                    Batal
                </button>

                <button
                    type="submit"
                    class="px-4 py-2.5 rounded-xl
                           bg-dark-green hover:bg-medium-green
                           text-white text-[11px] font-bold
                           transition inline-flex items-center
                           justify-center gap-2">

                    <i class="fa-solid fa-check"></i>
                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>
</div>


<!-- POPUP KONFIRMASI -->
<div id="confirmSaveModal"
     class="fixed inset-0 z-[60] hidden items-center justify-center p-4">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-dark-green/50 backdrop-blur-sm"></div>

    <!-- Modal -->
    <div class="relative w-full max-w-sm bg-white rounded-2xl
                shadow-xl p-5">

        <div class="flex items-start gap-3">

            <div class="w-10 h-10 rounded-xl bg-amber-50
                        text-amber-600 flex items-center
                        justify-center shrink-0">

                <i class="fa-solid fa-triangle-exclamation text-sm"></i>

            </div>

            <div>
                <h2 class="text-sm font-extrabold text-dark-green">
                    Simpan perubahan?
                </h2>

                <p class="text-[11px] text-gray-500 mt-1.5 leading-relaxed">
                    Pastikan data guru yang kamu ubah sudah benar.
                    Perubahan akan disimpan ke data guru.
                </p>
            </div>

        </div>


        <div class="flex justify-end gap-2 mt-5">

            <button
                type="button"
                onclick="closeConfirmSave()"
                class="px-4 py-2.5 rounded-xl
                       bg-gray-100 hover:bg-gray-200
                       text-gray-600 text-[11px] font-bold
                       transition">
                Batal
            </button>

            <button
                type="button"
                onclick="confirmSave()"
                class="px-4 py-2.5 rounded-xl
                       bg-dark-green hover:bg-medium-green
                       text-white text-[11px] font-bold
                       transition inline-flex items-center gap-2">

                <i class="fa-solid fa-check"></i>
                Ya, Simpan

            </button>

        </div>

    </div>
</div>


<script>

    function openEditGuru() {
        const modal = document.getElementById('editGuruModal');

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        document.body.classList.add('overflow-hidden');
    }


    function closeEditGuru() {
        const modal = document.getElementById('editGuruModal');

        modal.classList.add('hidden');
        modal.classList.remove('flex');

        document.body.classList.remove('overflow-hidden');
    }


    function showConfirmSave(event) {
        event.preventDefault();

        const modal = document.getElementById('confirmSaveModal');

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }


    function closeConfirmSave() {
        const modal = document.getElementById('confirmSaveModal');

        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }


    function confirmSave() {

        /*
         * FE sementara.
         * Nanti bagian ini diganti dengan submit
         * ke route backend setelah API/controller siap.
         */

        closeConfirmSave();
        closeEditGuru();

        alert('Perubahan data guru berhasil disimpan.');
    }

</script>

</body>
</html>