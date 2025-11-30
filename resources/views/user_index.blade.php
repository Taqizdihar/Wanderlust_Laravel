<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola User Admin</title>
    <!-- Ganti dengan link CSS Tailwind atau Bootstrap Anda jika ada -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .container-custom { max-width: 1024px; }
        .alert-success { background-color: #d1e7dd; color: #0f5132; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem; }
    </style>
</head>
<body class="bg-gray-100 p-8">

    <div class="container-custom mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Kelola User Wisata</h1>

        <!-- Pesan Sukses -->
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Pencarian (sesuai Controller: $request->keyword) -->
        <form method="GET" action="{{ route('admin.user.index') }}" class="flex mb-6">
            <input type="text" name="keyword" placeholder="Cari Nama/Email/Status..." value="{{ request('keyword') }}"
                   class="flex-grow p-2 border border-gray-300 rounded-l-md focus:ring-blue-500 focus:border-blue-500">
            <button type="submit" class="bg-blue-600 text-white p-2 rounded-r-md hover:bg-blue-700 transition duration-150">Cari</button>
        </form>

        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama & Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                <div class="text-sm text-gray-500">{{ $user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->role }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $user->status === 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $user->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <!-- Tombol Update Status (GET) -->
                                <a href="{{ route('admin.user.status', $user->id) }}" 
                                   class="text-indigo-600 hover:text-indigo-900 mr-4 transition duration-150">
                                    {{ $user->status === 'Aktif' ? 'Nonaktifkan' : 'Aktifkan' }}
                                </a>
                                
                                <!-- Tombol Delete (DELETE Method, pakai form spoofing) -->
                                <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" class="inline-block" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini? Aksi ini tidak dapat dibatalkan.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 transition duration-150">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada user ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>

</body>
</html>