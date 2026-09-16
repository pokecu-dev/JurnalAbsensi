<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal Mengajar - Jurnal Absensi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --dark-green: #1A312C;
            --medium-green: #428475;
            --mint-green: #89D7B7;
            --bg-cream: #FFF4E1;

            --sidebar-bg: var(--dark-green);
            --main-bg: var(--bg-cream);
            --card-dark: var(--dark-green);
            --primary-accent: var(--mint-green);
            --secondary-accent: var(--medium-green);
            --text-dark: #1A312C;
            --text-muted: #53756C;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            background-color: var(--main-bg);
            color: var(--text-dark);
            overflow: hidden;
        }

        /* SIDEBAR */
        .sidebar {
            width: 200px;
            min-width: 200px;
            background-color: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 24px 16px;
            color: #fff;
        }

        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 0 45px 0;
            text-align: center;
        }

        .logo-container img {
            width: 65px;
            height: auto;
            object-fit: contain;
        }

        .logo-title {
            font-size: 15px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 0.5px;
        }

        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 12px; 
            margin-top: 10px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 16px;
            color: #A5B5B0;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            border-radius: 12px;
            transition: all 0.2s ease;
        }

        .nav-item:hover, .nav-item.active {
            background-color: rgba(255, 255, 255, 0.12);
            color: var(--mint-green);
        }

        .sidebar-footer {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn-sidebar {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 16px;
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: background 0.2s;
        }

        .btn-sidebar:hover {
            background: rgba(255, 255, 255, 0.18);
        }

        /* MAIN CONTENT */
        .main-content {
            flex: 1;
            padding: 28px 40px;
            overflow-y: auto;
        }

        /* HEADER */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 24px;
        }

        .header h1 {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .header p {
            font-size: 13px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .header-meta {
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 12px;
            color: var(--text-muted);
        }

        .header-meta i {
            font-size: 18px;
            cursor: pointer;
        }

        /* MOBILE HEADER */
        .mobile-header {
            display: none;
            background-color: var(--sidebar-bg);
            color: #fff;
            padding: 14px 20px;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 99;
        }

        .btn-hamburger {
            background: none;
            border: none;
            color: #fff;
            font-size: 20px;
            cursor: pointer;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 998;
        }


        /* KETERANGAN & INFO JADWAL */
        .select-status-box {
            margin-bottom: 20px;
        }

        .select-status-box label {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-muted);
            display: block;
            margin-bottom: 6px;
        }

        .select-custom {
            padding: 10px 16px;
            border-radius: 10px;
            border: 1px solid #D2E0DA;
            background: #fff;
            font-size: 14px;
            font-weight: 700;
            color: var(--text-dark);
            outline: none;
            cursor: pointer;
            width: 280px;
            max-width: 100%;
        }

        .info-jadwal-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .info-card {
            background: var(--card-dark);
            color: #fff;
            padding: 14px 18px;
            border-radius: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .info-card span { font-size: 11px; color: #A5B5B0; display: block; }
        .info-card h4 { font-size: 16px; font-weight: 700; margin-top: 2px; }
        .info-card i { font-size: 18px; opacity: 0.5; }

        /* FORM CARDS */
        .form-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
            margin-bottom: 24px;
        }

        .form-card h3 {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group label {
            font-size: 12px;
            font-weight: 700;
            color: var(--text-dark);
            display: block;
            margin-bottom: 6px;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #E2ECE8;
            border-radius: 12px;
            font-size: 13px;
            outline: none;
            background: #FAFDFB;
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        /* ABSENSI SISWA */
        .absen-filter {
            background: #FFF8EB;
            padding: 14px;
            border-radius: 14px;
            display: flex;
            gap: 12px;
            align-items: center;
            margin-bottom: 16px;
        }

        .input-search {
            flex: 1;
            padding: 10px 14px;
            border: 1px solid #E2ECE8;
            border-radius: 10px;
            font-size: 13px;
            background: #fff;
        }

        .btn-add {
            background: var(--dark-green);
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 13px;
            cursor: pointer;
        }

        .table-absen {
            width: 100%;
            border-collapse: collapse;
        }

        .table-absen th, .table-absen td {
            text-align: left;
            padding: 12px 14px;
            font-size: 13px;
        }

        .table-absen th {
            background: #FFF8EB;
            font-size: 11px;
            color: #888;
        }

        .badge-sakit {
            background: #FFEBEB;
            color: #FF3D00;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 700;
        }

        /* ALERT BOX UNTUK PETUNJUK SEKR / PIKET */
        .alert-info-box {
            padding: 16px;
            border-radius: 12px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .alert-sekre { background: #E8F5E9; color: #2E7D32; border: 1px solid #C8E6C9; }
        .alert-piket { background: #FFF3E0; color: #E65100; border: 1px solid #FFE0B2; }

        /* FOOTER BUTTONS */
        .action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 20px;
        }

        .btn-batal {
            background: transparent;
            border: none;
            padding: 12px 24px;
            font-weight: 700;
            color: var(--text-muted);
            cursor: pointer;
        }

        .btn-live-foto {
            background: var(--dark-green);
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 13px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-simpan {
            background: var(--dark-green);
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 13px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-simpan:hover { background: #264740; }

        /* UTILITY CLASS UNTUK LOGIKA DISPLAY */
        .d-none { display: none !important; }

        /* MEDIA QUERIES */
        @media (max-width: 768px) {
            body { flex-direction: column; }
            .mobile-header { display: flex; }
            .sidebar {
                position: fixed; top: 0; left: -260px; height: 100vh; width: 240px;
            }
            .sidebar.active { left: 0; }
            .sidebar-overlay.active { display: block; }
            .main-content { padding: 20px 16px; }
            .info-jadwal-grid { grid-template-columns: 1fr; }
            .grid-2 { grid-template-columns: 1fr; }
            .absen-filter { flex-direction: column; }
            .input-search, .select-custom, .btn-add { width: 100%; }
            .action-buttons { flex-direction: column; }
            .btn-simpan, .btn-live-foto, .btn-batal { width: 100%; justify-content: center; }
        }
    </style>
</head>
<body>

    <!-- MOBILE HEADER -->
    <div class="mobile-header">
        <span class="logo-title">Jurnal Absensi</span>
        <button class="btn-hamburger" id="hamburgerBtn"><i class="fa-solid fa-bars"></i></button>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div>
            <div class="logo-container">
                <img src="{{ asset('image/logo.png') }}" alt="Logo Jurnal Absensi">
                <span class="logo-title">Jurnal Absensi</span>
            </div>

            <nav class="nav-menu">
                <nav class="nav-menu">
                    <a href="{{ url('/guru/dashboard') }}" class="nav-item"><i class="fa-solid fa-house"></i> Dashboard</a>
                    <a href="{{ url('/guru/jurnal') }}" class="nav-item active"><i class="fa-solid fa-book"></i> Jurnal</a>
                    <a href="{{ url('/guru/jadwal') }}" class="nav-item"><i class="fa-regular fa-calendar-days"></i> Jadwal</a>
                
                </nav>
            </nav>
        </div>

        <div class="sidebar-footer">
            <button class="btn-sidebar"><i class="fa-regular fa-user"></i> Profile</button>
            <button class="btn-sidebar"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <!-- HEADER -->
        <header class="header">
            <div>
                <h1>Isi Jurnal Mengajar</h1>
                <p>Lengkapi data jurnal sesi mengajar saat ini</p>
            </div>
            <div class="header-meta">
                <i class="fa-regular fa-bell"></i>
                <div>
                    <div>Selasa, 21 Juli 2026</div>
                    <div style="text-align: right; font-weight: 700;">08.00 WIB</div>
                </div>
            </div>
        </header>

        <!-- KETERANGAN KEHADIRAN GURU -->
        <div class="select-status-box">
            <label for="statusKehadiran">Keterangan Kehadiran Guru</label>
            <select id="statusKehadiran" class="select-custom" onchange="handleStatusChange()">
                <option value="hadir" selected>Hadir</option>
                <option value="tidak_hadir_tugas">Tidak Hadir (Ada Tugas)</option>
                <option value="tidak_hadir_tanpa_tugas">Tidak Hadir (Tanpa Tugas)</option>
            </select>
        </div>

        <!-- INFO JADWAL -->
        <div class="info-jadwal-grid">
            <div class="info-card">
                <div>
                    <span>Kelas</span>
                    <h4>XI RPL 2</h4>
                </div>
                <i class="fa-solid fa-chalkboard-user"></i>
            </div>
            <div class="info-card">
                <div>
                    <span>Mata Pelajaran</span>
                    <h4>Matematika</h4>
                </div>
                <i class="fa-solid fa-book-open"></i>
            </div>
            <div class="info-card">
                <div>
                    <span>Jam Ke-</span>
                    <h4>Jam 5 - 9 (09.40 - 13.00)</h4>
                </div>
                <i class="fa-regular fa-clock"></i>
            </div>
        </div>

        <!-- SECTION 1: HADIR (MATERI & AKTIVITAS) -->
        <div id="sectionHadir" class="form-card">
            <h3><i class="fa-regular fa-pen-to-square"></i> Detail Kegiatan</h3>
            <div class="grid-2">
                <div class="form-group">
                    <label>Materi Pembelajaran *</label>
                    <textarea placeholder="Contoh: Fungsi Linear, Fungsi Kuadrat..."></textarea>
                </div>
                <div class="form-group">
                    <label>Keterangan / Aktivitas Kelas</label>
                    <textarea placeholder="Catatan kegiatan..."></textarea>
                </div>
            </div>
        </div>

        <!-- SECTION 2: TUGAS (HANYA MUNCUL JIKA TIDAK HADIR + ADA TUGAS) -->
        <div id="sectionTugas" class="form-card d-none">
            <h3><i class="fa-solid fa-list-check"></i> Detail Tugas untuk Siswa</h3>
            <div class="alert-info-box alert-sekre">
                <i class="fa-solid fa-circle-info"></i>
                <div>Tugas ini akan otomatis dikirimkan ke <b>Sekretaris Kelas (Sekre)</b> untuk diumumkan di kelas.</div>
            </div>
            <div class="form-group">
                <label>Instruksi / Deskripsi Tugas *</label>
                <textarea style="height: 120px;" placeholder="Tuliskan instruksi tugas secara jelas, batas waktu, dan cara pengumpulan..."></textarea>
            </div>
        </div>

        <!-- SECTION 3: TANPA TUGAS (MUNCUL JIKA TIDAK HADIR + TANPA TUGAS) -->
        <div id="sectionTanpaTugas" class="form-card d-none">
            <h3><i class="fa-solid fa-building-user"></i> Penanganan Kelas Kosong</h3>
            <div class="alert-info-box alert-piket">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <div>Laporan ini akan langsung diteruskan ke <b>Guru Piket</b> agar kelas dapat didampingi/diisi.</div>
            </div>
            <div class="form-group">
                <label>Alasan / Catatan Tambahan (Opsional)</label>
                <textarea placeholder="Contoh: Sedang mendampingi lomba / Sakit mendadak..."></textarea>
            </div>
        </div>

        <!-- SECTION 4: ABSENSI SISWA (HANYA MUNCUL JIKA GURU HADIR) -->
        <div id="sectionAbsensiSiswa" class="form-card">
            <h3><i class="fa-solid fa-users"></i> Daftar Siswa Tidak Hadir</h3>
            
            <div class="absen-filter">
                <input type="text" class="input-search" placeholder="Ketik nama siswa...">
                <select class="select-custom" style="width: 160px;">
                    <option value="S">Sakit (S)</option>
                    <option value="I">Izin (I)</option>
                    <option value="A">Alpha (A)</option>
                    <option value="D">Dispen (D)</option>
                </select>
                <button class="btn-add">+ Tambah</button>
            </div>

            <table class="table-absen">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Nama Siswa</th>
                        <th>Keterangan</th>
                        <th style="width: 60px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><b>Roy Kiyoshi</b></td>
                        <td><span class="badge-sakit">Sakit</span></td>
                        <td><i class="fa-regular fa-trash-can" style="color: #FF3D00; cursor: pointer;"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- ACTION BUTTONS -->
        <div class="action-buttons">
            <button class="btn-batal" onclick="window.history.back()">Batal</button>
            <button id="btnLiveFoto" class="btn-live-foto"><i class="fa-solid fa-camera"></i> Live Foto</button>
            <button id="btnSubmit" class="btn-simpan"><i class="fa-regular fa-floppy-disk"></i> <span id="textBtnSimpan">Simpan Jurnal</span></button>
        </div>

    </main>

    <script>
        // TOGGLE SIDEBAR MOBILE
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        hamburgerBtn.addEventListener('click', () => {
            sidebar.classList.add('active');
            sidebarOverlay.classList.add('active');
        });

        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
        });

        // LOGIKA PERUBAHAN TAMPILAN BERDASARKAN KETERANGAN KEHADIRAN GURU
        function handleStatusChange() {
            const status = document.getElementById('statusKehadiran').value;
            
            const sectionHadir = document.getElementById('sectionHadir');
            const sectionTugas = document.getElementById('sectionTugas');
            const sectionTanpaTugas = document.getElementById('sectionTanpaTugas');
            const sectionAbsensiSiswa = document.getElementById('sectionAbsensiSiswa');
            
            const btnLiveFoto = document.getElementById('btnLiveFoto');
            const textBtnSimpan = document.getElementById('textBtnSimpan');

            if (status === 'hadir') {
                sectionHadir.classList.remove('d-none');
                sectionAbsensiSiswa.classList.remove('d-none');
                sectionTugas.classList.add('d-none');
                sectionTanpaTugas.classList.add('d-none');
                
                btnLiveFoto.classList.remove('d-none');
                textBtnSimpan.innerText = 'Simpan Jurnal';

            } else if (status === 'tidak_hadir_tugas') {
                sectionHadir.classList.add('d-none');
                sectionAbsensiSiswa.classList.add('d-none');
                sectionTugas.classList.remove('d-none');
                sectionTanpaTugas.classList.add('d-none');
                
                btnLiveFoto.classList.add('d-none');
                textBtnSimpan.innerText = 'Kirim Tugas ke Sekre';

            } else if (status === 'tidak_hadir_tanpa_tugas') {
                sectionHadir.classList.add('d-none');
                sectionAbsensiSiswa.classList.add('d-none');
                sectionTugas.classList.add('d-none');
                sectionTanpaTugas.classList.remove('d-none');
                
                btnLiveFoto.classList.add('d-none');
                textBtnSimpan.innerText = 'Lapor ke Guru Piket';
            }
        }
    </script>
</body>
</html>