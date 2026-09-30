<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Guru</title>

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


    <!-- ====================================================== -->
    <!-- MOBILE OVERLAY -->
    <!-- ====================================================== -->

    <div id="sidebarOverlay"
         onclick="closeSidebar()"
         class="fixed inset-0 z-40
                bg-black/40
                hidden md:hidden">
    </div>


    <!-- ====================================================== -->
    <!-- SIDEBAR -->
    <!-- ====================================================== -->

    <aside id="sidebar"
           class="fixed inset-y-0 left-0
                  w-60 md:w-56
                  bg-dark-green text-white
                  flex flex-col justify-between
                  p-5 z-50
                  -translate-x-full
                  md:translate-x-0
                  transition-transform duration-300 ease-in-out">

        <div>

            <!-- MOBILE CLOSE -->
            <div class="md:hidden flex justify-end mb-3">

                <button type="button"
                        onclick="closeSidebar()"
                        class="w-8 h-8 rounded-lg
                               bg-white/10
                               text-white
                               flex items-center justify-center
                               active:scale-95">

                    <i class="fa-solid fa-xmark text-sm"></i>

                </button>

            </div>


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


                <!-- ================================================= -->
                <!-- UTAMA -->
                <!-- ================================================= -->

                <div>

                    <div class="text-[10px] uppercase font-extrabold
                                text-gray-400 tracking-wider
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

                            <i class="fa-solid fa-house w-4 text-center"></i>

                            Dashboard

                        </a>


                        <!-- MONITORING -->
                        <a href="{{ url('/admin/monitoring_jurnal') }}"
                           class="flex items-center gap-3
                                  px-3 py-2 rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition-all duration-200
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-book-bookmark w-4 text-center"></i>

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

                            <i class="fa-solid fa-file-signature w-4 text-center"></i>

                            Dispensasi

                        </a>

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- DATA MASTER -->
                <!-- ================================================= -->

                <div>

                    <div class="text-[10px] uppercase font-extrabold
                                text-gray-400 tracking-wider
                                mb-1.5 px-2">

                        Data Master

                    </div>


                    <div class="space-y-0.5">


                        <!-- DATA GURU ACTIVE -->
                        <a href="{{ url('/admin/data_guru') }}"
                           class="flex items-center gap-3
                                  px-3 py-2 rounded-xl
                                  bg-white/10
                                  text-mint-green
                                  font-bold
                                  transition-all duration-200
                                  active:scale-[0.98]">

                            <i class="fa-solid fa-chalkboard-user w-4 text-center"></i>

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

                            <i class="fa-solid fa-user-graduate w-4 text-center"></i>

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

                            <i class="fa-solid fa-school w-4 text-center"></i>

                            Data Kelas

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


            <!-- AKUN -->
            <a href="{{ url('/admin/akun') }}"
               class="flex items-center gap-2
                      px-2 py-2 rounded-lg
                      hover:bg-white/10
                      active:scale-[0.98]
                      transition-all duration-200">

                <i class="fa-solid fa-user-circle w-4"></i>

                <span>Akun Admin</span>

            </a>


            <!-- LOGOUT -->
            <a href="{{ route('logout') }}"
               class="w-full flex items-center gap-2
                      px-2 py-2 rounded-lg
                      hover:bg-white/10
                      active:scale-[0.98]
                      transition-all duration-200">

                <i class="fa-solid fa-right-from-bracket w-4"></i>

                <span>Logout</span>

            </a>

        </div>

    </aside>


    <!-- ====================================================== -->
    <!-- MOBILE HEADER -->
    <!-- ====================================================== -->

    <header class="md:hidden
                   sticky top-0 z-30
                   h-16
                   bg-dark-green text-white
                   px-4
                   flex items-center justify-between
                   shadow-sm">

        <div class="flex items-center gap-3">

            <img src="{{ asset('image/logo.png') }}"
                 alt="Logo"
                 class="w-8 h-auto object-contain">

            <div>

                <p class="text-sm font-extrabold leading-tight">
                    Data Guru
                </p>

                <p class="text-[10px] text-white/60">
                    Jurnal Absensi
                </p>

            </div>

        </div>


        <button type="button"
                onclick="openSidebar()"
                class="w-9 h-9
                       rounded-xl
                       bg-white/10
                       flex items-center justify-center
                       active:scale-95">

            <i class="fa-solid fa-bars text-sm"></i>

        </button>

    </header>


    <!-- ====================================================== -->
    <!-- MAIN -->
    <!-- ====================================================== -->

    <main class="min-w-0
                 p-4 pb-12
                 md:p-6
                 md:ml-56
                 max-w-full
                 md:max-w-[calc(100%-14rem)]
                 space-y-4 md:space-y-5">


        <!-- ================================================= -->
        <!-- HEADER -->
        <!-- ================================================= -->

        <header class="mb-5">

            <div class="flex flex-col
                        sm:flex-row
                        sm:items-center
                        sm:justify-between
                        gap-4">


                <div>

                    <h1 class="text-xl md:text-2xl
                               font-extrabold
                               text-dark-green">

                        Data Guru

                    </h1>


                    <p class="text-sm
                              text-medium-green
                              font-medium
                              mt-1
                              leading-relaxed">

                        Kelola data guru yang terdaftar dalam sistem.

                    </p>

                </div>


                <!-- TAMBAH GURU -->
                <button type="button"
                        onclick="openTambahGuru()"
                        class="w-full sm:w-auto
                               bg-dark-green
                               hover:bg-medium-green
                               active:scale-[0.98]
                               text-white
                               text-sm
                               font-bold
                               px-4 py-3
                               rounded-xl
                               transition-all duration-200
                               inline-flex
                               items-center
                               justify-center
                               gap-2
                               shadow-sm">

                    <i class="fa-solid fa-plus"></i>

                    Tambah Guru

                </button>

            </div>

        </header>


        <!-- ================================================= -->
        <!-- DATA DUMMY -->
        <!-- ================================================= -->

        @php

            $gurus = [
                [
                    'nama' => 'Sulistyowati, S.Pd.',
                    'nip' => '198xxxxxxxxx',
                    'mapel' => 'Matematika Terapan',
                ],
                [
                    'nama' => 'Widodo, S.Kom.',
                    'nip' => '198xxxxxxxxx',
                    'mapel' => 'Bimbingan Konseling',
                ],
                [
                    'nama' => 'Laili Ermawati, M.Pd.',
                    'nip' => '198xxxxxxxxx',
                    'mapel' => 'Bahasa Daerah',
                ],
                [
                    'nama' => 'Budi Santoso, S.Pd.',
                    'nip' => '198xxxxxxxxx',
                    'mapel' => 'Bahasa Indonesia',
                ],
                [
                    'nama' => 'Dwi Rahmawati, S.Pd.',
                    'nip' => '198xxxxxxxxx',
                    'mapel' => 'Bahasa Inggris',
                ],
                [
                    'nama' => 'Agus Setiawan, S.Kom.',
                    'nip' => '198xxxxxxxxx',
                    'mapel' => 'Informatika',
                ],
            ];

        @endphp


        <!-- ================================================= -->
        <!-- FILTER -->
        <!-- ================================================= -->

        <section class="bg-white
                        p-4
                        md:p-5
                        rounded-2xl
                        shadow-sm
                        mb-5">

            <div class="flex flex-col
                        sm:flex-row
                        gap-4">


                <!-- SEARCH -->
                <div class="flex-1">

                    <label class="block
                                  text-xs
                                  font-bold
                                  text-gray-400
                                  uppercase
                                  tracking-wider
                                  mb-1.5">

                        Cari Guru

                    </label>


                    <div class="relative">

                        <i class="fa-solid fa-magnifying-glass
                                  absolute left-3.5 top-1/2
                                  -translate-y-1/2
                                  text-gray-400
                                  text-sm"></i>


                        <input
                            type="text"
                            placeholder="Cari nama guru..."
                            class="w-full
                                   bg-gray-50
                                   border border-gray-200
                                   text-sm
                                   font-medium
                                   rounded-xl
                                   pl-10 pr-3
                                   py-3
                                   text-dark-green
                                   outline-none
                                   focus:border-medium-green
                                   focus:ring-2
                                   focus:ring-mint-green/30
                                   transition-all duration-200">

                    </div>

                </div>


                <!-- MATA PELAJARAN -->
                <div class="flex-1">

                    <label class="block
                                  text-xs
                                  font-bold
                                  text-gray-400
                                  uppercase
                                  tracking-wider
                                  mb-1.5">

                        Mata Pelajaran

                    </label>


                    <select
                        class="w-full
                               bg-gray-50
                               border border-gray-200
                               text-sm
                               font-bold
                               rounded-xl
                               px-3
                               py-3
                               text-dark-green
                               outline-none
                               focus:border-medium-green
                               focus:ring-2
                               focus:ring-mint-green/30
                               transition-all duration-200">

                        <option>Semua Mata Pelajaran</option>

                        <option>Matematika Terapan</option>

                        <option>Bimbingan Konseling</option>

                        <option>Bahasa Daerah</option>

                        <option>Bahasa Indonesia</option>

                        <option>Bahasa Inggris</option>

                        <option>Informatika</option>

                    </select>

                </div>

            </div>

        </section>


        <!-- ================================================= -->
        <!-- DAFTAR GURU -->
        <!-- ================================================= -->

        <section class="bg-white
                        rounded-2xl
                        shadow-sm
                        overflow-hidden">


            <!-- HEADER -->
            <div class="p-4
                        md:p-5
                        border-b border-gray-100">

                <div class="flex items-center
                            justify-between
                            gap-3">

                    <div>

                        <h2 class="text-sm
                                   md:text-base
                                   font-extrabold
                                   text-dark-green">

                            Daftar Guru

                        </h2>


                        <p class="text-xs
                                  text-gray-400
                                  mt-1">

                            Data guru yang terdaftar dalam sistem.

                        </p>

                    </div>


                    <span class="shrink-0
                                 bg-gray-100
                                 text-gray-500
                                 text-xs
                                 font-bold
                                 px-2.5 py-1.5
                                 rounded-lg">

                        {{ count($gurus) }} Guru

                    </span>

                </div>

            </div>


            <!-- LIST -->
            <div class="p-4 space-y-3">

                @foreach ($gurus as $guru)

                    <div class="group
                                border border-gray-100
                                rounded-2xl
                                p-4
                                transition-all duration-200
                                hover:border-medium-green/30
                                hover:shadow-sm">


                        <div class="flex flex-col
                                    sm:flex-row
                                    sm:items-center
                                    justify-between
                                    gap-4">


                            <!-- IDENTITAS GURU -->
                            <a href="{{ url('/admin/data_guru/' . $loop->index) }}"
                               class="flex items-start
                                      gap-3
                                      flex-1
                                      min-w-0
                                      rounded-xl
                                      transition-all duration-200
                                      active:scale-[0.98]">


                                <!-- ICON -->
                                <div class="w-11 h-11
                                            shrink-0
                                            rounded-xl
                                            bg-dark-green
                                            text-mint-green
                                            flex items-center
                                            justify-center
                                            group-hover:bg-medium-green
                                            transition-all duration-200">

                                    <i class="fa-solid
                                              fa-chalkboard-user
                                              text-sm"></i>

                                </div>


                                <!-- INFORMASI -->
                                <div class="min-w-0">

                                    <h3 class="text-sm
                                               font-extrabold
                                               text-dark-green
                                               leading-snug
                                               group-hover:text-medium-green
                                               transition-colors duration-200">

                                        {{ $guru['nama'] }}

                                    </h3>


                                    <p class="text-xs
                                              text-gray-400
                                              mt-1.5">

                                        NIP:

                                        <span class="text-gray-600">

                                            {{ $guru['nip'] }}

                                        </span>

                                    </p>


                                    <p class="text-xs
                                              text-gray-400
                                              mt-1">

                                        Mata Pelajaran:

                                        <span class="text-gray-600">

                                            {{ $guru['mapel'] }}

                                        </span>

                                    </p>

                                </div>

                            </a>


                            <!-- DETAIL -->
                            <a href="{{ url('/admin/data_guru/' . $loop->index) }}"
                               class="w-full sm:w-auto
                                      inline-flex
                                      items-center
                                      justify-center
                                      gap-2
                                      bg-dark-green
                                      text-white
                                      hover:bg-medium-green
                                      active:scale-[0.98]
                                      text-xs
                                      font-bold
                                      px-3
                                      py-2.5
                                      rounded-xl
                                      transition-all duration-200">

                                <i class="fa-solid fa-eye"></i>

                                Detail

                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        </section>

    </main>


    <!-- ====================================================== -->
    <!-- POPUP TAMBAH GURU -->
    <!-- ====================================================== -->

    <div id="tambahGuruModal"
         class="fixed inset-0 z-50 hidden
                items-center justify-center p-4">

        <!-- Overlay -->
        <div class="absolute inset-0
                    bg-black/40
                    backdrop-blur-sm"
             onclick="closeTambahGuru()">
        </div>


        <!-- Modal -->
        <div class="relative
                    w-full
                    max-w-lg
                    max-h-[90vh]
                    overflow-y-auto
                    bg-white
                    rounded-2xl
                    shadow-xl">

            <!-- HEADER -->
            <div class="flex items-center
                        justify-between
                        px-5 py-4
                        border-b border-gray-100
                        sticky top-0
                        bg-white
                        z-10">

                <div>

                    <h2 class="text-base
                               font-extrabold
                               text-dark-green">

                        Tambah Guru

                    </h2>


                    <p class="text-xs
                              text-gray-500
                              mt-0.5">

                        Tambahkan data guru baru

                    </p>

                </div>


                <button type="button"
                        onclick="closeTambahGuru()"
                        class="w-9 h-9
                               rounded-lg
                               bg-gray-100
                               hover:bg-gray-200
                               text-gray-500
                               flex items-center
                               justify-center
                               transition-all duration-200
                               active:scale-95">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>


            <!-- FORM -->
            <form id="formTambahGuru"
                  onsubmit="event.preventDefault(); showConfirmTambahGuru();"
                  class="p-5 space-y-4">


                <!-- NAMA -->
                <div>

                    <label class="block
                                  text-sm
                                  font-bold
                                  text-dark-green
                                  mb-1.5">

                        Nama Lengkap

                    </label>


                    <input type="text"
                           id="namaGuru"
                           required
                           placeholder="Masukkan nama lengkap"
                           class="w-full
                                  border border-gray-200
                                  rounded-xl
                                  px-3.5 py-3
                                  text-sm
                                  focus:outline-none
                                  focus:ring-2
                                  focus:ring-mint-green/40
                                  focus:border-medium-green
                                  transition-all duration-200">

                </div>


                <!-- NIP -->
                <div>

                    <label class="block
                                  text-sm
                                  font-bold
                                  text-dark-green
                                  mb-1.5">

                        NIP

                    </label>


                    <input type="text"
                           id="nipGuru"
                           required
                           placeholder="Masukkan NIP"
                           class="w-full
                                  border border-gray-200
                                  rounded-xl
                                  px-3.5 py-3
                                  text-sm
                                  focus:outline-none
                                  focus:ring-2
                                  focus:ring-mint-green/40
                                  focus:border-medium-green
                                  transition-all duration-200">

                </div>


                <!-- MATA PELAJARAN -->
                <div>

                    <label class="block
                                  text-sm
                                  font-bold
                                  text-dark-green
                                  mb-1.5">

                        Mata Pelajaran

                    </label>


                    <select id="mapelGuru"
                            onchange="handleMapelChange()"
                            required
                            class="w-full
                                   border border-gray-200
                                   rounded-xl
                                   px-3.5 py-3
                                   text-sm
                                   bg-white
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-mint-green/40
                                   focus:border-medium-green
                                   transition-all duration-200">

                        <option value="">
                            Pilih Mata Pelajaran
                        </option>

                        <option value="Matematika">
                            Matematika
                        </option>

                        <option value="Bahasa Indonesia">
                            Bahasa Indonesia
                        </option>

                        <option value="Bahasa Inggris">
                            Bahasa Inggris
                        </option>

                        <option value="Informatika">
                            Informatika
                        </option>

                        <option value="Bimbingan Konseling">
                            Bimbingan Konseling
                        </option>

                        <option value="Bahasa Daerah">
                            Bahasa Daerah
                        </option>

                        <option value="__tambah__">
                            + Tambah Mata Pelajaran
                        </option>

                    </select>

                </div>


                <!-- STATUS -->
                <div>

                    <label class="block
                                  text-sm
                                  font-bold
                                  text-dark-green
                                  mb-1.5">

                        Status

                    </label>


                    <select id="statusGuru"
                            class="w-full
                                   border border-gray-200
                                   rounded-xl
                                   px-3.5 py-3
                                   text-sm
                                   bg-white
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-mint-green/40
                                   focus:border-medium-green
                                   transition-all duration-200">

                        <option value="Aktif">
                            Aktif
                        </option>

                        <option value="Tidak Aktif">
                            Tidak Aktif
                        </option>

                    </select>

                </div>


                <!-- BUTTON -->
                <div class="flex flex-col-reverse
                            sm:flex-row
                            justify-end
                            gap-2
                            pt-2">

                    <button type="button"
                            onclick="closeTambahGuru()"
                            class="w-full sm:w-auto
                                   px-4 py-3
                                   rounded-xl
                                   bg-gray-100
                                   hover:bg-gray-200
                                   active:scale-95
                                   text-gray-600
                                   text-sm
                                   font-bold
                                   transition-all duration-200">

                        Batal

                    </button>


                    <button type="submit"
                            class="w-full sm:w-auto
                                   px-4 py-3
                                   rounded-xl
                                   bg-dark-green
                                   hover:bg-medium-green
                                   active:scale-95
                                   text-white
                                   text-sm
                                   font-bold
                                   transition-all duration-200
                                   inline-flex
                                   items-center
                                   justify-center
                                   gap-2">

                        <i class="fa-solid fa-floppy-disk"></i>

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>


    <!-- ====================================================== -->
    <!-- POPUP KONFIRMASI TAMBAH GURU -->
    <!-- ====================================================== -->

    <div id="confirmTambahGuruModal"
         class="fixed inset-0 z-[60] hidden
                items-center justify-center p-4">

        <!-- Overlay -->
        <div class="absolute inset-0
                    bg-black/50
                    backdrop-blur-sm">
        </div>


        <!-- Modal -->
        <div class="relative
                    w-full
                    max-w-sm
                    bg-white
                    rounded-2xl
                    shadow-xl
                    p-5
                    text-center">


            <div class="w-12 h-12
                        mx-auto
                        rounded-full
                        bg-emerald-50
                        text-medium-green
                        flex items-center
                        justify-center
                        mb-3">

                <i class="fa-solid
                          fa-circle-question
                          text-xl"></i>

            </div>


            <h2 class="text-base
                       font-extrabold
                       text-dark-green">

                Yakin ingin menambahkan guru?

            </h2>


            <p class="text-sm
                      text-gray-500
                      mt-2
                      leading-relaxed">

                Pastikan data guru yang dimasukkan sudah benar.

            </p>


            <div class="flex flex-col-reverse
                        sm:flex-row
                        justify-center
                        gap-2
                        mt-5">

                <button type="button"
                        onclick="closeConfirmTambahGuru()"
                        class="w-full sm:w-auto
                               px-4 py-3
                               rounded-xl
                               bg-gray-100
                               hover:bg-gray-200
                               active:scale-95
                               text-gray-600
                               text-sm
                               font-bold
                               transition-all duration-200">

                    Batal

                </button>


                <button type="button"
                        onclick="confirmTambahGuru()"
                        class="w-full sm:w-auto
                               px-4 py-3
                               rounded-xl
                               bg-dark-green
                               hover:bg-medium-green
                               active:scale-95
                               text-white
                               text-sm
                               font-bold
                               transition-all duration-200">

                    Ya, Simpan

                </button>

            </div>

        </div>

    </div>


    <!-- ====================================================== -->
    <!-- POPUP TAMBAH MATA PELAJARAN -->
    <!-- ====================================================== -->

    <div id="tambahMapelModal"
         class="fixed inset-0 z-[70] hidden
                items-center justify-center p-4">

        <!-- Overlay -->
        <div class="absolute inset-0
                    bg-black/40
                    backdrop-blur-sm"
             onclick="closeTambahMapel()">
        </div>


        <!-- Modal -->
        <div class="relative
                    w-full
                    max-w-sm
                    max-h-[90vh]
                    overflow-y-auto
                    bg-white
                    rounded-2xl
                    shadow-xl
                    overflow-hidden">


            <!-- HEADER -->
            <div class="flex items-center
                        justify-between
                        px-5 py-4
                        border-b border-gray-100
                        sticky top-0
                        bg-white
                        z-10">

                <div>

                    <h2 class="text-base
                               font-extrabold
                               text-dark-green">

                        Tambah Mata Pelajaran

                    </h2>


                    <p class="text-xs
                              text-gray-500
                              mt-0.5">

                        Tambahkan mata pelajaran baru

                    </p>

                </div>


                <button type="button"
                        onclick="closeTambahMapel()"
                        class="w-9 h-9
                               rounded-lg
                               bg-gray-100
                               hover:bg-gray-200
                               active:scale-95
                               text-gray-500
                               flex items-center
                               justify-center
                               transition-all duration-200">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>


            <!-- CONTENT -->
            <div class="p-5">

                <label class="block
                              text-sm
                              font-bold
                              text-dark-green
                              mb-1.5">

                    Nama Mata Pelajaran

                </label>


                <input type="text"
                       id="namaMapelBaru"
                       placeholder="Contoh: Pemrograman Web"
                       class="w-full
                              border border-gray-200
                              rounded-xl
                              px-3.5 py-3
                              text-sm
                              focus:outline-none
                              focus:ring-2
                              focus:ring-mint-green/40
                              focus:border-medium-green
                              transition-all duration-200">


                <div class="flex flex-col-reverse
                            sm:flex-row
                            justify-end
                            gap-2
                            mt-5">

                    <button type="button"
                            onclick="closeTambahMapel()"
                            class="w-full sm:w-auto
                                   px-4 py-3
                                   rounded-xl
                                   bg-gray-100
                                   hover:bg-gray-200
                                   active:scale-95
                                   text-gray-600
                                   text-sm
                                   font-bold
                                   transition-all duration-200">

                        Batal

                    </button>


                    <button type="button"
                            onclick="simpanMapelBaru()"
                            class="w-full sm:w-auto
                                   px-4 py-3
                                   rounded-xl
                                   bg-dark-green
                                   hover:bg-medium-green
                                   active:scale-95
                                   text-white
                                   text-sm
                                   font-bold
                                   transition-all duration-200">

                        Tambah

                    </button>

                </div>

            </div>

        </div>

    </div>


    <!-- ====================================================== -->
    <!-- MOBILE SCROLL HELPER -->
    <!-- ====================================================== -->

    <div id="scrollHelper"
         class="md:hidden
                fixed
                right-2 sm:right-3
                top-1/2
                -translate-y-1/2
                z-30
                flex flex-col
                items-center
                gap-1">


        <!-- KE ATAS -->
        <button type="button"
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


        <!-- INDIKATOR -->
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


        <!-- KE BAWAH -->
        <button type="button"
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


    <!-- ====================================================== -->
    <!-- JAVASCRIPT -->
    <!-- ====================================================== -->

    <script>


        /* ===================================================== */
        /* SIDEBAR MOBILE */
        /* ===================================================== */

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


        /* ===================================================== */
        /* SCROLL HELPER */
        /* ===================================================== */

        const scrollIndicator =
            document.getElementById(
                'scrollIndicator'
            );


        function updateScrollIndicator() {

            const scrollTop =
                window.scrollY;


            const maxScroll =
                document.documentElement.scrollHeight
                - window.innerHeight;


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
                trackHeight
                - indicatorHeight;


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
                top:
                    document.documentElement
                        .scrollHeight,
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


        /* ===================================================== */
        /* TAMBAH GURU */
        /* ===================================================== */

        function openTambahGuru() {

            const modal =
                document.getElementById(
                    'tambahGuruModal'
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


        function closeTambahGuru() {

            const modal =
                document.getElementById(
                    'tambahGuruModal'
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


        function showConfirmTambahGuru() {

            const modal =
                document.getElementById(
                    'confirmTambahGuruModal'
                );

            modal.classList.remove(
                'hidden'
            );

            modal.classList.add(
                'flex'
            );

        }


        function closeConfirmTambahGuru() {

            const modal =
                document.getElementById(
                    'confirmTambahGuruModal'
                );

            modal.classList.add(
                'hidden'
            );

            modal.classList.remove(
                'flex'
            );

        }


        function confirmTambahGuru() {

            // FE sementara
            // Backend belum disambungkan

            closeConfirmTambahGuru();

            closeTambahGuru();

            document
                .getElementById(
                    'formTambahGuru'
                )
                .reset();

            alert(
                'Data guru berhasil ditambahkan.'
            );

        }


        /* ===================================================== */
        /* TAMBAH MATA PELAJARAN */
        /* ===================================================== */

        function handleMapelChange() {

            const select =
                document.getElementById(
                    'mapelGuru'
                );


            if (
                select.value === '__tambah__'
            ) {

                select.value = '';


                const modal =
                    document.getElementById(
                        'tambahMapelModal'
                    );


                modal.classList.remove(
                    'hidden'
                );

                modal.classList.add(
                    'flex'
                );


                document
                    .getElementById(
                        'namaMapelBaru'
                    )
                    .focus();

            }

        }


        function closeTambahMapel() {

            const modal =
                document.getElementById(
                    'tambahMapelModal'
                );


            modal.classList.add(
                'hidden'
            );

            modal.classList.remove(
                'flex'
            );


            document
                .getElementById(
                    'namaMapelBaru'
                )
                .value = '';

        }


        function simpanMapelBaru() {

            const input =
                document.getElementById(
                    'namaMapelBaru'
                );


            const namaMapel =
                input.value.trim();


            if (!namaMapel) {

                alert(
                    'Nama mata pelajaran belum diisi.'
                );

                input.focus();

                return;

            }


            const select =
                document.getElementById(
                    'mapelGuru'
                );


            // Buat option baru
            const option =
                document.createElement(
                    'option'
                );


            option.value =
                namaMapel;

            option.textContent =
                namaMapel;


            // Masukkan sebelum opsi tambah
            const tambahOption =
                select.querySelector(
                    'option[value="__tambah__"]'
                );


            select.insertBefore(
                option,
                tambahOption
            );


            // Pilih mapel baru
            select.value =
                namaMapel;


            closeTambahMapel();

        }

    </script>

</body>

</html>