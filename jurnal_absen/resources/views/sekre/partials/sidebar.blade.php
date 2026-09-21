<aside class="sidebar" id="sidebar">
    <div>
        <div class="logo-container">
            <img src="{{ asset('image/logo.png') }}" alt="Logo Jurnal Absensi">
            <span class="logo-title">Jurnal Absensi</span>
        </div>

        <nav class="nav-menu">
            <a href="{{ route('sekre.dashboard') }}"
                class="nav-item {{ $active === 'dashboard' ? 'active' : '' }}">
                <i class="fa-solid fa-house"></i><span>Home</span>
            </a>
            <a href="{{ url('/sekre/jadwal') }}"
                class="nav-item {{ $active === 'jadwal' ? 'active' : '' }}">
                <i class="fa-regular fa-calendar-days"></i><span>Jadwal</span>
            </a>
            <a href="{{ route('sekre.jurnal.index') }}"
                class="nav-item {{ $active === 'jurnal' ? 'active' : '' }}">
                <i class="fa-solid fa-book-open"></i><span>Jurnal</span>
            </a>
            <a href="{{ route('sekre.status-validasi') }}"
                class="nav-item {{ $active === 'status-validasi' ? 'active' : '' }}">
                <i class="fa-regular fa-file-lines"></i><span>Status Validasi</span>
            </a>
        </nav>
    </div>

    <div class="sidebar-footer">
        <a href="{{ route('profile') }}" class="btn-sidebar">
            <i class="fa-regular fa-user"></i><span>Profile</span>
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-sidebar" style="width: 100%;">
                <i class="fa-solid fa-arrow-right-from-bracket"></i><span>Logout</span>
            </button>
        </form>
    </div>
</aside>