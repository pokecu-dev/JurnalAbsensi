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

        /* Scroll indicator */
        #scrollIndicator {
            transition: top 0.15s ease-out;
        }

        /* Hilangkan scrollbar horizontal */
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body class="bg-bg-cream text-dark-green font-sans min-h-screen overflow-x-hidden">

    <!-- =========================================================
         MOBILE HEADER
    ========================================================== -->
    <div
        class="md:hidden bg-dark-green text-white px-4 py-3.5 flex items-center justify-between sticky top-0 z-40 shadow-sm">

        <span class="font-bold text-sm tracking-wide">
            Jurnal Absensi
        </span>

        <button id="hamburgerBtn"
            class="w-9 h-9 flex items-center justify-center rounded-lg hover:bg-white/10 transition focus:outline-none">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>


    <!-- =========================================================
         SIDEBAR OVERLAY
    ========================================================== -->
    <div id="sidebarOverlay"
        class="fixed inset-0 bg-black/50 z-40 hidden md:hidden">
    </div>


    <!-- =========================================================
         SIDEBAR
    ========================================================== -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 w-60 bg-dark-green text-white p-6 flex flex-col justify-between z-50 -translate-x-full md:translate-x-0 transition-transform duration-300">

        <div>

            <!-- LOGO -->
            <div class="flex flex-col items-center gap-2 mb-10 text-center">
                <img src="{{ asset('image/logo.png') }}"
                    alt="Logo"
                    class="w-16 h-auto">

                <span class="font-bold text-sm tracking-wide">
                    Jurnal Absensi
                </span>
            </div>


            <!-- MENU -->
            <nav class="flex flex-col gap-2 font-semibold text-xs">

                <a href="{{ url('/guru/dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition">
                    <i class="fa-solid fa-house w-4"></i>
                    Dashboard
                </a>

                <a href="{{ url('/guru/jurnal') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-white/10 text-mint-green rounded-xl transition">
                    <i class="fa-solid fa-book w-4"></i>
                    Jurnal
                </a>

                <a href="{{ url('/guru/riwayat') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition">
                    <i class="fa-regular fa-calendar-days w-4"></i>
                    Riwayat
                </a>

            </nav>
        </div>


        <!-- BOTTOM MENU -->
        <div class="space-y-2 pt-4 border-t border-white/10">

            <button
                class="w-full flex items-center gap-3 px-4 py-3 text-xs font-semibold bg-white/5 hover:bg-white/15 rounded-xl transition text-left">
                <i class="fa-regular fa-user w-4"></i>
                Profile
            </button>

            <button
                class="w-full flex items-center gap-3 px-4 py-3 text-xs font-semibold bg-white/5 hover:bg-white/15 rounded-xl transition text-left text-red-300">
                <i class="fa-solid fa-arrow-right-from-bracket w-4"></i>
                Logout
            </button>

        </div>

    </aside>


    <!-- =========================================================
         MAIN CONTENT
    ========================================================== -->
    <main
        class="flex-1 p-4 pb-24 md:p-8 md:ml-60 max-w-full md:max-w-6xl mx-auto min-w-0">

        <!-- =====================================================
             HEADER
        ====================================================== -->
        <header class="mb-4 md:mb-6">

            <h1 class="text-lg sm:text-xl md:text-2xl font-extrabold text-dark-green leading-tight">
                Isi Jurnal Mengajar
            </h1>

            <p class="text-[11px] sm:text-xs text-medium-green font-semibold mt-1">
                Lengkapi jurnal sesi mengajar
            </p>

        </header>


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

                        <p class="text-[9px] uppercase tracking-wider text-medium-green font-extrabold">
                            Sesi Mengajar
                        </p>

                        <p class="text-xs sm:text-sm font-extrabold text-dark-green mt-0.5">
                            {{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}
                        </p>

                        <p class="text-[10px] sm:text-xs text-gray-500 font-semibold mt-0.5">
                            Waktu pengisian: {{ now()->format('H.i') }} WIB
                        </p>

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

                    <label
                        class="block text-xs font-bold text-dark-green mb-1.5">

                        Instruksi / Deskripsi Tugas
                        <span class="text-rose-500">*</span>

                    </label>

                    <textarea
                        name="instruksi_tugas"
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

                    <label
                        class="block text-xs font-bold text-dark-green mb-1.5">

                        Alasan / Keterangan

                    </label>

                    <textarea
                        name="alasan_kosong"
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

                <!-- HEADER -->
                <div>

                    <h3 class="text-sm font-extrabold text-dark-green flex items-center gap-2">
                        <i class="fa-solid fa-users text-medium-green"></i>
                        Absensi Siswa
                    </h3>

                    <p class="text-[10px] text-gray-400 mt-1">
                        Tandai status kehadiran setiap siswa pada sesi pembelajaran ini.
                    </p>

                </div>


                <!-- =================================================
                    SEARCH & FILTER
                ================================================== -->
                <div class="bg-amber-50/60 p-3 sm:p-4 rounded-xl border border-amber-100">

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


                <!-- =================================================
                    DAFTAR SISWA
                ================================================== -->
                <div
                    id="studentList"
                    class="space-y-2 max-h-[60vh] overflow-y-auto pr-1">

                   @php
                    $dummySiswas = [
                        ['id' => 1, 'name' => 'MARVEL MAULANA SAPUTRA'],
                        ['id' => 2, 'name' => 'MARWA RIZQIANI PUTRI'],
                        ['id' => 3, 'name' => 'MAULANA QUBRO ALGHOZALI'],
                        ['id' => 4, 'name' => 'MOCHAMAD RAFI NUR ALFAN'],
                        ['id' => 5, 'name' => 'MOCHAMMAD WILDAN SEPTIANO PRASETYO'],
                        ['id' => 6, 'name' => 'MUHAMAD BAGUS PRASETIYO'],
                        ['id' => 7, 'name' => 'MUHAMMAD ADIP SOFIYULLOH'],
                        ['id' => 8, 'name' => 'MUHAMMAD ALBYAN AULIA'],
                        ['id' => 9, 'name' => 'MUHAMMAD DUDE FAHREZI'],
                        ['id' => 10, 'name' => 'MUHAMMAD FUAD HASAN'],
                        ['id' => 11, 'name' => 'MUHAMMAD ILHAM NASHRULLAH'],
                        ['id' => 12, 'name' => 'MUHAMMAD RAFA AZRYELLO FARISHUTA'],
                        ['id' => 13, 'name' => 'MUHAMMAD RAFFI ARKHAN'],
                        ['id' => 14, 'name' => 'MUHAMMAD REISYA APRILLIAWAN'],
                        ['id' => 15, 'name' => 'MUHAMMAD SAIFUDDIN'],
                        ['id' => 16, 'name' => 'NANDA AURELIA KHOIRUNNISAA'],
                        ['id' => 17, 'name' => 'NASWA PUTRI BINTANG FEBRIANA'],
                        ['id' => 18, 'name' => 'NAZWA AFIFAH ANWAR'],
                        ['id' => 19, 'name' => 'NITA DWI LARASATI'],
                        ['id' => 20, 'name' => 'PRATAMA REZKIANSYAH WIDIANTO'],
                        ['id' => 21, 'name' => 'PUTRI LIANASARI'],
                        ['id' => 22, 'name' => 'PUTRI ZAHWA RUSDIANA'],
                        ['id' => 23, 'name' => 'RAGA SYAHPUTRA ARIFIN'],
                        ['id' => 24, 'name' => 'RANIA NURILLAH'],
                        ['id' => 25, 'name' => 'RIRIN SRI WAHYUNI'],
                        ['id' => 26, 'name' => 'SALMA FIKRIATUL AZIZAH'],
                        ['id' => 27, 'name' => 'SEREN KHANZAA AZYLA'],
                        ['id' => 28, 'name' => 'SEVIA DWI NOVITASARI'],
                        ['id' => 29, 'name' => 'SHALSABILLA PUTRI NURAINI'],
                        ['id' => 30, 'name' => 'SKANDINAVIA'],
                        ['id' => 31, 'name' => 'SYAFIQI ERDANSYAH RAMADAN'],
                        ['id' => 32, 'name' => 'VANESSA FLORIS'],
                        ['id' => 33, 'name' => 'VANISSA DEWI PUTRI RIANTO'],
                        ['id' => 34, 'name' => 'VARADITA APRILIANDINI'],
                        ['id' => 35, 'name' => 'WILDAN RAMADHAN ZULKARNAEN'],
                        ['id' => 36, 'name' => 'ZHEFITRA ANANDA WIJAYA'],
                    ];
                @endphp
                @foreach($dummySiswas as $index => $siswa)

                    <div
                        class="student-item p-3 rounded-xl border border-gray-100 bg-gray-50 flex items-center justify-between gap-3 transition"
                        data-nama="{{ strtolower($siswa['name']) }}"
                        data-nisn=""
                        data-no-absen="{{ $index + 1 }}">

                        <!-- IDENTITAS SISWA -->
                        <div class="flex items-center gap-3 min-w-0">

                            <div
                                class="w-8 h-8 rounded-lg bg-emerald-100 text-medium-green flex items-center justify-center text-xs font-extrabold shrink-0">
                                {{ $index + 1 }}
                            </div>

                            <div class="min-w-0">

                                <p class="text-xs font-extrabold text-dark-green truncate">
                                    {{ $siswa['name'] }}
                                </p>

                                <p class="text-[9px] text-gray-400 mt-0.5">
                                    Siswa kelas ini
                                </p>

                            </div>

                        </div>

                        <!-- STATUS -->
                        <div class="shrink-0">

                            <select
                                name="absensi[{{ $siswa['id'] }}]"
                                class="status-siswa bg-white border border-gray-200 rounded-lg px-2.5 py-2 text-[10px] font-bold text-dark-green outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/30 cursor-pointer">

                                <option value="hadir">Hadir</option>
                                <option value="sakit">Sakit</option>
                                <option value="izin">Izin</option>
                                <option value="alpha">Alpha</option>
                                <option value="dispen">Dispen</option>

                            </select>

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
                    onclick="openConfirm('submit')"
                    id="btnSubmit"
                    class="w-full sm:w-auto bg-dark-green hover:bg-medium-green text-white font-bold text-xs px-5 py-3 rounded-xl transition shadow-sm flex items-center justify-center gap-2 order-1 sm:order-3">

                    <i class="fa-regular fa-paper-plane"></i>

                    <span id="textBtnSimpan">
                        Kirim Jurnal
                    </span>

                </button>

            </div>

        </form>

    </main>


    <!-- =========================================================
         SCROLL INDICATOR
    ========================================================== -->
    <div
        id="scrollHelper"
        class="fixed right-2 sm:right-3 top-1/2 -translate-y-1/2 z-30 flex flex-col items-center gap-1">

        <button
            type="button"
            onclick="scrollToTop()"
            class="w-7 h-7 rounded-full bg-white/90 border border-emerald-100 shadow-sm text-medium-green hover:bg-mint-green transition flex items-center justify-center"
            title="Kembali ke atas">

            <i class="fa-solid fa-chevron-up text-[9px]"></i>

        </button>


        <div
            class="relative w-1 h-24 bg-dark-green/10 rounded-full">

            <div
                id="scrollIndicator"
                class="absolute left-0 w-1 h-7 bg-medium-green rounded-full"
                style="top: 0;">
            </div>

        </div>


        <button
            type="button"
            onclick="scrollToBottom()"
            class="w-7 h-7 rounded-full bg-white/90 border border-emerald-100 shadow-sm text-medium-green hover:bg-mint-green transition flex items-center justify-center"
            title="Ke bagian bawah">

            <i class="fa-solid fa-chevron-down text-[9px]"></i>

        </button>

    </div>


    <!-- =========================================================
         MODAL KONFIRMASI
    ========================================================== -->
    <div
        id="confirmModal"
        class="fixed inset-0 bg-dark-green/60 backdrop-blur-sm z-[100] hidden items-center justify-center p-4">

        <div
            id="confirmBox"
            class="bg-white w-full max-w-sm rounded-2xl shadow-2xl p-5 transform scale-95 transition">

            <!-- ICON -->
            <div class="flex justify-center mb-4">

                <div
                    id="confirmIcon"
                    class="w-14 h-14 rounded-full bg-emerald-50 text-medium-green flex items-center justify-center">

                    <i class="fa-solid fa-circle-question text-xl"></i>

                </div>

            </div>


            <!-- TEXT -->
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


            <!-- BUTTON -->
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

            <!-- ICON -->
            <div class="flex justify-center mb-4">
                <div
                    class="w-16 h-16 rounded-full bg-emerald-50 text-medium-green flex items-center justify-center">

                    <i class="fa-solid fa-check text-2xl"></i>

                </div>
            </div>

            <!-- TITLE -->
            <h2
                class="text-base font-extrabold text-dark-green">

                {{ session('success_title', 'Berhasil!') }}

            </h2>

            <!-- MESSAGE -->
            <p
                class="text-xs text-gray-500 leading-relaxed mt-2">

                {{ session('success', 'Data jurnal berhasil disimpan.') }}

            </p>

            <!-- ACTION -->
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

        <div class="bg-white w-full max-w-sm rounded-2xl shadow-2xl p-5 text-center">

            <div class="flex justify-center mb-4">
                <div class="w-14 h-14 rounded-full bg-amber-50 text-amber-500 flex items-center justify-center">
                    <i class="fa-solid fa-triangle-exclamation text-xl"></i>
                </div>
            </div>

            <h2 class="text-base font-extrabold text-dark-green">
                Batalkan Pengisian?
            </h2>

            <p class="text-xs text-gray-500 leading-relaxed mt-2">
                Data yang sudah kamu isi belum disimpan. Yakin ingin meninggalkan halaman ini?
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


        hamburgerBtn.addEventListener('click', () => {

            sidebar.classList.remove('-translate-x-full');

            sidebarOverlay.classList.remove('hidden');

        });


        sidebarOverlay.addEventListener('click', () => {

            sidebar.classList.add('-translate-x-full');

            sidebarOverlay.classList.add('hidden');

        });


        /* =====================================================
           STATUS KEHADIRAN
        ====================================================== */

        function handleStatusChange() {

            const status =
                document.getElementById('statusKehadiran').value;

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


            /* SEMBUNYIKAN SEMUA */
            sectionHadir.classList.add('hidden');
            sectionTugas.classList.add('hidden');
            sectionTanpaTugas.classList.add('hidden');
            sectionAbsensiSiswa.classList.add('hidden');


            /* HADIR */
            if (status === 'hadir') {

                sectionHadir.classList.remove('hidden');

                sectionAbsensiSiswa.classList.remove('hidden');

                textBtnSimpan.innerText =
                    'Kirim Jurnal';

            }


            /* TIDAK HADIR + TUGAS */
            else if (status === 'tidak_hadir_tugas') {

                sectionTugas.classList.remove('hidden');

                textBtnSimpan.innerText =
                    'Kirim Tugas';

            }


            /* TIDAK HADIR + PERLU PENANGANAN */
            else if (status === 'tidak_hadir_tanpa_tugas') {

                sectionTanpaTugas.classList.remove('hidden');

                textBtnSimpan.innerText =
                    'Kirim Laporan';

            }

        }

        /* =====================================================
            ABSENSI SISWA
            Model: Semua siswa + status langsung
        ====================================================== */

            const searchSiswa =
                document.getElementById('searchSiswa');

            const filterAbsensi =
                document.getElementById('filterAbsensi');

            const studentItems =
                document.querySelectorAll('.student-item');


            function filterDaftarSiswa() {

                const keyword =
                    (searchSiswa?.value || '').toLowerCase().trim();

                const filter =
                    filterAbsensi?.value || 'semua';


                studentItems.forEach(item => {

                    const nama =
                        (item.dataset.nama || '').toLowerCase();

                    const nisn =
                        (item.dataset.nisn || '').toLowerCase();

                    const noAbsen =
                        (item.dataset.noAbsen || '').toLowerCase();

                    const statusSelect =
                        item.querySelector('.status-siswa');

                    const status =
                        statusSelect?.value || 'hadir';


                    const cocokPencarian =
                        nama.includes(keyword) ||
                        nisn.includes(keyword) ||
                        noAbsen.includes(keyword);


                    const cocokFilter =
                        filter === 'semua' ||
                        (filter === 'tidak_hadir' && status !== 'hadir');


                    if (cocokPencarian && cocokFilter) {

                        item.classList.remove('hidden');

                    } else {

                        item.classList.add('hidden');

                    }

                });


                updateJumlahTidakHadir();

            }


            function updateJumlahTidakHadir() {

                let jumlah =
                    0;


                document
                    .querySelectorAll('.status-siswa')
                    .forEach(select => {

                        if (select.value !== 'hadir') {

                            jumlah++;

                        }

                    });


                const counter =
                    document.getElementById('jumlahTidakHadir');


                if (counter) {

                    counter.innerText =
                        jumlah;

                }

            }


            if (searchSiswa) {

                searchSiswa.addEventListener(
                    'input',
                    filterDaftarSiswa
                );

            }


            if (filterAbsensi) {

                filterAbsensi.addEventListener(
                    'change',
                    filterDaftarSiswa
                );

            }


            document
                .querySelectorAll('.status-siswa')
                .forEach(select => {

                    select.addEventListener(
                        'change',
                        function () {

                            const item =
                                this.closest('.student-item');

                            if (!item) return;


                            /* Tandai siswa yang tidak hadir */

                            if (this.value === 'hadir') {

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


                            /* Terapkan filter kembali */

                            filterDaftarSiswa();

                        }
                    );

                });


            updateJumlahTidakHadir();
        /* =====================================================
           MODAL KONFIRMASI
        ====================================================== */

        let confirmAction =
            'submit';


        function openConfirm(action) {

            confirmAction =
                action;


            const modal =
                document.getElementById('confirmModal');

            const title =
                document.getElementById('confirmTitle');

            const text =
                document.getElementById('confirmText');

            const button =
                document.getElementById('confirmSubmitBtn');


            if (action === 'draft') {

                title.innerText =
                    'Simpan Jurnal sebagai Draf?';

                text.innerText =
                    'Data akan disimpan sebagai draf dan belum dikirim untuk validasi.';

                button.innerText =
                    'Ya, Simpan Draf';

            } else {

                title.innerText =
                    'Yakin Jurnal Sudah Benar?';

                text.innerText =
                    'Periksa kembali materi, keterangan, dan absensi siswa sebelum jurnal dikirim untuk validasi.';

                button.innerText =
                    'Ya, Kirim Jurnal';

            }


            modal.classList.remove('hidden');

            modal.classList.add('flex');

        }


        function closeConfirm() {

            const modal =
                document.getElementById('confirmModal');

            modal.classList.add('hidden');

            modal.classList.remove('flex');

        }


        function submitConfirmed() {

            const form =
                document.getElementById('jurnalForm');

            const button =
                document.getElementById('confirmSubmitBtn');


            /* Tambahkan action_type agar BE tahu */
            let input =
                form.querySelector('input[name="action_type"]');


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


        /* Klik luar modal */
        document
            .getElementById('confirmModal')
            .addEventListener('click', function(event) {

                if (event.target === this) {

                    closeConfirm();

                }

            });


        /* ESC */
        document.addEventListener('keydown', function(event) {

            if (event.key === 'Escape') {

                closeConfirm();

            }

        });


        /* =====================================================
           SCROLL HELPER
        ====================================================== */

        const scrollIndicator =
            document.getElementById('scrollIndicator');


        function updateScrollIndicator() {

            const scrollTop =
                window.scrollY;

            const maxScroll =
                document.documentElement.scrollHeight -
                window.innerHeight;


            if (maxScroll <= 0) {

                scrollIndicator.style.top =
                    '0px';

                return;

            }


            const trackHeight =
                96;

            const indicatorHeight =
                28;


            const percentage =
                scrollTop / maxScroll;


            const maxTop =
                trackHeight - indicatorHeight;


            scrollIndicator.style.top =
                `${percentage * maxTop}px`;

        }


        window.addEventListener(
            'scroll',
            updateScrollIndicator
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
           INIT
        ====================================================== */

        handleStatusChange();

        /* =====================================================
        SUCCESS & ERROR MODAL
        ====================================================== */

        function closeErrorModal() {

            const modal = document.getElementById('errorModal');

            if (!modal) return;

            modal.classList.add('hidden');

        }


        /* SUCCESS MODAL */

        @if (session('success'))
            document.addEventListener('DOMContentLoaded', function () {

                const modal =
                    document.getElementById('successModal');

                if (!modal) return;

                modal.classList.remove('hidden');
                modal.classList.add('flex');

            });
        @endif

        /* BATAL MODAL */
        function openCancelConfirm() {

            const modal = document.getElementById('cancelModal');

                modal.classList.remove('hidden');
                modal.classList.add('flex');

        }

            function closeCancelConfirm() {

                const modal = document.getElementById('cancelModal');

                modal.classList.add('hidden');
                modal.classList.remove('flex');

            }
    </script>

</body>

</html>