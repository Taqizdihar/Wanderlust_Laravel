<?php

namespace Database\Seeders;

use App\Models\Wisatawan;
use App\Models\User; // Tambahkan import Model User
use Illuminate\Database\Seeder;
use Faker\Factory as Faker; // Tambahkan import Faker

class WisatawanSeeder extends Seeder {
    public function run(): void {
        
        $faker = Faker::create('id_ID'); // Inisialisasi Faker dengan locale Indonesia
        
        // Ambil 10 ID User pertama yang sudah dibuat di UserSeeder (sebelumnya)
        $userIds = User::pluck('id_user')->take(10); 

        foreach($userIds as $id_user) {
            
            // Generate Tanggal Lahir (Misalnya, antara 18 sampai 50 tahun lalu)
            $birthDate = $faker->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d');
            
            // Membuat data Wisatawan yang terhubung ke User yang sudah ada
            Wisatawan::create([
                'id_user' => $id_user,
                'tanggal_lahir' => $birthDate, // Menggunakan tanggal dinamis
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'no_telepon' => '08' . $faker->randomNumber(8, true),
                'alamat' => $faker->address,
                'status_akun' => 'aktif',
                'kota_asal' => $faker->city,
                'preferensi_wisata' => $faker->randomElement(['Wisata Alam', 'Pantai', 'Gunung', 'Kuliner']),
            ]);
        }
    }
}