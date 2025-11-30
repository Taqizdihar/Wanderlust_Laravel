<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}"> 
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-cube fa-2x" style="color: #3498db;"></i>
            <span class="logo-text">Travel Admin</span>
        </div>

        <div class="profile-section">
            <img src="https://i.pravatar.cc/150?img=68" alt="Foto Profil Admin" class="profile-pic">
            {{-- Menggunakan helper Auth untuk nama pengguna --}}
            <p class="user-name">Halo, {{ Auth::user()->name ?? 'Admin' }}</p>
            <span class="user-role">Super Administrator</span>
        </div>

        <nav>
            {{-- Perhatikan penamaan route (admin.) akan tetap kita pakai di web.php --}}
            <a href="{{ route('admin.dashboard') }}" class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fas fa-chart-line"></i> Dashboard</a>
            <a href="{{ route('admin.wisata.index') }}" class="{{ Request::routeIs('admin.wisata.*') ? 'active' : '' }}"><i class="fas fa-map-marked-alt"></i> Kelola Wisata</a>
            <a href="{{ route('admin.user.index') }}" class="{{ Request::routeIs('admin.user.*') ? 'active' : '' }}"><i class="fas fa-users"></i> Kelola User</a>
            <a href="{{ route('admin.keuangan.index') }}" class="{{ Request::routeIs('admin.keuangan.*') ? 'active' : '' }}"><i class="fas fa-money-check-alt"></i> Kelola Keuangan</a>
        </nav>
    </div>

    <div class="top-header">
        <div class="header-title">@yield('title')</div>
        <div class="header-right">
            <input type="text" placeholder="Cari..." class="search-input-header">
            <span class="header-icon"><i class="fas fa-bell fa-lg"></i></span>
            <span class="header-icon"><i class="fas fa-user-circle fa-lg"></i></span>
        </div>
    </div>

    <div class="main-content">
        @yield('content') 
    </div>

</body>
</html>