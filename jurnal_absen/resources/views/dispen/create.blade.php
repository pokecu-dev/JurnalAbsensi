<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Dispensasi</title>
</head>
<body>
    <h1>Buat Pengajuan Dispensasi</h1>
    <p><a href="{{ route('dispen.index') }}">Kembali ke daftar Dispen</a></p>
    @include('dispen._form', [
        'formAction' => route('dispen.store'),
        'isEditing' => false,
        'dispen' => null,
        'submitLabel' => 'Kirim pengajuan',
    ])
</body>
</html>
