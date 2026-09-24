<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Mengajar - Jurnal Absensi</title>
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
            text-decoration: none;
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

        
        .jadwal-section {
            margin-bottom: 32px;
        }

        .jadwal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .jadwal-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .jadwal-date {
            font-size: 12px;
            color: var(--text-muted);
        }

        .schedule-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
            margin-bottom: 16px;
        }

        .schedule-card .schedule-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .schedule-time {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-muted);
            font-size: 13px;
        }

        .schedule-time i {
            font-size: 16px;
            color: var(--medium-green);
        }

        .status-tag {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-selesai {
            background-color: rgba(137, 215, 183, 0.2);
            color: #2D6A4F;
        }

        .status-berlangsung {
            background-color: rgba(137, 215, 183, 0.3);
            color: #1A312C;
        }

        .status-mendatang {
            background-color: rgba(244, 236, 225, 0.5);
            color: var(--text-muted);
        }

        .schedule-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .schedule-info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-muted);
            font-size: 13px;
        }

        .schedule-info-item i {
            font-size: 14px;
            color: var(--medium-green);
        }

        .schedule-info-item strong {
            color: var(--text-dark);
            margin-left: 4px;
        }

        .schedule-subject {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <aside class="sidebar">
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
                <a href="{{ url('/sekre/jadwal') }}" class="nav-item active">
                    <i class="fa-regular fa-calendar-days"></i>
                    <span>Jadwal</span>
                </a>
                <a href="{{ url('/sekre/jurnal') }}" class="nav-item">
                    <i class="fa-solid fa-book-open"></i>
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
                <span>Profil</span>
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

    <main class="main-content">
        <header class="header">
            <div>
                <h1>Jadwal Mengajar</h1>
                <p>Semester Ganjil 2026-2027</p>
            </div>
            <div class="header-meta">
                <button class="btn-notif" type="button" title="pemberitahuan">
                    <i class="fa-regular fa-bell"></i>
                    <span class="notif-badge"></span>
                </button>
                <div>
                    <span id="live-date">Selasa, 21 Juli 2026</span>
                    <span id="live-clock" style="margin-left: 8px;">08.00 WIB</span>
                </div>
            </div>
        </header>

        <script>
            function updateLiveTIME() {
                const now = new Date();
                const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
                const dateIndo = now.toLocaleDateString('id-ID', options);
                const jam = String(now.getHours()).padStart(2, '0');
                const menit = String(now.getMinutes()).padStart(2, '0');
                const detik = String(now.getSeconds()).padStart(2, '0');
                document.getElementById('live-date').textContent = dateIndo;
                document.getElementById('live-clock').textContent = `${jam}.${menit}.${detik} WIB`;
            }
            updateLiveTIME();
            setInterval(updateLiveTIME, 1000);
        </script>

        <div class="jadwal-section">
            <div class="jadwal-header">
                <span class="jadwal-title">Senin</span>
                <span class="jadwal-date">17 Agustus 2026</span>
            </div>

            <div class="schedule-card">
                <div class="schedule-header">
                    <div class="schedule-time">
                        <i class="fa-regular fa-clock"></i>
                        <span>07.00 - 09.40</span>
                    </div>
                    <span class="status-tag status-selesai">SELESAI</span>
                </div>
                <div class="schedule-subject">Matematika</div>
                <div class="schedule-info">
                    <div class="schedule-info-item">
                        <i class="fa-regular fa-user"></i>
                        <span>Kelas: <strong>XI RPL 2</strong></span>
                    </div>
                    <div class="schedule-info-item">
                        <i class="fa-regular fa-door-open"></i>
                        <span>Ruang: <strong>R 58</strong></span>
                    </div>
                </div>
            </div>

            <div class="schedule-card">
                <div class="schedule-header">
                    <div class="schedule-time">
                        <i class="fa-regular fa-clock"></i>
                        <span>10.00 - 12.40</span>
                    </div>
                    <span class="status-tag status-selesai">SELESAI</span>
                </div>
                <div class="schedule-subject">Matematika</div>
                <div class="schedule-info">
                    <div class="schedule-info-item">
                        <i class="fa-regular fa-user"></i>
                        <span>Kelas: <strong>XII TKJ 1</strong></span>
                    </div>
                    <div class="schedule-info-item">
                        <i class="fa-regular fa-door-open"></i>
                        <span>Ruang: <strong>R 12</strong></span>
                    </div>
                </div>
            </div>

            <div class="schedule-card">
                <div class="schedule-header">
                    <div class="schedule-time">
                        <i class="fa-regular fa-clock"></i>
                        <span>10.00 - 12.40</span>
                    </div>
                    <span class="status-tag status-selesai">SELESAI</span>
                </div>
                <div class="schedule-subject">Matematika</div>
                <div class="schedule-info">
                    <div class="schedule-info-item">
                        <i class="fa-regular fa-user"></i>
                        <span>Kelas: <strong>XII TKJ 1</strong></span>
                    </div>
                    <div class="schedule-info-item">
                        <i class="fa-regular fa-door-open"></i>
                        <span>Ruang: <strong>R 12</strong></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="jadwal-section">
            <div class="jadwal-header">
                <span class="jadwal-title">Selasa</span>
                <span class="jadwal-date">18 Agustus 2026</span>
            </div>

            <div class="schedule-card">
                <div class="schedule-header">
                    <div class="schedule-time">
                        <i class="fa-regular fa-clock"></i>
                        <span>07.00 - 09.40</span>
                    </div>
                    <span class="status-tag status-berlangsung">BERLANGSUNG</span>
                </div>
                <div class="schedule-subject">Matematika</div>
                <div class="schedule-info">
                    <div class="schedule-info-item">
                        <i class="fa-regular fa-user"></i>
                        <span>Kelas: <strong>XI DKV 2</strong></span>
                    </div>
                    <div class="schedule-info-item">
                        <i class="fa-regular fa-door-open"></i>
                        <span>Ruang: <strong>R 42</strong></span>
                    </div>
                </div>
            </div>

            <div class="schedule-card">
                <div class="schedule-header">
                    <div class="schedule-time">
                        <i class="fa-regular fa-clock"></i>
                        <span>10.00 - 12.40</span>
                    </div>
                    <span class="status-tag status-mendatang">MENDATANG</span>
                </div>
                <div class="schedule-subject">Matematika</div>
                <div class="schedule-info">
                    <div class="schedule-info-item">
                        <i class="fa-regular fa-user"></i>
                        <span>Kelas: <strong>X PPLG 1</strong></span>
                    </div>
                    <div class="schedule-info-item">
                        <i class="fa-regular fa-door-open"></i>
                        <span>Ruang: <strong>Lab. RPL 1</strong></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="jadwal-section">
            <div class="jadwal-header">
                <span class="jadwal-title">Kamis</span>
                <span class="jadwal-date">20 Agustus 2026</span>
            </div>

            <div class="schedule-card">
                <div class="schedule-header">
                    <div class="schedule-time">
                        <i class="fa-regular fa-clock"></i>
                        <span>07.00 - 08.40</span>
                    </div>
                    <span class="status-tag status-mendatang">MENDATANG</span>
                </div>
                <div class="schedule-subject">Matematika</div>
                <div class="schedule-info">
                    <div class="schedule-info-item">
                        <i class="fa-regular fa-user"></i>
                        <span>Kelas: <strong>XI RPL 1</strong></span>
                    </div>
                    <div class="schedule-info-item">
                        <i class="fa-regular fa-door-open"></i>
                        <span>Ruang: <strong>R 57</strong></span>
                    </div>
                </div>
            </div>

            <div class="schedule-card">
                <div class="schedule-header">
                    <div class="schedule-time">
                        <i class="fa-regular fa-clock"></i>
                        <span>10.00 - 12.40</span>
                    </div>
                    <span class="status-tag status-mendatang">MENDATANG</span>
                </div>
                <div class="schedule-subject">Matematika</div>
                <div class="schedule-info">
                    <div class="schedule-info-item">
                        <i class="fa-regular fa-user"></i>
                        <span>Kelas: <strong>XII RPL 2</strong></span>
                    </div>
                    <div class="schedule-info-item">
                        <i class="fa-regular fa-door-open"></i>
                        <span>Ruang: <strong>R 58</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
