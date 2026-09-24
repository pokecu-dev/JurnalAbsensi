<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Siswa</title>

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


    <!-- ===================================================== -->
    <!-- SIDEBAR -->
    <!-- ===================================================== -->

    <aside class="hidden md:flex md:w-56
                  bg-dark-green text-white
                  flex-col justify-between
                  p-5 shrink-0
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
            <nav class="flex flex-col gap-4
                        text-xs font-semibold">


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
                                  px-3 py-2 rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition-all duration-200
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-house
                                      w-4 text-center"></i>

                            Dashboard

                        </a>


                        <!-- MONITORING JURNAL -->
                        <a href="{{ url('/admin/monitoring_jurnal') }}"
                           class="flex items-center gap-3
                                  px-3 py-2 rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition-all duration-200
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-book-bookmark
                                      w-4 text-center"></i>

                            Monitoring Jurnal

                        </a>


                        <!-- DISPENSASI -->
                        <a href="{{ url('/admin/data_dispensasi') }}"
                           class="flex items-center gap-3
                                  px-3 py-2 rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition-all duration-200
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-file-signature
                                      w-4 text-center"></i>

                            Dispensasi

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

                        <!-- DATA GURU -->
                        <a href="{{ url('/admin/data_guru') }}"
                           class="flex items-center gap-3
                                  px-3 py-2 rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition-all duration-200
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-chalkboard-user
                                      w-4 text-center"></i>

                            Data Guru

                        </a>


                        <!-- DATA SISWA ACTIVE -->
                        <a href="{{ url('/admin/data_siswa') }}"
                           class="flex items-center gap-3
                                  px-3 py-2 rounded-xl
                                  bg-white/10
                                  text-mint-green
                                  font-bold
                                  transition-all duration-200">

                            <i class="fa-solid fa-user-graduate
                                      w-4 text-center"></i>

                            Data Siswa

                        </a>


                        <!-- DATA KELAS -->
                        <a href="{{ url('/admin/data_kelas') }}"
                           class="flex items-center gap-3
                                  px-3 py-2 rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition-all duration-200
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-school
                                      w-4 text-center"></i>

                            Data Kelas

                        </a>


                        <!-- MATA PELAJARAN -->
                        <a href="{{ url('/admin/data_mapel') }}"
                           class="flex items-center gap-3
                                  px-3 py-2 rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition-all duration-200
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-book-open
                                      w-4 text-center"></i>

                            Mata Pelajaran

                        </a>


                        <!-- JADWAL -->
                        <a href="{{ url('/admin/jadwal') }}"
                           class="flex items-center gap-3
                                  px-3 py-2 rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition-all duration-200
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-calendar-days
                                      w-4 text-center"></i>

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



    <!-- ===================================================== -->
    <!-- MAIN -->
    <!-- ===================================================== -->

    <main class="flex-1 p-4 md:p-6 overflow-y-auto">


        <!-- HEADER -->
        <header class="mb-5">

            <div class="flex flex-col sm:flex-row
                        sm:items-center
                        sm:justify-between
                        gap-4">

                <div>

                    <p class="text-[10px] font-bold uppercase
                              tracking-wider
                              text-medium-green mb-1">

                        Data Master

                    </p>


                    <h1 class="text-xl md:text-2xl
                               font-extrabold
                               text-dark-green">

                        Data Siswa

                    </h1>


                    <p class="text-xs text-gray-500 mt-1">

                        Kelola seluruh data siswa yang terdaftar.

                    </p>

                </div>


                <!-- TAMBAH SISWA -->
                <button
                    type="button"
                    onclick="openTambahSiswa()"
                    class="bg-dark-green
                           hover:bg-medium-green
                           active:scale-95
                           text-white
                           text-xs font-bold
                           px-4 py-2.5
                           rounded-xl
                           transition-all duration-200
                           inline-flex items-center
                           gap-2 whitespace-nowrap">

                    <i class="fa-solid fa-plus"></i>

                    Tambah Siswa

                </button>

            </div>

        </header>



        <!-- ================================================= -->
        <!-- FILTER -->
        <!-- ================================================= -->

        <section class="bg-white
                        rounded-2xl
                        shadow-sm
                        p-4
                        mb-5">

            <div class="grid grid-cols-1
                        md:grid-cols-3
                        gap-3">


                <!-- SEARCH -->
                <div>

                    <label class="block text-[10px]
                                  font-bold
                                  uppercase
                                  tracking-wider
                                  text-gray-400
                                  mb-1.5">

                        Cari Nama Siswa

                    </label>


                    <div class="relative">

                        <i class="fa-solid fa-magnifying-glass
                                  absolute left-3 top-1/2
                                  -translate-y-1/2
                                  text-gray-400 text-xs"></i>


                        <input
                            type="text"
                            id="searchSiswa"
                            placeholder="Cari nama siswa..."
                            class="w-full
                                   border border-gray-200
                                   rounded-xl
                                   pl-9 pr-3 py-2.5
                                   text-xs
                                   outline-none
                                   focus:border-medium-green
                                   focus:ring-2
                                   focus:ring-medium-green/10
                                   transition-all duration-200">

                    </div>

                </div>


                <!-- TINGKAT -->
                <div>

                    <label class="block text-[10px]
                                  font-bold
                                  uppercase
                                  tracking-wider
                                  text-gray-400
                                  mb-1.5">

                        Tingkat

                    </label>


                    <select
                        id="filterTingkat"
                        class="w-full
                               border border-gray-200
                               rounded-xl
                               px-3 py-2.5
                               text-xs
                               bg-white
                               outline-none
                               focus:border-medium-green
                               focus:ring-2
                               focus:ring-medium-green/10
                               transition-all duration-200">

                        <option value="">
                            Semua Tingkat
                        </option>

                        <option value="10">
                            Kelas 10
                        </option>

                        <option value="11">
                            Kelas 11
                        </option>

                        <option value="12">
                            Kelas 12
                        </option>

                    </select>

                </div>


                <!-- KELAS -->
                <div>

                    <label class="block text-[10px]
                                  font-bold
                                  uppercase
                                  tracking-wider
                                  text-gray-400
                                  mb-1.5">

                        Kelas

                    </label>


                    <select
                        id="filterKelas"
                        class="w-full
                               border border-gray-200
                               rounded-xl
                               px-3 py-2.5
                               text-xs
                               bg-white
                               outline-none
                               focus:border-medium-green
                               focus:ring-2
                               focus:ring-medium-green/10
                               transition-all duration-200">

                        <option value="">
                            Semua Kelas
                        </option>

                        <option value="X RPL 1">
                            X RPL 1
                        </option>

                        <option value="X RPL 2">
                            X RPL 2
                        </option>

                        <option value="X TKJ 1">
                            X TKJ 1
                        </option>

                        <option value="X AKL 1">
                            X AKL 1
                        </option>

                        <option value="XI RPL 1">
                            XI RPL 1
                        </option>

                        <option value="XI RPL 2">
                            XI RPL 2
                        </option>

                        <option value="XI TKJ 1">
                            XI TKJ 1
                        </option>

                        <option value="XI AKL 1">
                            XI AKL 1
                        </option>

                        <option value="XII RPL 1">
                            XII RPL 1
                        </option>

                        <option value="XII RPL 2">
                            XII RPL 2
                        </option>

                        <option value="XII TKJ 1">
                            XII TKJ 1
                        </option>

                        <option value="XII AKL 1">
                            XII AKL 1
                        </option>

                    </select>

                </div>

            </div>

        </section>



        <!-- ================================================= -->
        <!-- LIST SISWA -->
        <!-- ================================================= -->

        <section class="bg-white
                        rounded-2xl
                        shadow-sm
                        overflow-hidden">


            <!-- HEADER LIST -->
            <div class="px-5 py-4
                        border-b border-gray-100
                        flex items-center
                        justify-between
                        gap-3">

                <div>

                    <h2 class="text-sm
                               font-extrabold
                               text-dark-green">

                        Daftar Siswa

                    </h2>


                    <p class="text-[10px]
                              text-gray-400
                              mt-0.5">

                        Siswa diurutkan berdasarkan nama A–Z.

                    </p>

                </div>


                <span id="jumlahSiswa"
                      class="bg-emerald-50
                             text-emerald-700
                             text-[10px]
                             font-bold
                             px-2.5 py-1
                             rounded-lg">

                    12 Siswa

                </span>

            </div>



            <!-- DATA SISWA -->
            <div id="daftarSiswa"
                 class="p-4 space-y-3">


                <!-- ================================================= -->
                <!-- SISWA 1 -->
                <!-- ================================================= -->

                <div class="siswa-item group
                            border border-gray-100
                            rounded-xl
                            p-3
                            transition-all duration-200
                            hover:-translate-y-0.5
                            hover:border-medium-green/30
                            hover:shadow-sm"
                     data-nama="MARVEL MAULANA SAPUTRA"
                     data-tingkat="11"
                     data-kelas="XI RPL 2">


                    <div class="flex items-center
                                justify-between
                                gap-3">


                        <!-- IDENTITAS SISWA -->
                        <a href="{{ url('/admin/data_siswa/1') }}"
                           class="flex items-start
                                  gap-3
                                  flex-1
                                  min-w-0
                                  rounded-xl
                                  transition-all duration-200
                                  active:scale-[0.98]">


                            <!-- ICON -->
                            <div class="w-10 h-10
                                        shrink-0
                                        rounded-xl
                                        bg-dark-green
                                        text-mint-green
                                        flex items-center
                                        justify-center
                                        transition-all duration-200
                                        group-hover:bg-medium-green">

                                <i class="fa-solid fa-user text-xs"></i>

                            </div>


                            <!-- INFORMASI -->
                            <div class="min-w-0">

                                <h3 class="text-xs
                                           font-extrabold
                                           text-dark-green
                                           truncate
                                           transition-colors duration-200
                                           group-hover:text-medium-green">

                                    MARVEL MAULANA SAPUTRA

                                </h3>


                                <p class="text-[10px]
                                          text-gray-400
                                          mt-1">

                                    Kelas:

                                    <span class="text-gray-600
                                                 transition-colors duration-200
                                                 group-hover:text-dark-green">

                                        XI RPL 2

                                    </span>

                                </p>

                            </div>

                        </a>


                        <!-- DETAIL -->
                        <a href="{{ url('/admin/data_siswa/1') }}"
                           class="inline-flex
                                  items-center
                                  gap-1.5
                                  bg-dark-green
                                  text-white
                                  hover:bg-medium-green
                                  active:scale-95
                                  text-[10px]
                                  font-bold
                                  px-2.5 py-1.5
                                  rounded-lg
                                  transition-all duration-200
                                  shrink-0">

                            <i class="fa-solid fa-eye"></i>

                            Detail

                        </a>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- SISWA 2 -->
                <!-- ================================================= -->

                <div class="siswa-item group
                            border border-gray-100
                            rounded-xl
                            p-3
                            transition-all duration-200
                            hover:-translate-y-0.5
                            hover:border-medium-green/30
                            hover:shadow-sm"
                     data-nama="MARWA RIZQIANI PUTRI"
                     data-tingkat="11"
                     data-kelas="XI RPL 2">


                    <div class="flex items-center
                                justify-between
                                gap-3">


                        <a href="{{ url('/admin/data_siswa/2') }}"
                           class="flex items-start
                                  gap-3
                                  flex-1
                                  min-w-0
                                  rounded-xl
                                  transition-all duration-200
                                  active:scale-[0.98]">


                            <div class="w-10 h-10
                                        shrink-0
                                        rounded-xl
                                        bg-dark-green
                                        text-mint-green
                                        flex items-center
                                        justify-center
                                        transition-all duration-200
                                        group-hover:bg-medium-green">

                                <i class="fa-solid fa-user text-xs"></i>

                            </div>


                            <div class="min-w-0">

                                <h3 class="text-xs
                                           font-extrabold
                                           text-dark-green
                                           truncate
                                           transition-colors duration-200
                                           group-hover:text-medium-green">

                                    MARWA RIZQIANI PUTRI

                                </h3>


                                <p class="text-[10px]
                                          text-gray-400
                                          mt-1">

                                    Kelas:

                                    <span class="text-gray-600
                                                 transition-colors duration-200
                                                 group-hover:text-dark-green">

                                        XI RPL 2

                                    </span>

                                </p>

                            </div>

                        </a>


                        <a href="{{ url('/admin/data_siswa/2') }}"
                           class="inline-flex
                                  items-center
                                  gap-1.5
                                  bg-dark-green
                                  text-white
                                  hover:bg-medium-green
                                  active:scale-95
                                  text-[10px]
                                  font-bold
                                  px-2.5 py-1.5
                                  rounded-lg
                                  transition-all duration-200
                                  shrink-0">

                            <i class="fa-solid fa-eye"></i>

                            Detail

                        </a>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- SISWA 3 -->
                <!-- ================================================= -->

                <div class="siswa-item group
                            border border-gray-100
                            rounded-xl
                            p-3
                            transition-all duration-200
                            hover:-translate-y-0.5
                            hover:border-medium-green/30
                            hover:shadow-sm"
                     data-nama="MAULANA QUBRO ALGHOZALI"
                     data-tingkat="10"
                     data-kelas="X RPL 1">


                    <div class="flex items-center
                                justify-between
                                gap-3">


                        <a href="{{ url('/admin/data_siswa/3') }}"
                           class="flex items-start
                                  gap-3
                                  flex-1
                                  min-w-0
                                  rounded-xl
                                  transition-all duration-200
                                  active:scale-[0.98]">


                            <div class="w-10 h-10
                                        shrink-0
                                        rounded-xl
                                        bg-dark-green
                                        text-mint-green
                                        flex items-center
                                        justify-center
                                        transition-all duration-200
                                        group-hover:bg-medium-green">

                                <i class="fa-solid fa-user text-xs"></i>

                            </div>


                            <div class="min-w-0">

                                <h3 class="text-xs
                                           font-extrabold
                                           text-dark-green
                                           truncate
                                           transition-colors duration-200
                                           group-hover:text-medium-green">

                                    MAULANA QUBRO ALGHOZALI

                                </h3>


                                <p class="text-[10px]
                                          text-gray-400
                                          mt-1">

                                    Kelas:

                                    <span class="text-gray-600
                                                 transition-colors duration-200
                                                 group-hover:text-dark-green">

                                        X RPL 1

                                    </span>

                                </p>

                            </div>

                        </a>


                        <a href="{{ url('/admin/data_siswa/3') }}"
                           class="inline-flex
                                  items-center
                                  gap-1.5
                                  bg-dark-green
                                  text-white
                                  hover:bg-medium-green
                                  active:scale-95
                                  text-[10px]
                                  font-bold
                                  px-2.5 py-1.5
                                  rounded-lg
                                  transition-all duration-200
                                  shrink-0">

                            <i class="fa-solid fa-eye"></i>

                            Detail

                        </a>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- SISWA 4 -->
                <!-- ================================================= -->

                <div class="siswa-item group
                            border border-gray-100
                            rounded-xl
                            p-3
                            transition-all duration-200
                            hover:-translate-y-0.5
                            hover:border-medium-green/30
                            hover:shadow-sm"
                     data-nama="MOCHAMAD RAFI NUR ALFAN"
                     data-tingkat="12"
                     data-kelas="XII RPL 1">


                    <div class="flex items-center
                                justify-between
                                gap-3">


                        <a href="{{ url('/admin/data_siswa/4') }}"
                           class="flex items-start
                                  gap-3
                                  flex-1
                                  min-w-0
                                  rounded-xl
                                  transition-all duration-200
                                  active:scale-[0.98]">


                            <div class="w-10 h-10
                                        shrink-0
                                        rounded-xl
                                        bg-dark-green
                                        text-mint-green
                                        flex items-center
                                        justify-center
                                        transition-all duration-200
                                        group-hover:bg-medium-green">

                                <i class="fa-solid fa-user text-xs"></i>

                            </div>


                            <div class="min-w-0">

                                <h3 class="text-xs
                                           font-extrabold
                                           text-dark-green
                                           truncate
                                           transition-colors duration-200
                                           group-hover:text-medium-green">

                                    MOCHAMAD RAFI NUR ALFAN

                                </h3>


                                <p class="text-[10px]
                                          text-gray-400
                                          mt-1">

                                    Kelas:

                                    <span class="text-gray-600
                                                 transition-colors duration-200
                                                 group-hover:text-dark-green">

                                        XII RPL 1

                                    </span>

                                </p>

                            </div>

                        </a>


                        <a href="{{ url('/admin/data_siswa/4') }}"
                           class="inline-flex
                                  items-center
                                  gap-1.5
                                  bg-dark-green
                                  text-white
                                  hover:bg-medium-green
                                  active:scale-95
                                  text-[10px]
                                  font-bold
                                  px-2.5 py-1.5
                                  rounded-lg
                                  transition-all duration-200
                                  shrink-0">

                            <i class="fa-solid fa-eye"></i>

                            Detail

                        </a>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- SISWA 5 -->
                <!-- ================================================= -->

                <div class="siswa-item group
                            border border-gray-100
                            rounded-xl
                            p-3
                            transition-all duration-200
                            hover:-translate-y-0.5
                            hover:border-medium-green/30
                            hover:shadow-sm"
                     data-nama="MOCHAMMAD WILDAN SEPTIANO PRASETYO"
                     data-tingkat="12"
                     data-kelas="XII RPL 1">


                    <div class="flex items-center
                                justify-between
                                gap-3">


                        <a href="{{ url('/admin/data_siswa/5') }}"
                           class="flex items-start
                                  gap-3
                                  flex-1
                                  min-w-0
                                  rounded-xl
                                  transition-all duration-200
                                  active:scale-[0.98]">


                            <div class="w-10 h-10
                                        shrink-0
                                        rounded-xl
                                        bg-dark-green
                                        text-mint-green
                                        flex items-center
                                        justify-center
                                        transition-all duration-200
                                        group-hover:bg-medium-green">

                                <i class="fa-solid fa-user text-xs"></i>

                            </div>


                            <div class="min-w-0">

                                <h3 class="text-xs
                                           font-extrabold
                                           text-dark-green
                                           truncate
                                           transition-colors duration-200
                                           group-hover:text-medium-green">

                                    MOCHAMMAD WILDAN SEPTIANO PRASETYO

                                </h3>


                                <p class="text-[10px]
                                          text-gray-400
                                          mt-1">

                                    Kelas:

                                    <span class="text-gray-600
                                                 transition-colors duration-200
                                                 group-hover:text-dark-green">

                                        XII RPL 1

                                    </span>

                                </p>

                            </div>

                        </a>


                        <a href="{{ url('/admin/data_siswa/5') }}"
                           class="inline-flex
                                  items-center
                                  gap-1.5
                                  bg-dark-green
                                  text-white
                                  hover:bg-medium-green
                                  active:scale-95
                                  text-[10px]
                                  font-bold
                                  px-2.5 py-1.5
                                  rounded-lg
                                  transition-all duration-200
                                  shrink-0">

                            <i class="fa-solid fa-eye"></i>

                            Detail

                        </a>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- SISWA 6 -->
                <!-- ================================================= -->

                <div class="siswa-item group
                            border border-gray-100
                            rounded-xl
                            p-3
                            transition-all duration-200
                            hover:-translate-y-0.5
                            hover:border-medium-green/30
                            hover:shadow-sm"
                     data-nama="MUHAMAD BAGUS PRASETIYO"
                     data-tingkat="11"
                     data-kelas="XI TKJ 1">


                    <div class="flex items-center
                                justify-between
                                gap-3">


                        <a href="{{ url('/admin/data_siswa/6') }}"
                           class="flex items-start
                                  gap-3
                                  flex-1
                                  min-w-0
                                  rounded-xl
                                  transition-all duration-200
                                  active:scale-[0.98]">


                            <div class="w-10 h-10
                                        shrink-0
                                        rounded-xl
                                        bg-dark-green
                                        text-mint-green
                                        flex items-center
                                        justify-center
                                        transition-all duration-200
                                        group-hover:bg-medium-green">

                                <i class="fa-solid fa-user text-xs"></i>

                            </div>


                            <div class="min-w-0">

                                <h3 class="text-xs
                                           font-extrabold
                                           text-dark-green
                                           truncate
                                           transition-colors duration-200
                                           group-hover:text-medium-green">

                                    MUHAMAD BAGUS PRASETIYO

                                </h3>


                                <p class="text-[10px]
                                          text-gray-400
                                          mt-1">

                                    Kelas:

                                    <span class="text-gray-600
                                                 transition-colors duration-200
                                                 group-hover:text-dark-green">

                                        XI TKJ 1

                                    </span>

                                </p>

                            </div>

                        </a>


                        <a href="{{ url('/admin/data_siswa/6') }}"
                           class="inline-flex
                                  items-center
                                  gap-1.5
                                  bg-dark-green
                                  text-white
                                  hover:bg-medium-green
                                  active:scale-95
                                  text-[10px]
                                  font-bold
                                  px-2.5 py-1.5
                                  rounded-lg
                                  transition-all duration-200
                                  shrink-0">

                            <i class="fa-solid fa-eye"></i>

                            Detail

                        </a>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- SISWA 7 -->
                <!-- ================================================= -->

                <div class="siswa-item group
                            border border-gray-100
                            rounded-xl
                            p-3
                            transition-all duration-200
                            hover:-translate-y-0.5
                            hover:border-medium-green/30
                            hover:shadow-sm"
                     data-nama="MUHAMMAD ADIP SOFIYULLOH"
                     data-tingkat="11"
                     data-kelas="XI RPL 1">


                    <div class="flex items-center
                                justify-between
                                gap-3">


                        <a href="{{ url('/admin/data_siswa/7') }}"
                           class="flex items-start
                                  gap-3
                                  flex-1
                                  min-w-0
                                  rounded-xl
                                  transition-all duration-200
                                  active:scale-[0.98]">


                            <div class="w-10 h-10
                                        shrink-0
                                        rounded-xl
                                        bg-dark-green
                                        text-mint-green
                                        flex items-center
                                        justify-center
                                        transition-all duration-200
                                        group-hover:bg-medium-green">

                                <i class="fa-solid fa-user text-xs"></i>

                            </div>


                            <div class="min-w-0">

                                <h3 class="text-xs
                                           font-extrabold
                                           text-dark-green
                                           truncate
                                           transition-colors duration-200
                                           group-hover:text-medium-green">

                                    MUHAMMAD ADIP SOFIYULLOH

                                </h3>


                                <p class="text-[10px]
                                          text-gray-400
                                          mt-1">

                                    Kelas:

                                    <span class="text-gray-600
                                                 transition-colors duration-200
                                                 group-hover:text-dark-green">

                                        XI RPL 1

                                    </span>

                                </p>

                            </div>

                        </a>


                        <a href="{{ url('/admin/data_siswa/7') }}"
                           class="inline-flex
                                  items-center
                                  gap-1.5
                                  bg-dark-green
                                  text-white
                                  hover:bg-medium-green
                                  active:scale-95
                                  text-[10px]
                                  font-bold
                                  px-2.5 py-1.5
                                  rounded-lg
                                  transition-all duration-200
                                  shrink-0">

                            <i class="fa-solid fa-eye"></i>

                            Detail

                        </a>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- SISWA 8 -->
                <!-- ================================================= -->

                <div class="siswa-item group
                            border border-gray-100
                            rounded-xl
                            p-3
                            transition-all duration-200
                            hover:-translate-y-0.5
                            hover:border-medium-green/30
                            hover:shadow-sm"
                     data-nama="MUHAMMAD ALBYAN AULIA"
                     data-tingkat="10"
                     data-kelas="X AKL 1">


                    <div class="flex items-center
                                justify-between
                                gap-3">


                        <a href="{{ url('/admin/data_siswa/8') }}"
                           class="flex items-start
                                  gap-3
                                  flex-1
                                  min-w-0
                                  rounded-xl
                                  transition-all duration-200
                                  active:scale-[0.98]">


                            <div class="w-10 h-10
                                        shrink-0
                                        rounded-xl
                                        bg-dark-green
                                        text-mint-green
                                        flex items-center
                                        justify-center
                                        transition-all duration-200
                                        group-hover:bg-medium-green">

                                <i class="fa-solid fa-user text-xs"></i>

                            </div>


                            <div class="min-w-0">

                                <h3 class="text-xs
                                           font-extrabold
                                           text-dark-green
                                           truncate
                                           transition-colors duration-200
                                           group-hover:text-medium-green">

                                    MUHAMMAD ALBYAN AULIA

                                </h3>


                                <p class="text-[10px]
                                          text-gray-400
                                          mt-1">

                                    Kelas:

                                    <span class="text-gray-600
                                                 transition-colors duration-200
                                                 group-hover:text-dark-green">

                                        X AKL 1

                                    </span>

                                </p>

                            </div>

                        </a>


                        <a href="{{ url('/admin/data_siswa/8') }}"
                           class="inline-flex
                                  items-center
                                  gap-1.5
                                  bg-dark-green
                                  text-white
                                  hover:bg-medium-green
                                  active:scale-95
                                  text-[10px]
                                  font-bold
                                  px-2.5 py-1.5
                                  rounded-lg
                                  transition-all duration-200
                                  shrink-0">

                            <i class="fa-solid fa-eye"></i>

                            Detail

                        </a>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- SISWA 9 -->
                <!-- ================================================= -->

                <div class="siswa-item group
                            border border-gray-100
                            rounded-xl
                            p-3
                            transition-all duration-200
                            hover:-translate-y-0.5
                            hover:border-medium-green/30
                            hover:shadow-sm"
                     data-nama="MUHAMMAD DUDE FAHREZI"
                     data-tingkat="10"
                     data-kelas="X RPL 2">


                    <div class="flex items-center
                                justify-between
                                gap-3">


                        <a href="{{ url('/admin/data_siswa/9') }}"
                           class="flex items-start
                                  gap-3
                                  flex-1
                                  min-w-0
                                  rounded-xl
                                  transition-all duration-200
                                  active:scale-[0.98]">


                            <div class="w-10 h-10
                                        shrink-0
                                        rounded-xl
                                        bg-dark-green
                                        text-mint-green
                                        flex items-center
                                        justify-center
                                        transition-all duration-200
                                        group-hover:bg-medium-green">

                                <i class="fa-solid fa-user text-xs"></i>

                            </div>


                            <div class="min-w-0">

                                <h3 class="text-xs
                                           font-extrabold
                                           text-dark-green
                                           truncate
                                           transition-colors duration-200
                                           group-hover:text-medium-green">

                                    MUHAMMAD DUDE FAHREZI

                                </h3>


                                <p class="text-[10px]
                                          text-gray-400
                                          mt-1">

                                    Kelas:

                                    <span class="text-gray-600
                                                 transition-colors duration-200
                                                 group-hover:text-dark-green">

                                        X RPL 2

                                    </span>

                                </p>

                            </div>

                        </a>


                        <a href="{{ url('/admin/data_siswa/9') }}"
                           class="inline-flex
                                  items-center
                                  gap-1.5
                                  bg-dark-green
                                  text-white
                                  hover:bg-medium-green
                                  active:scale-95
                                  text-[10px]
                                  font-bold
                                  px-2.5 py-1.5
                                  rounded-lg
                                  transition-all duration-200
                                  shrink-0">

                            <i class="fa-solid fa-eye"></i>

                            Detail

                        </a>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- SISWA 10 -->
                <!-- ================================================= -->

                <div class="siswa-item group
                            border border-gray-100
                            rounded-xl
                            p-3
                            transition-all duration-200
                            hover:-translate-y-0.5
                            hover:border-medium-green/30
                            hover:shadow-sm"
                     data-nama="MUHAMMAD FUAD HASAN"
                     data-tingkat="12"
                     data-kelas="XII TKJ 1">


                    <div class="flex items-center
                                justify-between
                                gap-3">


                        <a href="{{ url('/admin/data_siswa/10') }}"
                           class="flex items-start
                                  gap-3
                                  flex-1
                                  min-w-0
                                  rounded-xl
                                  transition-all duration-200
                                  active:scale-[0.98]">


                            <div class="w-10 h-10
                                        shrink-0
                                        rounded-xl
                                        bg-dark-green
                                        text-mint-green
                                        flex items-center
                                        justify-center
                                        transition-all duration-200
                                        group-hover:bg-medium-green">

                                <i class="fa-solid fa-user text-xs"></i>

                            </div>


                            <div class="min-w-0">

                                <h3 class="text-xs
                                           font-extrabold
                                           text-dark-green
                                           truncate
                                           transition-colors duration-200
                                           group-hover:text-medium-green">

                                    MUHAMMAD FUAD HASAN

                                </h3>


                                <p class="text-[10px]
                                          text-gray-400
                                          mt-1">

                                    Kelas:

                                    <span class="text-gray-600
                                                 transition-colors duration-200
                                                 group-hover:text-dark-green">

                                        XII TKJ 1

                                    </span>

                                </p>

                            </div>

                        </a>


                        <a href="{{ url('/admin/data_siswa/10') }}"
                           class="inline-flex
                                  items-center
                                  gap-1.5
                                  bg-dark-green
                                  text-white
                                  hover:bg-medium-green
                                  active:scale-95
                                  text-[10px]
                                  font-bold
                                  px-2.5 py-1.5
                                  rounded-lg
                                  transition-all duration-200
                                  shrink-0">

                            <i class="fa-solid fa-eye"></i>

                            Detail

                        </a>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- SISWA 11 -->
                <!-- ================================================= -->

                <div class="siswa-item group
                            border border-gray-100
                            rounded-xl
                            p-3
                            transition-all duration-200
                            hover:-translate-y-0.5
                            hover:border-medium-green/30
                            hover:shadow-sm"
                     data-nama="MUHAMMAD ILHAM NASHRULLAH"
                     data-tingkat="11"
                     data-kelas="XI AKL 1">


                    <div class="flex items-center
                                justify-between
                                gap-3">


                        <a href="{{ url('/admin/data_siswa/11') }}"
                           class="flex items-start
                                  gap-3
                                  flex-1
                                  min-w-0
                                  rounded-xl
                                  transition-all duration-200
                                  active:scale-[0.98]">


                            <div class="w-10 h-10
                                        shrink-0
                                        rounded-xl
                                        bg-dark-green
                                        text-mint-green
                                        flex items-center
                                        justify-center
                                        transition-all duration-200
                                        group-hover:bg-medium-green">

                                <i class="fa-solid fa-user text-xs"></i>

                            </div>


                            <div class="min-w-0">

                                <h3 class="text-xs
                                           font-extrabold
                                           text-dark-green
                                           truncate
                                           transition-colors duration-200
                                           group-hover:text-medium-green">

                                    MUHAMMAD ILHAM NASHRULLAH

                                </h3>


                                <p class="text-[10px]
                                          text-gray-400
                                          mt-1">

                                    Kelas:

                                    <span class="text-gray-600
                                                 transition-colors duration-200
                                                 group-hover:text-dark-green">

                                        XI AKL 1

                                    </span>

                                </p>

                            </div>

                        </a>


                        <a href="{{ url('/admin/data_siswa/11') }}"
                           class="inline-flex
                                  items-center
                                  gap-1.5
                                  bg-dark-green
                                  text-white
                                  hover:bg-medium-green
                                  active:scale-95
                                  text-[10px]
                                  font-bold
                                  px-2.5 py-1.5
                                  rounded-lg
                                  transition-all duration-200
                                  shrink-0">

                            <i class="fa-solid fa-eye"></i>

                            Detail

                        </a>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- SISWA 12 -->
                <!-- ================================================= -->

                <div class="siswa-item group
                            border border-gray-100
                            rounded-xl
                            p-3
                            transition-all duration-200
                            hover:-translate-y-0.5
                            hover:border-medium-green/30
                            hover:shadow-sm"
                     data-nama="MUHAMMAD RAFA AZRYELLO FARISHUTA"
                     data-tingkat="12"
                     data-kelas="XII RPL 2">


                    <div class="flex items-center
                                justify-between
                                gap-3">


                        <a href="{{ url('/admin/data_siswa/12') }}"
                           class="flex items-start
                                  gap-3
                                  flex-1
                                  min-w-0
                                  rounded-xl
                                  transition-all duration-200
                                  active:scale-[0.98]">


                            <div class="w-10 h-10
                                        shrink-0
                                        rounded-xl
                                        bg-dark-green
                                        text-mint-green
                                        flex items-center
                                        justify-center
                                        transition-all duration-200
                                        group-hover:bg-medium-green">

                                <i class="fa-solid fa-user text-xs"></i>

                            </div>


                            <div class="min-w-0">

                                <h3 class="text-xs
                                           font-extrabold
                                           text-dark-green
                                           truncate
                                           transition-colors duration-200
                                           group-hover:text-medium-green">

                                    MUHAMMAD RAFA AZRYELLO FARISHUTA

                                </h3>


                                <p class="text-[10px]
                                          text-gray-400
                                          mt-1">

                                    Kelas:

                                    <span class="text-gray-600
                                                 transition-colors duration-200
                                                 group-hover:text-dark-green">

                                        XII RPL 2

                                    </span>

                                </p>

                            </div>

                        </a>


                        <a href="{{ url('/admin/data_siswa/12') }}"
                           class="inline-flex
                                  items-center
                                  gap-1.5
                                  bg-dark-green
                                  text-white
                                  hover:bg-medium-green
                                  active:scale-95
                                  text-[10px]
                                  font-bold
                                  px-2.5 py-1.5
                                  rounded-lg
                                  transition-all duration-200
                                  shrink-0">

                            <i class="fa-solid fa-eye"></i>

                            Detail

                        </a>

                    </div>

                </div>

            </div>



            <!-- EMPTY STATE -->
            <div id="emptyState"
                 class="hidden px-5 py-12 text-center">

                <div class="w-12 h-12
                            rounded-2xl
                            bg-gray-100
                            text-gray-400
                            mx-auto
                            flex items-center
                            justify-center
                            mb-3">

                    <i class="fa-solid fa-user-slash"></i>

                </div>


                <p class="text-xs
                          font-bold
                          text-dark-green">

                    Siswa tidak ditemukan

                </p>


                <p class="text-[10px]
                          text-gray-400
                          mt-1">

                    Coba ubah pencarian atau filter.

                </p>

            </div>

        </section>



        <!-- MOBILE SCROLL HELPER -->
        <div class="fixed right-3 bottom-4 md:hidden">

            <button
                type="button"
                onclick="window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                })"
                class="w-9 h-9
                       rounded-full
                       bg-dark-green
                       text-white
                       shadow-lg
                       flex items-center
                       justify-center
                       hover:bg-medium-green
                       active:scale-95
                       transition-all duration-200">

                <i class="fa-solid fa-arrow-up text-xs"></i>

            </button>

        </div>

    </main>



    <!-- ===================================================== -->
    <!-- POPUP TAMBAH SISWA -->
    <!-- ===================================================== -->

    <div id="tambahSiswaModal"
         class="fixed inset-0 z-50 hidden
                items-center justify-center
                bg-black/40 px-4">


        <div class="bg-white
                    w-full max-w-md
                    rounded-2xl
                    shadow-xl
                    overflow-hidden">


            <!-- HEADER -->
            <div class="flex items-center
                        justify-between
                        px-5 py-4
                        border-b">

                <div>

                    <h2 class="text-base
                               font-extrabold
                               text-dark-green">

                        Tambah Siswa

                    </h2>


                    <p class="text-[11px]
                              text-gray-500
                              mt-1">

                        Tambahkan data siswa baru.

                    </p>

                </div>


                <button type="button"
                        onclick="closeTambahSiswa()"
                        class="w-8 h-8
                               rounded-lg
                               hover:bg-gray-100
                               active:scale-95
                               text-gray-500
                               flex items-center
                               justify-center
                               transition-all duration-200">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>


            <!-- FORM -->
            <div class="p-5 space-y-4">


                <!-- NAMA -->
                <div>

                    <label class="block text-xs
                                  font-bold
                                  text-dark-green
                                  mb-1.5">

                        Nama Lengkap

                    </label>


                    <input
                        type="text"
                        id="namaSiswa"
                        placeholder="Masukkan nama lengkap siswa"
                        class="w-full
                               border border-gray-200
                               rounded-xl
                               px-3 py-2.5
                               text-sm
                               outline-none
                               focus:ring-2
                               focus:ring-mint-green
                               focus:border-medium-green
                               transition-all duration-200">

                </div>


                <!-- KELAS -->
                <div>

                    <label class="block text-xs
                                  font-bold
                                  text-dark-green
                                  mb-1.5">

                        Kelas

                    </label>


                    <select
                        id="kelasSiswa"
                        class="w-full
                               border border-gray-200
                               rounded-xl
                               px-3 py-2.5
                               text-sm
                               outline-none
                               focus:ring-2
                               focus:ring-mint-green
                               focus:border-medium-green
                               transition-all duration-200">

                        <option value="">
                            Pilih kelas
                        </option>

                        <option value="X AKL 1">
                            X AKL 1
                        </option>

                        <option value="X AKL 2">
                            X AKL 2
                        </option>

                        <option value="XI RPL 1">
                            XI RPL 1
                        </option>

                        <option value="XI RPL 2">
                            XI RPL 2
                        </option>

                        <option value="XI TKJ 1">
                            XI TKJ 1
                        </option>

                        <option value="XI TKJ 2">
                            XI TKJ 2
                        </option>

                        <option value="XII RPL 1">
                            XII RPL 1
                        </option>

                        <option value="XII RPL 2">
                            XII RPL 2
                        </option>

                    </select>

                </div>


                <!-- ACTION -->
                <div class="flex justify-end
                            gap-2 pt-2">


                    <button type="button"
                            onclick="closeTambahSiswa()"
                            class="px-4 py-2.5
                                   rounded-xl
                                   text-xs font-bold
                                   text-gray-600
                                   bg-gray-100
                                   hover:bg-gray-200
                                   active:scale-95
                                   transition-all duration-200">

                        Batal

                    </button>


                    <button type="button"
                            onclick="confirmTambahSiswa()"
                            class="px-4 py-2.5
                                   rounded-xl
                                   text-xs font-bold
                                   text-white
                                   bg-dark-green
                                   hover:bg-medium-green
                                   active:scale-95
                                   transition-all duration-200">

                        <i class="fa-solid fa-check mr-1"></i>

                        Simpan

                    </button>

                </div>

            </div>

        </div>

    </div>



    <!-- ===================================================== -->
    <!-- POPUP KONFIRMASI -->
    <!-- ===================================================== -->

    <div id="confirmTambahSiswaModal"
         class="fixed inset-0 z-[60] hidden
                items-center justify-center
                bg-black/40 px-4">


        <div class="bg-white
                    w-full max-w-sm
                    rounded-2xl
                    shadow-xl
                    p-5
                    text-center">


            <div class="w-12 h-12
                        mx-auto
                        rounded-full
                        bg-mint-green/20
                        text-dark-green
                        flex items-center
                        justify-center
                        mb-3">

                <i class="fa-solid fa-circle-question text-lg"></i>

            </div>


            <h2 class="text-base
                       font-extrabold
                       text-dark-green">

                Simpan data siswa?

            </h2>


            <p class="text-xs
                      text-gray-500
                      mt-1.5">

                Pastikan nama dan kelas siswa sudah benar.

            </p>


            <div class="flex justify-center
                        gap-2 mt-5">


                <button type="button"
                        onclick="closeConfirmTambahSiswa()"
                        class="px-4 py-2.5
                               rounded-xl
                               text-xs font-bold
                               text-gray-600
                               bg-gray-100
                               hover:bg-gray-200
                               active:scale-95
                               transition-all duration-200">

                    Batal

                </button>


                <button type="button"
                        onclick="simpanSiswa()"
                        class="px-4 py-2.5
                               rounded-xl
                               text-xs font-bold
                               text-white
                               bg-dark-green
                               hover:bg-medium-green
                               active:scale-95
                               transition-all duration-200">

                    Ya, Simpan

                </button>

            </div>

        </div>

    </div>



    <!-- ===================================================== -->
    <!-- JAVASCRIPT -->
    <!-- ===================================================== -->

    <script>

        /* =====================================================
           FILTER SISWA
        ===================================================== */

        const searchInput =
            document.getElementById('searchSiswa');

        const filterTingkat =
            document.getElementById('filterTingkat');

        const filterKelas =
            document.getElementById('filterKelas');

        const siswaItems =
            document.querySelectorAll('.siswa-item');

        const jumlahSiswa =
            document.getElementById('jumlahSiswa');

        const emptyState =
            document.getElementById('emptyState');


        function filterSiswa() {

            const search =
                searchInput.value
                    .toLowerCase()
                    .trim();

            const tingkat =
                filterTingkat.value;

            const kelas =
                filterKelas.value;

            let jumlah = 0;


            siswaItems.forEach(item => {

                const nama =
                    item.dataset.nama.toLowerCase();

                const itemTingkat =
                    item.dataset.tingkat;

                const itemKelas =
                    item.dataset.kelas;


                const cocokNama =
                    nama.includes(search);

                const cocokTingkat =
                    !tingkat ||
                    itemTingkat === tingkat;

                const cocokKelas =
                    !kelas ||
                    itemKelas === kelas;


                const tampil =
                    cocokNama &&
                    cocokTingkat &&
                    cocokKelas;


                if (tampil) {

                    item.classList.remove('hidden');

                    jumlah++;

                } else {

                    item.classList.add('hidden');

                }

            });


            jumlahSiswa.textContent =
                `${jumlah} Siswa`;


            if (jumlah === 0) {

                emptyState.classList.remove('hidden');

            } else {

                emptyState.classList.add('hidden');

            }

        }


        searchInput.addEventListener(
            'input',
            filterSiswa
        );

        filterTingkat.addEventListener(
            'change',
            filterSiswa
        );

        filterKelas.addEventListener(
            'change',
            filterSiswa
        );



        /* =====================================================
           TAMBAH SISWA
        ===================================================== */

        function openTambahSiswa() {

            const modal =
                document.getElementById(
                    'tambahSiswaModal'
                );

            modal.classList.remove('hidden');

            modal.classList.add('flex');

        }


        function closeTambahSiswa() {

            const modal =
                document.getElementById(
                    'tambahSiswaModal'
                );

            modal.classList.add('hidden');

            modal.classList.remove('flex');

        }



        /* =====================================================
           KONFIRMASI TAMBAH SISWA
        ===================================================== */

        function confirmTambahSiswa() {

            const nama =
                document.getElementById(
                    'namaSiswa'
                ).value.trim();

            const kelas =
                document.getElementById(
                    'kelasSiswa'
                ).value;


            if (!nama || !kelas) {

                alert(
                    'Nama dan kelas siswa wajib diisi.'
                );

                return;

            }


            const modal =
                document.getElementById(
                    'confirmTambahSiswaModal'
                );

            modal.classList.remove('hidden');

            modal.classList.add('flex');

        }


        function closeConfirmTambahSiswa() {

            const modal =
                document.getElementById(
                    'confirmTambahSiswaModal'
                );

            modal.classList.add('hidden');

            modal.classList.remove('flex');

        }



        /* =====================================================
           SIMPAN SISWA
        ===================================================== */

        function simpanSiswa() {

            closeConfirmTambahSiswa();

            closeTambahSiswa();


            document.getElementById(
                'namaSiswa'
            ).value = '';


            document.getElementById(
                'kelasSiswa'
            ).value = '';


            alert(
                'Data siswa berhasil disimpan.'
            );

            // Nanti bagian ini diganti request ke backend.

        }

    </script>

</body>

</html>