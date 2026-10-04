@extends('layouts.admin')

@section('title', 'Akun Admin')
@section('content')
    <div class="p-4 pb-12 md:p-6 max-w-full space-y-4 md:space-y-5">
                 min-h-screen
                 p-4
                 pb-8
                 md:p-8">

        <!-- PAGE HEADER -->

        <div class="max-w-4xl mx-auto mb-6">


            <h1 class="text-2xl md:text-3xl
                       font-black
                       text-[#1A312C]">

                Akun Admin

            </h1>


            <p class="text-xs md:text-sm
                      text-gray-500
                      mt-1">

                Informasi akun dan identitas administrator sistem.

            </p>

        </div>



        <!-- ===================================================== -->
        <!-- PROFILE CARD -->
        <!-- ===================================================== -->

        <section class="max-w-4xl mx-auto">

            <div class="bg-white
                        rounded-3xl
                        shadow-sm
                        border border-gray-100
                        overflow-hidden">


                <!-- ================================================= -->
                <!-- PROFILE HEADER -->
                <!-- ================================================= -->

                <div class="bg-[#1A312C]
                            px-5 py-6
                            md:px-7">

                    <div class="flex items-center gap-4">


                        <!-- AVATAR -->

                        <div class="w-16 h-16
                                    md:w-20 md:h-20
                                    rounded-2xl
                                    bg-[#89D7B7]
                                    text-[#1A312C]
                                    flex items-center justify-center
                                    shrink-0
                                    font-black
                                    text-2xl
                                    md:text-3xl">

                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

                        </div>



                        <!-- NAME -->

                        <div class="min-w-0">

                            <p class="text-[10px]
                                      uppercase
                                      tracking-wider
                                      text-[#89D7B7]
                                      font-bold
                                      mb-1">

                                Administrator

                            </p>


                            <h2 class="text-lg md:text-xl
                                       font-black
                                       text-white
                                       truncate">

                                {{ auth()->user()->name ?? 'Nama Admin' }}

                            </h2>


                            <div class="flex flex-wrap
                                        items-center
                                        gap-2
                                        mt-2">

                                <!-- ROLE -->

                                <span class="inline-flex
                                             items-center gap-1.5
                                             bg-white/10
                                             text-[#89D7B7]
                                             px-2.5 py-1
                                             rounded-lg
                                             text-[9px]
                                             font-bold">

                                    <i class="fa-solid fa-shield-halved"></i>

                                    Admin

                                </span>


                                <!-- STATUS -->

                                <span class="inline-flex
                                             items-center gap-1.5
                                             bg-emerald-400/10
                                             text-emerald-300
                                             px-2.5 py-1
                                             rounded-lg
                                             text-[9px]
                                             font-bold">

                                    <span class="w-1.5 h-1.5
                                                 rounded-full
                                                 bg-emerald-400">
                                    </span>

                                    Aktif

                                </span>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- CONTENT -->
                <!-- ================================================= -->

                <div class="p-5 md:p-7">


                    <!-- ================================================= -->
                    <!-- INFORMASI AKUN -->
                    <!-- ================================================= -->

                    <div class="mb-5">

                        <h3 class="text-sm
                                   font-black
                                   text-[#1A312C]">

                            Informasi Akun

                        </h3>

                        <p class="text-[10px]
                                  text-gray-400
                                  mt-1">

                            Data akun yang digunakan untuk masuk ke sistem.

                        </p>

                    </div>



                    <div class="grid grid-cols-1
                                md:grid-cols-2
                                gap-4">


                        <!-- USERNAME -->

                        <div class="border border-gray-100
                                    rounded-2xl
                                    p-4
                                    bg-gray-50/50">

                            <div class="flex items-start gap-3">

                                <div class="w-9 h-9
                                            rounded-xl
                                            bg-[#1A312C]
                                            text-[#89D7B7]
                                            flex items-center justify-center
                                            shrink-0">

                                    <i class="fa-solid fa-at text-xs"></i>

                                </div>


                                <div class="min-w-0">

                                    <p class="text-[9px]
                                              uppercase
                                              tracking-wider
                                              font-bold
                                              text-gray-400">

                                        Username

                                    </p>

                                    <p class="text-sm
                                              font-bold
                                              text-[#1A312C]
                                              mt-1
                                              break-all">

                                        {{ auth()->user()->username ?? '-' }}

                                    </p>

                                </div>

                            </div>

                        </div>



                        <!-- EMAIL -->

                        <div class="border border-gray-100
                                    rounded-2xl
                                    p-4
                                    bg-gray-50/50">

                            <div class="flex items-start gap-3">

                                <div class="w-9 h-9
                                            rounded-xl
                                            bg-[#1A312C]
                                            text-[#89D7B7]
                                            flex items-center justify-center
                                            shrink-0">

                                    <i class="fa-solid fa-envelope text-xs"></i>

                                </div>


                                <div class="min-w-0">

                                    <p class="text-[9px]
                                              uppercase
                                              tracking-wider
                                              font-bold
                                              text-gray-400">

                                        Email

                                    </p>

                                    <p class="text-sm
                                              font-bold
                                              text-[#1A312C]
                                              mt-1
                                              break-all">

                                        {{ auth()->user()->email ?? '-' }}

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>



                    <!-- ================================================= -->
                    <!-- DATA IDENTITAS -->
                    <!-- ================================================= -->

                    <div class="mt-8 mb-5">

                        <h3 class="text-sm
                                   font-black
                                   text-[#1A312C]">

                            Data Identitas

                        </h3>

                        <p class="text-[10px]
                                  text-gray-400
                                  mt-1">

                            Informasi identitas dasar administrator.

                        </p>

                    </div>



                    <div class="grid grid-cols-1
                                md:grid-cols-2
                                gap-4">


                        <!-- NIP / NIK -->

                        <div class="border border-gray-100
                                    rounded-2xl
                                    p-4
                                    bg-gray-50/30">

                            <p class="text-[9px]
                                      uppercase
                                      tracking-wider
                                      font-bold
                                      text-gray-400">

                                NIP / NIK

                            </p>

                            <p class="text-sm
                                      font-bold
                                      text-[#1A312C]
                                      mt-1
                                      break-all">

                                {{ auth()->user()->nip ?? auth()->user()->nik ?? '-' }}

                            </p>

                        </div>



                        <!-- NOMOR HP -->

                        <div class="border border-gray-100
                                    rounded-2xl
                                    p-4
                                    bg-gray-50/30">

                            <p class="text-[9px]
                                      uppercase
                                      tracking-wider
                                      font-bold
                                      text-gray-400">

                                Nomor HP

                            </p>

                            <p class="text-sm
                                      font-bold
                                      text-[#1A312C]
                                      mt-1
                                      break-all">

                                {{ auth()->user()->no_hp ?? auth()->user()->phone ?? '-' }}

                            </p>

                        </div>

                    </div>

                    <!-- ================================================= -->
                    <!-- INFO ADMIN -->
                    <!-- ================================================= -->

                    <div class="mt-6
                                rounded-2xl
                                bg-[#89D7B7]/15
                                border border-[#89D7B7]/40
                                p-4">

                        <div class="flex items-start gap-3">

                            <div class="w-9 h-9
                                        rounded-xl
                                        bg-[#1A312C]
                                        text-[#89D7B7]
                                        flex items-center justify-center
                                        shrink-0">

                                <i class="fa-solid fa-shield-halved text-xs"></i>

                            </div>


                            <div class="min-w-0">

                                <p class="text-xs
                                          font-black
                                          text-[#1A312C]">

                                    Akun Administrator

                                </p>

                                <p class="text-[10px]
                                          leading-relaxed
                                          text-gray-600
                                          mt-1">

                                    Akun ini memiliki akses untuk mengelola
                                    data dan fitur administrasi sistem.
                                    Pastikan informasi akun tetap aman dan
                                    jangan membagikan kata sandi kepada orang lain.

                                </p>

                            </div>

                        </div>

                    </div>


                </div>

            </div>

        </section>



        <!-- ========================================================= -->
        <!-- FOOTER -->
        <!-- ========================================================= -->

        <div class="max-w-4xl mx-auto
                    mt-6
                    text-center">

            <p class="text-[10px]
                      text-gray-400">

                Jurnal Absensi Sekolah

                <span class="mx-1">•</span>

                Akun Admin

            </p>

        </div>


    </div>
@endsection
