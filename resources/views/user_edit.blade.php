@extends('layout')

@section('title', 'Edit Pengguna: ' . $user->name)

@section('content')
    
    <h2>Edit Pengguna Sistem</h2>

    <div class="panel">
        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div style="padding: 15px; margin-bottom: 20px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; margin-bottom: 5px; font-weight: 600;">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required 
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; margin-bottom: 5px; font-weight: 600;">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required 
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="role" style="display: block; margin-bottom: 5px; font-weight: 600;">Role</label>
                <select name="role" id="role" required 
                        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User (Wisatawan)</option>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="status" style="display: block; margin-bottom: 5px; font-weight: 600;">Status Aktivasi</label>
                <select name="status" id="status" required 
                        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                    <option value="aktif" {{ old('status', $user->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status', $user->status) == 'nonaktif' ? 'selected' : '' }}>Non-aktif</option>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="password" style="display: block; margin-bottom: 5px; font-weight: 600;">Password (Kosongkan jika tidak ingin diubah)</label>
                <input type="password" name="password" id="password" 
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 25px;">
                <label for="password_confirmation" style="display: block; margin-bottom: 5px; font-weight: 600;">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" 
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <button type="submit" class="btn-search" style="background-color: #2ecc71;"><i class="fas fa-save"></i> Simpan Perubahan</button>
            <a href="{{ route('admin.user.index') }}" style="margin-left: 10px; color: #555; text-decoration: none;">Batal</a>
        </form>
    </div>

@endsection