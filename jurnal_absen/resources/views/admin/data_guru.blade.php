<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Guru</title>

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
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition-all duration-200
                                  active:scale-[0.98]">
                            <i class="fa-solid fa-house w-4 text-center"></i>
                            Dashboard
                        </a>

                        <a href="{{ url('/admin/monitoring_jurnal') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition-all duration-200
                                  active:scale-[0.98]">
                            <i class="fa-solid fa-book-bookmark w-4 text-center"></i>
                            Monitoring Jurnal
                        </a>

                        <a href="{{ url('/admin/data_dispensasi') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition-all duration-200
                                  active:scale-[0.98]">
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

                        <!-- ACTIVE -->
                        <a href="{{ url('/admin/data_guru') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  bg-white/10
                                  text-mint-green
                                  font-bold
                                  transition-all duration-200
                                  active:scale-[0.98]">
                            <i class="fa-solid fa-chalkboard-user w-4 text-center"></i>
                            Data Guru
                        </a>

                        <a href="{{ url('/admin/data_siswa') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition-all duration-200
                                  active:scale-[0.98]">
                            <i class="fa-solid fa-user-graduate w-4 text-center"></i>
                            Data Siswa
                        </a>

                        <a href="{{ url('/admin/data_kelas') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition-all duration-200
                                  active:scale-[0.98]">
                            <i class="fa-solid fa-school w-4 text-center"></i>
                            Data Kelas
                        </a>

                        <a href="{{ url('/admin/data_mapel') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition-all duration-200
                                  active:scale-[0.98]">
                            <i class="fa-solid fa-book-open w-4 text-center"></i>
                            Mata Pelajaran
                        </a>

                        <a href="{{ url('/admin/jadwal') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300
                                  hover:bg-white/5
                                  hover:text-white
                                  transition-all duration-200
                                  active:scale-[0.98]">
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

                    <h1 class="text-xl md:text-2xl
                               font-extrabold text-dark-green">
                        Data Guru
                    </h1>

                    <p class="text-xs text-medium-green
                              font-medium mt-1">
                        Kelola data guru yang terdaftar dalam sistem.
                    </p>

                </div>


                <!-- TAMBAH GURU -->
                <button type="button"
                    onclick="openTambahGuru()"
                    class="bg-dark-green
                           hover:bg-medium-green
                           active:scale-95
                           text-white text-xs font-bold
                           px-4 py-2.5 rounded-xl
                           transition-all duration-200
                           inline-flex items-center gap-2">

                    <i class="fa-solid fa-plus"></i>
                    Tambah Guru

                </button>

            </div>

        </header>


        <!-- DATA DUMMY -->
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


        <!-- FILTER -->
        <section class="bg-white p-4 rounded-2xl shadow-sm mb-5">

            <div class="flex flex-col sm:flex-row gap-3">

                <!-- SEARCH -->
                <div class="flex-1">

                    <label class="block text-[10px]
                                  font-bold text-gray-400
                                  uppercase tracking-wider mb-1.5">
                        Cari Guru
                    </label>

                    <div class="relative">

                        <i class="fa-solid fa-magnifying-glass
                                  absolute left-3 top-1/2
                                  -translate-y-1/2
                                  text-gray-400 text-xs"></i>

                        <input
                            type="text"
                            placeholder="Cari nama guru..."
                            class="w-full bg-gray-50
                                   border border-gray-200
                                   text-xs font-medium
                                   rounded-xl
                                   pl-9 pr-3 py-2.5
                                   text-dark-green outline-none
                                   focus:border-medium-green
                                   focus:ring-2
                                   focus:ring-mint-green/30
                                   transition-all duration-200">

                    </div>

                </div>


                <!-- MATA PELAJARAN -->
                <div class="flex-1">

                    <label class="block text-[10px]
                                  font-bold text-gray-400
                                  uppercase tracking-wider mb-1.5">
                        Mata Pelajaran
                    </label>

                    <select
                        class="w-full bg-gray-50
                               border border-gray-200
                               text-xs font-bold
                               rounded-xl px-3 py-2.5
                               text-dark-green outline-none
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


        <!-- DAFTAR GURU -->
        <section class="bg-white rounded-2xl shadow-sm overflow-hidden">

            <!-- HEADER -->
            <div class="p-4 border-b border-gray-100">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-sm font-extrabold text-dark-green">
                            Daftar Guru
                        </h2>

                        <p class="text-[11px] text-gray-400 mt-0.5">
                            Data guru yang terdaftar dalam sistem.
                        </p>

                    </div>

                    <span class="bg-gray-100 text-gray-500
                                 text-[10px] font-bold
                                 px-2.5 py-1 rounded-lg">
                        {{ count($gurus) }} Guru
                    </span>

                </div>

            </div>


            <!-- LIST -->
            <div class="p-4 space-y-3">

                @foreach ($gurus as $guru)

                    <div class="group border border-gray-100
                                rounded-xl p-3
                                transition-all duration-200
                                hover:-translate-y-0.5
                                hover:border-medium-green/30
                                hover:shadow-sm">

                        <div class="flex flex-col sm:flex-row
                                    sm:items-center
                                    justify-between gap-3">

                            <!-- IDENTITAS GURU -->
                            <a href="{{ url('/admin/data_guru/' . $loop->index) }}"
                               class="flex items-start gap-3 flex-1
                                      rounded-xl
                                      transition-all duration-200
                                      active:scale-[0.98]">

                                <!-- ICON -->
                                <div class="w-10 h-10 shrink-0
                                            rounded-xl bg-dark-green
                                            text-mint-green
                                            flex items-center justify-center
                                            transition-all duration-200
                                            group-hover:bg-medium-green">

                                    <i class="fa-solid fa-chalkboard-user text-xs"></i>

                                </div>

                                <!-- INFORMASI -->
                                <div>

                                    <h3 class="text-xs font-extrabold
                                               text-dark-green
                                               transition-colors duration-200
                                               group-hover:text-medium-green">

                                        {{ $guru['nama'] }}

                                    </h3>

                                    <p class="text-[10px] text-gray-400 mt-1">

                                        NIP:

                                        <span class="text-gray-600
                                                     transition-colors duration-200
                                                     group-hover:text-dark-green">

                                            {{ $guru['nip'] }}

                                        </span>

                                    </p>

                                    <p class="text-[10px] text-gray-400 mt-1">

                                        Mata Pelajaran:

                                        <span class="text-gray-600
                                                     transition-colors duration-200
                                                     group-hover:text-dark-green">

                                            {{ $guru['mapel'] }}

                                        </span>

                                    </p>

                                </div>

                            </a>


                            <!-- DETAIL -->
                            <a href="{{ url('/admin/data_guru/' . $loop->index) }}"
                               class="inline-flex items-center gap-1.5
                                      bg-dark-green
                                      text-white
                                      hover:bg-medium-green
                                      active:scale-95
                                      text-[10px] font-bold
                                      px-2.5 py-1.5
                                      rounded-lg
                                      transition-all duration-200
                                      self-start sm:self-center">

                                <i class="fa-solid fa-eye"></i>
                                Detail

                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        </section>

    </main>


    <!-- ====================================================== -->
    <!-- POPUP TAMBAH GURU -->
    <!-- ====================================================== -->

    <div id="tambahGuruModal"
         class="fixed inset-0 z-50 hidden
                items-center justify-center p-4">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"
             onclick="closeTambahGuru()"></div>


        <!-- Modal -->
        <div class="relative w-full max-w-lg
                    bg-white rounded-2xl shadow-xl
                    overflow-hidden
                    transform transition-all duration-200">

            <!-- HEADER -->
            <div class="flex items-center justify-between
                        px-5 py-4
                        border-b border-gray-100">

                <div>

                    <h2 class="text-base font-extrabold text-dark-green">
                        Tambah Guru
                    </h2>

                    <p class="text-[11px] text-gray-500 mt-0.5">
                        Tambahkan data guru baru
                    </p>

                </div>


                <button type="button"
                        onclick="closeTambahGuru()"
                        class="w-8 h-8 rounded-lg
                               bg-gray-100
                               hover:bg-gray-200
                               text-gray-500
                               flex items-center justify-center
                               transition-all duration-200
                               active:scale-95">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>


            <!-- FORM -->
            <form id="formTambahGuru"
                  onsubmit="event.preventDefault(); showConfirmTambahGuru();"
                  class="p-5 space-y-4">


                <!-- NAMA -->
                <div>

                    <label class="block text-xs font-bold
                                  text-dark-green mb-1.5">

                        Nama Lengkap

                    </label>

                    <input type="text"
                           id="namaGuru"
                           required
                           placeholder="Masukkan nama lengkap"
                           class="w-full
                                  border border-gray-200
                                  rounded-xl
                                  px-3.5 py-3
                                  text-xs
                                  focus:outline-none
                                  focus:ring-2
                                  focus:ring-mint-green/40
                                  focus:border-medium-green
                                  transition-all duration-200">

                </div>


                <!-- NIP -->
                <div>

                    <label class="block text-xs font-bold
                                  text-dark-green mb-1.5">

                        NIP

                    </label>

                    <input type="text"
                           id="nipGuru"
                           required
                           placeholder="Masukkan NIP"
                           class="w-full
                                  border border-gray-200
                                  rounded-xl
                                  px-3.5 py-3
                                  text-xs
                                  focus:outline-none
                                  focus:ring-2
                                  focus:ring-mint-green/40
                                  focus:border-medium-green
                                  transition-all duration-200">

                </div>


                <!-- MATA PELAJARAN -->
                <div>

                    <label class="block text-xs font-bold
                                  text-dark-green mb-1.5">

                        Mata Pelajaran

                    </label>

                    <select id="mapelGuru"
                            onchange="handleMapelChange()"
                            required
                            class="w-full
                                   border border-gray-200
                                   rounded-xl
                                   px-3.5 py-3
                                   text-xs bg-white
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-mint-green/40
                                   focus:border-medium-green
                                   transition-all duration-200">

                        <option value="">
                            Pilih Mata Pelajaran
                        </option>

                        <option value="Matematika">
                            Matematika
                        </option>

                        <option value="Bahasa Indonesia">
                            Bahasa Indonesia
                        </option>

                        <option value="Bahasa Inggris">
                            Bahasa Inggris
                        </option>

                        <option value="Informatika">
                            Informatika
                        </option>

                        <option value="Bimbingan Konseling">
                            Bimbingan Konseling
                        </option>

                        <option value="Bahasa Daerah">
                            Bahasa Daerah
                        </option>

                        <option value="__tambah__">
                            + Tambah Mata Pelajaran
                        </option>

                    </select>

                </div>


                <!-- STATUS -->
                <div>

                    <label class="block text-xs font-bold
                                  text-dark-green mb-1.5">

                        Status

                    </label>

                    <select id="statusGuru"
                            class="w-full
                                   border border-gray-200
                                   rounded-xl
                                   px-3.5 py-3
                                   text-xs bg-white
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-mint-green/40
                                   focus:border-medium-green
                                   transition-all duration-200">

                        <option value="Aktif">
                            Aktif
                        </option>

                        <option value="Tidak Aktif">
                            Tidak Aktif
                        </option>

                    </select>

                </div>


                <!-- BUTTON -->
                <div class="flex justify-end gap-2 pt-2">

                    <button type="button"
                            onclick="closeTambahGuru()"
                            class="px-4 py-2.5
                                   rounded-xl
                                   bg-gray-100
                                   hover:bg-gray-200
                                   active:scale-95
                                   text-gray-600
                                   text-xs font-bold
                                   transition-all duration-200">

                        Batal

                    </button>


                    <button type="submit"
                            class="px-4 py-2.5
                                   rounded-xl
                                   bg-dark-green
                                   hover:bg-medium-green
                                   active:scale-95
                                   text-white
                                   text-xs font-bold
                                   transition-all duration-200
                                   inline-flex items-center gap-2">

                        <i class="fa-solid fa-floppy-disk"></i>

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>


    <!-- ====================================================== -->
    <!-- POPUP KONFIRMASI TAMBAH GURU -->
    <!-- ====================================================== -->

    <div id="confirmTambahGuruModal"
         class="fixed inset-0 z-[60] hidden
                items-center justify-center p-4">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>


        <!-- Modal -->
        <div class="relative w-full max-w-sm
                    bg-white rounded-2xl shadow-xl
                    p-5 text-center
                    transform transition-all duration-200">


            <div class="w-12 h-12 mx-auto
                        rounded-full
                        bg-emerald-50
                        text-medium-green
                        flex items-center justify-center
                        mb-3">

                <i class="fa-solid fa-circle-question text-xl"></i>

            </div>


            <h2 class="text-base font-extrabold text-dark-green">

                Yakin ingin menambahkan guru?

            </h2>


            <p class="text-xs text-gray-500
                      mt-2 leading-relaxed">

                Pastikan data guru yang dimasukkan sudah benar.

            </p>


            <div class="flex justify-center gap-2 mt-5">

                <button type="button"
                        onclick="closeConfirmTambahGuru()"
                        class="px-4 py-2.5
                               rounded-xl
                               bg-gray-100
                               hover:bg-gray-200
                               active:scale-95
                               text-gray-600
                               text-xs font-bold
                               transition-all duration-200">

                    Batal

                </button>


                <button type="button"
                        onclick="confirmTambahGuru()"
                        class="px-4 py-2.5
                               rounded-xl
                               bg-dark-green
                               hover:bg-medium-green
                               active:scale-95
                               text-white
                               text-xs font-bold
                               transition-all duration-200">

                    Ya, Simpan

                </button>

            </div>

        </div>

    </div>


    <!-- ====================================================== -->
    <!-- POPUP TAMBAH MATA PELAJARAN -->
    <!-- ====================================================== -->

    <div id="tambahMapelModal"
         class="fixed inset-0 z-[70] hidden
                items-center justify-center p-4">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"
             onclick="closeTambahMapel()"></div>


        <!-- Modal -->
        <div class="relative w-full max-w-sm
                    bg-white rounded-2xl shadow-xl
                    overflow-hidden">


            <!-- HEADER -->
            <div class="flex items-center justify-between
                        px-5 py-4
                        border-b border-gray-100">

                <div>

                    <h2 class="text-base font-extrabold
                              text-dark-green">

                        Tambah Mata Pelajaran

                    </h2>

                    <p class="text-[11px] text-gray-500 mt-0.5">

                        Tambahkan mata pelajaran baru

                    </p>

                </div>


                <button type="button"
                        onclick="closeTambahMapel()"
                        class="w-8 h-8 rounded-lg
                               bg-gray-100
                               hover:bg-gray-200
                               active:scale-95
                               text-gray-500
                               flex items-center justify-center
                               transition-all duration-200">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>


            <!-- CONTENT -->
            <div class="p-5">

                <label class="block text-xs font-bold
                              text-dark-green mb-1.5">

                    Nama Mata Pelajaran

                </label>


                <input type="text"
                       id="namaMapelBaru"
                       placeholder="Contoh: Pemrograman Web"
                       class="w-full
                              border border-gray-200
                              rounded-xl
                              px-3.5 py-3
                              text-xs
                              focus:outline-none
                              focus:ring-2
                              focus:ring-mint-green/40
                              focus:border-medium-green
                              transition-all duration-200">


                <div class="flex justify-end gap-2 mt-5">

                    <button type="button"
                            onclick="closeTambahMapel()"
                            class="px-4 py-2.5
                                   rounded-xl
                                   bg-gray-100
                                   hover:bg-gray-200
                                   active:scale-95
                                   text-gray-600
                                   text-xs font-bold
                                   transition-all duration-200">

                        Batal

                    </button>


                    <button type="button"
                            onclick="simpanMapelBaru()"
                            class="px-4 py-2.5
                                   rounded-xl
                                   bg-dark-green
                                   hover:bg-medium-green
                                   active:scale-95
                                   text-white
                                   text-xs font-bold
                                   transition-all duration-200">

                        Tambah

                    </button>

                </div>

            </div>

        </div>

    </div>


    <!-- ====================================================== -->
    <!-- JAVASCRIPT -->
    <!-- ====================================================== -->

    <script>

        /* =========================
           TAMBAH GURU
        ========================= */

        function openTambahGuru() {

            const modal = document.getElementById('tambahGuruModal');

            modal.classList.remove('hidden');
            modal.classList.add('flex');

        }


        function closeTambahGuru() {

            const modal = document.getElementById('tambahGuruModal');

            modal.classList.add('hidden');
            modal.classList.remove('flex');

        }


        function showConfirmTambahGuru() {

            const modal = document.getElementById('confirmTambahGuruModal');

            modal.classList.remove('hidden');
            modal.classList.add('flex');

        }


        function closeConfirmTambahGuru() {

            const modal = document.getElementById('confirmTambahGuruModal');

            modal.classList.add('hidden');
            modal.classList.remove('flex');

        }


        function confirmTambahGuru() {

            // FE sementara
            // Backend belum disambungkan

            closeConfirmTambahGuru();
            closeTambahGuru();

            document.getElementById('formTambahGuru').reset();

            alert('Data guru berhasil ditambahkan.');

        }


        /* =========================
           TAMBAH MATA PELAJARAN
        ========================= */

        function handleMapelChange() {

            const select = document.getElementById('mapelGuru');

            if (select.value === '__tambah__') {

                select.value = '';

                const modal = document.getElementById('tambahMapelModal');

                modal.classList.remove('hidden');
                modal.classList.add('flex');

                document.getElementById('namaMapelBaru').focus();

            }

        }


        function closeTambahMapel() {

            const modal = document.getElementById('tambahMapelModal');

            modal.classList.add('hidden');
            modal.classList.remove('flex');

            document.getElementById('namaMapelBaru').value = '';

        }


        function simpanMapelBaru() {

            const input = document.getElementById('namaMapelBaru');

            const namaMapel = input.value.trim();

            if (!namaMapel) {

                alert('Nama mata pelajaran belum diisi.');

                input.focus();

                return;

            }


            const select = document.getElementById('mapelGuru');


            // Buat option baru
            const option = document.createElement('option');

            option.value = namaMapel;
            option.textContent = namaMapel;


            // Masukkan sebelum opsi tambah
            const tambahOption =
                select.querySelector('option[value="__tambah__"]');

            select.insertBefore(option, tambahOption);


            // Pilih mapel baru
            select.value = namaMapel;


            closeTambahMapel();

        }

    </script>

</body>

</html>