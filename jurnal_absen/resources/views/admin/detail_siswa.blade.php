<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Siswa</title>

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

                        <a href="{{ url('/admin/monitoring_jurnal') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-book-bookmark w-4 text-center"></i>
                            Monitoring Jurnal
                        </a>

                        <a href="{{ url('/admin/data_dispensasi') }}"
                           class="flex items-center gap-3 px-3 py-2 rounded-xl
                                  text-gray-300 hover:bg-white/5 hover:text-white transition">
                            <i class="fa-solid fa-file-signature w-4 text-center"></i>
                            Dispensasi
                        </a>

                    </div>

                </div>

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
                                  bg-white/10 text-mint-green font-bold">
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
        <a href="{{ url('/admin/data_siswa') }}"
           class="inline-flex items-center gap-2 text-xs font-bold
                  text-medium-green hover:text-dark-green transition mb-5">

            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Data Siswa

        </a>


        <!-- HEADER -->
        <header class="mb-5">

            <div class="flex flex-col sm:flex-row
                        sm:items-center sm:justify-between gap-4">

                <div>

                    <p class="text-[10px] font-bold uppercase
                              tracking-wider text-medium-green mb-1">
                        Data Siswa
                    </p>

                    <h1 class="text-xl md:text-2xl font-extrabold text-dark-green">
                        MARVEL MAULANA SAPUTRA
                    </h1>

                    <p class="text-xs text-gray-500 mt-1">
                        Detail informasi siswa.
                    </p>

                </div>

                <button
                    type="button"
                    onclick="openEditSiswa()"
                    class="inline-flex items-center justify-center gap-2
                           bg-dark-green hover:bg-medium-green
                           text-white text-xs font-bold
                           px-4 py-2.5 rounded-xl transition">

                    <i class="fa-solid fa-pen"></i>
                    Edit Siswa

                </button>

            </div>

        </header>


        <!-- INFORMASI SISWA -->
        <section class="bg-white rounded-2xl shadow-sm p-5 mb-5">

            <div class="flex items-center gap-3 mb-5">

                <div class="w-11 h-11 rounded-xl
                            bg-emerald-50 text-medium-green
                            flex items-center justify-center">

                    <i class="fa-solid fa-user-graduate"></i>

                </div>

                <div>

                    <h2 class="text-sm font-extrabold text-dark-green">
                        Informasi Siswa
                    </h2>

                    <p class="text-[10px] text-gray-400 mt-0.5">
                        Data dasar siswa.
                    </p>

                </div>

            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <!-- Nama -->
                <div class="bg-gray-50 rounded-xl p-4">

                    <p class="text-[10px] uppercase tracking-wider
                              font-bold text-gray-400 mb-1">
                        Nama Lengkap
                    </p>

                    <p class="text-xs font-extrabold text-dark-green">
                        MARVEL MAULANA SAPUTRA
                    </p>

                </div>


                <!-- Kelas -->
                <div class="bg-gray-50 rounded-xl p-4">

                    <p class="text-[10px] uppercase tracking-wider
                              font-bold text-gray-400 mb-1">
                        Kelas
                    </p>

                    <p class="text-xs font-extrabold text-dark-green">
                        XI RPL 2
                    </p>

                </div>

            </div>

        </section>


        <!-- RIWAYAT ABSENSI -->
        <section class="bg-white rounded-2xl shadow-sm overflow-hidden">

            <div class="px-5 py-4 border-b border-gray-100">

                <h2 class="text-sm font-extrabold text-dark-green">
                    Riwayat Absensi
                </h2>

                <p class="text-[10px] text-gray-400 mt-0.5">
                    Riwayat kehadiran siswa.
                </p>

            </div>


            <div class="divide-y divide-gray-100">

                <!-- RIWAYAT 1 -->
                <div class="px-5 py-4 flex items-center
                            justify-between gap-3">

                    <div>

                        <p class="text-xs font-bold text-dark-green">
                            Rabu, 23 September 2026
                        </p>

                        <p class="text-[10px] text-gray-400 mt-0.5">
                            Matematika Terapan
                        </p>

                    </div>

                    <span class="bg-emerald-50 text-emerald-700
                                 text-[10px] font-bold
                                 px-2.5 py-1 rounded-lg">
                        Hadir
                    </span>

                </div>


                <!-- RIWAYAT 2 -->
                <div class="px-5 py-4 flex items-center
                            justify-between gap-3">

                    <div>

                        <p class="text-xs font-bold text-dark-green">
                            Selasa, 22 September 2026
                        </p>

                        <p class="text-[10px] text-gray-400 mt-0.5">
                            Bahasa Indonesia
                        </p>

                    </div>

                    <span class="bg-emerald-50 text-emerald-700
                                 text-[10px] font-bold
                                 px-2.5 py-1 rounded-lg">
                        Hadir
                    </span>

                </div>


                <!-- RIWAYAT 3 -->
                <div class="px-5 py-4 flex items-center
                            justify-between gap-3">

                    <div>

                        <p class="text-xs font-bold text-dark-green">
                            Senin, 21 September 2026
                        </p>

                        <p class="text-[10px] text-gray-400 mt-0.5">
                            Informatika
                        </p>

                    </div>

                    <span class="bg-amber-50 text-amber-700
                                 text-[10px] font-bold
                                 px-2.5 py-1 rounded-lg">
                        Izin
                    </span>

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


    <!-- POPUP EDIT SISWA -->
    <div id="editSiswaModal"
         class="fixed inset-0 z-50 hidden items-center
                justify-center bg-black/40 px-4">

        <div class="bg-white w-full max-w-md rounded-2xl
                    shadow-xl overflow-hidden">

            <div class="flex items-center justify-between
                        px-5 py-4 border-b">

                <div>

                    <h2 class="text-base font-extrabold text-dark-green">
                        Edit Siswa
                    </h2>

                    <p class="text-[11px] text-gray-500 mt-1">
                        Ubah informasi siswa.
                    </p>

                </div>

                <button
                    type="button"
                    onclick="closeEditSiswa()"
                    class="w-8 h-8 rounded-lg hover:bg-gray-100
                           text-gray-500 flex items-center justify-center">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>


            <div class="p-5 space-y-4">

                <!-- Nama -->
                <div>

                    <label class="block text-xs font-bold
                                  text-dark-green mb-1.5">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        value="MARVEL MAULANA SAPUTRA"
                        class="w-full border border-gray-200
                               rounded-xl px-3 py-2.5 text-sm
                               outline-none focus:border-medium-green
                               focus:ring-2 focus:ring-medium-green/10">

                </div>


                <!-- Kelas -->
                <div>

                    <label class="block text-xs font-bold
                                  text-dark-green mb-1.5">
                        Kelas
                    </label>

                    <select
                        class="w-full border border-gray-200
                               rounded-xl px-3 py-2.5 text-sm
                               bg-white outline-none
                               focus:border-medium-green
                               focus:ring-2 focus:ring-medium-green/10">

                        <option>XI RPL 1</option>
                        <option selected>XI RPL 2</option>
                        <option>XI TKJ 1</option>
                        <option>XI AKL 1</option>

                    </select>

                </div>


                <div class="flex justify-end gap-2 pt-2">

                    <button
                        type="button"
                        onclick="closeEditSiswa()"
                        class="px-4 py-2.5 rounded-xl
                               text-xs font-bold text-gray-600
                               bg-gray-100 hover:bg-gray-200 transition">
                        Batal
                    </button>

                    <button
                        type="button"
                        onclick="confirmEditSiswa()"
                        class="px-4 py-2.5 rounded-xl
                               text-xs font-bold text-white
                               bg-dark-green hover:bg-medium-green transition">
                        <i class="fa-solid fa-check mr-1"></i>
                        Simpan
                    </button>

                </div>

            </div>

        </div>

    </div>


    <!-- KONFIRMASI EDIT -->
    <div id="confirmEditSiswaModal"
         class="fixed inset-0 z-[60] hidden items-center
                justify-center bg-black/40 px-4">

        <div class="bg-white w-full max-w-sm rounded-2xl
                    shadow-xl p-5 text-center">

            <div class="w-12 h-12 mx-auto rounded-full
                        bg-mint-green/20 text-dark-green
                        flex items-center justify-center mb-3">

                <i class="fa-solid fa-circle-question text-lg"></i>

            </div>

            <h2 class="text-base font-extrabold text-dark-green">
                Simpan perubahan?
            </h2>

            <p class="text-xs text-gray-500 mt-1.5">
                Pastikan data siswa sudah benar.
            </p>

            <div class="flex justify-center gap-2 mt-5">

                <button
                    type="button"
                    onclick="closeConfirmEditSiswa()"
                    class="px-4 py-2.5 rounded-xl
                           text-xs font-bold text-gray-600
                           bg-gray-100 hover:bg-gray-200 transition">
                    Batal
                </button>

                <button
                    type="button"
                    onclick="simpanEditSiswa()"
                    class="px-4 py-2.5 rounded-xl
                           text-xs font-bold text-white
                           bg-dark-green hover:bg-medium-green transition">
                    Ya, Simpan
                </button>

            </div>

        </div>

    </div>


    <script>

        function openEditSiswa() {
            document.getElementById('editSiswaModal')
                .classList.remove('hidden');

            document.getElementById('editSiswaModal')
                .classList.add('flex');
        }


        function closeEditSiswa() {
            document.getElementById('editSiswaModal')
                .classList.add('hidden');

            document.getElementById('editSiswaModal')
                .classList.remove('flex');
        }


        function confirmEditSiswa() {
            document.getElementById('confirmEditSiswaModal')
                .classList.remove('hidden');

            document.getElementById('confirmEditSiswaModal')
                .classList.add('flex');
        }


        function closeConfirmEditSiswa() {
            document.getElementById('confirmEditSiswaModal')
                .classList.add('hidden');

            document.getElementById('confirmEditSiswaModal')
                .classList.remove('flex');
        }


        function simpanEditSiswa() {

            closeConfirmEditSiswa();
            closeEditSiswa();

            alert('Perubahan data siswa berhasil disimpan.');

        }

    </script>

</body>
</html>