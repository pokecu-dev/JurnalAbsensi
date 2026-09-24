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


                <!-- ========================= -->
                <!-- UTAMA -->
                <!-- ========================= -->

                <div>

                    <div class="text-[10px] uppercase
                                font-extrabold
                                text-gray-400
                                tracking-wider
                                mb-1.5 px-2">

                        Utama

                    </div>


                    <div class="space-y-0.5">

                        <!-- DASHBOARD ACTIVE -->
                        <a href="{{ url('/admin/dashboard') }}"
                           class="flex items-center gap-3
                                  px-3 py-2 rounded-xl
                                  bg-white/10
                                  text-mint-green
                                  font-bold
                                  transition-all duration-200
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-house
                                      w-4 text-center"></i>

                            Dashboard

                        </a>


                        <!-- MONITORING JURNAL -->
                        <a href="{{ url('/admin/data_jurnal') }}"
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


                <!-- ========================= -->
                <!-- DATA MASTER -->
                <!-- ========================= -->

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


                        <!-- DATA SISWA -->
                        <a href="{{ url('/admin/data_siswa') }}"
                           class="flex items-center gap-3
                                  px-3 py-2 rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition-all duration-200
                                  active:scale-[0.98]">

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
    <!-- MAIN CONTENT -->
    <!-- ===================================================== -->

    <main class="flex-1 p-4 md:p-6 overflow-y-auto">


        <!-- ================================================= -->
        <!-- HEADER -->
        <!-- ================================================= -->

        <header class="mb-5">

            <div class="flex items-center justify-between gap-4">

                <div>

                    <h1 class="text-xl md:text-2xl
                               font-extrabold
                               text-dark-green">

                        Dashboard Admin

                    </h1>

                    <p class="text-xs
                              text-medium-green
                              font-medium mt-1">

                        SMK Negeri 1 Boyolangu

                    </p>

                </div>

            </div>

        </header>



        <!-- ================================================= -->
        <!-- SUMMARY CARDS -->
        <!-- ================================================= -->

        <div class="grid grid-cols-2 lg:grid-cols-4
                    gap-4 mb-6">


            <!-- ===================== -->
            <!-- JURNAL -->
            <!-- ===================== -->

            <a href="{{ url('/admin/monitoring_jurnal') }}"
               class="group bg-white
                      rounded-2xl p-5
                      shadow-sm
                      border border-gray-100
                      hover:shadow-md
                      hover:-translate-y-1
                      transition-all duration-200
                      active:scale-[0.98]">

                <div class="flex items-center
                            justify-between mb-4">

                    <div class="w-11 h-11
                                rounded-xl
                                bg-green-100
                                flex items-center
                                justify-center
                                transition-all duration-200
                                group-hover:scale-105">

                        <i class="fa-solid fa-book-open
                                  text-[#428475]
                                  text-lg"></i>

                    </div>

                    <i class="fa-solid fa-arrow-right
                              text-gray-300
                              group-hover:text-medium-green
                              transition-colors duration-200"></i>

                </div>


                <p class="text-sm text-gray-500">
                    Jurnal
                </p>

                <h3 class="text-2xl font-bold
                           text-[#1A312C] mt-1">

                    -

                </h3>

                <p class="text-xs text-gray-400 mt-1">
                    Data jurnal
                </p>

            </a>



            <!-- ===================== -->
            <!-- GURU -->
            <!-- ===================== -->

            <a href="{{ url('/admin/data_guru') }}"
               class="group bg-white
                      rounded-2xl p-5
                      shadow-sm
                      border border-gray-100
                      hover:shadow-md
                      hover:-translate-y-1
                      transition-all duration-200
                      active:scale-[0.98]">

                <div class="flex items-center
                            justify-between mb-4">

                    <div class="w-11 h-11
                                rounded-xl
                                bg-blue-100
                                flex items-center
                                justify-center
                                transition-all duration-200
                                group-hover:scale-105">

                        <i class="fa-solid fa-chalkboard-teacher
                                  text-blue-600
                                  text-lg"></i>

                    </div>

                    <i class="fa-solid fa-arrow-right
                              text-gray-300
                              group-hover:text-medium-green
                              transition-colors duration-200"></i>

                </div>


                <p class="text-sm text-gray-500">
                    Guru
                </p>

                <h3 class="text-2xl font-bold
                           text-[#1A312C] mt-1">

                    -

                </h3>

                <p class="text-xs text-gray-400 mt-1">
                    Data guru
                </p>

            </a>



            <!-- ===================== -->
            <!-- SISWA -->
            <!-- ===================== -->

            <a href="{{ url('/admin/data_siswa') }}"
               class="group bg-white
                      rounded-2xl p-5
                      shadow-sm
                      border border-gray-100
                      hover:shadow-md
                      hover:-translate-y-1
                      transition-all duration-200
                      active:scale-[0.98]">

                <div class="flex items-center
                            justify-between mb-4">

                    <div class="w-11 h-11
                                rounded-xl
                                bg-purple-100
                                flex items-center
                                justify-center
                                transition-all duration-200
                                group-hover:scale-105">

                        <i class="fa-solid fa-user-graduate
                                  text-purple-600
                                  text-lg"></i>

                    </div>

                    <i class="fa-solid fa-arrow-right
                              text-gray-300
                              group-hover:text-medium-green
                              transition-colors duration-200"></i>

                </div>


                <p class="text-sm text-gray-500">
                    Siswa
                </p>

                <h3 class="text-2xl font-bold
                           text-[#1A312C] mt-1">

                    -

                </h3>

                <p class="text-xs text-gray-400 mt-1">
                    Data siswa
                </p>

            </a>



            <!-- ===================== -->
            <!-- DISPENSASI -->
            <!-- ===================== -->

            <a href="{{ url('/admin/data_dispensasi') }}"
               class="group bg-white
                      rounded-2xl p-5
                      shadow-sm
                      border border-gray-100
                      hover:shadow-md
                      hover:-translate-y-1
                      transition-all duration-200
                      active:scale-[0.98]">

                <div class="flex items-center
                            justify-between mb-4">

                    <div class="w-11 h-11
                                rounded-xl
                                bg-amber-100
                                flex items-center
                                justify-center
                                transition-all duration-200
                                group-hover:scale-105">

                        <i class="fa-solid fa-file-signature
                                  text-amber-600
                                  text-lg"></i>

                    </div>

                    <i class="fa-solid fa-arrow-right
                              text-gray-300
                              group-hover:text-medium-green
                              transition-colors duration-200"></i>

                </div>


                <p class="text-sm text-gray-500">
                    Dispensasi
                </p>

                <h3 class="text-2xl font-bold
                           text-[#1A312C] mt-1">

                    -

                </h3>

                <p class="text-xs text-gray-400 mt-1">
                    Data dispensasi
                </p>

            </a>

        </div>



        <!-- ================================================= -->
        <!-- RIWAYAT JURNAL HARI INI -->
        <!-- ================================================= -->

        <section class="bg-white
                        p-4 md:p-5
                        rounded-2xl
                        shadow-sm
                        mb-6">


            <!-- HEADER SECTION -->
            <div class="flex justify-between
                        items-center
                        mb-4">

                <div>

                    <h2 class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Riwayat Jurnal Hari Ini

                    </h2>

                    <p class="text-xs text-gray-400 mt-1">

                        Jurnal yang telah diisi guru hari ini

                    </p>

                </div>


                <a href="{{ url('/admin/data_jurnal') }}"
                   class="text-xs font-bold
                          text-medium-green
                          hover:underline">

                    Lihat semua →

                </a>

            </div>


            <!-- TABLE -->
            <div class="overflow-x-auto">

                <table class="w-full text-left text-xs">

                    <thead>

                        <tr class="text-gray-400
                                   border-b border-gray-100
                                   text-[10px]
                                   uppercase
                                   tracking-wider">

                            <th class="pb-2 font-bold">
                                Guru
                            </th>

                            <th class="pb-2 font-bold">
                                Kelas
                            </th>

                            <th class="pb-2 font-bold">
                                Mata Pelajaran
                            </th>

                            <th class="pb-2 font-bold text-right">
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-50">


                        <!-- JURNAL 1 -->
                        <tr class="hover:bg-gray-50
                                   transition-colors duration-150">

                            <td class="py-3
                                       font-bold
                                       text-dark-green">

                                Sulistyowati, S.Pd.

                            </td>


                            <td class="py-3 text-gray-500">

                                XI RPL 2

                            </td>


                            <td class="py-3 text-gray-600">

                                Matematika Terapan

                            </td>


                            <td class="py-3 text-right">

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


                        <!-- JURNAL 2 -->
                        <tr class="hover:bg-gray-50
                                   transition-colors duration-150">

                            <td class="py-3
                                       font-bold
                                       text-dark-green">

                                Bambang S., M.Pd.

                            </td>


                            <td class="py-3 text-gray-500">

                                XI TKJ 3

                            </td>


                            <td class="py-3 text-gray-600">

                                PJOK / Olahraga

                            </td>


                            <td class="py-3 text-right">

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



        <!-- ================================================= -->
        <!-- PENGAJUAN DISPENSASI -->
        <!-- ================================================= -->

        <section class="bg-white
                        p-4 md:p-5
                        rounded-2xl
                        shadow-sm">


            <!-- HEADER SECTION -->
            <div class="flex justify-between
                        items-center
                        mb-4">

                <div>

                    <h2 class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Pengajuan Dispensasi

                    </h2>

                    <p class="text-xs text-gray-400 mt-1">

                        Data siswa yang mengajukan dispensasi

                    </p>

                </div>


                <a href="{{ url('/admin/data_dispensasi') }}"
                   class="text-xs font-bold
                          text-medium-green
                          hover:underline">

                    Lihat semua →

                </a>

            </div>



            <!-- LIST DISPENSASI -->
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
                            transition-colors duration-150">

                    <div>

                        <p class="text-sm
                                  font-bold
                                  text-dark-green">

                            Andi Pratama

                        </p>


                        <p class="text-xs
                                  text-gray-500
                                  mt-1">

                            XI RPL 2

                        </p>


                        <p class="text-xs
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
                                 text-[10px]">

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
                            transition-colors duration-150">

                    <div>

                        <p class="text-sm
                                  font-bold
                                  text-dark-green">

                            Siti Nurhaliza

                        </p>


                        <p class="text-xs
                                  text-gray-500
                                  mt-1">

                            XI DKV 1

                        </p>


                        <p class="text-xs
                                  text-gray-600
                                  mt-1">

                            Kebutuhan:
                            Keperluan keluarga

                        </p>

                    </div>


                    <span class="self-start
                                 sm:self-center
                                 bg-amber-100
                                 text-amber-700
                                 font-bold
                                 px-2.5 py-1
                                 rounded-md
                                 text-[10px]">

                        Menunggu

                    </span>

                </div>

            </div>

        </section>


    </main>

</body>

</html>