@extends('layouts.admin')

@section('title', 'Detail Guru')
@section('content')
    <div class="p-4 pb-12 md:p-6 max-w-full space-y-4 md:space-y-5">
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

                    <a href="{{ url('/admin/data_guru') }}"
                       class="inline-flex items-center gap-2
                              text-sm md:text-base
                              font-bold
                              text-medium-green
                              hover:text-dark-green
                              transition
                              mb-4 md:mb-5">

                        <i class="fa-solid fa-arrow-left
                                  text-xs md:text-sm"></i>

                        <h1
                            class="text-xl md:text-2xl
                                   font-extrabold
                                   text-dark-green">

                            Detail Guru

                        </h1>

                    </a>


                    <p
                        class="text-sm md:text-sm
                               text-gray-500
                               leading-relaxed">

                        Informasi lengkap mengenai data dan aktivitas guru.

                    </p>

                </div>


                <!-- EDIT -->

                <button
                    type="button"
                    onclick="openEditGuru()"
                    class="self-start
                           sm:self-center
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

                    <i class="fa-solid fa-pen"></i>

                    Edit Guru

                </button>

            </div>

        </header>



        <!-- ================================================= -->
        <!-- INFORMASI GURU -->
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

                    <i class="fa-solid fa-chalkboard-user"></i>

                </div>


                <div>

                    <h2
                        class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Informasi Guru

                    </h2>


                    <p
                        class="text-xs
                               text-gray-500
                               mt-0.5">

                        Informasi dasar guru.

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

                        Nama

                    </p>


                    <p
                        class="text-sm
                               font-extrabold
                               text-dark-green
                               leading-snug">

                        Sulistyowati, S.Pd.

                    </p>

                </div>



                <!-- NIP -->

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

                        NIP

                    </p>


                    <p
                        class="text-sm
                               font-bold
                               text-dark-green">

                        198xxxxxxxxx

                    </p>

                </div>



                <!-- STATUS -->

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

                        Status

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

                        Aktif

                    </span>

                </div>



                <!-- MATA PELAJARAN -->

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

                        Mata Pelajaran

                    </p>


                    <p
                        class="text-sm
                               font-bold
                               text-dark-green
                               leading-snug">

                        Matematika Terapan

                    </p>

                </div>

            </div>

        </section>



        <!-- ================================================= -->
        <!-- KELAS YANG DIAJAR -->
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

                    <i class="fa-solid fa-school"></i>

                </div>


                <div>

                    <h2
                        class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Kelas yang Diajar

                    </h2>


                    <p
                        class="text-xs
                               text-gray-500
                               mt-0.5">

                        Daftar kelas yang diajar oleh guru.

                    </p>

                </div>

            </div>



            <div class="flex flex-wrap gap-2.5">


                <span
                    class="inline-flex
                           items-center
                           bg-emerald-50
                           text-emerald-700
                           text-xs
                           font-bold
                           px-3 py-2
                           rounded-lg">

                    XI RPL 1

                </span>


                <span
                    class="inline-flex
                           items-center
                           bg-emerald-50
                           text-emerald-700
                           text-xs
                           font-bold
                           px-3 py-2
                           rounded-lg">

                    XI RPL 2

                </span>


                <span
                    class="inline-flex
                           items-center
                           bg-emerald-50
                           text-emerald-700
                           text-xs
                           font-bold
                           px-3 py-2
                           rounded-lg">

                    XII RPL 1

                </span>

            </div>

        </section>



        <!-- ================================================= -->
        <!-- JADWAL MENGAJAR -->
        <!-- ================================================= -->

        <section
            class="bg-white
                   rounded-2xl
                   shadow-sm
                   p-4 md:p-5">


            <div
                class="flex items-center
                       justify-between
                       gap-3
                       mb-5">


                <div>

                    <h2
                        class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Jadwal Mengajar

                    </h2>


                    <p
                        class="text-xs
                               text-gray-500
                               mt-0.5">

                        Semester Ganjil 2026–2027

                    </p>

                </div>


                <div
                    class="w-10 h-10
                           rounded-xl
                           bg-emerald-50
                           text-medium-green
                           flex items-center
                           justify-center
                           shrink-0">

                    <i class="fa-solid fa-calendar-days"></i>

                </div>

            </div>



            <div class="space-y-5">


                <!-- SENIN -->

                <div>

                    <div
                        class="inline-flex
                               items-center
                               bg-dark-green
                               text-mint-green
                               text-[10px]
                               font-extrabold
                               px-3 py-1.5
                               rounded-lg
                               mb-3">

                        Senin

                    </div>


                    <div
                        class="flex gap-3
                               overflow-x-auto
                               pb-1">


                        <!-- JADWAL 1 -->

                        <div
                            class="min-w-[190px]
                                   bg-gray-50
                                   rounded-xl
                                   p-3.5
                                   shrink-0">

                            <div
                                class="flex items-center
                                       justify-between
                                       gap-2
                                       mb-2">

                                <span
                                    class="text-[10px]
                                           text-gray-400
                                           whitespace-nowrap">

                                    <i class="fa-regular fa-clock mr-1"></i>

                                    07.00 – 08.20

                                </span>


                                <span
                                    class="bg-emerald-100
                                           text-emerald-700
                                           text-[8px]
                                           font-bold
                                           px-2 py-1
                                           rounded-md">

                                    SELESAI

                                </span>

                            </div>


                            <p
                                class="text-sm
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </p>


                            <div
                                class="flex items-center
                                       gap-3
                                       mt-3
                                       text-[10px]
                                       text-gray-400">

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



                        <!-- JADWAL 2 -->

                        <div
                            class="min-w-[190px]
                                   bg-gray-50
                                   rounded-xl
                                   p-3.5
                                   shrink-0">

                            <div
                                class="flex items-center
                                       justify-between
                                       gap-2
                                       mb-2">

                                <span
                                    class="text-[10px]
                                           text-gray-400
                                           whitespace-nowrap">

                                    <i class="fa-regular fa-clock mr-1"></i>

                                    10.00 – 12.40

                                </span>


                                <span
                                    class="bg-emerald-100
                                           text-emerald-700
                                           text-[8px]
                                           font-bold
                                           px-2 py-1
                                           rounded-md">

                                    SELESAI

                                </span>

                            </div>


                            <p
                                class="text-sm
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </p>


                            <div
                                class="flex items-center
                                       gap-3
                                       mt-3
                                       text-[10px]
                                       text-gray-400">

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



                        <!-- JADWAL 3 -->

                        <div
                            class="min-w-[190px]
                                   bg-gray-50
                                   rounded-xl
                                   p-3.5
                                   shrink-0">

                            <div
                                class="flex items-center
                                       justify-between
                                       gap-2
                                       mb-2">

                                <span
                                    class="text-[10px]
                                           text-gray-400
                                           whitespace-nowrap">

                                    <i class="fa-regular fa-clock mr-1"></i>

                                    10.00 – 12.40

                                </span>


                                <span
                                    class="bg-emerald-100
                                           text-emerald-700
                                           text-[8px]
                                           font-bold
                                           px-2 py-1
                                           rounded-md">

                                    SELESAI

                                </span>

                            </div>


                            <p
                                class="text-sm
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </p>


                            <div
                                class="flex items-center
                                       gap-3
                                       mt-3
                                       text-[10px]
                                       text-gray-400">

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

                    <div
                        class="inline-flex
                               items-center
                               bg-dark-green
                               text-mint-green
                               text-[10px]
                               font-extrabold
                               px-3 py-1.5
                               rounded-lg
                               mb-3">

                        Selasa

                    </div>


                    <div
                        class="flex gap-3
                               overflow-x-auto
                               pb-1">


                        <!-- JADWAL 1 -->

                        <div
                            class="min-w-[190px]
                                   bg-gray-50
                                   rounded-xl
                                   p-3.5
                                   shrink-0">

                            <div
                                class="flex items-center
                                       justify-between
                                       gap-2
                                       mb-2">

                                <span
                                    class="text-[10px]
                                           text-gray-400
                                           whitespace-nowrap">

                                    <i class="fa-regular fa-clock mr-1"></i>

                                    07.00 – 09.40

                                </span>


                                <span
                                    class="bg-emerald-100
                                           text-emerald-700
                                           text-[8px]
                                           font-bold
                                           px-2 py-1
                                           rounded-md">

                                    BERLANGSUNG

                                </span>

                            </div>


                            <p
                                class="text-sm
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </p>


                            <div
                                class="flex items-center
                                       gap-3
                                       mt-3
                                       text-[10px]
                                       text-gray-400">

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



                        <!-- JADWAL 2 -->

                        <div
                            class="min-w-[190px]
                                   bg-gray-50
                                   rounded-xl
                                   p-3.5
                                   shrink-0">

                            <div
                                class="flex items-center
                                       justify-between
                                       gap-2
                                       mb-2">

                                <span
                                    class="text-[10px]
                                           text-gray-400
                                           whitespace-nowrap">

                                    <i class="fa-regular fa-clock mr-1"></i>

                                    10.00 – 12.40

                                </span>


                                <span
                                    class="bg-amber-100
                                           text-amber-700
                                           text-[8px]
                                           font-bold
                                           px-2 py-1
                                           rounded-md">

                                    MENDATANG

                                </span>

                            </div>


                            <p
                                class="text-sm
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </p>


                            <div
                                class="flex items-center
                                       gap-3
                                       mt-3
                                       text-[10px]
                                       text-gray-400">

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

                    <div
                        class="inline-flex
                               items-center
                               bg-gray-500
                               text-white
                               text-[10px]
                               font-extrabold
                               px-3 py-1.5
                               rounded-lg
                               mb-3">

                        Kamis

                    </div>


                    <div
                        class="flex gap-3
                               overflow-x-auto
                               pb-1">


                        <!-- JADWAL 1 -->

                        <div
                            class="min-w-[190px]
                                   bg-gray-50
                                   rounded-xl
                                   p-3.5
                                   shrink-0">

                            <div
                                class="flex items-center
                                       justify-between
                                       gap-2
                                       mb-2">

                                <span
                                    class="text-[10px]
                                           text-gray-400
                                           whitespace-nowrap">

                                    <i class="fa-regular fa-clock mr-1"></i>

                                    07.00 – 09.40

                                </span>


                                <span
                                    class="bg-gray-100
                                           text-gray-500
                                           text-[8px]
                                           font-bold
                                           px-2 py-1
                                           rounded-md">

                                    MENDATANG

                                </span>

                            </div>


                            <p
                                class="text-sm
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </p>


                            <div
                                class="flex items-center
                                       gap-3
                                       mt-3
                                       text-[10px]
                                       text-gray-400">

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



                        <!-- JADWAL 2 -->

                        <div
                            class="min-w-[190px]
                                   bg-gray-50
                                   rounded-xl
                                   p-3.5
                                   shrink-0">

                            <div
                                class="flex items-center
                                       justify-between
                                       gap-2
                                       mb-2">

                                <span
                                    class="text-[10px]
                                           text-gray-400
                                           whitespace-nowrap">

                                    <i class="fa-regular fa-clock mr-1"></i>

                                    10.00 – 12.40

                                </span>


                                <span
                                    class="bg-gray-100
                                           text-gray-500
                                           text-[8px]
                                           font-bold
                                           px-2 py-1
                                           rounded-md">

                                    MENDATANG

                                </span>

                            </div>


                            <p
                                class="text-sm
                                       font-extrabold
                                       text-dark-green">

                                Matematika

                            </p>


                            <div
                                class="flex items-center
                                       gap-3
                                       mt-3
                                       text-[10px]
                                       text-gray-400">

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



        <!-- ================================================= -->
        <!-- JADWAL PIKET -->
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

                    <i class="fa-solid fa-calendar-check"></i>

                </div>


                <div>

                    <h2
                        class="text-sm md:text-base
                               font-extrabold
                               text-dark-green">

                        Jadwal Piket

                    </h2>


                    <p
                        class="text-xs
                               text-gray-500
                               mt-0.5">

                        Jadwal piket guru.

                    </p>

                </div>

            </div>



            <div class="space-y-2.5">


                <!-- PIKET 1 -->

                <div
                    class="border border-gray-100
                           rounded-xl
                           p-3.5">


                    <div
                        class="flex items-start
                               gap-3">


                        <div
                            class="w-10 h-10
                                   rounded-xl
                                   bg-dark-green
                                   text-mint-green
                                   flex items-center
                                   justify-center
                                   shrink-0">

                            <i class="fa-solid fa-calendar-check"></i>

                        </div>


                        <div class="flex-1 min-w-0">

                            <div
                                class="flex flex-col
                                       sm:flex-row
                                       sm:items-center
                                       sm:justify-between
                                       gap-2">


                                <div>

                                    <p
                                        class="text-sm
                                               font-extrabold
                                               text-dark-green">

                                        Selasa, 1 September 2026

                                    </p>


                                    <p
                                        class="text-xs
                                               text-gray-500
                                               mt-1">

                                        Petugas Piket KBM Pagi

                                    </p>

                                </div>


                                <span
                                    class="bg-blue-50
                                           text-blue-700
                                           text-xs
                                           font-bold
                                           px-3 py-1.5
                                           rounded-lg
                                           self-start">

                                    07.00 – 11.00

                                </span>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- PIKET 2 -->

                <div
                    class="border border-gray-100
                           rounded-xl
                           p-3.5">


                    <div
                        class="flex items-start
                               gap-3">


                        <div
                            class="w-10 h-10
                                   rounded-xl
                                   bg-dark-green
                                   text-mint-green
                                   flex items-center
                                   justify-center
                                   shrink-0">

                            <i class="fa-solid fa-calendar-check"></i>

                        </div>


                        <div class="flex-1 min-w-0">

                            <div
                                class="flex flex-col
                                       sm:flex-row
                                       sm:items-center
                                       sm:justify-between
                                       gap-2">


                                <div>

                                    <p
                                        class="text-sm
                                               font-extrabold
                                               text-dark-green">

                                        Selasa, 15 September 2026

                                    </p>


                                    <p
                                        class="text-xs
                                               text-gray-500
                                               mt-1">

                                        Petugas Piket KBM Pagi

                                    </p>

                                </div>


                                <span
                                    class="bg-blue-50
                                           text-blue-700
                                           text-xs
                                           font-bold
                                           px-3 py-1.5
                                           rounded-lg
                                           self-start">

                                    07.00 – 11.00

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        <!-- ================================================= -->
        <!-- BOTTOM -->
        <!-- ================================================= -->

        <div class="flex justify-start pb-5">

            <a href="{{ url('/admin/data_guru') }}"
               class="inline-flex items-center
                      justify-center
                      gap-2
                      bg-gray-100
                      hover:bg-gray-200
                      text-gray-600
                      text-sm
                      font-bold
                      px-4 py-3
                      rounded-xl
                      transition">

                <i class="fa-solid fa-arrow-left"></i>

                Kembali ke Data Guru

            </a>

        </div>


    </div>
@endsection
