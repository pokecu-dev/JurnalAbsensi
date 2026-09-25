<!DOCTYPE html>
<html lang="id">
<head>
    @include('sekre.partials.head', ['active' => 'status-validasi'])
</head>
<body>
<div class="dasboard-layout">
    @include('sekre.partials.sidebar', ['active' => 'status-validasi'])
    <main class="main-content">
        <header class="top-header">
            <div>
                <h2 class="welcome-title">Status Validasi</h2>
                <p class="welcome-subtitle">Daftar jurnal dari seluruh guru untuk divalidasi</p>
            </div>
            <div class="header-right">
                <button class="btn-notif" type="button" title="Notifikasi">
                    <i class="fa-regular fa-bell"></i>
                </button>
                <div class="datetime-box">
                    <span class="date-text" id="live-date">memuat tanggal…</span>
                    <span class="time-text" id="live-clock">00:00:00 WIB</span>
                </div>
            </div>
        </header>

        @if (session('success'))
            <div class="flash success">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="flash error">
                <i class="fa-solid fa-circle-exclamation"></i>
                {{ session('error') }}
            </div>
        @endif

        <div class="filter-tabs">
            <a href="{{ route('sekre.status-validasi') }}"
                class="tab {{ blank($status) ? 'active' : '' }}">Semua</a>
            <a href="{{ route('sekre.status-validasi', ['status' => 'pending']) }}"
                class="tab {{ $status === 'pending' ? 'active' : '' }}">Menunggu</a>
            <a href="{{ route('sekre.status-validasi', ['status' => 'approved']) }}"
                class="tab {{ $status === 'approved' ? 'active' : '' }}">Tervalidasi</a>
            <a href="{{ route('sekre.status-validasi', ['status' => 'rejected']) }}"
                class="tab {{ $status === 'rejected' ? 'active' : '' }}">Ditolak</a>
        </div>

        <div class="table-card">
            <table class="table-jurnal">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Guru</th>
                        <th>Kelas</th>
                        <th>Mata Pelajaran</th>
                        <th>Jam</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jurnals as $jurnal)
                        <tr>
                            <td>
                                <span class="name">{{ $jurnal->tgl?->translatedFormat('d M Y') }}</span>
                            </td>
                            <td>
                                <span class="name">{{ $jurnal->jadwal?->teacher?->name ?? '-' }}</span>
                            </td>
                            <td>
                                <span class="name">{{ $jurnal->jadwal?->kelas?->name ?? '-' }}</span>
                            </td>
                            <td>
                                <span class="name">{{ $jurnal->jadwal?->mapel?->name ?? '-' }}</span>
                                <div class="sub">{{ $jurnal->keterangan_label }}</div>
                            </td>
                            <td>
                                <span class="sub">
                                    Jam {{ $jurnal->jadwal?->start_time }}–{{ $jurnal->jadwal?->end_time }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $jurnal->status }}">{{ $jurnal->status_label }}</span>
                            </td>
                            <td>
                                <a href="{{ route('sekre.jurnal.show', $jurnal) }}" class="btn-detail">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <i class="fa-regular fa-folder-open"></i>
                                    Tidak ada jurnal untuk filter ini.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>

<script>
(function () {
    const hamburger = document.createElement('button');
    hamburger.className = 'btn-notif';
    hamburger.id = 'hamburgerBtn';
    hamburger.innerHTML = '<i class="fa-solid fa-bars"></i>';
    hamburger.style.display = 'none';

    function updateClock() {
        const now = new Date();
        const opts = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
        const dateEl = document.getElementById('live-date');
        const clockEl = document.getElementById('live-clock');
        if (dateEl) dateEl.textContent = now.toLocaleDateString('id-ID', opts);
        if (clockEl) clockEl.textContent =
            String(now.getHours()).padStart(2,'0') + '.' +
            String(now.getMinutes()).padStart(2,'0') + ' WIB';
    }
    updateClock();
    setInterval(updateClock, 1000);
})();
</script>
</body>
</html>