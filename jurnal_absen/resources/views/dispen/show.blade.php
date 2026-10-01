<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dispen</title>
</head>
<body>
    <h1>Detail Pengajuan Dispen</h1>
    <p><a href="{{ route('dispen.index') }}">Kembali ke daftar</a></p>

    @if (session('success'))
        <p role="status">{{ session('success') }}</p>
    @endif

    <h2>Informasi Pengajuan</h2>
    <dl>
        <dt>Kategori</dt><dd>{{ ucfirst($dispen->kategori) }}</dd>
        <dt>Alasan</dt><dd>{{ $dispen->alasan }}</dd>
        <dt>Tanggal</dt><dd>{{ $dispen->tgl?->format('d-m-Y') ?? '-' }}</dd>
        <dt>Jam</dt><dd>{{ $dispen->jam_mulai ?? '-' }} – {{ $dispen->jam_selesai ?? '-' }}</dd>
        <dt>Status</dt><dd>{{ ucfirst($dispen->status) }}</dd>
        <dt>Sekre tujuan</dt><dd>{{ $dispen->approvalUser?->name ?? '-' }}</dd>
        <dt>Diputuskan oleh</dt><dd>{{ $dispen->approver?->name ?? '-' }}</dd>
    </dl>

    <h2>Daftar Siswa</h2>
    <table>
        <thead><tr><th>No.</th><th>Nama</th><th>Kelas</th></tr></thead>
        <tbody>
            @forelse ($dispen->details as $index => $detail)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $detail->siswa?->name ?? 'Siswa dihapus' }}</td>
                    <td>{{ $detail->siswa?->class?->name ?? '-' }}</td>
                </tr>
            @empty
                <tr><td colspan="3">Belum ada siswa terkait.</td></tr>
            @endforelse
        </tbody>
    </table>

    @if ($dispen->status === 'pending')
        <p><a href="{{ route('dispen.edit', $dispen) }}">Edit pengajuan</a></p>
    @endif
</body>
</html>
