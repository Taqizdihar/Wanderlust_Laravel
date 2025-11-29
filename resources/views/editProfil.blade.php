<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - {{ $user->nama ?? 'Pengguna' }}</title>
    <link rel="stylesheet" href="{{ asset('css/editProfil.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <header class="main-header">
    <div class="logo-container">
        <img src="{{ asset('/images/Logos/Wanderlust Logo Circle.png') }}" alt="Logo" class="logo">
        <div class="logo-text">
            <span class="title">Wanderlust</span>
            <span class="subtitle">WANDERINGS FOR WONDERS</span> 
        </div>
    </div>

    <form action="{{ route('pencarian') }}" method="GET" class="search-bar">
        <input type="text" name="kataKunci" placeholder="Cari destinasi wisata..." required>
        <button type="submit" class="search-button">
            <i class="search-icon fas fa-search"></i>
        </button>
    </form>

    <div class="nav-links">
        <a href="{{ Auth::check() ? route('transaksi.riwayat') : route('login') }}">Pesan Tiket</a>
        <a href="{{ Auth::check() ? route('penilaian.index') : route('login') }}">Penilaian</a>
        <a href="{{ Auth::check() ? route('bookmark.index') : route('login') }}">Favorit</a>
        
        <a href="{{ Auth::check() ? route('profil') : route('login') }}">
            <div class="profile-icon">
                @if(Auth::check() && Auth::user()->foto_profil)
                    <img src="{{ asset('images/profiles/' . Auth::user()->foto_profil) }}" alt="Foto Profil">
                @else
                    <i class="fas fa-user"></i>
                @endif
            </div>
        </a>
    </div>
</header>
    
    <div class="profile-form">
        <div class="sidebar">
            <img src="{{ asset('images/profiles/' . ($user->foto_profil ?? 'default.png')) }}" alt="Foto Profil" class="profile-pic" id="profile-pic-preview">
            
            <input type="file" id="foto_profil_input" name="foto_profil" accept="image/*" style="display: none;">
            <button type="button" class="btn edit-foto-btn" onclick="document.getElementById('foto_profil_input').click();">Edit Foto Profil</button>
            
            <ul class="menu-options">
                <li><a href="{{ route('home') }}">🏠 Beranda</a></li>
                <li><a href="{{ route('profil') }}">👤 Profil</a></li> 
                <li class="active"><a href="{{ route('edit-profil') }}" class="active-option">✍️ Edit Profil</a></li> 
                <li><a href="{{ route('bookmark.index') }}">⭐ Favorit</a></li>
                <li><a href="#">💰 Pembayaran</a></li> 
                <li><a href="{{ route('logout') }}">🚪 Logout</a></li> 
            </ul>
        </div>

        <div class="profile-card">
            <h2>Edit Profil</h2>
            
            <form action="{{ route('update.profil') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-grid">
                    
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="tel" name="no_telepon" value="{{ $wisatawan->no_telepon ?? '' }}">
                    </div>
                    
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ $wisatawan->tanggal_lahir ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin">
                            <option value="L" {{ ($wisatawan->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ ($wisatawan->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Usia</label>
                        <input type="text" value="{{ $usia ?? 'N/A' }} Tahun" disabled>
                    </div>
                    
                    <div class="form-group">
                        <label>Status Akun</label>
                        <input type="text" value="{{ $wisatawan->status_akun ?? 'Aktif' }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Kota Asal</label>
                        <input type="text" name="kota_asal" value="{{ $wisatawan->kota_asal ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label>Preferensi Wisata</label>
                        <input type="text" name="preferensi_wisata" value="{{ $wisatawan->preferensi_wisata ?? '' }}">
                    </div>
                    
                    <div class="form-group full-width-grid">
                        <label>Alamat</label>
                        <textarea name="alamat">{{ $wisatawan->alamat ?? '' }}</textarea>
                    </div>

                </div>

                <div class="action-buttons">
                    <a href="{{ route('profil') }}" class="btn back-btn">Kembali</a> 
                    
                    <div class="right-actions">
                         <a href="{{ route('profil') }}" class="btn cancel-btn">Batalkan</a> 
                        <button type="submit" class="btn save-btn">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <footer class="footer">
    <div class="footer-top">
        <div class="footer-left">
            <div class="logo-text footer-logo">
                <img src="{{ asset('/images/Logos/Wanderlust Logo Circle.png') }}" alt="Logo" class="logo-img">
                <span class="title">Wanderlust</span>
            </div>
        </div>

        <div class="footer-links-container">
            <div class="footer-column">
                <a href="#">Tentang Kami</a>
                <a href="#">Kontak Kami</a>
                <a href="#">FAQs</a>
            </div>

            <div class="footer-column">
                <a href="#">Komunitas</a>
                <a href="#">Tips & Trick</a>
                <a href="#">Promo</a>
            </div>

            <div class="footer-column">
                <a href="{{ route('profil') }}">Profil</a> <a href="#">Agenda</a>
                <a href="{{ route('home') }}">Home</a>
            </div>
        </div>
    </div>
    
    <div class="footer-center">
        Copyright © 2025 Wanderlust. All rights reserved
    </div>
</footer>

<script>
    // Fungsionalitas preview foto profil (opsional, untuk UX)
    document.getElementById('foto_profil_input').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profile-pic-preview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>

</body>
</html>