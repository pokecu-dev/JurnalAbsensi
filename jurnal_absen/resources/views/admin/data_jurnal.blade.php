<!DOCTYPE html>
<html lang="id" class="overscroll-none">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Jurnal Kelas</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

    <!-- 1. SIDEBAR (Pakai Struktur Baru + Data Master) -->
    <aside class="hidden md:flex md:w-56 bg-dark-green text-white flex-col justify-between p-5 shrink-0 h-screen sticky top-0">
        <div>
            <!-- LOGO BRAND -->
            <div class="flex flex-col items-center justify-center gap-1.5 mb-6 text-center">
                <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-12 h-auto object-contain">
                <span class="text-sm font-bold tracking-wide">Jurnal Absensi</span>
            </div>

            <!-- MENU NAVIGASI (Dengan Grup) -->
            <nav class="flex flex-col gap-4 text-xs font-semibold">
                <!-- Grup Utama -->
                <div>
                    <div class="text-[10px] uppercase font-extrabold text-gray-400 tracking-wider mb-1.5 px-2">Utama</div>
                    <div class="space-y-0.5">
                        <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-house w-4 text-center"></i> Dashboard
                        </a>
                        <a href="{{ url('/admin/monitoring_jurnal') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl bg-white/10 text-mint-green font-bold">
                            <i class="fa-solid fa-book-bookmark w-4 text-center"></i> Monitoring Jurnal
                        </a>
                        <a href="{{ url('/admin/data_dispensasi') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-file-signature w-4 text-center"></i> Dispensasi
                        </a>
                    </div>
                </div>

                <!-- Grup Data Master -->
                <div>
                    <div class="text-[10px] uppercase font-extrabold text-gray-400 tracking-wider mb-1.5 px-2">Data Master</div>
                    <div class="space-y-0.5">
                        <a href="{{ url('/admin/data_guru') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-chalkboard-user w-4 text-center"></i> Data Guru
                        </a>
                        <a href="{{ url('/admin/data_siswa') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-user-graduate w-4 text-center"></i> Data Siswa
                        </a>
                        <a href="{{ url('/admin/data_kelas') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-school w-4 text-center"></i> Data Kelas
                        </a>
                        <a href="{{ url('/admin/data_mapel') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-book-open w-4 text-center"></i> Mata Pelajaran
                        </a>
                        <a href="{{ url('/admin/jadwal') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-calendar-days w-4 text-center"></i> Jadwal
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

    <!-- 2. MAIN CONTENT -->
    <main class="flex-1 p-4 md:p-6 overflow-y-auto">

        <header class="mb-5">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <!-- JUDUL -->
        <div>
            <h1 class="text-xl md:text-2xl font-extrabold text-dark-green">
                Monitoring Jurnal
            </h1>

            <p class="text-xs text-medium-green font-medium mt-1">
                Kelola dan pantau jurnal KBM berdasarkan kelas.
            </p>
        </div>

        <!-- TANGGAL + JAM + AKSI -->
        <div class="flex items-center justify-between sm:justify-end gap-4">

            <a href="#"
               class="bg-dark-green hover:bg-medium-green
                      text-white text-xs font-bold
                      px-4 py-2.5 rounded-xl
                      transition inline-flex items-center gap-2
                      whitespace-nowrap">

                <i class="fa-solid fa-plus"></i>
                Tambah Jurnal
            </a>

        </div>

    </div>

</header>

       <!-- FILTER JURNAL -->
<section class="bg-white p-4 rounded-2xl shadow-sm mb-5">
    <div class="flex flex-col sm:flex-row gap-3">

        <!-- Tanggal -->
        <div class="flex-1">
            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1.5">
                Tanggal
            </label>

            <input
                type="date"
                value="2026-07-21"
                class="w-full bg-gray-50 border border-gray-200
                       text-xs font-bold rounded-xl px-3 py-2.5
                       text-dark-green outline-none
                       focus:border-medium-green">
        </div>

        <!-- Kelas -->
        <div class="flex-1">
            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1.5">
                Kelas
            </label>

            <select
                class="w-full bg-gray-50 border border-gray-200
                       text-xs font-bold rounded-xl px-3 py-2.5
                       text-dark-green outline-none
                       focus:border-medium-green">

                <option>Semua Kelas</option>
                <option>X AKL 1</option>
                <option>X AKL 2</option>
                <option>XI RPL 1</option>
                <option>XI RPL 2</option>
                <option>XI TKJ 1</option>
            </select>
        </div>

        <!-- Search -->
        <div class="flex-1">
            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1.5">
                Cari
            </label>

            <div class="relative">
                <i class="fa-solid fa-magnifying-glass
                          absolute left-3 top-1/2 -translate-y-1/2
                          text-gray-400 text-xs"></i>

                <input
                    type="text"
                    placeholder="Cari guru / mata pelajaran..."
                    class="w-full bg-gray-50 border border-gray-200
                           text-xs font-medium rounded-xl
                           pl-9 pr-3 py-2.5
                           text-dark-green outline-none
                           focus:border-medium-green">
            </div>
        </div>

    </div>
</section>
        <!-- KELAS XI RPL 2 -->
<section class="bg-white rounded-2xl shadow-sm overflow-hidden mb-5">

    <!-- HEADER KELAS -->
    <div class="p-4 border-b border-gray-100">

        <div class="flex flex-col sm:flex-row sm:items-center
                    justify-between gap-3">

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-xl
                            bg-dark-green text-mint-green
                            flex items-center justify-center
                            font-black text-xs">
                    XI
                </div>

                <div>
                    <div class="flex flex-wrap items-center gap-2">

                <h2 class="text-sm font-extrabold text-dark-green">
                    XI RPL 2
                </h2>

                <span class="bg-emerald-50 text-emerald-700
                            text-[10px] font-bold
                            px-2 py-0.5 rounded-md">
                    34/36 hadir
                </span>

            </div>

            <p class="text-[11px] text-gray-400 mt-0.5">
                Rabu, 23 September 2026
            </p>
                </div>

            </div>

            <span class="self-start sm:self-center
                         bg-emerald-50 text-emerald-700
                         text-[10px] font-bold
                         px-2.5 py-1 rounded-lg">
                3 Jurnal
            </span>

        </div>

    </div>


    <!-- DAFTAR JURNAL -->
    <div class="p-4 space-y-3">

       <!-- JURNAL 1 -->
<div class="border border-gray-100 rounded-xl p-3
            hover:border-emerald-200
            transition">

    <div class="flex flex-col sm:flex-row
                sm:items-center justify-between gap-3">

        <div class="flex items-start gap-3">

            <!-- JAM -->
            <div class="w-14 shrink-0 text-center">
                <div class="text-xs font-extrabold text-dark-green">
                    1 - 2
                </div>

                <div class="text-[9px] text-gray-400 mt-0.5">
                    07.00 - 08.20
                </div>
            </div>

            <!-- DETAIL -->
            <div class="min-w-0">

                <h3 class="text-xs font-extrabold text-dark-green">
                    Matematika Terapan
                </h3>

                <p class="text-[11px] text-gray-500 mt-1">
                    Sulistyowati, S.Pd.
                </p>

                <p class="text-[10px] text-gray-400 mt-1">
                    Materi:
                    <span class="text-gray-600">
                        Polynomial & Teorema Sisa
                    </span>
                </p>

            </div>

        </div>

        <!-- STATUS + DETAIL -->
        <div class="flex items-center gap-2 self-start sm:self-center">

            <span class="bg-emerald-50 text-emerald-700
                         text-[10px] font-bold
                         px-2.5 py-1 rounded-lg">
                <i class="fa-solid fa-check mr-1"></i>
                Terisi
            </span>

            <a href="#"
               class="inline-flex items-center gap-1.5
                      bg-dark-green text-white
                      hover:bg-medium-green
                      text-[10px] font-bold
                      px-2.5 py-1 rounded-lg
                      transition">
                <i class="fa-solid fa-eye"></i>
                Detail
            </a>

        </div>

    </div>

</div>

        <!-- JURNAL 2 -->
        <div class="border border-gray-100 rounded-xl p-3
                    hover:border-emerald-200
                    transition">

            <div class="flex flex-col sm:flex-row
                        sm:items-center justify-between gap-3">

                <div class="flex items-start gap-3">

                    <!-- JAM -->
                    <div class="w-14 shrink-0 text-center">
                        <div class="text-xs font-extrabold text-dark-green">
                            3 - 4
                        </div>

                        <div class="text-[9px] text-gray-400 mt-0.5">
                            08.20 - 09.40
                        </div>
                    </div>

                    <!-- DETAIL -->
                    <div class="min-w-0">

                        <h3 class="text-xs font-extrabold text-dark-green">
                            Bimbingan Konseling
                        </h3>

                        <p class="text-[11px] text-gray-500 mt-1">
                            Widodo, S.Kom.
                        </p>

                        <p class="text-[10px] text-gray-400 mt-1">
                            Materi:
                            <span class="text-gray-600">
                                Asesmen Diagnostik
                            </span>
                        </p>

                    </div>

                </div>

               <div class="flex items-center gap-2 self-start sm:self-center">

                    <span class="bg-emerald-50 text-emerald-700
                                text-[10px] font-bold
                                px-2.5 py-1 rounded-lg">
                        <i class="fa-solid fa-check mr-1"></i>
                        Terisi
                    </span>

                    <a href="#"
                    class="inline-flex items-center gap-1.5
                            bg-dark-green text-white
                            hover:bg-medium-green
                            text-[10px] font-bold
                            px-2.5 py-1 rounded-lg
                            transition">
                        <i class="fa-solid fa-eye"></i>
                        Detail
                    </a>

                </div>

            </div>

        </div>


        <!-- JURNAL 3 -->
        <div class="border border-gray-100 rounded-xl p-3
                    hover:border-emerald-200
                    transition">

            <div class="flex flex-col sm:flex-row
                        sm:items-center justify-between gap-3">

                <div class="flex items-start gap-3">

                    <!-- JAM -->
                    <div class="w-14 shrink-0 text-center">
                        <div class="text-xs font-extrabold text-dark-green">
                            5 - 6
                        </div>

                        <div class="text-[9px] text-gray-400 mt-0.5">
                            10.00 - 11.20
                        </div>
                    </div>

                    <!-- DETAIL -->
                    <div class="min-w-0">

                        <h3 class="text-xs font-extrabold text-dark-green">
                            Bahasa Daerah
                        </h3>

                        <p class="text-[11px] text-gray-500 mt-1">
                            Laili Ermawati, M.Pd.
                        </p>

                        <p class="text-[10px] text-gray-400 mt-1">
                            Materi:
                            <span class="text-gray-600">
                                Geguritan
                            </span>
                        </p>

                    </div>

                </div>

                <div class="flex items-center gap-2 self-start sm:self-center">

                    <span class="bg-emerald-50 text-emerald-700
                                text-[10px] font-bold
                                px-2.5 py-1 rounded-lg">
                        <i class="fa-solid fa-check mr-1"></i>
                        Terisi
                    </span>

                    <a href="#"
                    class="inline-flex items-center gap-1.5
                            bg-dark-green text-white
                            hover:bg-medium-green
                            text-[10px] font-bold
                            px-2.5 py-1 rounded-lg
                            transition">
                        <i class="fa-solid fa-eye"></i>
                        Detail
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

    </main>

</body>
</html>