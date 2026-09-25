<!DOCTYPE html>
<html lang="id">
<head>
    @include('sekre.partials.head', ['active' => 'jurnal'])
    <style>
        .detail-card {
            background: #FFFFFF;
            border: 1.5px solid var(--border);
            border-radius: 16px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .detail-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .detail-body {
            padding: 24px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 18px;
        }

        .info-item .info-label {
            font-size: 11px;
            color: var(--muted);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .info-item .info-value {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .detail-section {
            margin-top: 22px;
        }

        .detail-section h4 {
            font-size: 13px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .detail-section p {
            font-size: 13px;
            color: var(--text-dark);
            line-height: 1.6;
        }

        .absensi-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 6px;
        }

        .absensi-table th {
            text-align: left;
            font-size: 11px;
            color: var(--muted);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border);
        }

        .absensi-table td {
            padding: 10px 0;
            font-size: 13px;
            border-bottom: 1px solid #F0E8DC;
        }

        .absensi-table tr:last-child td {
            border-bottom: none;
        }

        .kt-label {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 700;
        }

        .kt-sakit  { background: #FEE2E2; color: #DC2626; }
        .kt-izin   { background: #FEF3C7; color: #D97706; }
        .kt-alpha  { background: #F3F4F6; color: #4B5563; }
        .kt-dispen { background: #E0E7FF; color: #4F46E5; }

        .action-bar {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 24px;
            flex-wrap: wrap;
        }

        .reject-box {
            display: none;
            margin-top: 14px;
            padding: 16px;
            background: #FDF6EC;
            border: 1.5px solid var(--border);
            border-radius: 12px;
        }

        .reject-box textarea {
            width: 100%;
            min-height: 90px;
            padding: 12px;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            font-size: 13px;
            font-family: inherit;
            resize: vertical;
            background: #FFFFFF;
        }

        .reject-box .reject-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 12px;
        }
    </style>
</head>
<body>
<div class="dasboard-layout">
    @include('sekre.partials.sidebar', ['active' => 'jurnal'])
    <main class="main-content">
        <header class="top-header">
            <div>
                <h2 class="welcome-title">Detail Jurnal</h2>
                <p class="welcome-subtitle">Periksa kelengkapan jurnal sebelum divalidasi</p>
            </div>
            <div class="header-right">
                <a href="{{ route('sekre.jurnal.index') }}" class="btn-ghost">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
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

        <div class="detail-card">
            <div class="detail-header">
                <div>
                    <h2 class="welcome-title">{{ $jurnal->jadwal?->mapel?->name ?? 'Tanpa Mapel' }}</h2>
                    <p class="welcome-subtitle">
                        {{ $jurnal->jadwal?->kelas?->name ?? '-' }}
                        · {{ $jurnal->jadwal?->day ?? '-' }}
                        {{ $jurnal->jadwal?->start_time }}–{{ $jurnal->jadwal?->end_time }}
                    </p>
                </div>
                <span class="badge {{ $jurnal->status }}">{{ $jurnal->status_label }}</span>
            </div>
            <div class="detail-body">
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Guru</div>
                        <div class="info-value">{{ $jurnal->jadwal?->teacher?->name ?? '-' }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Tanggal</div>
                        <div class="info-value">{{ $jurnal->tgl?->translatedFormat('d M Y') ?? '-' }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Kehadiran Guru</div>
                        <div class="info-value">{{ $jurnal->keterangan_label }}</div>
                    </div>
                </div>

                <div class="detail-section">
                    <h4>Materi</h4>
                    <p>{{ $jurnal->materi ?: 'Tidak ada materi yang diisi.' }}</p>
                </div>

                <div class="detail-section">
                    <h4>Catatan</h4>
                    <p>{{ $jurnal->catatan ?: 'Tidak ada catatan.' }}</p>
                </div>

                @if ($jurnal->tugas)
                    <div class="detail-section">
                        <h4>Tugas</h4>
                        <p>{{ $jurnal->tugas }}</p>
                    </div>
                @endif

                @if ($jurnal->alasan)
                    <div class="detail-section">
                        <h4>Alasan</h4>
                        <p>{{ $jurnal->alasan }}</p>
                    </div>
                @endif

                @if ($jurnal->foto)
                    <div class="detail-section">
                        <h4>Dokumentasi</h4>
                        <p><a href="{{ asset('storage/'.$jurnal->foto) }}" target="_blank">Lihat foto</a></p>
                    </div>
                @endif

                @if ($jurnal->alasan_validasi)
                    <div class="detail-section">
                        <h4>Alasan Penolakan</h4>
                        <p>{{ $jurnal->alasan_validasi }}</p>
                    </div>
                @endif

                <div class="detail-section">
                    <h4>Absensi Siswa ({{ $jurnal->absensis->count() }})</h4>
                    @if ($jurnal->absensis->isNotEmpty())
                        <table class="absensi-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Siswa</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jurnal->detailJurnal as $i => $absen)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $absen->nama_siswa }}</td>
                                        <td>
                                            <span class="kt-label kt-{{ $absen->keterangan }}">{{ ucfirst($absen->keterangan) }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Tidak ada data absensi siswa.</p>
                    @endif
                </div>

                @if ($jurnal->status === 'pending')
                    <div class="action-bar">
                        <button type="button" class="btn-ghost" id="btnOpenReject">
                            <i class="fa-solid fa-rotate-left"></i> Tolak
                        </button>
                        <form method="POST" action="{{ route('sekre.jurnal.approve', $jurnal) }}">
                            @csrf
                            <button type="submit" class="btn-primary">
                                <i class="fa-solid fa-check"></i> Setujui & Validasi
                            </button>
                        </form>
                    </div>

                    <div class="reject-box" id="rejectForm">
                        <form method="POST" action="{{ route('sekre.jurnal.reject', $jurnal) }}">
                            @csrf
                            <textarea name="alasan_validasi" maxlength="255"
                                placeholder="Tuliskan alasan penolakan (opsional)…"></textarea>
                            @error('alasan_validasi')
                                <small style="color:#C62828;">{{ $message }}</small>
                            @enderror
                            <div class="reject-actions">
                                <button type="button" class="btn-ghost" id="btnCancelReject">Batal</button>
                                <button type="submit" class="btn-danger">
                                    <i class="fa-solid fa-rotate-left"></i> Tolak Jurnal
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </main>
</div>

<script>
(function () {
    const openBtn = document.getElementById('btnOpenReject');
    const cancelBtn = document.getElementById('btnCancelReject');
    const box = document.getElementById('rejectForm');
    if (openBtn && box) {
        openBtn.addEventListener('click', () => { box.style.display = 'block'; });
        if (cancelBtn) cancelBtn.addEventListener('click', () => { box.style.display = 'none'; });
    }

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