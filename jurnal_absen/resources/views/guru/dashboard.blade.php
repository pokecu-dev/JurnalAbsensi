<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru - Jurnal Absensi</title>
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

        /* BANNER JADWAL BERIKUTNYA */
        .banner-jadwal {
            background-color: var(--card-dark);
            color: #fff;
            border-radius: 18px;
            padding: 22px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            box-shadow: 0 6px 16px rgba(26, 49, 44, 0.15);
        }

        .banner-tag {
            font-size: 12px;
            color: #A5B5B0;
            margin-bottom: 6px;
        }

        .banner-info h2 {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .banner-info p {
            font-size: 13px;
            color: #A5B5B0;
            margin-top: 2px;
        }

        .banner-detail {
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            font-weight: 600;
            color: #E2ECE8;
        }

        .btn-jurnal {
            background-color: var(--primary-accent);
            color: var(--text-dark);
            border: none;
            padding: 10px 22px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: transform 0.2s, background 0.2s;
        }

        .btn-jurnal:hover {
            background-color: #A5E4CA;
            transform: translateY(-1px);
        }

        /* RINGKASAN CARDS */
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, 220px);
            gap: 20px;
            margin-bottom: 24px;
            justify-content: space-evenly;
        }

        .card {
            background: #ffffff;
            border-radius: 12px;
            padding: 10px 16px; 
            display: flex;
            align-items: center;
            justify-content: flex-start; 
            gap: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            height: 72px; 
        }

        .card-icon {
            width: 38px;  
            height: 38px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .card-1 .card-icon { background-color: #EBF4F0; color: var(--dark-green); }
        .card-2 .card-icon { background-color: #00E676; color: #fff; border-radius: 50%; }
        .card-3 .card-icon { background-color: #FF3D00; color: #fff; border-radius: 50%; }

        .card-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card-title {
            font-size: 11px;
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.1;
        }

        .card-number {
            font-size: 18px;
            font-weight: 800;
            color: var(--text-dark);
            line-height: 1.1;
            margin: 2px 0;
        }

        .card-sub {
            font-size: 10px;
            color: var(--text-muted);
            font-weight: 500;
            line-height: 1;
        }

        /* STATUS VALIDASI SECTION */
        .validation-section {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
        }

        .validation-section h3 {
            font-size: 15px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        /* KOTAK PUTIH DALAM (PEMBUNGKUS TABEL) */
        .table-card-wrapper {
            background-color: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(230, 230, 230, 0.8);
            border-radius: 16px;
            padding: 16px 14px 16px 20px;

            max-height: 250px;       /* Dibuat lebih ringkas agar pas */
            overflow-y: scroll;     /* Memaksa scrollbar selalu muncul */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        /* CUSTOM SCROLLBAR (Membuat Garis Pendek dan Selalu Tampil) */
        .table-card-wrapper::-webkit-scrollbar {
            width: 5px; /* Lebar garis dibuat pendek dan ramping */
        }

        .table-card-wrapper::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05); /* Landasan track lembut */
            border-radius: 10px;
            margin: 12px 0; /* Memberikan jarak atas-bawah agar garis terlihat pendek & menggantung estetik */
        }

        .table-card-wrapper::-webkit-scrollbar-thumb {
            background: var(--medium-green); /* Garis berwarna hijau medium */
            border-radius: 10px;
        }

        .table-card-wrapper::-webkit-scrollbar-thumb:hover {
            background: var(--dark-green);
        }

        .validation-table {
            width: 100%;
            border-collapse: collapse;
        }

        .validation-table th {
            text-align: left;
            font-size: 11px;
            color: #888888;
            padding-bottom: 16px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .validation-table td {
            padding: 14px 0;
            font-size: 12px;
            color: #444444;
        }

        .icon-check {
            color: #00C853;
            font-size: 18px;
        }

        .icon-pending {
            color: #FF9100;
            font-size: 18px;
        }

        .status-tervalidasi {
            color: #00C853;
            font-weight: 700;
        }

        .status-menunggu {
            color: #FF9100;
            font-weight: 700;
        }

        .btn-view-all {
            width: 100%;
            max-width: 450px;
            display: block;
            margin: 0 auto;
            padding: 12px;
            background-color: var(--primary-accent);
            border: none;
            border-radius: 25px;
            color: var(--text-dark);
            font-weight: 700;
            font-size: 13px;
            cursor: pointer;
            transition: background 0.2s;
        }

        

        
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div>
            <div class="logo-container">
                <img src="{{ asset('image/logo.png') }}" alt="Logo Jurnal Absensi">
                <span class="logo-title">Jurnal Absensi</span>
            </div>

            <nav class="nav-menu">
                <a href="#" class="nav-item active"><i class="fa-solid fa-house"></i> Home</a>
                <a href="#" class="nav-item"><i class="fa-regular fa-calendar-days"></i> Jadwal</a>
                <a href="#" class="nav-item"><i class="fa-solid fa-book"></i> Jurnal</a>
                <a href="#" class="nav-item"><i class="fa-regular fa-file-lines"></i> Status Validasi</a>
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
                <h1>Selamat Datang, pak Agus</h1>
                <p>Semangat mengajar hari ini!</p>
            </div>
            <div class="header-meta">
                <i class="fa-regular fa-bell"></i>
                <div>
                    <div>Selasa, 21 Juli 2026</div>
                    <div style="text-align: right; font-weight: 700;">08.00 WIB</div>
                </div>
            </div>
        </header>

        <!-- BANNER JADWAL BERIKUTNYA -->
        <section class="banner-jadwal">
            <div>
                <div class="banner-tag">Jadwal Berikutnya:</div>
                <div class="banner-info">
                    <h2>MATEMATIKA</h2>
                    <p>XI DKV 2</p>
                </div>
            </div>
            <div class="banner-detail">
                <div>
                    <div class="detail-item"><i class="fa-regular fa-clock"></i> 13.00 - 13.40</div>
                    <div class="detail-item" style="margin-top: 6px;"><i class="fa-solid fa-location-dot"></i> RUANG 18</div>
                </div>
                <button class="btn-jurnal">Isi Jurnal <i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </section>

        <!-- CARDS RINGKASAN -->
        <section class="summary-grid">
            <div class="card card-1">
                <div class="card-icon"><i class="fa-regular fa-calendar"></i></div>
                <div class="card-info">
                    <span class="card-title">Jadwal Hari Ini</span>
                    <h3 class="card-number">4</h3>
                    <span class="card-sub">Jam Pelajaran</span>
                </div>
            </div>

            <div class="card card-2">
                <div class="card-icon"><i class="fa-solid fa-check"></i></div>
                <div class="card-info">
                    <span class="card-title">Jurnal Selesai</span>
                    <h3 class="card-number">2</h3>
                    <span class="card-sub">Sudah Diisi</span>
                </div>
            </div>

            <div class="card card-3">
                <div class="card-icon">!</div>
                <div class="card-info">
                    <span class="card-title">Belum Diisi</span>
                    <h3 class="card-number">2</h3>
                    <span class="card-sub">Jam Pelajaran</span>
                </div>
            </div>
        </section>

        <!-- STATUS VALIDASI TABLE -->
        <section class="validation-section">
            <h3>Status Validasi</h3>
            
            <div class="table-card-wrapper">
                <table class="validation-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>MATA PELAJARAN</th>
                            <th>KELAS</th>
                            <th>JAM PEMBELAJARAN</th>
                            <th>STATUS</th>
                            <th>KETERANGAN</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><i class="fa-regular fa-circle-check icon-check"></i></td>
                            <td><b>MATEMATIKA</b></td>
                            <td>XI PPLG 1</td>
                            <td>09.00-09.40</td>
                            <td><span class="status-tervalidasi">Tervalidasi</span></td>
                            <td>21 Juli 2026, 08:40</td>
                        </tr>
                        <tr>
                            <td><i class="fa-regular fa-clock icon-pending"></i></td>
                            <td><b>MATEMATIKA</b></td>
                            <td>XI TKJ 2</td>
                            <td>10.00-10.40</td>
                            <td><span class="status-menunggu">Menunggu Validasi</span></td>
                            <td>21 Juli 2026, 09:30</td>
                        </tr>
                        <tr>
                            <td><i class="fa-regular fa-circle-check icon-check"></i></td>
                            <td><b>MATEMATIKA</b></td>
                            <td>XI TKI 2</td>
                            <td>11.00-11.40</td>
                            <td><span class="status-tervalidasi">Tervalidasi</span></td>
                            <td>21 Juli 2026, 09:30</td>
                        </tr>

                        <tr>
                            <td><i class="fa-regular fa-circle-check icon-check"></i></td>
                            <td><b>MATEMATIKA</b></td>
                            <td>XI TKI 2</td>
                            <td>11.00-11.40</td>
                            <td><span class="status-tervalidasi">Tervalidasi</span></td>
                            <td>21 Juli 2026, 09:30</td>
                        </tr>

                        <tr>
                            <td><i class="fa-regular fa-clock icon-pending"></i></td>
                            <td><b>MATEMATIKA</b></td>
                            <td>XI TKJ 2</td>
                            <td>10.00-10.40</td>
                            <td><span class="status-menunggu">Menunggu Validasi</span></td>
                            <td>21 Juli 2026, 09:30</td>
                        </tr>

                        <tr>
                            <td><i class="fa-regular fa-clock icon-pending"></i></td>
                            <td><b>MATEMATIKA</b></td>
                            <td>XI TKJ 2</td>
                            <td>10.00-10.40</td>
                            <td><span class="status-menunggu">Menunggu Validasi</span></td>
                            <td>21 Juli 2026, 09:30</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </section>

    </main>

</body>
</html>