<!DOCTYPE html>                                                                                                                                                                                            
    <html lang="id">                                                                                                                                                                                           
    <head>                                                                                                                                                                                                     
        <meta charset="UTF-8">                                                                                                                                                                                 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">                                                                                                                                 
        <title>Dashboard Sekretaris</title>                                                                                                                                                                    
                                                                                                                                                                                                               
                                                                                                                                                                            
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
                                                                                                                                                               
            :root {                                                                                                                                                                                            
                --bg-sidebar: #1A312C;                                                                                                                                           
                --bg-body: #F4ECE1;                                                                                                                                  
                --accent-mint: #89D7B7;                                                                                                                                 
                --menu-active: #24423B;                                                                                                                                  
                --text-white: #FFFFFF;                                                                                                                                                                         
                --text-dark: #1E292B;                                                                                                                                                                          
            }                                                                                                                                                                                                  
                                                                                                                                                                                                               
                                                                                                                                                                                          
            * {                                                                                                                                                                                                
                margin: 0;                                                                                                                                                                                     
                padding: 0;                                                                                                                                                                                    
                box-sizing: border-box;                                                                                                                                                                        
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;                                                                                                                                  
            }                                                                                                                                                                                                  
                                                                                                                                                                                                               
            body {                                                                                                                                                                                             
                background-color: var(--bg-body);                                                                                                                                                              
            }                                                                                                                                                                                                  
                                                                                                                                                                                                               
                                                                                                                                                         
            .dasboard-layout {                                                                                                                                                                                 
                display: flex;                                                                                                                                                                                 
                min-height: 100vh;                                                                                                                                                                             
            }                                                                                                                                                                                                  
            .sidebar {                                                                                                                                                                                     
                    width: 200px;                                                                                                                                                                              
                    min-width: 200px;                                                                                                                                                                          
                    background-color: var(--bg-sidebar);                                                                                                                                                       
                    display: flex;                                                                                                                                                                             
                    flex-direction: column;                                                                                                                                                                    
                    justify-content: space-between;                                                                                                                                                            
                    padding: 24px 16px;                                                                                                                                                                        
                    color: #fff;                                                                                                                                                                               
                    position: sticky;                                                                                                                                                                          
                    top: 0;                                                                                                                                                                                    
                    height: 100vh;                                                                                                                                                                             
                    flex-shrink: 0;                                                                                                                                                                            
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
                    color: var(--accent-mint);                                                                                                                                                                 
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
                                                                                                                                                                        
            .main-content {
                flex: 1;
                padding: 30px 45px;
                overflow-y: auto;
            }
            .top-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding-bottom: 22px;
                border-bottom: 1.5px solid #E5DCCE;
                margin-bottom: 28px;
            }
            .welcome-title {
                font-size: 26px;                                                                                                                                                                                       
        font-weight: 700;                                                                                                                                                                                      
        color: var(--text-dark);
            }
            .welcome-subtitle {
                    font-size: 13px;
                    color: #7A8985;
                    margin-top: 4px;
            }
            .header-right {
                    display: flex;
                    align-items: center;
                    gap: 20px;
                }
                .btn-notif {
                    position: relative;
                    background: #FFFFFF;
                    border: 1px solid #DFD5C7;
                    width: 44px;
                    height: 44px;
                    border-radius: 12px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 18px;
                    color: var(--text-dark);
                    cursor: pointer;
                    transition: 0.2s;
}
                .btn-notif:hover {
                    transform: translateY(-2px);
                    border-color: var(--accent-mint);
                }
                .notif-badge {
                    position: absolute;
                    top: 9px;
                    right: 10px;
                    width: 8px;
                    height: 8px;
                    background-color: #EF4444;
                    border-radius: 50%;
                    border: 1.5px solid #FFFFFF;
                }
                .datetime-box {
                    display: flex;
                    flex-direction: column; 
                    text-align: right;      
                    gap: 3px;
                }
  
                .date-text {
                    font-size: 13px;
                    font-weight: 600;
                    color: var(--text-dark);
                }
                .time-text {
                    font-size: 12px;
                    color: #7A8985;
                    font-weight: 600;
                }
                .benner-card {
                background-color: var(--bg-sidebar);
                border-radius: 16px;
                padding: 18px 28px;
                margin-bottom: 28px;
                color: var(--text-white);
}

.benner-badge {
    display: inline-block;
    font-size: 11px;
    color: #A0BFB7;
    margin-bottom: 12px;
    text-transform: lowercase;
}

.benner-body {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.banner-col {
    flex: 1;
    padding-right: 20px;
    border-right: 1px solid #2E524A;
}

.banner-col:last-child {
    border-right: none;
    padding-right: 0;
}

.col-label {
    display: none; 
}

.col-title {
    font-size: 17px;
    font-weight: 700;
    color: #FFFFFF;
}

.col-desc {
    font-size: 12px;
    color: #8FBFB0;
    margin-top: 3px;
}

.col-time {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 15px;
    font-weight: 600;
    color: #FFFFFF;
}

.col-time i {
    color: var(--accent-mint);
    font-size: 16px;
}

.col-room {
    font-size: 12px;
    color: #8FBFB0;
    margin-top: 4px;
}

.col-guru {
    font-size: 15px;
    font-weight: 600;
    color: #FFFFFF;
}

.btn-detail-banner {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 22px;
    background-color: #2E524A;
    border: 1px solid #3D6B61;
    border-radius: 50px;
    color: var(--accent-mint);
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
    transition: 0.2s;
    white-space: nowrap;
}

.btn-detail-banner:hover {
    background-color: #3D6B61;
    color: #FFFFFF;
}
             .stats-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-bottom: 30px;
}
.stat-card {
    background-color: #FFFFFF;
    border: 1.5px solid #E5DCCE;
    border-radius: 14px;
    padding: 18px 20px;
    display: flex;
    align-items: center;
    gap: 14px;
    transition: 0.2s;
}
.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(0,0,0,0.06);
}
.stat-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
}
.stat-icon.blue    { background-color: #E0EDFF; color: #3B82F6; }
.stat-icon.yellow  { background-color: #FFF4D6; color: #F59E0B; }
.stat-icon.green   { background-color: #D9F5E8; color: #22C55E; }
.stat-icon.red     { background-color: #FFE0E0; color: #EF4444; }
.stat-info {
    display: flex;
    flex-direction: column;
}
.stat-label {
    font-size: 11px;
    color: #7A8985;
    font-weight: 500;
    margin-bottom: 2px;
}
.stat-value {
    font-size: 26px;
    font-weight: 700;
    color: var(--text-dark);
}
.bottom-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 22px;
    width: 100%;
}
.section-card {
    background-color: #FFFFFF;
    border: 1.5px solid #E5DCCE;
    border-radius: 16px;
    padding: 22px 24px;
    display: flex;
    flex-direction: column;
}
.section-card h3 {
    font-size: 17px;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 18px;
}
.validasi-list {
    display: flex;
    flex-direction: column; 
    gap: 14px;
    flex: 1;
}
.validasi-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 10px 0 ;
    border-bottom: 1px solid #EDE6DA;
}
.validasi-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}
.dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    flex-shrink: 0;
}
.dot.hijau   { background-color: #22C55E; }
.dot.kuning  { background-color: #F59E0B; }
.dot.merah   { background-color: #EF4444; }
.validasi-info {
    flex: 1;
}
.validasi-mapel {
    font-size: 14px;
    font-weight: 600;
    color: var(--text-dark);
}
.validasi-kelas {
    font-size: 11px;
    color: #7A8985;
    margin-top: 2px;
}
.validasi-status {
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
    min-width: 130px;
    text-align: right;
}
.validasi-status.tervalidasi       { color: #22C55E; }
.validasi-status.menunggu          { color: #F59E0B; }
.validasi-status.perlu-diperbaiki  { color: #EF4444; }
.validasi-tanggal {
    font-size: 11px;
    color: #7A8985;
    white-space: nowrap;
    text-align: right;
}
.btn-detail {
    padding: 6px 20px;
    border-radius: 50px;           
    background-color: #E2F2EB;    
    color: #386E5E;                 
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
    transition: 0.2s;
    display: inline-block;
    white-space: nowrap;
}

.btn-detail:hover {
    background-color: #C5EAD9;
    color: #1A312C;
}


.btn-lihat-semua {
    display: block;
    width: 100%;
    margin-top: 18px;
    padding: 12px;
    background-color: #CBEAD9;     
    color: #1A312C;                
    border: none;
    border-radius: 50px;           
    font-size: 13px;
    font-weight: 600;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    transition: 0.2s;
}

.btn-lihat-semua:hover {
    background-color: #b4e2ca;
}

/* Warna Khusus Kartu Perlu Validasi */
.card-perlu-validasi .validasi-mapel {
    color: #638A7E;                
    font-weight: 600;
}

.card-perlu-validasi .validasi-kelas {
    color: #8BAAA0;
}

.validasi-right {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    text-align: right;
    gap: 4px;
    flex-shrink: 0;
}

.validasi-tanggal {
    font-size: 11px;
    color: #7A8985;
    white-space: nowrap;
    text-align: right;
    min-width: 120px;
}
        </style>                                                                                                   
    </head>
    <body>
        <div class="dasboard-layout">
            <aside class="sidebar">
                <div>
                  <div class="logo-container">
                            <img src="{{ asset('image/logo.png') }}" alt="Logo Jurnal Absensi">
                            <span class="logo-title">Jurnal Absensi</span>
                        </div>
                <nav class="nav-menu">
                            <a href="{{ url('/sekre/dashboard') }}" class="nav-item active">
                                <i class="fa-solid fa-house"></i>
                                <span>Home</span>
                            </a>
                            <a href="{{ url('/sekre/jadwal') }}" class="nav-item">
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
            <main class="main-content">
                <header class="top-header"> 
                    <div class="header-left">
                        <h2 class="welcome-title">Selamat Datang, {{ Auth::user()->name ?? 'Sekretaris' }}</h2>
                        <p class="welcome-subtitle">Semangat menjalankan tugas jurnal hari ini!</p>
                    </div>
                    <div class="header-right">
                        <button class="btn-notif" type="button" title="pemberitahuan">
                        <i class="fa-regular fa-bell"></i>
                        <span class="notif-badge"></span>
                        </button>
                    <div class="datetime-box">
                        <span class="date-text" id="live-date">memuat tanggal....</span>
                        <span class="time-text" id="live-clock">00:00:00 WIB</span>
                    </div>
                    </div>
                </header>
                <div class="benner-card">
                    <span class="benner-badge">jurnal masuk yang belum divlidasi</span>
                    <div class="benner-body">
                        <div class="banner-col">
                            <span class="col-label">MATA PELAJARAN</span>
                            <h3 class="col-title">Matematika</h3>        
                            <p class="col-desc">XI DKV 2</p>    
                        </div>
                        <div class="banner-col">
                            <div class="col-time">
                                <i class="fa-regular fa-clock"></i>
                                <span>13.00 - 13.40</span>
                            </div>
                             <p class="col-room">RUANG 18</p>
                        </div>
                        <div class="banner-col">
                            <p class="col-guru">NAMA GURU</p>
                        </div>
                        <a href="{{ url('/sekre/jurnal') }}" class="btn-detail-banner">
                            detail<i class="fa-solid fa-arrow-right"></i>
                        </a>
    
                    </div>

                </div>
                <div class="stats-row">
                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <i class="fa-solid fa-table-cells"></i>
                        </div>
                        <div class="stat-info">
                            <span class="stat-label">total jurnal hari in</span>
                            <span class="stat-value">45</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon yelow">
                            <i class="fa-solid fa-hourglass-half"></i>
                        </div>
                        <div class="stat-info">
                            <span class="stat-label">belum di validasi</span>
                            <span class="stat-value">30</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon green">
                            <i class="fa-solid fa-circle-check"></i>
                    </div>

                 <div class="stat-info">
                     <span class="stat-label">jurnal tervalidasi</span>
                     <span class="stat-value">13</span>
                </div>
                </div>
                   <div class="stat-card">
                       <div class="stat-icon red">
                           <i class="fa-solid fa-circle-exclamation"></i> 
                       </div>
                       <div class="stat-info">
                           <span class="stat-label">jurnal di tolak</span>
                           <span class="stat-value">2</span>
                       </div>    
                  </div>
                </div>
                  <div class="bottom-row">
                    <div class="section-card">
                        <h3>Status Validasi</h3>
                        <div class="validasi-list">
                            <div class="validasi-item">
                                <span class="dot hijau"></span>
                                <div class="validasi-info">
                                    <span class="validasi-mapel">MATEMATIKA</span>
                                    <span class="validasi-kelas">XI PPLG 2 - Jam ke 1</span>
                                </div>
                                <span class="validasi-status tervalidasi">TERVALIDASI</span>
                                <span class="validasi-kelas">21 juli 2026, 08:20</span>
                            </div>
                            <div class="validasi-item">
                                <span class="dot hijau"></span>
                                <div class="validasi-info">
                                    <span class="validasi-mapel">MATEMATIKA</span>
                                    <span class="validasi-kelas">XI PPLG 1 - Jam ke 2</span>
                            </div>
                            <span class="validasi-status tervalidasi">TERVALIDASI</span>
                            <span class="validasi-kelas">21 juli 2026, 08:40</span>
                        </div>
                        <div class="validasi-item">
                            <span class="dot kuning"></span>
                            <div class="validasi-info">
                                <span class="validasi-mapel">MATEMATIKA</span>
                                <span class="validasi-kelas">XI TKJ 2 - Jam ke 4</span>                                                          
                        </div>
                        <span class="validasi-status menunggu">MENUNGGU</span>
                        <span class="validasi-kelas"> 21 juli 2026, 09:00</span>
                    </div>
                    <div class="validasi-item">
                        <span class="dot merah"></span>
                        <div class="validasi-info">
                            <span class="validasi-mapel">MATEMATIKA</span>
                            <span class="validasi-kelas">XI TKI 2 - Jam ke 5</span>
                        </div>
                        <span class="validasi-status perlu-diperbaiki">Perlu Diperbaiki</span>
                        <span class="validasi-kelas">21 juli 2026, 09:50</span>
                    </div>
                  </div>
                  <a href="#" class="btn-lihat-semua">LIhat Semua Status Validasi</a>
              </div>
              <div class="section-card card-perlu-validasi">
        <h3>Perlu Validasi</h3>
        <div class="validasi-list">
            <div class="validasi-item">
                <div class="validasi-info">
                    <span class="validasi-mapel">MATEMATIKA</span>
                    <span class="validasi-kelas">XI PPLG 2 - Jam ke 1</span>
                </div>
                <div class="validasi-right">
                <a href="#" class="btn-detail">Detail</a>
                <span class="validasi-tanggal">21 Juli 2026, 08:20</span>
                </div>
            </div>
            <div class="validasi-item">
                <div class="validasi-info">
                    <span class="validasi-mapel">MATEMATIKA</span>
                    <span class="validasi-kelas">XI PPLG 1 - Jam ke 8</span>
                </div>
                <div class="validasi-right">
                <a href="#" class="btn-detail">Detail</a>
                <span class="validasi-tanggal">21 Juli 2026, 08:40</span>
                </div>
            </div>
            <div class="validasi-item">
                <div class="validasi-info">
                    <span class="validasi-mapel">MATEMATIKA</span>
                    <span class="validasi-kelas">XI TKJ 2 - Jam ke 8</span>
                </div>
                <div class="validasi-right">
                <a href="#" class="btn-detail">Detail</a>
                <span class="validasi-tanggal">21 Juli 2026, 09:30</span>
                </div>
            </div>
            <div class="validasi-item">
                <div class="validasi-info">
                    <span class="validasi-mapel">MATEMATIKA</span>
                    <span class="validasi-kelas">XI TKI 2 - Jam ke 10</span>
                </div>
                <div class="validasi-right">
                <a href="#" class="btn-detail">Detail</a>
                <span class="validasi-tanggal">21 Juli 2026, 09:30</span>
                </div>
            </div>
        </div>
        <a href="#" class="btn-lihat-semua">Lihat Semua Antrean</a>
    </div>
</div> <!-- .bottom-row -->
            </main>
        </div> <!-- .dasboard-layout -->
           <script> 
                function updateLiveTIME() {
                    const now = new Date();
                    const opstions = { weekday: 'long',day: 'numeric',month: 'long',year: 'numeric' };
                    const dateIndo = now.toLocaleDateString('id-ID',opstions);
                    const jam = String(now.getHours()).padStart(2, '0');
                    const menit = String(now.getMinutes()).padStart(2, '0');
                    const detik = String(now.getSeconds()).padStart(2, '0');
                    document.getElementById('live-date').textContent = dateIndo;
                    document.getElementById('live-clock').textContent = `${jam}.${menit}.${detik} WIB`;

                } 
                updateLiveTIME();
                setInterval(updateLiveTIME, 1000);
            </script>

    </body>                                                                                                                                                                                                    
    </html>                                