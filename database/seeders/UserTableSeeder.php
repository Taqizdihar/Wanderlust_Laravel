<?php
// database/seeders/UserTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        // Bersihkan data lama di tabel users
        DB::table('users')->truncate(); 
        
        // 1. DATA ADMIN (Super Admin)
        DB::table('users')->insert([
            'name' => 'Riska Deo Bakri (Super Admin)',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'), 
            'role' => 'admin',
            'status' => 'aktif', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. DATA TEST KHUSUS (2 records dengan nama 'Riska')
        DB::table('users')->insert([
            [
                'name' => 'Riska Puspitasari',
                'email' => 'riska.test1@mail.com',
                'password' => Hash::make('password'), 
                'role' => 'user',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Riska Melati',
                'email' => 'riska.test2@mail.com',
                'password' => Hash::make('password'), 
                'role' => 'user',
                'status' => 'nonaktif', 
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        
        // 3. GENERATE 17 USER TAMBAHAN (Total 20 records)
        $users = [];
        $totalTambahan = 17; 

        for ($i = 1; $i <= $totalTambahan; $i++) {
            $name = 'Wisatawan Test ' . $i;
            $status = ($i % 3 == 0) ? 'nonaktif' : 'aktif';
            
            $users[] = [
                'name' => $name,
                'email' => strtolower(str_replace(' ', '', $name)) . Str::random(3) . '@test.com', 
                'password' => Hash::make('password'), 
                'role' => 'user', 
                'status' => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('users')->insert($users);
    }
}