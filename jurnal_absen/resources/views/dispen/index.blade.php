<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dispen</title>
    <style>
        body { font-family: system-ui, sans-serif; margin: 2rem auto; max-width: 1200px; padding: 0 1rem; color: #1f2937; }
        .summary, .filters { display: flex; flex-wrap: wrap; gap: 1rem; margin: 1.25rem 0; }
        .summary article, .filters label { border: 1px solid #d1d5db; border-radius: .5rem; padding: .75rem; }
        .filters label { flex: 1 1 170px; }
        .filters input, .filters select { box-sizing: border-box; display: block; margin-top: .35rem; padding: .45rem; width: 100%; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border-bottom: 1px solid #e5e7eb; padding: .7rem; text-align: left; vertical-align: top; }
        .actions { display: flex; flex-wrap: wrap; gap: .6rem; }
        .success { color: #166534; }
        .empty { text-align: center; padding: 2rem; }
    </style>
</head>
<body>
    <h1>Daftar Pengajuan Dispen</h1>
    <p><a href="{{ route('dispen.create') }}">Buat pengajuan</a></p>

    @if (session('success'))
        <p class="success" role="status">{{ session('success') }}</p>
    @endif

    <section class="summary" aria-label="Ringkasan pengajuan">
        <article>Total: <strong>{{ $summary['total'] }}</strong></article>
        <article>Menunggu: <strong>{{ $summary['pending'] }}</strong></article>
        <article>Disetujui: <strong>{{ $summary['approved'] }}</strong></article>
        <article>Ditolak: <strong>{{ $summary['rejected'] }}</strong></article>
    </section>

    <form method="GET" action="{{ route('dispen.index') }}">
        <div class="filters">
            <label for="q">Cari
                <input id="q" type="search" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Nama siswa, alasan, kategori, Sekre">
            </label>
            <label for="class_id">Kelas siswa
                <select id="class_id" name="class_id">
                    <option value="">Semua kelas</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}" @selected(($filters['class_id'] ?? '') == $class->id)>{{ $class->name }}</option>
                    @endforeach
                </select>
            </label>
            <label for="status">Status
                <select id="status" name="status">
                    <option value="">Semua status</option>
                    @foreach (['pending' => 'Menunggu', 'approved' => 'Disetujui', 'rejected' => 'Ditolak'] as $value => $label)
                        <option value="{{ $value }}" @selected(($filters['status'] ?? '') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </label>
            <label for="kategori">Kategori
                <select id="kategori" name="kategori">
                    <option value="">Semua kategori</option>
                    @foreach (['osis', 'lomba', 'sakit', 'pribadi', 'lainnya'] as $kategori)
                        <option value="{{ $kategori }}" @selected(($filters['kategori'] ?? '') === $kategori)>{{ ucfirst($kategori) }}</option>
                    @endforeach
                </select>
            </label>
            <label for="approval_user_id">Sekre
                <select id="approval_user_id" name="approval_user_id">
                    <option value="">Semua Sekre</option>
                    @foreach ($sekres as $sekre)
                        <option value="{{ $sekre->id }}" @selected(($filters['approval_user_id'] ?? '') == $sekre->id)>{{ $sekre->name }}</option>
                    @endforeach
                </select>
            </label>
            <label for="date">Tanggal tertentu
                <input id="date" type="date" name="date" value="{{ $filters['date'] ?? '' }}">
            </label>
            <label for="date_from">Dari tanggal
                <input id="date_from" type="date" name="date_from" value="{{ $filters['date_from'] ?? '' }}">
            </label>
            <label for="date_to">Sampai tanggal
                <input id="date_to" type="date" name="date_to" value="{{ $filters['date_to'] ?? '' }}">
            </label>
        </div>
        <button type="submit">Filter</button>
        <a href="{{ route('dispen.index') }}">Reset</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>Siswa / Kelas</th>
                <th>Pengajuan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Sekre</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dispens as $dispen)
                <tr>
                    <td>
                        @forelse ($dispen->details as $detail)
                            <div>{{ $detail->siswa?->name ?? 'Siswa dihapus' }} — {{ $detail->siswa?->class?->name ?? 'Kelas belum ditentukan' }}</div>
                        @empty
                            <span>Belum ada siswa terkait.</span>
                        @endforelse
                    </td>
                    <td><strong>{{ ucfirst($dispen->kategori) }}</strong><br>{{ $dispen->alasan }}</td>
                    <td>{{ $dispen->tgl?->format('d-m-Y') ?? '-' }}<br>{{ $dispen->jam_mulai ?? '-' }}–{{ $dispen->jam_selesai ?? '-' }}</td>
                    <td>{{ ucfirst($dispen->status) }}</td>
                    <td>{{ $dispen->approvalUser?->name ?? '-' }}<br><small>Diputuskan: {{ $dispen->approver?->name ?? 'Belum' }}</small></td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('dispen.show', $dispen) }}">Detail</a>
                            @if ($dispen->status === 'pending')
                                <a href="{{ route('dispen.edit', $dispen) }}">Edit</a>
                            @endif
                            <form action="{{ route('dispen.destroy', $dispen) }}" method="POST" onsubmit="return confirm('Hapus pengajuan Dispen ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td class="empty" colspan="6">Tidak ada pengajuan yang cocok dengan filter.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $dispens->links() }}
</body>
</html>
