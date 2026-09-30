<!DOCTYPE html>
<html>

<head>
    <title>Test Dispen</title>
</head>

<body>

    <h2>Test Store Dispen</h2>

    <form action="{{ route('dispen.store') }}" method="POST">
        @csrf

        <label>Siswa ID</label>
        <input type="number" name="siswa_id" value="1">
        <br><br>

        <div>
            <label for="approval_user_id">
                Sekre Tujuan
            </label>

            <select
                name="approval_user_id"
                id="approval_user_id"
                required>
                <option value="">
                    -- Pilih Sekre --
                </option>

                @foreach ($sekres as $sekre)
                <option
                    value="{{ $sekre->id }}"
                    @selected(old('approval_user_id')==$sekre->id)
                    >
                    {{ $sekre->name }}
                </option>
                @endforeach
            </select>

            @error('approval_user_id')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <label>Class ID</label>
        <input type="number" name="class_id" value="1">
        <br><br>

        <label>Kategori</label>
        <select name="kategori">
            <option value="osis">OSIS</option>
            <option value="lomba">Lomba</option>
            <option value="sakit">Sakit</option>
            <option value="pribadi">Pribadi</option>
            <option value="lainnya">Lainnya</option>
        </select>
        <br><br>

        <label>Alasan</label>
        <textarea name="alasan">Testing pengajuan dispen</textarea>
        <br><br>

        <label>Tanggal</label>
        <input type="date" name="tgl" value="2026-09-28">
        <br><br>

        <label>Jam Mulai</label>
        <input type="time" name="jam_mulai" value="07:00">
        <br><br>

        <label>Jam Selesai</label>
        <input type="time" name="jam_selesai" value="10:00">
        <br><br>

        <button type="submit">Test Store</button>
    </form>

</body>

</html>