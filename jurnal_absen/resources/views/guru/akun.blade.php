<!DOCTYPE html>
<html lang="id" class="overscroll-none">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Guru</title>

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

<body class="bg-bg-cream text-gray-700 font-sans min-h-screen overflow-x-hidden overscroll-none">

    <!-- ============================================================= -->
    <!-- MOBILE HEADER -->
    <!-- ============================================================= -->
    <div class="md:hidden bg-dark-green text-white p-4 flex items-center gap-3 sticky top-0 z-40 shadow-sm">
        <button id="hamburgerBtn" type="button" class="w-9 h-9 rounded-lg flex items-center justify-center hover:bg-white/10 transition focus:outline-none" aria-label="Buka menu">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="flex items-center gap-2">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
            <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
        </div>
    </div>

    <!-- MOBILE OVERLAY -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden"></div>

    <!-- ============================================================= -->
    <!-- SIDEBAR -->
    <!-- ============================================================= -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 w-60 bg-dark-green text-white p-6 flex flex-col justify-between z-50
               -translate-x-full md:translate-x-0 transition-transform duration-300">

        <button id="sidebarCloseBtn" type="button" aria-label="Tutup menu"
            class="md:hidden absolute top-4 right-4 w-9 h-9 rounded-lg flex items-center justify-center hover:bg-white/10 transition focus:outline-none">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div>
            <!-- LOGO -->
            <div class="flex flex-col items-center gap-2 mb-10 text-center">
                <img src="{{ asset('image/logo.png') }}" alt="Logo Jurnal Absensi" class="w-16 h-auto">
                <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
            </div>

            <!-- NAVIGATION -->
            <nav class="flex flex-col gap-3 font-semibold text-xs">
                <a href="{{ url('/guru/dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                    <i class="fa-solid fa-house w-4 text-center"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ url('/guru/jurnal') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                    <i class="fa-solid fa-book w-4 text-center"></i>
                    <span>Jurnal</span>
                </a>
                <a href="{{ url('/guru/riwayat') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                    <i class="fa-solid fa-file-circle-plus w-4 text-center"></i>
                    <span>Riwayat</span>
                </a>
            </nav>
        </div>

        <!-- FOOTER SIDEBAR -->
        <div class="flex flex-col gap-1 pt-3 border-t border-white/10 text-xs">
            <a href="{{ url('/guru/akun') }}"
                class="flex items-center gap-2 px-2 py-2 bg-white/10 text-mint-green rounded-lg active:scale-[0.98] transition-all duration-200">
                <i class="fa-solid fa-user-circle w-4"></i>
                <span>Profil</span>
            </a>
            <a href="{{ route('logout') }}"
                class="flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                <i class="fa-solid fa-right-from-bracket w-4"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- ============================================================= -->
    <!-- MAIN -->
    <!-- ============================================================= -->
    <main class="min-w-0 min-h-screen p-4 pb-12 md:p-8 md:ml-60 max-w-full md:max-w-[calc(100%-15rem)]">

        <!-- HEADER -->
        <div class="max-w-4xl mx-auto mb-6 flex items-start justify-between gap-3">
            <div>
                <h1 class="text-2xl md:text-3xl font-black text-dark-green">Akun Guru Pengajar</h1>
                <p class="text-xs md:text-sm text-gray-500 mt-1">Informasi akun dan identitas Guru Pengajar.</p>
            </div>

            <!-- JAM LIVE (DESKTOP) -->
            <div class="hidden md:block text-right leading-tight shrink-0">
                <div id="live-date" class="text-[10px] md:text-xs font-semibold text-medium-green whitespace-nowrap">
                    {{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}
                </div>
                <div id="live-clock" class="text-xs font-extrabold text-dark-green mt-0.5">
                    {{ now()->format('H.i') }} WIB
                </div>
            </div>
        </div>

        <!-- ===================================================== -->
        <!-- PROFILE CARD -->
        <!-- ===================================================== -->
        <section class="max-w-4xl mx-auto">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

                <!-- PROFILE HEADER -->
                <div class="bg-dark-green px-5 py-6 md:px-7">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 md:w-20 md:h-20 rounded-2xl bg-mint-green text-dark-green flex items-center justify-center shrink-0 font-black text-2xl md:text-3xl">
                            {{ strtoupper(substr(auth()->user()->name ?? 'G', 0, 1)) }}
                        </div>

                        <div class="min-w-0">
                            <p class="text-[10px] uppercase tracking-wider text-mint-green font-bold mb-1">Guru</p>
                            <h2 class="text-lg md:text-xl font-black text-white truncate">
                                {{ auth()->user()->name ?? 'Nama Guru Pengajar' }}
                            </h2>

                            <div class="flex items-center gap-2 mt-2">
                                <span class="inline-flex items-center gap-1.5 bg-white/10 text-mint-green px-2.5 py-1 rounded-lg text-[9px] font-bold">
                                    <i class="fa-solid fa-shield-halved"></i>
                                    Guru Pengajar
                                </span>
                                <span class="inline-flex items-center gap-1.5 bg-emerald-400/10 text-emerald-300 px-2.5 py-1 rounded-lg text-[9px] font-bold">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                    Aktif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================================================= -->
                <!-- INFORMASI AKUN -->
                <!-- ================================================= -->
                <div class="p-5 md:p-7">
                    <div class="mb-5">
                        <h3 class="text-sm font-black text-dark-green">Informasi Akun</h3>
                        <p class="text-[10px] text-gray-400 mt-1">Data akun yang digunakan untuk masuk ke sistem.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- USERNAME -->
                        <div class="border border-gray-100 rounded-2xl p-4 bg-gray-50/50">
                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 rounded-xl bg-dark-green text-mint-green flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-at text-xs"></i>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Username</p>
                                    <p class="text-sm font-bold text-dark-green mt-1 break-all">{{ auth()->user()->username ?? '-' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- EMAIL -->
                        <div class="border border-gray-100 rounded-2xl p-4 bg-gray-50/50">
                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 rounded-xl bg-dark-green text-mint-green flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-envelope text-xs"></i>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Email</p>
                                    <p class="text-sm font-bold text-dark-green mt-1 break-all">{{ auth()->user()->email ?? '-' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- ROLE -->
                        <div class="border border-gray-100 rounded-2xl p-4 bg-gray-50/50">
                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 rounded-xl bg-dark-green text-mint-green flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-user-tag text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Role</p>
                                    <p class="text-sm font-bold text-dark-green mt-1">Guru Pengajar</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ================================================= -->
                    <!-- DATA IDENTITAS -->
                    <!-- ================================================= -->
                    <div class="mt-8 mb-5">
                        <h3 class="text-sm font-black text-dark-green">Data Identitas</h3>
                        <p class="text-[10px] text-gray-400 mt-1">Informasi identitas Guru</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="border border-gray-100 rounded-2xl p-4">
                            <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">NIP / NIK</p>
                            <p class="text-sm font-bold text-dark-green mt-1">{{ auth()->user()->nip ?? auth()->user()->nik ?? '-' }}</p>
                        </div>

                        <div class="border border-gray-100 rounded-2xl p-4">
                            <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Nama Lengkap</p>
                            <p class="text-sm font-bold text-dark-green mt-1">{{ auth()->user()->name ?? '-' }}</p>
                        </div>

                        <div class="border border-gray-100 rounded-2xl p-4">
                            <p class="text-[9px] uppercase tracking-wider font-bold text-gray-400">Nomor HP</p>
                            <p class="text-sm font-bold text-dark-green mt-1">{{ auth()->user()->no_hp ?? auth()->user()->phone ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <div class="max-w-4xl mx-auto mt-6 text-center">
            <p class="text-[10px] text-gray-400">
                Jurnal Absensi Sekolah <span class="mx-1">&bull;</span> Akun Guru
            </p>
        </div>
    </main>

    <!-- ============================================================= -->
    <!-- MOBILE SCROLL HELPER -->
    <!-- ============================================================= -->
    <div id="scrollHelper"
        class="md:hidden fixed right-2 sm:right-3 top-1/2 -translate-y-1/2 z-30 flex flex-col items-center gap-1">

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

    <!-- ============================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ============================================================= -->
    <script>
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
        const sidebarCloseBtn = document.getElementById('sidebarCloseBtn');
        if (sidebarCloseBtn) sidebarCloseBtn.addEventListener('click', closeSidebar);
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

        /* ===== JAM LIVE (HEADER) — otomatis update tiap detik ===== */
        function updateLiveTime() {
            const now = new Date();
            const dateEl = document.getElementById('live-date');
            const clockEl = document.getElementById('live-clock');

            if (dateEl) {
                dateEl.textContent = now.toLocaleDateString('id-ID', {
                    weekday: 'long', day: 'numeric', month: 'long', year: 'numeric'
                });
            }
            if (clockEl) {
                const jam = String(now.getHours()).padStart(2, '0');
                const menit = String(now.getMinutes()).padStart(2, '0');
                clockEl.textContent = `${jam}.${menit} WIB`;
            }
        }
        updateLiveTime();
        setInterval(updateLiveTime, 1000);

        /* ===== MOBILE SCROLL HELPER ===== */
        const scrollIndicator = document.getElementById('scrollIndicator');

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
            window.scrollTo({ top: document.documentElement.scrollHeight, behavior: 'smooth' });
        }
        updateScrollIndicator();
    </script>

</body>
</html>