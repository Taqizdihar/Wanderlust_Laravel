<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="{{ asset('css/editProfil.css') }}">
</head>
<body>
    <form class="profile-form" method="POST" action="{{ route('profil.update') }}">
        @csrf
        <aside class="sidebar">
            <img src="{{ asset('images/' . $user['foto']) }}" alt="Foto Profil" class="profile-pic">
            <button type="button" class="edit-btn">Ganti Foto</button>
            <ul class="menu-options">
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('profil.edit') }}">Edit Profil</a></li>
            </ul>
        </aside>

        <section class="profile-card">
            <h2>Edit Profil</h2>

            @if(session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif

            <div class="form-grid">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ $user['nama'] }}">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $user['email'] }}">
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="tel" name="telepon" value="{{ $user['telepon'] }}">
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ $user['tanggal_lahir'] }}">
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin">
                        <option value="Laki-laki" {{ $user['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $user['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" value="{{ $user['alamat'] }}">
                </div>
            </div>

            <div class="action-buttons">
                <button type="submit" class="btn save-btn">Simpan</button>
            </div>
        </section>
    </form>
</body>
</html>