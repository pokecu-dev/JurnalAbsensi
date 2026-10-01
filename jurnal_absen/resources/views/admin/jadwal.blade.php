@extends('layouts.admin')

@section('title', 'Jadwal')

@section('content')


        <div class="p-4 sm:p-6 lg:p-8 max-w-[1600px] mx-auto">


            <!-- PAGE HEADER -->

            <div class="mb-5 sm:mb-6">

                <div class="flex items-start justify-between gap-4">

                    <div class="min-w-0">

                        <div class="flex items-center gap-2 mb-1">

                            <span class="text-[10px] sm:text-xs font-semibold text-medium-green uppercase tracking-wide">
                                Data Master
                            </span>

                        </div>

                        <h1 class="text-xl sm:text-2xl font-bold text-dark-green">
                            Jadwal
                        </h1>

                        <p class="text-xs sm:text-sm text-dark-green/55 mt-1 max-w-2xl">
                            Kelola jadwal mengajar guru dan jadwal piket sekolah.
                        </p>

                    </div>


                    <div class="hidden sm:flex w-11 h-11 rounded-2xl bg-dark-green text-mint-green items-center justify-center shrink-0">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>

                </div>

            </div>



            <!-- =================================================
                 PERIODE
            ================================================== -->

            <div class="bg-white rounded-2xl border border-emerald-100 shadow-sm p-4 sm:p-5 mb-4">

                <div class="flex items-center gap-3 mb-4">

                    <div class="w-9 h-9 rounded-xl bg-mint-green/15 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-calendar-check text-medium-green text-sm"></i>
                    </div>

                    <div>
                        <h2 class="font-bold text-sm sm:text-base">
                            Periode Akademik
                        </h2>

                        <p class="text-[11px] text-dark-green/50">
                            Pilih tahun pelajaran dan semester.
                        </p>
                    </div>

                </div>


                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                    <div>

                        <label
                            for="tahunPelajaran"
                            class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                        >
                            Tahun Pelajaran
                        </label>

                        <select
                            id="tahunPelajaran"
                            class="w-full rounded-xl border border-gray-200 bg-white px-3 py-2.5 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                        >
                            <option value="2026/2027">
                                2026/2027
                            </option>

                            <option value="2025/2026">
                                2025/2026
                            </option>
                        </select>

                    </div>


                    <div>

                        <label
                            for="semester"
                            class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                        >
                            Semester
                        </label>

                        <select
                            id="semester"
                            class="w-full rounded-xl border border-gray-200 bg-white px-3 py-2.5 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                        >
                            <option value="1">
                                Semester 1
                            </option>

                            <option value="2">
                                Semester 2
                            </option>
                        </select>

                    </div>

                </div>

            </div>



            <!-- =================================================
                 TABS
            ================================================== -->

            <div class="grid grid-cols-3 gap-2 sm:gap-3 mb-4">

                <button
                    type="button"
                    data-tab="siswa"
                    class="schedule-tab active-tab bg-dark-green text-white rounded-xl sm:rounded-2xl p-3 sm:p-4 text-left"
                >

                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3">

                        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg sm:rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-users text-mint-green text-xs sm:text-sm"></i>
                        </div>

                        <div class="min-w-0">

                            <p class="text-[10px] sm:text-xs font-bold truncate">
                                Mapel Siswa
                            </p>

                            <p class="hidden sm:block text-[10px] text-white/50 mt-0.5">
                                Berdasarkan kelas
                            </p>

                        </div>

                    </div>

                </button>


                <button
                    type="button"
                    data-tab="guru"
                    class="schedule-tab bg-white border border-emerald-100 rounded-xl sm:rounded-2xl p-3 sm:p-4 text-left"
                >

                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3">

                        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg sm:rounded-xl bg-mint-green/10 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-chalkboard-user text-medium-green text-xs sm:text-sm"></i>
                        </div>

                        <div class="min-w-0">

                            <p class="text-[10px] sm:text-xs font-bold truncate">
                                Guru Mengajar
                            </p>

                            <p class="hidden sm:block text-[10px] text-dark-green/40 mt-0.5">
                                Berdasarkan guru
                            </p>

                        </div>

                    </div>

                </button>


                <button
                    type="button"
                    data-tab="piket"
                    class="schedule-tab bg-white border border-emerald-100 rounded-xl sm:rounded-2xl p-3 sm:p-4 text-left"
                >

                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3">

                        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg sm:rounded-xl bg-mint-green/10 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-people-group text-medium-green text-xs sm:text-sm"></i>
                        </div>

                        <div class="min-w-0">

                            <p class="text-[10px] sm:text-xs font-bold truncate">
                                Guru Piket
                            </p>

                            <p class="hidden sm:block text-[10px] text-dark-green/40 mt-0.5">
                                Berdasarkan petugas
                            </p>

                        </div>

                    </div>

                </button>

            </div>



            <!-- =================================================
                 PANEL SISWA
            ================================================== -->

            <section
                id="panel-siswa"
                class="schedule-panel"
            >

                <div class="bg-white rounded-2xl border border-emerald-100 shadow-sm p-4 sm:p-5">

                    <div class="mb-4">

                        <h2 class="font-bold text-sm sm:text-base">
                            Jadwal Mata Pelajaran Siswa
                        </h2>

                        <p class="text-[11px] sm:text-xs text-dark-green/50 mt-1">
                            Cari kelas untuk melihat jadwal pelajaran dalam satu minggu.
                        </p>

                    </div>


                    <!-- SEARCH -->

                    <div
                        id="classSearchWrapper"
                        class="relative mb-4"
                    >

                        <label
                            for="classSearchInput"
                            class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                        >
                            Cari Kelas
                        </label>


                        <div class="relative">

                            <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <i class="fa-solid fa-magnifying-glass text-gray-400 text-xs"></i>
                            </div>


                            <input
                                id="classSearchInput"
                                type="text"
                                autocomplete="off"
                                placeholder="Ketik nama kelas..."
                                class="w-full rounded-xl border border-gray-200 bg-white pl-9 pr-10 py-3 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                            >


                            <button
                                id="clearClassSearch"
                                type="button"
                                class="hidden absolute right-2 top-1/2 -translate-y-1/2 w-7 h-7 rounded-lg hover:bg-gray-100 text-gray-400"
                            >
                                <i class="fa-solid fa-xmark text-xs"></i>
                            </button>

                        </div>


                        <div
                            id="classSearchDropdown"
                            class="search-dropdown hidden absolute left-0 right-0 top-full mt-2 z-30 bg-white border border-gray-100 rounded-2xl shadow-xl max-h-64 overflow-y-auto"
                        ></div>

                    </div>


                    <!-- SELECTED CLASS -->

                    <div
                        id="selectedClassInfo"
                        class="hidden mb-4 p-3 rounded-xl bg-mint-green/10 border border-mint-green/20"
                    ></div>


                    <!-- SCHEDULE -->

                    <div
                        id="siswaScheduleContainer"
                        class="space-y-3"
                    ></div>

                </div>

            </section>



            <!-- =================================================
                 PANEL GURU
            ================================================== -->

            <section
                id="panel-guru"
                class="schedule-panel hidden"
            >

                <div class="bg-white rounded-2xl border border-emerald-100 shadow-sm p-4 sm:p-5">

                    <div class="mb-4">

                        <h2 class="font-bold text-sm sm:text-base">
                            Jadwal Mengajar Guru
                        </h2>

                        <p class="text-[11px] sm:text-xs text-dark-green/50 mt-1">
                            Cari nama guru untuk melihat jadwal mengajarnya.
                        </p>

                    </div>


                    <div
                        id="teacherSearchWrapper"
                        class="relative mb-4"
                    >

                        <label
                            for="teacherSearchInput"
                            class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                        >
                            Cari Guru
                        </label>


                        <div class="relative">

                            <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <i class="fa-solid fa-magnifying-glass text-gray-400 text-xs"></i>
                            </div>


                            <input
                                id="teacherSearchInput"
                                type="text"
                                autocomplete="off"
                                placeholder="Ketik nama guru..."
                                class="w-full rounded-xl border border-gray-200 bg-white pl-9 pr-10 py-3 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                            >


                            <button
                                id="clearTeacherSearch"
                                type="button"
                                class="hidden absolute right-2 top-1/2 -translate-y-1/2 w-7 h-7 rounded-lg hover:bg-gray-100 text-gray-400"
                            >
                                <i class="fa-solid fa-xmark text-xs"></i>
                            </button>

                        </div>


                        <div
                            id="teacherSearchDropdown"
                            class="search-dropdown hidden absolute left-0 right-0 top-full mt-2 z-30 bg-white border border-gray-100 rounded-2xl shadow-xl max-h-64 overflow-y-auto"
                        ></div>

                    </div>


                    <div
                        id="selectedTeacherInfo"
                        class="hidden mb-4 p-3 rounded-xl bg-mint-green/10 border border-mint-green/20"
                    ></div>


                    <div
                        id="guruScheduleContainer"
                        class="space-y-3"
                    ></div>

                </div>

            </section>



            <!-- =================================================
                 PANEL PIKET
            ================================================== -->

            <section
                id="panel-piket"
                class="schedule-panel hidden"
            >

                <div class="bg-white rounded-2xl border border-emerald-100 shadow-sm p-4 sm:p-5">

                    <div class="mb-4">

                        <h2 class="font-bold text-sm sm:text-base">
                            Jadwal Guru Piket
                        </h2>

                        <p class="text-[11px] sm:text-xs text-dark-green/50 mt-1">
                            Cari guru piket untuk melihat jadwal tugasnya.
                        </p>

                    </div>


                    <div
                        id="piketSearchWrapper"
                        class="relative mb-4"
                    >

                        <label
                            for="piketSearchInput"
                            class="block text-[11px] font-semibold text-dark-green/60 mb-1.5"
                        >
                            Cari Guru Piket
                        </label>


                        <div class="relative">

                            <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <i class="fa-solid fa-magnifying-glass text-gray-400 text-xs"></i>
                            </div>


                            <input
                                id="piketSearchInput"
                                type="text"
                                autocomplete="off"
                                placeholder="Ketik nama guru piket..."
                                class="w-full rounded-xl border border-gray-200 bg-white pl-9 pr-10 py-3 text-sm outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/20"
                            >


                            <button
                                id="clearPiketSearch"
                                type="button"
                                class="hidden absolute right-2 top-1/2 -translate-y-1/2 w-7 h-7 rounded-lg hover:bg-gray-100 text-gray-400"
                            >
                                <i class="fa-solid fa-xmark text-xs"></i>
                            </button>

                        </div>


                        <div
                            id="piketSearchDropdown"
                            class="search-dropdown hidden absolute left-0 right-0 top-full mt-2 z-30 bg-white border border-gray-100 rounded-2xl shadow-xl max-h-64 overflow-y-auto"
                        ></div>

                    </div>


                    <div
                        id="selectedPiketInfo"
                        class="hidden mb-4 p-3 rounded-xl bg-mint-green/10 border border-mint-green/20"
                    ></div>


                    <div
                        id="piketScheduleContainer"
                        class="space-y-3"
                    ></div>

                </div>

            </section>

        </div>


@endsection
