<!DOCTYPE html>
<html lang="id" class="overscroll-none">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal Kelas</title>

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

    <style>
        html { scroll-behavior: smooth; }
        body { overflow-x: hidden; }
        #scrollIndicator { transition: top 0.15s ease-out; }
    </style>
</head>

<body class="bg-bg-cream text-dark-green font-sans min-h-screen overflow-x-hidden overscroll-none">

    <!-- MOBILE HEADER -->
    <div class="md:hidden bg-dark-green text-white p-4 flex items-center justify-between sticky top-0 z-40 shadow-sm">
        <div class="flex items-center gap-2">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
            <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
        </div>
        <button id="hamburgerBtn" type="button" class="w-9 h-9 rounded-lg flex items-center justify-center hover:bg-white/10 transition focus:outline-none">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden"></div>

    <!-- SIDEBAR -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 w-60 bg-dark-green text-white p-6 flex flex-col justify-between z-50
               -translate-x-full md:translate-x-0 transition-transform duration-300">
        <div>
            <div class="flex flex-col items-center gap-2 mb-10 text-center">
                <img src="{{ asset('image/logo.png') }}" alt="Logo Jurnal Absensi" class="w-16 h-auto">
                <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
            </div>

            <nav class="flex flex-col gap-3 font-semibold text-xs">
                <a href="{{ url('/sekre/dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                    <i class="fa-solid fa-house w-4 text-center"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ url('/sekre/jurnal') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-white/10 text-mint-green rounded-xl transition active:scale-[0.98]">
                    <i class="fa-solid fa-book-open w-4 text-center"></i>
                    <span>Jurnal</span>
                </a>
                <a href="{{ url('/sekre/jadwal') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                    <i class="fa-regular fa-calendar-days w-4 text-center"></i>
                    <span>Jadwal Mata Pelajaran</span>
                </a>
            </nav>
        </div>

        <div class="flex flex-col gap-1 pt-3 border-t border-white/10 text-xs">
             <a href="{{ url('/sekre/akun') }}"
                class="flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                <i class="fa-solid fa-user-circle w-4"></i>
                <span>Akun Sekre</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                    <i class="fa-solid fa-arrow-right-from-bracket w-4"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN -->
    <main class="min-w-0 p-4 pb-32 md:p-8 md:pb-32 md:ml-60 max-w-full md:max-w-[calc(100%-15rem)] space-y-4 md:space-y-6">

        <!-- HEADER -->
        <header class="flex items-center justify-between gap-3">
            <div class="min-w-0">
                <h1 class="text-lg sm:text-xl md:text-2xl font-black text-dark-green truncate">Jurnal Kelas XI DKV 2</h1>
                <p class="text-[11px] sm:text-xs text-gray-400 font-semibold mt-1">
                    Cek jurnal tiap mata pelajaran, perbaiki jika perlu, lalu kirim satu paket ke Guru Piket saat pulang sekolah.
                </p>
            </div>
            <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                <div class="text-right leading-tight">
                    <div id="live-date" class="text-[9px] sm:text-[10px] md:text-xs font-semibold text-medium-green whitespace-nowrap">memuat tanggal....</div>
                    <div id="live-clock" class="text-[10px] sm:text-xs font-extrabold text-dark-green mt-0.5">00.00 WIB</div>
                </div>
            </div>
        </header>

        <!-- RINGKASAN = FILTER STATUS -->
        <div class="grid grid-cols-3 gap-3 md:gap-[18px]">
            <button type="button" data-filter="all"
                class="filter-card text-left bg-white border-[1.5px] border-[#E5DCCE] rounded-2xl p-3.5 md:p-5 flex items-center gap-3 md:gap-3.5 transition active:scale-[0.98]">
                <div class="w-10 h-10 md:w-11 md:h-11 rounded-xl bg-blue-100 text-blue-500 flex items-center justify-center text-lg md:text-xl shrink-0">
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <div class="min-w-0">
                    <p class="text-[9px] md:text-[11px] text-gray-400 font-medium leading-tight">Semua Jurnal</p>
                    <p id="countAll" class="text-lg md:text-2xl font-bold text-dark-green">0</p>
                </div>
            </button>

            <button type="button" data-filter="belum"
                class="filter-card text-left bg-white border-[1.5px] border-amber-200 rounded-2xl p-3.5 md:p-5 flex items-center gap-3 md:gap-3.5 transition active:scale-[0.98]">
                <div class="w-10 h-10 md:w-11 md:h-11 rounded-xl bg-amber-100 text-amber-500 flex items-center justify-center text-lg md:text-xl shrink-0">
                    <i class="fa-solid fa-hourglass-half"></i>
                </div>
                <div class="min-w-0">
                    <p class="text-[9px] md:text-[11px] text-gray-400 font-medium leading-tight">Belum Dikirim</p>
                    <p id="countBelum" class="text-lg md:text-2xl font-bold text-amber-600">0</p>
                </div>
            </button>

            <button type="button" data-filter="terkirim"
                class="filter-card text-left bg-white border-[1.5px] border-[#E5DCCE] rounded-2xl p-3.5 md:p-5 flex items-center gap-3 md:gap-3.5 transition active:scale-[0.98]">
                <div class="w-10 h-10 md:w-11 md:h-11 rounded-xl bg-emerald-100 text-emerald-500 flex items-center justify-center text-lg md:text-xl shrink-0">
                    <i class="fa-solid fa-paper-plane"></i>
                </div>
                <div class="min-w-0">
                    <p class="text-[9px] md:text-[11px] text-gray-400 font-medium leading-tight">Sudah Dikirim</p>
                    <p id="countTerkirim" class="text-lg md:text-2xl font-bold text-dark-green">0</p>
                </div>
            </button>
        </div>

        <!-- CARI -->
        <div class="bg-white rounded-2xl border-[1.5px] border-[#E5DCCE] p-4 md:p-5">
            <label for="searchInput" class="block text-[10px] font-extrabold text-gray-500 mb-1.5">Cari Mata Pelajaran / Guru</label>
            <div class="relative">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                <input id="searchInput" type="text" placeholder="Contoh: Matematika..."
                    class="w-full pl-9 pr-3 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-xs outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/30 transition">
            </div>
        </div>

        <!-- DAFTAR JURNAL (dirender oleh JS) -->
        <div id="journalList" class="space-y-3"></div>

        <div id="emptyState" class="hidden bg-white rounded-2xl border border-gray-100 p-10 text-center">
            <div class="w-12 h-12 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center mx-auto mb-3">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <p class="text-xs font-bold text-gray-500">Jurnal tidak ditemukan.</p>
        </div>
    </main>

    <!-- BAR KIRIM KE GURU PIKET -->
    <div id="sendBar" class="fixed bottom-0 left-0 right-0 md:left-60 z-30 bg-white border-t border-[#E5DCCE] px-4 py-3 md:px-8 shadow-[0_-4px_16px_rgba(26,49,44,0.06)]">
        <div class="flex items-center justify-between gap-3 max-w-full">
            <div class="min-w-0 flex-1">
                <p id="sendTitle" class="text-xs md:text-sm font-bold text-dark-green truncate">Kirim ke Guru Piket</p>
                <p id="sendInfo" class="text-[10px] md:text-[11px] text-gray-500 mt-0.5 truncate">-</p>
                <div id="sendProgressWrap" class="mt-1.5 h-1.5 w-full max-w-xs bg-gray-100 rounded-full overflow-hidden">
                    <div id="sendProgress" class="h-full bg-medium-green rounded-full transition-all duration-300" style="width:0%"></div>
                </div>
            </div>
            <button id="sendBtn" type="button" onclick="openSendConfirm()"
                class="shrink-0 px-4 md:px-5 py-2.5 rounded-full text-xs font-black whitespace-nowrap transition">
                <i class="fa-solid fa-paper-plane mr-1.5"></i>Kirim ke Piket
            </button>
        </div>
    </div>

    <!-- MODAL DETAIL / EDIT -->
    <div id="detailModal" class="fixed inset-0 bg-dark-green/60 z-[60] hidden items-center justify-center p-4 backdrop-blur-sm">
        <div class="bg-white rounded-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto shadow-2xl">
            <div class="p-5">
                <div class="flex items-start justify-between gap-3 pb-4 border-b border-gray-100">
                    <div>
                        <span id="dLabel" class="text-[9px] uppercase tracking-wider font-black text-medium-green">Tinjau Jurnal</span>
                        <h2 id="dMapel" class="text-lg font-black text-dark-green mt-1">-</h2>
                        <p id="dJam" class="text-xs text-medium-green font-semibold">-</p>
                    </div>
                    <button type="button" onclick="closeDetail()" aria-label="Tutup" class="w-8 h-8 rounded-full bg-emerald-50 text-dark-green flex items-center justify-center hover:bg-mint-green transition shrink-0">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <div class="space-y-3 mt-4">
                    <!-- Guru (hanya lihat) -->
                    <div class="p-3 rounded-xl bg-gray-50">
                        <p class="text-[9px] text-gray-400 font-bold uppercase">Guru Pengajar</p>
                        <p id="dGuru" class="text-xs font-bold text-dark-green mt-1">-</p>
                    </div>

                    <!-- Materi (bisa diedit) -->
                    <div>
                        <label for="dMateri" class="text-[10px] font-bold text-gray-500">Materi Pembelajaran</label>
                        <textarea id="dMateri" rows="3" placeholder="Isi materi jika guru belum mengisi..."
                            class="w-full mt-1.5 rounded-xl border border-gray-200 bg-white px-3 py-2.5 text-xs outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/30 transition resize-none disabled:bg-gray-50 disabled:text-gray-500"></textarea>
                        <p id="dError" class="hidden text-[10px] font-semibold text-red-600 mt-1">Materi belum diisi. Isi dulu sebelum menandai sudah dicek.</p>
                    </div>

                    <!-- Keterangan (hanya lihat) -->
                    <div class="p-3 rounded-xl bg-gray-50">
                        <p class="text-[9px] text-gray-400 font-bold uppercase">Keterangan / Aktivitas (dari guru)</p>
                        <p id="dKeterangan" class="text-xs text-gray-600 leading-relaxed mt-1">-</p>
                    </div>

                    <!-- Kehadiran (bisa diedit) -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <p class="text-[10px] font-bold text-gray-500">Kehadiran Siswa</p>
                            <p id="dSummary" class="text-[10px] font-semibold text-medium-green">-</p>
                        </div>
                        <div id="dSiswa" class="rounded-xl border border-gray-100 divide-y divide-gray-100 overflow-hidden"></div>
                    </div>
                </div>

                <p id="dLocked" class="hidden mt-4 text-[10px] md:text-[11px] text-gray-500 bg-gray-50 rounded-xl p-3">
                    <i class="fa-solid fa-lock mr-1"></i>Jurnal ini sudah dikirim ke Guru Piket dan tidak bisa diedit lagi.
                </p>

                <div id="dFooter" class="flex gap-2 mt-5">
                    <button type="button" onclick="closeDetail()"
                        class="flex-1 py-2.5 rounded-xl border border-gray-200 text-gray-600 text-xs font-bold hover:bg-gray-50 transition">
                        Batal
                    </button>
                    <button type="button" onclick="simpanJurnal()"
                        class="flex-[1.6] py-2.5 rounded-xl bg-dark-green hover:bg-medium-green text-white text-xs font-black transition">
                        Simpan &amp; Tandai Sudah Dicek
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL KONFIRMASI KIRIM -->
    <div id="sendModal" class="fixed inset-0 bg-dark-green/60 z-[60] hidden items-center justify-center p-4 backdrop-blur-sm">
        <div class="bg-white rounded-2xl w-full max-w-sm shadow-2xl p-5">
            <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg mb-3">
                <i class="fa-solid fa-paper-plane"></i>
            </div>
            <h3 class="text-base font-black text-dark-green">Kirim jurnal ke Guru Piket?</h3>
            <p id="sendConfirmText" class="text-xs text-gray-500 mt-1.5 leading-relaxed">-</p>
            <div class="flex gap-2 mt-5">
                <button type="button" onclick="closeSendConfirm()"
                    class="flex-1 py-2.5 rounded-xl border border-gray-200 text-gray-600 text-xs font-bold hover:bg-gray-50 transition">
                    Belum
                </button>
                <button type="button" onclick="kirimKePiket()"
                    class="flex-1 py-2.5 rounded-xl bg-dark-green hover:bg-medium-green text-white text-xs font-black transition">
                    Ya, Kirim
                </button>
            </div>
        </div>
    </div>

    <!-- TOAST -->
    <div id="toast" class="fixed bottom-24 left-1/2 -translate-x-1/2 z-[100] hidden">
        <div class="bg-dark-green text-white px-4 py-3 rounded-xl shadow-xl flex items-center gap-2">
            <i class="fa-solid fa-circle-check text-mint-green"></i>
            <span id="toastText" class="text-xs font-bold">Berhasil.</span>
        </div>
    </div>

    <!-- SCROLL HELPER -->
    <div id="scrollHelper" class="md:hidden fixed right-2 sm:right-3 top-1/2 -translate-y-1/2 z-30 flex flex-col items-center gap-1">
        <button type="button" onclick="scrollToTop()" aria-label="Kembali ke atas"
            class="w-7 h-7 rounded-full bg-white/95 border border-emerald-100 shadow-md text-medium-green flex items-center justify-center active:scale-90 transition">
            <i class="fa-solid fa-chevron-up text-[9px]"></i>
        </button>
        <div class="relative w-1 h-28 bg-dark-green/10 rounded-full overflow-hidden">
            <div id="scrollIndicator" class="absolute left-0 top-0 w-1 h-8 bg-medium-green rounded-full"></div>
        </div>
        <button type="button" onclick="scrollToBottom()" aria-label="Ke bagian bawah"
            class="w-7 h-7 rounded-full bg-white/95 border border-emerald-100 shadow-md text-medium-green flex items-center justify-center active:scale-90 transition">
            <i class="fa-solid fa-chevron-down text-[9px]"></i>
        </button>
    </div>

    <script>
        /* ===== LIVE CLOCK ===== */
        function updateLiveTime() {
            const now = new Date();
            const opsi = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
            const dateEl = document.getElementById('live-date');
            const clockEl = document.getElementById('live-clock');
            if (dateEl) dateEl.textContent = now.toLocaleDateString('id-ID', opsi);
            if (clockEl) {
                const jam = String(now.getHours()).padStart(2, '0');
                const menit = String(now.getMinutes()).padStart(2, '0');
                clockEl.textContent = `${jam}.${menit} WIB`;
            }
        }
        updateLiveTime();
        setInterval(updateLiveTime, 1000);

        /* ===== SIDEBAR MOBILE ===== */
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        function openSidebar() { sidebar.classList.remove('-translate-x-full'); sidebarOverlay.classList.remove('hidden'); document.body.classList.add('overflow-hidden'); }
        function closeSidebar() { sidebar.classList.add('-translate-x-full'); sidebarOverlay.classList.add('hidden'); document.body.classList.remove('overflow-hidden'); }
        if (hamburgerBtn) hamburgerBtn.addEventListener('click', openSidebar);
        if (sidebarOverlay) sidebarOverlay.addEventListener('click', closeSidebar);
        if (sidebar) sidebar.querySelectorAll('a').forEach(l => l.addEventListener('click', () => { if (window.innerWidth < 768) closeSidebar(); }));
        window.addEventListener('resize', () => { if (window.innerWidth >= 768) { sidebarOverlay.classList.add('hidden'); document.body.classList.remove('overflow-hidden'); } });

        /* ===== SCROLL HELPER ===== */
        const scrollIndicator = document.getElementById('scrollIndicator');
        function updateScrollIndicator() {
            if (!scrollIndicator) return;
            const scrollTop = window.scrollY || window.pageYOffset;
            const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
            if (maxScroll <= 0) { scrollIndicator.style.top = '0px'; return; }
            const maxTop = 112 - 32;
            const progress = Math.min(1, Math.max(0, scrollTop / maxScroll));
            scrollIndicator.style.top = `${progress * maxTop}px`;
        }
        window.addEventListener('scroll', updateScrollIndicator, { passive: true });
        window.addEventListener('resize', updateScrollIndicator);
        function scrollToTop() { window.scrollTo({ top: 0, behavior: 'smooth' }); }
        function scrollToBottom() { window.scrollTo({ top: document.documentElement.scrollHeight, behavior: 'smooth' }); }

        /* ============================================================= */
        /* DATA DUMMY (nanti diganti data dari database via Laravel)     */
        /* status: 'belum' (belum dicek sekre) | 'ditinjau' (sudah dicek)*/
        /*         | 'terkirim' (sudah dikirim ke guru piket)            */
        /* absen : hanya siswa yang TIDAK hadir { nama: 'Sakit' }        */
        /* ============================================================= */
        const KELAS = 'XI DKV 2';
        const DAFTAR_SISWA = [
            'Ahmad Fauzan', 'Budi Santoso', 'Citra Ayu', 'Dewi Lestari', 'Eko Prasetyo',
            'Fajar Ramadhan', 'Gita Permata', 'Hendra Wijaya', 'Indah Sari', 'Siti Nurhaliza'
        ];
        const OPSI_STATUS = ['Hadir', 'Sakit', 'Izin', 'Alpa'];

        const jurnals = [
            { id: 1, jam: 1, waktu: '07.00 - 07.40', mapel: 'Matematika', guru: 'Arvia Rienetasary, S.Pd.',
              materi: 'Fungsi Kuadrat', keterangan: 'Penjelasan materi dan latihan soal.',
              absen: { 'Ahmad Fauzan': 'Sakit' }, status: 'ditinjau' },
            { id: 2, jam: 2, waktu: '07.40 - 08.20', mapel: 'Bahasa Indonesia', guru: 'Yani, S.Pd.',
              materi: 'Teks Eksposisi', keterangan: 'Diskusi kelompok membahas struktur teks.',
              absen: { 'Ahmad Fauzan': 'Sakit' }, status: 'ditinjau' },
            { id: 3, jam: 3, waktu: '08.20 - 09.00', mapel: 'Pendidikan Pancasila', guru: 'Wiwik Yuniarsih, S.Pd.',
              materi: 'Norma dan Keadilan', keterangan: 'Ceramah dan tanya jawab.',
              absen: { 'Citra Ayu': 'Izin' }, status: 'belum' },
            { id: 4, jam: 4, waktu: '09.00 - 09.40', mapel: 'Sejarah', guru: 'Ista Nofasari, S.Pd.',
              materi: 'Perang Kemerdekaan', keterangan: 'Menonton video dan diskusi.',
              absen: {}, status: 'belum' },
            { id: 5, jam: 5, waktu: '09.40 - 10.20', mapel: 'Matematika', guru: 'Arvia Rienetasary, S.Pd.',
              materi: '', keterangan: 'Latihan soal.',
              absen: {}, status: 'belum' },
            { id: 6, jam: 6, waktu: '10.20 - 11.00', mapel: 'Bahasa Jawa', guru: 'Yustin Febrini, S.Pd.',
              materi: 'Aksara Jawa', keterangan: 'Latihan menulis aksara.',
              absen: {}, status: 'belum' },
        ];
        // simpan kehadiran asli dari guru, supaya perubahan sekre bisa ditandai
        jurnals.forEach(j => { j.asli = Object.assign({}, j.absen); });

        let currentFilter = 'all';
        let editingId = null;
        let draftAbsen = {};
        let sentAt = null;

        /* ===== UTIL ===== */
        function esc(s) {
            return String(s).replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
        }
        function jumlahTidakHadir(absen) { return Object.keys(absen).length; }

        /* ===== TAMPILAN BARIS ===== */
        function tampilanStatus(j) {
            if (j.status === 'terkirim') {
                return { border: 'border-[#E5DCCE]', iconBg: 'bg-emerald-50 text-emerald-600', icon: 'fa-solid fa-paper-plane',
                         badgeCls: 'text-emerald-700 bg-emerald-50', badge: 'Terkirim', aksi: 'Lihat' };
            }
            if (j.status === 'ditinjau') {
                return { border: 'border-blue-200', iconBg: 'bg-blue-50 text-blue-600', icon: 'fa-solid fa-check',
                         badgeCls: 'text-blue-700 bg-blue-50', badge: 'Sudah dicek', aksi: 'Edit' };
            }
            if (!j.materi.trim()) {
                return { border: 'border-red-200', iconBg: 'bg-red-50 text-red-600', icon: 'fa-solid fa-triangle-exclamation',
                         badgeCls: 'text-red-700 bg-red-50', badge: 'Belum diisi guru', aksi: 'Isi' };
            }
            return { border: 'border-amber-200', iconBg: 'bg-amber-50 text-amber-600', icon: 'fa-regular fa-clock',
                     badgeCls: 'text-amber-700 bg-amber-50', badge: 'Belum dicek', aksi: 'Tinjau' };
        }

        function rowHtml(j) {
            const t = tampilanStatus(j);
            const materiAda = j.materi.trim() !== '';
            const absenN = jumlahTidakHadir(j.absen);
            const materiText = materiAda ? esc(j.materi) : 'Materi belum diisi';
            const materiCls = materiAda ? 'text-gray-500' : 'text-red-500 font-semibold';
            const absenText = absenN > 0 ? `${absenN} siswa tidak hadir` : 'Semua hadir';
            return `
            <div class="bg-white border-[1.5px] ${t.border} rounded-2xl p-4 flex items-center justify-between gap-3">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-10 h-10 rounded-xl ${t.iconBg} flex items-center justify-center shrink-0">
                        <i class="${t.icon}"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-xs md:text-sm font-bold text-dark-green">Jam ke-${j.jam} &middot; ${esc(j.mapel)}</p>
                        <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5">${esc(j.guru)} &middot; ${j.waktu}</p>
                        <p class="text-[10px] md:text-[11px] ${materiCls} mt-0.5 truncate">${materiText} &middot; ${absenText}</p>
                    </div>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <span class="hidden sm:inline-block text-[9px] md:text-[10px] font-bold ${t.badgeCls} px-2.5 py-1 rounded-full whitespace-nowrap">${t.badge}</span>
                    <button type="button" onclick="openDetail(${j.id})"
                        class="text-[10px] md:text-xs font-bold text-medium-green hover:text-dark-green whitespace-nowrap">${t.aksi}</button>
                </div>
            </div>`;
        }

        /* ===== RENDER DAFTAR + FILTER ===== */
        const searchInput = document.getElementById('searchInput');
        const listEl = document.getElementById('journalList');
        const emptyState = document.getElementById('emptyState');

        function cocokFilter(j) {
            if (currentFilter === 'all') return true;
            if (currentFilter === 'terkirim') return j.status === 'terkirim';
            return j.status !== 'terkirim'; // 'belum' = belum dikirim
        }

        function renderList() {
            const q = searchInput.value.trim().toLowerCase();
            const hasil = jurnals.filter(j => cocokFilter(j) && (j.mapel + ' ' + j.guru).toLowerCase().includes(q));
            listEl.innerHTML = hasil.map(rowHtml).join('');
            emptyState.classList.toggle('hidden', hasil.length > 0);
            renderCounts();
            renderSendBar();
        }

        function renderCounts() {
            const terkirim = jurnals.filter(j => j.status === 'terkirim').length;
            document.getElementById('countAll').textContent = jurnals.length;
            document.getElementById('countBelum').textContent = jurnals.length - terkirim;
            document.getElementById('countTerkirim').textContent = terkirim;

            document.querySelectorAll('.filter-card').forEach(card => {
                const aktif = card.dataset.filter === currentFilter;
                card.classList.toggle('ring-2', aktif);
                card.classList.toggle('ring-medium-green', aktif);
                card.setAttribute('aria-pressed', aktif ? 'true' : 'false');
            });
        }

        document.querySelectorAll('.filter-card').forEach(card => {
            card.addEventListener('click', () => {
                currentFilter = card.dataset.filter;
                renderList();
            });
        });
        searchInput.addEventListener('input', renderList);

        /* ===== BAR KIRIM ===== */
        function renderSendBar() {
            const total = jurnals.length;
            const dicek = jurnals.filter(j => j.status === 'ditinjau' || j.status === 'terkirim').length;
            const semuaTerkirim = jurnals.every(j => j.status === 'terkirim');
            const siap = dicek === total;

            const title = document.getElementById('sendTitle');
            const info = document.getElementById('sendInfo');
            const btn = document.getElementById('sendBtn');
            const progWrap = document.getElementById('sendProgressWrap');
            const prog = document.getElementById('sendProgress');

            if (semuaTerkirim) {
                title.innerHTML = `<i class="fa-solid fa-circle-check text-emerald-500 mr-1.5"></i>Jurnal ${KELAS} sudah dikirim`;
                info.textContent = `Diteruskan ke Guru Piket pukul ${sentAt || '-'}`;
                progWrap.classList.add('hidden');
                btn.classList.add('hidden');
                return;
            }

            title.textContent = `Kirim Jurnal ${KELAS} ke Guru Piket`;
            progWrap.classList.remove('hidden');
            btn.classList.remove('hidden');
            prog.style.width = `${(dicek / total) * 100}%`;

            if (siap) {
                info.textContent = `Semua ${total} jurnal sudah dicek. Siap dikirim.`;
                btn.disabled = false;
                btn.className = 'shrink-0 px-4 md:px-5 py-2.5 rounded-full text-xs font-black whitespace-nowrap transition bg-dark-green hover:bg-medium-green text-white';
            } else {
                info.textContent = `${dicek} dari ${total} jurnal sudah dicek. Cek ${total - dicek} lagi untuk bisa mengirim.`;
                btn.disabled = true;
                btn.className = 'shrink-0 px-4 md:px-5 py-2.5 rounded-full text-xs font-black whitespace-nowrap transition bg-gray-200 text-gray-400 cursor-not-allowed';
            }
        }

        /* ===== MODAL DETAIL / EDIT ===== */
        function openDetail(id) {
            const j = jurnals.find(x => x.id === id);
            if (!j) return;
            editingId = id;
            draftAbsen = Object.assign({}, j.absen);
            const locked = j.status === 'terkirim';

            document.getElementById('dLabel').textContent = locked ? 'Detail Jurnal' : 'Tinjau Jurnal';
            document.getElementById('dMapel').textContent = j.mapel;
            document.getElementById('dJam').textContent = `Jam ke-${j.jam} \u00B7 ${j.waktu}`;
            document.getElementById('dGuru').textContent = j.guru;
            document.getElementById('dKeterangan').textContent = j.keterangan || '-';

            const materi = document.getElementById('dMateri');
            materi.value = j.materi;
            materi.disabled = locked;
            document.getElementById('dError').classList.add('hidden');

            renderSiswa(locked);

            document.getElementById('dLocked').classList.toggle('hidden', !locked);
            document.getElementById('dFooter').classList.toggle('hidden', locked);

            const modal = document.getElementById('detailModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }

        function renderSiswa(locked) {
            const j = jurnals.find(x => x.id === editingId);
            const box = document.getElementById('dSiswa');
            box.innerHTML = DAFTAR_SISWA.map((nama, i) => {
                const st = draftAbsen[nama] || 'Hadir';
                const asli = j.asli[nama] || 'Hadir';
                const diubah = st !== asli;
                const tint = st !== 'Hadir' ? 'bg-amber-50/70' : 'bg-white';
                const opsi = OPSI_STATUS.map(o => `<option value="${o}" ${o === st ? 'selected' : ''}>${o}</option>`).join('');
                return `
                <div id="srow-${i}" class="flex items-center justify-between gap-2 px-3 py-2 ${tint}">
                    <div class="min-w-0 flex items-center gap-2 flex-wrap">
                        <span class="text-xs font-semibold text-dark-green">${esc(nama)}</span>
                        <span id="sbadge-${i}" class="${diubah ? '' : 'hidden'} text-[9px] font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded-full" title="Guru mengisi: ${asli}">Diubah</span>
                    </div>
                    <select data-idx="${i}" data-nama="${esc(nama)}" ${locked ? 'disabled' : ''}
                        class="siswa-select text-xs font-semibold rounded-lg border border-gray-200 bg-white px-2 py-1.5 outline-none focus:border-medium-green disabled:bg-gray-50 disabled:text-gray-500">
                        ${opsi}
                    </select>
                </div>`;
            }).join('');

            box.querySelectorAll('.siswa-select').forEach(sel => {
                sel.addEventListener('change', () => {
                    const nama = sel.dataset.nama;
                    const idx = sel.dataset.idx;
                    const st = sel.value;
                    if (st === 'Hadir') delete draftAbsen[nama]; else draftAbsen[nama] = st;

                    const asli = j.asli[nama] || 'Hadir';
                    document.getElementById(`sbadge-${idx}`).classList.toggle('hidden', st === asli);
                    const row = document.getElementById(`srow-${idx}`);
                    row.classList.toggle('bg-amber-50/70', st !== 'Hadir');
                    row.classList.toggle('bg-white', st === 'Hadir');
                    refreshSummary();
                });
            });
            refreshSummary();
        }

        function refreshSummary() {
            const n = jumlahTidakHadir(draftAbsen);
            document.getElementById('dSummary').textContent = `${DAFTAR_SISWA.length - n} hadir \u00B7 ${n} tidak hadir`;
        }

        function closeDetail() {
            const modal = document.getElementById('detailModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
            editingId = null;
        }
        document.getElementById('detailModal').addEventListener('click', e => { if (e.target === e.currentTarget) closeDetail(); });

        function simpanJurnal() {
            const j = jurnals.find(x => x.id === editingId);
            if (!j) return;
            const materi = document.getElementById('dMateri').value.trim();
            if (!materi) {
                document.getElementById('dError').classList.remove('hidden');
                document.getElementById('dMateri').focus();
                return;
            }
            j.materi = materi;
            j.absen = Object.assign({}, draftAbsen);
            j.status = 'ditinjau';
            const jam = j.jam;
            closeDetail();
            renderList();
            showToast(`Jurnal jam ke-${jam} ditandai sudah dicek.`);
        }

        /* ===== KIRIM KE GURU PIKET (satu paket per kelas) ===== */
        function openSendConfirm() {
            if (!jurnals.every(j => j.status === 'ditinjau')) return;
            const totalAbsen = jurnals.reduce((n, j) => n + jumlahTidakHadir(j.absen), 0);
            document.getElementById('sendConfirmText').textContent =
                `${jurnals.length} jurnal kelas ${KELAS} hari ini akan dikirim sebagai satu paket ke Guru Piket. Setelah dikirim, jurnal tidak bisa diedit lagi.`;
            const m = document.getElementById('sendModal');
            m.classList.remove('hidden');
            m.classList.add('flex');
        }
        function closeSendConfirm() {
            const m = document.getElementById('sendModal');
            m.classList.add('hidden');
            m.classList.remove('flex');
        }
        document.getElementById('sendModal').addEventListener('click', e => { if (e.target === e.currentTarget) closeSendConfirm(); });

        function kirimKePiket() {
            jurnals.forEach(j => { j.status = 'terkirim'; });
            const now = new Date();
            sentAt = `${String(now.getHours()).padStart(2, '0')}.${String(now.getMinutes()).padStart(2, '0')}`;
            closeSendConfirm();
            renderList();
            showToast('Jurnal kelas terkirim ke Guru Piket.');
        }

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') { closeDetail(); closeSendConfirm(); }
        });

        /* ===== TOAST ===== */
        let toastTimer;
        function showToast(message) {
            const toast = document.getElementById('toast');
            document.getElementById('toastText').textContent = message;
            toast.classList.remove('hidden');
            clearTimeout(toastTimer);
            toastTimer = setTimeout(() => toast.classList.add('hidden'), 2500);
        }

        /* ===== INIT ===== */
        renderList();
        updateScrollIndicator();
    </script>
</body>
</html>