<style>
    .dispen-form { max-width: 900px; display: grid; gap: 1rem; }
    .dispen-form fieldset, .dispen-form .field { border: 1px solid #d1d5db; border-radius: .5rem; padding: 1rem; }
    .dispen-form label { font-weight: 600; }
    .dispen-form input:not([type=checkbox]), .dispen-form select, .dispen-form textarea { box-sizing: border-box; width: 100%; max-width: 100%; padding: .55rem; }
    .student-list { max-height: 22rem; overflow: auto; border: 1px solid #e5e7eb; padding: .5rem; }
    .student-option { display: block; padding: .35rem; }
    .field-error { color: #b91c1c; }
</style>

<form class="dispen-form" action="{{ $formAction }}" method="POST">
    @csrf
    @if ($isEditing)
        @method('PUT')
    @endif

    @if ($errors->any())
        <div role="alert" class="field-error">
            <strong>Periksa kembali data yang dimasukkan.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <fieldset>
        <legend>Pilih siswa</legend>
        <p>Siswa dapat berasal dari kelas yang berbeda.</p>
        <div class="field">
            <label for="student-search">Cari nama siswa</label>
            <input id="student-search" type="search" placeholder="Ketik nama siswa..." autocomplete="off">
        </div>
        <div class="field">
            <label for="student-class-filter">Filter kelas</label>
            <select id="student-class-filter">
                <option value="">Semua kelas</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>
        <p><span id="selected-student-count">{{ count($selectedSiswaIds) }}</span> siswa dipilih</p>
        <div class="student-list" id="student-list">
            @forelse ($siswas as $siswa)
                <label class="student-option" data-name="{{ mb_strtolower($siswa->name) }}" data-class="{{ $siswa->class_id }}">
                    <input
                        type="checkbox"
                        name="siswa_ids[]"
                        value="{{ $siswa->id }}"
                        @checked(in_array($siswa->id, $selectedSiswaIds))
                    >
                    {{ $siswa->name }} — {{ $siswa->class?->name ?? 'Kelas belum ditentukan' }}
                </label>
            @empty
                <p>Belum ada data siswa.</p>
            @endforelse
        </div>
        @error('siswa_ids')<p class="field-error">{{ $message }}</p>@enderror
        @error('siswa_ids.*')<p class="field-error">{{ $message }}</p>@enderror
    </fieldset>

    @unless ($isEditing)
        <div class="field">
            <label for="approval_user_id">Sekre tujuan</label>
            <select id="approval_user_id" name="approval_user_id" required>
                <option value="">-- Pilih Sekre --</option>
                @foreach ($sekres as $sekre)
                    <option value="{{ $sekre->id }}" @selected(old('approval_user_id') == $sekre->id)>
                        {{ $sekre->name }}
                    </option>
                @endforeach
            </select>
            @error('approval_user_id')<p class="field-error">{{ $message }}</p>@enderror
        </div>
    @endunless

    <div class="field">
        <label for="kategori">Kategori</label>
        <select id="kategori" name="kategori" required>
            <option value="">-- Pilih kategori --</option>
            @foreach ($kategori as $category)
                <option value="{{ $category }}" @selected(old('kategori', $dispen?->kategori) === $category)>
                    {{ ucfirst($category) }}
                </option>
            @endforeach
        </select>
        @error('kategori')<p class="field-error">{{ $message }}</p>@enderror
    </div>

    <div class="field">
        <label for="alasan">Alasan</label>
        <textarea id="alasan" name="alasan" rows="4" required>{{ old('alasan', $dispen?->alasan) }}</textarea>
        @error('alasan')<p class="field-error">{{ $message }}</p>@enderror
    </div>

    <div class="field">
        <label for="tgl">Tanggal</label>
        <input id="tgl" type="date" name="tgl" value="{{ old('tgl', $dispen?->tgl?->format('Y-m-d')) }}" required>
        @error('tgl')<p class="field-error">{{ $message }}</p>@enderror
    </div>

    <div class="field">
        <label for="jam_mulai">Jam mulai</label>
        <input id="jam_mulai" type="time" name="jam_mulai" value="{{ old('jam_mulai', $dispen?->jam_mulai) }}">
        @error('jam_mulai')<p class="field-error">{{ $message }}</p>@enderror
    </div>

    <div class="field">
        <label for="jam_selesai">Jam selesai</label>
        <input id="jam_selesai" type="time" name="jam_selesai" value="{{ old('jam_selesai', $dispen?->jam_selesai) }}">
        @error('jam_selesai')<p class="field-error">{{ $message }}</p>@enderror
    </div>

    <button type="submit">{{ $submitLabel }}</button>
</form>

<script>
    const studentSearch = document.getElementById('student-search');
    const studentClassFilter = document.getElementById('student-class-filter');
    const studentOptions = [...document.querySelectorAll('.student-option')];
    const selectedStudentCount = document.getElementById('selected-student-count');

    function filterStudents() {
        const query = studentSearch.value.trim().toLocaleLowerCase();
        const classId = studentClassFilter.value;

        studentOptions.forEach((option) => {
            const matchesName = option.dataset.name.includes(query);
            const matchesClass = classId === '' || option.dataset.class === classId;
            option.hidden = !matchesName || !matchesClass;
        });
    }

    studentSearch.addEventListener('input', filterStudents);
    studentClassFilter.addEventListener('change', filterStudents);
    document.querySelectorAll('input[name="siswa_ids[]"]').forEach((checkbox) => {
        checkbox.addEventListener('change', () => {
            selectedStudentCount.textContent = document.querySelectorAll('input[name="siswa_ids[]"]:checked').length;
        });
    });
</script>
