<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin') - Jurnal Absensi</title>

    <!-- Tailwind CSS -->
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

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            overflow-x: hidden;
        }

        #scrollIndicator {
            transition: top 0.15s ease-out;
        }
    </style>

    @stack('styles')
</head>


<body class="bg-bg-cream text-dark-green font-sans
             min-h-screen overflow-x-hidden overscroll-none">


    <!-- ===================================================== -->
    <!-- MOBILE HEADER -->
    <!-- ===================================================== -->

    <div class="md:hidden
                bg-dark-green text-white
                p-4
                flex items-center justify-between
                sticky top-0 z-40
                shadow-sm">

        <div class="flex items-center gap-2">

            <img src="{{ asset('image/logo.png') }}"
                 alt="Logo"
                 class="w-8 h-8 object-contain">

            <span class="font-bold text-sm tracking-wide">
                Jurnal Absensi
            </span>

        </div>


        <button id="hamburgerBtn"
                type="button"
                class="w-9 h-9
                       rounded-lg
                       flex items-center justify-center
                       hover:bg-white/10
                       transition
                       focus:outline-none">

            <i class="fa-solid fa-bars"></i>

        </button>

    </div>


    <!-- ===================================================== -->
    <!-- MOBILE SIDEBAR OVERLAY -->
    <!-- ===================================================== -->

    <div id="sidebarOverlay"
         class="fixed inset-0
                bg-black/50
                z-40
                hidden
                md:hidden">
    </div>


    <!-- ===================================================== -->
    <!-- SIDEBAR -->
    <!-- ===================================================== -->

    @include('partials.sidebar-admin')


    <!-- ===================================================== -->
    <!-- MAIN CONTENT -->
    <!-- ===================================================== -->

    <main class="min-w-0
                 p-4 pb-10
                 md:p-8
                 md:ml-60
                 max-w-full
                 md:max-w-[calc(100%-15rem)]
                 space-y-4 md:space-y-6">

        @yield('content')

    </main>


    <!-- ===================================================== -->
    <!-- MOBILE SCROLL HELPER -->
    <!-- ===================================================== -->

    <div id="scrollHelper"
         class="md:hidden fixed right-2 sm:right-3 top-1/2
                -translate-y-1/2 z-30
                flex flex-col items-center gap-1">


        <!-- SCROLL KE ATAS -->

        <button type="button"
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

        <div class="relative
                    w-1
                    h-28
                    bg-dark-green/10
                    rounded-full
                    overflow-hidden">

            <div id="scrollIndicator"
                 class="absolute left-0 top-0
                        w-1 h-8
                        bg-medium-green
                        rounded-full">
            </div>

        </div>


        <!-- SCROLL KE BAWAH -->

        <button type="button"
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


    <!-- ===================================================== -->
    <!-- SCRIPT LAYOUT ADMIN -->
    <!-- ===================================================== -->

    <script>

        /* =====================================================
           MOBILE SIDEBAR
        ====================================================== */

        const hamburgerBtn =
            document.getElementById('hamburgerBtn');

        const sidebar =
            document.getElementById('sidebar');

        const sidebarOverlay =
            document.getElementById('sidebarOverlay');


        function openSidebar() {

            if (!sidebar || !sidebarOverlay) return;

            sidebar.classList.remove('-translate-x-full');

            sidebarOverlay.classList.remove('hidden');

            document.body.classList.add('overflow-hidden');

        }


        function closeSidebar() {

            if (!sidebar || !sidebarOverlay) return;

            sidebar.classList.add('-translate-x-full');

            sidebarOverlay.classList.add('hidden');

            document.body.classList.remove('overflow-hidden');

        }


        if (hamburgerBtn) {

            hamburgerBtn.addEventListener(
                'click',
                openSidebar
            );

        }


        if (sidebarOverlay) {

            sidebarOverlay.addEventListener(
                'click',
                closeSidebar
            );

        }


        if (sidebar) {

            sidebar.querySelectorAll('a').forEach(link => {

                link.addEventListener('click', () => {

                    if (window.innerWidth < 768) {

                        closeSidebar();

                    }

                });

            });

        }


        /*
         * Kalau layar berubah dari mobile
         * ke desktop, reset sidebar.
         */

        window.addEventListener('resize', () => {

            if (window.innerWidth >= 768) {

                if (sidebarOverlay) {
                    sidebarOverlay.classList.add('hidden');
                }

                document.body.classList.remove('overflow-hidden');

            }

        });



        /* =====================================================
           JAM LIVE
           Aman untuk halaman yang tidak memiliki
           #live-date / #live-clock
        ====================================================== */

        function updateLiveTime() {

            const now = new Date();

            const dateEl =
                document.getElementById('live-date');

            const clockEl =
                document.getElementById('live-clock');


            if (dateEl) {

                dateEl.textContent =
                    now.toLocaleDateString('id-ID', {
                        weekday: 'long',
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    });

            }


            if (clockEl) {

                const jam =
                    String(now.getHours()).padStart(2, '0');

                const menit =
                    String(now.getMinutes()).padStart(2, '0');

                clockEl.textContent =
                    `${jam}.${menit} WIB`;

            }

        }


        updateLiveTime();

        setInterval(updateLiveTime, 1000);



        /* =====================================================
           MOBILE SCROLL HELPER
        ====================================================== */

        const scrollIndicator =
            document.getElementById('scrollIndicator');


        function updateScrollIndicator() {

            if (!scrollIndicator) return;


            const scrollTop =
                window.scrollY || window.pageYOffset;


            const documentHeight =
                document.documentElement.scrollHeight;


            const windowHeight =
                window.innerHeight;


            const maxScroll =
                documentHeight - windowHeight;


            /*
             * Kalau halaman tidak cukup panjang
             * untuk di-scroll.
             */

            if (maxScroll <= 0) {

                scrollIndicator.style.top = '0px';

                return;

            }


            /*
             * Tinggi track:
             * h-28 = 112px
             *
             * Tinggi indicator:
             * h-8 = 32px
             */

            const trackHeight = 112;

            const indicatorHeight = 32;


            const maxTop =
                trackHeight - indicatorHeight;


            /*
             * Hitung posisi scroll
             * 0 = paling atas
             * 1 = paling bawah
             */

            const progress =
                Math.min(
                    1,
                    Math.max(
                        0,
                        scrollTop / maxScroll
                    )
                );


            const indicatorTop =
                progress * maxTop;


            scrollIndicator.style.top =
                `${indicatorTop}px`;

        }


        /*
         * Update indikator ketika halaman di-scroll.
         */

        window.addEventListener(
            'scroll',
            updateScrollIndicator,
            { passive: true }
        );


        /*
         * Update ketika ukuran layar berubah.
         */

        window.addEventListener(
            'resize',
            updateScrollIndicator
        );


        /*
         * Tombol kembali ke atas.
         */

        function scrollToTop() {

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

        }


        /*
         * Tombol langsung ke bagian paling bawah.
         */

        function scrollToBottom() {

            window.scrollTo({
                top: document.documentElement.scrollHeight,
                behavior: 'smooth'
            });

        }


        updateScrollIndicator();

    </script>


    @stack('scripts')

</body>
</html>