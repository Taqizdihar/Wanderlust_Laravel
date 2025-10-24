<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard Admin')</title>
  <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">
</head>
<body>
  <div class="sidebar">
    <h2>Halo,Admin</h2>
    <ul>
      <li><a href="{{ route('dashboard.admin') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}"> 🏠 Dashboard</li>
      <li><a href="{{ route('tempat-wisata') }}" class="{{ request()->is('tempat-wisata') ? 'active' : '' }}">🌴 Kelola Wisata</a></li>
      <li><a href="#">👥 Kelola User</a></li>
      <li><a href="#">💰 Kelola Keuangan</a></li>
    </ul>
  </div>

  <div class="content">
    @yield('content')
  </div>
</body>
</html>
