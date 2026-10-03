<!DOCTYPE html>
<html lang="id" class="overscroll-none">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Guru Piket</title>

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
                class="flex items-center gap-2 px-2 py-2 rounded-lg bg-white/10 text-mint-green">
                <i class="fa-solid fa-user-circle w-4"></i>
                <span>Akun</span>
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

    <!-- ============================================================= -->
    <!-- MAIN -->
    <!-- ============================================================= -->
    <main class="min-w-0 p-4 pb-12 md:p-8 md:ml-60 max-w-full md:max-w-[calc(100%-15rem)] space-y-4 md:space-y-5">

        <!-- HEADER -->
        <header class="flex items-center justify-between gap-3">
            <div class="min-w-0">
            <h1 class="text-base sm:text-lg md:text-2xl font-black text-dark-green tracking-tight leading-snug flex items-center gap-2">
                <a href="{{ url('/piket/dashboard') }}"
                    class="md:hidden w-7 h-7 rounded-lg flex items-center justify-center text-medium-green hover:bg-medium-green/10 transition shrink-0"
                    aria-label="Kembali ke Dashboard">
                    <i class="fa-solid fa-arrow-left text-sm"></i>
                </a>
                <span>Akun Saya</span>
            </h1>      
            </div>
            <div class="text-right leading-tight shrink-0">
                <div id="live-date" class="text-[9px] sm:text-[10px] md:text-xs font-semibold text-medium-green whitespace-nowrap">memuat tanggal....</div>
                <div id="live-clock" class="text-[10px] sm:text-xs font-extrabold text-dark-green mt-0.5">00.00 WIB</div>
            </div>
        </header>

        <!-- KARTU IDENTITAS -->
        <section class="bg-dark-green text-white rounded-2xl p-4 sm:p-5 md:px-7 md:py-6 shadow-md">
            <div class="flex items-center gap-4">
                <div id="avatar"
                    class="w-14 h-14 md:w-16 md:h-16 rounded-2xl bg-[#2E524A] border border-[#3D6B61] text-mint-green flex items-center justify-center text-lg md:text-xl font-black shrink-0">
                    --
                </div>
                <div class="min-w-0">
                    <h2 id="pNama" class="text-base md:text-xl font-bold truncate">-</h2>
                    <p id="pJabatan" class="text-[11px] md:text-xs text-[#8FBFB0] mt-0.5 truncate">-</p>
                    <div class="flex flex-wrap items-center gap-2 mt-2">
                        <span class="text-[9px] md:text-[10px] font-bold px-2.5 py-1 rounded-full bg-amber-400/15 text-amber-300 whitespace-nowrap">
                            <i class="fa-solid fa-door-open mr-1"></i>Guru Piket
                        </span>
                        <span class="text-[9px] md:text-[10px] font-bold px-2.5 py-1 rounded-full bg-emerald-400/15 text-emerald-300 whitespace-nowrap">
                            <i class="fa-solid fa-circle text-[6px] mr-1 align-middle"></i>Aktif
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <!-- DATA AKUN -->
    <section class="bg-white border border-emerald-100 rounded-2xl overflow-hidden shadow-sm">
        <div class="px-5 md:px-6 py-4 border-b border-gray-100">
            <h3 class="text-base md:text-lg font-extrabold text-dark-green">Data Akun</h3>
        </div>

        <dl id="akunRows" class="divide-y divide-gray-100"></dl>
    </section>
         
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


        const PROFIL = {
            nama: 'Arif Setyobudi, S.Pd',
            jabatan: 'Guru Bahasa Indonesia',
            akun: [
                ['Nama Lengkap', 'Arif Setyobudi, S.Pd'],
                ['NIP', '19780830 200701 1 017'],
                ['Username', 'arif.setyobudi'],
                ['Email', 'arif.setyobudi@smkn1boyolangu.sch.id'],
                ['No. HP', '0812-3456-7890'],
                ['Login Terakhir', 'Hari ini, 06.40 WIB'],
            ]

        };

        /* ===== UTIL ===== */
        function esc(s) {
            return String(s).replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
        }
        function inisial(nama) {
            const kata = nama.split(',')[0].split(' ').filter(w => w && !w.endsWith('.'));
            return (kata.slice(0, 2).map(w => w[0]).join('') || '?').toUpperCase();
        }
        function mulaiHari(d) { return new Date(d.getFullYear(), d.getMonth(), d.getDate()); }
        function tambahHari(d, n) { const x = new Date(d); x.setDate(x.getDate() + n); return x; }
        function selisihHari(a, b) {
            return Math.round((Date.UTC(a.getFullYear(), a.getMonth(), a.getDate()) - Date.UTC(b.getFullYear(), b.getMonth(), b.getDate())) / 86400000);
        }
        function hurufMinggu(tgl) {
            const dow = tgl.getDay();
            const senin = tambahHari(mulaiHari(tgl), dow === 0 ? -6 : 1 - dow);
            const w = Math.floor(selisihHari(senin, SENIN_MINGGU_A) / 7);
            return (((w % 2) + 2) % 2) === 0 ? 'A' : 'B';
        }
        function barisHtml(label, nilai) {
            const isi = Array.isArray(nilai)
                ? `<div class="flex flex-wrap gap-1.5 sm:justify-end">${nilai.map(v =>
                    `<span class="text-[10px] md:text-[11px] font-semibold text-medium-green bg-[#E7F5EE] px-2.5 py-0.5 rounded-full whitespace-nowrap">${esc(v)}</span>`).join('')}</div>`
                : `<span class="text-xs md:text-[13px] font-semibold text-dark-green break-words">${esc(nilai)}</span>`;
            return `
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-0.5 sm:gap-4 px-4 md:px-5 py-2.5">
                <dt class="text-[10px] md:text-xs text-gray-400 font-semibold sm:shrink-0">${esc(label)}</dt>
                <dd class="sm:text-right min-w-0">${isi}</dd>
            </div>`;
        }

        /* ===== RENDER: IDENTITAS & DATA ===== */
        document.getElementById('avatar').textContent = inisial(PROFIL.nama);
        document.getElementById('pNama').textContent = PROFIL.nama;
        document.getElementById('pJabatan').textContent = PROFIL.jabatan;
        document.getElementById('akunRows').innerHTML = PROFIL.akun.map(r => barisHtml(r[0], r[1])).join('');
    

        
    </script>
</body>
</html>