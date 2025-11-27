<?php

namespace Database\Seeders;

use App\Models\Wisatawan;
use App\Models\User; // Tambahkan import Model User
use Illuminate\Database\Seeder;

class WisatawanSeeder extends Seeder {
    public function run(): void {
        
        // Ambil 10 ID User pertama yang sudah dibuat di UserSeeder (sebelumnya)
        $userIds = User::pluck('id_user')->take(10); 

        foreach($userIds as $id_user) {
            // Membuat data Wisatawan yang terhubung ke User yang sudah ada
            // Data disederhanakan untuk seeding agar tidak bergantung pada Factory kompleks
            Wisatawan::create([
                'id_user' => $id_user,
                'tanggal_lahir' => '1995-01-01',
                'jenis_kelamin' => 'L',
                'alamat' => 'Alamat Wisatawan Dummy',
                'status_akun' => 'aktif',
                'kota_asal' => 'Yogyakarta',
                'preferensi_wisata' => 'Alam',
            ]);
        }
    }
}