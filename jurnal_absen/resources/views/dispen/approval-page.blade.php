<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Dispensasi</title>
</head>
<body>
    <h1>Approval Dispensasi</h1>
    <p>Login sebagai <strong>{{ auth()->user()->name }}</strong></p>
    <dl>
        <dt>Nama Siswa</dt><dd>{{ $dispen->siswa->name }}</dd>
        <dt>Kelas</dt><dd>{{ $dispen->kelas->name }}</dd>
        <dt>Kategori</dt><dd>{{ $dispen->kategori }}</dd>
        <dt>Alasan</dt><dd>{{ $dispen->alasan }}</dd>
        <dt>Tanggal</dt><dd>{{ $dispen->tgl->format('d-m-Y') }}</dd>
    </dl>
    <form action="{{ route('dispen.status', $dispen) }}" method="POST" style="display: inline;">
        @csrf
        <input type="hidden" name="status" value="approved">
        <button type="submit">ACC</button>
    </form>
    <form action="{{ route('dispen.status', $dispen) }}" method="POST" style="display: inline;">
        @csrf
        <input type="hidden" name="status" value="rejected">
        <button type="submit">Tolak</button>
    </form>
</body>
</html>
