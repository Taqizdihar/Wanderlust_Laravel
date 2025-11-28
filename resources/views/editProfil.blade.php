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

    @if (session('success'))
        @endif

    <div class="profile-form">
        <div class="sidebar">
            <img src="{{ asset('images/profiles/' . ($user->foto_profil ?? 'default.png')) }}" alt="Foto Profil" class="profile-pic">
            
            <button class="edit-btn">Edit Profil</button>
            
            <ul class="menu-options">
                <li><a href="{{ route('home') }}">🏠 Beranda</a></li>
                <li><a href="{{ route('edit-profil') }}" class="active-option">👤 Edit Profil</a></li>
                <li><a href="{{ route('bookmark.index') }}">⭐ Favorit</a></li>
                <li><a href="#">💰 Pembayaran</a></li> <li><a href="{{ route('logout') }}">🚪 Logout</a></li> </ul>
        </div>

        <div class="profile-card">
            <h2>{{ $user->nama ?? 'Nama Pengguna' }}</h2>
            
            <form action="{{ route('update.profil') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="tel" name="no_telepon" value="{{ $user->no_telepon }}">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ $wisatawan->tanggal_lahir ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin">
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki" {{ ($wisatawan->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ ($wisatawan->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status Akun</label>
                        <input type="text" value="{{ $wisatawan->status_akun ?? 'N/A' }}" disabled>
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
                    <a href="{{ route('home') }}" class="btn cancel-btn">Kembali</a> 
                    <button type="submit" class="btn save-btn">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>