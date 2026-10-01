@extends('layouts.admin')

@section('title', 'Detail Siswa')
@section('content')
    <div class="p-4 pb-12 md:p-6 max-w-full space-y-4 md:space-y-5">

        <!-- BACK -->
        <a href="{{ url('/admin/data_siswa') }}"
           class="inline-flex items-center gap-2 text-xs font-bold
                  text-medium-green hover:text-dark-green transition mb-5">

            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Data Siswa

        </a>


        <!-- HEADER -->
        <header class="mb-5">

            <div class="flex flex-col sm:flex-row
                        sm:items-center sm:justify-between gap-4">

                <div>

                    <p class="text-[10px] font-bold uppercase
                              tracking-wider text-medium-green mb-1">
                        Data Siswa
                    </p>

                    <h1 class="text-xl md:text-2xl font-extrabold text-dark-green">
                        MARVEL MAULANA SAPUTRA
                    </h1>

                    <p class="text-xs text-gray-500 mt-1">
                        Detail informasi siswa.
                    </p>

                </div>

                <button
                    type="button"
                    onclick="openEditSiswa()"
                    class="inline-flex items-center justify-center gap-2
                           bg-dark-green hover:bg-medium-green
                           text-white text-xs font-bold
                           px-4 py-2.5 rounded-xl transition">

                    <i class="fa-solid fa-pen"></i>
                    Edit Siswa

                </button>

            </div>

        </header>


        <!-- INFORMASI SISWA -->
        <section class="bg-white rounded-2xl shadow-sm p-5 mb-5">

            <div class="flex items-center gap-3 mb-5">

                <div class="w-11 h-11 rounded-xl
                            bg-emerald-50 text-medium-green
                            flex items-center justify-center">

                    <i class="fa-solid fa-user-graduate"></i>

                </div>

                <div>

                    <h2 class="text-sm font-extrabold text-dark-green">
                        Informasi Siswa
                    </h2>

                    <p class="text-[10px] text-gray-400 mt-0.5">
                        Data dasar siswa.
                    </p>

                </div>

            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <!-- Nama -->
                <div class="bg-gray-50 rounded-xl p-4">

                    <p class="text-[10px] uppercase tracking-wider
                              font-bold text-gray-400 mb-1">
                        Nama Lengkap
                    </p>

                    <p class="text-xs font-extrabold text-dark-green">
                        MARVEL MAULANA SAPUTRA
                    </p>

                </div>


                <!-- Kelas -->
                <div class="bg-gray-50 rounded-xl p-4">

                    <p class="text-[10px] uppercase tracking-wider
                              font-bold text-gray-400 mb-1">
                        Kelas
                    </p>

                    <p class="text-xs font-extrabold text-dark-green">
                        XI RPL 2
                    </p>

                </div>

            </div>

        </section>


        <!-- RIWAYAT ABSENSI -->
        <section class="bg-white rounded-2xl shadow-sm overflow-hidden">

            <div class="px-5 py-4 border-b border-gray-100">

                <h2 class="text-sm font-extrabold text-dark-green">
                    Riwayat Absensi
                </h2>

                <p class="text-[10px] text-gray-400 mt-0.5">
                    Riwayat kehadiran siswa.
                </p>

            </div>


            <div class="divide-y divide-gray-100">

                <!-- RIWAYAT 1 -->
                <div class="px-5 py-4 flex items-center
                            justify-between gap-3">

                    <div>

                        <p class="text-xs font-bold text-dark-green">
                            Rabu, 23 September 2026
                        </p>

                        <p class="text-[10px] text-gray-400 mt-0.5">
                            Matematika Terapan
                        </p>

                    </div>

                    <span class="bg-emerald-50 text-emerald-700
                                 text-[10px] font-bold
                                 px-2.5 py-1 rounded-lg">
                        Hadir
                    </span>

                </div>


                <!-- RIWAYAT 2 -->
                <div class="px-5 py-4 flex items-center
                            justify-between gap-3">

                    <div>

                        <p class="text-xs font-bold text-dark-green">
                            Selasa, 22 September 2026
                        </p>

                        <p class="text-[10px] text-gray-400 mt-0.5">
                            Bahasa Indonesia
                        </p>

                    </div>

                    <span class="bg-emerald-50 text-emerald-700
                                 text-[10px] font-bold
                                 px-2.5 py-1 rounded-lg">
                        Hadir
                    </span>

                </div>


                <!-- RIWAYAT 3 -->
                <div class="px-5 py-4 flex items-center
                            justify-between gap-3">

                    <div>

                        <p class="text-xs font-bold text-dark-green">
                            Senin, 21 September 2026
                        </p>

                        <p class="text-[10px] text-gray-400 mt-0.5">
                            Informatika
                        </p>

                    </div>

                    <span class="bg-amber-50 text-amber-700
                                 text-[10px] font-bold
                                 px-2.5 py-1 rounded-lg">
                        Izin
                    </span>

                </div>

            </div>

        </section>


        <!-- MOBILE SCROLL -->
        <div class="fixed right-3 bottom-4 md:hidden">

            <button
                type="button"
                onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
                class="w-9 h-9 rounded-full
                       bg-dark-green text-white shadow-lg
                       flex items-center justify-center">

                <i class="fa-solid fa-arrow-up text-xs"></i>

            </button>

        </div>


    </div>
@endsection
