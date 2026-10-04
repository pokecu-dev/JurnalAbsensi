<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dispensasi</title>
</head>
<body>
    <h1>Edit Pengajuan Dispensasi</h1>
    <p><a href="{{ route('dispen.show', $dispen) }}">Kembali ke detail</a></p>
    @include('dispen._form', [
        'formAction' => route('dispen.update', $dispen),
        'isEditing' => true,
        'submitLabel' => 'Simpan perubahan',
    ])
</body>
</html>
