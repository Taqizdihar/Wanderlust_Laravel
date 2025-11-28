<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void {
        
        // --- 1. AKUN WISATAWAN (Role: tourist) ---
        User::create([
            'nama' => 'Faiz Syafiq N',
            'email' => 'faiz@wanderlust.com', 
            'no_telepon' => '081234567890',
            'password' => Hash::make('12345678'), 
            'role' => 'tourist', 
            'foto_profil' => 'faiz.jpg', // ID 1
        ]);

        // --- 2. AKUN PEMILIK TEMPAT WISATA (Role: ptw) ---
        User::create([
            'nama' => 'M. Alnilam Lambda',
            'email' => 'alnilam@wanderlust.com',
            'no_telepon' => '081211122233',
            'password' => Hash::make('12345678'),
            'role' => 'ptw',
            'foto_profil' => 'ptw-1.jpg', // ID 2
        ]);
        
        // --- 3. AKUN ADMINISTRATOR (Role: admin) ---
        User::create([
            'nama' => 'Riska',
            'email' => 'riska@wanderlust.com',
            'no_telepon' => '082211133344',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'foto_profil' => 'admin-1.jpg', // ID 3
        ]);
        
        // 4. User Dummy (7 Akun tambahan)
        // Ini dibuat untuk memenuhi dependency (PenilaianSeeder/WisatawanSeeder membutuhkan 10 user)
        User::factory(7)->create(); 
    }
}