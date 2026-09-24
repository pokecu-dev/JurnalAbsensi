<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Dispensasi</title>

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
                                  text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-house w-4 text-center"></i>
                            Dashboard
                        </a>


                        <a href="{{ url('/admin/data_jurnal') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5 hover:text-white transition">
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
                                  text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-chalkboard-user w-4 text-center"></i>
                            Data Guru
                        </a>


                        <a href="{{ url('/admin/data_siswa') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-user-graduate w-4 text-center"></i>
                            Data Siswa
                        </a>


                        <a href="{{ url('/admin/data_kelas') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-school w-4 text-center"></i>
                            Data Kelas
                        </a>


                        <a href="{{ url('/admin/data_mapel') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-book-open w-4 text-center"></i>
                            Mata Pelajaran
                        </a>


                        <a href="{{ url('/admin/jadwal') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5 hover:text-white transition">
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


        <!-- BACK -->
        <a href="{{ url('/admin/data_dispensasi') }}"
           class="inline-flex items-center gap-2
                  text-xs font-bold text-medium-green
                  hover:text-dark-green transition mb-5">

            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Pengajuan Dispensasi

        </a>


        <!-- HEADER -->
        <header class="mb-5">

            <div class="flex flex-col sm:flex-row
                        sm:items-center sm:justify-between gap-4">

                <div>

                    <p class="text-[10px] font-bold uppercase
                              tracking-wider text-medium-green mb-1">
                        Detail Pengajuan
                    </p>

                    <h1 class="text-xl md:text-2xl
                               font-extrabold text-dark-green">
                        Dispensasi Siswa
                    </h1>

                    <p class="text-xs text-gray-500 mt-1">
                        Periksa informasi pengajuan sebelum mengambil keputusan.
                    </p>

                </div>


                <!-- STATUS -->
                <span class="self-start sm:self-center
                             bg-amber-100 text-amber-700
                             text-[10px] font-bold
                             px-3 py-1.5 rounded-lg">

                    <i class="fa-solid fa-clock mr-1"></i>
                    Menunggu Persetujuan

                </span>

            </div>

        </header>


        <!-- DATA SISWA -->
        <section class="bg-white rounded-2xl shadow-sm p-5 mb-5">

            <div class="flex items-center gap-3 mb-5">

                <div class="w-10 h-10 rounded-xl
                            bg-emerald-50 text-medium-green
                            flex items-center justify-center">

                    <i class="fa-solid fa-user-graduate"></i>

                </div>

                <div>

                    <h2 class="text-sm font-extrabold text-dark-green">
                        Data Siswa
                    </h2>

                    <p class="text-[10px] text-gray-400 mt-0.5">
                        Informasi siswa yang mengajukan dispensasi.
                    </p>

                </div>

            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                <div class="bg-gray-50 rounded-xl p-4">

                    <p class="text-[10px] uppercase
                              tracking-wider font-bold text-gray-400 mb-1">
                        Nama Siswa
                    </p>

                    <p class="text-xs font-extrabold text-dark-green">
                        MARVEL MAULANA SAPUTRA
                    </p>

                </div>


                <div class="bg-gray-50 rounded-xl p-4">

                    <p class="text-[10px] uppercase
                              tracking-wider font-bold text-gray-400 mb-1">
                        NIS
                    </p>

                    <p class="text-xs font-extrabold text-dark-green">
                        24XXXXXX
                    </p>

                </div>


                <div class="bg-gray-50 rounded-xl p-4">

                    <p class="text-[10px] uppercase
                              tracking-wider font-bold text-gray-400 mb-1">
                        Kelas
                    </p>

                    <p class="text-xs font-extrabold text-dark-green">
                        XI RPL 2
                    </p>

                </div>


                <div class="bg-gray-50 rounded-xl p-4">

                    <p class="text-[10px] uppercase
                              tracking-wider font-bold text-gray-400 mb-1">
                        Wali Kelas
                    </p>

                    <p class="text-xs font-extrabold text-dark-green">
                        Budi Santoso, S.Kom.
                    </p>

                </div>

            </div>

        </section>


        <!-- DETAIL KEPERLUAN -->
        <section class="bg-white rounded-2xl shadow-sm p-5 mb-5">

            <div class="flex items-center gap-3 mb-5">

                <div class="w-10 h-10 rounded-xl
                            bg-emerald-50 text-medium-green
                            flex items-center justify-center">

                    <i class="fa-solid fa-file-lines"></i>

                </div>

                <div>

                    <h2 class="text-sm font-extrabold text-dark-green">
                        Detail Keperluan
                    </h2>

                    <p class="text-[10px] text-gray-400 mt-0.5">
                        Informasi kegiatan atau keperluan dispensasi.
                    </p>

                </div>

            </div>


            <div class="space-y-3">

                <!-- KATEGORI -->
                <div>

                    <p class="text-[10px] uppercase
                              tracking-wider font-bold text-gray-400 mb-1">
                        Kategori
                    </p>

                    <span class="inline-flex
                                 bg-emerald-50 text-emerald-700
                                 text-[10px] font-bold
                                 px-2.5 py-1 rounded-lg">
                        Lomba / Prestasi
                    </span>

                </div>


                <!-- NAMA KEGIATAN -->
                <div>

                    <p class="text-[10px] uppercase
                              tracking-wider font-bold text-gray-400 mb-1">
                        Nama Kegiatan
                    </p>

                    <p class="text-xs font-bold text-dark-green">
                        Lomba Desain Grafis Tingkat Kabupaten
                    </p>

                </div>


                <!-- KEPERLUAN -->
                <div>

                    <p class="text-[10px] uppercase
                              tracking-wider font-bold text-gray-400 mb-1">
                        Keperluan
                    </p>

                    <p class="text-xs text-gray-600 leading-relaxed">
                        Mengikuti kegiatan perlombaan desain grafis
                        tingkat kabupaten sebagai perwakilan sekolah.
                    </p>

                </div>


                <!-- TANGGAL -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                    <div class="bg-gray-50 rounded-xl p-4">

                        <p class="text-[10px] uppercase
                                  tracking-wider font-bold text-gray-400 mb-1">
                            Tanggal Mulai
                        </p>

                        <p class="text-xs font-bold text-dark-green">
                            15 September 2026
                        </p>

                    </div>


                    <div class="bg-gray-50 rounded-xl p-4">

                        <p class="text-[10px] uppercase
                                  tracking-wider font-bold text-gray-400 mb-1">
                            Tanggal Selesai
                        </p>

                        <p class="text-xs font-bold text-dark-green">
                            17 September 2026
                        </p>

                    </div>

                </div>


                <!-- TEMPAT & PENYELENGGARA -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                    <div class="bg-gray-50 rounded-xl p-4">

                        <p class="text-[10px] uppercase
                                  tracking-wider font-bold text-gray-400 mb-1">
                            Tempat
                        </p>

                        <p class="text-xs font-bold text-dark-green">
                            Gedung Kesenian Kabupaten
                        </p>

                    </div>


                    <div class="bg-gray-50 rounded-xl p-4">

                        <p class="text-[10px] uppercase
                                  tracking-wider font-bold text-gray-400 mb-1">
                            Penyelenggara
                        </p>

                        <p class="text-xs font-bold text-dark-green">
                            Dinas Pendidikan Kabupaten
                        </p>

                    </div>

                </div>

            </div>

        </section>


        <!-- LAMPIRAN -->
        <section class="bg-white rounded-2xl shadow-sm p-5 mb-5">

            <div class="flex items-center gap-3 mb-5">

                <div class="w-10 h-10 rounded-xl
                            bg-emerald-50 text-medium-green
                            flex items-center justify-center">

                    <i class="fa-solid fa-paperclip"></i>

                </div>

                <div>

                    <h2 class="text-sm font-extrabold text-dark-green">
                        Lampiran Berkas
                    </h2>

                    <p class="text-[10px] text-gray-400 mt-0.5">
                        Dokumen pendukung pengajuan.
                    </p>

                </div>

            </div>


            <div class="space-y-2">

                <!-- FILE 1 -->
                <div class="flex items-center justify-between
                            gap-3 p-3 rounded-xl
                            bg-gray-50 border border-gray-100">

                    <div class="flex items-center gap-3 min-w-0">

                        <div class="w-9 h-9 rounded-lg
                                    bg-red-50 text-red-500
                                    flex items-center justify-center
                                    shrink-0">

                            <i class="fa-solid fa-file-pdf text-sm"></i>

                        </div>

                        <div class="min-w-0">

                            <p class="text-xs font-bold text-dark-green truncate">
                                Surat_Tugas_FLS2N_2026.pdf
                            </p>

                            <p class="text-[10px] text-gray-400 mt-0.5">
                                1.4 MB
                            </p>

                        </div>

                    </div>


                    <button
                        type="button"
                        class="shrink-0 inline-flex
                               items-center gap-1.5
                               bg-dark-green text-white
                               hover:bg-medium-green
                               text-[10px] font-bold
                               px-2.5 py-1.5 rounded-lg transition">

                        <i class="fa-solid fa-eye"></i>
                        Preview

                    </button>

                </div>


                <!-- FILE 2 -->
                <div class="flex items-center justify-between
                            gap-3 p-3 rounded-xl
                            bg-gray-50 border border-gray-100">

                    <div class="flex items-center gap-3 min-w-0">

                        <div class="w-9 h-9 rounded-lg
                                    bg-red-50 text-red-500
                                    flex items-center justify-center
                                    shrink-0">

                            <i class="fa-solid fa-file-pdf text-sm"></i>

                        </div>

                        <div class="min-w-0">

                            <p class="text-xs font-bold text-dark-green truncate">
                                Surat_Undangan.pdf
                            </p>

                            <p class="text-[10px] text-gray-400 mt-0.5">
                                820 KB
                            </p>

                        </div>

                    </div>


                    <button
                        type="button"
                        class="shrink-0 inline-flex
                               items-center gap-1.5
                               bg-dark-green text-white
                               hover:bg-medium-green
                               text-[10px] font-bold
                               px-2.5 py-1.5 rounded-lg transition">

                        <i class="fa-solid fa-eye"></i>
                        Preview

                    </button>

                </div>

            </div>

        </section>


        <!-- INFORMASI PENGAJUAN -->
        <section class="bg-white rounded-2xl shadow-sm p-5 mb-5">

            <div class="flex items-center gap-3 mb-5">

                <div class="w-10 h-10 rounded-xl
                            bg-emerald-50 text-medium-green
                            flex items-center justify-center">

                    <i class="fa-solid fa-clock-rotate-left"></i>

                </div>

                <div>

                    <h2 class="text-sm font-extrabold text-dark-green">
                        Informasi Pengajuan
                    </h2>

                    <p class="text-[10px] text-gray-400 mt-0.5">
                        Informasi waktu dan pengaju.
                    </p>

                </div>

            </div>


            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

                <div class="bg-gray-50 rounded-xl p-4">

                    <p class="text-[10px] uppercase
                              tracking-wider font-bold text-gray-400 mb-1">
                        Diajukan Oleh
                    </p>

                    <p class="text-xs font-bold text-dark-green">
                        Guru Piket
                    </p>

                </div>


                <div class="bg-gray-50 rounded-xl p-4">

                    <p class="text-[10px] uppercase
                              tracking-wider font-bold text-gray-400 mb-1">
                        Tanggal
                    </p>

                    <p class="text-xs font-bold text-dark-green">
                        15 September 2026
                    </p>

                </div>


                <div class="bg-gray-50 rounded-xl p-4">

                    <p class="text-[10px] uppercase
                              tracking-wider font-bold text-gray-400 mb-1">
                        Jam
                    </p>

                    <p class="text-xs font-bold text-dark-green">
                        07.15 WIB
                    </p>

                </div>

            </div>

        </section>


        <!-- TINDAKAN -->
        <section class="bg-white rounded-2xl shadow-sm p-5 mb-6">

            <div class="flex flex-col sm:flex-row
                        sm:items-center sm:justify-between gap-4">

                <div>

                    <h2 class="text-sm font-extrabold text-dark-green">
                        Tindakan
                    </h2>

                    <p class="text-[10px] text-gray-400 mt-0.5">
                        Tentukan keputusan untuk pengajuan ini.
                    </p>

                </div>


                <div class="flex items-center gap-2">

                    <button
                        type="button"
                        onclick="openTolakModal()"
                        class="inline-flex items-center gap-2
                               bg-red-50 text-red-600
                               hover:bg-red-100
                               text-xs font-bold
                               px-4 py-2.5 rounded-xl transition">

                        <i class="fa-solid fa-xmark"></i>
                        Tolak Permohonan

                    </button>


                    <button
                        type="button"
                        onclick="openSetujuiModal()"
                        class="inline-flex items-center gap-2
                               bg-dark-green text-white
                               hover:bg-medium-green
                               text-xs font-bold
                               px-4 py-2.5 rounded-xl transition">

                        <i class="fa-solid fa-check"></i>
                        Setujui Dispensasi

                    </button>

                </div>

            </div>

        </section>


        <!-- MOBILE SCROLL -->
        <div class="fixed right-3 bottom-4 md:hidden">

            <button
                type="button"
                onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
                class="w-9 h-9 rounded-full
                       bg-dark-green text-white shadow-lg
                       flex items-center justify-center">

                <i class="fa-solid fa-arrow-up text-xs"></i>

            </button>

        </div>

    </main>


    <!-- MODAL SETUJUI -->
    <div id="setujuiModal"
         class="fixed inset-0 z-50 hidden items-center
                justify-center bg-black/40 px-4">

        <div class="bg-white w-full max-w-sm rounded-2xl
                    shadow-xl p-5 text-center">

            <div class="w-12 h-12 mx-auto rounded-full
                        bg-emerald-50 text-emerald-600
                        flex items-center justify-center mb-3">

                <i class="fa-solid fa-check text-lg"></i>

            </div>

            <h2 class="text-base font-extrabold text-dark-green">
                Setujui dispensasi?
            </h2>

            <p class="text-xs text-gray-500 mt-1.5">
                Pastikan seluruh informasi dan dokumen
                pengajuan sudah diperiksa.
            </p>

            <div class="flex justify-center gap-2 mt-5">

                <button
                    type="button"
                    onclick="closeSetujuiModal()"
                    class="px-4 py-2.5 rounded-xl
                           text-xs font-bold text-gray-600
                           bg-gray-100 hover:bg-gray-200 transition">
                    Batal
                </button>

                <button
                    type="button"
                    onclick="setujuiDispensasi()"
                    class="px-4 py-2.5 rounded-xl
                           text-xs font-bold text-white
                           bg-dark-green hover:bg-medium-green transition">
                    Ya, Setujui
                </button>

            </div>

        </div>

    </div>


    <!-- MODAL TOLAK -->
    <div id="tolakModal"
         class="fixed inset-0 z-50 hidden items-center
                justify-center bg-black/40 px-4">

        <div class="bg-white w-full max-w-sm rounded-2xl
                    shadow-xl p-5">

            <div class="text-center">

                <div class="w-12 h-12 mx-auto rounded-full
                            bg-red-50 text-red-600
                            flex items-center justify-center mb-3">

                    <i class="fa-solid fa-xmark text-lg"></i>

                </div>

                <h2 class="text-base font-extrabold text-dark-green">
                    Tolak pengajuan?
                </h2>

                <p class="text-xs text-gray-500 mt-1.5">
                    Berikan alasan penolakan pengajuan.
                </p>

            </div>


            <div class="mt-4">

                <label class="block text-xs font-bold
                              text-dark-green mb-1.5">
                    Alasan Penolakan
                </label>

                <textarea
                    id="alasanPenolakan"
                    rows="3"
                    placeholder="Masukkan alasan penolakan..."
                    class="w-full border border-gray-200
                           rounded-xl px-3 py-2.5
                           text-xs resize-none outline-none
                           focus:border-red-400
                           focus:ring-2 focus:ring-red-100"></textarea>

            </div>


            <div class="flex justify-end gap-2 mt-4">

                <button
                    type="button"
                    onclick="closeTolakModal()"
                    class="px-4 py-2.5 rounded-xl
                           text-xs font-bold text-gray-600
                           bg-gray-100 hover:bg-gray-200 transition">
                    Batal
                </button>

                <button
                    type="button"
                    onclick="tolakDispensasi()"
                    class="px-4 py-2.5 rounded-xl
                           text-xs font-bold text-white
                           bg-red-600 hover:bg-red-700 transition">
                    Ya, Tolak
                </button>

            </div>

        </div>

    </div>


    <script>

        function openSetujuiModal() {

            document.getElementById('setujuiModal')
                .classList.remove('hidden');

            document.getElementById('setujuiModal')
                .classList.add('flex');

        }


        function closeSetujuiModal() {

            document.getElementById('setujuiModal')
                .classList.add('hidden');

            document.getElementById('setujuiModal')
                .classList.remove('flex');

        }


        function openTolakModal() {

            document.getElementById('tolakModal')
                .classList.remove('hidden');

            document.getElementById('tolakModal')
                .classList.add('flex');

        }


        function closeTolakModal() {

            document.getElementById('tolakModal')
                .classList.add('hidden');

            document.getElementById('tolakModal')
                .classList.remove('flex');

        }


        function setujuiDispensasi() {

            closeSetujuiModal();

            alert('Pengajuan dispensasi berhasil disetujui.');

        }


        function tolakDispensasi() {

            const alasan =
                document.getElementById('alasanPenolakan').value.trim();

            if (!alasan) {

                alert('Alasan penolakan wajib diisi.');

                return;

            }

            closeTolakModal();

            alert('Pengajuan dispensasi berhasil ditolak.');

        }

    </script>

</body>
</html>