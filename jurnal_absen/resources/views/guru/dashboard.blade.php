<!DOCTYPE html>
<html lang="id" class="overscroll-none">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-bg-cream text-dark-green font-sans min-h-screen overflow-x-hidden overscroll-none w-full">      
    <!-- MOBILE HEADER -->
    <div class="md:hidden bg-dark-green text-white p-4 flex items-center justify-between sticky top-0 z-40 shadow-sm">
        <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
        <button id="hamburgerBtn" class="text-xl focus:outline-none"><i class="fa-solid fa-bars"></i></button>
    </div>

    <!-- SIDEBAR OVERLAY (MOBILE) -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden"></div>

    <!-- SIDEBAR -->
<aside id="sidebar"
    class="fixed inset-y-0 left-0 w-60 bg-dark-green text-white p-6 flex flex-col justify-between z-50 -translate-x-full md:translate-x-0 transition-transform duration-300">   
         <div>
            <div class="flex flex-col items-center gap-2 mb-10 text-center">
                <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-16 h-auto">
                <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
            </div>

            <nav class="flex flex-col gap-2 font-semibold text-xs">
                <a href="{{ url('/guru/dashboard') }}" class="flex items-center gap-3 px-4 py-3 bg-white/10 text-mint-green rounded-xl transition">
                    <i class="fa-solid fa-house w-4"></i> Dashboard
                </a>
                <a href="{{ url('/guru/jurnal') }}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition">
                    <i class="fa-solid fa-book w-4"></i> Jurnal
                </a>
                <a href="{{ url('/guru/riwayat') }}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition">
                    <i class="fa-regular fa-calendar-days w-4"></i> Riwayat
                </a>
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
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-4 pb-12 md:p-8 md:ml-60 max-w-full md:max-w-[calc(100%-15rem)] mx-auto min-w-0 space-y-4 md:space-y-6">     
       <header class="flex items-center justify-between gap-3">
            <div class="min-w-0">
                <h1 class="text-base sm:text-lg md:text-2xl font-black text-dark-green tracking-tight leading-snug">
                    Selamat Datang, Pak Agus
                </h1>

                <p class="text-[11px] sm:text-xs text-medium-green font-semibold mt-0.5">
                    Semangat mengajar hari ini!
                </p>
            </div>

            <div class="flex items-center gap-2 sm:gap-3 shrink-0">

               
                <div class="text-right leading-tight">
                    <div class="text-[9px] sm:text-[10px] md:text-xs font-semibold text-medium-green whitespace-nowrap">
                        {{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}
                    </div>

                    <div class="text-[10px] sm:text-xs font-extrabold text-dark-green mt-0.5">
                        {{ now()->format('H.i') }} WIB
                    </div>
                </div>

            </div>

        </header>

        <!-- BANNER JADWAL BERIKUTNYA -->
        <section class="bg-dark-green text-white rounded-2xl p-4 sm:p-5 shadow-md space-y-3">
            
            <div class="flex justify-between items-start">
                <div>
                    <span class="text-[9px] sm:text-[10px] text-mint-green/80 uppercase tracking-wider font-extrabold block mb-0.5">
                        Jadwal Berikutnya
                    </span>
                    <h2 class="text-lg sm:text-xl md:text-2xl font-black tracking-wide leading-tight text-white">
                        MATEMATIKA
                    </h2>
                    <p class="text-xs text-gray-300 font-semibold mt-0.5">
                        XI DKV 2
                    </p>
                </div>

            </div>

            <div class="border-t border-white/10 pt-3 flex items-center justify-between gap-3">
                
                <!-- WAKTU & RUANG -->
                <div class="space-y-1 text-[11px] sm:text-xs font-medium text-emerald-100">
                    <div class="flex items-center gap-1.5">
                        <i class="fa-regular fa-clock text-mint-green text-xs w-3.5"></i>
                        <span>13.00 - 13.40</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <i class="fa-solid fa-location-dot text-mint-green text-xs w-3.5"></i>
                        <span>Ruang 18</span>
                    </div>
                </div>

                <!-- TOMBOL ISI JURNAL -->
                <a href="{{ url('/guru/jurnal') }}"
                   class="bg-mint-green hover:bg-emerald-300 text-dark-green font-extrabold text-xs px-3.5 py-2 sm:px-4 sm:py-2.5 rounded-xl transition shadow-xs flex items-center gap-2 shrink-0">
                    <span>Isi Jurnal</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>

            </div>

        </section>

        <!-- CARDS RINGKASAN (3 KOLOM SEJAJAR - PERSEGI PANJANG SLIM) -->
        <section class="grid grid-cols-3 gap-2 md:gap-4">

            <!-- Card 1 -->
            <div id="jadwalHariIni"
                class="bg-white px-2.5 py-2 md:p-3.5 rounded-xl border border-emerald-100/60 flex items-center gap-2 cursor-pointer hover:shadow-md transition min-h-[52px]">
                
                <div class="w-6 h-6 md:w-9 md:h-9 rounded-lg bg-emerald-50 text-dark-green flex items-center justify-center text-[11px] md:text-sm shrink-0">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>

                <div class="min-w-0 flex-1">
                    <div class="flex items-baseline justify-between gap-1">
                        <span class="text-[9px] md:text-xs font-bold text-gray-500 truncate">Jadwal</span>
                        <h3 class="text-xs md:text-base font-black text-dark-green leading-none">4</h3>
                    </div>
                    <span class="text-[8px] md:text-[10px] text-medium-green font-semibold block truncate leading-tight mt-0.5">
                        Hari Ini
                    </span>
                </div>
            </div>

            <!-- Card 2 -->
            <div id="cardSelesai"
                class="bg-white px-2.5 py-2 md:p-3.5 rounded-xl border border-emerald-100/60 flex items-center gap-2 cursor-pointer hover:shadow-md hover:border-medium-green transition min-h-[52px]">
                
                <div class="w-6 h-6 md:w-9 md:h-9 rounded-full bg-emerald-500 text-white flex items-center justify-center text-[10px] md:text-xs shrink-0 shadow-xs">
                    <i class="fa-solid fa-check"></i>
                </div>

                <div class="min-w-0 flex-1">
                    <div class="flex items-baseline justify-between gap-1">
                        <span class="text-[9px] md:text-xs font-bold text-gray-500 truncate">Selesai</span>
                        <h3 class="text-xs md:text-base font-black text-dark-green leading-none">2</h3>
                    </div>
                    <span class="text-[8px] md:text-[10px] text-medium-green font-semibold block truncate leading-tight mt-0.5">
                        Sudah Diisi
                    </span>
                </div>
            </div>

            <!-- Card 3 -->
            <div id="cardBelum"
                class="bg-white px-2.5 py-2 md:p-3.5 rounded-xl border border-emerald-100/60 flex items-center gap-2 cursor-pointer hover:shadow-md hover:border-rose-400 transition min-h-[52px]">
                
                <div class="w-6 h-6 md:w-9 md:h-9 rounded-full bg-rose-500 text-white flex items-center justify-center text-[10px] md:text-xs font-black shrink-0 shadow-xs">
                    !
                </div>

                <div class="min-w-0 flex-1">
                    <div class="flex items-baseline justify-between gap-1">
                        <span class="text-[9px] md:text-xs font-bold text-gray-500 truncate">Belum</span>
                        <h3 class="text-xs md:text-base font-black text-rose-600 leading-none">2</h3>
                    </div>
                    <span class="text-[8px] md:text-[10px] text-rose-500 font-semibold block truncate leading-tight mt-0.5">
                        Diisi
                    </span>
                </div>
            </div>

        </section>

        <!-- STATUS VALIDASI -->
    <section class="bg-white p-4 md:p-6 rounded-2xl shadow-sm border border-emerald-100">

        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-sm md:text-base font-extrabold text-dark-green">
                    Status Validasi Jurnal
                </h3>

                <p class="text-[10px] md:text-xs text-gray-400 mt-0.5">
                    Status jurnal mengajar terbaru
                </p>
            </div>

            <a href="{{ url('/guru/riwayat') }}"
            class="text-[10px] md:text-xs font-bold text-medium-green hover:text-dark-green">
                Lihat Semua →
            </a>
        </div>


        <!-- ================= MOBILE ================= -->
        <div class="space-y-2.5 md:hidden">

            <!-- Jurnal 1 -->
            <div class="p-3 rounded-xl border border-emerald-100 bg-emerald-50/40">

                <div class="flex items-start justify-between gap-3">

                    <div class="flex items-start gap-2.5 min-w-0">

                        <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-check text-xs"></i>
                        </div>

                        <div class="min-w-0">
                            <p class="text-xs font-extrabold text-dark-green truncate">
                                MATEMATIKA
                            </p>

                            <p class="text-[10px] text-medium-green font-semibold mt-0.5">
                                XI PPLG 1
                            </p>
                        </div>

                    </div>

                    <span class="shrink-0 px-2 py-1 rounded-full bg-emerald-100 text-emerald-700 text-[9px] font-bold">
                        Tervalidasi
                    </span>

                </div>

                <div class="flex items-center justify-between mt-2.5 pt-2 border-t border-emerald-100">

                    <div class="flex items-center gap-1.5 text-[10px] text-gray-500">
                        <i class="fa-regular fa-clock"></i>
                        09.00 - 09.40
                    </div>

                    <span class="text-[9px] text-gray-400">
                        21 Jul 2026, 08:40
                    </span>

                </div>

            </div>


            <!-- Jurnal 2 -->
            <div class="p-3 rounded-xl border border-amber-100 bg-amber-50/40">

                <div class="flex items-start justify-between gap-3">

                    <div class="flex items-start gap-2.5 min-w-0">

                        <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center shrink-0">
                            <i class="fa-regular fa-clock text-xs"></i>
                        </div>

                        <div class="min-w-0">
                            <p class="text-xs font-extrabold text-dark-green truncate">
                                MATEMATIKA
                            </p>

                            <p class="text-[10px] text-medium-green font-semibold mt-0.5">
                                XI TKJ 2
                            </p>
                        </div>

                    </div>

                    <span class="shrink-0 px-2 py-1 rounded-full bg-amber-100 text-amber-700 text-[9px] font-bold">
                        Menunggu
                    </span>

                </div>

                <div class="flex items-center justify-between mt-2.5 pt-2 border-t border-amber-100">

                    <div class="flex items-center gap-1.5 text-[10px] text-gray-500">
                        <i class="fa-regular fa-clock"></i>
                        10.00 - 10.40
                    </div>

                    <span class="text-[9px] text-gray-400">
                        21 Jul 2026, 09:30
                    </span>

                </div>

            </div>


            <!-- Jurnal 3 -->
            <div class="p-3 rounded-xl border border-emerald-100 bg-emerald-50/40">

                <div class="flex items-start justify-between gap-3">

                    <div class="flex items-start gap-2.5 min-w-0">

                        <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-check text-xs"></i>
                        </div>

                        <div class="min-w-0">
                            <p class="text-xs font-extrabold text-dark-green truncate">
                                MATEMATIKA
                            </p>

                            <p class="text-[10px] text-medium-green font-semibold mt-0.5">
                                XI TKI 2
                            </p>
                        </div>

                    </div>

                    <span class="shrink-0 px-2 py-1 rounded-full bg-emerald-100 text-emerald-700 text-[9px] font-bold">
                        Tervalidasi
                    </span>

                </div>

                <div class="flex items-center justify-between mt-2.5 pt-2 border-t border-emerald-100">

                    <div class="flex items-center gap-1.5 text-[10px] text-gray-500">
                        <i class="fa-regular fa-clock"></i>
                        11.00 - 11.40
                    </div>

                    <span class="text-[9px] text-gray-400">
                        21 Jul 2026, 09:30
                    </span>

                </div>

            </div>

        </div>


        <!-- ================= DESKTOP ================= -->
        <div class="hidden md:block border border-gray-100 rounded-xl overflow-hidden">

            <table class="w-full text-left border-collapse text-xs">

                <thead>
                    <tr class="text-gray-400 font-extrabold text-[10px] uppercase tracking-wider border-b border-gray-100 bg-gray-50/50">

                        <th class="p-3 w-10"></th>
                        <th class="p-3">Mata Pelajaran</th>
                        <th class="p-3">Kelas</th>
                        <th class="p-3">Jam</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Keterangan</th>

                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 font-medium text-gray-700">

                    <tr class="hover:bg-gray-50 transition">

                        <td class="p-3 text-center">
                            <i class="fa-solid fa-circle-check text-emerald-500"></i>
                        </td>

                        <td class="p-3 font-bold text-dark-green">
                            MATEMATIKA
                        </td>

                        <td class="p-3">
                            XI PPLG 1
                        </td>

                        <td class="p-3">
                            09.00 - 09.40
                        </td>

                        <td class="p-3">
                            <span class="text-emerald-600 font-bold">
                                Tervalidasi
                            </span>
                        </td>

                        <td class="p-3 text-gray-400">
                            21 Juli 2026, 08:40
                        </td>

                    </tr>


                    <tr class="hover:bg-gray-50 transition">

                        <td class="p-3 text-center">
                            <i class="fa-regular fa-clock text-amber-500"></i>
                        </td>

                        <td class="p-3 font-bold text-dark-green">
                            MATEMATIKA
                        </td>

                        <td class="p-3">
                            XI TKJ 2
                        </td>

                        <td class="p-3">
                            10.00 - 10.40
                        </td>

                        <td class="p-3">
                            <span class="text-amber-500 font-bold">
                                Menunggu Validasi
                            </span>
                        </td>

                        <td class="p-3 text-gray-400">
                            21 Juli 2026, 09:30
                        </td>

                    </tr>


                    <tr class="hover:bg-gray-50 transition">

                        <td class="p-3 text-center">
                            <i class="fa-solid fa-circle-check text-emerald-500"></i>
                        </td>

                        <td class="p-3 font-bold text-dark-green">
                            MATEMATIKA
                        </td>

                        <td class="p-3">
                            XI TKI 2
                        </td>

                        <td class="p-3">
                            11.00 - 11.40
                        </td>

                        <td class="p-3">
                            <span class="text-emerald-600 font-bold">
                                Tervalidasi
                            </span>
                        </td>

                        <td class="p-3 text-gray-400">
                            21 Juli 2026, 09:30
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </section>

    </main>

    <!-- MODAL JADWAL HARI INI -->
    <div id="modalJadwal" class="fixed inset-0 bg-dark-green/60 z-50 hidden items-center justify-center p-4 backdrop-blur-sm">
        <div class="bg-white rounded-2xl p-6 w-full max-w-lg max-h-[80vh] overflow-y-auto shadow-2xl space-y-4">
            <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                <div>
                    <h2 class="text-base font-extrabold text-dark-green">Jadwal Mengajar Hari Ini</h2>
                    <p class="text-xs text-medium-green font-medium">Selasa, 21 Juli 2026</p>
                </div>
                <button onclick="closeModal('modalJadwal')" class="w-8 h-8 rounded-full bg-emerald-50 hover:bg-mint-green text-dark-green flex items-center justify-center text-sm transition">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="space-y-2.5 text-xs">
                <div class="flex items-center gap-3 p-3 bg-gray-50 border border-gray-100 rounded-xl">
                    <div class="w-24 font-bold text-medium-green shrink-0">09.00 - 09.40</div>
                    <div class="flex-1">
                        <div class="font-bold text-dark-green">MATEMATIKA</div>
                        <div class="text-[11px] text-medium-green font-medium">XI PPLG 1</div>
                    </div>
                    <div class="text-[11px] font-semibold text-gray-400">Ruang 18</div>
                </div>
                <div class="flex items-center gap-3 p-3 bg-gray-50 border border-gray-100 rounded-xl">
                    <div class="w-24 font-bold text-medium-green shrink-0">10.00 - 10.40</div>
                    <div class="flex-1">
                        <div class="font-bold text-dark-green">MATEMATIKA</div>
                        <div class="text-[11px] text-medium-green font-medium">XI TKJ 2</div>
                    </div>
                    <div class="text-[11px] font-semibold text-gray-400">Ruang 18</div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 2: JURNAL SELESAI -->
    <div id="modalSelesai" class="fixed inset-0 bg-dark-green/60 z-50 hidden items-center justify-center p-4 backdrop-blur-sm">
        <div class="bg-white rounded-2xl p-6 w-full max-w-lg max-h-[80vh] overflow-y-auto shadow-2xl space-y-4">
            <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                <div>
                    <h2 class="text-base font-extrabold text-dark-green">Daftar Jurnal Terisi Hari Ini</h2>
                    <p class="text-xs text-medium-green font-medium">Jurnal yang sudah selesai diisi</p>
                </div>
                <button onclick="closeModal('modalSelesai')" class="w-8 h-8 rounded-full bg-emerald-50 hover:bg-mint-green text-dark-green flex items-center justify-center text-sm transition">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="space-y-2.5 text-xs">
                <div class="p-3 bg-emerald-50/60 border border-emerald-100 rounded-xl flex justify-between items-center">
                    <div>
                        <div class="font-bold text-dark-green">MATEMATIKA - XI PPLG 1</div>
                        <div class="text-[11px] text-gray-500 mt-0.5">Materi: Fungsi Kuadrat</div>
                    </div>
                    <span class="bg-emerald-100 text-emerald-800 font-bold px-2.5 py-1 rounded-md text-[10px]">Terkirim</span>
                </div>
                <div class="p-3 bg-emerald-50/60 border border-emerald-100 rounded-xl flex justify-between items-center">
                    <div>
                        <div class="font-bold text-dark-green">MATEMATIKA - XI TKI 2</div>
                        <div class="text-[11px] text-gray-500 mt-0.5">Materi: Matrix Lanjutan</div>
                    </div>
                    <span class="bg-emerald-100 text-emerald-800 font-bold px-2.5 py-1 rounded-md text-[10px]">Terkirim</span>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 3: BELUM DIISI -->
    <div id="modalBelum" class="fixed inset-0 bg-dark-green/60 z-50 hidden items-center justify-center p-4 backdrop-blur-sm">
        <div class="bg-white rounded-2xl p-6 w-full max-w-lg max-h-[80vh] overflow-y-auto shadow-2xl space-y-4">
            <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                <div>
                    <h2 class="text-base font-extrabold text-dark-green">Jadwal Belum Diisi Jurnal</h2>
                    <p class="text-xs text-rose-500 font-medium">Segera lengkapi jurnal mengajar Anda</p>
                </div>
                <button onclick="closeModal('modalBelum')" class="w-8 h-8 rounded-full bg-emerald-50 hover:bg-mint-green text-dark-green flex items-center justify-center text-sm transition">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="space-y-2.5 text-xs">
                <div class="p-3 bg-rose-50/60 border border-rose-100 rounded-xl flex justify-between items-center">
                    <div>
                        <div class="font-bold text-dark-green">MATEMATIKA - XI TKJ 2</div>
                        <div class="text-[11px] text-rose-600 mt-0.5">Jam Ke-3 (10.00 - 10.40)</div>
                    </div>
                    <a href="{{ url('/guru/jurnal') }}" class="bg-dark-green hover:bg-medium-green text-white font-bold px-3 py-1.5 rounded-lg text-[10px] transition">
                        Isi Jurnal
                    </a>
                </div>
                <div class="p-3 bg-rose-50/60 border border-rose-100 rounded-xl flex justify-between items-center">
                    <div>
                        <div class="font-bold text-dark-green">MATEMATIKA - XI DKV 2</div>
                        <div class="text-[11px] text-rose-600 mt-0.5">Jam Ke-5 (13.00 - 13.40)</div>
                    </div>
                    <a href="{{ url('/guru/jurnal') }}" class="bg-dark-green hover:bg-medium-green text-white font-bold px-3 py-1.5 rounded-lg text-[10px] transition">
                        Isi Jurnal
                    </a>
                </div>
            </div>
        </div>
    </div>

    
    <!-- SCRIPT REALTIME TOGGLE & MODAL -->
    <script>
        // Mobile Sidebar Toggle
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        hamburgerBtn.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
        });

        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });

        // Modal Popup Jadwal Hari Ini
        const jadwalHariIni = document.getElementById('jadwalHariIni');
        const modalJadwal = document.getElementById('modalJadwal');
    

        modalJadwal.addEventListener('click', function (event) {
            if (event.target === modalJadwal) {
                modalJadwal.classList.add('hidden');
                modalJadwal.classList.remove('flex');
            }
        });

        function closeModal(id) {
        const modal = document.getElementById(id);

        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
    </script>
</body>
</html>