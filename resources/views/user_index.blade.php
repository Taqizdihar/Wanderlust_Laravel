@extends('layout')

@section('title', 'Kelola Pengguna Sistem')

@section('content')

    <style>
        /* Style Dasar untuk Badge/Status */
        .badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8em;
            font-weight: 600;
            color: white; /* Warna teks statis */
            display: inline-block;
        }

        /* Warna Dinamis untuk Role */
        .badge-admin { background-color: #3498db; } /* Biru */
        .badge-user { background-color: #2ecc71; }  /* Hijau */
        
        /* Warna Dinamis untuk Status */
        .badge-aktif { background-color: #27ae60; }   /* Hijau Tua */
        .badge-nonaktif { background-color: #e67e22; } /* Oranye */
    </style>
    
    <h2>Daftar Pengguna Sistem</h2>
    
    @if(session('success'))
        <div style="padding: 15px; margin-bottom: 20px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="search-container" style="justify-content: space-between; align-items: center;">
        <div style="font-weight: 600; color: #555;">Total User: {{ $users->total() }}</div>
        
        <form action="{{ route('admin.user.index') }}" method="GET" style="display: flex; gap: 10px;">
            <input type="text" name="keyword" class="search-input" placeholder="Cari Nama/Email/Status..." value="{{ request('keyword') }}">
            <button type="submit" class="btn-search"><i class="fas fa-search"></i> Cari</button>
        </form>
    </div>
    
    <div class="panel" style="padding: 0;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background-color: #f7f7f7;">
                    <th style="padding: 15px; border-bottom: 1px solid #eee;">No</th>
                    <th style="padding: 15px; border-bottom: 1px solid #eee;">Nama</th>
                    <th style="padding: 15px; border-bottom: 1px solid #eee;">Email</th>
                    <th style="padding: 15px; border-bottom: 1px solid #eee;">Role</th>
                    <th style="padding: 15px; border-bottom: 1px solid #eee;">Status</th>
                    <th style="padding: 15px; border-bottom: 1px solid #eee;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                
                @php
                    // 1. Tentukan Class untuk Role
                    $roleClass = $user->role === 'admin' ? 'badge-admin' : 'badge-user';

                    // 2. Tentukan Class dan Teks untuk Status
                    $statusClass = $user->status === 'aktif' ? 'badge-aktif' : 'badge-nonaktif';
                    $statusText = strtoupper($user->status);
                    
                    // 3. Pesan Konfirmasi Status
                    $actionText = $user->status === 'aktif' ? 'NONAKTIF' : 'AKTIF';
                    $confirmMessage = "Apakah Anda yakin ingin mengubah status $user->name menjadi $actionText?";
                @endphp
                
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 15px;">{{ $loop->iteration + $users->firstItem() - 1 }}</td>
                    <td style="padding: 15px;">{{ $user->name }}</td>
                    <td style="padding: 15px;">{{ $user->email }}</td>
                    
                    <td style="padding: 15px;">
                        <span class="badge {{ $roleClass }}">
                            {{ strtoupper($user->role) }}
                        </span>
                    </td>
                    
                    <td style="padding: 15px;">
                        <span class="badge {{ $statusClass }}">
                            {{ $statusText }}
                        </span>
                    </td>

                    <td style="padding: 15px; display: flex; gap: 5px; flex-wrap: wrap;">
                        
                        <a href="{{ route('admin.user.edit', $user->id) }}" style="padding: 5px 10px; background-color: #f39c12; color: white; border-radius: 4px; text-decoration: none; font-size: 0.9em;">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <form action="{{ route('admin.user.toggleStatus', $user->id) }}" method="POST" onsubmit="return confirm('{{ $confirmMessage }}');">
                            @csrf
                            @method('PUT')
                            @if ($user->status === 'aktif')
                                <button type="submit" style="padding: 5px 10px; background-color: #3498db; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 0.9em;">
                                    <i class="fas fa-power-off"></i> Nonaktifkan
                                </button>
                            @else
                                <button type="submit" style="padding: 5px 10px; background-color: #2ecc71; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 0.9em;">
                                    <i class="fas fa-check-circle"></i> Aktifkan
                                </button>
                            @endif
                        </form>
                        
                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 5px 10px; background-color: #e74c3c; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 0.9em;">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="padding: 20px; text-align: center; color: #999;">Tidak ada data user yang ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div style="padding: 15px;">
            {{ $users->links() }}
        </div>
    </div>

@endsection