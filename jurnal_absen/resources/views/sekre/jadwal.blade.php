<!DOCTYPE html>
<html lang="id" class="overscroll-none">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Mata Pelajaran</title>

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
        body { overflow-x: hidden; }
    </style>
</head>

<body class="bg-bg-cream text-dark-green font-sans min-h-screen overflow-x-hidden overscroll-none">

    <!-- ============================================================= -->
    <!-- MOBILE HEADER -->
    <!-- ============================================================= -->
    <div class="md:hidden bg-dark-green text-white p-4 flex items-center justify-between sticky top-0 z-40 shadow-sm">
        <div class="flex items-center gap-2">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
            <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
        </div>
        <button id="hamburgerBtn" type="button" class="w-9 h-9 rounded-lg flex items-center justify-center hover:bg-white/10 transition focus:outline-none">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    <!-- MOBILE OVERLAY -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden"></div>

    <!-- ============================================================= -->
    <!-- SIDEBAR -->
    <!-- ============================================================= -->
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
                    class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                    <i class="fa-solid fa-book-open w-4 text-center"></i>
                    <span>Jurnal</span>
                </a>

                <a href="{{ url('/sekre/jadwal') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-white/10 text-mint-green rounded-xl transition active:scale-[0.98]">
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

            <a href="{{ route('logout') }}"
                class="w-full flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                <i class="fa-solid fa-arrow-right-from-bracket w-4"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- ============================================================= -->
    <!-- MAIN CONTENT -->
    <!-- ============================================================= -->
    <main class="min-w-0 p-4 pb-12 md:p-8 md:ml-60 max-w-full md:max-w-[calc(100%-15rem)] space-y-4 md:space-y-5">

        <!-- HEADER -->
        <header class="flex items-center justify-between gap-3">
            <div class="min-w-0">
                <h1 class="text-lg sm:text-xl md:text-2xl font-bold text-dark-green truncate">Jadwal Mata Pelajaran</h1>
                <p class="text-[11px] sm:text-xs text-gray-400 font-semibold mt-1">
                    XI DKV 2 &middot; Semester Ganjil 2026-2027
                </p>
            </div>

            <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                <div class="text-right leading-tight">
                    <div id="live-date" class="text-[9px] sm:text-[10px] md:text-xs font-semibold text-medium-green whitespace-nowrap">memuat tanggal....</div>
                    <div id="live-clock" class="text-[10px] sm:text-xs font-extrabold text-dark-green mt-0.5">00.00 WIB</div>
                </div>
            </div>
        </header>

        <!-- TAB HARI (Senin - Jumat) -->
        <div id="dayTabs" class="grid grid-cols-5 gap-2 md:gap-3" role="group" aria-label="Pilih hari"></div>

        <!-- DAFTAR MAPEL HARI TERPILIH -->
        <section class="bg-white border-[1.5px] border-[#E5DCCE] rounded-2xl overflow-hidden">
            <div class="flex items-center justify-between gap-3 px-4 py-3 md:px-5 border-b border-[#E5DCCE]">
                <h2 id="dayTitle" class="text-sm md:text-base font-bold text-dark-green truncate">-</h2>
                <span id="daySummary" class="text-[10px] md:text-xs font-semibold text-medium-green whitespace-nowrap">-</span>
            </div>
            <div id="jadwalList" class="divide-y divide-[#F0E8DA]"></div>
            <div id="dayFooter"></div>
        </section>
    </main>

    <!-- ============================================================= -->
    <!-- MODAL RIWAYAT JURNAL (hanya lihat) -->
    <!-- ============================================================= -->
    <div id="riwayatModal" class="fixed inset-0 bg-dark-green/60 z-[60] hidden items-end md:items-center justify-center md:p-4 backdrop-blur-sm">
        <div class="bg-white w-full md:max-w-lg max-h-[88vh] rounded-t-2xl md:rounded-2xl shadow-2xl flex flex-col overflow-hidden">
            <div class="shrink-0 px-5 pt-5 pb-3 border-b border-gray-100">
                <div class="flex items-start justify-between gap-3">
                    <div class="min-w-0">
                        <span class="text-[9px] uppercase tracking-wider font-black text-medium-green">Riwayat Jurnal</span>
                        <h2 id="rTanggal" class="text-base md:text-lg font-black text-dark-green mt-0.5">-</h2>
                    </div>
                    <button type="button" onclick="tutupRiwayat()" aria-label="Tutup"
                        class="w-8 h-8 rounded-full bg-emerald-50 text-dark-green flex items-center justify-center hover:bg-mint-green transition shrink-0">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <p id="rSummary" class="mt-2 text-[10px] md:text-xs font-semibold text-emerald-700 bg-emerald-50 rounded-lg px-3 py-1.5">-</p>
            </div>
            <div id="rList" class="overflow-y-auto p-4 md:p-5 space-y-3"></div>
        </div>
    </div>

    <!-- ============================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ============================================================= -->
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

        /* ===== MOBILE SIDEBAR ===== */
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }
        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
        if (hamburgerBtn) hamburgerBtn.addEventListener('click', openSidebar);
        if (sidebarOverlay) sidebarOverlay.addEventListener('click', closeSidebar);
        if (sidebar) {
            sidebar.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 768) closeSidebar();
                });
            });
        }
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                sidebarOverlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });

        /* ============================================================= */
        /* DATA JADWAL (dummy; nanti diganti data dari database)          */
        /* Kunci: 0 = Senin ... 4 = Jumat                                 */
        /* tipe 'kegiatan' = upacara / pembiasaan (tidak punya jurnal)    */
        /* ============================================================= */
        const HARI = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        const HARI_SINGKAT = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum'];

        const JADWAL = {
            0: [
                { jam: '1',   mulai: '07.00', selesai: '07.40', tipe: 'kegiatan', mapel: 'Upacara Bendera', info: 'Seluruh siswa', ruang: 'Lapangan', icon: 'fa-flag' },
                { jam: '2-4', mulai: '07.40', selesai: '09.40', mapel: 'Matematika',           guru: 'Arvia Rienetasary, S.Pd.', ruang: 'R 18' },
                { jam: '5-6', mulai: '10.00', selesai: '11.20', mapel: 'Sejarah',              guru: 'Ista Nofasari, S.Pd.',     ruang: 'R 18' },
                { jam: '7-8', mulai: '11.20', selesai: '12.40', mapel: 'Pendidikan Pancasila', guru: 'Wiwik Yuniarsih, S.Pd.',   ruang: 'R 18' },
            ],
            1: [
                { jam: '1-2', mulai: '07.00', selesai: '08.20', mapel: 'Bahasa Jawa',          guru: 'Yustin Febrini, S.Pd.',    ruang: 'R 18' },
                { jam: '3-4', mulai: '08.20', selesai: '09.40', mapel: 'Matematika',           guru: 'Arvia Rienetasary, S.Pd.', ruang: 'R 18' },
                { jam: '5-8', mulai: '10.00', selesai: '12.40', mapel: 'Desain Grafis',        guru: 'Dedi Kurniawan, S.Kom.',   ruang: 'Lab. DKV 1' },
            ],
            2: [
                { jam: '1-2', mulai: '07.00', selesai: '08.20', mapel: 'Bahasa Inggris',       guru: 'Rosa Amelia, S.Pd.',       ruang: 'R 18' },
                { jam: '3-4', mulai: '08.20', selesai: '09.40', mapel: 'PJOK',                 guru: 'Hadi Saputra, S.Pd.',      ruang: 'Lapangan' },
                { jam: '5-6', mulai: '10.00', selesai: '11.20', mapel: 'Fotografi',            guru: 'Dedi Kurniawan, S.Kom.',   ruang: 'Lab. DKV 2' },
                { jam: '7-8', mulai: '11.20', selesai: '12.40', mapel: 'Fotografi',            guru: 'Dedi Kurniawan, S.Kom.',   ruang: 'Lab. DKV 2' },
            ],
            3: [
                { jam: '1-2', mulai: '07.00', selesai: '08.20', mapel: 'Pendidikan Agama',     guru: 'Nur Hidayah, S.Ag.',       ruang: 'R 18' },
                { jam: '3-4', mulai: '08.20', selesai: '09.40', mapel: 'IPA',                  guru: 'Sari Wulandari, S.Pd.',    ruang: 'Lab. IPA' },
                { jam: '5-8', mulai: '10.00', selesai: '12.40', mapel: 'Animasi 2D',           guru: 'Bayu Anggoro, S.Sn.',      ruang: 'Lab. DKV 1' },
            ],
            4: [
                { jam: '1',   mulai: '07.00', selesai: '07.40', tipe: 'kegiatan', mapel: 'Pembiasaan Jumat', info: 'Tadarus, bersih kelas, senam, dll.', ruang: 'Kelas / Lapangan', icon: 'fa-person-praying' },
                { jam: '2-4', mulai: '07.40', selesai: '09.40', mapel: 'Matematika',           guru: 'Arvia Rienetasary, S.Pd.', ruang: 'R 18' },
                { jam: '5-6', mulai: '10.00', selesai: '11.20', mapel: 'Seni Budaya',          guru: 'Lina Marlina, S.Pd.',      ruang: 'R 18' },
            ],
        };

        /* ===== UTIL ===== */
        function esc(s) {
            return String(s).replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
        }
        function toMenit(s) {
            const p = s.split('.').map(Number);
            return p[0] * 60 + p[1];
        }
        function mulaiHari(d) {
            return new Date(d.getFullYear(), d.getMonth(), d.getDate());
        }
        function isoTanggal(d) {
            return `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`;
        }

        /* Tanggal Senin-Jumat MINGGU INI.
           Sabtu/Minggu tetap menampilkan minggu yang baru selesai,
           baru berganti ke minggu baru (riwayat baru) pada hari Senin. */
        function tanggalMingguIni() {
            const hariIni = mulaiHari(new Date());
            const dow = hariIni.getDay(); // 0 = Minggu ... 6 = Sabtu
            const offset = dow === 0 ? -6 : 1 - dow;
            const senin = new Date(hariIni);
            senin.setDate(hariIni.getDate() + offset);
            return [0, 1, 2, 3, 4].map(i => {
                const d = new Date(senin);
                d.setDate(senin.getDate() + i);
                return d;
            });
        }

        /* ============================================================= */
        /* RIWAYAT JURNAL YANG SUDAH DIKIRIM KE GURU PIKET (dummy)        */
        /* Bentuk akhir yang dipakai halaman ini:                         */
        /*   RIWAYAT['YYYY-MM-DD'] = {                                    */
        /*       dikirim: '12.58',                                        */
        /*       jurnal: { '2-4': { materi, keterangan, absen: {nama: status} } } */
        /*   }                                                            */
        /* Backend cukup mengisi RIWAYAT dengan data minggu berjalan      */
        /* (kunci = tanggal, jurnal dikunci dengan nilai "jam" jadwal).   */
        /* ============================================================= */
        const RIWAYAT_DUMMY = {
            0: { dikirim: '12.58', jurnal: {
                '2-4': { materi: 'Fungsi Kuadrat', keterangan: 'Penjelasan materi dan latihan soal.', absen: { 'Ahmad Fauzan': 'Sakit' } },
                '5-6': { materi: 'Perang Kemerdekaan', keterangan: 'Menonton video dan diskusi.', absen: {} },
                '7-8': { materi: 'Norma dan Keadilan', keterangan: 'Ceramah dan tanya jawab.', absen: { 'Citra Ayu': 'Izin' } },
            } },
            1: { dikirim: '13.02', jurnal: {
                '1-2': { materi: 'Aksara Jawa', keterangan: 'Latihan menulis aksara.', absen: {} },
                '3-4': { materi: 'Fungsi Kuadrat (lanjutan)', keterangan: 'Latihan soal dan pembahasan.', absen: { 'Ahmad Fauzan': 'Sakit' } },
                '5-8': { materi: 'Teori Warna dan Tipografi', keterangan: 'Praktik membuat poster sederhana.', absen: { 'Budi Santoso': 'Alpa' } },
            } },
            2: { dikirim: '13.10', jurnal: {
                '1-2': { materi: 'Descriptive Text', keterangan: 'Membaca dan menulis teks deskriptif.', absen: {} },
                '3-4': { materi: 'Bola Voli: Passing', keterangan: 'Praktik passing bawah dan atas.', absen: { 'Eko Prasetyo': 'Izin' } },
                '5-6': { materi: 'Komposisi Foto', keterangan: 'Teori rule of thirds dan framing.', absen: {} },
                '7-8': { materi: 'Praktik Pengambilan Foto', keterangan: 'Praktik di area sekolah.', absen: {} },
            } },
            3: { dikirim: '13.05', jurnal: {
                '1-2': { materi: 'Toleransi Antarumat Beragama', keterangan: 'Diskusi kelompok.', absen: {} },
                '3-4': { materi: 'Ekosistem', keterangan: 'Pengamatan di laboratorium.', absen: { 'Gita Permata': 'Sakit' } },
                '5-8': { materi: 'Dasar Animasi Frame by Frame', keterangan: 'Praktik membuat animasi bola memantul.', absen: {} },
            } },
            4: { dikirim: '11.40', jurnal: {
                '2-4': { materi: 'Barisan dan Deret', keterangan: 'Latihan soal.', absen: {} },
                '5-6': { materi: 'Seni Rupa Nusantara', keterangan: 'Presentasi kelompok.', absen: { 'Hendra Wijaya': 'Izin' } },
            } },
        };
        const RIWAYAT = {};
        tanggalMingguIni().forEach((tgl, i) => { RIWAYAT[isoTanggal(tgl)] = RIWAYAT_DUMMY[i]; });

        /* ===== LABEL & STATUS ===== */
        function labelRelatif(tgl) {
            const selisih = Math.round((tgl - mulaiHari(new Date())) / 86400000);
            if (selisih === 0) return 'Hari ini';
            if (selisih === 1) return 'Besok';
            if (selisih === -1) return 'Kemarin';
            return '';
        }

        function statusSesi(tgl, sesi) {
            const hariIni = mulaiHari(new Date());
            if (tgl < hariIni) return 'selesai';
            if (tgl > hariIni) return 'mendatang';
            const now = new Date();
            const menit = now.getHours() * 60 + now.getMinutes();
            if (menit >= toMenit(sesi.selesai)) return 'selesai';
            if (menit >= toMenit(sesi.mulai)) return 'berlangsung';
            return 'mendatang';
        }

        /* ===== STATE ===== */
        const dow0 = new Date().getDay();
        let selectedDay = (dow0 >= 1 && dow0 <= 5) ? dow0 - 1 : 4; // akhir pekan: Jumat

        /* ===== RENDER ===== */
        const tabsEl = document.getElementById('dayTabs');
        const listEl = document.getElementById('jadwalList');
        const footerEl = document.getElementById('dayFooter');

        const BADGE = {
            selesai:     { cls: 'bg-emerald-50 text-emerald-700', txt: 'SELESAI' },
            berlangsung: { cls: 'bg-dark-green text-white',       txt: 'BERLANGSUNG' },
            mendatang:   { cls: 'bg-gray-100 text-gray-500',      txt: 'MENDATANG' },
        };

        function renderTabs(tanggal) {
            tabsEl.innerHTML = tanggal.map((tgl, i) => {
                const aktif = i === selectedDay;
                const rel = labelRelatif(tgl);
                const adalahHariIni = rel === 'Hari ini';
                const base = aktif
                    ? 'bg-dark-green text-white border-dark-green shadow-sm'
                    : 'bg-white text-dark-green border-[#E5DCCE] hover:border-medium-green';
                const relCls = aktif
                    ? 'text-mint-green'
                    : (adalahHariIni ? 'text-medium-green' : 'text-gray-400');
                return `
                <button type="button" data-idx="${i}" aria-pressed="${aktif}"
                    class="day-tab flex flex-col items-center justify-center gap-0.5 py-2.5 md:py-3 rounded-2xl border-[1.5px] transition active:scale-[0.97] ${base}">
                    <span class="text-[10px] md:text-xs font-bold uppercase tracking-wide">${HARI_SINGKAT[i]}</span>
                    <span class="text-lg md:text-xl font-black leading-none">${tgl.getDate()}</span>
                    <span class="text-[9px] md:text-[10px] font-semibold h-3 leading-3 ${relCls}">${rel}</span>
                </button>`;
            }).join('');

            tabsEl.querySelectorAll('.day-tab').forEach(btn => {
                btn.addEventListener('click', () => {
                    selectedDay = Number(btn.dataset.idx);
                    renderJadwal();
                });
            });
        }

        function rowHtml(s, tgl, isToday) {
            const st = statusSesi(tgl, s);
            const b = BADGE[st];
            const kegiatan = s.tipe === 'kegiatan';

            let tengah;
            if (kegiatan) {
                tengah = `
                    <p class="text-xs md:text-sm font-bold text-dark-green truncate">
                        <i class="fa-solid ${s.icon} text-medium-green mr-1.5"></i>${esc(s.mapel)}
                        <span class="ml-1 text-[8px] font-bold text-medium-green bg-[#E7F5EE] px-1.5 py-0.5 rounded align-middle">KEGIATAN</span>
                    </p>
                    <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5 truncate">${esc(s.info)}</p>`;
            } else {
                tengah = `
                    <p class="text-xs md:text-sm font-bold text-dark-green truncate">${esc(s.mapel)}</p>
                    <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5 truncate">${esc(s.guru)}</p>`;
            }

            const dim = st === 'selesai' && isToday;
            const rowCls = st === 'berlangsung'
                ? 'bg-[#F1FAF5] border-l-4 border-l-medium-green'
                : (dim ? 'opacity-70 border-l-4 border-l-transparent' : 'border-l-4 border-l-transparent');

            return `
            <div class="flex items-center gap-3 md:gap-4 px-4 md:px-5 py-3 ${rowCls}">
                <div class="w-[72px] md:w-24 shrink-0">
                    <p class="text-xs md:text-sm font-bold text-dark-green">Jam ${s.jam}</p>
                    <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5">${s.mulai} - ${s.selesai}</p>
                </div>
                <div class="flex-1 min-w-0">${tengah}</div>
                <div class="shrink-0 flex flex-col items-end gap-1.5">
                    <span class="text-[10px] md:text-[11px] font-semibold text-gray-500 whitespace-nowrap">
                        <i class="fa-solid fa-door-open text-medium-green mr-1"></i>${esc(s.ruang)}
                    </span>
                    <span class="text-[8px] md:text-[9px] font-bold ${b.cls} px-2 py-0.5 rounded-full whitespace-nowrap">${b.txt}</span>
                </div>
            </div>`;
        }

        /* Tombol riwayat di bawah jadwal (hanya untuk hari yang sudah lewat) */
        function renderFooter(riwayatHari, isPast) {
            if (!isPast) { footerEl.innerHTML = ''; return; }
            if (!riwayatHari || !riwayatHari.jurnal || Object.keys(riwayatHari.jurnal).length === 0) {
                footerEl.innerHTML = `
                <p class="text-center text-[10px] md:text-xs text-gray-400 py-3 border-t border-[#F0E8DA]">
                    Tidak ada riwayat jurnal di hari ini.
                </p>`;
                return;
            }
            footerEl.innerHTML = `
            <div class="p-3 md:p-4 border-t border-[#F0E8DA]">
                <button type="button" onclick="bukaRiwayat()"
                    class="w-full py-2.5 md:py-3 bg-[#CBEAD9] hover:bg-[#b4e2ca] text-dark-green text-xs md:text-[13px] font-semibold rounded-full transition">
                    <i class="fa-solid fa-clock-rotate-left mr-1.5"></i>Cek Detail Riwayat Jurnal
                </button>
            </div>`;
        }

        function renderJadwal() {
            const tanggal = tanggalMingguIni();
            const tgl = tanggal[selectedDay];
            const sesi = JADWAL[selectedDay] || [];
            const hariIni = mulaiHari(new Date());
            const isPast = tgl < hariIni;
            const isToday = tgl.getTime() === hariIni.getTime();
            const riwayatHari = RIWAYAT[isoTanggal(tgl)] || null;

            renderTabs(tanggal);

            const tglPanjang = tgl.toLocaleDateString('id-ID', { day: 'numeric', month: 'long' });
            const rel = labelRelatif(tgl);
            document.getElementById('dayTitle').textContent =
                `${HARI[selectedDay]}, ${tglPanjang}` + (rel ? ` \u00B7 ${rel}` : '');

            if (sesi.length === 0) {
                document.getElementById('daySummary').textContent = 'Tidak ada pelajaran';
                listEl.innerHTML = '<p class="text-center text-xs text-gray-400 py-8">Tidak ada jadwal di hari ini.</p>';
                footerEl.innerHTML = '';
                return;
            }

            const jumlahMapel = sesi.filter(s => s.tipe !== 'kegiatan').length;
            document.getElementById('daySummary').textContent =
                `${jumlahMapel} mapel \u00B7 ${sesi[0].mulai} - ${sesi[sesi.length - 1].selesai}`;

            listEl.innerHTML = sesi.map(s => rowHtml(s, tgl, isToday)).join('');
            renderFooter(riwayatHari, isPast);
        }

        /* ===== MODAL RIWAYAT: semua jurnal hari itu, hanya lihat ===== */
        function chipAbsen(nama, status) {
            const cls = status === 'Alpa' ? 'bg-red-50 text-red-700' : 'bg-amber-50 text-amber-700';
            return `<span class="text-[10px] md:text-[11px] font-semibold ${cls} px-2 py-0.5 rounded-full whitespace-nowrap">${esc(nama)} &middot; ${esc(status)}</span>`;
        }

        function bukaRiwayat() {
            const tgl = tanggalMingguIni()[selectedDay];
            const riwayatHari = RIWAYAT[isoTanggal(tgl)];
            if (!riwayatHari || !riwayatHari.jurnal) return;

            const sesi = (JADWAL[selectedDay] || []).filter(s => s.tipe !== 'kegiatan' && riwayatHari.jurnal[s.jam]);
            const unik = new Set();
            sesi.forEach(s => Object.keys(riwayatHari.jurnal[s.jam].absen || {}).forEach(n => unik.add(n)));

            document.getElementById('rTanggal').textContent =
                `${HARI[selectedDay]}, ${tgl.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}`;
            document.getElementById('rSummary').innerHTML =
                `${sesi.length} jurnal &middot; ${unik.size} siswa tidak hadir &middot; dikirim ke piket ${esc(riwayatHari.dikirim)}`;

            document.getElementById('rList').innerHTML = sesi.map(s => {
                const rec = riwayatHari.jurnal[s.jam];
                const nama = Object.keys(rec.absen || {});
                const kehadiran = nama.length > 0
                    ? `<div class="flex flex-wrap gap-1.5">${nama.map(n => chipAbsen(n, rec.absen[n])).join('')}</div>`
                    : '<span class="text-emerald-600 font-semibold">Semua hadir</span>';
                return `
                <div class="rounded-xl border border-[#E5DCCE] p-3.5">
                    <div class="flex items-start justify-between gap-2">
                        <p class="text-xs md:text-sm font-bold text-dark-green">${esc(s.mapel)}</p>
                        <span class="text-[10px] font-bold text-medium-green whitespace-nowrap">Jam ${s.jam}</span>
                    </div>
                    <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5">${esc(s.guru)} &middot; ${s.mulai} - ${s.selesai}</p>
                    <div class="grid grid-cols-[62px_1fr] gap-x-2 gap-y-1.5 mt-3 text-[11px] md:text-xs text-gray-600 leading-relaxed">
                        <span class="text-[9px] font-bold uppercase tracking-wide text-gray-400 pt-0.5">Materi</span>
                        <span>${esc(rec.materi || '-')}</span>
                        <span class="text-[9px] font-bold uppercase tracking-wide text-gray-400 pt-0.5">Aktivitas</span>
                        <span>${esc(rec.keterangan || '-')}</span>
                        <span class="text-[9px] font-bold uppercase tracking-wide text-gray-400 pt-0.5">Kehadiran</span>
                        <div>${kehadiran}</div>
                    </div>
                </div>`;
            }).join('');

            const m = document.getElementById('riwayatModal');
            m.classList.remove('hidden');
            m.classList.add('flex');
            document.body.classList.add('overflow-hidden');
            document.getElementById('rList').scrollTop = 0;
        }

        function tutupRiwayat() {
            const m = document.getElementById('riwayatModal');
            m.classList.add('hidden');
            m.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }
        document.getElementById('riwayatModal').addEventListener('click', e => {
            if (e.target === e.currentTarget) tutupRiwayat();
        });
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') tutupRiwayat();
        });

        renderJadwal();
        setInterval(renderJadwal, 30000); // perbarui status Selesai/Berlangsung/Mendatang
    </script>

</body>
</html>