<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengajuan Dispensasi</title>

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
</head>

<body class="bg-bg-cream text-dark-green font-sans flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="hidden md:flex md:w-56 bg-dark-green text-white
                  flex-col justify-between p-5 shrink-0
                  h-screen sticky top-0">

        <div>

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

                <!-- UTAMA -->
                <div>

                    <div class="text-[10px] uppercase font-extrabold
                                text-gray-400 tracking-wider mb-1.5 px-2">
                        Utama
                    </div>

                    <div class="space-y-0.5">

                        <a href="{{ url('/admin/dashboard') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5
                                  hover:text-white transition">
                            <i class="fa-solid fa-house w-4 text-center"></i>
                            Dashboard
                        </a>

                        <a href="{{ url('/admin/data_jurnal') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5
                                  hover:text-white transition">
                            <i class="fa-solid fa-book-bookmark w-4 text-center"></i>
                            Monitoring Jurnal
                        </a>

                        <!-- ACTIVE -->
                        <a href="{{ url('/admin/data_dispensasi') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  bg-white/10 text-mint-green font-bold">
                            <i class="fa-solid fa-file-signature w-4 text-center"></i>
                            Dispensasi
                        </a>

                    </div>

                </div>


                <!-- DATA MASTER -->
                <div>

                    <div class="text-[10px] uppercase font-extrabold
                                text-gray-400 tracking-wider mb-1.5 px-2">
                        Data Master
                    </div>

                    <div class="space-y-0.5">

                        <a href="{{ url('/admin/data_guru') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5
                                  hover:text-white transition">
                            <i class="fa-solid fa-chalkboard-user w-4 text-center"></i>
                            Data Guru
                        </a>

                        <a href="{{ url('/admin/data_siswa') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5
                                  hover:text-white transition">
                            <i class="fa-solid fa-user-graduate w-4 text-center"></i>
                            Data Siswa
                        </a>

                        <a href="{{ url('/admin/data_kelas') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5
                                  hover:text-white transition">
                            <i class="fa-solid fa-school w-4 text-center"></i>
                            Data Kelas
                        </a>

                        <a href="{{ url('/admin/data_mapel') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5
                                  hover:text-white transition">
                            <i class="fa-solid fa-book-open w-4 text-center"></i>
                            Mata Pelajaran
                        </a>

                        <a href="{{ url('/admin/jadwal') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5
                                  hover:text-white transition">
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


           <a href="{{ url('/admin/akun') }}"
                class="flex items-center gap-2 px-2 py-2 rounded-lg
                        hover:bg-white/10
                        active:scale-[0.98]
                        transition-all duration-200">
                    <i class="fa-solid fa-user-circle w-4"></i>
                    <span>Akun Admin</span>
            </a>


            <!-- LOGOUT -->
           <a href="{{ route('logout') }}"
            class="w-full flex items-center gap-2 px-2 py-2 rounded-lg
                    hover:bg-white/10
                    active:scale-[0.98]
                    transition-all duration-200">
                <i class="fa-solid fa-right-from-bracket w-4"></i>
                <span>Logout</span>
            </a>

        </div>

    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-4 md:p-6 overflow-y-auto">


        <!-- HEADER -->
        <header class="mb-5">

            <div class="flex items-center justify-between gap-4">

                <div>
                    <h1 class="text-xl md:text-2xl font-extrabold text-dark-green">
                        Pengajuan Dispensasi
                    </h1>

                    <p class="text-xs text-medium-green font-medium mt-1">
                        Kelola dan pantau permohonan dispensasi siswa.
                    </p>
                </div>


                <!-- NOTIFIKASI -->
                <div class="relative shrink-0">

                    <button
                        type="button"
                        class="w-10 h-10 rounded-xl bg-white shadow-sm
                               text-dark-green hover:bg-gray-50
                               transition flex items-center justify-center">

                        <i class="fa-solid fa-bell"></i>

                    </button>

                    <!-- JUMLAH NOTIF -->
                    <span class="absolute -top-1 -right-1
                                 min-w-[18px] h-[18px] px-1
                                 rounded-full bg-red-500 text-white
                                 text-[9px] font-bold
                                 flex items-center justify-center">
                        3
                    </span>

                </div>

            </div>

        </header>


        <!-- FILTER -->
        <section class="bg-white p-4 rounded-2xl shadow-sm mb-5">

            <div class="flex flex-col sm:flex-row gap-3">

                <!-- TANGGAL -->
                <div class="flex-1">

                    <label class="block text-[10px]
                                  font-bold text-gray-400
                                  uppercase tracking-wider mb-1.5">
                        Tanggal
                    </label>

                    <input type="date"
                           value="2026-09-23"
                           class="w-full bg-gray-50
                                  border border-gray-200
                                  text-xs font-bold
                                  rounded-xl px-3 py-2.5
                                  text-dark-green outline-none
                                  focus:border-medium-green">

                </div>


                <!-- STATUS -->
                <div class="flex-1">

                    <label class="block text-[10px]
                                  font-bold text-gray-400
                                  uppercase tracking-wider mb-1.5">
                        Status
                    </label>

                    <select
                        class="w-full bg-gray-50
                               border border-gray-200
                               text-xs font-bold
                               rounded-xl px-3 py-2.5
                               text-dark-green outline-none
                               focus:border-medium-green">

                        <option>Semua Status</option>
                        <option>Menunggu</option>
                        <option>Disetujui</option>
                        <option>Ditolak</option>

                    </select>

                </div>


                <!-- SEARCH -->
                <div class="flex-1">

                    <label class="block text-[10px]
                                  font-bold text-gray-400
                                  uppercase tracking-wider mb-1.5">
                        Cari
                    </label>

                    <div class="relative">

                        <i class="fa-solid fa-magnifying-glass
                                  absolute left-3 top-1/2
                                  -translate-y-1/2
                                  text-gray-400 text-xs"></i>

                        <input type="text"
                               placeholder="Cari nama siswa..."
                               class="w-full bg-gray-50
                                      border border-gray-200
                                      text-xs font-medium
                                      rounded-xl
                                      pl-9 pr-3 py-2.5
                                      text-dark-green outline-none
                                      focus:border-medium-green">

                    </div>

                </div>

            </div>

        </section>


        <!-- DAFTAR PENGAJUAN -->
        <section class="bg-white rounded-2xl shadow-sm overflow-hidden">

            <!-- HEADER -->
            <div class="p-4 border-b border-gray-100">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-sm font-extrabold text-dark-green">
                            Pengajuan Terbaru
                        </h2>

                        <p class="text-[11px] text-gray-400 mt-0.5">
                            Permohonan yang dikirim oleh guru piket.
                        </p>

                    </div>

                    <span class="bg-gray-100 text-gray-500
                                 text-[10px] font-bold
                                 px-2.5 py-1 rounded-lg">
                        3 Pengajuan
                    </span>

                </div>

            </div>


            <!-- LIST -->
            <div class="p-4 space-y-3">


                <!-- ================================================= -->
                <!-- PENGAJUAN 1 -->
                <!-- ================================================= -->

                <a href="{{ url('/admin/data_dispensasi/1') }}"
                   class="block border border-amber-100
                          bg-amber-50/30
                          rounded-xl p-3
                          transition-all duration-200
                          hover:-translate-y-0.5
                          hover:shadow-md
                          hover:border-medium-green
                          cursor-pointer">

                    <div class="flex flex-col sm:flex-row
                                sm:items-center
                                justify-between gap-3">

                        <div class="flex items-start gap-3">

                            <div class="w-10 h-10 shrink-0
                                        rounded-xl bg-dark-green
                                        text-mint-green
                                        flex items-center justify-center">

                                <i class="fa-solid fa-user-graduate text-xs"></i>

                            </div>

                            <div>

                                <h3 class="text-xs font-extrabold
                                           text-dark-green">
                                    MARVEL MAULANA SAPUTRA
                                </h3>

                                <p class="text-[11px] text-gray-500 mt-1">
                                    XI RPL 2
                                </p>

                                <p class="text-[10px] text-gray-400 mt-1">
                                    Keperluan:
                                    <span class="text-gray-600">
                                        Lomba
                                    </span>
                                </p>

                                <p class="text-[10px] text-gray-400 mt-1">
                                    Diajukan oleh:
                                    <span class="text-gray-600">
                                        Guru Piket
                                    </span>
                                </p>

                            </div>

                        </div>


                        <!-- STATUS + DETAIL -->
                        <div class="flex items-center gap-2
                                    self-start sm:self-center">

                            <span class="bg-amber-100
                                         text-amber-700
                                         text-[10px] font-bold
                                         px-2.5 py-1 rounded-lg">
                                Menunggu
                            </span>

                            <span class="inline-flex items-center gap-1.5
                                         bg-dark-green text-white
                                         text-[10px] font-bold
                                         px-2.5 py-1 rounded-lg">

                                <i class="fa-solid fa-eye"></i>
                                Detail

                            </span>

                        </div>

                    </div>

                </a>


                <!-- ================================================= -->
                <!-- PENGAJUAN 2 -->
                <!-- ================================================= -->

                <a href="{{ url('/admin/data_dispensasi/2') }}"
                   class="block border border-gray-100
                          rounded-xl p-3
                          transition-all duration-200
                          hover:-translate-y-0.5
                          hover:shadow-md
                          hover:border-medium-green
                          cursor-pointer">

                    <div class="flex flex-col sm:flex-row
                                sm:items-center
                                justify-between gap-3">

                        <div class="flex items-start gap-3">

                            <div class="w-10 h-10 shrink-0
                                        rounded-xl bg-dark-green
                                        text-mint-green
                                        flex items-center justify-center">

                                <i class="fa-solid fa-user-graduate text-xs"></i>

                            </div>

                            <div>

                                <h3 class="text-xs font-extrabold
                                           text-dark-green">
                                    MARWA RIZQIANI PUTRI
                                </h3>

                                <p class="text-[11px] text-gray-500 mt-1">
                                    XI RPL 2
                                </p>

                                <p class="text-[10px] text-gray-400 mt-1">
                                    Keperluan:
                                    <span class="text-gray-600">
                                        Kegiatan Sekolah
                                    </span>
                                </p>

                                <p class="text-[10px] text-gray-400 mt-1">
                                    Diajukan oleh:
                                    <span class="text-gray-600">
                                        Guru Piket
                                    </span>
                                </p>

                            </div>

                        </div>


                        <!-- STATUS + DETAIL -->
                        <div class="flex items-center gap-2
                                    self-start sm:self-center">

                            <span class="bg-emerald-50
                                         text-emerald-700
                                         text-[10px] font-bold
                                         px-2.5 py-1 rounded-lg">
                                Disetujui
                            </span>

                            <span class="inline-flex items-center gap-1.5
                                         bg-dark-green text-white
                                         text-[10px] font-bold
                                         px-2.5 py-1 rounded-lg">

                                <i class="fa-solid fa-eye"></i>
                                Detail

                            </span>

                        </div>

                    </div>

                </a>


                <!-- ================================================= -->
                <!-- PENGAJUAN 3 -->
                <!-- ================================================= -->

                <a href="{{ url('/admin/data_dispensasi/3') }}"
                   class="block border border-gray-100
                          rounded-xl p-3
                          transition-all duration-200
                          hover:-translate-y-0.5
                          hover:shadow-md
                          hover:border-medium-green
                          cursor-pointer">

                    <div class="flex flex-col sm:flex-row
                                sm:items-center
                                justify-between gap-3">

                        <div class="flex items-start gap-3">

                            <div class="w-10 h-10 shrink-0
                                        rounded-xl bg-dark-green
                                        text-mint-green
                                        flex items-center justify-center">

                                <i class="fa-solid fa-user-graduate text-xs"></i>

                            </div>

                            <div>

                                <h3 class="text-xs font-extrabold
                                           text-dark-green">
                                    NAZWA AFIFAH ANWAR
                                </h3>

                                <p class="text-[11px] text-gray-500 mt-1">
                                    XI RPL 2
                                </p>

                                <p class="text-[10px] text-gray-400 mt-1">
                                    Keperluan:
                                    <span class="text-gray-600">
                                        Kejuaraan
                                    </span>
                                </p>

                                <p class="text-[10px] text-gray-400 mt-1">
                                    Diajukan oleh:
                                    <span class="text-gray-600">
                                        Guru Piket
                                    </span>
                                </p>

                            </div>

                        </div>


                        <!-- STATUS + DETAIL -->
                        <div class="flex items-center gap-2
                                    self-start sm:self-center">

                            <span class="bg-red-50 text-red-600
                                         text-[10px] font-bold
                                         px-2.5 py-1 rounded-lg">
                                Ditolak
                            </span>

                            <span class="inline-flex items-center gap-1.5
                                         bg-dark-green text-white
                                         text-[10px] font-bold
                                         px-2.5 py-1 rounded-lg">

                                <i class="fa-solid fa-eye"></i>
                                Detail

                            </span>

                        </div>

                    </div>

                </a>


            </div>

        </section>

    </main>

</body>
</html>