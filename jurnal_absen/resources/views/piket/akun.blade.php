<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Akun Guru Piket</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
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
                        'cream': '#FFF4E1'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-[#FFF4E1] min-h-screen text-gray-700">

    <!-- ========================================================= -->
    <!-- MOBILE HEADER -->
    <!-- ========================================================= -->

    <header class="md:hidden sticky top-0 z-40
                   bg-[#1A312C] text-white
                   px-4 py-3 shadow-lg">

        <div class="flex items-center justify-between">

            <div class="flex items-center gap-3">

                <div class="w-9 h-9 rounded-xl
                            bg-[#89D7B7]
                            text-[#1A312C]
                            flex items-center justify-center">

                    <i class="fa-solid fa-user-shield"></i>

                </div>

                <div>
                    <p class="text-[10px] text-[#89D7B7] font-bold uppercase">
                        Guru Piket
                    </p>

                    <p class="text-sm font-extrabold">
                        Akun Saya
                    </p>
                </div>

            </div>

        </div>

    </header>


    <!-- ========================================================= -->
    <!-- SIDEBAR -->
    <!-- ========================================================= -->

    <aside class="hidden md:flex
                  fixed left-0 top-0 bottom-0
                  w-56
                  bg-[#1A312C]
                  text-white
                  flex-col
                  z-50">

        <!-- LOGO -->
        <div class="px-5 py-5">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10
                            rounded-xl
                            bg-[#89D7B7]
                            text-[#1A312C]
                            flex items-center justify-center">

                    <i class="fa-solid fa-user-shield"></i>

                </div>

                <div class="min-w-0">

                    <p class="text-sm font-black">
                        Jurnal Absensi
                    </p>

                    <p class="text-[10px]
                              text-[#89D7B7]
                              font-semibold">
                        Guru Piket
                    </p>

                </div>

            </div>

        </div>


        <!-- NAVIGATION -->
        <nav class="flex-1 px-3 overflow-y-auto">

            <div class="space-y-1">

                <!-- DASHBOARD -->
                <a href="{{ url('/piket/dashboard') }}"
                   class="flex items-center gap-3
                          px-4 py-3
                          text-gray-300
                          hover:bg-white/10
                          hover:text-[#89D7B7]
                          rounded-xl
                          transition">

                    <i class="fa-solid fa-house w-4 text-center"></i>

                    <span class="text-sm">
                        Dashboard
                    </span>

                </a>


                <!-- JURNAL -->
                <a href="{{ url('/piket/jurnal') }}"
                   class="flex items-center gap-3
                          px-4 py-3
                          text-gray-300
                          hover:bg-white/10
                          hover:text-[#89D7B7]
                          rounded-xl
                          transition">

                    <i class="fa-solid fa-book w-4 text-center"></i>

                    <span class="text-sm">
                        Jurnal
                    </span>

                </a>


                <!-- DISPENSASI -->
                <a href="{{ url('/piket/dispensasi') }}"
                   class="flex items-center gap-3
                          px-4 py-3
                          text-gray-300
                          hover:bg-white/10
                          hover:text-[#89D7B7]
                          rounded-xl
                          transition">

                    <i class="fa-solid fa-file-circle-plus w-4 text-center"></i>

                    <span class="text-sm">
                        Dispensasi
                    </span>

                </a>

            </div>

        </nav>


        <!-- FOOTER -->
        <div class="px-3 pb-4">

            <div class="border-t border-white/10 pt-3 space-y-1">

                <!-- AKUN AKTIF -->
                <a href="{{ url('/piket/akun') }}"
                   class="flex items-center gap-3
                          px-4 py-3
                          bg-white/10
                          text-[#89D7B7]
                          rounded-xl">

                    <i class="fa-solid fa-user-circle w-4 text-center"></i>

                    <span class="text-sm font-bold">
                        Akun Saya
                    </span>

                </a>


                <!-- LOGOUT -->
                <a href="{{ route('logout') }}"
                   class="flex items-center gap-3
                          px-4 py-3
                          text-gray-300
                          hover:bg-red-500/10
                          hover:text-red-300
                          rounded-xl
                          transition">

                    <i class="fa-solid fa-right-from-bracket w-4 text-center"></i>

                    <span class="text-sm">
                        Logout
                    </span>

                </a>

            </div>

        </div>

    </aside>


    <!-- ========================================================= -->
    <!-- MAIN -->
    <!-- ========================================================= -->

    <main class="md:ml-56
                 min-h-screen
                 p-4
                 md:p-8">

        <!-- HEADER -->
        <div class="max-w-4xl mx-auto mb-6">

            <div class="flex items-center gap-2 mb-2">

                <span class="w-2 h-2
                             rounded-full
                             bg-[#428475]">
                </span>

                <span class="text-[10px]
                             md:text-xs
                             font-bold
                             uppercase
                             tracking-wider
                             text-[#428475]">

                    Profil Pengguna

                </span>

            </div>


            <h1 class="text-2xl md:text-3xl
                       font-black
                       text-[#1A312C]">

                Akun Guru Piket

            </h1>


            <p class="text-xs md:text-sm
                      text-gray-500
                      mt-1">

                Informasi akun dan identitas Guru Piket.

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


                <!-- PROFILE HEADER -->
                <div class="bg-[#1A312C]
                            px-5 py-6
                            md:px-7">

                    <div class="flex items-center gap-4">

                       <div class="w-16 h-16
                                    md:w-20 md:h-20
                                    rounded-2xl
                                    bg-[#89D7B7]
                                    text-[#1A312C]
                                    flex items-center justify-center
                                    shrink-0
                                    font-black
                                    text-2xl md:text-3xl">

                            {{ strtoupper(substr(auth()->user()->name ?? 'G', 0, 1)) }}

                        </div>


                        <!-- NAME -->
                        <div class="min-w-0">

                            <p class="text-[10px]
                                      uppercase
                                      tracking-wider
                                      text-[#89D7B7]
                                      font-bold
                                      mb-1">

                                Guru Piket

                            </p>


                            <h2 class="text-lg md:text-xl
                                       font-black
                                       text-white
                                       truncate">

                                {{ auth()->user()->name ?? 'Nama Guru Piket' }}

                            </h2>


                            <div class="flex items-center gap-2 mt-2">

                                <span class="inline-flex
                                             items-center gap-1.5
                                             bg-white/10
                                             text-[#89D7B7]
                                             px-2.5 py-1
                                             rounded-lg
                                             text-[9px]
                                             font-bold">

                                    <i class="fa-solid fa-shield-halved"></i>

                                    Guru Piket

                                </span>


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
                <!-- INFORMASI AKUN -->
                <!-- ================================================= -->

                <div class="p-5 md:p-7">

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


                        <!-- ROLE -->
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

                                    <i class="fa-solid fa-user-tag text-xs"></i>

                                </div>


                                <div>

                                    <p class="text-[9px]
                                              uppercase
                                              tracking-wider
                                              font-bold
                                              text-gray-400">

                                        Role

                                    </p>

                                    <p class="text-sm
                                              font-bold
                                              text-[#1A312C]
                                              mt-1">

                                        Guru Piket

                                    </p>

                                </div>

                            </div>

                        </div>


                        <!-- STATUS -->
                        <div class="border border-gray-100
                                    rounded-2xl
                                    p-4
                                    bg-gray-50/50">

                            <div class="flex items-start gap-3">

                                <div class="w-9 h-9
                                            rounded-xl
                                            bg-emerald-100
                                            text-emerald-600
                                            flex items-center justify-center
                                            shrink-0">

                                    <i class="fa-solid fa-circle-check text-xs"></i>

                                </div>


                                <div>

                                    <p class="text-[9px]
                                              uppercase
                                              tracking-wider
                                              font-bold
                                              text-gray-400">

                                        Status Akun

                                    </p>

                                    <p class="text-sm
                                              font-bold
                                              text-emerald-600
                                              mt-1">

                                        Aktif

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

                            Informasi identitas Guru Piket.

                        </p>

                    </div>


                    <div class="grid grid-cols-1
                                md:grid-cols-2
                                gap-4">


                        <!-- NIP / NIK -->
                        <div class="border border-gray-100
                                    rounded-2xl
                                    p-4">

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
                                      mt-1">

                                {{ auth()->user()->nip ?? auth()->user()->nik ?? '-' }}

                            </p>

                        </div>


                        <!-- NAMA -->
                        <div class="border border-gray-100
                                    rounded-2xl
                                    p-4">

                            <p class="text-[9px]
                                      uppercase
                                      tracking-wider
                                      font-bold
                                      text-gray-400">

                                Nama Lengkap

                            </p>

                            <p class="text-sm
                                      font-bold
                                      text-[#1A312C]
                                      mt-1">

                                {{ auth()->user()->name ?? '-' }}

                            </p>

                        </div>


                        <!-- NO HP -->
                        <div class="border border-gray-100
                                    rounded-2xl
                                    p-4">

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
                                      mt-1">

                                {{ auth()->user()->no_hp ?? auth()->user()->phone ?? '-' }}

                            </p>

                        </div>


                        <!-- JENIS KELAMIN -->
                        <div class="border border-gray-100
                                    rounded-2xl
                                    p-4">

                            <p class="text-[9px]
                                      uppercase
                                      tracking-wider
                                      font-bold
                                      text-gray-400">

                                Jenis Kelamin

                            </p>

                            <p class="text-sm
                                      font-bold
                                      text-[#1A312C]
                                      mt-1">

                                {{ auth()->user()->jenis_kelamin ?? '-' }}

                            </p>

                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- JADWAL PIKET -->
                    <!-- ================================================= -->

                    <div class="mt-8 mb-5">

                        <h3 class="text-sm
                                   font-black
                                   text-[#1A312C]">

                            Jadwal Piket

                        </h3>

                        <p class="text-[10px]
                                  text-gray-400
                                  mt-1">

                            Jadwal piket yang ditetapkan untuk akun ini.

                        </p>

                    </div>


                    <div class="border border-gray-100
                                rounded-2xl
                                overflow-hidden">

                        <div class="p-4
                                    flex items-center gap-3">

                            <div class="w-10 h-10
                                        rounded-xl
                                        bg-blue-50
                                        text-blue-600
                                        flex items-center justify-center">

                                <i class="fa-solid fa-calendar-check"></i>

                            </div>


                            <div>

                                <p class="text-[9px]
                                          uppercase
                                          tracking-wider
                                          font-bold
                                          text-gray-400">

                                    Jadwal

                                </p>

                                <p class="text-sm
                                          font-bold
                                          text-[#1A312C]
                                          mt-1">

                                    Jadwal piket mengikuti data yang ditetapkan oleh Waka.

                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- INFO TIDAK BISA EDIT -->
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

                                <i class="fa-solid fa-lock text-xs"></i>

                            </div>


                            <div>

                                <p class="text-xs
                                          font-black
                                          text-[#1A312C]">

                                    Data akun tidak dapat diedit

                                </p>

                                <p class="text-[10px]
                                          leading-relaxed
                                          text-gray-600
                                          mt-1">

                                    Untuk menjaga keamanan dan keakuratan data,
                                    Guru Piket tidak dapat mengubah informasi akun
                                    secara langsung.

                                    Jika terdapat kesalahan atau ingin melakukan
                                    perubahan data, silakan hubungi

                                    <span class="font-bold text-[#428475]">
                                        Waka
                                    </span>.

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

                Akun Guru Piket

            </p>

        </div>

    </main>

</body>
</html>