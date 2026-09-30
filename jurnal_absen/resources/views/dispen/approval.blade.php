<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Approval Dispensasi</title>
</head>
<body>
    <h1>Konfirmasi Approval Dispensasi</h1>
    <p>Anda akan melanjutkan sebagai <strong>{{ $approvalUser->name }}</strong> (Sekre).</p>
    <dl>
        <dt>Nama Siswa</dt><dd>{{ $dispen->siswa->name }}</dd>
        <dt>Kelas</dt><dd>{{ $dispen->kelas->name }}</dd>
        <dt>Kategori</dt><dd>{{ $dispen->kategori }}</dd>
        <dt>Alasan</dt><dd>{{ $dispen->alasan }}</dd>
        <dt>Tanggal</dt><dd>{{ $dispen->tgl->format('d-m-Y') }}</dd>
        <dt>Status</dt><dd>{{ $dispen->status }}</dd>
    </dl>
    <form action="{{ route('dispen.approval.login', $dispen) }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <button type="submit">Lanjut sebagai {{ $approvalUser->name }}</button>
    </form>
</body>
</html>
