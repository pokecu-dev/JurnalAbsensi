<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Dispensasi</title>

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



                        <!-- DISPENSASI ACTIVE -->

                        <a href="{{ url('/admin/data_dispensasi') }}"
                           class="flex items-center gap-3
                                  px-3 py-2.5
                                  rounded-xl
                                  bg-white/10
                                  text-mint-green
                                  font-bold">

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


                        <!-- DATA GURU -->

                        <a href="{{ url('/admin/data_guru') }}"
                           class="flex items-center gap-3
                                  px-3 py-2.5
                                  rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition">

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

        <a href="{{ url('/admin/data_dispensasi') }}"
        class="inline-flex items-center gap-2
                text-sm md:text-base
                font-bold
                text-medium-green
                hover:text-dark-green
                transition
                mb-4 md:mb-5">

            <i class="fa-solid fa-arrow-left text-xs md:text-sm"></i>

            <h1
                class="text-xl md:text-2xl
                       font-extrabold
                       text-dark-green">

                Dispensasi Siswa

            </h1>
        </a>

            <p
                class="text-sm md:text-sm
                       text-gray-500
                      
                       leading-relaxed">

                Periksa informasi pengajuan sebelum
                mengambil keputusan.

            </p>

        </div>


        <!-- STATUS -->

        <span
            class="self-start
                   sm:self-center
                   inline-flex
                   items-center
                   bg-amber-100
                   text-amber-700
                   text-xs md:text-sm
                   font-bold
                   px-3.5 py-2
                   rounded-xl">

            <i class="fa-solid fa-clock mr-1.5"></i>

            Menunggu Persetujuan

        </span>

    </div>

</header>



        <!-- ================================================= -->
        <!-- DATA SISWA -->
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

                    <i class="fa-solid fa-user-graduate"></i>

                </div>


                <div>

                    <h2
                        class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Data Siswa

                    </h2>


                    <p
                        class="text-xs
                               text-gray-500
                               mt-0.5">

                        Informasi siswa yang mengajukan dispensasi.

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

                        Nama Siswa

                    </p>


                    <p
                        class="text-sm
                               font-extrabold
                               text-dark-green
                               leading-snug">

                        MARVEL MAULANA SAPUTRA

                    </p>

                </div>



                <!-- NIS -->

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

                        NIS

                    </p>


                    <p
                        class="text-sm
                               font-bold
                               text-dark-green">

                        24XXXXXX

                    </p>

                </div>



                <!-- KELAS -->

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

                        Kelas

                    </p>


                    <p
                        class="text-sm
                               font-bold
                               text-dark-green">

                        XI RPL 2

                    </p>

                </div>



                <!-- WALI -->

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

                        Wali Kelas

                    </p>


                    <p
                        class="text-sm
                               font-bold
                               text-dark-green
                               leading-snug">

                        Budi Santoso, S.Kom.

                    </p>

                </div>

            </div>

        </section>



        <!-- ================================================= -->
        <!-- DETAIL KEPERLUAN -->
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

                    <i class="fa-solid fa-file-lines"></i>

                </div>


                <div>

                    <h2
                        class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Detail Keperluan

                    </h2>


                    <p
                        class="text-xs
                               text-gray-500
                               mt-0.5">

                        Informasi kegiatan atau keperluan dispensasi.

                    </p>

                </div>

            </div>



            <div class="space-y-4">


                <!-- KATEGORI -->

                <div>

                    <p
                        class="text-[10px]
                               uppercase
                               tracking-wider
                               font-bold
                               text-gray-400
                               mb-1.5">

                        Kategori

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

                        Lomba / Prestasi

                    </span>

                </div>



                <!-- NAMA KEGIATAN -->

                <div>

                    <p
                        class="text-[10px]
                               uppercase
                               tracking-wider
                               font-bold
                               text-gray-400
                               mb-1.5">

                        Nama Kegiatan

                    </p>


                    <p
                        class="text-sm
                               font-bold
                               text-dark-green
                               leading-relaxed">

                        Lomba Desain Grafis Tingkat Kabupaten

                    </p>

                </div>



                <!-- KEPERLUAN -->

                <div>

                    <p
                        class="text-[10px]
                               uppercase
                               tracking-wider
                               font-bold
                               text-gray-400
                               mb-1.5">

                        Keperluan

                    </p>


                    <div
                        class="bg-gray-50
                               rounded-xl
                               p-3.5">

                        <p
                            class="text-sm
                                   text-gray-600
                                   leading-relaxed">

                            Mengikuti kegiatan perlombaan desain grafis
                            tingkat kabupaten sebagai perwakilan sekolah.

                        </p>

                    </div>

                </div>



                <!-- TANGGAL -->

                <div
                    class="grid
                           grid-cols-2
                           gap-2.5">


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

                            Mulai

                        </p>


                        <p
                            class="text-sm
                                   font-bold
                                   text-dark-green
                                   leading-snug">

                            15 September 2026

                        </p>

                    </div>



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

                            Selesai

                        </p>


                        <p
                            class="text-sm
                                   font-bold
                                   text-dark-green
                                   leading-snug">

                            17 September 2026

                        </p>

                    </div>

                </div>



                <!-- TEMPAT -->

                <div
                    class="grid
                           grid-cols-1
                           sm:grid-cols-2
                           gap-2.5">


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

                            Tempat

                        </p>


                        <p
                            class="text-sm
                                   font-bold
                                   text-dark-green
                                   leading-snug">

                            Gedung Kesenian Kabupaten

                        </p>

                    </div>



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

                            Penyelenggara

                        </p>


                        <p
                            class="text-sm
                                   font-bold
                                   text-dark-green
                                   leading-snug">

                            Dinas Pendidikan Kabupaten

                        </p>

                    </div>

                </div>

            </div>

        </section>



        <!-- ================================================= -->
        <!-- LAMPIRAN -->
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

                    <i class="fa-solid fa-paperclip"></i>

                </div>


                <div>

                    <h2
                        class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Lampiran Berkas

                    </h2>


                    <p
                        class="text-xs
                               text-gray-500
                               mt-0.5">

                        Dokumen pendukung pengajuan.

                    </p>

                </div>

            </div>



            <div class="space-y-2.5">


                <!-- FILE 1 -->

                <div
                    class="flex items-center
                           justify-between
                           gap-3
                           p-3.5
                           rounded-xl
                           bg-gray-50
                           border border-gray-100">


                    <div
                        class="flex items-center
                               gap-3
                               min-w-0">


                        <div
                            class="w-10 h-10
                                   rounded-lg
                                   bg-red-50
                                   text-red-500
                                   flex items-center
                                   justify-center
                                   shrink-0">

                            <i class="fa-solid fa-file-pdf"></i>

                        </div>


                        <div class="min-w-0">

                            <p
                                class="text-sm
                                       font-bold
                                       text-dark-green
                                       truncate">

                                Surat_Tugas_FLS2N_2026.pdf

                            </p>


                            <p
                                class="text-xs
                                       text-gray-400
                                       mt-0.5">

                                1.4 MB

                            </p>

                        </div>

                    </div>


                    <button
                        type="button"
                        class="shrink-0
                               w-9 h-9
                               rounded-lg
                               bg-dark-green
                               text-white
                               hover:bg-medium-green
                               transition
                               flex items-center
                               justify-center"
                        title="Preview">

                        <i class="fa-solid fa-eye text-xs"></i>

                    </button>

                </div>



                <!-- FILE 2 -->

                <div
                    class="flex items-center
                           justify-between
                           gap-3
                           p-3.5
                           rounded-xl
                           bg-gray-50
                           border border-gray-100">


                    <div
                        class="flex items-center
                               gap-3
                               min-w-0">


                        <div
                            class="w-10 h-10
                                   rounded-lg
                                   bg-red-50
                                   text-red-500
                                   flex items-center
                                   justify-center
                                   shrink-0">

                            <i class="fa-solid fa-file-pdf"></i>

                        </div>


                        <div class="min-w-0">

                            <p
                                class="text-sm
                                       font-bold
                                       text-dark-green
                                       truncate">

                                Surat_Undangan.pdf

                            </p>


                            <p
                                class="text-xs
                                       text-gray-400
                                       mt-0.5">

                                820 KB

                            </p>

                        </div>

                    </div>


                    <button
                        type="button"
                        class="shrink-0
                               w-9 h-9
                               rounded-lg
                               bg-dark-green
                               text-white
                               hover:bg-medium-green
                               transition
                               flex items-center
                               justify-center"
                        title="Preview">

                        <i class="fa-solid fa-eye text-xs"></i>

                    </button>

                </div>

            </div>

        </section>



        <!-- ================================================= -->
        <!-- INFORMASI PENGAJUAN -->
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

                    <i class="fa-solid fa-clock-rotate-left"></i>

                </div>


                <div>

                    <h2
                        class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Informasi Pengajuan

                    </h2>


                    <p
                        class="text-xs
                               text-gray-500
                               mt-0.5">

                        Informasi waktu dan pengaju.

                    </p>

                </div>

            </div>



            <div
                class="grid
                       grid-cols-2
                       sm:grid-cols-3
                       gap-2.5">


                <!-- PENGAJU -->

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

                        Diajukan Oleh

                    </p>


                    <p
                        class="text-sm
                               font-bold
                               text-dark-green">

                        Guru Piket

                    </p>

                </div>



                <!-- TANGGAL -->

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

                        Tanggal

                    </p>


                    <p
                        class="text-sm
                               font-bold
                               text-dark-green
                               leading-snug">

                        15 September 2026

                    </p>

                </div>



                <!-- JAM -->

                <div
                    class="col-span-2
                           sm:col-span-1
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

                        Jam

                    </p>


                    <p
                        class="text-sm
                               font-bold
                               text-dark-green">

                        07.15 WIB

                    </p>

                </div>

            </div>

        </section>



        <!-- ================================================= -->
        <!-- TINDAKAN -->
        <!-- ================================================= -->

        <section
            class="bg-white
                   rounded-2xl
                   shadow-sm
                   p-4 md:p-5
                   mb-6">


            <div
                class="flex flex-col
                       gap-4">


                <div>

                    <h2
                        class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Tindakan

                    </h2>


                    <p
                        class="text-xs
                               text-gray-500
                               mt-1">

                        Tentukan keputusan untuk pengajuan ini.

                    </p>

                </div>



                <!-- BUTTONS -->

                <div
                    class="grid
                           grid-cols-1
                           sm:flex
                           sm:justify-end
                           gap-2.5">


                    <!-- TOLAK -->

                    <button
                        type="button"
                        onclick="openTolakModal()"
                        class="w-full sm:w-auto
                               inline-flex
                               items-center
                               justify-center
                               gap-2
                               bg-red-50
                               text-red-600
                               hover:bg-red-100
                               text-sm
                               font-bold
                               px-4 py-3
                               rounded-xl
                               transition">

                        <i class="fa-solid fa-xmark"></i>

                        Tolak Permohonan

                    </button>



                    <!-- SETUJUI -->

                    <button
                        type="button"
                        onclick="openSetujuiModal()"
                        class="w-full sm:w-auto
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

                        <i class="fa-solid fa-check"></i>

                        Setujui Dispensasi

                    </button>

                </div>

            </div>

        </section>

    </main>



    <!-- ========================================================= -->
    <!-- MODAL SETUJUI -->
    <!-- ========================================================= -->

    <div
        id="setujuiModal"
        class="fixed inset-0 z-50
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


            <div class="text-center">


                <div
                    class="w-12 h-12
                           mx-auto
                           rounded-full
                           bg-emerald-50
                           text-emerald-600
                           flex items-center
                           justify-center
                           mb-3">

                    <i class="fa-solid fa-check text-lg"></i>

                </div>


                <h2
                    class="text-base
                           font-extrabold
                           text-dark-green">

                    Setujui dispensasi?

                </h2>


                <p
                    class="text-xs
                           text-gray-500
                           mt-2
                           leading-relaxed">

                    Pastikan seluruh informasi dan dokumen
                    pengajuan sudah diperiksa.

                </p>

            </div>


            <div
                class="grid
                       grid-cols-2
                       gap-2
                       mt-5">


                <button
                    type="button"
                    onclick="closeSetujuiModal()"
                    class="w-full
                           px-4 py-3
                           rounded-xl
                           text-sm
                           font-bold
                           text-gray-600
                           bg-gray-100
                           hover:bg-gray-200
                           transition">

                    Batal

                </button>


                <button
                    type="button"
                    onclick="setujuiDispensasi()"
                    class="w-full
                           px-4 py-3
                           rounded-xl
                           text-sm
                           font-bold
                           text-white
                           bg-dark-green
                           hover:bg-medium-green
                           transition">

                    Ya, Setujui

                </button>

            </div>

        </div>

    </div>



    <!-- ========================================================= -->
    <!-- MODAL TOLAK -->
    <!-- ========================================================= -->

    <div
        id="tolakModal"
        class="fixed inset-0 z-50
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


            <div class="text-center">


                <div
                    class="w-12 h-12
                           mx-auto
                           rounded-full
                           bg-red-50
                           text-red-600
                           flex items-center
                           justify-center
                           mb-3">

                    <i class="fa-solid fa-xmark text-lg"></i>

                </div>


                <h2
                    class="text-base
                           font-extrabold
                           text-dark-green">

                    Tolak pengajuan?

                </h2>


                <p
                    class="text-xs
                           text-gray-500
                           mt-2
                           leading-relaxed">

                    Berikan alasan penolakan pengajuan.

                </p>

            </div>



            <div class="mt-4">

                <label
                    class="block
                           text-xs
                           font-bold
                           text-dark-green
                           mb-1.5">

                    Alasan Penolakan

                </label>


                <textarea
                    id="alasanPenolakan"
                    rows="4"
                    placeholder="Masukkan alasan penolakan..."
                    class="w-full
                           border border-gray-200
                           rounded-xl
                           px-3 py-3
                           text-sm
                           resize-none
                           outline-none
                           focus:border-red-400
                           focus:ring-2
                           focus:ring-red-100"></textarea>

            </div>



            <div
                class="grid
                       grid-cols-2
                       gap-2
                       mt-4">


                <button
                    type="button"
                    onclick="closeTolakModal()"
                    class="w-full
                           px-4 py-3
                           rounded-xl
                           text-sm
                           font-bold
                           text-gray-600
                           bg-gray-100
                           hover:bg-gray-200
                           transition">

                    Batal

                </button>


                <button
                    type="button"
                    onclick="tolakDispensasi()"
                    class="w-full
                           px-4 py-3
                           rounded-xl
                           text-sm
                           font-bold
                           text-white
                           bg-red-600
                           hover:bg-red-700
                           transition">

                    Ya, Tolak

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
           MODAL SETUJUI
        ========================================================= */

        function openSetujuiModal() {

            const modal =
                document.getElementById(
                    'setujuiModal'
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


        function closeSetujuiModal() {

            const modal =
                document.getElementById(
                    'setujuiModal'
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
           MODAL TOLAK
        ========================================================= */

        function openTolakModal() {

            const modal =
                document.getElementById(
                    'tolakModal'
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


        function closeTolakModal() {

            const modal =
                document.getElementById(
                    'tolakModal'
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
           ACTION
        ========================================================= */

        function setujuiDispensasi() {

            closeSetujuiModal();

            alert(
                'Pengajuan dispensasi berhasil disetujui.'
            );

        }


        function tolakDispensasi() {

            const alasan =
                document
                    .getElementById(
                        'alasanPenolakan'
                    )
                    .value
                    .trim();


            if (!alasan) {

                alert(
                    'Alasan penolakan wajib diisi.'
                );

                return;

            }


            closeTolakModal();

            alert(
                'Pengajuan dispensasi berhasil ditolak.'
            );

        }

    </script>

</body>
</html>