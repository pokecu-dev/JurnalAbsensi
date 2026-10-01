@extends('layouts.admin')

@section('title', 'Data Siswa')

@section('content') <div class="p-4 pb-12 md:p-6 max-w-full space-y-4 md:space-y-5">

    <!-- ================================================= -->
    <!-- HEADER -->
    <!-- ================================================= -->

    <header class="mb-5 md:mb-6">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div class="flex items-start gap-2.5 min-w-0">

                <!-- TOMBOL KEMBALI -->
                <a href="{{ url('/admin/dashboard') }}"
                   class="w-8 h-8 mt-0.5 shrink-0
                          rounded-lg
                          bg-gray-100
                          hover:bg-dark-green
                          text-dark-green
                          hover:text-white
                          flex items-center justify-center
                          transition-all duration-200"
                   title="Kembali ke Dashboard">

                    <i class="fa-solid fa-arrow-left text-xs"></i>

                </a>


                <div class="min-w-0">

                    <h1 class="text-xl sm:text-2xl
                               font-extrabold
                               text-dark-green">

                        Data Siswa

                    </h1>


                    <p class="text-xs sm:text-sm
                              text-gray-500
                              mt-1
                              leading-relaxed">

                        Kelola seluruh data siswa yang terdaftar.

                    </p>

                </div>

            </div>


            <!-- TAMBAH SISWA -->
            <button
                type="button"
                onclick="openTambahSiswa()"
                class="w-full sm:w-auto
                       bg-dark-green
                       hover:bg-medium-green
                       active:scale-95
                       text-white
                       text-sm font-bold
                       px-4 py-3
                       rounded-xl
                       transition-all duration-200
                       inline-flex
                       items-center
                       justify-center
                       gap-2
                       whitespace-nowrap">

                <i class="fa-solid fa-plus"></i>

                Tambah Siswa

            </button>

        </div>

    </header>


    <!-- ================================================= -->
    <!-- FILTER -->
    <!-- ================================================= -->

    <section
        class="bg-white
               rounded-2xl
               shadow-sm
               p-4 sm:p-5
               mb-5">

        <div class="flex items-center gap-2 mb-4">

            <div
                class="w-8 h-8
                       rounded-lg
                       bg-mint-green/20
                       text-medium-green
                       flex items-center
                       justify-center">

                <i class="fa-solid fa-filter text-xs"></i>

            </div>


            <div>

                <h2 class="text-sm
                           font-extrabold
                           text-dark-green">

                    Cari & Filter Siswa

                </h2>

                <p class="text-[11px]
                          text-gray-400
                          mt-0.5">

                    Gunakan pencarian atau filter kelas.

                </p>

            </div>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

            <!-- SEARCH -->
            <div>

                <label
                    class="block
                           text-[11px]
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
                              text-gray-400 text-sm"></i>


                    <input
                        type="text"
                        id="searchSiswa"
                        placeholder="Cari nama siswa..."
                        class="w-full
                               border border-gray-200
                               rounded-xl
                               pl-10 pr-3 py-3
                               text-sm
                               outline-none
                               focus:border-medium-green
                               focus:ring-2
                               focus:ring-medium-green/10
                               transition-all duration-200">

                </div>

            </div>


            <!-- TINGKAT -->
            <div>

                <label
                    class="block
                           text-[11px]
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
                           px-3 py-3
                           text-sm
                           bg-white
                           outline-none
                           focus:border-medium-green
                           focus:ring-2
                           focus:ring-medium-green/10
                           transition-all duration-200">

                    <option value="">Semua Tingkat</option>
                    <option value="10">Kelas 10</option>
                    <option value="11">Kelas 11</option>
                    <option value="12">Kelas 12</option>

                </select>

            </div>


            <!-- KELAS -->
            <div>

                <label
                    class="block
                           text-[11px]
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
                           px-3 py-3
                           text-sm
                           bg-white
                           outline-none
                           focus:border-medium-green
                           focus:ring-2
                           focus:ring-medium-green/10
                           transition-all duration-200">

                    <option value="">Semua Kelas</option>

                    <option value="X RPL 1">X RPL 1</option>
                    <option value="X RPL 2">X RPL 2</option>
                    <option value="X TKJ 1">X TKJ 1</option>
                    <option value="X AKL 1">X AKL 1</option>

                    <option value="XI RPL 1">XI RPL 1</option>
                    <option value="XI RPL 2">XI RPL 2</option>
                    <option value="XI TKJ 1">XI TKJ 1</option>
                    <option value="XI AKL 1">XI AKL 1</option>

                    <option value="XII RPL 1">XII RPL 1</option>
                    <option value="XII RPL 2">XII RPL 2</option>
                    <option value="XII TKJ 1">XII TKJ 1</option>
                    <option value="XII AKL 1">XII AKL 1</option>

                </select>

            </div>

        </div>

    </section>


    <!-- ================================================= -->
    <!-- LIST SISWA -->
    <!-- ================================================= -->

    <section
        class="bg-white
               rounded-2xl
               shadow-sm
               overflow-hidden">

        <!-- HEADER LIST -->
        <div
            class="px-4 sm:px-5
                   py-4
                   border-b border-gray-100
                   flex items-center
                   justify-between
                   gap-3">

            <div class="min-w-0">

                <h2 class="text-sm sm:text-base
                           font-extrabold
                           text-dark-green">

                    Daftar Siswa

                </h2>


                <p class="text-[11px] sm:text-xs
                          text-gray-400
                          mt-0.5">

                    Siswa diurutkan berdasarkan nama A–Z.

                </p>

            </div>


            <span
                id="jumlahSiswa"
                class="shrink-0
                       bg-emerald-50
                       text-emerald-700
                       text-xs
                       font-bold
                       px-2.5 py-1.5
                       rounded-lg">

                12 Siswa

            </span>

        </div>


        <!-- DATA SISWA -->
        <div
            id="daftarSiswa"
            class="p-3 sm:p-4
                   space-y-2.5 sm:space-y-3">


            <!-- ================================================= -->
            <!-- SISWA 1 -->
            <!-- ================================================= -->

            <div
                class="siswa-item group
                       border border-gray-100
                       rounded-xl
                       p-3 sm:p-4
                       transition-all duration-200
                       hover:-translate-y-0.5
                       hover:border-medium-green/30
                       hover:shadow-sm"
                data-nama="MARVEL MAULANA SAPUTRA"
                data-tingkat="11"
                data-kelas="XI RPL 2">

                <div class="flex items-center justify-between gap-3">

                    <a
                        href="{{ url('/admin/data_siswa/1') }}"
                        class="flex items-start
                               gap-3
                               flex-1
                               min-w-0
                               rounded-xl
                               transition-all duration-200
                               active:scale-[0.98]">

                        <div
                            class="w-11 h-11 sm:w-12 sm:h-12
                                   shrink-0
                                   rounded-xl
                                   bg-dark-green
                                   text-mint-green
                                   flex items-center
                                   justify-center
                                   transition-all duration-200
                                   group-hover:bg-medium-green">

                            <i class="fa-solid fa-user text-sm"></i>

                        </div>


                        <div class="min-w-0">

                            <h3
                                class="text-sm
                                       font-extrabold
                                       text-dark-green
                                       truncate
                                       transition-colors duration-200
                                       group-hover:text-medium-green">

                                MARVEL MAULANA SAPUTRA

                            </h3>


                            <p class="text-xs text-gray-400 mt-1">

                                Kelas:

                                <span
                                    class="font-semibold
                                           text-gray-600
                                           group-hover:text-dark-green">

                                    XI RPL 2

                                </span>

                            </p>

                        </div>

                    </a>


                    <a
                        href="{{ url('/admin/data_siswa/1') }}"
                        class="inline-flex
                               items-center
                               gap-1.5
                               bg-dark-green
                               text-white
                               hover:bg-medium-green
                               active:scale-95
                               text-xs
                               font-bold
                               px-3 py-2
                               rounded-lg
                               transition-all duration-200
                               shrink-0">

                        <i class="fa-solid fa-eye"></i>

                        <span class="hidden sm:inline">
                            Detail
                        </span>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- SISWA 2 -->
            <!-- ================================================= -->

            <div
                class="siswa-item group
                       border border-gray-100
                       rounded-xl
                       p-3 sm:p-4
                       transition-all duration-200
                       hover:-translate-y-0.5
                       hover:border-medium-green/30
                       hover:shadow-sm"
                data-nama="MARWA RIZQIANI PUTRI"
                data-tingkat="11"
                data-kelas="XI RPL 2">

                <div class="flex items-center justify-between gap-3">

                    <a
                        href="{{ url('/admin/data_siswa/2') }}"
                        class="flex items-start gap-3 flex-1 min-w-0">

                        <div
                            class="w-11 h-11 sm:w-12 sm:h-12
                                   shrink-0
                                   rounded-xl
                                   bg-dark-green
                                   text-mint-green
                                   flex items-center
                                   justify-center
                                   group-hover:bg-medium-green">

                            <i class="fa-solid fa-user text-sm"></i>

                        </div>


                        <div class="min-w-0">

                            <h3
                                class="text-sm
                                       font-extrabold
                                       text-dark-green
                                       truncate
                                       group-hover:text-medium-green">

                                MARWA RIZQIANI PUTRI

                            </h3>


                            <p class="text-xs text-gray-400 mt-1">

                                Kelas:

                                <span class="font-semibold text-gray-600">
                                    XI RPL 2
                                </span>

                            </p>

                        </div>

                    </a>


                    <a
                        href="{{ url('/admin/data_siswa/2') }}"
                        class="inline-flex
                               items-center
                               gap-1.5
                               bg-dark-green
                               text-white
                               hover:bg-medium-green
                               active:scale-95
                               text-xs
                               font-bold
                               px-3 py-2
                               rounded-lg
                               shrink-0">

                        <i class="fa-solid fa-eye"></i>

                        <span class="hidden sm:inline">
                            Detail
                        </span>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- SISWA 3 -->
            <!-- ================================================= -->

            <div
                class="siswa-item group
                       border border-gray-100
                       rounded-xl
                       p-3 sm:p-4
                       transition-all duration-200
                       hover:-translate-y-0.5
                       hover:border-medium-green/30
                       hover:shadow-sm"
                data-nama="MAULANA QUBRO ALGHOZALI"
                data-tingkat="10"
                data-kelas="X RPL 1">

                <div class="flex items-center justify-between gap-3">

                    <a
                        href="{{ url('/admin/data_siswa/3') }}"
                        class="flex items-start gap-3 flex-1 min-w-0">

                        <div
                            class="w-11 h-11 sm:w-12 sm:h-12
                                   shrink-0
                                   rounded-xl
                                   bg-dark-green
                                   text-mint-green
                                   flex items-center
                                   justify-center
                                   group-hover:bg-medium-green">

                            <i class="fa-solid fa-user text-sm"></i>

                        </div>


                        <div class="min-w-0">

                            <h3
                                class="text-sm
                                       font-extrabold
                                       text-dark-green
                                       truncate
                                       group-hover:text-medium-green">

                                MAULANA QUBRO ALGHOZALI

                            </h3>


                            <p class="text-xs text-gray-400 mt-1">

                                Kelas:

                                <span class="font-semibold text-gray-600">
                                    X RPL 1
                                </span>

                            </p>

                        </div>

                    </a>


                    <a
                        href="{{ url('/admin/data_siswa/3') }}"
                        class="inline-flex
                               items-center
                               gap-1.5
                               bg-dark-green
                               text-white
                               hover:bg-medium-green
                               active:scale-95
                               text-xs
                               font-bold
                               px-3 py-2
                               rounded-lg
                               shrink-0">

                        <i class="fa-solid fa-eye"></i>

                        <span class="hidden sm:inline">
                            Detail
                        </span>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- SISWA 4 -->
            <!-- ================================================= -->

            <div
                class="siswa-item group
                       border border-gray-100
                       rounded-xl
                       p-3 sm:p-4
                       transition-all duration-200
                       hover:border-medium-green/30
                       hover:shadow-sm"
                data-nama="MOCHAMAD RAFI NUR ALFAN"
                data-tingkat="12"
                data-kelas="XII RPL 1">

                <div class="flex items-center justify-between gap-3">

                    <a
                        href="{{ url('/admin/data_siswa/4') }}"
                        class="flex items-start gap-3 flex-1 min-w-0">

                        <div
                            class="w-11 h-11 sm:w-12 sm:h-12
                                   shrink-0
                                   rounded-xl
                                   bg-dark-green
                                   text-mint-green
                                   flex items-center
                                   justify-center
                                   group-hover:bg-medium-green">

                            <i class="fa-solid fa-user text-sm"></i>

                        </div>


                        <div class="min-w-0">

                            <h3
                                class="text-sm
                                       font-extrabold
                                       text-dark-green
                                       truncate
                                       group-hover:text-medium-green">

                                MOCHAMAD RAFI NUR ALFAN

                            </h3>


                            <p class="text-xs text-gray-400 mt-1">

                                Kelas:

                                <span class="font-semibold text-gray-600">
                                    XII RPL 1
                                </span>

                            </p>

                        </div>

                    </a>


                    <a
                        href="{{ url('/admin/data_siswa/4') }}"
                        class="inline-flex
                               items-center
                               gap-1.5
                               bg-dark-green
                               text-white
                               hover:bg-medium-green
                               active:scale-95
                               text-xs
                               font-bold
                               px-3 py-2
                               rounded-lg
                               shrink-0">

                        <i class="fa-solid fa-eye"></i>

                        <span class="hidden sm:inline">
                            Detail
                        </span>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- SISWA 5 -->
            <!-- ================================================= -->

            <div
                class="siswa-item group
                       border border-gray-100
                       rounded-xl
                       p-3 sm:p-4
                       transition-all duration-200
                       hover:border-medium-green/30
                       hover:shadow-sm"
                data-nama="MOCHAMMAD WILDAN SEPTIANO PRASETYO"
                data-tingkat="12"
                data-kelas="XII RPL 1">

                <div class="flex items-center justify-between gap-3">

                    <a
                        href="{{ url('/admin/data_siswa/5') }}"
                        class="flex items-start gap-3 flex-1 min-w-0">

                        <div
                            class="w-11 h-11 sm:w-12 sm:h-12
                                   shrink-0
                                   rounded-xl
                                   bg-dark-green
                                   text-mint-green
                                   flex items-center
                                   justify-center
                                   group-hover:bg-medium-green">

                            <i class="fa-solid fa-user text-sm"></i>

                        </div>


                        <div class="min-w-0">

                            <h3
                                class="text-sm
                                       font-extrabold
                                       text-dark-green
                                       truncate
                                       group-hover:text-medium-green">

                                MOCHAMMAD WILDAN SEPTIANO PRASETYO

                            </h3>


                            <p class="text-xs text-gray-400 mt-1">

                                Kelas:

                                <span class="font-semibold text-gray-600">
                                    XII RPL 1
                                </span>

                            </p>

                        </div>

                    </a>


                    <a
                        href="{{ url('/admin/data_siswa/5') }}"
                        class="inline-flex
                               items-center
                               gap-1.5
                               bg-dark-green
                               text-white
                               hover:bg-medium-green
                               active:scale-95
                               text-xs
                               font-bold
                               px-3 py-2
                               rounded-lg
                               shrink-0">

                        <i class="fa-solid fa-eye"></i>

                        <span class="hidden sm:inline">
                            Detail
                        </span>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- SISWA 6 -->
            <!-- ================================================= -->

            <div
                class="siswa-item group
                       border border-gray-100
                       rounded-xl
                       p-3 sm:p-4
                       transition-all duration-200
                       hover:border-medium-green/30
                       hover:shadow-sm"
                data-nama="MUHAMAD BAGUS PRASETIYO"
                data-tingkat="11"
                data-kelas="XI TKJ 1">

                <div class="flex items-center justify-between gap-3">

                    <a
                        href="{{ url('/admin/data_siswa/6') }}"
                        class="flex items-start gap-3 flex-1 min-w-0">

                        <div
                            class="w-11 h-11 sm:w-12 sm:h-12
                                   shrink-0
                                   rounded-xl
                                   bg-dark-green
                                   text-mint-green
                                   flex items-center
                                   justify-center
                                   group-hover:bg-medium-green">

                            <i class="fa-solid fa-user text-sm"></i>

                        </div>


                        <div class="min-w-0">

                            <h3
                                class="text-sm
                                       font-extrabold
                                       text-dark-green
                                       truncate
                                       group-hover:text-medium-green">

                                MUHAMAD BAGUS PRASETIYO

                            </h3>


                            <p class="text-xs text-gray-400 mt-1">

                                Kelas:

                                <span class="font-semibold text-gray-600">
                                    XI TKJ 1
                                </span>

                            </p>

                        </div>

                    </a>


                    <a
                        href="{{ url('/admin/data_siswa/6') }}"
                        class="inline-flex
                               items-center
                               gap-1.5
                               bg-dark-green
                               text-white
                               hover:bg-medium-green
                               active:scale-95
                               text-xs
                               font-bold
                               px-3 py-2
                               rounded-lg
                               shrink-0">

                        <i class="fa-solid fa-eye"></i>

                        <span class="hidden sm:inline">
                            Detail
                        </span>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- SISWA 7 -->
            <!-- ================================================= -->

            <div
                class="siswa-item group
                       border border-gray-100
                       rounded-xl
                       p-3 sm:p-4
                       transition-all duration-200
                       hover:border-medium-green/30
                       hover:shadow-sm"
                data-nama="MUHAMMAD ADIP SOFIYULLOH"
                data-tingkat="11"
                data-kelas="XI RPL 1">

                <div class="flex items-center justify-between gap-3">

                    <a
                        href="{{ url('/admin/data_siswa/7') }}"
                        class="flex items-start gap-3 flex-1 min-w-0">

                        <div
                            class="w-11 h-11 sm:w-12 sm:h-12
                                   shrink-0
                                   rounded-xl
                                   bg-dark-green
                                   text-mint-green
                                   flex items-center
                                   justify-center
                                   group-hover:bg-medium-green">

                            <i class="fa-solid fa-user text-sm"></i>

                        </div>


                        <div class="min-w-0">

                            <h3
                                class="text-sm
                                       font-extrabold
                                       text-dark-green
                                       truncate
                                       group-hover:text-medium-green">

                                MUHAMMAD ADIP SOFIYULLOH

                            </h3>


                            <p class="text-xs text-gray-400 mt-1">

                                Kelas:

                                <span class="font-semibold text-gray-600">
                                    XI RPL 1
                                </span>

                            </p>

                        </div>

                    </a>


                    <a
                        href="{{ url('/admin/data_siswa/7') }}"
                        class="inline-flex
                               items-center
                               gap-1.5
                               bg-dark-green
                               text-white
                               hover:bg-medium-green
                               active:scale-95
                               text-xs
                               font-bold
                               px-3 py-2
                               rounded-lg
                               shrink-0">

                        <i class="fa-solid fa-eye"></i>

                        <span class="hidden sm:inline">
                            Detail
                        </span>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- SISWA 8 -->
            <!-- ================================================= -->

            <div
                class="siswa-item group
                       border border-gray-100
                       rounded-xl
                       p-3 sm:p-4
                       transition-all duration-200
                       hover:border-medium-green/30
                       hover:shadow-sm"
                data-nama="MUHAMMAD ALBYAN AULIA"
                data-tingkat="10"
                data-kelas="X AKL 1">

                <div class="flex items-center justify-between gap-3">

                    <a
                        href="{{ url('/admin/data_siswa/8') }}"
                        class="flex items-start gap-3 flex-1 min-w-0">

                        <div
                            class="w-11 h-11 sm:w-12 sm:h-12
                                   shrink-0
                                   rounded-xl
                                   bg-dark-green
                                   text-mint-green
                                   flex items-center
                                   justify-center
                                   group-hover:bg-medium-green">

                            <i class="fa-solid fa-user text-sm"></i>

                        </div>


                        <div class="min-w-0">

                            <h3
                                class="text-sm
                                       font-extrabold
                                       text-dark-green
                                       truncate
                                       group-hover:text-medium-green">

                                MUHAMMAD ALBYAN AULIA

                            </h3>


                            <p class="text-xs text-gray-400 mt-1">

                                Kelas:

                                <span class="font-semibold text-gray-600">
                                    X AKL 1
                                </span>

                            </p>

                        </div>

                    </a>


                    <a
                        href="{{ url('/admin/data_siswa/8') }}"
                        class="inline-flex
                               items-center
                               gap-1.5
                               bg-dark-green
                               text-white
                               hover:bg-medium-green
                               active:scale-95
                               text-xs
                               font-bold
                               px-3 py-2
                               rounded-lg
                               shrink-0">

                        <i class="fa-solid fa-eye"></i>

                        <span class="hidden sm:inline">
                            Detail
                        </span>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- SISWA 9 -->
            <!-- ================================================= -->

            <div
                class="siswa-item group
                       border border-gray-100
                       rounded-xl
                       p-3 sm:p-4
                       transition-all duration-200
                       hover:border-medium-green/30
                       hover:shadow-sm"
                data-nama="MUHAMMAD DUDE FAHREZI"
                data-tingkat="10"
                data-kelas="X RPL 2">

                <div class="flex items-center justify-between gap-3">

                    <a
                        href="{{ url('/admin/data_siswa/9') }}"
                        class="flex items-start gap-3 flex-1 min-w-0">

                        <div
                            class="w-11 h-11 sm:w-12 sm:h-12
                                   shrink-0
                                   rounded-xl
                                   bg-dark-green
                                   text-mint-green
                                   flex items-center
                                   justify-center
                                   group-hover:bg-medium-green">

                            <i class="fa-solid fa-user text-sm"></i>

                        </div>


                        <div class="min-w-0">

                            <h3
                                class="text-sm
                                       font-extrabold
                                       text-dark-green
                                       truncate
                                       group-hover:text-medium-green">

                                MUHAMMAD DUDE FAHREZI

                            </h3>


                            <p class="text-xs text-gray-400 mt-1">

                                Kelas:

                                <span class="font-semibold text-gray-600">
                                    X RPL 2
                                </span>

                            </p>

                        </div>

                    </a>


                    <a
                        href="{{ url('/admin/data_siswa/9') }}"
                        class="inline-flex
                               items-center
                               gap-1.5
                               bg-dark-green
                               text-white
                               hover:bg-medium-green
                               active:scale-95
                               text-xs
                               font-bold
                               px-3 py-2
                               rounded-lg
                               shrink-0">

                        <i class="fa-solid fa-eye"></i>

                        <span class="hidden sm:inline">
                            Detail
                        </span>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- SISWA 10 -->
            <!-- ================================================= -->

            <div
                class="siswa-item group
                       border border-gray-100
                       rounded-xl
                       p-3 sm:p-4
                       transition-all duration-200
                       hover:border-medium-green/30
                       hover:shadow-sm"
                data-nama="MUHAMMAD FUAD HASAN"
                data-tingkat="12"
                data-kelas="XII TKJ 1">

                <div class="flex items-center justify-between gap-3">

                    <a
                        href="{{ url('/admin/data_siswa/10') }}"
                        class="flex items-start gap-3 flex-1 min-w-0">

                        <div
                            class="w-11 h-11 sm:w-12 sm:h-12
                                   shrink-0
                                   rounded-xl
                                   bg-dark-green
                                   text-mint-green
                                   flex items-center
                                   justify-center
                                   group-hover:bg-medium-green">

                            <i class="fa-solid fa-user text-sm"></i>

                        </div>


                        <div class="min-w-0">

                            <h3
                                class="text-sm
                                       font-extrabold
                                       text-dark-green
                                       truncate
                                       group-hover:text-medium-green">

                                MUHAMMAD FUAD HASAN

                            </h3>


                            <p class="text-xs text-gray-400 mt-1">

                                Kelas:

                                <span class="font-semibold text-gray-600">
                                    XII TKJ 1
                                </span>

                            </p>

                        </div>

                    </a>


                    <a
                        href="{{ url('/admin/data_siswa/10') }}"
                        class="inline-flex
                               items-center
                               gap-1.5
                               bg-dark-green
                               text-white
                               hover:bg-medium-green
                               active:scale-95
                               text-xs
                               font-bold
                               px-3 py-2
                               rounded-lg
                               shrink-0">

                        <i class="fa-solid fa-eye"></i>

                        <span class="hidden sm:inline">
                            Detail
                        </span>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- SISWA 11 -->
            <!-- ================================================= -->

            <div
                class="siswa-item group
                       border border-gray-100
                       rounded-xl
                       p-3 sm:p-4
                       transition-all duration-200
                       hover:border-medium-green/30
                       hover:shadow-sm"
                data-nama="MUHAMMAD ILHAM NASHRULLAH"
                data-tingkat="11"
                data-kelas="XI AKL 1">

                <div class="flex items-center justify-between gap-3">

                    <a
                        href="{{ url('/admin/data_siswa/11') }}"
                        class="flex items-start gap-3 flex-1 min-w-0">

                        <div
                            class="w-11 h-11 sm:w-12 sm:h-12
                                   shrink-0
                                   rounded-xl
                                   bg-dark-green
                                   text-mint-green
                                   flex items-center
                                   justify-center
                                   group-hover:bg-medium-green">

                            <i class="fa-solid fa-user text-sm"></i>

                        </div>


                        <div class="min-w-0">

                            <h3
                                class="text-sm
                                       font-extrabold
                                       text-dark-green
                                       truncate
                                       group-hover:text-medium-green">

                                MUHAMMAD ILHAM NASHRULLAH

                            </h3>


                            <p class="text-xs text-gray-400 mt-1">

                                Kelas:

                                <span class="font-semibold text-gray-600">
                                    XI AKL 1
                                </span>

                            </p>

                        </div>

                    </a>


                    <a
                        href="{{ url('/admin/data_siswa/11') }}"
                        class="inline-flex
                               items-center
                               gap-1.5
                               bg-dark-green
                               text-white
                               hover:bg-medium-green
                               active:scale-95
                               text-xs
                               font-bold
                               px-3 py-2
                               rounded-lg
                               shrink-0">

                        <i class="fa-solid fa-eye"></i>

                        <span class="hidden sm:inline">
                            Detail
                        </span>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- SISWA 12 -->
            <!-- ================================================= -->

            <div
                class="siswa-item group
                       border border-gray-100
                       rounded-xl
                       p-3 sm:p-4
                       transition-all duration-200
                       hover:border-medium-green/30
                       hover:shadow-sm"
                data-nama="MUHAMMAD RAFA AZRYELLO FARISHUTA"
                data-tingkat="12"
                data-kelas="XII RPL 2">

                <div class="flex items-center justify-between gap-3">

                    <a
                        href="{{ url('/admin/data_siswa/12') }}"
                        class="flex items-start gap-3 flex-1 min-w-0">

                        <div
                            class="w-11 h-11 sm:w-12 sm:h-12
                                   shrink-0
                                   rounded-xl
                                   bg-dark-green
                                   text-mint-green
                                   flex items-center
                                   justify-center
                                   group-hover:bg-medium-green">

                            <i class="fa-solid fa-user text-sm"></i>

                        </div>


                        <div class="min-w-0">

                            <h3
                                class="text-sm
                                       font-extrabold
                                       text-dark-green
                                       truncate
                                       group-hover:text-medium-green">

                                MUHAMMAD RAFA AZRYELLO FARISHUTA

                            </h3>


                            <p class="text-xs text-gray-400 mt-1">

                                Kelas:

                                <span class="font-semibold text-gray-600">
                                    XII RPL 2
                                </span>

                            </p>

                        </div>

                    </a>


                    <a
                        href="{{ url('/admin/data_siswa/12') }}"
                        class="inline-flex
                               items-center
                               gap-1.5
                               bg-dark-green
                               text-white
                               hover:bg-medium-green
                               active:scale-95
                               text-xs
                               font-bold
                               px-3 py-2
                               rounded-lg
                               shrink-0">

                        <i class="fa-solid fa-eye"></i>

                        <span class="hidden sm:inline">
                            Detail
                        </span>

                    </a>

                </div>

            </div>

        </div>


        <!-- ================================================= -->
        <!-- EMPTY STATE -->
        <!-- ================================================= -->

        <div
            id="emptyState"
            class="hidden
                   px-5 py-12
                   text-center">

            <div
                class="w-12 h-12
                       rounded-2xl
                       bg-gray-100
                       text-gray-400
                       mx-auto
                       flex items-center
                       justify-center
                       mb-3">

                <i class="fa-solid fa-user-slash"></i>

            </div>


            <p
                class="text-sm
                       font-bold
                       text-dark-green">

                Siswa tidak ditemukan

            </p>


            <p
                class="text-xs
                       text-gray-400
                       mt-1">

                Coba ubah pencarian atau filter.

            </p>

        </div>

    </section>


    <!-- ================================================= -->
    <!-- MOBILE SCROLL HELPER -->
    <!-- ================================================= -->

    <div
        id="scrollHelper"
        class="md:hidden
               fixed right-2 sm:right-3
               top-1/2
               -translate-y-1/2
               z-30
               flex flex-col
               items-center
               gap-1">

        <!-- KE ATAS -->
        <button
            type="button"
            onclick="scrollToTop()"
            class="w-8 h-8
                   rounded-full
                   bg-white/90
                   border border-emerald-100
                   shadow-sm
                   text-medium-green
                   hover:bg-mint-green
                   active:scale-95
                   transition-all
                   flex items-center
                   justify-center"
            title="Kembali ke atas">

            <i class="fa-solid fa-chevron-up text-[10px]"></i>

        </button>


        <!-- TRACK -->
        <div
            class="relative
                   w-1
                   h-24
                   bg-dark-green/10
                   rounded-full">

            <div
                id="scrollIndicator"
                class="absolute
                       left-0
                       w-1
                       h-7
                       bg-medium-green
                       rounded-full"
                style="top: 0;">

            </div>

        </div>


        <!-- KE BAWAH -->
        <button
            type="button"
            onclick="scrollToBottom()"
            class="w-8 h-8
                   rounded-full
                   bg-white/90
                   border border-emerald-100
                   shadow-sm
                   text-medium-green
                   hover:bg-mint-green
                   active:scale-95
                   transition-all
                   flex items-center
                   justify-center"
            title="Ke bagian bawah">

            <i class="fa-solid fa-chevron-down text-[10px]"></i>

        </button>

    </div>

</div>
@endsection
