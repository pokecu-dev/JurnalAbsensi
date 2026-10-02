<!DOCTYPE html>
<html lang="id" class="overscroll-none">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Piket </title>

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
                            class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                            <i class="fa-regular fa-calendar-days w-4 text-center"></i>
                            Dispensasi
                        </a>

                        <a href="{{ url('/piket/jadwal') }}"
                            class="flex items-center gap-3 px-4 py-3 bg-white/10 text-mint-green rounded-xl transition active:scale-[0.98]">
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
                <h1 class="text-base sm:text-lg md:text-2xl font-black text-dark-green tracking-tight leading-snug">Jadwal Piket KBM</h1>
                <p class="text-[11px] sm:text-xs text-medium-green font-semibold mt-0.5">
                    Semester Ganjil 2026/2027 &middot; berganti Minggu A dan Minggu B
                </p>
            </div>
            <div class="text-right leading-tight shrink-0">
                <div id="live-date" class="text-[9px] sm:text-[10px] md:text-xs font-semibold text-medium-green whitespace-nowrap">memuat tanggal....</div>
                <div id="live-clock" class="text-[10px] sm:text-xs font-extrabold text-dark-green mt-0.5">00.00 WIB</div>
            </div>
        </header>

        <!-- GILIRAN PIKET KAMU -->
        <section id="giliranKamu" class="hidden bg-dark-green text-white rounded-2xl p-4 sm:p-5 shadow-md">
            <div class="flex items-center gap-2 mb-3">
                <div class="w-8 h-8 rounded-lg bg-white/10 text-mint-green flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-user-clock text-xs"></i>
                </div>
                <div>
                    <span class="text-[9px] sm:text-[10px] text-mint-green/80 uppercase tracking-wider font-extrabold">Giliran Piket Kamu</span>
                    <p class="text-[10px] sm:text-xs text-gray-300 font-semibold">Tiga jadwal terdekat.</p>
                </div>
            </div>
            <div id="giliranList" class="grid grid-cols-1 sm:grid-cols-3 gap-2"></div>
        </section>

        <!-- NAVIGASI MINGGU + TAB HARI -->
        <section class="space-y-3">
            <div class="flex items-center justify-between gap-2">
                <div class="flex items-center gap-2 min-w-0">
                    <button type="button" onclick="geserMinggu(-1)" aria-label="Minggu sebelumnya"
                        class="w-8 h-8 rounded-lg bg-white border border-emerald-100 text-medium-green flex items-center justify-center hover:border-medium-green active:scale-95 transition shrink-0">
                        <i class="fa-solid fa-chevron-left text-[10px]"></i>
                    </button>
                    <div class="min-w-0 text-center">
                        <p id="weekLabel" class="text-xs md:text-sm font-extrabold text-dark-green truncate">-</p>
                    </div>
                    <button type="button" onclick="geserMinggu(1)" aria-label="Minggu berikutnya"
                        class="w-8 h-8 rounded-lg bg-white border border-emerald-100 text-medium-green flex items-center justify-center hover:border-medium-green active:scale-95 transition shrink-0">
                        <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    </button>
                    <span id="weekChip" class="text-[9px] md:text-[10px] font-extrabold px-2.5 py-1 rounded-full whitespace-nowrap bg-[#CBEAD9] text-dark-green">Minggu A</span>
                </div>
                <button id="resetBtn" type="button" onclick="kembaliKeHariIni()"
                    class="hidden text-[10px] md:text-xs font-bold text-medium-green hover:text-dark-green whitespace-nowrap">
                    <i class="fa-solid fa-rotate-left mr-1"></i>Hari ini
                </button>
            </div>

            <div id="dayTabs" class="grid grid-cols-5 gap-2 md:gap-3" role="group" aria-label="Pilih hari"></div>
        </section>

        <!-- KARTU HARI TERPILIH -->
        <section id="dayCard" class="bg-white rounded-2xl shadow-sm border border-emerald-100 overflow-hidden"></section>
    </main>

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

        const TIM = [
            /* 1  Selasa A */ { waka: 'Niken Hari Pratiwi, S.Psi., M.Pd',
                pagi:  { koord: 'Lilik Suratmi, S.Pd', petugas: ['Sulistyowati, SS', 'Wiwik Yuniarsih, S.Pd', 'Sri Kusumastuti, S.Pd'] },
                siang: { koord: 'Widodo, S.Pd', petugas: ['Kasmi, S.Pd., M.Pd', 'Siti Munawaroh, S.Kom., M.Pd', 'Niken Dewi Hastika, S.Pd'] } },
            /* 2  Rabu A */ { waka: 'Hardini Indahing Budi, S.E., M.Pd',
                pagi:  { koord: 'Elyana Frisca Monica, S.Pd', petugas: ['Tutut Sriatin, S.Pd', 'Rika Okta Maulida, S.Ds.', 'Mufatiroh, S.Ag'] },
                siang: { koord: 'Erwan Septiyono, S.Pd', petugas: ['Siswanti Purwaningsih, S.T., M.Pd', 'Shinta Indyar Shanty Susanto, S.Kom', 'Dhuana Putri Puspitasary, S.Pd'] } },
            /* 3  Kamis A */ { waka: 'Hendro Suwignyo, ST',
                pagi:  { koord: 'Danang Anjar Hymawanto, S.Pd', petugas: ['Yuni Jiastuti, S.Pd', 'Yuli Ratnasari, S.Pd', 'Agus Pramono, S.Sn'] },
                siang: { koord: 'Istiana Suhartati, S.T', petugas: ['Risqi Nur Imama, S.Tr.Par', 'Luluk Munfarida, S.Pd', 'Tuhu Eries Kudori, S.Sn'] } },
            /* 4  Jumat A */ { waka: 'Fajar Luthfianto, S.Pd',
                pagi:  { koord: 'Joko Priyanto, S.Kom', petugas: ['Arif Setyobudi, S.Pd', 'Sunarti, S.Pd', 'Isti Mufadah, S.Pd'] },
                siang: { koord: 'Agung Yulianto, S.Pd', petugas: ['Dra. Hanik Pangestuti', 'Andri Krisdianto, SE., M.Pd', 'Fitria Renytasari, S.Pd'] } },
            /* 5  Senin B */ { waka: 'Setiyo Winarko, S.Pd',
                pagi:  { koord: 'Titin Sukmasari, S.Pd., M.Pd', petugas: ['Septiani, S.Pd., M.Pd', 'Martiin, S.Pd', 'Winarsih, S.Pd, M.Pd'] },
                siang: { koord: 'Lutfia Marsalina, S.Pd.I, M.Pd', petugas: ['Nurul Azizah, S.Pd', "Rifkotin Na'imah, S.Pd", 'Dra. Susakti Yuharini'] } },
            /* 6  Selasa B */ { waka: 'Niken Hari Pratiwi, S.Psi., M.Pd',
                pagi:  { koord: 'Ayu Puspitorini, ST', petugas: ['Rindang Rejeki, S.Pd', 'Diana Hartanti, S.T., M.Pd', 'Veronica Damay Rulitasari, S.Pd'] },
                siang: { koord: 'Agustina Mardika Rini, S.Pd., M.Pd', petugas: ['Umi Kulsum, S.Pd', 'Ruly Dwi Setyaningrum, S.Kom', 'Sri Rahayu, S.Pd'] } },
            /* 7  Rabu B */ { waka: 'Hardini Indahing Budi, S.E., M.Pd',
                pagi:  { koord: "Sa'ad Wazis Hiedayat, S.Pd", petugas: ['Dra. Anik Indriani', 'Retno Widyastuti, S.Pd., M.Pd', 'Nur Eko Wahyuningsih, S.Pd'] },
                siang: { koord: 'Dyah Esti Rahayu, S.Pd', petugas: ['Purwati, S.Pd', 'Ratih Dian Irawati, SE', 'Siti Maisaroh, S.Pd'] } },
            /* 8  Kamis B */ { waka: 'Hendro Suwignyo, ST',
                pagi:  { koord: 'Endang Ary Handayani, S.T., M.Pd', petugas: ['Siti Umiharsih, S.Pd', 'Erna Rinawati, S.Pd', 'Astra Bella Flamboyan, S.Psi'] },
                siang: { koord: 'Dian Mawarti, S.Pd', petugas: ['Ninik Sriwidayati, S.Pd., M.Pd', 'Endik Kuswantoro, S.Kom., M.T', 'Komariyah, S.Pd'] } },
            /* 9  Jumat B */ { waka: 'Fajar Luthfianto, S.Pd',
                pagi:  { koord: 'Kurnila Putri Islamawati, S.Pd', petugas: ['Yani, S.Pd.', 'Titik Samsistini, S.Pd', 'Pipit Ambarwati, S.Pd'] },
                siang: { koord: 'Nur Nastutisari, S.ST.Par.', petugas: ['Basuki Sarjono, S.Pd', 'Atih Wilupi, S.E, M.Pd', 'Nishfu Laili, S.Pd'] } },
            /* 10 Senin A */ { waka: 'Setiyo Winarko, S.Pd',
                pagi:  { koord: 'Dwi Rini Manfaati, S.Pd', petugas: ['Siti Khoiriyah, S.Pd', 'Peni Wulandari, S.Pd', 'Badrus Sulaiman, S.Pd.'] },
                siang: { koord: 'Dwi Kuswanto, S.Pd', petugas: ["Elysa Yuli Nur'aini, S.Si", 'Dwi Nova Setyandari, S.Pd', "Mas'an Widodo, S.Pd. M.T"] } },
        ];
        // posisi dalam siklus 14 hari (0 = Selasa 1 Sep 2026) -> indeks TIM
        const SIKLUS = { 0: 0, 1: 1, 2: 2, 3: 3, 6: 4, 7: 5, 8: 6, 9: 7, 10: 8, 13: 9 };

        
        const PENGECUALIAN = {};

        /* Nama guru yang sedang login (dummy). Nanti diganti nama user login. */
        const ME = 'Arif Setyobudi, S.Pd';

        const SHIFT = {
            pagi:  { label: 'Piket Pagi',  jam: '07.00 - 11.00', mulai: 7 * 60,  selesai: 11 * 60, icon: 'fa-sun' },
            siang: { label: 'Piket Siang', jam: '11.00 - 15.00', mulai: 11 * 60, selesai: 15 * 60, icon: 'fa-cloud-sun' },
        };
        const HARI = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        const HARI_SINGKAT = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum'];

        /* ===== UTIL TANGGAL ===== */
        function esc(s) {
            return String(s).replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
        }
        function mulaiHari(d) { return new Date(d.getFullYear(), d.getMonth(), d.getDate()); }
        function tambahHari(d, n) { const x = new Date(d); x.setDate(x.getDate() + n); return x; }
        function utcHari(d) { return Date.UTC(d.getFullYear(), d.getMonth(), d.getDate()); }
        function selisihHari(a, b) { return Math.round((utcHari(a) - utcHari(b)) / 86400000); }
        function isoTanggal(d) {
            return `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`;
        }
        function seninDari(d) {
            const dow = d.getDay(); // 0 = Minggu
            return tambahHari(mulaiHari(d), dow === 0 ? -6 : 1 - dow);
        }
        function fmtPendek(d) { return d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' }); }
        function fmtPanjang(d) { return d.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' }); }
        function sama(a, b) { return a.trim().toLowerCase() === b.trim().toLowerCase(); }

        /* ===== ATURAN ROTASI ===== */
        const TITIK_AWAL = new Date(2026, 8, 1);  // Selasa, 1 September 2026
        const SENIN_MINGGU_A = new Date(2026, 7, 31); // Senin sebelum titik awal

        function timUntuk(tgl) {
            const off = selisihHari(tgl, TITIK_AWAL);
            const pos = ((off % 14) + 14) % 14;
            const idx = SIKLUS[pos];
            return idx === undefined ? null : TIM[idx];
        }
        function hurufMinggu(senin) {
            const w = Math.floor(selisihHari(senin, SENIN_MINGGU_A) / 7);
            return (((w % 2) + 2) % 2) === 0 ? 'A' : 'B';
        }

        /* Peran ME pada tanggal tertentu (null jika tidak bertugas) */
        function tugasKamu(tgl) {
            const tim = timUntuk(tgl);
            if (!tim) return null;
            for (const k of ['pagi', 'siang']) {
                if (sama(tim[k].koord, ME)) return { shift: k, peran: 'Koordinator' };
                if (tim[k].petugas.some(p => sama(p, ME))) return { shift: k, peran: 'Petugas' };
            }
            return null;
        }

        /* ===== STATE ===== */
        const hariIni0 = mulaiHari(new Date());
        const dow0 = hariIni0.getDay();
        const akhirPekan = dow0 === 0 || dow0 === 6;
        const GESER_AWAL = akhirPekan ? 1 : 0;           // akhir pekan: tampilkan minggu depan
        const HARI_AWAL = akhirPekan ? 0 : dow0 - 1;
        let geser = GESER_AWAL;
        let hariDipilih = HARI_AWAL;

        function seninTampil() { return tambahHari(seninDari(new Date()), geser * 7); }

        function geserMinggu(n) { geser += n; render(); }
        function kembaliKeHariIni() { geser = GESER_AWAL; hariDipilih = HARI_AWAL; render(); }

        function labelRelatif(tgl) {
            const s = selisihHari(tgl, new Date());
            if (s === 0) return 'Hari ini';
            if (s === 1) return 'Besok';
            if (s === -1) return 'Kemarin';
            return '';
        }

        /* ===== GILIRAN PIKET KAMU ===== */
        function renderGiliran() {
            const now = new Date();
            const menit = now.getHours() * 60 + now.getMinutes();
            const hasil = [];
            for (let i = 0; i < 60 && hasil.length < 3; i++) {
                const tgl = tambahHari(hariIni0, i);
                const dow = tgl.getDay();
                if (dow === 0 || dow === 6) continue;
                const peng = PENGECUALIAN[isoTanggal(tgl)];
                if (peng && peng.libur) continue;
                const t = tugasKamu(tgl);
                if (!t) continue;
                if (i === 0 && menit >= SHIFT[t.shift].selesai) continue; // shift hari ini sudah selesai
                hasil.push({ tgl, ...t, i });
            }
            const box = document.getElementById('giliranKamu');
            if (hasil.length === 0) { box.classList.add('hidden'); return; }
            box.classList.remove('hidden');
            document.getElementById('giliranList').innerHTML = hasil.map(h => {
                const rel = labelRelatif(h.tgl);
                const judul = rel || HARI[(h.tgl.getDay() + 6) % 7];
                return `
                <div class="rounded-xl ${h.i === 0 ? 'bg-mint-green text-dark-green' : 'bg-white/10 text-white'} px-3.5 py-2.5">
                    <p class="text-[10px] font-extrabold uppercase tracking-wide ${h.i === 0 ? 'text-dark-green/70' : 'text-mint-green'}">${esc(judul)} &middot; ${fmtPendek(h.tgl)}</p>
                    <p class="text-xs font-extrabold mt-0.5">${SHIFT[h.shift].label} <span class="font-semibold opacity-80">${SHIFT[h.shift].jam}</span></p>
                    <p class="text-[10px] font-semibold opacity-80 mt-0.5">${h.peran}</p>
                </div>`;
            }).join('');
        }

        /* ===== TAB HARI ===== */
        function renderTabs(senin) {
            document.getElementById('dayTabs').innerHTML = [0, 1, 2, 3, 4].map(i => {
                const tgl = tambahHari(senin, i);
                const aktif = i === hariDipilih;
                const rel = labelRelatif(tgl);
                const base = aktif
                    ? 'bg-dark-green text-white border-dark-green shadow-sm'
                    : 'bg-white text-dark-green border-[#E5DCCE] hover:border-medium-green';
                const relCls = aktif ? 'text-mint-green' : (rel === 'Hari ini' ? 'text-medium-green' : 'text-gray-400');
                const peng = PENGECUALIAN[isoTanggal(tgl)];
                const giliran = !(peng && peng.libur) && tugasKamu(tgl);
                const titik = giliran
                    ? `<span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full ${aktif ? 'bg-mint-green' : 'bg-emerald-500'}" title="Giliran piket kamu"></span>` : '';
                return `
                <button type="button" data-idx="${i}" aria-pressed="${aktif}"
                    class="day-tab relative flex flex-col items-center justify-center gap-0.5 py-2.5 md:py-3 rounded-2xl border-[1.5px] transition active:scale-[0.97] ${base}">
                    ${titik}
                    <span class="text-[10px] md:text-xs font-bold uppercase tracking-wide">${HARI_SINGKAT[i]}</span>
                    <span class="text-lg md:text-xl font-black leading-none">${tgl.getDate()}</span>
                    <span class="text-[9px] md:text-[10px] font-semibold h-3 leading-3 ${relCls}">${rel}</span>
                </button>`;
            }).join('');
            document.querySelectorAll('.day-tab').forEach(b => b.addEventListener('click', () => {
                hariDipilih = Number(b.dataset.idx);
                render();
            }));
        }

        /* ===== KARTU HARI ===== */
        function statusShift(tgl, k) {
            if (selisihHari(tgl, new Date()) !== 0) return null;
            const now = new Date();
            const menit = now.getHours() * 60 + now.getMinutes();
            if (menit >= SHIFT[k].selesai) return { cls: 'bg-gray-100 text-gray-500', txt: 'Selesai' };
            if (menit >= SHIFT[k].mulai) return { cls: 'bg-dark-green text-white', txt: 'Bertugas sekarang' };
            return { cls: 'bg-gray-100 text-gray-500', txt: 'Mendatang' };
        }

        function barisOrang(nama, peran) {
            const kamu = sama(nama, ME);
            const koord = peran === 'Koordinator';
            return `
            <li class="flex items-center justify-between gap-2 rounded-lg px-2.5 py-2 ${kamu ? 'bg-mint-green/30 border border-mint-green' : 'bg-gray-50'}">
                <div class="flex items-center gap-2 min-w-0">
                    <i class="fa-solid ${koord ? 'fa-star text-amber-500' : 'fa-user text-gray-400'} text-[10px] w-3 text-center shrink-0"></i>
                    <span class="text-[11px] md:text-xs font-semibold text-dark-green truncate">${esc(nama)}</span>
                </div>
                <div class="flex items-center gap-1.5 shrink-0">
                    ${kamu ? '<span class="text-[8px] font-extrabold bg-dark-green text-white px-1.5 py-0.5 rounded-full">KAMU</span>' : ''}
                    ${koord ? '<span class="text-[8px] font-bold text-amber-700 bg-amber-50 px-1.5 py-0.5 rounded-full">Koordinator</span>' : ''}
                </div>
            </li>`;
        }

        function panelShift(tgl, k, data) {
            const s = SHIFT[k];
            const st = statusShift(tgl, k);
            const aktif = st && st.txt === 'Bertugas sekarang';
            return `
            <div class="rounded-xl border ${aktif ? 'border-medium-green ring-1 ring-medium-green/40' : 'border-gray-100'} p-3">
                <div class="flex items-center justify-between gap-2 mb-2.5">
                    <div class="flex items-center gap-2 min-w-0">
                        <div class="w-8 h-8 rounded-lg bg-dark-green text-mint-green flex items-center justify-center shrink-0">
                            <i class="fa-solid ${s.icon} text-xs"></i>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[11px] md:text-xs font-extrabold text-dark-green">${s.label}</p>
                            <p class="text-[10px] text-gray-500">${s.jam}</p>
                        </div>
                    </div>
                    ${st ? `<span class="text-[8px] md:text-[9px] font-bold ${st.cls} px-2 py-1 rounded-full whitespace-nowrap">${st.txt}</span>` : ''}
                </div>
                <ul class="space-y-1.5">
                    ${barisOrang(data.koord, 'Koordinator')}
                    ${data.petugas.map(p => barisOrang(p, 'Petugas')).join('')}
                </ul>
            </div>`;
        }

        function renderKartu(senin) {
            const tgl = tambahHari(senin, hariDipilih);
            const rel = labelRelatif(tgl);
            const peng = PENGECUALIAN[isoTanggal(tgl)];
            const tim = timUntuk(tgl);

            const header = `
            <div class="flex items-center justify-between gap-3 px-4 md:px-5 py-3 border-b border-gray-100">
                <h2 class="text-sm md:text-base font-extrabold text-dark-green truncate">${esc(fmtPanjang(tgl))}</h2>
                ${rel ? `<span class="text-[9px] md:text-[10px] font-bold text-medium-green bg-[#E7F5EE] px-2.5 py-1 rounded-full whitespace-nowrap">${rel}</span>` : ''}
            </div>`;

            if (peng && peng.libur) {
                document.getElementById('dayCard').innerHTML = header + `
                <div class="p-8 text-center">
                    <div class="w-12 h-12 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center mx-auto mb-3"><i class="fa-regular fa-calendar-xmark"></i></div>
                    <p class="text-xs font-bold text-gray-500">Tidak ada piket${peng.keterangan ? ': ' + esc(peng.keterangan) : ''}.</p>
                </div>`;
                return;
            }
            if (!tim) {
                document.getElementById('dayCard').innerHTML = header + '<p class="p-8 text-center text-xs text-gray-400">Tidak ada jadwal piket.</p>';
                return;
            }

            const wakaKamu = sama(tim.waka, ME);
            document.getElementById('dayCard').innerHTML = header + `
            <div class="flex items-center gap-2.5 px-4 md:px-5 py-2.5 bg-[#F1FAF5] border-b border-emerald-100">
                <div class="w-7 h-7 rounded-lg bg-medium-green text-white flex items-center justify-center shrink-0"><i class="fa-solid fa-user-tie text-[10px]"></i></div>
                <p class="text-[10px] md:text-xs text-gray-500 font-semibold">Piket Waka
                    <span class="text-dark-green font-extrabold ml-1">${esc(tim.waka)}</span>
                    ${wakaKamu ? '<span class="text-[8px] font-extrabold bg-dark-green text-white px-1.5 py-0.5 rounded-full ml-1">KAMU</span>' : ''}
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 p-3 md:p-4">
                ${panelShift(tgl, 'pagi', tim.pagi)}
                ${panelShift(tgl, 'siang', tim.siang)}
            </div>`;
        }

        /* ===== RENDER UTAMA ===== */
        function render() {
            const senin = seninTampil();
            const jumat = tambahHari(senin, 4);
            document.getElementById('weekLabel').textContent = `${fmtPendek(senin)} - ${fmtPendek(jumat)} ${jumat.getFullYear()}`;
            document.getElementById('weekChip').textContent = `Minggu ${hurufMinggu(senin)}`;
            document.getElementById('resetBtn').classList.toggle('hidden', geser === GESER_AWAL && hariDipilih === HARI_AWAL);
            renderTabs(senin);
            renderKartu(senin);
            renderGiliran();
        }

        render();
        setInterval(render, 60000); // perbarui status "Bertugas sekarang"
    </script>
</body>
</html>