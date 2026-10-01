@extends('layouts.admin')

@section('title', 'Data Guru')
@section('content')
    <div class="p-4 pb-12 md:p-6 max-w-full space-y-4 md:space-y-5">
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


@endsection
