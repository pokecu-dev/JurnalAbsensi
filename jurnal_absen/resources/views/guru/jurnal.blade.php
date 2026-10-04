@php
use Illuminate\Support\Carbon;

Carbon::setTestNow('2026-10-05 09:00:00');
@endphp
<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal Mengajar</title>

    <script src="https://cdn.tailwindcss.com"></script>

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

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            overflow-x: hidden;
        }

        /* =====================================================
           SCROLL INDICATOR
        ====================================================== */

        #scrollIndicator {
            transition: top 0.15s ease-out;
        }

        /* =====================================================
           ABSENSI SISWA
        ====================================================== */

        .status-scroll {
            scrollbar-width: thin;
            scrollbar-color: rgba(66, 132, 117, 0.35) transparent;
        }

        .status-scroll::-webkit-scrollbar {
            height: 4px;
        }

        .status-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .status-scroll::-webkit-scrollbar-thumb {
            background: rgba(66, 132, 117, 0.35);
            border-radius: 999px;
        }

        .status-btn {
            background: white;
            border-color: #e5e7eb;
            color: #6b7280;
        }

        .status-btn:hover {
            border-color: #428475;
            color: #1A312C;
            background: #f0fdf4;
        }

        .status-btn.active-status {
            background: #1A312C;
            border-color: #1A312C;
            color: white;
        }

        /* =====================================================
           RINGKASAN
        ====================================================== */

        .summary-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            padding: 10px 0;
            border-bottom: 1px solid #ecfdf5;
        }

        .summary-row:last-child {
            border-bottom: none;
        }
    </style>
</head>

<body class="bg-bg-cream text-dark-green font-sans min-h-screen overflow-x-hidden">

    <!-- =========================================================
         MOBILE HEADER
    ========================================================== -->

    <div
        class="md:hidden bg-dark-green text-white p-4 flex items-center justify-between sticky top-0 z-40 shadow-sm">

        <div class="flex items-center gap-2">

            <img
                src="{{ asset('image/logo.png') }}"
                alt="Logo"
                class="w-8 h-8 object-contain">

            <span class="font-bold text-sm tracking-wide">
                Jurnal Absensi
            </span>

        </div>

        <button
            id="hamburgerBtn"
            type="button"
            class="w-9 h-9 rounded-lg flex items-center justify-center hover:bg-white/10 transition focus:outline-none">

            <i class="fa-solid fa-bars"></i>

        </button>

    </div>


    <!-- =========================================================
         SIDEBAR
    ========================================================== -->

    <aside
        id="sidebar"
        class="fixed inset-y-0 left-0 w-60 md:w-56 bg-dark-green text-white p-6 flex flex-col justify-between z-50 -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">

        <div>

            <!-- LOGO -->
            <div class="flex flex-col items-center gap-2 mb-10 text-center">

                <img
                    src="{{ asset('image/logo.png') }}"
                    alt="Logo"
                    class="w-16 h-auto">

                <span class="font-bold text-sm tracking-wide">
                    Jurnal Absensi
                </span>

            </div>


            <!-- MENU -->
            <nav class="flex flex-col gap-5 font-semibold text-xs">

                <div>

                    <div class="text-[10px] uppercase font-extrabold text-gray-400 tracking-wider mb-2 px-2">
                        Utama
                    </div>

                    <div class="space-y-1">

                        <!-- DASHBOARD -->
                        <a
                            href="{{ url('/guru/dashboard') }}"
                            class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">

                            <i class="fa-solid fa-house w-4 text-center"></i>

                            Dashboard

                        </a>


                        <!-- JURNAL -->
                        <a
                            href="{{ url('/guru/jurnal') }}"
                            class="flex items-center gap-3 px-4 py-3 bg-white/10 text-mint-green rounded-xl transition active:scale-[0.98]">

                            <i class="fa-solid fa-book w-4 text-center"></i>

                            Jurnal

                        </a>


                        <!-- RIWAYAT -->
                        <a
                            href="{{ url('/guru/riwayat') }}"
                            class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">

                            <i class="fa-regular fa-calendar-days w-4 text-center"></i>

                            Riwayat

                        </a>

                    </div>

                </div>

            </nav>

        </div>


        <!-- FOOTER SIDEBAR -->

        <div class="flex flex-col gap-1 pt-3 border-t border-white/10 text-xs">

            <!-- AKUN GURU -->
            <a
                href="{{ url('/guru/akun') }}"
                class="flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">

                <i class="fa-solid fa-user-circle w-4"></i>

                <span>
                    Akun Guru
                </span>
            </a>

            <!-- LOGOUT -->
            <a href="{{ route('logout') }}"
                class="w-full flex items-center gap-2 px-2 py-2 rounded-lg
                    hover:bg-white/10
                    active:scale-[0.98]
                    transition-all duration-200">
                <i class="fa-solid fa-right-from-bracket w-4"></i>

                <span>
                    Logout
                </span>

            </a>

        </div>

    </aside>

    <div
        id="sidebarOverlay"
        class="fixed inset-0 bg-black/40 z-40 hidden md:hidden">
    </div>

    <!-- =========================================================
         MAIN CONTENT
    ========================================================== -->

    <main
        class="flex-1 p-4 pb-12 md:p-8 md:ml-56 max-w-full md:max-w-[calc(100%-14rem)] mx-auto min-w-0">

        <!-- =====================================================
             MOBILE BACK
        ====================================================== -->

        <header class="mb-5 md:mb-7">

            <div class="flex items-start justify-between gap-3">

                <div class="flex items-start gap-3">

                    <!-- TOMBOL KEMBALI -->
                    <a href="{{ url()->previous() }}"
                        aria-label="Kembali"
                        class="shrink-0 w-9 h-9 mt-0.5 rounded-full bg-white border border-emerald-100
                            flex items-center justify-center text-dark-green
                            hover:bg-emerald-50 hover:border-medium-green
                            active:scale-[0.95] transition">
                        <i class="fa-solid fa-arrow-left text-xs"></i>
                    </a>

                    <div>

                        <h1 class="text-xl md:text-2xl font-black tracking-tight">
                            Jurnal
                        </h1>

                        <p class="text-[11px] md:text-xs text-medium-green
                            font-semibold mt-1">
                            Lengkapi Jurnal sesi mengajar Anda
                        </p>

                    </div>

                </div>
            </div>
        </header>

        @if(!$jadwal)

        <div class="bg-white border border-emerald-100 rounded-2xl p-6 text-center shadow-sm">
            <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-emerald-50 flex items-center justify-center">
                <i class="fa-regular fa-calendar-xmark text-medium-green text-lg"></i>
            </div>

            <h2 class="text-sm font-extrabold text-dark-green">
                Tidak Ada Jadwal Aktif
            </h2>

            <p class="text-xs text-gray-500 mt-1">
                Saat ini tidak ada jadwal mengajar yang sedang berlangsung.
            </p>
        </div>
        @elseif($jurnal)
        <div class="bg-white border border-emerald-100 rounded-2xl p-6 text-center shadow-sm">
            <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-emerald-50 flex items-center justify-center">
                <i class="fa-regular fa-calendar-xmark text-medium-green text-lg"></i>
            </div>

            <h2 class="text-sm font-extrabold text-dark-green">
                anda sudah mengisi jurnal
            </h2>

            <p class="text-xs text-gray-500 mt-1">
                anda sudah mengisi jurnal pada jadwal saat ini.
            </p>
        </div>

        @else
        <!-- =====================================================
                 INFORMASI SESI
            ====================================================== -->
        <section
            class="bg-white rounded-2xl border border-emerald-100 shadow-sm overflow-hidden mb-5">

            <!-- TANGGAL & WAKTU -->
            <div class="px-4 py-3.5 bg-emerald-50/60 border-b border-emerald-100">

                <div class="flex items-center gap-3">

                    <div
                        class="w-10 h-10 rounded-xl bg-dark-green text-mint-green flex items-center justify-center shrink-0">
                        <i class="fa-regular fa-calendar-days"></i>
                    </div>

                    <div class="min-w-0">

                        <div id="dateTimeContainer" data-laravel-now="{{ now()->toIso8601String() }}">



                            <p class="text-[9px] uppercase tracking-wider text-medium-green font-extrabold">
                                Sesi Mengajar
                            </p>

                            <!-- <p id="tanggalSekarang" class="text-xs sm:text-sm font-extrabold text-dark-green mt-0.5">
                            {{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}
                        </p> -->
                            <p id="tanggalSekarang" class="text-xs sm:text-sm font-extrabold text-dark-green mt-0.5">
                                {{ __(now()->isoFormat('dddd, D MMMM Y')) }}
                            </p>

                            <!-- <p id="jamSekarang" class="text-[10px] sm:text-xs text-gray-500 font-semibold mt-0.5">
                            Waktu pengisian: {{ now()->format('H.i') }} WIB
                        </p> -->
                            <p id="jamSekarang" class="text-[10px] sm:text-xs text-gray-500 font-semibold mt-0.5">
                                Waktu pengisian: {{ __(now()->isoFormat('H.i')) }} WIB
                            </p>

                        </div>
                    </div>

                </div>

            </div>


            <!-- DETAIL JADWAL -->
            <div class="grid grid-cols-3 gap-px bg-gray-100">

                <!-- KELAS -->
                <div class="bg-white p-3">

                    <span class="text-[8px] sm:text-[9px] uppercase tracking-wider text-gray-400 font-bold">
                        Kelas
                    </span>

                    <p class="text-[11px] sm:text-xs font-extrabold text-dark-green mt-1 truncate">
                        {{ $jadwal?->classes?->name ?? 'Gak Ada' }}
                    </p>

                </div>


                <!-- MAPEL -->
                <div class="bg-white p-3">

                    <span class="text-[8px] sm:text-[9px] uppercase tracking-wider text-gray-400 font-bold">
                        Mapel
                    </span>

                    <p class="text-[11px] sm:text-xs font-extrabold text-dark-green mt-1 truncate">
                        {{ $jadwal?->mapel?->name ?? '-' }}
                    </p>

                </div>


                <!-- JAM -->
                <div class="bg-white p-3">

                    <span class="text-[8px] sm:text-[9px] uppercase tracking-wider text-gray-400 font-bold">
                        Jam
                    </span>

                    <p class="text-[11px] sm:text-xs font-extrabold text-dark-green mt-1 truncate">

                        @if($jadwal)
                        {{ $jadwal->start_time }} - {{ $jadwal->end_time }}
                        @else
                        Tidak Aktif
                        @endif

                    </p>

                </div>

            </div>

        </section>


        <!-- =====================================================
                 FORM UTAMA
            ====================================================== -->
        <form id="jurnalForm"
            method="POST"
            action="{{ route('guru.jurnal.create') }}"
            class="space-y-5">

            @csrf

            <input type="hidden"
                name="jadwal_id"
                value="{{ $jadwal?->id }}">


            <!-- =================================================
                        STATUS KEHADIRAN GURU
                    ================================================== -->
            <section
                class="bg-white p-4 sm:p-5 rounded-2xl border border-emerald-100 shadow-sm">

                <label
                    for="statusKehadiran"
                    class="block text-xs font-extrabold text-dark-green mb-2">

                    Kehadiran Guru

                </label>

                <p class="text-[10px] text-gray-400 mb-3">
                    Pilih kondisi guru pada sesi mengajar ini.
                </p>


                <select
                    id="statusKehadiran"
                    name="status_kehadiran"
                    onchange="handleStatusChange()"
                    class="w-full bg-white border border-emerald-200 rounded-xl px-4 py-3 text-xs font-bold text-dark-green outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/30 cursor-pointer shadow-sm">

                    <option value="hadir" selected>
                        Hadir — Mengajar
                    </option>

                    <option value="tidak_hadir_tugas">
                        Tidak Hadir — Memberikan Tugas
                    </option>

                    <option value="tidak_hadir_tanpa_tugas">
                        Tidak Hadir — Perlu Penanganan
                    </option>

                </select>

            </section>


            <!-- =================================================
                        HADIR
                    ================================================== -->
            <section
                id="sectionHadir"
                class="bg-white p-4 sm:p-5 rounded-2xl shadow-sm border border-emerald-100 space-y-4">

                <div>

                    <h3 class="text-sm font-extrabold text-dark-green flex items-center gap-2">
                        <i class="fa-regular fa-pen-to-square text-medium-green"></i>
                        Detail Kegiatan
                    </h3>

                    <p class="text-[10px] text-gray-400 mt-1">
                        Catat materi dan kegiatan yang dilakukan selama pembelajaran.
                    </p>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- MATERI -->
                    <div>

                        <label
                            class="block text-xs font-bold text-dark-green mb-1.5">

                            Materi Pembelajaran
                            <span class="text-rose-500">*</span>

                        </label>

                        <textarea
                            name="materi"
                            id="materi"
                            placeholder="Contoh: Fungsi Linear, Fungsi Kuadrat..."
                            class="w-full bg-emerald-50/50 border border-emerald-100 rounded-xl p-3 text-xs font-medium text-dark-green outline-none focus:border-medium-green focus:bg-white h-24 transition resize-none"></textarea>

                    </div>


                    <!-- KETERANGAN -->
                    <div>

                        <label
                            class="block text-xs font-bold text-dark-green mb-1.5">

                            Keterangan / Aktivitas Kelas

                        </label>

                        <textarea
                            name="keterangan"
                            id="keterangan"
                            placeholder="Contoh: Diskusi kelompok, latihan soal, tanya jawab..."
                            class="w-full bg-emerald-50/50 border border-emerald-100 rounded-xl p-3 text-xs font-medium text-dark-green outline-none focus:border-medium-green focus:bg-white h-24 transition resize-none"></textarea>

                    </div>

                </div>

            </section>


            <!-- =================================================
                        TUGAS
                    ================================================== -->

            <section
                id="sectionTugas"
                class="bg-white p-4 sm:p-5 rounded-2xl shadow-sm border border-emerald-100 space-y-4 hidden">

                <div>

                    <h3 class="text-sm font-extrabold text-dark-green flex items-center gap-2">

                        <i class="fa-solid fa-list-check text-medium-green"></i>

                        Tugas untuk Siswa

                    </h3>

                    <p class="text-[10px] text-gray-400 mt-1">
                        Digunakan ketika guru tidak hadir tetapi memberikan tugas.
                    </p>

                </div>


                <div
                    class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-3.5 rounded-xl text-xs flex items-start gap-3">

                    <i class="fa-solid fa-circle-info text-base mt-0.5"></i>

                    <div>
                        Tugas dapat diteruskan kepada pihak yang bertanggung jawab untuk disampaikan kepada siswa.
                    </div>

                </div>


                <div>

                    <label class="block text-xs font-bold text-dark-green mb-1.5">

                        Instruksi / Deskripsi Tugas
                        <span class="text-rose-500">*</span>

                    </label>

                    <textarea
                        name="instruksi_tugas"
                        id="instruksiTugas"
                        placeholder="Tuliskan tugas, batas waktu, dan cara pengumpulan..."
                        class="w-full bg-emerald-50/50 border border-emerald-100 rounded-xl p-3 text-xs font-medium text-dark-green outline-none focus:border-medium-green focus:bg-white h-28 transition resize-none"></textarea>

                </div>

            </section>


            <!-- =================================================
                        TIDAK HADIR / PERLU PENANGANAN
                    ================================================== -->

            <section
                id="sectionTanpaTugas"
                class="bg-white p-4 sm:p-5 rounded-2xl shadow-sm border border-emerald-100 space-y-4 hidden">

                <div>

                    <h3 class="text-sm font-extrabold text-dark-green flex items-center gap-2">

                        <i class="fa-solid fa-building-user text-medium-green"></i>

                        Penanganan Kelas

                    </h3>

                    <p class="text-[10px] text-gray-400 mt-1">
                        Digunakan ketika guru tidak hadir dan tidak memberikan tugas.
                    </p>

                </div>


                <div
                    class="bg-amber-50 border border-amber-200 text-amber-900 p-3.5 rounded-xl text-xs flex items-start gap-3">

                    <i class="fa-solid fa-triangle-exclamation text-base text-amber-600 mt-0.5"></i>

                    <div>
                        Informasi ini dapat menjadi pemberitahuan bagi <b>Guru Piket</b> untuk menangani kelas.
                    </div>

                </div>


                <div>

                    <label class="block text-xs font-bold text-dark-green mb-1.5">

                        Alasan / Keterangan

                    </label>

                    <textarea
                        name="alasan_kosong"
                        id="alasanKosong"
                        placeholder="Contoh: Mendampingi kegiatan sekolah / berhalangan hadir..."
                        class="w-full bg-emerald-50/50 border border-emerald-100 rounded-xl p-3 text-xs font-medium text-dark-green outline-none focus:border-medium-green focus:bg-white h-24 transition resize-none"></textarea>

                </div>

            </section>


            <!-- =================================================
                        ABSENSI SISWA
                    ================================================== -->

            <section
                id="sectionAbsensiSiswa"
                class="bg-white p-4 sm:p-5 rounded-2xl shadow-sm border border-emerald-100 space-y-4">

                <div>

                    <h3 class="text-sm font-extrabold text-dark-green flex items-center gap-2">

                        <i class="fa-solid fa-users text-medium-green"></i>

                        Absensi Siswa

                    </h3>

                    <p class="text-[10px] text-gray-400 mt-1">
                        Tandai status kehadiran setiap siswa pada sesi pembelajaran ini.
                    </p>

                </div>


                <!-- SEARCH & FILTER -->

                <div
                    class="bg-amber-50/60 p-3 sm:p-4 rounded-xl border border-amber-100">

                    <div class="flex flex-col sm:flex-row gap-3">

                        <!-- SEARCH -->

                        <div class="relative flex-1">

                            <i
                                class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs">
                            </i>

                            <input
                                type="text"
                                id="searchSiswa"
                                placeholder="Cari nama / NISN / no. absen..."
                                autocomplete="off"
                                class="w-full bg-white border border-gray-200 rounded-xl pl-9 pr-3 py-2.5 text-xs font-semibold text-dark-green outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/30">

                        </div>


                        <!-- FILTER -->

                        <select
                            id="filterAbsensi"
                            class="w-full sm:w-40 bg-white border border-gray-200 rounded-xl px-3 py-2.5 text-xs font-bold text-dark-green outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/30">

                            <option value="semua">
                                Semua Siswa
                            </option>

                            <option value="tidak_hadir">
                                Tidak Hadir
                            </option>

                        </select>

                    </div>


                    <!-- INFO -->

                    <div class="flex items-center justify-between mt-3 px-1">

                        <p class="text-[10px] text-gray-400">
                            Default semua siswa dianggap hadir.
                        </p>

                        <p class="text-[10px] font-bold text-medium-green whitespace-nowrap">

                            Tidak hadir:
                            <span id="jumlahTidakHadir">0</span>

                        </p>

                    </div>

                </div>


                <!-- DAFTAR SISWA -->

                <div
                    id="studentList"
                    class="space-y-2 max-h-[60vh] overflow-y-auto pr-1">

                    @foreach($jadwal->classes->siswas as $index => $siswa)

                    <div
                        class="student-item p-3 rounded-xl border border-gray-100 bg-gray-50 transition"
                        data-nama="{{ strtolower($siswa['name']) }}"
                        data-nisn=""
                        data-no-absen="{{ $index + 1 }}"
                        data-status="hadir">

                        <!-- IDENTITAS -->

                        <div class="flex items-center gap-3 min-w-0">

                            <!-- NOMOR -->

                            <div
                                class="w-8 h-8 rounded-lg bg-emerald-100 text-medium-green flex items-center justify-center text-xs font-extrabold shrink-0">

                                {{ $index + 1 }}

                            </div>


                            <!-- NAMA -->

                            <div class="min-w-0 flex-1">

                                <p class="text-xs font-extrabold text-dark-green truncate">
                                    {{ $siswa['name'] }}
                                </p>

                                <p class="text-[9px] text-gray-400 mt-0.5">
                                    Siswa kelas ini
                                </p>

                            </div>

                        </div>


                        <!-- STATUS ABSENSI -->

                        <div
                            class="mt-3 overflow-x-auto pb-1 status-scroll">

                            <div class="flex gap-1.5 min-w-max">

                                <!-- INPUT TERSEMBUNYI -->

                                <input
                                    type="hidden"
                                    name="absensi[{{ $siswa['id'] }}]"
                                    value="hadir"
                                    class="status-input">


                                <!-- HADIR -->

                                <button
                                    type="button"
                                    data-status="hadir"
                                    class="status-btn active-status px-3 py-2 rounded-lg border text-[10px] font-bold whitespace-nowrap transition">

                                    Hadir

                                </button>


                                <!-- SAKIT -->

                                <button
                                    type="button"
                                    data-status="sakit"
                                    class="status-btn px-3 py-2 rounded-lg border text-[10px] font-bold whitespace-nowrap transition">

                                    Sakit

                                </button>


                                <!-- IZIN -->

                                <button
                                    type="button"
                                    data-status="izin"
                                    class="status-btn px-3 py-2 rounded-lg border text-[10px] font-bold whitespace-nowrap transition">

                                    Izin

                                </button>


                                <!-- ALPHA -->

                                <button
                                    type="button"
                                    data-status="alpha"
                                    class="status-btn px-3 py-2 rounded-lg border text-[10px] font-bold whitespace-nowrap transition">

                                    Alpha

                                </button>


                                <!-- DISPEN -->

                                <button
                                    type="button"
                                    data-status="dispen"
                                    class="status-btn px-3 py-2 rounded-lg border text-[10px] font-bold whitespace-nowrap transition">

                                    Dispen

                                </button>

                            </div>

                        </div>

                    </div>
                    @endforeach



                </div>



                <!-- INFO BAWAH -->

                <div
                    class="bg-emerald-50 border border-emerald-100 rounded-xl p-3 flex items-start gap-3">

                    <i class="fa-solid fa-circle-info text-medium-green text-sm mt-0.5"></i>

                    <p class="text-[10px] text-emerald-800 leading-relaxed">

                        Gunakan pencarian jika siswa yang tidak hadir memiliki nomor
                        absen di bagian bawah daftar. Kamu tidak perlu menggulir sampai
                        menemukan siswa tersebut.

                    </p>

                </div>

            </section>

            <!-- =================================================
                        ACTION BUTTONS
                    ================================================== -->
            <div
                class="bg-white p-4 rounded-2xl border border-emerald-100 shadow-sm flex flex-col gap-2.5 sm:flex-row sm:justify-end sm:items-center sm:gap-3">

                <!-- BATAL -->
                <button
                    type="button"
                    onclick="openCancelConfirm()"
                    class="w-full sm:w-auto px-5 py-3 text-xs font-bold text-gray-500 hover:text-dark-green hover:bg-gray-50 rounded-xl transition order-3 sm:order-1">

                    <i class="fa-solid fa-xmark mr-1"></i>
                    Batal

                </button>


                <!-- SIMPAN DRAF -->
                <button
                    type="button"
                    onclick="openConfirm('draft')"
                    class="w-full sm:w-auto bg-white text-dark-green border-2 border-medium-green hover:bg-emerald-50 font-bold text-xs px-5 py-3 rounded-xl transition flex items-center justify-center gap-2 order-2">

                    <i class="fa-regular fa-bookmark"></i>

                    Simpan Draf

                </button>


                <!-- KIRIM -->

                <button
                    type="button"
                    onclick="openSummary()"
                    id="btnSubmit"
                    class="w-full sm:w-auto bg-dark-green hover:bg-medium-green text-white font-bold text-xs px-5 py-3 rounded-xl transition shadow-sm flex items-center justify-center gap-2 order-1 sm:order-3">

                    <i class="fa-regular fa-paper-plane"></i>

                    <span id="textBtnSimpan">
                        Kirim Jurnal
                    </span>

                </button>

            </div>

        </form>

        @endif

    </main>


    <!-- =========================================================
         MOBILE SCROLL HELPER
    ========================================================== -->

    <div
        id="scrollHelper"
        class="md:hidden fixed right-2 sm:right-3 top-1/2 -translate-y-1/2 z-30 flex flex-col items-center gap-1">

        <!-- KE ATAS -->

        <button
            type="button"
            onclick="scrollToTop()"
            aria-label="Kembali ke atas"
            class="w-7 h-7 rounded-full bg-white/95 border border-emerald-100 shadow-md text-medium-green flex items-center justify-center active:scale-90 transition">

            <i class="fa-solid fa-chevron-up text-[9px]"></i>

        </button>


        <!-- TRACK -->

        <div
            class="relative w-1 h-28 bg-dark-green/10 rounded-full overflow-hidden">

            <div
                id="scrollIndicator"
                class="absolute left-0 top-0 w-1 h-8 bg-medium-green rounded-full">
            </div>

        </div>


        <!-- KE BAWAH -->

        <button
            type="button"
            onclick="scrollToBottom()"
            aria-label="Ke bagian bawah"
            class="w-7 h-7 rounded-full bg-white/95 border border-emerald-100 shadow-md text-medium-green flex items-center justify-center active:scale-90 transition">

            <i class="fa-solid fa-chevron-down text-[9px]"></i>

        </button>

    </div>


    <!-- =========================================================
         MODAL RINGKASAN JURNAL
    ========================================================== -->

    <div
        id="summaryModal"
        class="fixed inset-0 bg-dark-green/60 backdrop-blur-sm z-[130] hidden items-center justify-center p-4">

        <div
            class="bg-white w-full max-w-md max-h-[90vh] overflow-y-auto rounded-2xl shadow-2xl p-5">

            <!-- HEADER -->

            <div class="flex items-start gap-3 mb-5">

                <div
                    class="w-12 h-12 rounded-xl bg-emerald-50 text-medium-green flex items-center justify-center shrink-0">

                    <i class="fa-solid fa-clipboard-check text-lg"></i>

                </div>

                <div>

                    <h2 class="text-base font-extrabold text-dark-green">
                        Ringkasan Jurnal
                    </h2>

                    <p class="text-[10px] text-gray-500 mt-1 leading-relaxed">
                        Periksa kembali data sebelum jurnal dikirim.
                    </p>

                </div>

            </div>


            <!-- RINGKASAN DATA -->

            <div
                class="bg-emerald-50/50 border border-emerald-100 rounded-xl px-4 py-2">

                <!-- TANGGAL -->

                <div class="summary-row">

                    <span class="text-[10px] font-bold text-gray-400">
                        Tanggal
                    </span>

                    <span
                        id="summaryTanggal"
                        class="text-[10px] font-extrabold text-dark-green text-right">
                        -
                    </span>

                </div>


                <!-- JAM -->

                <div class="summary-row">

                    <span class="text-[10px] font-bold text-gray-400">
                        Waktu
                    </span>

                    <span
                        id="summaryJam"
                        class="text-[10px] font-extrabold text-dark-green text-right">
                        -
                    </span>

                </div>


                <!-- KELAS -->

                <div class="summary-row">

                    <span class="text-[10px] font-bold text-gray-400">
                        Kelas
                    </span>

                    <span
                        class="text-[10px] font-extrabold text-dark-green text-right">

                        {{ $jadwal?->classes?->name ?? '-' }}

                    </span>

                </div>


                <!-- MAPEL -->

                <div class="summary-row">

                    <span class="text-[10px] font-bold text-gray-400">
                        Mata Pelajaran
                    </span>

                    <span
                        class="text-[10px] font-extrabold text-dark-green text-right">

                        {{ $jadwal?->mapel?->name ?? '-' }}

                    </span>

                </div>


                <!-- JAM MENGAJAR -->

                <div class="summary-row">

                    <span class="text-[10px] font-bold text-gray-400">
                        Jam Mengajar
                    </span>

                    <span
                        class="text-[10px] font-extrabold text-dark-green text-right">

                        {{ $jadwal?->start_time ?? '-' }} - {{ $jadwal?->end_time ?? '-' }}

                    </span>

                </div>


                <!-- STATUS GURU -->

                <div class="summary-row">

                    <span class="text-[10px] font-bold text-gray-400">
                        Status Guru
                    </span>

                    <span
                        id="summaryStatusGuru"
                        class="text-[10px] font-extrabold text-dark-green text-right">
                        -
                    </span>

                </div>


                <!-- MATERI -->

                <div class="summary-row gap-3">

                    <span class="text-[10px] font-bold text-gray-400 shrink-0">
                        Materi
                    </span>

                    <span
                        id="summaryMateri"
                        class="text-[10px] font-semibold text-dark-green text-right break-words">
                        -
                    </span>

                </div>


                <!-- KETERANGAN -->

                <div class="summary-row gap-3">

                    <span class="text-[10px] font-bold text-gray-400 shrink-0">
                        Keterangan
                    </span>

                    <span
                        id="summaryKeterangan"
                        class="text-[10px] font-semibold text-dark-green text-right break-words">
                        -
                    </span>

                </div>

            </div>


            <!-- REKAP ABSENSI -->

            <div class="grid grid-cols-2 gap-2 mt-3">

                <div
                    class="bg-emerald-50 border border-emerald-100 rounded-xl p-3 text-center">

                    <p class="text-[9px] uppercase font-extrabold text-gray-400">
                        Hadir
                    </p>

                    <p
                        id="summaryHadir"
                        class="text-lg font-extrabold text-medium-green mt-1">
                        0
                    </p>

                    <p class="text-[9px] text-gray-400">
                        siswa
                    </p>

                </div>


                <div
                    class="bg-rose-50 border border-rose-100 rounded-xl p-3 text-center">

                    <p class="text-[9px] uppercase font-extrabold text-gray-400">
                        Tidak Hadir
                    </p>

                    <p
                        id="summaryTidakHadir"
                        class="text-lg font-extrabold text-rose-500 mt-1">
                        0
                    </p>

                    <p class="text-[9px] text-gray-400">
                        siswa
                    </p>

                </div>

            </div>


            <!-- DETAIL SISWA TIDAK HADIR -->

            <div
                id="summaryTidakHadirBox"
                class="hidden mt-3 bg-rose-50/60 border border-rose-100 rounded-xl p-3">

                <p class="text-[10px] font-extrabold text-dark-green mb-2">
                    Siswa Tidak Hadir
                </p>

                <div
                    id="summaryTidakHadirList"
                    class="space-y-1.5">
                </div>

            </div>


            <!-- CATATAN -->

            <div
                class="mt-4 bg-amber-50 border border-amber-100 rounded-xl p-3 flex items-start gap-2.5">

                <i class="fa-solid fa-circle-info text-amber-500 text-xs mt-0.5"></i>

                <p class="text-[10px] text-amber-800 leading-relaxed">
                    Pastikan semua data sudah benar. Setelah jurnal dikirim,
                    data akan diteruskan untuk proses validasi.
                </p>

            </div>


            <!-- BUTTON -->

            <div class="grid grid-cols-2 gap-2.5 mt-5">

                <button
                    type="button"
                    onclick="closeSummary()"
                    class="px-4 py-3 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-600 text-xs font-bold transition">

                    Kembali Edit

                </button>


                <button
                    type="button"
                    id="summarySubmitBtn"
                    onclick="submitFromSummary()"
                    class="px-4 py-3 rounded-xl bg-dark-green hover:bg-medium-green text-white text-xs font-bold transition">

                    Ya, Kirim Jurnal

                </button>

            </div>

        </div>

    </div>


    <!-- =========================================================
         MODAL KONFIRMASI DRAF
    ========================================================== -->

    <div
        id="confirmModal"
        class="fixed inset-0 bg-dark-green/60 backdrop-blur-sm z-[100] hidden items-center justify-center p-4">

        <div
            class="bg-white w-full max-w-sm rounded-2xl shadow-2xl p-5">

            <div class="flex justify-center mb-4">

                <div
                    class="w-14 h-14 rounded-full bg-emerald-50 text-medium-green flex items-center justify-center">

                    <i class="fa-solid fa-circle-question text-xl"></i>

                </div>

            </div>


            <div class="text-center">

                <h2
                    id="confirmTitle"
                    class="text-base font-extrabold text-dark-green">

                    Simpan Jurnal?

                </h2>

                <p
                    id="confirmText"
                    class="text-xs text-gray-500 leading-relaxed mt-2">

                    Pastikan data jurnal yang kamu isi sudah benar sebelum disimpan.

                </p>

            </div>


            <div class="grid grid-cols-2 gap-2.5 mt-5">

                <button
                    type="button"
                    onclick="closeConfirm()"
                    class="px-4 py-3 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-600 text-xs font-bold transition">

                    Periksa Lagi

                </button>


                <button
                    type="button"
                    id="confirmSubmitBtn"
                    onclick="submitConfirmed()"
                    class="px-4 py-3 rounded-xl bg-dark-green hover:bg-medium-green text-white text-xs font-bold transition">

                    Ya, Simpan

                </button>

            </div>

        </div>

    </div>


    <!-- =========================================================
        MODAL SUKSES
    ========================================================== -->

    <div
        id="successModal"
        class="fixed inset-0 bg-dark-green/60 backdrop-blur-sm z-[110] hidden items-center justify-center p-4">

        <div
            class="bg-white w-full max-w-sm rounded-2xl shadow-2xl p-5 text-center">

            <div class="flex justify-center mb-4">

                <div
                    class="w-16 h-16 rounded-full bg-emerald-50 text-medium-green flex items-center justify-center">

                    <i class="fa-solid fa-check text-2xl"></i>

                </div>

            </div>


            <h2 class="text-base font-extrabold text-dark-green">

                {{ session('success_title', 'Berhasil!') }}

            </h2>


            <p class="text-xs text-gray-500 leading-relaxed mt-2">

                {{ session('success', 'Data jurnal berhasil disimpan.') }}

            </p>


            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 mt-5">

                <a
                    href="{{ url('/guru/riwayat') }}"
                    class="px-4 py-3 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-medium-green text-xs font-bold transition">

                    <i class="fa-regular fa-clock mr-1"></i>

                    Lihat Riwayat

                </a>




                <a
                    href="{{ url('/guru/dashboard') }}"
                    class="px-4 py-3 rounded-xl bg-dark-green hover:bg-medium-green text-white text-xs font-bold transition">

                    <i class="fa-solid fa-house mr-1"></i>

                    Dashboard

                </a>

            </div>

        </div>

    </div>


    <!-- =========================================================
        MODAL ERROR
    ========================================================== -->

    @if ($errors->any())
    <div
        id="errorModal"
        class="fixed inset-0 bg-dark-green/60 backdrop-blur-sm z-[120] flex items-center justify-center p-4">

        <div
            class="bg-white w-full max-w-sm rounded-2xl shadow-2xl p-5 text-center">

            <div class="flex justify-center mb-4">
                <div
                    class="w-16 h-16 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center">

                    <i class="fa-solid fa-xmark text-2xl"></i>

                </div>
            </div>

            <h2 class="text-base font-extrabold text-dark-green">
                Data Belum Berhasil Disimpan
            </h2>

            <p class="text-xs text-gray-500 leading-relaxed mt-2">
                Periksa kembali data yang kamu isi.
            </p>

            <div
                class="mt-4 bg-rose-50 border border-rose-100 rounded-xl p-3 text-left">

                <ul class="space-y-1 text-[10px] text-rose-700 font-medium">

                    @foreach ($errors->all() as $error)
                    <li class="flex gap-2">
                        <i class="fa-solid fa-circle-exclamation mt-0.5"></i>
                        <span>{{ $error }}</span>
                    </li>
                    @endforeach

                </ul>

            </div>

            <button
                type="button"
                onclick="closeErrorModal()"
                class="w-full mt-5 px-4 py-3 rounded-xl bg-dark-green hover:bg-medium-green text-white text-xs font-bold transition">

                Periksa Kembali

            </button>

        </div>

    </div>
    @endif


    <!-- =========================================================
        MODAL KONFIRMASI BATAL
    ========================================================== -->

    <div
        id="cancelModal"
        class="fixed inset-0 bg-dark-green/60 backdrop-blur-sm z-[100] hidden items-center justify-center p-4">

        <div
            class="bg-white w-full max-w-sm rounded-2xl shadow-2xl p-5 text-center">

            <div class="flex justify-center mb-4">

                <div
                    class="w-14 h-14 rounded-full bg-amber-50 text-amber-500 flex items-center justify-center">

                    <i class="fa-solid fa-triangle-exclamation text-xl"></i>

                </div>

            </div>


            <h2 class="text-base font-extrabold text-dark-green">
                Batalkan Pengisian?
            </h2>


            <p class="text-xs text-gray-500 leading-relaxed mt-2">

                Data yang sudah kamu isi belum disimpan.
                Yakin ingin meninggalkan halaman ini?

            </p>


            <div class="grid grid-cols-2 gap-2.5 mt-5">

                <button
                    type="button"
                    onclick="closeCancelConfirm()"
                    class="px-4 py-3 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-600 text-xs font-bold transition">

                    Tetap di Sini

                </button>


                <a
                    href="{{ url('/guru/dashboard') }}"
                    class="px-4 py-3 rounded-xl bg-dark-green hover:bg-medium-green text-white text-xs font-bold transition flex items-center justify-center">

                    Ya, Batalkan

                </a>

            </div>

        </div>

    </div>


    <!-- =========================================================
         JAVASCRIPT
    ========================================================== -->
    <script>
        /* =====================================================
           MOBILE SIDEBAR
        ====================================================== */

        const hamburgerBtn =
            document.getElementById('hamburgerBtn');

        const sidebar =
            document.getElementById('sidebar');

        const sidebarOverlay =
            document.getElementById('sidebarOverlay');


        function openSidebar() {

            if (!sidebar || !sidebarOverlay) return;

            sidebar.classList.remove('-translate-x-full');

            sidebarOverlay.classList.remove('hidden');

            document.body.classList.add('overflow-hidden');

        }


        function closeSidebar() {

            if (!sidebar || !sidebarOverlay) return;

            sidebar.classList.add('-translate-x-full');

            sidebarOverlay.classList.add('hidden');

            document.body.classList.remove('overflow-hidden');

        }


        if (hamburgerBtn) {

            hamburgerBtn.addEventListener(
                'click',
                openSidebar
            );

        }


        if (sidebarOverlay) {

            sidebarOverlay.addEventListener(
                'click',
                closeSidebar
            );

        }


        if (sidebar) {

            sidebar.querySelectorAll('a').forEach(link => {

                link.addEventListener('click', () => {

                    if (window.innerWidth < 768) {

                        closeSidebar();

                    }

                });

            });

        }


        window.addEventListener('resize', () => {

            if (window.innerWidth >= 768) {

                if (sidebarOverlay) {
                    sidebarOverlay.classList.add('hidden');
                }

                document.body.classList.remove('overflow-hidden');

            }

        });


        /* =====================================================
           TANGGAL & JAM OTOMATIS
        ====================================================== */

        // function updateDateTime() {

        //     const now = new Date();

        //     const tanggalElement =
        //         document.getElementById('tanggalSekarang');

        //     const jamElement =
        //         document.getElementById('jamSekarang');


        //     const tanggal =
        //         new Intl.DateTimeFormat(
        //             'id-ID', {
        //                 weekday: 'long',
        //                 day: 'numeric',
        //                 month: 'long',
        //                 year: 'numeric'
        //             }
        //         ).format(now);


        //     const jam =
        //         new Intl.DateTimeFormat(
        //             'id-ID', {
        //                 hour: '2-digit',
        //                 minute: '2-digit',
        //                 second: '2-digit',
        //                 hour12: false
        //             }
        //         ).format(now);


        //     if (tanggalElement) {

        //         tanggalElement.innerText =
        //             tanggal;

        //     }


        //     if (jamElement) {

        //         jamElement.innerText =
        //             'Waktu pengisian: ' + jam + ' WIB';

        //     }

        // }


        const container = document.getElementById('dateTimeContainer');
        const laravelTimeStr = container ? container.getAttribute('data-laravel-now') : null;

        let currentTime = laravelTimeStr ? new Date(laravelTimeStr) : new Date();

        function updateDateTime() {
            const tanggalElement = document.getElementById('tanggalSekarang');
            const jamElement = document.getElementById('jamSekarang');

            const tanggal = new Intl.DateTimeFormat(
                'id-ID', {
                    weekday: 'long',
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                }
            ).format(currentTime);

            const jam = new Intl.DateTimeFormat(
                'id-ID', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: false
                }
            ).format(currentTime);

            if (tanggalElement) {
                tanggalElement.innerText = tanggal;
            }

            if (jamElement) {
                jamElement.innerText = 'Waktu pengisian: ' + jam + ' WIB';
            }

            currentTime.setSeconds(currentTime.getSeconds() + 1);
        }



        updateDateTime();

        setInterval(
            updateDateTime,
            1000
        );


        /* =====================================================
           STATUS KEHADIRAN GURU
        ====================================================== */

        function handleStatusChange() {

            const status =
                document.getElementById('statusKehadiran')?.value;


            const sectionHadir =
                document.getElementById('sectionHadir');

            const sectionTugas =
                document.getElementById('sectionTugas');

            const sectionTanpaTugas =
                document.getElementById('sectionTanpaTugas');

            const sectionAbsensiSiswa =
                document.getElementById('sectionAbsensiSiswa');

            const textBtnSimpan =
                document.getElementById('textBtnSimpan');


            if (!sectionHadir) return;


            sectionHadir.classList.add('hidden');

            sectionTugas.classList.add('hidden');

            sectionTanpaTugas.classList.add('hidden');

            sectionAbsensiSiswa.classList.add('hidden');


            if (status === 'hadir') {

                sectionHadir.classList.remove('hidden');

                sectionAbsensiSiswa.classList.remove('hidden');

                textBtnSimpan.innerText =
                    'Kirim Jurnal';

            } else if (status === 'tidak_hadir_tugas') {

                sectionTugas.classList.remove('hidden');

                textBtnSimpan.innerText =
                    'Kirim Tugas';

            } else if (status === 'tidak_hadir_tanpa_tugas') {

                sectionTanpaTugas.classList.remove('hidden');

                textBtnSimpan.innerText =
                    'Kirim Laporan';

            }

        }


        /* =====================================================
           ABSENSI SISWA
        ====================================================== */

        const searchSiswa =
            document.getElementById('searchSiswa');

        const filterAbsensi =
            document.getElementById('filterAbsensi');

        const studentItems =
            document.querySelectorAll('.student-item');


        /* =====================================================
           PILIH STATUS SISWA
        ====================================================== */

        document
            .querySelectorAll('.status-btn')
            .forEach(button => {

                button.addEventListener(
                    'click',
                    function() {

                        const item =
                            this.closest('.student-item');

                        if (!item) return;


                        const status =
                            this.dataset.status;


                        item.dataset.status =
                            status;


                        const input =
                            item.querySelector('.status-input');


                        if (input) {

                            input.value =
                                status;

                        }


                        item
                            .querySelectorAll('.status-btn')
                            .forEach(btn => {

                                btn.classList.remove(
                                    'active-status'
                                );

                            });


                        this.classList.add(
                            'active-status'
                        );


                        if (status === 'hadir') {

                            item.classList.remove(
                                'border-rose-200',
                                'bg-rose-50/40'
                            );

                        } else {

                            item.classList.add(
                                'border-rose-200',
                                'bg-rose-50/40'
                            );

                        }


                        filterDaftarSiswa();

                    }
                );

            });


        /* =====================================================
           FILTER SISWA
        ====================================================== */

        function filterDaftarSiswa() {

            const keyword =
                (searchSiswa?.value || '')
                .toLowerCase()
                .trim();


            const filter =
                filterAbsensi?.value ||
                'semua';


            studentItems.forEach(item => {

                const nama =
                    (item.dataset.nama || '')
                    .toLowerCase();


                const nisn =
                    (item.dataset.nisn || '')
                    .toLowerCase();


                const noAbsen =
                    (item.dataset.noAbsen || '')
                    .toLowerCase();


                const status =
                    item.dataset.status ||
                    'hadir';


                const cocokPencarian =
                    nama.includes(keyword) ||
                    nisn.includes(keyword) ||
                    noAbsen.includes(keyword);


                const cocokFilter =
                    filter === 'semua' ||
                    (
                        filter === 'tidak_hadir' &&
                        status !== 'hadir'
                    );


                if (
                    cocokPencarian &&
                    cocokFilter
                ) {

                    item.classList.remove('hidden');

                } else {

                    item.classList.add('hidden');

                }

            });


            updateJumlahTidakHadir();

        }


        // function updateJumlahTidakHadir() {

        //     let jumlah =
        //         0;


        //     document
        //         .querySelectorAll('.status-siswa')
        //         .forEach(select => {

        //             if (select.value !== 'hadir') {

        //                 jumlah++;

        //             }

        //         });


        //     const counter =
        //         document.getElementById('jumlahTidakHadir');


        //     if (counter) {

        //         counter.innerText =
        //             jumlah;

        //     }

        // }
        if (searchSiswa) {

            searchSiswa.addEventListener(
                'input',
                filterDaftarSiswa
            );

        }


        // if (filterAbsensi) {

        //     filterAbsensi.addEventListener(
        //         'change',
        //         filterDaftarSiswa
        //     );

        // }


        // document
        //     .querySelectorAll('.status-siswa')
        //     .forEach(select => {

        //         select.addEventListener(
        //             'change',
        //             function() {

        //                 const item =
        //                     this.closest('.student-item');

        //                 if (!item) return;


        //                 /* Tandai siswa yang tidak hadir */

        //                 if (this.value === 'hadir') {

        //                     item.classList.remove(
        //                         'border-rose-200',
        //                         'bg-rose-50/40'
        //                     );

        //                 } else {

        //                     item.classList.add(
        //                         'border-rose-200',
        //                         'bg-rose-50/40'
        //                     );

        //                 }


        //                 /* Terapkan filter kembali */

        //                 filterDaftarSiswa();

        //             }
        //         );

        //     });


        updateJumlahTidakHadir();
        /* =====================================================
           JUMLAH TIDAK HADIR
        ====================================================== */

        function updateJumlahTidakHadir() {

            let jumlah =
                0;


            studentItems.forEach(item => {

                const status =
                    item.dataset.status ||
                    'hadir';


                if (status !== 'hadir') {

                    jumlah++;

                }

            });


            const counter =
                document.getElementById(
                    'jumlahTidakHadir'
                );


            if (counter) {

                counter.innerText =
                    jumlah;

            }

        }


        if (filterAbsensi) {

            filterAbsensi.addEventListener(
                'change',
                filterDaftarSiswa
            );

        }


        updateJumlahTidakHadir();


        /* =====================================================
           RINGKASAN JURNAL
        ====================================================== */

        function openSummary() {

            const modal =
                document.getElementById('summaryModal');

            if (!modal) return;


            /* TANGGAL & JAM */

            const tanggal =
                document.getElementById('tanggalSekarang')?.innerText || '-';

            const jam =
                document.getElementById('jamSekarang')?.innerText || '-';


            document.getElementById(
                    'summaryTanggal'
                ).innerText =
                tanggal;


            document.getElementById(
                    'summaryJam'
                ).innerText =
                jam.replace('Waktu pengisian: ', '');


            /* STATUS GURU */

            const statusSelect =
                document.getElementById('statusKehadiran');


            const statusText =
                statusSelect?.options[
                    statusSelect.selectedIndex
                ]?.text || '-';


            document.getElementById(
                    'summaryStatusGuru'
                ).innerText =
                statusText;


            /* MATERI */

            const materi =
                document.getElementById('materi')?.value.trim();


            document.getElementById(
                    'summaryMateri'
                ).innerText =
                materi || 'Belum diisi';


            /* KETERANGAN */

            const keterangan =
                document.getElementById('keterangan')?.value.trim();


            document.getElementById(
                    'summaryKeterangan'
                ).innerText =
                keterangan || '-';

            /* =================================================
               HITUNG ABSENSI
            ================================================== */

            let jumlahHadir =
                0;

            let jumlahTidakHadir =
                0;


            const tidakHadirList =
                document.getElementById(
                    'summaryTidakHadirList'
                );


            const tidakHadirBox =
                document.getElementById(
                    'summaryTidakHadirBox'
                );


            tidakHadirList.innerHTML =
                '';


            studentItems.forEach(item => {

                const status =
                    item.dataset.status ||
                    'hadir';


                const nama =
                    item.dataset.nama ||
                    '-';


                const nomor =
                    item.dataset.noAbsen ||
                    '-';


                if (status === 'hadir') {

                    jumlahHadir++;

                } else {

                    jumlahTidakHadir++;


                    const statusLabel = {

                        sakit: 'Sakit',

                        izin: 'Izin',

                        alpha: 'Alpha',

                        dispen: 'Dispen'

                    } [status] || status;


                    const row =
                        document.createElement('div');


                    row.className =
                        'flex items-center justify-between gap-2 bg-white rounded-lg px-2.5 py-2';


                    row.innerHTML = `

                        <div class="min-w-0 flex items-center gap-2">

                            <span class="text-[9px] font-bold text-gray-400 shrink-0">
                                ${nomor}
                            </span>

                            <span class="text-[10px] font-bold text-dark-green truncate">
                                ${escapeHtml(nama)}
                            </span>

                        </div>

                        <span class="text-[9px] font-extrabold text-rose-500 shrink-0">
                            ${statusLabel}
                        </span>

                    `;


                    tidakHadirList.appendChild(
                        row
                    );

                }

            });


            document.getElementById(
                    'summaryHadir'
                ).innerText =
                jumlahHadir;


            document.getElementById(
                    'summaryTidakHadir'
                ).innerText =
                jumlahTidakHadir;


            if (jumlahTidakHadir > 0) {

                tidakHadirBox.classList.remove(
                    'hidden'
                );

            } else {

                tidakHadirBox.classList.add(
                    'hidden'
                );

            }


            modal.classList.remove(
                'hidden'
            );

            modal.classList.add(
                'flex'
            );

        }


        function closeSummary() {

            const modal =
                document.getElementById('summaryModal');


            if (!modal) return;


            modal.classList.add(
                'hidden'
            );

            modal.classList.remove(
                'flex'
            );

        }


        /* =====================================================
           AMANKAN NAMA SISWA
        ====================================================== */

        function escapeHtml(text) {

            const div =
                document.createElement('div');

            div.textContent =
                text;

            return div.innerHTML;

        }


        /* =====================================================
           KIRIM DARI RINGKASAN
        ====================================================== */

        function submitFromSummary() {

            const form =
                document.getElementById('jurnalForm');


            const button =
                document.getElementById('summarySubmitBtn');


            if (!form) return;


            let input =
                form.querySelector(
                    'input[name="action_type"]'
                );


            if (!input) {

                input =
                    document.createElement('input');

                input.type =
                    'hidden';

                input.name =
                    'action_type';

                form.appendChild(input);

            }


            input.value =
                'submit';


            button.disabled =
                true;


            button.innerHTML =
                '<i class="fa-solid fa-spinner fa-spin mr-1"></i> Mengirim...';


            form.submit();

        }


        /* Klik luar summary */

        document
            .getElementById('summaryModal')
            ?.addEventListener(
                'click',
                function(event) {

                    if (event.target === this) {

                        closeSummary();

                    }

                }
            );


        /* =====================================================
           MODAL DRAF
        ====================================================== */

        let confirmAction =
            'draft';


        function openConfirm(action) {

            confirmAction =
                action;


            const modal =
                document.getElementById(
                    'confirmModal'
                );


            const title =
                document.getElementById(
                    'confirmTitle'
                );


            const text =
                document.getElementById(
                    'confirmText'
                );


            const button =
                document.getElementById(
                    'confirmSubmitBtn'
                );


            if (action === 'draft') {

                title.innerText =
                    'Simpan Jurnal sebagai Draf?';


                text.innerText =
                    'Data akan disimpan sebagai draf dan belum dikirim untuk validasi.';


                button.innerText =
                    'Ya, Simpan Draf';

            }


            modal.classList.remove(
                'hidden'
            );

            modal.classList.add(
                'flex'
            );

        }


        function closeConfirm() {

            const modal =
                document.getElementById(
                    'confirmModal'
                );


            modal.classList.add(
                'hidden'
            );

            modal.classList.remove(
                'flex'
            );

        }


        function submitConfirmed() {

            const form =
                document.getElementById(
                    'jurnalForm'
                );


            const button =
                document.getElementById(
                    'confirmSubmitBtn'
                );


            let input =
                form.querySelector(
                    'input[name="action_type"]'
                );


            if (!input) {

                input =
                    document.createElement('input');

                input.type =
                    'hidden';

                input.name =
                    'action_type';

                form.appendChild(input);

            }


            input.value =
                confirmAction;


            button.disabled =
                true;


            button.innerHTML =
                '<i class="fa-solid fa-spinner fa-spin mr-1"></i> Menyimpan...';


            form.submit();

        }


        /* =====================================================
           ESC UNTUK MODAL
        ====================================================== */

        document.addEventListener(
            'keydown',
            function(event) {

                if (event.key !== 'Escape') return;


                closeSummary();

                closeConfirm();

                closeCancelConfirm();

            }
        );


        /* =====================================================
           SCROLL HELPER
        ====================================================== */

        const scrollIndicator =
            document.getElementById(
                'scrollIndicator'
            );


        function updateScrollIndicator() {

            if (!scrollIndicator) return;


            const scrollTop =
                window.scrollY ||
                window.pageYOffset;


            const documentHeight =
                document.documentElement.scrollHeight;


            const windowHeight =
                window.innerHeight;


            const maxScroll =
                documentHeight -
                windowHeight;


            if (maxScroll <= 0) {

                scrollIndicator.style.top =
                    '0px';

                return;

            }


            const trackHeight =
                112;


            const indicatorHeight =
                32;


            const progress =
                Math.min(
                    1,
                    Math.max(
                        0,
                        scrollTop / maxScroll
                    )
                );


            scrollIndicator.style.top =
                `${progress * (trackHeight - indicatorHeight)}px`;

        }


        window.addEventListener(
            'scroll',
            updateScrollIndicator, {
                passive: true
            }
        );


        window.addEventListener(
            'resize',
            updateScrollIndicator
        );


        function scrollToTop() {

            window.scrollTo({

                top: 0,

                behavior: 'smooth'

            });

        }


        function scrollToBottom() {

            window.scrollTo({

                top: document.documentElement.scrollHeight,

                behavior: 'smooth'

            });

        }


        updateScrollIndicator();


        /* =====================================================
           SUCCESS & ERROR
        ====================================================== */

        function closeErrorModal() {

            const modal =
                document.getElementById(
                    'errorModal'
                );


            if (!modal) return;


            modal.classList.add(
                'hidden'
            );

        }


        @if(session('success'))

        document.addEventListener(
            'DOMContentLoaded',
            function() {

                const modal =
                    document.getElementById(
                        'successModal'
                    );


                if (!modal) return;


                modal.classList.remove(
                    'hidden'
                );

                modal.classList.add(
                    'flex'
                );

            }
        );

        @endif


        /* =====================================================
           BATAL
        ====================================================== */

        function openCancelConfirm() {

            const modal =
                document.getElementById(
                    'cancelModal'
                );


            modal.classList.remove(
                'hidden'
            );

            modal.classList.add(
                'flex'
            );

        }


        function closeCancelConfirm() {

            const modal =
                document.getElementById(
                    'cancelModal'
                );


            modal.classList.add(
                'hidden'
            );

            modal.classList.remove(
                'flex'
            );

        }


        /* =====================================================
           INIT
        ====================================================== */

        handleStatusChange();

        updateJumlahTidakHadir();

        // function closeErrorModal() {

        //     const modal = document.getElementById('errorModal');

        //     if (!modal) return;

        //     modal.classList.add('hidden');

        // }


        /* SUCCESS MODAL */

        // if (session('success'))
        //     document.addEventListener('DOMContentLoaded', function() {

        //         const modal =
        //             document.getElementById('successModal');

        //         if (!modal) return;

        //         modal.classList.remove('hidden');
        //         modal.classList.add('flex');

        //     });
        // endif

        /* BATAL MODAL */
        // function openCancelConfirm() {

        //     const modal = document.getElementById('cancelModal');

        //     modal.classList.remove('hidden');
        //     modal.classList.add('flex');

        // }

        // function closeCancelConfirm() {

        //     const modal = document.getElementById('cancelModal');

        //     modal.classList.add('hidden');
        //     modal.classList.remove('flex');

        // }
    </script>

</body>

</html>