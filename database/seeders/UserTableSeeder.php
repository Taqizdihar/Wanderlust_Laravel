<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = [];

        for ($i = 1; $i <= 20; $i++) {
            $users[] = [
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'status' => $i % 2 == 0 ? 'aktif' : 'non-aktif',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('users')->insert($users);
    }
}
