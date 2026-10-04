@extends('layouts.admin')

@section('title', 'Detail Dispensasi')

@section('content')

<div class="p-4 pb-12 md:p-6 max-w-full space-y-4 md:space-y-5">

    <!-- HEADER -->
    <header>
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

            <div class="min-w-0">

                <div class="flex items-start gap-2.5">

                    <a
                        href="{{ url('/admin/data_dispensasi') }}"
                        class="w-8 h-8 mt-0.5 shrink-0 rounded-lg
                               bg-gray-100 hover:bg-dark-green
                               text-dark-green hover:text-white
                               flex items-center justify-center
                               transition-all duration-200"
                        title="Kembali ke Data Dispensasi"
                    >
                        <i class="fa-solid fa-arrow-left text-xs"></i>
                    </a>

                    <div class="min-w-0">
                        <p class="text-[10px] sm:text-xs font-semibold text-medium-green uppercase tracking-wide mb-1">
                            Pengajuan Dispensasi
                        </p>

                        <h1 class="text-xl md:text-2xl font-extrabold text-dark-green">
                            Dispensasi Siswa
                        </h1>

                        <p class="text-sm text-gray-500 leading-relaxed mt-1">
                            Periksa informasi pengajuan sebelum mengambil keputusan.
                        </p>
                    </div>

                </div>

            </div>

            <!-- STATUS -->
            <span
                class="self-start sm:self-center inline-flex items-center
                       bg-amber-100 text-amber-700
                       text-xs md:text-sm font-bold
                       px-3.5 py-2 rounded-xl"
            >
                <i class="fa-solid fa-clock mr-1.5"></i>
                Menunggu Persetujuan
            </span>

        </div>
    </header>


    <!-- DATA SISWA -->
    <section class="bg-white rounded-2xl shadow-sm p-4 md:p-5">

        <div class="flex items-center gap-3 mb-4 md:mb-5">

            <div class="w-10 h-10 shrink-0 rounded-xl bg-emerald-50 text-medium-green flex items-center justify-center">
                <i class="fa-solid fa-user-graduate"></i>
            </div>

            <div>
                <h2 class="text-sm md:text-base font-extrabold text-dark-green">
                    Data Siswa
                </h2>

                <p class="text-xs text-gray-500 mt-0.5">
                    Informasi siswa yang mengajukan dispensasi.
                </p>
            </div>

        </div>

        <div class="grid grid-cols-2 gap-2.5 sm:gap-3">

            <!-- NAMA -->
            <div class="col-span-2 bg-gray-50 rounded-xl p-3.5">
                <p class="text-[10px] uppercase tracking-wider font-bold text-gray-400 mb-1">
                    Nama Siswa
                </p>

                <p class="text-sm font-extrabold text-dark-green leading-snug">
                    MARVEL MAULANA SAPUTRA
                </p>
            </div>

            <!-- NIS -->
            <div class="bg-gray-50 rounded-xl p-3.5">
                <p class="text-[10px] uppercase tracking-wider font-bold text-gray-400 mb-1">
                    NIS
                </p>

                <p class="text-sm font-bold text-dark-green">
                    24XXXXXX
                </p>
            </div>

            <!-- KELAS -->
            <div class="bg-gray-50 rounded-xl p-3.5">
                <p class="text-[10px] uppercase tracking-wider font-bold text-gray-400 mb-1">
                    Kelas
                </p>

                <p class="text-sm font-bold text-dark-green">
                    XI RPL 2
                </p>
            </div>

            <!-- WALI -->
            <div class="col-span-2 bg-gray-50 rounded-xl p-3.5">
                <p class="text-[10px] uppercase tracking-wider font-bold text-gray-400 mb-1">
                    Wali Kelas
                </p>

                <p class="text-sm font-bold text-dark-green leading-snug">
                    Budi Santoso, S.Kom.
                </p>
            </div>

        </div>

    </section>


    <!-- DETAIL KEPERLUAN -->
    <section class="bg-white rounded-2xl shadow-sm p-4 md:p-5">

        <div class="flex items-center gap-3 mb-4 md:mb-5">

            <div class="w-10 h-10 shrink-0 rounded-xl bg-emerald-50 text-medium-green flex items-center justify-center">
                <i class="fa-solid fa-file-lines"></i>
            </div>

            <div>
                <h2 class="text-sm md:text-base font-extrabold text-dark-green">
                    Detail Keperluan
                </h2>

                <p class="text-xs text-gray-500 mt-0.5">
                    Informasi kegiatan atau keperluan dispensasi.
                </p>
            </div>

        </div>

        <div class="space-y-4">

            <!-- KATEGORI -->
            <div>
                <p class="text-[10px] uppercase tracking-wider font-bold text-gray-400 mb-1.5">
                    Kategori
                </p>

                <span class="inline-flex items-center bg-emerald-50 text-emerald-700 text-xs font-bold px-3 py-1.5 rounded-lg">
                    Lomba / Prestasi
                </span>
            </div>

            <!-- NAMA KEGIATAN -->
            <div>
                <p class="text-[10px] uppercase tracking-wider font-bold text-gray-400 mb-1.5">
                    Nama Kegiatan
                </p>

                <p class="text-sm font-bold text-dark-green leading-relaxed">
                    Lomba Desain Grafis Tingkat Kabupaten
                </p>
            </div>

            <!-- KEPERLUAN -->
            <div>
                <p class="text-[10px] uppercase tracking-wider font-bold text-gray-400 mb-1.5">
                    Keperluan
                </p>

                <div class="bg-gray-50 rounded-xl p-3.5">
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Mengikuti kegiatan perlombaan desain grafis
                        tingkat kabupaten sebagai perwakilan sekolah.
                    </p>
                </div>
            </div>

            <!-- TANGGAL -->
            <div class="grid grid-cols-2 gap-2.5">

                <div class="bg-gray-50 rounded-xl p-3.5">
                    <p class="text-[10px] uppercase tracking-wider font-bold text-gray-400 mb-1">
                        Mulai
                    </p>

                    <p class="text-sm font-bold text-dark-green leading-snug">
                        15 September 2026
                    </p>
                </div>

                <div class="bg-gray-50 rounded-xl p-3.5">
                    <p class="text-[10px] uppercase tracking-wider font-bold text-gray-400 mb-1">
                        Selesai
                    </p>

                    <p class="text-sm font-bold text-dark-green leading-snug">
                        17 September 2026
                    </p>
                </div>

            </div>

            <!-- TEMPAT -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">

                <div class="bg-gray-50 rounded-xl p-3.5">
                    <p class="text-[10px] uppercase tracking-wider font-bold text-gray-400 mb-1">
                        Tempat
                    </p>

                    <p class="text-sm font-bold text-dark-green leading-snug">
                        Gedung Kesenian Kabupaten
                    </p>
                </div>

                <div class="bg-gray-50 rounded-xl p-3.5">
                    <p class="text-[10px] uppercase tracking-wider font-bold text-gray-400 mb-1">
                        Penyelenggara
                    </p>

                    <p class="text-sm font-bold text-dark-green leading-snug">
                        Dinas Pendidikan Kabupaten
                    </p>
                </div>

            </div>

        </div>

    </section>


    <!-- LAMPIRAN -->
    <section class="bg-white rounded-2xl shadow-sm p-4 md:p-5">

        <div class="flex items-center gap-3 mb-4 md:mb-5">

            <div class="w-10 h-10 shrink-0 rounded-xl bg-emerald-50 text-medium-green flex items-center justify-center">
                <i class="fa-solid fa-paperclip"></i>
            </div>

            <div>
                <h2 class="text-sm md:text-base font-extrabold text-dark-green">
                    Lampiran Berkas
                </h2>

                <p class="text-xs text-gray-500 mt-0.5">
                    Dokumen pendukung pengajuan.
                </p>
            </div>

        </div>

        <div class="space-y-2.5">

            <!-- FILE 1 -->
            <div class="flex items-center justify-between gap-3 p-3.5 rounded-xl bg-gray-50 border border-gray-100">

                <div class="flex items-center gap-3 min-w-0">

                    <div class="w-10 h-10 rounded-lg bg-red-50 text-red-500 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-file-pdf"></i>
                    </div>

                    <div class="min-w-0">
                        <p class="text-sm font-bold text-dark-green truncate">
                            Surat_Tugas_FLS2N_2026.pdf
                        </p>

                        <p class="text-xs text-gray-400 mt-0.5">
                            1.4 MB
                        </p>
                    </div>

                </div>

                <button
                    type="button"
                    class="shrink-0 w-9 h-9 rounded-lg bg-dark-green text-white hover:bg-medium-green transition flex items-center justify-center"
                    title="Preview"
                >
                    <i class="fa-solid fa-eye text-xs"></i>
                </button>

            </div>


            <!-- FILE 2 -->
            <div class="flex items-center justify-between gap-3 p-3.5 rounded-xl bg-gray-50 border border-gray-100">

                <div class="flex items-center gap-3 min-w-0">

                    <div class="w-10 h-10 rounded-lg bg-red-50 text-red-500 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-file-pdf"></i>
                    </div>

                    <div class="min-w-0">
                        <p class="text-sm font-bold text-dark-green truncate">
                            Surat_Undangan.pdf
                        </p>

                        <p class="text-xs text-gray-400 mt-0.5">
                            820 KB
                        </p>
                    </div>

                </div>

                <button
                    type="button"
                    class="shrink-0 w-9 h-9 rounded-lg bg-dark-green text-white hover:bg-medium-green transition flex items-center justify-center"
                    title="Preview"
                >
                    <i class="fa-solid fa-eye text-xs"></i>
                </button>

            </div>

        </div>

    </section>


    <!-- INFORMASI PENGAJUAN -->
    <section class="bg-white rounded-2xl shadow-sm p-4 md:p-5">

        <div class="flex items-center gap-3 mb-4 md:mb-5">

            <div class="w-10 h-10 shrink-0 rounded-xl bg-emerald-50 text-medium-green flex items-center justify-center">
                <i class="fa-solid fa-clock-rotate-left"></i>
            </div>

            <div>
                <h2 class="text-sm md:text-base font-extrabold text-dark-green">
                    Informasi Pengajuan
                </h2>

                <p class="text-xs text-gray-500 mt-0.5">
                    Informasi waktu dan pengaju.
                </p>
            </div>

        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2.5">

            <!-- PENGAJU -->
            <div class="bg-gray-50 rounded-xl p-3.5">
                <p class="text-[10px] uppercase tracking-wider font-bold text-gray-400 mb-1">
                    Diajukan Oleh
                </p>

                <p class="text-sm font-bold text-dark-green">
                    Guru Piket
                </p>
            </div>

            <!-- TANGGAL -->
            <div class="bg-gray-50 rounded-xl p-3.5">
                <p class="text-[10px] uppercase tracking-wider font-bold text-gray-400 mb-1">
                    Tanggal
                </p>

                <p class="text-sm font-bold text-dark-green leading-snug">
                    15 September 2026
                </p>
            </div>

            <!-- JAM -->
            <div class="col-span-2 sm:col-span-1 bg-gray-50 rounded-xl p-3.5">
                <p class="text-[10px] uppercase tracking-wider font-bold text-gray-400 mb-1">
                    Jam
                </p>

                <p class="text-sm font-bold text-dark-green">
                    07.15 WIB
                </p>
            </div>

        </div>

    </section>


    <!-- TINDAKAN -->
    <section class="bg-white rounded-2xl shadow-sm p-4 md:p-5 mb-6">

        <div class="flex flex-col gap-4">

            <div>
                <h2 class="text-sm md:text-base font-extrabold text-dark-green">
                    Tindakan
                </h2>

                <p class="text-xs text-gray-500 mt-1">
                    Tentukan keputusan untuk pengajuan ini.
                </p>
            </div>

            <!-- BUTTONS -->
            <div class="grid grid-cols-1 sm:flex sm:justify-end gap-2.5">

                <!-- TOLAK -->
                <button
                    type="button"
                    onclick="openTolakModal()"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2
                           bg-red-50 text-red-600 hover:bg-red-100
                           text-sm font-bold px-4 py-3 rounded-xl transition"
                >
                    <i class="fa-solid fa-xmark"></i>
                    Tolak Permohonan
                </button>

                <!-- SETUJUI -->
                <button
                    type="button"
                    onclick="openSetujuiModal()"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2
                           bg-dark-green text-white hover:bg-medium-green
                           text-sm font-bold px-4 py-3 rounded-xl transition"
                >
                    <i class="fa-solid fa-check"></i>
                    Setujui Dispensasi
                </button>

            </div>

        </div>

    </section>

</div>

@endsection
