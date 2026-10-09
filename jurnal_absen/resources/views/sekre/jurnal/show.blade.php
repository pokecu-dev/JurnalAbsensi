<!DOCTYPE html>
<html lang="id" class="overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Jurnal - Jurnal Absensi</title>

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

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            overflow-x: hidden;
        }

        .detail-card {
            background: #FFFFFF;
            border: 1.5px solid #E5DCCE;
            border-radius: 18px;
            overflow: hidden;
        }

        .detail-label {
            font-size: 10px;
            color: #9AAEA7;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .detail-value {
            font-size: 13px;
            font-weight: 600;
            color: #1A312C;
            margin-top: 3px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 10px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge.pending {
            background: #FFF4D6;
            color: #D97706;
        }

        .badge.approved {
            background: #D9F5E8;
            color: #15803D;
        }

        .badge.rejected {
            background: #FFE0E0;
            color: #DC2626;
        }

        .kt-label {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 700;
        }

        .kt-sakit { background: #FEE2E2; color: #DC2626; }
        .kt-izin { background: #FEF3C7; color: #D97706; }
        .kt-alpha { background: #F3F4F6; color: #4B5563; }
        .kt-dispen { background: #E0E7FF; color: #4F46E5; }
        .kt-hadir { background: #D9F5E8; color: #15803D; }
    </style>
</head>

<body class="bg-bg-cream text-dark-green font-sans min-h-screen overflow-x-hidden overscroll-none">

    <!-- MOBILE HEADER -->
    <div class="md:hidden bg-dark-green text-white p-4 flex items-center justify-between sticky top-0 z-40 shadow-sm">
        <div class="flex items-center gap-2">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
            <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
        </div>
        <button id="hamburgerBtn" type="button"
            class="w-9 h-9 rounded-lg flex items-center justify-center hover:bg-white/10 transition focus:outline-none"
            aria-label="Buka menu">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    <!-- MOBILE OVERLAY -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden"></div>

    <!-- SIDEBAR -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 w-60 bg-dark-green text-white p-6 flex flex-col justify-between z-50 -translate-x-full md:translate-x-0 transition-transform duration-300">
        <div>
            <div class="flex flex-col items-center gap-2 mb-10 text-center">
                <img src="{{ asset('image/logo.png') }}" alt="Logo Jurnal Absensi" class="w-16 h-auto">
                <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
            </div>

            <nav class="flex flex-col gap-3 font-semibold text-xs">
                <a href="{{ url('/sekre/dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                    <i class="fa-solid fa-house w-4 text-center"></i><span>Dashboard</span>
                </a>
                <a href="{{ url('/sekre/jurnal') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-white/10 text-mint-green rounded-xl transition active:scale-[0.98]">
                    <i class="fa-solid fa-book-open w-4 text-center"></i><span>Jurnal</span>
                </a>
                <a href="{{ url('/sekre/jadwal') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                    <i class="fa-regular fa-calendar-days w-4 text-center"></i><span>Jadwal Mata Pelajaran</span>
                </a>
            </nav>
        </div>

        <div class="flex flex-col gap-1 pt-3 border-t border-white/10 text-xs">
            <a href="{{ route('profile') }}"
                class="flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                <i class="fa-regular fa-user w-4"></i><span>Profile</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                    <i class="fa-solid fa-arrow-right-from-bracket w-4"></i><span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="min-w-0 p-4 pb-12 md:p-8 md:ml-60 max-w-full md:max-w-[calc(100%-15rem)] space-y-4 md:space-y-6">

        <!-- HEADER -->
        <header class="flex items-center justify-between gap-3">
            <div class="min-w-0">
                <a href="{{ route('sekre.jurnal.index') }}"
                    class="hidden md:inline-flex items-center gap-1.5 text-[11px] md:text-xs font-bold text-medium-green hover:text-dark-green transition mb-2">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke daftar jurnal
                </a>
                <div class="flex items-center gap-2.5 min-w-0">
                    <a href="{{ route('sekre.dashboard') }}"
                        class="md:hidden w-8 h-8 shrink-0 rounded-lg bg-white border border-[#DFD5C7] flex items-center justify-center text-dark-green hover:bg-gray-50 active:scale-95 transition"
                        aria-label="Kembali ke dashboard">
                        <i class="fa-solid fa-arrow-left text-xs"></i>
                    </a>
                    <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-dark-green truncate">Detail Jurnal</h2>
                </div>
            </div>

            <div class="text-right leading-tight shrink-0">
                <div id="live-date" class="text-[9px] sm:text-[10px] md:text-xs font-semibold text-medium-green whitespace-nowrap">memuat tanggal....</div>
                <div id="live-clock" class="text-[10px] sm:text-xs font-extrabold text-dark-green mt-0.5">00.00 WIB</div>
            </div>
        </header>

        <!-- FLASH -->
        @if (session('success'))
            <div class="flex items-center gap-2.5 p-3.5 px-4 rounded-xl bg-[#E8F5E9] text-[#2E7D32] border border-[#C8E6C9] text-[13px] font-semibold">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="flex items-center gap-2.5 p-3.5 px-4 rounded-xl bg-[#FFEBEE] text-[#C62828] border border-[#FFCDD2] text-[13px] font-semibold">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- KARTU DETAIL -->
        <div class="detail-card">
            <div class="p-5 md:p-6 border-b border-[#F0E8DC] flex items-start justify-between gap-3 flex-wrap">
                <div class="min-w-0">
                    <h3 class="text-lg md:text-xl font-bold text-dark-green">
                        {{ $jurnal->mapel?->name ?? 'Tanpa Mapel' }}
                    </h3>
                    <p class="text-xs text-[#7A8985] mt-1">
                        {{ $jurnal->kelas?->name ?? '-' }}
                        &middot; Jam ke-{{ $jurnal->start_time ?? '-' }}@if ($jurnal->end_time && $jurnal->end_time !== $jurnal->start_time)&ndash;{{ $jurnal->end_time }}@endif
                        ({{ $jurnal->jadwal?->waktu_mulai ?? '--:--' }}–{{ $jurnal->jadwal?->waktu_selesai ?? '--:--' }})
                    </p>
                </div>
                <span class="badge {{ $jurnal->status }}">
                    @if ($jurnal->status === 'pending')
                        <i class="fa-regular fa-clock"></i>
                    @elseif ($jurnal->status === 'approved')
                        <i class="fa-solid fa-paper-plane"></i>
                    @elseif ($jurnal->status === 'rejected')
                        <i class="fa-solid fa-rotate-left"></i>
                    @endif
                    {{ $jurnal->status_label }}
                </span>
            </div>

            <div class="p-5 md:p-6 space-y-5">
                <!-- INFO GRID -->
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <div>
                        <div class="detail-label">Guru Pengajar</div>
                        <div class="detail-value">{{ $jurnal->jadwal?->teacher?->name ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="detail-label">Tanggal</div>
                        <div class="detail-value">{{ $jurnal->tgl?->locale('id')->translatedFormat('l, d M Y') ?? '-' }}</div>
                    </div>
                    <div>
                        <div class="detail-label">Kehadiran Guru</div>
                        <div class="detail-value">
                            @php
                                $kehadiran = [
                                    'hadir' => 'Hadir',
                                    'tidak-ada_tugas' => 'Tidak Hadir (Ada Tugas)',
                                    'tidak-tanpa_tugas' => 'Tidak Hadir (Tanpa Tugas)',
                                ][$jurnal->guru] ?? ($jurnal->guru ?: '-');
                            @endphp
                            {{ $kehadiran }}
                        </div>
                    </div>
                </div>

                <!-- MATERI -->
                <div class="p-3.5 rounded-xl bg-[#FFF8EB]">
                    <div class="detail-label">Materi Pembelajaran</div>
                    <p class="text-[13px] text-[#4B5A56] leading-relaxed mt-1">{{ $jurnal->materi ?: 'Guru tidak mengisi materi.' }}</p>
                </div>

                <!-- CATATAN -->
                <div>
                    <div class="detail-label">Catatan / Aktivitas (dari guru)</div>
                    <p class="text-[13px] text-[#4B5A56] leading-relaxed mt-1">{{ $jurnal->catatan ?: 'Tidak ada catatan.' }}</p>
                </div>

                @if ($jurnal->instruksi_tugas)
                    <div>
                        <div class="detail-label">Instruksi Tugas</div>
                        <p class="text-[13px] text-[#4B5A56] leading-relaxed mt-1">{{ $jurnal->instruksi_tugas }}</p>
                    </div>
                @endif

                @if ($jurnal->alasan_kosong)
                    <div>
                        <div class="detail-label">Alasan Tidak Mengisi</div>
                        <p class="text-[13px] text-[#4B5A56] leading-relaxed mt-1">{{ $jurnal->alasan_kosong }}</p>
                    </div>
                @endif

                @if ($jurnal->foto)
                    <div>
                        <div class="detail-label">Dokumentasi</div>
                        <a href="{{ asset('storage/'.$jurnal->foto) }}" target="_blank"
                            class="inline-flex items-center gap-1.5 text-[13px] font-semibold text-medium-green hover:text-dark-green mt-1">
                            <i class="fa-regular fa-image"></i> Lihat foto
                        </a>
                    </div>
                @endif

                <!-- ABSENSI -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <div class="detail-label">Absensi Siswa ({{ $jurnal->detailJurnal->count() }})</div>
                        <span class="text-[11px] font-semibold text-medium-green">
                            {{ $jurnal->detailJurnal->where('status', 'hadir')->count() }} hadir &middot;
                            {{ $jurnal->detailJurnal->where('status', '!=', 'hadir')->count() }} tidak hadir
                        </span>
                    </div>

                    @if ($jurnal->detailJurnal->isNotEmpty())
                        <div class="rounded-xl border border-[#F0E8DC] divide-y divide-[#F0E8DC] overflow-hidden">
                            @foreach ($jurnal->detailJurnal as $absen)
                                <div class="flex items-center justify-between gap-3 px-3.5 py-2.5">
                                    <span class="text-[13px] font-semibold text-dark-green">{{ $absen->siswa?->name ?? '-' }}</span>
                                    <span class="kt-label kt-{{ $absen->status }}">{{ ucfirst($absen->status) }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-[13px] text-[#7A8985]">Tidak ada data absensi siswa.</p>
                    @endif
                </div>

                <!-- CATATAN SEKRE -->
                @if ($jurnal->status === 'pending')
                    <form method="POST" action="{{ route('sekre.jurnal.kirim', $jurnal) }}" class="pt-4 border-t border-[#F0E8DC] space-y-3">
                        @csrf
                        <div>
                            <label for="catatan_sekre" class="detail-label">Catatan Sekretaris (opsional)</label>
                            <p class="text-[11px] text-[#7A8985] mt-0.5 mb-1.5">
                                Tulis catatan bila ada kekeliruan (sekretaris hanya memberi catatan, tidak menolak atau mengembalikan jurnal ke guru).
                            </p>
                            <textarea id="catatan_sekre" name="catatan_sekre" rows="3" maxlength="1000"
                                placeholder="Contoh: siswa atas nama ... seharusnya izin, bukan sakit."
                                class="w-full rounded-xl border border-[#E5DCCE] bg-white px-3.5 py-2.5 text-[13px] outline-none focus:border-medium-green focus:ring-2 focus:ring-mint-green/30 transition resize-none">{{ old('catatan_sekre', $jurnal->catatan_sekre) }}</textarea>
                            @error('catatan_sekre')
                                <p class="text-[11px] font-semibold text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-dark-green hover:bg-medium-green text-white text-xs font-black transition active:scale-[0.98]">
                                <i class="fa-solid fa-paper-plane"></i> Kirim ke Kurikulum
                            </button>
                        </div>
                    </form>
                @else
                    <div class="pt-4 border-t border-[#F0E8DC] space-y-3">
                        <div>
                            <div class="detail-label">Catatan Sekretaris</div>
                            <p class="text-[13px] text-[#4B5A56] leading-relaxed mt-1">{{ $jurnal->catatan_sekre ?: 'Tidak ada catatan dari sekretaris.' }}</p>
                        </div>
                        @if ($jurnal->status === 'approved')
                            <div class="flex items-center gap-2 text-[12px] font-semibold text-[#15803D] bg-[#D9F5E8] rounded-xl px-3.5 py-2.5">
                                <i class="fa-solid fa-circle-check"></i>
                                Jurnal ini sudah dikirim ke Kurikulum dan tidak dapat diubah lagi.
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>

    </main>

    <script>
        /* MOBILE SIDEBAR */
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

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

        if (hamburgerBtn) hamburgerBtn.addEventListener('click', openSidebar);
        if (sidebarOverlay) sidebarOverlay.addEventListener('click', closeSidebar);
        if (sidebar) sidebar.querySelectorAll('a').forEach(link => link.addEventListener('click', () => {
            if (window.innerWidth < 768) closeSidebar();
        }));

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                if (sidebarOverlay) sidebarOverlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
                if (sidebar) sidebar.classList.remove('-translate-x-full');
            } else if (sidebar) {
                sidebar.classList.add('-translate-x-full');
            }
        });

        /* CLOCK */
        function updateClock() {
            const now = new Date();
            const dateEl = document.getElementById('live-date');
            const clockEl = document.getElementById('live-clock');
            if (dateEl) dateEl.textContent = now.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' });
            if (clockEl) clockEl.textContent = String(now.getHours()).padStart(2, '0') + '.' + String(now.getMinutes()).padStart(2, '0') + ' WIB';
        }
        updateClock();
        setInterval(updateClock, 1000);
    </script>
</body>

</html>
