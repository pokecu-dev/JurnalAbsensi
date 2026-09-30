<!DOCTYPE html>
<html lang="id" class="overscroll-none">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>

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

<body class="bg-bg-cream text-dark-green font-sans min-h-screen">

    <!-- MOBILE HEADER -->
    <header class="md:hidden sticky top-0 z-40 bg-dark-green text-white px-4 py-3 flex items-center justify-between shadow-sm">
        <div class="flex items-center gap-2.5">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
            <div>
                <p class="text-xs font-extrabold">Jurnal Absensi</p>
                <p class="text-[9px] text-mint-green">Admin</p>
            </div>
        </div>
        <button id="mobileMenuBtn" type="button" class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center">
            <i class="fa-solid fa-bars text-sm"></i>
        </button>
    </header>

    <!-- MOBILE SIDEBAR (disamakan dengan Dashboard Admin) -->
    <div id="mobileOverlay" class="fixed inset-0 bg-dark-green/50 z-40 hidden"></div>
    <aside id="mobileSidebar" class="fixed left-0 top-0 bottom-0 z-50 w-64 bg-dark-green text-white p-6 -translate-x-full transition-transform duration-200 md:hidden flex flex-col justify-between">

        <div>

            <!-- LOGO -->
            <div class="flex flex-col items-center gap-2 mb-10 text-center">
                <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-16 h-auto">
                <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
            </div>

            <!-- NAVIGATION -->
            <nav class="flex flex-col gap-5 font-semibold text-xs">

                <!-- UTAMA -->
                <div>
                    <div class="text-[10px] uppercase font-extrabold text-gray-400 tracking-wider mb-2 px-2">
                        Utama
                    </div>

                    <div class="space-y-1">

                        <a href="{{ url('/admin/dashboard') }}"
                           class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-house w-4 text-center"></i>
                            Dashboard
                        </a>

                        <a href="{{ url('/admin/monitoring_jurnal') }}"
                           class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-book-bookmark w-4 text-center"></i>
                            Monitoring Jurnal
                        </a>

                        <a href="{{ url('/admin/data_dispensasi') }}"
                           class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-file-signature w-4 text-center"></i>
                            Dispensasi
                        </a>

                    </div>
                </div>

                <!-- DATA MASTER -->
                <div>
                    <div class="text-[10px] uppercase font-extrabold text-gray-400 tracking-wider mb-2 px-2">
                        Data Master
                    </div>

                    <div class="space-y-1">

                        <a href="{{ url('/admin/data_guru') }}"
                           class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-chalkboard-user w-4 text-center"></i>
                            Data Guru
                        </a>

                        <a href="{{ url('/admin/data_siswa') }}"
                           class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-user-graduate w-4 text-center"></i>
                            Data Siswa
                        </a>

                        <a href="{{ url('/admin/data_kelas') }}"
                           class="flex items-center gap-3 px-4 py-3 bg-white/10 text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-school w-4 text-center"></i>
                            Data Kelas
                        </a>

                        <a href="{{ url('/admin/jadwal') }}"
                           class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-calendar-days w-4 text-center"></i>
                            Jadwal
                        </a>

                    </div>
                </div>

            </nav>

        </div>

        <!-- FOOTER SIDEBAR -->
        <div class="flex flex-col gap-1 pt-3 border-t border-white/10 text-xs">

            <a href="{{ url('/admin/akun') }}"
               class="flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                <i class="fa-solid fa-user-circle w-4"></i>
                <span>Akun Admin</span>
            </a>

            <a href="{{ route('logout') }}"
               class="w-full flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                <i class="fa-solid fa-right-from-bracket w-4"></i>
                <span>Logout</span>
            </a>

        </div>

    </aside>

    <div class="flex min-h-screen">
        <!-- DESKTOP SIDEBAR -->
        <aside class="hidden md:flex md:w-56 bg-dark-green text-white flex-col justify-between p-5 shrink-0 h-screen sticky top-0">
            <div>
                <div class="flex flex-col items-center justify-center gap-1.5 mb-7 text-center">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-12 h-auto object-contain">
                    <span class="text-sm font-bold tracking-wide">Jurnal Absensi</span>
                </div>

                <nav class="flex flex-col gap-4 text-xs font-semibold">
                    <div>
                        <div class="text-[10px] uppercase font-extrabold text-gray-400 tracking-wider mb-1.5 px-2">Utama</div>
                        <div class="space-y-0.5">
                            <a href="{{ url('/admin/dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                                <i class="fa-solid fa-house w-4 text-center"></i> Dashboard
                            </a>
                            <a href="{{ url('/admin/monitoring_jurnal') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                                <i class="fa-solid fa-book-bookmark w-4 text-center"></i> Monitoring Jurnal
                            </a>
                            <a href="{{ url('/admin/data_dispensasi') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                                <i class="fa-solid fa-file-signature w-4 text-center"></i> Dispensasi
                            </a>
                        </div>
                    </div>

                    <div>
                        <div class="text-[10px] uppercase font-extrabold text-gray-400 tracking-wider mb-1.5 px-2">Data Master</div>
                        <div class="space-y-0.5">
                            <a href="{{ url('/admin/data_guru') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                                <i class="fa-solid fa-chalkboard-user w-4 text-center"></i> Data Guru
                            </a>
                            <a href="{{ url('/admin/data_siswa') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                                <i class="fa-solid fa-user-graduate w-4 text-center"></i> Data Siswa
                            </a>
                            <a href="{{ url('/admin/data_kelas') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl bg-white/10 text-mint-green font-extrabold">
                                <i class="fa-solid fa-school w-4 text-center"></i> Data Kelas
                            </a>
    
                            <a href="{{ url('/admin/jadwal') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition">
                                <i class="fa-solid fa-calendar-days w-4 text-center"></i> Jadwal
                            </a>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="border-t border-white/10 pt-3">
                <a href="{{ url('/admin/akun') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-gray-300 hover:bg-white/5 hover:text-white transition text-xs">
                    <i class="fa-solid fa-user-circle w-4 text-center"></i> Akun Admin
                </a>
                <button type="button" class="flex items-center gap-3 px-3 py-2 rounded-xl text-red-400 hover:bg-red-500/10 transition w-full text-left text-xs mt-1">
                    <i class="fa-solid fa-arrow-right-from-bracket w-4 text-center"></i> Logout
                </button>
            </div>
        </aside>

        <!-- MAIN -->
        <main class="flex-1 min-w-0 p-4 sm:p-5 md:p-7 overflow-y-auto">
            <header class="mb-5 md:mb-6">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-[9px] sm:text-[10px] font-extrabold uppercase tracking-wider text-medium-green mb-1">Data Master</p>
                        <h1 class="text-xl sm:text-2xl font-extrabold text-dark-green">Data Kelas</h1>
                        <p class="text-[10px] sm:text-xs text-gray-500 mt-1">Lihat informasi kelas, wali kelas, dan ringkasan kehadiran siswa.</p>
                    </div>
                    <div class="hidden sm:flex w-10 h-10 rounded-xl bg-white border border-emerald-100 items-center justify-center text-medium-green shadow-sm">
                        <i class="fa-solid fa-school"></i>
                    </div>
                </div>
            </header>

            <!-- SUMMARY -->
            <section class="grid grid-cols-3 gap-2.5 sm:gap-3 mb-5">
                <div class="bg-white rounded-2xl border border-emerald-100 p-3 sm:p-4 shadow-sm">
                    <p class="text-[8px] sm:text-[9px] uppercase tracking-wider font-extrabold text-gray-400">Total Kelas</p>
                    <p id="totalKelas" class="text-lg sm:text-2xl font-black text-dark-green mt-1">0</p>
                </div>
                <div class="bg-white rounded-2xl border border-emerald-100 p-3 sm:p-4 shadow-sm">
                    <p class="text-[8px] sm:text-[9px] uppercase tracking-wider font-extrabold text-gray-400">Total Siswa</p>
                    <p id="totalSiswa" class="text-lg sm:text-2xl font-black text-dark-green mt-1">0</p>
                </div>
                <div class="bg-white rounded-2xl border border-emerald-100 p-3 sm:p-4 shadow-sm">
                    <p class="text-[8px] sm:text-[9px] uppercase tracking-wider font-extrabold text-gray-400">Hadir Hari Ini</p>
                    <p id="totalHadir" class="text-lg sm:text-2xl font-black text-medium-green mt-1">0</p>
                </div>
            </section>

            <!-- SEARCH + FILTER -->
            <section class="bg-white rounded-2xl border border-emerald-100 shadow-sm p-3 sm:p-4 mb-5">
                <div class="flex flex-col sm:flex-row gap-2.5">
                    <div class="relative flex-1">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px]"></i>
                        <input id="searchKelas" type="text" placeholder="Cari nama kelas, jurusan, atau wali kelas..." class="w-full rounded-xl border border-gray-200 bg-gray-50 pl-9 pr-3 py-2.5 text-[10px] sm:text-xs outline-none focus:bg-white focus:border-medium-green transition">
                    </div>
                    <select id="levelFilter" class="sm:w-36 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-[10px] sm:text-xs font-semibold outline-none focus:bg-white focus:border-medium-green">
                        <option value="semua">Semua Tingkat</option>
                        <option value="X">Kelas X</option>
                        <option value="XI">Kelas XI</option>
                        <option value="XII">Kelas XII</option>
                    </select>
                </div>
            </section>

            <!-- CLASS LIST -->
            <section>
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <h2 class="text-sm sm:text-base font-extrabold text-dark-green">Daftar Kelas</h2>
                        <p id="resultText" class="text-[9px] sm:text-[10px] text-gray-400 mt-0.5">Menampilkan semua kelas</p>
                    </div>
                </div>

                <div id="classGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3"></div>

                <div id="emptyState" class="hidden bg-white rounded-2xl border border-dashed border-gray-200 p-8 text-center">
                    <div class="w-11 h-11 rounded-full bg-gray-50 text-gray-300 flex items-center justify-center mx-auto mb-3">
                        <i class="fa-solid fa-school"></i>
                    </div>
                    <p class="text-xs font-extrabold text-gray-500">Kelas tidak ditemukan</p>
                    <p class="text-[10px] text-gray-400 mt-1">Coba ubah kata pencarian atau filter tingkat.</p>
                </div>
            </section>
        </main>
    </div>

    <!-- =========================================================
         MOBILE SCROLL HELPER
    ========================================================== -->

    <div
        id="scrollHelper"
        class="md:hidden fixed right-2 sm:right-3 top-1/2
               -translate-y-1/2 z-30
               flex flex-col items-center gap-1">

        <!-- SCROLL KE ATAS -->

        <button
            type="button"
            onclick="scrollToTop()"
            aria-label="Kembali ke atas"
            class="w-7 h-7 rounded-full
                   bg-white/95
                   border border-emerald-100
                   shadow-md
                   text-medium-green
                   flex items-center justify-center
                   active:scale-90
                   transition">

            <i class="fa-solid fa-chevron-up text-[9px]"></i>

        </button>


        <!-- SCROLL INDICATOR -->

        <div
            class="relative
                   w-1
                   h-28
                   bg-dark-green/10
                   rounded-full
                   overflow-hidden">

            <div
                id="scrollIndicator"
                class="absolute left-0 top-0
                       w-1 h-8
                       bg-medium-green
                       rounded-full
                       transition-[top] duration-150 ease-out">
            </div>

        </div>


        <!-- SCROLL KE BAWAH -->

        <button
            type="button"
            onclick="scrollToBottom()"
            aria-label="Ke bagian bawah"
            class="w-7 h-7 rounded-full
                   bg-white/95
                   border border-emerald-100
                   shadow-md
                   text-medium-green
                   flex items-center justify-center
                   active:scale-90
                   transition">

            <i class="fa-solid fa-chevron-down text-[9px]"></i>

        </button>

    </div>



    <!-- DETAIL MODAL -->
    <div id="classModal" class="fixed inset-0 z-[100] hidden items-end sm:items-center justify-center bg-dark-green/50 backdrop-blur-sm p-0 sm:p-4">
        <div class="bg-white w-full sm:max-w-2xl max-h-[92vh] sm:max-h-[88vh] rounded-t-3xl sm:rounded-3xl shadow-2xl overflow-hidden flex flex-col">
            <div class="px-4 sm:px-6 py-4 border-b border-gray-100 flex items-start justify-between gap-3 shrink-0">
                <div class="min-w-0">
                    <p class="text-[9px] uppercase tracking-wider font-extrabold text-medium-green">Detail Kelas</p>
                    <h2 id="modalClassName" class="text-base sm:text-lg font-black text-dark-green mt-0.5">-</h2>
                    <p id="modalJurusan" class="text-[10px] text-gray-400 mt-0.5">-</p>
                </div>
                <button type="button" onclick="closeClassModal()" class="w-9 h-9 rounded-xl bg-gray-50 text-gray-400 hover:text-dark-green hover:bg-gray-100 flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="overflow-y-auto p-4 sm:p-6 space-y-4">
                <!-- WALI + SEKRETARIS -->
                <div class="grid grid-cols-2 gap-2.5">
                    <div class="rounded-2xl bg-emerald-50/60 border border-emerald-100 p-3.5">
                        <p class="text-[8px] uppercase tracking-wider font-extrabold text-gray-400">Wali Kelas</p>
                        <p id="modalWali" class="text-xs sm:text-sm font-extrabold text-dark-green mt-1">-</p>
                    </div>
                    <div class="rounded-2xl bg-gray-50 border border-gray-100 p-3.5">
                        <p class="text-[8px] uppercase tracking-wider font-extrabold text-gray-400">Sekretaris</p>
                        <p id="modalSekretaris" class="text-xs sm:text-sm font-extrabold text-dark-green mt-1">-</p>
                    </div>
                </div>

                <!-- ATTENDANCE -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <h3 class="text-xs sm:text-sm font-extrabold text-dark-green">Kehadiran Siswa Hari Ini</h3>
                            <p class="text-[9px] text-gray-400 mt-0.5">Ringkasan kehadiran kelas</p>
                        </div>
                        <span id="modalTotalSiswa" class="text-[9px] font-bold text-gray-400">0 siswa</span>
                    </div>

                    <div class="grid grid-cols-4 gap-1.5 sm:gap-2">
                        <div class="rounded-xl bg-emerald-50 p-2.5 text-center">
                            <p id="modalHadir" class="text-sm sm:text-base font-black text-emerald-700">0</p>
                            <p class="text-[8px] font-bold text-emerald-600">Hadir</p>
                        </div>
                        <div class="rounded-xl bg-blue-50 p-2.5 text-center">
                            <p id="modalIzin" class="text-sm sm:text-base font-black text-blue-700">0</p>
                            <p class="text-[8px] font-bold text-blue-600">Izin</p>
                        </div>
                        <div class="rounded-xl bg-amber-50 p-2.5 text-center">
                            <p id="modalSakit" class="text-sm sm:text-base font-black text-amber-700">0</p>
                            <p class="text-[8px] font-bold text-amber-600">Sakit</p>
                        </div>
                        <div class="rounded-xl bg-rose-50 p-2.5 text-center">
                            <p id="modalAlpha" class="text-sm sm:text-base font-black text-rose-700">0</p>
                            <p class="text-[8px] font-bold text-rose-600">Alpha</p>
                        </div>
                    </div>
                </div>

                <!-- STUDENTS -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-xs sm:text-sm font-extrabold text-dark-green">Daftar Siswa</h3>
                        <div class="relative w-36 sm:w-48">
                            <i class="fa-solid fa-magnifying-glass absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-400 text-[9px]"></i>
                            <input id="studentSearch" type="text" placeholder="Cari siswa..." class="w-full rounded-lg border border-gray-200 bg-gray-50 pl-7 pr-2 py-2 text-[9px] outline-none focus:bg-white focus:border-medium-green">
                        </div>
                    </div>

                    <div id="studentList" class="space-y-1.5"></div>
                    <div id="studentEmpty" class="hidden text-center py-5 text-[10px] text-gray-400">Siswa tidak ditemukan.</div>
                </div>
            </div>

            <div class="px-4 sm:px-6 py-3 border-t border-gray-100 bg-gray-50/70 shrink-0 flex justify-end">
                <button type="button" onclick="closeClassModal()" class="px-4 py-2.5 rounded-xl bg-dark-green text-white text-[10px] sm:text-xs font-bold hover:bg-medium-green transition">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <script>
        /*
         * Backend boleh mengirim $classes kapan saja.
         * Kalau belum ada data backend, halaman otomatis memakai dummy di bawah.
         * Tidak memakai fallback PHP array panjang agar aman dari ParseError.
         */
        const backendClasses = @json($classes ?? []);

        const dummyClasses = [
            {
                id: 1,
                name: 'X RPL 1',
                level: 'X',
                jurusan: 'Rekayasa Perangkat Lunak',
                wali: 'Budi Santoso, S.Kom.',
                sekretaris: 'Ahmad Fauzan',
                total_siswa: 35,
                hadir: 33,
                izin: 1,
                sakit: 1,
                alpha: 0,
                students: [
                    { name: 'Ahmad Fauzan', status: 'Hadir' },
                    { name: 'Citra Ayu', status: 'Hadir' },
                    { name: 'Dimas Pratama', status: 'Hadir' },
                    { name: 'Nabila Putri', status: 'Izin' },
                    { name: 'Rizky Maulana', status: 'Sakit' }
                ]
            },
            {
                id: 2,
                name: 'XI RPL 2',
                level: 'XI',
                jurusan: 'Rekayasa Perangkat Lunak',
                wali: 'Sulistyowati, S.Pd.',
                sekretaris: 'Rizky Pratama',
                total_siswa: 36,
                hadir: 34,
                izin: 1,
                sakit: 1,
                alpha: 0,
                students: [
                    { name: 'Ahmad Fauzan', status: 'Hadir' },
                    { name: 'Citra Ayu', status: 'Hadir' },
                    { name: 'Dina Putri', status: 'Izin' },
                    { name: 'Rizky Pratama', status: 'Sakit' },
                    { name: 'Siti Aisyah', status: 'Hadir' }
                ]
            },
            {
                id: 3,
                name: 'X DKV 1',
                level: 'X',
                jurusan: 'Desain Komunikasi Visual',
                wali: 'Hendra Wijaya, S.Pd.',
                sekretaris: 'Nabila Shafa',
                total_siswa: 36,
                hadir: 36,
                izin: 0,
                sakit: 0,
                alpha: 0,
                students: [
                    { name: 'Nabila Shafa', status: 'Hadir' },
                    { name: 'Fajar Ramadhan', status: 'Hadir' },
                    { name: 'Dinda Ayu', status: 'Hadir' }
                ]
            },
            {
                id: 4,
                name: 'XI TKI 2',
                level: 'XI',
                jurusan: 'Teknik Komputer dan Informatika',
                wali: 'Sulistyowati, M.T.',
                sekretaris: 'Rafi Setiawan',
                total_siswa: 34,
                hadir: 32,
                izin: 1,
                sakit: 1,
                alpha: 0,
                students: [
                    { name: 'Rafi Setiawan', status: 'Hadir' },
                    { name: 'Citra Ayu', status: 'Hadir' },
                    { name: 'Dewi Lestari', status: 'Izin' },
                    { name: 'Bagas Saputra', status: 'Sakit' }
                ]
            },
            {
                id: 5,
                name: 'X Pengembangan 1',
                level: 'X',
                jurusan: 'Pengembangan Perangkat Lunak dan Gim',
                wali: 'Ratna Kusuma, S.Pd.',
                sekretaris: 'Deni Firmansyah',
                total_siswa: 35,
                hadir: 35,
                izin: 0,
                sakit: 0,
                alpha: 0,
                students: [
                    { name: 'Deni Firmansyah', status: 'Hadir' },
                    { name: 'Alya Putri', status: 'Hadir' }
                ]
            },
            {
                id: 6,
                name: 'XII RPL 1',
                level: 'XII',
                jurusan: 'Rekayasa Perangkat Lunak',
                wali: 'Dewi Sartika, S.Kom.',
                sekretaris: 'Rendi Kurniawan',
                total_siswa: 35,
                hadir: 33,
                izin: 1,
                sakit: 0,
                alpha: 1,
                students: [
                    { name: 'Rendi Kurniawan', status: 'Hadir' },
                    { name: 'Nabila Putri', status: 'Hadir' },
                    { name: 'Fikri Ramadhan', status: 'Alpha' },
                    { name: 'Salsa Putri', status: 'Izin' }
                ]
            }
        ];

        const classes = Array.isArray(backendClasses) && backendClasses.length
            ? backendClasses
            : dummyClasses;

        let activeClass = null;

        const $ = id => document.getElementById(id);

        function normalizeClass(item) {
            const students = Array.isArray(item.students) ? item.students : [];

            return {
                id: item.id ?? item.class_id ?? item.name,
                name: item.name ?? item.nama ?? item.class_name ?? '-',
                level: item.level ?? item.tingkat ?? String(item.name ?? '').split(' ')[0],
                jurusan: item.jurusan ?? item.major ?? '-',
                wali: item.wali ?? item.wali_kelas ?? '-',
                sekretaris: item.sekretaris ?? item.secretary ?? '-',
                total_siswa: Number(item.total_siswa ?? item.total_students ?? students.length ?? 0),
                hadir: Number(item.hadir ?? item.attendance?.hadir ?? 0),
                izin: Number(item.izin ?? item.attendance?.izin ?? 0),
                sakit: Number(item.sakit ?? item.attendance?.sakit ?? 0),
                alpha: Number(item.alpha ?? item.attendance?.alpha ?? 0),
                students: students
            };
        }

        const normalizedClasses = classes.map(normalizeClass);

        function escapeHtml(value) {
            return String(value ?? '')
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        function statusClass(status) {
            const s = String(status).toLowerCase();
            if (s.includes('izin')) return 'bg-blue-50 text-blue-700';
            if (s.includes('sakit')) return 'bg-amber-50 text-amber-700';
            if (s.includes('alpha')) return 'bg-rose-50 text-rose-700';
            if (s.includes('dispensasi')) return 'bg-purple-50 text-purple-700';
            return 'bg-emerald-50 text-emerald-700';
        }

        function renderSummary() {
            $('totalKelas').textContent = normalizedClasses.length;
            $('totalSiswa').textContent = normalizedClasses.reduce((sum, c) => sum + c.total_siswa, 0);
            $('totalHadir').textContent = normalizedClasses.reduce((sum, c) => sum + c.hadir, 0);
        }

        function renderClasses() {
            const keyword = $('searchKelas').value.toLowerCase().trim();
            const level = $('levelFilter').value;

            const filtered = normalizedClasses.filter(c => {
                const haystack = `${c.name} ${c.jurusan} ${c.wali}`.toLowerCase();
                return haystack.includes(keyword) && (level === 'semua' || c.level === level);
            });

            $('classGrid').innerHTML = filtered.map(c => `
                <button type="button" onclick="openClassModal('${String(c.id).replace(/'/g, "\\'")}')"
                    class="group text-left bg-white rounded-2xl border border-emerald-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all overflow-hidden focus:outline-none focus:ring-2 focus:ring-medium-green/30">

                    <div class="p-3.5 sm:p-4">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-xl bg-emerald-50 text-medium-green flex items-center justify-center shrink-0">
                                        <i class="fa-solid fa-school text-xs"></i>
                                    </div>
                                    <div class="min-w-0">
                                        <h3 class="text-sm font-black text-dark-green truncate">${escapeHtml(c.name)}</h3>
                                        <p class="text-[9px] text-gray-400 truncate mt-0.5">${escapeHtml(c.jurusan)}</p>
                                    </div>
                                </div>
                            </div>
                            <span class="px-2 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[8px] font-extrabold shrink-0">Aktif</span>
                        </div>

                        <div class="mt-3 grid grid-cols-2 gap-2 text-[9px]">
                            <div class="rounded-xl bg-gray-50 p-2.5 min-w-0">
                                <p class="text-gray-400 font-bold">Wali Kelas</p>
                                <p class="font-extrabold text-dark-green truncate mt-0.5">${escapeHtml(c.wali)}</p>
                            </div>
                            <div class="rounded-xl bg-gray-50 p-2.5">
                                <p class="text-gray-400 font-bold">Jumlah Siswa</p>
                                <p class="font-extrabold text-dark-green mt-0.5">${c.total_siswa} siswa</p>
                            </div>
                        </div>

                        <div class="mt-2.5 flex items-center gap-1.5 flex-wrap">
                            <span class="px-2 py-1 rounded-lg bg-emerald-50 text-emerald-700 font-bold">${c.hadir} hadir</span>
                            ${c.izin ? `<span class="px-2 py-1 rounded-lg bg-blue-50 text-blue-700 font-bold">${c.izin} izin</span>` : ''}
                            ${c.sakit ? `<span class="px-2 py-1 rounded-lg bg-amber-50 text-amber-700 font-bold">${c.sakit} sakit</span>` : ''}
                            ${c.alpha ? `<span class="px-2 py-1 rounded-lg bg-rose-50 text-rose-700 font-bold">${c.alpha} alpha</span>` : ''}
                        </div>
                    </div>

                    <div class="px-3.5 sm:px-4 py-2.5 bg-gray-50/70 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-[9px] font-bold text-gray-400">Tap untuk lihat detail</span>
                        <span class="w-6 h-6 rounded-lg bg-white border border-gray-200 flex items-center justify-center text-gray-400 group-hover:text-medium-green group-hover:border-emerald-200 transition">
                            <i class="fa-solid fa-chevron-right text-[8px]"></i>
                        </span>
                    </div>
                </button>
            `).join('');

            $('emptyState').classList.toggle('hidden', filtered.length !== 0);
            $('resultText').textContent = `Menampilkan ${filtered.length} dari ${normalizedClasses.length} kelas`;
        }

        function openClassModal(id) {
            activeClass = normalizedClasses.find(c => String(c.id) === String(id));
            if (!activeClass) return;

            $('modalClassName').textContent = activeClass.name;
            $('modalJurusan').textContent = activeClass.jurusan;
            $('modalWali').textContent = activeClass.wali;
            $('modalSekretaris').textContent = activeClass.sekretaris;
            $('modalTotalSiswa').textContent = `${activeClass.total_siswa} siswa`;
            $('modalHadir').textContent = activeClass.hadir;
            $('modalIzin').textContent = activeClass.izin;
            $('modalSakit').textContent = activeClass.sakit;
            $('modalAlpha').textContent = activeClass.alpha;
            $('studentSearch').value = '';

            renderStudents();
            $('classModal').classList.remove('hidden');
            $('classModal').classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }

        function closeClassModal() {
            $('classModal').classList.add('hidden');
            $('classModal').classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
            activeClass = null;
        }

        function renderStudents() {
            if (!activeClass) return;

            const keyword = $('studentSearch').value.toLowerCase().trim();
            const students = activeClass.students.filter(s => {
                const name = String(s.name ?? s.nama ?? '').toLowerCase();
                return name.includes(keyword);
            });

            $('studentList').innerHTML = students.map((s, index) => {
                const name = s.name ?? s.nama ?? '-';
                const status = s.status ?? 'Hadir';
                return `
                    <div class="flex items-center justify-between gap-3 rounded-xl border border-gray-100 bg-gray-50 px-3 py-2.5">
                        <div class="flex items-center gap-2.5 min-w-0">
                            <span class="w-6 h-6 rounded-lg bg-white border border-gray-100 text-[8px] font-black text-gray-400 flex items-center justify-center shrink-0">${String(index + 1).padStart(2, '0')}</span>
                            <p class="text-[10px] sm:text-xs font-bold text-dark-green truncate">${escapeHtml(name)}</p>
                        </div>
                        <span class="px-2 py-1 rounded-lg text-[8px] font-extrabold shrink-0 ${statusClass(status)}">${escapeHtml(status)}</span>
                    </div>
                `;
            }).join('');

            $('studentEmpty').classList.toggle('hidden', students.length !== 0);
        }

        $('searchKelas').addEventListener('input', renderClasses);
        $('levelFilter').addEventListener('change', renderClasses);
        $('studentSearch').addEventListener('input', renderStudents);

        $('classModal').addEventListener('click', event => {
            if (event.target === $('classModal')) closeClassModal();
        });

        document.addEventListener('keydown', event => {
            if (event.key === 'Escape') closeClassModal();
        });

        // Mobile sidebar
        const mobileSidebar = $('mobileSidebar');
        const mobileOverlay = $('mobileOverlay');

        $('mobileMenuBtn').addEventListener('click', () => {
            mobileSidebar.classList.remove('-translate-x-full');
            mobileOverlay.classList.remove('hidden');
        });

        mobileOverlay.addEventListener('click', () => {
            mobileSidebar.classList.add('-translate-x-full');
            mobileOverlay.classList.add('hidden');
        });

        mobileSidebar.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    mobileSidebar.classList.add('-translate-x-full');
                    mobileOverlay.classList.add('hidden');
                }
            });
        });

        /* =====================================================
           MOBILE SCROLL HELPER
        ====================================================== */

        const scrollIndicator = $('scrollIndicator');

        function updateScrollIndicator() {
            if (!scrollIndicator) return;

            const scrollTop = window.scrollY || window.pageYOffset;
            const documentHeight = document.documentElement.scrollHeight;
            const windowHeight = window.innerHeight;
            const maxScroll = documentHeight - windowHeight;

            if (maxScroll <= 0) {
                scrollIndicator.style.top = '0px';
                return;
            }

            const trackHeight = 112; // h-28
            const indicatorHeight = 32; // h-8
            const maxTop = trackHeight - indicatorHeight;

            const progress = Math.min(1, Math.max(0, scrollTop / maxScroll));

            scrollIndicator.style.top = `${progress * maxTop}px`;
        }

        window.addEventListener('scroll', updateScrollIndicator, { passive: true });
        window.addEventListener('resize', updateScrollIndicator);

        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function scrollToBottom() {
            window.scrollTo({
                top: document.documentElement.scrollHeight,
                behavior: 'smooth'
            });
        }

        updateScrollIndicator();

        renderSummary();
        renderClasses();
    </script>
</body>
</html>