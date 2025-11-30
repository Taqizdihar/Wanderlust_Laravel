<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Admin | @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* CSS Sederhana Agar Tampilan Mirip Gambar Kamu */
        body { font-family: 'Arial', sans-serif; background-color: #f4f6f9; margin: 0; padding: 0; }
        .wrapper { display: flex; min-height: 100vh; }
        .sidebar { width: 250px; background-color: #008080; color: white; padding-top: 20px; flex-shrink: 0; }
        .sidebar-header { text-align: center; padding-bottom: 20px; border-bottom: 1px solid rgba(255, 255, 255, 0.1); }
        .profile-pic { width: 60px; height: 60px; border-radius: 50%; background-color: white; margin: 0 auto 10px; display: block; }
        .sidebar-menu a { display: block; padding: 15px 20px; text-decoration: none; color: white; transition: background-color 0.3s; }
        .sidebar-menu a:hover, .sidebar-menu a.active { background-color: rgba(255, 255, 255, 0.1); }
        .content { flex-grow: 1; padding: 30px; }
        
        /* Style untuk Dashboard Card (yang kotak-kotak) */
        .card-container { display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px; }
        .info-card { background-color: white; padding: 25px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); min-width: 220px; }
        .card-title { font-size: 1em; color: #777; margin-bottom: 5px; }
        .card-value { font-size: 1.8em; font-weight: bold; }
        
        /* Style untuk Tabel (Kelola User) */
        .panel { background-color: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); overflow: hidden; margin-top: 20px; }
        /* Style yang terakhir kita fix (badge) */
        .badge {
            padding: 5px 10px; border-radius: 15px; font-size: 0.8em; font-weight: 600; color: white; display: inline-block;
        }
        
        /* Style untuk Search (Kelola User) */
        .search-container { display: flex; justify-content: flex-end; margin-bottom: 20px; }
        .search-input { padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .btn-search { padding: 8px 15px; background-color: #3498db; color: white; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-header">
                <img src="/profiles/riskafotos.jpg" alt="Admin" class="profile-pic">
                <div>Halo, Admin</div>
                <small>Super Administrator</small>
            </div>
            <nav class="sidebar-menu">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="#" class="">
                    <i class="fas fa-mountain"></i> Kelola Wisata
                </a>
                <a href="{{ route('admin.user.index') }}" class="{{ request()->routeIs('admin.user.index') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Kelola User
                </a>
                <a href="#" class="">
                    <i class="fas fa-wallet"></i> Kelola Keuangan
                </a>
                
                <form action="{{ route('logout') }}" method="POST" style="margin-top: 50px;">
                    @csrf
                    <button type="submit" style="
                        background: none; border: none; color: white; padding: 15px 20px; 
                        width: 100%; text-align: left; cursor: pointer;
                    ">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </nav>
        </div>

        <div class="content">
            <div style="display: flex; justify-content: flex-end; padding-bottom: 20px; border-bottom: 1px solid #eee;">
                <input type="text" placeholder="Cari..." class="search-input">
            </div>
            
            @yield('content')
        </div>
    </div>
</body>
</html>
