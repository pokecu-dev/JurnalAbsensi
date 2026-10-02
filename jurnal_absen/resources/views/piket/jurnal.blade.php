<!DOCTYPE html>
<html lang="id" class="overscroll-none">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal Masuk </title>

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
                <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-16 h-auto">
                <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
            </div>

            <nav class="flex flex-col gap-5 font-semibold text-xs">
                <div>
                    <div class="text-[10px] uppercase font-extrabold text-gray-400 tracking-wider mb-2 px-2">Utama</div>
                    <div class="space-y-1">
                        <a href="{{ url('/piket/dashboard') }}"
                            class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-house w-4 text-center"></i>
                            Dashboard
                        </a>

                        <a href="{{ url('/piket/jurnal') }}"
                            class="flex items-center gap-3 px-4 py-3 bg-white/10 text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-inbox w-4 text-center"></i>
                            Jurnal Masuk
                        </a>

                        <a href="{{ url('/piket/dispensasi') }}"
                            class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-regular fa-calendar-days w-4 text-center"></i>
                            Dispensasi
                        </a>

                        <a href="{{ url('/piket/jadwal') }}"
                            class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-clipboard-check w-4 text-center"></i>
                            Jadwal Piket
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="flex flex-col gap-1 pt-3 border-t border-white/10 text-xs">
            <a href="{{ url('/piket/akun') }}"
                class="flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                <i class="fa-solid fa-user-circle w-4"></i>
                <span>Akun guru</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                    <i class="fa-solid fa-right-from-bracket w-4"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- ============================================================= -->
    <!-- MAIN -->
    <!-- ============================================================= -->
    <main class="min-w-0 p-4 pb-12 md:p-8 md:ml-60 max-w-full md:max-w-[calc(100%-15rem)] space-y-4 md:space-y-5">

        <!-- HEADER -->
        <header class="flex items-center justify-between gap-3">
            <div class="min-w-0">
                <h1 class="text-base sm:text-lg md:text-2xl font-black text-dark-green tracking-tight leading-snug">Jurnal Masuk</h1>
                <p class="text-[11px] sm:text-xs text-medium-green font-semibold mt-0.5">
                     Cek dan setujui jurnal sebagai persetujuan akhir.
                </p>
            </div>
            <div class="text-right leading-tight shrink-0">
                <div id="live-date" class="text-[9px] sm:text-[10px] md:text-xs font-semibold text-medium-green whitespace-nowrap">memuat tanggal....</div>
                <div id="live-clock" class="text-[10px] sm:text-xs font-extrabold text-dark-green mt-0.5">00.00 WIB</div>
            </div>
        </header>

        <!-- PROGRES + FILTER -->
        <section class="bg-white rounded-2xl border border-emerald-100 p-3.5 md:p-4 space-y-3">
            <div>
                <div class="flex items-center justify-between gap-3 mb-1.5">
                    <p class="text-[11px] md:text-xs font-extrabold text-dark-green">Progres persetujuan hari ini</p>
                    <p id="progressText" class="text-[10px] md:text-xs font-bold text-medium-green whitespace-nowrap">-</p>
                </div>
                <div class="h-2 w-full bg-gray-100 rounded-full overflow-hidden">
                    <div id="progressBar" class="h-full bg-medium-green rounded-full transition-all duration-300" style="width:0%"></div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center gap-2.5">
                <div class="relative flex-1">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                    <input id="searchInput" type="text" placeholder="Cari kelas, wali kelas, atau sekretaris..."
                        class="w-full pl-9 pr-3 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-xs outline-none focus:border-medium-green focus:bg-white transition">
                </div>
                <select id="tingkatSelect"
                    class="rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-medium-green">
                    <option value="">Semua tingkat</option>
                    <option value="X">Kelas X</option>
                    <option value="XI">Kelas XI</option>
                </select>
            </div>

            <div id="statusTabs" class="flex flex-wrap items-center gap-2"></div>
        </section>

        <!-- DAFTAR KELAS -->
        <section id="kelasList" class="space-y-2.5"></section>

        <div id="emptyState" class="hidden bg-white rounded-2xl border border-gray-100 p-10 text-center">
            <div class="w-12 h-12 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center mx-auto mb-3">
                <i class="fa-solid fa-inbox"></i>
            </div>
            <p class="text-xs font-bold text-gray-500">Tidak ada kelas yang cocok.</p>
        </div>
    </main>

    <!-- ============================================================= -->
    <!-- MODAL REKAP JURNAL KELAS -->
    <!-- ============================================================= -->
    <div id="detailModal" class="fixed inset-0 z-[70] hidden items-end md:items-center justify-center bg-dark-green/60 backdrop-blur-sm p-0 md:p-4">
        <div class="bg-white rounded-t-3xl md:rounded-2xl w-full md:max-w-2xl max-h-[92vh] flex flex-col shadow-2xl overflow-hidden">
            <div class="shrink-0 flex items-start justify-between gap-3 px-5 pt-5 pb-3 border-b border-gray-100">
                <div class="min-w-0">
                    <span class="text-[9px] uppercase tracking-wider font-black text-medium-green">Rekap Jurnal Kelas</span>
                    <h2 id="dKelas" class="text-lg md:text-xl font-black text-dark-green mt-0.5">-</h2>
                    <p id="dMeta" class="text-[10px] md:text-[11px] text-gray-500 mt-0.5">-</p>
                </div>
                <div class="flex items-start gap-2 shrink-0">
                    <span id="dBadge" class="text-[9px] font-bold px-2.5 py-1 rounded-full whitespace-nowrap">-</span>
                    <button type="button" onclick="tutupDetail()" aria-label="Tutup"
                        class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center hover:bg-gray-200">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>

            <div id="dBody" class="overflow-y-auto p-5 space-y-5"></div>

            <div id="dFooter" class="shrink-0 px-5 py-3 border-t border-gray-100"></div>
        </div>
    </div>

    <!-- TOAST -->
    <div id="toast" class="fixed bottom-5 left-1/2 -translate-x-1/2 z-[100] hidden">
        <div class="bg-dark-green text-white px-4 py-3 rounded-xl shadow-xl flex items-center gap-2">
            <i class="fa-solid fa-circle-check text-mint-green"></i>
            <span id="toastText" class="text-xs font-bold">Berhasil.</span>
        </div>
    </div>

    <!-- ============================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ============================================================= -->
    <script>
        /* ===== LIVE CLOCK ===== */
        function updateLiveTime() {
            const now = new Date();
            const dateEl = document.getElementById('live-date');
            const clockEl = document.getElementById('live-clock');
            if (dateEl) dateEl.textContent = now.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' });
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
        function openSidebar() { sidebar.classList.remove('-translate-x-full'); sidebarOverlay.classList.remove('hidden'); document.body.classList.add('overflow-hidden'); }
        function closeSidebar() { sidebar.classList.add('-translate-x-full'); sidebarOverlay.classList.add('hidden'); document.body.classList.remove('overflow-hidden'); }
        if (hamburgerBtn) hamburgerBtn.addEventListener('click', openSidebar);
        if (sidebarOverlay) sidebarOverlay.addEventListener('click', closeSidebar);
        sidebar.querySelectorAll('a').forEach(l => l.addEventListener('click', () => { if (window.innerWidth < 768) closeSidebar(); }));
        window.addEventListener('resize', () => { if (window.innerWidth >= 768) { sidebarOverlay.classList.add('hidden'); document.body.classList.remove('overflow-hidden'); } });

        const ME = 'Arif Setyobudi, S.Pd'; // nama guru piket yang login (dummy)

        const SLOT = [
            { jam: '1-2',  waktu: '07.00 - 08.20' },
            { jam: '3-4',  waktu: '08.20 - 09.40' },
            { jam: '5-7',  waktu: '10.00 - 11.45' },
            { jam: '8-10', waktu: '13.15 - 15.00' },
        ];
        const MAPEL = [
            { mapel: 'Matematika',           guru: 'Arvia Rienetasary, S.Pd',      materi: 'Fungsi Kuadrat',               akt: 'Penjelasan materi dan latihan soal.' },
            { mapel: 'Bahasa Indonesia',     guru: 'Erna Rinawati, S.Pd',          materi: 'Teks Eksposisi',              akt: 'Diskusi kelompok membahas struktur teks.' },
            { mapel: 'Sejarah',              guru: 'Yustin Febrini, S.Pd',         materi: 'Perang Kemerdekaan',          akt: 'Menonton video dan diskusi.' },
            { mapel: 'Konsentrasi Keahlian', guru: 'Danang Anjar Hymawanto, S.Pd', materi: 'Dasar Tipografi',             akt: 'Praktik membuat poster sederhana.' },
            { mapel: 'Bahasa Inggris',       guru: 'Fajar Wahyu Pratiwi, S.S',     materi: 'Descriptive Text',            akt: 'Membaca dan menulis teks deskriptif.' },
            { mapel: 'IPAS',                 guru: 'Khuriyatul Kamila, S.Si',      materi: 'Ekosistem',                   akt: 'Pengamatan dan diskusi kelas.' },
            { mapel: 'PJOK',                 guru: 'Ilham Sungeidi, S.Pd',         materi: 'Bola Voli: Passing',          akt: 'Praktik passing bawah dan atas.' },
            { mapel: 'Pendidikan Pancasila', guru: 'Wiwik Yuniarsih, S.Pd',        materi: 'Norma dan Keadilan',          akt: 'Ceramah dan tanya jawab.' },
        ];

        /* plan = [[nama, status, [indeks jurnal yang tidak hadir]], ...]
           diubah = indeks jurnal yang kehadirannya dikoreksi sekre */
        function kelas(id, nama, wali, sekre, status, dikirim, geser, plan, diubah, disetujui) {
            const tingkat = nama.split(' ')[0];
            let jurnal = [];
            if (status !== 'belum') {
                jurnal = SLOT.map((s, i) => {
                    const m = MAPEL[(geser + i) % MAPEL.length];
                    const absen = {};
                    plan.forEach(p => { if (p[2].includes(i)) absen[p[0]] = p[1]; });
                    return { jam: s.jam, waktu: s.waktu, mapel: m.mapel, guru: m.guru, materi: m.materi, akt: m.akt, absen, diubah: diubah.includes(i) };
                });
            }
            return { id, kelas: nama, tingkat, wali, sekre, status, dikirim, jurnal, disetujui: disetujui || null };
        }

        const SEMUA = [0, 1, 2, 3];
        const KELAS = [
            kelas(1,  'XI DKV 2',  'Endik Kuswantoro, S.Kom', 'Dewi Lestari',   'menunggu',  '14.32', 3,
                  [['Ahmad Fauzan', 'Sakit', SEMUA], ['Citra Ayu', 'Izin', SEMUA], ['Budi Santoso', 'Alpa', [2]]], [1]),
            kelas(2,  'XI DKV 1',  'Sinta Lestari, S.Pd.I',   'Rina Marlina',   'menunggu',  '14.40', 4,
                  [['Gita Permata', 'Sakit', SEMUA]], []),
            kelas(3,  'XI TKJ 1',  'Sri Rahayu, S.Pd',        'Eko Prasetyo',   'menunggu',  '14.51', 0, [], []),
            kelas(4,  'XI RPL 2',  'Winartin, S.Pd',          'Hendra Wijaya',  'menunggu',  '14.55', 1,
                  [['Fajar Ramadhan', 'Dispen', [0, 1]], ['Dimas Prasetyo', 'Alpa', SEMUA]], []),
            kelas(5,  'XI AK 3',   'Arvia Rienetasary, S.Pd', 'Indah Sari',     'menunggu',  '14.58', 5,
                  [['Siti Nurhaliza', 'Izin', [0, 1, 2]]], []),
            kelas(6,  'X AK 3',    'Ista Nofasari, S.Pd',     'Bagas Setiawan', 'menunggu',  '15.02', 6, [], []),
            kelas(7,  'XI AN 1',   'Khuriyatul Kamila, S.Pd', 'Gita Permata',   'disetujui', '14.10', 2,
                  [['Eko Prasetyo', 'Sakit', SEMUA]], [], { oleh: 'Arif Setyobudi, S.Pd', pada: '14.20' }),
            kelas(8,  'X DKV 1',   'Rulik Indrawati, S.Pd',   'Citra Ayu',      'disetujui', '14.05', 7, [], [],
                  { oleh: 'Sunarti, S.Pd', pada: '14.12' }),
            kelas(9,  'XI TKJ 2',  'Fitri Amaliyah, S.Pd',    'Fajar Ramadhan', 'belum',     null,    0, [], []),
            kelas(10, 'X TKI 1',   'Muashofah, M.Pd',         'Rina Marlina',   'belum',     null,    0, [], []),
        ];

        /* ===== UTIL ===== */
        function esc(s) {
            return String(s).replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
        }
        function jamSekarang() {
            const n = new Date();
            return `${String(n.getHours()).padStart(2, '0')}.${String(n.getMinutes()).padStart(2, '0')}`;
        }

        const STATUS = {
            menunggu:  { badge: 'bg-amber-100 text-amber-700',     txt: 'Perlu Disetujui', border: 'border-l-amber-400' },
            belum:     { badge: 'bg-gray-100 text-gray-500',       txt: 'Belum Dikirim',   border: 'border-l-gray-300' },
            disetujui: { badge: 'bg-emerald-100 text-emerald-700', txt: 'Disetujui',       border: 'border-l-emerald-400' },
        };
        const CHIP_ABSEN = {
            Sakit: 'bg-blue-50 text-blue-700',
            Izin:  'bg-violet-50 text-violet-700',
            Dispen:'bg-purple-50 text-purple-700',
            Alpa:  'bg-red-50 text-red-700',
        };

        /* Analisis per siswa: seharian atau hanya sebagian mapel */
        function analisisSiswa(k) {
            const peta = {};
            k.jurnal.forEach((j, i) => {
                Object.keys(j.absen).forEach(nama => {
                    const e = peta[nama] = peta[nama] || { status: [], idx: [] };
                    if (!e.status.includes(j.absen[nama])) e.status.push(j.absen[nama]);
                    e.idx.push(i);
                });
            });
            return Object.keys(peta).map(nama => {
                const e = peta[nama];
                const penuh = e.idx.length === k.jurnal.length;
                const dispen = e.status.length === 1 && e.status[0] === 'Dispen';
                return { nama, status: e.status, idx: e.idx, penuh, perluCek: !penuh && !dispen };
            });
        }
        function jumlahPerluCek(k) { return analisisSiswa(k).filter(s => s.perluCek).length; }

        /* ===== STATE ===== */
        let filterStatus = 'semua';
        const searchInput = document.getElementById('searchInput');
        const tingkatSelect = document.getElementById('tingkatSelect');
        let kelasTerbuka = null;

        function urutan() {
            const bobot = { menunggu: 0, belum: 1, disetujui: 2 };
            return KELAS.slice().sort((a, b) =>
                bobot[a.status] - bobot[b.status] || (a.dikirim || '99').localeCompare(b.dikirim || '99'));
        }

        /* ===== TAB, PROGRES, DAFTAR ===== */
        function renderProgres() {
            const total = KELAS.length;
            const ok = KELAS.filter(k => k.status === 'disetujui').length;
            document.getElementById('progressText').textContent = `${ok} dari ${total} kelas disetujui`;
            document.getElementById('progressBar').style.width = `${total ? (ok / total) * 100 : 0}%`;
        }

        function renderTabs() {
            const n = s => KELAS.filter(k => k.status === s).length;
            const tabs = [
                { k: 'semua',     label: 'Semua',           n: KELAS.length,    aktif: 'bg-dark-green text-white',  idle: 'bg-gray-100 text-gray-600' },
                { k: 'menunggu',  label: 'Perlu Disetujui', n: n('menunggu'),   aktif: 'bg-amber-500 text-white',   idle: 'bg-amber-50 text-amber-700' },
                { k: 'belum',     label: 'Belum Dikirim',   n: n('belum'),      aktif: 'bg-gray-600 text-white',    idle: 'bg-gray-100 text-gray-600' },
                { k: 'disetujui', label: 'Disetujui',       n: n('disetujui'),  aktif: 'bg-emerald-600 text-white', idle: 'bg-emerald-50 text-emerald-700' },
            ];
            const wadah = document.getElementById('statusTabs');
            wadah.innerHTML = tabs.map(t => `
                <button type="button" data-k="${t.k}" aria-pressed="${t.k === filterStatus}"
                    class="status-tab text-[10px] md:text-xs font-bold px-3.5 py-1.5 rounded-full transition ${t.k === filterStatus ? t.aktif : t.idle}">
                    ${t.label} <span class="opacity-70">${t.n}</span>
                </button>`).join('');
            wadah.querySelectorAll('.status-tab').forEach(b => b.addEventListener('click', () => {
                filterStatus = b.dataset.k;
                render();
            }));
        }

        function rowHtml(k) {
            const st = STATUS[k.status];
            const klik = k.status !== 'belum';
            const tdHadir = new Set(k.jurnal.flatMap(j => Object.keys(j.absen))).size;
            const cek = k.status === 'menunggu' ? jumlahPerluCek(k) : 0;
            const info = klik
                ? `${k.jurnal.length} mapel &middot; ${tdHadir > 0 ? tdHadir + ' siswa tidak hadir' : 'semua hadir'} &middot; dikirim ${k.dikirim}`
                : 'Sekretaris belum mengirim jurnal';
            const isi = `
                <div class="w-10 h-10 rounded-xl ${klik ? 'bg-dark-green text-mint-green' : 'bg-gray-100 text-gray-400'} flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-school text-sm"></i>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-xs md:text-sm font-extrabold text-dark-green">${esc(k.kelas)}</p>
                    <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5 truncate">Wali: ${esc(k.wali)} &middot; Sekre: ${esc(k.sekre)}</p>
                    <p class="text-[10px] md:text-[11px] text-gray-400 mt-0.5 truncate">${info}</p>
                </div>
                <div class="flex flex-col items-end gap-1 shrink-0">
                    <span class="text-[9px] md:text-[10px] font-bold ${st.badge} px-2.5 py-1 rounded-full whitespace-nowrap">${st.txt}</span>
                    ${cek > 0 ? `<span class="text-[8px] md:text-[9px] font-bold bg-amber-50 text-amber-700 border border-amber-200 px-2 py-0.5 rounded-full whitespace-nowrap"><i class="fa-solid fa-triangle-exclamation mr-1"></i>${cek} perlu dicek</span>` : ''}
                </div>
                ${klik ? '<i class="fa-solid fa-chevron-right text-[10px] text-gray-300 shrink-0"></i>' : ''}`;
            const dasar = `bg-white border border-gray-100 border-l-4 ${st.border} rounded-2xl p-3.5 flex items-center gap-3`;
            return klik
                ? `<button type="button" onclick="bukaKelas(${k.id})" class="w-full text-left ${dasar} hover:border-medium-green hover:shadow-sm active:scale-[0.99] transition">${isi}</button>`
                : `<div class="${dasar} opacity-80">${isi}</div>`;
        }

        function render() {
            renderProgres();
            renderTabs();
            const q = searchInput.value.trim().toLowerCase();
            const tk = tingkatSelect.value;
            const hasil = urutan().filter(k => {
                if (filterStatus !== 'semua' && k.status !== filterStatus) return false;
                if (tk && k.tingkat !== tk) return false;
                if (!q) return true;
                return (k.kelas + ' ' + k.wali + ' ' + k.sekre).toLowerCase().includes(q);
            });
            document.getElementById('kelasList').innerHTML = hasil.map(rowHtml).join('');
            document.getElementById('emptyState').classList.toggle('hidden', hasil.length > 0);
        }
        searchInput.addEventListener('input', render);
        tingkatSelect.addEventListener('change', render);

        /* ===== MODAL REKAP ===== */
        function blokRingkasan(k, siswa) {
            const hitung = {};
            siswa.forEach(s => { const p = s.status[0]; hitung[p] = (hitung[p] || 0) + 1; });
            const chips = Object.keys(hitung).map(st =>
                `<span class="text-[10px] md:text-[11px] font-bold ${CHIP_ABSEN[st]} px-2.5 py-1 rounded-full">${st} ${hitung[st]}</span>`).join('');
            return `
            <div class="grid grid-cols-3 gap-2.5">
                <div class="bg-gray-50 rounded-xl p-3 text-center">
                    <p class="text-lg md:text-xl font-black text-dark-green">${k.jurnal.length}</p>
                    <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Mapel</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-3 text-center">
                    <p class="text-lg md:text-xl font-black ${siswa.length ? 'text-amber-600' : 'text-emerald-600'}">${siswa.length}</p>
                    <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Tidak Hadir</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-3 text-center">
                    <p class="text-lg md:text-xl font-black ${siswa.some(s => s.perluCek) ? 'text-amber-600' : 'text-dark-green'}">${siswa.filter(s => s.perluCek).length}</p>
                    <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Perlu Dicek</p>
                </div>
            </div>
            ${chips ? `<div class="flex flex-wrap gap-1.5">${chips}</div>` : ''}`;
        }

        function blokSiswa(k, siswa) {
            if (siswa.length === 0) {
                return `<p class="text-xs text-emerald-600 font-semibold bg-emerald-50 rounded-xl px-3 py-2.5"><i class="fa-solid fa-circle-check mr-1.5"></i>Semua siswa hadir di semua mapel.</p>`;
            }
            return `<ul class="space-y-1.5">` + siswa.map(s => {
                const keterangan = s.penuh
                    ? 'Seharian (semua mapel)'
                    : 'Hanya: ' + s.idx.map(i => k.jurnal[i].mapel).join(', ');
                return `
                <li class="flex items-start justify-between gap-2 rounded-xl ${s.perluCek ? 'bg-amber-50 border border-amber-200' : 'bg-gray-50'} px-3 py-2">
                    <div class="min-w-0">
                        <p class="text-xs font-bold text-dark-green">${esc(s.nama)}</p>
                        <p class="text-[10px] ${s.perluCek ? 'text-amber-700 font-semibold' : 'text-gray-500'} mt-0.5">${esc(keterangan)}</p>
                    </div>
                    <div class="flex flex-wrap justify-end gap-1 shrink-0">
                        ${s.status.map(st => `<span class="text-[9px] font-bold ${CHIP_ABSEN[st]} px-2 py-0.5 rounded-full">${st}</span>`).join('')}
                        ${s.perluCek ? '<span class="text-[9px] font-bold bg-amber-100 text-amber-700 px-2 py-0.5 rounded-full">Cek</span>' : ''}
                    </div>
                </li>`;
            }).join('') + `</ul>`;
        }

        function blokJurnal(k) {
            return k.jurnal.map(j => {
                const nama = Object.keys(j.absen);
                const hadir = nama.length
                    ? `<div class="flex flex-wrap gap-1.5">${nama.map(n => `<span class="text-[10px] font-semibold ${CHIP_ABSEN[j.absen[n]]} px-2 py-0.5 rounded-full">${esc(n)} &middot; ${j.absen[n]}</span>`).join('')}</div>`
                    : '<span class="text-emerald-600 font-semibold">Semua hadir</span>';
                return `
                <div class="rounded-xl border border-[#E5DCCE] p-3.5">
                    <div class="flex items-start justify-between gap-2">
                        <div class="min-w-0">
                            <p class="text-xs md:text-sm font-bold text-dark-green">${esc(j.mapel)}</p>
                            <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5">${esc(j.guru)}</p>
                        </div>
                        <div class="text-right shrink-0">
                            <p class="text-[10px] font-bold text-medium-green">Jam ${j.jam}</p>
                            <p class="text-[10px] text-gray-400">${j.waktu}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-[62px_1fr] gap-x-2 gap-y-1.5 mt-3 text-[11px] md:text-xs text-gray-600 leading-relaxed">
                        <span class="text-[9px] font-bold uppercase tracking-wide text-gray-400 pt-0.5">Materi</span>
                        <span>${esc(j.materi)}</span>
                        <span class="text-[9px] font-bold uppercase tracking-wide text-gray-400 pt-0.5">Aktivitas</span>
                        <span>${esc(j.akt)}</span>
                        <span class="text-[9px] font-bold uppercase tracking-wide text-gray-400 pt-0.5">Kehadiran</span>
                        <div>${hadir}</div>
                    </div>
                    ${j.diubah ? '<p class="mt-2.5 text-[10px] font-semibold text-blue-600"><i class="fa-solid fa-pen mr-1"></i>Kehadiran dikoreksi sekretaris</p>' : ''}
                </div>`;
            }).join('');
        }

        function footerHtml(k) {
            if (k.status === 'menunggu') {
                return `
                <div class="flex flex-col-reverse sm:flex-row gap-2">
                    <button type="button" onclick="setujui(${k.id}, true)"
                        class="sm:flex-1 py-2.5 rounded-xl border border-medium-green text-medium-green text-xs font-bold hover:bg-emerald-50 transition">
                        Setujui &amp; Kelas Berikutnya
                    </button>
                    <button type="button" onclick="setujui(${k.id}, false)"
                        class="sm:flex-1 py-2.5 rounded-xl bg-dark-green hover:bg-medium-green text-white text-xs font-bold transition">
                        <i class="fa-solid fa-circle-check mr-1.5"></i>Setujui Jurnal ${esc(k.kelas)}
                    </button>
                </div>`;
            }
            const d = k.disetujui || {};
            return `
            <div class="flex items-center justify-between gap-3">
                <p class="text-[10px] md:text-xs text-emerald-700 font-semibold">
                    <i class="fa-solid fa-circle-check mr-1.5"></i>Disetujui oleh ${esc(d.oleh || '-')} pukul ${esc(d.pada || '-')}
                </p>
                <button type="button" onclick="tutupDetail()" class="px-4 py-2 rounded-xl border border-gray-200 text-gray-600 text-xs font-bold hover:bg-gray-50 transition">Tutup</button>
            </div>`;
        }

        function bukaKelas(id) {
            const k = KELAS.find(x => x.id === id);
            if (!k || k.status === 'belum') return;
            kelasTerbuka = id;
            const siswa = analisisSiswa(k);
            const st = STATUS[k.status];

            document.getElementById('dKelas').textContent = k.kelas;
            document.getElementById('dMeta').textContent =
                `Wali kelas ${k.wali} \u00B7 Sekretaris ${k.sekre} \u00B7 Dikirim ${k.dikirim}`;
            const badge = document.getElementById('dBadge');
            badge.className = `text-[9px] font-bold px-2.5 py-1 rounded-full whitespace-nowrap ${st.badge}`;
            badge.textContent = st.txt;

            document.getElementById('dBody').innerHTML = `
                ${blokRingkasan(k, siswa)}
                <div>
                    <p class="text-[10px] font-bold text-gray-500 mb-2">Siswa Tidak Hadir Hari Ini</p>
                    ${blokSiswa(k, siswa)}
                </div>
                <div>
                    <p class="text-[10px] font-bold text-gray-500 mb-2">Jurnal per Mata Pelajaran (${k.jurnal.length})</p>
                    <div class="space-y-3">${blokJurnal(k)}</div>
                </div>`;
            document.getElementById('dFooter').innerHTML = footerHtml(k);

            const m = document.getElementById('detailModal');
            m.classList.remove('hidden');
            m.classList.add('flex');
            document.body.classList.add('overflow-hidden');
            document.getElementById('dBody').scrollTop = 0;
        }

        function tutupDetail() {
            const m = document.getElementById('detailModal');
            m.classList.add('hidden');
            m.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
            kelasTerbuka = null;
        }
        document.getElementById('detailModal').addEventListener('click', e => { if (e.target === e.currentTarget) tutupDetail(); });
        document.addEventListener('keydown', e => { if (e.key === 'Escape') tutupDetail(); });

        /* ===== PERSETUJUAN ===== */
        function setujui(id, lanjut) {
            const k = KELAS.find(x => x.id === id);
            if (!k || k.status !== 'menunggu') return;
            k.status = 'disetujui';
            k.disetujui = { oleh: ME, pada: jamSekarang() };

            if (lanjut) {
                const berikut = urutan().find(x => x.status === 'menunggu');
                render();
                if (berikut) {
                    bukaKelas(berikut.id);
                    showToast(`${k.kelas} disetujui. Lanjut ke ${berikut.kelas}.`);
                } else {
                    tutupDetail();
                    showToast('Semua jurnal yang masuk sudah disetujui.');
                }
                return;
            }
            tutupDetail();
            render();
            showToast(`Jurnal ${k.kelas} disetujui.`);
        }

        /* ===== TOAST ===== */
        let toastTimer;
        function showToast(pesan) {
            const t = document.getElementById('toast');
            document.getElementById('toastText').textContent = pesan;
            t.classList.remove('hidden');
            clearTimeout(toastTimer);
            toastTimer = setTimeout(() => t.classList.add('hidden'), 2600);
        }

        render();
    </script>
</body>
</html>