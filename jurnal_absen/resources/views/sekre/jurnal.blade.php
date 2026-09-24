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
            --tag-active: #CBEAD9;
            --tag-inactive: #F4ECE1;
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
            position: sticky;
            top: 0;
            height: 100vh;
            flex-shrink: 0;
            z-index: 100;
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
            text-decoration: none;
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
            color: var(--text-dark);
        }

    
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
            padding: 8px 16px;
            border-radius: 10px;
            border: 1px solid #D2E0DA;
            background: #fff;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
            outline: none;
            cursor: pointer;
            width: 150px;
            max-width: 100%;
        }

        
        .info-jadwal-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 8px;
        }

        .info-card-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .info-card-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .info-card-label i {
            font-size: 13px;
        }

        .info-card {
            background: var(--card-dark);
            color: #fff;
            padding: 14px 18px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 56px;
        }

        .info-card h4 { 
            font-size: 15px; 
            font-weight: 700; 
            color: #fff; 
        }

        .info-card .sub-jam {
            font-size: 11px;
            color: #89D7B7;
            margin-top: 2px;
            font-weight: 500;
        }

        .info-card i.btn-action-icon { 
            font-size: 13px; 
            color: #89D7B7;
            opacity: 0.85;
            cursor: pointer;
        }

        .info-jadwal-desc {
            font-size: 11px;
            color: var(--text-muted);
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* FORM CARDS */
        .form-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
            margin-bottom: 24px;
        }

        .form-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .form-card h3 {
            font-size: 15px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-dark);
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

        .form-group label .req {
            color: #EF4444;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #E2ECE8;
            border-radius: 12px;
            font-size: 13px;
            outline: none;
            background: #FAFDFB;
            color: var(--text-dark);
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        .form-group textarea:focus {
            border-color: var(--medium-green);
        }

        /* QUICK ACTIVITY TAGS DI BAWAH TEXTAREA */
        .activity-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 10px;
        }

        .tag-pill {
            background-color: var(--tag-inactive);
            color: var(--text-dark);
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            user-select: none;
        }

        .tag-pill:hover {
            background-color: #ebdcca;
        }

        .tag-pill.active {
            background-color: var(--tag-active);
            color: var(--text-dark);
            font-weight: 700;
        }

        
        .card-stats-badges {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .stat-badge {
            font-size: 12px;
            font-weight: 600;
            color: #53756C;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .stat-badge .dot-total {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: #53756C;
            display: inline-block;
        }

        .stat-badge .dot-absen {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: #FF3D00;
            display: inline-block;
        }

        .absen-filter {
            background: #FFF8EB;
            padding: 14px 18px;
            border-radius: 14px;
            display: flex;
            gap: 14px;
            align-items: flex-end;
            margin-bottom: 18px;
        }

        .absen-input-col {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .absen-input-col.col-search {
            flex: 2;
        }

        .absen-input-col.col-status {
            flex: 1;
        }

        .absen-input-col label {
            font-size: 11px;
            font-weight: 600;
            color: var(--text-muted);
        }

        .search-box-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-box-wrap i {
            position: absolute;
            left: 12px;
            font-size: 12px;
            color: #A0B0AA;
        }

        .input-search {
            width: 100%;
            padding: 9px 12px 9px 34px;
            border: 1px solid #E2ECE8;
            border-radius: 8px;
            font-size: 13px;
            background: #fff;
            outline: none;
        }

        .select-status-absen {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #E2ECE8;
            border-radius: 8px;
            font-size: 13px;
            background: #fff;
            outline: none;
            cursor: pointer;
        }

        .btn-add {
            background: var(--dark-green);
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 13px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
            height: 38px;
            transition: background 0.2s;
        }

        .btn-add:hover {
            background: #264740;
        }

        .table-absen {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table-absen th, .table-absen td {
            text-align: left;
            padding: 12px 14px;
            font-size: 13px;
        }

        .table-absen th {
            background: #FFF8EB;
            font-size: 12px;
            color: #637871;
            font-weight: 600;
            border-bottom: 1px solid #EADBCC;
        }

        .table-absen td {
            border-bottom: 1px solid #F0E8DC;
        }

        .table-absen tr:last-child td {
            border-bottom: none;
        }

        .badge-sakit {
            background: #FFEBEB;
            color: #FF3D00;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 700;
            display: inline-block;
        }

        .badge-izin {
            background: #EFF6FF;
            color: #2563EB;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 700;
            display: inline-block;
        }

        .badge-alpha {
            background: #FEF2F2;
            color: #DC2626;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 700;
            display: inline-block;
        }

        .badge-dispen {
            background: #FAF5FF;
            color: #7E22CE;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 700;
            display: inline-block;
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

        /* FOOTER BUTTONS DI DALAM KARTU */
        .action-buttons {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 14px;
            margin-top: 10px;
        }

        .btn-batal {
            background: transparent;
            border: none;
            padding: 10px 18px;
            font-weight: 600;
            font-size: 13px;
            color: var(--text-muted);
            cursor: pointer;
            text-decoration: none;
        }

        .btn-batal:hover {
            color: var(--text-dark);
        }

        .btn-live-foto {
            background: var(--dark-green);
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background 0.2s;
        }

        .btn-live-foto:hover {
            background: #264740;
        }

        .btn-simpan {
            background: var(--dark-green);
            color: #fff;
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background 0.2s;
        }

        .btn-simpan:hover { 
            background: #264740; 
        }

        /* UTILITY CLASS UNTUK LOGIKA DISPLAY */
        .d-none { display: none !important; }

        /* MEDIA QUERIES */
        @media (max-width: 768px) {
            body { flex-direction: column; overflow-y: auto; }
            .mobile-header { display: flex; }
            .sidebar {
                position: fixed; top: 0; left: -260px; height: 100vh; width: 240px;
            }
            .sidebar.active { left: 0; }
            .sidebar-overlay.active { display: block; }
            .main-content { padding: 20px 16px; }
            .info-jadwal-grid { grid-template-columns: 1fr; }
            .grid-2 { grid-template-columns: 1fr; }
            .absen-filter { flex-direction: column; align-items: stretch; }
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
    <aside class="sidebar" id="sidebar">
        <div>
            <div class="logo-container">
                <img src="{{ asset('image/logo.png') }}" alt="Logo Jurnal Absensi">
                <span class="logo-title">Jurnal Absensi</span>
            </div>

            <nav class="nav-menu">
                <a href="{{ url('/sekre/dashboard') }}" class="nav-item">
                    <i class="fa-solid fa-house"></i>
                    <span>Home</span>
                </a>
                <a href="{{ url('/sekre/jadwal') }}" class="nav-item">
                    <i class="fa-regular fa-calendar-days"></i>
                    <span>Jadwal</span>
                </a>
                <a href="{{ url('/sekre/jurnal') }}" class="nav-item active">
                    <i class="fa-solid fa-book"></i>
                    <span>Jurnal</span>
                </a>
                <a href="{{ url('/sekre/status-validasi') }}" class="nav-item">
                    <i class="fa-regular fa-file-lines"></i>
                    <span>Status Validasi</span>
                </a>
            </nav>
        </div>

        <div class="sidebar-footer">
            <a href="{{ route('profile') }}" class="btn-sidebar">
                <i class="fa-regular fa-user"></i>
                <span>Profile</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-sidebar" style="width: 100%;">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <!-- HEADER -->
        <header class="header">
            <div>
                <h1>Jurnal Mengajar</h1>
                <p>Lengkapi data jurnal sesi mengajar saat ini</p>
            </div>
            <div class="header-meta">
                <i class="fa-regular fa-bell"></i>
                <div>
                    <div id="live-date">Selasa, 21 Juli 2026</div>
                    <div id="live-clock" style="text-align: right; font-weight: 700;">08.00 WIB</div>
                </div>
            </div>
        </header>

        <!-- KETERANGAN KEHADIRAN GURU -->
        <div class="select-status-box">
            <label for="statusKehadiran">Keterangan</label>
            <select id="statusKehadiran" class="select-custom" onchange="handleStatusChange()">
                <option value="hadir" selected>hadir</option>
                <option value="tidak_hadir_tugas">tidak hadir (ada tugas)</option>
                <option value="tidak_hadir_tanpa_tugas">tidak hadir (tanpa tugas)</option>
            </select>
        </div>

        <!-- 3 CARDS JADWAL (KELAS, MAPEL, JAM KE-) -->
        <div class="info-jadwal-grid">
            <div class="info-card-group">
                <span class="info-card-label">
                    <i class="fa-solid fa-users"></i> Kelas
                </span>
                <div class="info-card">
                    <h4>XI RPL 2</h4>
                    <i class="fa-regular fa-pen-to-square btn-action-icon" title="Edit Kelas"></i>
                </div>
            </div>

            <div class="info-card-group">
                <span class="info-card-label">
                    <i class="fa-solid fa-book-open"></i> Mata Pelajaran
                </span>
                <div class="info-card">
                    <h4>Matematika</h4>
                    <i class="fa-regular fa-pen-to-square btn-action-icon" title="Edit Mata Pelajaran"></i>
                </div>
            </div>

            <div class="info-card-group">
                <span class="info-card-label">
                    <i class="fa-regular fa-clock"></i> Jam Ke-
                </span>
                <div class="info-card">
                    <div>
                        <h4>Jam 5 - 9</h4>
                        <div class="sub-jam">09:40 - 13:00</div>
                    </div>
                    <i class="fa-regular fa-pen-to-square btn-action-icon" title="Edit Jam"></i>
                </div>
            </div>
        </div>

        <div class="info-jadwal-desc">
            <i class="fa-solid fa-circle-info"></i>
            <span>Data di atas terisi otomatis berdasarkan jadwal mengajar Anda saat ini.</span>
        </div>

        <!-- SECTION 1: HADIR (MATERI & AKTIVITAS) -->
        <div id="sectionHadir" class="form-card">
            <div class="form-card-header">
                <h3><i class="fa-regular fa-pen-to-square"></i> Detail Kegiatan</h3>
            </div>
            <div class="grid-2">
                <div class="form-group">
                    <label>Materi Pembelajaran <span class="req">*</span></label>
                    <textarea id="materiPembelajaran" placeholder="Contoh: Fungsi Linear, Fungsi Kuadrat..."></textarea>
                </div>
                <div class="form-group">
                    <label>Keterangan / Aktivitas Kelas</label>
                    <textarea id="keteranganAktivitas" placeholder="Catatan kegiatan..."></textarea>
                    
                    <!-- QUICK TAGS PILLS SESUAI FIGMA -->
                    <div class="activity-tags">
                        <span class="tag-pill active" onclick="toggleTag(this, 'Penjelasan')">Penjelasan</span>
                        <span class="tag-pill" onclick="toggleTag(this, 'Diskusi Kelompok')">Diskusi Kelompok</span>
                        <span class="tag-pill" onclick="toggleTag(this, 'Latihan Soal')">Latihan Soal</span>
                        <span class="tag-pill" onclick="toggleTag(this, 'Ulangan Harian')">Ulangan Harian</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 2: TUGAS (HANYA MUNCUL JIKA TIDAK HADIR + ADA TUGAS) -->
        <div id="sectionTugas" class="form-card d-none">
            <div class="form-card-header">
                <h3><i class="fa-solid fa-list-check"></i> Detail Tugas untuk Siswa</h3>
            </div>
            <div class="alert-info-box alert-sekre">
                <i class="fa-solid fa-circle-info"></i>
                <div>Tugas ini akan otomatis dikirimkan ke <b>Sekretaris Kelas (Sekre)</b> untuk diumumkan di kelas.</div>
            </div>
            <div class="form-group">
                <label>Instruksi / Deskripsi Tugas <span class="req">*</span></label>
                <textarea style="height: 120px;" placeholder="Tuliskan instruksi tugas secara jelas, batas waktu, dan cara pengumpulan..."></textarea>
            </div>
        </div>

        <!-- SECTION 3: TANPA TUGAS (MUNCUL JIKA TIDAK HADIR + TANPA TUGAS) -->
        <div id="sectionTanpaTugas" class="form-card d-none">
            <div class="form-card-header">
                <h3><i class="fa-solid fa-building-user"></i> Penanganan Kelas Kosong</h3>
            </div>
            <div class="alert-info-box alert-piket">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <div>Laporan ini akan langsung diteruskan ke <b>Guru Piket</b> agar kelas dapat didampingi/diisi.</div>
            </div>
            <div class="form-group">
                <label>Alasan / Catatan Tambahan (Opsional)</label>
                <textarea placeholder="Contoh: Sedang mendampingi lomba / Sakit mendadak..."></textarea>
            </div>
        </div>

        <!-- SECTION 4: ABSENSI SISWA -->
        <div id="sectionAbsensiSiswa" class="form-card">
            <div class="form-card-header">
                <h3><i class="fa-solid fa-users"></i> Daftar Siswa Tidak Hadir</h3>
                <div class="card-stats-badges">
                    <span class="stat-badge">
                        <span class="dot-total"></span> Total: <strong id="statTotal">36</strong>
                    </span>
                    <span class="stat-badge">
                        <span class="dot-absen"></span> Absen: <strong id="statAbsen">1</strong>
                    </span>
                </div>
            </div>
            
            <div class="absen-filter">
                <div class="absen-input-col col-search">
                    <label>Cari Nama Siswa</label>
                    <div class="search-box-wrap">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" id="inputNamaSiswa" class="input-search" placeholder="Ketik nama..." list="listSiswaKelas">
                        <datalist id="listSiswaKelas">
                            <option value="Roy Kiyoshi"></option>
                            <option value="Ahmad Fauzi"></option>
                            <option value="Budi Setiawan"></option>
                            <option value="Citra Kirana"></option>
                            <option value="Dewi Lestari"></option>
                            <option value="Fajar Nugraha"></option>
                            <option value="Rafi Arkhan"></option>
                        </datalist>
                    </div>
                </div>

                <div class="absen-input-col col-status">
                    <label>Keterangan</label>
                    <select id="selectStatusSiswa" class="select-status-absen">
                        <option value="Sakit" selected>Sakit (S)</option>
                        <option value="Izin">Izin (I)</option>
                        <option value="Alpha">Alpha (A)</option>
                        <option value="Dispen">Dispen (D)</option>
                    </select>
                </div>

                <button type="button" class="btn-add" onclick="tambahSiswaAbsen()">+ Tambah</button>
            </div>

            <table class="table-absen">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Nama Siswa</th>
                        <th style="width: 140px;">Keterangan</th>
                        <th style="width: 60px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBodyAbsen">
                    <tr>
                        <td>1</td>
                        <td><b>Roy Kiyoshi</b></td>
                        <td><span class="badge-sakit">Sakit</span></td>
                        <td style="text-align: center;">
                            <i class="fa-regular fa-trash-can" style="color: #9AAEA7; cursor: pointer;" onclick="hapusSiswa(this)" title="Hapus"></i>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- ACTION BUTTONS SESUAI FIGMA -->
            <div class="action-buttons">
                <button type="button" class="btn-batal" onclick="window.history.back()">Batal</button>
                <input type="file" id="fileFotoKelas" accept="image/*" style="display: none;" onchange="handleFotoUpload(this)">
                <button type="button" id="btnLiveFoto" class="btn-live-foto" onclick="document.getElementById('fileFotoKelas').click()">
                    <i class="fa-solid fa-camera"></i> <span id="labelLiveFoto">Live Foto</span>
                </button>
                <button type="button" id="btnSubmit" class="btn-simpan" onclick="simpanJurnal()">
                    <span id="textBtnSimpan">Simpan Jurnal</span>
                </button>
            </div>
        </div>

    </main>

    <script>
        
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        if (hamburgerBtn) {
            hamburgerBtn.addEventListener('click', () => {
                sidebar.classList.add('active');
                sidebarOverlay.classList.add('active');
            });
        }

        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', () => {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
            });
        }

        
        function updateLiveClock() {
            const now = new Date();
            const dateOptions = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
            const dateIndo = now.toLocaleDateString('id-ID', dateOptions);
            const jam = String(now.getHours()).padStart(2, '0');
            const menit = String(now.getMinutes()).padStart(2, '0');

            const dateEl = document.getElementById('live-date');
            const clockEl = document.getElementById('live-clock');
            if (dateEl) dateEl.textContent = dateIndo;
            if (clockEl) clockEl.textContent = `${jam}.${menit} WIB`;
        }
        updateLiveClock();
        setInterval(updateLiveClock, 1000);

        
        function toggleTag(tagElem, tagName) {
            tagElem.classList.toggle('active');
            const textarea = document.getElementById('keteranganAktivitas');
            let text = textarea.value.trim();

            if (tagElem.classList.contains('active')) {
                if (text.length > 0 && !text.includes(tagName)) {
                    textarea.value = text + ', ' + tagName;
                } else if (!text.includes(tagName)) {
                    textarea.value = tagName;
                }
            } else {
                const regex = new RegExp(`(^|,\\s*)${tagName}`, 'g');
                textarea.value = text.replace(regex, '').replace(/^,\s*/, '').trim();
            }
        }

        
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
                sectionAbsensiSiswa.classList.remove('d-none');
                sectionTugas.classList.remove('d-none');
                sectionTanpaTugas.classList.add('d-none');
                
                btnLiveFoto.classList.add('d-none');
                textBtnSimpan.innerText = 'Kirim Tugas ke Sekre';

            } else if (status === 'tidak_hadir_tanpa_tugas') {
                sectionHadir.classList.add('d-none');
                sectionAbsensiSiswa.classList.remove('d-none');
                sectionTugas.classList.add('d-none');
                sectionTanpaTugas.classList.remove('d-none');
                
                btnLiveFoto.classList.add('d-none');
                textBtnSimpan.innerText = 'Lapor ke Guru Piket';
            }
        }

        
        function updateAbsenCount() {
            const rows = document.querySelectorAll('#tableBodyAbsen tr');
            rows.forEach((row, i) => {
                row.cells[0].textContent = i + 1;
            });
            document.getElementById('statAbsen').textContent = rows.length;
        }

        function tambahSiswaAbsen() {
            const input = document.getElementById('inputNamaSiswa');
            const select = document.getElementById('selectStatusSiswa');
            const nama = input.value.trim();
            const status = select.value;

            if (!nama) {
                alert('Silakan ketik atau pilih nama siswa!');
                input.focus();
                return;
            }

            let badgeClass = 'badge-sakit';
            if (status === 'Izin') badgeClass = 'badge-izin';
            else if (status === 'Alpha') badgeClass = 'badge-alpha';
            else if (status === 'Dispen') badgeClass = 'badge-dispen';

            const tbody = document.getElementById('tableBodyAbsen');
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>1</td>
                <td><b>${nama}</b></td>
                <td><span class="${badgeClass}">${status}</span></td>
                <td style="text-align: center;">
                    <i class="fa-regular fa-trash-can" style="color: #9AAEA7; cursor: pointer;" onclick="hapusSiswa(this)" title="Hapus"></i>
                </td>
            `;
            tbody.appendChild(tr);
            updateAbsenCount();

            input.value = '';
            input.focus();
        }

        function hapusSiswa(icon) {
            icon.closest('tr').remove();
            updateAbsenCount();
        }

        
        function handleFotoUpload(input) {
            if (input.files && input.files[0]) {
                const name = input.files[0].name;
                const label = document.getElementById('labelLiveFoto');
                label.textContent = name.length > 14 ? name.substring(0, 11) + '...' : name;
                alert('Foto berhasil dipilih: ' + name);
            }
        }

        // SIMPAN JURNAL
        function simpanJurnal() {
            const status = document.getElementById('statusKehadiran').value;
            const materi = document.getElementById('materiPembelajaran').value.trim();

            if (status === 'hadir' && !materi) {
                alert('Materi Pembelajaran wajib diisi!');
                document.getElementById('materiPembelajaran').focus();
                return;
            }

            alert('Jurnal berhasil disimpan!');
            window.location.href = "{{ url('/sekre/dashboard') }}";
        }
    </script>
</body>
</html>
