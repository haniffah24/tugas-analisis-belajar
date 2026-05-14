<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Study Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- MOBILE TOP BAR (Hanya muncul di HP) -->
    <div class="mobile-header">
        <button id="menuToggle" class="menu-btn">☰</button>
        <h3>AI Study</h3>
        <div style="width: 40px;"></div> <!-- Penyeimbang -->
    </div>

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h2>AI Study System</h2>
            <button id="closeMenu" class="close-btn">×</button>
        </div>
        <div class="sidebar-menu">
            <a href="{{ route('dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}">🏠 Dashboard</a>
            <a href="{{ route('input.data') }}" class="{{ Request::is('input-data') ? 'active' : '' }}">➕ Input Klasifikasi</a>
            
            @if(Auth::check() && Auth::user()->role == 'admin')
                <div class="sidebar-label">Admin Area</div>
                <a href="{{ route('admin.index') }}" class="{{ Request::is('admin*') ? 'active' : '' }}">📊 Statistik Global</a>
            @endif

            <form action="{{ route('logout') }}" method="POST" style="margin-top: auto;">
                @csrf
                <button type="submit" class="logout-btn">🚪 Logout</button>
            </form>
        </div>
    </div>

    <!-- OVERLAY (Untuk menutup menu saat klik di luar sidebar di HP) -->
    <div class="overlay" id="overlay"></div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="top-header no-mobile">
            <h3>Halo, {{ Auth::user()->name }}! <span class="role-tag">({{ ucfirst(Auth::user()->role) }})</span></h3>
            <span class="date-text">{{ date('d M Y') }}</span>
        </div>
        
        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- SCRIPT MOBILE MENU -->
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const closeMenu = document.getElementById('closeMenu');

        function toggleMenu() {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        menuToggle.addEventListener('click', toggleMenu);
        closeMenu.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);
    </script>
</body>
</html>