@extends('layouts.admin')

@section('title', 'Data Kelas')
@section('content')
    <div class="p-4 pb-12 md:p-6 max-w-full space-y-4 md:space-y-5">
            <header class="mb-5 md:mb-6">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-[9px] sm:text-[10px] font-extrabold uppercase tracking-wider text-medium-green mb-1">Data Master</p>
                        <h1 class="text-xl sm:text-2xl font-extrabold text-dark-green">Data Kelas</h1>
                        <p class="text-[10px] sm:text-xs text-gray-500 mt-1">Lihat informasi kelas, wali kelas, dan ringkasan kehadiran siswa.</p>
                    </div>
                    <div class="hidden sm:flex w-10 h-10 rounded-xl bg-white border border-emerald-100 items-center justify-center text-medium-green shadow-sm">
                        <i class="fa-solid fa-school"></i>
                    </div>
                </div>
            </header>

            <!-- SUMMARY -->
            <section class="grid grid-cols-3 gap-2.5 sm:gap-3 mb-5">
                <div class="bg-white rounded-2xl border border-emerald-100 p-3 sm:p-4 shadow-sm">
                    <p class="text-[8px] sm:text-[9px] uppercase tracking-wider font-extrabold text-gray-400">Total Kelas</p>
                    <p id="totalKelas" class="text-lg sm:text-2xl font-black text-dark-green mt-1">0</p>
                </div>
                <div class="bg-white rounded-2xl border border-emerald-100 p-3 sm:p-4 shadow-sm">
                    <p class="text-[8px] sm:text-[9px] uppercase tracking-wider font-extrabold text-gray-400">Total Siswa</p>
                    <p id="totalSiswa" class="text-lg sm:text-2xl font-black text-dark-green mt-1">0</p>
                </div>
                <div class="bg-white rounded-2xl border border-emerald-100 p-3 sm:p-4 shadow-sm">
                    <p class="text-[8px] sm:text-[9px] uppercase tracking-wider font-extrabold text-gray-400">Hadir Hari Ini</p>
                    <p id="totalHadir" class="text-lg sm:text-2xl font-black text-medium-green mt-1">0</p>
                </div>
            </section>

            <!-- SEARCH + FILTER -->
            <section class="bg-white rounded-2xl border border-emerald-100 shadow-sm p-3 sm:p-4 mb-5">
                <div class="flex flex-col sm:flex-row gap-2.5">
                    <div class="relative flex-1">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px]"></i>
                        <input id="searchKelas" type="text" placeholder="Cari nama kelas, jurusan, atau wali kelas..." class="w-full rounded-xl border border-gray-200 bg-gray-50 pl-9 pr-3 py-2.5 text-[10px] sm:text-xs outline-none focus:bg-white focus:border-medium-green transition">
                    </div>
                    <select id="levelFilter" class="sm:w-36 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-[10px] sm:text-xs font-semibold outline-none focus:bg-white focus:border-medium-green">
                        <option value="semua">Semua Tingkat</option>
                        <option value="X">Kelas X</option>
                        <option value="XI">Kelas XI</option>
                        <option value="XII">Kelas XII</option>
                    </select>
                </div>
            </section>

            <!-- CLASS LIST -->
            <section>
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <h2 class="text-sm sm:text-base font-extrabold text-dark-green">Daftar Kelas</h2>
                        <p id="resultText" class="text-[9px] sm:text-[10px] text-gray-400 mt-0.5">Menampilkan semua kelas</p>
                    </div>
                </div>

                <div id="classGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3"></div>

                <div id="emptyState" class="hidden bg-white rounded-2xl border border-dashed border-gray-200 p-8 text-center">
                    <div class="w-11 h-11 rounded-full bg-gray-50 text-gray-300 flex items-center justify-center mx-auto mb-3">
                        <i class="fa-solid fa-school"></i>
                    </div>
                    <p class="text-xs font-extrabold text-gray-500">Kelas tidak ditemukan</p>
                    <p class="text-[10px] text-gray-400 mt-1">Coba ubah kata pencarian atau filter tingkat.</p>
                </div>
            </section>

    </div>
@endsection
