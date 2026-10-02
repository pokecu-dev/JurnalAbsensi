<!DOCTYPE html>
<html lang="id" class="overscroll-none">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Dispensasi</title>

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
                            class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-solid fa-inbox w-4 text-center"></i>
                            Jurnal Masuk
                        </a>

                        <a href="{{ url('/piket/dispensasi') }}"
                            class="flex items-center gap-3 px-4 py-3 bg-white/10 text-mint-green rounded-xl transition active:scale-[0.98]">
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
                <h1 class="text-base sm:text-lg md:text-2xl font-black text-dark-green tracking-tight leading-snug">Riwayat Dispensasi</h1>
                <p class="text-[11px] sm:text-xs text-medium-green font-semibold mt-0.5">
                    Semua pengajuan dispensasi dari guru piket, beserta status persetujuannya.
                </p>
            </div>
            <div class="text-right leading-tight shrink-0">
                <div id="live-date" class="text-[9px] sm:text-[10px] md:text-xs font-semibold text-medium-green whitespace-nowrap">memuat tanggal....</div>
                <div id="live-clock" class="text-[10px] sm:text-xs font-extrabold text-dark-green mt-0.5">00.00 WIB</div>
            </div>
        </header>

        <!-- FILTER -->
        <section class="bg-white rounded-2xl border border-emerald-100 p-3.5 md:p-4 space-y-3">
            <div class="flex flex-col sm:flex-row sm:items-center gap-2.5">
                <div class="relative flex-1">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                    <input id="searchInput" type="text" placeholder="Cari kegiatan, nama siswa, atau kelas..."
                        class="w-full pl-9 pr-3 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-xs outline-none focus:border-purple-400 focus:bg-white transition">
                </div>
                <a href="{{ url('/piket/dashboard') }}#pengajuanDispensasi"
                    class="inline-flex items-center justify-center gap-2 bg-purple-600 hover:bg-purple-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition whitespace-nowrap">
                    <i class="fa-solid fa-plus"></i> Ajukan Dispensasi
                </a>
            </div>

            <div id="statusTabs" class="flex flex-wrap items-center gap-2"></div>
        </section>

        <!-- DAFTAR -->
        <section id="dispenList" class="space-y-2.5"></section>

        <button id="moreBtn" type="button" onclick="tampilkanLebih()"
            class="hidden w-full py-2.5 rounded-xl border border-gray-200 bg-white text-xs font-bold text-gray-500 hover:bg-gray-50 transition">
            Tampilkan lebih banyak
        </button>

        <div id="emptyState" class="hidden bg-white rounded-2xl border border-gray-100 p-10 text-center">
            <div class="w-12 h-12 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center mx-auto mb-3">
                <i class="fa-regular fa-folder-open"></i>
            </div>
            <p class="text-xs font-bold text-gray-500">Tidak ada dispensasi yang cocok.</p>
        </div>
    </main>

    <!-- ============================================================= -->
    <!-- MODAL DETAIL DISPENSASI  -->
    <!-- ============================================================= -->
    <div id="detailModal" class="fixed inset-0 z-[70] hidden items-end md:items-center justify-center bg-dark-green/60 backdrop-blur-sm p-0 md:p-4">
        <div class="bg-white rounded-t-3xl md:rounded-2xl w-full md:max-w-lg max-h-[90vh] flex flex-col shadow-2xl overflow-hidden">
            <div class="shrink-0 flex items-start justify-between gap-3 px-5 pt-5 pb-3 border-b border-gray-100">
                <div class="min-w-0">
                    <span class="text-[9px] uppercase tracking-wider font-black text-purple-600">Detail Dispensasi</span>
                    <h2 id="dKegiatan" class="text-base md:text-lg font-black text-dark-green mt-0.5 leading-snug">-</h2>
                    <div id="dBadges" class="flex flex-wrap items-center gap-1.5 mt-2"></div>
                </div>
                <button type="button" onclick="tutupDetail()" aria-label="Tutup"
                    class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center hover:bg-gray-200 shrink-0">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div id="dBody" class="overflow-y-auto p-5 space-y-4"></div>
            <div class="shrink-0 px-5 py-3 border-t border-gray-100">
                <button type="button" onclick="tutupDetail()"
                    class="w-full py-2.5 rounded-xl border border-gray-200 text-gray-600 text-xs font-bold hover:bg-gray-50 transition">Tutup</button>
            </div>
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

        
        function iso(offsetHari) {
            const d = new Date();
            d.setDate(d.getDate() + offsetHari);
            return `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`;
        }

        const DISPEN = [
            { id: 1, kegiatan: 'Lomba Film Pendek Antar SMK', jenis: 'Lomba / Kegiatan',
              mulai: iso(2), selesai: iso(3), jam: null, status: 'menunggu',
              diajukanOleh: 'Arif Setyobudi, S.Pd', diajukanPada: `${iso(0)} 07.45`, keputusan: null,
              catatan: 'Berangkat dari sekolah pukul 07.30, didampingi Pak Endik.',
              foto: [null, null],
              siswa: [
                { nama: 'Ahmad Fauzan', kelas: 'XI DKV 2' }, { nama: 'Citra Ayu', kelas: 'XI DKV 2' },
                { nama: 'Bagas Setiawan', kelas: 'XI PSPT 1' }, { nama: 'Dimas Prasetyo', kelas: 'XI AN 1' },
              ] },
            { id: 2, kegiatan: 'Jaga Screening PMR', jenis: 'Tugas Sekolah',
              mulai: iso(0), selesai: iso(0), jam: { label: 'Jam ke-2 s/d 4', rentang: '07.40 - 09.40' }, status: 'disetujui',
              diajukanOleh: 'Arif Setyobudi, S.Pd', diajukanPada: `${iso(0)} 07.10`,
              keputusan: { oleh: 'Fajar Luthfianto, S.Pd', pada: `${iso(0)} 07.20`, alasan: null },
              catatan: '', foto: [null],
              siswa: [
                { nama: 'Dewi Lestari', kelas: 'XI DKV 2' }, { nama: 'Gita Permata', kelas: 'XI TKJ 1' },
                { nama: 'Indah Sari', kelas: 'X AK 3' },
              ] },
            { id: 3, kegiatan: 'Mengambil laptop di rumah', jenis: 'Tugas Sekolah',
              mulai: iso(-1), selesai: iso(-1), jam: { label: 'Jam ke-5 s/d 6', rentang: '10.00 - 11.10' }, status: 'disetujui',
              diajukanOleh: 'Sunarti, S.Pd', diajukanPada: `${iso(-1)} 09.50`,
              keputusan: { oleh: 'Setiyo Winarko, S.Pd', pada: `${iso(-1)} 09.58`, alasan: null },
              catatan: 'Untuk praktik Koding dan Kecerdasan Artifisial.', foto: [null],
              siswa: [{ nama: 'Eko Prasetyo', kelas: 'XI RPL 1' }] },
            { id: 4, kegiatan: 'Olimpiade Matematika Tingkat Kabupaten', jenis: 'Lomba / Kegiatan',
              mulai: iso(-6), selesai: iso(-5), jam: null, status: 'disetujui',
              diajukanOleh: 'Isti Mufadah, S.Pd', diajukanPada: `${iso(-8)} 10.15`,
              keputusan: { oleh: 'Fajar Luthfianto, S.Pd', pada: `${iso(-8)} 11.30`, alasan: null },
              catatan: '', foto: [null, null, null],
              siswa: [
                { nama: 'Fajar Ramadhan', kelas: 'XI TKJ 2' }, { nama: 'Hendra Wijaya', kelas: 'X TKI 1' },
                { nama: 'Siti Nurhaliza', kelas: 'X DKV 1' },
              ] },
            { id: 5, kegiatan: 'Kunjungan Industri', jenis: 'Lainnya',
              mulai: iso(-9), selesai: iso(-9), jam: null, status: 'ditolak',
              diajukanOleh: 'Sunarti, S.Pd', diajukanPada: `${iso(-11)} 08.05`,
              keputusan: { oleh: 'Hendro Suwignyo, ST', pada: `${iso(-11)} 09.40`, alasan: 'Surat tugas belum ditandatangani Kepala Sekolah. Silakan ajukan ulang setelah lengkap.' },
              catatan: '', foto: [null],
              siswa: [{ nama: 'Budi Santoso', kelas: 'XI TKJ 2' }, { nama: 'Rina Marlina', kelas: 'XI TKI 2' }] },
            { id: 6, kegiatan: 'Festival Film Pelajar Jawa Timur', jenis: 'Lomba / Kegiatan',
              mulai: iso(-21), selesai: iso(-19), jam: null, status: 'disetujui',
              diajukanOleh: 'Arif Setyobudi, S.Pd', diajukanPada: `${iso(-24)} 07.30`,
              keputusan: { oleh: 'Fajar Luthfianto, S.Pd', pada: `${iso(-24)} 08.45`, alasan: null },
              catatan: 'Berangkat bersama pembina, kembali H+3.', foto: [null, null],
              siswa: [
                { nama: 'Ahmad Fauzan', kelas: 'XI DKV 2' }, { nama: 'Dewi Lestari', kelas: 'XI DKV 2' },
                { nama: 'Bagas Setiawan', kelas: 'XI PSPT 1' }, { nama: 'Dimas Prasetyo', kelas: 'XI AN 1' },
                { nama: 'Gita Permata', kelas: 'XII DKV 1' },
              ] },
        ];

        /* ===== UTIL ===== */
        function esc(s) {
            return String(s).replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
        }
        function tgl(s) { return new Date(s + 'T00:00:00'); }
        function startOfToday() { const n = new Date(); return new Date(n.getFullYear(), n.getMonth(), n.getDate()); }
        function fmtPendek(d) { return d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' }); }
        function fmtPanjang(d) { return d.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' }); }
        function fmtWaktuPengajuan(s) {
            const p = s.split(' ');
            return `${fmtPendek(tgl(p[0]))}, ${p[1]}`;
        }
        function jumlahKelas(d) { return new Set(d.siswa.map(s => s.kelas)).size; }

        function waktuSingkat(d) {
            const m = tgl(d.mulai), s = tgl(d.selesai);
            if (d.jam) return `${fmtPendek(m)} \u00B7 ${d.jam.label}`;
            if (d.mulai === d.selesai) return `${fmtPendek(m)} \u00B7 1 hari penuh`;
            return `${fmtPendek(m)} - ${fmtPendek(s)}`;
        }
        function waktuPanjang(d) {
            const m = tgl(d.mulai), s = tgl(d.selesai);
            if (d.jam) return `${fmtPanjang(m)}, ${d.jam.label} (${d.jam.rentang})`;
            if (d.mulai === d.selesai) return `${fmtPanjang(m)} (1 hari penuh)`;
            return `${fmtPanjang(m)} s/d ${fmtPanjang(s)}`;
        }

        /* Fase dispen yang sudah disetujui: berlangsung / mendatang / selesai */
        function fase(d) {
            if (d.status !== 'disetujui') return null;
            const hariIni = startOfToday();
            if (tgl(d.selesai) < hariIni) return 'selesai';
            if (tgl(d.mulai) > hariIni) return 'mendatang';
            return 'berlangsung';
        }

        const STATUS = {
            menunggu:  { badge: 'bg-amber-100 text-amber-700',     txt: 'Menunggu',  border: 'border-l-amber-400' },
            disetujui: { badge: 'bg-emerald-100 text-emerald-700', txt: 'Disetujui', border: 'border-l-emerald-400' },
            ditolak:   { badge: 'bg-red-100 text-red-700',         txt: 'Ditolak',   border: 'border-l-red-400' },
        };
        const FASE = {
            berlangsung: { cls: 'bg-dark-green text-white',  txt: 'Berlangsung' },
            mendatang:   { cls: 'bg-gray-100 text-gray-500', txt: 'Mendatang' },
            selesai:     { cls: 'bg-gray-100 text-gray-500', txt: 'Selesai' },
        };

        /* ===== STATE FILTER ===== */
        let filterStatus = 'semua';
        let batas = 8;
        const searchInput = document.getElementById('searchInput');

        function urut() {
            return DISPEN.slice().sort((a, b) => (b.diajukanPada > a.diajukanPada ? 1 : -1));
        }

        function renderTabs() {
            const hitung = s => DISPEN.filter(d => d.status === s).length;
            const tabs = [
                { k: 'semua',     label: 'Semua',     n: DISPEN.length,        aktif: 'bg-dark-green text-white',  idle: 'bg-gray-100 text-gray-600' },
                { k: 'menunggu',  label: 'Menunggu',  n: hitung('menunggu'),   aktif: 'bg-amber-500 text-white',   idle: 'bg-amber-50 text-amber-700' },
                { k: 'disetujui', label: 'Disetujui', n: hitung('disetujui'),  aktif: 'bg-emerald-600 text-white', idle: 'bg-emerald-50 text-emerald-700' },
                { k: 'ditolak',   label: 'Ditolak',   n: hitung('ditolak'),    aktif: 'bg-red-500 text-white',     idle: 'bg-red-50 text-red-600' },
            ];
            const wadah = document.getElementById('statusTabs');
            wadah.innerHTML = tabs.map(t => `
                <button type="button" data-k="${t.k}" aria-pressed="${t.k === filterStatus}"
                    class="status-tab text-[10px] md:text-xs font-bold px-3.5 py-1.5 rounded-full transition ${t.k === filterStatus ? t.aktif : t.idle}">
                    ${t.label} <span class="opacity-70">${t.n}</span>
                </button>`).join('');
            wadah.querySelectorAll('.status-tab').forEach(b => b.addEventListener('click', () => {
                filterStatus = b.dataset.k;
                batas = 8;
                render();
            }));
        }

        function rowHtml(d) {
            const st = STATUS[d.status];
            const f = fase(d);
            const faseChip = f && f !== 'selesai'
                ? `<span class="text-[8px] md:text-[9px] font-bold ${FASE[f].cls} px-2 py-0.5 rounded-full whitespace-nowrap">${FASE[f].txt}</span>` : '';
            return `
            <button type="button" onclick="bukaDetail(${d.id})"
                class="w-full text-left bg-white border border-gray-100 border-l-4 ${st.border} rounded-2xl p-3.5 flex items-center gap-3 hover:border-purple-300 hover:shadow-sm active:scale-[0.99] transition">
                <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-calendar-days text-sm"></i>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-xs md:text-sm font-extrabold text-dark-green truncate">${esc(d.kegiatan)}</p>
                    <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5 truncate">${esc(waktuSingkat(d))}</p>
                    <p class="text-[10px] md:text-[11px] text-gray-400 mt-0.5 truncate">
                        ${d.siswa.length} siswa &middot; ${jumlahKelas(d)} kelas &middot; ${esc(d.jenis)}
                    </p>
                </div>
                <div class="flex flex-col items-end gap-1 shrink-0">
                    <span class="text-[9px] md:text-[10px] font-bold ${st.badge} px-2.5 py-1 rounded-full whitespace-nowrap">${st.txt}</span>
                    ${faseChip}
                </div>
                <i class="fa-solid fa-chevron-right text-[10px] text-gray-300 shrink-0"></i>
            </button>`;
        }

        function render() {
            renderTabs();
            const q = searchInput.value.trim().toLowerCase();
            const hasil = urut().filter(d => {
                if (filterStatus !== 'semua' && d.status !== filterStatus) return false;
                if (!q) return true;
                const teks = [d.kegiatan, d.jenis, ...d.siswa.map(s => s.nama + ' ' + s.kelas)].join(' ').toLowerCase();
                return teks.includes(q);
            });
            document.getElementById('dispenList').innerHTML = hasil.slice(0, batas).map(rowHtml).join('');
            document.getElementById('emptyState').classList.toggle('hidden', hasil.length > 0);
            document.getElementById('moreBtn').classList.toggle('hidden', hasil.length <= batas);
        }
        function tampilkanLebih() { batas += 8; render(); }
        searchInput.addEventListener('input', () => { batas = 8; render(); });

        /* ===== DETAIL ===== */
        function blokKeputusan(d) {
            if (d.status === 'menunggu') {
                return `<div class="rounded-xl bg-amber-50 border border-amber-100 p-3 flex gap-2.5">
                    <i class="fa-solid fa-hourglass-half text-amber-500 text-xs mt-0.5"></i>
                    <p class="text-[11px] text-amber-700 leading-relaxed">Menunggu persetujuan Waka. Setelah disetujui, data diteruskan ke sekretaris kelas siswa terkait.</p>
                </div>`;
            }
            const k = d.keputusan || {};
            if (d.status === 'disetujui') {
                return `<div class="rounded-xl bg-emerald-50 border border-emerald-100 p-3 flex gap-2.5">
                    <i class="fa-solid fa-circle-check text-emerald-500 text-xs mt-0.5"></i>
                    <div class="text-[11px] text-emerald-700 leading-relaxed">
                        <p class="font-bold">Disetujui oleh ${esc(k.oleh || '-')}</p>
                        <p>${k.pada ? esc(fmtWaktuPengajuan(k.pada)) + ' &middot; ' : ''}Sudah diteruskan ke sekretaris kelas terkait.</p>
                    </div>
                </div>`;
            }
            return `<div class="rounded-xl bg-red-50 border border-red-100 p-3 flex gap-2.5">
                <i class="fa-solid fa-circle-xmark text-red-500 text-xs mt-0.5"></i>
                <div class="text-[11px] text-red-700 leading-relaxed">
                    <p class="font-bold">Ditolak oleh ${esc(k.oleh || '-')}</p>
                    ${k.alasan ? `<p class="mt-0.5">${esc(k.alasan)}</p>` : ''}
                </div>
            </div>`;
        }

        function blokSiswa(d) {
            const per = {};
            d.siswa.forEach(s => { (per[s.kelas] = per[s.kelas] || []).push(s.nama); });
            return Object.keys(per).sort().map(kelas => `
                <div class="rounded-xl border border-purple-100 bg-purple-50/40 p-2.5">
                    <p class="text-[9px] font-extrabold uppercase tracking-wide text-purple-700">${esc(kelas)} &middot; ${per[kelas].length} siswa</p>
                    <div class="flex flex-wrap gap-1.5 mt-1.5">
                        ${per[kelas].map(n => `<span class="text-[10px] md:text-[11px] font-semibold text-dark-green bg-white border border-purple-100 px-2.5 py-0.5 rounded-full">${esc(n)}</span>`).join('')}
                    </div>
                </div>`).join('');
        }

        function blokFoto(d) {
            if (!d.foto || d.foto.length === 0) return '<p class="text-[11px] text-gray-400">Tidak ada foto surat.</p>';
            return `<div class="grid grid-cols-3 gap-2">` + d.foto.map((u, i) => u
                ? `<a href="${esc(u)}" target="_blank" class="aspect-[3/4] rounded-lg overflow-hidden border border-gray-200 bg-gray-50 block"><img src="${esc(u)}" alt="Foto surat ${i + 1}" class="w-full h-full object-cover"></a>`
                : `<div class="aspect-[3/4] rounded-lg border border-gray-200 bg-gray-50 flex flex-col items-center justify-center text-gray-300">
                        <i class="fa-regular fa-image text-xl mb-1"></i><span class="text-[9px] font-semibold">Foto ${i + 1}</span>
                   </div>`).join('') + `</div>`;
        }

        function bukaDetail(id) {
            const d = DISPEN.find(x => x.id === id);
            if (!d) return;
            const st = STATUS[d.status];
            const f = fase(d);

            document.getElementById('dKegiatan').textContent = d.kegiatan;
            document.getElementById('dBadges').innerHTML =
                `<span class="text-[9px] font-bold ${st.badge} px-2.5 py-1 rounded-full">${st.txt}</span>` +
                (f ? `<span class="text-[9px] font-bold ${FASE[f].cls} px-2.5 py-1 rounded-full">${FASE[f].txt}</span>` : '') +
                `<span class="text-[9px] font-bold bg-purple-50 text-purple-700 px-2.5 py-1 rounded-full">${esc(d.jenis)}</span>`;

            document.getElementById('dBody').innerHTML = `
                ${blokKeputusan(d)}

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div class="bg-gray-50 rounded-xl p-3 sm:col-span-2">
                        <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Waktu</p>
                        <p class="text-xs font-bold text-dark-green mt-1 leading-relaxed">${esc(waktuPanjang(d))}</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Diajukan oleh</p>
                        <p class="text-xs font-bold text-dark-green mt-1">${esc(d.diajukanOleh)}</p>
                        <p class="text-[10px] text-gray-500">${esc(fmtWaktuPengajuan(d.diajukanPada))}</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Peserta</p>
                        <p class="text-xs font-bold text-dark-green mt-1">${d.siswa.length} siswa</p>
                        <p class="text-[10px] text-gray-500">${jumlahKelas(d)} kelas</p>
                    </div>
                </div>

                <div>
                    <p class="text-[10px] font-bold text-gray-500 mb-2">Siswa per Kelas</p>
                    <div class="space-y-2">${blokSiswa(d)}</div>
                </div>

                <div>
                    <p class="text-[10px] font-bold text-gray-500 mb-2">Foto Surat Dispensasi</p>
                    ${blokFoto(d)}
                </div>

                ${d.catatan ? `<div class="bg-gray-50 rounded-xl p-3">
                    <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Catatan</p>
                    <p class="text-xs text-gray-600 leading-relaxed mt-1">${esc(d.catatan)}</p>
                </div>` : ''}`;

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
        }
        document.getElementById('detailModal').addEventListener('click', e => { if (e.target === e.currentTarget) tutupDetail(); });
        document.addEventListener('keydown', e => { if (e.key === 'Escape') tutupDetail(); });

        render();
    </script>
</body>
</html>