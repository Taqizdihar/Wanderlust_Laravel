{{-- resources/views/kelola_user.blade.php --}}

@extends('layout') 

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <h2 class="header-title">KELOLA USER</h2>
        
        <div class="card shadow mt-4">
            <div class="card-header">
                <h3 class="card-title">Daftar Pengguna (20 List Sider)</h3>
            </div>
            
            <div class="card-body p-0">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th style="width: 5%">NO</th>
                            <th>NAMA</th>
                            <th style="width: 15%">STATUS</th>
                            <th style="width: 15%">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Ini adalah baris yang error jika $users kosong/tidak terdefinisi --}}
                        @forelse ($users as $index => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $index }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                @if ($user->is_active)
                                    <span class="badge bg-success">AKTIF</span>
                                @else
                                    <span class="badge bg-danger">NON AKTIF</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus user ini?')" title="Hapus User">
                                        <i class="fas fa-trash"></i> DELETE
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data user yang ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="card-footer clearfix">
                {{ $users->links() }} 
            </div>
        </div>
    </div>
</div>

@endsection