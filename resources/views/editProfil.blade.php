<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="{{ asset('css/editProfil.css') }}">
</head>
<body>

    @if (session('success'))
        <div style="background-color: #d4edda; color:#155724; padding:15px; border-radius:8px; margin:20px auto; width:90%; text-align:center;">
            {{ session('success') }}
        </div>
    @endif

    <div class="profile-form">
        <!-- Sidebar -->
        <div class="sidebar">
            <img src="{{ asset('images/Images/' . ($profil['foto'] ?? 'default.png')) }}" alt="Foto Profil" class="profile-pic">
            
            <form action="{{ route('editProfil') }}" method="POST" enctype="multipart/form-data" style="width:100%; text-align:center;">
                @csrf
                <label for="foto" class="edit-btn" style="cursor:pointer;">Ganti Foto</label>
                <input type="file" id="foto" name="foto" accept="image/*" style="display:none;">
            </form>

            <ul class="menu-options">
                <li><a href="#">🏠 Beranda</a></li>
                <li><a href="{{ route('edit-profil') }}">👤 Edit Profil</a></li>
                <li><a href="#">⭐ Favorit</a></li>
            </ul>
        </div>

        <!-- Profile Card -->
        <div class="profile-card">
            <h2>Edit Profil Saya</h2>
            <form action="{{ route('editProfil') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ $profil['nama'] }}">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $profil['email'] }}">
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="tel" name="telepon" value="{{ $profil['telepon'] }}">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" value="{{ $profil['alamat'] }}">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ $profil['tanggal_lahir'] }}">
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin">
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki" {{ $profil['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $profil['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" value="{{ $profil['pekerjaan'] }}">
                    </div>

                    <div class="form-group">
                        <label>Bio</label>
                        <textarea name="bio">{{ $profil['bio'] }}</textarea>
                    </div>
                </div>

                <div class="action-buttons">
                    <button type="submit" class="btn save-btn">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>