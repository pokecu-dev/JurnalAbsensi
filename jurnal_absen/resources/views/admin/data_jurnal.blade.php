@extends('layouts.admin')

@section('title', 'Monitoring Jurnal')

@section('content') <div class="p-4 pb-12 md:p-6 max-w-full space-y-4 md:space-y-5">

    <!-- ===================================================== -->
    <!-- HEADER -->
    <!-- ===================================================== -->

    <header class="mb-1">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

            <!-- JUDUL -->
            <div class="flex items-start gap-2.5 min-w-0">

                <!-- TOMBOL KEMBALI -->
                <a href="{{ url('/admin/dashboard') }}"
                   class="w-8 h-8 mt-0.5 shrink-0 rounded-lg
                          bg-gray-100 hover:bg-dark-green
                          text-dark-green hover:text-white
                          flex items-center justify-center
                          transition"
                   title="Kembali ke Dashboard">

                    <i class="fa-solid fa-arrow-left text-xs"></i>

                </a>

                <div class="min-w-0">

                    <h1 class="text-xl md:text-2xl font-extrabold text-dark-green">
                        Monitoring Jurnal
                    </h1>

                    <p class="text-[11px] md:text-xs text-medium-green font-medium mt-1">
                        Kelola dan pantau jurnal KBM berdasarkan kelas.
                    </p>

                </div>

            </div>

            <!-- TAMBAH JURNAL -->
            <div class="flex">
                <a href="#"
                   class="w-full sm:w-auto bg-dark-green hover:bg-medium-green text-white
                          text-[11px] sm:text-xs font-bold px-4 py-2.5 rounded-xl
                          transition inline-flex items-center justify-center gap-2 whitespace-nowrap">

                    <i class="fa-solid fa-plus"></i>
                    Tambah Jurnal

                </a>
            </div>

        </div>
    </header>


    <!-- ===================================================== -->
    <!-- FILTER -->
    <!-- ===================================================== -->

    <section class="bg-white p-3.5 md:p-4 rounded-2xl shadow-sm">

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

            <!-- TANGGAL -->
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase
                              tracking-wider mb-1.5">
                    Tanggal
                </label>

                <input
                    type="date"
                    value="2026-07-21"
                    class="w-full bg-gray-50 border border-gray-200
                           text-[11px] sm:text-xs font-bold rounded-xl
                           px-3 py-2.5 text-dark-green outline-none
                           focus:border-medium-green">
            </div>


            <!-- KELAS -->
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase
                              tracking-wider mb-1.5">
                    Kelas
                </label>

                <select
                    class="w-full bg-gray-50 border border-gray-200
                           text-[11px] sm:text-xs font-bold rounded-xl
                           px-3 py-2.5 text-dark-green outline-none
                           focus:border-medium-green">

                    <option>X AKL 1</option>
                    <option>X AKL 2</option>
                    <option>XI RPL 1</option>
                    <option>XI RPL 2</option>
                    <option>XI TKJ 1</option>

                </select>
            </div>


            <!-- SEARCH -->
            <div>
                <label class="block text-[10px] font-bold text-gray-400 uppercase
                              tracking-wider mb-1.5">
                    Cari
                </label>

                <div class="relative">

                    <i class="fa-solid fa-magnifying-glass absolute left-3
                              top-1/2 -translate-y-1/2 text-gray-400 text-xs">
                    </i>

                    <input
                        type="text"
                        placeholder="Cari Jurnal Kelas...."
                        class="w-full bg-gray-50 border border-gray-200
                               text-[11px] sm:text-xs font-medium rounded-xl
                               pl-9 pr-3 py-2.5 text-dark-green outline-none
                               focus:border-medium-green">

                </div>
            </div>

        </div>

    </section>


    <!-- ===================================================== -->
    <!-- KELAS XI RPL 2 -->
    <!-- ===================================================== -->

    <section class="bg-white rounded-2xl shadow-sm overflow-hidden">

        <!-- HEADER KELAS -->
        <div class="p-3.5 md:p-4 border-b border-gray-100">

            <div class="flex items-center justify-between gap-3">

                <!-- KIRI -->
                <div class="flex items-center gap-2.5 min-w-0">

                    <div class="w-10 h-10 md:w-11 md:h-11 rounded-xl
                                bg-dark-green text-mint-green flex items-center
                                justify-center font-black text-[10px] sm:text-xs shrink-0">
                        XI
                    </div>

                    <div class="min-w-0">

                        <div class="flex flex-wrap items-center gap-1.5">

                            <h2 class="text-sm font-extrabold text-dark-green">
                                XI RPL 2
                            </h2>

                            <span class="bg-emerald-50 text-emerald-700
                                         text-[9px] sm:text-[10px] font-bold
                                         px-2 py-0.5 rounded-md">
                                34/36 hadir
                            </span>

                        </div>

                        <p class="text-[10px] sm:text-[11px] text-gray-400 mt-0.5">
                            Rabu, 23 September 2026
                        </p>

                    </div>

                </div>


                <!-- JUMLAH JURNAL -->
                <span class="bg-emerald-50 text-emerald-700
                             text-[9px] sm:text-[10px] font-bold
                             px-2 sm:px-2.5 py-1 rounded-lg shrink-0">
                    3 Jurnal
                </span>

            </div>

        </div>


        <!-- ================================================= -->
        <!-- DAFTAR JURNAL -->
        <!-- ================================================= -->

        <div class="p-3 md:p-4 space-y-2.5 md:space-y-3">

            <!-- JURNAL 1 -->
            <div class="border border-gray-100 rounded-xl p-3
                        hover:border-emerald-200 transition">

                <div class="flex flex-col sm:flex-row sm:items-center
                            justify-between gap-3">

                    <div class="flex items-start gap-2.5 min-w-0">

                        <div class="w-12 sm:w-14 shrink-0 text-center">

                            <div class="text-[11px] sm:text-xs font-extrabold text-dark-green">
                                1 - 2
                            </div>

                            <div class="text-[8px] sm:text-[9px] text-gray-400
                                        mt-0.5 whitespace-nowrap">
                                07.00 - 08.20
                            </div>

                        </div>

                        <div class="min-w-0">

                            <h3 class="text-[11px] sm:text-xs font-extrabold text-dark-green">
                                Matematika Terapan
                            </h3>

                            <p class="text-[10px] sm:text-[11px] text-gray-500 mt-1">
                                Sulistyowati, S.Pd.
                            </p>

                            <p class="text-[9px] sm:text-[10px] text-gray-400
                                      mt-1 leading-relaxed">
                                Materi:
                                <span class="text-gray-600">
                                    Polynomial &amp; Teorema Sisa
                                </span>
                            </p>

                        </div>

                    </div>

                    <div class="flex items-center justify-end gap-1.5 sm:gap-2 shrink-0">

                        <span class="bg-emerald-50 text-emerald-700
                                     text-[9px] sm:text-[10px] font-bold
                                     px-2 py-1 rounded-lg whitespace-nowrap">

                            <i class="fa-solid fa-check mr-1"></i>
                            Terisi

                        </span>

                        <a href="#"
                           class="inline-flex items-center gap-1
                                  bg-dark-green text-white hover:bg-medium-green
                                  text-[9px] sm:text-[10px] font-bold
                                  px-2.5 py-1.5 rounded-lg transition whitespace-nowrap">

                            <i class="fa-solid fa-eye"></i>
                            Detail

                        </a>

                    </div>

                </div>

            </div>


            <!-- JURNAL 2 -->
            <div class="border border-gray-100 rounded-xl p-3
                        hover:border-emerald-200 transition">

                <div class="flex flex-col sm:flex-row sm:items-center
                            justify-between gap-3">

                    <div class="flex items-start gap-2.5 min-w-0">

                        <div class="w-12 sm:w-14 shrink-0 text-center">

                            <div class="text-[11px] sm:text-xs font-extrabold text-dark-green">
                                3 - 4
                            </div>

                            <div class="text-[8px] sm:text-[9px] text-gray-400
                                        mt-0.5 whitespace-nowrap">
                                08.20 - 09.40
                            </div>

                        </div>

                        <div class="min-w-0">

                            <h3 class="text-[11px] sm:text-xs font-extrabold text-dark-green">
                                Bimbingan Konseling
                            </h3>

                            <p class="text-[10px] sm:text-[11px] text-gray-500 mt-1">
                                Widodo, S.Kom.
                            </p>

                            <p class="text-[9px] sm:text-[10px] text-gray-400
                                      mt-1 leading-relaxed">
                                Materi:
                                <span class="text-gray-600">
                                    Asesmen Diagnostik
                                </span>
                            </p>

                        </div>

                    </div>

                    <div class="flex items-center justify-end gap-1.5 sm:gap-2 shrink-0">

                        <span class="bg-emerald-50 text-emerald-700
                                     text-[9px] sm:text-[10px] font-bold
                                     px-2 py-1 rounded-lg whitespace-nowrap">

                            <i class="fa-solid fa-check mr-1"></i>
                            Terisi

                        </span>

                        <a href="#"
                           class="inline-flex items-center gap-1
                                  bg-dark-green text-white hover:bg-medium-green
                                  text-[9px] sm:text-[10px] font-bold
                                  px-2.5 py-1.5 rounded-lg transition whitespace-nowrap">

                            <i class="fa-solid fa-eye"></i>
                            Detail

                        </a>

                    </div>

                </div>

            </div>


            <!-- JURNAL 3 -->
            <div class="border border-gray-100 rounded-xl p-3
                        hover:border-emerald-200 transition">

                <div class="flex flex-col sm:flex-row sm:items-center
                            justify-between gap-3">

                    <div class="flex items-start gap-2.5 min-w-0">

                        <div class="w-12 sm:w-14 shrink-0 text-center">

                            <div class="text-[11px] sm:text-xs font-extrabold text-dark-green">
                                5 - 6
                            </div>

                            <div class="text-[8px] sm:text-[9px] text-gray-400
                                        mt-0.5 whitespace-nowrap">
                                10.00 - 11.20
                            </div>

                        </div>

                        <div class="min-w-0">

                            <h3 class="text-[11px] sm:text-xs font-extrabold text-dark-green">
                                Bahasa Daerah
                            </h3>

                            <p class="text-[10px] sm:text-[11px] text-gray-500 mt-1">
                                Laili Ermawati, M.Pd.
                            </p>

                            <p class="text-[9px] sm:text-[10px] text-gray-400
                                      mt-1 leading-relaxed">
                                Materi:
                                <span class="text-gray-600">
                                    Geguritan
                                </span>
                            </p>

                        </div>

                    </div>

                    <div class="flex items-center justify-end gap-1.5 sm:gap-2 shrink-0">

                        <span class="bg-emerald-50 text-emerald-700
                                     text-[9px] sm:text-[10px] font-bold
                                     px-2 py-1 rounded-lg whitespace-nowrap">

                            <i class="fa-solid fa-check mr-1"></i>
                            Terisi

                        </span>

                        <a href="#"
                           class="inline-flex items-center gap-1
                                  bg-dark-green text-white hover:bg-medium-green
                                  text-[9px] sm:text-[10px] font-bold
                                  px-2.5 py-1.5 rounded-lg transition whitespace-nowrap">

                            <i class="fa-solid fa-eye"></i>
                            Detail

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection
