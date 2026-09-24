<?php $active = $active ?? ''; ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jurnal - Jurnal Absensi</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    :root {
        --bg-sidebar: #1A312C;
        --bg-body: #F4ECE1;
        --accent-mint: #89D7B7;
        --menu-active: #24423B;
        --text-white: #FFFFFF;
        --text-dark: #1E292B;
        --muted: #7A8985;
        --border: #E5DCCE;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: var(--bg-body);
        color: var(--text-dark);
    }

    .dasboard-layout {
        display: flex;
        min-height: 100vh;
    }

    /* SIDEBAR */
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

    .nav-item:hover,
    .nav-item.active {
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

    /* MAIN CONTENT */
    .main-content {
        flex: 1;
        padding: 30px 45px;
        overflow-y: auto;
    }

    .top-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding-bottom: 22px;
        border-bottom: 1.5px solid var(--border);
        margin-bottom: 24px;
    }

    .welcome-title {
        font-size: 26px;
        font-weight: 700;
        color: var(--text-dark);
    }

    .welcome-subtitle {
        font-size: 13px;
        color: var(--muted);
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
        color: var(--muted);
        font-weight: 600;
    }

    /* FLASH MESSAGE */
    .flash {
        padding: 14px 18px;
        border-radius: 12px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .flash.success {
        background: #E8F5E9;
        color: #2E7D32;
        border: 1px solid #C8E6C9;
    }

    .flash.error {
        background: #FFEBEE;
        color: #C62828;
        border: 1px solid #FFCDD2;
    }

    /* FILTER TABS */
    .filter-tabs {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .filter-tabs .tab {
        padding: 9px 20px;
        border-radius: 50px;
        background: #FFFFFF;
        border: 1.5px solid var(--border);
        color: var(--muted);
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s;
    }

    .filter-tabs .tab:hover {
        border-color: var(--accent-mint);
        color: var(--text-dark);
    }

    .filter-tabs .tab.active {
        background: var(--bg-sidebar);
        border-color: var(--bg-sidebar);
        color: var(--accent-mint);
    }

    /* TABLE */
    .table-card {
        background: #FFFFFF;
        border: 1.5px solid var(--border);
        border-radius: 16px;
        padding: 20px 24px;
        overflow-x: auto;
    }

    .table-jurnal {
        width: 100%;
        border-collapse: collapse;
        min-width: 720px;
    }

    .table-jurnal th {
        text-align: left;
        font-size: 11px;
        color: var(--muted);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding-bottom: 14px;
        border-bottom: 1px solid var(--border);
    }

    .table-jurnal td {
        padding: 14px 0;
        font-size: 13px;
        border-bottom: 1px solid #F0E8DC;
        vertical-align: middle;
    }

    .table-jurnal tr:last-child td {
        border-bottom: none;
    }

    .table-jurnal .name {
        font-weight: 700;
        color: var(--text-dark);
    }

    .table-jurnal .sub {
        font-size: 11px;
        color: var(--muted);
        margin-top: 2px;
    }

    .badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 700;
    }

    .badge.pending { background: #FFF4D6; color: #F59E0B; }
    .badge.approved { background: #D9F5E8; color: #16A34A; }
    .badge.rejected { background: #FFE0E0; color: #DC2626; }

    .btn-detail {
        display: inline-block;
        padding: 6px 20px;
        border-radius: 50px;
        background: #E2F2EB;
        color: #386E5E;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s;
    }

    .btn-detail:hover {
        background: #C5EAD9;
        color: #1A312C;
    }

    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 24px;
        border-radius: 10px;
        background: var(--bg-sidebar);
        color: #fff;
        border: none;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.2s;
    }

    .btn-primary:hover { background: #264740; }

    .btn-danger {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 24px;
        border-radius: 10px;
        background: #EF4444;
        color: #fff;
        border: none;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.2s;
    }

    .btn-danger:hover { background: #DC2626; }

    .btn-ghost {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        border-radius: 10px;
        background: transparent;
        border: 1.5px solid var(--border);
        color: var(--muted);
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: 0.2s;
    }

    .btn-ghost:hover { color: var(--text-dark); border-color: var(--accent-mint); }

    .empty-state {
        text-align: center;
        color: var(--muted);
        font-size: 13px;
        padding: 40px 0;
    }

    .empty-state i {
        font-size: 32px;
        display: block;
        margin-bottom: 10px;
        opacity: 0.4;
    }

    /* MOBILE */
    @media (max-width: 768px) {
        .dasboard-layout { flex-direction: column; }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 240px;
            transform: translateX(-100%);
            transition: transform 0.25s ease;
        }
        .sidebar.active { transform: translateX(0); }
        .main-content { padding: 20px 16px; }
        .top-header { flex-direction: column; gap: 16px; }
        .header-right { width: 100%; justify-content: space-between; }
    }
</style>