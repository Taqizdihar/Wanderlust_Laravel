<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Jalankan database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersData = [
            // User 1: Administrator (Tambahan untuk akses login)
            [
                'name' => 'Super Administrator',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password'), // password: password
                'role' => 'Super Administrator', 
                'status' => 'Aktif',
                'email_verified_at' => now(),
            ],
            
            // User 2-20: Data SIDER 20 Wisatawan
            ['name' => 'Riska Wijaya', 'email' => 'riska@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Aktif', 'email_verified_at' => now()],
            ['name' => 'Budi Santoso', 'email' => 'budi@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Non Aktif', 'email_verified_at' => now()],
            ['name' => 'Siti Nurhaliza', 'email' => 'siti@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Aktif', 'email_verified_at' => now()],
            ['name' => 'Agung Pramana', 'email' => 'agung@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Aktif', 'email_verified_at' => now()],
            ['name' => 'Diah Ayu', 'email' => 'diah@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Non Aktif', 'email_verified_at' => now()],
            ['name' => 'Eko Maulana', 'email' => 'eko@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Aktif', 'email_verified_at' => now()],
            ['name' => 'Fani Adelia', 'email' => 'fani@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Aktif', 'email_verified_at' => now()],
            ['name' => 'Gilang Putra', 'email' => 'gilang@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Non Aktif', 'email_verified_at' => now()],
            ['name' => 'Heni Susanti', 'email' => 'heni@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Aktif', 'email_verified_at' => now()],
            ['name' => 'Indra Jaya', 'email' => 'indra@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Aktif', 'email_verified_at' => now()],
            ['name' => 'Jihan Kirana', 'email' => 'jihan@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Non Aktif', 'email_verified_at' => now()],
            ['name' => 'Kemal Pasha', 'email' => 'kemal@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Aktif', 'email_verified_at' => now()],
            ['name' => 'Laila Sari', 'email' => 'laila@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Aktif', 'email_verified_at' => now()],
            ['name' => 'Maman Sudarman', 'email' => 'maman@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Non Aktif', 'email_verified_at' => now()],
            ['name' => 'Nina Kartika', 'email' => 'nina@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Aktif', 'email_verified_at' => now()],
            ['name' => 'Oki Setiawan', 'email' => 'oki@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Aktif', 'email_verified_at' => now()],
            ['name' => 'Putri Lestari', 'email' => 'putri@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Non Aktif', 'email_verified_at' => now()],
            ['name' => 'Qinan Fadhil', 'email' => 'qinan@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Aktif', 'email_verified_at' => now()],
            ['name' => 'Rendi Kusuma', 'email' => 'rendi@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Aktif', 'email_verified_at' => now()],
            ['name' => 'Sari Dewi', 'email' => 'sari@mail.com', 'password' => Hash::make('password'), 'role' => 'Wisatawan', 'status' => 'Non Aktif', 'email_verified_at' => now()],
        ];

        // Masukkan data ke dalam tabel users
        foreach ($usersData as $user) {
            User::create($user);
        }
    }
}